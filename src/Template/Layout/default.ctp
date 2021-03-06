<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'HoneyDew';
$user = $this->request->session()->read('Auth.User');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?> | <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="/">HoneyDew<sup>&reg;</sup></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
            <?php if($user): ?>
                <li><?=$this->html->link(__('Logout '.$user['firstname'].'?'), ['controller' => 'users', 'action' => 'logout'])?></li>
            <?php else: ?>
                <li><?=$this->html->link(__('Login'), ['controller' => 'users', 'action' => 'login'])?></li>
            <?php endif; ?>
                <li><?=$this->Form->create(null, [
                        'url' => ['controller' => 'Users', 'action' => 'search']
                    ])?>
                    <?=$this->Form->input('UserSearch', 
                    [
                    'placeholder' => 'Search by email, First name, or Last name', 
                    'label' => false
                    ]);?>
                    <?=$this->Form->end() ?>
                </li>
                <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
