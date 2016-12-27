<?php
$routes = [
    'createVault',
    'addTagsToVault',
    'setVaultAccessPolicy',
    'configureVaultNotification',
    'getVaults',
    'getVault',
    'getVaultAccessPolicy',
    'initiateVaultLock',
    'getVaultLock',
    'abortVaultLock',
    'completeVaultLock',
    'getVaultNotifications',
    'getVaultTags',
    'deleteVaultTags',
    'deleteVaultNotifications',
    'deleteVaultAccessPolicy',
    'deleteVault',
    'uploadArchive',
    'deleteArchive',
    'createMultipartUpload',
    'uploadArchivePart',
    'getMultipartUploads',
    'getArchiveParts',
    'abortMultipartUpload',
    'completeMultipartUpload',
    'createJob',
    'getJobs',
    'getSingleJob',
    'downloadJobOutput',
    'setDataRetrievalPolicy',
    'getDataRetrievalPolicy',
    'getAccountProvisionedCapacity',
    'purchaseCapacity',
    'metadata'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

