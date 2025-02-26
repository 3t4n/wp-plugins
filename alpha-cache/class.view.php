<?php

namespace alpha_cache;

class View {

  private string $template_name;
  private array $variables = [];

  function __construct(string $name) {
    $this->template_name = $name;
  }

  public function setParams(array $vars): View {
    $this->variables = $vars;
    return $this;
  }

  public function render(): string {
    ob_start();
    extract($this->variables, EXTR_SKIP);
    include dirname(__FILE__) . '/templates/' . $this->template_name . '.tpl.php';
    return ob_get_clean();
  }

}
