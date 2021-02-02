<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tab_Country = [
            ['id' => '1', 'libCountry' => '4;AF;AFG;Afghanistan;Afghanistan'],
            ['id' => '2', 'libCountry' => '8;AL;ALB;Albania;Albanie'],
            ['id' => '3', 'libCountry' => '10;AQ;ATA;Antarctica;Antarctique'],
            ['id' => '4', 'libCountry' => '12;DZ;DZA;Algeria;Algérie'],
            ['id' => '5', 'libCountry' => '16;AS;ASM;American Samoa;Samoa Américaines'],
            ['id' => '6', 'libCountry' => '20;AD;AND;Andorra;Andorre'],
            ['id' => '7', 'libCountry' => '24;AO;AGO;Angola;Angola'],
            ['id' => '8', 'libCountry' => '28;AG;ATG;Antigua and Barbuda;Antigua-et-Barbuda'],
            ['id' => '9', 'libCountry' => '31;AZ;AZE;Azerbaijan;Azerbaïdjan'],
            ['id' => '10', 'libCountry' => '32;AR;ARG;Argentina;Argentine'],
            ['id' => '11', 'libCountry' => '36;AU;AUS;Australia;Australie'],
            ['id' => '12', 'libCountry' => '40;AT;AUT;Austria;Autriche'],
            ['id' => '13', 'libCountry' => '44;BS;BHS;Bahamas;Bahamas'],
            ['id' => '14', 'libCountry' => '48;BH;BHR;Bahrain;Bahreïn'],
            ['id' => '15', 'libCountry' => '50;BD;BGD;Bangladesh;Bangladesh'],
            ['id' => '16', 'libCountry' => '51;AM;ARM;Armenia;Arménie'],
            ['id' => '17', 'libCountry' => '52;BB;BRB;Barbados;Barbade'],
            ['id' => '18', 'libCountry' => '56;BE;BEL;Belgium;Belgique'],
            ['id' => '19', 'libCountry' => '60;BM;BMU;Bermuda;Bermudes'],
            ['id' => '20', 'libCountry' => '64;BT;BTN;Bhutan;Bhoutan'],
            ['id' => '21', 'libCountry' => '68;BO;BOL;Bolivia;Bolivie'],
            ['id' => '22', 'libCountry' => '70;BA;BIH;Bosnia and Herzegovina;Bosnie-Herzégovine'],
            ['id' => '23', 'libCountry' => '72;BW;BWA;Botswana;Botswana'],
            ['id' => '24', 'libCountry' => '74;BV;BVT;Bouvet Island;Île Bouvet'],
            ['id' => '25', 'libCountry' => '76;BR;BRA;Brazil;Brésil'],
            ['id' => '26', 'libCountry' => '84;BZ;BLZ;Belize;Belize'],
            ['id' => '27', 'libCountry' => '86;IO;IOT;British Indian Ocean Territory;Territoire Britannique de l\'Océan Indien'],
            ['id' => '28', 'libCountry' => '90;SB;SLB;Solomon Islands;Îles Salomon'],
            ['id' => '29', 'libCountry' => '92;VG;VGB;British Virgin Islands;Îles Vierges Britanniques'],
            ['id' => '30', 'libCountry' => '96;BN;BRN;Brunei Darussalam;Brunéi Darussalam'],
            ['id' => '31', 'libCountry' => '100;BG;BGR;Bulgaria;Bulgarie'],
            ['id' => '32', 'libCountry' => '104;MM;MMR;Myanmar;Myanmar'],
            ['id' => '33', 'libCountry' => '108;BI;BDI;Burundi;Burundi'],
            ['id' => '34', 'libCountry' => '112;BY;BLR;Belarus;Bélarus'],
            ['id' => '35', 'libCountry' => '116;KH;KHM;Cambodia;Cambodge'],
            ['id' => '36', 'libCountry' => '120;CM;CMR;Cameroon;Cameroun'],
            ['id' => '37', 'libCountry' => '124;CA;CAN;Canada;Canada'],
            ['id' => '38', 'libCountry' => '132;CV;CPV;Cape Verde;Cap-vert'],
            ['id' => '39', 'libCountry' => '136;KY;CYM;Cayman Islands;Îles Caïmanes'],
            ['id' => '40', 'libCountry' => '140;CF;CAF;Central African;République Centrafricaine'],
            ['id' => '41', 'libCountry' => '144;LK;LKA;Sri Lanka;Sri Lanka'],
            ['id' => '42', 'libCountry' => '148;TD;TCD;Chad;Tchad'],
            ['id' => '43', 'libCountry' => '152;CL;CHL;Chile;Chili'],
            ['id' => '44', 'libCountry' => '156;CN;CHN;China;Chine'],
            ['id' => '45', 'libCountry' => '158;TW;TWN;Taiwan;Taïwan'],
            ['id' => '46', 'libCountry' => '162;CX;CXR;Christmas Island;Île Christmas'],
            ['id' => '47', 'libCountry' => '166;CC;CCK;Cocos (Keeling) Islands;Îles Cocos (Keeling)'],
            ['id' => '48', 'libCountry' => '170;CO;COL;Colombia;Colombie'],
            ['id' => '49', 'libCountry' => '174;KM;COM;Comoros;Comores'],
            ['id' => '50', 'libCountry' => '175;YT;MYT;Mayotte;Mayotte'],
            ['id' => '51', 'libCountry' => '178;CG;COG;Republic of the Congo;République du Congo'],
            ['id' => '52', 'libCountry' => '180;CD;COD;The Democratic Republic Of The Congo;République Démocratique du Congo'],
            ['id' => '53', 'libCountry' => '184;CK;COK;Cook Islands;Îles Cook'],
            ['id' => '54', 'libCountry' => '188;CR;CRI;Costa Rica;Costa Rica'],
            ['id' => '55', 'libCountry' => '191;HR;HRV;Croatia;Croatie'],
            ['id' => '56', 'libCountry' => '192;CU;CUB;Cuba;Cuba'],
            ['id' => '57', 'libCountry' => '196;CY;CYP;Cyprus;Chypre'],
            ['id' => '58', 'libCountry' => '203;CZ;CZE;Czech Republic;République Tchèque'],
            ['id' => '59', 'libCountry' => '204;BJ;BEN;Benin;Bénin'],
            ['id' => '60', 'libCountry' => '208;DK;DNK;Denmark;Danemark'],
            ['id' => '61', 'libCountry' => '212;DM;DMA;Dominica;Dominique'],
            ['id' => '62', 'libCountry' => '214;DO;DOM;Dominican Republic;République Dominicaine'],
            ['id' => '63', 'libCountry' => '218;EC;ECU;Ecuador;Équateur'],
            ['id' => '64', 'libCountry' => '222;SV;SLV;El Salvador;El Salvador'],
            ['id' => '65', 'libCountry' => '226;GQ;GNQ;Equatorial Guinea;Guinée Équatoriale'],
            ['id' => '66', 'libCountry' => '231;ET;ETH;Ethiopia;Éthiopie'],
            ['id' => '67', 'libCountry' => '232;ER;ERI;Eritrea;Érythrée'],
            ['id' => '68', 'libCountry' => '233;EE;EST;Estonia;Estonie'],
            ['id' => '69', 'libCountry' => '234;FO;FRO;Faroe Islands;Îles Féroé'],
            ['id' => '70', 'libCountry' => '238;FK;FLK;Falkland Islands;Îles (malvinas) Falkland'],
            ['id' => '71', 'libCountry' => '239;GS;SGS;South Georgia and the South Sandwich Islands;Géorgie du Sud et les Îles Sandwich du Sud'],
            ['id' => '72', 'libCountry' => '242;FJ;FJI;Fiji;Fidji'],
            ['id' => '73', 'libCountry' => '246;FI;FIN;Finland;Finlande'],
            ['id' => '74', 'libCountry' => '248;AX;ALA;Åland Islands;Îles Åland'],
            ['id' => '75', 'libCountry' => '250;FR;FRA;France;France'],
            ['id' => '76', 'libCountry' => '254;GF;GUF;French Guiana;Guyane Française'],
            ['id' => '77', 'libCountry' => '258;PF;PYF;French Polynesia;Polynésie Française'],
            ['id' => '78', 'libCountry' => '260;TF;ATF;French Southern Territories;Terres Australes Françaises'],
            ['id' => '79', 'libCountry' => '262;DJ;DJI;Djibouti;Djibouti'],
            ['id' => '80', 'libCountry' => '266;GA;GAB;Gabon;Gabon'],
            ['id' => '81', 'libCountry' => '268;GE;GEO;Georgia;Géorgie'],
            ['id' => '82', 'libCountry' => '270;GM;GMB;Gambia;Gambie'],
            ['id' => '83', 'libCountry' => '275;PS;PSE;Occupied Palestinian Territory;Territoire Palestinien Occupé'],
            ['id' => '84', 'libCountry' => '276;DE;DEU;Germany;Allemagne'],
            ['id' => '85', 'libCountry' => '288;GH;GHA;Ghana;Ghana'],
            ['id' => '86', 'libCountry' => '292;GI;GIB;Gibraltar;Gibraltar'],
            ['id' => '87', 'libCountry' => '296;KI;KIR;Kiribati;Kiribati'],
            ['id' => '88', 'libCountry' => '300;GR;GRC;Greece;Grèce'],
            ['id' => '89', 'libCountry' => '304;GL;GRL;Greenland;Groenland'],
            ['id' => '90', 'libCountry' => '308;GD;GRD;Grenada;Grenade'],
            ['id' => '91', 'libCountry' => '312;GP;GLP;Guadeloupe;Guadeloupe'],
            ['id' => '92', 'libCountry' => '316;GU;GUM;Guam;Guam'],
            ['id' => '93', 'libCountry' => '320;GT;GTM;Guatemala;Guatemala'],
            ['id' => '94', 'libCountry' => '324;GN;GIN;Guinea;Guinée'],
            ['id' => '95', 'libCountry' => '328;GY;GUY;Guyana;Guyana'],
            ['id' => '96', 'libCountry' => '332;HT;HTI;Haiti;Haïti'],
            ['id' => '97', 'libCountry' => '334;HM;HMD;Heard Island and McDonald Islands;Îles Heard et Mcdonald'],
            ['id' => '98', 'libCountry' => '336;VA;VAT;Vatican City State;Saint-Siège (état de la Cité du Vatican)'],
            ['id' => '99', 'libCountry' => '340;HN;HND;Honduras;Honduras'],
            ['id' => '100', 'libCountry' => '344;HK;HKG;Hong Kong;Hong-Kong'],
            ['id' => '101', 'libCountry' => '348;HU;HUN;Hungary;Hongrie'],
            ['id' => '102', 'libCountry' => '352;IS;ISL;Iceland;Islande'],
            ['id' => '103', 'libCountry' => '356;IN;IND;India;Inde'],
            ['id' => '104', 'libCountry' => '360;ID;IDN;Indonesia;Indonésie'],
            ['id' => '105', 'libCountry' => '364;IR;IRN;Islamic Republic of Iran;République Islamique d\'Iran'],
            ['id' => '106', 'libCountry' => '368;IQ;IRQ;Iraq;Iraq'],
            ['id' => '107', 'libCountry' => '372;IE;IRL;Ireland;Irlande'],
            ['id' => '108', 'libCountry' => '376;IL;ISR;Israel;Israël'],
            ['id' => '109', 'libCountry' => '380;IT;ITA;Italy;Italie'],
            ['id' => '110', 'libCountry' => '384;CI;CIV;Côte d\'Ivoire;Côte d\'Ivoire'],
            ['id' => '111', 'libCountry' => '388;JM;JAM;Jamaica;Jamaïque'],
            ['id' => '112', 'libCountry' => '392;JP;JPN;Japan;Japon'],
            ['id' => '113', 'libCountry' => '398;KZ;KAZ;Kazakhstan;Kazakhstan'],
            ['id' => '114', 'libCountry' => '400;JO;JOR;Jordan;Jordanie'],
            ['id' => '115', 'libCountry' => '404;KE;KEN;Kenya;Kenya'],
            ['id' => '116', 'libCountry' => '408;KP;PRK;Democratic People\'s Republic of Korea;République Populaire Démocratique de Corée'],
            ['id' => '117', 'libCountry' => '410;KR;KOR;Republic of Korea;République de Corée'],
            ['id' => '118', 'libCountry' => '414;KW;KWT;Kuwait;Koweït'],
            ['id' => '119', 'libCountry' => '417;KG;KGZ;Kyrgyzstan;Kirghizistan'],
            ['id' => '120', 'libCountry' => '418;LA;LAO;Lao People\'s Democratic Republic;République Démocratique Populaire Lao'],
            ['id' => '121', 'libCountry' => '422;LB;LBN;Lebanon;Liban'],
            ['id' => '122', 'libCountry' => '426;LS;LSO;Lesotho;Lesotho'],
            ['id' => '123', 'libCountry' => '428;LV;LVA;Latvia;Lettonie'],
            ['id' => '124', 'libCountry' => '430;LR;LBR;Liberia;Libéria'],
            ['id' => '125', 'libCountry' => '434;LY;LBY;Libyan Arab Jamahiriya;Jamahiriya Arabe Libyenne'],
            ['id' => '126', 'libCountry' => '438;LI;LIE;Liechtenstein;Liechtenstein'],
            ['id' => '127', 'libCountry' => '440;LT;LTU;Lithuania;Lituanie'],
            ['id' => '128', 'libCountry' => '442;LU;LUX;Luxembourg;Luxembourg'],
            ['id' => '129', 'libCountry' => '446;MO;MAC;Macao;Macao'],
            ['id' => '130', 'libCountry' => '450;MG;MDG;Madagascar;Madagascar'],
            ['id' => '131', 'libCountry' => '454;MW;MWI;Malawi;Malawi'],
            ['id' => '132', 'libCountry' => '458;MY;MYS;Malaysia;Malaisie'],
            ['id' => '133', 'libCountry' => '462;MV;MDV;Maldives;Maldives'],
            ['id' => '134', 'libCountry' => '466;ML;MLI;Mali;Mali'],
            ['id' => '135', 'libCountry' => '470;MT;MLT;Malta;Malte'],
            ['id' => '136', 'libCountry' => '474;MQ;MTQ;Martinique;Martinique'],
            ['id' => '137', 'libCountry' => '478;MR;MRT;Mauritania;Mauritanie'],
            ['id' => '138', 'libCountry' => '480;MU;MUS;Mauritius;Maurice'],
            ['id' => '139', 'libCountry' => '484;MX;MEX;Mexico;Mexique'],
            ['id' => '140', 'libCountry' => '492;MC;MCO;Monaco;Monaco'],
            ['id' => '141', 'libCountry' => '496;MN;MNG;Mongolia;Mongolie'],
            ['id' => '142', 'libCountry' => '498;MD;MDA;Republic of Moldova;République de Moldova'],
            ['id' => '143', 'libCountry' => '500;MS;MSR;Montserrat;Montserrat'],
            ['id' => '144', 'libCountry' => '504;MA;MAR;Morocco;Maroc'],
            ['id' => '145', 'libCountry' => '508;MZ;MOZ;Mozambique;Mozambique'],
            ['id' => '146', 'libCountry' => '512;OM;OMN;Oman;Oman'],
            ['id' => '147', 'libCountry' => '516;NA;NAM;Namibia;Namibie'],
            ['id' => '148', 'libCountry' => '520;NR;NRU;Nauru;Nauru'],
            ['id' => '149', 'libCountry' => '524;NP;NPL;Nepal;Népal'],
            ['id' => '150', 'libCountry' => '528;NL;NLD;Netherlands;Pays-Bas'],
            ['id' => '151', 'libCountry' => '530;AN;ANT;Netherlands Antilles;Antilles Néerlandaises'],
            ['id' => '152', 'libCountry' => '533;AW;ABW;Aruba;Aruba'],
            ['id' => '153', 'libCountry' => '540;NC;NCL;New Caledonia;Nouvelle-Calédonie'],
            ['id' => '154', 'libCountry' => '548;VU;VUT;Vanuatu;Vanuatu'],
            ['id' => '155', 'libCountry' => '554;NZ;NZL;New Zealand;Nouvelle-Zélande'],
            ['id' => '156', 'libCountry' => '558;NI;NIC;Nicaragua;Nicaragua'],
            ['id' => '157', 'libCountry' => '562;NE;NER;Niger;Niger'],
            ['id' => '158', 'libCountry' => '566;NG;NGA;Nigeria;Nigéria'],
            ['id' => '159', 'libCountry' => '570;NU;NIU;Niue;Niué'],
            ['id' => '160', 'libCountry' => '574;NF;NFK;Norfolk Island;Île Norfolk'],
            ['id' => '161', 'libCountry' => '578;NO;NOR;Norway;Norvège'],
            ['id' => '162', 'libCountry' => '580;MP;MNP;Northern Mariana Islands;Îles Mariannes du Nord'],
            ['id' => '163', 'libCountry' => '581;UM;UMI;United States Minor Outlying Islands;Îles Mineures Éloignées des États-Unis'],
            ['id' => '164', 'libCountry' => '583;FM;FSM;Federated States of Micronesia;États Fédérés de Micronésie'],
            ['id' => '165', 'libCountry' => '584;MH;MHL;Marshall Islands;Îles Marshall'],
            ['id' => '166', 'libCountry' => '585;PW;PLW;Palau;Palaos'],
            ['id' => '167', 'libCountry' => '586;PK;PAK;Pakistan;Pakistan'],
            ['id' => '168', 'libCountry' => '591;PA;PAN;Panama;Panama'],
            ['id' => '169', 'libCountry' => '598;PG;PNG;Papua New Guinea;Papouasie-Nouvelle-Guinée'],
            ['id' => '170', 'libCountry' => '600;PY;PRY;Paraguay;Paraguay'],
            ['id' => '171', 'libCountry' => '604;PE;PER;Peru;Pérou'],
            ['id' => '172', 'libCountry' => '608;PH;PHL;Philippines;Philippines'],
            ['id' => '173', 'libCountry' => '612;PN;PCN;Pitcairn;Pitcairn'],
            ['id' => '174', 'libCountry' => '616;PL;POL;Poland;Pologne'],
            ['id' => '175', 'libCountry' => '620;PT;PRT;Portugal;Portugal'],
            ['id' => '176', 'libCountry' => '624;GW;GNB;Guinea-Bissau;Guin]ée-Bissau'],
            ['id' => '177', 'libCountry' => '626;TL;TLS;Timor-Leste;Timor-Leste'],
            ['id' => '178', 'libCountry' => '630;PR;PRI;Puerto Rico;Porto Rico'],
            ['id' => '179', 'libCountry' => '634;QA;QAT;Qatar;Qatar'],
            ['id' => '180', 'libCountry' => '638;RE;REU;Réunion;Réunion'],
            ['id' => '181', 'libCountry' => '642;RO;ROU;Romania;Roumanie'],
            ['id' => '182', 'libCountry' => '643;RU;RUS;Russian Federation;Fédération de Russie'],
            ['id' => '183', 'libCountry' => '646;RW;RWA;Rwanda;Rwanda'],
            ['id' => '184', 'libCountry' => '654;SH;SHN;Saint Helena;Sainte-Hélène'],
            ['id' => '185', 'libCountry' => '659;KN;KNA;Saint Kitts and Nevis;Saint-Kitts-et-Nevis'],
            ['id' => '186', 'libCountry' => '660;AI;AIA;Anguilla;Anguilla'],
            ['id' => '187', 'libCountry' => '662;LC;LCA;Saint Lucia;Sainte-Lucie'],
            ['id' => '188', 'libCountry' => '666;PM;SPM;Saint-Pierre and Miquelon;Saint-Pierre-et-Miquelon'],
            ['id' => '189', 'libCountry' => '670;VC;VCT;Saint Vincent and the Grenadines;Saint-Vincent-et-les Grenadines'],
            ['id' => '190', 'libCountry' => '674;SM;SMR;San Marino;Saint-Marin'],
            ['id' => '191', 'libCountry' => '678;ST;STP;Sao Tome and Principe;Sao Tomé-et-Principe'],
            ['id' => '192', 'libCountry' => '682;SA;SAU;Saudi Arabia;Arabie Saoudite'],
            ['id' => '193', 'libCountry' => '686;SN;SEN;Senegal;Sénégal'],
            ['id' => '194', 'libCountry' => '690;SC;SYC;Seychelles;Seychelles'],
            ['id' => '195', 'libCountry' => '694;SL;SLE;Sierra Leone;Sierra Leone'],
            ['id' => '196', 'libCountry' => '702;SG;SGP;Singapore;Singapour'],
            ['id' => '197', 'libCountry' => '703;SK;SVK;Slovakia;Slovaquie'],
            ['id' => '198', 'libCountry' => '704;VN;VNM;Vietnam;Viet Nam'],
            ['id' => '199', 'libCountry' => '705;SI;SVN;Slovenia;Slovénie'],
            ['id' => '200', 'libCountry' => '706;SO;SOM;Somalia;Somalie'],
            ['id' => '201', 'libCountry' => '710;ZA;ZAF;South Africa;Afrique du Sud'],
            ['id' => '202', 'libCountry' => '716;ZW;ZWE;Zimbabwe;Zimbabwe'],
            ['id' => '203', 'libCountry' => '724;ES;ESP;Spain;Espagne'],
            ['id' => '204', 'libCountry' => '732;EH;ESH;Western Sahara;Sahara Occidental'],
            ['id' => '205', 'libCountry' => '736;SD;SDN;Sudan;Soudan'],
            ['id' => '206', 'libCountry' => '740;SR;SUR;Suriname;Suriname'],
            ['id' => '207', 'libCountry' => '744;SJ;SJM;Svalbard and Jan Mayen;Svalbard etÎle Jan Mayen'],
            ['id' => '208', 'libCountry' => '748;SZ;SWZ;Swaziland;Swaziland'],
            ['id' => '209', 'libCountry' => '752;SE;SWE;Sweden;Suède'],
            ['id' => '210', 'libCountry' => '756;CH;CHE;Switzerland;Suisse'],
            ['id' => '211', 'libCountry' => '760;SY;SYR;Syrian Arab Republic;République Arabe Syrienne'],
            ['id' => '212', 'libCountry' => '762;TJ;TJK;Tajikistan;Tadjikistan'],
            ['id' => '213', 'libCountry' => '764;TH;THA;Thailand;Thaïlande'],
            ['id' => '214', 'libCountry' => '768;TG;TGO;Togo;Togo'],
            ['id' => '215', 'libCountry' => '772;TK;TKL;Tokelau;Tokelau'],
            ['id' => '216', 'libCountry' => '776;TO;TON;Tonga;Tonga'],
            ['id' => '217', 'libCountry' => '780;TT;TTO;Trinidad and Tobago;Trinité-et-Tobago'],
            ['id' => '218', 'libCountry' => '784;AE;ARE;United Arab Emirates;Émirats Arabes Unis'],
            ['id' => '219', 'libCountry' => '788;TN;TUN;Tunisia;Tunisie'],
            ['id' => '220', 'libCountry' => '792;TR;TUR;Turkey;Turquie'],
            ['id' => '221', 'libCountry' => '795;TM;TKM;Turkmenistan;Turkménistan'],
            ['id' => '222', 'libCountry' => '796;TC;TCA;Turks and Caicos Islands;Îles Turks et Caïques'],
            ['id' => '223', 'libCountry' => '798;TV;TUV;Tuvalu;Tuvalu'],
            ['id' => '224', 'libCountry' => '800;UG;UGA;Uganda;Ouganda'],
            ['id' => '225', 'libCountry' => '804;UA;UKR;Ukraine;Ukraine'],
            ['id' => '226', 'libCountry' => '807;MK;MKD;The Former Yugoslav Republic of Macedonia;L\'ex-République Yougoslave de Macédoine'],
            ['id' => '227', 'libCountry' => '818;EG;EGY;Egypt;Égypte'],
            ['id' => '228', 'libCountry' => '826;GB;GBR;United Kingdom;Royaume-Uni'],
            ['id' => '229', 'libCountry' => '833;IM;IMN;Isle of Man;Île de Man'],
            ['id' => '230', 'libCountry' => '834;TZ;TZA;United Republic Of Tanzania;République-Unie de Tanzanie'],
            ['id' => '231', 'libCountry' => '840;US;USA;United States;États-Unis'],
            ['id' => '232', 'libCountry' => '850;VI;VIR;U.S. Virgin Islands;Îles Vierges des États-Unis'],
            ['id' => '233', 'libCountry' => '854;BF;BFA;Burkina Faso;Burkina Faso'],
            ['id' => '234', 'libCountry' => '858;UY;URY;Uruguay;Uruguay'],
            ['id' => '235', 'libCountry' => '860;UZ;UZB;Uzbekistan;Ouzbékistan'],
            ['id' => '236', 'libCountry' => '862;VE;VEN;Venezuela;Venezuela'],
            ['id' => '237', 'libCountry' => '876;WF;WLF;Wallis and Futuna;Wallis et Futuna'],
            ['id' => '238', 'libCountry' => '882;WS;WSM;Samoa;Samoa'],
            ['id' => '239', 'libCountry' => '887;YE;YEM;Yemen;Yémen'],
            ['id' => '240', 'libCountry' => '891;CS;SCG;Serbia and Montenegro;Serbie-et-Monténégro'],
            ['id' => '241', 'libCountry' => '894;ZM;ZMB;Zambia;Zambie']
        ];

        foreach ($tab_Country as $countri){
            DB::table('countries')->insert(array(
                'id' => $countri['id'],
                'libCountry' => $countri['libCountry']
            ));
        }
    }
}
