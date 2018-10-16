
<style>
    .table-responsive{width: 100%;}

</style>

<section class="header6 cid-qyXAPsqKdO" id="header6-5c" data-rv-view="2431">
    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-md-8 align-center">

                <h2 class="mbr-section-title align-center mbr-fonts-style mbr-bold mbr-white display-1">Pedidos</h2>
            </div>
        </div>
    </div>
</section>

<section class="mbr-gallery cid-qyXC3wOLIJ" id="shop2-5h">
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Produto</th>
                            <th class="">Data</th>
                            <th class="">Total</th>
                            <th class="">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $idx=>$order): ?>
                            <tr>
                                <td><a href="/user/orders/<?php echo $order['id']?>"><?php echo str_pad($order['id'], 5, "0", STR_PAD_LEFT)?></a></td>
                                <td><?php echo $order['item']?></td>
                                <td><?php echo $order['purchaseDate']?></td>
                                <td>R$ <?php echo $order['amount']?></td>
                                <?php if($order['status'] == "PROCESSING"): ?>
                                    <td><span class="badge badge-secondary">Processando</span></td>
                                <?php elseif($order['status'] == "SHIPPED"): ?>
                                    <td><span class="badge badge-success">Enviado</span></td>
                                <?php else: ?>
                                    <td><span class="badge badge-primary">Novo</span></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>