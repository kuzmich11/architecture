<?php

class Formula
{
    protected string $formula;
    protected array $arr;
    protected array $heap;
    protected float|int $result = 0;

    public function __construct($formula)
    {
        $this->formula = $formula;
        $this->arr = $this->parse($this->formula);
        $this->setHeap();
    }

    /**
     * @return string
     */
    public function getFormula(): string
    {
        return $this->formula;
    }

    /**
     * @param string $formula
     */
    public function setFormula(string $formula): void
    {
        $this->formula = $formula;
        $this->arr = $this->parse($this->formula);
        $this->heap = $this->setHeap($this->arr);
    }

    protected function parse($formula): array|bool
    {
        $formula = preg_replace('/\s+/', '', $formula);
        $arr = preg_split("~(?:(\((?:[^()]++|(?1))*\))|'[^']*')(*SKIP)(*F)|([+\-*/^])~", $formula, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        foreach ($arr as $key => $item) {
            if (preg_match('(\(.*\))', $item)) {
                $x = mb_substr($item, 1, strlen($item) - 2); //убираем крайние скобки
//                echo $x;
                $arr[$key] = $this->parse($x);
            }
        }
        return $arr;
    }

    /**
     * @return array
     */
    public function getArr(): array
    {
        return $this->arr;
    }

    protected function findChild(string $operator1, string $operator2, int $i, array $arr): void
    {
        for ($j = count($arr) - 1; $j >= 0; $j--) {
            if ($arr[$j] == $operator1 or $arr[$j] == $operator2) {
                $this->heap[$i] = $arr[$j];
                $this->heap[$i * 2 + 1] = array_slice($arr, 0, $j);
                $this->heap[$i * 2 + 2] = array_slice($arr, $j + 1, (count($arr) - 1) - $j);
                break;
            }
        }
    }

    protected function setHeap(): void
    {
        $this->heap[0] = $this->arr;
        $i = 0;
        while (count($this->heap, COUNT_RECURSIVE) - count($this->heap)) {
            if (!array_key_exists($i, $this->heap)) {
                $i++;
                continue;
            }
            $buf = $this->heap[$i];
            if (count($buf) > 1) {

                $this->findChild('-', '+', $i, $buf);
                if ($this->heap[$i] == '-' or $this->heap[$i] == '+') {
                    $i++;
                    continue;
                }

                $this->findChild('*', '/', $i, $buf);

                if ($this->heap[$i] == '*' or $this->heap[$i] == '/') {
                    $i++;
                    continue;
                }

                $this->findChild('^', 'sqrt', $i, $buf);
                if ($this->heap[$i] == '^' or $this->heap[$i] == 'sqrt') {
                    $i++;
                    continue;
                }

            }
            if (count($buf) == 1 and is_array($buf[0])) {
                $x = $buf[0];

                $this->findChild('-', '+', $i, $x);
                if ($this->heap[$i] == '-' or $this->heap[$i] == '+') {
                    $i++;
                    continue;
                }

                $this->findChild('*', '/', $i, $x);
                if ($this->heap[$i] == '*' or $this->heap[$i] == '/') {
                    $i++;
                    continue;
                }

                $this->findChild('^', 'sqrt', $i, $x);
                if ($this->heap[$i] == '^' or $this->heap[$i] == 'sqrt') {
                    $i++;
                    continue;
                }
                if (count($x) == 1) {
                    $this->heap[$i] = $x[0];
                    $i++;
                }
            }
            if (count($buf) == 1) {
                $this->heap[$i] = $buf[0];
                $i++;
            }
        }
    }

    public function iterating(): void
    {

    }

    /**
     * @return array
     */
    public function getHeap(): array
    {
        return $this->heap;
    }

    public function calculate(): float|int
    {

        return $this->result;
    }

    /**
     * @return float|int
     */
    public function getResult(): float|int
    {
        return $this->result;
    }
}

$formula = new Formula("(x+42)^2+7*y-z");
//$formula = new Formula("1 + 2 * (3 + (23 + 53 - (132 / 5) + 5) - 1) + 2 / (x+y) - 52");
//$formula->setFormula("1 + 2 * (3 + (23 + 53 - (132 / 5) + 5) - 1) + 2 / (x + y) - 52");
print_r($formula->getArr());
print_r($formula->getHeap());

