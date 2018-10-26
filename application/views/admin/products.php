<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Produtos</h1>
    </div>
</div>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Produtos
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Sku</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($products as $idx=>$product): ?>
                        <tr class="odd gradeX">
                            <td><a href="/admin/products/edit/<?php echo $product['id']?>"><?php echo str_pad($product['sku'], 5, "0", STR_PAD_LEFT)?></a></td>
                            <td><?php echo $product['name']?></td>
                            <td>R$ <?php echo $product['price']?></td>
                            <td><a href="/admin/products/remove/<?php echo $product['id'] ?>"><i class="fa fa-trash fa-fw"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->