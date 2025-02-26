<?php

declare (strict_types=1);
namespace Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga;

class AshtakavargaResult
{
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaPlanetResult
     */
    private $prastara;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaRasiResult
     */
    private $trikona;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaRasiResult
     */
    private $ekaadhipatya;
    public function __construct(\Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaPlanetResult $prastara, \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaRasiResult $trikona, \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaRasiResult $ekaadhipatya)
    {
        $this->prastara = $prastara;
        $this->trikona = $trikona;
        $this->ekaadhipatya = $ekaadhipatya;
    }
    public function getPrastara(): \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaPlanetResult
    {
        return $this->prastara;
    }
    public function getTrikona(): \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaRasiResult
    {
        return $this->trikona;
    }
    public function getEkaadhipatya(): \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaRasiResult
    {
        return $this->ekaadhipatya;
    }
}
