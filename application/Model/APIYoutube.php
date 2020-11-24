<?php

namespace Projeto\Model;

use Google_Client;
use Google_Service_YouTube;
use Google_Service_Exception;
use Google_Exception;

class APIYoutube {

    private $DEVELOPER_KEY = 'AIzaSyCq8iYCeZKk-S5yD9MgtTyqOxjf6Nax3eU';

    public function searchVideosByTherm($searchTerm, $maxResults)
    {           
        $clientGoogle = new Google_Client();
        $clientGoogle->setDeveloperKey($this->DEVELOPER_KEY);
        $youtube = new Google_Service_YouTube($clientGoogle);
        $error = "";

        if (isset($searchTerm) && isset($maxResults)) {
            try {
                
                $searchResponse = $youtube->search->listSearch('id,snippet', array(
                    'type' => 'video',
                    'q' => $searchTerm,
                    'maxResults' => $maxResults,
                ));
            
                $videoResults = array();
                
                foreach ($searchResponse['items'] as $searchResult) {
                    array_push($videoResults, $searchResult['id']['videoId']);
                }

                $videoIds = join(',', $videoResults);
            
                $videosResponse = $youtube->videos->listVideos('snippet, contentDetails, player', array(
                    'id' => $videoIds,
                ));

                return $videosResponse;

            } catch (Google_Service_Exception $e) {
                $error .= sprintf('<p>A service error occurred: <code>%s</code></p>',
                htmlspecialchars($e->getMessage()));
                // echo $error;
                return [];

            } catch (Google_Exception $e) {
                $error .= sprintf('<p>An client error occurred: <code>%s</code></p>',
                htmlspecialchars($e->getMessage()));
                // echo $error;
                return [];
            }
        }
    }

    public function simulaResponse(){
        $str = '{
            "kind": "youtube#videoListResponse",
            "etag": "HyEcjOrIJ4Rwtzu-a_Ie0IpFeno",
            "items": [
              
              {
                "kind": "youtube#video",
                "etag": "TT7iJKOoUkoVsZCYQ8uS2DE9ays",
                "id": "UaqoTCiZSCU",
                "snippet": {
                  "publishedAt": "2020-11-21T02:06:48Z",
                  "channelId": "UC4ncvgh5hFr5O83MH7-jRJg",
                  "title": "FELIPE TORRES (HERMES E RENATO) - Flow Podcast #259",
                  "description": "VIRE MEMBRO DA NOSSA PLATAFORMA PRÓPRIA!\nhttps://flowpodcast.com.br/membros\n\nPARTICIPE DO NOSSO CHAT AO VIVO, FAÇA PARTE DO NOSSO CLUBE DE CANAIS\nhttps://www.youtube.com/channel/UC4ncvgh5hFr5O83MH7-jRJg/join\n\nCAIXA POSTAL: 78107 | CEP: 01543-001 | São Paulo - SP\n\nEXITLAG\nhttp://bit.ly/ExitLagFlow\n\nCORTES DO FLOW\nhttps://www.youtube.com/cortesdoflow\n\nFLOW POOP\nhttps://www.youtube.com/channel/UC_vCmODMFq9pYyiY2wZVsIQ\n\nAQUELE FLAU\nhttps://www.youtube.com/channel/UCopNlF81S59R5sE2jYxGz2A\n\ne-mail comercial: contato@flowpodcast.com.br\n\n---------\n\nFELIPE TORRES \n@felipefagundestorres\n\n---------\n\nFlow Podcast é uma conversa descontraída, longa e livre, como um papo de boteco entre amigos. No Flow garantimos um espaço onde o convidado pode desenvolver suas ideias sem qualquer tipo de pauta ou as restrições normais de outras mídias, como agenda política/filosófica. \n\n ----------\n\nAGENDA SEMANAL SEMPRE NO TWITTER E INSTAGRAM\n@flowpdc\n\nVOCÊ PODE ESCUTAR A GRAVAÇÃO DO FLOW EM NOSSO SITE:\nhttps://flowpodcast.com.br/\n\nDISCORD FLOWERS DO FLOW:\nhttps://discord.gg/Fuj5p4d\n\n----------\n\nANFITRIÕES: \nMonark - Twitter @monark\n               - Instagram @monarkoficial\n\nIgor 3K - Twitter @igor_3k\n              - Instagram @igor.3k\n\nDIREÇÃO/PRODUÇÃO:\nGianzão - Instagram @gianlucajux\n                - Twitter @gianlucajux\n\nASSESSORIA/PRODUÇÃO EXECUTIVA:\nSerginho - Instagram @omofrau\n                - Twitter @omofrau",
                  "thumbnails": {
                    "default": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/default.jpg",
                      "width": 120,
                      "height": 90
                    },
                    "medium": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/mqdefault.jpg",
                      "width": 320,
                      "height": 180
                    },
                    "high": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/hqdefault.jpg",
                      "width": 480,
                      "height": 360
                    },
                    "standard": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/sddefault.jpg",
                      "width": 640,
                      "height": 480
                    },
                    "maxres": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/maxresdefault.jpg",
                      "width": 1280,
                      "height": 720
                    }
                  },
                  "channelTitle": "Flow Podcast",
                  "tags": [
                    "flowpodcast777",
                    "FLOW",
                    "FLOW PODCAST",
                    "PODCAST",
                    "MONARK",
                    "IGOR",
                    "3K",
                    "IGOR3K",
                    "GIANZÃO",
                    "GIANLUCAJUX",
                    "flow",
                    "Flow",
                    "Melhor Podcast",
                    "ouvir podcast",
                    "podcast brasileiro"
                  ],
                  "categoryId": "22",
                  "liveBroadcastContent": "none",
                  "localized": {
                    "title": "FELIPE TORRES (HERMES E RENATO) - Flow Podcast #259",
                    "description": "VIRE MEMBRO DA NOSSA PLATAFORMA PRÓPRIA!\nhttps://flowpodcast.com.br/membros\n\nPARTICIPE DO NOSSO CHAT AO VIVO, FAÇA PARTE DO NOSSO CLUBE DE CANAIS\nhttps://www.youtube.com/channel/UC4ncvgh5hFr5O83MH7-jRJg/join\n\nCAIXA POSTAL: 78107 | CEP: 01543-001 | São Paulo - SP\n\nEXITLAG\nhttp://bit.ly/ExitLagFlow\n\nCORTES DO FLOW\nhttps://www.youtube.com/cortesdoflow\n\nFLOW POOP\nhttps://www.youtube.com/channel/UC_vCmODMFq9pYyiY2wZVsIQ\n\nAQUELE FLAU\nhttps://www.youtube.com/channel/UCopNlF81S59R5sE2jYxGz2A\n\ne-mail comercial: contato@flowpodcast.com.br\n\n---------\n\nFELIPE TORRES \n@felipefagundestorres\n\n---------\n\nFlow Podcast é uma conversa descontraída, longa e livre, como um papo de boteco entre amigos. No Flow garantimos um espaço onde o convidado pode desenvolver suas ideias sem qualquer tipo de pauta ou as restrições normais de outras mídias, como agenda política/filosófica. \n\n ----------\n\nAGENDA SEMANAL SEMPRE NO TWITTER E INSTAGRAM\n@flowpdc\n\nVOCÊ PODE ESCUTAR A GRAVAÇÃO DO FLOW EM NOSSO SITE:\nhttps://flowpodcast.com.br/\n\nDISCORD FLOWERS DO FLOW:\nhttps://discord.gg/Fuj5p4d\n\n----------\n\nANFITRIÕES: \nMonark - Twitter @monark\n               - Instagram @monarkoficial\n\nIgor 3K - Twitter @igor_3k\n              - Instagram @igor.3k\n\nDIREÇÃO/PRODUÇÃO:\nGianzão - Instagram @gianlucajux\n                - Twitter @gianlucajux\n\nASSESSORIA/PRODUÇÃO EXECUTIVA:\nSerginho - Instagram @omofrau\n                - Twitter @omofrau"
                  },
                  "defaultAudioLanguage": "pt"
                },
                "contentDetails": {
                  "duration": "PT2H20M53S",
                  "dimension": "2d",
                  "definition": "hd",
                  "caption": "false",
                  "licensedContent": true,
                  "contentRating": {},
                  "projection": "rectangular"
                },
                "player": {
                  "embedHtml": "\u003ciframe width=\"480\" height=\"270\" src=\"//www.youtube.com/embed/UaqoTCiZSCU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen\u003e\u003c/iframe\u003e"
                }
              },
              {
                "kind": "youtube#video",
                "etag": "TT7iJKOoUkoVsZCYQ8uS2DE9ays",
                "id": "UaqoTCiZSCU",
                "snippet": {
                  "publishedAt": "2020-11-21T02:06:48Z",
                  "channelId": "UC4ncvgh5hFr5O83MH7-jRJg",
                  "title": "FELIPE TORRES (HERMES E RENATO) - Flow Podcast #259",
                  "description": "VIRE MEMBRO DA NOSSA PLATAFORMA PRÓPRIA!\nhttps://flowpodcast.com.br/membros\n\nPARTICIPE DO NOSSO CHAT AO VIVO, FAÇA PARTE DO NOSSO CLUBE DE CANAIS\nhttps://www.youtube.com/channel/UC4ncvgh5hFr5O83MH7-jRJg/join\n\nCAIXA POSTAL: 78107 | CEP: 01543-001 | São Paulo - SP\n\nEXITLAG\nhttp://bit.ly/ExitLagFlow\n\nCORTES DO FLOW\nhttps://www.youtube.com/cortesdoflow\n\nFLOW POOP\nhttps://www.youtube.com/channel/UC_vCmODMFq9pYyiY2wZVsIQ\n\nAQUELE FLAU\nhttps://www.youtube.com/channel/UCopNlF81S59R5sE2jYxGz2A\n\ne-mail comercial: contato@flowpodcast.com.br\n\n---------\n\nFELIPE TORRES \n@felipefagundestorres\n\n---------\n\nFlow Podcast é uma conversa descontraída, longa e livre, como um papo de boteco entre amigos. No Flow garantimos um espaço onde o convidado pode desenvolver suas ideias sem qualquer tipo de pauta ou as restrições normais de outras mídias, como agenda política/filosófica. \n\n ----------\n\nAGENDA SEMANAL SEMPRE NO TWITTER E INSTAGRAM\n@flowpdc\n\nVOCÊ PODE ESCUTAR A GRAVAÇÃO DO FLOW EM NOSSO SITE:\nhttps://flowpodcast.com.br/\n\nDISCORD FLOWERS DO FLOW:\nhttps://discord.gg/Fuj5p4d\n\n----------\n\nANFITRIÕES: \nMonark - Twitter @monark\n               - Instagram @monarkoficial\n\nIgor 3K - Twitter @igor_3k\n              - Instagram @igor.3k\n\nDIREÇÃO/PRODUÇÃO:\nGianzão - Instagram @gianlucajux\n                - Twitter @gianlucajux\n\nASSESSORIA/PRODUÇÃO EXECUTIVA:\nSerginho - Instagram @omofrau\n                - Twitter @omofrau",
                  "thumbnails": {
                    "default": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/default.jpg",
                      "width": 120,
                      "height": 90
                    },
                    "medium": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/mqdefault.jpg",
                      "width": 320,
                      "height": 180
                    },
                    "high": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/hqdefault.jpg",
                      "width": 480,
                      "height": 360
                    },
                    "standard": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/sddefault.jpg",
                      "width": 640,
                      "height": 480
                    },
                    "maxres": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/maxresdefault.jpg",
                      "width": 1280,
                      "height": 720
                    }
                  },
                  "channelTitle": "Flow Podcast",
                  "tags": [
                    "flowpodcast777",
                    "FLOW",
                    "FLOW PODCAST",
                    "PODCAST",
                    "MONARK",
                    "IGOR",
                    "3K",
                    "IGOR3K",
                    "GIANZÃO",
                    "GIANLUCAJUX",
                    "flow",
                    "Flow",
                    "Melhor Podcast",
                    "ouvir podcast",
                    "podcast brasileiro"
                  ],
                  "categoryId": "22",
                  "liveBroadcastContent": "none",
                  "localized": {
                    "title": "FELIPE TORRES (HERMES E RENATO) - Flow Podcast #259",
                    "description": "VIRE MEMBRO DA NOSSA PLATAFORMA PRÓPRIA!\nhttps://flowpodcast.com.br/membros\n\nPARTICIPE DO NOSSO CHAT AO VIVO, FAÇA PARTE DO NOSSO CLUBE DE CANAIS\nhttps://www.youtube.com/channel/UC4ncvgh5hFr5O83MH7-jRJg/join\n\nCAIXA POSTAL: 78107 | CEP: 01543-001 | São Paulo - SP\n\nEXITLAG\nhttp://bit.ly/ExitLagFlow\n\nCORTES DO FLOW\nhttps://www.youtube.com/cortesdoflow\n\nFLOW POOP\nhttps://www.youtube.com/channel/UC_vCmODMFq9pYyiY2wZVsIQ\n\nAQUELE FLAU\nhttps://www.youtube.com/channel/UCopNlF81S59R5sE2jYxGz2A\n\ne-mail comercial: contato@flowpodcast.com.br\n\n---------\n\nFELIPE TORRES \n@felipefagundestorres\n\n---------\n\nFlow Podcast é uma conversa descontraída, longa e livre, como um papo de boteco entre amigos. No Flow garantimos um espaço onde o convidado pode desenvolver suas ideias sem qualquer tipo de pauta ou as restrições normais de outras mídias, como agenda política/filosófica. \n\n ----------\n\nAGENDA SEMANAL SEMPRE NO TWITTER E INSTAGRAM\n@flowpdc\n\nVOCÊ PODE ESCUTAR A GRAVAÇÃO DO FLOW EM NOSSO SITE:\nhttps://flowpodcast.com.br/\n\nDISCORD FLOWERS DO FLOW:\nhttps://discord.gg/Fuj5p4d\n\n----------\n\nANFITRIÕES: \nMonark - Twitter @monark\n               - Instagram @monarkoficial\n\nIgor 3K - Twitter @igor_3k\n              - Instagram @igor.3k\n\nDIREÇÃO/PRODUÇÃO:\nGianzão - Instagram @gianlucajux\n                - Twitter @gianlucajux\n\nASSESSORIA/PRODUÇÃO EXECUTIVA:\nSerginho - Instagram @omofrau\n                - Twitter @omofrau"
                  },
                  "defaultAudioLanguage": "pt"
                },
                "contentDetails": {
                  "duration": "PT2H20M53S",
                  "dimension": "2d",
                  "definition": "hd",
                  "caption": "false",
                  "licensedContent": true,
                  "contentRating": {},
                  "projection": "rectangular"
                },
                "player": {
                  "embedHtml": "\u003ciframe width=\"480\" height=\"270\" src=\"//www.youtube.com/embed/UaqoTCiZSCU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen\u003e\u003c/iframe\u003e"
                }
              },
              {
                "kind": "youtube#video",
                "etag": "TT7iJKOoUkoVsZCYQ8uS2DE9ays",
                "id": "UaqoTCiZSCU",
                "snippet": {
                  "publishedAt": "2020-11-21T02:06:48Z",
                  "channelId": "UC4ncvgh5hFr5O83MH7-jRJg",
                  "title": "FELIPE TORRES (HERMES E RENATO) - Flow Podcast #259",
                  "description": "VIRE MEMBRO DA NOSSA PLATAFORMA PRÓPRIA!\nhttps://flowpodcast.com.br/membros\n\nPARTICIPE DO NOSSO CHAT AO VIVO, FAÇA PARTE DO NOSSO CLUBE DE CANAIS\nhttps://www.youtube.com/channel/UC4ncvgh5hFr5O83MH7-jRJg/join\n\nCAIXA POSTAL: 78107 | CEP: 01543-001 | São Paulo - SP\n\nEXITLAG\nhttp://bit.ly/ExitLagFlow\n\nCORTES DO FLOW\nhttps://www.youtube.com/cortesdoflow\n\nFLOW POOP\nhttps://www.youtube.com/channel/UC_vCmODMFq9pYyiY2wZVsIQ\n\nAQUELE FLAU\nhttps://www.youtube.com/channel/UCopNlF81S59R5sE2jYxGz2A\n\ne-mail comercial: contato@flowpodcast.com.br\n\n---------\n\nFELIPE TORRES \n@felipefagundestorres\n\n---------\n\nFlow Podcast é uma conversa descontraída, longa e livre, como um papo de boteco entre amigos. No Flow garantimos um espaço onde o convidado pode desenvolver suas ideias sem qualquer tipo de pauta ou as restrições normais de outras mídias, como agenda política/filosófica. \n\n ----------\n\nAGENDA SEMANAL SEMPRE NO TWITTER E INSTAGRAM\n@flowpdc\n\nVOCÊ PODE ESCUTAR A GRAVAÇÃO DO FLOW EM NOSSO SITE:\nhttps://flowpodcast.com.br/\n\nDISCORD FLOWERS DO FLOW:\nhttps://discord.gg/Fuj5p4d\n\n----------\n\nANFITRIÕES: \nMonark - Twitter @monark\n               - Instagram @monarkoficial\n\nIgor 3K - Twitter @igor_3k\n              - Instagram @igor.3k\n\nDIREÇÃO/PRODUÇÃO:\nGianzão - Instagram @gianlucajux\n                - Twitter @gianlucajux\n\nASSESSORIA/PRODUÇÃO EXECUTIVA:\nSerginho - Instagram @omofrau\n                - Twitter @omofrau",
                  "thumbnails": {
                    "default": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/default.jpg",
                      "width": 120,
                      "height": 90
                    },
                    "medium": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/mqdefault.jpg",
                      "width": 320,
                      "height": 180
                    },
                    "high": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/hqdefault.jpg",
                      "width": 480,
                      "height": 360
                    },
                    "standard": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/sddefault.jpg",
                      "width": 640,
                      "height": 480
                    },
                    "maxres": {
                      "url": "https://i.ytimg.com/vi/UaqoTCiZSCU/maxresdefault.jpg",
                      "width": 1280,
                      "height": 720
                    }
                  },
                  "channelTitle": "Flow Podcast",
                  "tags": [
                    "flowpodcast777",
                    "FLOW",
                    "FLOW PODCAST",
                    "PODCAST",
                    "MONARK",
                    "IGOR",
                    "3K",
                    "IGOR3K",
                    "GIANZÃO",
                    "GIANLUCAJUX",
                    "flow",
                    "Flow",
                    "Melhor Podcast",
                    "ouvir podcast",
                    "podcast brasileiro"
                  ],
                  "categoryId": "22",
                  "liveBroadcastContent": "none",
                  "localized": {
                    "title": "FELIPE TORRES (HERMES E RENATO) - Flow Podcast #259",
                    "description": "VIRE MEMBRO DA NOSSA PLATAFORMA PRÓPRIA!\nhttps://flowpodcast.com.br/membros\n\nPARTICIPE DO NOSSO CHAT AO VIVO, FAÇA PARTE DO NOSSO CLUBE DE CANAIS\nhttps://www.youtube.com/channel/UC4ncvgh5hFr5O83MH7-jRJg/join\n\nCAIXA POSTAL: 78107 | CEP: 01543-001 | São Paulo - SP\n\nEXITLAG\nhttp://bit.ly/ExitLagFlow\n\nCORTES DO FLOW\nhttps://www.youtube.com/cortesdoflow\n\nFLOW POOP\nhttps://www.youtube.com/channel/UC_vCmODMFq9pYyiY2wZVsIQ\n\nAQUELE FLAU\nhttps://www.youtube.com/channel/UCopNlF81S59R5sE2jYxGz2A\n\ne-mail comercial: contato@flowpodcast.com.br\n\n---------\n\nFELIPE TORRES \n@felipefagundestorres\n\n---------\n\nFlow Podcast é uma conversa descontraída, longa e livre, como um papo de boteco entre amigos. No Flow garantimos um espaço onde o convidado pode desenvolver suas ideias sem qualquer tipo de pauta ou as restrições normais de outras mídias, como agenda política/filosófica. \n\n ----------\n\nAGENDA SEMANAL SEMPRE NO TWITTER E INSTAGRAM\n@flowpdc\n\nVOCÊ PODE ESCUTAR A GRAVAÇÃO DO FLOW EM NOSSO SITE:\nhttps://flowpodcast.com.br/\n\nDISCORD FLOWERS DO FLOW:\nhttps://discord.gg/Fuj5p4d\n\n----------\n\nANFITRIÕES: \nMonark - Twitter @monark\n               - Instagram @monarkoficial\n\nIgor 3K - Twitter @igor_3k\n              - Instagram @igor.3k\n\nDIREÇÃO/PRODUÇÃO:\nGianzão - Instagram @gianlucajux\n                - Twitter @gianlucajux\n\nASSESSORIA/PRODUÇÃO EXECUTIVA:\nSerginho - Instagram @omofrau\n                - Twitter @omofrau"
                  },
                  "defaultAudioLanguage": "pt"
                },
                "contentDetails": {
                  "duration": "PT2H20M53S",
                  "dimension": "2d",
                  "definition": "hd",
                  "caption": "false",
                  "licensedContent": true,
                  "contentRating": {},
                  "projection": "rectangular"
                },
                "player": {
                  "embedHtml": "\u003ciframe width=\"480\" height=\"270\" src=\"//www.youtube.com/embed/UaqoTCiZSCU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen\u003e\u003c/iframe\u003e"
                }
              },
              {
                "kind": "youtube#video",
                "etag": "tR__25JyU0LeMYWsF_c90FhdoHg",
                "id": "UgMi4rIL3-w",
                "snippet": {
                  "publishedAt": "2020-11-20T01:54:05Z",
                  "channelId": "UC4ncvgh5hFr5O83MH7-jRJg",
                  "title": "ECOLOGYK - Flow Podcast #258",
                  "description": "Ecologyk é um produtor musical brabo e você provavelmente já ouviu algum som produzido por ele.\n\nVIRE MEMBRO DA NOSSA PLATAFORMA PRÓPRIA!\nhttps://flowpodcast.com.br/membros\n\nPARTICIPE DO NOSSO CHAT AO VIVO, FAÇA PARTE DO NOSSO CLUBE DE CANAIS\nhttps://www.youtube.com/channel/UC4ncvgh5hFr5O83MH7-jRJg/join\n\nCAIXA POSTAL: 78107 | CEP: 01543-001 | São Paulo - SP\n\nEXITLAG\nhttp://bit.ly/ExitLagFlow\n\nCORTES DO FLOW\nhttps://www.youtube.com/cortesdoflow\n\nFLOW POOP\nhttps://www.youtube.com/channel/UC_vCmODMFq9pYyiY2wZVsIQ\n\nAQUELE FLAU\nhttps://www.youtube.com/channel/UCopNlF81S59R5sE2jYxGz2A\n\ne-mail comercial: contato@flowpodcast.com.br\n\n---------\n\nECOLOGYK\n@ecologyk\n\nASFALTO REC\nhttps://www.youtube.com/c/AsfaltoRec/\n\n---------\n\nFlow Podcast é uma conversa descontraída, longa e livre, como um papo de boteco entre amigos. No Flow garantimos um espaço onde o convidado pode desenvolver suas ideias sem qualquer tipo de pauta ou as restrições normais de outras mídias, como agenda política/filosófica. \n\n ----------\n\nAGENDA SEMANAL SEMPRE NO TWITTER E INSTAGRAM\n@flowpdc\n\nVOCÊ PODE ESCUTAR A GRAVAÇÃO DO FLOW EM NOSSO SITE:\nhttps://flowpodcast.com.br/\n\nDISCORD FLOWERS DO FLOW:\nhttps://discord.gg/Fuj5p4d\n\n----------\n\nANFITRIÕES: \nMonark - Twitter @monark\n               - Instagram @monarkoficial\n\nIgor 3K - Twitter @igor_3k\n              - Instagram @igor.3k\n\nDIREÇÃO/PRODUÇÃO:\nGianzão - Instagram @gianlucajux\n                - Twitter @gianlucajux\n\nASSESSORIA/PRODUÇÃO EXECUTIVA:\nSerginho - Instagram @omofrau\n                - Twitter @omofrau",
                  "thumbnails": {
                    "default": {
                      "url": "https://i.ytimg.com/vi/UgMi4rIL3-w/default.jpg",
                      "width": 120,
                      "height": 90
                    },
                    "medium": {
                      "url": "https://i.ytimg.com/vi/UgMi4rIL3-w/mqdefault.jpg",
                      "width": 320,
                      "height": 180
                    },
                    "high": {
                      "url": "https://i.ytimg.com/vi/UgMi4rIL3-w/hqdefault.jpg",
                      "width": 480,
                      "height": 360
                    },
                    "standard": {
                      "url": "https://i.ytimg.com/vi/UgMi4rIL3-w/sddefault.jpg",
                      "width": 640,
                      "height": 480
                    },
                    "maxres": {
                      "url": "https://i.ytimg.com/vi/UgMi4rIL3-w/maxresdefault.jpg",
                      "width": 1280,
                      "height": 720
                    }
                  },
                  "channelTitle": "Flow Podcast",
                  "tags": [
                    "flowpodcast777",
                    "FLOW",
                    "FLOW PODCAST",
                    "PODCAST",
                    "MONARK",
                    "IGOR",
                    "3K",
                    "IGOR3K",
                    "GIANZÃO",
                    "GIANLUCAJUX",
                    "flow",
                    "Flow",
                    "Melhor Podcast",
                    "ouvir podcast",
                    "podcast brasileiro"
                  ],
                  "categoryId": "22",
                  "liveBroadcastContent": "none",
                  "localized": {
                    "title": "ECOLOGYK - Flow Podcast #258",
                    "description": "Ecologyk é um produtor musical brabo e você provavelmente já ouviu algum som produzido por ele.\n\nVIRE MEMBRO DA NOSSA PLATAFORMA PRÓPRIA!\nhttps://flowpodcast.com.br/membros\n\nPARTICIPE DO NOSSO CHAT AO VIVO, FAÇA PARTE DO NOSSO CLUBE DE CANAIS\nhttps://www.youtube.com/channel/UC4ncvgh5hFr5O83MH7-jRJg/join\n\nCAIXA POSTAL: 78107 | CEP: 01543-001 | São Paulo - SP\n\nEXITLAG\nhttp://bit.ly/ExitLagFlow\n\nCORTES DO FLOW\nhttps://www.youtube.com/cortesdoflow\n\nFLOW POOP\nhttps://www.youtube.com/channel/UC_vCmODMFq9pYyiY2wZVsIQ\n\nAQUELE FLAU\nhttps://www.youtube.com/channel/UCopNlF81S59R5sE2jYxGz2A\n\ne-mail comercial: contato@flowpodcast.com.br\n\n---------\n\nECOLOGYK\n@ecologyk\n\nASFALTO REC\nhttps://www.youtube.com/c/AsfaltoRec/\n\n---------\n\nFlow Podcast é uma conversa descontraída, longa e livre, como um papo de boteco entre amigos. No Flow garantimos um espaço onde o convidado pode desenvolver suas ideias sem qualquer tipo de pauta ou as restrições normais de outras mídias, como agenda política/filosófica. \n\n ----------\n\nAGENDA SEMANAL SEMPRE NO TWITTER E INSTAGRAM\n@flowpdc\n\nVOCÊ PODE ESCUTAR A GRAVAÇÃO DO FLOW EM NOSSO SITE:\nhttps://flowpodcast.com.br/\n\nDISCORD FLOWERS DO FLOW:\nhttps://discord.gg/Fuj5p4d\n\n----------\n\nANFITRIÕES: \nMonark - Twitter @monark\n               - Instagram @monarkoficial\n\nIgor 3K - Twitter @igor_3k\n              - Instagram @igor.3k\n\nDIREÇÃO/PRODUÇÃO:\nGianzão - Instagram @gianlucajux\n                - Twitter @gianlucajux\n\nASSESSORIA/PRODUÇÃO EXECUTIVA:\nSerginho - Instagram @omofrau\n                - Twitter @omofrau"
                  },
                  "defaultAudioLanguage": "pt"
                },
                "contentDetails": {
                  "duration": "PT1H58M24S",
                  "dimension": "2d",
                  "definition": "hd",
                  "caption": "false",
                  "licensedContent": true,
                  "contentRating": {},
                  "projection": "rectangular"
                },
                "player": {
                  "embedHtml": "\u003ciframe width=\"480\" height=\"270\" src=\"//www.youtube.com/embed/UgMi4rIL3-w\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen\u003e\u003c/iframe\u003e"
                }
              },
              {
                "kind": "youtube#video",
                "etag": "S2J7YNquuwvevj5ZVsrcoI29Y18",
                "id": "ZCVyTQ1txw8",
                "snippet": {
                  "publishedAt": "2020-11-19T02:26:08Z",
                  "channelId": "UC4ncvgh5hFr5O83MH7-jRJg",
                  "title": "MARCELO TAS - Flow Podcast #257",
                  "description": "Marcelo Tas é um ícone da TV brasileira e sua careca é tão brilhante quanto sua pessoa.\n\nVIRE MEMBRO DA NOSSA PLATAFORMA PRÓPRIA!\nhttps://flowpodcast.com.br/membros\n\nPARTICIPE DO NOSSO CHAT AO VIVO, FAÇA PARTE DO NOSSO CLUBE DE CANAIS\nhttps://www.youtube.com/channel/UC4ncvgh5hFr5O83MH7-jRJg/join\n\nCAIXA POSTAL: 78107 | CEP: 01543-001 | São Paulo - SP\n\nEXITLAG\nhttp://bit.ly/ExitLagFlow\n\nCORTES DO FLOW\nhttps://www.youtube.com/cortesdoflow\n\nFLOW POOP\nhttps://www.youtube.com/channel/UC_vCmODMFq9pYyiY2wZVsIQ\n\nAQUELE FLAU\nhttps://www.youtube.com/channel/UCopNlF81S59R5sE2jYxGz2A\n\ne-mail comercial: contato@flowpodcast.com.br\n\n--------\n\nPROVOCA\nhttps://www.youtube.com/channel/UCKdVW7Np-9l3CM5daYcGEAw\n\n---------\n\nFlow Podcast é uma conversa descontraída, longa e livre, como um papo de boteco entre amigos. No Flow garantimos um espaço onde o convidado pode desenvolver suas ideias sem qualquer tipo de pauta ou as restrições normais de outras mídias, como agenda política/filosófica. \n\n ----------\n\nAGENDA SEMANAL SEMPRE NO TWITTER E INSTAGRAM\n@flowpdc\n\nVOCÊ PODE ESCUTAR A GRAVAÇÃO DO FLOW EM NOSSO SITE:\nhttps://flowpodcast.com.br/\n\nDISCORD FLOWERS DO FLOW:\nhttps://discord.gg/Fuj5p4d\n\n----------\n\nANFITRIÕES: \nMonark - Twitter @monark\n               - Instagram @monarkoficial\n\nIgor 3K - Twitter @igor_3k\n              - Instagram @igor.3k\n\nDIREÇÃO/PRODUÇÃO:\nGianzão - Instagram @gianlucajux\n                - Twitter @gianlucajux\n\nASSESSORIA/PRODUÇÃO EXECUTIVA:\nSerginho - Instagram @omofrau\n                - Twitter @omofrau",
                  "thumbnails": {
                    "default": {
                      "url": "https://i.ytimg.com/vi/ZCVyTQ1txw8/default.jpg",
                      "width": 120,
                      "height": 90
                    },
                    "medium": {
                      "url": "https://i.ytimg.com/vi/ZCVyTQ1txw8/mqdefault.jpg",
                      "width": 320,
                      "height": 180
                    },
                    "high": {
                      "url": "https://i.ytimg.com/vi/ZCVyTQ1txw8/hqdefault.jpg",
                      "width": 480,
                      "height": 360
                    },
                    "standard": {
                      "url": "https://i.ytimg.com/vi/ZCVyTQ1txw8/sddefault.jpg",
                      "width": 640,
                      "height": 480
                    },
                    "maxres": {
                      "url": "https://i.ytimg.com/vi/ZCVyTQ1txw8/maxresdefault.jpg",
                      "width": 1280,
                      "height": 720
                    }
                  },
                  "channelTitle": "Flow Podcast",
                  "tags": [
                    "flowpodcast777",
                    "FLOW",
                    "FLOW PODCAST",
                    "PODCAST",
                    "MONARK",
                    "IGOR",
                    "3K",
                    "IGOR3K",
                    "GIANZÃO",
                    "GIANLUCAJUX",
                    "flow",
                    "Flow",
                    "Melhor Podcast",
                    "ouvir podcast",
                    "podcast brasileiro"
                  ],
                  "categoryId": "22",
                  "liveBroadcastContent": "none",
                  "localized": {
                    "title": "MARCELO TAS - Flow Podcast #257",
                    "description": "Marcelo Tas é um ícone da TV brasileira e sua careca é tão brilhante quanto sua pessoa.\n\nVIRE MEMBRO DA NOSSA PLATAFORMA PRÓPRIA!\nhttps://flowpodcast.com.br/membros\n\nPARTICIPE DO NOSSO CHAT AO VIVO, FAÇA PARTE DO NOSSO CLUBE DE CANAIS\nhttps://www.youtube.com/channel/UC4ncvgh5hFr5O83MH7-jRJg/join\n\nCAIXA POSTAL: 78107 | CEP: 01543-001 | São Paulo - SP\n\nEXITLAG\nhttp://bit.ly/ExitLagFlow\n\nCORTES DO FLOW\nhttps://www.youtube.com/cortesdoflow\n\nFLOW POOP\nhttps://www.youtube.com/channel/UC_vCmODMFq9pYyiY2wZVsIQ\n\nAQUELE FLAU\nhttps://www.youtube.com/channel/UCopNlF81S59R5sE2jYxGz2A\n\ne-mail comercial: contato@flowpodcast.com.br\n\n--------\n\nPROVOCA\nhttps://www.youtube.com/channel/UCKdVW7Np-9l3CM5daYcGEAw\n\n---------\n\nFlow Podcast é uma conversa descontraída, longa e livre, como um papo de boteco entre amigos. No Flow garantimos um espaço onde o convidado pode desenvolver suas ideias sem qualquer tipo de pauta ou as restrições normais de outras mídias, como agenda política/filosófica. \n\n ----------\n\nAGENDA SEMANAL SEMPRE NO TWITTER E INSTAGRAM\n@flowpdc\n\nVOCÊ PODE ESCUTAR A GRAVAÇÃO DO FLOW EM NOSSO SITE:\nhttps://flowpodcast.com.br/\n\nDISCORD FLOWERS DO FLOW:\nhttps://discord.gg/Fuj5p4d\n\n----------\n\nANFITRIÕES: \nMonark - Twitter @monark\n               - Instagram @monarkoficial\n\nIgor 3K - Twitter @igor_3k\n              - Instagram @igor.3k\n\nDIREÇÃO/PRODUÇÃO:\nGianzão - Instagram @gianlucajux\n                - Twitter @gianlucajux\n\nASSESSORIA/PRODUÇÃO EXECUTIVA:\nSerginho - Instagram @omofrau\n                - Twitter @omofrau"
                  },
                  "defaultAudioLanguage": "pt"
                },
                "contentDetails": {
                  "duration": "PT2H45M34S",
                  "dimension": "2d",
                  "definition": "hd",
                  "caption": "false",
                  "licensedContent": true,
                  "contentRating": {},
                  "projection": "rectangular"
                },
                "player": {
                  "embedHtml": "\u003ciframe width=\"480\" height=\"270\" src=\"//www.youtube.com/embed/ZCVyTQ1txw8\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen\u003e\u003c/iframe\u003e"
                }
              }
            ],
            "pageInfo": {
              "totalResults": 3,
              "resultsPerPage": 3
            }
          }';

          $str = '{
            "etag": "krO-hY46x2FPi6qm1egtAO49ErE",
            "eventId": null,
            "kind": "youtube#videoListResponse",
            "nextPageToken": null,
            "prevPageToken": null,
            "visitorId": null,
            "items": [
                {
         "etag":"LqtqoFfaJ2QwLrsrZzUO_vgvD-w",
         "id":"iT6vqeL-ysI",
         "kind":"youtube#video",
         "snippet":{
            "categoryId":"10",
            "channelId":"UCv5emLGrYcQAmbpeFVlzjdg",
            "channelTitle":"Warner Records Vault",
            "defaultAudioLanguage":null,
            "defaultLanguage":null,
            "description":"",
            "liveBroadcastContent":"none",
            "publishedAt":"2009-10-27T01:57:41Z",
            "tags":[
               "Metallica",
               "One",
               "Rock",
               "Metallica - One",
               "Music",
               "Lyrics",
               "Metal",
               "Warner Records",
               "Warner Music",
               "Warner Music Group",
               "Warner Records Vault",
               "Warner",
               "Pop",
               "Hip Hop",
               "Classics",
               "Playlist",
               "1990\u2019s",
               "2000\u2019s",
               "Warner Vault"
            ],
            "title":"Metallica - One (Official Music Video)",
            "thumbnails":{
               "default":{
                  "height":90,
                  "url":"https:\/\/i.ytimg.com\/vi\/iT6vqeL-ysI\/default.jpg",
                  "width":120
               },
               "medium":{
                  "height":180,
                  "url":"https:\/\/i.ytimg.com\/vi\/iT6vqeL-ysI\/mqdefault.jpg",
                  "width":320
               },
               "high":{
                  "height":360,
                  "url":"https:\/\/i.ytimg.com\/vi\/iT6vqeL-ysI\/hqdefault.jpg",
                  "width":480
               },
               "standard":{
                  "height":480,
                  "url":"https:\/\/i.ytimg.com\/vi\/iT6vqeL-ysI\/sddefault.jpg",
                  "width":640
               },
               "maxres":{
                  "height":720,
                  "url":"https:\/\/i.ytimg.com\/vi\/iT6vqeL-ysI\/maxresdefault.jpg",
                  "width":1280
               }
            },
            "localized":{
               "description":"",
               "title":"Metallica - One (Official Music Video)"
            }
         },
         "contentDetails":{
            "caption":"false",
            "definition":"sd",
            "dimension":"2d",
            "duration":"PT7M45S",
            "hasCustomThumbnail":null,
            "licensedContent":false,
            "projection":"rectangular",
            "contentRating":{
               "acbRating":null,
               "agcomRating":null,
               "anatelRating":null,
               "bbfcRating":null,
               "bfvcRating":null,
               "bmukkRating":null,
               "catvRating":null,
               "catvfrRating":null,
               "cbfcRating":null,
               "cccRating":null,
               "cceRating":null,
               "chfilmRating":null,
               "chvrsRating":null,
               "cicfRating":null,
               "cnaRating":null,
               "cncRating":null,
               "csaRating":null,
               "cscfRating":null,
               "czfilmRating":null,
               "djctqRating":null,
               "djctqRatingReasons":null,
               "ecbmctRating":null,
               "eefilmRating":null,
               "egfilmRating":null,
               "eirinRating":null,
               "fcbmRating":null,
               "fcoRating":null,
               "fmocRating":null,
               "fpbRating":null,
               "fpbRatingReasons":null,
               "fskRating":null,
               "grfilmRating":null,
               "icaaRating":null,
               "ifcoRating":null,
               "ilfilmRating":null,
               "incaaRating":null,
               "kfcbRating":null,
               "kijkwijzerRating":null,
               "kmrbRating":null,
               "lsfRating":null,
               "mccaaRating":null,
               "mccypRating":null,
               "mcstRating":null,
               "mdaRating":null,
               "medietilsynetRating":null,
               "mekuRating":null,
               "menaMpaaRating":null,
               "mibacRating":null,
               "mocRating":null,
               "moctwRating":null,
               "mpaaRating":null,
               "mpaatRating":null,
               "mtrcbRating":null,
               "nbcRating":null,
               "nbcplRating":null,
               "nfrcRating":null,
               "nfvcbRating":null,
               "nkclvRating":null,
               "nmcRating":null,
               "oflcRating":null,
               "pefilmRating":null,
               "rcnofRating":null,
               "resorteviolenciaRating":null,
               "rtcRating":null,
               "rteRating":null,
               "russiaRating":null,
               "skfilmRating":null,
               "smaisRating":null,
               "smsaRating":null,
               "tvpgRating":null,
               "ytRating":null
            }
         }
      }
            ],
            "pageInfo": {
                "resultsPerPage": 10,
                "totalResults": 10
            }
        }';

        return json_decode($str, true);
        // return [];
    }
}   