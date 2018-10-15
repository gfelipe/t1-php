
<section class="header6 cid-qyXAPsqKdO" id="header6-5c" data-rv-view="2431">
    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-md-8 align-center">

                <h2 class="mbr-section-title align-center mbr-fonts-style mbr-bold mbr-white display-1">Pedido</h2>
            </div>
        </div>
    </div>
</section>

<section class="mbr-gallery cid-qyXC3wOLIJ" id="shop2-5h">

    <div class="container">
        <div class="col-xs-1" style="float: left;">
            <h1><small>Pedido #<?php echo str_pad($order['id'], 5, "0", STR_PAD_LEFT)?></small></h1>
        </div>
        <div class="col-xs-1 text-right">
            <h3>
            <?php if($order['status'] == "PROCESSING"): ?>
                <td><span class="badge badge-secondary">Processando</span></td>
            <?php elseif($order['status'] == "SHIPPED"): ?>
                <td><span class="badge badge-success">Enviado</span></td>
            <?php else: ?>
                <td><span class="badge badge-primary">Novo</span></td>
            <?php endif; ?>
            </h3>
        </div>
        <hr>
        <div class="col-xs-5" style="float: left;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Informações pessoais</h4>
                </div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dd><?php echo $user['name'] ?> </dd>
                        <dd id="cpf"><?php echo $user['cpf'] ?> </dd>
                        <dd><?php echo $user['email'] ?> </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-xs-5 text-right">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Endereço de entrega</h4>
                </div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dd><?php echo $order['address'] ?>, <?php echo $order['number'] ?></dd>
                        <dd><?php echo $order['complement'] ?> </dd>
                        <dd id="zipCode"><?php echo $order['zipCode'] ?> </dd>
                        <dd><?php echo $order['neighborhood'] ?>, <?php echo $order['city'] ?> - <?php echo $order['state'] ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><h4>Sku</h4></th>
                <th><h4>Nome</h4></th>
                <th><h4>Quantidade</h4></th>
                <th><h4>Preço</h4></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $item['product_id'] ?></td>
                <td><a href="/product/"><?php echo $item['name'] ?></a></td>
                <td class="text-right">1</td>
                <td class="text-right">R$ <?php echo $item['price'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</section>