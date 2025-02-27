<?php
class Dealfront_Logo
{
  private function get_dealfront_svg()
  {
    return
      '<svg width="576" height="476" viewBox="0 0 576 476" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M133.3 319.94L71.45 467.8C46.52 471.55 22.51 474.05 0 475.16L62.06 326.72C86.04 325.43 109.9 323.1 133.3 319.94Z" fill="#FCC740"/>
      <path d="M183.93 444.24C158.44 450.99 133.09 456.77 108.34 461.5L169.84 314.35C195.78 309.86 220.92 304.48 244.85 298.52L183.93 444.24Z" fill="#68AADD"/>
      <path d="M575.59 193.96C575.8 283.38 401.95 379.63 222.72 433.3L283.46 288.08C386.6 257.97 459.18 218.69 459.29 199.29C459.45 173.01 342.3 123.06 150.27 115.73L198.63 0C355.49 14.64 575.3 75.04 575.59 193.96Z" fill="#024EC1"/>
      </svg>'
    ;
  }

  public function get_base64_logo()
  {
    $logo_text = $this->get_dealfront_svg();
    $encoded_logo = base64_encode($logo_text);

    return 'data:image/svg+xml;base64,' . $encoded_logo;
  }
}
