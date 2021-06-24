<?php

/**
 * ob_start() to begin processing html string
 * 
 * 
 * This page would represent an items.
 * 
 * html.php page path that is passed through render() 
 * along with needed $variables.
 * 
 * $VariablePassedThroughRender
 * 
 * 
 */

//

?>


<!-- HTML with PHP echos -->
<div class="container">
    <div class="row">
        <?= $VariablePassedThroughRender['bddColumnName'] ?>
        <?= $VariablePassedThroughRender['bddColumnName2'] ?>
        <?= $VariablePassedThroughRender['bddColumnName3'] ?>
    </div>
</div>

<!-- ob_get_clean(); to fnish this page store it 
in a variable and pass it on as main page content. -->