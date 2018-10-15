<section class="header6 cid-qyXAPsqKdO" id="header6-5c" data-rv-view="2431">
    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-md-8 align-center">

                <h2 class="mbr-section-title align-center mbr-fonts-style mbr-bold mbr-white display-1">Produtos</h2>
            </div>
        </div>
    </div>
</section>

<section class="mbr-gallery cid-qyXC3wOLIJ" once="shops" id="shop2-5h" data-rv-view="2472">
    <div>
        <div class="mbr-shop"><!-- Shop Gallery -->
            <div class="row col-md-12">
                <div class="wrapper-shop-items col-md-12">
                    <div class="mbr-gallery-row">
                        <div>
                            <div class="shop-items">
                                <?php foreach($products as $idx=>$product): ?>
                                <div class="mbr-gallery-item">
                                    <div class="item_overlay" data-toggle="modal"></div>
                                    <div class="galleryItem" data-toggle="modal">
                                        <div class="style_overlay"></div>
                                        <div class="img_wraper"><img alt="" src="<?php echo $product['image']?>"></div>
                                        <span class="onsale mbr-fonts-style display-7" data-onsale="false" style="display: none;">-50%</span>
                                        <div class="sidebar_wraper">
                                            <h4 class="item-title mbr-fonts-style mbr-text display-5"><?php echo $product['name']?></h4>
                                            <div class="price-block"><span
                                                        class="shop-item-price mbr-fonts-style display-5">R$ <?php echo $product['price']?></span><span
                                                        class="oldprice mbr-fonts-style display-7"
                                                        style="display: none;">$192</span></div>
                                            <?php echo $product['description']?>
                                            <div class="mbr-section-btn" buttons="0" style="display: none;">
                                                <a class="btn btn-black display-7" href="/product/<?php echo $product['id']?>/buy">Comprar!</a>
                                                <a class="btn btn-yellow display-7" href="/products/<?php echo $product['id']?>/favorite">Favoritar!</a>
                                            </div>
                                            <div class="mbr-section-btn" buttons="0" style="display: none;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div><!-- Lightbox -->
            <div class="shopItemsModal_wraper" style="z-index: 100;">
                <div class="shopItemsModalBg"></div>
                <div class="shopItemsModal row">
                    <div class="col-md-6 image-modal"></div>
                    <div class="col-md-6 text-modal"></div>
                    <div class="closeModal">
                        <div class="close-modal-wrapper"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>