<div class="row justify-content-center align-items-center" style="height:100vh">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create() ?>

                    <div class="form-group">
                        <?= $this->Form->input('username', ['label' => 'E-mail', 'class' => 'form-control']) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('password', ['label' => 'Senha', 'class' => 'form-control']) ?>
                    </div>
                <?= $this->Form->button(__('Acessar'), ['class' => 'btn btn-lg btn-danger']); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
