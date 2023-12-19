<div class="form-group">
<form class="form-control" action="index.php?controller=producte&action=modificar" method="post">

<input class="form-control" type="hidden" name="id" value="<?php echo $row["id"];?>" id="id" required>

<label for="categoria">categoria</label>
<input class="form-control" type="text" name="categoria" value="<?php echo $row["categoria"];?>" id="categoria" required>

<label for="nombre">nombre</label>
<input class="form-control" type="text" name="nombre" value="<?php echo $row["nombre"];?>" id="nombre" required>

<label for="fecha">fecha</label>
<input class="form-control" type="date" name="fecha" value="<?php echo $row["fecha"];?>" id="fecha" required>

<label for="estanteria">estanteria</label>
<input class="form-control" type="text" name="estanteria" value="<?php echo $row["estanteria"];?>" id="estanteria" required>

<label for="Arxivat">Arxivat</label>
<input class="form-control" type="text" name="Arxivat" value="<?php echo $row["Arxivat"];?>" id="Arxivat" required>

<label for="Imagen">Imagen</label>
<input class="form-control" type="text" name="Imagen" value="<?php echo $row["Imagen"];?>" id="Imagen" required>



<input class="form-control" type="submit" value="Modificar">



</form>
</div>