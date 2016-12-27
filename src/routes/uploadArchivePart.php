<?php

$app->post('/api/AmazonGlacier/uploadArchivePart', function ($request, $response, $args) {

    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'region', 'vaultName','uploadId','sourceFile','range']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $credentials = new Aws\Credentials\Credentials($post_data['args']['apiKey'], $post_data['args']['apiSecret']);

    $client = new Aws\Glacier\GlacierClient([
        'version' => 'latest',
        'region' => $post_data['args']['region'],
        'credentials' => $credentials
    ]);

    $body['vaultName'] = $post_data['args']['vaultName'];
    $body['uploadId'] = $post_data['args']['uploadId'];
    $body['body'] = $post_data['args']['sourceFile'];
    $body['range'] = $post_data['args']['range'];
    if (!empty($post_data['args']['accountId'])) {
        $body['accountId'] = $post_data['args']['accountId'];
    }
    if (!empty($post_data['args']['archiveDescription'])) {
        $body['archiveDescription'] = $post_data['args']['archiveDescription'];
    }
    if (!empty($post_data['args']['checksum'])) {
        $body['checksum'] = $post_data['args']['checksum'];
    }
    if (!empty($post_data['args']['contentSHA256'])) {
        $body['contentSHA256'] = $post_data['args']['contentSHA256'];
    }

    try {
        $res = $client->uploadMultipartPart($body)->toArray();

        $result['callback'] = 'success';
        $result['contextWrites']['to'] = is_array($res) ? $res : json_decode($res);
        if (empty($result['contextWrites']['to'])) {
            $result['contextWrites']['to']['status_msg'] = "Api return no results";
        }
    } catch (Aws\Glacier\Exception\GlacierException $e) {
        // Catch an Glacier specific exception.
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $e->getMessage();
    } catch (\Exception $e) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $e->getMessage();
    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
