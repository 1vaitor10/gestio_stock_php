<div class="form-group">
<form class="form-control" action="index.php?controller=usuari&action=modificar" method="post">


<label for="categoria">categoria</label>
<input class="form-control" type="text" name="categoria" value="<?php echo $row["categoria"];?>" id="categoria" required>

<label for="nombre">nombre</label>
<input class="form-control" type="text" name="nombre" value="<?php echo $row["nombre"];?>" id="nombre" required>

<label for="fecha">fecha</label>
<input class="form-control" type="date" name="fecha" value="<?php echo $row["fecha"];?>" id="fecha" required>

<label for="estanteria">estanteria</label>
<input class="form-control" type="text" name="estanteria" value="<?php echo $row["estanteria"];?>" id="estanteria" required>

<label for="imagen">imagen</label>
<input class="form-control" type="text" name="imagen" value="<?php echo $row["imagen"];?>" id="imagen" required>



<input class="form-control" type="submit" value="Modificar">



</form>
</div>