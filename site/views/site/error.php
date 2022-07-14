<?php

$this->title = "Error {$this->errCode}";
?>
<h1>Error <?= $this->errCode ?> !</h1>
<div class="alert alert-danger" style=""> <?= $this->errText ?> </div>