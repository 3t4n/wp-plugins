<?php
foreach ($this->alerts as $alert) {
    $classes = "";
    switch ($alert["type"]) {
        case "success":
            $classes = "text-green-500 bg-green-200";
            break;
        case "danger":
            $classes = "text-red-500 bg-red-200";
            break;
        case "warning":
            $classes = "text-orange-500 bg-orange-200";
            break;
        case "info":
            $classes = "text-blue-500 bg-blue-200";
            break;
        default:
            $classes = "text-gray-500 bg-gray-200";
    }
?>
    <div class="relative flex items-center mx-auto max-w-4xl px-3 py-2 mb-4 text-sm rounded <?php echo $classes; ?>"><?php echo esc_html($alert["content"]); ?></div>
<?php
}
?>