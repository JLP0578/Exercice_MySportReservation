# **Liste attaques**
## **Injection SQL**
L'injection SQL est une attaque dans laquelle un attaquant exploite une faille de sécurité pour injecter des commandes SQL malveillantes dans une base de données. Par exemple, si un site Web utilise une requête SQL pour interroger une base de données, un attaquant peut utiliser l'injection SQL pour modifier la requête et accéder à des données sensibles, telles que les informations d'identification des utilisateurs.

### Logiciels
> SQLMap, Jsql, Sqlninja

## **Cross-site scripting (XSS)**
Le cross##site scripting (XSS) est une attaque dans laquelle un attaquant injecte du code malveillant dans une page Web, qui est ensuite exécuté par le navigateur de la victime. Par exemple, un attaquant peut injecter du code JavaScript dans un champ de formulaire qui est ensuite exécuté lorsque l'utilisateur soumet le formulaire, ce qui permet à l'attaquant d'accéder à des données sensibles de l'utilisateur.
### Logiciels
> DOM XSS Scanner, Xsser, XSStrike

## **Cross-site request forgery (CSRF)**
Le Cross##site request forgery (CSRF) est une attaque dans laquelle un attaquant utilise un site Web légitime pour envoyer une requête malveillante à un autre site Web sans que l'utilisateur en ait conscience. Par exemple, un attaquant peut envoyer une requête pour effectuer une transaction bancaire sur un site Web en exploitant une session active sur un autre site Web.
### Logiciels
> OWASP Zed Attack Proxy (ZAP), Burp Suite

## **Attaques par force brute**
Les attaques par force brute sont des attaques qui tentent de deviner des mots de passe ou des clés de chiffrement en essayant toutes les combinaisons possibles. Par exemple, un attaquant peut utiliser une attaque par force brute pour tenter de deviner le mot de passe d'un compte utilisateur en essayant toutes les combinaisons possibles de caractères.
### Logiciels
> THC Hydra, Ncrack, Medusa, Burp Suite, John the Ripper, Hashcat

## **Clickjacking**
Le clickjacking est une attaque dans laquelle un attaquant utilise des techniques de superposition pour masquer des éléments d'une page Web et tromper les utilisateurs pour qu'ils cliquent sur des éléments malveillants. Par exemple, un attaquant peut cacher un bouton malveillant sous un bouton légitime et amener les utilisateurs à cliquer sur le bouton malveillant.
### Logiciels
> BeEF, OWASP Zed Attack Proxy (ZAP)

## **Déni de service (DoS)**
Les attaques de déni de service (DoS) sont des attaques qui visent à rendre un site Web inaccessible en inondant le serveur avec un grand nombre de requêtes. Par exemple, un attaquant peut utiliser un botnet pour envoyer un grand nombre de requêtes simultanées à un site Web, ce qui peut entraîner une surcharge du serveur et le rendre inaccessible aux utilisateurs légitimes.
### Logiciels
> LOIC (Low Orbit Ion Cannon), HOIC (High Orbit Ion Cannon), Slowloris, Xerxes, SYN Flood, UDP Flood

## **Man-in-the-middle (MITM)**
L'attaque de l'homme du milieu (MITM) est une attaque dans laquelle un attaquant intercepte la communication entre deux parties pour obtenir des informations sensibles. Par exemple, un attaquant peut se positionner entre un utilisateur et un site Web et intercepter toutes les données qui transitent entre les deux parties, y compris les informations d'identification.
### Logiciels
> Ettercap, SSLstrip, Wireshark

## **DNS Spoofing**
Le DNS Spoofing est est une attaque dans laquelle un attaquant modifie les enregistrements DNS (Domain Name System) d'un utilisateur pour rediriger son trafic vers un site Web malveillant. Par exemple, un attaquant peut utiliser une attaque de phishing pour obtenir les informations d'identification d'un utilisateur, puis modifier les enregistrements DNS de son ordinateur pour rediriger son trafic vers un site Web malveillant. Cette attaque est également connue sous le nom de DNS cache poisoning.
### Logiciels
> Ettercap, Cain & Abel, DNSChef, dnsspoof, mitmproxy 

## **Pharming**
Le pharming est une attaque dans laquelle un attaquant modifie le système de noms de domaine (DNS) d'un utilisateur pour rediriger son trafic vers un site Web malveillant. Par exemple, un attaquant peut utiliser une attaque de phishing pour obtenir les informations d'identification d'un utilisateur, puis modifier les enregistrements DNS de son ordinateur pour rediriger son trafic vers un site Web malveillant.
### Logiciels
> GRC's DNS Benchmark, DNS Spoofing

## **Atténuation de l'analyse**
L'atténuation de l'analyse est une technique utilisée par les attaquants pour masquer leur activité malveillante. Par exemple, un attaquant peut utiliser des techniques d'obscurcissement pour masquer les commandes malveillantes qu'il envoie à un site Web.
### Logiciels
> Shikata Ga Nai Encoder, Obfuscapk

## **Attaques DDoS**
Les attaques de déni de service distribué (DDoS) sont des attaques qui utilisent de nombreux ordinateurs pour envoyer des requêtes simultanées à un site Web, ce qui peut entraîner une surcharge du serveur et le rendre inaccessible aux utilisateurs légitimes.
### Logiciels
> LOIC, HOIC, Xerxes

## **Défaillance de l'authentification**
La défaillance de l'authentification est une attaque dans laquelle un attaquant parvient à contourner les mécanismes d'authentification d'un site Web pour accéder à des données sensibles ou effectuer des actions malveillantes. Par exemple, un attaquant peut utiliser des techniques d'ingénierie sociale pour obtenir les informations d'identification d'un utilisateur et accéder à son compte.
### Logiciels
> Hydra, Burp Suite, OWASP Zed Attack Proxy (ZAP)

## **Défaillance de l'autorisation**
La défaillance de l'autorisation est une attaque dans laquelle un attaquant parvient à contourner les mécanismes d'autorisation d'un site Web pour accéder à des ressources ou effectuer des actions malveillantes auxquelles il n'est pas autorisé. Par exemple, un attaquant peut utiliser une injection SQL pour modifier les autorisations d'un utilisateur et lui donner un accès qu'il n'est pas censé avoir.
### Logiciels
> Burp Suite, OWASP Zed Attack Proxy (ZAP)

## **Falsification de requête intersite (CSRF)**
La falsification de requête intersite (CSRF) est une attaque dans laquelle un attaquant utilise un site Web légitime pour envoyer une requête malveillante à un autre site Web sans que l'utilisateur en ait conscience. Cette attaque est similaire au Cross##Site Request Forgery, mais elle implique des requêtes qui sont envoyées via des formulaires sur des sites Web légitimes.
### Logiciels
> Burp Suite, OWASP Zed Attack Proxy (ZAP)

## **Hameçonnage (Phishing)**
Le hameçonnage est une attaque dans laquelle un attaquant utilise des techniques d'ingénierie sociale pour tromper les utilisateurs et les amener à divulguer des informations sensibles, telles que des informations d'identification ou des données de carte de crédit. Par exemple, un attaquant peut envoyer un e##mail prétendant provenir d'une banque légitime et demandant à l'utilisateur de se connecter à son compte pour vérifier des informations, puis capturer les informations d'identification de l'utilisateur lorsqu'il se connecte à un site Web malveillant.
### Logiciels
> SET, Gophish, SocialFish

## **Click fraud**
l'attaque consiste à générer de faux clics sur des publicités en ligne dans le but de générer des revenus publicitaires illégitimes.
## **Eavesdropping**
cette attaque consiste à intercepter les communications entre un utilisateur et un serveur web pour obtenir des informations sensibles telles que les informations d'identification ou les données de carte de crédit.
## **Insecure Cryptographic Storage**
cette attaque consiste à exploiter les failles de sécurité dans les algorithmes de chiffrement pour accéder aux données sensibles stockées sur un serveur web.
## **Malvertising**
cette attaque consiste à insérer des publicités malveillantes sur des sites web légitimes pour infecter les ordinateurs des utilisateurs avec des logiciels malveillants.
## **Cookie theft**
cette attaque consiste à voler les cookies de session des utilisateurs pour accéder à leurs comptes sur des sites web légitimes.
## **Session hijacking**
cette attaque consiste à intercepter la session active d'un utilisateur sur un site web pour accéder à ses informations sensibles.
## **Credential stuffing**
cette attaque consiste à utiliser des informations d'identification volées à partir d'une source pour tenter de se connecter à d'autres comptes en ligne de la même personne.
## **Fingerprinting**
cette attaque consiste à collecter des informations sur le navigateur web et le système d'exploitation d'un utilisateur pour identifier des vulnérabilités spécifiques à exploiter.
## **Watering hole attack**
cette attaque consiste à infecter des sites web légitimes fréquentés par des utilisateurs cibles avec des logiciels malveillants.
## **XML External Entity (XXE)**
cette attaque consiste à exploiter les vulnérabilités de traitement XML pour exécuter des commandes malveillantes sur le serveur.
