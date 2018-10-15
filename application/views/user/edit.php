<link rel="stylesheet" href="/assets/css/user-form.css">

<section class="mbr-gallery cid-qyXC3wOLIJ" once="shops" id="shop2-5h" data-rv-view="2472">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Alteração de dados</h2>
                <p>Por favor, informe seus dados</p>
            </div>
            <?php echo form_open('/user/update'); ?>

                <div class="panel">
                    <div class="panel-heading">
                        Informações pessoais
                    </div>
                    <div class="panel-body">
                        <?php echo form_error('name', '<div class="validation-error">', '</div>'); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="<?php echo isset($user['name']) ? $user['name'] : NULL ?>">
                        </div>
                        <?php echo form_error('cpf', '<div class="validation-error">', '</div>'); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Cpf" value="<?php echo isset($user['cpf']) ? $user['cpf'] : NULL?>">
                        </div>
                        <?php echo form_error('birthday', '<div class="validation-error">', '</div>'); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Nascimento" value="<?php echo isset($user['formattedBirthday']) ? $user['formattedBirthday'] : NULL?>">
                        </div>
                        <?php echo form_error('email', '<div class="validation-error">', '</div>'); ?>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo isset($user['email']) ? $user['email'] : NULL?>">
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        Informações de entrega
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="Cep" value="<?php echo isset($user['zipCode']) ? $user['zipCode'] : NULL?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Endereço" readonly value="<?php echo isset($user['address']) ? $user['address'] : NULL?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="number" name="number" placeholder="Número" value="<?php echo isset($user['number']) ? $user['number'] : NULL?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="complement" name="complement" placeholder="Complemento" value="<?php echo isset($user['complement']) ? $user['complement'] : NULL?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Bairro" readonly value="<?php echo isset($user['neighborhood']) ? $user['neighborhood'] : NULL?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" readonly value="<?php echo isset($user['city']) ? $user['city'] : NULL?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="state" name="state" placeholder="Uf" readonly value="<?php echo isset($user['state']) ? $user['state'] : NULL?>">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>

            <?php echo form_close(); ?>
        </div>
    </div>
</section>