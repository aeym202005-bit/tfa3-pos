<?= view('templates/header', ['title' => 'Edit User Account']); ?>

<div class="pos-card" style="max-width: 600px; margin: 0 auto;">
    <div class="pos-card-header">
        <h2 class="pos-card-title">Edit User Account</h2>
    </div>

    <?php if (isset($validation)): ?>
        <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 6px; margin-bottom: 15px;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('/users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div style="margin-bottom: 15px;">
            <label for="username" style="display: block; font-weight: 600; margin-bottom: 5px;">Username</label>
            <input type="text" id="username" name="username" value="<?= esc($user['username']) ?>" style="width: 100%; box-sizing: border-box; padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="full_name" style="display: block; font-weight: 600; margin-bottom: 5px;">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="<?= esc($user['full_name']) ?>" style="width: 100%; box-sizing: border-box; padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: 600; margin-bottom: 5px;">Email Address</label>
            <input type="email" id="email" name="email" value="<?= esc($user['email']) ?>" style="width: 100%; box-sizing: border-box; padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: 600; margin-bottom: 5px;">New Password <span style="font-weight: normal; font-size: 0.85rem; color: #666;">(Leave blank to keep current)</span></label>
            <input type="password" id="password" name="password" style="width: 100%; box-sizing: border-box; padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="avatar" style="display: block; font-weight: 600; margin-bottom: 5px;">Avatar Image</label>
            <?php if (!empty($user['avatar'])): ?>
                <div style="margin-bottom: 8px;">
                    <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" alt="Avatar" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                </div>
            <?php endif; ?>
            <input type="file" id="avatar" name="avatar" style="width: 100%; box-sizing: border-box; padding: 6px; border: 1px solid #ccc; border-radius: 4px; background: #fff;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary" style="background: #2c3e50; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">Update User</button>
            <a href="<?= site_url('/users') ?>" class="btn btn-secondary" style="background: #6c757d; color: white; text-decoration: none; padding: 8px 16px; border-radius: 4px; display: inline-block;">Cancel</a>
        </div>
    </form>
</div>

<?= view('templates/footer'); ?>