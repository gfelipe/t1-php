<style>
    textarea {
        border: 1px solid #ccc;
        border-radius: 4px;
        width:100%;

        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
</style>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                Informações do produto
            </div>
            <div class="panel-body">
                <?php echo form_error('sku', '<div class="validation-error">', '</div>'); ?>
                <div class="form-group">
                    <label for="sku">Sku</label>
                    <input type="text" class="form-control" id="sku" name="sku" placeholder="Sku" value="<?php echo isset($product['sku']) ? $product['sku'] : NULL ?>">
                </div>
                <?php echo form_error('name', '<div class="validation-error">', '</div>'); ?>
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="<?php echo isset($product['name']) ? $product['name'] : NULL ?>">
                </div>
                <?php echo form_error('price', '<div class="validation-error">', '</div>'); ?>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Preço" value="<?php echo isset($product['price']) ? $product['price'] : NULL?>">
                </div>
                <?php echo form_error('description', '<div class="validation-error">', '</div>'); ?>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" rows="10" placeholder="Descrição"><?php echo isset($product['description']) ? $product['description'] : NULL?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Imagem 1</label>
                    <input type="file" class="form-control-file" id="image-1" name="image-1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Imagem 2</label>
                    <input type="file" class="form-control-file" id="image-1" name="image-1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Imagem 3</label>
                    <input type="file" class="form-control-file" id="image-1" name="image-1">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->