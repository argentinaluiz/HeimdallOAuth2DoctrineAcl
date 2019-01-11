##  apigility-doctrine-oauth2-acl

    {"username":"johndoe","password":"123456","grant_type":"password","client_id":"testclient","client_secret":"testpass"}


## Curl -  Oauth(Pegar o hash)
    curl -X POST -H 'Content-type: application/json' -H 'Accept: application/json' -d '{"username":"johndoe","password":"123456","grant_type":"password","client_id":"t
    estclient","client_secret":"testpass"}' localhost:8080/oauth

## Curl GET com  Acesso
    curl -H 'Content-type: application/json' -H 'Accept: application/json' -H 'Autorization Bearer c6ac51fc450a198084a017798e3c44512b34e4cd' localhost:8080/produtos
