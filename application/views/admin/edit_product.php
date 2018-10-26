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
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $product['name'] ?></h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div style="color: red;">
            <?php echo isset($upload_error) ? $upload_error : "" ?>
        </div>

        <?php echo form_open('/admin/products/update/'.$product['id']); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Informações do produto
            </div>
            <div class="panel-body">
                <input type="hidden" name="id" value="<?php echo isset($product['id']) ? $product['id'] : NULL ?>">
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
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <?php echo form_close(); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Imagens
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach($images as $idx=>$image): ?>
                            <?php echo form_open('/admin/products/remove_image/'.$image['id']); ?>
                            <div class="col-md-2">
                                <div>
                                    <img src="<?php echo $image['src'] ?>" alt="imagem" width="60" height="60" style="margin: 5px;" />
                                </div>
                                <button type="submit" class="btn btn-danger align-center"><i class="fa fa-trash fa-fw"></i></button>
                            </div>
                            <?php echo form_close(); ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px;">
                        <?php echo form_open_multipart('/admin/products/add_image/'.$product['id']); ?>
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->