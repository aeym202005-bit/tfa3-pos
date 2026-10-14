<?= view('templates/header', ['title' => 'User Management']); ?>

<div class="pos-card">
    <div class="pos-card-header">
        <h2 class="pos-card-title">User Account Records</h2>
        <a href="<?= site_url('/users/new') ?>" class="btn btn-primary btn-sm">Add New User</a>
    </div>

    <table class="pos-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><strong>#<?= esc($user['id']); ?></strong></td>
                        <td>
                            <?php if (!empty($user['avatar'])): ?>
                                <img src="<?= base_url('uploads/' . esc($user['avatar'])) ?>" alt="Avatar" width="40" height="40" style="object-fit: cover; border-radius: 50%;">
                            <?php else: ?>
                                <span class="text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($user['username'] ?? ''); ?></td>
                        <td><?= esc($user['full_name'] ?? ''); ?></td>
                        <td><?= esc($user['email'] ?? ''); ?></td>
                        <td style="text-align: center;">
                            <a href="<?= site_url('/users/edit/' . $user['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= site_url('/users/delete/' . $user['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">No user records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= view('templates/footer'); ?>