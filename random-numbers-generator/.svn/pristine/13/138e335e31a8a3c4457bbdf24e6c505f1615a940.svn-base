<?php
class randomNumbers_generator
{
    public $result = 0;
    public $range = [0, 100];
    public $format = [];
    public $decimals = 0;
    public $use = null;

    public function __construct(array $atts)
    {
        self::init($atts);
    }

    private function init(array $atts)
    {
        self::setUse($atts['use'])
            ->setRange($atts['range'])
            ->setFormat($atts['format'])
            ->setDecimals()
            ->setResult();
    }

    /**
     * Range
     */
    public function setRange(?string $range = ''): self
    {
        self::validateRange($range);
        return $this;
    }
    public function getRange(): array
    {
        return $this->range;
    }

    /**
     * Format
     */
    public function setFormat(?string $format = ''): self
    {
        self::validateFormat($format);
        return $this;
    }

    public function getFormat(): array
    {
        return $this->format;
    }

    /**
     * Decimals
     */
    public function setDecimals(): self
    {
        $this->decimals = $this->format['decimals'];
        return $this;
    }

    public function getDecimals(): int
    {
        return $this->decimals;
    }

    /**
     * Use
     */
    public function setUse(?string $use = null): self
    {
        if (!empty($use)) {
            $use = preg_replace("/[^a-zA-Z0-9]+/", "", $use); // sanitize
            $this->use = $use;
        }
        return $this;
    }
    public function getUse(): ?string
    {
        return $this->use;
    }

    /**
     * Result
     */
    public function setResult(): self
    {
        $formatted = number_format(self::getValue(), $this->format['decimals']);
        $this->result = sprintf('%s', $this->format['prefix'] . $formatted . $this->format['suffix']);
        return $this;
    }
    public function getResult(): string
    {
        return $this->result;
    }

    protected function getValue(): string
    {
        $cache = self::get();
        if ($cache == null) {
            $value = self::randf($this->range[0], $this->range[1]);
            self::set($value);
            return $value;
        } else {
            return $cache;
        }
    }

    /**
     * Validators
     */
    protected function validateRange(?string $range = ''): void
    {
        $r = explode(',', str_replace(' ', '', $range));
        if (empty($r)) {
            $r = [0, 0];
        }
        $min = is_numeric($r[0]) ? $r[0] : 0;
        if (!empty($r[1])) {
            $max = $r[1] < $min || !is_numeric($r[1]) ? $min : $r[1];
        } else {
            $max = $min;
        }
        $this->range = [$min, $max];
        return;
    }

    protected function validateFormat(?string $format = ''): void
    {
        $regex = "/(.*)\#(\d{0,1})(.*)/";
        preg_match_all($regex, $format, $matches, PREG_PATTERN_ORDER);
        if (!empty($matches)) {
            $this->format = [
                'prefix' => empty($matches[1][0]) ? '' : $matches[1][0],
                'decimals' => empty($matches[2][0]) ? 0 : $matches[2][0],
                'suffix' => empty($matches[3][0]) ? '' : $matches[3][0],
            ];
        } else {
            $this->format = [
                'prefix' => '',
                'decimals' => 0,
                'suffix' => '',
            ];
        }
        return;
    }

    // Caching

    /**
     * Sets the value of a named register in session array
     */
    protected function set(string $value = null): self
    {
        if (!empty(self::getUse())) {
            $_SESSION['randomnumbers'][self::getUse()] = $value;
        }
        return $this;
    }

    /**
     * Retrieves the value of a named register from the session array
     */
    protected function get(): ?string
    {
        if (!empty($_SESSION['randomnumbers'][self::getUse()])) {
            return $_SESSION['randomnumbers'][self::getUse()];
        } else {
            return false;
        }
    }

    // Helpers

    /**
     * Returns a random float
     */
    protected function randf(float $min, float $max)
    {
        return ($min + lcg_value() * (abs($max - $min)));
    }
}
