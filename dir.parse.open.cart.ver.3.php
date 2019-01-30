<?php
/**
 * Парсинг структуры каталогов с x218025.storeland.ru
 * для импорта в OpenCart версии 3
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dirStructureRaw = '{
  "data": "Каталог товаров на сайте",
  "attributes": {
    "id": "root",
    "rel": "root_cat",
    "class": "open"
  },
  "children": [
    {
      "data": "Вентиляция",
      "attributes": {
        "id": "4951169",
        "rel": "cat_visible"
      },
      "children": [
        {
          "data": "БЫТОВАЯ ВЕНТИЛЯЦИЯ",
          "attributes": {
            "id": "4951172",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Бытовая приточная вентиляция",
              "attributes": {
                "id": "5409465",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Приточно-очистительные мультикомплексы",
                  "attributes": {
                    "id": "5409466",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "BALLU 6",
                      "attributes": {
                        "id": "5409469",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Компактные приточно-вытяжные установки 36",
                  "attributes": {
                    "id": "5409467",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Фильтры для приточно-очистительных мультикомплексов 2",
                  "attributes": {
                    "id": "5409468",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Вентиляторы",
              "attributes": {
                "id": "5409480",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Вытяжные бытовые 56",
                  "attributes": {
                    "id": "5409481",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Вытяжные осевые",
                  "attributes": {
                    "id": "5409482",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "BALLU MACHINE 6",
                      "attributes": {
                        "id": "5409484",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "SHUFT 9",
                      "attributes": {
                        "id": "5409488",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Канальные для круглых каналов",
                  "attributes": {
                    "id": "5409483",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "BALLU MACHINE 13",
                      "attributes": {
                        "id": "5409485",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                }
              ]
            },
            {
              "data": "Дополнительные элементы для вентиляторов",
              "attributes": {
                "id": "5409500",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Регуляторы скорости для вентиляторов",
                  "attributes": {
                    "id": "5409501",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "BREVE 3",
                      "attributes": {
                        "id": "5409502",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                }
              ]
            }
          ]
        },
        {
          "data": "Вентиляционные установки",
          "attributes": {
            "id": "4951190",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Все бренды 175",
              "attributes": {
                "id": "4951209",
                "rel": "cat_visible"
              }
            },
            {
              "data": "2VV чехия от 21420р 55",
              "attributes": {
                "id": "4951210",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "2VV JR-M-A 1",
                  "attributes": {
                    "id": "4951245",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV Venus HRV15AC-CF-P-N-NN-54-N-P0 1",
                  "attributes": {
                    "id": "4951256",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV Venus HRV30AC-CF-P-N-NN-54-N-P0 1",
                  "attributes": {
                    "id": "4951396",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV ALFA-C-05SS-DP-2 (без нагревателя) 1",
                  "attributes": {
                    "id": "4951398",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV Venus HRV15AC-CF-P-N-NN-54-R-P0 1",
                  "attributes": {
                    "id": "4951400",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV HR-A-03-V-G4-E-1-60 1",
                  "attributes": {
                    "id": "4951402",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV ALFA-C-10SS-DP-2 (без нагревателя) 1",
                  "attributes": {
                    "id": "4951619",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV Venus HRV30AC-CF-P-N-NN-54-R-P0 1",
                  "attributes": {
                    "id": "4951653",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV ALFA-C-05WC-DP-2 1",
                  "attributes": {
                    "id": "4951654",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV ALFA-C-05VS-DP-2 1",
                  "attributes": {
                    "id": "4951737",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV Venus HRV15AC-CF-P-N-EN-54-R-P0 1",
                  "attributes": {
                    "id": "4951744",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV Venus HRV50AC-CF-P-N-NN-54-N-P0 1",
                  "attributes": {
                    "id": "4951765",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV HR-A-03-V-G4-E-1-90 1",
                  "attributes": {
                    "id": "4951771",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV ALFA-C-05ES-DP-2 1",
                  "attributes": {
                    "id": "4951786",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV ALFA-C-05FS-DP-2 1",
                  "attributes": {
                    "id": "4951802",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV HR-A-05-V-G4-E-1-60 1",
                  "attributes": {
                    "id": "4951815",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV ALFA-C-05EN-DP-2 1",
                  "attributes": {
                    "id": "4951816",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV HR-A-05-V-G4-E-1-90 1",
                  "attributes": {
                    "id": "4951820",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV Venus HRV30AC-CF-P-N-EN-54-R-P0 1",
                  "attributes": {
                    "id": "4952755",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV ALFA-C-10WC-DP-2 1",
                  "attributes": {
                    "id": "4952780",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV ALFA-C-05WS-DP-2 1",
                  "attributes": {
                    "id": "4952835",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "2VV ALFA-C-10VS-DP-2 1",
                  "attributes": {
                    "id": "4952842",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Ballu Machine Италия от 31880р 2",
              "attributes": {
                "id": "4951211",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Ballu Machine BPVS-200 1",
                  "attributes": {
                    "id": "4953085",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ballu Machine BPVS-350 1",
                  "attributes": {
                    "id": "4953122",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ballu Machine BPVS-450 1",
                  "attributes": {
                    "id": "4953159",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ballu Machine BPVS-650 1",
                  "attributes": {
                    "id": "4953213",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Daikin Япония от 49420р 10",
              "attributes": {
                "id": "4951212",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Daikin VAM150FA 1",
                  "attributes": {
                    "id": "4983327",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM150F 1",
                  "attributes": {
                    "id": "4983328",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM150FC 1",
                  "attributes": {
                    "id": "4983329",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM250FA 1",
                  "attributes": {
                    "id": "4983330",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM250F 1",
                  "attributes": {
                    "id": "4989793",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM350FA 1",
                  "attributes": {
                    "id": "4989794",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM250FC 1",
                  "attributes": {
                    "id": "4989795",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM350FC 1",
                  "attributes": {
                    "id": "4992413",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM350FB 1",
                  "attributes": {
                    "id": "4992488",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM500FC 1",
                  "attributes": {
                    "id": "4992555",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM500FB 1",
                  "attributes": {
                    "id": "4992579",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin VAM650FC 1",
                  "attributes": {
                    "id": "4992580",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Dantherm Дания дог цена 18",
              "attributes": {
                "id": "4951213",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Electrolux Швеция от 28700р 6",
              "attributes": {
                "id": "4951214",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Fujitsu 5",
              "attributes": {
                "id": "4951215",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Komfovent 11",
              "attributes": {
                "id": "4951217",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Lessar 164",
              "attributes": {
                "id": "4951218",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Mitsubishi Electric 18",
              "attributes": {
                "id": "4951219",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Mitsubishi Heavy 7",
              "attributes": {
                "id": "4951220",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Ostberg 90",
              "attributes": {
                "id": "4951221",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Ruck 75",
              "attributes": {
                "id": "4951222",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Salda 211",
              "attributes": {
                "id": "4951223",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Vents 114",
              "attributes": {
                "id": "4951224",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Vents МПА 800 В 1",
                  "attributes": {
                    "id": "5055417",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Vents ВПА 100-1,8-1 (LCD) 1",
                  "attributes": {
                    "id": "5055418",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Vents ВПА 150-3,4-1 (LCD) 1",
                  "attributes": {
                    "id": "5055419",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Арктос 54",
              "attributes": {
                "id": "4951225",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аэроблок 15",
              "attributes": {
                "id": "4951227",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Бризарт 216",
              "attributes": {
                "id": "4951228",
                "rel": "cat_visible"
              }
            },
            {
              "data": "ТИОН",
              "attributes": {
                "id": "4951243",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Systemair 51",
              "attributes": {
                "id": "5310378",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Shuft 138",
              "attributes": {
                "id": "5310417",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Hoval 26",
              "attributes": {
                "id": "5311776",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Приточно-вытяжные установки",
              "attributes": {
                "id": "5309383",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Systemair 253",
                  "attributes": {
                    "id": "5309384",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "GlobalVent 84",
                  "attributes": {
                    "id": "5321406",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Hitachi 14",
                  "attributes": {
                    "id": "5321421",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Komfovent 69",
                  "attributes": {
                    "id": "5321424",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Рециркуляционные установки",
              "attributes": {
                "id": "5321759",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Hoval 30",
                  "attributes": {
                    "id": "5321762",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Приточные установки",
              "attributes": {
                "id": "5321764",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "2VV 37",
                  "attributes": {
                    "id": "5321765",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Electrolux 11",
                  "attributes": {
                    "id": "5321777",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "GlobalVent 4",
                  "attributes": {
                    "id": "5321797",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Komfovent",
                  "attributes": {
                    "id": "5321799",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Lessar 65",
                  "attributes": {
                    "id": "5321822",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ostberg 5",
                  "attributes": {
                    "id": "5321850",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ruck 30",
                  "attributes": {
                    "id": "5321857",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Salda 95",
                  "attributes": {
                    "id": "5321859",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Shuft 87",
                  "attributes": {
                    "id": "5321882",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Systemair",
                  "attributes": {
                    "id": "5321912",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "VentMachine 18",
                  "attributes": {
                    "id": "5321942",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Vents",
                  "attributes": {
                    "id": "5321944",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Арктос",
                  "attributes": {
                    "id": "5321945",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Аэроблок",
                  "attributes": {
                    "id": "5321966",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Бризарт 16",
                  "attributes": {
                    "id": "5321967",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тион 4",
                  "attributes": {
                    "id": "5322048",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Вентиляторы",
          "attributes": {
            "id": "4951191",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Ballu Machine 6",
              "attributes": {
                "id": "5309223",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Korf 6",
              "attributes": {
                "id": "5310369",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Lessar 50",
              "attributes": {
                "id": "5310370",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Ostberg 59",
              "attributes": {
                "id": "5310371",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Ruck 68",
              "attributes": {
                "id": "5310372",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Shuft 75",
              "attributes": {
                "id": "5310373",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Systemair 125",
              "attributes": {
                "id": "5310374",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Бытовая приточная вентиляция",
              "attributes": {
                "id": "5410070",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Компактные приточно-вытяжные установки 37",
                  "attributes": {
                    "id": "5410071",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Приточно-очистительные мультикомплексы",
                  "attributes": {
                    "id": "5410073",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "BALLU 6",
                      "attributes": {
                        "id": "5410078",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Фильтры для приточно-очистительных мультикомплексов 2",
                  "attributes": {
                    "id": "5410075",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Вентиляторы",
                  "attributes": {
                    "id": "5410210",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Вытяжные бытовые",
                      "attributes": {
                        "id": "5410211",
                        "rel": "cat_visible"
                      },
                      "children": [
                        {
                          "data": "ELECTROLUX 52",
                          "attributes": {
                            "id": "5410219",
                            "rel": "cat_visible"
                          }
                        }
                      ]
                    },
                    {
                      "data": "Вытяжные осевые",
                      "attributes": {
                        "id": "5410214",
                        "rel": "cat_visible"
                      },
                      "children": [
                        {
                          "data": "BALLU MACHINE 6",
                          "attributes": {
                            "id": "5410220",
                            "rel": "cat_visible"
                          }
                        },
                        {
                          "data": "SHUFT 9",
                          "attributes": {
                            "id": "5410229",
                            "rel": "cat_visible"
                          }
                        }
                      ]
                    },
                    {
                      "data": "Канальные для круглых каналов",
                      "attributes": {
                        "id": "5410216",
                        "rel": "cat_visible"
                      },
                      "children": [
                        {
                          "data": "BALLU MACHINE 13",
                          "attributes": {
                            "id": "5410221",
                            "rel": "cat_visible"
                          }
                        },
                        {
                          "data": "SHUFT 16",
                          "attributes": {
                            "id": "5410238",
                            "rel": "cat_visible"
                          },
                          "children": [
                            {
                              "data": "SHUFT 45",
                              "attributes": {
                                "id": "5409496",
                                "rel": "cat_visible"
                              }
                            }
                          ]
                        }
                      ]
                    }
                  ]
                },
                {
                  "data": "Дополнительные элементы для вентиляторов",
                  "attributes": {
                    "id": "5410223",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Регуляторы скорости для вентиляторов",
                      "attributes": {
                        "id": "5410225",
                        "rel": "cat_visible"
                      },
                      "children": [
                        {
                          "data": "BREVE 3",
                          "attributes": {
                            "id": "5410248",
                            "rel": "cat_visible"
                          }
                        },
                        {
                          "data": "SHUFT 16",
                          "attributes": {
                            "id": "5410256",
                            "rel": "cat_visible"
                          },
                          "children": [
                            {
                              "data": "SHUFT 34",
                              "attributes": {
                                "id": "5409505",
                                "rel": "cat_visible"
                              }
                            }
                          ]
                        }
                      ]
                    }
                  ]
                }
              ]
            },
            {
              "data": "Шумоизолированные",
              "attributes": {
                "id": "5321478",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Lessar 51",
                  "attributes": {
                    "id": "5321479",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ostberg 100",
                  "attributes": {
                    "id": "5350546",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ruck 47",
                  "attributes": {
                    "id": "5350547",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Shuft 29",
                  "attributes": {
                    "id": "5350548",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Systemair 30",
                  "attributes": {
                    "id": "5363026",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Канальные вентиляторы для круглых каналов",
              "attributes": {
                "id": "5362859",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Ballu Machine 3",
                  "attributes": {
                    "id": "5362861",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Korf 6",
                  "attributes": {
                    "id": "5362863",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Lessar 58",
                  "attributes": {
                    "id": "5362864",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ostberg 58",
                  "attributes": {
                    "id": "5362906",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ruck 68",
                  "attributes": {
                    "id": "5362908",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Shuft 75",
                  "attributes": {
                    "id": "5362932",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Systemair 27",
                  "attributes": {
                    "id": "5362955",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Канальные вентиляторы для прямоугольных каналов",
              "attributes": {
                "id": "5362862",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Ballu Machine 13",
                  "attributes": {
                    "id": "5362865",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Korf 42",
                  "attributes": {
                    "id": "5362866",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Lessar 22",
                  "attributes": {
                    "id": "5363010",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ostberg 62",
                  "attributes": {
                    "id": "5363012",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ruck 23",
                  "attributes": {
                    "id": "5363014",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Вентиляторы дымоудаления",
              "attributes": {
                "id": "5362945",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Systemair 35",
                  "attributes": {
                    "id": "5362947",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Взрывозащищенные вентиляторы",
              "attributes": {
                "id": "5362951",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Ostberg 12",
                  "attributes": {
                    "id": "5362952",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Systemair 27",
                  "attributes": {
                    "id": "5362958",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Крышные вентиляторы",
              "attributes": {
                "id": "5362953",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Ballu Machine 5",
                  "attributes": {
                    "id": "5362959",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Korf 14",
                  "attributes": {
                    "id": "5362963",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Lessar 63",
                  "attributes": {
                    "id": "5363890",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ostberg 21",
                  "attributes": {
                    "id": "5363922",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ruck 47",
                  "attributes": {
                    "id": "5363926",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Осевые вентиляторы",
              "attributes": {
                "id": "5362954",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Ballu Machine 12",
                  "attributes": {
                    "id": "5362960",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Korf 6",
                  "attributes": {
                    "id": "5362982",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Центробежные вентиляторы",
              "attributes": {
                "id": "5362957",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Ballu Machine",
                  "attributes": {
                    "id": "5362961",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Electrolux 6",
                  "attributes": {
                    "id": "5362962",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ostberg 27",
                  "attributes": {
                    "id": "5362980",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ruck 4",
                  "attributes": {
                    "id": "5363009",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Водяные нагреватели",
          "attributes": {
            "id": "4951202",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Korf 24",
              "attributes": {
                "id": "5313416",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Systemair 43",
              "attributes": {
                "id": "5313417",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Электрические нагреватели",
          "attributes": {
            "id": "4951203",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Korf 54",
              "attributes": {
                "id": "5313426",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Shuft 28",
              "attributes": {
                "id": "5313427",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Systemair 69",
              "attributes": {
                "id": "5313428",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Арктос 82",
              "attributes": {
                "id": "5313429",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аэроблок 57",
              "attributes": {
                "id": "5313430",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Охладители",
          "attributes": {
            "id": "4951204",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Korf 18",
              "attributes": {
                "id": "5313546",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Mitsubishi Heavy Industries 5",
              "attributes": {
                "id": "5313547",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Systemair 23",
              "attributes": {
                "id": "5313548",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Арктос 40",
              "attributes": {
                "id": "5313559",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Рекуператоры",
          "attributes": {
            "id": "4951205",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Korf 9",
              "attributes": {
                "id": "5313560",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Воздушные фильтры",
          "attributes": {
            "id": "4951206",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Systemair 7",
              "attributes": {
                "id": "5313579",
                "rel": "cat_visible"
              }
            },
            {
              "data": "МВЕС 2",
              "attributes": {
                "id": "5313580",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Элементы автоматики",
          "attributes": {
            "id": "4951207",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Оборудование для приточных установок",
              "attributes": {
                "id": "5333842",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Регуляторы",
              "attributes": {
                "id": "5333843",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Danfoss VLT 51",
                  "attributes": {
                    "id": "5416464",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Korf 6",
                  "attributes": {
                    "id": "5416485",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Systemair 62",
                  "attributes": {
                    "id": "5416486",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Vacon 22",
                  "attributes": {
                    "id": "5416487",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Щиты управления",
              "attributes": {
                "id": "5333846",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Korf 8",
                  "attributes": {
                    "id": "5416522",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Аэроблок 151",
                  "attributes": {
                    "id": "5416523",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Электроприводы",
              "attributes": {
                "id": "5333848",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Gruner 48",
                  "attributes": {
                    "id": "5416537",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Канальные обеззараживатели воздуха",
          "attributes": {
            "id": "5268286",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Поток 3",
              "attributes": {
                "id": "5348173",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Тион 4",
              "attributes": {
                "id": "5348174",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Микроклиматические устройства",
          "attributes": {
            "id": "5348150",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Увлажнители воздуха",
              "attributes": {
                "id": "5348154",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Ballu Machine 7",
                  "attributes": {
                    "id": "5350554",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Breezart 17",
                  "attributes": {
                    "id": "5350555",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Carel 213",
                  "attributes": {
                    "id": "5350610",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Hygromatik 120",
                  "attributes": {
                    "id": "5350621",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "DanVex 8",
                  "attributes": {
                    "id": "5368497",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Venta 6",
                  "attributes": {
                    "id": "5368508",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Trotec 4",
                  "attributes": {
                    "id": "5368511",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Pioneer 7",
                  "attributes": {
                    "id": "5368514",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Panasonic 3",
                  "attributes": {
                    "id": "5368515",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin 1",
                  "attributes": {
                    "id": "5368690",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ультразвуковые",
                  "attributes": {
                    "id": "5409744",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "BALLU 27",
                      "attributes": {
                        "id": "5409753",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "BONECO 14",
                      "attributes": {
                        "id": "5409882",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "ELECTROLUX 10",
                      "attributes": {
                        "id": "5409933",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Паровые",
                  "attributes": {
                    "id": "5409745",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "BALLU MACHINE 5",
                      "attributes": {
                        "id": "5409768",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "BONECO 5",
                      "attributes": {
                        "id": "5409784",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "HYGROMATIK 14",
                      "attributes": {
                        "id": "5409828",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Традиционные 1",
                  "attributes": {
                    "id": "5409746",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Дополнительные элементы для увлажнителей и очистителей",
                  "attributes": {
                    "id": "5409985",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Запасные части 1",
                      "attributes": {
                        "id": "5409987",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Фильтры и картриджи для увлажнителей и очистителей воздуха 42",
                      "attributes": {
                        "id": "5409988",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Элементы контроля влажности 9",
                      "attributes": {
                        "id": "5409989",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                }
              ]
            },
            {
              "data": "Осушители воздуха",
              "attributes": {
                "id": "5348155",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "BALLU 6",
                  "attributes": {
                    "id": "5410020",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Aerial 5",
                  "attributes": {
                    "id": "5368698",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "AERIAL 3",
                  "attributes": {
                    "id": "5410008",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Calorex 95",
                  "attributes": {
                    "id": "5368699",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Dantherm 32",
                  "attributes": {
                    "id": "5368936",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "DanVex 31",
                  "attributes": {
                    "id": "5369016",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Euronord PoolMaster",
                  "attributes": {
                    "id": "5369018",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Hidros 109",
                  "attributes": {
                    "id": "5369019",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Hidros 5",
                  "attributes": {
                    "id": "5410052",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Kroll 7",
                  "attributes": {
                    "id": "5369022",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Polar Bear 151",
                  "attributes": {
                    "id": "5369023",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Rhoss 14",
                  "attributes": {
                    "id": "5369024",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Trotec 69",
                  "attributes": {
                    "id": "5369025",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Бризарт 16",
                  "attributes": {
                    "id": "5369026",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Климат Аква 3",
                  "attributes": {
                    "id": "5369029",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Осушители воздуха и сушильные комплексы",
                  "attributes": {
                    "id": "5410005",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Сушильные комплексы",
                  "attributes": {
                    "id": "5410007",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "BALLU 2",
                      "attributes": {
                        "id": "5410053",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Сушилки для рук",
                  "attributes": {
                    "id": "5410017",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Сушилки для рук электрические 14",
                      "attributes": {
                        "id": "5410018",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                }
              ]
            },
            {
              "data": "Очистители воздуха",
              "attributes": {
                "id": "5348156",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "ActivTek 15",
                  "attributes": {
                    "id": "5416403",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Euromate 10",
                  "attributes": {
                    "id": "5416404",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Mitsubishi Electric 2",
                  "attributes": {
                    "id": "5416405",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тион 3",
                  "attributes": {
                    "id": "5416406",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Daikin 1",
                  "attributes": {
                    "id": "5416407",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Воздухоочистители 14",
                  "attributes": {
                    "id": "5409821",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Климатические комплексы",
                  "attributes": {
                    "id": "5409824",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "BONECO 2",
                      "attributes": {
                        "id": "5409982",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                }
              ]
            },
            {
              "data": "Обеззараживатели воздуха 2",
              "attributes": {
                "id": "5348157",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мойки воздуха",
              "attributes": {
                "id": "5409743",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "BALLU 2",
                  "attributes": {
                    "id": "5409747",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "BONECO 6",
                  "attributes": {
                    "id": "5409758",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "ELECTROLUX 8",
                  "attributes": {
                    "id": "5409764",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        }
      ]
    },
    {
      "data": "Метео,автохолод,камины",
      "attributes": {
        "id": "5457400",
        "rel": "cat_visible"
      },
      "children": [
        {
          "data": "Камины электрические",
          "attributes": {
            "id": "5414982",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Напольные",
              "attributes": {
                "id": "5414983",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "ELECTROLUX 4",
                  "attributes": {
                    "id": "5414987",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Настенные",
              "attributes": {
                "id": "5414984",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "ELECTROLUX 13",
                  "attributes": {
                    "id": "5414999",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Настольные",
              "attributes": {
                "id": "5414985",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "ELECTROLUX 2",
                  "attributes": {
                    "id": "5415000",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "ZANUSSI 1",
                  "attributes": {
                    "id": "5415005",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Портальные",
              "attributes": {
                "id": "5414986",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "ELECTROLUX 8",
                  "attributes": {
                    "id": "5415001",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        }
      ]
    },
    {
      "data": "Насосное оборуд",
      "attributes": {
        "id": "5457640",
        "rel": "cat_visible"
      },
      "children": [
        {
          "data": "Насосы водяные",
          "attributes": {
            "id": "5452143",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Насосы",
              "attributes": {
                "id": "5452144",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Компактные повысительные",
                  "attributes": {
                    "id": "5452145",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "GRUNDFOS 1",
                      "attributes": {
                        "id": "5453653",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Насосные станции 29",
                  "attributes": {
                    "id": "5452146",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Погружные для колодца",
                  "attributes": {
                    "id": "5452147",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "GRUNDFOS 1",
                      "attributes": {
                        "id": "5453654",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "ДЖИЛЕКС 10",
                      "attributes": {
                        "id": "5453655",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Скважинные",
                  "attributes": {
                    "id": "5452148",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "GRUNDFOS 7",
                      "attributes": {
                        "id": "5453684",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "ДЖИЛЕКС 2",
                      "attributes": {
                        "id": "5453699",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Циркуляционные",
                  "attributes": {
                    "id": "5452149",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "GRUNDFOS 45",
                      "attributes": {
                        "id": "5453685",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                }
              ]
            },
            {
              "data": "Канализационные и дренажные насосы",
              "attributes": {
                "id": "5452150",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Канализационные установки",
                  "attributes": {
                    "id": "5452151",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "GRUNDFOS 4",
                      "attributes": {
                        "id": "5453686",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "SFA 18",
                      "attributes": {
                        "id": "5453688",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Насосы для дренажа и канализации 7",
                  "attributes": {
                    "id": "5452152",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Трубы и крепеж для монтажа труб",
              "attributes": {
                "id": "5452153",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Трубы AXIOpress 21",
                  "attributes": {
                    "id": "5452154",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Трубы из сшитого полиэтилена 8",
                  "attributes": {
                    "id": "5452155",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Трубы металлопластиковые 4",
                  "attributes": {
                    "id": "5452156",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Трубы ПНД из полиэтилена низкого давления 6",
                  "attributes": {
                    "id": "5452157",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Фитинги AXIOpress: концовки и соединения",
                  "attributes": {
                    "id": "5452158",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "ROYAL THERMO 46",
                      "attributes": {
                        "id": "5453700",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "TECE 2",
                      "attributes": {
                        "id": "5453749",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "TECE 2",
                      "attributes": {
                        "id": "5453807",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Фитинги AXIOpress: пресс-втулки",
                  "attributes": {
                    "id": "5452159",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "ROYAL THERMO 9",
                      "attributes": {
                        "id": "5453701",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "TECE 8",
                      "attributes": {
                        "id": "5453713",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Фитинги AXIOpress: тройники",
                  "attributes": {
                    "id": "5452160",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "ROYAL THERMO 25",
                      "attributes": {
                        "id": "5453745",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "TECE 34",
                      "attributes": {
                        "id": "5453794",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Фитинги AXIOpress: уголки",
                  "attributes": {
                    "id": "5452161",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "ROYAL THERMO 12",
                      "attributes": {
                        "id": "5453746",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "TECE 33",
                      "attributes": {
                        "id": "5453760",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Фитинги AXIOpress: шаровые краны с запрессовкой",
                  "attributes": {
                    "id": "5452162",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "ROYAL THERMO 4",
                      "attributes": {
                        "id": "5453747",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Фитинги ПНД: муфты",
                  "attributes": {
                    "id": "5452163",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "ДЖИЛЕКС 14",
                      "attributes": {
                        "id": "5453748",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Фитинги ПНД: отводы",
                  "attributes": {
                    "id": "5452164",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Фитинги ПНД: тройники",
                  "attributes": {
                    "id": "5452165",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Крепеж для труб",
                  "attributes": {
                    "id": "5452166",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Фитинги резьбовые",
              "attributes": {
                "id": "5452167",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Шаровые краны",
              "attributes": {
                "id": "5452168",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Для воды",
                  "attributes": {
                    "id": "5452169",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Для подключения бытовых приборов",
                  "attributes": {
                    "id": "5452170",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Вентили для радиаторов",
              "attributes": {
                "id": "5452171",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Радиаторные",
                  "attributes": {
                    "id": "5452172",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Термостатические",
                  "attributes": {
                    "id": "5452173",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Клапаны обратные и фильтры косые",
              "attributes": {
                "id": "5452174",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Клапаны обратные",
                  "attributes": {
                    "id": "5452175",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Фильтры косые",
                  "attributes": {
                    "id": "5452176",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Узлы и коллекторы",
              "attributes": {
                "id": "5452177",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Коллекторы",
                  "attributes": {
                    "id": "5452178",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Шкафы коллекторные",
              "attributes": {
                "id": "5453668",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Встроенные",
                  "attributes": {
                    "id": "5453669",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Наружные",
                  "attributes": {
                    "id": "5453670",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Наружные 180 мм",
                  "attributes": {
                    "id": "5453671",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Очистка воды",
          "attributes": {
            "id": "5453672",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Системы очистки воды",
              "attributes": {
                "id": "5453806",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "ATOLL 25",
                  "attributes": {
                    "id": "5467933",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "HONEYWELL 20",
                  "attributes": {
                    "id": "5467956",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Обратный осмос",
              "attributes": {
                "id": "5467949",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "ATOLL 6",
                  "attributes": {
                    "id": "5470351",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Питьевые проточные с краном",
              "attributes": {
                "id": "5467953",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "ATOLL 4",
                  "attributes": {
                    "id": "5473558",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Проточные патронные",
              "attributes": {
                "id": "5467955",
                "rel": "cat_visible"
              }
            }
          ]
        }
      ]
    },
    {
      "data": "Холодильное оборудование",
      "attributes": {
        "id": "5491606",
        "rel": "cat_visible"
      },
      "children": [
        {
          "data": "Агрегаты",
          "attributes": {
            "id": "6280867",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Агрегаты производства МОРЕНА",
              "attributes": {
                "id": "6280868",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Однокомпрессорные агрегаты 2",
              "attributes": {
                "id": "6280869",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Моноблоки и сплит-системы 1",
              "attributes": {
                "id": "6280870",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Запчасти и аксессуары",
              "attributes": {
                "id": "6280871",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Компрессоры",
          "attributes": {
            "id": "6280872",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Герметичные",
              "attributes": {
                "id": "6280873",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Поршневые 208",
                  "attributes": {
                    "id": "6280874",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Спиральные 37",
                  "attributes": {
                    "id": "6280875",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ротационные 1",
                  "attributes": {
                    "id": "6280876",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Полугерметичные 39",
              "attributes": {
                "id": "6280877",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Винтовые",
              "attributes": {
                "id": "6280878",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Запчасти и аксессуары",
              "attributes": {
                "id": "6280879",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Нагреватели картера 14",
                  "attributes": {
                    "id": "6280880",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Вентиляторы обдува",
                  "attributes": {
                    "id": "6280881",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Вентиля, прокладки и адаптеры Rotalock 45",
                  "attributes": {
                    "id": "6280882",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Запчасти для полугерметичных компрессоров 2",
                  "attributes": {
                    "id": "6280883",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Прочее 33",
                  "attributes": {
                    "id": "6280884",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Теплообменноеоборудование",
          "attributes": {
            "id": "6280885",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Конденсаторы 14",
              "attributes": {
                "id": "6280886",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Воздухоохладители 10",
              "attributes": {
                "id": "6280887",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Теплообменники",
              "attributes": {
                "id": "6280888",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Запчасти и аксессуары 20",
              "attributes": {
                "id": "6280889",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Вентиляторы",
          "attributes": {
            "id": "6280890",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Вентиляторы 25",
              "attributes": {
                "id": "6280891",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Микродвигатели 8",
              "attributes": {
                "id": "6280892",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Запчасти и аксессуары 12",
              "attributes": {
                "id": "6280893",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Емкостноеоборудование",
          "attributes": {
            "id": "6280894",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Ресиверы жидкостные",
              "attributes": {
                "id": "6280895",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Вертикальные 21",
                  "attributes": {
                    "id": "6280896",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Горизонтальные 6",
                  "attributes": {
                    "id": "6280897",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Ресиверы маслянные 10",
              "attributes": {
                "id": "6280898",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Маслоотделители 15",
              "attributes": {
                "id": "6280899",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Отделители жидкости 26",
              "attributes": {
                "id": "6280900",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Хладагенты и масла",
          "attributes": {
            "id": "6280901",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Хладагенты",
              "attributes": {
                "id": "6280902",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Хладон/фреон 17",
                  "attributes": {
                    "id": "6280903",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тара 1",
                  "attributes": {
                    "id": "6280904",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Масла 38",
              "attributes": {
                "id": "6280905",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Труба медная и теплоизоляция",
          "attributes": {
            "id": "6280906",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Труба медная",
              "attributes": {
                "id": "6280907",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Труба 36",
                  "attributes": {
                    "id": "6280908",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Фитинги 218",
                  "attributes": {
                    "id": "6280909",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Теплоизоляция",
              "attributes": {
                "id": "6280910",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Energoflex 21",
                  "attributes": {
                    "id": "6280911",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Kaiflex 52",
                  "attributes": {
                    "id": "6280912",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Аксессуары для теплоизоляции 12",
                  "attributes": {
                    "id": "6280913",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Автоматика",
          "attributes": {
            "id": "6280914",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Линейная автоматика",
              "attributes": {
                "id": "6280915",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Терморегулирующие вентили 151",
                  "attributes": {
                    "id": "6280916",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Электронные расширительные вентили 29",
                  "attributes": {
                    "id": "6280917",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Соленоидные вентили 57",
                  "attributes": {
                    "id": "6280918",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Регуляторы давления и температуры 16",
                  "attributes": {
                    "id": "6280919",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Регуляторы уровня масла 7",
                  "attributes": {
                    "id": "6280920",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Реле давления 16",
                  "attributes": {
                    "id": "6280921",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Реле температуры и термостаты 5",
                  "attributes": {
                    "id": "6280922",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Фильтры-осушители 144",
                  "attributes": {
                    "id": "6280923",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Антикислотные фильтры 19",
                  "attributes": {
                    "id": "6280924",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Разборные фильтры 14",
                  "attributes": {
                    "id": "6280925",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Сердечники для разборных фильтров 22",
                  "attributes": {
                    "id": "6280926",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Маслянные фильтры 13",
                  "attributes": {
                    "id": "6280927",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Смотровые стекла 43",
                  "attributes": {
                    "id": "6280928",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Шаровые вентили 91",
                  "attributes": {
                    "id": "6280929",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Обратные клапаны 37",
                  "attributes": {
                    "id": "6280930",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Вентили четырехходовые 29",
                  "attributes": {
                    "id": "6280931",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Запчасти и аксессуары 40",
                  "attributes": {
                    "id": "6280932",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Электронные устройства",
              "attributes": {
                "id": "6280933",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Микропроцессоры/контроллеры 57",
                  "attributes": {
                    "id": "6280934",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Электронные регуляторы 2",
                  "attributes": {
                    "id": "6280935",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Запчасти и аксессуары 100",
                  "attributes": {
                    "id": "6280936",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Инструмент",
          "attributes": {
            "id": "6280937",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Вакуумные насосы 12",
              "attributes": {
                "id": "6280938",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Заправочные станции 2",
              "attributes": {
                "id": "6280939",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Заправочные весы 13",
              "attributes": {
                "id": "6280940",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Манометры 32",
              "attributes": {
                "id": "6280941",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Манометирческие станции 18",
              "attributes": {
                "id": "6280942",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Течеискатели 11",
              "attributes": {
                "id": "6280943",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Термометры/гигрометры 17",
              "attributes": {
                "id": "6280944",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Измерительное оборудование 6",
              "attributes": {
                "id": "6280945",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Инструмент для обработки труб 75",
              "attributes": {
                "id": "6280946",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Оборудование для пайки и сварки 39",
              "attributes": {
                "id": "6280947",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Химические средства 29",
              "attributes": {
                "id": "6280948",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Сервисный инструмент 205",
              "attributes": {
                "id": "6280949",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Расходные материалы",
          "attributes": {
            "id": "6280950",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Фитинги/гайки/штуцеры 105",
              "attributes": {
                "id": "6280951",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Материалы для пайки и сварки",
              "attributes": {
                "id": "6280952",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Припой 12",
                  "attributes": {
                    "id": "6280953",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Флюс 14",
                  "attributes": {
                    "id": "6280954",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Газ 4",
                  "attributes": {
                    "id": "6280955",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Виброгасители 22",
              "attributes": {
                "id": "6280956",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Материалы для монтажа 73",
              "attributes": {
                "id": "6280957",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Электрооборудование",
          "attributes": {
            "id": "6280958",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Щитовое оборудование 17",
              "attributes": {
                "id": "6280959",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Контакторы/пускатели/реле 4",
              "attributes": {
                "id": "6280960",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Термореле",
              "attributes": {
                "id": "6280961",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Автоматические выключатели 11",
              "attributes": {
                "id": "6280962",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Провод/кабель",
              "attributes": {
                "id": "6280963",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Электроарматура",
              "attributes": {
                "id": "6280964",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Устройства защиты 10",
              "attributes": {
                "id": "6280965",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Шкафы/боксы/корпуса 2",
              "attributes": {
                "id": "6280966",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Клемники/шины/разъемы",
              "attributes": {
                "id": "6280967",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Реле времени",
              "attributes": {
                "id": "6280968",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Светосигнальная арматура 2",
              "attributes": {
                "id": "6280969",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Кондиционирование",
          "attributes": {
            "id": "6280970",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Кондиционеры 8",
              "attributes": {
                "id": "6280971",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аксессуары для бытовых и промышленных кондиционеров",
              "attributes": {
                "id": "6280972",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Кронштейны 4",
                  "attributes": {
                    "id": "6280973",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Защитные козырьки, ограждения 7",
                  "attributes": {
                    "id": "6280974",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Дренажные насосы 31",
                  "attributes": {
                    "id": "6280975",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Дренажная трубка 10",
                  "attributes": {
                    "id": "6280976",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Пластиковый короб",
                  "attributes": {
                    "id": "6280977",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Аксессуары для бытовых кондиционеров 27",
                  "attributes": {
                    "id": "6280978",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Аксессуары для автомобильных кондиционеров 75",
              "attributes": {
                "id": "6280979",
                "rel": "cat_visible"
              }
            }
          ]
        }
      ]
    },
    {
      "data": "Отопление, водоснабжение, водоотведение",
      "attributes": {
        "id": "6081725",
        "rel": "cat_visible"
      },
      "children": [
        {
          "data": "Отопление и водоснабжение",
          "attributes": {
            "id": "6285488",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Арматура",
              "attributes": {
                "id": "6285499",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Автоматика, электроника",
                  "attributes": {
                    "id": "6285510",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Oventrop Автоматика 17",
                      "attributes": {
                        "id": "6285511",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Rehau Автоматика 1",
                      "attributes": {
                        "id": "6285676",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Stout Автоматика 13",
                      "attributes": {
                        "id": "6285688",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Valtec Автоматика 18",
                      "attributes": {
                        "id": "6285689",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Watts Автоматика 1",
                      "attributes": {
                        "id": "6285691",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Арматура безопасности",
                  "attributes": {
                    "id": "6285692",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Oventrop Арматура безопасности 4",
                      "attributes": {
                        "id": "6285693",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Stout Арматура безопасности 16",
                      "attributes": {
                        "id": "6285694",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Valtec арматура безопасности 15",
                      "attributes": {
                        "id": "6285695",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Watts Арматура безопасности 11",
                      "attributes": {
                        "id": "6285706",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                }
              ]
            }
          ]
        },
        {
          "data": "Ванны",
          "attributes": {
            "id": "6285707",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Акриловые ванны",
              "attributes": {
                "id": "6285708",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Акриловые ванны 1Marka 1",
                  "attributes": {
                    "id": "6285709",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Мебель для ванных комнат",
          "attributes": {
            "id": "6285710",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Тумбы с раковиной",
              "attributes": {
                "id": "6285711",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Тумбы с раковиной Alvaro Banos 19",
                  "attributes": {
                    "id": "6285712",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Am.pm 43",
                  "attributes": {
                    "id": "6285714",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Aquanet 15",
                  "attributes": {
                    "id": "6285752",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Aqwella 99",
                  "attributes": {
                    "id": "6285760",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Armadi Art 14",
                  "attributes": {
                    "id": "6285836",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Astra-form 31",
                  "attributes": {
                    "id": "6285838",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Bas 12",
                  "attributes": {
                    "id": "6285855",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Belux 12",
                  "attributes": {
                    "id": "6285869",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Berloni Bagno 21",
                  "attributes": {
                    "id": "6285885",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Cersanit 6",
                  "attributes": {
                    "id": "6285918",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Complimenta 23",
                  "attributes": {
                    "id": "6285919",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Duravit 9",
                  "attributes": {
                    "id": "6285977",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Edelform 31",
                  "attributes": {
                    "id": "6285979",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной EFP 16",
                  "attributes": {
                    "id": "6286030",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Harizma 43",
                  "attributes": {
                    "id": "6286047",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Jacob Delafon 53",
                  "attributes": {
                    "id": "6286051",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Kerasan 7",
                  "attributes": {
                    "id": "6286097",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Kolpa-san 21",
                  "attributes": {
                    "id": "6286106",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Laufen 31",
                  "attributes": {
                    "id": "6286123",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Onika 131",
                  "attributes": {
                    "id": "6286137",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Opadiris 96",
                  "attributes": {
                    "id": "6286277",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Roca 29",
                  "attributes": {
                    "id": "6286482",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Santurash 6",
                  "attributes": {
                    "id": "6286632",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Triton 52",
                  "attributes": {
                    "id": "6286635",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Аква Родос 26",
                  "attributes": {
                    "id": "6286674",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Акватон 85",
                  "attributes": {
                    "id": "6286694",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Бриклаер 1",
                  "attributes": {
                    "id": "6286829",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Бриклаер 36",
                  "attributes": {
                    "id": "6287128",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Тумбы с раковиной Два Водолея 9",
                  "attributes": {
                    "id": "6287235",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Пеналы, шкафы, комоды",
              "attributes": {
                "id": "6287243",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Пеналы, шкафы, комоды Santurash 10",
                  "attributes": {
                    "id": "6287244",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Пеналы, шкафы, комоды Alvaro Banos 5",
                  "attributes": {
                    "id": "6287257",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Пеналы, шкафы, комоды AM-PM 41",
                  "attributes": {
                    "id": "6287264",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Пеналы, шкафы, комоды Aquanet 87",
                  "attributes": {
                    "id": "6287275",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Столешницы для ванной",
              "attributes": {
                "id": "6287442",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Столешницы для ванной Kolpa-san 7",
                  "attributes": {
                    "id": "6287443",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Столешницы для ванной Ravak 18",
                  "attributes": {
                    "id": "6287454",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Комплекты мебели",
              "attributes": {
                "id": "6287457",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Мебель для ваной комнаты Aqualife Design",
                  "attributes": {
                    "id": "6287458",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Берген 2",
                      "attributes": {
                        "id": "6287459",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Бостон 9",
                      "attributes": {
                        "id": "6287460",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Гент 4",
                      "attributes": {
                        "id": "6287461",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Женева 2",
                      "attributes": {
                        "id": "6287472",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Иматра 8",
                      "attributes": {
                        "id": "6287473",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Котка 4",
                      "attributes": {
                        "id": "6287474",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Лион 1",
                      "attributes": {
                        "id": "6287476",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Мальме",
                      "attributes": {
                        "id": "6287477",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Нью-Йорк 5",
                      "attributes": {
                        "id": "6287478",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Осло 4",
                      "attributes": {
                        "id": "6287479",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Пиллау 4",
                      "attributes": {
                        "id": "6287481",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Честер 3",
                      "attributes": {
                        "id": "6287482",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Чикаго 4",
                      "attributes": {
                        "id": "6287483",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                }
              ]
            },
            {
              "data": "Стеклянные полки",
              "attributes": {
                "id": "6287484",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Стеклянные полки Aqwella 2",
                  "attributes": {
                    "id": "6287485",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Стеклянные полки Harizma 4",
                  "attributes": {
                    "id": "6287486",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Стеклянные полки Sanvit 4",
                  "attributes": {
                    "id": "6287487",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Стеклянные полки Triton 10",
                  "attributes": {
                    "id": "6287488",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Стеклянные полки Valente",
                  "attributes": {
                    "id": "6287489",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Стеклянные полки Акватон 14",
                  "attributes": {
                    "id": "6287490",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Зеркала и зеркальные шкафы для ванной",
              "attributes": {
                "id": "6287502",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Зеркала и зеркальные шкаф Alvaro Banos 17",
                  "attributes": {
                    "id": "6287503",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Am.pm 22",
                  "attributes": {
                    "id": "6287516",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы AquaLife Design 23",
                  "attributes": {
                    "id": "6287535",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Aquanet 407",
                  "attributes": {
                    "id": "6287544",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Aquaton 147",
                  "attributes": {
                    "id": "6288012",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Aqwella 74",
                  "attributes": {
                    "id": "6288137",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Armadi Art 7",
                  "attributes": {
                    "id": "6288195",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Astra-form 13",
                  "attributes": {
                    "id": "6288198",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Bas 10",
                  "attributes": {
                    "id": "6288200",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Belbagno 14",
                  "attributes": {
                    "id": "6288201",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Belux 13",
                  "attributes": {
                    "id": "6288212",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Berloni Bagno 15",
                  "attributes": {
                    "id": "6288223",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Briklaer 108",
                  "attributes": {
                    "id": "6288225",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Cersanit 2",
                  "attributes": {
                    "id": "6288288",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Edelform 28",
                  "attributes": {
                    "id": "6288289",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы EFP 17",
                  "attributes": {
                    "id": "6288325",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Harizma 24",
                  "attributes": {
                    "id": "6288326",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Jacob Delafon 24",
                  "attributes": {
                    "id": "6288327",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Kerasan 3",
                  "attributes": {
                    "id": "6288341",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Kolpa-san 15",
                  "attributes": {
                    "id": "6288353",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Laufen 14",
                  "attributes": {
                    "id": "6288367",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Nord plus 8",
                  "attributes": {
                    "id": "6288378",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Onika",
                  "attributes": {
                    "id": "6288380",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Opadiris 88",
                  "attributes": {
                    "id": "6288381",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Roca 20",
                  "attributes": {
                    "id": "6288447",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Santurash 6",
                  "attributes": {
                    "id": "6288458",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Sanvit 32",
                  "attributes": {
                    "id": "6288459",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Triton 57",
                  "attributes": {
                    "id": "6288461",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Аква Родос 28",
                  "attributes": {
                    "id": "6288477",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Зеркала и зеркальные шкафы Два Водолея 12",
                  "attributes": {
                    "id": "6288488",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Мебель для ванной Alvaro Banos 41",
              "attributes": {
                "id": "6288489",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Am.pm 106",
              "attributes": {
                "id": "6288491",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Aquanet 147",
              "attributes": {
                "id": "6288523",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Aquaton 494",
              "attributes": {
                "id": "6288596",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Aqwella 109",
              "attributes": {
                "id": "6288966",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Astra-form",
              "attributes": {
                "id": "6289083",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Astra-form 53",
              "attributes": {
                "id": "6289087",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Bas 26",
              "attributes": {
                "id": "6289117",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Belux 42",
              "attributes": {
                "id": "6289171",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Belbagno 92",
              "attributes": {
                "id": "6289200",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Berloni Bagno 36",
              "attributes": {
                "id": "6289242",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Cersanit 9",
              "attributes": {
                "id": "6289281",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Complimenta 23",
              "attributes": {
                "id": "6289296",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Edelform 79",
              "attributes": {
                "id": "6289383",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной EFP 40",
              "attributes": {
                "id": "6289492",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Jacob Delafon 82",
              "attributes": {
                "id": "6289537",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Kerasan 12",
              "attributes": {
                "id": "6289593",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Kolpa san 50",
              "attributes": {
                "id": "6289596",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Laufen 49",
              "attributes": {
                "id": "6289699",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Ravak 21",
              "attributes": {
                "id": "6289756",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Roca 70",
              "attributes": {
                "id": "6289824",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Onika 345",
              "attributes": {
                "id": "6290072",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Opadiris 283",
              "attributes": {
                "id": "6290238",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Аква Родос 70",
              "attributes": {
                "id": "6290278",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Бриклаер 277",
              "attributes": {
                "id": "6290293",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Два Водолея 40",
              "attributes": {
                "id": "6290566",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Мебель для ванной Timo 19",
              "attributes": {
                "id": "6290595",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Душевые ограждения",
          "attributes": {
            "id": "6290603",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Душевые двери",
              "attributes": {
                "id": "6290604",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Am Pm душевые двери 4",
                  "attributes": {
                    "id": "6290605",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Aquanet душевые двери 11",
                  "attributes": {
                    "id": "6290606",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Bas Душевые двери",
                  "attributes": {
                    "id": "6290609",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Душевые ограждения Bas Пандора 10",
                      "attributes": {
                        "id": "6290610",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Душевые ограждения Bas Пуэрта 3",
                      "attributes": {
                        "id": "6290611",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Cezares душевые двери 222",
                  "attributes": {
                    "id": "6290613",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Gelco душевые двери 8",
                  "attributes": {
                    "id": "6290768",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Gemy душевые двери 17",
                  "attributes": {
                    "id": "6290769",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Huppe душевые двери 7",
                  "attributes": {
                    "id": "6290770",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Jacob Delafon душевые двери 4",
                  "attributes": {
                    "id": "6290771",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Kolpa-san душевые двери 28",
                  "attributes": {
                    "id": "6290772",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Pucsho душевые двери 2",
                  "attributes": {
                    "id": "6290789",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Radaway душевые двери 96",
                  "attributes": {
                    "id": "6290791",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ravak душевые двери 179",
                  "attributes": {
                    "id": "6290837",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "SanSwiss душевые двери 4",
                  "attributes": {
                    "id": "6290989",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Душевые кабины и сауны",
          "attributes": {
            "id": "6290992",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Ванны с душевой кабиной",
              "attributes": {
                "id": "6290993",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Am.pm душевые кабины с ванной 5",
                  "attributes": {
                    "id": "6290994",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Appollo душевые кабины с ванной 16",
                  "attributes": {
                    "id": "6290995",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Aqua Joy душевые кабины с ванной",
                  "attributes": {
                    "id": "6291006",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Aqualux душевые кабины с ванной 4",
                  "attributes": {
                    "id": "6291007",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Aquanet душевые кабины с ванной 5",
                  "attributes": {
                    "id": "6291012",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Bretto душевые кабины с ванной 4",
                  "attributes": {
                    "id": "6291014",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "BYON душевые кабины с ванной 2",
                  "attributes": {
                    "id": "6291026",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Eago душевые кабины с ванной 10",
                  "attributes": {
                    "id": "6291027",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Gemy душевые кабины с ванной 2",
                  "attributes": {
                    "id": "6291049",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Grossman душевые кабины с ванной 4",
                  "attributes": {
                    "id": "6291050",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Luxus душевые кабины с ванной 2",
                  "attributes": {
                    "id": "6291051",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Niagara душевые кабины с ванной 4",
                  "attributes": {
                    "id": "6291052",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "SSWW душевые кабины с ванной 4",
                  "attributes": {
                    "id": "6291053",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Timo душевые кабины с ванной 20",
                  "attributes": {
                    "id": "6291064",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Душевые кабины без бани",
              "attributes": {
                "id": "6291075",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Acquazzone душевые кабины без турецкой бани 7",
                  "attributes": {
                    "id": "6291076",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Alvaro Banos Душевые кабины без турецкой бани 6",
                  "attributes": {
                    "id": "6291093",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Am.pm душевые кабины без бани 10",
                  "attributes": {
                    "id": "6291095",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Appollo душевые кабины без турецкой бани 17",
                  "attributes": {
                    "id": "6291110",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Aquanet душевые кабины без турецкой бани 2",
                  "attributes": {
                    "id": "6291124",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Смесители",
          "attributes": {
            "id": "6291125",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Смесители для раковины",
              "attributes": {
                "id": "6291126",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Смесители Am.pm для раковины 19",
                  "attributes": {
                    "id": "6291127",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Смесители BelBagno для раковины 24",
                  "attributes": {
                    "id": "6291142",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Смесители Boheme для раковины 29",
                  "attributes": {
                    "id": "6291156",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Смесители Bravat для раковины 32",
                  "attributes": {
                    "id": "6291175",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Смесители Bugnatese для раковины 99",
                  "attributes": {
                    "id": "6291187",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Душевые системы",
          "attributes": {
            "id": "6291226",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Верхние души",
              "attributes": {
                "id": "6291227",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Верхние души Aquanet 1",
                  "attributes": {
                    "id": "6291228",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Boheme 6",
                  "attributes": {
                    "id": "6291229",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Bossini 11",
                  "attributes": {
                    "id": "6291236",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Bugnatese 30",
                  "attributes": {
                    "id": "6291248",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Cezares 13",
                  "attributes": {
                    "id": "6291250",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Elghansa 10",
                  "attributes": {
                    "id": "6291251",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Gllon 4",
                  "attributes": {
                    "id": "6291252",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Grohe 53",
                  "attributes": {
                    "id": "6291253",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Hansgrohe 48",
                  "attributes": {
                    "id": "6291268",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Ideal Standard 12",
                  "attributes": {
                    "id": "6291293",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Kaiser 2",
                  "attributes": {
                    "id": "6291296",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Nobili",
                  "attributes": {
                    "id": "6291298",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Верхние души Wasserkraft 8",
                  "attributes": {
                    "id": "6291299",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Гигиенические души",
              "attributes": {
                "id": "6291303",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Гигиенические души Boheme 12",
                  "attributes": {
                    "id": "6291304",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Bossini 13",
                  "attributes": {
                    "id": "6291305",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Bugnatese 3",
                  "attributes": {
                    "id": "6291306",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Cezares 2",
                  "attributes": {
                    "id": "6291308",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Damixa 1",
                  "attributes": {
                    "id": "6291309",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Elghansa 5",
                  "attributes": {
                    "id": "6291310",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Grohe 25",
                  "attributes": {
                    "id": "6291311",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Hansgrohe 5",
                  "attributes": {
                    "id": "6291313",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Ideal Standard 2",
                  "attributes": {
                    "id": "6291316",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Jacob Delafon 2",
                  "attributes": {
                    "id": "6291317",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Kludi 2",
                  "attributes": {
                    "id": "6291318",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Nobili 1",
                  "attributes": {
                    "id": "6291319",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Oras 3",
                  "attributes": {
                    "id": "6291320",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Vitra",
                  "attributes": {
                    "id": "6291322",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Гигиенические души Wasserkraft 1",
                  "attributes": {
                    "id": "6291323",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Гидромассажные душевые панели",
              "attributes": {
                "id": "6291324",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Душевые панели Alvaro Banos 4",
                  "attributes": {
                    "id": "6291325",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые панели Am Pm 4",
                  "attributes": {
                    "id": "6291326",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые панели Bossini 2",
                  "attributes": {
                    "id": "6291327",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые панели Byon 3",
                  "attributes": {
                    "id": "6291328",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые панели Cezares 6",
                  "attributes": {
                    "id": "6291329",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые панели Excellent 7",
                  "attributes": {
                    "id": "6291330",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые панели Gllon 3",
                  "attributes": {
                    "id": "6291331",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые панели Hansgrohe 4",
                  "attributes": {
                    "id": "6291333",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые панели Kolpa-san 37",
                  "attributes": {
                    "id": "6291335",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые панели Valentin (Валентин) 7",
                  "attributes": {
                    "id": "6291346",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Держатели для душа",
              "attributes": {
                "id": "6291347",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Держатели для душа Boheme 3",
                  "attributes": {
                    "id": "6291348",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Держатели для душа Bugnatese 8",
                  "attributes": {
                    "id": "6291349",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Держатели для душа Cezares 3",
                  "attributes": {
                    "id": "6291350",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Держатели для душа Elghansa 8",
                  "attributes": {
                    "id": "6291351",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Держатели для душа Grohe 16",
                  "attributes": {
                    "id": "6291352",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Держатели для душа Hansgrohe 9",
                  "attributes": {
                    "id": "6291373",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Держатели для душа Kludi 1",
                  "attributes": {
                    "id": "6291374",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Держатели для душа Nobili 1",
                  "attributes": {
                    "id": "6291375",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Держатели для душа Oras 2",
                  "attributes": {
                    "id": "6291376",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Держатели для душа Wasserkraft 12",
                  "attributes": {
                    "id": "6291377",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Душевые гарнитуры",
              "attributes": {
                "id": "6291378",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Душевые гарнитуры Bossini 3",
                  "attributes": {
                    "id": "6291379",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые гарнитуры Bugnatese 7",
                  "attributes": {
                    "id": "6291380",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые гарнитуры Cezares 30",
                  "attributes": {
                    "id": "6291381",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые гарнитуры Damixa 7",
                  "attributes": {
                    "id": "6291384",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые гарнитуры Elghansa 6",
                  "attributes": {
                    "id": "6291385",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Душевые гарнитуры Gllon 1",
                  "attributes": {
                    "id": "6291386",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Инженерная сантехника",
          "attributes": {
            "id": "6291468",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Бачки для скрытого монтажа",
              "attributes": {
                "id": "6291469",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "AlcaPlast смывные бачки скрытого монтажа 2",
                  "attributes": {
                    "id": "6291470",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Geberit смывные бачки скрытого монтажа 7",
                  "attributes": {
                    "id": "6291471",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Grohe смывные бачки скрытого монтажа 3",
                  "attributes": {
                    "id": "6291472",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Oli смывные бачки скрытого монтажа 6",
                  "attributes": {
                    "id": "6291473",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Tece смывные бачки скрытого монтажа 2",
                  "attributes": {
                    "id": "6291474",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Viega смывные бачки скрытого монтажа 1",
                  "attributes": {
                    "id": "6291475",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Villeroy Boch смывные бачки скрытого монтажа 2",
                  "attributes": {
                    "id": "6291476",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Дренажные каналы и трапы для душа",
              "attributes": {
                "id": "6291477",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "ACO ShowerDrain дренажные каналы, трапы 73",
                  "attributes": {
                    "id": "6291478",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "AlcaPlast дренажные каналы, трапы 35",
                  "attributes": {
                    "id": "6291528",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Alpen дренажные каналы, трапы 37",
                  "attributes": {
                    "id": "6291529",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Geberit дренажные каналы, трапы 6",
                  "attributes": {
                    "id": "6291531",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Pestan дренажные каналы, трапы 27",
                  "attributes": {
                    "id": "6291532",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Radaway дренажные каналы, трапы 8",
                  "attributes": {
                    "id": "6291554",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ravak дренажные каналы, трапы 7",
                  "attributes": {
                    "id": "6291555",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Tece дренажные каналы, трапы 48",
                  "attributes": {
                    "id": "6291566",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Viega дренажные каналы, трапы 37",
                  "attributes": {
                    "id": "6291567",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Инсталляции",
              "attributes": {
                "id": "6291579",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Инсталляции AlcaPlast 5",
                  "attributes": {
                    "id": "6291580",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляции Belbagno 2",
                  "attributes": {
                    "id": "6291583",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляции Geberit",
                  "attributes": {
                    "id": "6291584",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Geberit Duofix UP182 7",
                      "attributes": {
                        "id": "6291585",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Geberit Duofix UP200 3",
                      "attributes": {
                        "id": "6291596",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Geberit Duofix UP320 9",
                      "attributes": {
                        "id": "6291607",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Geberit Duofix UP700 1",
                      "attributes": {
                        "id": "6291618",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Geberit Monolith 7",
                      "attributes": {
                        "id": "6291619",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Geberit для биде 2",
                      "attributes": {
                        "id": "6291621",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Geberit для душевых трапов 2",
                      "attributes": {
                        "id": "6291623",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Geberit для писсуара 3",
                      "attributes": {
                        "id": "6291624",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Geberit для умывальника 2",
                      "attributes": {
                        "id": "6291625",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Geberit комплектующие 11",
                      "attributes": {
                        "id": "6291626",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Инсталляции Grohe 29",
                  "attributes": {
                    "id": "6291627",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляции Ideal Standard 1",
                  "attributes": {
                    "id": "6291628",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляции Jacob Delafon 1",
                  "attributes": {
                    "id": "6291629",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляции Oli 41",
                  "attributes": {
                    "id": "6291630",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляции Roca 2",
                  "attributes": {
                    "id": "6291641",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляции Sanit 1",
                  "attributes": {
                    "id": "6291643",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляции Viega 11",
                  "attributes": {
                    "id": "6291644",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляции Villeroy Boch 5",
                  "attributes": {
                    "id": "6291651",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляции Vitra 2",
                  "attributes": {
                    "id": "6291652",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталляция TECE 14",
                  "attributes": {
                    "id": "6291653",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Инсталяции SFA 1",
                  "attributes": {
                    "id": "6291654",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Инсталляция в комплекте с унитазом",
              "attributes": {
                "id": "6291655",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Am.pm комплект инсталляции с унитазом 15",
                  "attributes": {
                    "id": "6291656",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Cersanit комплект инсталляции с унитазом 4",
                  "attributes": {
                    "id": "6291667",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Geberit комплект инсталляции с унитазом 8",
                  "attributes": {
                    "id": "6291668",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Grohe комплект инсталляции с унитазом 5",
                  "attributes": {
                    "id": "6291692",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Ideal Standard комплект инсталляции с унитазом 3",
                  "attributes": {
                    "id": "6291701",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Jacob Delafon комплект инсталляции с унитазом 11",
                  "attributes": {
                    "id": "6291707",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Roca комплект инсталляции с унитазом 8",
                  "attributes": {
                    "id": "6291770",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Tece комплект инсталляции с унитазом 1",
                  "attributes": {
                    "id": "6291839",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Viega комплект инсталляции с унитазом 1",
                  "attributes": {
                    "id": "6291840",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Villeroy Boch комплект инсталляции с унитазом 2",
                  "attributes": {
                    "id": "6291841",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Vitra комплект инсталляции с унитазом 11",
                  "attributes": {
                    "id": "6291842",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Смывные клавиши",
              "attributes": {
                "id": "6291843",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "AlcaPlast клавиши смыва 37",
                  "attributes": {
                    "id": "6291844",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Belbagno клавиши смыва 14",
                  "attributes": {
                    "id": "6291863",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Cersanit клавиши смыва 11",
                  "attributes": {
                    "id": "6291886",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Geberit клавиши смыва 93",
                  "attributes": {
                    "id": "6291890",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Grohe клавиши смыва 48",
                  "attributes": {
                    "id": "6291941",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Jacob Delafon клавиши смыва 4",
                  "attributes": {
                    "id": "6291996",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Oli клавиши смыва 55",
                  "attributes": {
                    "id": "6291997",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Roca клавиши смыва 3",
                  "attributes": {
                    "id": "6292081",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Tece клавиши смыва 41",
                  "attributes": {
                    "id": "6292083",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Viega клавиши смыва 13",
                  "attributes": {
                    "id": "6292085",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Villeroy Boch клавиши смыва 6",
                  "attributes": {
                    "id": "6292096",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Системы защиты от протечек и заливов",
          "attributes": {
            "id": "6292099",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Аквасторож системы защиты от протечек и заливов 32",
              "attributes": {
                "id": "6292100",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Нептун системы защиты от протечек и заливов 10",
              "attributes": {
                "id": "6292135",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Полотенце сушители",
          "attributes": {
            "id": "6292138",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Полотенцесушители водяные",
              "attributes": {
                "id": "6292139",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Boheme Водяные полотенцесушители 8",
                  "attributes": {
                    "id": "6292140",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Cezares Водяные полотенцесушители 11",
                  "attributes": {
                    "id": "6292142",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Energy Водяные полотенцесушители 55",
                  "attributes": {
                    "id": "6292149",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Grotta Водяные полотенцесушители 14",
                  "attributes": {
                    "id": "6292223",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Сунержа Водяные полотенцесушители",
                  "attributes": {
                    "id": "6292229",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Полотенцесушители электрические",
              "attributes": {
                "id": "6292231",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Boheme электрические полотенце сушители 6",
                  "attributes": {
                    "id": "6292232",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Energy электрические полотенцесушители 28",
                  "attributes": {
                    "id": "6292233",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Электрические теплые полы",
          "attributes": {
            "id": "6292255",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Инфракрасный пленочный теплый пол 20",
              "attributes": {
                "id": "6292256",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Нагревательные коврики (мобильный теплый пол) 5",
              "attributes": {
                "id": "6292269",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Нагревательные маты 133",
              "attributes": {
                "id": "6292271",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Нагревательный кабель 90",
              "attributes": {
                "id": "6292338",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Теплые полы Energy 56",
              "attributes": {
                "id": "6292435",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Теплый пол Теплолюкс",
              "attributes": {
                "id": "6292498",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Теплолюкс Alumia 16",
                  "attributes": {
                    "id": "6292499",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Теплолюкс ELITE ТЛБЭ 12",
                  "attributes": {
                    "id": "6292519",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Теплолюкс Express, Carpet и Mirror 7",
                  "attributes": {
                    "id": "6292523",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Теплолюкс GREEN BOX 5",
                  "attributes": {
                    "id": "6292524",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Теплолюкс Mini 15",
                  "attributes": {
                    "id": "6292536",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Теплолюкс ProfiMat 15",
                  "attributes": {
                    "id": "6292554",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Теплолюкс Profiroll 18",
                  "attributes": {
                    "id": "6292557",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Теплолюкс STANDART ТЛОЭ 14",
                  "attributes": {
                    "id": "6292712",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Теплолюкс Tropix 30",
                  "attributes": {
                    "id": "6292720",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Теплолюкс Терморегуляторы 8",
                  "attributes": {
                    "id": "6292737",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Теплый пол Национальный Комфорт",
              "attributes": {
                "id": "6292749",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "SLIM HEAT ПНК 20",
                  "attributes": {
                    "id": "6292750",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Национальный комфорт 2НК 15",
                  "attributes": {
                    "id": "6292752",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Национальный Комфорт БНК 13",
                  "attributes": {
                    "id": "6292766",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Национальный Комфорт НК 9",
                  "attributes": {
                    "id": "6292773",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Национальный комфорт тНК 13",
                  "attributes": {
                    "id": "6292778",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Терморегуляторы 15",
              "attributes": {
                "id": "6292791",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Мойки для кухни",
          "attributes": {
            "id": "6292794",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Blanco кухонные мойки 48",
              "attributes": {
                "id": "6292795",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Elghansa кухонные мойки 6",
              "attributes": {
                "id": "6292828",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Grohe кухонные мойки 25",
              "attributes": {
                "id": "6292831",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Акватон кухонные мойки 92",
              "attributes": {
                "id": "6292837",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Санфаянс",
          "attributes": {
            "id": "6292916",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Биде",
              "attributes": {
                "id": "6292918",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Биде Am.pm 7",
                  "attributes": {
                    "id": "6292919",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде ArtCeram 6",
                  "attributes": {
                    "id": "6292924",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде BelBagno 4",
                  "attributes": {
                    "id": "6293014",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Ceramica Nova",
                  "attributes": {
                    "id": "6293015",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Cersanit 1",
                  "attributes": {
                    "id": "6293016",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Duravit 24",
                  "attributes": {
                    "id": "6293017",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Geberit 6",
                  "attributes": {
                    "id": "6293104",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Globo 8",
                  "attributes": {
                    "id": "6293106",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Hatria 15",
                  "attributes": {
                    "id": "6293107",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Ideal Standard 7",
                  "attributes": {
                    "id": "6293163",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Ido 2",
                  "attributes": {
                    "id": "6293164",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Jacob Delafon 20",
                  "attributes": {
                    "id": "6293165",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Kerasan 7",
                  "attributes": {
                    "id": "6293166",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Laufen 21",
                  "attributes": {
                    "id": "6293167",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Roca 22",
                  "attributes": {
                    "id": "6293169",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Sanita Luxe 2",
                  "attributes": {
                    "id": "6293170",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Scarabeo 4",
                  "attributes": {
                    "id": "6293171",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Биде Vitra 6",
                  "attributes": {
                    "id": "6293173",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Писсуары",
              "attributes": {
                "id": "6293174",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Писсуары Am.pm 2",
                  "attributes": {
                    "id": "6293175",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары ArtCeram 1",
                  "attributes": {
                    "id": "6293176",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары Duravit 6",
                  "attributes": {
                    "id": "6293177",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары Globo 1",
                  "attributes": {
                    "id": "6293178",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары Grohe 2",
                  "attributes": {
                    "id": "6293179",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары Hatria 2",
                  "attributes": {
                    "id": "6293180",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары IFO 2",
                  "attributes": {
                    "id": "6293181",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары Jacob Delafon 3",
                  "attributes": {
                    "id": "6293182",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары Jika 3",
                  "attributes": {
                    "id": "6293183",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары Laufen 7",
                  "attributes": {
                    "id": "6293184",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары Sanita Luxe",
                  "attributes": {
                    "id": "6293186",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Писсуары Vitra 4",
                  "attributes": {
                    "id": "6293187",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Раковины",
              "attributes": {
                "id": "6293188",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Раковины Altasan 3",
                  "attributes": {
                    "id": "6293189",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Antonio Lupi 1",
                  "attributes": {
                    "id": "6293190",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины BelBagno 17",
                  "attributes": {
                    "id": "6293191",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Belux 2",
                  "attributes": {
                    "id": "6293193",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины CeramaLuxe 32",
                  "attributes": {
                    "id": "6293194",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Ceramica Nova 4",
                  "attributes": {
                    "id": "6293206",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Cersanit 24",
                  "attributes": {
                    "id": "6293207",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Cezares 5",
                  "attributes": {
                    "id": "6293208",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Delice France 3",
                  "attributes": {
                    "id": "6293209",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Devon & Devon 3",
                  "attributes": {
                    "id": "6293210",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Dreja 2",
                  "attributes": {
                    "id": "6293211",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Duravit 41",
                  "attributes": {
                    "id": "6293212",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Eos 11",
                  "attributes": {
                    "id": "6293219",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Globo 19",
                  "attributes": {
                    "id": "6293220",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины GSI 31",
                  "attributes": {
                    "id": "6293222",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Hatria 53",
                  "attributes": {
                    "id": "6293223",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Ideal Standard 8",
                  "attributes": {
                    "id": "6293234",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины IFO 8",
                  "attributes": {
                    "id": "6293235",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Jacob Delafon 85",
                  "attributes": {
                    "id": "6293236",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Jika 14",
                  "attributes": {
                    "id": "6293248",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Kerama Marazzi 2",
                  "attributes": {
                    "id": "6293249",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Kerasan",
                  "attributes": {
                    "id": "6293250",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Раковины Kerasan Cento 20",
                      "attributes": {
                        "id": "6293251",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Раковины Kerasan Ego 8",
                      "attributes": {
                        "id": "6293254",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Раковины Kerasan Flo 9",
                      "attributes": {
                        "id": "6293255",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Раковины Kerasan Retro 8",
                      "attributes": {
                        "id": "6293269",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Раковины Laufen 80",
                  "attributes": {
                    "id": "6293270",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Melana 46",
                  "attributes": {
                    "id": "6293272",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины MonteBianco 27",
                  "attributes": {
                    "id": "6293275",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Paa 3",
                  "attributes": {
                    "id": "6293308",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Ravak 19",
                  "attributes": {
                    "id": "6293309",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Roca 34",
                  "attributes": {
                    "id": "6293312",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Sanit 3",
                  "attributes": {
                    "id": "6293444",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Santek 8",
                  "attributes": {
                    "id": "6293445",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Scarabeo 101",
                  "attributes": {
                    "id": "6293466",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины TehnoLit",
                  "attributes": {
                    "id": "6293534",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Villeroy Boch 14",
                  "attributes": {
                    "id": "6293535",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Раковины Vitra 5",
                  "attributes": {
                    "id": "6293536",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Унитазы",
              "attributes": {
                "id": "6293537",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Унитазы Am.pm 22",
                  "attributes": {
                    "id": "6293538",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Aquanet 15",
                  "attributes": {
                    "id": "6293612",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы BelBagno 39",
                  "attributes": {
                    "id": "6293700",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Boheme 9",
                  "attributes": {
                    "id": "6293721",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Bravat 3",
                  "attributes": {
                    "id": "6293733",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы CeramaLuxe 6",
                  "attributes": {
                    "id": "6293734",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Ceramica Nova 13",
                  "attributes": {
                    "id": "6293735",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Cersanit 22",
                  "attributes": {
                    "id": "6293749",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Cezares 9",
                  "attributes": {
                    "id": "6293763",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Creo Ceramique 19",
                  "attributes": {
                    "id": "6293766",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Delice France 6",
                  "attributes": {
                    "id": "6293789",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Della 41",
                  "attributes": {
                    "id": "6293815",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Duravit 41",
                  "attributes": {
                    "id": "6293852",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Gala 18",
                  "attributes": {
                    "id": "6293888",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Geberit 5",
                  "attributes": {
                    "id": "6293930",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Globo 15",
                  "attributes": {
                    "id": "6293942",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Grohe 11",
                  "attributes": {
                    "id": "6293954",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы GSI 6",
                  "attributes": {
                    "id": "6293979",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Gustavsberg 3",
                  "attributes": {
                    "id": "6293984",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Hatria 26",
                  "attributes": {
                    "id": "6293986",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Ideal Standard 35",
                  "attributes": {
                    "id": "6294030",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы IDO 4",
                  "attributes": {
                    "id": "6294058",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы IFO 37",
                  "attributes": {
                    "id": "6294059",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Jacob Delafon 32",
                  "attributes": {
                    "id": "6294070",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Jika 18",
                  "attributes": {
                    "id": "6294115",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Kerama Marazzi 6",
                  "attributes": {
                    "id": "6294123",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Keramag 9",
                  "attributes": {
                    "id": "6294135",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Kerasan",
                  "attributes": {
                    "id": "6294138",
                    "rel": "cat_visible"
                  },
                  "children": [
                    {
                      "data": "Kerasan Cento 6",
                      "attributes": {
                        "id": "6294139",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Kerasan Ego 4",
                      "attributes": {
                        "id": "6294142",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Kerasan Flo 4",
                      "attributes": {
                        "id": "6294145",
                        "rel": "cat_visible"
                      }
                    },
                    {
                      "data": "Kerasan Retro 5",
                      "attributes": {
                        "id": "6294738",
                        "rel": "cat_visible"
                      }
                    }
                  ]
                },
                {
                  "data": "Унитазы Kirovit 4",
                  "attributes": {
                    "id": "6295173",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Laufen 37",
                  "attributes": {
                    "id": "6295177",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Melana 13",
                  "attributes": {
                    "id": "6295310",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Roca 37",
                  "attributes": {
                    "id": "6295337",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Sanita Luxe 24",
                  "attributes": {
                    "id": "6295380",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Santek 21",
                  "attributes": {
                    "id": "6295419",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Scarabeo 9",
                  "attributes": {
                    "id": "6295447",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы SFA (с насосом) 3",
                  "attributes": {
                    "id": "6295461",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Simas 38",
                  "attributes": {
                    "id": "6295466",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы SSWW 12",
                  "attributes": {
                    "id": "6295501",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Toto 13",
                  "attributes": {
                    "id": "6295529",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Villeroy Boch 15",
                  "attributes": {
                    "id": "6295595",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Vitra 50",
                  "attributes": {
                    "id": "6295598",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Унитазы Оскольская керамика 39",
                  "attributes": {
                    "id": "6295610",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Электронные крышки биде",
              "attributes": {
                "id": "6295634",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Электронные крышки биде Duravit 1",
                  "attributes": {
                    "id": "6295635",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Электронные крышки биде Geberit 3",
                  "attributes": {
                    "id": "6295636",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Электронные крышки биде Roca 4",
                  "attributes": {
                    "id": "6295637",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Электронные крышки биде Toto 4",
                  "attributes": {
                    "id": "6295638",
                    "rel": "cat_visible"
                  }
                }
              ]
            },
            {
              "data": "Сопутствующая продукция",
              "attributes": {
                "id": "6295639",
                "rel": "cat_visible"
              },
              "children": [
                {
                  "data": "Гибкая подводка 4",
                  "attributes": {
                    "id": "6295640",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Манжеты для унитаза 1",
                  "attributes": {
                    "id": "6295641",
                    "rel": "cat_visible"
                  }
                },
                {
                  "data": "Фановые отводы для слива 8",
                  "attributes": {
                    "id": "6295642",
                    "rel": "cat_visible"
                  }
                }
              ]
            }
          ]
        },
        {
          "data": "Аксессуары для ванной и туалета",
          "attributes": {
            "id": "6295643",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Аксессуары Am Pm 25",
              "attributes": {
                "id": "6295644",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аксессуары Aquanet 26",
              "attributes": {
                "id": "6295647",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аксессуары Boheme 142",
              "attributes": {
                "id": "6295650",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аксессуары Bugnatese 5",
              "attributes": {
                "id": "6295664",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аксессуары Elghansa 65",
              "attributes": {
                "id": "6295665",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аксессуары Geesa 90",
              "attributes": {
                "id": "6295689",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аксессуары Hansgrohe 19",
              "attributes": {
                "id": "6295699",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аксессуары Jika 24",
              "attributes": {
                "id": "6295710",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аксессуары Keuco 6",
              "attributes": {
                "id": "6295711",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Аксессуары Wasserkraft 488",
              "attributes": {
                "id": "6295712",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Сопутствующая продукция",
          "attributes": {
            "id": "6295871",
            "rel": "cat_visible"
          },
          "children": [
            {
              "data": "Ruspanel 36",
              "attributes": {
                "id": "6295872",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Бордюры для ванной 7",
              "attributes": {
                "id": "6295873",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Карнизы для ванн 24",
              "attributes": {
                "id": "6295874",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Крепежные элементы 28",
              "attributes": {
                "id": "6295875",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Подголовники для ванн 34",
              "attributes": {
                "id": "6295876",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Ручки для ванн 4",
              "attributes": {
                "id": "6295877",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Сиденья для душевых кабин 14",
              "attributes": {
                "id": "6295878",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Сифоны, сливы переливы 182",
              "attributes": {
                "id": "6295879",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Средства для очистки и ухода 14",
              "attributes": {
                "id": "6295911",
                "rel": "cat_visible"
              }
            },
            {
              "data": "Сушилки для рук 5",
              "attributes": {
                "id": "6295912",
                "rel": "cat_visible"
              }
            }
          ]
        },
        {
          "data": "Распродажа 18",
          "attributes": {
            "id": "6295913",
            "rel": "cat_visible"
          }
        }
      ]
    }
  ]
}';

$dirStructure = json_decode($dirStructureRaw, true);

$csv[] = [
    'category_id',
    'parent_id',
    'name(en-gb)',
    'name(ru-ru)',
    'top',
    'columns',
    'sort_order',
    'image_name',
    'date_added',
    'date_modified',
    //'seo_keyword',
    'description(en-gb)',
    'description(ru-ru)',
    'meta_title(en-gb)',
    'meta_title(ru-ru)',
    'meta_description(en-gb)',
    'meta_description(ru-ru)',
    'meta_keywords(en-gb)',
    'meta_keywords(ru-ru)',
    'store_ids',
    'layout',
    'status',
];

function parseElems($elems, $parent_id = 0)
{
    global $csv;

    //static $categId = 1;

    foreach ($elems as $e) {
        $name = $e['data'];
        //TODO: костыль - убираем последнее число если есть
        $name = preg_replace('/\s+\d+$/','', $name);
        $csv[] = [
            $e['attributes']['id'], //'category_id',
            $parent_id, //'parent_id',
            $name, //'name(en-gb)',
            $name, //'name(ru-ru)',
            !$parent_id ? 'true' : 'false', //'top',
            1, //TODO: расчитывать из кол-ва потомков 'columns',
            0, //TODO: рассмотреть 'sort_order',
            '', //'image_name', //TODO: сделать
            date('Y-m-d H:i:s'), //'date_added',
            date('Y-m-d H:i:s'), //'date_modified',
            //makeSlugs($e['data']), //'seo_keyword',
            '', //'description(en-gb)',
            '', //'description(ru-ru)',
            '', //'meta_title(en-gb)',
            '', //'meta_title(ru-ru)',
            '', //'meta_description(en-gb)',
            '', //'meta_description(ru-ru)',
            '', //'meta_keywords(en-gb)',
            '', //'meta_keywords(ru-ru)',
            0, //'store_ids',
            '', //'layout',
            'true', //'status',
        ];

        if (!empty($e['children'])) {
            parseElems($e['children'], $e['attributes']['id']);
        }
    }
}

parseElems($dirStructure['children']);

/*function format_uri($string, $separator = '-')
{
    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
    $special_cases = array('&' => 'and', "'" => '');
    $string = mb_strtolower(trim($string), 'UTF-8');
    $string = str_replace(array_keys($special_cases), array_values($special_cases), $string);
    $string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
    $string = preg_replace("/[$separator]+/u", "$separator", $string);
    return $string;
}*/

function my_str_split($string)
{
    $slen=strlen($string);
    for($i=0; $i<$slen; $i++)
    {
        $sArray[$i]=$string{$i};
    }
    return $sArray;
}

function noDiacritics($string)
{
    //cyrylic transcription
    $cyrylicFrom = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
    $cyrylicTo   = array('A', 'B', 'W', 'G', 'D', 'Ie', 'Io', 'Z', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'Ch', 'C', 'Tch', 'Sh', 'Shtch', '', 'Y', '', 'E', 'Iu', 'Ia', 'a', 'b', 'w', 'g', 'd', 'ie', 'io', 'z', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'ch', 'c', 'tch', 'sh', 'shtch', '', 'y', '', 'e', 'iu', 'ia');


    $from = array("Á", "À", "Â", "Ä", "Ă", "Ā", "Ã", "Å", "Ą", "Æ", "Ć", "Ċ", "Ĉ", "Č", "Ç", "Ď", "Đ", "Ð", "É", "È", "Ė", "Ê", "Ë", "Ě", "Ē", "Ę", "Ə", "Ġ", "Ĝ", "Ğ", "Ģ", "á", "à", "â", "ä", "ă", "ā", "ã", "å", "ą", "æ", "ć", "ċ", "ĉ", "č", "ç", "ď", "đ", "ð", "é", "è", "ė", "ê", "ë", "ě", "ē", "ę", "ə", "ġ", "ĝ", "ğ", "ģ", "Ĥ", "Ħ", "I", "Í", "Ì", "İ", "Î", "Ï", "Ī", "Į", "Ĳ", "Ĵ", "Ķ", "Ļ", "Ł", "Ń", "Ň", "Ñ", "Ņ", "Ó", "Ò", "Ô", "Ö", "Õ", "Ő", "Ø", "Ơ", "Œ", "ĥ", "ħ", "ı", "í", "ì", "i", "î", "ï", "ī", "į", "ĳ", "ĵ", "ķ", "ļ", "ł", "ń", "ň", "ñ", "ņ", "ó", "ò", "ô", "ö", "õ", "ő", "ø", "ơ", "œ", "Ŕ", "Ř", "Ś", "Ŝ", "Š", "Ş", "Ť", "Ţ", "Þ", "Ú", "Ù", "Û", "Ü", "Ŭ", "Ū", "Ů", "Ų", "Ű", "Ư", "Ŵ", "Ý", "Ŷ", "Ÿ", "Ź", "Ż", "Ž", "ŕ", "ř", "ś", "ŝ", "š", "ş", "ß", "ť", "ţ", "þ", "ú", "ù", "û", "ü", "ŭ", "ū", "ů", "ų", "ű", "ư", "ŵ", "ý", "ŷ", "ÿ", "ź", "ż", "ž");
    $to   = array("A", "A", "A", "AE", "A", "A", "A", "A", "A", "AE", "C", "C", "C", "C", "C", "D", "D", "D", "E", "E", "E", "E", "E", "E", "E", "E", "G", "G", "G", "G", "G", "a", "a", "a", "ae", "ae", "a", "a", "a", "a", "ae", "c", "c", "c", "c", "c", "d", "d", "d", "e", "e", "e", "e", "e", "e", "e", "e", "g", "g", "g", "g", "g", "H", "H", "I", "I", "I", "I", "I", "I", "I", "I", "IJ", "J", "K", "L", "L", "N", "N", "N", "N", "O", "O", "O", "OE", "O", "O", "O", "O", "CE", "h", "h", "i", "i", "i", "i", "i", "i", "i", "i", "ij", "j", "k", "l", "l", "n", "n", "n", "n", "o", "o", "o", "oe", "o", "o", "o", "o", "o", "R", "R", "S", "S", "S", "S", "T", "T", "T", "U", "U", "U", "UE", "U", "U", "U", "U", "U", "U", "W", "Y", "Y", "Y", "Z", "Z", "Z", "r", "r", "s", "s", "s", "s", "ss", "t", "t", "b", "u", "u", "u", "ue", "u", "u", "u", "u", "u", "u", "w", "y", "y", "y", "z", "z", "z");


    $from = array_merge($from, $cyrylicFrom);
    $to   = array_merge($to, $cyrylicTo);

    $newstring=str_replace($from, $to, $string);
    return $newstring;
}

function makeSlugs($string, $maxlen=0)
{
    $newStringTab=array();
    $string=strtolower(noDiacritics($string));
    if(function_exists('str_split'))
    {
        $stringTab=str_split($string);
    }
    else
    {
        $stringTab=my_str_split($string);
    }

    $numbers=array("0","1","2","3","4","5","6","7","8","9","-");
    //$numbers=array("0","1","2","3","4","5","6","7","8","9");

    foreach($stringTab as $letter)
    {
        if(in_array($letter, range("a", "z")) || in_array($letter, $numbers))
        {
            $newStringTab[]=$letter;
        }
        elseif($letter==" ")
        {
            $newStringTab[]="-";
        }
    }

    if(count($newStringTab))
    {
        $newString=implode($newStringTab);
        if($maxlen>0)
        {
            $newString=substr($newString, 0, $maxlen);
        }

        $newString = removeDuplicates('--', '-', $newString);
    }
    else
    {
        $newString='';
    }

    return $newString;
}


function checkSlug($sSlug)
{
    if(preg_match("/^[a-zA-Z0-9]+[a-zA-Z0-9\-]*$/", $sSlug) == 1)
    {
        return true;
    }

    return false;
}

function removeDuplicates($sSearch, $sReplace, $sSubject)
{
    $i=0;
    do{

        $sSubject=str_replace($sSearch, $sReplace, $sSubject);
        $pos=strpos($sSubject, $sSearch);

        $i++;
        if($i>100)
        {
            die('removeDuplicates() loop error');
        }

    }while($pos!==false);

    return $sSubject;
}

$fp = fopen('file_4.csv', 'w');

foreach ($csv as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
