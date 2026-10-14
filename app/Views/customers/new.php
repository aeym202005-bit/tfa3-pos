<?= view('templates/header', ['title' => 'Add New Customer']); ?>

<div class="pos-card" style="max-width: 600px; margin: 0 auto;">
    <div class="pos-card-header">
        <h2 class="pos-card-title">Add New Customer</h2>
    </div>

    <?php if (isset($validation)): ?>
        <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 6px; margin-bottom: 15px;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('/customers/create') ?>" method="post">
        <?= csrf_field() ?>

        <div style="margin-bottom: 15px;">
            <label for="full_name" style="display: block; font-weight: 600; margin-bottom: 5px;">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="<?= old('full_name') ?>" style="width: 100%; box-sizing: border-box; padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: 600; margin-bottom: 5px;">Email Address</label>
            <input type="email" id="email" name="email" value="<?= old('email') ?>" style="width: 100%; box-sizing: border-box; padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="phone" style="display: block; font-weight: 600; margin-bottom: 5px;">Phone Number</label>
            <input type="text" id="phone" name="phone" value="<?= old('phone') ?>" style="width: 100%; box-sizing: border-box; padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-success" style="background: #27ae60; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">Save Customer</button>
            <a href="<?= site_url('/customers') ?>" class="btn btn-secondary" style="background: #6c757d; color: white; text-decoration: none; padding: 8px 16px; border-radius: 4px; display: inline-block;">Cancel</a>
        </div>
    </form>
</div>

<?= view('templates/footer'); ?>