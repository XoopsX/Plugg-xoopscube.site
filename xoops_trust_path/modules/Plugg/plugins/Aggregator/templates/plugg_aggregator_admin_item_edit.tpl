<?php
$cancel_link = $this->HTML->createLinkToRemote(
    $this->_('Cancel'),
    'plugg-admin',
    array(
        'path' => '/feed/' . $entity->Feed->getId(),
    ),
    array(
        'params' => array(Plugg::REGION => 'plugg_admin')
    )
);
$form->getSubmitButtons()->addElement($form->createStatic($cancel_link));
?>
<?php $form->display();?>