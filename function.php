<?php
/* This code is developed by Dr. Dhaval Patel (drdhaval2785@gmail.com) of www.sanskritworld.in and Ms. Sivakumari Katuri.
  * Layout assistance by Mr Marcis Gasuns.
  * Available under GNU licence.
  * Version 1.1 date 17/11/2013
  * The latest source code is available at https://github.com/drdhaval2785/sanskrit
  * For setup, copy and paste sandhi.html, sandhi.php, function.php, mystyle.css, slp-dev.php and dev-slp.php to your localhost and server and run sandhi.html.
  * sandhi.html is the frontend for the code.
  * function.php stores the frequently used functions in this code (The description on how to use the code is there in function.php.
  * slp-dev.php is for converting SLP1 data to Devanagari. dev-slp.php is for converting Devanagari data to SLP1.
  * Mystyle.css is stylesheet where you can change your preferences.
  */

/* Defining grammatical arrays */
$shiv=array("a","i","u","-R","f","x","-k","e","o","-N","E","O","-c","h","y","v","r","-w","l","-R","Y","m","N","R","n","-m","J","B","-Y","G","Q","D","-z","j","b","g","q","d","-S","K","P","C","W","T","c","w","t","-v","k","p","-y","S","z","s","-r","h","-l");
$kantha = array("a","A","k","K","g","G","N","h","H"); // kanThya letters
$talu = array("i","I","c","C","j","J","Y","y","S"); // tAlavya letters
$murdha = array("f","F","w","W","q","Q","R","r","z"); // mUrdhanya letters
$danta = array("x","X","t","T","d","D","n","l","s"); // dantavya letters
$oshtha = array("u","U","p","P","b","B","m"); // oSThya letters
$nasika = array("N","Y","R","n","m","M"); // anunAsika letters
$kanthatalu = array ("e","E"); // kanThatAlu letters
$kanthoshtha = array("o","O"); // kanThauSThya letters
$dantoshtha = array("v"); // dantauSThya letters
$sparsha = array("k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m"); // sparza letters
$sprushta = array("k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m",); // spRSTa letters
$ishatsprushta = array("y","r","l","v"); // iSatspRSTa letters
$vivruta = array("S","z","s","h","a","A","i","I","u","U","f","F","x","X","e","E","o","O"); // vivRta letters
$samvruta = array("a"); // saMvRta letter
$vivara = array("k","K","c","C","w","W","t","T","p","P","H","S","z","s"); // vivAra letters
$shvasa = array("k","K","c","C","w","W","t","T","p","P","H","S","z","s"); // zvAsa letters
$aghosha = array("k","K","c","C","w","W","t","T","p","P","H","S","z","s"); // aghoSa letters
$samvara = array("g","G","N","j","J","Y","q","Q","R","d","D","n","b","B","m","y","r","l","v","h"); // saMvAra letters
$nada = array("g","G","N","j","J","Y","q","Q","R","d","D","n","b","B","m","y","r","l","v","h"); // nAda letters
$ghosha = array("g","G","N","j","J","Y","q","Q","R","d","D","n","b","B","m","y","r","l","v","h"); // ghoSa letters
$alpaprana = array("k","g","c","j","w","q","t","d","p","b","y","r","l","v"); // alpaprANa letters
$mahaprana = array("K","G","C","J","W","Q","T","D","P","B","S","z","s","h"); // mahAprANa letters
$ru = array("f","F","x","X"); // R, RR, lR and lRR
$ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",); // vowels - 'ac' letters
$hl = array("k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m","y","r","l","v","S","z","s","h"); // consonants - hal letters
$al = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O","k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m","y","r","l","v","S","z","s","h","M","H");
$e = array("e","E","o","O"); // 'ec' letters
$dirgha = array("A","I","U","F","X","e","E","o","O"); // dIrgha letters
$hrasva = array("a","i","u","f","x"); // hrasva letters
$guna = array ("e","o"); // guNa letters
$vruddhi = array("E","O"); // vRddhi letters
$aa = array("a","A"); // a, A
$upasarga = array("pra","prati","api","parA","apa","upa","pari","anu","ava","vi","saM","su","ati","ni","nir","ut","aDi","dur","aBi","A"); // upasargas
$verbs_ru = array("fkz","fc","fC","fj","fYj","fR","ft","fd","fD","fn","fP","fBukz","fmP","fS","fz","fh"); // verbs starging with R.
$verbs_changed = array("kz","c","C","j","Yj","R","t","d","D","n","P","Bukz","mP","S","z","h"); // verbs with removal of R.
$ku = array("k","K","g","G","N"); // kavarga letters
$cu = array("c","C","j","J","Y"); // cavarga letters
$Tu = array("w","W","q","Q","R"); // Tavarga letters 
$tu = array("t","T","d","D","n"); // tavarga letters
$pu = array("p","P","b","B","m"); // pavarga letters 
$noco = array("ac","ic","ec","Ec"); // array where coH kuH won't apply.
$antastha = array("y","r","l","v"); // antaHstha letters
$ushma = array("S","z","s","h"); // uSma letters
$iN = array("i","I","u","U"); // 'iN' pratyAhAra
$iN1 = array("i","I","u","U","f","F","x","X","e","o","E","O","h","y","v","r","l","k","K","g","G","N"); // iN and kavarga combined.
$pratya =  array("aR","ak","ik","uk","eN","ac","ic","ec","Ec","aw","aR","iR","yaR","am","yam","Yam","Nam","yaY","Jaz","Baz","aS","haS","vaS","JaS","jaS","vaS","Cav","yay","may","Jay","Kay","cay","yar","Jar","Kar","car","Sar","al","hal","val","ral","Jal","Sal"); // valid pratyAhAras according to pANinIya vyAkaraNa
$sup = array("su!","Ow","jas","am","O","Sas","wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup"); // sup pratyayas
$acsup = array("O","jas","am","Ow","Sas","wA","Ne","Nasi!","Nas","os","Am","Ni","os"); // sup pratyayas which start with a vowel
$hlsup = array("su!","ByAm","Bis","Byas","sup"); // sup pratyayas which start with a consonant
$prathama = array("su!","O","jas","am","Ow","Sas"); // sup pratyayas of first two vibhaktis
$sarvanama = array("sarva","viSva","uBa","uBaya","atara","atama","anya","anyatara","itara","tvat","tva","nema","sima","tyad","tad","yad","etad","idam","adas","eka","dvi","yuzmad","asmad","Bavat","kim","idakam","etara"); // sarvanAmas
$zasadi = array("Sas","wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup"); // sup pratyayas, starting from zas
$sarvanamasthana = array("su!","O","jas","am","Ow","Si"); // sarvanAmasthAna pratyayas
$yacibham = array("Sas","wA","Ne","Nasi!","Nas","os","Am","os","Ni"); // sup pratyayas which mandate bha saJjJA subject to some conditions
$tRtIyAdiSvaci = array("wA","Ne","Nasi!","Nas","os","Am","Ni","os"); // sup pratyayas tRtIyA vibhakti onwards and starting with vowel
$tRtIyAdi = array("wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup"); // sup pratyayas tRtIyA vibhakti onwards
$eksup = array("su!","am","wA","Ne","Nasi!","Nas","Ni",); // ekavacana sup pratyayas
$dvisup = array("O","Ow","ByAm","ByAm","ByAm","os","os",); // dvivacana sup pratyayas
$bahusup = array("jas","Sas","Bis","Byas","Byas","Am","sup"); // bahuvacana sup pratyayas
$diksamAsa = array("uttarapUrvA","dakziRapUrvA","uttarapaScimA","dakziRapaScimA"); // diksamAsa array
$sarvanamastri = array("sarvA","viSvA","uBA","uBayA","qatarA","qatamA","anyA","anyatarA","itarA","tvA","nemA","simA","pUrvA","parA","avarA","dakziRA","uttarA","aparA","aDarA","svA","antarA","ekA","dvA","kA","idA"); // sarvanAmas feminine gender
$svasrAdi = array("svasf","tisf","catasf","nanAndf","duhitf","yAtf","mAtf"); // svasrAdi gaNa
$tyadadi = array("dvi","tyad","tad","yad","etad","idam","adas","eka","idakam"); // tyadAdi gaNa
$acdir = array("A","A","I","I","U","U","F","F","F","F","e","o","E","O",); // dIrgha of vowels
$ak1 = array("a","a","A","A","i","i","I","I","u","u","U","U","f","f","F","F","f","f","F","F","x","x","X","X","x","x","X","X");
$ak2 = array("a","A","a","A","i","I","i","I","u","U","u","U","f","F","f","F","x","X","x","X","f","F","f","F","x","X","x","X");
// cleanup of $avyaya pending.
$avyaya = array("svar","antar","prAtar","punar","sanutar","uccEs","nIcEs","SanEs","fDak","fte","yugapat","ArAt","antikAt","pfTak","hyas","svas","divA","rAtrO","sAyam","ciram","manAk","Izat","SaSvat","jozam","tUzRIm","bahis","aDas","avas","samayA","nikazA","svayam","mfzA","naktam","naY","hetO","he","hE","idDA","adDA","sAmi","antodAttAH","vat","bata","sanat","sanAt","tiras","AdyudAttAH","antarA","antareRa","mak","jyok","yok","nak","kam","Sam","sanA","sahasA","SradDA","alam","svaDA","vazaw","vinA","mAnA","svasti","anyat","asti","upAMSu","kzamA","vihAyasA","dozA","mfzA","miTyA","muDA","purA","miTo","miTas","prAyas","muhus","pravAhukam","pravAhikA","Aryahalam","aBIkzRam","sAkam","sArDam","namas","hiruk","Dik","aTa","am","Am","pratAm","praSAn","pratAn","mA","mAN","ham","vA","ha","aha","eva","evam","nUnam","SaSvat","yugapat","BUyas","kUpat","kuvit","net","cet","caR","kaccit","yatra","naha","hanta","mAkiH","mAkim","nakiH","nakim","mAN","naY","yAvat","tAvat","tve","dvE","tvE","rE","SrOzaw","vOzaw","svAhA","svaDA","vazaw","tum","taTAhi","Kalu","kila","aTo","aTa","suzWu","sma","Adaha","avadattam","ahaMyuH","astikzIrA","paSu","Sukam","yaTAkaTAcam","pAw","pyAw","aNga","hE","he","BoH","aye","dya","vizu","ekapade","yut","AtaH","am","Am","ca","vA","ha","aha","eva","evam","nUnam","SaSvat","yugapat","sUpat","kUpat","kuvit","net","cet","caR","kaccit","yatra","naha","hanta","mAkim","nakim","mAN","mANo NakAro viSezaRArTaH, mANi luN iti","iha na Bavati, mA Bavatu, ma Bavizyati","naY","yAvat","tAvat","tvA","tvE","dvE","rE","SrOzaw","vOzaw","svAhA","vazaw","svaDA","om","kila","taTA","aTa","su","sma","asmi","am","tak","uY","ukaY","velAyAm","mAtrAyAm","yaTA","yat","yam","tat","kim","purA","adDA","Dik","hAhA","he","hE","pyAw","pAw","TAw","aho","utAho","ho","tum","taTAhi","Kalu","Am","Aho","aTo","nanu","manye","miTyA","asi","brUhi","tu","nu","iti","iva","vat","cana","bata","iha","Sam","kam","anukam","nahikam","hikam","sukam","satyam","ftam","SradDA","idDA","muDA","no cet","na cet","nahi","jAtu","kaTam","kutaH","kutra","ava","anu","hAhO","hEhA","IhA","Ahosvit","Cambaw","Kam","dizwyA","paSu","vaw","saha","Anuzak","aNga","Paw","tAjak","aye","are","cawu","bAw","kum","Kum","Gum","hum","AIm","SIm","sIm","vE");
// For gaNapATha, we take gaNapATha taken after SK as base. Sometimes other words are supplied from gaNaratnamahodadhi of vardhamAna.
$TitprAtipadika = array("nada","Baza","gara","plava","cara","tara","cora","grAha","sUda","deva","moda"); // this list is carved out of gaNapATha.
$TiDDhA=array("dvayasa","daDna","mAtra","taya","AdfSa","itvara","naSvara","sftvara","Itvara","etvara","taruRa","taluna","cara","puraHsara","agrataHsara","agresara","purassara","pUrvasara","kara","dAsa","dASa","Palguna","Sakraga","sAmaga","surApa","SIDupa","jAyAhan","patihan","jAyAGna","patiGna","hastiGna","hastihan","kapAwahan","kapAwaGna","pARiGa","rAjaGa","tAqaGa","rAja","saKa","Aha","mahAha","paramAha","dIrghAha","gava","orasa","Anasa","ASma","Ayasa","sarasa","grAmatakza","kOwatakza","atiSva","AkarzaSva","PalakaSva","uttarasakTa","mftasakTa","pUrvasakTa","PalakasakTa","nAva","KAra","Jjala","surAzwrabrahma","avantibrahma","kubrahma","mahadbrahma","SrARika","mAMsOdanika","kaMsika","kArSApaRika","pratika","mahiza","vArkeRya","sOmya","sAyantana","cirantana","prAhRetana","pragetana","dozAtana","divAtana","pUrvAhRetana","aparAhRetana","SAmIla","stra","gAyana","daSa","viMSa","triMSa","paYcama","saptama","azwama","navama","daSama","zazWa","katiTa","katipayaTa","bahutiTa","pUgatiTa","gaRatiTa","saNGatiTa","titama","Witama","samamaya","viSamamaya","maya","ISvara","SaRQa",);
$aJwords=array("Otsa","OdapAna","vEkara","vEnoda","mAhAnada","mAhAnasa","mAhAprARa","tAruRa","tAluna","DEnava","pArTiva","pANkta","jAgata","tErzwupa","Anuzwupa","jAnapada","BArata","OSInara","grEzma","pElava","kOla","BAllakIya","rATAntara","mADyandina","bfrhat","mfhat","sAttvantava","kOrava","pAYcAla","EndrAvasAna","OzRih","kAkuB","sOvarRa","dEva","grEzma","bEda","Orva","kASyapa","kOSika","BAradvAja","Opamanyava","kElAlapa","kEdarBa","vESvAnara","ArwizeRa","ArtaBAga","hAryaSva","prEyaka","Apastamba","kOcavAra","SAradvat","SOnaka","DEnava","gOpavana","SEgrava","bEndava","BAjana","ASvAvatAna","SyAmAka","SyAmAka","SyAparRa","hArita","kEndAsa","vAhyaska","ArkalUza","vADyoza","vEzRuvfdDa","prAtiboDa","rATAntara","rATItara","gAvizWira","nEzAda","mAWara","mArda","pOnarBava","pOtra","dOhitra","nAnAndra","pArastrya","pAraSava","mAhAkula","mAnuza","hAridra","mAhArajana","dvEpa","vEyAGra","kApota","mAyUra","tEttira","KARqika","vAqava","kzOdraka","mAlava","sEna","BEkzuka","SOka","OlUka","SvAna","yOga","Ahana","vAratra","hAlabanDa","kAWaka","kAlApaka","CAndogya","OkTikya","ATarvaRa","mOdaka","pEppalAdaka","dErGavastra","kApilavastra","dAtta","gOpta","sANkala","pOzkala","Odvapa","Oqupa","Otpuwa","kOmBa","vEDAna","sOdakza","sOdatta","sOBUta","sOnetra","sOpiNgala","sEkata","pOtIka","pOlasa","kOlAsa","pAlASa","nEveSa","gAveza","gAmBIra","Etara","Sarma","aha","loma","vema","vAruRa","bAhula","sAdyoja","ABizikta","gOBft","rAjaBft","gArha","BArta","BAlla","mAla","vfta","dAttAmitra","vEDUmAgna","kAkanda","mAkanda","maRicara","jAruza","pOrvamadra","Aparamadra","SEvapura","mARqavapura","pOrvArDa","dAkziRArDa","OttarArDa","Apakara","sEnDava","vArRava","gAnDAra","maDumat","kAmboja","kASmIra","sAlva","kEzkinDa","gAdika","Orasa","darat","tAkzaSila","vAtsodDaraRa","kOmedura","kARqavAraRa","grAmaRI","sArAlaka","kAMsa","kEnnara","sAMkucita","sEMhakozWa","kArRakozWa","bArbara","AvasAna","ASvaraTa","OzwraraTa","gArdaBaraTa","ASva","Ozwra","gArdaBa","ADvarya","pArizada","rAjata","lOha","sEsa","sEsaka","Odumbara","nEladArava","rOhitaka","bEBItaka","pEtadAsa","tEvradArava","trEkaRwaka","kARwakAra","dADitTa","kApitTa","mAhitTa","pAlASa","KAdira","SEMSipa","spAndana","kArIra","SErIza","yAvAsa","vEkaNkata","vARDra","vAratra","SOrpa","sArvaBOma","pArTiva","kOmAra","kESora","OdgAtra","Onnetra","prAtihartra","rATagaRaka","pAkzigaRaka","sOzWava","dOzWava","ADvaryava","vADava","sOBaga","vyAvakroSa","vyAvaleKa","vyAvahAsa","vyAvacora","vyAvacarca",);
$aNwords=array("lAva","dAya","kAra","Aya","pAra","ASvapata","SAtapata","DAnapata","gARapata","rAzwrapata","kOlapata","gArhapata","DAnyapata","pASupata","DArmapata","sABApata","prARapata","kzEtrapata","SEva","prOzWa","prOzWika","cARqa","jAmBa","mOna","sAnDa","BOra","kOWAra","AnaBimlAna","kAkutsTa","kAhoqa","lEKa","rODa","KAYjana","kOhaqa","pEzwa","hEhaya","KAYjAra","KAYjAla","sOrohika","pArRa","kAhUza","pArila","vAtaRqa","tArRa","kArRa","kzErahrada","jAlahrada","pArizika","jAwilika","gOPilika","bADirikA","mAYjIraka","vArzRika","rEKa","AleKana","vESravaRa","rAvaRa","vArtanAkza","pEwaka","pEwAka","tArkzAka","nABAka","OrRanABa","jratkArava","Otkzipa","rOhitika","AryaSveta","sOpizwa","KArjUrakarRa","mAsUrakarRa","tURakarRa","mAyUrakarRa","KAqaraka","takza","ArwizeRa","gANga","vEpASa","yAska","lAhya","drOGa","AyaHsTURa","BAlandana","vErUpAkza","BOma","Ela","sApatna","trEveRa","trEvaRa","ErAvata","vEtasta","nArmada","SEkzita","cEntita","yAmuna","vAsizWa","vESvAmitra","SvAPalka","rAnDasa","vAsudeva","AnirudDa","sAhadeva","nAkula","kAnIna","vEkarRa","SONga","CAgala","pEla","mARwuka","ANga","vANga","sOhma","mAgaDa","kAliNga","sOramasa","kAzAya","mAYjizWa","kOsumBa","pOza","mAGa","kOmAra","SArAva","mAllika","kArpara","sTARwila","GArta","BrAzwra","kAlaSa","kOmBa","Aditya","bArhaspatya","prAjApatya","Endra","kAya","vEzRava","mAhendra","kAka","bAka","guRagrAma","karaRagrAma","tattvagrAma","SabdagrAma","indriyagrAma","BEkza","gArBiRa","SEba","Ozwra","pANkta","pragATa","AnuzwuBa","jAgata","gAyatra","trEzwuBa","sOBadra","gOrimitra","AhimAla","syAndanASva","CAndasa","vEyAkaraRa","nErukta","nEmitta","mOhUrta","OtpAta","Odumbara","bAlbaja","pArvata","sAhasra","kOSAmba","ArjunAva","SudizWa","vEdiSa","hEmavata","sOvAstava","vESaNka","cAkzuza","SrAvaRa","Opanizada","dArzada","OlUKala","cAtura","cAturdaSa","pAlada","pArizada","yAkflloma","rOmaka","kAlakUwa","pAwaccara","vAhIka","kAlakIwa","mAlakIwa","kAmalakIwa","kAmalaBida","gOzWa","kAmalakIra","bAhukIta","nEtaka","pAriKa","SOrasena","gOmata","OdayAna","dAkza","plAkza","mAhaka","pAnnAgAra","kOrava","yOganDara","EkzvAka","mAhizika","kAcCa","sEnDava","vArRava","gAnDAra","mADumata","kAmboja","kASmIra","sAlva","kOrava","rANkava","ARava","KARqa","dvEpa","AnUpa","AjavAha","vEjApaka","kOlUna","pArvata","yOzmAka","AsmAka","tAvaka","mAmaka","sAndivela","sAMDya","grEzma","SESira","tEza","pOza","sAnDivela","sAnDya","AmAvAsya","trAyodaSa","cAturdaSa","pAYcadaSa","pOrRamasa","prAtipada","sMavatsara","SArada","vArza","hEmana","vAsanta","sEnDava","Apakara","AmAvAsya","AmAvasya","vAtsaSAla","ABihjita","ASvayuja","SAtaBizaja","rOhiRa","mArgaSIrza","srOGna","mATura");
// karmaNyaN is difficult to do. 
$Titpratyaya = array("lyuw",); // Only lyuw is pending for scrutiny. Rest all are included in TiDDhA.
$ajAdi = array("aja","eqaka","aSva","cawaka","mUzika","bAla","vatsa","hoQa","manda","bilAta","uzRih","devaviS","jyezWa","kanizWa","maDyama","kokila","pUrvApahARa","aparAhARa","triPala","tryanIka","paraBfta","bAla","amba","hoqa","mugDa","daMzwra","saMprahARa","pUrvApahAyaRa","aparApahAyaRa","samprahAyaRa","saMprahAyaRa","diS","dfS","kzuD","vAc","gir","balAka","vaqava");
$bahvAdi=array("bahu","padDati","aNkati","aYcati","aMhati","vaMhati","Sakawi","Sakti","SAri","vAri","gati","ahi","kapi","muni","yazwi","caRqa","arAla","kamala","kfpARa","vikawa","viSAla","viSaNkawa","Baruja","Dvaja","kalyARa","udAra","purARa","ahan","cAndraBAga","candraBAga",);
$svAGga=array("keSa","kaca","muKa","stana","naKa","RaKa","nAsika");
$kroDAdi=array("kalyARakroqa","kalyARaKura","kalyARoKa","kalyARabAla","kalyARaSaPa","kalyARaguda","kalyARaGoRa","kalyARanaKa","kalyARamuKa","suBaga","sugala","pfTujaGana","mahAlalAwa","kalyARakroqA","kalyARAKurA","kalyARoKA","kalyARabAlA","kalyARaSaPA","kalyARagudA","kalyARaGoRA","kalyARanaKA","kalyARamuKA","kroqAdirAkftigaRaH","suBagA","sugalA","pfTujaGanA","mahAlalAwA","BAvyaBAlA","BavyaBAla","SrImaduKA","SrImaduKa","kalyARagoKa","kalyANagoKA","pavitraSaPa","pavitraSaPA","mfRAlaBujA","mfRAlaBuja","kalyARaguda","kalyARagudA","unnataGoRa","unnataGoRA","kisalayakarA","kisalayakara","suraNga","suraNga");
$bahvacasvAGga=array("jaGana");
$aupagava=array("Opagava","kaWa","kalApa","bahvfca",);
$Sidwords=array("dvimUrDa","trimUrDa","SatapaTika","zazwipaTika","pfTiva","sAmiDenya","paTika","kusidika","daSEkAdaSika","pOroqASika","Bastrika","Barawika","BaraRika","SIrzaBArika","SIrzeBArika","aMsaBArika","aMseBArika","vivaDika","vIvaDika","parpika","aSvika","aSvatTika","raTika","jAlika","nyAsika","vyAlika","pAdika","paYcika","padika","SvagaRika","kiSarika","naradika","naladika","sumaNgalika","tagarika","gugguluka","uSIrika","haridrika","haridrAyaRIka","SalAluka","kAsUtara","gORItara","Akarzika","AvasaTika","DAtra","dAtra","Sastra","netra","yotra","yoktra","stotra","totra","setra","sektra","meQra","patra","nadDa","potra","kApiSyAyana","karbara","karvara","garbara","garbara","nizadvara","Citvara","Catvara","nartaka","Kanaka","rajaka"); // kurvAdi pending
$gaurAdi=array("gOra","matsya","manuzya","SfNga","haya","gavaya","mukaya","fzya","puwa","druRa","droRa","hariRa","kaRa","pawara","ukaRa","Amalaka","kuvala","badara","bamba","tarkAra","SarkAra","puzkara","SiKaRqa","suzama","salanda","gaquja","Ananda","sfpAwa","sfgeWa","AQaka","Sazkula","sUrma","suba","sUrya","pUza","mUza","GAtaka","sakalUka","sallaka","mAlaka","mAlata","sAlvaka","vetasa","atasa","pfsa","maWa","Ceda","Svan","takzan","anaquh","ezaRa","deha","kAkAdana","gavAdana","tejana","rajana","lavaRa","pAna","meDa","gOtama","AyasTURa","BOri","BOliki","BOliNgi","OdgAhamAni","AliNgi","ApicCika","Arawa","wowa","nawa","nAwa","malAwa","SAtana","pAtana","savana","Astarana","ADikaraRa","eta","aDikAra","AgrahAyaRI","pratyavarohiRI","sevana","sumaNgalAt saMjYAyAm","sundara","maRqala","piRqa","viwaka","kurda","gUrda","pawa","pARwa","loPARwa","kandara","kandala","bfhat","mahat","sODarma","rohiRI nakzatre","revatI nakzatre","vikala","nizPala","puzkala","kawa","pippala","harItaka","koSAtaka","Sama","karIra","pfTiva","krozwra","mAtAmaha","pitAmaha"); // removed taruRa and taluna, because they have a separate vArtika mandating GIp and not GIz.
$itmanuSyajAti=array("dAkzi","Odameyi");
$zArGgaravAdi=array("SArNgarava","kApawava","gOgulava","brAhmaRa","gOtama","kAmaRqaleya","brAhamakfteya","Aniceya","AniDeya","ASokeya","vAtsyAyana","mOYjAyana","kEkaseya","kAvya","SEvya","ehi","paryehi","ASmaraTya","OdapAna ","arAla","caRqAla","vataRqa","jAti","bEda");
$kvanipwords=array("prAtaritvan","DIvan","pIvan","suDIvan","supIvan","BUridAvan","GftapAvan","SIvan","kruSvan","ruhvan","jitvan","kzitvan","sftvan","Dftvan","dfSvan");
$Gvanipwords=array("sutvan","yajvan"); // also hrasva-tvan combination.
$vanipwords=array("DIvan","pIvan","suDIvan","supIvan","snAvan","nadvan","padvan","arvan","parvan","Sakvan","BUridAvan","GftapAvan","vijAvan","agregAvan");
$vanoracawords= array_merge($kvanipwords,$Gvanipwords,$vanipwords);
$tiG=array("tip","tas","Ji","sip","Tas","Ta","mip","vas","mas","ta","AtAm","Ja","TAs","ATAm","Dvam","iw","vahi","mahiN");
$tis=array("tip","tas","Ji","sip","Tas","Ta","mip","vas","mas",);
$taG=array("ta","AtAm","Ja","TAs","ATAm","Dvam","iw","vahi","mahiN");
$tiGprathama=array("tip","tas","Ji","ta","AtAm","Ja",);
$tiGmadhyama=array("sip","Tas","Ta","TAs","ATAm","Dvam",);
$tiGuttama=array("mip","vas","mas","iw","vahi","mahiN");
$shitpratyaya=array("Sap","Syan","Snu","Sa","Snam","SnA","SAyac","SAnac");
$navibhaktau=array("su!","jas","am","Sas","ByAm","Bis","Byas","os","Am","Ni","tas","Tas","vas","mas","AtAm","TAs","ATAm","Dvam","jus","tAt");
$inbetweenpratyaya=array("ap","yan");
$inbetweeenreplace=array("a","ya");
// Composite data of verbs in a single array
// adanta dhAtus of curAdi need special treatment. Right now pending. Database needs to be corrected.
$verbdata = array("aMsa!:samAGAte:aMs:10:0460:u:sew:अं॑सँ॑","ahi!:BAzArTaH ca:aMh:10:0328:u:sew:अ॑हिँ॑","ahi!:gatO:aMh:01:0722:A:sew:अ॑हिँ॒","aka!:kuwilAyAM gatO:ak:01:0901:pa:sew:अ॑कँ॑","akzU!:vyAptO:akz:01:0742:pa:sew:अ॑क्षूँ॑","aga!:kuwilAyAM gatO:ag:01:0902:pa:sew:अ॑गँ॑","aNka!:pade lakzaRe ca:aNk:10:0473:u:sew:अ॑ङ्कँ॑","aki!:lakzaRe:aNk:01:0092:A:sew:अ॑किँ॒","aNga!:pade lakzaRe ca:aNg:10:0474:u:sew:अ॑ङ्गँ॑","agi!:gatyarTaH:aNg:01:0155:pa:sew:अ॑गिँ॑","aGi!:gatyAkzepe gatO gatyAramBe cetyapare:aNG:01:0115:A:sew:अ॑घिँ॒","acu!:gatO yAcane ca ityeke:ac:01:0999:u:sew:अ॑चुँ॒॑","aja!:gatikzapanayoH:aj:01:0262:pa:sew:अ॑जँ॑","aci!:gatO yAcane ca ityepare:aYc:01:1000:u:sew:अ॑चिँ॑","aYcu!:gatipUjanayoH:aYc:01:0998:pa:sew:अ॑ञ्चुँ॑","aYcu!:gatO yAcane ca:aYc:01:0215:u:sew:अ॑ञ्चुँ॒॑","aYcu!:viSezaRe:aYc:10:0266:u:sew:अ॑ञ्चुँ॑","aji!:BAzArTaH ca:aYj:07:0021:u:sew:अ॑जिँ॑","aYjU!:vyaktimrakzaRakAntigatizu vyaktimarzaRakAntigatizu:aYj:10:0316:pa:sew:अ॑ञ्जूँ॑","awa!:gatO:aw:01:0332:pa:sew:अ॑टँ॑","awwa!:anAdare:aww:10:0037:u:sew:अ॑ट्टँ॑","awwa!:atikramaRahiMsanayoH atikramahiMsayoH:aww:01:0287:A:sew:अ॑ट्टँ॒","aqa!:udyame:aq:01:0414:pa:sew:अ॑डँ॑","aqqa!:aBiyoge:aqq:01:0403:pa:sew:अ॑ड्डँ॑","aRa!:SabdArTaH:aR:01:0512:pa:sew:अ॑णँ॑","aRa!:prARane:aR:04:0071:A:sew:अ॑णँ॒","aWi!:gatO:aRW:01:0294:A:sew:अ॑ठिँ॒","ata!:sAtatyagamane:at:01:0038:pa:sew:अ॑तँ॑","ada!:BakzaRe:ad:02:0001:pa:aniw:अ॒दँ॑","aqqa!:aBiyoge:adq:01:0403:pa:sew:अ॑ड्डँ॑","iN:aDyayane nityamaDipUrvaH:aDI aDi'i:02:0041:pa:aniw:इ॒ङ्","ik:smaraRe ayamapyaDipUrvaH:aDIaDi'i:02:0042:pa:aniw:इ॒क्","ano ruDa!:kAme:anuruD anu'ruD:04:0070:A:aniw:अ॑नो॑ रु॒धँ॒","ana!:prARane ityeke:an:04:0072:A:sew:अ॑नँ॒","ana!:ca prARane:an:02:0065:pa:sew:अ॑नँ॑","ati!:banDane:ant:01:0063:pa:sew:अ॑तिँ॑","adi!:banDane:and:01:0064:pa:sew:अ॑दिँ॑","anDa!:dfzwyupaGAte upasaMhAra ityanye:anD:10:0471:u:sew:अ॑न्धँ॑","aBra!:gatyarTaH:aBr:01:0637:pa:sew:अ॑भ्रँ॑","ama!:gatyAdizu gatO Sabde samBaktO ca:am:01:0536:pa:sew:अ॑मँ॑","ama!:roge na mit 1950:am:10:0245:u:sew:अ॑मँ॑","abi!:Sabde:amb:01:0438:A:sew:अ॑बिँ॒","aBi!:Sabde kvacitpaWyate:amB:01:0448:A:sew:अ॑भिँ॒","aya!:gatO:ay:01:1031:A:sew:अ॑यँ॒","aya!:gatO:ay:01:0546:u:sew:अ॑यँ॒॑","arka!:stavane:ark:10:0145:u:sew:अ॑र्कँ॑","arGa!:mUlye:arG:01:0185:pa:sew:अ॑र्घँ॑","arca!:pUjAyAm:arc:01:0232:pa:sew:अ॑र्चँ॑","arca!:pUjAyAm:arc:10:0340:u:sew:अ॑र्चँ॑","arja!:arjane:arj:01:0256:pa:sew:अ॑र्जँ॑","arja!:pratiyatne sampAdane ca:arj:10:0250:u:sew:अ॑र्जँ॑","arTa:upayAcYAyAm:arT:10:0447:A:sew:अ॑र्थँ॒","arda!:hiMsAyAm:ard:10:0365:u:sew:अ॑र्दँ॑","arda!:gatO yAcane ca:ard:01:0057:pa:sew:अ॑र्दँ॑","arba!:gatO:arb:01:0481:pa:sew:अ॑र्बँ॑","arva!:hiMsAyAm:arv:01:0667:pa:sew:अ॑र्वँ॑","arha!:pUjAyAm:arh:10:0257:u:sew:अ॑र्हँ॑","arha!:pUjAyAm:arh:10:0367:u:sew:अ॑र्हँ॑","arha!:pUjAyAm:arh:01:0841:pa:sew:अ॑र्हँ॑","ala!:BUzaRaparyAptivAraRezu:al:01:0593:pa:sew:अ॑लँ॑","ava!:rakzaRagatikAntiprItitfptyavagamapraveSaSravaRasvAmyarTayAcanakriyecCAdIptyavAptyAliNganahiMsAdAnaBAgavfdDizu:av:01:0684:pa:sew:अ॑वँ॑","aSa!:Bojane:aS:09:0059:pa:sew:अ॑शँ॑","aSU!:vyAptO saNGAte ca:aS:05:0020:A:sew:अ॑शूँ॒","aza!:gatidIptyAdAnezu ityeke:az:01:1030:u:sew:अ॑षँ॒॑","asu!:kzepane:as:04:0106:pa:sew:अ॑सुँ॑","asa!:gatidIptyAdAnezu:as:01:1029:u:sew:अ॑सँ॒॑","asa!:Buvi:as:02:0060:pa:sew:अ॑सँ॑","aha!:vyAptO:ah:05:0029:pa:sew:अ॑हँ॑","ANaH kranda!:sAtatye:Akrand AN'krand:10:0252:u:sew:आ॑ङः॒॑ क्रन्दँ","ACi!:AyAme:AYC:01:0237:pa:sew:आ॑छिँ॑","Apx!:lamBane:Ap:05:0016:pa:aniw:आ॒पॢँ॑","Apx!:vyAptO:Ap:10:0376:u:sew:आ॑पॢँ॑","ANaH Sasi:icCAyAm:ASaMs AN'SaMs:01:0716:A:sew:आ॑ङः॒ शसि","ANaH SAsu!:icCAyAm:ASAs AN'SAs:02:0012:A:sew:आ॑ङः॒ शासुँ","ANaH zada!:padyarTe:Asad AN'sad:10:0368:u:sew:आ॒ङः॑ षदँ","Asa!:upaveSane:As:02:0011:A:sew:आ॑सँ॒","iN:aDyayane nityamaDipUrvaH:i:02:0042:A:aniw:इ॒ङ्","iR:gatO:i:02:0041:pa:aniw:इ॒ण्","ik:smaraRe ayamapyaDipUrvaH:i:02:0040:pa:aniw:इ॒क्","iKa!:gatyarTaH:iK:01:0148:pa:sew:इ॑खँ॑","iKi!:gatyarTaH:iNK:01:0149:pa:sew:इ॑खिँ॑","igi!:gatyarTaH:iNg:01:0163:pa:sew:इ॑गिँ॑","iwa!:gatO:iw:01:0357:pa:sew:इ॑टँ॑","idi!:paramESvarye:ind:01:0065:pa:sew:इ॑दिँ॑","YiinDI!:dIptO:inD:07:0011:A:sew:ञिइ॒न्धीँ॑","ivi!:vyAptO:inv:01:0670:pa:sew:इ॑विँ॑","ila!:preraRe:il:06:0084:u:sew:इ॑लँ॑","ila!:svapnakzepanayoH:il:10:0167:pa:sew:इ॑लँ॑","iza!:icCAyAm:iz:06:0078:pa:sew:इ॑षँ॑","iza!:Iza! gatO:iz:04:0022:pa:sew:इ॑षँ॑","iza!:ABIkzRye:iz:09:0061:pa:sew:इ॑षँ॑","IN:gatO:I:04:0038:A:aniw:ई॒ङ्","Ikza!:darSane:Ikz:01:0694:A:sew:ई॑क्षँ॒","IKi!:gatyarTaH:IK:01:0150:pa:sew:ई॑खिँ॑","IKi!:gatyarTaH:INK:01:0151:pa:sew:ई॑खिँ॑","Ija:gatikutsanayoH:Ij:01:0207:A:sew:ई॑ज॒","Iji!:gatikutsanayoH ityeke:IYj:01:0208:A:sew:ई॑जिँ॒","Iqa!:stutO:Iq:02:0009:u:sew:ई॑डँ॑","Iqa!:stutO:Iq:10:0183:A:sew:ई॑डँ॒","Ira!:kzepe:Ir:02:0008:u:sew:ई॑रँ॑","Ira!:gatO kampane ca:Ir:10:0342:A:sew:ई॑रँ॒","Irkzya!:IrzyArTaH:Irkzy:01:0587:pa:sew:ई॑र्क्ष्यँ॑","Irzya!:IrzyArTAH:Irzy:01:0588:pa:sew:ई॑र्ष्यँ॑","ISa!:ESvarye:IS:02:0010:A:sew:ई॑शँ॒","Iza!:uYCe:Iz:01:0780:pa:sew:ई॑षँ॑","Iza!:gatihiMsAdarSanezu:Iz:01:0695:A:sew:ई॑षँ॒","Iha!:cezwAyAm:Ih:01:0719:A:sew:ई॑हँ॒","uN:Sabde:u:01:1102:A:aniw:उ॒ङ्","ukza!:secane:ukz:01:0745:pa:sew:उ॑क्षँ॑","uKa!:gatyarTaH:uK:01:0136:pa:sew:उ॑खँ॑","uKi!:gatyarTaH:uNK:01:0137:pa:sew:उ॑खिँ॑","uca!:samavAye:uc:04:0135:pa:sew:उ॑चँ॑","uCI!:vivAse:uC:06:0015:pa:sew:उ॑छीँ॑","uCI!:vivAse:uC:01:0244:pa:sew:उ॑छीँ॑","ujJa!:utsarge:ujJ:06:0024:pa:sew:उ॑ज्झँ॑","uCi!:uYCe:uYC:06:0014:pa:sew:उ॑छिँ॑","uCi!:uYCe:uYC:01:0243:pa:sew:उ॑छिँ॑","uWa!:upaGAte ityeke:uW:01:0852:pa:sew:उ॑ठँ॑","uWa!:upaGAte pratiGAte:uW:01:0392:A:sew:उ॑ठँ॒","kaWi!:Soke prAyeRotpUrva utkaRWAvacanaH:utkaRW:10:0385:u:sew:क॑ठिँ॑","ujJa!:utsarge:udJ:06:0024:pa:sew:उ॑ज्झँ॑","uGrasa!:uYCe ityeke:uDras:10:0271:u:sew:उ॑घ्र॑सँ॑","undI!:kledane:und:07:0020:pa:sew:उ॑न्दीँ॑","ubja!:Arjave:ubj:06:0023:pa:sew:उ॑ब्जँ॑","uBa!:pUraRe:uB:06:0044:pa:sew:उ॑भँ॑","umBa!:pUraRe:umB:06:0045:pa:sew:उ॑म्भँ॑","urda!:mAne krIqAyAM ca:urd:01:0020:A:sew:उ॑र्दँ॒","urvI!:hiMsArTaH:urv:01:0650:pa:sew:उ॑र्वीँ॑","uza!:dAhe:uz:01:0792:pa:sew:उ॑षँ॑","uhi!r:ardane:uh:01:0840:pa:sew:उ॑हिँ॑र्","UWa!:upaGAte:UW:01:0391:pa:sew:ऊ॑ठँ॑","Una!:parihARe:Un:10:0430:u:sew:ऊ॑नँ॑","UyI!:tantusantAne:Uy:01:0556:A:sew:ऊ॑यीँ॒","Urja!:balaprARanayoH:Urj:10:0023:u:sew:ऊ॑र्जँ॑","UrRuY:AcCAdane:UrRu:02:0034:u:sew:ऊ॑र्णु॑ञ्","Uza!:rujAyAm:Uz:01:0779:pa:sew:ऊ॑षँ॑","Uha!:vitarke:Uh:01:0735:A:sew:ऊ॑हँ॒","f:gatO:f:03:0017:pa:aniw:ऋ॒","f:hiMsAyAm ityeke:f:05:0038:pa:sew:ऋ॑","f:gatiprApaRayoH:f:01:1086:pa:aniw:ऋ॒","fca!:stutO:fc:06:0022:pa:sew:ऋ॑चँ॑","fCa!:gatIndriyapralayamUrtiBAvezu:fC:06:0016:pa:sew:ऋ॑छँ॑","fja!:gatisTAnArjanopArjanezu:fj:01:0200:A:sew:ऋ॑जँ॒","fji!:Barjane:fYj:01:0201:A:sew:ऋ॑जिँ॒","fRu!:gatO:fR:08:0005:u:sew:ऋ॑णुँ॒॑","fDu!:vfdDO:fD:05:0027:pa:sew:ऋ॑धुँ॑","fDu!:vfdDO:fD:04:0160:pa:sew:ऋ॑धुँ॑","fPa!:hiMsAyAm:fP:06:0040:pa:sew:ऋ॑फँ॑","fmPa!:hiMsAyAm:fmP:06:0041:pa:sew:ऋ॑म्फँ॑","fzI!:gatO:fz:06:0007:pa:sew:ऋ॑षीँ॑","F:gatO:F:09:0032:pa:sew:ॠ","ejf!:dIptO:ej:01:0203:A:sew:ए॑जृँ॒","ejf!:kampane:ej:01:0267:pa:sew:ए॑जृँ॑","eWa!:ca vibADAyAM:eW:01:0300:A:sew:ए॑ठँ॒","eDa!:vfdDO:eD:01:0002:A:sew:ए॑धँ॒","ezf!:gatO:ez:01:0705:A:sew:ए॑षृँ॒","ezf!:prayatne ityeke:ez:01:0701:A:sew:ए॑षृँ॒","oKf!:SozaRAlamarTyoH:oK:01:0129:pa:sew:ओ॑खृँ॑","oRf!:apanayane:oR:01:0523:pa:sew:ओ॑णृँ॑","o!laqi!:utkzepane ityeke:olaRq:10:0014:u:sew:ओँ॑ल॑डिँ॑","kasi!:gatiSAsanayoH:kaMs:02:0014:A:sew:क॑सिँ॒","kaka!:lOlye:kak:01:0095:A:sew:क॑कँ॒","kaKa!:hasane:kaK:01:0128:pa:sew:क॑खँ॑","kaKe!:hasane:kaK:01:0893:pa:sew:क॑खेँ॑","kage!:nocyate kriyAsAmAnyArTatvAt anekArTatvAdityanye:kag:01:0900:pa:sew:क॑गेँ॑","kaki!:gatyarTaH:kaNk:01:0099:A:sew:क॑किँ॒","kaca!:banDane:kac:01:0192:A:sew:क॑चँ॒","kaja!:made ityeke:kaj:01:0265:pa:sew:क॑जँ॑","kaci!:dIptibanDanayoH:kaYc:01:0193:A:sew:क॑चिँ॒","kawI!:gatO:kaw:01:0330:pa:sew:क॑टीँ॑","kawe!:varzAvaraRayoH:kaw:01:0359:pa:sew:क॑टेँ॑","kaWa!:kfcCrajIvane:kaW:01:0385:pa:sew:क॑ठँ॑","kaqa!:made:kaq:06:0108:pa:sew:क॑डँ॑","kaqa!:made:kaq:01:0417:pa:sew:क॑डँ॑","kaqqa!:kArkaSye:kaqq:01:0404:pa:sew:क॑ड्डँ॑","kaRa!:gatO:kaR:01:0517:pa:sew:क॑णँ॑","kaRa!:SabdArTaH:kaR:01:0903:pa:sew:क॑णँ॑","kaRa!:nimIlane:kaR:10:0240:u:sew:क॑णँ॑","kaWi!:Soke:kaRW:01:0297:A:sew:क॑ठिँ॒","kaWi!:Soke prAyeRotpUrva utkaRWAvacanaH:kaRW:10:0385:u:sew:क॑ठिँ॑","kaqi!:made ityeke:kaRq:01:0418:pa:sew:क॑डिँ॑","kaqi!:KaRqane Bedane:kaRq:10:0067:u:sew:क॑डिँ॑","kaqi!:made:kaRq:01:0316:A:sew:क॑डिँ॒","katra!:SETilye:kattr:10:0456:u:sew:क॑त्रँ॑","katTa!:SlAGAyAm:katT:01:0037:A:sew:क॑त्थँ॒","katra!:SETilye:katr:10:0456:u:sew:क॑त्रँ॑","kaTa:vAkyaprabanDe vAkyaprabanDane:kaT:10:0389:u:sew:क॑थँ॑","kada!:vEklavye vEkalya ityeke ityanye:kad:01:0881:A:sew:क॑दँ॒","kaqqa!:kArkaSye:kadq:01:0404:pa:sew:क॑ड्डँ॑","kanI!:dIptikAntigatizu:kan:01:0531:pa:sew:क॑नीँ॑","kadi!:AhvAne rodane ca:kand:01:0878:pa:sew:क॑दिँ॑","kadi!:vEklavye vEkalya ityeke:kand:01:0073:A:sew:क॑दिँ॒","kapa!:kfpAyAM gatO ca ityanye:kap:01:0877:A:sew:क॑पँ॒","kabf!:varRe:kab:01:0440:A:sew:क॑बृँ॒","kamu!:kAntO na mit 1949:kam:01:0511:A:sew:क॑मुँ॒","kapi!:calane:kamp:01:0435:A:sew:क॑पिँ॒","karja!:vyaTane:karj:01:0260:pa:sew:क॑र्जँ॑","karRa!:Bedane iti DAtvantaramityapare:karR:10:0470:u:sew:क॑र्णँ॑","karta!:ityapyeke:kart:10:0457:u:sew:क॑र्तँ॑","karda!:kutsite Sabde:kard:01:0061:pa:sew:क॑र्दँ॑","karba!:gatO:karb:01:0486:pa:sew:क॑र्बँ॑","karva!:darpe:karv:01:0664:pa:sew:क॑र्वँ॑","kala!:gatO saNKyAne ca:kal:10:0404:u:sew:क॑लँ॑","kala!:kzepe:kal:10:0093:u:sew:क॑लँ॑","kala!:SabdasaNKyAnayoH:kal:01:0570:A:sew:क॑लँ॒","kalla!:avyakte Sabde aSabda ityeke:kall:01:0571:A:sew:क॑ल्लँ॒","kaSa!:gatiSAsanayoH ityanye ityapi:kaS:02:0016:A:sew:क॑शँ॒","kaza!:hiMsArTaH:kaz:01:0781:pa:sew:क॑षँ॑","kasa!:gatiSAsanayoH ityeke:kas:02:0015:A:sew:क॑सँ॒","kasa!:gatO:kas:01:0996:pa:sew:क॑सँ॑","kAkzi!:kANkzAyAm:kANkz:01:0760:pa:sew:का॑क्षिँ॑","kAci!:dIptibanDanayoH:kAYc:01:0194:A:sew:का॑चिँ॒","kAla!:kAlopadeSe ca iti pfTagDAturityeke:kAl:10:0422:u:sew:का॑लँ॑","kASf!:dIptO:kAS:04:0058:A:sew:का॑शृँ॒","kASf!:dIptO:kAS:01:0734:A:sew:का॑शृँ॒","kAsf!:SabdakutsAyAm:kAs:01:0710:A:sew:का॑सृँ॒","ki:jYAne:ki:03:0020:pa:aniw:कि॒","kiwa!:gatO:kiw:01:0338:pa:sew:कि॑टँ॑","kiwa!:trAse:kiw:01:0358:pa:sew:कि॑टँ॑","kita!:jYAne ca:kit:03:0021:pa:sew:कि॑तँ॑","kita!:nivAse rogApanayane ca:kit:01:1148:pa:sew:कि॑तँ॑","kila!:SvEtyakrIqanayoH SvEtye:kil:06:0080:pa:sew:कि॑लँ॑","kIwa!:varRe varaRe:kIw:10:0142:u:sew:की॑टँ॑","kIla!:banDane:kIl:01:0602:pa:sew:की॑लँ॑","kuN:Sabde:ku:04:0128:A:aniw:कु॒ङ्","ku:Sabde:ku:10:0127:pa:aniw:कु॒","kuN:Sabde:ku:04:0296:A:sew:कु॑ङ्","kuSi!:BAzArTaH:kuMS:10:1103:u:sew:कु॑शिँ॑","kuMSa!:saMSlezaRe SlezaRe ityapare:kuMS:01:0294:pa:sew:कुं॑शँ॑","kusi!:BAzArTaH:kuMs:02:0037:u:sew:कु॑सिँ॑","kuMsa!:saMSlezaRe SlezaRe ityanye:kuMs:06:0136:pa:sew:कुं॑सँ॑","kuka!:AdAne:kuk:01:0096:A:sew:कु॑कँ॒","kuca!:Sabde tAre:kuc:01:0211:pa:sew:कु॑चँ॑","kuca!:saNkocane:kuc:06:0095:pa:sew:कु॑चँ॑","kuca!:samparcanakOwilyapratizwamBavileKanezu:kuc:01:0993:pa:sew:कु॑चँ॑","kuju!:steyakaraRe:kuj:01:0226:pa:sew:कु॑जुँ॑","kuYca!:kOwilyAlpIBAvayoH:kuYc:01:0212:pa:sew:कु॑ञ्चँ॑","kuji!:avyakte Sabde:kuYj:01:0255:pa:sew:कु॑जिँ॑","kuwa!:Cedane ityeke:kuw:06:0093:A:sew:कु॑टँ॒","kuwa!:kOwilye:kuw:10:0222:pa:sew:कु॑टँ॑","kuwwa!:CedanaBartsanayoH:kuww:10:0034:u:sew:कु॑ट्टँ॑","kuwwa!:pratApane:kuww:10:0226:A:sew:कु॑ट्टँ॒","kuqa!:bAlye:kuq:06:0113:pa:sew:कु॑डँ॑","kuRa!:AmantraRe:kuR:10:0435:u:sew:कु॑णँ॑","kuRa!:SabdopakaraRayoH SabdopatApayoH:kuR:06:0061:pa:sew:कु॑णँ॑","kuwi!:vEkalye ityeke:kuRw:01:0363:pa:sew:कु॑टिँ॑","kuWi!:rakzaRe vezwane ca rakzaRa ityeke ityanye:kuRW:10:0070:u:sew:कु॑ठिँ॑","kuWi!:ca gatipratiGAte pratiGAte ityeke:kuRW:01:0397:pa:sew:कु॑ठिँ॑","kuqi!:anftaBAzaRe ityapare:kuRq:10:0068:u:sew:कु॑डिँ॑","kuqi!:dAhe:kuRq:01:0303:A:sew:कु॑डिँ॒","kuqi!:rakzaRe:kuRq:10:0009:u:sew:कु॑डिँ॑","kuqi!:vEkalye:kuRq:01:0362:pa:sew:कु॑डिँ॑","kutsa!:avakzepane:kuts:10:0220:A:sew:कु॑त्सँ॒","kuTa!:pUtIBAve:kuT:04:0012:pa:sew:कु॑थँ॑","kudf!:anftaBAzaRe ityeke:kud:10:0008:u:sew:कु॑दृँ॑","kuTi!:hiMsAsaNkleSanayoH:kunT:01:0045:pa:sew:कु॑थिँ॑","kunTa!:saMSlezaRe:kunT:09:0050:pa:sew:कु॑न्थँ॑","kudri!:anftaBAzaRe:kundr:10:0007:u:sew:कु॑द्रिँ॑","kupa!:BAzArTaH:kup:04:0146:u:sew:कु॑पँ॑","kupa!:kroDe:kup:10:0310:pa:sew:कु॑पँ॑","kumAra!:krIqAyAm:kumAr:10:0418:u:sew:कु॑मा॑रँ॑","kubi!:AcCAdane CAdane:kumb:10:0157:u:sew:कु॑बिँ॑","kubi!:AcCAdane CAdane:kumb:01:0492:pa:sew:कु॑बिँ॑","kuBi!:AcCAdane CAdane ityeke:kumB:10:0158:u:sew:कु॑भिँ॑","kura!:Sabde:kur:06:0067:pa:sew:कु॑रँ॑","kurda:krIqAyAmeva:kurd:01:0021:A:sew:कु॑र्द॒","kula!:saMstyAne banDuzu ca:kul:01:0976:pa:sew:कु॑लँ॑","kuSa!:saMSlezaRe SlezaRe ityeke:kuS:04:0126:pa:sew:कु॑शँ॑","kuza!:nizkarze:kuz:09:0054:pa:sew:कु॑षँ॑","kusa!:saMSlezaRe SlezaRe:kus:04:0125:pa:sew:कु॑सँ॑","kusma!:nAmno vA kutsismayane:kusm:10:0236:A:sew:कु॑स्मँ॒","kuha:vismApane:kuh:10:0443:A:sew:कु॑हँ॒","kUN:Sabde ityeke:kU:06:0137:A:sew:कू॑ङ्","kUja!:avyakte Sabde:kUj:01:0254:pa:sew:कू॑जँ॑","kUwa!:paritApe paridAha ityanye:kUw:10:0432:u:sew:कू॑टँ॑","kUwa!:apradAne avasAdana ityeke:kUw:10:0225:A:sew:कू॑टँ॒","kURa!:SrAvaRe nimantraRe ca saNkocane'pi:kUR:10:0438:u:sew:कू॑णँ॑","kURa!:saNkocane:kUR:10:0211:A:sew:कू॑णँ॒","kUla!:AvaraRe:kUl:01:0603:pa:sew:कू॑लँ॑","qukfY:karaRe:kf:08:0010:u:aniw:डुकृ॒ञ्","kfY:karaRe:kf:01:1048:u:aniw:कृ॒ञ्","kfY:hiMsAyAm:kf:05:0007:u:aniw:कृ॒ञ्","kfqa!:Ganatve:kfq:06:0112:pa:sew:कृ॑डँ॑","kfvi!:hiMsAkaraRayoSca:kfRv:01:0682:pa:sew:कृ॑विँ॑","kftI!:Cedane:kft:06:0171:pa:sew:कृ॑तीँ॑","kftI!:vezwane:kft:07:0010:pa:sew:कृ॑तीँ॑","kfpa!:dOrbalye:kfp:10:0408:u:sew:कृ॑पँ॑","kfpeSca:avakalkane miSrIkaraRa ityeke cintana ityanye:kfp:10:0278:u:sew:कृ॒पे॑श्च॒॑","kfpa!:krapa!m kapa!m kfpAyAM gatO ca:kfp:01:0866:A:sew:कृ॑पँ॒","kfpU!:sAmarTye:kfp:01:0875:A:sew:कृ॑पूँ॒","kfSa!:tanUkaraRe:kfS:04:0140:pa:sew:कृ॑शँ॑","kfza!:vileKane:kfz:06:0006:u:aniw:कृ॒षँ॒॑","kfza!:vileKane:kfz:01:1145:pa:aniw:कृ॒षँ॑","kF:vikzepe nikzepe:kF:06:0145:pa:sew:कॄ॑","kFY:hiMsAyAm:kF:09:0018:u:sew:कॄ॑ञ्","kF:hiMsAyAm:kF:09:0031:pa:sew:कॄ॑","kFta!:saMSabdane:kFt:10:0155:u:sew:कॄ॑तँ॑","kfpU!:sAmarTye:kxp:01:0866:A:sew:कृ॑पूँ॒","keta!:SrAvaRe nimantraRe ca:ket:10:0437:u:sew:के॑तँ॑","kepf!:kampane ca:kep:01:0426:A:sew:के॑पृँ॒","kelf!:calane:kel:01:0616:pa:sew:के॑लृँ॑","kevf!:sevane ityapyeke:kev:01:0583:A:sew:के॑वृँ॒","kE:Sabde:kE:01:1064:pa:aniw:कै॒","knaTa!:hiMsArTaH:knaT:01:0911:pa:sew:क्न॑थँ॑","knasu!:hvaraRadIptyoH mit 1939:knas:04:0007:pa:sew:क्न॑सुँ॑","knUY:Sabde:knU:09:0012:u:sew:क्नू॑ञ्","knUyI!:Sabda unde ca:knUy:01:0558:A:sew:क्नू॑यीँ॒","kmara!:hUrCane:kmar:01:0636:pa:sew:क्म॑रँ॑","kraTa!:hiMsArTaH:kraT:01:0912:pa:sew:क्र॑थँ॑","krada!:vEklavye vEkalya ityeke ityanye:krad:01:0882:A:sew:क्र॑दँ॒","kradi!:AhvAne rodane ca:krand:01:0879:pa:sew:क्र॑दिँ॑","kradi!:vEklavye vEkalya ityeke:krand:01:0074:A:sew:क्र॑दिँ॒","krapa!:kfpAyAM gatO ca ityeke:krap:01:0876:A:sew:क्र॑पँ॒","kramu!:pAdavikzepe:kram:01:0545:pa:sew:क्र॑मुँ॑","qukrIY:dravyavinimaye:krI:09:0001:u:aniw:डुक्री॒ञ्","krIqf!:vihAre:krIq:01:0405:pa:sew:क्री॑डृँ॑","kruYca!:kOwilyAlpIBAvayoH:kruYc:01:0213:pa:sew:क्रु॑ञ्चँ॑","kruqa!:nimajjane ityeke:kruq:06:0128:pa:sew:क्रु॑डँ॑","kruDa!:kroDe kope:kruD:04:0086:pa:aniw:क्रु॒धँ॑","kruSa!:AhvAne rodane ca:kruS:01:0992:pa:aniw:क्रु॒शँ॑","klaTa!:hiMsArTAH:klaT:01:0913:pa:sew:क्ल॑थँ॑","klada!:vEklavye vEkalya ityeke ityanye:klad:01:0883:A:sew:क्ल॑दँ॒","kladi!:AhvAne rodane ca:kland:01:0880:pa:sew:क्ल॑दिँ॑","kladi!:vEklavye vEkalya ityeke ityanye:kland:01:0075:A:sew:क्ल॑दिँ॒","klapa!:vyaktAyAM vAci ityeke:klap:10:0162:u:sew:क्ल॑पँ॑","klamu!:glAnO:klam:04:0104:pa:sew:क्ल॑मुँ॑","klidU!:AdrIBAve:klid:04:0157:pa:sew:क्लि॑दूँ॑","klidi!:paridevane:klind:01:0015:A:sew:क्लि॑दिँ॒","klidi!:paridevane:klind:01:0076:pa:sew:क्लि॑दिँ॑","kliSa!:upatApe:kliS:04:0057:A:sew:क्लि॑शँ॒","kliSU!:vibADane:kliS:09:0058:pa:sew:क्लि॑शूँ॑","klIbf!:aDArzWye:klIb:01:0441:A:sew:क्ली॑बृँ॒","kluN:gatO ityeke:klu:01:1113:A:aniw:क्लु॒ङ्","kleSa!:avyaktAyAM vAci bADana ityanye iti durgaH:kleS:01:0691:A:sew:क्ले॑शँ॒","kvaRa!:SabdArTaH:kvaR:01:0518:pa:sew:क्व॑णँ॑","kvaTe!:nizpAke:kvaT:01:0981:pa:sew:क्व॑थेँ॑","kzaji!:kfcCrajIvane:kzaYj:10:0113:u:sew:क्ष॑जिँ॑","kzaji!:gatidAnayoH:kzaYj:01:0873:A:sew:क्ष॑जिँ॒","kzaRu!:hiMsAyAm:kzaR:08:0003:u:sew:क्ष॑णुँ॒॑","kzapa!:preraRe:kzap:10:0487:u:sew:क्ष॑पँ॑","kzapayaSca:mit iti BojaH:kzap:01:0935:pa:sew:क्ष॒प॑य॒॑श्च॑","kzamU!:sahane:kzam:04:0103:pa:sew:क्ष॑मूँ॑","kzamU!z:sahane:kzam:01:0510:A:sew:क्ष॑मूँ॒ष्","kzapi!:kzAntyAm:kzamp:10:0112:u:sew:क्ष॑पिँ॑","kzara!:saYcalane:kzar:01:0986:pa:sew:क्ष॑रँ॑","kzala!:SOcakarmaRi:kzal:10:0086:u:sew:क्ष॑लँ॑","kzi:kzI' hiMsAyAm kzirBAzAyAmityeke:kzi:05:0033:pa:sew:क्षि॑","kzi:kzaye:kzi:01:0269:pa:aniw:क्षि॒","kzi:nivAsagatyoH:kzi:06:0143:pa:aniw:क्षि॒","kziRu!:hiMsAyAm ca:kziR:08:0004:u:sew:क्षि॑णुँ॒॑","kzipa!:preraRe:kzip:06:0005:u:aniw:क्षि॒पँ॒॑","kzipa!:prerane:kzip:04:0015:pa:aniw:क्षि॒पँ॑","kzivu!:nirasane:kziv:01:0648:pa:sew:क्षि॑वुँ॑","kzI:hiMsAyAm ityeke kzirBAzAyAmityeke:kzI:05:0039:pa:sew:क्षी॑","kzIja!:avyakte Sabde:kzIj:01:0270:pa:sew:क्षी॑जँ॑","kzIbf!:made:kzIb:01:0442:A:sew:क्षी॑बृँ॒","kzIvf!:made ityeke:kzIv:01:0443:A:sew:क्षी॑वृँ॒","kzIz:hiMsAyAm:kzIz:09:0042:pa:aniw:क्षी॒ष्","wukzu:Sabde:kzu:02:0031:pa:sew:टु॑क्षु॑","kzudi!r:samprezaRe:kzud:07:0006:u:aniw:क्षु॒दिँ॒॑र्","kzuDa!:buBukzAyAm:kzuD:04:0087:pa:aniw:क्षु॒धँ॑","kzuBa!:saYcalane:kzuB:09:0055:pa:sew:क्षु॑भँ॑","kzuBa!:saYcalane:kzuB:04:0154:pa:sew:क्षु॑भँ॑","kzuBa!:saYcalane:kzuB:01:0854:A:sew:क्षु॑भँ॒","kzura!:vileKane:kzur:06:0070:pa:sew:क्षु॑रँ॑","kzura!:saYcaye:kzur:01:0987:pa:sew:क्षु॑रँ॑","kzevu!:nirasane:kzev:01:0649:pa:sew:क्षे॑वुँ॑","kzE:kzaye:kzE:01:1061:pa:aniw:क्षै॒","kzowa!:kzepe:kzow:10:0416:u:sew:क्षो॑टँ॑","kzRu:tejane:kzRu:02:0032:pa:sew:क्ष्णु॑","kzmAyI!:viDUnane:kzmAy:01:0559:A:sew:क्ष्मा॑यीँ॒","kzmIla!:nimezaRe:kzmIl:01:0598:pa:sew:क्ष्मी॑लँ॑","YikzvidA!:snehanamocanayoH gAtraprasravaRe:kzvid:04:1133:A:sew:ञिक्ष्वि॑दाँ॑","YikzvidA!:avyakte Sabde:kzvid:01:1133:pa:sew:ञिक्ष्वि॑दाँ॑","YikzvidA!:snehanamocanayoH:kzvid:04:0159:pa:sew:ञिक्ष्वि॑दाँ॑","kzvelf!:calane:kzvel:01:0618:pa:sew:क्ष्वे॑लृँ॑","Kaca!:BUtaprAdurBAve:Kac:09:0067:pa:sew:ख॑चँ॑","Kaja!:manTe:Kaj:01:0264:pa:sew:ख॑जँ॑","Kaji!:gativEkalye:KaYj:01:0266:pa:sew:ख॑जिँ॑","Kawa!:kANkzAyAm:Kaw:01:0346:pa:sew:ख॑टँ॑","Kawwa!:saMvaraRe:Kaww:10:0127:u:sew:ख॑ट्टँ॑","Kaqa!:KaRqane Bedane:Kaq:10:0065:u:sew:ख॑डँ॑","Kaqi!:KaRqane Bedane:KaRq:10:0066:u:sew:ख॑डिँ॑","Kaqi!:manTe:KaRq:01:0317:A:sew:ख॑डिँ॒","Kada!:sTErye hiMsAyAM ca:Kad:01:0052:pa:sew:ख॑दँ॑","Kanu!:avadAraRe:Kan:01:1020:u:sew:ख॑नुँ॒॑","Karja!:vyaTane pUjane ca:Karj:01:0261:pa:sew:ख॑र्जँ॑","Karda!:dandaSUke:Kard:01:0062:pa:sew:ख॑र्दँ॑","Karba!:gatO:Karb:01:0487:pa:sew:ख॑र्बँ॑","Karva!:darpe:Karv:01:0665:pa:sew:ख॑र्वँ॑","Kala!:saYcalane saYcaye ca:Kal:01:0626:pa:sew:ख॑लँ॑","Kava!:BUtaprAdurBAve ityeke:Kav:09:0068:pa:sew:ख॑वँ॑","Kaza!:hiMsArTaH:Kaz:01:0782:pa:sew:ख॑षँ॑","KAdf!:BakzaRe:KAd:01:0051:pa:sew:खा॑दृँ॑","Kiwa!:trAse:Kiw:01:0339:pa:sew:खि॑टँ॑","Kida!:dEnye:Kid:07:0012:A:aniw:खि॒दँ॒","Kida!:dEnye:Kid:04:0066:A:aniw:खि॒दँ॒","Kida!:pariGAte pariGAtane:Kid:06:0172:pa:aniw:खि॒दँ॑","KuN:Sabde:Ku:01:1104:A:aniw:खु॒ङ्","Kuju!:steyakaraRe:Kuj:01:0227:pa:sew:खु॑जुँ॑","Kuqa!:saMvaraRe ityeke:Kuq:06:0119:pa:sew:खु॑डँ॑","Kuqi!:KaRqane:KuRq:10:0072:u:sew:खु॑डिँ॑","Kura!:Cedane:Kur:06:0068:pa:sew:खु॑रँ॑","Kurda:krIqAyAmeva:Kurd:01:0022:A:sew:खु॑र्द॒","Kewa!:BakzaRe:Kew:10:0413:u:sew:खे॑टँ॑","Keqa!:BakzaRe ityeke:Keq:10:0414:u:sew:खे॑डँ॑","Kelf!:calane:Kel:01:0617:pa:sew:खे॑लृँ॑","Kevf!:sevane ityapyeke:Kev:01:0581:A:sew:खे॑वृँ॒","KE:Kadane:KE:01:1060:pa:aniw:खै॒","Kowa!:BakzaRe ityanye:Kow:10:0415:u:sew:खो॑टँ॑","Korf!:gatipratiGAte:Kor:01:0633:pa:sew:खो॑रृँ॑","Kolf!:gatipratiGAte:Kol:01:0632:pa:sew:खो॑लृँ॑","KyA:prakaTane:KyA:02:0055:pa:aniw:ख्या॒","gaja!:SabdArTaH:gaj:10:0149:u:sew:ग॑जँ॑","gaja!:SabdArTaH:gaj:01:0279:pa:sew:ग॑जँ॑","gaji!:SabdArTaH:gaYj:01:0280:pa:sew:ग॑जिँ॑","gaqa!:secane:gaq:01:0886:pa:sew:ग॑डँ॑","gaRa:saNKyAne:gaR:10:0391:u:sew:ग॑णँ॑","gaqi!:vadanEkadeSe:gaRq:01:0068:pa:sew:ग॑डिँ॑","gaqi!:vadanEkadeSe:gaRq:01:0419:pa:sew:ग॑डिँ॑","gadI!:devaSabde:gad:10:0399:u:sew:ग॑दीँ॑","gada!:vyaktAyAM vAci:gad:01:0054:pa:sew:ग॑दँ॑","ganDa!:ardane:ganD:10:0204:A:sew:ग॑न्धँ॒","gamx!:gatO:gam:01:1137:pa:aniw:ग॒मॢँ॑","garja!:Sabde:garj:10:0177:u:sew:ग॑र्जँ॑","garja!:Sabde:garj:01:0258:pa:sew:ग॑र्जँ॑","garda!:Sabde:gard:01:0059:pa:sew:ग॑र्दँ॑","garda!:Sabde:gard:10:0178:u:sew:ग॑र्दँ॑","garDa!:aBikANkzAyAm:garD:10:0179:u:sew:ग॑र्धँ॑","garba!:gatO:garb:01:0488:pa:sew:ग॑र्बँ॑","garva:mAne:garv:10:0449:A:sew:ग॑र्वँ॒","garva!:darpe:garv:01:0666:pa:sew:ग॑र्वँ॑","garha!:kutsAyAm:garh:01:0723:A:sew:ग॑र्हँ॒","garha!:vinindane:garh:10:0383:u:sew:ग॑र्हँ॑","gala!:adane BakzaRe srAve ca:gal:01:0627:pa:sew:ग॑लँ॑","gala!:sravaRe:gal:10:0223:A:sew:ग॑लँ॒","galBa!:DArzwye:galB:01:0457:A:sew:ग॑ल्भँ॒","galha!:kutsAyAm:galh:01:0724:A:sew:ग॑ल्हँ॒","gaveza!:mArgaRe:gavez:10:0425:u:sew:ग॑वे॑षँ॑","gAN:gatO:gA:01:1101:A:aniw:गा॒ङ्","gA:stutO:gA:03:0026:pa:aniw:गा॒","gADf!:pratizWAlipsayorgranTe ca:gAD:01:0004:A:sew:गा॑धृँ॒","gAhU!:viloqane:gAh:01:0736:A:sew:गा॑हूँ॒","guN:Sabde:gu:01:1105:A:aniw:गु॒ङ्","guN:avyakte Sabde:gu:01:1100:A:aniw:गु॒ङ्","gu:purIzotsarge:gu:06:0134:pa:aniw:गु॒","guja!:avyakte Sabde:guj:01:0230:pa:sew:गु॑जँ॑","guja!:Sabde:guj:06:0096:pa:sew:गु॑जँ॑","guji!:avyakte Sabde:guYj:01:0231:pa:sew:गु॑जिँ॑","guqa!:rakzAyAm:guq:06:0097:pa:sew:गु॑डँ॑","guRa!:cAmantraRe:guR:10:0436:u:sew:गु॑णँ॑","guWi!:rakzaRe vezwane ca rakzaRa ityeke ityapare:guRW:10:0071:u:sew:गु॑ठिँ॑","guqi!:rakzaRe vezwane ca rakzaRa ityeke:guRq:10:0069:u:sew:गु॑डिँ॑","guda!:krIqAyAmeva:gud:01:0024:A:sew:गु॑दँ॒","guDa!:parivezwane:guD:04:0014:pa:sew:गु॑धँ॑","guDa!:roze:guD:09:0053:pa:sew:गु॑धँ॑","gupa!:BAzArTaH:gup:04:0147:u:sew:गु॑पँ॑","gupa!:gopane:gup:01:1125:A:sew:गु॑पँ॒","gupU!:rakzaRe:gup:01:0461:pa:sew:गु॑पूँ॑","gupa!:vyAkulatve:gup:10:0302:pa:sew:गु॑पँ॑","guPa!:granTe:guP:06:0042:pa:sew:गु॑फँ॑","gumPa!:granTe:gumP:06:0043:pa:sew:गु॑म्फँ॑","gurI!:udyamane:gur:06:0131:A:sew:गु॑रीँ॒","gurda:krIqAyAmeva guqakrIqAyAmeva:gurd:01:0023:A:sew:गु॑र्द॒","gurda!:pUrvaniketane niketane ityanye:gurd:10:0180:u:sew:गु॑र्दँ॑","gurvI!:udyamane:gurv:01:0655:pa:sew:गु॑र्वीँ॑","guhU!:saMvaraRe:guh:01:1043:u:sew:गु॑हूँ॒॑","gUra!:udyamane:gUr:04:0049:A:sew:गू॑रँ॒","gUrI!:hiMsAgatyoH:gUr:10:0217:A:sew:गू॑रीँ॒","gfhU!:grahaRe:gUh:01:0737:A:sew:गृ॑हूँ॒","gf:secane:gf:01:1087:pa:aniw:गृ॒","gfja!:SabdArTaH gaja! madane ca:gfj:01:0281:pa:sew:गृ॑जँ॑","gfji!:SabdArTaH:gfYj:01:0282:pa:sew:गृ॑जिँ॑","gfDu!:aBikANkzAyAm:gfD:04:0161:pa:sew:गृ॑धुँ॑","gfha:grahaRe:gfh:10:0441:A:sew:गृ॑हँ॒","gF:nigaraRe:gF:09:0033:pa:sew:गॄ॑","gF:vijYAne:gF:06:0146:A:sew:गॄ॑","gF:Sabde:gF:10:0231:pa:sew:गॄ॑","gepf!:kampane ca:gepa:01:0427:A:sew:गे॑पृँ॒","gevf!:sevane:gev:01:0575:A:sew:गे॑वृँ॒","gezf!:anvicCAyAm:gez:01:0698:A:sew:गे॑षृँ॒","gE:Sabde:gE:01:1065:pa:aniw:गै॒","goma!:upalepane:gom:10:0417:u:sew:गो॑मँ॑","gozwa!:saNGAte:gozw:01:0290:A:sew:गो॑ष्टँ॒","graTi!:kOwilye:granT:01:0036:A:sew:ग्र॑थिँ॒","granTa!:banDane:granT:09:0049:u:sew:ग्र॑न्थँ॑","granTa!:sandarBe:granT:10:0362:u:sew:ग्र॑न्थँ॑","granTa!:sandarBe:granT:10:0375:pa:sew:ग्र॑न्थँ॑","grasu!:adane:gras:01:0717:A:sew:ग्र॑सुँ॒","grasa!:grahaRe:gras:10:0279:u:sew:ग्र॑सँ॑","graha!:upAdAne:grah:09:0071:u:sew:ग्र॑हँ॒॑","grAma!:AmantraRe:grAm:10:0434:u:sew:ग्रा॑मँ॑","grucu!:steyakaraRe:gruc:01:0224:pa:sew:ग्रु॑चुँ॑","glasu!:adane:glas:01:0718:A:sew:ग्ल॑सुँ॒","glaha!:grahaRe ca apAdAne:glah:01:0738:A:sew:ग्ल॑हँ॒","glucu!:steyakaraRe:gluc:01:0225:pa:sew:ग्लु॑चुँ॑","gluYca!:gatO:gluYc:01:0228:pa:sew:ग्लु॑ञ्चँ॑","glepf!:ca kampane:glep:01:0424:A:sew:ग्ले॑पृँ॒","glepf!:dEnye:glep:01:0428:A:sew:ग्ले॑पृँ॒","glevf!:sevane:glev:01:0576:A:sew:ग्ले॑वृँ॒","glezf!:anvicCAyAm ityeke:glez:01:0699:A:sew:ग्ले॑षृँ॑","glE:harzakzaye mit anupasargAdvA 1945:glE:01:1051:pa:aniw:ग्लै॒","GagGa!:hasane ityeke:GagG:01:0180:pa:sew:घ॑ग्घँ॑","GaGa!:hasane:GaG:01:0179:pa:sew:घ॑घँ॑","Gawa!:BAzArTaH:Gaw:10:0297:u:sew:घ॑टँ॑","Gawa!:cezwAyAm:Gaw:01:0867:A:sew:घ॑टँ॒","Gawa!:saNGAte hantyarTASca:Gaw:10:0248:u:sew:घ॑टँ॑","Gawwa!:calane:Gaww:10:0125:u:sew:घ॑ट्टँ॑","Gawwa!:calane:Gaww:01:0292:A:sew:घ॑ट्टँ॒","Gawi!:BAzArTaH:GaRw:10:0298:u:sew:घ॑टिँ॑","Gaza!:kAntikaraRe iti kecit:Gaz:01:0740:A:sew:घ॑षँ॒","Gasx!:adane:Gas:01:0812:pa:sew:घ॑सॢँ॑","GiRi!:grahaRe:GiRR:01:0502:A:sew:घि॑णिँ॒","GuN:Sabde:Gu:01:0739:A:aniw:घु॒ङ्","Guzi!:kAntikaraRe:GuMz:01:1106:A:sew:घु॑षिँ॒","Guwa!:parivartane:Guw:01:0848:A:sew:घु॑टँ॒","Guwa!:pratiGAte:Guw:06:0115:pa:sew:घु॑टँ॑","GuRa!:BramaRe:GuR:06:0064:pa:sew:घु॑णँ॑","GuRa!:BramaRe:GuR:01:0505:A:sew:घु॑णँ॒","GuRi!:grahaRe:GuRR:01:0503:A:sew:घु॑णिँ॒","Gura!:BImArTaSabdayoH:Gur:06:0071:pa:sew:घु॑रँ॑","Guzi!r:aviSabdane Sabda ityanye peWuH:Guz:01:0741:pa:sew:घु॑षिँ॑र्","Guzi!r:viSabdane:Guz:10:0251:u:sew:घु॑षिँ॑र्","GUrI:hiMsAvayohanyoH:GUr:04:0050:A:sew:घू॑री॒","GUrRa!:BramaRe:GUrR:06:0065:pa:sew:घू॑र्णँ॑","GUrRa!:BramaRe:GUrR:01:0506:A:sew:घू॑र्णँ॒","Gf:kzaraRadIptyoH:Gf:10:0152:pa:aniw:घृ॒","Gf:prasravaRe srAvaRa ityeke:Gf:03:0015:u:sew:घृ॑","Gf:secane:Gf:01:1088:pa:aniw:घृ॒","GfRu!:dIptO:GfR:08:0007:u:sew:घृ॑णुँ॒॑","GfRi!:grahaRe:GfRR:01:0504:A:sew:घृ॑णिँ॒","Gfzu!:saNGarze:Gfz:01:0805:pa:sew:घृ॑षुँ॑","GrA:ganDopAdAne GrARe:GrA:01:1075:pa:aniw:घ्रा॒","DrAGf!:sAmarTye ityapi kecit:GrAG:01:0121:A:sew:ध्रा॑घृँ॒","NuN:Sabde:Nu:01:1107:A:aniw:ङु॑ङ्","cakAsf!:dIptO:cakAs:02:0069:pa:sew:च॑का॑सृँ॑","caka!:tfptO:cak:01:0098:pa:sew:च॑कँ॑","caka!:tfptO pratiGAte ca:cak:01:0892:A:sew:च॑कँ॒","cakka!:vyaTane:cakk:10:0084:u:sew:च॑क्कँ॑","cakzi!N:vyaktAyAM vAci ayaM darSane'pi:cakz:02:0007:A:aniw:च॒क्षिँ॒ङ्","caYcu!:gatyarTaH:caYc:01:0217:pa:sew:च॑ञ्चुँ॑","cawa!:Bedane:caw:10:0246:u:sew:च॑टँ॑","cawe!:varzAvaraRayoH ityeke:caw:01:0331:pa:sew:च॑टेँ॑","caRa!:gatO dAne ca:caR:01:0905:pa:sew:च॑णँ॑","caqi!:kope:caRq:01:0312:A:sew:च॑डिँ॒","caqi!:kope caRqa ityanye:caRq:10:0075:u:sew:च॑डिँ॑","cate!:pariBAzaRe yAcane ca:cat:01:1003:u:sew:च॑तेँ॒॑","cade!:pariBAzaRe yAcane ca:cad:01:1004:u:sew:च॑देँ॒॑","cana!:ca hiMsArTaH:can:01:0914:pa:sew:च॑नँ॑","cana!:SradDopahananayorityeke:can:10:0378:u:sew:च॑नँ॑","cadi!:AhlAde dIptO ca:cand:01:0071:pa:sew:च॑दिँ॑","capa!:parikalpane ityeke:cap:10:0121:u:sew:च॑पँ॑","capa!:sAntvane:cap:01:0465:pa:sew:च॑पँ॑","camu!:adane na mit 1951:cam:01:0540:pa:sew:च॑मुँ॑","camu!:BakzaRe na mit 1951:cam:05:0540:pa:sew:च॑मुँ॑","capi!:gatyAm:camp:10:0111:u:sew:च॑पिँ॑","caya!:gatO:cay:01:0550:A:sew:च॑यँ॒","cara!:gatyarTAH caratirBakzaRarTo'pi! cara! BakzaRe ca caratirBakzaRe'pi:car:01:0640:pa:sew:च॑रँ॑","cara!:saMSaye:car:10:0274:u:sew:च॑रँ॑","carca!:pariBAzaRaBartsanayoH:carc:10:0237:pa:sew:च॑र्चँ॑","carca!:pariBAzaRahiMsAtarjanezu:carc:01:0814:pa:sew:च॑र्चँ॑","carca!:aDyayane:carc:06:0019:u:sew:च॑र्चँ॑","carba!:gatO carba! adane ca:carb:01:0491:pa:sew:च॑र्बँ॑","carva!:adane:carv:01:0660:pa:sew:च॑र्वँ॑","cala!:kampane kampane caliH mit 1924:cal:01:0966:pa:sew:च॑लँ॑","cala!:BftO:cal:06:0083:u:sew:च॑लँ॑","cala!:vilasane:cal:10:0097:pa:sew:च॑लँ॑","caza!:BakzaRe:caz:01:1034:u:sew:च॑षँ॒॑","caha!:parikalkane:cah:10:0405:u:sew:च॑हँ॑","caha!:parikalkane:cah:01:0830:pa:sew:च॑हँ॑","caha!:parikalpane:cah:10:0120:u:sew:च॑हँ॑","cAyf!:pUjAniSAmanayoH:cAy:01:1023:u:sew:चा॑यृँ॒॑","ci:BAzArTaH ca:ci:10:0325:u:sew:चि॑","ciY:cayane:ci:05:0005:u:sew:चि॑ञ्","ciY:cayane:ci:10:0124:u:aniw:चि॒ञ्","ciwa!:paraprEzye paraprezye:ciw:01:0353:pa:sew:चि॑टँ॑","cita!:saYcetane:cit:10:0192:A:sew:चि॑तँ॒","citI!:saYjYAne:cit:01:0039:pa:sew:चि॑तीँ॑","citra!:citrIkaraRe kadAciddarSane:citr:10:0459:u:sew:चि॑त्रँ॑","citi!:smftyAm:cint:10:0002:u:sew:चि॑तिँ॑","ciri:hiMsAyAm:ciri:05:0034:pa:sew:चि॑रि॑","cila!:vasane:cil:06:0082:pa:sew:चि॑लँ॑","cilla!:SETilye BAvakaraRe ca:cill:01:0611:pa:sew:चि॑ल्लँ॑","cIka!:AmarzaRe ca:cIk:10:0364:u:sew:ची॑कँ॑","cIva!:BAzArTaH:cIb:10:0305:u:sew:ची॑वँ॑","cIbf!:AdAnasaMvaraRayoH ityeke:cIb:01:1022:u:sew:ची॑बृँ॒॑","cIBf!:ca katTane:cIB:01:0446:A:sew:ची॑भृँ॒","cIva!:BAzArTaH:cIv:10:0305:u:sew:ची॑वँ॑","cIvf!:AdAnasaMvaraRayoH:cIv:01:1021:u:sew:ची॑वृँ॒॑","cukka!:vyaTane:cukk:10:0085:u:sew:चु॑क्कँ॑","cucya!:aBizave ityeke:cucy:01:0591:pa:sew:चु॑च्यँ॑","cuwa!:Cedane:cuw:10:0103:pa:sew:चु॑टँ॑","cuwa!:Cedane:cuw:06:0104:u:sew:चु॑टँ॑","cuwwa!:alpIBAve:cuww:10:0036:u:sew:चु॑ट्टँ॑","cuqa!:saMvaraRe:cuq:06:0126:pa:sew:चु॑डँ॑","cuqqa!:BAvakaraRe:cuqq:01:0402:pa:sew:चु॑ड्डँ॑","cuwi!:Cedane:cuRw:10:0164:u:sew:चु॑टिँ॑","cuqi!:alpIBAve:cuRq:01:0368:pa:sew:चु॑डिँ॑","cuda!:saYcodane:cud:10:0081:u:sew:चु॑दँ॑","cuqqa!:BAvakaraRe:cudq:01:0402:pa:sew:चु॑ड्डँ॑","cupa!:mandAyAM gatO:cup:01:0469:pa:sew:चु॑पँ॑","cubi!:vaktrasaMyoge:cumb:01:0495:pa:sew:चु॑बिँ॑","cubi!:hiMsAyAm:cumb:10:0130:u:sew:चु॑बिँ॑","cura!:steye:cur:10:0001:u:sew:चु॑रँ॑","cula!:samucCrAye:cul:10:0091:u:sew:चु॑लँ॑","culla!:BAvakaraRe:cull:01:0609:pa:sew:चु॑ल्लँ॑","cUrI!:dAhe:cUr:04:0053:A:sew:चू॑रीँ॒","cUrRa!:preraRe:cUrR:10:0143:u:sew:चू॑र्णँ॑","cUrRa!:saNkocane:cUrR:10:0026:u:sew:चू॑र्णँ॑","cUza!:pAne:cUz:01:0767:pa:sew:चू॑षँ॑","cftI!:hiMsAgranTanayoH:cft:06:0049:pa:sew:चृ॑तीँ॑","cfpa!:sandIpane ityeke:cfp:10:0353:u:sew:चृ॑पँ॑","celf!:calane:cel:01:0615:pa:sew:चे॑लृँ॑","cezwa!:cezwAyAm:cezw:01:0289:A:sew:चे॑ष्टँ॒","cyu:hasane sahane cetyeke:cyu:10:0275:u:sew:च्यु॑","cyuti!r:Asecane:cyut:01:0040:pa:sew:च्यु॑तिँ॑र्","Caji!:kfcCrajIvane ityeke:CaYj:10:0114:u:sew:छ॑जिँ॑","Cada!:apavAraRe:Cad:10:0481:u:sew:छ॑दँ॑","Cada!:apavAraRe Cadir Urjane mit 1925:Cad:10:0359:u:sew:छ॑दँ॑","Cada!:saMvaraRe Cadir Urjane mit 1925:Cad:10:0370:u:sew:छ॑दँ॑","Cadi!:saMvaraRe:Cand:10:0062:u:sew:छ॑दिँ॑","Camu!:adane:Cam:01:0541:pa:sew:छ॑मुँ॑","Carda:vamane:Card:10:0078:u:sew:छ॑र्द॑","Caza!:hiMsAyAm:Caz:01:1035:u:sew:छ॑षँ॒॑","Cidi!r:dvEDIkaraRe:Cid:07:0003:u:aniw:छि॒दिँ॒॑र्","Cidra!:karRaBedane karaRaBedana ityeke:Cidr:10:0469:u:sew:छि॑द्रँ॑","Cuwa!:Cedane:Cuw:06:0105:pa:sew:छु॑टँ॑","Cuqa!:saMvaraRe ityeke:Cuq:06:0120:pa:sew:छु॑डँ॑","Cupa!:sparSe:Cup:06:0154:pa:aniw:छु॒पँ॑","Cura!:Cedane:Cur:06:0099:pa:sew:छु॑रँ॑","u!Cfdi!r:dIptidevanayoH:Cfd:10:0352:u:sew:उँ॑छृ॑दिँ॒॑र्","CfdI!:sandIpane:Cfd:07:0008:u:sew:छृ॑दीँ॑","Cfpa!:sandIpane ityeke:Cfp:10:0354:u:sew:छृ॑पँ॑","Ceda!:dvEDIkaraRe:Ced:10:0480:u:sew:छे॑दँ॑","Co:Cedane:Co:04:0041:pa:aniw:छो॒","jasi!:rakzaRe mokzaRa ityeke:jaMs:10:0182:u:sew:ज॑सिँ॑","jakza!:BakzyahasanayoH:jakz:02:0066:pa:sew:ज॑क्षँ॑","jaja!:yudDe:jaj:01:0275:pa:sew:ज॑जँ॑","jaji!:yudDe:jaYj:01:0276:pa:sew:ज॑जिँ॑","jawa!:saNGAte:jaw:01:0342:pa:sew:ज॑टँ॑","jana!:janane mit 1937:jan:03:0025:pa:sew:ज॑नँ॑","janI!:prAdurBAve mit 1937:jan:04:0044:A:sew:ज॑नीँ॒","japa!:vyaktAyAM vAci japa! mAnase ca:jap:01:0463:pa:sew:ज॑पँ॑","jaBI!:gAtravinAme:jaB:01:0453:A:sew:ज॑भीँ॒","jamu!:adane:jam:01:0542:pa:sew:ज॑मुँ॑","jaBi!:nASane:jamB:10:0241:u:sew:ज॑भिँ॑","jartsa!:pariBAzaRahiMsAtarjanezu:jarc:01:0813:pa:sew:ज॑र्त्सँ॑","jartsa!:pariBAzaRahiMsAtarjanezu:jarj:01:0813:pa:sew:ज॑र्त्सँ॑","jarja!:pariBAzaRaBartsanayoH:jarj:06:0018:pa:sew:ज॑र्जँ॑","jartsa!:pariBAzaRahiMsAtarjanezu:jarts:01:0813:pa:sew:ज॑र्त्सँ॑","jala!:apavAraRe:jal:10:0015:u:sew:ज॑लँ॑","jala!:GAtane:jal:01:0967:pa:sew:ज॑लँ॑","jalpa!:vyaktAyAM vAci:jalp:01:0464:pa:sew:ज॑ल्पँ॑","jaza!:hiMsArTaH:jaz:01:0784:pa:sew:ज॑षँ॑","jasu!:tAqane:jas:10:0243:u:sew:ज॑सुँ॑","jasu!:mokzane:jas:10:0184:pa:sew:ज॑सुँ॑","jasu!:hiMsAyAm:jas:04:0108:u:sew:ज॑सुँ॑","jAgf:nidrAkzaye:jAgf:02:0067:pa:sew:जा॑गृ॑","ji:BAzArTaH ca:ji:10:0324:u:sew:जि॑","ji:aBiBave:ji:01:0642:pa:aniw:जि॒","ji!:jaye:ji:01:1096:pa:aniw:जिँ॒","ci:BAzArTaH ca:jinv:10:0325:u:sew:चि॑","jivi!:prIRanArTAH:jinv:01:0678:pa:sew:जि॑विँ॑","jimu!:adane iti kecit:jim:01:0544:pa:sew:जि॑मुँ॑","jiri:hiMsAyAm:jiri:05:0035:pa:sew:जि॑रि॑","jizu!:secane:jiz:01:0793:pa:sew:जि॑षुँ॑","jIva!:prARaDAraRe:jIv:01:0643:pa:sew:जी॑वँ॑","juN:gatO:ju:01:1098:A:aniw:जु॒ङ्","ju:iti sOtro DAtuH gatyarTaH:ju:01:1110:pa:aniw:जु॒","jugi!:varjane:juNg:01:0176:pa:sew:जु॑गिँ॑","ci:BAzArTaH ca:juYc:10:0325:u:sew:चि॑","juwa!:banDane ityeke:juw:06:0107:pa:sew:जु॑टँ॑","juqa!:gatO:juq:10:0148:pa:sew:जु॑डँ॑","juqa!:preraRe:juq:06:0051:u:sew:जु॑डँ॑","juqa!:banDane:juq:06:0106:pa:sew:जु॑डँ॑","jutf!:BAsaRe:jut:01:0032:A:sew:जु॑तृँ॒","juna!:gatO ityeke:jun:06:0052:pa:sew:जु॑नँ॑","juza!:paritarkane paritarpaRa ityanye:juz:06:0008:u:sew:जु॑षँ॑","juzI!:prItisevanayoH:juz:10:0371:A:sew:जु॑षीँ॒","jUrI!:hiMsAvayohanyoH:jUr:04:0051:A:sew:जू॑रीँ॒","jUza!:ca hiMsAyAm:jUz:01:0776:pa:sew:जू॑षँ॑","jfBi!:gAtravinAme:jfmB:01:0454:A:sew:जृ॑भिँ॒","jFz:vayohAnO mit 1938:jF:09:0027:pa:sew:जॄ॑ष्","jF:vayohAnO:jF:04:0025:u:sew:जॄ॑","jF:vayohAnO mit 1938:jF:10:0346:pa:sew:जॄ॑","jezf!:gatO:jez:01:0703:A:sew:जे॑षृँ॒","jehf!:prayatne jehf! gatAvapi:jeh:01:0731:A:sew:जे॑हृँ॒","jE:kzaye:jE:01:1062:pa:aniw:जै॒","jYapa!:jYapa! jYAnajYApanamAraRatozaRaniSAnaniSAmanezu:jYap:10:0118:u:sew:ज्ञ॑पँ॑","jYA:avaboDane mAraRatozaRaniSAmanezu jYA mit 1923:jYA:10:0258:pa:aniw:ज्ञा॒","jYA:niyoge:jYA:09:0043:u:sew:ज्ञा॑","jyA:vayohAnO:jyA:09:0034:pa:aniw:ज्या॒","jyuN:gatO:jyu:01:1109:A:aniw:ज्यु॒ङ्","jyuti!r:BAsane:jyut:01:0043:pa:sew:ज्यु॑तिँ॑र्","jri:vayohAnO ca:jri:10:0347:u:sew:ज्रि॑","jri:aBiBave:jri:01:1097:pa:aniw:ज्रि॒","jvara!:roge:jvar:01:0885:pa:sew:ज्व॑रँ॑","jvala!:dIptO mit anupasargAdvA 1941:jval:01:0916:pa:sew:ज्व॑लँ॑","jvala!:dIptO mit anupasargAdvA 1941:jval:01:0965:pa:sew:ज्व॑लँ॑","Jawa!:saNGAte:Jaw:01:0343:pa:sew:झ॑टँ॑","Jamu!:adane:Jam:01:0543:pa:sew:झ॑मुँ॑","Jartsa!:pariBAzaRahiMsAtarjanezu:Jarj:01:0815:pa:sew:झ॑र्त्सँ॑","Jartsa!:pariBAzaRahiMsAtarjanezu:JarJ:01:0815:pa:sew:झ॑र्त्सँ॑","JarJa!:pariBAzaRaBartsanayoH:JarJ:06:0020:pa:sew:झ॑र्झँ॑","Jartsa!:pariBAzaRahiMsAtarjanezu:Jarts:01:0815:pa:sew:झ॑र्त्सँ॑","Jaza!:hiMsArTaH:Jaz:01:0785:pa:sew:झ॑षँ॑","Jaza!:AdAnasaMvaraRayoH:Jaz:01:1036:u:sew:झ॑षँ॒॑","JF:vayohAnO ityeke:JF:09:0028:pa:sew:झॄ॑","JFz:vayohAnO:JF:04:0026:pa:sew:झॄ॑ष्","waki!:banDane:waNk:10:0135:u:sew:ट॑किँ॑","wala!:vEkalye:wal:01:0968:pa:sew:ट॑लँ॑","wikf!:gatyarTaH:wik:01:0108:A:sew:टि॑कृँ॒","wIkf!:gatyarTaH:wIk:01:0109:A:sew:टी॑कृँ॒","wvala!:vEkalye:wval:01:0969:pa:sew:ट्व॑लँ॑","qapa!:saNGAte:qap:10:0196:A:sew:ड॑पँ॒","qipa!:kzepe:qip:04:0145:u:sew:डि॑पँ॑","qipa!:kzepe:qip:10:0189:pa:sew:डि॑पँ॑","qipa!:kzepe:qip:10:0197:pa:sew:डि॑पँ॑","qipa!:saNGAte:qip:06:0098:A:sew:डि॑पँ॒","qIN:vihAyasA gatO:qI:04:0030:A:aniw:डी॒ङ्","qIN:vihAyasA gatO:qI:01:1123:A:sew:डी॑ङ्","QOkf!:gatyarTaH:QOk:01:0103:A:sew:ढौ॑कृँ॒","tasi!:alaNkAre:taMs:10:0254:u:sew:त॑सिँ॑","tasi!:alaNkAre:taMs:01:0778:pa:sew:त॑सिँ॑","taka!:hasane:tak:01:0124:pa:sew:त॑कँ॑","takzU!:tanUkaraRe:takz:01:0756:pa:sew:त॑क्षूँ॑","takza!:tvacane:takz:01:0743:pa:sew:त॑क्षँ॑","taki!:kfcCrajIvane:taNk:01:0125:pa:sew:त॑किँ॑","tagi!:gatyarTaH:taNg:01:0158:pa:sew:त॑गिँ॑","taYcu!:gatyarTaH:taYc:01:0218:pa:sew:त॑ञ्चुँ॑","taYcU!:saNkocane:taYc:07:0022:pa:sew:त॑ञ्चूँ॑","tawa!:ucCrAye:taw:01:0345:pa:sew:त॑टँ॑","taqa!:AGAte:taq:10:0064:u:sew:त॑डँ॑","taqa!:BAzArTaH ca:taRq:10:0332:u:sew:त॑डँ॑","taqi!:tAqane:taRq:01:0314:A:sew:त॑डिँ॒","tanu!:vistAre:tan:10:0377:u:sew:त॑नुँ॒॑","tanu!:SradDopakaraRayoH upasargAcca dErGye:tan:08:0001:u:sew:त॑नुँ॑","tatri!:kuwumbaDAraRe:tantr:10:0198:A:sew:त॑त्रिँ॒","tapa!:dAhe ESverye vA:tap:10:0350:A:aniw:त॒पँ॒","tapa!:dAhe:tap:04:0054:u:sew:त॑पँ॑","tapa!:santApe:tap:01:1140:pa:aniw:त॒पँ॑","tamu!:kANkzAyAm:tam:04:0099:pa:sew:त॑मुँ॑","taya!:gatO:tay:01:0551:A:sew:त॑यँ॒","tarka!:BAzArTaH:tark:10:0311:u:sew:त॑र्कँ॑","tarja!:santarjane tarjane:tarj:10:0201:A:sew:त॑र्जँ॒","tarja!:Bartsane:tarj:01:0259:pa:sew:त॑र्जँ॑","tarda!:hiMsAyAm:tard:01:0060:pa:sew:त॑र्दँ॑","tala!:pratizWAyAm:tal:10:0087:u:sew:त॑लँ॑","tasu!:upakzaye:tas:04:0109:pa:sew:त॑सुँ॑","tAyf!:santAnapAlanayoH:tAy:01:0562:A:sew:ता॑यृँ॒","tika!:Askandane gatO ca:tik:05:0022:pa:sew:ति॑कँ॑","tikf!:gatyarTaH:tik:01:0110:A:sew:ति॑कृँ॒","tiga!:Askandane gatO ca:tig:05:0023:pa:sew:ति॑गँ॑","tija!:niSAne:tij:01:1126:A:sew:ति॑जँ॒","tija!:niSAne niSAtane:tij:10:0154:u:sew:ति॑जँ॑","tipf!:kzaraRArTaH:tip:01:0420:A:aniw:ति॒पृँ॒","tima!:ArdrIBAve:tim:04:0017:pa:sew:ति॑मँ॑","tila!:gatO:til:01:0612:pa:sew:ति॑लँ॑","tila!:snehane:til:06:0081:u:sew:ति॑लँ॑","tila!:snehane snehe:til:10:0096:pa:sew:ति॑लँ॑","tilla!:gatO ityeke:till:01:0613:pa:sew:ति॑ल्लँ॑","tIkf!:gatyarTaH:tIk:01:0111:A:sew:ती॑कृँ॒","tIma!:ArdrIBAve:tIm:04:0018:pa:sew:ती॑मँ॑","tIra!:karmasamAptO:tIr:10:0454:u:sew:ती॑रँ॑","tIva!:sTOlye:tIv:01:0646:pa:sew:ती॑वँ॑","tu:gativfdDihiMsAsu vfdDyarTaH iti sOtro DAtuH:tu:02:0029:pa:aniw:तु॑","tuja!:hiMsAbalAdAnaniketanezu:tuj:10:0044:u:sew:तु॑जँ॑","tuja!:hiMsAyAm:tuj:01:0277:pa:sew:तु॑जँ॑","tuji!:BAzArTaH:tuYj:10:0285:u:sew:तु॑जिँ॑","tuji!:hiMsAbalAdAnaniketanezu:tuYj:10:0045:u:sew:तु॑जिँ॑","tuji!:pAlane:tuYj:01:0278:pa:sew:तु॑जिँ॑","tuwa!:kalahakarmaRi:tuw:06:0103:pa:sew:तु॑टँ॑","tuqa!:toqane:tuq:06:0116:pa:sew:तु॑डँ॑","tuqf!:toqane:tuq:01:0406:pa:sew:तु॑डृँ॑","tuRa!:kOwilye:tuR:06:0058:pa:sew:तु॑णँ॑","tuqi!:preraRe:tuRq:10:0166:u:sew:तु॑डिँ॑","tuqi!:toqane:tuRq:01:0309:A:sew:तु॑डिँ॒","tutTa!:AvaraRe:tutT:10:0489:u:sew:तु॑त्थँ॑","tuda!:vyaTane:tud:06:0001:u:aniw:तु॒दँ॒॑","tupa!:hiMsAyAm:tup:06:0032:pa:sew:तु॑पँ॑","tupa!:hiMsArTaH:tup:01:0470:pa:sew:तु॑पँ॑","tuPa!:hiMsAyAm:tuP:06:0034:pa:sew:तु॑फँ॑","tuPa!:hiMsArTaH:tuP:01:0474:pa:sew:तु॑फँ॑","tuBa!:hiMsAyAm:tuB:09:0057:pa:sew:तु॑भँ॑","tuBa!:hiMsAyAm:tuB:04:0156:pa:sew:तु॑भँ॑","tuBa!:hiMsAyAm:tuB:01:0856:A:sew:तु॑भँ॒","tumpa!:hiMsAyAm:tump:06:0033:pa:sew:तु॑म्पँ॑","tumpa!:hiMsArTaH:tump:01:0471:pa:sew:तु॑म्पँ॑","tumPa!:hiMsArTaH:tumP:01:0475:pa:sew:तु॑म्फँ॑","tumPa!:hiMsAyAm:tumP:06:0035:pa:sew:तु॑म्फँ॑","tubi!:adarSane ardana ityeke:tumb:10:0160:u:sew:तु॑बिँ॑","tubi!:ardane:tumb:01:0494:pa:sew:तु॑बिँ॑","tura!:tvaraRe:tur:03:0022:pa:sew:तु॑रँ॑","turvI:hiMsArTaH:turv:01:0651:pa:sew:तु॑र्वी॑","tula!:unmAne:tul:10:0088:u:sew:तु॑लँ॑","tuza!:prItO:tuz:04:0081:pa:aniw:तु॒षँ॑","tusa!:Sabde:tus:01:0807:pa:sew:तु॑सँ॑","tuhi!r:ardane:tuh:01:0838:pa:sew:तु॑हिँ॑र्","tUqf!:toqane ityeke:tUq:01:0407:pa:sew:तू॑डृँ॑","tURa!:pUraRe:tUR:10:0212:A:sew:तू॑णँ॒","tUrI!:gatitvaraRahiMsanayoH:tUr:04:0047:A:sew:तू॑रीँ॒","tUla!:nizkarze:tUl:01:0605:pa:sew:तू॑लँ॑","tUza!:tuzwO:tUz:01:0768:pa:sew:तू॑षँ॑","tfMhU!:hiMsArTAH:tfMh:06:0077:pa:sew:तृं॑हूँ॑","tfkza!:gatO:tfkz:01:0750:pa:sew:तृ॑क्षँ॑","tfRu!:adane:tfR:08:0006:u:sew:तृ॑णुँ॒॑","u!tfdi!r:hiMsAnAdarayoH:tfd:07:0009:u:sew:उँ॑तृ॑दिँ॒॑र्","tfpa!:tfptO:tfp:10:0355:pa:sew:तृ॑पँ॑","tfpa!:sandIpane ityeke:tfp:05:0028:u:sew:तृ॑पँ॑","tfpa!:tfptO sandIpana ityeke:tfp:04:0092:u:sew:तृ॑पँ॑","tfpa!:prIRana ityeke:tfp:10:0351:pa:sew:तृ॑पँ॑","tfpa!:prIRane:tfp:06:0028:pa:aniw:तृ॒पँ॑","tfPa!:tfptO ityeke:tfP:06:0030:pa:sew:तृ॑फँ॑","tfmpa!:tfptO:tfmp:06:0029:pa:sew:तृ॑म्पँ॑","tfmPa!:tfptO ityeke:tfmP:06:0031:pa:sew:तृ॑म्फँ॑","Yitfza!:pipAsAyAm:tfz:04:0141:pa:sew:ञितृ॑षँ॑","tfhU!:hiMsArTaH:tfh:06:0075:pa:sew:तृ॑हूँ॑","tfha!:hiMsAyAm:tfh:07:0018:pa:sew:तृ॑हँ॑","tF:plavanataraRayoH:tF:01:1124:pa:sew:तॄ॑","teja!:pAlane:tej:01:0263:pa:sew:ते॑जँ॑","tepf!:kzaraRArTaH tepf! kampane ca:tep:01:0421:A:sew:ते॑पृँ॒","tevf!:devane:tev:01:0572:A:sew:ते॑वृँ॒","tyaja!:hAnO:tyaj:01:1141:pa:aniw:त्य॒जँ॑","trasi!:BAzArTaH:traMs:10:0292:u:sew:त्र॑सिँ॑","trakza!:gatO:trakz:01:0748:pa:sew:त्र॑क्षँ॑","traKa!:gatyarTaH ityapi kecit:traK:01:0172:pa:sew:त्र॑खँ॑","traki!:gatyarTaH:traNk:01:0102:A:sew:त्र॑किँ॒","tragi!:gatyarTaH:traNg:01:0160:pa:sew:त्र॑गिँ॑","tradi!:cezwAyAm:trand:01:0072:pa:sew:त्र॑दिँ॑","trapU!z:lajjAyAm mit iti BojaH 0934:trap:01:0434:A:sew:त्र॑पूँ॒ष्","trasI!:udvege:tras:10:0269:pa:sew:त्र॑सीँ॑","trasa!:DAraRe grahaRa ityeke vAraRa ityanye DAraRagrahaRavAraRezu:tras:04:0011:u:sew:त्र॑सँ॑","triKi!:gatyarTaH ityapi kecit:triNK:01:0173:pa:sew:त्रि॑खिँ॑","truwa!:Cedane:truw:06:0102:A:sew:त्रु॑टँ॒","truwa!:Cedane:truw:10:0221:pa:sew:त्रु॑टँ॑","trupa!:hiMsArTaH:trup:01:0472:pa:sew:त्रु॑पँ॑","truPa!:hiMsArTaH:truP:01:0476:pa:sew:त्रु॑फँ॑","trumpa!:hiMsArTaH:trump:01:0473:pa:sew:त्रु॑म्पँ॑","trumPa!:hiMsArTAH:trumP:01:0477:pa:sew:त्रु॑म्फँ॑","trEN:pAlane:trE:01:1120:A:aniw:त्रै॒ङ्","trOkf!:gatyarTaH:trOk:01:0104:A:sew:त्रौ॑कृँ॒","tvakzU!:tanUkaraRe:tvakz:01:0744:pa:sew:त्व॑क्षूँ॑","tvagi!:gatyarTaH tvagi! kampane ca:tvaNg:01:0159:pa:sew:त्व॑गिँ॑","tvaca!:saMvaraRe:tvac:06:0021:pa:sew:त्व॑चँ॑","tvaYcu!:gatyarTaH:tvaYc:01:0219:pa:sew:त्व॑ञ्चुँ॑","YitvarA!:samBrame:tvar:01:0884:A:sew:ञित्व॑राँ॒","tviza!:dIptO:tviz:01:1156:u:aniw:त्वि॒षँ॒॑","tsara!:CadmagatO:tsar:01:0635:pa:sew:त्स॑रँ॑","Taki!:gatyarTaH ityapi kecit:TaNk:01:0167:pa:sew:थ॑किँ॑","Tuqa!:saMvaraRe:Tuq:06:0117:pa:sew:थु॑डँ॑","TurvI:hiMsArTaH:Turv:01:0652:pa:sew:थु॑र्वी॑","daSi!:BAzArTaH:daMS:10:0295:u:sew:द॑शिँ॑","daSi!:daMSane darSanadaMSanayoH:daMS:10:0193:A:sew:द॑शिँ॒","daMSa!:daSane:daMS:01:1144:pa:aniw:दं॒शँ॑","dasi!:BAzArTaH ca:daMs:10:0317:u:sew:द॑सिँ॑","dasi!:darSanadaMSanayoH:daMs:10:0194:A:sew:द॑सिँ॒","dakza!:gatihiMsanayoH gatiSAsanayoH vfdDO SIGrArTe ca:dakz:01:0874:A:sew:द॑क्षँ॒","dakza!:vfdDO SIGrArTe ca:dakz:01:0692:A:sew:द॑क्षँ॒","daGa!:GAtane pAlane ca:daG:05:0030:pa:sew:द॑घँ॑","daGi!:pAlane:daNG:01:0181:pa:sew:द॑घिँ॑","daRqa!:daRqanipAte:daRq:10:0472:u:sew:द॑ण्डँ॑","dada!:dAne:dad:01:0017:A:sew:द॑दँ॒","daDa!:DAraRe:daD:01:0008:A:sew:द॑धँ॒","damu!:upaSame:dam:04:0100:pa:sew:द॑मुँ॑","damBu!:damBane damBe:damB:05:0026:pa:sew:द॑म्भुँ॑","daya!:dAnagatirakzaRahiMsAdAnezu:day:01:0553:A:sew:द॑यँ॒","daridrA:durgatO:daridrA:02:0068:pa:sew:द॑रि॑द्रा॑","dala!:vidAraRe mit iti BojaH 1929:dal:10:0281:u:sew:द॑लँ॑","dala!:viSaraRe mit iti BojaH 1929:dal:01:0629:pa:sew:द॑लँ॑","dASa!:hiMsAyAm:daS:05:0036:pa:sew:दा॑शँ॑","dasa!:darSanadaMSanayoH ityapyeke:das:04:0110:A:sew:द॑सँ॒","dasu!:ca upakzaye:das:10:0195:pa:sew:द॑सुँ॑","daha!:BasmIkaraRe:dah:01:1146:pa:aniw:द॒हँ॑","qudAY:dAne:dA:03:0010:u:aniw:डुदा॒ञ्","dAR:dAne:dA:01:1079:pa:aniw:दा॒ण्","dAp:lavane:dA:02:0054:pa:aniw:दा॒प्","dAna!:KaRqane avaKaRqane:dAn:01:1149:u:sew:दा॑नँ॒॑","dASf!:dAne:dAS:01:1025:u:sew:दा॑शृँ॒॑","dAsf!:dAne:dAs:01:1041:u:sew:दा॑सृँ॒॑","divi!:prIRanArTaH:dinv:01:0676:pa:sew:दि॑विँ॑","divu!:krIqAvijigIzAvyavahAradyutistutimodamadasvapnakAntigatizu:div:10:0249:pa:sew:दि॑वुँ॑","divu!:parikUjane:div:04:0001:A:sew:दि॑वुँ॒","divu!:mardane:div:10:0230:u:sew:दि॑वुँ॑","diSa!:atisarjane:diS:06:0003:u:aniw:दि॒शँ॒॑","diha!:upacaye:dih:02:0005:u:aniw:दि॒हँ॒॑","dIN:kzaye:dI:04:0029:A:sew:दी॑ङ्","dIkza!:mORqyejyopanayananiyamavratAdeSezu:dIkz:01:0693:A:sew:दी॑क्षँ॒","dIDIN:dIptidevanayoH:dIDI:02:0071:A:sew:दी॑धी॑ङ्","dIpI!:dIptO:dIp:04:0045:A:sew:दी॑पीँ॒","du:gatO:du:10:1094:pa:aniw:दु॒","wudu:upatApe:du:01:0476:pa:aniw:टु॑दु॒","duHKa!:tatkriyAyAm:duHK:05:0011:u:sew:दुः॑खँ॑","durvI!:hiMsArTaH:durv:01:0653:pa:sew:दु॑र्वीँ॑","dula!:utkzepe:dul:10:0089:u:sew:दु॑लँ॑","duza!:vEkftye:duz:04:0082:pa:aniw:दु॒षँ॑","duhi!r:ardane:duh:01:0839:pa:sew:दु॑हिँ॑र्","duha!:prapUraRe:duh:02:0004:u:aniw:दु॒हँ॒॑","dUN:paritApe:dU:04:0028:A:sew:दू॑ङ्","dfN:Adare:df:01:0835:A:aniw:दृ॒ङ्","dfhi!:vfdDO:dfMh:06:0147:pa:sew:दृ॑हिँ॑","dfpa!:utkleSe:dfp:10:0356:pa:sew:दृ॑पँ॑","dfpa!:sandIpane ityeke:dfp:04:0093:u:sew:दृ॑पँ॑","dfpa!:harzamohanayoH:dfp:06:0036:pa:aniw:दृ॒पँ॑","dfPa!:utkleSe ityeke:dfP:06:0038:pa:sew:दृ॑फँ॑","dfBI!:granTe:dfB:10:0357:pa:sew:दृ॑भीँ॑","dfBI!:Baye granTe:dfB:06:0048:u:sew:दृ॑भीँ॑","dfBa!:sandarBe:dfB:10:0358:u:sew:दृ॑भँ॑","dfmpa!:utkleSe:dfmp:06:0037:pa:sew:दृ॑म्पँ॑","dfmPa!:utkleSe ityeke:dfmP:06:0039:pa:sew:दृ॑म्फँ॑","dfha!:vfdDO:dfh:01:0834:pa:sew:दृ॑हँ॑","dF:Baye:dF:01:0920:pa:sew:दॄ॑","dF:vidAraRe:dF:09:0026:pa:sew:दॄ॑","dF:hiMsAyAm:dF:05:0037:pa:sew:दॄ॑","deN:rakzaRe:de:01:1117:A:aniw:दे॒ङ्","devf!:devane:dev:01:0573:A:sew:दे॑वृँ॒","dEp:SoDane:dE:01:1073:pa:aniw:दै॒प्","dfSi!r:prekzaRe:dES:01:1143:pa:aniw:दृ॒शिँ॑र्","do:avaKaRqane:do:04:0043:pa:aniw:दो॒","dyu:aBigamane:dyu:02:0035:pa:aniw:द्यु॒","dyuta!:dIptO:dyut:01:0842:A:sew:द्यु॑तँ॒","dyE:nyakkaraRe:dyE:01:1053:pa:aniw:द्यै॒","drama!:gatO:dram:01:0537:pa:sew:द्र॑मँ॑","drA:kutsAyAM gatO:drA:02:0049:pa:aniw:द्रा॒","drAKf!:SozaRAlamarTyoH:drAK:01:0132:pa:sew:द्रा॑खृँ॑","drAGf!:sAmarTye drAGf! AyAme ca:drAG:01:0120:A:sew:द्रा॑घृँ॒","drAkzi!:kANkzAyAm GoravAsite ca:drANkz:01:0763:pa:sew:द्रा॑क्षिँ॑","drAqf!:viSareRe:drAq:01:0322:A:sew:द्रा॑डृँ॒","drAhf!:nidrAkzaye nikzepa ityeke:drAh:01:0733:A:sew:द्रा॑हृँ॒","dru:gatO:dru:01:1095:pa:aniw:द्रु॒","druRa!:hiMsAgatikOwilyezu:druR:06:0063:pa:sew:द्रु॑णँ॑","druha!:jiGAMsAyAm:druh:04:0094:pa:aniw:द्रु॒हँ॑","drUY:hiMsAyAm:drU:09:0013:u:sew:द्रू॑ञ्","drekf!:SabdotsAhayoH:drek:01:0083:A:sew:द्रे॑कृँ॒","drE:svapne:drE:01:1054:pa:aniw:द्रै॒","dviza!:aprItO:dviz:02:0003:u:aniw:द्वि॒षँ॒॑","dvf:saMvaraRe varaRe:dvf:01:1083:pa:aniw:द्वृ॒","Dakka!:nASane:Dakk:10:0083:u:sew:ध॑क्कँ॑","DaRa!:SabdArTaH ityapi kecit:DaR:01:0522:pa:sew:ध॑णँ॑","Dana!:DAnye:Dan:03:0024:pa:sew:ध॑नँ॑","Davi!:gatyarTAH:Danv:01:0681:pa:sew:ध॑विँ॑","quDAY:DAraRapozaRayoH dAna ityapyeke:DA:03:0011:u:aniw:डुधा॒ञ्","DAvu!:gatiSudDyoH:DAv:01:0685:u:sew:धा॑वुँ॒॑","Di:DAraRe:Di:06:0142:pa:aniw:धि॒","Dikza!:sandIpanakleSanajIvanezu:Dikz:01:0687:A:sew:धि॑क्षँ॒","Divi!:prIRanArTaH:Dinv:01:0677:pa:sew:धि॑विँ॑","Diza!:Sabde:Diz:03:0023:pa:sew:धि॑षँ॑","DIN:ADAre:DI:04:0031:A:aniw:धी॒ङ्","DU:viDUnane:Du:06:0133:pa:sew:धू॑","DuY:kampane:Du:05:0009:u:aniw:धु॒ञ्","Dukza!:sandIpanakleSanajIvanezu:Dukz:01:0686:A:sew:धु॑क्षँ॒","DUpa!:Dupa!' BAzArTaH:Dup:10:0303:u:sew:धू॑पँ॑","DurvI!:hiMsArTAH:Durv:01:0654:pa:sew:धु॑र्वीँ॑","DU:viDUnane:DU:09:0020:pa:sew:धू॑","DUY:kampane ityeke:DU:06:0133:u:aniw:धू॑ञ्","DUY:kampane:DU:05:0010:u:sew:धू॑ञ्","DUY:kampane:DU:10:0372:u:sew:धू॑ञ्","DUpa!:BAzArTaH:DUp:10:0303:u:sew:धू॑पँ॑","DUpa!:santApe:DUp:01:0462:pa:sew:धू॑पँ॑","DUrI:hiMsAgatyoH:DUr:04:0048:A:sew:धू॑री॒","DUSa!:kAntikaraRe ityapare:DUS:10:0141:u:sew:धू॑शँ॑","DUza!:kAntikaraRe ityeke:DUz:10:0140:u:sew:धू॑षँ॑","DUsa!:kAntikaraRe:DUs:10:0139:u:sew:धू॑सँ॑","DfN:avaDvaMsane:Df:01:1047:A:aniw:धृ॒ङ्","DfN:avasTAne:Df:06:0148:A:aniw:धृ॒ङ्","DfY:DAraRe:Df:01:1115:u:aniw:धृ॒ञ्","Dfja!:gatO:Dfj:01:0249:pa:sew:धृ॑जँ॑","Dfji!:gatO:DfYj:01:0250:pa:sew:धृ॑जिँ॑","Dfza!:prasahane:Dfz:05:0025:u:sew:धृ॑षँ॑","YiDfzA!:prAgalBye:Dfz:10:0388:pa:sew:ञिधृ॑षाँ॑","DF:vayohAnO ityanye:DF:09:0029:pa:sew:धॄ॑","Dew:pAne:De:01:1050:pa:aniw:धे॒ट्","Depf!:ca gatO:Dep:01:0433:A:sew:धे॑पृँ॒","Dorf!:gaticAturye:Dor:01:0634:pa:sew:धो॑रृँ॑","DmA:SabdAgnisaMyogayoH:DmA:01:1076:pa:aniw:ध्मा॒","DmAkzi!:kANkzAyAm GoravAsite ca ityeke:DmANkz:01:0766:pa:sew:ध्मा॑क्षिँ॑","DyE:cintAyAm:DyE:01:1056:pa:aniw:ध्यै॒","Draja!:gatO:Draj:01:0245:pa:sew:ध्र॑जँ॑","Draji!:gatO:DraYj:01:0246:pa:sew:ध्र॑जिँ॑","DraRa!:Sabde:DraR:01:0529:pa:sew:ध्र॑णँ॑","u!Drasa!:uGrasa! uYCe:Dras:09:0060:u:sew:उँ॑ध्र॑सँ॑","u!Drasa!:uYCe:Dras:10:0270:pa:sew:उँ॑ध्र॒सँ॑","DrAKf!:SozaRAlamarTyoH:DrAK:01:0133:pa:sew:ध्रा॑खृँ॑","DrAkzi!:kANkzAyAm GoravAsite ca:DrANkz:01:0764:pa:sew:ध्रा॑क्षिँ॑","DrAqf!:viSareRe:DrAq:01:0323:A:sew:ध्रा॑डृँ॒","Drija!:gatO ca:Drij:01:0253:pa:sew:ध्रि॑जँ॑","Dru:gatisTEryayoH Druva ityeke:Dru:06:0135:pa:aniw:ध्रु॒","Dru:sTErye:Dru:01:1093:pa:aniw:ध्रु॒","Drekf!:SabdotsAhayoH:Drek:01:0084:A:sew:ध्रे॑कृँ॒","DrE:tfptO:DrE:01:1055:pa:aniw:ध्रै॒","DvaMsu!:avasraMsane DvaMsu! gatO ca:DvaMs:01:0858:A:sew:ध्वं॑सुँ॒","Dvaja!:gatO:Dvaj:01:0251:pa:sew:ध्व॑जँ॑","Dvaji!:gatO:DvaYj:01:0252:pa:sew:ध्व॑जिँ॑","DvaRa!:SabdArTAH:DvaR:01:0521:pa:sew:ध्व॑णँ॑","Dvana!:Sabde:Dvan:10:0431:u:sew:ध्व॑नँ॑","Dvana!:Sabde Sabde mit 1928, 1933:Dvan:01:0933:pa:sew:ध्व॑नँ॑","Dvana!:Sabde Sabde mit 1928, 1933:Dvan:01:0962:pa:sew:ध्व॑नँ॑","DvAkzi!:DmAkzi! kANkzAyAm GoravAsite ca:DvANkz:01:0765:pa:sew:ध्वा॑क्षिँ॑","Dvf:hUrCane:Dvf:01:1089:pa:aniw:ध्वृ॒","nakka!:nASane:nakk:10:0082:u:sew:न॑क्कँ॑","Rakza!:gatO:nakz:01:0752:pa:sew:ण॑क्षँ॑","RaKa!:gatyarTaH:naK:01:0142:pa:sew:ण॑खँ॑","RaKi!:gatyarTaH:naNK:01:0143:pa:sew:ण॑खिँ॑","Rawa!:nftO:naw:01:0347:pa:sew:ण॑टँ॑","nawa!:BAzArTaH ca:naw:10:0322:u:sew:न॑टँ॑","nawa!:avasyandane:naw:10:0018:u:sew:न॑टँ॑","Rawa!:nfttO natAvityeke gatAvityanye:naw:01:0890:pa:sew:ण॑टँ॑","Raqa!:BAzArTaH:naq:10:0309:u:sew:ण॑डँ॑","Rada!:avyakte Sabde:nad:01:0056:pa:sew:ण॑दँ॑","wunadi!:samfdDO:nand:01:0070:pa:sew:टुन॑दिँ॑","RaBa!:hiMsAyAm:naB:09:0056:pa:sew:ण॑भँ॑","RaBa!:hiMsAyAm:naB:04:0155:pa:sew:ण॑भँ॑","RaBa!:hiMsAyAm aBAve'pi:naB:01:0855:A:sew:ण॑भँ॒","Rama!:prahvatve Sabde ca mit anupasargAdvA 1944:nam:01:1136:pa:aniw:ण॒मँ॑","Raya!:gatO Raya! rakzaRe ca:nay:01:0552:A:sew:ण॑यँ॒","narda!:Sabde:nard:01:0058:pa:sew:न॑र्दँ॑","nala!:BAzArTaH ca:nal:10:0333:u:sew:न॑लँ॑","Rala!:ganDe banDana ityeke:nal:01:0972:pa:sew:ण॑लँ॑","RaSa!:adarSane:naS:04:0091:pa:aniw:ण॒शँ॑","Rasa!:kOwilye:nas:01:0714:A:sew:ण॑सँ॒","Raha!:banDane:nah:04:0062:u:aniw:ण॒हँ॒॑","nATf!:yAcYopatApESvaryASIzzu:nAT:01:0007:A:sew:ना॑थृँ॒","nADf!:yAcYopatApESvaryASIzzu:nAD:01:0006:A:sew:ना॑धृँ॒","RAsf!:Sabde:nAs:01:0712:A:sew:णा॑सृँ॒","Risi!:cumbane:niMs:02:0017:A:sew:णि॑सिँ॒","Rikza!:cumbane:nikz:01:0747:pa:sew:णि॑क्षँ॑","Riji!r:SOcapozaRayoH:nij:03:0012:u:aniw:णि॒जिँ॒॑र्","Riji!:SudDO:niYj:02:0018:A:sew:णि॑जिँ॒","Ridf!:kutsAsannikarzayoH:nid:01:1012:u:sew:णि॑दृँ॒॑","Ridi!:kutsAyAm:nind:01:0069:pa:sew:णि॑दिँ॑","Rivi!:secane secane cetyeke:ninv:01:0673:pa:sew:णि॑विँ॑","Rila!:gahane:nil:06:0087:pa:sew:णि॑लँ॑","nivAsa!:AcCAdane:nivAs:10:0427:u:sew:नि॑वा॑सँ॑","RiSa!:samADO:niS:01:0823:pa:sew:णि॑शँ॑","Rizu!:secane:niz:01:0796:pa:sew:णि॑षुँ॑","nizka!:parimARe:nizk:10:0209:A:sew:नि॑ष्कँ॒","RIY:prApaRe:nI:01:1049:u:aniw:णी॒ञ्","RIla!:varRe:nIl:01:0600:pa:sew:णी॑लँ॑","RIva!:sTOlye:nIv:01:0647:pa:sew:णी॑वँ॑","RU:stutO:nu:06:0132:pa:sew:णू॑","Ru:stutO:nu:02:0030:pa:sew:णु॑","Ruda!:preraRe:nud:06:0002:pa:aniw:णु॒दँ॑","Ruda!:preraRe:nud:06:0162:u:aniw:णु॒दँ॒॑","RU:stutO:nU:06:0132:pa:sew:णू॑","nftI!:gAtravikzepe:nft:04:0010:pa:sew:नृ॑तीँ॑","nF:naye:nF:09:0030:pa:sew:नॄ॑","nF:naye:nF:01:0921:pa:sew:नॄ॑","Redf!:kutsAsannikarzayoH:ned:01:1013:u:sew:णे॑दृँ॒॑","Rezf!:gatO:nez:01:0704:A:sew:णे॑षृँ॒","pasi!:nASane ityeke:paMS:10:0108:u:sew:प॑सिँ॑","pasi!:nASane:paMs:10:0107:u:sew:प॑सिँ॑","pakza!:parigraha ityeke:pakz:01:0757:pa:sew:प॑क्षँ॑","pakza!:parigrahe:pakz:10:0024:u:sew:प॑क्षँ॑","qupaca!z:pAke:pac:01:1151:u:aniw:डुप॒चँ॒॑ष्","paci!:vistAravacane:paYc:10:0153:u:sew:प॑चिँ॑","paci!:vyaktIkaraRe:paYc:01:0198:A:sew:प॑चिँ॒","pawa!:granTe:paw:10:0394:u:sew:प॑टँ॑","pawa!:BAzArTaH:paw:10:0282:u:sew:प॑टँ॑","pawa!:gatO:paw:01:0333:pa:sew:प॑टँ॑","paWa!:vyaktAyAM vAci:paW:01:0381:pa:sew:प॑ठँ॑","paRa!:vyavahAre stutO ca:paR:01:0507:A:sew:प॑णँ॒","paqi!:nASane:paRq:10:0106:u:sew:प॑डिँ॑","paqi!:gatO:paRq:01:0315:A:sew:प॑डिँ॒","pata!:devaSabde gatO vA vAdanta ityeke:pat:10:0400:u:sew:प॑तँ॑","patx!:gatO:pat:01:0979:pa:sew:प॑तॢँ॑","paTa!:prakzepe ityeke:paT:10:0029:u:sew:प॑थँ॑","paTe!:gatO:paT:01:0982:pa:sew:प॑थेँ॑","pada:gatO:pad:10:0440:A:sew:प॑दँ॒","pada!:gatO:pad:04:0065:A:aniw:प॒दँ॒","pana!:ca vyavahAre stutO ca:pan:01:0508:A:sew:प॑नँ॒","paTi!:gatO:panT:10:0060:u:sew:प॑थिँ॑","paya!:gatO:pay:01:0548:A:sew:प॑यँ॒","parRa!:haritaBAve:parR:10:0485:u:sew:प॑र्णँ॑","parda!:kutsite Sabde:pard:01:0029:A:sew:प॑र्दँ॒","parpa!:gatO:parp:01:0478:pa:sew:प॑र्पँ॑","parba!:gatO:parb:01:0482:pa:sew:प॑र्बँ॑","parva!:pUraRe:parv:01:0658:pa:sew:प॑र्वँ॑","pala!:rakzaRe ityeke:pal:10:0099:u:sew:प॑लँ॑","pala!:gatO:pal:01:0973:pa:sew:प॑लँ॑","palyUla!:lavanapavanayoH:palyUl:10:0423:u:sew:प॑ल्यू॑लँ॑","pelf!:gatO:pall:01:0621:pa:sew:पे॑लृँ॑","paSa!:banDane:paS:10:0244:u:sew:प॑शँ॑","paza!:anupasargAt gatO:paz:10:0401:u:sew:प॑षँ॑","pA:pAne:pA:01:1074:pa:aniw:पा॒","pA:rakzaRe:pA:02:0051:pa:aniw:पा॒","pAra!:karmasamAptO:pAr:10:0453:u:sew:पा॑रँ॑","pAla!:rakzaRe:pAl:10:0098:u:sew:पा॑लँ॑","pi:gatO:pi:10:0293:pa:aniw:पि॒","pisi!:BAzArTaH:piMs:06:0141:u:sew:पि॑सिँ॑","piCa!:kuwwane:piC:10:0061:u:sew:पि॑छँ॑","pija!:hiMsAbalAdAnaniketanezu:pij:10:0046:u:sew:पि॑जँ॑","piji!:BAzArTaH:piYj:02:0020:u:sew:पि॑जिँ॑","piji!:hiMsAbalAdAnaniketanezu:piYj:10:0287:u:sew:पि॑जिँ॑","piji!:varRe samparcana ityeke uBayannetyanye avayava ityapare avyakte Sabda itItare:piYj:10:0047:A:sew:पि॑जिँ॒","piwa!:SabdasaNGAtayoH:piw:01:0348:pa:sew:पि॑टँ॑","piWa!:hiMsAsaNkleSanayoH:piW:01:0393:pa:sew:पि॑ठँ॑","piWi!:saNGAte ityeke:piRW:10:0186:u:sew:पि॑ठिँ॑","piqi!:saNGAte:piRq:10:0185:u:sew:पि॑डिँ॑","piqi!:saNGAte:piRq:01:0307:A:sew:पि॑डिँ॒","pivi!:secane secane cetyeke:pinv:01:0671:pa:sew:पि॑विँ॑","piSa!:nASane:piS:06:0173:u:sew:पि॑शँ॑","piSa!:avayave ayaM dIpanAyAmapi:piS:10:0105:pa:sew:पि॑शँ॑","pizx!:saYcUrRane:piz:07:0015:pa:aniw:पि॒षॢँ॑","pisf!:gatO:pis:01:0816:pa:sew:पि॑सृँ॑","pisa!:gatO:pis:10:0050:u:sew:पि॑सँ॑","pIN:pAne:pI:04:0036:A:aniw:पी॒ङ्","pIqa!:avagAhane:pIq:10:0017:u:sew:पी॑डँ॑","pIla!:pratizwamBe:pIl:01:0599:pa:sew:पी॑लँ॑","pIva!:sTOlye:pIv:01:0644:pa:sew:पी॑वँ॑","puMsa!:aBivarDaRe:puMs:10:0134:u:sew:पुं॑सँ॑","puwa!:saMsarge:puw:10:0455:u:sew:पु॑टँ॑","puwa!:BAzArTaH:puw:06:0094:u:sew:पु॑टँ॑","puwa!:mardane pramardane ityeke:puw:01:0367:pa:sew:पु॑टँ॑","puwa!:saMSlezaRe:puw:10:0283:pa:sew:पु॑टँ॑","puwwa!:alpIBAve:puww:10:0035:u:sew:पु॑ट्टँ॑","puqa!:puwa! mardane pramardane:puq:01:0365:pa:sew:पु॑डँ॑","puqa!:utsarge:puq:06:0114:pa:sew:पु॑डँ॑","puRa!:saNGAte ityanye:puR:06:0059:u:sew:पु॑णँ॑","puRa!:karmaRi SuBe:puR:10:0133:pa:sew:पु॑णँ॑","puwi!:BAzArTaH ca:puRw:10:0323:u:sew:पु॑टिँ॑","puqi!:KaRqane cetyeke:puRq:01:0370:pa:sew:पु॑डिँ॑","puTa!:BAzArTaH:puT:04:0013:u:sew:पु॑थँ॑","puTa!:hiMsAyAm:puT:10:0306:pa:sew:पु॑थँ॑","puTi!:hiMsAsaNkleSanayoH:punT:01:0046:pa:sew:पु॑थिँ॑","pura!:agragamane:pur:06:0072:pa:sew:पु॑रँ॑","purva!:pUraRe:purv:01:0657:pa:sew:पु॑र्वँ॑","pula!:mahattve:pul:10:0090:u:sew:पु॑लँ॑","pula!:mahattve:pul:01:0975:pa:sew:पु॑लँ॑","puza!:viBAge ca iti kecit:puz:04:0121:pa:sew:पु॑षँ॑","puza!:DAraRe:puz:04:0079:u:sew:पु॑षँ॑","puza!:puzwO:puz:09:0065:pa:aniw:पु॒षँ॑","puza!:puzwO:puz:10:0280:pa:sew:पु॑षँ॑","puza!:puzwO:puz:01:0797:pa:sew:पु॑षँ॑","puzpa!:vikasane:puzp:04:0016:pa:sew:पु॑ष्पँ॑","pusta!:AdarAnAdarayoH:pust:10:0079:u:sew:पु॑स्तँ॑","pUY:pavane:pU:09:0014:u:sew:पू॑ञ्","pUN:pavane:pU:01:1121:A:sew:पू॑ङ्","pUja!:pUjAyAm:pUj:10:0144:u:sew:पू॑जँ॑","pUyI!:viSaraRe durganDe ca:pUy:01:0557:A:sew:पू॑यीँ॒","pUrI!:ApyAyane:pUr:04:0046:u:sew:पू॑रीँ॑","pUrI!:ApyAyane:pUr:10:0334:A:sew:पू॑रीँ॒","pUrRa!:saNGAte ityeke:pUrR:10:0132:u:sew:पू॑र्णँ॑","purva!:pUraRe:pUrv:01:0657:pa:sew:पु॑र्वँ॑","pUrva!:niketane ityanye:pUrv:10:0181:u:sew:पू॑र्वँ॑","pUla!:saNGAte:pUl:10:0131:u:sew:पू॑लँ॑","pUla!:saNGAte:pUl:01:0606:pa:sew:पू॑लँ॑","pUza!:vfdDO:pUz:01:0769:pa:sew:पू॑षँ॑","pf:pAlanapUraRayoH ityeke:pf:03:0005:pa:sew:पृ॒","pf:prItO:pf:05:0013:pa:aniw:पृ॒","pfN:vyAyAme:pf:06:0138:A:aniw:पृ॒ङ्","pfca!:saMyamane:pfc:02:0024:u:sew:पृ॑चँ॑","pfcI!:samparke:pfc:10:0339:pa:sew:पृ॑चीँ॑","pfcI!:samparcane samparke:pfc:07:0025:A:sew:पृ॑चीँ॒","pfji!:varRe samparcana ityeke uBayannetyanye avayava ityapare avyakte Sabda itItare ityeke:pfYj:02:0021:A:sew:पृ॑जिँ॒","pfqa!:suKane ca:pfq:06:0054:pa:sew:पृ॑डँ॑","pfRa!:prIRane:pfR:06:0055:pa:sew:पृ॑णँ॑","pfTa!:prakzepe:pfT:10:0028:u:sew:पृ॑थँ॑","pfzu!:secane hiMsAsaNkleSanayoSca:pfz:01:0802:pa:sew:पृ॑षुँ॑","pF:pAlanapUraRayoH:pF:03:0004:u:sew:पॄ॑","pF:pAlanapUraRayoH:pF:09:0022:pa:sew:पॄ॑","pF:pUraRe:pF:03:0004:pa:sew:पॄ॒","pelf!:gatO:pel:01:0621:pa:sew:पे॑लृँ॑","pevf!:sevane:pev:01:0577:A:sew:पे॑वृँ॒","pezf!:prayatne:pez:01:0700:A:sew:पे॑षृँ॒","pesf!:gatO:pes:01:0817:pa:sew:पे॑सृँ॑","pE:SozaRe:pE:01:1069:pa:aniw:पै॒","pERf!:gatipreraRaSlezaRezu:pER:01:0527:pa:sew:पै॑णृँ॑","o!pyAyI!:vfdDO:pyAy:01:0561:A:sew:ओँ॑प्या॑यीँ॒","pyuza!:viBAge iti kecit:pyuz:04:0119:pa:sew:प्यु॑षँ॑","pyusa!:viBAge iti kecit:pyus:04:0120:pa:sew:प्यु॑सँ॑","pyEN:vfdDO:pyE:01:1119:A:aniw:प्यै॒ङ्","praCa!:jYIpsAyAm:praC:06:0149:pa:aniw:प्र॒छँ॑","praTa!:praKyAne:praT:10:0027:u:sew:प्र॑थँ॑","praTa!:praKyAne:praT:01:0869:A:sew:प्र॑थँ॒","prasa!:vistAre:pras:01:0870:A:sew:प्र॑सँ॒","prA:pUraRe:prA:02:0056:pa:aniw:प्रा॒","prIY:tarpane:prI:04:0039:u:sew:प्री॑ञ्","prIY:tarpane kAntO ca:prI:10:0373:u:aniw:प्री॒ञ्","prIN:prItO prIRane:prI:09:0002:A:aniw:प्री॒ङ्","pruN:gatO:pru:01:1111:A:aniw:प्रु॒ङ्","pruzu!:dAhe:pruz:01:0800:pa:sew:प्रु॑षुँ॑","pruza!:snehanasevanapUraRezu:pruz:09:0063:pa:sew:प्रु॑षँ॑","prezf!:gatO:prez:01:0706:A:sew:प्रे॑षृँ॒","prERf!:ityapi gatipreraRaSlezaRezu:prER:01:0528:pa:sew:प्रै॑णृँ॑","proTf!:paryAptO:proT:01:1005:u:sew:प्रो॑थृँ॒॑","plakza!:ca adane:plakz:01:1040:u:sew:प्ल॑क्षँ॒॑","pliha!:gatO:plih:01:0729:A:sew:प्लि॑हँ॒","plI:gatO:plI:09:0039:pa:aniw:प्ली॒","pluN:gatO:plu:01:1112:A:aniw:प्लु॒ङ्","pluza!:ca dAhe:pluz:04:0122:pa:sew:प्लु॑षँ॑","pluza!:dAhe:pluz:04:0009:pa:sew:प्लु॑षँ॑","pluzu!:dAhe:pluz:01:0801:pa:sew:प्लु॑षुँ॑","pluza!:snehanasevanapUraRezu:pluz:09:0064:pa:sew:प्लु॑षँ॑","plevf!:sevane ityapyeke:plev:01:0582:A:sew:प्ले॑वृँ॒","psA:BakzaRe:psA:02:0050:pa:aniw:प्सा॒","Pakka!:nicErgatO:Pakk:01:0123:pa:sew:फ॑क्कँ॑","PaRa!:gatO gatidIptyoH:PaR:01:0955:pa:sew:फ॑णँ॑","Pala!:nizpattO:Pal:01:0608:pa:sew:फ॑लँ॑","YiPalA!:viSaraRe:Pal:01:0594:pa:sew:ञिफ॑लाँ॑","Pulla!:vikasane:Pull:01:0610:pa:sew:फु॑ल्लँ॑","Pelf!:gatO:Pel:01:0622:pa:sew:फे॑लृँ॑","bahi!:vfdDO:baMh:01:0720:A:sew:ब॑हिँ॒","baWa!:sTOlye ityeke:baW:01:0383:pa:sew:ब॑ठँ॑","baRa!:Sabde ityapi kecit:baR:01:0530:pa:sew:ब॑णँ॑","bawi!:viBAjane ityeke:baRw:01:0378:pa:sew:ब॑टिँ॑","bada!:sTErye:bad:01:0053:pa:sew:ब॑दँ॑","baDa!:banDane:baD:01:1128:A:sew:ब॑धँ॒","baDa!:saMyamane:baD:10:0020:u:sew:ब॑धँ॑","banDa!:saMyamane iti cAndrAH:banD:09:0044:u:sew:ब॑न्धँ॑","banDa!:banDane:banD:10:0021:pa:aniw:ब॒न्धँ॑","vaBra!:gatyarTaH:baBr:01:0638:pa:sew:व॑भ्रँ॑","barba!:gatO:barb:01:0484:pa:sew:ब॑र्बँ॑","barha!:BAzArTaH:barh:10:0300:u:sew:ब॑र्हँ॑","barha!:prADAnye:barh:01:0725:A:sew:ब॑र्हँ॒","barha!:hiMsAyAm:barh:10:0173:u:sew:ब॑र्हँ॑","bala!:prARane:bal:10:0123:u:sew:ब॑लँ॑","bala!:prARane DAnyAvaroDe ca DAnyAvaroDane ca:bal:01:0974:pa:sew:ब॑लँ॑","balha!:BAzArTaH:balh:10:0301:u:sew:ब॑ल्हँ॑","balha!:prADAnye:balh:01:0726:A:sew:ब॑ल्हँ॒","bazka!:darSane:bazk:10:0458:u:sew:ब॑ष्कँ॑","basu!:stamBe ityeke:bas:04:0112:pa:sew:ब॑सुँ॑","basta!:ardane:bast:10:0203:A:sew:ब॑स्तँ॒","bAqf:AplAvye:bAq:01:0320:A:sew:बा॑डृ॒","bADf!:loqane viloqane:bAD:01:0005:A:sew:बा॑धृँ॒","bAhf!:prayatne:bAh:01:0732:A:sew:बा॑हृँ॒","biwa!:AkroSe:biw:01:0355:pa:sew:बि॑टँ॑","bidi!:avayave:bind:01:0066:pa:sew:बि॑दिँ॑","bila!:Bedane:bil:06:0086:u:sew:बि॑लँ॑","bila!:Bedane:bil:10:0095:pa:sew:बि॑लँ॑","bisa!:gatO:bis:01:0820:pa:sew:बि॑सँ॑","visa!:preraRe:bis:04:0123:pa:sew:वि॑सँ॑","bIBf!:katTane ca:bIB:01:0445:A:sew:बी॑भृँ॒","bukka!:BazaRe:bukk:01:0126:pa:sew:बु॑क्कँ॑","bukka!:BAzaRe:bukk:10:0238:u:sew:बु॑क्कँ॑","bugi!:varjane:buNg:01:0177:pa:sew:बु॑गिँ॑","buDa!:avagamane:buD:04:0068:A:aniw:बु॒धँ॒","buDa!:avagamane:buD:01:0994:pa:sew:बु॑धँ॑","buDi!r:boDane:buD:01:1016:u:sew:बु॑धिँ॒॑र्","u!bundi!r:niSAmane:bund:01:1017:u:sew:उँ॑बु॑न्दिँ॒॑र्","busa!:viBAge ityapare:bus:04:0117:pa:sew:बु॑सँ॑","busa!:utsarge:bus:04:0129:pa:sew:बु॑सँ॑","busta!:AdarAnAdarayoH:bust:10:0080:u:sew:बु॑स्तँ॑","bfhi!:BAzArTaH:bfMh:10:0299:u:sew:बृ॑हिँ॑","bfhi!:vfdDO bfhi! vfhi! Sabde ca:bfMh:01:0837:pa:sew:बृ॑हिँ॑","bfha!:vfdDO bfhi!r vfhi!r vfdDO Sabde ca ityeke:bfh:01:0836:pa:sew:बृ॑हँ॑","bfhU!:udyamane ityeke:bfh:06:0074:pa:sew:बृ॑हूँ॑","besa!:gatO:bes:01:0821:pa:sew:बे॑सँ॑","vehf!:prayatne:beh:01:0730:A:sew:वे॑हृँ॒","byusa!:viBAge ityanye:byus:04:0116:pa:sew:ब्यु॑सँ॑","vraRa!:SabdArTaH:braR:01:0519:pa:sew:व्र॑णँ॑","brUY:vyaktAyAM vAci:brU:02:0039:u:aniw:ब्रू॑ञ्","brUsa!:hiMsAyAm:brUs:10:0172:u:sew:ब्रू॑सँ॑","blI:varaRe ityeke:blI:09:0038:pa:aniw:ब्ली॒","Bakza!:adane iti mEtreyaH:Bakz:01:1039:u:sew:भ॑क्षँ॒॑","Bakza!:adane:Bakz:10:0033:u:sew:भ॑क्षँ॑","Baja!:viSrARane:Baj:10:0259:u:sew:भ॑जँ॑","Baja!:sevAyAm:Baj:01:1153:u:aniw:भ॒जँ॒॑","Baji!:BAzArTaH:BaYj:07:0016:u:sew:भ॑जिँ॑","BaYjo!:Amardane:BaYj:10:0290:pa:aniw:भ॒ञ्जोँ॑","Bawa!:pariBAzaRe:Baw:01:0889:pa:sew:भ॑टँ॑","Bawa!:BftO:Baw:01:0344:pa:sew:भ॑टँ॑","BaRa!:SabdArTaH:BaR:01:0515:pa:sew:भ॑णँ॑","Baqi!:kalyARe:BaRq:10:0077:u:sew:भ॑डिँ॑","Baqi!:pariBAzaRe:BaRq:01:0306:A:sew:भ॑डिँ॒","Badi!:kalyARe suKe ca:Band:01:0012:A:sew:भ॑दिँ॒","Bartsa!:santarjane tarjane:Barts:10:0202:A:sew:भ॑र्त्सँ॒","Barba!:hiMsAyAm ityeke:Barb:01:0662:pa:sew:भ॑र्बँ॑","BarBa!:hiMsAyAm ityanye:BarB:01:0663:pa:sew:भ॑र्भँ॑","Barva!:hiMsAyAm:Barv:01:0661:pa:sew:भ॑र्वँ॑","Bala!:pariBAzaRahiMsAdAnezu:Bal:01:0568:A:sew:भ॑लँ॒","Bala!:ABaRqane:Bal:10:0224:A:sew:भ॑लँ॒","Balla!:pariBAzaRahiMsAdAnezu:Ball:01:0569:A:sew:भ॑ल्लँ॒","Baza!:Bartsane:Baz:01:0791:pa:sew:भ॑षँ॑","Basu!:stamBe iti kecit:Bas:04:0113:pa:sew:भ॑सुँ॑","Basa!:BartsanadIptyoH:Bas:03:0019:pa:sew:भ॑सँ॑","BA:dIptO:BA:02:0046:pa:aniw:भा॒","BAja!:pfTakkarmaRi:BAj:10:0428:u:sew:भा॑जँ॑","BAma!:kroDe:BAm:10:0411:u:sew:भा॑मँ॑","BAma!:kroDe:BAm:01:0509:A:sew:भा॑मँ॒","BAza!:vyaktAyAM vAci:BAz:01:0696:A:sew:भा॑षँ॒","BAsf!:dIptO:BAs:01:0711:A:sew:भा॑सृँ॒","Bikza!:BikzAyAmalABe lABe ca:Bikz:01:0690:A:sew:भि॑क्षँ॒","Bidi!r:vidAraRe:Bid:07:0002:u:aniw:भि॒दिँ॒॑र्","YimidA!:snehane:Bid:01:0844:A:sew:ञिमि॑दाँ॒","Bidi!:avayave ityeke:Bind:01:0067:pa:sew:भि॑दिँ॑","YiBI:Baye:BI:03:0002:pa:aniw:ञिभी॒","Bujo!:kOwilye:Buj:06:0153:pa:aniw:भु॒जोँ॑","Buja!:pAlanAByavahArayoH:Buj:07:0017:pa:aniw:भु॒जँ॑","BU:avakalkane miSrIkaraRa ityeke cintana ityanye:BU:10:0382:u:sew:भू॑","BU:prAptO:BU:10:0277:u:sew:भू॑","BU:sattAyAm:BU:01:0001:pa:sew:भू॑","BUza!:alaNkAre:BUz:01:0777:pa:sew:भू॑षँ॑","BUza!:alaNkAre:BUz:10:0255:u:sew:भू॑षँ॑","quBfY:DAraRapozaRayoH:Bf:10:0318:u:aniw:डुभृ॒ञ्","BfY:BaraRe:Bf:04:0137:u:aniw:भृ॒ञ्","BfSi!:BAzArTaH ca:BfMS:01:1045:u:sew:भृ॑शिँ॑","BfMSu!:aDaHpatane:BfMS:03:0006:pa:sew:भृं॑शुँ॑","BfjI!:Barjane:Bfj:01:0202:A:sew:भृ॑जीँ॒","Bfqa!:nimajjane ityeke:Bfq:06:0129:pa:sew:भृ॑डँ॑","BfSu!:aDaHpatane:BfS:04:0136:pa:sew:भृ॑शुँ॑","BF:Bartsane Barane'pyeke:BF:09:0024:pa:sew:भॄ॑","Bezf!:Baye gatAvityeke:Bez:01:1026:u:sew:भे॑षृँ॒॑","Byasa!:Baye:Byas:01:0715:A:sew:भ्य॑सँ॒","BraMSu!:avasraMsane ityapi kecit:BraMS:01:0860:A:sew:भ्रं॑शुँ॑","BraMSu!:aDaHpatane:BraMS:04:0138:pa:sew:भ्रं॑शुँ॑","BraMsu!:avasraMsane:BraMs:01:0859:A:sew:भ्रं॑सुँ॒","Brakza!:adane:Brakz:01:1037:u:sew:भ्र॑क्षँ॒॑","Brasja!:pAke:Brajj:06:0004:u:aniw:भ्र॒स्जँ॒॑","BraRa!:SabdArTaH:BraR:01:0520:pa:sew:भ्र॑णँ॑","Bramu!:anavasTAne:Bram:04:0102:pa:sew:भ्र॑मुँ॑","Bramu!:calane:Bram:01:0985:pa:sew:भ्र॑मुँ॑","Brasja!:pAke:Brasj:06:0004:u:aniw:भ्र॒स्जँ॒॑","wuBrAjf!:dIptO:BrAj:01:0205:A:sew:टुभ्रा॑जृँ॒","BrAjf!:dIptO:BrAj:01:0957:A:sew:भ्रा॑जृँ॒","wuBrASf!:dIptO:BrAS:01:0958:A:sew:टुभ्रा॑शृँ॒","BrI:Baye BaraRa ityeke:BrI:09:0041:pa:aniw:भ्री॒","BrURa!:ASAviSaNkayoH ASAyAm:BrUR:10:0213:A:sew:भ्रू॑णँ॒","Brejf!:dIptO:Brej:01:0204:A:sew:भ्रे॑जृँ॒","Brezf!:gatO:Brez:01:1027:u:sew:भ्रे॑षृँ॒॑","Blakza!:adane:Blakz:01:1038:u:sew:भ्ल॑क्षँ॒॑","wuBlASf!:dIptO:BlAS:01:0959:A:sew:टुभ्ला॑शृँ॒","Blezf!:gatO:Blez:01:1028:u:sew:भ्ले॑षृँ॒॑","mahi!:BAzArTaH ca:maMh:10:0330:u:sew:म॑हिँ॑","mahi!:vfdDO:maMh:01:0721:A:sew:म॑हिँ॒","maKa!:gatyarTaH:maK:01:0140:pa:sew:म॑खँ॑","maki!:maRqane:maNk:01:0094:A:sew:म॑किँ॒","maKi!:gatyarTaH:maNK:01:0141:pa:sew:म॑खिँ॑","magi!:gatyarTaH:maNg:01:0157:pa:sew:म॑गिँ॑","maGi!:gatyAkzepe gatO gatyAramBe cetyapare maGi! kEtave ca:maNG:01:0117:A:sew:म॑घिँ॒","maGi!:maRqane:maNG:01:0183:pa:sew:म॑घिँ॑","maca!:kalkane kaTana ityanye:mac:01:0195:A:sew:म॑चँ॒","wumasjo!:SudDO:majj:06:0151:pa:aniw:टुम॒स्जोँ॑","maci!:DAraRocCrAyapUjanezu:maYc:01:0197:A:sew:म॑चिँ॒","maWa!:madanivAsayoH:maW:01:0384:pa:sew:म॑ठँ॑","maRa!:SabdArTaH:maR:01:0516:pa:sew:म॑णँ॑","maWi!:Soke:maRW:01:0296:A:sew:म॑ठिँ॒","maqi!:ca viBAjane:maRq:01:0305:A:sew:म॑डिँ॒","maqi!:BUzAyAM harze ca:maRq:10:0076:u:sew:म॑डिँ॑","maqi!:BUzAyAm:maRq:01:0361:pa:sew:म॑डिँ॑","maTe!:viloqane:maT:01:0983:pa:sew:म॑थेँ॑","mada!:tfptiyoge:mad:04:0105:A:sew:म॑दँ॒","madI!:harze harzaglepanayoH mit 1927:mad:10:0229:pa:sew:म॑दीँ॑","manu!:avaboDane:man:10:0233:A:sew:म॑नुँ॒","mana!:jYAne:man:08:0009:A:aniw:म॒नँ॒","mAna!:stamBe:man:04:0073:A:sew:मा॑नँ॒","matri!:guptapariBAzaRe:mantr:10:0199:A:sew:म॑त्रिँ॒","manTa!:viloqane:manT:09:0047:pa:sew:म॑न्थँ॑","manTa!:viloqane:manT:01:0048:pa:sew:म॑न्थँ॑","maTi!:hiMsAsaNkleSanayoH:manT:01:0044:pa:sew:म॑थिँ॑","madi!:stutimodamadasvapnakAntigatizu:mand:01:0013:A:sew:म॑दिँ॒","maBra!:gatyarTaH:maBr:01:0639:pa:sew:म॑भ्रँ॑","maya!:gatO:may:01:0549:A:sew:म॑यँ॒","marca!:SabdArTaH ca:marc:10:0151:u:sew:म॑र्चँ॑","marba!:gatO:marb:01:0485:pa:sew:म॑र्बँ॑","marva!:pUraRe:marv:01:0659:pa:sew:म॑र्वँ॑","mala!:DAraRe:mal:01:0566:A:sew:म॑लँ॒","malla!:DAraRe:mall:01:0567:A:sew:म॑ल्लँ॒","mava!:banDane:mav:01:0683:pa:sew:म॑वँ॑","mavya!:banDane:mavy:01:0585:pa:sew:म॑व्यँ॑","maSa!:Sabde:maS:01:0825:pa:sew:म॑शँ॑","maza!:hiMsArTaH:maz:01:0788:pa:sew:म॑षँ॑","maska!:gatyarTaH:mazk:01:0107:A:sew:म॑स्कँ॒","masI!:parimAne:mas:04:0131:pa:sew:म॑सीँ॑","maska!:gatyarTaH:mask:01:0107:A:sew:म॑स्कँ॒","wumasjo!:SudDO:masj:06:0151:pa:aniw:टुम॒स्जोँ॑","maha!:pUjAyAm:mah:10:0406:u:sew:म॑हँ॑","maha!:pUjAyAm:mah:01:0831:pa:sew:म॑हँ॑","mAN:mAne:mA:04:0037:A:aniw:मा॒ङ्","mA:mAne:mA:02:0057:pa:aniw:मा॒","mAN:mAne Sabde ca:mA:03:0007:A:aniw:मा॒ङ्","mAkzi!:kANkzAyAm:mANkz:01:0762:pa:sew:मा॑क्षिँ॑","mana!:stamBe ityeke:mAn:10:0234:A:sew:म॑नँ॒","mAna!:pUjAyAm:mAn:10:0381:u:sew:मा॑नँ॑","mAna!:pUjAyAm:mAn:01:1127:A:sew:मा॑नँ॒","mArga!:anvezaRe:mArg:10:0384:u:sew:मा॑र्गँ॑","mArja!:SabdArTO:mArj:10:0150:u:sew:मा॑र्जँ॑","mAhf!:mAne:mAh:01:1042:u:sew:मा॑हृँ॒॑","qumiY:prakzepane:mi:05:0004:u:aniw:डुमि॒ञ्","miCa!:utkleSe:miC:06:0017:pa:sew:मि॑छँ॑","miji!:BAzArTaH:miYj:10:0286:u:sew:मि॑जिँ॑","miTf!:meDAhiMsanayoH ityeke:miT:01:1008:u:sew:मि॑थृँ॒॑","midf!:meDAhiMsanayoH:mid:01:1006:u:sew:मि॑दृँ॒॑","mida!:snehane ityeke:mid:04:0158:u:sew:मि॑दँ॑","YimidA!:snehane:mid:10:0012:pa:sew:ञिमि॑दाँ॑","miDf!:meDAhiMsanayoH ityanye:miD:01:1010:u:sew:मि॑धृँ॒॑","midi!:snehane:mind:10:0011:u:sew:मि॑दिँ॑","mivi!:secane secane cetyeke:minv:01:0672:pa:sew:मि॑विँ॑","mila!:SlezaRe:mil:06:0091:pa:sew:मि॑लँ॑","mila!:saNgame saNgamane:mil:06:0165:u:sew:मि॑लँ॒॑","miSa!:Sabde:miS:01:0824:pa:sew:मि॑शँ॑","miSra!:samparke:miSr:10:0466:u:sew:मि॑श्रँ॑","mizu!:secane:miz:01:0795:pa:sew:मि॑षुँ॑","miza!:sparDAyAm:miz:06:0079:pa:sew:मि॑षँ॑","miha!:secane:mih:01:1147:pa:aniw:मि॒हँ॑","mI:gatO:mI:04:0032:u:sew:मी॑","mIN:hiMsAyAm:mI:09:0004:A:aniw:मी॒ङ्","mIY:hiMsAyAm banDane mAne:mI:10:0361:u:aniw:मी॒ञ्","mImf!:gatO mImf! Sabde ca:mIm:01:0539:pa:sew:मी॑मृँ॑","mIla!:nimezaRe:mIl:01:0595:pa:sew:मी॑लँ॑","mIva!:sTOlye:mIv:01:0645:pa:sew:मी॑वँ॑","muKi!:gatyarTaH ityapi kecit:muNK:01:0166:pa:sew:मु॑खिँ॑","muca!:pramocane modane ca pramocanamodanayoH:muc:06:0166:u:sew:मु॑चँ॑","mucx!:mokzaRe mocane:muc:10:0272:u:aniw:मु॒चॢँ॒॑॑","muja!:SabdArTaH:muj:01:0283:pa:sew:मु॑जँ॑","muci:kalkane kaTana ityanye:muYc:01:0196:A:sew:मु॑चि॒","muji!:SabdArTAH:muYj:01:0284:pa:sew:मु॑जिँ॑","muwa!:mardane pramardane ityeke:muw:01:0366:pa:sew:मु॑टँ॑","muwa!:AkzepapramardanayoH:muw:10:0104:pa:sew:मु॑टँ॑","muwa!:saYcUrRane:muw:06:0101:u:sew:मु॑टँ॑","muqa!:muwa!' mardane pramardane:muq:01:0364:pa:sew:मु॑डँ॑","muRa!:pratijYAne:muR:06:0060:pa:sew:मु॑णँ॑","muWi!:pAlane:muRW:01:0298:A:sew:मु॑ठिँ॒","muqi!:KaRqane:muRq:01:0369:pa:sew:मु॑डिँ॑","muqi!:mArjane:muRq:01:0308:A:sew:मु॑डिँ॒","muda!:saMsarge:mud:10:0268:u:sew:मु॑दँ॑","muda!:harze:mud:01:0016:A:sew:मु॑दँ॒","mura!:saMvezwane saYcezwane:mur:06:0069:pa:sew:मु॑रँ॑","murCA!:mohanasamucCrAyayoH:murC:01:0240:pa:sew:मु॑र्छाँ॑","murvI!:banDane:murv:01:0656:pa:sew:मु॑र्वीँ॑","muza!:steye:muz:09:0066:pa:sew:मु॑षँ॑","musa!:KaRqane:mus:04:0130:pa:sew:मु॑सँ॑","musta!:saNGAte:must:10:0126:u:sew:मु॑स्तँ॑","muha!:vEcittye:muh:04:0095:pa:aniw:मु॒हँ॑","mUY:banDane:mU:09:0015:u:sew:मू॑ञ्","mUN:banDane:mU:01:1122:A:sew:मू॑ङ्","mUtra!:prasravaRe:mUtr:10:0451:u:sew:मू॑त्रँ॑","mUla!:pratizWAyAm:mUl:01:0607:pa:sew:मू॑लँ॑","mUla!:rohane:mUl:10:0092:u:sew:मू॑लँ॑","mUza!:steye:mUz:01:0770:pa:sew:मू॑षँ॑","mfN:prARatyAge:mf:06:0139:A:aniw:मृ॒ङ्","mfkza!:saNGAte:mfkz:01:0754:pa:sew:मृ॑क्षँ॑","mfga:anvezaRe:mfg:10:0442:A:sew:मृ॑गँ॒","mfjU!:mfjU!z SudDO:mfj:10:0386:pa:sew:मृ॑जूँ॑","mfjU!:SOcAlaNkArayoH:mfj:02:0061:u:sew:मृ॑जूँ॑","mfqa!:kzode suKe ca:mfq:09:0052:pa:sew:मृ॑डँ॑","mfqa!:suKane:mfq:06:0053:pa:sew:मृ॑डँ॑","mfRa!:hiMsAyAm:mfR:06:0057:pa:sew:मृ॑णँ॑","mfqi!:preraRe:mfRq:10:0165:u:sew:मृ॑डिँ॑","mfda!:kzode:mfd:09:0051:pa:sew:मृ॑दँ॑","mfDu!:undane:mfD:01:1015:u:sew:मृ॑धुँ॒॑","mfSa!:AmarSaRe:mfS:06:0161:pa:aniw:मृ॒शँ॑","mfza!:titikzAyAm:mfz:04:0060:u:sew:मृ॑षँ॒॑","mfza!:titikzAyAm:mfz:10:0387:u:sew:मृ॑षँ॒॑","mfzu!:secane mfzu! sahane ca:mfz:01:0804:pa:sew:मृ॑षुँ॑","mF:hiMsAyAm:mF:09:0025:pa:sew:मॄ॑","meN:praRidAne:me:01:1116:A:aniw:मे॒ङ्","meTf!:meDAhiMsanayoH ityeke:meT:01:1009:u:sew:मे॑थृँ॒॑","medf!:meDAhiMsanayoH:med:01:1007:u:sew:मे॑दृँ॒॑","meDf!:meDAhiMsanayoH ityanye meDf! saNgame ca:meD:01:1011:u:sew:मे॑धृँ॒॑","mepf!:gatO:mep:01:0429:A:sew:मे॑पृँ॒","mevf!:sevane:mev:01:0578:A:sew:मे॑वृँ॒","mokza!:Asane asane:mokz:10:0256:u:sew:मो॑क्षँ॑","mnA:aByAse:mnA:01:1078:pa:aniw:म्ना॒","mrakza!:saNGAte ityeke:mrakz:01:0755:pa:sew:म्र॑क्षँ॑","mrakza!:Cedane:mrakz:10:0168:u:sew:म्र॑क्षँ॑","mrakza!:mlecCane:mrakz:10:0171:u:sew:म्र॑क्षँ॑","mraCa!:mlecCane ityeke:mraC:10:0169:u:sew:म्र॑छँ॑","mrada!:mardane:mrad:01:0871:A:sew:म्र॑दँ॒","mrucu!:gatyarTaH:mruc:01:0222:pa:sew:म्रु॑चुँ॑","mruYcu!:gatyarTaH:mruYc:01:0220:pa:sew:म्रु॑ञ्चुँ॑","mrewf!:unmAde:mrew:01:0327:pa:sew:म्रे॑टृँ॑","mreqf!:unmAde:mreq:01:0328:pa:sew:म्रे॑डृँ॑","mlucu!:gatyarTAH:mluc:01:0223:pa:sew:म्लु॑चुँ॑","mluYcu!:gatyarTaH:mluYc:01:0221:pa:sew:म्लु॑ञ्चुँ॑","mleCa!:Cedane mleCa! avyaktAyAM vAci:mleC:10:0170:u:sew:म्ले॑छँ॑","mleCa!:avyakte Sabde:mleC:01:0233:pa:sew:म्ले॑छँ॑","mlewf!:unmAde ityeke:mlew:01:0329:pa:sew:म्ले॑टृँ॑","mlevf!:sevane:mlev:01:0579:A:sew:म्ले॑वृँ॒","mlE:harzakzaye:mlE:01:1052:pa:aniw:म्लै॒","yakza!:pUjAyAm:yakz:10:0215:A:sew:य॑क्षँ॒","yaja!:devapUjAsaNgatikaraRadAnezu:yaj:01:1157:u:aniw:य॒जँ॒॑","yata!:nikAropaskArayoH:yat:10:0261:u:sew:य॑तँ॑","yatI!:prayatne:yat:01:0030:A:sew:य॑तीँ॒","yatri!:saNkocane:yantr:10:0003:u:sew:य॑त्रिँ॑","yaBa!:mETune viparItamETune:yaB:01:1135:pa:aniw:य॒भँ॑","yama!:uparame yamo'parivezaRe na mit 1953:yam:01:1139:pa:aniw:य॒मँ॑","yama!:parivezaRe mit 1953:yam:10:0119:u:sew:य॑मँ॑","yasu!:prayatne:yas:04:0107:pa:sew:य॑सुँ॑","yA:prApaRe:yA:02:0044:pa:aniw:या॒","wuyAcf!:yAcYAyAm:yAc:01:1001:u:sew:टुया॑चृँ॒॑","yu:jugupsAyAm:yu:02:0027:A:sew:यु॑","yuY:banDane:yu:10:0235:u:aniw:यु॒ञ्","yu:miSreRe'BiSraRe ca:yu:09:0011:pa:sew:यु॑","yugi!:varjane:yuNg:01:0175:pa:sew:यु॑गिँ॑","yuCa!:pramAde:yuC:01:0242:pa:sew:यु॑छँ॑","yuja!:saMyamane:yuj:04:0074:u:sew:यु॑जँ॑","yuji!r:yoge:yuj:10:0338:u:aniw:यु॒जिँ॒॑र्","yuja!:samADO:yuj:07:0007:A:aniw:यु॒जँ॒","yutf!:BAsaRe:yut:01:0031:A:sew:यु॑तृँ॒","yuDa!:samprahAre:yuD:04:0069:A:aniw:यु॒धँ॒","yupa!:vimohane:yup:04:0148:pa:sew:यु॑पँ॑","yUza!:hiMsAyAm:yUz:01:0775:pa:sew:यू॑षँ॑","yezf!:prayatne ityanye:yez:01:0702:A:sew:ये॑षृँ॒","yOwf!:banDe:yOw:01:0326:pa:sew:यौ॑टृँ॑","rahi!:BAzArTaH ca:raMh:10:0329:u:sew:र॑हिँ॑","rahi!:gatO:raMh:01:0833:pa:sew:र॑हिँ॑","raka!:AsvAdane:rak:10:0262:u:sew:र॑कँ॑","rakza!:pAlane:rakz:01:0746:pa:sew:र॑क्षँ॑","raKa!:gatyarTaH:raK:01:0144:pa:sew:र॑खँ॑","raga!:AsvAdane ityanye:rag:10:0265:u:sew:र॑गँ॑","rage!:SaNkAyAm:rag:01:0894:pa:sew:र॑गेँ॑","raGa!:AsvAdane ityeke:raG:10:0264:u:sew:र॑घँ॑","raKi!:gatyarTaH:raNK:01:0145:pa:sew:र॑खिँ॑","raNga!:gatO:raNg:10:0397:u:sew:र॑ङ्गँ॑","ragi!:gatyarTaH:raNg:01:0153:pa:sew:र॑गिँ॑","raGi!:BAzArTaH ca:raNG:10:0326:u:sew:र॑घिँ॑","raGi!:gatyarTaH:raNG:01:0112:A:sew:र॑घिँ॒","raca!:pratiyatne:rac:10:0403:u:sew:र॑चँ॑","raYja!:rAge mit 1940:raYj:04:0063:u:aniw:र॒ञ्जँ॒॑","raYja!:rAge mit 1940:raYj:01:1154:u:aniw:र॒ञ्जँ॒॑","rawa!:pariBAzaRe:raw:10:0462:u:sew:र॑टँ॑","rawa!:pariBAzaRe ityeke:raw:01:0334:pa:sew:र॑टँ॑","rawa!:pariBAzaRe:raw:01:0387:pa:sew:र॑टँ॑","raWa!:pariBAzaRe:raW:01:0386:pa:sew:र॑ठँ॑","raRa!:SabdArTaH mit iti BojaH 0932:raR:01:0904:pa:sew:र॑णँ॑","raRa!:gatO mit iti BojaH 0932:raR:01:0513:pa:sew:र॑णँ॑","ravi!:gatyarTaH:raRv:01:0680:pa:sew:र॑विँ॑","rada!:vileKane:rad:01:0055:pa:sew:र॑दँ॑","raDa!:hiMsAsaMrAdDyoH:raD:04:0090:pa:aniw:र॒धँ॑","rapa!:vyaktAyAM vAci:rap:01:0467:pa:sew:र॑पँ॑","raPa!:gatO:raP:01:0479:pa:sew:र॑फँ॑","raBa!:rABasye:raB:01:1129:A:aniw:र॒भँ॒","ramu!:krIqAyAm rama! iti mADavaH:ram:01:0989:A:aniw:र॒मुँ॒","raPi!:gatO:ramP:01:0480:pa:sew:र॑फिँ॑","rabi!:Sabde:ramb:01:0436:A:sew:र॑बिँ॒","raBi!:Sabde kvacitpaWyate ityeke:ramB:01:0449:A:sew:र॑भिँ॒","raya!:gatO:ray:01:0554:A:sew:र॑यँ॒","rasa!:AsvAdanasnehanayoH:ras:10:0477:u:sew:र॑सँ॑","rasa!:Sabde:ras:01:0810:pa:sew:र॑सँ॑","raha!:tyAge:rah:10:0396:u:sew:र॑हँ॑","raha!:tyAge:rah:10:0122:u:sew:र॑हँ॑","raha!:tyAge:rah:01:0832:pa:sew:र॑हँ॑","rA:dAne:rA:02:0052:pa:aniw:रा॒","rAKf!:SozaRAlamarTyoH:rAK:01:0130:pa:sew:रा॑खृँ॑","rAGf!:sAmarTye:rAG:01:0118:A:sew:रा॑घृँ॒","rAjf!:dIptO:rAj:01:0956:u:sew:रा॑जृँ॒॑","rADa!:saMsidDO:rAD:05:0018:pa:aniw:रा॒धँ॑","rADaH:akarmakAdvfdDAveva:rAD:04:0077:pa:aniw:रा॒धः","rAsf!:Sabde:rAs:01:0713:A:sew:रा॑सृँ॒","ri:f' hiMsAyAm:ri:05:0032:pa:sew:रि॑","ri:gatO:ri:06:0140:pa:aniw:रि॒","riKa!:gatyarTaH ityapi kecit:riK:01:0168:pa:sew:रि॑खँ॑","riKi!:gatyarTaH ityapi kecit:riNK:01:0169:pa:sew:रि॑खिँ॑","rigi!:gatyarTaH:riNg:01:0164:pa:sew:रि॑गिँ॑","rica!:viyojanasamparcanayoH:ric:07:0004:u:sew:रि॑चँ॑","rici!r:virecane:ric:10:0348:u:aniw:रि॒चिँ॒॑र्","rivi!:gatyarTaH:riRv:01:0679:pa:sew:रि॑विँ॑","riPa!:katTanayudDanindAhiMsAdAnezu:riP:06:0026:pa:sew:रि॑फँ॑","riSa!:hiMsAyAm:riS:06:0156:pa:aniw:रि॒शँ॑","riza!:hiMsAyAm:riz:04:0144:pa:sew:रि॑षँ॑","riza!:hiMsArTAH:riz:01:0790:pa:sew:रि॑षँ॑","riha!:katTanayudDanindAhiMsAdAnezu ityeke:rih:06:0027:pa:sew:रि॑हँ॑","rI:gatirezaRayoH:rI:09:0035:pa:aniw:री॒","rIN:SravaRe:rI:04:0033:A:aniw:री॒ङ्","ruN:gatirozaRayoH:ru:10:0319:A:aniw:रु॒ङ्","ru:Sabde:ru:10:0321:pa:sew:रु॑","ruSi!:BAzArTaH ca:ruMS:01:1114:u:sew:रु॑शिँ॑","rusi!:BAzArTaH ca:ruMs:02:0028:u:sew:रु॑सिँ॑","ruca!:dIptAvaBiprItO ca:ruc:01:0847:A:sew:रु॑चँ॒","rujo!:BaNge:ruj:10:0335:pa:aniw:रु॒जोँ॑","ruja!:hiMsAyAm:ruj:06:0152:u:sew:रु॑जँ॑","ruwa!:BAzArTaH ca:ruw:10:0314:u:sew:रु॑टँ॑","ruwa!:upaGAte pratiGAte:ruw:01:0849:A:sew:रु॑टँ॒","ruwa!:roze ityeke:ruw:10:0188:u:sew:रु॑टँ॑","ruWa!:upaGAte:ruW:01:0389:pa:sew:रु॑ठँ॑","ruwi!:steye:ruRw:01:0371:pa:sew:रु॑टिँ॑","ruWi!:steye ityeke:ruRW:01:0400:pa:sew:रु॑ठिँ॑","ruWi!:gatO:ruRW:01:0373:pa:sew:रु॑ठिँ॑","ruqi!:steye ityapare:ruRq:01:0375:pa:sew:रु॑डिँ॑","rudi!r:aSruvimocane:rud:02:0062:pa:sew:रु॑दिँ॑र्","ruDi!r:AvaraRe:ruD:07:0001:u:aniw:रु॒धिँ॒॑र्","rupa!:vimohane:rup:04:0149:pa:sew:रु॑पँ॑","ruSa!:hiMsAyAm:ruS:06:0155:pa:aniw:रु॒शँ॑","ruza!:hiMsAyAm roze:ruz:10:0187:pa:sew:रु॑षँ॑","ruza!:hiMsArTaH:ruz:01:0789:pa:sew:रु॑षँ॑","ruza!:roze:ruz:04:0143:u:sew:रु॑षँ॑","ruha!:bIjajanmani prAdurBAve ca:ruh:01:0995:pa:aniw:रु॒हँ॑","rUkza!:pAruzye:rUkz:10:0452:u:sew:रू॑क्षँ॑","rUpa!:rUpakriyAyAm:rUp:10:0479:u:sew:रू॑पँ॑","rUza!:BUzAyAm:rUz:01:0772:pa:sew:रू॑षँ॑","rekf!:SaNkAyAm:rek:01:0085:A:sew:रे॑कृँ॒","rejf!:dIptO:rej:01:0206:A:sew:रे॑जृँ॒","rewf!:pariBAzaRe:rew:01:1002:u:sew:रे॑टृँ॒॑","repf!:gatO:rep:01:0430:A:sew:रे॑पृँ॒","reBf!:Sabde:reB:01:0447:A:sew:रे॑भृँ॒","revf!:plavagatO:rev:01:0584:A:sew:रे॑वृँ॒","rezf!:avyakte Sabde:rez:01:0707:A:sew:रे॑षृँ॒","rE:Sabde:rE:01:1057:pa:aniw:रै॒","roqf!:unmAde:roq:01:0412:pa:sew:रो॑डृँ॑","rOqf!:anAdare:rOq:01:0411:pa:sew:रौ॑डृँ॑","lakza!:Alocane:lakz:10:0219:A:sew:ल॑क्षँ॒","lakza!:darSanANkanayoH:lakz:10:0006:u:sew:ल॑क्षँ॑","laKa!:gatyarTaH:laK:01:0146:pa:sew:ल॑खँ॑","laga!:AsvAdane:lag:10:0263:u:sew:ल॑गँ॑","lage!:saNge:lag:01:0895:pa:sew:ल॑गेँ॑","laKi!:gatyarTaH:laNK:01:0147:pa:sew:ल॑खिँ॑","lagi!:gatyarTaH:laNg:01:0154:pa:sew:ल॑गिँ॑","laGi!:BAzArTaH ca:laNG:10:0291:u:sew:ल॑घिँ॑","laGi!:BAzArTaH:laNG:10:0327:u:sew:ल॑घिँ॑","laGi!:gatyarTaH laGi! BojananivfttAvapi:laNG:01:0113:A:sew:ल॑घिँ॒","laGi!:SozaRe BAzAyAM dIptO sImAtikrame ca:laNG:01:0182:pa:sew:ल॑घिँ॑","laCa!:lakzaRe:laC:01:0234:pa:sew:ल॑छँ॑","laja!:prakASane:laj:10:0463:u:sew:ल॑जँ॑","laja!:apavAraRe ityeke:laj:06:0010:u:sew:ल॑जँ॑","laja!:Barjane:laj:01:0271:pa:sew:ल॑जँ॑","o!lajI!:vrIqAyAm vrIqe:laj:10:0016:A:sew:ओँ॑ल॑जीँ॒","o!lasjI!:vrIqAyAm vrIqe:lajj:06:0011:A:sew:ओँ॑ल॑स्जीँ॒","laji!:BAzArTaH ca:laYj:10:0315:u:sew:ल॑जिँ॑","laji!:hiMsAbalAdAnaniketanezu:laYj:10:0048:u:sew:ल॑जिँ॑","laji!:Barjane:laYj:01:0272:pa:sew:ल॑जिँ॑","laji!:prakASane ityeke:laYj:10:0465:u:sew:ल॑जिँ॑","lawa!:bAlye:law:01:0335:pa:sew:ल॑टँ॑","laqa!:upasevAyAm jihvonmaTane laqiH mit 1926:laq:10:0010:u:sew:ल॑डँ॑","laqa!:vilAse:laq:01:0415:pa:sew:ल॑डँ॑","laqi!:BAzArTaH ca:laRq:10:0331:u:sew:ल॑डिँ॑","o!laqi!:olaqi! utkzepane u!laqi! ityanye:laRq:10:0013:u:sew:ओँ॑ल॑डिँ॑","lapa!:vyaktAyAM vAci:lap:01:0468:pa:sew:ल॑पँ॑","qulaBa!z:prAptO:laB:01:1130:A:aniw:डुल॒भँ॒ष्","labi!:Sabde:lamb:01:0439:A:sew:ल॑बिँ॒","labi!:Sabde avasraMsane ca:lamb:01:0437:A:sew:ल॑बिँ॒","laBi!:ca Sabde kvacitpaWyate:lamB:01:0450:A:sew:ल॑भिँ॒","laya!:ca gatO:lay:01:0555:A:sew:ल॑यँ॒","larba!:gatO:larb:01:0483:pa:sew:ल॑र्बँ॑","lala!:vilAse ityeke IpsAyAm:lal:01:0416:pa:sew:ल॑लँ॑","lala!:IpsAyAm:lal:10:0210:A:sew:ल॑लँ॒","laza!:kAntO:laz:01:1033:u:sew:ल॑षँ॒॑","lasa!:Sabde SlezaRakrIqanayoH ca:las:01:0811:pa:sew:ल॑सँ॑","lasa!:Silpayoge:las:10:0253:u:sew:ल॑सँ॑","o!lasjI!:vrIqAyAm vrIqe:lasj:06:0011:A:sew:ओँ॑ल॑स्जीँ॒","lA:AdAne dAne:lA:02:0053:pa:aniw:ला॒","lAKf!:SozaRAlamarTyoH:lAK:01:0131:pa:sew:ला॑खृँ॑","lAGf!:sAmarTye:lAG:01:0119:A:sew:ला॑घृँ॒","lAja!:Barjane Bartsane ca:lAj:01:0273:pa:sew:ला॑जँ॑","lACi!:lakzaRe:lAYC:01:0235:pa:sew:ला॑छिँ॑","lAji!:Barjane Bartsane ca:lAYj:01:0274:pa:sew:ला॑जिँ॑","lABa!:preraRe:lAB:10:0482:u:sew:ला॑भँ॑","liKa!:gatyarTaH ityapi kecit:liK:01:0170:pa:sew:लि॑खँ॑","liKa!:akzaravinyAse:liK:06:0092:pa:sew:लि॑खँ॑","liKi!:gatyarTaH ityapi kecit:liNK:01:0171:pa:sew:लि॑खिँ॑","ligi!:gatyarTAH:liNg:01:0165:pa:sew:लि॑गिँ॑","ligi!:citrIkaraRe:liNg:10:0267:u:sew:लि॑गिँ॑","liji!:BAzArTaH:liYj:10:0288:u:sew:लि॑जिँ॑","lipa!:upadehe:lip:06:0169:u:aniw:लि॒पँ॒॑","liSa!:alpIBAve:liS:04:0076:A:aniw:लि॒शँ॒","liSa!:gatO:liS:06:0157:pa:aniw:लि॒शँ॑","liha!:AsvAdane:lih:02:0006:u:aniw:लि॒हँ॒॑","lI:dravIkaraRe:lI:04:0034:u:sew:ली॑","lIN:SlezaRe:lI:09:0036:A:aniw:ली॒ङ्","lI:SlezaRe:lI:10:0343:pa:aniw:ली॒","luYca!:apanayane:luYc:01:0214:pa:sew:लु॑ञ्चँ॑","luji!:BAzArTaH:luYj:10:0049:u:sew:लु॑जिँ॑","luji!:hiMsAbalAdAnaniketanezu:luYj:10:0289:u:sew:लु॑जिँ॑","luwa!:upaGAte pratiGAte:luw:01:0351:A:sew:लु॑टँ॒","luwa!:BAzArTaH:luw:04:0133:u:sew:लु॑टँ॑","luwa!:viloqane:luw:06:0109:pa:sew:लु॑टँ॑","luwa!:viloqane:luw:01:0850:pa:sew:लु॑टँ॑","luwa!:saMSlezaRe:luw:10:0284:pa:sew:लु॑टँ॑","luWa!:upaGAte pratiGAte:luW:01:0390:A:sew:लु॑ठँ॒","luWa!:upaGAte:luW:01:0851:pa:sew:लु॑ठँ॑","luWa!:viloqane ityeke:luW:04:0134:pa:sew:लु॑ठँ॑","luWa!:saMSlezaRe ityeke:luW:06:0110:pa:sew:लु॑ठँ॑","luqa!:viloqane ityeke:luq:01:0352:pa:sew:लु॑डँ॑","luqa!:saMSlezaRe ityanye:luq:06:0111:pa:sew:लु॑डँ॑","luRwa!:steye:luRw:10:0039:u:sew:लु॑ण्टँ॑","luwi!:steye:luRw:01:0372:pa:sew:लु॑टिँ॑","luRWa!:steye iti kecit:luRW:10:0040:u:sew:लु॑ण्ठँ॑","luWi!:steye ityeke:luRW:01:0374:pa:sew:लु॑ठिँ॑","luWi!:Alasye pratiGAte ca:luRW:01:0398:pa:sew:लु॑ठिँ॑","luWi!:gatO:luRW:01:0401:pa:sew:लु॑ठिँ॑","luqi!:steye ityapare:luRq:01:0376:pa:sew:लु॑डिँ॑","luTi!:hiMsAsaNkleSanayoH:lunT:01:0047:pa:sew:लु॑थिँ॑","lupx!:Cedane:lup:06:0167:u:aniw:लु॒पॢँ॒॑॑","lupa!:vimohane:lup:04:0150:pa:sew:लु॑पँ॑","luBa!:gArdDye gArDnye:luB:04:0153:pa:sew:लु॑भँ॑","luBa!:vimohane:luB:06:0025:pa:sew:लु॑भँ॑","lubi!:adarSane ardana ityeke:lumb:10:0159:u:sew:लु॑बिँ॑","lubi!:ardane:lumb:01:0493:pa:sew:लु॑बिँ॑","lUY:Cedane:lU:09:0016:u:sew:लू॑ञ्","lUza!:BUzAyAm:lUz:01:0771:pa:sew:लू॑षँ॑","lUza!:hiMsAyAm:lUz:10:0100:u:sew:लू॑षँ॑","lepf!:gatO:lep:01:0431:A:sew:ले॑पृँ॒","lokf!:BAzArTaH:lok:10:0307:u:sew:लो॑कृँ॑","lokf!:darSane:lok:01:0080:A:sew:लो॑कृँ॒","locf!:BAzArTaH:loc:10:0308:u:sew:लो॑चृँ॑","locf!:darSane:loc:01:0188:A:sew:लो॑चृँ॒","loqf!:unmAde:loq:01:0413:pa:sew:लो॑डृँ॑","lozwa!:saNGAte:lozw:01:0291:A:sew:लो॑ष्टँ॒","vakza!:roze saNGAta ityeke:vakz:01:0753:pa:sew:व॑क्षँ॑","vaKa!:gatyarTaH:vaK:01:0138:pa:sew:व॑खँ॑","vaki!:gatyarTaH:vaNk:01:0093:A:sew:व॑किँ॒","vaki!:kOwilye:vaNk:01:0100:A:sew:व॑किँ॒","vaKi!:gatyarTaH:vaNK:01:0139:pa:sew:व॑खिँ॑","vagi!:gatyarTaH:vaNg:01:0156:pa:sew:व॑गिँ॑","vaGi!:gatyAkzepe gatO gatyAramBe cetyapare:vaNG:01:0116:A:sew:व॑घिँ॒","vaca!:pariBAzaRe:vac:02:0058:u:sew:व॑चँ॑","vaca!:pariBAzaRe:vac:10:0380:pa:aniw:व॒चँ॑","vaja!:gatO:vaj:01:0285:pa:sew:व॑जँ॑","vaYcu!:gatyarTaH:vaYc:01:0216:pa:sew:व॑ञ्चुँ॑","vaYcu!:pralamBane:vaYc:10:0227:A:sew:व॑ञ्चुँ॒","vawa!:granTe:vaw:10:0395:u:sew:व॑टँ॑","vawa!:viBAjane:vaw:10:0461:u:sew:व॑टँ॑","vawa!:pariBAzaRe:vaw:01:0888:pa:sew:व॑टँ॑","vawa!:vezwane:vaw:01:0337:pa:sew:व॑टँ॑","vaWa!:sTOlye:vaW:01:0382:pa:sew:व॑ठँ॑","vaRa!:SabdArTaH:vaR:01:0514:pa:sew:व॑णँ॑","vawi!:viBAjane:vaRw:10:0073:u:sew:व॑टिँ॑","vawi!:viBAjane:vaRw:01:0377:pa:sew:व॑टिँ॑","vawi!:prakASane ityeke:vaRw:10:0464:u:sew:व॑टिँ॑","vaWi!:ekacaryAyAm:vaRW:01:0295:A:sew:व॑ठिँ॒","vaqi!:viBAjane ityeke:vaRq:10:0074:u:sew:व॑डिँ॑","vaqi!:viBAjane:vaRq:01:0304:A:sew:व॑डिँ॒","vada!:sandeSavacane:vad:10:0379:u:sew:व॑दँ॒॑","vada!:vyaktAyAM vAci:vad:01:1164:pa:sew:व॑दँ॑","vana!:samBaktO:van:01:0534:pa:sew:व॑नँ॑","vanu!:ca nocyate nopalaByate:van:01:0915:pa:sew:व॑नुँ॑","vanu!:yAcane mit anupasargAdvA 1947:van:08:0008:A:sew:व॑नुँ॒","vana!:Sabde:van:01:0533:pa:sew:व॑नँ॑","vadi!:aBivAdanastutyoH:vand:01:0011:A:sew:व॑दिँ॒","quvapa!:bIjasantAne Cedane'pi:vap:01:1158:u:aniw:डुव॒पँ॒॑","vaBra!:gatyarTaH:vaBr:01:0638:pa:sew:व॑भ्रँ॑","wuvama!:udgiraRe mit anupasargAdvA 1948:vam:01:0984:pa:sew:टुव॑मँ॑","vaya!:gatO:vay:01:0547:A:sew:व॑यँ॒","vara:IpsAyAm:var:10:0390:u:sew:व॑रँ॑","varca!:dIptO:varc:01:0186:A:sew:व॑र्चँ॒","varRa!:varRakriyAvistAraguRavacanezu bahulametannidarSanam ityeke:varR:10:0484:u:sew:व॑र्णँ॑","varRa!:preraRe varRa! varRana ityeke:varR:10:0025:u:sew:व॑र्णँ॑","varDa!:CedanapUranayoH:varD:10:0156:u:sew:व॑र्धँ॑","varza!:snehane:varz:01:0697:A:sew:व॑र्षँ॒","barha!:BAzArTaH:varh:10:0175:u:sew:ब॑र्हँ॑","varha!:pariBAzaRahiMsAcCAdanezu:varh:01:0727:A:sew:व॑र्हँ॒","varha!:hiMsAyAm ityeke:varh:10:0300:u:sew:व॑र्हँ॑","vala:saMvaraRe saYcalane ca mit iti BojaH 0930:val:01:0564:A:sew:व॑ल॒","valka!:pariBAzaRe:valk:10:0054:u:sew:व॑ल्कँ॑","valga!:gatyarTaH:valg:01:0152:pa:sew:व॑ल्गँ॑","valBa!:Bojane:valB:01:0456:A:sew:व॑ल्भँ॒","valla!:saMvaraRe saYcalane ca:vall:01:0565:A:sew:व॑ल्लँ॒","balha!:BAzArTaH:valh:10:0301:u:sew:ब॑ल्हँ॑","valha!:pariBAzaRahiMsAcCAdanezu:valh:01:0728:A:sew:व॑ल्हँ॒","vaSa!:kAntO:vaS:02:0075:pa:sew:व॑शँ॑","vaza!:hiMsArTaH:vaz:01:0787:pa:sew:व॑षँ॑","vaska!:gatyarTaH:vazk:01:0106:A:sew:व॑स्कँ॒","vasa!:nivAse:vas:10:0488:u:sew:व॑सँ॑","vasa!:AcCAdane:vas:04:0111:A:sew:व॑सँ॒","vasa!:nivAse:vas:01:1160:pa:aniw:व॒सँ॑","vasu!:stamBe:vas:10:0273:pa:sew:व॑सुँ॑","vasa!:snehacCedApaharaRezu:vas:02:0013:u:sew:व॑सँ॑","vaska!:gatyarTaH:vask:01:0106:A:sew:व॑स्कँ॒","vasta!:ardane ityeke:vast:10:0205:A:sew:व॑स्तँ॒","vaha!:prApaRe:vah:01:1159:u:aniw:व॒हँ॒॑","vA:gatiganDanayoH:vA:02:0045:pa:aniw:वा॒","vAkzi!:kANkzAyAm:vANkz:01:0761:pa:sew:वा॑क्षिँ॑","vACi!:icCAyAm:vAYC:01:0236:pa:sew:वा॑छिँ॑","vAqf:AplAvye ityeke:vAq:01:0321:A:sew:वा॑डृ॒","vAta!:suKasevanayoH:vAt:10:0424:u:sew:वा॑तँ॑","vAvftu!:varaRe vartane iti kecit:vAvft:04:0056:A:sew:वा॑वृ॑तुँ॒","vASf!:Sabde:vAS:04:0059:A:sew:वा॑शृँ॒","vAsa!:upasevAyAm:vAs:10:0426:u:sew:वा॑सँ॑","bAhf!:prayatne:vAh:01:0732:A:sew:बा॑हृँ॒","vici!r:pfTagBAve:vic:07:0005:u:aniw:वि॒चिँ॒॑र्","viCa!:BAzArTaH:viC:06:0159:u:sew:वि॑छँ॑","viCa!:gatO:viC:10:0304:pa:sew:वि॑छँ॑","viji!r:pfTagBAve:vij:03:0013:u:aniw:वि॒जिँ॒॑र्","o!vijI!:BayacalanayoH:vij:06:0009:A:sew:ओँ॑वि॑जीँ॒","o!vijI!:BayacalanayoH:vij:07:0023:pa:sew:ओँ॑वि॑जीँ॑","viwa!:Sabde:viw:01:0354:pa:sew:वि॑टँ॑","viTf!:yAcane:viT:01:0033:A:sew:वि॑थृँ॒","vida!:cetanAKyAnanivAsezu:vid:02:0059:A:sew:वि॑दँ॒","vida!:jYAne:vid:04:0067:pa:sew:वि॑दँ॑","vidx!:lABe:vid:07:0013:u:sew:वि॑दॢँ॒॑॑","vida!:vicAraRe:vid:10:0232:A:aniw:वि॒दँ॒","vida!:sattAyAm:vid:06:0168:A:aniw:वि॒दँ॒","viDa!:viDAne:viD:06:0050:pa:sew:वि॑धँ॑","vipa!:kzepe cetyeke:vip:10:0138:u:sew:वि॑पँ॑","vila!:kzepe:vil:06:0085:u:sew:वि॑लँ॑","vila!:saMvaraRe:vil:10:0094:pa:sew:वि॑लँ॑","viSa!:praveSane:viS:06:0160:pa:aniw:वि॒शँ॑","vizu!:secane:viz:01:0794:pa:sew:वि॑षुँ॑","viza!:viprayoge:viz:09:0062:pa:aniw:वि॒षँ॑","vizx!:vyAptO:viz:03:0014:u:aniw:वि॒षॢँ॒॑॑","vizka!:darSane:vizk:10:0486:u:sew:वि॑ष्कँ॑","vizka!:hiMsAyAm:vizk:10:0207:A:sew:वि॑ष्कँ॒","visa!:gatO:vis:01:0818:pa:sew:वि॑सँ॑","bisa!:preraRe ityeke:vis:04:0124:pa:sew:बि॑सँ॑","vI:gatiprajanakAntyasanaKAdanezu:vI:02:0043:pa:aniw:वी॒","vIja!:gatO:vIj:01:0209:A:sew:वी॑जँ॒","vIra:vikrAntO:vIr:10:0445:A:sew:वी॑रँ॒","vugi!:varjane ityeke:vuNg:01:0178:pa:sew:वु॑गिँ॑","vusa!:viBAge iti kecit:vus:04:0118:pa:sew:वु॑सँ॑","vfY:AvaraRe:vf:01:0837:u:sew:वृ॑ञ्","vfY:varaRe:vf:10:0008:u:sew:वृ॑ञ्","vfN:samBaktO:vf:05:0299:A:sew:वृ॑ङ्","bfhi!:BAzArTaH:vfMh:10:0345:u:sew:बृ॑हिँ॑","bfhi!:vfdDO bfhi! vfhi! Sabde ca:vfMh:09:0045:pa:sew:बृ॑हिँ॑","vfka!:AdAne:vfk:01:0097:A:sew:वृ॑कँ॒","vfkza!:varaRe:vfkz:01:0688:A:sew:वृ॑क्षँ॒","vfjI!:varjane:vfj:02:0022:u:sew:वृ॑जीँ॑","vfjI!:varjane:vfj:07:0024:A:sew:वृ॑जीँ॒","vfjI!:varjane:vfj:10:0344:pa:sew:वृ॑जीँ॑","vfji!:varjane ityeke:vfYj:02:0023:A:sew:वृ॑जिँ॒","vfRa!:ca prIRane:vfR:06:0056:pa:sew:वृ॑णँ॑","vftu!:BAzArTaH:vft:04:0055:u:sew:वृ॑तुँ॑","vftu!:varaRe vartane:vft:10:0312:A:sew:वृ॑तुँ॒","vftu!:vartane:vft:01:0862:A:sew:वृ॑तुँ॒","vfDu!:BAzArTAH:vfD:10:0313:u:sew:वृ॑धुँ॑","vfDu!:vfDO:vfD:01:0863:A:sew:वृ॑धुँ॒","vfSa!:varaRe:vfS:04:0139:pa:sew:वृ॑शँ॑","vfzu!:secane hiMsAsaNkleSanayoSca:vfz:01:0803:pa:sew:वृ॑षुँ॑","vfza!:SaktibanDane:vfz:10:0228:A:sew:वृ॑षँ॒","bfha!:vfdDO bfhi!r vfhi!r vfdDO Sabde ca ityeke:vfh:01:0836:pa:sew:बृ॑हँ॑","vfhU!:udyamane:vfh:06:0073:pa:sew:वृ॑हूँ॑","vFY:varaRe:vF:09:0019:u:sew:वॄ॑ञ्","vF:varaRe BaraRa ityeke:vF:09:0023:pa:sew:वॄ॑","veY:tantusantAne:ve:01:1161:u:aniw:वे॒ञ्","veRf!:gatijYAnacintAniSAmanavAditragrahaRezu:veR:01:1018:u:sew:वे॑णृँ॒॑","veTf!:yAcane:veT:01:0034:A:sew:वे॑थृँ॒","venf!:gatijYAnacintAniSAmanavAditragrahaRezu ityeke:ven:01:1019:u:sew:वे॑नृँ॒॑","wuvepf:kampane:vep:01:0425:A:sew:टुवे॑पृ॒","vela!:kAlopadeSe:vel:10:0421:u:sew:वे॑लँ॑","velf!:calane:vel:01:0614:pa:sew:वे॑लृँ॑","vella!:calane:vell:01:0619:pa:sew:वे॑ल्लँ॑","vevIN:vetinA tulye:vevI:02:0072:A:sew:वे॑वी॑ङ्","vezwa!:vezwane:vezw:01:0288:A:sew:वे॑ष्टँ॒","vesa!:gatO:ves:01:0819:pa:sew:वे॑सँ॑","vehf!:prayatne:veh:01:0730:A:sew:वे॑हृँ॒","vella!:calane:vehl:01:0620:pa:sew:वे॑ल्लँ॑","o!vE:SozaRe:vE:01:1070:pa:aniw:ओँ॑वै॑","vyaca!:vyAjIkaraRe:vyac:06:0013:pa:sew:व्य॑चँ॑","vyaTa!:BayasaYcalanayoH:vyaT:01:0868:A:sew:व्य॑थँ॒","vyaDa!:tAqane:vyaD:04:0078:pa:aniw:व्य॒धँ॑","vyapa!:kzepe:vyap:10:0136:u:sew:व्य॑पँ॑","vyaya!:vittasamutsarge:vyay:10:0478:u:sew:व्य॑यँ॑","vyaya!:kzepe catyeke:vyay:10:0137:u:sew:व्य॑यँ॑","vyaya!:gatO:vyay:01:1024:u:sew:व्य॑यँ॒॑","vyuza!:dAhe:vyuz:04:0114:pa:sew:व्यु॑षँ॑","vyuza!:viBAge:vyuz:04:0008:pa:sew:व्यु॑षँ॑","vyusa!:viBAge ityeke:vyus:10:0276:pa:sew:व्यु॑सँ॑","vyusa!:hasane sahane cetyeke ityeke:vyus:04:0115:u:sew:व्यु॑सँ॑","vyeY:saMvaraRe:vye:01:1162:u:aniw:व्ये॒ञ्","vraja!:gatO:vraj:01:0247:pa:sew:व्र॑जँ॑","vraja!:gatO:vraj:01:0286:pa:sew:व्र॑जँ॑","vraja!:mArgasaMskAragatyoH:vraj:10:0109:u:sew:व्र॑जँ॑","vraji!:gatO:vraYj:01:0248:pa:sew:व्र॑जिँ॑","vraRa!:gAtravicUrRane:vraR:10:0483:u:sew:व्र॑णँ॑","vraRa!:SabdArTaH:vraR:01:0519:pa:sew:व्र॑णँ॑","o!vraScU!:Cedane:vraSc:06:0012:pa:sew:ओँ॑व्र॑श्चूँ॑","vrI:varaRe:vrI:09:0040:pa:aniw:व्री॒","vrIN:vfRotyarTe!:vrI:04:0035:A:aniw:व्री॒ङ्","vrIqa!:codane lajjAyAM ca:vrIq:04:0021:pa:sew:व्री॑डँ॑","vruqa!:saMvaraRe:vruq:06:0127:pa:sew:व्रु॑डँ॑","vrUza!:hiMsAyAm ityanye:vrUz:10:0176:u:sew:व्रू॑षँ॑","vrUsa!:hiMsAyAm ityeke:vrUs:10:0174:u:sew:व्रू॑सँ॑","vlI:varaRe:vlI:09:0037:pa:aniw:व्ली॒","SaMsu!:stutO durgatAvapItyeke iti durgaH:SaMs:01:0829:pa:sew:शं॑सुँ॑","Saka!:viBAzito marzaRe:Sak:04:0084:u:aniw:श॒कँ॒॑","Sakx!:SaktO:Sak:05:0017:pa:aniw:श॒कॢँ॑","Saki!:SaNkAyAm:SaNk:01:0091:A:sew:श॑किँ॒","Saca!:vyaktAyAM vAci:Sac:01:0189:A:sew:श॑चँ॒","Sawa!:rujAviSaraRagatyavasAdanezu:Saw:01:0336:pa:sew:श॑टँ॑","SaWa!:samyagavaBAzaRe:SaW:10:0392:u:sew:श॑ठँ॑","SaWa:asaMskAragatyoH:SaW:10:0041:u:sew:श॑ठँ॑","SaWa!:hiMsAsaNkleSanayoH kEtave ca:SaW:01:0394:pa:sew:श॑ठँ॑","SaWa!:SlAGAyAm:SaW:10:0214:A:sew:श॑ठँ॒","SaRa!:gatO dAne ca SaRa! gatAvityanye:SaR:01:0906:pa:sew:श॑णँ॑","Saqi!:rujAyAM saNGAte ca:SaRq:01:0313:A:sew:श॑डिँ॒","Sadx!:SAtane:Sad:06:0164:pa:aniw:श॒दॢँ॑","Sadx!:SAtane:Sad:01:0991:pa:aniw:श॒दॢँ॑","Sapa!:AkroSe:Sap:04:0064:u:aniw:श॒पँ॒॑","Sapa!:AkroSe:Sap:01:1155:u:aniw:श॒पँ॒॑","Sabda!:BAzaRe SabdakriyAyAm upasargAdAvizkAre ca:Sabd:10:0239:u:sew:श॑ब्दँ॑","Sama!:Alocane Samo darSane na mit 1952:Sam:04:0098:A:sew:श॑मँ॒","Samu!:upaSame:Sam:10:0218:pa:sew:श॑मुँ॑","Samba!:sambanDane ca:Samb:10:0031:u:sew:श॑म्बँ॑","Sarba!:gatO:Sarb:01:0489:pa:sew:श॑र्बँ॑","Sarva!:hiMsAyAm:Sarv:01:0668:pa:sew:श॑र्वँ॑","Sala!:gatO:Sal:01:0977:pa:sew:श॑लँ॑","Sala!:calanasaMvaraRayoH:Sal:01:0563:A:sew:श॑लँ॒","SalBa!:katTane:SalB:01:0455:A:sew:श॑ल्भँ॒","Sava!:gatO:Sav:01:0826:pa:sew:श॑वँ॑","SaSa!:plutagatO:SaS:01:0827:pa:sew:श॑शँ॑","Saza!:hiMsArTaH:Saz:01:0786:pa:sew:श॑षँ॑","Sasu!:hiMsAyAm:Sas:01:0828:pa:sew:श॑सुँ॑","SAKf!:vyAptO:SAK:01:0134:pa:sew:शा॑खृँ॑","SAqf!:SlAGAyAm:SAq:01:0324:A:sew:शा॑डृँ॒","SAna!:tejane avatejane:SAn:01:1150:u:sew:शा॑नँ॒॑","SAntva!:sAmaprayoge ityeke:SAntv:10:0052:u:sew:शा॑न्त्वँ॑","SAsu!:anuSizwO:SAs:02:0070:pa:sew:शा॑सुँ॑","SiY:niSAne:Si:05:0003:u:aniw:शि॒ञ्","Sikza!:vidyopAdAne:Sikz:01:0689:A:sew:शि॑क्षँ॒","SiKi!:gatyarTaH ityapi kecit:SiNK:01:0174:pa:sew:शि॑खिँ॑","SiGi!:AGrARe:SiNG:01:0184:pa:sew:शि॑घिँ॑","Siji!:avyakte Sabde:SiYj:02:0019:A:sew:शि॑जिँ॒","Siwa!:anAdare:Siw:01:0340:pa:sew:शि॑टँ॑","Sila!:uYCe:Sil:06:0089:pa:sew:शि॑लँ॑","Siza!:hiMsArTaH:Siz:01:0783:pa:sew:शि॑षँ॑","Siza!:asarvopayoge:Siz:07:0014:u:sew:शि॑षँ॑","Sizx!:viSezaRe:Siz:10:0349:pa:aniw:शि॒षॢँ॑","SIN:svapne:SI:02:0026:A:sew:शी॑ङ्","SIka!:BAzArTaH ca:SIk:10:0363:u:sew:शी॑कँ॑","SIka!:AmarzaRe:SIk:10:0320:u:sew:शी॑कँ॑","SIkf!:secane:SIk:01:0078:A:sew:शी॑कृँ॒","SIBf!:katTane ca:SIB:01:0444:A:sew:शी॑भृँ॒","SIla!:upaDAraRe:SIl:10:0419:u:sew:शी॑लँ॑","SIla!:samADO:SIl:01:0601:pa:sew:शी॑लँ॑","Suka!:gatO:Suk:01:0127:pa:sew:शु॑कँ॑","I!Suci!r:pUtIBAve:Suc:04:0061:u:sew:ईँ॑शु॑चिँ॒॑र्","Suca!:Soke:Suc:01:0210:pa:sew:शु॑चँ॑","Sucya!:aBizave:Sucy:01:0590:pa:sew:शु॑च्यँ॑","SuWa!:Alasye:SuW:10:0146:u:sew:शु॑ठँ॑","SuWa!:gatipratiGAte pratiGAte:SuW:01:0395:pa:sew:शु॑ठँ॑","SuWi!:gatipratiGAte pratiGAte ityeke:SuRW:01:0396:pa:sew:शु॑ठिँ॑","SuWi!:SozaRe:SuRW:10:0147:u:sew:शु॑ठिँ॑","SuWi!:SozaRe:SuRW:01:0399:pa:sew:शु॑ठिँ॑","SuDa!:SOce:SuD:04:0088:pa:aniw:शु॒धँ॑","Suna!:gatO:Sun:06:0062:pa:sew:शु॑नँ॑","SunDa!:SudDO:SunD:01:0077:pa:sew:शु॑न्धँ॑","SunDa!:SOcakarmaRi:SunD:10:0369:u:sew:शु॑न्धँ॑","SuBa!:BAzane BAsana ityeke hiMsAyAmityanye:SuB:01:0853:pa:sew:शु॑भँ॑","SuBa!:SoBArTe:SuB:06:0046:pa:sew:शु॑भँ॑","SuBa!:dIptO:SuB:01:0500:A:sew:शु॑भँ॒","SumBa!:BAzane BAsana ityeke hiMsAyAmityanye:SumB:01:0501:pa:sew:शु॑म्भँ॑","SumBa!:SoBArTe:SumB:06:0047:pa:sew:शु॑म्भँ॑","Sulka!:atisarjane atisparSane:Sulk:10:0110:u:sew:शु॑ल्कँ॑","Sulba!:mAne:Sulb:10:0101:u:sew:शु॑ल्बँ॑","Suza!:SozaRe:Suz:04:0080:pa:aniw:शु॒षँ॑","SUra:vikrAntO:SUr:10:0444:A:sew:शू॑रँ॒","SUrI!:hiMsAstamBanayoH hiMsastamBayoH:SUr:04:0052:A:sew:शू॑रीँ॒","SUrpa!:ca mAne:SUrp:10:0102:u:sew:शू॑र्पँ॑","SUla!:rujAyAM saNGAte ca:SUl:01:0604:pa:sew:शू॑लँ॑","SUza!:prasave:SUz:01:0773:pa:sew:शू॑षँ॑","SfDu!:undane:SfD:01:0864:u:sew:शृ॑धुँ॒॑","SfDu!:prasahane:SfD:10:0260:u:sew:शृ॑धुँ॑","SfDu!:SabdakutsAyAm:SfD:01:1014:A:sew:शृ॑धुँ॒","SF:hiMsAyAm:SF:09:0021:pa:sew:शॄ॑","Self!:gatO:Sel:01:0623:pa:sew:शे॑लृँ॑","Sevf!:sevane ityapyeke:Sev:01:0580:A:sew:शे॑वृँ॒","SE:pAke:SE:01:1066:pa:aniw:शै॒","So:tanUkaraRe:So:04:0040:pa:aniw:शो॒","SoRf!:varRagatyoH:SoR:01:0524:pa:sew:शो॑णृँ॑","SOwf!:garve:SOw:01:0325:pa:sew:शौ॑टृँ॑","Scuti!r:Asecane ityeke:Scut:01:0041:pa:sew:श्चु॑तिँ॑र्","Scyuti!r:kzaraRe:Scyut:01:0042:pa:sew:श्च्यु॑तिँ॑र्","SnaTa!:hiMsArTaH:SnaT:01:0909:pa:sew:श्न॑थँ॑","SmIla!:nimezaRe:SmIl:01:0596:pa:sew:श्मी॑लँ॑","syandU!:prasravaRe:Syand:01:0865:A:sew:स्य॑न्दूँ॒","cyuN:gatO:Syu:01:1108:A:aniw:च्यु॒ङ्","SyEN:gatO:SyE:01:1118:A:aniw:श्यै॒ङ्","sraMsu!:avasraMsane:SraMS:01:0857:A:sew:स्रं॑सुँ॒","sraMsu!:avasraMsane:SraMs:01:0857:A:sew:स्रं॑सुँ॒","Sraki!:gatO:SraNk:01:0089:A:sew:श्र॑किँ॒","Sragi!:gatyarTaH:SraNg:01:0161:pa:sew:श्र॑गिँ॑","SraRa!:gatO dAne ca:SraR:01:0907:pa:sew:श्र॑णँ॑","SraRa!:dAne:SraR:10:0063:u:sew:श्र॑णँ॑","SraTa!:dOrbalye:SraT:10:0409:u:sew:श्र॑थँ॑","SraTa!:hiMsArTaH:SraT:01:0908:pa:sew:श्र॑थँ॑","SraTa!:prayatne prasTAna ityeke:SraT:10:0019:u:sew:श्र॑थँ॑","SraTa!:mokzaRe hiMsAyAmityeke:SraT:10:0360:u:sew:श्र॑थँ॑","SranTa!:sandarBe:SranT:09:0046:u:sew:श्र॑न्थँ॑","SranTa!:sandarBe:SranT:10:0374:pa:sew:श्र॑न्थँ॑","SranTa!:vimocanapratiharzayoH:SranT:09:0048:pa:sew:श्र॑न्थँ॑","SraTi!:SETilye:SranT:01:0035:A:sew:श्र॑थिँ॒","Sramu!:tapasi Kede ca:Sram:04:0101:pa:sew:श्र॑मुँ॑","SramBu!:pramAde:SramB:01:0458:A:sew:श्र॑म्भुँ॒","SrA:pAke:SrA:02:0048:pa:aniw:श्रा॒","SrA:pAke:SrA:01:0922:pa:sew:श्रा॑","SriY:sevAyAm:Sri:01:1044:u:sew:श्रि॑ञ्","Srizu!:dAhe:Sriz:01:0798:pa:sew:श्रि॑षुँ॑","SrIY:pAke:SrI:09:0003:u:aniw:श्री॒ञ्","Sru:SravaRe:Sru:01:1092:pa:aniw:श्रु॒","SrE:pAke:SrE:01:1067:pa:aniw:श्रै॒","SroRf!:saNGAte:SroR:01:0525:pa:sew:श्रो॑णृँ॑","Slaki!:gatO gatyarTaH:SlaNk:01:0090:A:sew:श्ल॑किँ॒","Slagi!:gatyarTaH:SlaNg:01:0162:pa:sew:श्ल॑गिँ॑","SlaTa!:hiMsArTaH:SlaT:01:0910:pa:sew:श्ल॑थँ॑","SlAKf!:vyAptO:SlAK:01:0135:pa:sew:श्ला॑खृँ॑","SlAGf!:katTane:SlAG:01:0122:A:sew:श्ला॑घृँ॒","Slizu!:dAhe:Sliz:01:0799:pa:sew:श्लि॑षुँ॑","Sliza!:AliNgane:Sliz:10:0059:pa:aniw:श्लि॒षँ॑","Sliza!:SlezaRe:Sliz:04:0083:u:sew:श्लि॑षँ॑","Slokf!:saNGAte:Slok:01:0081:A:sew:श्लो॑कृँ॒","SloRf!:ca saNGAte:SloR:01:0526:pa:sew:श्लो॑णृँ॑","Svaki!:gatyarTaH:SvaNk:01:0101:A:sew:श्व॑किँ॒","Sragi!:gatyarTaH:SvaNg:01:0161:pa:sew:श्र॑गिँ॑","Svaca!:gatO:Svac:01:0190:A:sew:श्व॑चँ॒","Svaci!:gatO:SvaYc:01:0191:A:sew:श्व॑चिँ॒","SvaWa!:samyagavaBAzaRe:SvaW:10:0393:u:sew:श्व॑ठँ॑","SvaWa!:asaMskAragatyoH:SvaW:10:0042:u:sew:श्व॑ठँ॑","SvaWi!:asaMskAragatyoH ityeke:SvaRW:10:0043:u:sew:श्व॑ठिँ॑","SvaBra!:gatyAm ca:SvaBr:10:0117:u:sew:श्व॑भ्रँ॑","Svarta!:gatyAm:Svart:10:0115:u:sew:श्व॑र्तँ॑","Svala!:ASugamane:Sval:01:0630:pa:sew:श्व॑लँ॑","Svalka!:pariBAzaRe:Svalk:10:0053:u:sew:श्व॑ल्कँ॑","Svalla!:ASugamane:Svall:01:0631:pa:sew:श्व॑ल्लँ॑","Svasa!:prARane:Svas:02:0064:pa:sew:श्व॑सँ॑","wuo!Svi:gativfdDyoH:Svi:01:1165:pa:sew:टुओँश्वि॑","SvitA!:varRe:Svit:01:0843:A:sew:श्वि॑ताँ॑","Svidi!:SvEtye:Svind:01:0010:A:sew:श्वि॑दिँ॒","zwyE:SabdasaNGAtayoH:zwyE:01:1059:pa:aniw:ष्ट्यै॒","zWivu!:nirasane:zWiv:01:0641:pa:sew:ष्ठि॑वुँ॑","zWivu!:nirasane kecidihemaM na paWanti:zWiv:04:0004:pa:sew:ष्ठि॑वुँ॑","zvaska!:gatyarTaH:zvazk:01:0105:A:sew:ष्व॑स्कँ॒","zvaska!:gatyarTaH:zvask:01:0105:A:sew:ष्व॑स्कँ॒","zasti!:svapne:saMst:02:0074:pa:sew:ष॑स्तिँ॑","zage!:saMvaraRe:sag:01:0898:pa:sew:ष॑गेँ॑","saNketa!:AmantraRe:saNket:10:0433:u:sew:स॑ङ्के॑तँ॑","saNgrAma!:yudDe ayamanudAttet:saNgrAm:10:0467:A:sew:स॑ङ्ग्रा॑मँ॒","zaca!:samavAye:sac:01:0187:u:sew:ष॑चँ॒॑","zaca!:secane sevane ca:sac:01:1152:A:sew:ष॑चँ॒","zaYja!:saNge:saYj:01:1142:pa:aniw:ष॒ञ्जँ॑","zawa!:avayave:saw:01:0350:pa:sew:ष॑टँ॑","zawwa!:hiMsAyAm:saww:10:0128:u:sew:ष॑ट्टँ॑","satra:santAnakriyAyAm:sattr:10:0448:A:sew:स॑त्रँ॒","satra!:santAnakriyAyAm:satr:10:0448:A:sew:स॑त्रँ॒","zadx!:viSaraRagatyavasAdanezu:sad:06:0163:pa:aniw:ष॒दॢँ॑","zadx!:viSaraRagatyavasAdanezu:sad:01:0990:pa:aniw:ष॒दॢँ॑","zaGa!:hiMsAyAm:saD:05:0024:pa:sew:ष॑घँ॑","zanu!:dAne:san:08:0002:u:sew:ष॑नुँ॒॑","zana!:samBaktO:san:01:0535:pa:sew:ष॑नँ॑","zapa!:samavAye:sap:01:0466:pa:sew:ष॑पँ॑","saBAja!:prItidarSanayoH prItisevanayorityeke:samAj:10:0429:u:sew:स॑भा॑जँ॑","zama!:avEkalye vEkalye:sam:01:0963:pa:sew:ष॑मँ॑","samI!:parimAne ityeke:sam:04:0132:pa:sew:स॑मीँ॑","zamba!:sambanDane:samb:10:0030:u:sew:ष॑म्बँ॑","sAra!:dOrbalye:sar:10:0407:u:sew:सा॑रँ॑","zarkza!:Adare iti kecit:sarkz:01:0759:pa:sew:ष॑र्क्षँ॑","zarja!:arjane:sarj:01:0257:pa:sew:ष॑र्जँ॑","zarba!:gatO:sarb:01:0490:pa:sew:ष॑र्बँ॑","zarva!:hiMsAyAm:sarv:01:0669:pa:sew:ष॑र्वँ॑","zala!:gatO:sal:01:0628:pa:sew:ष॑लँ॑","zasa!:svapne:sas:02:0073:pa:sew:ष॑सँ॑","zasja!:gatO:sasj:01:0229:pa:sew:ष॑स्जँ॑","zaha!:cakyarTe:sah:10:0341:pa:sew:ष॑हँ॑","zaha!:marzaRe:sah:04:0023:u:sew:ष॑हँ॑","zaha!:marzaRe:sah:01:0988:A:sew:ष॑हँ॒","sADa!:saMsidDO:sAD:05:0019:pa:aniw:सा॒धँ॑","zAntva!:sAmaprayoge:sAntv:10:0051:u:sew:षा॑न्त्वँ॑","sAma!:sAntvaprayoge:sAm:10:0420:u:sew:सा॑मँ॑","sAmba!:sambanDane ityeke:sAmb:10:0032:u:sew:सा॑म्बँ॑","sAra!:dOrbalye:sAr:10:0407:u:sew:सा॑रँ॑","ziY:banDane:si:05:0002:u:aniw:षि॒ञ्","ziY:banDane:si:09:0005:u:aniw:षि॒ञ्","zica!:kzaraRe:sic:06:0170:u:aniw:षि॒चँ॒॑","ziwa!:anAdare:siw:01:0341:pa:sew:षि॑टँ॑","ziDa!:gatyAm:siD:01:0049:pa:sew:षि॑धँ॑","ziDU!:SAstre mANgalye ca:siD:01:0050:pa:sew:षि॑धूँ॑","ziDu!:saMrAdDO:siD:04:0089:pa:aniw:षि॒धुँ॑","zivi!:secane ityeke sevana iti taraNgiRyAm:sinv:01:0674:pa:sew:षि॑विँ॑","ziBu!:hiMsArTaH ityeke:siB:01:0498:pa:sew:षि॑भुँ॑","zimBu!:hiMsArTaH ityeke:simB:01:0499:pa:sew:षि॑म्भुँ॑","zila!:uYCe:sil:06:0090:pa:sew:षि॑लँ॑","zivu!:tantusantAne:siv:04:0002:pa:sew:षि॑वुँ॑","sIkf!:secane ityeke:sIk:01:0079:A:sew:सी॑कृँ॒","zuY:aBizave:su:05:0001:u:aniw:षु॒ञ्","zu:prasavasESvaryayoH:su:01:1091:pa:aniw:षु॒","zu:prasavESvaryayoH:su:02:0036:pa:aniw:षु॒","suKa!:tatkriyAyAm:suK:10:0475:u:sew:सु॑खँ॑","zuwwa!:anAdare:suww:10:0038:u:sew:षु॑ट्टँ॑","zura!:ESvaryadIptyoH:sur:06:0066:pa:sew:षु॑रँ॑","zuha!:cakyarTe:suh:04:0024:pa:sew:षु॑हँ॑","zUN:prARigarBavimocane:sU:02:0025:A:sew:षू॑ङ्","zUN:prARiprasave:sU:04:0027:A:sew:षू॑ङ्","zU:preraRe:sU:06:0144:pa:sew:षू॑","sUca!:pESunye:sUc:10:0412:u:sew:सू॑चँ॑","sUtra!:vezwane vimocana ityanye:sUtr:10:0450:u:sew:सू॑त्रँ॑","zUda!:kzaraRe:sUd:01:0025:A:sew:षू॑दँ॒","zUda!:kzaraRe:sUd:10:0242:u:sew:षू॑दँ॑","sUrkza!:Adare:sUrkz:01:0758:pa:sew:सू॑र्क्षँ॑","zUrkzya!:IrzyArTaH:sUrkzy:01:0586:pa:sew:षू॑र्क्ष्यँ॑","sUza!:prasave ityeke:sUz:01:0774:pa:sew:सू॑षँ॑","sf:gatO:sf:03:0018:pa:aniw:सृ॒","sf:gatO:sf:01:1085:pa:aniw:सृ॒","sfja!:visarge:sfj:04:0075:A:aniw:सृ॒जँ॒","sfja!:visarge:sfj:06:0150:pa:aniw:सृ॒जँ॑","sfpx!:gatO:sfp:01:1138:pa:aniw:सृ॒पॢँ॑","zfBu!:hiMsArTaH:sfB:01:0496:pa:sew:षृ॑भुँ॑","zfmBu!:hiMsArTO:sfmB:01:0497:pa:sew:षृ॑म्भुँ॑","sekf!:gatO:sek:01:0086:A:sew:से॑कृँ॒","zelf!:gatO ityeke:sel:01:0624:pa:sew:षे॑लृँ॑","zevf!:sevane:sev:01:0574:A:sew:षे॑वृँ॒","zE:kzaye:sE:01:1063:pa:aniw:षै॒","zo:antakarmaRi:so:04:0042:pa:aniw:षो॒","skandi!r:gatiSozaRayoH:skand:01:1134:pa:aniw:स्क॒न्दिँ॑र्","skamBu!:roDana ityeke stamBa iti mADavaH:skamB:09:0009:pa:aniw:स्क॒म्भुँ॑","skaBi!:pratibanDe:skamB:01:0452:A:sew:स्क॑भिँ॒","skuY:Apravane:sku:09:0006:u:aniw:स्कु॒ञ्","skudi!:ApravaRe:skund:01:0009:A:sew:स्कु॑दिँ॒","skumBu!:roDana ityeke DAraRa ityanye:skumB:09:0010:pa:aniw:स्कु॒म्भुँ॑","sKada!:sKadane sKadir avapariByAM ca na mit 1954:sKad:01:0872:A:sew:स्ख॑दँ॒","sKala!:saYcalane mit iti BojaH 0931:sKal:01:0625:pa:sew:स्ख॑लँ॑","zwaka!:pratiGAte pratIGAte:stak:01:0891:pa:sew:ष्ट॑कँ॑","stana!:devaSabde:stan:10:0398:u:sew:स्त॑नँ॑","zwana!:Sabde:stan:01:0532:pa:sew:ष्ट॑नँ॑","zwama!:avEkalye vEkalye:stam:01:0964:pa:sew:ष्ट॑मँ॑","zwaBi!:pratibanDe:stamB:01:0451:A:sew:ष्ट॑भिँ॒","stamBu!:roDana ityeke stamBa iti mADavaH:stamB:09:0007:pa:aniw:स्त॒म्भुँ॑","zWala!:sTAne:stal:01:0970:pa:sew:ष्ठ॑लँ॑","zwiGa!:Askandane:stiG:05:0021:A:sew:ष्टि॑घँ॒","zwipf!:kzaraRArTaH:stip:01:0422:A:sew:ष्टि॑पृँ॒","zwima!:ArdrIBAve:stim:04:0019:pa:sew:ष्टि॑मँ॑","zwIma!:ArdrIBAve:stIn:04:0020:pa:sew:ष्टी॑मँ॑","zwuY:stutO:stu:02:0038:u:aniw:ष्टु॒ञ्","zwuca!:prasAde:stuc:01:0199:A:sew:ष्टु॑चँ॒","zwupa!:zwUpa! samucCrAye:stup:04:0151:u:sew:ष्टु॑पँ॑","zwupa!:samucCrAye:stup:10:0190:pa:sew:ष्टु॑पँ॑","zwuBu!:stamBe:stuB:01:0460:A:sew:ष्टु॑भुँ॒","stumBu!:roDana ityeke nizkozaRe ityanye:stumB:09:0008:pa:aniw:स्तु॒म्भुँ॑","zwUpa!:samucCrAye ityeke:stUp:04:0152:u:sew:ष्टू॑पँ॑","zwUpa!:samucCrAye ityeke:stUp:10:0191:pa:sew:ष्टू॑पँ॑","stfY:AcCAdane:stf:05:0006:u:aniw:स्तृ॒ञ्","zwfkza!:gatO:stfkz:01:0751:pa:sew:ष्टृ॑क्षँ॑","stfhU!:hiMsArTaH:stfh:06:0076:pa:sew:स्तृ॑हूँ॑","stFY:AcCAdane:stF:09:0017:u:sew:स्तॄ॑ञ्","stena!:cOrye:sten:10:0439:u:sew:स्ते॑नँ॑","zwepf!:kzaraRArTaH:step:01:0423:A:sew:ष्टे॑पृँ॒","zwE:vezwane SoBAyAM cetyeke:stE:01:1071:pa:aniw:ष्टै॒","stoma!:SlAGAyAm:stom:10:0468:u:sew:स्तो॑मँ॑","styE:SabdasaNGAtayoH:styE:01:1058:pa:aniw:स्त्यै॒","zwrakza!:gatO:strakz:01:0749:pa:sew:ष्ट्र॑क्षँ॑","zWage!:saMvaraRe:sTag:01:0899:pa:sew:ष्ठ॑गेँ॑","zWA:gatinivfttO:sTA:01:1077:pa:aniw:ष्ठा॒","sTuqa!:saMvaraRe:sTuq:06:0118:pa:sew:स्थु॑डँ॑","sTUla:paribfMhaRe:sTUl:10:0446:A:sew:स्थू॑लँ॒","zRasu!:nirasane:snas:04:0006:pa:sew:ष्ण॑सुँ॑","zRA:SOce mit anupasargAdvA 1946:snA:02:0047:pa:aniw:ष्णा॒","zRiha!:prItO:snih:10:0055:pa:aniw:ष्णि॒हँ॑","zRiha!:snehane:snih:04:0097:u:sew:ष्णि॑हँ॑","zRu:prasravaRe:snu:02:0033:pa:sew:ष्णु॑","zRusu!:adane! AdAna ityeke! adarSana ityapare:snus:04:0005:pa:sew:ष्णु॑सुँ॑","zRuha!:udgiraRe:snuh:04:0096:pa:aniw:ष्णु॒हँ॑","zRE:vezwane SoBAyAM cetyeke:snE:01:1072:pa:aniw:ष्णै॒","spadi!:kiYciccalane:spand:01:0014:A:sew:स्प॑दिँ॒","sparDa!:saNGarze:sparD:01:0003:A:sew:स्प॑र्धँ॒","spaSa!:grahaRasaMSlezaRayoH:spaS:10:0200:A:sew:स्प॑शँ॒","spaSa!:bADanasparSanayoH:spaS:01:1032:u:sew:स्प॑शँ॒॑","spf:prItipAlanayoH prIticalanayorityanye:spf:05:0014:pa:aniw:स्पृ॒","spfSa!:saMsparSane:spfS:06:0158:pa:aniw:स्पृ॒शँ॑","spfha!:IpsAyAm:spfh:10:0410:u:sew:स्पृ॑हँ॑","sPara!:saYcalane ityanye:sPar:06:0123:pa:sew:स्फ॑रँ॑","sPala!:saYcalane ityanye:sPal:06:0124:pa:sew:स्फ॑लँ॑","sPAyI!:vfdDO:sPAy:01:0560:A:sew:स्फा॑यीँ॒","sPiwa!:snehane ityeke:sPiw:10:0129:u:sew:स्फि॑टँ॑","sPiwwa!:hiMsAyAm:sPiw:10:0056:u:sew:स्फि॑ट्टँ॑","sPuwa!:Bedane:sPuw:06:0100:u:sew:स्फु॑टँ॑","sPuwa!:vikasane:sPuw:10:0247:pa:sew:स्फु॑टँ॑","sPuwa!:vikasane:sPuw:01:0293:A:sew:स्फु॑टँ॒","sPuwi!r:viSaraRe:sPuw:01:0379:pa:sew:स्फु॑टिँ॑र्","sPuqa!:saMvaraRe:sPuq:06:0125:pa:sew:स्फु॑डँ॑","sPuwi!:viSaraRe ityapi kecit:sPuRw:01:0380:pa:sew:स्फु॑टिँ॑","sPuwi!:ityapi parihAse:sPuRw:10:0005:u:sew:स्फु॑टिँ॑","sPuqi!:parihAse:sPuRq:10:0004:u:sew:स्फु॑डिँ॑","sPuqi!:vikasane:sPuRq:01:0311:A:sew:स्फु॑डिँ॒","sPura!:saYcalane sPura! sPuraRa ityeke:sPur:06:0121:pa:sew:स्फु॑रँ॑","sPurCA!:vistftO:sPurC:01:0241:pa:sew:स्फु॑र्छाँ॑","sPula!:saYcalane:sPul:06:0122:pa:sew:स्फु॑लँ॑","wuo!sPUrjA!:vajranirGoze:sPUrj:01:0268:pa:sew:टुओँस्फू॑र्जाँ॑","zmiN:anAdare ityeke:smi:10:0058:u:sew:ष्मि॑ङ्","zmiN:IzadDasane:smi:01:1099:A:aniw:ष्मि॒ङ्","smiwa!:anAdare:smiw:10:0057:u:sew:स्मि॑टँ॑","smIla!:nimezaRe:smIl:01:0597:pa:sew:स्मी॑लँ॑","smf:prItipAlanayoH prIticalanayorityanye ityeke:smf:05:0015:pa:aniw:स्मृ॒","smf:ADyAne:smf:01:0919:pa:sew:स्मृ॑","smf:cintAyAm:smf:01:1082:pa:aniw:स्मृ॒","syamu!:Sabde:syam:01:0960:pa:sew:स्य॑मुँ॑","syama!:vitarke:syam:10:0216:A:sew:स्य॑मँ॒","sraMsu!:avasraMsane:sraMs:01:0857:A:sew:स्रं॑सुँ॒","sraki!:gatO:sraNk:01:0088:A:sew:स्र॑किँ॒","sramBu!:pramAde ityeke:sramB:01:0459:A:sew:स्र॑म्भुँ॒","sramBu!:viSvAse:sramB:01:0861:A:sew:स्र॑म्भुँ॒","srivu!:gatiSozaRayoH:sriv:04:0003:pa:sew:स्रि॑वुँ॑","sru:gatO:sru:01:1090:pa:aniw:स्रु॒","srekf!:gatO:srek:01:0087:A:sew:स्रे॑कृँ॒","srE:pAke iti kezucitpAWaH:srE:01:1068:pa:aniw:स्रै॒","srokf!:saNGAte iti pAWAntaram:srok:01:0082:A:sew:स्रो॑कृँ॒","zvaki!:gatyarTaH ityeke:svaNk:01:0114:A:sew:ष्व॑किँ॒","Sragi!:gatyarTaH:svaNg:01:0161:pa:sew:श्र॑गिँ॑","zvaYja!:parizvaNge:svaYj:01:1131:A:aniw:ष्व॒ञ्जँ॒","zvada!:AsvAdane:svad:01:0018:A:sew:ष्व॑दँ॒","zvada!:AsvAdane:svad:10:0336:u:sew:ष्व॑दँ॑","svana!:Sabde:svan:01:0961:pa:sew:स्व॑नँ॑","svana!:avataMsane mit:svan:01:0936:pa:sew:स्व॑नँ॑","Yizvapa!:Saye:svap:02:0063:pa:aniw:ञिष्व॒पँ॑","svara!:Akzepe:svar:10:0402:u:sew:स्व॑रँ॑","svarta!:gatyAm ityeke:svart:10:0116:u:sew:स्व॑र्तँ॑","svarda!:AsvAdane:svard:01:0019:A:sew:स्व॑र्दँ॒","zvaska!:gatyarTaH:svazk:01:0105:A:sew:ष्व॑स्कँ॒","zvaska!:gatyarTaH:svask:01:0105:A:sew:ष्व॑स्कँ॒","svAda!:AsvAdane ityeke:svAd:10:0337:u:sew:स्वा॑दँ॑","svAda!:AsvAdane:svAd:01:0028:A:sew:स्वा॑दँ॒","zvidA!:gAtraprakzaraRe YizvidA! ityeke:svid:04:0085:pa:aniw:ष्वि॒दाँ॑","YizvidA!:snehanamocanayoH gAtraprasravaRe snehanamohanayorityeke:svid:01:0845:A:sew:ञिष्वि॑दाँ॒","svf:SabdopatApayoH:svf:01:1081:pa:aniw:स्वृ॒","hawa!:SabdasaNGAtayoH dIptO ca:haw:01:0349:pa:sew:ह॑टँ॑","haWa!:plutiSaWatvayoH balAtkAra ityanye:haW:01:0388:pa:sew:ह॑ठँ॑","hada!:purIzotsarge:had:01:1132:A:aniw:ह॒दँ॒","hana!:hiMsAgatyoH:han:02:0002:pa:aniw:ह॒नँ॑","hamma!:gatO:hamm:01:0538:pa:sew:ह॑म्मँ॑","harya!:gatikAntyoH:hay:01:0592:pa:sew:ह॑र्यँ॑","haya!:gatO:hay:01:0589:pa:sew:ह॑यँ॑","hala!:vileKane:hal:01:0971:pa:sew:ह॑लँ॑","hase!:hasane:has:01:0822:pa:sew:ह॑सेँ॑","hasta!:ardane ityanye:hast:10:0206:A:sew:ह॑स्तँ॒","o!hAN:gatO:hA:03:0008:A:aniw:ओँ॑हा॒ङ्","o!hAk:tyAge:hA:03:0009:pa:aniw:ओँ॑हा॒क्","hi:gatO vfdDO ca:hi:07:0019:pa:aniw:हि॒","hisi!:hiMsAyAm:hiMs:10:0012:u:sew:हि॑सिँ॑","hisi!:hiMsAyAm:hiMs:05:0366:pa:sew:हि॑सिँ॑","hikka!:avyakte Sabde:hikk:01:0997:u:sew:हि॑क्कँ॒॑","hiwa!:AkroSe ityeke:hiw:01:0356:pa:sew:हि॑टँ॑","hiqi!:gatyanAdarayoH:hiRq:01:0301:A:sew:हि॑डिँ॒","hivi!:prIRanArTaH:hinv:01:0675:pa:sew:हि॑विँ॑","hila!:BAvakaraRe:hil:06:0088:pa:sew:हि॑लँ॑","hizka!:hiMsAyAm ityeke:hizk:10:0208:A:sew:हि॑ष्कँ॒","hu:dAnAdanayoH AdAne cetyeke prIRane'pIti BAzyam:hu:03:0001:pa:aniw:हु॒","huqf!:gatO:huq:01:0408:pa:sew:हु॑डृँ॑","huqa!:saNGAte:huq:06:0130:pa:sew:हु॑डँ॑","huqi!:varaRe haraRa ityeke:huRq:01:0302:A:sew:हु॑डिँ॒","huqi!:saNGAte:huRq:01:0310:A:sew:हु॑डिँ॒","hurCA!:kOwilye:hurC:01:0239:pa:sew:हु॑र्छाँ॑","hula!:gatO:hul:01:0980:pa:sew:हु॑लँ॑","hula!:hiMsAsaMvaraRayoSca hiMsAyAM saMvaraRe ca:hul:01:0978:pa:sew:हु॑लँ॑","hUqf!:gatO:hUq:01:0409:pa:sew:हू॑डृँ॑","hf:prasahyakaraRe:hf:03:0016:pa:aniw:हृ॒","hfY:haraRe:hf:01:1046:u:aniw:हृ॒ञ्","hfzu!:alIke:hfz:01:0806:pa:sew:हृ॑षुँ॑","hfza!:tuzwO:hfz:04:0142:pa:sew:हृ॑षँ॑","hrasa!:Sabde:hfs:01:0808:pa:sew:ह्र॑सँ॑","heWa!:heQa! ca BUtaprAdurBAve:heW:09:0069:pa:sew:हे॑ठँ॑","heWa!:vibADAyAm:heW:01:0299:A:sew:हे॑ठँ॒","heWa!:vibADAyAm:heW:01:0360:pa:sew:हे॑ठँ॑","heqf!:anAdare:heq:01:0318:A:sew:हे॑डृँ॒","heqa!:vezwane:heq:01:0887:pa:sew:हे॑डँ॑","heQa!:ca BUtaprAdurBAve ityeke:heQ:09:0070:pa:sew:हे॑ढँ॑","hepf!:ca gatO:hep:01:0432:A:sew:हे॑पृँ॒","hezf!:avyakte Sabde:hez:01:0708:A:sew:हे॑षृँ॒","hoqf!:anAdare:hoq:01:0319:A:sew:हो॑डृँ॒","hoqf!:gatO:hoq:01:0410:pa:sew:हो॑डृँ॑","hnuN:apanayane:hnu:02:0076:A:aniw:ह्नु॒ङ्","hmala!:saYcalane calane mit anupasargAdvA 1943:hmal:01:0918:pa:sew:ह्म॑लँ॑","hrage!:saMvaraRe:hrag:01:0896:pa:sew:ह्र॑गेँ॑","hrapa!:vyaktAyAM vAci ityanye:hrap:10:0163:u:sew:ह्र॑पँ॑","hrasa!:Sabde:hras:01:0808:pa:sew:ह्र॑सँ॑","hrAda!:avyakte Sabde:hrAd:01:0026:A:sew:ह्रा॑दँ॒","hrI:lajjAyAm:hrI:03:0003:pa:aniw:ह्री॒","hrICa!:lajjAyAm:hrIC:01:0238:pa:sew:ह्री॑छँ॑","hrezf!:avyakte Sabde:hrez:01:0709:A:sew:ह्रे॑षृँ॒","hlage!:saMvaraRe:hlag:01:0897:pa:sew:ह्ल॑गेँ॑","hlapa!:vyaktAyAM vAci:hlap:10:0161:u:sew:ह्ल॑पँ॑","hlasa!:Sabde:hlas:01:0809:pa:sew:ह्ल॑सँ॑","hlAdI!:avyakte Sabde suKe ca:hlAd:01:0027:A:sew:ह्ला॑दीँ॒","hvala!:saYcalane calane mit anupasargAdvA 1942:hval:01:0917:pa:sew:ह्व॑लँ॑","hvf:saMvaraRe varaRe ityeke:hvf:01:1080:pa:aniw:ह्वृ॒","hvf:kOwilye:hvf:01:1084:pa:aniw:ह्वृ॒","hveY:sparDAyAM Sabde ca:hve:01:1163:u:aniw:ह्वे॒ञ्");
$bhvAdi=array("ahi!","aka!","akzU!","aga!","aki!","agi!","aGi!","acu!","aja!","aci!","aYcu!","aYcu!","awa!","awwa!","aqa!","aqqa!","aRa!","aWi!","ata!","aqqa!","ati!","adi!","aBra!","ama!","abi!","aBi!","aya!","aya!","arGa!","arca!","arja!","arda!","arba!","arva!","arha!","ala!","ava!","aza!","asa!","ACi!","ANaH Sasi","iKa!","iKi!","igi!","iwa!","idi!","ivi!","Ikza!","IKi!","IKi!","Ija","Iji!","Irkzya!","Irzya!","Iza!","Iza!","Iha!","uN","ukza!","uKa!","uKi!","uCI!","uCi!","uWa!","uWa!","urda!","urvI!","uza!","uhi!r","UWa!","UyI!","Uza!","Uha!","f","fja!","fji!","ejf!","ejf!","eWa!","eDa!","ezf!","ezf!","oKf!","oRf!","kaka!","kaKa!","kaKe!","kage!","kaki!","kaca!","kaja!","kaci!","kawI!","kawe!","kaWa!","kaqa!","kaqqa!","kaRa!","kaRa!","kaWi!","kaqi!","kaqi!","katTa!","kada!","kaqqa!","kanI!","kadi!","kadi!","kapa!","kabf!","kamu!","kapi!","karja!","karda!","karba!","karva!","kala!","kalla!","kaza!","kasa!","kAkzi!","kAci!","kASf!","kAsf!","kiwa!","kiwa!","kita!","kIla!","kuMSa!","kuka!","kuca!","kuca!","kuju!","kuYca!","kuji!","kuwi!","kuWi!","kuqi!","kuqi!","kuTi!","kubi!","kurda","kula!","kUja!","kUla!","kfY","kfvi!","kfpa!","kfpU!","kfza!","kfpU!","kepf!","kelf!","kevf!","kE","knaTa!","knUyI!","kmara!","kraTa!","krada!","kradi!","kradi!","krapa!","kramu!","krIqf!","kruYca!","kruSa!","klaTa!","klada!","kladi!","kladi!","klidi!","klidi!","klIbf!","kluN","kleSa!","kvaRa!","kvaTe!","kzaji!","kzapayaSca","kzamU!z","kzara!","kzi","kzivu!","kzIja!","kzIbf!","kzIvf!","kzuBa!","kzura!","kzevu!","kzE","kzmAyI!","kzmIla!","YikzvidA!","kzvelf!","Kaja!","Kaji!","Kawa!","Kaqi!","Kada!","Kanu!","Karja!","Karda!","Karba!","Karva!","Kala!","Kaza!","KAdf!","Kiwa!","KuN","Kuju!","Kurda","Kelf!","Kevf!","KE","Korf!","Kolf!","gaja!","gaji!","gaqa!","gaqi!","gaqi!","gada!","gamx!","garja!","garda!","garba!","garva!","garha!","gala!","galBa!","galha!","gAN","gADf!","gAhU!","guN","guN","guja!","guji!","guda!","gupa!","gupU!","gurda","gurvI!","guhU!","gfhU!","gf","gfja!","gfji!","gepf!","gevf!","gezf!","gE","gozwa!","graTi!","grasu!","grucu!","glasu!","glaha!","glucu!","gluYca!","glepf!","glepf!","glevf!","glezf!","glE","GagGa!","GaGa!","Gawa!","Gawwa!","Gaza!","Gasx!","GiRi!","GuN","Guzi!","Guwa!","GuRa!","GuRi!","Guzi!r","GUrRa!","Gf","GfRi!","Gfzu!","GrA","DrAGf!","NuN","caka!","caka!","caYcu!","cawe!","caRa!","caqi!","cate!","cade!","cana!","cadi!","capa!","camu!","caya!","cara!","carca!","carba!","carva!","cala!","caza!","caha!","cAyf!","ciwa!","citI!","cilla!","cIbf!","cIBf!","cIvf!","cucya!","cuqqa!","cuqi!","cuqqa!","cupa!","cubi!","culla!","cUza!","celf!","cezwa!","cyuti!r","Camu!","Caza!","jaja!","jaji!","jawa!","japa!","jaBI!","jamu!","jartsa!","jartsa!","jartsa!","jala!","jalpa!","jaza!","ji","ji!","jivi!","jimu!","jizu!","jIva!","juN","ju","jugi!","jutf!","jUza!","jfBi!","jezf!","jehf!","jE","jyuN","jyuti!r","jri","jvara!","jvala!","jvala!","Jawa!","Jamu!","Jartsa!","Jartsa!","Jartsa!","Jaza!","Jaza!","wala!","wikf!","wIkf!","wvala!","qIN","QOkf!","tasi!","taka!","takzU!","takza!","taki!","tagi!","taYcu!","tawa!","taqi!","tapa!","taya!","tarja!","tarda!","tAyf!","tikf!","tija!","tipf!","tila!","tilla!","tIkf!","tIva!","tuja!","tuji!","tuqf!","tuqi!","tupa!","tuPa!","tuBa!","tumpa!","tumPa!","tubi!","turvI","tusa!","tuhi!r","tUqf!","tUla!","tUza!","tfkza!","tF","teja!","tepf!","tevf!","tyaja!","trakza!","traKa!","traki!","tragi!","tradi!","trapU!z","triKi!","trupa!","truPa!","trumpa!","trumPa!","trEN","trOkf!","tvakzU!","tvagi!","tvaYcu!","YitvarA!","tviza!","tsara!","Taki!","TurvI","daMSa!","dakza!","dakza!","daGi!","dada!","daDa!","daya!","dala!","daha!","dAR","dAna!","dASf!","dAsf!","divi!","dIkza!","wudu","durvI!","duhi!r","dfN","dfha!","dF","deN","devf!","dEp","dfSi!r","dyuta!","dyE","drama!","drAKf!","drAGf!","drAkzi!","drAqf!","drAhf!","dru","drekf!","drE","dvf","DaRa!","Davi!","DAvu!","Dikza!","Divi!","Dukza!","DurvI!","DUpa!","DfN","DfY","Dfja!","Dfji!","Dew","Depf!","Dorf!","DmA","DmAkzi!","DyE","Draja!","Draji!","DraRa!","DrAKf!","DrAkzi!","DrAqf!","Drija!","Dru","Drekf!","DrE","DvaMsu!","Dvaja!","Dvaji!","DvaRa!","Dvana!","Dvana!","DvAkzi!","Dvf","Rakza!","RaKa!","RaKi!","Rawa!","Rawa!","Rada!","wunadi!","RaBa!","Rama!","Raya!","narda!","Rala!","Rasa!","nATf!","nADf!","RAsf!","Rikza!","Ridf!","Ridi!","Rivi!","RiSa!","Rizu!","RIY","RIla!","RIva!","nF","Redf!","Rezf!","pakza!","qupaca!z","paci!","pawa!","paWa!","paRa!","paqi!","patx!","paTe!","pana!","paya!","parda!","parpa!","parba!","parva!","pala!","pelf!","pA","piwa!","piWa!","piqi!","pivi!","pisf!","pIla!","pIva!","puwa!","puqa!","puqi!","puTi!","purva!","pula!","puza!","pUN","pUyI!","purva!","pUla!","pUza!","pfzu!","pelf!","pevf!","pezf!","pesf!","pE","pERf!","o!pyAyI!","pyEN","praTa!","prasa!","pruN","pruzu!","prezf!","prERf!","proTf!","plakza!","pliha!","pluN","pluzu!","plevf!","Pakka!","PaRa!","Pala!","YiPalA!","Pulla!","Pelf!","bahi!","baWa!","baRa!","bawi!","bada!","baDa!","vaBra!","barba!","barha!","bala!","balha!","bAqf","bADf!","bAhf!","biwa!","bidi!","bisa!","bIBf!","bukka!","bugi!","buDa!","buDi!r","u!bundi!r","bfhi!","bfha!","besa!","vehf!","vraRa!","Bakza!","Baja!","Bawa!","Bawa!","BaRa!","Baqi!","Badi!","Barba!","BarBa!","Barva!","Bala!","Balla!","Baza!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","Bidi!","BU","BUza!","BfSi!","BfjI!","Bezf!","Byasa!","BraMSu!","BraMsu!","Brakza!","BraRa!","Bramu!","wuBrAjf!","BrAjf!","wuBrASf!","Brejf!","Brezf!","Blakza!","wuBlASf!","Blezf!","mahi!","maKa!","maki!","maKi!","magi!","maGi!","maGi!","maca!","maci!","maWa!","maRa!","maWi!","maqi!","maqi!","maTe!","manTa!","maTi!","madi!","maBra!","maya!","marba!","marva!","mala!","malla!","mava!","mavya!","maSa!","maza!","maska!","maska!","maha!","mAkzi!","mAna!","mAhf!","miTf!","midf!","miDf!","mivi!","miSa!","mizu!","miha!","mImf!","mIla!","mIva!","muKi!","muja!","muci","muji!","muwa!","muqa!","muWi!","muqi!","muqi!","muda!","murCA!","murvI!","mUN","mUla!","mUza!","mfkza!","mfDu!","mfzu!","meN","meTf!","medf!","meDf!","mepf!","mevf!","mnA","mrakza!","mrada!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mleCa!","mlewf!","mlevf!","mlE","yaja!","yatI!","yaBa!","yama!","wuyAcf!","yugi!","yuCa!","yutf!","yUza!","yezf!","yOwf!","rahi!","rakza!","raKa!","rage!","raKi!","ragi!","raGi!","raYja!","rawa!","rawa!","raWa!","raRa!","raRa!","ravi!","rada!","rapa!","raPa!","raBa!","ramu!","raPi!","rabi!","raBi!","raya!","rasa!","raha!","rAKf!","rAGf!","rAjf!","rAsf!","riKa!","riKi!","rigi!","rivi!","riza!","ruSi!","ruca!","ruwa!","ruWa!","ruwi!","ruWi!","ruWi!","ruqi!","ruza!","ruha!","rUza!","rekf!","rejf!","rewf!","repf!","reBf!","revf!","rezf!","rE","roqf!","rOqf!","laKa!","lage!","laKi!","lagi!","laGi!","laGi!","laCa!","laja!","laji!","lawa!","laqa!","lapa!","qulaBa!z","labi!","labi!","laBi!","laya!","larba!","lala!","laza!","lasa!","lAKf!","lAGf!","lAja!","lACi!","lAji!","liKa!","liKi!","ligi!","luYca!","luwa!","luwa!","luWa!","luWa!","luqa!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lubi!","lUza!","lepf!","lokf!","locf!","loqf!","lozwa!","vakza!","vaKa!","vaki!","vaki!","vaKi!","vagi!","vaGi!","vaja!","vaYcu!","vawa!","vawa!","vaWa!","vaRa!","vawi!","vaWi!","vaqi!","vada!","vana!","vanu!","vana!","vadi!","quvapa!","vaBra!","wuvama!","vaya!","varca!","varza!","varha!","vala","valga!","valBa!","valla!","valha!","vaza!","vaska!","vasa!","vaska!","vaha!","vAkzi!","vACi!","vAqf","bAhf!","viwa!","viTf!","vizu!","visa!","vIja!","vugi!","vfY","vfka!","vfkza!","vftu!","vfDu!","vfzu!","bfha!","veY","veRf!","veTf!","venf!","wuvepf","velf!","vella!","vezwa!","vesa!","vehf!","vella!","o!vE","vyaTa!","vyaya!","vyeY","vraja!","vraja!","vraji!","vraRa!","SaMsu!","Saki!","Saca!","Sawa!","SaWa!","SaRa!","Saqi!","Sadx!","Sapa!","Sarba!","Sarva!","Sala!","Sala!","SalBa!","Sava!","SaSa!","Saza!","Sasu!","SAKf!","SAqf!","SAna!","Sikza!","SiKi!","SiGi!","Siwa!","Siza!","SIkf!","SIBf!","SIla!","Suka!","Suca!","Sucya!","SuWa!","SuWi!","SuWi!","SunDa!","SuBa!","SuBa!","SumBa!","SUla!","SUza!","SfDu!","SfDu!","Self!","Sevf!","SE","SoRf!","SOwf!","Scuti!r","Scyuti!r","SnaTa!","SmIla!","syandU!","cyuN","SyEN","sraMsu!","sraMsu!","Sraki!","Sragi!","SraRa!","SraTa!","SraTi!","SramBu!","SrA","SriY","Srizu!","Sru","SrE","SroRf!","Slaki!","Slagi!","SlaTa!","SlAKf!","SlAGf!","Slizu!","Slokf!","SloRf!","Svaki!","Sragi!","Svaca!","Svaci!","Svala!","Svalla!","wuo!Svi","SvitA!","Svidi!","zwyE","zWivu!","zvaska!","zvaska!","zage!","zaca!","zaca!","zaYja!","zawa!","zadx!","zana!","zapa!","zama!","zarkza!","zarja!","zarba!","zarva!","zala!","zasja!","zaha!","ziwa!","ziDa!","ziDU!","zivi!","ziBu!","zimBu!","sIkf!","zu","zUda!","sUrkza!","zUrkzya!","sUza!","sf","sfpx!","zfBu!","zfmBu!","sekf!","zelf!","zevf!","zE","skandi!r","skaBi!","skudi!","sKada!","sKala!","zwaka!","zwana!","zwama!","zwaBi!","zWala!","zwipf!","zwuca!","zwuBu!","zwfkza!","zwepf!","zwE","styE","zwrakza!","zWage!","zWA","zRE","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuwi!r","sPuwi!","sPuqi!","sPurCA!","wuo!sPUrjA!","zmiN","smIla!","smf","smf","syamu!","sraMsu!","sraki!","sramBu!","sramBu!","sru","srekf!","srE","srokf!","zvaki!","Sragi!","zvaYja!","zvada!","svana!","svana!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","svf","hawa!","haWa!","hada!","hamma!","harya!","haya!","hala!","hase!","hikka!","hiwa!","hiqi!","hivi!","huqf!","huqi!","huqi!","hurCA!","hula!","hula!","hUqf!","hfY","hfzu!","hrasa!","heWa!","heWa!","heqf!","heqa!","hepf!","hezf!","hoqf!","hoqf!","hmala!","hrage!","hrasa!","hrAda!","hrICa!","hrezf!","hlage!","hlasa!","hlAdI!","hvala!","hvf","hvf","hveY");
$divAdi=array("aRa!","ano ruDa!","ana!","asu!","iza!","IN","uca!","fDu!","kASf!","kuN","kuN","kuTa!","kupa!","kuSa!","kusa!","kfSa!","knasu!","kruDa!","klamu!","klidU!","kliSa!","kzamU!","kzipa!","kzuDa!","kzuBa!","YikzvidA!","YikzvidA!","Kida!","guDa!","gupa!","gUra!","gfDu!","GUrI","cUrI!","Co","janI!","jasu!","jUrI!","jF","JFz","qipa!","qIN","tapa!","tamu!","tasu!","tima!","tIma!","tuBa!","tuza!","tUrI!","tfpa!","Yitfza!","trasa!","damu!","dasa!","divu!","dIN","dIpI!","duza!","dUN","dfpa!","do","druha!","DIN","DUrI","RaBa!","RaSa!","Raha!","nftI!","pada!","pIN","puTa!","puza!","puza!","puzpa!","pUrI!","pyuza!","pyusa!","prIY","pluza!","pluza!","basu!","visa!","buDa!","busa!","busa!","byusa!","Basu!","BfY","BfSu!","BraMSu!","Bramu!","mada!","mAna!","masI!","mAN","mida!","mI","musa!","muha!","mfza!","yasu!","yuja!","yuDa!","yupa!","raYja!","raDa!","rADaH","riza!","rIN","rupa!","ruza!","liSa!","lI","luwa!","luWa!","lupa!","luBa!","vasa!","vAvftu!","vASf!","vida!","bisa!","vusa!","vftu!","vfSa!","vyaDa!","vyuza!","vyuza!","vyusa!","vrIN","vrIqa!","Saka!","Sapa!","Sama!","I!Suci!r","SuDa!","Suza!","SUrI!","So","Sramu!","Sliza!","zWivu!","samI!","zaha!","ziDu!","zivu!","zuha!","zUN","sfja!","zo","zwima!","zwIma!","zwupa!","zwUpa!","zRasu!","zRiha!","zRusu!","zRuha!","srivu!","zvidA!","hfza!");
$tudAdi=array("﻿ila!","iza!","uCI!","ujJa!","uCi!","ujJa!","ubja!","uBa!","umBa!","fca!","fCa!","fPa!","fmPa!","fzI!","kaqa!","kila!","kuMsa!","kuca!","kuwa!","kuqa!","kuRa!","kura!","kUN","kfqa!","kftI!","kfza!","kF","kruqa!","kzi","kzipa!","kzura!","Kida!","Kuqa!","Kura!","gu","guja!","guqa!","guPa!","gumPa!","gurI!","gF","Guwa!","GuRa!","Gura!","GUrRa!","carca!","cala!","cila!","cuwa!","cuqa!","cftI!","Cuwa!","Cuqa!","Cupa!","Cura!","jarja!","juwa!","juqa!","juqa!","juna!","juza!","JarJa!","qipa!","tila!","tuwa!","tuqa!","tuRa!","tuda!","tupa!","tuPa!","tumpa!","tumPa!","tfMhU!","tfpa!","tfPa!","tfmpa!","tfmPa!","tfhU!","truwa!","tvaca!","Tuqa!","diSa!","dfhi!","dfpa!","dfPa!","dfBI!","dfmpa!","dfmPa!","druRa!","Di","DU","DUY","DfN","Dru","Rila!","RU","Ruda!","Ruda!","RU","pisi!","piSa!","puwa!","puqa!","puRa!","pura!","pfN","pfqa!","pfRa!","praCa!","bila!","bfhU!","Bujo!","Bfqa!","Brasja!","Brasja!","wumasjo!","wumasjo!","miCa!","mila!","mila!","miza!","muca!","muwa!","muRa!","mura!","mfN","mfqa!","mfRa!","mfSa!","ri","riPa!","riSa!","riha!","ruja!","ruSa!","laja!","o!lasjI!","o!lasjI!","liKa!","lipa!","liSa!","luwa!","luWa!","luqa!","lupx!","luBa!","viCa!","o!vijI!","vida!","viDa!","vila!","viSa!","vfRa!","vfhU!","vyaca!","o!vraScU!","vruqa!","Sadx!","Sila!","Suna!","SuBa!","SumBa!","zadx!","zica!","zila!","zura!","zU","sfja!","stfhU!","sTuqa!","spfSa!","sPara!","sPala!","sPuwa!","sPuqa!","sPura!","sPula!","hila!","huqa!");
$curAdi=array("aMsa!","ahi!","aNka!","aNga!","aYcu!","aYjU!","awwa!","anDa!","ama!","arka!","arca!","arja!","arTa","arda!","arha!","arha!","ANaH kranda!","Apx!","ANaH zada!","ila!","Iqa!","Ira!","kaWi!","uGrasa!","Una!","Urja!","o!laqi!","kaRa!","kaWi!","kaqi!","katra!","katra!","kaTa","karRa!","karta!","kala!","kala!","kAla!","kIwa!","ku","kuSi!","kuwa!","kuwwa!","kuwwa!","kuRa!","kuWi!","kuqi!","kuqi!","kutsa!","kudf!","kudri!","kupa!","kumAra!","kubi!","kuBi!","kusma!","kuha","kUwa!","kUwa!","kURa!","kURa!","kfpa!","kfpeSca","kFta!","keta!","klapa!","kzaji!","kzapa!","kzapi!","kzala!","kzowa!","Kawwa!","Kaqa!","Kaqi!","Kuqi!","Kewa!","Keqa!","Kowa!","gaja!","gaRa","gadI!","ganDa!","garja!","garda!","garDa!","garva","garha!","gala!","gaveza!","guRa!","guWi!","guqi!","gupa!","gurda!","gUrI!","gfha","gF","goma!","granTa!","granTa!","grasa!","grAma!","Gawa!","Gawa!","Gawwa!","Gawi!","Guzi!r","Gf","cakka!","cawa!","caqi!","cana!","capa!","capi!","cara!","carca!","cala!","caha!","caha!","ci","ciY","cita!","citra!","citi!","cIka!","cIva!","cIva!","cukka!","cuwa!","cuwwa!","cuwi!","cuda!","cubi!","cura!","cula!","cUrRa!","cUrRa!","cfpa!","cyu","Caji!","Cada!","Cada!","Cada!","Cadi!","Carda","Cidra!","u!Cfdi!r","Cfpa!","Ceda!","jasi!","jaBi!","jala!","jasu!","jasu!","ji","ci","ci","juqa!","juzI!","jF","jYapa!","jYA","jri","waki!","qapa!","qipa!","qipa!","tasi!","taqa!","taqa!","tanu!","tatri!","tapa!","tarka!","tarja!","tala!","tija!","tila!","tIra!","tuja!","tuji!","tuji!","tuqi!","tutTa!","tubi!","tula!","tURa!","tfpa!","tfpa!","trasi!","trasI!","truwa!","daSi!","daSi!","dasi!","dasi!","daRqa!","dala!","dasu!","divu!","divu!","du","dula!","dfpa!","dfBI!","dfBa!","Dakka!","DUpa!","DUY","DUpa!","DUSa!","DUza!","DUsa!","YiDfzA!","u!Drasa!","Dvana!","nakka!","nawa!","nawa!","Raqa!","nala!","nivAsa!","nizka!","pasi!","pasi!","pakza!","paci!","pawa!","pawa!","paqi!","pata!","paTa!","pada","paTi!","parRa!","pala!","palyUla!","paSa!","paza!","pAra!","pAla!","pi","piCa!","pija!","piji!","piji!","piWi!","piqi!","piSa!","pisa!","pIqa!","puMsa!","puwa!","puwa!","puwwa!","puRa!","puwi!","puTa!","pula!","puza!","pusta!","pUja!","pUrI!","pUrRa!","pUrva!","pUla!","pfcI!","pfTa!","praTa!","prIY","baDa!","banDa!","barha!","barha!","bala!","balha!","bazka!","basta!","bila!","bukka!","busta!","bfhi!","brUsa!","Bakza!","Baja!","BaYjo!","Baqi!","Bartsa!","Bala!","BAja!","BAma!","BU","BU","BUza!","quBfY","BrURa!","mahi!","maqi!","madI!","manu!","matri!","marca!","maha!","mana!","mAna!","mArga!","mArja!","miji!","YimidA!","midi!","miSra!","mIY","mucx!","muwa!","muda!","musta!","mUtra!","mUla!","mfga","mfjU!","mfqi!","mfza!","mokza!","mrakza!","mrakza!","mraCa!","mleCa!","yakza!","yata!","yatri!","yama!","yuY","yuji!r","rahi!","raka!","raga!","raGa!","raNga!","raGi!","raca!","rawa!","rasa!","raha!","raha!","rici!r","ruN","ru","rujo!","ruwa!","ruwa!","ruza!","rUkza!","rUpa!","lakza!","lakza!","laga!","laGi!","laGi!","laja!","o!lajI!","laji!","laji!","laji!","laqa!","laqi!","o!laqi!","lala!","lasa!","lABa!","ligi!","liji!","lI","luji!","luji!","luwa!","luRwa!","luRWa!","lubi!","lUza!","lokf!","locf!","vaca!","vaYcu!","vawa!","vawa!","vawi!","vawi!","vaqi!","vada!","vara","varRa!","varRa!","varDa!","barha!","varha!","valka!","balha!","vasa!","vasu!","vasta!","vAta!","vAsa!","viCa!","vida!","vipa!","vila!","vizka!","vizka!","vIra","vfY","bfhi!","vfjI!","vftu!","vfDu!","vfza!","vela!","vyapa!","vyaya!","vyaya!","vyusa!","vraja!","vraRa!","vrUza!","vrUsa!","SaWa!","SaWa","SaWa!","Sabda!","Samu!","Samba!","SAntva!","Sizx!","SIka!","SIka!","SIla!","SuWa!","SuWi!","SunDa!","Sulka!","Sulba!","SUra","SUrpa!","SfDu!","SraRa!","SraTa!","SraTa!","SraTa!","SranTa!","Sliza!","SvaWa!","SvaWa!","SvaWi!","SvaBra!","Svarta!","Svalka!","saNketa!","saNgrAma!","zawwa!","satra","satra!","saBAja!","zamba!","sAra!","zaha!","zAntva!","sAma!","sAmba!","sAra!","suKa!","zuwwa!","sUca!","sUtra!","zUda!","stana!","zwupa!","zwUpa!","stena!","stoma!","sTUla","zRiha!","spaSa!","spfha!","sPiwa!","sPiwwa!","sPuwa!","sPuwi!","sPuqi!","zmiN","smiwa!","syama!","zvada!","svara!","svarta!","svAda!","hasta!","hisi!","hizka!","hrapa!","hlapa!");
$adAdi=array("ada!","iN","ik","ana!","asa!","ANaH SAsu!","Asa!","iN","iR","ik","Iqa!","Ira!","ISa!","UrRuY","kasi!","kaSa!","kasa!","kusi!","wukzu","kzRu","KyA","cakAsf!","cakzi!N","jakza!","jAgf","tu","daridrA","dAp","diha!","dIDIN","duha!","dyu","drA","dviza!","Risi!","Riji!","Ru","pA","piji!","pfca!","pfji!","prA","psA","brUY","BA","mA","mfjU!","yA","yu","rA","rusi!","rudi!r","lA","liha!","vaca!","vaSa!","vasa!","vA","vida!","vI","vfjI!","vfji!","vevIN","SAsu!","Siji!","SIN","SrA","Svasa!","zasti!","zasa!","zu","zUN","zwuY","zRA","zRu","Yizvapa!","hana!","hnuN");
$juhotyAdi=array("f","ki","kita!","gA","Gf","jana!","tura!","qudAY","Dana!","quDAY","Diza!","Riji!r","pf","pF","Basa!","YiBI","BfMSu!","mAN","viji!r","vizx!","sf","o!hAN","o!hAk","hu","hf","hrI");
$svAdi=array("aSU!","aha!","Apx!","f","fDu!","kfY","kzi","kzI","camu!","ciY","ciri","jiri","tika!","tiga!","tfpa!","daGa!","damBu!","dASa!","duHKa!","dF","DuY","DUY","Dfza!","pf","qumiY","rADa!","ri","vfN","Sakx!","SiY","zaGa!","sADa!","ziY","zuY","zwiGa!","stfY","spf","smf","hisi!");
$rudhAdi=array("aji!","YiinDI!","undI!","kftI!","kzudi!r","Kida!","Cidi!r","CfdI!","taYcU!","u!tfdi!r","tfha!","pizx!","pfcI!","Baji!","Bidi!r","Buja!","yuja!","rica!","ruDi!r","vici!r","o!vijI!","vidx!","vfjI!","Siza!","hi");
$tanAdi=array("fRu!","qukfY","kzaRu!","kziRu!","GfRu!","tanu!","tfRu!","mana!","vanu!","zanu!");
$kryAdi=array("aSa!","iza!","F","kunTa!","kuza!","kFY","kF","knUY","qukrIY","kliSU!","kzIz","kzuBa!","Kaca!","Kava!","guDa!","gF","granTa!","graha!","jFz","jYA","jyA","JF","tuBa!","dF","drUY","DU","DF","u!Drasa!","RaBa!","nF","puza!","pUY","pF","prIN","pruza!","plI","pluza!","banDa!","blI","BF","BrI","manTa!","mIN","muza!","mUY","mfqa!","mfda!","mF","yu","rI","lIN","lUY","viza!","bfhi!","vFY","vF","vrI","vlI","SF","SranTa!","SranTa!","SrIY","ziY","skamBu!","skuY","skumBu!","stamBu!","stumBu!","stFY","heWa!","heQa!");
$allverbs=array("aMsa!","ahi!","ahi!","aka!","akzU!","aga!","aNka!","aki!","aNga!","agi!","aGi!","acu!","aja!","aci!","aYcu!","aYcu!","aYcu!","aji!","aYjU!","awa!","awwa!","awwa!","aqa!","aqqa!","aRa!","aRa!","aWi!","ata!","ada!","aqqa!","iN","ik","ano ruDa!","ana!","ana!","ati!","adi!","anDa!","aBra!","ama!","ama!","abi!","aBi!","aya!","aya!","arka!","arGa!","arca!","arca!","arja!","arja!","arTa","arda!","arda!","arba!","arva!","arha!","arha!","arha!","ala!","ava!","aSa!","aSU!","aza!","asu!","asa!","asa!","aha!","ANaH kranda!","ACi!","Apx!","Apx!","ANaH Sasi","ANaH SAsu!","ANaH zada!","Asa!","iN","iR","ik","iKa!","iKi!","igi!","iwa!","idi!","YiinDI!","ivi!","ila!","ila!","iza!","iza!","iza!","IN","Ikza!","IKi!","IKi!","Ija","Iji!","Iqa!","Iqa!","Ira!","Ira!","Irkzya!","Irzya!","ISa!","Iza!","Iza!","Iha!","uN","ukza!","uKa!","uKi!","uca!","uCI!","uCI!","ujJa!","uCi!","uCi!","uWa!","uWa!","kaWi!","ujJa!","uGrasa!","undI!","ubja!","uBa!","umBa!","urda!","urvI!","uza!","uhi!r","UWa!","Una!","UyI!","Urja!","UrRuY","Uza!","Uha!","f","f","f","fca!","fCa!","fja!","fji!","fRu!","fDu!","fDu!","fPa!","fmPa!","fzI!","F","ejf!","ejf!","eWa!","eDa!","ezf!","ezf!","oKf!","oRf!","o!laqi!","kasi!","kaka!","kaKa!","kaKe!","kage!","kaki!","kaca!","kaja!","kaci!","kawI!","kawe!","kaWa!","kaqa!","kaqa!","kaqqa!","kaRa!","kaRa!","kaRa!","kaWi!","kaWi!","kaqi!","kaqi!","kaqi!","katra!","katTa!","katra!","kaTa","kada!","kaqqa!","kanI!","kadi!","kadi!","kapa!","kabf!","kamu!","kapi!","karja!","karRa!","karta!","karda!","karba!","karva!","kala!","kala!","kala!","kalla!","kaSa!","kaza!","kasa!","kasa!","kAkzi!","kAci!","kAla!","kASf!","kASf!","kAsf!","ki","kiwa!","kiwa!","kita!","kita!","kila!","kIwa!","kIla!","kuN","ku","kuN","kuSi!","kuMSa!","kusi!","kuMsa!","kuka!","kuca!","kuca!","kuca!","kuju!","kuYca!","kuji!","kuwa!","kuwa!","kuwwa!","kuwwa!","kuqa!","kuRa!","kuRa!","kuwi!","kuWi!","kuWi!","kuqi!","kuqi!","kuqi!","kuqi!","kutsa!","kuTa!","kudf!","kuTi!","kunTa!","kudri!","kupa!","kupa!","kumAra!","kubi!","kubi!","kuBi!","kura!","kurda","kula!","kuSa!","kuza!","kusa!","kusma!","kuha","kUN","kUja!","kUwa!","kUwa!","kURa!","kURa!","kUla!","qukfY","kfY","kfY","kfqa!","kfvi!","kftI!","kftI!","kfpa!","kfpeSca","kfpa!","kfpU!","kfSa!","kfza!","kfza!","kF","kFY","kF","kFta!","kfpU!","keta!","kepf!","kelf!","kevf!","kE","knaTa!","knasu!","knUY","knUyI!","kmara!","kraTa!","krada!","kradi!","kradi!","krapa!","kramu!","qukrIY","krIqf!","kruYca!","kruqa!","kruDa!","kruSa!","klaTa!","klada!","kladi!","kladi!","klapa!","klamu!","klidU!","klidi!","klidi!","kliSa!","kliSU!","klIbf!","kluN","kleSa!","kvaRa!","kvaTe!","kzaji!","kzaji!","kzaRu!","kzapa!","kzapayaSca","kzamU!","kzamU!z","kzapi!","kzara!","kzala!","kzi","kzi","kzi","kziRu!","kzipa!","kzipa!","kzivu!","kzI","kzIja!","kzIbf!","kzIvf!","kzIz","wukzu","kzudi!r","kzuDa!","kzuBa!","kzuBa!","kzuBa!","kzura!","kzura!","kzevu!","kzE","kzowa!","kzRu","kzmAyI!","kzmIla!","YikzvidA!","YikzvidA!","YikzvidA!","kzvelf!","Kaca!","Kaja!","Kaji!","Kawa!","Kawwa!","Kaqa!","Kaqi!","Kaqi!","Kada!","Kanu!","Karja!","Karda!","Karba!","Karva!","Kala!","Kava!","Kaza!","KAdf!","Kiwa!","Kida!","Kida!","Kida!","KuN","Kuju!","Kuqa!","Kuqi!","Kura!","Kurda","Kewa!","Keqa!","Kelf!","Kevf!","KE","Kowa!","Korf!","Kolf!","KyA","gaja!","gaja!","gaji!","gaqa!","gaRa","gaqi!","gaqi!","gadI!","gada!","ganDa!","gamx!","garja!","garja!","garda!","garda!","garDa!","garba!","garva","garva!","garha!","garha!","gala!","gala!","galBa!","galha!","gaveza!","gAN","gA","gADf!","gAhU!","guN","guN","gu","guja!","guja!","guji!","guqa!","guRa!","guWi!","guqi!","guda!","guDa!","guDa!","gupa!","gupa!","gupU!","gupa!","guPa!","gumPa!","gurI!","gurda","gurda!","gurvI!","guhU!","gUra!","gUrI!","gfhU!","gf","gfja!","gfji!","gfDu!","gfha","gF","gF","gF","gepf!","gevf!","gezf!","gE","goma!","gozwa!","graTi!","granTa!","granTa!","granTa!","grasu!","grasa!","graha!","grAma!","grucu!","glasu!","glaha!","glucu!","gluYca!","glepf!","glepf!","glevf!","glezf!","glE","GagGa!","GaGa!","Gawa!","Gawa!","Gawa!","Gawwa!","Gawwa!","Gawi!","Gaza!","Gasx!","GiRi!","GuN","Guzi!","Guwa!","Guwa!","GuRa!","GuRa!","GuRi!","Gura!","Guzi!r","Guzi!r","GUrI","GUrRa!","GUrRa!","Gf","Gf","Gf","GfRu!","GfRi!","Gfzu!","GrA","DrAGf!","NuN","cakAsf!","caka!","caka!","cakka!","cakzi!N","caYcu!","cawa!","cawe!","caRa!","caqi!","caqi!","cate!","cade!","cana!","cana!","cadi!","capa!","capa!","camu!","camu!","capi!","caya!","cara!","cara!","carca!","carca!","carca!","carba!","carva!","cala!","cala!","cala!","caza!","caha!","caha!","caha!","cAyf!","ci","ciY","ciY","ciwa!","cita!","citI!","citra!","citi!","ciri","cila!","cilla!","cIka!","cIva!","cIbf!","cIBf!","cIva!","cIvf!","cukka!","cucya!","cuwa!","cuwa!","cuwwa!","cuqa!","cuqqa!","cuwi!","cuqi!","cuda!","cuqqa!","cupa!","cubi!","cubi!","cura!","cula!","culla!","cUrI!","cUrRa!","cUrRa!","cUza!","cftI!","cfpa!","celf!","cezwa!","cyu","cyuti!r","Caji!","Cada!","Cada!","Cada!","Cadi!","Camu!","Carda","Caza!","Cidi!r","Cidra!","Cuwa!","Cuqa!","Cupa!","Cura!","u!Cfdi!r","CfdI!","Cfpa!","Ceda!","Co","jasi!","jakza!","jaja!","jaji!","jawa!","jana!","janI!","japa!","jaBI!","jamu!","jaBi!","jartsa!","jartsa!","jarja!","jartsa!","jala!","jala!","jalpa!","jaza!","jasu!","jasu!","jasu!","jAgf","ji","ji","ji!","ci","jivi!","jimu!","jiri","jizu!","jIva!","juN","ju","jugi!","ci","juwa!","juqa!","juqa!","juqa!","jutf!","juna!","juza!","juzI!","jUrI!","jUza!","jfBi!","jFz","jF","jF","jezf!","jehf!","jE","jYapa!","jYA","jYA","jyA","jyuN","jyuti!r","jri","jri","jvara!","jvala!","jvala!","Jawa!","Jamu!","Jartsa!","Jartsa!","JarJa!","Jartsa!","Jaza!","Jaza!","JF","JFz","waki!","wala!","wikf!","wIkf!","wvala!","qapa!","qipa!","qipa!","qipa!","qipa!","qIN","qIN","QOkf!","tasi!","tasi!","taka!","takzU!","takza!","taki!","tagi!","taYcu!","taYcU!","tawa!","taqa!","taqa!","taqi!","tanu!","tanu!","tatri!","tapa!","tapa!","tapa!","tamu!","taya!","tarka!","tarja!","tarja!","tarda!","tala!","tasu!","tAyf!","tika!","tikf!","tiga!","tija!","tija!","tipf!","tima!","tila!","tila!","tila!","tilla!","tIkf!","tIma!","tIra!","tIva!","tu","tuja!","tuja!","tuji!","tuji!","tuji!","tuwa!","tuqa!","tuqf!","tuRa!","tuqi!","tuqi!","tutTa!","tuda!","tupa!","tupa!","tuPa!","tuPa!","tuBa!","tuBa!","tuBa!","tumpa!","tumpa!","tumPa!","tumPa!","tubi!","tubi!","tura!","turvI","tula!","tuza!","tusa!","tuhi!r","tUqf!","tURa!","tUrI!","tUla!","tUza!","tfMhU!","tfkza!","tfRu!","u!tfdi!r","tfpa!","tfpa!","tfpa!","tfpa!","tfpa!","tfPa!","tfmpa!","tfmPa!","Yitfza!","tfhU!","tfha!","tF","teja!","tepf!","tevf!","tyaja!","trasi!","trakza!","traKa!","traki!","tragi!","tradi!","trapU!z","trasI!","trasa!","triKi!","truwa!","truwa!","trupa!","truPa!","trumpa!","trumPa!","trEN","trOkf!","tvakzU!","tvagi!","tvaca!","tvaYcu!","YitvarA!","tviza!","tsara!","Taki!","Tuqa!","TurvI","daSi!","daSi!","daMSa!","dasi!","dasi!","dakza!","dakza!","daGa!","daGi!","daRqa!","dada!","daDa!","damu!","damBu!","daya!","daridrA","dala!","dala!","dASa!","dasa!","dasu!","daha!","qudAY","dAR","dAp","dAna!","dASf!","dAsf!","divi!","divu!","divu!","divu!","diSa!","diha!","dIN","dIkza!","dIDIN","dIpI!","du","wudu","duHKa!","durvI!","dula!","duza!","duhi!r","duha!","dUN","dfN","dfhi!","dfpa!","dfpa!","dfpa!","dfPa!","dfBI!","dfBI!","dfBa!","dfmpa!","dfmPa!","dfha!","dF","dF","dF","deN","devf!","dEp","dfSi!r","do","dyu","dyuta!","dyE","drama!","drA","drAKf!","drAGf!","drAkzi!","drAqf!","drAhf!","dru","druRa!","druha!","drUY","drekf!","drE","dviza!","dvf","Dakka!","DaRa!","Dana!","Davi!","quDAY","DAvu!","Di","Dikza!","Divi!","Diza!","DIN","DU","DuY","Dukza!","DUpa!","DurvI!","DU","DUY","DUY","DUY","DUpa!","DUpa!","DUrI","DUSa!","DUza!","DUsa!","DfN","DfN","DfY","Dfja!","Dfji!","Dfza!","YiDfzA!","DF","Dew","Depf!","Dorf!","DmA","DmAkzi!","DyE","Draja!","Draji!","DraRa!","u!Drasa!","u!Drasa!","DrAKf!","DrAkzi!","DrAqf!","Drija!","Dru","Dru","Drekf!","DrE","DvaMsu!","Dvaja!","Dvaji!","DvaRa!","Dvana!","Dvana!","Dvana!","DvAkzi!","Dvf","nakka!","Rakza!","RaKa!","RaKi!","Rawa!","nawa!","nawa!","Rawa!","Raqa!","Rada!","wunadi!","RaBa!","RaBa!","RaBa!","Rama!","Raya!","narda!","nala!","Rala!","RaSa!","Rasa!","Raha!","nATf!","nADf!","RAsf!","Risi!","Rikza!","Riji!r","Riji!","Ridf!","Ridi!","Rivi!","Rila!","nivAsa!","RiSa!","Rizu!","nizka!","RIY","RIla!","RIva!","RU","Ru","Ruda!","Ruda!","RU","nftI!","nF","nF","Redf!","Rezf!","pasi!","pasi!","pakza!","pakza!","qupaca!z","paci!","paci!","pawa!","pawa!","pawa!","paWa!","paRa!","paqi!","paqi!","pata!","patx!","paTa!","paTe!","pada","pada!","pana!","paTi!","paya!","parRa!","parda!","parpa!","parba!","parva!","pala!","pala!","palyUla!","pelf!","paSa!","paza!","pA","pA","pAra!","pAla!","pi","pisi!","piCa!","pija!","piji!","piji!","piji!","piwa!","piWa!","piWi!","piqi!","piqi!","pivi!","piSa!","piSa!","pizx!","pisf!","pisa!","pIN","pIqa!","pIla!","pIva!","puMsa!","puwa!","puwa!","puwa!","puwa!","puwwa!","puqa!","puqa!","puRa!","puRa!","puwi!","puqi!","puTa!","puTa!","puTi!","pura!","purva!","pula!","pula!","puza!","puza!","puza!","puza!","puza!","puzpa!","pusta!","pUY","pUN","pUja!","pUyI!","pUrI!","pUrI!","pUrRa!","purva!","pUrva!","pUla!","pUla!","pUza!","pf","pf","pfN","pfca!","pfcI!","pfcI!","pfji!","pfqa!","pfRa!","pfTa!","pfzu!","pF","pF","pF","pelf!","pevf!","pezf!","pesf!","pE","pERf!","o!pyAyI!","pyuza!","pyusa!","pyEN","praCa!","praTa!","praTa!","prasa!","prA","prIY","prIY","prIN","pruN","pruzu!","pruza!","prezf!","prERf!","proTf!","plakza!","pliha!","plI","pluN","pluza!","pluza!","pluzu!","pluza!","plevf!","psA","Pakka!","PaRa!","Pala!","YiPalA!","Pulla!","Pelf!","bahi!","baWa!","baRa!","bawi!","bada!","baDa!","baDa!","banDa!","banDa!","vaBra!","barba!","barha!","barha!","barha!","bala!","bala!","balha!","balha!","bazka!","basu!","basta!","bAqf","bADf!","bAhf!","biwa!","bidi!","bila!","bila!","bisa!","visa!","bIBf!","bukka!","bukka!","bugi!","buDa!","buDa!","buDi!r","u!bundi!r","busa!","busa!","busta!","bfhi!","bfhi!","bfha!","bfhU!","besa!","vehf!","byusa!","vraRa!","brUY","brUsa!","blI","Bakza!","Bakza!","Baja!","Baja!","Baji!","BaYjo!","Bawa!","Bawa!","BaRa!","Baqi!","Baqi!","Badi!","Bartsa!","Barba!","BarBa!","Barva!","Bala!","Bala!","Balla!","Baza!","Basu!","Basa!","BA","BAja!","BAma!","BAma!","BAza!","BAsf!","Bikza!","Bidi!r","YimidA!","Bidi!","YiBI","Bujo!","Buja!","BU","BU","BU","BUza!","BUza!","quBfY","BfY","BfSi!","BfMSu!","BfjI!","Bfqa!","BfSu!","BF","Bezf!","Byasa!","BraMSu!","BraMSu!","BraMsu!","Brakza!","Brasja!","BraRa!","Bramu!","Bramu!","Brasja!","wuBrAjf!","BrAjf!","wuBrASf!","BrI","BrURa!","Brejf!","Brezf!","Blakza!","wuBlASf!","Blezf!","mahi!","mahi!","maKa!","maki!","maKi!","magi!","maGi!","maGi!","maca!","wumasjo!","maci!","maWa!","maRa!","maWi!","maqi!","maqi!","maqi!","maTe!","mada!","madI!","manu!","mana!","mAna!","matri!","manTa!","manTa!","maTi!","madi!","maBra!","maya!","marca!","marba!","marva!","mala!","malla!","mava!","mavya!","maSa!","maza!","maska!","masI!","maska!","wumasjo!","maha!","maha!","mAN","mA","mAN","mAkzi!","mana!","mAna!","mAna!","mArga!","mArja!","mAhf!","qumiY","miCa!","miji!","miTf!","midf!","mida!","YimidA!","miDf!","midi!","mivi!","mila!","mila!","miSa!","miSra!","mizu!","miza!","miha!","mI","mIN","mIY","mImf!","mIla!","mIva!","muKi!","muca!","mucx!","muja!","muci","muji!","muwa!","muwa!","muwa!","muqa!","muRa!","muWi!","muqi!","muqi!","muda!","muda!","mura!","murCA!","murvI!","muza!","musa!","musta!","muha!","mUY","mUN","mUtra!","mUla!","mUla!","mUza!","mfN","mfkza!","mfga","mfjU!","mfjU!","mfqa!","mfqa!","mfRa!","mfqi!","mfda!","mfDu!","mfSa!","mfza!","mfza!","mfzu!","mF","meN","meTf!","medf!","meDf!","mepf!","mevf!","mokza!","mnA","mrakza!","mrakza!","mrakza!","mraCa!","mrada!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mleCa!","mleCa!","mlewf!","mlevf!","mlE","yakza!","yaja!","yata!","yatI!","yatri!","yaBa!","yama!","yama!","yasu!","yA","wuyAcf!","yu","yuY","yu","yugi!","yuCa!","yuja!","yuji!r","yuja!","yutf!","yuDa!","yupa!","yUza!","yezf!","yOwf!","rahi!","rahi!","raka!","rakza!","raKa!","raga!","rage!","raGa!","raKi!","raNga!","ragi!","raGi!","raGi!","raca!","raYja!","raYja!","rawa!","rawa!","rawa!","raWa!","raRa!","raRa!","ravi!","rada!","raDa!","rapa!","raPa!","raBa!","ramu!","raPi!","rabi!","raBi!","raya!","rasa!","rasa!","raha!","raha!","raha!","rA","rAKf!","rAGf!","rAjf!","rADa!","rADaH","rAsf!","ri","ri","riKa!","riKi!","rigi!","rica!","rici!r","rivi!","riPa!","riSa!","riza!","riza!","riha!","rI","rIN","ruN","ru","ruSi!","rusi!","ruca!","rujo!","ruja!","ruwa!","ruwa!","ruwa!","ruWa!","ruwi!","ruWi!","ruWi!","ruqi!","rudi!r","ruDi!r","rupa!","ruSa!","ruza!","ruza!","ruza!","ruha!","rUkza!","rUpa!","rUza!","rekf!","rejf!","rewf!","repf!","reBf!","revf!","rezf!","rE","roqf!","rOqf!","lakza!","lakza!","laKa!","laga!","lage!","laKi!","lagi!","laGi!","laGi!","laGi!","laGi!","laCa!","laja!","laja!","laja!","o!lajI!","o!lasjI!","laji!","laji!","laji!","laji!","lawa!","laqa!","laqa!","laqi!","o!laqi!","lapa!","qulaBa!z","labi!","labi!","laBi!","laya!","larba!","lala!","lala!","laza!","lasa!","lasa!","o!lasjI!","lA","lAKf!","lAGf!","lAja!","lACi!","lAji!","lABa!","liKa!","liKa!","liKi!","ligi!","ligi!","liji!","lipa!","liSa!","liSa!","liha!","lI","lIN","lI","luYca!","luji!","luji!","luwa!","luwa!","luwa!","luwa!","luwa!","luWa!","luWa!","luWa!","luWa!","luqa!","luqa!","luRwa!","luwi!","luRWa!","luWi!","luWi!","luWi!","luqi!","luTi!","lupx!","lupa!","luBa!","luBa!","lubi!","lubi!","lUY","lUza!","lUza!","lepf!","lokf!","lokf!","locf!","locf!","loqf!","lozwa!","vakza!","vaKa!","vaki!","vaki!","vaKi!","vagi!","vaGi!","vaca!","vaca!","vaja!","vaYcu!","vaYcu!","vawa!","vawa!","vawa!","vawa!","vaWa!","vaRa!","vawi!","vawi!","vawi!","vaWi!","vaqi!","vaqi!","vada!","vada!","vana!","vanu!","vanu!","vana!","vadi!","quvapa!","vaBra!","wuvama!","vaya!","vara","varca!","varRa!","varRa!","varDa!","varza!","barha!","varha!","varha!","vala","valka!","valga!","valBa!","valla!","balha!","valha!","vaSa!","vaza!","vaska!","vasa!","vasa!","vasa!","vasu!","vasa!","vaska!","vasta!","vaha!","vA","vAkzi!","vACi!","vAqf","vAta!","vAvftu!","vASf!","vAsa!","bAhf!","vici!r","viCa!","viCa!","viji!r","o!vijI!","o!vijI!","viwa!","viTf!","vida!","vida!","vidx!","vida!","vida!","viDa!","vipa!","vila!","vila!","viSa!","vizu!","viza!","vizx!","vizka!","vizka!","visa!","bisa!","vI","vIja!","vIra","vugi!","vusa!","vfY","vfY","vfN","bfhi!","bfhi!","vfka!","vfkza!","vfjI!","vfjI!","vfjI!","vfji!","vfRa!","vftu!","vftu!","vftu!","vfDu!","vfDu!","vfSa!","vfzu!","vfza!","bfha!","vfhU!","vFY","vF","veY","veRf!","veTf!","venf!","wuvepf","vela!","velf!","vella!","vevIN","vezwa!","vesa!","vehf!","vella!","o!vE","vyaca!","vyaTa!","vyaDa!","vyapa!","vyaya!","vyaya!","vyaya!","vyuza!","vyuza!","vyusa!","vyusa!","vyeY","vraja!","vraja!","vraja!","vraji!","vraRa!","vraRa!","o!vraScU!","vrI","vrIN","vrIqa!","vruqa!","vrUza!","vrUsa!","vlI","SaMsu!","Saka!","Sakx!","Saki!","Saca!","Sawa!","SaWa!","SaWa","SaWa!","SaWa!","SaRa!","Saqi!","Sadx!","Sadx!","Sapa!","Sapa!","Sabda!","Sama!","Samu!","Samba!","Sarba!","Sarva!","Sala!","Sala!","SalBa!","Sava!","SaSa!","Saza!","Sasu!","SAKf!","SAqf!","SAna!","SAntva!","SAsu!","SiY","Sikza!","SiKi!","SiGi!","Siji!","Siwa!","Sila!","Siza!","Siza!","Sizx!","SIN","SIka!","SIka!","SIkf!","SIBf!","SIla!","SIla!","Suka!","I!Suci!r","Suca!","Sucya!","SuWa!","SuWa!","SuWi!","SuWi!","SuWi!","SuDa!","Suna!","SunDa!","SunDa!","SuBa!","SuBa!","SuBa!","SumBa!","SumBa!","Sulka!","Sulba!","Suza!","SUra","SUrI!","SUrpa!","SUla!","SUza!","SfDu!","SfDu!","SfDu!","SF","Self!","Sevf!","SE","So","SoRf!","SOwf!","Scuti!r","Scyuti!r","SnaTa!","SmIla!","syandU!","cyuN","SyEN","sraMsu!","sraMsu!","Sraki!","Sragi!","SraRa!","SraRa!","SraTa!","SraTa!","SraTa!","SraTa!","SranTa!","SranTa!","SranTa!","SraTi!","Sramu!","SramBu!","SrA","SrA","SriY","Srizu!","SrIY","Sru","SrE","SroRf!","Slaki!","Slagi!","SlaTa!","SlAKf!","SlAGf!","Slizu!","Sliza!","Sliza!","Slokf!","SloRf!","Svaki!","Sragi!","Svaca!","Svaci!","SvaWa!","SvaWa!","SvaWi!","SvaBra!","Svarta!","Svala!","Svalka!","Svalla!","Svasa!","wuo!Svi","SvitA!","Svidi!","zwyE","zWivu!","zWivu!","zvaska!","zvaska!","zasti!","zage!","saNketa!","saNgrAma!","zaca!","zaca!","zaYja!","zawa!","zawwa!","satra","satra!","zadx!","zadx!","zaGa!","zanu!","zana!","zapa!","saBAja!","zama!","samI!","zamba!","sAra!","zarkza!","zarja!","zarba!","zarva!","zala!","zasa!","zasja!","zaha!","zaha!","zaha!","sADa!","zAntva!","sAma!","sAmba!","sAra!","ziY","ziY","zica!","ziwa!","ziDa!","ziDU!","ziDu!","zivi!","ziBu!","zimBu!","zila!","zivu!","sIkf!","zuY","zu","zu","suKa!","zuwwa!","zura!","zuha!","zUN","zUN","zU","sUca!","sUtra!","zUda!","zUda!","sUrkza!","zUrkzya!","sUza!","sf","sf","sfja!","sfja!","sfpx!","zfBu!","zfmBu!","sekf!","zelf!","zevf!","zE","zo","skandi!r","skamBu!","skaBi!","skuY","skudi!","skumBu!","sKada!","sKala!","zwaka!","stana!","zwana!","zwama!","zwaBi!","stamBu!","zWala!","zwiGa!","zwipf!","zwima!","zwIma!","zwuY","zwuca!","zwupa!","zwupa!","zwuBu!","stumBu!","zwUpa!","zwUpa!","stfY","zwfkza!","stfhU!","stFY","stena!","zwepf!","zwE","stoma!","styE","zwrakza!","zWage!","zWA","sTuqa!","sTUla","zRasu!","zRA","zRiha!","zRiha!","zRu","zRusu!","zRuha!","zRE","spadi!","sparDa!","spaSa!","spaSa!","spf","spfSa!","spfha!","sPara!","sPala!","sPAyI!","sPiwa!","sPiwwa!","sPuwa!","sPuwa!","sPuwa!","sPuwi!r","sPuqa!","sPuwi!","sPuwi!","sPuqi!","sPuqi!","sPura!","sPurCA!","sPula!","wuo!sPUrjA!","zmiN","zmiN","smiwa!","smIla!","smf","smf","smf","syamu!","syama!","sraMsu!","sraki!","sramBu!","sramBu!","srivu!","sru","srekf!","srE","srokf!","zvaki!","Sragi!","zvaYja!","zvada!","zvada!","svana!","svana!","Yizvapa!","svara!","svarta!","svarda!","zvaska!","zvaska!","svAda!","svAda!","zvidA!","YizvidA!","svf","hawa!","haWa!","hada!","hana!","hamma!","harya!","haya!","hala!","hase!","hasta!","o!hAN","o!hAk","hi","hisi!","hisi!","hikka!","hiwa!","hiqi!","hivi!","hila!","hizka!","hu","huqf!","huqa!","huqi!","huqi!","hurCA!","hula!","hula!","hUqf!","hf","hfY","hfzu!","hfza!","hrasa!","heWa!","heWa!","heWa!","heqf!","heqa!","heQa!","hepf!","hezf!","hoqf!","hoqf!","hnuN","hmala!","hrage!","hrapa!","hrasa!","hrAda!","hrI","hrICa!","hrezf!","hlage!","hlapa!","hlasa!","hlAdI!","hvala!","hvf","hvf","hveY");
$pvAdi=array("pUY","lUY","stFY","kFY","vFY","DUY","SF","pF","vF","BF","mF","dF","jF","nF","kF","F","gF","jyA","rI","lI","blI","plI");
$lvAdi=array("lUY","stFY","kFY","vFY","DUY","SF","pF","vF","BF","mF","dF","jF","nF","kF","F","gF","jyA","rI","lI","blI","plI");
$ghuset=array("qudAY","dAR","do","deN","quDAY","Dew");
$aniditverbs=array("skandi!r","sraMsu!","DvaMsu!","BraMsu!","BraMSu!","sraMBu!","sramBu!","maTi!","graTi!","granTa!","SranTa!","SraTi!","kuTi!","kunTa!","SunDa!","kuYca!","kruYca!","luYca!","mfYcu!","mluYcu!","gluYca!","vaYcu!","caYcu!","tvaYcu!","taYcu!","taYcU!","SramBu!","damBu!","zfmBu!","hamma!","SaMsu!","kuMsa!","kusi!","raYja!","syandU!","Baji!","banDa!","aYcu!","aYjU!","undI!","YiinDI!","trumpa!","trumPa!","tfmPa!","tumPa!","dfmPa!","fmPa!","gumPa!","umBa!","SumBa!","tumpa!","tfMhU!","bundi!r","zaYja!","zvaYja!","daMSa!");
//$aniditverbs=array("skand","sraMs","DvaMs","BraMs","BraMS","sraMB","sramB","manT","granT","SranT","kunT","SunD","kuYc","kruYc","luYc","mfYc","mluYc","gluYc","vaYc","caYc","tvaYc","taYc","SramB","damB","zfmB","hamm","SaMs","kuMs","raYj","syand","BaYj","banD","aYc","aYj","und","inD!","trump","trumP","tfmP","tumP","dfmP","fmP","gumP","umB","SumB","tump","tfMh","tfnh","bund","zaYj","zvaYj","daMS");
$iditverbs=array("ahi!","ahi!","aki!","agi!","aGi!","aci!","aji!","aWi!","ati!","adi!","abi!","aBi!","ACi!","iKi!","igi!","idi!","ivi!","IKi!","IKi!","Iji!","uKi!","uCi!","uCi!","kaWi!","uhi!r","fji!","o!laqi!","kasi!","kaki!","kaci!","kaWi!","kaWi!","kaqi!","kaqi!","kaqi!","kadi!","kadi!","kapi!","kAkzi!","kAci!","kuSi!","kusi!","kuji!","kuwi!","kuWi!","kuWi!","kuqi!","kuqi!","kuqi!","kuqi!","kuTi!","kudri!","kubi!","kubi!","kuBi!","kfvi!","kradi!","kradi!","kladi!","kladi!","klidi!","klidi!","kzaji!","kzaji!","kzapi!","kzudi!r","Kaji!","Kaqi!","Kaqi!","Kuqi!","gaji!","gaqi!","gaqi!","guji!","guWi!","guqi!","gfji!","graTi!","Gawi!","GiRi!","Guzi!","GuRi!","Guzi!r","Guzi!r","GfRi!","cakzi!N","caqi!","caqi!","cadi!","capi!","citi!","cuwi!","cuqi!","cubi!","cubi!","cyuti!r","Caji!","Cadi!","Cidi!r","u!Cfdi!r","jasi!","jaji!","jaBi!","ji!","jivi!","jugi!","jfBi!","jyuti!r","waki!","tasi!","tasi!","taki!","tagi!","taqi!","tatri!","tuji!","tuji!","tuji!","tuqi!","tuqi!","tubi!","tubi!","tuhi!r","u!tfdi!r","trasi!","traki!","tragi!","tradi!","triKi!","tvagi!","Taki!","daSi!","daSi!","dasi!","dasi!","daGi!","divi!","duhi!r","dfhi!","dfSi!r","drAkzi!","Davi!","Divi!","Dfji!","DmAkzi!","Draji!","DrAkzi!","Dvaji!","DvAkzi!","RaKi!","wunadi!","Risi!","Riji!r","Riji!","Ridi!","Rivi!","pasi!","pasi!","paci!","paci!","paqi!","paqi!","paTi!","pisi!","piji!","piji!","piji!","piWi!","piqi!","piqi!","pivi!","puwi!","puqi!","puTi!","pfji!","bahi!","bawi!","bidi!","bugi!","buDi!r","u!bundi!r","bfhi!","bfhi!","Baji!","Baqi!","Baqi!","Badi!","Bidi!r","Bidi!","BfSi!","mahi!","mahi!","maki!","maKi!","magi!","maGi!","maGi!","maci!","maWi!","maqi!","maqi!","maqi!","matri!","maTi!","madi!","mAkzi!","miji!","midi!","mivi!","muKi!","muji!","muWi!","muqi!","muqi!","mfqi!","yatri!","yugi!","yuji!r","rahi!","rahi!","raKi!","ragi!","raGi!","raGi!","ravi!","raPi!","rabi!","raBi!","riKi!","rigi!","rici!r","rivi!","ruSi!","rusi!","ruwi!","ruWi!","ruWi!","ruqi!","rudi!r","ruDi!r","laKi!","lagi!","laGi!","laGi!","laGi!","laGi!","laji!","laji!","laji!","laji!","laqi!","o!laqi!","labi!","labi!","laBi!","lACi!","lAji!","liKi!","ligi!","ligi!","liji!","luji!","luji!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lubi!","lubi!","vaki!","vaki!","vaKi!","vagi!","vaGi!","vawi!","vawi!","vawi!","vaWi!","vaqi!","vaqi!","vadi!","vAkzi!","vACi!","vici!r","viji!r","vugi!","bfhi!","bfhi!","vfji!","vraji!","Saki!","Saqi!","SiKi!","SiGi!","Siji!","I!Suci!r","SuWi!","SuWi!","SuWi!","Scuti!r","Scyuti!r","Sraki!","Sragi!","SraTi!","Slaki!","Slagi!","Svaki!","Sragi!","Svaci!","SvaWi!","Svidi!","zasti!","zivi!","skandi!r","skaBi!","skudi!","zwaBi!","spadi!","sPuwi!r","sPuwi!","sPuwi!","sPuqi!","sPuqi!","sraki!","zvaki!","Sragi!","hisi!","hisi!","hiqi!","hivi!","huqi!","huqi!");
$iditverbs1=array("anh","anh","ank","ang","anG","anc","anj","anW","ant","and","anb","anB","AnC","inK","ing","ind","inv","InK","InK","Inj","unK","unC","unC","kanW","unh","fnj","lanq","kans","kank","kanc","kanW","kanW","kanq","kanq","kanq","kand","kand","kanp","kAnkz","kAnc","kunS","kuns","kunj","kunw","kunW","kunW","kunq","kunq","kunq","kunq","kunT","kundr","kunb","kunb","kunB","kfnv","krand","krand","kland","kland","klind","klind","kzanj","kzanj","kzanp","kzund","Kanj","Kanq","Kanq","Kunq","ganj","ganq","ganq","gunj","gunW","gunq","gfnj","granT","Ganw","GinR","Gunz","GunR","Gunz","Gunz","GfnR","cankz","canq","canq","cand","canp","cint","cunw","cunq","cunb","cunb","cyunt","Canj","Cand","Cind","Cfnd","jans","janj","janB","j","jinv","jung","jfnB","jyunt","wank","tans","tans","tank","tang","tanq","tantr","tunj","tunj","tunj","tunq","tunq","tunb","tunb","tunh","tfnd","trans","trank","trang","trand","trinK","tvang","Tank","danS","danS","dans","dans","danG","dinv","dunh","dfnh","dfnS","drAnkz","Danv","Dinv","Dfnj","DmAnkz","Dranj","DrAnkz","Dvanj","DvAnkz","nanK","nand","nins","ninj","ninj","nind","ninv","pans","pans","panc","panc","panq","panq","panT","pins","pinj","pinj","pinj","pinW","pinq","pinq","pinv","punw","punq","punT","pfnj","banh","banw","bind","bung","bunD","bunnd","bfnh","bfnh","Banj","Banq","Banq","Band","Bind","Bind","BfnS","manh","manh","mank","manK","mang","manG","manG","manc","manW","manq","manq","manq","mantr","manT","mand","mAnkz","minj","mind","minv","munK","munj","munW","munq","munq","mfnq","yantr","yung","yunj","ranh","ranh","ranK","rang","ranG","ranG","ranv","ranP","ranb","ranB","rinK","ring","rinc","rinv","runS","runs","runw","runW","runW","runq","rund","runD","lanK","lang","lanG","lanG","lanG","lanG","lanj","lanj","lanj","lanj","lanq","lanq","lanb","lanb","lanB","lAnC","lAnj","linK","ling","ling","linj","lunj","lunj","lunw","lunW","lunW","lunW","lunq","lunT","lunb","lunb","vank","vank","vanK","vang","vanG","vanw","vanw","vanw","vanW","vanq","vanq","vand","vAnkz","vAnC","vinc","vinj","vung","bfnh","bfnh","vfnj","vranj","Sank","Sanq","SinK","SinG","Sinj","Sunc","SunW","SunW","SunW","Scunt","Scyunt","Srank","Srang","SranT","Slank","Slang","Svank","Srang","Svanc","SvanW","Svind","sanst","sinv","skannd","skanB","skund","stanB","spand","sPunw","sPunw","sPunw","sPunq","sPunq","srank","svank","Srang","hins","hins","hinq","hinv","hunq","hunq");
$iditverbs2=array("ah","ah","ak","ag","aG","ac","aj","aW","at","ad","ab","aB","AC","iK","ig","id","iv","IK","IK","Ij","uK","uC","uC","kaW","uh","fj","laq","kas","kak","kac","kaW","kaW","kaq","kaq","kaq","kad","kad","kap","kAkz","kAc","kuS","kus","kuj","kuw","kuW","kuW","kuq","kuq","kuq","kuq","kuT","kudr","kub","kub","kuB","kfv","krad","krad","klad","klad","klid","klid","kzaj","kzaj","kzap","kzud","Kaj","Kaq","Kaq","Kuq","gaj","gaq","gaq","guj","guW","guq","gfj","graT","Gaw","GiR","Guz","GuR","Guz","Guz","GfR","cakz","caq","caq","cad","cap","cit","cuw","cuq","cub","cub","cyut","Caj","Cad","Cid","Cfd","jas","jaj","jaB","j","jiv","jug","jfB","jyut","wak","tas","tas","tak","tag","taq","tatr","tuj","tuj","tuj","tuq","tuq","tub","tub","tuh","tfd","tras","trak","trag","trad","triK","tvag","Tak","daS","daS","das","das","daG","div","duh","dfh","dfS","drAkz","Dav","Div","Dfj","DmAkz","Draj","DrAkz","Dvaj","DvAkz","naK","nad","nis","nij","nij","nid","niv","pas","pas","pac","pac","paq","paq","paT","pis","pij","pij","pij","piW","piq","piq","piv","puw","puq","puT","pfj","bah","baw","bid","bug","buD","bund","bfh","bfh","Baj","Baq","Baq","Bad","Bid","Bid","BfS","mah","mah","mak","maK","mag","maG","maG","mac","maW","maq","maq","maq","matr","maT","mad","mAkz","mij","mid","miv","muK","muj","muW","muq","muq","mfq","yatr","yug","yuj","rah","rah","raK","rag","raG","raG","rav","raP","rab","raB","riK","rig","ric","riv","ruS","rus","ruw","ruW","ruW","ruq","rud","ruD","laK","lag","laG","laG","laG","laG","laj","laj","laj","laj","laq","laq","lab","lab","laB","lAC","lAj","liK","lig","lig","lij","luj","luj","luw","luW","luW","luW","luq","luT","lub","lub","vak","vak","vaK","vag","vaG","vaw","vaw","vaw","vaW","vaq","vaq","vad","vAkz","vAC","vic","vij","vug","bfh","bfh","vfj","vraj","Sak","Saq","SiK","SiG","Sij","Suc","SuW","SuW","SuW","Scut","Scyut","Srak","Srag","SraT","Slak","Slag","Svak","Srag","Svac","SvaW","Svid","sast","siv","skand","skaB","skud","zwaB","spad","sPuw","sPuw","sPuw","sPuq","sPuq","srak","svak","Srag","his","his","hiq","hiv","huq","huq");
$irendiditverbs=array("﻿uhi!r","kzudi!r","Guzi!r","Guzi!r","cyuti!r","Cidi!r","u!Cfdi!r","jyuti!r","tuhi!r","u!tfdi!r","duhi!r","dfSi!r","Riji!r","buDi!r","u!bundi!r","Bidi!r","yuji!r","rici!r","rudi!r","ruDi!r","vici!r","viji!r","I!Suci!r","Scuti!r","Scyuti!r","skandi!r","sPuwi!r");
$AkArAntaverbs=array("KyA","gAN","gA","GrA","jYA","jYA","jyA","daridrA","qudAY","dAR","dAp","drA","quDAY","DmA","pA","pA","prA","psA","BA","mAN","mA","mAN","mnA","yA","rA","lA","vA","SrA","SrA","zWA","zRA","o!hAN","o!hAk");
$nonuniqueverbs=array("ahi!","aYcu!","aYcu!","awwa!","aRa!","aqqa!","ana!","ama!","aya!","arca!","arja!","arda!","arha!","arha!","asa!","Apx!","iN","ik","ila!","iza!","iza!","IKi!","Iqa!","Ira!","Iza!","uCI!","uCi!","uWa!","ujJa!","f","f","fDu!","ejf!","ezf!","kaqa!","kaRa!","kaRa!","kaWi!","kaWi!","kaqi!","kaqi!","katra!","kaqqa!","kadi!","kala!","kala!","kasa!","kASf!","kiwa!","kita!","kuN","kuca!","kuca!","kuwa!","kuwwa!","kuRa!","kuWi!","kuqi!","kuqi!","kuqi!","kupa!","kubi!","kUwa!","kURa!","kfY","kftI!","kfpa!","kfza!","kF","kfpU!","kradi!","kladi!","klidi!","kzaji!","kzi","kzi","kzipa!","kzuBa!","kzuBa!","kzura!","YikzvidA!","YikzvidA!","Kaqi!","Kida!","Kida!","gaja!","gaqi!","garja!","garda!","garva!","garha!","gala!","guN","guja!","guDa!","gupa!","gupa!","gF","gF","granTa!","granTa!","glepf!","Gawa!","Gawa!","Gawwa!","Guwa!","GuRa!","Guzi!r","GUrRa!","Gf","Gf","caka!","caqi!","cana!","capa!","camu!","cara!","carca!","carca!","cala!","cala!","caha!","caha!","ciY","cIva!","cuwa!","cuqqa!","cubi!","cUrRa!","Cada!","Cada!","jartsa!","jartsa!","jala!","jasu!","jasu!","ji","ci","ci","juqa!","juqa!","jF","jYA","jri","jvala!","Jartsa!","Jartsa!","Jaza!","qipa!","qipa!","qipa!","qIN","tasi!","taqa!","tanu!","tapa!","tapa!","tarja!","tija!","tila!","tila!","tuja!","tuji!","tuji!","tuqi!","tupa!","tuPa!","tuBa!","tuBa!","tumpa!","tumPa!","tubi!","tfpa!","tfpa!","tfpa!","tfpa!","truwa!","daSi!","dasi!","dakza!","dala!","divu!","divu!","dfpa!","dfpa!","dfBI!","dF","dF","DU","DUY","DUY","DUpa!","DUpa!","DfN","u!Drasa!","Dru","Dvana!","Dvana!","nawa!","Rawa!","RaBa!","RaBa!","Ruda!","RU","nF","pasi!","pakza!","paci!","pawa!","pawa!","paqi!","pada!","pala!","pA","piji!","piji!","piqi!","piSa!","puwa!","puwa!","puwa!","puqa!","puRa!","puTa!","pula!","puza!","puza!","puza!","puza!","pUrI!","purva!","pUla!","pf","pfcI!","pF","pF","pelf!","praTa!","prIY","pluza!","pluza!","baDa!","banDa!","barha!","barha!","bala!","balha!","bila!","bukka!","buDa!","busa!","bfhi!","Bakza!","Baja!","Bawa!","Baqi!","Bala!","BAma!","BU","BU","BUza!","BraMSu!","Bramu!","Brasja!","mahi!","maGi!","maqi!","maqi!","manTa!","maska!","wumasjo!","maha!","mAN","mana!","mAna!","mAna!","YimidA!","mila!","muwa!","muwa!","muqi!","muda!","mUla!","mfjU!","mfqa!","mfza!","mrakza!","mrakza!","mleCa!","yama!","yu","yuja!","rahi!","raGi!","raYja!","rawa!","rawa!","raRa!","rasa!","raha!","raha!","ri","riza!","ruwa!","ruwa!","ruWi!","ruza!","ruza!","lakza!","laGi!","laGi!","laGi!","laja!","laja!","laji!","laji!","laji!","laqa!","o!laqi!","labi!","lala!","lasa!","o!lasjI!","liKa!","ligi!","liSa!","lI","luji!","luwa!","luwa!","luwa!","luwa!","luWa!","luWa!","luWa!","luqa!","luWi!","luWi!","luBa!","lubi!","lUza!","lokf!","locf!","vaki!","vaca!","vaYcu!","vawa!","vawa!","vawa!","vawi!","vawi!","vaqi!","vada!","vanu!","vana!","vaBra!","varRa!","barha!","varha!","balha!","vasa!","vasa!","vasa!","vaska!","bAhf!","viCa!","o!vijI!","vida!","vida!","vida!","vila!","vizka!","visa!","bisa!","vfY","bfhi!","bfhi!","vfjI!","vfjI!","vftu!","vftu!","vfDu!","bfha!","vehf!","vella!","vyaya!","vyaya!","vyuza!","vyusa!","vraja!","vraja!","vraRa!","vraRa!","SaWa!","SaWa!","SaWa!","Sadx!","Sapa!","Sala!","Siza!","SIka!","SIla!","SuWa!","SuWi!","SuWi!","SunDa!","SuBa!","SuBa!","SumBa!","SfDu!","SfDu!","sraMsu!","SraRa!","SraTa!","SraTa!","SraTa!","SranTa!","SranTa!","SrA","Sliza!","Sragi!","SvaWa!","zWivu!","zvaska!","zaca!","satra!","zadx!","zaha!","zaha!","sAra!","ziY","zu","zUN","zUda!","sf","sfja!","zwupa!","zwUpa!","zRiha!","spaSa!","sPuwa!","sPuwa!","sPuwi!","sPuqi!","zmiN","smf","smf","sraMsu!","sramBu!","Sragi!","zvada!","svana!","zvaska!","zvaska!","svAda!","hisi!","huqi!","hula!","heWa!","heWa!","hoqf!","hrasa!","hvf");
$mitcurAdiverbs=array("jYapa!","yama!","caha!","raha!","bala!","ciY",);
$curAdi_optionalNic_idud=array("pUrI!","ancu!","divu!","jasu!","SfDu!","vftu!","vfDu!","tanu!","uDrasa!","mfjU!","vaYcu!","BU","kfpa!","grasa!","dala!","ruja!","puza!","ji","ci","paw","ciY","pawa!","Gawa!","Rada!","nawa!","taqa!","nala!","puwa!","luwa!","gupa!","puTa!","kupa!","ruwa!","vftu!","vfDu!","tuji!","miji!","piji!","luji!","Baji!","laDi!","trasi!","pisi!","kusi!","daSi!","kuSi!","Gawi!","bfhi!","laji!","aji!","dasi!","BfSi!","ruSi!","rusi!","puwi!","raGi!","laGi!","ahi!","rahi!","mahi!","laqi!","vicCa!","cIva!","lokf!","locf!","tarka!","SIka!","DUpa!",);
$curAdi_optionalNic_Asvada=array("grasa!","dala!","ruja!","puza!","ji","ci","paw","ciY","pawa!","Gawa!","Rada!","nawa!","taqa!","nala!","puwa!","luwa!","gupa!","puTa!","kupa!","ruwa!","vftu!","vfDu!","tuji!","miji!","piji!","luji!","Baji!","laDi!","trasi!","pisi!","kusi!","daSi!","kuSi!","Gawi!","bfhi!","laji!","aji!","dasi!","BfSi!","ruSi!","rusi!","puwi!","raGi!","laGi!","ahi!","rahi!","mahi!","laqi!","vicCa!","cIva!","lokf!","locf!","tarka!","SIka!","DUpa!","pUrI!");
$curAdi_optionalNic_AdhRSIya=array("lI","jri","mI","prIY","BU","DUY","vfY","jF","zaha!","tapa!","SraTa!","Cada!","tanu!","vada!","vaca!","Asada!","rica!","Siza!","yuja!","juza!","pfca!","vfjI!","tfpa!","CfdI!","dfBI!","dfBa!","mfjU!","mfza!","Dfza!","granTa","granTa!","SranTa","SunDa!","hisi!","kaWi!","arca!","Ira!","SIka!","cIka!","arda!","arha!","Aplx!","mAna!","garha!","mArga!",);
$curAdi_optionalNic_extra=array("garva!","arTa!","mUtra!","karta!","pata!","pata");
$curAdi_optionalNic=array_merge($curAdi_optionalNic_AdhRSIya,$curAdi_optionalNic_Asvada,$curAdi_optionalNic_extra,$curAdi_optionalNic_idud);
$AkusmIya=array("yu","gf","qapa!","spaSa!","lala!","SaWa!","smaya!","Sama!","gala!","Bala!","mada!","cita!","qipa!","divu!","vida!","truwa!","vfza!","tarja!","daSi!","tatri!","matri!","Bartsa!","basta!","ganDa!","vizka!","nizka!","kURa!","tURa!","BrURa!","yakza!","gUra!","lakza!","kutsa!","kUwa!","kuwwa!","vaYcu!","mAna!","kusma!");
$AgarvIya=array("pada","gfha","mfga","kuha","SUra","vIra","sTUla","sTUla","satra","arTa","garva");
$curAdi_adanta=array("pada","gfha","mfga","kuha","SUra","vIra","sTUla","sTUla","satra","arTa","garva","kaTa","vara","gaRa","SaWa","SvaWa","pawa","vawa","raha","stana","gadI!","pata","paza","svara","raca","kala","caha","maha","sAra","kfpa","SraTa","spfha","BAma","sUca","Kewa","Kowa","kzowa","goma","kumAra","SIla","sAma","vela","kAla","palyUla","vAta","gaveza","vAsa","nivAsa","BAja","saBAja","Una","Dvana","kUwa","saMketa","grAma","kuRa","guRa","keta","kUwa","stena","sUtra","mUtra","rUkza","pAra","tIra","puwa","Deka","katra","vazka","citra","aMsa","vawa","laja","vawi!","laji!","miSra","saNgrAma","Cidra","anDa","daRqa","aNka","aNga","suKa","duHKa","rasa","vyaya","rUpa","Ceda","Cada","lABa","vraRa","varRa","parRa","vizka","kzipa","vasa","tutTa");
$tudAdi_mucAdi=array("muc","lup","vid","lip","zic","Kid","kft","piS");
// list of 10 gaNas and some upagaNas. With accent, devanagari
$bhvAdi1=array("अ॑हिँ॒","अ॑कँ॑","अ॑क्षूँ॑","अ॑गँ॑","अ॑किँ॒","अ॑गिँ॑","अ॑घिँ॒","अ॑चुँ॒॑","अ॑जँ॑","अ॑चिँ॑","अ॑ञ्चुँ॑","अ॑ञ्चुँ॒॑","अ॑टँ॑","अ॑ट्टँ॒","अ॑डँ॑","अ॑ड्डँ॑","अ॑णँ॑","अ॑ठिँ॒","अ॑तँ॑","अ॑ड्डँ॑","अ॑तिँ॑","अ॑दिँ॑","अ॑भ्रँ॑","अ॑मँ॑","अ॑बिँ॒","अ॑भिँ॒","अ॑यँ॒","अ॑यँ॒॑","अ॑र्घँ॑","अ॑र्चँ॑","अ॑र्जँ॑","अ॑र्दँ॑","अ॑र्बँ॑","अ॑र्वँ॑","अ॑र्हँ॑","अ॑लँ॑","अ॑वँ॑","अ॑षँ॒॑","अ॑सँ॒॑","आ॑छिँ॑","आ॑ङः॒ शसि","इ॑खँ॑","इ॑खिँ॑","इ॑गिँ॑","इ॑टँ॑","इ॑दिँ॑","इ॑विँ॑","ई॑क्षँ॒","ई॑खिँ॑","ई॑खिँ॑","ई॑ज॒","ई॑जिँ॒","ई॑र्क्ष्यँ॑","ई॑र्ष्यँ॑","ई॑षँ॑","ई॑षँ॒","ई॑हँ॒","उ॒ङ्","उ॑क्षँ॑","उ॑खँ॑","उ॑खिँ॑","उ॑छीँ॑","उ॑छिँ॑","उ॑ठँ॑","उ॑ठँ॒","उ॑र्दँ॒","उ॑र्वीँ॑","उ॑षँ॑","उ॑हिँ॑र्","ऊ॑ठँ॑","ऊ॑यीँ॒","ऊ॑षँ॑","ऊ॑हँ॒","ऋ॒","ऋ॑जँ॒","ऋ॑जिँ॒","ए॑जृँ॒","ए॑जृँ॑","ए॑ठँ॒","ए॑धँ॒","ए॑षृँ॒","ए॑षृँ॒","ओ॑खृँ॑","ओ॑णृँ॑","क॑कँ॒","क॑खँ॑","क॑खेँ॑","क॑गेँ॑","क॑किँ॒","क॑चँ॒","क॑जँ॑","क॑चिँ॒","क॑टीँ॑","क॑टेँ॑","क॑ठँ॑","क॑डँ॑","क॑ड्डँ॑","क॑णँ॑","क॑णँ॑","क॑ठिँ॒","क॑डिँ॑","क॑डिँ॒","क॑त्थँ॒","क॑दँ॒","क॑ड्डँ॑","क॑नीँ॑","क॑दिँ॑","क॑दिँ॒","क॑पँ॒","क॑बृँ॒","क॑मुँ॒","क॑पिँ॒","क॑र्जँ॑","क॑र्दँ॑","क॑र्बँ॑","क॑र्वँ॑","क॑लँ॒","क॑ल्लँ॒","क॑षँ॑","क॑सँ॑","का॑क्षिँ॑","का॑चिँ॒","का॑शृँ॒","का॑सृँ॒","कि॑टँ॑","कि॑टँ॑","कि॑तँ॑","की॑लँ॑","कुं॑शँ॑","कु॑कँ॒","कु॑चँ॑","कु॑चँ॑","कु॑जुँ॑","कु॑ञ्चँ॑","कु॑जिँ॑","कु॑टिँ॑","कु॑ठिँ॑","कु॑डिँ॒","कु॑डिँ॑","कु॑थिँ॑","कु॑बिँ॑","कु॑र्द॒","कु॑लँ॑","कू॑जँ॑","कू॑लँ॑","कृ॒ञ्","कृ॑विँ॑","कृ॑पँ॒","कृ॑पूँ॒","कृ॒षँ॑","कृ॑पूँ॒","के॑पृँ॒","के॑लृँ॑","के॑वृँ॒","कै॒","क्न॑थँ॑","क्नू॑यीँ॒","क्म॑रँ॑","क्र॑थँ॑","क्र॑दँ॒","क्र॑दिँ॑","क्र॑दिँ॒","क्र॑पँ॒","क्र॑मुँ॑","क्री॑डृँ॑","क्रु॑ञ्चँ॑","क्रु॒शँ॑","क्ल॑थँ॑","क्ल॑दँ॒","क्ल॑दिँ॑","क्ल॑दिँ॒","क्लि॑दिँ॒","क्लि॑दिँ॑","क्ली॑बृँ॒","क्लु॒ङ्","क्ले॑शँ॒","क्व॑णँ॑","क्व॑थेँ॑","क्ष॑जिँ॒","क्ष॒प॑य॒॑श्च॑","क्ष॑मूँ॒ष्","क्ष॑रँ॑","क्षि॒","क्षि॑वुँ॑","क्षी॑जँ॑","क्षी॑बृँ॒","क्षी॑वृँ॒","क्षु॑भँ॒","क्षु॑रँ॑","क्षे॑वुँ॑","क्षै॒","क्ष्मा॑यीँ॒","क्ष्मी॑लँ॑","ञिक्ष्वि॑दाँ॑","क्ष्वे॑लृँ॑","ख॑जँ॑","ख॑जिँ॑","ख॑टँ॑","ख॑डिँ॒","ख॑दँ॑","ख॑नुँ॒॑","ख॑र्जँ॑","ख॑र्दँ॑","ख॑र्बँ॑","ख॑र्वँ॑","ख॑लँ॑","ख॑षँ॑","खा॑दृँ॑","खि॑टँ॑","खु॒ङ्","खु॑जुँ॑","खु॑र्द॒","खे॑लृँ॑","खे॑वृँ॒","खै॒","खो॑रृँ॑","खो॑लृँ॑","ग॑जँ॑","ग॑जिँ॑","ग॑डँ॑","ग॑डिँ॑","ग॑डिँ॑","ग॑दँ॑","ग॒मॢँ॑","ग॑र्जँ॑","ग॑र्दँ॑","ग॑र्बँ॑","ग॑र्वँ॑","ग॑र्हँ॒","ग॑लँ॑","ग॑ल्भँ॒","ग॑ल्हँ॒","गा॒ङ्","गा॑धृँ॒","गा॑हूँ॒","गु॒ङ्","गु॒ङ्","गु॑जँ॑","गु॑जिँ॑","गु॑दँ॒","गु॑पँ॒","गु॑पूँ॑","गु॑र्द॒","गु॑र्वीँ॑","गु॑हूँ॒॑","गृ॑हूँ॒","गृ॒","गृ॑जँ॑","गृ॑जिँ॑","गे॑पृँ॒","गे॑वृँ॒","गे॑षृँ॒","गै॒","गो॑ष्टँ॒","ग्र॑थिँ॒","ग्र॑सुँ॒","ग्रु॑चुँ॑","ग्ल॑सुँ॒","ग्ल॑हँ॒","ग्लु॑चुँ॑","ग्लु॑ञ्चँ॑","ग्ले॑पृँ॒","ग्ले॑पृँ॒","ग्ले॑वृँ॒","ग्ले॑षृँ॑","ग्लै॒","घ॑ग्घँ॑","घ॑घँ॑","घ॑टँ॒","घ॑ट्टँ॒","घ॑षँ॒","घ॑सॢँ॑","घि॑णिँ॒","घु॒ङ्","घु॑षिँ॒","घु॑टँ॒","घु॑णँ॒","घु॑णिँ॒","घु॑षिँ॑र्","घू॑र्णँ॒","घृ॒","घृ॑णिँ॒","घृ॑षुँ॑","घ्रा॒","ध्रा॑घृँ॒","ङु॑ङ्","च॑कँ॑","च॑कँ॒","च॑ञ्चुँ॑","च॑टेँ॑","च॑णँ॑","च॑डिँ॒","च॑तेँ॒॑","च॑देँ॒॑","च॑नँ॑","च॑दिँ॑","च॑पँ॑","च॑मुँ॑","च॑यँ॒","च॑रँ॑","च॑र्चँ॑","च॑र्बँ॑","च॑र्वँ॑","च॑लँ॑","च॑षँ॒॑","च॑हँ॑","चा॑यृँ॒॑","चि॑टँ॑","चि॑तीँ॑","चि॑ल्लँ॑","ची॑बृँ॒॑","ची॑भृँ॒","ची॑वृँ॒॑","चु॑च्यँ॑","चु॑ड्डँ॑","चु॑डिँ॑","चु॑ड्डँ॑","चु॑पँ॑","चु॑बिँ॑","चु॑ल्लँ॑","चू॑षँ॑","चे॑लृँ॑","चे॑ष्टँ॒","च्यु॑तिँ॑र्","छ॑मुँ॑","छ॑षँ॒॑","ज॑जँ॑","ज॑जिँ॑","ज॑टँ॑","ज॑पँ॑","ज॑भीँ॒","ज॑मुँ॑","ज॑र्त्सँ॑","ज॑र्त्सँ॑","ज॑र्त्सँ॑","ज॑लँ॑","ज॑ल्पँ॑","ज॑षँ॑","जि॒","जिँ॒","जि॑विँ॑","जि॑मुँ॑","जि॑षुँ॑","जी॑वँ॑","जु॒ङ्","जु॒","जु॑गिँ॑","जु॑तृँ॒","जू॑षँ॑","जृ॑भिँ॒","जे॑षृँ॒","जे॑हृँ॒","जै॒","ज्यु॒ङ्","ज्यु॑तिँ॑र्","ज्रि॒","ज्व॑रँ॑","ज्व॑लँ॑","ज्व॑लँ॑","झ॑टँ॑","झ॑मुँ॑","झ॑र्त्सँ॑","झ॑र्त्सँ॑","झ॑र्त्सँ॑","झ॑षँ॑","झ॑षँ॒॑","ट॑लँ॑","टि॑कृँ॒","टी॑कृँ॒","ट्व॑लँ॑","डी॑ङ्","ढौ॑कृँ॒","त॑सिँ॑","त॑कँ॑","त॑क्षूँ॑","त॑क्षँ॑","त॑किँ॑","त॑गिँ॑","त॑ञ्चुँ॑","त॑टँ॑","त॑डिँ॒","त॒पँ॑","त॑यँ॒","त॑र्जँ॑","त॑र्दँ॑","ता॑यृँ॒","ति॑कृँ॒","ति॑जँ॒","ति॒पृँ॒","ति॑लँ॑","ति॑ल्लँ॑","ती॑कृँ॒","ती॑वँ॑","तु॑जँ॑","तु॑जिँ॑","तु॑डृँ॑","तु॑डिँ॒","तु॑पँ॑","तु॑फँ॑","तु॑भँ॒","तु॑म्पँ॑","तु॑म्फँ॑","तु॑बिँ॑","तु॑र्वी॑","तु॑सँ॑","तु॑हिँ॑र्","तू॑डृँ॑","तू॑लँ॑","तू॑षँ॑","तृ॑क्षँ॑","तॄ॑","ते॑जँ॑","ते॑पृँ॒","ते॑वृँ॒","त्य॒जँ॑","त्र॑क्षँ॑","त्र॑खँ॑","त्र॑किँ॒","त्र॑गिँ॑","त्र॑दिँ॑","त्र॑पूँ॒ष्","त्रि॑खिँ॑","त्रु॑पँ॑","त्रु॑फँ॑","त्रु॑म्पँ॑","त्रु॑म्फँ॑","त्रै॒ङ्","त्रौ॑कृँ॒","त्व॑क्षूँ॑","त्व॑गिँ॑","त्व॑ञ्चुँ॑","ञित्व॑राँ॒","त्वि॒षँ॒॑","त्स॑रँ॑","थ॑किँ॑","थु॑र्वी॑","दं॒शँ॑","द॑क्षँ॒","द॑क्षँ॒","द॑घिँ॑","द॑दँ॒","द॑धँ॒","द॑यँ॒","द॑लँ॑","द॒हँ॑","दा॒ण्","दा॑नँ॒॑","दा॑शृँ॒॑","दा॑सृँ॒॑","दि॑विँ॑","दी॑क्षँ॒","टु॑दु॒","दु॑र्वीँ॑","दु॑हिँ॑र्","दृ॒ङ्","दृ॑हँ॑","दॄ॑","दे॒ङ्","दे॑वृँ॒","दै॒प्","दृ॒शिँ॑र्","द्यु॑तँ॒","द्यै॒","द्र॑मँ॑","द्रा॑खृँ॑","द्रा॑घृँ॒","द्रा॑क्षिँ॑","द्रा॑डृँ॒","द्रा॑हृँ॒","द्रु॒","द्रे॑कृँ॒","द्रै॒","द्वृ॒","ध॑णँ॑","ध॑विँ॑","धा॑वुँ॒॑","धि॑क्षँ॒","धि॑विँ॑","धु॑क्षँ॒","धु॑र्वीँ॑","धू॑पँ॑","धृ॒ङ्","धृ॒ञ्","धृ॑जँ॑","धृ॑जिँ॑","धे॒ट्","धे॑पृँ॒","धो॑रृँ॑","ध्मा॒","ध्मा॑क्षिँ॑","ध्यै॒","ध्र॑जँ॑","ध्र॑जिँ॑","ध्र॑णँ॑","ध्रा॑खृँ॑","ध्रा॑क्षिँ॑","ध्रा॑डृँ॒","ध्रि॑जँ॑","ध्रु॒","ध्रे॑कृँ॒","ध्रै॒","ध्वं॑सुँ॒","ध्व॑जँ॑","ध्व॑जिँ॑","ध्व॑णँ॑","ध्व॑नँ॑","ध्व॑नँ॑","ध्वा॑क्षिँ॑","ध्वृ॒","ण॑क्षँ॑","ण॑खँ॑","ण॑खिँ॑","ण॑टँ॑","ण॑टँ॑","ण॑दँ॑","टुन॑दिँ॑","ण॑भँ॒","ण॒मँ॑","ण॑यँ॒","न॑र्दँ॑","ण॑लँ॑","ण॑सँ॒","ना॑थृँ॒","ना॑धृँ॒","णा॑सृँ॒","णि॑क्षँ॑","णि॑दृँ॒॑","णि॑दिँ॑","णि॑विँ॑","णि॑शँ॑","णि॑षुँ॑","णी॒ञ्","णी॑लँ॑","णी॑वँ॑","नॄ॑","णे॑दृँ॒॑","णे॑षृँ॒","प॑क्षँ॑","डुप॒चँ॒॑ष्","प॑चिँ॒","प॑टँ॑","प॑ठँ॑","प॑णँ॒","प॑डिँ॒","प॑तॢँ॑","प॑थेँ॑","प॑नँ॒","प॑यँ॒","प॑र्दँ॒","प॑र्पँ॑","प॑र्बँ॑","प॑र्वँ॑","प॑लँ॑","पे॑लृँ॑","पा॒","पि॑टँ॑","पि॑ठँ॑","पि॑डिँ॒","पि॑विँ॑","पि॑सृँ॑","पी॑लँ॑","पी॑वँ॑","पु॑टँ॑","पु॑डँ॑","पु॑डिँ॑","पु॑थिँ॑","पु॑र्वँ॑","पु॑लँ॑","पु॑षँ॑","पू॑ङ्","पू॑यीँ॒","पु॑र्वँ॑","पू॑लँ॑","पू॑षँ॑","पृ॑षुँ॑","पे॑लृँ॑","पे॑वृँ॒","पे॑षृँ॒","पे॑सृँ॑","पै॒","पै॑णृँ॑","ओँ॑प्या॑यीँ॒","प्यै॒ङ्","प्र॑थँ॒","प्र॑सँ॒","प्रु॒ङ्","प्रु॑षुँ॑","प्रे॑षृँ॒","प्रै॑णृँ॑","प्रो॑थृँ॒॑","प्ल॑क्षँ॒॑","प्लि॑हँ॒","प्लु॒ङ्","प्लु॑षुँ॑","प्ले॑वृँ॒","फ॑क्कँ॑","फ॑णँ॑","फ॑लँ॑","ञिफ॑लाँ॑","फु॑ल्लँ॑","फे॑लृँ॑","ब॑हिँ॒","ब॑ठँ॑","ब॑णँ॑","ब॑टिँ॑","ब॑दँ॑","ब॑धँ॒","व॑भ्रँ॑","ब॑र्बँ॑","ब॑र्हँ॒","ब॑लँ॑","ब॑ल्हँ॒","बा॑डृ॒","बा॑धृँ॒","बा॑हृँ॒","बि॑टँ॑","बि॑दिँ॑","बि॑सँ॑","बी॑भृँ॒","बु॑क्कँ॑","बु॑गिँ॑","बु॑धँ॑","बु॑धिँ॒॑र्","उँ॑बु॑न्दिँ॒॑र्","बृ॑हिँ॑","बृ॑हँ॑","बे॑सँ॑","वे॑हृँ॒","व्र॑णँ॑","भ॑क्षँ॒॑","भ॒जँ॒॑","भ॑टँ॑","भ॑टँ॑","भ॑णँ॑","भ॑डिँ॒","भ॑दिँ॒","भ॑र्बँ॑","भ॑र्भँ॑","भ॑र्वँ॑","भ॑लँ॒","भ॑ल्लँ॒","भ॑षँ॑","भा॑मँ॒","भा॑षँ॒","भा॑सृँ॒","भि॑क्षँ॒","ञिमि॑दाँ॒","भि॑दिँ॑","भू॑","भू॑षँ॑","भृ॑शिँ॑","भृ॑जीँ॒","भे॑षृँ॒॑","भ्य॑सँ॒","भ्रं॑शुँ॑","भ्रं॑सुँ॒","भ्र॑क्षँ॒॑","भ्र॑णँ॑","भ्र॑मुँ॑","टुभ्रा॑जृँ॒","भ्रा॑जृँ॒","टुभ्रा॑शृँ॒","भ्रे॑जृँ॒","भ्रे॑षृँ॒॑","भ्ल॑क्षँ॒॑","टुभ्ला॑शृँ॒","भ्ले॑षृँ॒॑","म॑हिँ॒","म॑खँ॑","म॑किँ॒","म॑खिँ॑","म॑गिँ॑","म॑घिँ॒","म॑घिँ॑","म॑चँ॒","म॑चिँ॒","म॑ठँ॑","म॑णँ॑","म॑ठिँ॒","म॑डिँ॒","म॑डिँ॑","म॑थेँ॑","म॑न्थँ॑","म॑थिँ॑","म॑दिँ॒","म॑भ्रँ॑","म॑यँ॒","म॑र्बँ॑","म॑र्वँ॑","म॑लँ॒","म॑ल्लँ॒","म॑वँ॑","म॑व्यँ॑","म॑शँ॑","म॑षँ॑","म॑स्कँ॒","म॑स्कँ॒","म॑हँ॑","मा॑क्षिँ॑","मा॑नँ॒","मा॑हृँ॒॑","मि॑थृँ॒॑","मि॑दृँ॒॑","मि॑धृँ॒॑","मि॑विँ॑","मि॑शँ॑","मि॑षुँ॑","मि॒हँ॑","मी॑मृँ॑","मी॑लँ॑","मी॑वँ॑","मु॑खिँ॑","मु॑जँ॑","मु॑चि॒","मु॑जिँ॑","मु॑टँ॑","मु॑डँ॑","मु॑ठिँ॒","मु॑डिँ॑","मु॑डिँ॒","मु॑दँ॒","मु॑र्छाँ॑","मु॑र्वीँ॑","मू॑ङ्","मू॑लँ॑","मू॑षँ॑","मृ॑क्षँ॑","मृ॑धुँ॒॑","मृ॑षुँ॑","मे॒ङ्","मे॑थृँ॒॑","मे॑दृँ॒॑","मे॑धृँ॒॑","मे॑पृँ॒","मे॑वृँ॒","म्ना॒","म्र॑क्षँ॑","म्र॑दँ॒","म्रु॑चुँ॑","म्रु॑ञ्चुँ॑","म्रे॑टृँ॑","म्रे॑डृँ॑","म्लु॑चुँ॑","म्लु॑ञ्चुँ॑","म्ले॑छँ॑","म्ले॑टृँ॑","म्ले॑वृँ॒","म्लै॒","य॒जँ॒॑","य॑तीँ॒","य॒भँ॑","य॒मँ॑","टुया॑चृँ॒॑","यु॑गिँ॑","यु॑छँ॑","यु॑तृँ॒","यू॑षँ॑","ये॑षृँ॒","यौ॑टृँ॑","र॑हिँ॑","र॑क्षँ॑","र॑खँ॑","र॑गेँ॑","र॑खिँ॑","र॑गिँ॑","र॑घिँ॒","र॒ञ्जँ॒॑","र॑टँ॑","र॑टँ॑","र॑ठँ॑","र॑णँ॑","र॑णँ॑","र॑विँ॑","र॑दँ॑","र॑पँ॑","र॑फँ॑","र॒भँ॒","र॒मुँ॒","र॑फिँ॑","र॑बिँ॒","र॑भिँ॒","र॑यँ॒","र॑सँ॑","र॑हँ॑","रा॑खृँ॑","रा॑घृँ॒","रा॑जृँ॒॑","रा॑सृँ॒","रि॑खँ॑","रि॑खिँ॑","रि॑गिँ॑","रि॑विँ॑","रि॑षँ॑","रु॑शिँ॑","रु॑चँ॒","रु॑टँ॒","रु॑ठँ॑","रु॑टिँ॑","रु॑ठिँ॑","रु॑ठिँ॑","रु॑डिँ॑","रु॑षँ॑","रु॒हँ॑","रू॑षँ॑","रे॑कृँ॒","रे॑जृँ॒","रे॑टृँ॒॑","रे॑पृँ॒","रे॑भृँ॒","रे॑वृँ॒","रे॑षृँ॒","रै॒","रो॑डृँ॑","रौ॑डृँ॑","ल॑खँ॑","ल॑गेँ॑","ल॑खिँ॑","ल॑गिँ॑","ल॑घिँ॒","ल॑घिँ॑","ल॑छँ॑","ल॑जँ॑","ल॑जिँ॑","ल॑टँ॑","ल॑डँ॑","ल॑पँ॑","डुल॒भँ॒ष्","ल॑बिँ॒","ल॑बिँ॒","ल॑भिँ॒","ल॑यँ॒","ल॑र्बँ॑","ल॑लँ॑","ल॑षँ॒॑","ल॑सँ॑","ला॑खृँ॑","ला॑घृँ॒","ला॑जँ॑","ला॑छिँ॑","ला॑जिँ॑","लि॑खँ॑","लि॑खिँ॑","लि॑गिँ॑","लु॑ञ्चँ॑","लु॑टँ॒","लु॑टँ॑","लु॑ठँ॒","लु॑ठँ॑","लु॑डँ॑","लु॑टिँ॑","लु॑ठिँ॑","लु॑ठिँ॑","लु॑ठिँ॑","लु॑डिँ॑","लु॑थिँ॑","लु॑बिँ॑","लू॑षँ॑","ले॑पृँ॒","लो॑कृँ॒","लो॑चृँ॒","लो॑डृँ॑","लो॑ष्टँ॒","व॑क्षँ॑","व॑खँ॑","व॑किँ॒","व॑किँ॒","व॑खिँ॑","व॑गिँ॑","व॑घिँ॒","व॑जँ॑","व॑ञ्चुँ॑","व॑टँ॑","व॑टँ॑","व॑ठँ॑","व॑णँ॑","व॑टिँ॑","व॑ठिँ॒","व॑डिँ॒","व॑दँ॑","व॑नँ॑","व॑नुँ॑","व॑नँ॑","व॑दिँ॒","डुव॒पँ॒॑","व॑भ्रँ॑","टुव॑मँ॑","व॑यँ॒","व॑र्चँ॒","व॑र्षँ॒","व॑र्हँ॒","व॑ल॒","व॑ल्गँ॑","व॑ल्भँ॒","व॑ल्लँ॒","व॑ल्हँ॒","व॑षँ॑","व॑स्कँ॒","व॒सँ॑","व॑स्कँ॒","व॒हँ॒॑","वा॑क्षिँ॑","वा॑छिँ॑","वा॑डृ॒","बा॑हृँ॒","वि॑टँ॑","वि॑थृँ॒","वि॑षुँ॑","वि॑सँ॑","वी॑जँ॒","वु॑गिँ॑","वृ॑ञ्","वृ॑कँ॒","वृ॑क्षँ॒","वृ॑तुँ॒","वृ॑धुँ॒","वृ॑षुँ॑","बृ॑हँ॑","वे॒ञ्","वे॑णृँ॒॑","वे॑थृँ॒","वे॑नृँ॒॑","टुवे॑पृ॒","वे॑लृँ॑","वे॑ल्लँ॑","वे॑ष्टँ॒","वे॑सँ॑","वे॑हृँ॒","वे॑ल्लँ॑","ओँ॑वै॑","व्य॑थँ॒","व्य॑यँ॒॑","व्ये॒ञ्","व्र॑जँ॑","व्र॑जँ॑","व्र॑जिँ॑","व्र॑णँ॑","शं॑सुँ॑","श॑किँ॒","श॑चँ॒","श॑टँ॑","श॑ठँ॑","श॑णँ॑","श॑डिँ॒","श॒दॢँ॑","श॒पँ॒॑","श॑र्बँ॑","श॑र्वँ॑","श॑लँ॑","श॑लँ॒","श॑ल्भँ॒","श॑वँ॑","श॑शँ॑","श॑षँ॑","श॑सुँ॑","शा॑खृँ॑","शा॑डृँ॒","शा॑नँ॒॑","शि॑क्षँ॒","शि॑खिँ॑","शि॑घिँ॑","शि॑टँ॑","शि॑षँ॑","शी॑कृँ॒","शी॑भृँ॒","शी॑लँ॑","शु॑कँ॑","शु॑चँ॑","शु॑च्यँ॑","शु॑ठँ॑","शु॑ठिँ॑","शु॑ठिँ॑","शु॑न्धँ॑","शु॑भँ॑","शु॑भँ॒","शु॑म्भँ॑","शू॑लँ॑","शू॑षँ॑","शृ॑धुँ॒॑","शृ॑धुँ॒","शे॑लृँ॑","शे॑वृँ॒","शै॒","शो॑णृँ॑","शौ॑टृँ॑","श्चु॑तिँ॑र्","श्च्यु॑तिँ॑र्","श्न॑थँ॑","श्मी॑लँ॑","स्य॑न्दूँ॒","च्यु॒ङ्","श्यै॒ङ्","स्रं॑सुँ॒","स्रं॑सुँ॒","श्र॑किँ॒","श्र॑गिँ॑","श्र॑णँ॑","श्र॑थँ॑","श्र॑थिँ॒","श्र॑म्भुँ॒","श्रा॑","श्रि॑ञ्","श्रि॑षुँ॑","श्रु॒","श्रै॒","श्रो॑णृँ॑","श्ल॑किँ॒","श्ल॑गिँ॑","श्ल॑थँ॑","श्ला॑खृँ॑","श्ला॑घृँ॒","श्लि॑षुँ॑","श्लो॑कृँ॒","श्लो॑णृँ॑","श्व॑किँ॒","श्र॑गिँ॑","श्व॑चँ॒","श्व॑चिँ॒","श्व॑लँ॑","श्व॑ल्लँ॑","टुओँश्वि॑","श्वि॑ताँ॑","श्वि॑दिँ॒","ष्ट्यै॒","ष्ठि॑वुँ॑","ष्व॑स्कँ॒","ष्व॑स्कँ॒","ष॑गेँ॑","ष॑चँ॒॑","ष॑चँ॒","ष॒ञ्जँ॑","ष॑टँ॑","ष॒दॢँ॑","ष॑नँ॑","ष॑पँ॑","ष॑मँ॑","ष॑र्क्षँ॑","ष॑र्जँ॑","ष॑र्बँ॑","ष॑र्वँ॑","ष॑लँ॑","ष॑स्जँ॑","ष॑हँ॒","षि॑टँ॑","षि॑धँ॑","षि॑धूँ॑","षि॑विँ॑","षि॑भुँ॑","षि॑म्भुँ॑","सी॑कृँ॒","षु॒","षू॑दँ॒","सू॑र्क्षँ॑","षू॑र्क्ष्यँ॑","सू॑षँ॑","सृ॒","सृ॒पॢँ॑","षृ॑भुँ॑","षृ॑म्भुँ॑","से॑कृँ॒","षे॑लृँ॑","षे॑वृँ॒","षै॒","स्क॒न्दिँ॑र्","स्क॑भिँ॒","स्कु॑दिँ॒","स्ख॑दँ॒","स्ख॑लँ॑","ष्ट॑कँ॑","ष्ट॑नँ॑","ष्ट॑मँ॑","ष्ट॑भिँ॒","ष्ठ॑लँ॑","ष्टि॑पृँ॒","ष्टु॑चँ॒","ष्टु॑भुँ॒","ष्टृ॑क्षँ॑","ष्टे॑पृँ॒","ष्टै॒","स्त्यै॒","ष्ट्र॑क्षँ॑","ष्ठ॑गेँ॑","ष्ठा॒","ष्णै॒","स्प॑दिँ॒","स्प॑र्धँ॒","स्प॑शँ॒॑","स्फा॑यीँ॒","स्फु॑टँ॒","स्फु॑टिँ॑र्","स्फु॑टिँ॑","स्फु॑डिँ॒","स्फु॑र्छाँ॑","टुओँस्फू॑र्जाँ॑","ष्मि॒ङ्","स्मी॑लँ॑","स्मृ॑","स्मृ॒","स्य॑मुँ॑","स्रं॑सुँ॒","स्र॑किँ॒","स्र॑म्भुँ॒","स्र॑म्भुँ॒","स्रु॒","स्रे॑कृँ॒","स्रै॒","स्रो॑कृँ॒","ष्व॑किँ॒","श्र॑गिँ॑","ष्व॒ञ्जँ॒","ष्व॑दँ॒","स्व॑नँ॑","स्व॑नँ॑","स्व॑र्दँ॒","ष्व॑स्कँ॒","ष्व॑स्कँ॒","स्वा॑दँ॒","ञिष्वि॑दाँ॒","स्वृ॒","ह॑टँ॑","ह॑ठँ॑","ह॒दँ॒","ह॑म्मँ॑","ह॑र्यँ॑","ह॑यँ॑","ह॑लँ॑","ह॑सेँ॑","हि॑क्कँ॒॑","हि॑टँ॑","हि॑डिँ॒","हि॑विँ॑","हु॑डृँ॑","हु॑डिँ॒","हु॑डिँ॒","हु॑र्छाँ॑","हु॑लँ॑","हु॑लँ॑","हू॑डृँ॑","हृ॒ञ्","हृ॑षुँ॑","ह्र॑सँ॑","हे॑ठँ॒","हे॑ठँ॑","हे॑डृँ॒","हे॑डँ॑","हे॑पृँ॒","हे॑षृँ॒","हो॑डृँ॒","हो॑डृँ॑","ह्म॑लँ॑","ह्र॑गेँ॑","ह्र॑सँ॑","ह्रा॑दँ॒","ह्री॑छँ॑","ह्रे॑षृँ॒","ह्ल॑गेँ॑","ह्ल॑सँ॑","ह्ला॑दीँ॒","ह्व॑लँ॑","ह्वृ॒","ह्वृ॒","ह्वे॒ञ्");
$divAdi1=array("अ॑णँ॒","अ॑नो॑ रु॒धँ॒","अ॑नँ॒","अ॑सुँ॑","इ॑षँ॑","ई॒ङ्","उ॑चँ॑","ऋ॑धुँ॑","का॑शृँ॒","कु॒ङ्","कु॑ङ्","कु॑थँ॑","कु॑पँ॑","कु॑शँ॑","कु॑सँ॑","कृ॑शँ॑","क्न॑सुँ॑","क्रु॒धँ॑","क्ल॑मुँ॑","क्लि॑दूँ॑","क्लि॑शँ॒","क्ष॑मूँ॑","क्षि॒पँ॑","क्षु॒धँ॑","क्षु॑भँ॑","ञिक्ष्वि॑दाँ॑","ञिक्ष्वि॑दाँ॑","खि॒दँ॒","गु॑धँ॑","गु॑पँ॑","गू॑रँ॒","गृ॑धुँ॑","घू॑री॒","चू॑रीँ॒","छो॒","ज॑नीँ॒","ज॑सुँ॑","जू॑रीँ॒","जॄ॑","झॄ॑ष्","डि॑पँ॑","डी॒ङ्","त॑पँ॑","त॑मुँ॑","त॑सुँ॑","ति॑मँ॑","ती॑मँ॑","तु॑भँ॑","तु॒षँ॑","तू॑रीँ॒","तृ॑पँ॑","ञितृ॑षँ॑","त्र॑सँ॑","द॑मुँ॑","द॑सँ॒","दि॑वुँ॒","दी॑ङ्","दी॑पीँ॒","दु॒षँ॑","दू॑ङ्","दृ॑पँ॑","दो॒","द्रु॒हँ॑","धी॒ङ्","धू॑री॒","ण॑भँ॑","ण॒शँ॑","ण॒हँ॒॑","नृ॑तीँ॑","प॒दँ॒","पी॒ङ्","पु॑थँ॑","पु॑षँ॑","पु॑षँ॑","पु॑ष्पँ॑","पू॑रीँ॑","प्यु॑षँ॑","प्यु॑सँ॑","प्री॑ञ्","प्लु॑षँ॑","प्लु॑षँ॑","ब॑सुँ॑","वि॑सँ॑","बु॒धँ॒","बु॑सँ॑","बु॑सँ॑","ब्यु॑सँ॑","भ॑सुँ॑","भृ॒ञ्","भृ॑शुँ॑","भ्रं॑शुँ॑","भ्र॑मुँ॑","म॑दँ॒","मा॑नँ॒","म॑सीँ॑","मा॒ङ्","मि॑दँ॑","मी॑","मु॑सँ॑","मु॒हँ॑","मृ॑षँ॒॑","य॑सुँ॑","यु॑जँ॑","यु॒धँ॒","यु॑पँ॑","र॒ञ्जँ॒॑","र॒धँ॑","रा॒धः","रि॑षँ॑","री॒ङ्","रु॑पँ॑","रु॑षँ॑","लि॒शँ॒","ली॑","लु॑टँ॑","लु॑ठँ॑","लु॑पँ॑","लु॑भँ॑","व॑सँ॒","वा॑वृ॑तुँ॒","वा॑शृँ॒","वि॑दँ॑","बि॑सँ॑","वु॑सँ॑","वृ॑तुँ॑","वृ॑शँ॑","व्य॒धँ॑","व्यु॑षँ॑","व्यु॑षँ॑","व्यु॑सँ॑","व्री॒ङ्","व्री॑डँ॑","श॒कँ॒॑","श॒पँ॒॑","श॑मँ॒","ईँ॑शु॑चिँ॒॑र्","शु॒धँ॑","शु॒षँ॑","शू॑रीँ॒","शो॒","श्र॑मुँ॑","श्लि॑षँ॑","ष्ठि॑वुँ॑","स॑मीँ॑","ष॑हँ॑","षि॒धुँ॑","षि॑वुँ॑","षु॑हँ॑","षू॑ङ्","सृ॒जँ॒","षो॒","ष्टि॑मँ॑","ष्टी॑मँ॑","ष्टु॑पँ॑","ष्टू॑पँ॑","ष्ण॑सुँ॑","ष्णि॑हँ॑","ष्णु॑सुँ॑","ष्णु॒हँ॑","स्रि॑वुँ॑","ष्वि॒दाँ॑","हृ॑षँ॑");
$tudAdi1=array("इ॑लँ॑","इ॑षँ॑","उ॑छीँ॑","उ॑ज्झँ॑","उ॑छिँ॑","उ॑ज्झँ॑","उ॑ब्जँ॑","उ॑भँ॑","उ॑म्भँ॑","ऋ॑चँ॑","ऋ॑छँ॑","ऋ॑फँ॑","ऋ॑म्फँ॑","ऋ॑षीँ॑","क॑डँ॑","कि॑लँ॑","कुं॑सँ॑","कु॑चँ॑","कु॑टँ॒","कु॑डँ॑","कु॑णँ॑","कु॑रँ॑","कू॑ङ्","कृ॑डँ॑","कृ॑तीँ॑","कृ॒षँ॒॑","कॄ॑","क्रु॑डँ॑","क्षि॒","क्षि॒पँ॒॑","क्षु॑रँ॑","खि॒दँ॑","खु॑डँ॑","खु॑रँ॑","गु॒","गु॑जँ॑","गु॑डँ॑","गु॑फँ॑","गु॑म्फँ॑","गु॑रीँ॒","गॄ॑","घु॑टँ॑","घु॑णँ॑","घु॑रँ॑","घू॑र्णँ॑","च॑र्चँ॑","च॑लँ॑","चि॑लँ॑","चु॑टँ॑","चु॑डँ॑","चृ॑तीँ॑","छु॑टँ॑","छु॑डँ॑","छु॒पँ॑","छु॑रँ॑","ज॑र्जँ॑","जु॑टँ॑","जु॑डँ॑","जु॑डँ॑","जु॑नँ॑","जु॑षँ॑","झ॑र्झँ॑","डि॑पँ॒","ति॑लँ॑","तु॑टँ॑","तु॑डँ॑","तु॑णँ॑","तु॒दँ॒॑","तु॑पँ॑","तु॑फँ॑","तु॑म्पँ॑","तु॑म्फँ॑","तृं॑हूँ॑","तृ॒पँ॑","तृ॑फँ॑","तृ॑म्पँ॑","तृ॑म्फँ॑","तृ॑हूँ॑","त्रु॑टँ॒","त्व॑चँ॑","थु॑डँ॑","दि॒शँ॒॑","दृ॑हिँ॑","दृ॒पँ॑","दृ॑फँ॑","दृ॑भीँ॑","दृ॑म्पँ॑","दृ॑म्फँ॑","द्रु॑णँ॑","धि॒","धू॑","धू॑ञ्","धृ॒ङ्","ध्रु॒","णि॑लँ॑","णू॑","णु॒दँ॑","णु॒दँ॒॑","णू॑","पि॑सिँ॑","पि॑शँ॑","पु॑टँ॑","पु॑डँ॑","पु॑णँ॑","पु॑रँ॑","पृ॒ङ्","पृ॑डँ॑","पृ॑णँ॑","प्र॒छँ॑","बि॑लँ॑","बृ॑हूँ॑","भु॒जोँ॑","भृ॑डँ॑","भ्र॒स्जँ॒॑","भ्र॒स्जँ॒॑","टुम॒स्जोँ॑","टुम॒स्जोँ॑","मि॑छँ॑","मि॑लँ॑","मि॑लँ॒॑","मि॑षँ॑","मु॑चँ॑","मु॑टँ॑","मु॑णँ॑","मु॑रँ॑","मृ॒ङ्","मृ॑डँ॑","मृ॑णँ॑","मृ॒शँ॑","रि॒","रि॑फँ॑","रि॒शँ॑","रि॑हँ॑","रु॑जँ॑","रु॒शँ॑","ल॑जँ॑","ओँ॑ल॑स्जीँ॒","ओँ॑ल॑स्जीँ॒","लि॑खँ॑","लि॒पँ॒॑","लि॒शँ॑","लु॑टँ॑","लु॑ठँ॑","लु॑डँ॑","लु॒पॢँ॒॑॑","लु॑भँ॑","वि॑छँ॑","ओँ॑वि॑जीँ॒","वि॒दँ॒","वि॑धँ॑","वि॑लँ॑","वि॒शँ॑","वृ॑णँ॑","वृ॑हूँ॑","व्य॑चँ॑","ओँ॑व्र॑श्चूँ॑","व्रु॑डँ॑","श॒दॢँ॑","शि॑लँ॑","शु॑नँ॑","शु॑भँ॑","शु॑म्भँ॑","ष॒दॢँ॑","षि॒चँ॒॑","षि॑लँ॑","षु॑रँ॑","षू॑","सृ॒जँ॑","स्तृ॑हूँ॑","स्थु॑डँ॑","स्पृ॒शँ॑","स्फ॑रँ॑","स्फ॑लँ॑","स्फु॑टँ॑","स्फु॑डँ॑","स्फु॑रँ॑","स्फु॑लँ॑","हि॑लँ॑","हु॑डँ॑");
$curAdi1=array("अं॑सँ॑","अ॑हिँ॑","अ॑ङ्कँ॑","अ॑ङ्गँ॑","अ॑ञ्चुँ॑","अ॑ञ्जूँ॑","अ॑ट्टँ॑","अ॑न्धँ॑","अ॑मँ॑","अ॑र्कँ॑","अ॑र्चँ॑","अ॑र्जँ॑","अ॑र्थँ॒","अ॑र्दँ॑","अ॑र्हँ॑","अ॑र्हँ॑","आ॑ङः॒॑ क्रन्दँ","आ॑पॢँ॑","आ॒ङः॑ षदँ","इ॑लँ॑","ई॑डँ॒","ई॑रँ॒","क॑ठिँ॑","उ॑घ्र॑सँ॑","ऊ॑नँ॑","ऊ॑र्जँ॑","ओँ॑ल॑डिँ॑","क॑णँ॑","क॑ठिँ॑","क॑डिँ॑","क॑त्रँ॑","क॑त्रँ॑","क॑थँ॑","क॑र्णँ॑","क॑र्तँ॑","क॑लँ॑","क॑लँ॑","का॑लँ॑","की॑टँ॑","कु॒","कु॑शिँ॑","कु॑टँ॑","कु॑ट्टँ॑","कु॑ट्टँ॒","कु॑णँ॑","कु॑ठिँ॑","कु॑डिँ॑","कु॑डिँ॑","कु॑त्सँ॒","कु॑दृँ॑","कु॑द्रिँ॑","कु॑पँ॑","कु॑मा॑रँ॑","कु॑बिँ॑","कु॑भिँ॑","कु॑स्मँ॒","कु॑हँ॒","कू॑टँ॑","कू॑टँ॒","कू॑णँ॑","कू॑णँ॒","कृ॑पँ॑","कृ॒पे॑श्च॒॑","कॄ॑तँ॑","के॑तँ॑","क्ल॑पँ॑","क्ष॑जिँ॑","क्ष॑पँ॑","क्ष॑पिँ॑","क्ष॑लँ॑","क्षो॑टँ॑","ख॑ट्टँ॑","ख॑डँ॑","ख॑डिँ॑","खु॑डिँ॑","खे॑टँ॑","खे॑डँ॑","खो॑टँ॑","ग॑जँ॑","ग॑णँ॑","ग॑दीँ॑","ग॑न्धँ॒","ग॑र्जँ॑","ग॑र्दँ॑","ग॑र्धँ॑","ग॑र्वँ॒","ग॑र्हँ॑","ग॑लँ॒","ग॑वे॑षँ॑","गु॑णँ॑","गु॑ठिँ॑","गु॑डिँ॑","गु॑पँ॑","गु॑र्दँ॑","गू॑रीँ॒","गृ॑हँ॒","गॄ॑","गो॑मँ॑","ग्र॑न्थँ॑","ग्र॑न्थँ॑","ग्र॑सँ॑","ग्रा॑मँ॑","घ॑टँ॑","घ॑टँ॑","घ॑ट्टँ॑","घ॑टिँ॑","घु॑षिँ॑र्","घृ॒","च॑क्कँ॑","च॑टँ॑","च॑डिँ॑","च॑नँ॑","च॑पँ॑","च॑पिँ॑","च॑रँ॑","च॑र्चँ॑","च॑लँ॑","च॑हँ॑","च॑हँ॑","चि॑","चि॒ञ्","चि॑तँ॒","चि॑त्रँ॑","चि॑तिँ॑","ची॑कँ॑","ची॑वँ॑","ची॑वँ॑","चु॑क्कँ॑","चु॑टँ॑","चु॑ट्टँ॑","चु॑टिँ॑","चु॑दँ॑","चु॑बिँ॑","चु॑रँ॑","चु॑लँ॑","चू॑र्णँ॑","चू॑र्णँ॑","चृ॑पँ॑","च्यु॑","छ॑जिँ॑","छ॑दँ॑","छ॑दँ॑","छ॑दँ॑","छ॑दिँ॑","छ॑र्द॑","छि॑द्रँ॑","उँ॑छृ॑दिँ॒॑र्","छृ॑पँ॑","छे॑दँ॑","ज॑सिँ॑","ज॑भिँ॑","ज॑लँ॑","ज॑सुँ॑","ज॑सुँ॑","जि॑","चि॑","चि॑","जु॑डँ॑","जु॑षीँ॒","जॄ॑","ज्ञ॑पँ॑","ज्ञा॒","ज्रि॑","ट॑किँ॑","ड॑पँ॒","डि॑पँ॑","डि॑पँ॑","त॑सिँ॑","त॑डँ॑","त॑डँ॑","त॑नुँ॒॑","त॑त्रिँ॒","त॒पँ॒","त॑र्कँ॑","त॑र्जँ॒","त॑लँ॑","ति॑जँ॑","ति॑लँ॑","ती॑रँ॑","तु॑जँ॑","तु॑जिँ॑","तु॑जिँ॑","तु॑डिँ॑","तु॑त्थँ॑","तु॑बिँ॑","तु॑लँ॑","तू॑णँ॒","तृ॑पँ॑","तृ॑पँ॑","त्र॑सिँ॑","त्र॑सीँ॑","त्रु॑टँ॑","द॑शिँ॑","द॑शिँ॒","द॑सिँ॑","द॑सिँ॒","द॑ण्डँ॑","द॑लँ॑","द॑सुँ॑","दि॑वुँ॑","दि॑वुँ॑","दु॒","दु॑लँ॑","दृ॑पँ॑","दृ॑भीँ॑","दृ॑भँ॑","ध॑क्कँ॑","धू॑पँ॑","धू॑ञ्","धू॑पँ॑","धू॑शँ॑","धू॑षँ॑","धू॑सँ॑","ञिधृ॑षाँ॑","उँ॑ध्र॒सँ॑","ध्व॑नँ॑","न॑क्कँ॑","न॑टँ॑","न॑टँ॑","ण॑डँ॑","न॑लँ॑","नि॑वा॑सँ॑","नि॑ष्कँ॒","प॑सिँ॑","प॑सिँ॑","प॑क्षँ॑","प॑चिँ॑","प॑टँ॑","प॑टँ॑","प॑डिँ॑","प॑तँ॑","प॑थँ॑","प॑दँ॒","प॑थिँ॑","प॑र्णँ॑","प॑लँ॑","प॑ल्यू॑लँ॑","प॑शँ॑","प॑षँ॑","पा॑रँ॑","पा॑लँ॑","पि॒","पि॑छँ॑","पि॑जँ॑","पि॑जिँ॑","पि॑जिँ॒","पि॑ठिँ॑","पि॑डिँ॑","पि॑शँ॑","पि॑सँ॑","पी॑डँ॑","पुं॑सँ॑","पु॑टँ॑","पु॑टँ॑","पु॑ट्टँ॑","पु॑णँ॑","पु॑टिँ॑","पु॑थँ॑","पु॑लँ॑","पु॑षँ॑","पु॑स्तँ॑","पू॑जँ॑","पू॑रीँ॒","पू॑र्णँ॑","पू॑र्वँ॑","पू॑लँ॑","पृ॑चीँ॑","पृ॑थँ॑","प्र॑थँ॑","प्री॒ञ्","ब॑धँ॑","ब॒न्धँ॑","ब॑र्हँ॑","ब॑र्हँ॑","ब॑लँ॑","ब॑ल्हँ॑","ब॑ष्कँ॑","ब॑स्तँ॒","बि॑लँ॑","बु॑क्कँ॑","बु॑स्तँ॑","बृ॑हिँ॑","ब्रू॑सँ॑","भ॑क्षँ॑","भ॑जँ॑","भ॒ञ्जोँ॑","भ॑डिँ॑","भ॑र्त्सँ॒","भ॑लँ॒","भा॑जँ॑","भा॑मँ॑","भू॑","भू॑","भू॑षँ॑","डुभृ॒ञ्","भ्रू॑णँ॒","म॑हिँ॑","म॑डिँ॑","म॑दीँ॑","म॑नुँ॒","म॑त्रिँ॒","म॑र्चँ॑","म॑हँ॑","म॑नँ॒","मा॑नँ॑","मा॑र्गँ॑","मा॑र्जँ॑","मि॑जिँ॑","ञिमि॑दाँ॑","मि॑दिँ॑","मि॑श्रँ॑","मी॒ञ्","मु॒चॢँ॒॑॑","मु॑टँ॑","मु॑दँ॑","मु॑स्तँ॑","मू॑त्रँ॑","मू॑लँ॑","मृ॑गँ॒","मृ॑जूँ॑","मृ॑डिँ॑","मृ॑षँ॒॑","मो॑क्षँ॑","म्र॑क्षँ॑","म्र॑क्षँ॑","म्र॑छँ॑","म्ले॑छँ॑","य॑क्षँ॒","य॑तँ॑","य॑त्रिँ॑","य॑मँ॑","यु॒ञ्","यु॒जिँ॒॑र्","र॑हिँ॑","र॑कँ॑","र॑गँ॑","र॑घँ॑","र॑ङ्गँ॑","र॑घिँ॑","र॑चँ॑","र॑टँ॑","र॑सँ॑","र॑हँ॑","र॑हँ॑","रि॒चिँ॒॑र्","रु॒ङ्","रु॑","रु॒जोँ॑","रु॑टँ॑","रु॑टँ॑","रु॑षँ॑","रू॑क्षँ॑","रू॑पँ॑","ल॑क्षँ॒","ल॑क्षँ॑","ल॑गँ॑","ल॑घिँ॑","ल॑घिँ॑","ल॑जँ॑","ओँ॑ल॑जीँ॒","ल॑जिँ॑","ल॑जिँ॑","ल॑जिँ॑","ल॑डँ॑","ल॑डिँ॑","ओँ॑ल॑डिँ॑","ल॑लँ॒","ल॑सँ॑","ला॑भँ॑","लि॑गिँ॑","लि॑जिँ॑","ली॒","लु॑जिँ॑","लु॑जिँ॑","लु॑टँ॑","लु॑ण्टँ॑","लु॑ण्ठँ॑","लु॑बिँ॑","लू॑षँ॑","लो॑कृँ॑","लो॑चृँ॑","व॒चँ॑","व॑ञ्चुँ॒","व॑टँ॑","व॑टँ॑","व॑टिँ॑","व॑टिँ॑","व॑डिँ॑","व॑दँ॒॑","व॑रँ॑","व॑र्णँ॑","व॑र्णँ॑","व॑र्धँ॑","ब॑र्हँ॑","व॑र्हँ॑","व॑ल्कँ॑","ब॑ल्हँ॑","व॑सँ॑","व॑सुँ॑","व॑स्तँ॒","वा॑तँ॑","वा॑सँ॑","वि॑छँ॑","वि॒दँ॒","वि॑पँ॑","वि॑लँ॑","वि॑ष्कँ॑","वि॑ष्कँ॒","वी॑रँ॒","वृ॑ञ्","बृ॑हिँ॑","वृ॑जीँ॑","वृ॑तुँ॒","वृ॑धुँ॑","वृ॑षँ॒","वे॑लँ॑","व्य॑पँ॑","व्य॑यँ॑","व्य॑यँ॑","व्यु॑सँ॑","व्र॑जँ॑","व्र॑णँ॑","व्रू॑षँ॑","व्रू॑सँ॑","श॑ठँ॑","श॑ठँ॑","श॑ठँ॒","श॑ब्दँ॑","श॑मुँ॑","श॑म्बँ॑","शा॑न्त्वँ॑","शि॒षॢँ॑","शी॑कँ॑","शी॑कँ॑","शी॑लँ॑","शु॑ठँ॑","शु॑ठिँ॑","शु॑न्धँ॑","शु॑ल्कँ॑","शु॑ल्बँ॑","शू॑रँ॒","शू॑र्पँ॑","शृ॑धुँ॑","श्र॑णँ॑","श्र॑थँ॑","श्र॑थँ॑","श्र॑थँ॑","श्र॑न्थँ॑","श्लि॒षँ॑","श्व॑ठँ॑","श्व॑ठँ॑","श्व॑ठिँ॑","श्व॑भ्रँ॑","श्व॑र्तँ॑","श्व॑ल्कँ॑","स॑ङ्के॑तँ॑","स॑ङ्ग्रा॑मँ॒","ष॑ट्टँ॑","स॑त्रँ॒","स॑त्रँ॒","स॑भा॑जँ॑","ष॑म्बँ॑","सा॑रँ॑","ष॑हँ॑","षा॑न्त्वँ॑","सा॑मँ॑","सा॑म्बँ॑","सा॑रँ॑","सु॑खँ॑","षु॑ट्टँ॑","सू॑चँ॑","सू॑त्रँ॑","षू॑दँ॑","स्त॑नँ॑","ष्टु॑पँ॑","ष्टू॑पँ॑","स्ते॑नँ॑","स्तो॑मँ॑","स्थू॑लँ॒","ष्णि॒हँ॑","स्प॑शँ॒","स्पृ॑हँ॑","स्फि॑टँ॑","स्फि॑ट्टँ॑","स्फु॑टँ॑","स्फु॑टिँ॑","स्फु॑डिँ॑","ष्मि॑ङ्","स्मि॑टँ॑","स्य॑मँ॒","ष्व॑दँ॑","स्व॑रँ॑","स्व॑र्तँ॑","स्वा॑दँ॑","ह॑स्तँ॒","हि॑सिँ॑","हि॑ष्कँ॒","ह्र॑पँ॑","ह्ल॑पँ॑");
$adAdi1=array("अ॒दँ॑","इ॒ङ्","इ॒क्","अ॑नँ॑","अ॑सँ॑","आ॑ङः॒ शासुँ","आ॑सँ॒","इ॒ङ्","इ॒ण्","इ॒क्","ई॑डँ॑","ई॑रँ॑","ई॑शँ॒","ऊ॑र्णु॑ञ्","क॑सिँ॒","क॑शँ॒","क॑सँ॒","कु॑सिँ॑","टु॑क्षु॑","क्ष्णु॑","ख्या॒","च॑का॑सृँ॑","च॒क्षिँ॒ङ्","ज॑क्षँ॑","जा॑गृ॑","तु॑","द॑रि॑द्रा॑","दा॒प्","दि॒हँ॒॑","दी॑धी॑ङ्","दु॒हँ॒॑","द्यु॒","द्रा॒","द्वि॒षँ॒॑","णि॑सिँ॒","णि॑जिँ॒","णु॑","पा॒","पि॑जिँ॑","पृ॑चँ॑","पृ॑जिँ॒","प्रा॒","प्सा॒","ब्रू॑ञ्","भा॒","मा॒","मृ॑जूँ॑","या॒","यु॑","रा॒","रु॑सिँ॑","रु॑दिँ॑र्","ला॒","लि॒हँ॒॑","व॑चँ॑","व॑शँ॑","व॑सँ॑","वा॒","वि॑दँ॒","वी॒","वृ॑जीँ॑","वृ॑जिँ॒","वे॑वी॑ङ्","शा॑सुँ॑","शि॑जिँ॒","शी॑ङ्","श्रा॒","श्व॑सँ॑","ष॑स्तिँ॑","ष॑सँ॑","षु॒","षू॑ङ्","ष्टु॒ञ्","ष्णा॒","ष्णु॑","ञिष्व॒पँ॑","ह॒नँ॑","ह्नु॒ङ्");
$juhotyAdi1=array("ऋ॒","कि॒","कि॑तँ॑","गा॒","घृ॑","ज॑नँ॑","तु॑रँ॑","डुदा॒ञ्","ध॑नँ॑","डुधा॒ञ्","धि॑षँ॑","णि॒जिँ॒॑र्","पृ॒","पॄ॑","पॄ॒","भ॑सँ॑","ञिभी॒","भृं॑शुँ॑","मा॒ङ्","वि॒जिँ॒॑र्","वि॒षॢँ॒॑॑","सृ॒","ओँ॑हा॒ङ्","ओँ॑हा॒क्","हु॒","हृ॒","ह्री॒");
$svAdi1=array("अ॑शूँ॒","अ॑हँ॑","आ॒पॢँ॑","ऋ॑","ऋ॑धुँ॑","कृ॒ञ्","क्षि॑","क्षी॑","च॑मुँ॑","चि॑ञ्","चि॑रि॑","जि॑रि॑","ति॑कँ॑","ति॑गँ॑","तृ॑पँ॑","द॑घँ॑","द॑म्भुँ॑","दा॑शँ॑","दुः॑खँ॑","दॄ॑","धु॒ञ्","धू॑ञ्","धृ॑षँ॑","पृ॒","डुमि॒ञ्","रा॒धँ॑","रि॑","वृ॑ङ्","श॒कॢँ॑","शि॒ञ्","ष॑घँ॑","सा॒धँ॑","षि॒ञ्","षु॒ञ्","ष्टि॑घँ॒","स्तृ॒ञ्","स्पृ॒","स्मृ॒","हि॑सिँ॑");
$rudhAdi1=array("अ॑जिँ॑","ञिइ॒न्धीँ॑","उ॑न्दीँ॑","कृ॑तीँ॑","क्षु॒दिँ॒॑र्","खि॒दँ॒","छि॒दिँ॒॑र्","छृ॑दीँ॑","त॑ञ्चूँ॑","उँ॑तृ॑दिँ॒॑र्","तृ॑हँ॑","पि॒षॢँ॑","पृ॑चीँ॒","भ॑जिँ॑","भि॒दिँ॒॑र्","भु॒जँ॑","यु॒जँ॒","रि॑चँ॑","रु॒धिँ॒॑र्","वि॒चिँ॒॑र्","ओँ॑वि॑जीँ॑","वि॑दॢँ॒॑॑","वृ॑जीँ॒","शि॑षँ॑","हि॒");
$tanAdi1=array("ऋ॑णुँ॒॑","डुकृ॒ञ्","क्ष॑णुँ॒॑","क्षि॑णुँ॒॑","घृ॑णुँ॒॑","त॑नुँ॑","तृ॑णुँ॒॑","म॒नँ॒","व॑नुँ॒","ष॑नुँ॒॑");
$kryAdi1=array("अ॑शँ॑","इ॑षँ॑","ॠ","कु॑न्थँ॑","कु॑षँ॑","कॄ॑ञ्","कॄ॑","क्नू॑ञ्","डुक्री॒ञ्","क्लि॑शूँ॑","क्षी॒ष्","क्षु॑भँ॑","ख॑चँ॑","ख॑वँ॑","गु॑धँ॑","गॄ॑","ग्र॑न्थँ॑","ग्र॑हँ॒॑","जॄ॑ष्","ज्ञा॑","ज्या॒","झॄ॑","तु॑भँ॑","दॄ॑","द्रू॑ञ्","धू॑","धॄ॑","उँ॑ध्र॑सँ॑","ण॑भँ॑","नॄ॑","पु॒षँ॑","पू॑ञ्","पॄ॑","प्री॒ङ्","प्रु॑षँ॑","प्ली॒","प्लु॑षँ॑","ब॑न्धँ॑","ब्ली॒","भॄ॑","भ्री॒","म॑न्थँ॑","मी॒ङ्","मु॑षँ॑","मू॑ञ्","मृ॑डँ॑","मृ॑दँ॑","मॄ॑","यु॑","री॒","ली॒ङ्","लू॑ञ्","वि॒षँ॑","बृ॑हिँ॑","वॄ॑ञ्","वॄ॑","व्री॒","व्ली॒","शॄ॑","श्र॑न्थँ॑","श्र॑न्थँ॑","श्री॒ञ्","षि॒ञ्","स्क॒म्भुँ॑","स्कु॒ञ्","स्कु॒म्भुँ॑","स्त॒म्भुँ॑","स्तु॒म्भुँ॑","स्तॄ॑ञ्","हे॑ठँ॑","हे॑ढँ॑");
$allverbs1=array("अं॑सँ॑","अ॑हिँ॑","अ॑हिँ॒","अ॑कँ॑","अ॑क्षूँ॑","अ॑गँ॑","अ॑ङ्कँ॑","अ॑किँ॒","अ॑ङ्गँ॑","अ॑गिँ॑","अ॑घिँ॒","अ॑चुँ॒॑","अ॑जँ॑","अ॑चिँ॑","अ॑ञ्चुँ॑","अ॑ञ्चुँ॒॑","अ॑ञ्चुँ॑","अ॑जिँ॑","अ॑ञ्जूँ॑","अ॑टँ॑","अ॑ट्टँ॑","अ॑ट्टँ॒","अ॑डँ॑","अ॑ड्डँ॑","अ॑णँ॑","अ॑णँ॒","अ॑ठिँ॒","अ॑तँ॑","अ॒दँ॑","अ॑ड्डँ॑","इ॒ङ्","इ॒क्","अ॑नो॑ रु॒धँ॒","अ॑नँ॒","अ॑नँ॑","अ॑तिँ॑","अ॑दिँ॑","अ॑न्धँ॑","अ॑भ्रँ॑","अ॑मँ॑","अ॑मँ॑","अ॑बिँ॒","अ॑भिँ॒","अ॑यँ॒","अ॑यँ॒॑","अ॑र्कँ॑","अ॑र्घँ॑","अ॑र्चँ॑","अ॑र्चँ॑","अ॑र्जँ॑","अ॑र्जँ॑","अ॑र्थँ॒","अ॑र्दँ॑","अ॑र्दँ॑","अ॑र्बँ॑","अ॑र्वँ॑","अ॑र्हँ॑","अ॑र्हँ॑","अ॑र्हँ॑","अ॑लँ॑","अ॑वँ॑","अ॑शँ॑","अ॑शूँ॒","अ॑षँ॒॑","अ॑सुँ॑","अ॑सँ॒॑","अ॑सँ॑","अ॑हँ॑","आ॑ङः॒॑ क्रन्दँ","आ॑छिँ॑","आ॒पॢँ॑","आ॑पॢँ॑","आ॑ङः॒ शसि","आ॑ङः॒ शासुँ","आ॒ङः॑ षदँ","आ॑सँ॒","इ॒ङ्","इ॒ण्","इ॒क्","इ॑खँ॑","इ॑खिँ॑","इ॑गिँ॑","इ॑टँ॑","इ॑दिँ॑","ञिइ॒न्धीँ॑","इ॑विँ॑","इ॑लँ॑","इ॑लँ॑","इ॑षँ॑","इ॑षँ॑","इ॑षँ॑","ई॒ङ्","ई॑क्षँ॒","ई॑खिँ॑","ई॑खिँ॑","ई॑ज॒","ई॑जिँ॒","ई॑डँ॑","ई॑डँ॒","ई॑रँ॑","ई॑रँ॒","ई॑र्क्ष्यँ॑","ई॑र्ष्यँ॑","ई॑शँ॒","ई॑षँ॑","ई॑षँ॒","ई॑हँ॒","उ॒ङ्","उ॑क्षँ॑","उ॑खँ॑","उ॑खिँ॑","उ॑चँ॑","उ॑छीँ॑","उ॑छीँ॑","उ॑ज्झँ॑","उ॑छिँ॑","उ॑छिँ॑","उ॑ठँ॑","उ॑ठँ॒","क॑ठिँ॑","उ॑ज्झँ॑","उ॑घ्र॑सँ॑","उ॑न्दीँ॑","उ॑ब्जँ॑","उ॑भँ॑","उ॑म्भँ॑","उ॑र्दँ॒","उ॑र्वीँ॑","उ॑षँ॑","उ॑हिँ॑र्","ऊ॑ठँ॑","ऊ॑नँ॑","ऊ॑यीँ॒","ऊ॑र्जँ॑","ऊ॑र्णु॑ञ्","ऊ॑षँ॑","ऊ॑हँ॒","ऋ॒","ऋ॑","ऋ॒","ऋ॑चँ॑","ऋ॑छँ॑","ऋ॑जँ॒","ऋ॑जिँ॒","ऋ॑णुँ॒॑","ऋ॑धुँ॑","ऋ॑धुँ॑","ऋ॑फँ॑","ऋ॑म्फँ॑","ऋ॑षीँ॑","ॠ","ए॑जृँ॒","ए॑जृँ॑","ए॑ठँ॒","ए॑धँ॒","ए॑षृँ॒","ए॑षृँ॒","ओ॑खृँ॑","ओ॑णृँ॑","ओँ॑ल॑डिँ॑","क॑सिँ॒","क॑कँ॒","क॑खँ॑","क॑खेँ॑","क॑गेँ॑","क॑किँ॒","क॑चँ॒","क॑जँ॑","क॑चिँ॒","क॑टीँ॑","क॑टेँ॑","क॑ठँ॑","क॑डँ॑","क॑डँ॑","क॑ड्डँ॑","क॑णँ॑","क॑णँ॑","क॑णँ॑","क॑ठिँ॒","क॑ठिँ॑","क॑डिँ॑","क॑डिँ॑","क॑डिँ॒","क॑त्रँ॑","क॑त्थँ॒","क॑त्रँ॑","क॑थँ॑","क॑दँ॒","क॑ड्डँ॑","क॑नीँ॑","क॑दिँ॑","क॑दिँ॒","क॑पँ॒","क॑बृँ॒","क॑मुँ॒","क॑पिँ॒","क॑र्जँ॑","क॑र्णँ॑","क॑र्तँ॑","क॑र्दँ॑","क॑र्बँ॑","क॑र्वँ॑","क॑लँ॑","क॑लँ॑","क॑लँ॒","क॑ल्लँ॒","क॑शँ॒","क॑षँ॑","क॑सँ॒","क॑सँ॑","का॑क्षिँ॑","का॑चिँ॒","का॑लँ॑","का॑शृँ॒","का॑शृँ॒","का॑सृँ॒","कि॒","कि॑टँ॑","कि॑टँ॑","कि॑तँ॑","कि॑तँ॑","कि॑लँ॑","की॑टँ॑","की॑लँ॑","कु॒ङ्","कु॒","कु॑ङ्","कु॑शिँ॑","कुं॑शँ॑","कु॑सिँ॑","कुं॑सँ॑","कु॑कँ॒","कु॑चँ॑","कु॑चँ॑","कु॑चँ॑","कु॑जुँ॑","कु॑ञ्चँ॑","कु॑जिँ॑","कु॑टँ॒","कु॑टँ॑","कु॑ट्टँ॑","कु॑ट्टँ॒","कु॑डँ॑","कु॑णँ॑","कु॑णँ॑","कु॑टिँ॑","कु॑ठिँ॑","कु॑ठिँ॑","कु॑डिँ॑","कु॑डिँ॒","कु॑डिँ॑","कु॑डिँ॑","कु॑त्सँ॒","कु॑थँ॑","कु॑दृँ॑","कु॑थिँ॑","कु॑न्थँ॑","कु॑द्रिँ॑","कु॑पँ॑","कु॑पँ॑","कु॑मा॑रँ॑","कु॑बिँ॑","कु॑बिँ॑","कु॑भिँ॑","कु॑रँ॑","कु॑र्द॒","कु॑लँ॑","कु॑शँ॑","कु॑षँ॑","कु॑सँ॑","कु॑स्मँ॒","कु॑हँ॒","कू॑ङ्","कू॑जँ॑","कू॑टँ॑","कू॑टँ॒","कू॑णँ॑","कू॑णँ॒","कू॑लँ॑","डुकृ॒ञ्","कृ॒ञ्","कृ॒ञ्","कृ॑डँ॑","कृ॑विँ॑","कृ॑तीँ॑","कृ॑तीँ॑","कृ॑पँ॑","कृ॒पे॑श्च॒॑","कृ॑पँ॒","कृ॑पूँ॒","कृ॑शँ॑","कृ॒षँ॒॑","कृ॒षँ॑","कॄ॑","कॄ॑ञ्","कॄ॑","कॄ॑तँ॑","कृ॑पूँ॒","के॑तँ॑","के॑पृँ॒","के॑लृँ॑","के॑वृँ॒","कै॒","क्न॑थँ॑","क्न॑सुँ॑","क्नू॑ञ्","क्नू॑यीँ॒","क्म॑रँ॑","क्र॑थँ॑","क्र॑दँ॒","क्र॑दिँ॑","क्र॑दिँ॒","क्र॑पँ॒","क्र॑मुँ॑","डुक्री॒ञ्","क्री॑डृँ॑","क्रु॑ञ्चँ॑","क्रु॑डँ॑","क्रु॒धँ॑","क्रु॒शँ॑","क्ल॑थँ॑","क्ल॑दँ॒","क्ल॑दिँ॑","क्ल॑दिँ॒","क्ल॑पँ॑","क्ल॑मुँ॑","क्लि॑दूँ॑","क्लि॑दिँ॒","क्लि॑दिँ॑","क्लि॑शँ॒","क्लि॑शूँ॑","क्ली॑बृँ॒","क्लु॒ङ्","क्ले॑शँ॒","क्व॑णँ॑","क्व॑थेँ॑","क्ष॑जिँ॑","क्ष॑जिँ॒","क्ष॑णुँ॒॑","क्ष॑पँ॑","क्ष॒प॑य॒॑श्च॑","क्ष॑मूँ॑","क्ष॑मूँ॒ष्","क्ष॑पिँ॑","क्ष॑रँ॑","क्ष॑लँ॑","क्षि॑","क्षि॒","क्षि॒","क्षि॑णुँ॒॑","क्षि॒पँ॒॑","क्षि॒पँ॑","क्षि॑वुँ॑","क्षी॑","क्षी॑जँ॑","क्षी॑बृँ॒","क्षी॑वृँ॒","क्षी॒ष्","टु॑क्षु॑","क्षु॒दिँ॒॑र्","क्षु॒धँ॑","क्षु॑भँ॑","क्षु॑भँ॑","क्षु॑भँ॒","क्षु॑रँ॑","क्षु॑रँ॑","क्षे॑वुँ॑","क्षै॒","क्षो॑टँ॑","क्ष्णु॑","क्ष्मा॑यीँ॒","क्ष्मी॑लँ॑","ञिक्ष्वि॑दाँ॑","ञिक्ष्वि॑दाँ॑","ञिक्ष्वि॑दाँ॑","क्ष्वे॑लृँ॑","ख॑चँ॑","ख॑जँ॑","ख॑जिँ॑","ख॑टँ॑","ख॑ट्टँ॑","ख॑डँ॑","ख॑डिँ॑","ख॑डिँ॒","ख॑दँ॑","ख॑नुँ॒॑","ख॑र्जँ॑","ख॑र्दँ॑","ख॑र्बँ॑","ख॑र्वँ॑","ख॑लँ॑","ख॑वँ॑","ख॑षँ॑","खा॑दृँ॑","खि॑टँ॑","खि॒दँ॒","खि॒दँ॒","खि॒दँ॑","खु॒ङ्","खु॑जुँ॑","खु॑डँ॑","खु॑डिँ॑","खु॑रँ॑","खु॑र्द॒","खे॑टँ॑","खे॑डँ॑","खे॑लृँ॑","खे॑वृँ॒","खै॒","खो॑टँ॑","खो॑रृँ॑","खो॑लृँ॑","ख्या॒","ग॑जँ॑","ग॑जँ॑","ग॑जिँ॑","ग॑डँ॑","ग॑णँ॑","ग॑डिँ॑","ग॑डिँ॑","ग॑दीँ॑","ग॑दँ॑","ग॑न्धँ॒","ग॒मॢँ॑","ग॑र्जँ॑","ग॑र्जँ॑","ग॑र्दँ॑","ग॑र्दँ॑","ग॑र्धँ॑","ग॑र्बँ॑","ग॑र्वँ॒","ग॑र्वँ॑","ग॑र्हँ॒","ग॑र्हँ॑","ग॑लँ॑","ग॑लँ॒","ग॑ल्भँ॒","ग॑ल्हँ॒","ग॑वे॑षँ॑","गा॒ङ्","गा॒","गा॑धृँ॒","गा॑हूँ॒","गु॒ङ्","गु॒ङ्","गु॒","गु॑जँ॑","गु॑जँ॑","गु॑जिँ॑","गु॑डँ॑","गु॑णँ॑","गु॑ठिँ॑","गु॑डिँ॑","गु॑दँ॒","गु॑धँ॑","गु॑धँ॑","गु॑पँ॑","गु॑पँ॒","गु॑पूँ॑","गु॑पँ॑","गु॑फँ॑","गु॑म्फँ॑","गु॑रीँ॒","गु॑र्द॒","गु॑र्दँ॑","गु॑र्वीँ॑","गु॑हूँ॒॑","गू॑रँ॒","गू॑रीँ॒","गृ॑हूँ॒","गृ॒","गृ॑जँ॑","गृ॑जिँ॑","गृ॑धुँ॑","गृ॑हँ॒","गॄ॑","गॄ॑","गॄ॑","गे॑पृँ॒","गे॑वृँ॒","गे॑षृँ॒","गै॒","गो॑मँ॑","गो॑ष्टँ॒","ग्र॑थिँ॒","ग्र॑न्थँ॑","ग्र॑न्थँ॑","ग्र॑न्थँ॑","ग्र॑सुँ॒","ग्र॑सँ॑","ग्र॑हँ॒॑","ग्रा॑मँ॑","ग्रु॑चुँ॑","ग्ल॑सुँ॒","ग्ल॑हँ॒","ग्लु॑चुँ॑","ग्लु॑ञ्चँ॑","ग्ले॑पृँ॒","ग्ले॑पृँ॒","ग्ले॑वृँ॒","ग्ले॑षृँ॑","ग्लै॒","घ॑ग्घँ॑","घ॑घँ॑","घ॑टँ॑","घ॑टँ॒","घ॑टँ॑","घ॑ट्टँ॑","घ॑ट्टँ॒","घ॑टिँ॑","घ॑षँ॒","घ॑सॢँ॑","घि॑णिँ॒","घु॒ङ्","घु॑षिँ॒","घु॑टँ॒","घु॑टँ॑","घु॑णँ॑","घु॑णँ॒","घु॑णिँ॒","घु॑रँ॑","घु॑षिँ॑र्","घु॑षिँ॑र्","घू॑री॒","घू॑र्णँ॑","घू॑र्णँ॒","घृ॒","घृ॑","घृ॒","घृ॑णुँ॒॑","घृ॑णिँ॒","घृ॑षुँ॑","घ्रा॒","ध्रा॑घृँ॒","ङु॑ङ्","च॑का॑सृँ॑","च॑कँ॑","च॑कँ॒","च॑क्कँ॑","च॒क्षिँ॒ङ्","च॑ञ्चुँ॑","च॑टँ॑","च॑टेँ॑","च॑णँ॑","च॑डिँ॒","च॑डिँ॑","च॑तेँ॒॑","च॑देँ॒॑","च॑नँ॑","च॑नँ॑","च॑दिँ॑","च॑पँ॑","च॑पँ॑","च॑मुँ॑","च॑मुँ॑","च॑पिँ॑","च॑यँ॒","च॑रँ॑","च॑रँ॑","च॑र्चँ॑","च॑र्चँ॑","च॑र्चँ॑","च॑र्बँ॑","च॑र्वँ॑","च॑लँ॑","च॑लँ॑","च॑लँ॑","च॑षँ॒॑","च॑हँ॑","च॑हँ॑","च॑हँ॑","चा॑यृँ॒॑","चि॑","चि॑ञ्","चि॒ञ्","चि॑टँ॑","चि॑तँ॒","चि॑तीँ॑","चि॑त्रँ॑","चि॑तिँ॑","चि॑रि॑","चि॑लँ॑","चि॑ल्लँ॑","ची॑कँ॑","ची॑वँ॑","ची॑बृँ॒॑","ची॑भृँ॒","ची॑वँ॑","ची॑वृँ॒॑","चु॑क्कँ॑","चु॑च्यँ॑","चु॑टँ॑","चु॑टँ॑","चु॑ट्टँ॑","चु॑डँ॑","चु॑ड्डँ॑","चु॑टिँ॑","चु॑डिँ॑","चु॑दँ॑","चु॑ड्डँ॑","चु॑पँ॑","चु॑बिँ॑","चु॑बिँ॑","चु॑रँ॑","चु॑लँ॑","चु॑ल्लँ॑","चू॑रीँ॒","चू॑र्णँ॑","चू॑र्णँ॑","चू॑षँ॑","चृ॑तीँ॑","चृ॑पँ॑","चे॑लृँ॑","चे॑ष्टँ॒","च्यु॑","च्यु॑तिँ॑र्","छ॑जिँ॑","छ॑दँ॑","छ॑दँ॑","छ॑दँ॑","छ॑दिँ॑","छ॑मुँ॑","छ॑र्द॑","छ॑षँ॒॑","छि॒दिँ॒॑र्","छि॑द्रँ॑","छु॑टँ॑","छु॑डँ॑","छु॒पँ॑","छु॑रँ॑","उँ॑छृ॑दिँ॒॑र्","छृ॑दीँ॑","छृ॑पँ॑","छे॑दँ॑","छो॒","ज॑सिँ॑","ज॑क्षँ॑","ज॑जँ॑","ज॑जिँ॑","ज॑टँ॑","ज॑नँ॑","ज॑नीँ॒","ज॑पँ॑","ज॑भीँ॒","ज॑मुँ॑","ज॑भिँ॑","ज॑र्त्सँ॑","ज॑र्त्सँ॑","ज॑र्जँ॑","ज॑र्त्सँ॑","ज॑लँ॑","ज॑लँ॑","ज॑ल्पँ॑","ज॑षँ॑","ज॑सुँ॑","ज॑सुँ॑","ज॑सुँ॑","जा॑गृ॑","जि॑","जि॒","जिँ॒","चि॑","जि॑विँ॑","जि॑मुँ॑","जि॑रि॑","जि॑षुँ॑","जी॑वँ॑","जु॒ङ्","जु॒","जु॑गिँ॑","चि॑","जु॑टँ॑","जु॑डँ॑","जु॑डँ॑","जु॑डँ॑","जु॑तृँ॒","जु॑नँ॑","जु॑षँ॑","जु॑षीँ॒","जू॑रीँ॒","जू॑षँ॑","जृ॑भिँ॒","जॄ॑ष्","जॄ॑","जॄ॑","जे॑षृँ॒","जे॑हृँ॒","जै॒","ज्ञ॑पँ॑","ज्ञा॒","ज्ञा॑","ज्या॒","ज्यु॒ङ्","ज्यु॑तिँ॑र्","ज्रि॑","ज्रि॒","ज्व॑रँ॑","ज्व॑लँ॑","ज्व॑लँ॑","झ॑टँ॑","झ॑मुँ॑","झ॑र्त्सँ॑","झ॑र्त्सँ॑","झ॑र्झँ॑","झ॑र्त्सँ॑","झ॑षँ॑","झ॑षँ॒॑","झॄ॑","झॄ॑ष्","ट॑किँ॑","ट॑लँ॑","टि॑कृँ॒","टी॑कृँ॒","ट्व॑लँ॑","ड॑पँ॒","डि॑पँ॑","डि॑पँ॑","डि॑पँ॑","डि॑पँ॒","डी॒ङ्","डी॑ङ्","ढौ॑कृँ॒","त॑सिँ॑","त॑सिँ॑","त॑कँ॑","त॑क्षूँ॑","त॑क्षँ॑","त॑किँ॑","त॑गिँ॑","त॑ञ्चुँ॑","त॑ञ्चूँ॑","त॑टँ॑","त॑डँ॑","त॑डँ॑","त॑डिँ॒","त॑नुँ॒॑","त॑नुँ॑","त॑त्रिँ॒","त॒पँ॒","त॑पँ॑","त॒पँ॑","त॑मुँ॑","त॑यँ॒","त॑र्कँ॑","त॑र्जँ॒","त॑र्जँ॑","त॑र्दँ॑","त॑लँ॑","त॑सुँ॑","ता॑यृँ॒","ति॑कँ॑","ति॑कृँ॒","ति॑गँ॑","ति॑जँ॒","ति॑जँ॑","ति॒पृँ॒","ति॑मँ॑","ति॑लँ॑","ति॑लँ॑","ति॑लँ॑","ति॑ल्लँ॑","ती॑कृँ॒","ती॑मँ॑","ती॑रँ॑","ती॑वँ॑","तु॑","तु॑जँ॑","तु॑जँ॑","तु॑जिँ॑","तु॑जिँ॑","तु॑जिँ॑","तु॑टँ॑","तु॑डँ॑","तु॑डृँ॑","तु॑णँ॑","तु॑डिँ॑","तु॑डिँ॒","तु॑त्थँ॑","तु॒दँ॒॑","तु॑पँ॑","तु॑पँ॑","तु॑फँ॑","तु॑फँ॑","तु॑भँ॑","तु॑भँ॑","तु॑भँ॒","तु॑म्पँ॑","तु॑म्पँ॑","तु॑म्फँ॑","तु॑म्फँ॑","तु॑बिँ॑","तु॑बिँ॑","तु॑रँ॑","तु॑र्वी॑","तु॑लँ॑","तु॒षँ॑","तु॑सँ॑","तु॑हिँ॑र्","तू॑डृँ॑","तू॑णँ॒","तू॑रीँ॒","तू॑लँ॑","तू॑षँ॑","तृं॑हूँ॑","तृ॑क्षँ॑","तृ॑णुँ॒॑","उँ॑तृ॑दिँ॒॑र्","तृ॑पँ॑","तृ॑पँ॑","तृ॑पँ॑","तृ॑पँ॑","तृ॒पँ॑","तृ॑फँ॑","तृ॑म्पँ॑","तृ॑म्फँ॑","ञितृ॑षँ॑","तृ॑हूँ॑","तृ॑हँ॑","तॄ॑","ते॑जँ॑","ते॑पृँ॒","ते॑वृँ॒","त्य॒जँ॑","त्र॑सिँ॑","त्र॑क्षँ॑","त्र॑खँ॑","त्र॑किँ॒","त्र॑गिँ॑","त्र॑दिँ॑","त्र॑पूँ॒ष्","त्र॑सीँ॑","त्र॑सँ॑","त्रि॑खिँ॑","त्रु॑टँ॒","त्रु॑टँ॑","त्रु॑पँ॑","त्रु॑फँ॑","त्रु॑म्पँ॑","त्रु॑म्फँ॑","त्रै॒ङ्","त्रौ॑कृँ॒","त्व॑क्षूँ॑","त्व॑गिँ॑","त्व॑चँ॑","त्व॑ञ्चुँ॑","ञित्व॑राँ॒","त्वि॒षँ॒॑","त्स॑रँ॑","थ॑किँ॑","थु॑डँ॑","थु॑र्वी॑","द॑शिँ॑","द॑शिँ॒","दं॒शँ॑","द॑सिँ॑","द॑सिँ॒","द॑क्षँ॒","द॑क्षँ॒","द॑घँ॑","द॑घिँ॑","द॑ण्डँ॑","द॑दँ॒","द॑धँ॒","द॑मुँ॑","द॑म्भुँ॑","द॑यँ॒","द॑रि॑द्रा॑","द॑लँ॑","द॑लँ॑","दा॑शँ॑","द॑सँ॒","द॑सुँ॑","द॒हँ॑","डुदा॒ञ्","दा॒ण्","दा॒प्","दा॑नँ॒॑","दा॑शृँ॒॑","दा॑सृँ॒॑","दि॑विँ॑","दि॑वुँ॑","दि॑वुँ॒","दि॑वुँ॑","दि॒शँ॒॑","दि॒हँ॒॑","दी॑ङ्","दी॑क्षँ॒","दी॑धी॑ङ्","दी॑पीँ॒","दु॒","टु॑दु॒","दुः॑खँ॑","दु॑र्वीँ॑","दु॑लँ॑","दु॒षँ॑","दु॑हिँ॑र्","दु॒हँ॒॑","दू॑ङ्","दृ॒ङ्","दृ॑हिँ॑","दृ॑पँ॑","दृ॑पँ॑","दृ॒पँ॑","दृ॑फँ॑","दृ॑भीँ॑","दृ॑भीँ॑","दृ॑भँ॑","दृ॑म्पँ॑","दृ॑म्फँ॑","दृ॑हँ॑","दॄ॑","दॄ॑","दॄ॑","दे॒ङ्","दे॑वृँ॒","दै॒प्","दृ॒शिँ॑र्","दो॒","द्यु॒","द्यु॑तँ॒","द्यै॒","द्र॑मँ॑","द्रा॒","द्रा॑खृँ॑","द्रा॑घृँ॒","द्रा॑क्षिँ॑","द्रा॑डृँ॒","द्रा॑हृँ॒","द्रु॒","द्रु॑णँ॑","द्रु॒हँ॑","द्रू॑ञ्","द्रे॑कृँ॒","द्रै॒","द्वि॒षँ॒॑","द्वृ॒","ध॑क्कँ॑","ध॑णँ॑","ध॑नँ॑","ध॑विँ॑","डुधा॒ञ्","धा॑वुँ॒॑","धि॒","धि॑क्षँ॒","धि॑विँ॑","धि॑षँ॑","धी॒ङ्","धू॑","धु॒ञ्","धु॑क्षँ॒","धू॑पँ॑","धु॑र्वीँ॑","धू॑","धू॑ञ्","धू॑ञ्","धू॑ञ्","धू॑पँ॑","धू॑पँ॑","धू॑री॒","धू॑शँ॑","धू॑षँ॑","धू॑सँ॑","धृ॒ङ्","धृ॒ङ्","धृ॒ञ्","धृ॑जँ॑","धृ॑जिँ॑","धृ॑षँ॑","ञिधृ॑षाँ॑","धॄ॑","धे॒ट्","धे॑पृँ॒","धो॑रृँ॑","ध्मा॒","ध्मा॑क्षिँ॑","ध्यै॒","ध्र॑जँ॑","ध्र॑जिँ॑","ध्र॑णँ॑","उँ॑ध्र॑सँ॑","उँ॑ध्र॒सँ॑","ध्रा॑खृँ॑","ध्रा॑क्षिँ॑","ध्रा॑डृँ॒","ध्रि॑जँ॑","ध्रु॒","ध्रु॒","ध्रे॑कृँ॒","ध्रै॒","ध्वं॑सुँ॒","ध्व॑जँ॑","ध्व॑जिँ॑","ध्व॑णँ॑","ध्व॑नँ॑","ध्व॑नँ॑","ध्व॑नँ॑","ध्वा॑क्षिँ॑","ध्वृ॒","न॑क्कँ॑","ण॑क्षँ॑","ण॑खँ॑","ण॑खिँ॑","ण॑टँ॑","न॑टँ॑","न॑टँ॑","ण॑टँ॑","ण॑डँ॑","ण॑दँ॑","टुन॑दिँ॑","ण॑भँ॑","ण॑भँ॑","ण॑भँ॒","ण॒मँ॑","ण॑यँ॒","न॑र्दँ॑","न॑लँ॑","ण॑लँ॑","ण॒शँ॑","ण॑सँ॒","ण॒हँ॒॑","ना॑थृँ॒","ना॑धृँ॒","णा॑सृँ॒","णि॑सिँ॒","णि॑क्षँ॑","णि॒जिँ॒॑र्","णि॑जिँ॒","णि॑दृँ॒॑","णि॑दिँ॑","णि॑विँ॑","णि॑लँ॑","नि॑वा॑सँ॑","णि॑शँ॑","णि॑षुँ॑","नि॑ष्कँ॒","णी॒ञ्","णी॑लँ॑","णी॑वँ॑","णू॑","णु॑","णु॒दँ॑","णु॒दँ॒॑","णू॑","नृ॑तीँ॑","नॄ॑","नॄ॑","णे॑दृँ॒॑","णे॑षृँ॒","प॑सिँ॑","प॑सिँ॑","प॑क्षँ॑","प॑क्षँ॑","डुप॒चँ॒॑ष्","प॑चिँ॑","प॑चिँ॒","प॑टँ॑","प॑टँ॑","प॑टँ॑","प॑ठँ॑","प॑णँ॒","प॑डिँ॑","प॑डिँ॒","प॑तँ॑","प॑तॢँ॑","प॑थँ॑","प॑थेँ॑","प॑दँ॒","प॒दँ॒","प॑नँ॒","प॑थिँ॑","प॑यँ॒","प॑र्णँ॑","प॑र्दँ॒","प॑र्पँ॑","प॑र्बँ॑","प॑र्वँ॑","प॑लँ॑","प॑लँ॑","प॑ल्यू॑लँ॑","पे॑लृँ॑","प॑शँ॑","प॑षँ॑","पा॒","पा॒","पा॑रँ॑","पा॑लँ॑","पि॒","पि॑सिँ॑","पि॑छँ॑","पि॑जँ॑","पि॑जिँ॑","पि॑जिँ॑","पि॑जिँ॒","पि॑टँ॑","पि॑ठँ॑","पि॑ठिँ॑","पि॑डिँ॑","पि॑डिँ॒","पि॑विँ॑","पि॑शँ॑","पि॑शँ॑","पि॒षॢँ॑","पि॑सृँ॑","पि॑सँ॑","पी॒ङ्","पी॑डँ॑","पी॑लँ॑","पी॑वँ॑","पुं॑सँ॑","पु॑टँ॑","पु॑टँ॑","पु॑टँ॑","पु॑टँ॑","पु॑ट्टँ॑","पु॑डँ॑","पु॑डँ॑","पु॑णँ॑","पु॑णँ॑","पु॑टिँ॑","पु॑डिँ॑","पु॑थँ॑","पु॑थँ॑","पु॑थिँ॑","पु॑रँ॑","पु॑र्वँ॑","पु॑लँ॑","पु॑लँ॑","पु॑षँ॑","पु॑षँ॑","पु॒षँ॑","पु॑षँ॑","पु॑षँ॑","पु॑ष्पँ॑","पु॑स्तँ॑","पू॑ञ्","पू॑ङ्","पू॑जँ॑","पू॑यीँ॒","पू॑रीँ॑","पू॑रीँ॒","पू॑र्णँ॑","पु॑र्वँ॑","पू॑र्वँ॑","पू॑लँ॑","पू॑लँ॑","पू॑षँ॑","पृ॒","पृ॒","पृ॒ङ्","पृ॑चँ॑","पृ॑चीँ॑","पृ॑चीँ॒","पृ॑जिँ॒","पृ॑डँ॑","पृ॑णँ॑","पृ॑थँ॑","पृ॑षुँ॑","पॄ॑","पॄ॑","पॄ॒","पे॑लृँ॑","पे॑वृँ॒","पे॑षृँ॒","पे॑सृँ॑","पै॒","पै॑णृँ॑","ओँ॑प्या॑यीँ॒","प्यु॑षँ॑","प्यु॑सँ॑","प्यै॒ङ्","प्र॒छँ॑","प्र॑थँ॑","प्र॑थँ॒","प्र॑सँ॒","प्रा॒","प्री॑ञ्","प्री॒ञ्","प्री॒ङ्","प्रु॒ङ्","प्रु॑षुँ॑","प्रु॑षँ॑","प्रे॑षृँ॒","प्रै॑णृँ॑","प्रो॑थृँ॒॑","प्ल॑क्षँ॒॑","प्लि॑हँ॒","प्ली॒","प्लु॒ङ्","प्लु॑षँ॑","प्लु॑षँ॑","प्लु॑षुँ॑","प्लु॑षँ॑","प्ले॑वृँ॒","प्सा॒","फ॑क्कँ॑","फ॑णँ॑","फ॑लँ॑","ञिफ॑लाँ॑","फु॑ल्लँ॑","फे॑लृँ॑","ब॑हिँ॒","ब॑ठँ॑","ब॑णँ॑","ब॑टिँ॑","ब॑दँ॑","ब॑धँ॒","ब॑धँ॑","ब॑न्धँ॑","ब॒न्धँ॑","व॑भ्रँ॑","ब॑र्बँ॑","ब॑र्हँ॑","ब॑र्हँ॒","ब॑र्हँ॑","ब॑लँ॑","ब॑लँ॑","ब॑ल्हँ॑","ब॑ल्हँ॒","ब॑ष्कँ॑","ब॑सुँ॑","ब॑स्तँ॒","बा॑डृ॒","बा॑धृँ॒","बा॑हृँ॒","बि॑टँ॑","बि॑दिँ॑","बि॑लँ॑","बि॑लँ॑","बि॑सँ॑","वि॑सँ॑","बी॑भृँ॒","बु॑क्कँ॑","बु॑क्कँ॑","बु॑गिँ॑","बु॒धँ॒","बु॑धँ॑","बु॑धिँ॒॑र्","उँ॑बु॑न्दिँ॒॑र्","बु॑सँ॑","बु॑सँ॑","बु॑स्तँ॑","बृ॑हिँ॑","बृ॑हिँ॑","बृ॑हँ॑","बृ॑हूँ॑","बे॑सँ॑","वे॑हृँ॒","ब्यु॑सँ॑","व्र॑णँ॑","ब्रू॑ञ्","ब्रू॑सँ॑","ब्ली॒","भ॑क्षँ॒॑","भ॑क्षँ॑","भ॑जँ॑","भ॒जँ॒॑","भ॑जिँ॑","भ॒ञ्जोँ॑","भ॑टँ॑","भ॑टँ॑","भ॑णँ॑","भ॑डिँ॑","भ॑डिँ॒","भ॑दिँ॒","भ॑र्त्सँ॒","भ॑र्बँ॑","भ॑र्भँ॑","भ॑र्वँ॑","भ॑लँ॒","भ॑लँ॒","भ॑ल्लँ॒","भ॑षँ॑","भ॑सुँ॑","भ॑सँ॑","भा॒","भा॑जँ॑","भा॑मँ॑","भा॑मँ॒","भा॑षँ॒","भा॑सृँ॒","भि॑क्षँ॒","भि॒दिँ॒॑र्","ञिमि॑दाँ॒","भि॑दिँ॑","ञिभी॒","भु॒जोँ॑","भु॒जँ॑","भू॑","भू॑","भू॑","भू॑षँ॑","भू॑षँ॑","डुभृ॒ञ्","भृ॒ञ्","भृ॑शिँ॑","भृं॑शुँ॑","भृ॑जीँ॒","भृ॑डँ॑","भृ॑शुँ॑","भॄ॑","भे॑षृँ॒॑","भ्य॑सँ॒","भ्रं॑शुँ॑","भ्रं॑शुँ॑","भ्रं॑सुँ॒","भ्र॑क्षँ॒॑","भ्र॒स्जँ॒॑","भ्र॑णँ॑","भ्र॑मुँ॑","भ्र॑मुँ॑","भ्र॒स्जँ॒॑","टुभ्रा॑जृँ॒","भ्रा॑जृँ॒","टुभ्रा॑शृँ॒","भ्री॒","भ्रू॑णँ॒","भ्रे॑जृँ॒","भ्रे॑षृँ॒॑","भ्ल॑क्षँ॒॑","टुभ्ला॑शृँ॒","भ्ले॑षृँ॒॑","म॑हिँ॑","म॑हिँ॒","म॑खँ॑","म॑किँ॒","म॑खिँ॑","म॑गिँ॑","म॑घिँ॒","म॑घिँ॑","म॑चँ॒","टुम॒स्जोँ॑","म॑चिँ॒","म॑ठँ॑","म॑णँ॑","म॑ठिँ॒","म॑डिँ॒","म॑डिँ॑","म॑डिँ॑","म॑थेँ॑","म॑दँ॒","म॑दीँ॑","म॑नुँ॒","म॒नँ॒","मा॑नँ॒","म॑त्रिँ॒","म॑न्थँ॑","म॑न्थँ॑","म॑थिँ॑","म॑दिँ॒","म॑भ्रँ॑","म॑यँ॒","म॑र्चँ॑","म॑र्बँ॑","म॑र्वँ॑","म॑लँ॒","म॑ल्लँ॒","म॑वँ॑","म॑व्यँ॑","म॑शँ॑","म॑षँ॑","म॑स्कँ॒","म॑सीँ॑","म॑स्कँ॒","टुम॒स्जोँ॑","म॑हँ॑","म॑हँ॑","मा॒ङ्","मा॒","मा॒ङ्","मा॑क्षिँ॑","म॑नँ॒","मा॑नँ॑","मा॑नँ॒","मा॑र्गँ॑","मा॑र्जँ॑","मा॑हृँ॒॑","डुमि॒ञ्","मि॑छँ॑","मि॑जिँ॑","मि॑थृँ॒॑","मि॑दृँ॒॑","मि॑दँ॑","ञिमि॑दाँ॑","मि॑धृँ॒॑","मि॑दिँ॑","मि॑विँ॑","मि॑लँ॑","मि॑लँ॒॑","मि॑शँ॑","मि॑श्रँ॑","मि॑षुँ॑","मि॑षँ॑","मि॒हँ॑","मी॑","मी॒ङ्","मी॒ञ्","मी॑मृँ॑","मी॑लँ॑","मी॑वँ॑","मु॑खिँ॑","मु॑चँ॑","मु॒चॢँ॒॑॑","मु॑जँ॑","मु॑चि॒","मु॑जिँ॑","मु॑टँ॑","मु॑टँ॑","मु॑टँ॑","मु॑डँ॑","मु॑णँ॑","मु॑ठिँ॒","मु॑डिँ॑","मु॑डिँ॒","मु॑दँ॑","मु॑दँ॒","मु॑रँ॑","मु॑र्छाँ॑","मु॑र्वीँ॑","मु॑षँ॑","मु॑सँ॑","मु॑स्तँ॑","मु॒हँ॑","मू॑ञ्","मू॑ङ्","मू॑त्रँ॑","मू॑लँ॑","मू॑लँ॑","मू॑षँ॑","मृ॒ङ्","मृ॑क्षँ॑","मृ॑गँ॒","मृ॑जूँ॑","मृ॑जूँ॑","मृ॑डँ॑","मृ॑डँ॑","मृ॑णँ॑","मृ॑डिँ॑","मृ॑दँ॑","मृ॑धुँ॒॑","मृ॒शँ॑","मृ॑षँ॒॑","मृ॑षँ॒॑","मृ॑षुँ॑","मॄ॑","मे॒ङ्","मे॑थृँ॒॑","मे॑दृँ॒॑","मे॑धृँ॒॑","मे॑पृँ॒","मे॑वृँ॒","मो॑क्षँ॑","म्ना॒","म्र॑क्षँ॑","म्र॑क्षँ॑","म्र॑क्षँ॑","म्र॑छँ॑","म्र॑दँ॒","म्रु॑चुँ॑","म्रु॑ञ्चुँ॑","म्रे॑टृँ॑","म्रे॑डृँ॑","म्लु॑चुँ॑","म्लु॑ञ्चुँ॑","म्ले॑छँ॑","म्ले॑छँ॑","म्ले॑टृँ॑","म्ले॑वृँ॒","म्लै॒","य॑क्षँ॒","य॒जँ॒॑","य॑तँ॑","य॑तीँ॒","य॑त्रिँ॑","य॒भँ॑","य॒मँ॑","य॑मँ॑","य॑सुँ॑","या॒","टुया॑चृँ॒॑","यु॑","यु॒ञ्","यु॑","यु॑गिँ॑","यु॑छँ॑","यु॑जँ॑","यु॒जिँ॒॑र्","यु॒जँ॒","यु॑तृँ॒","यु॒धँ॒","यु॑पँ॑","यू॑षँ॑","ये॑षृँ॒","यौ॑टृँ॑","र॑हिँ॑","र॑हिँ॑","र॑कँ॑","र॑क्षँ॑","र॑खँ॑","र॑गँ॑","र॑गेँ॑","र॑घँ॑","र॑खिँ॑","र॑ङ्गँ॑","र॑गिँ॑","र॑घिँ॑","र॑घिँ॒","र॑चँ॑","र॒ञ्जँ॒॑","र॒ञ्जँ॒॑","र॑टँ॑","र॑टँ॑","र॑टँ॑","र॑ठँ॑","र॑णँ॑","र॑णँ॑","र॑विँ॑","र॑दँ॑","र॒धँ॑","र॑पँ॑","र॑फँ॑","र॒भँ॒","र॒मुँ॒","र॑फिँ॑","र॑बिँ॒","र॑भिँ॒","र॑यँ॒","र॑सँ॑","र॑सँ॑","र॑हँ॑","र॑हँ॑","र॑हँ॑","रा॒","रा॑खृँ॑","रा॑घृँ॒","रा॑जृँ॒॑","रा॒धँ॑","रा॒धः","रा॑सृँ॒","रि॑","रि॒","रि॑खँ॑","रि॑खिँ॑","रि॑गिँ॑","रि॑चँ॑","रि॒चिँ॒॑र्","रि॑विँ॑","रि॑फँ॑","रि॒शँ॑","रि॑षँ॑","रि॑षँ॑","रि॑हँ॑","री॒","री॒ङ्","रु॒ङ्","रु॑","रु॑शिँ॑","रु॑सिँ॑","रु॑चँ॒","रु॒जोँ॑","रु॑जँ॑","रु॑टँ॑","रु॑टँ॒","रु॑टँ॑","रु॑ठँ॑","रु॑टिँ॑","रु॑ठिँ॑","रु॑ठिँ॑","रु॑डिँ॑","रु॑दिँ॑र्","रु॒धिँ॒॑र्","रु॑पँ॑","रु॒शँ॑","रु॑षँ॑","रु॑षँ॑","रु॑षँ॑","रु॒हँ॑","रू॑क्षँ॑","रू॑पँ॑","रू॑षँ॑","रे॑कृँ॒","रे॑जृँ॒","रे॑टृँ॒॑","रे॑पृँ॒","रे॑भृँ॒","रे॑वृँ॒","रे॑षृँ॒","रै॒","रो॑डृँ॑","रौ॑डृँ॑","ल॑क्षँ॒","ल॑क्षँ॑","ल॑खँ॑","ल॑गँ॑","ल॑गेँ॑","ल॑खिँ॑","ल॑गिँ॑","ल॑घिँ॑","ल॑घिँ॑","ल॑घिँ॒","ल॑घिँ॑","ल॑छँ॑","ल॑जँ॑","ल॑जँ॑","ल॑जँ॑","ओँ॑ल॑जीँ॒","ओँ॑ल॑स्जीँ॒","ल॑जिँ॑","ल॑जिँ॑","ल॑जिँ॑","ल॑जिँ॑","ल॑टँ॑","ल॑डँ॑","ल॑डँ॑","ल॑डिँ॑","ओँ॑ल॑डिँ॑","ल॑पँ॑","डुल॒भँ॒ष्","ल॑बिँ॒","ल॑बिँ॒","ल॑भिँ॒","ल॑यँ॒","ल॑र्बँ॑","ल॑लँ॑","ल॑लँ॒","ल॑षँ॒॑","ल॑सँ॑","ल॑सँ॑","ओँ॑ल॑स्जीँ॒","ला॒","ला॑खृँ॑","ला॑घृँ॒","ला॑जँ॑","ला॑छिँ॑","ला॑जिँ॑","ला॑भँ॑","लि॑खँ॑","लि॑खँ॑","लि॑खिँ॑","लि॑गिँ॑","लि॑गिँ॑","लि॑जिँ॑","लि॒पँ॒॑","लि॒शँ॒","लि॒शँ॑","लि॒हँ॒॑","ली॑","ली॒ङ्","ली॒","लु॑ञ्चँ॑","लु॑जिँ॑","लु॑जिँ॑","लु॑टँ॒","लु॑टँ॑","लु॑टँ॑","लु॑टँ॑","लु॑टँ॑","लु॑ठँ॒","लु॑ठँ॑","लु॑ठँ॑","लु॑ठँ॑","लु॑डँ॑","लु॑डँ॑","लु॑ण्टँ॑","लु॑टिँ॑","लु॑ण्ठँ॑","लु॑ठिँ॑","लु॑ठिँ॑","लु॑ठिँ॑","लु॑डिँ॑","लु॑थिँ॑","लु॒पॢँ॒॑॑","लु॑पँ॑","लु॑भँ॑","लु॑भँ॑","लु॑बिँ॑","लु॑बिँ॑","लू॑ञ्","लू॑षँ॑","लू॑षँ॑","ले॑पृँ॒","लो॑कृँ॑","लो॑कृँ॒","लो॑चृँ॑","लो॑चृँ॒","लो॑डृँ॑","लो॑ष्टँ॒","व॑क्षँ॑","व॑खँ॑","व॑किँ॒","व॑किँ॒","व॑खिँ॑","व॑गिँ॑","व॑घिँ॒","व॑चँ॑","व॒चँ॑","व॑जँ॑","व॑ञ्चुँ॑","व॑ञ्चुँ॒","व॑टँ॑","व॑टँ॑","व॑टँ॑","व॑टँ॑","व॑ठँ॑","व॑णँ॑","व॑टिँ॑","व॑टिँ॑","व॑टिँ॑","व॑ठिँ॒","व॑डिँ॑","व॑डिँ॒","व॑दँ॒॑","व॑दँ॑","व॑नँ॑","व॑नुँ॑","व॑नुँ॒","व॑नँ॑","व॑दिँ॒","डुव॒पँ॒॑","व॑भ्रँ॑","टुव॑मँ॑","व॑यँ॒","व॑रँ॑","व॑र्चँ॒","व॑र्णँ॑","व॑र्णँ॑","व॑र्धँ॑","व॑र्षँ॒","ब॑र्हँ॑","व॑र्हँ॒","व॑र्हँ॑","व॑ल॒","व॑ल्कँ॑","व॑ल्गँ॑","व॑ल्भँ॒","व॑ल्लँ॒","ब॑ल्हँ॑","व॑ल्हँ॒","व॑शँ॑","व॑षँ॑","व॑स्कँ॒","व॑सँ॑","व॑सँ॒","व॒सँ॑","व॑सुँ॑","व॑सँ॑","व॑स्कँ॒","व॑स्तँ॒","व॒हँ॒॑","वा॒","वा॑क्षिँ॑","वा॑छिँ॑","वा॑डृ॒","वा॑तँ॑","वा॑वृ॑तुँ॒","वा॑शृँ॒","वा॑सँ॑","बा॑हृँ॒","वि॒चिँ॒॑र्","वि॑छँ॑","वि॑छँ॑","वि॒जिँ॒॑र्","ओँ॑वि॑जीँ॒","ओँ॑वि॑जीँ॑","वि॑टँ॑","वि॑थृँ॒","वि॑दँ॒","वि॑दँ॑","वि॑दॢँ॒॑॑","वि॒दँ॒","वि॒दँ॒","वि॑धँ॑","वि॑पँ॑","वि॑लँ॑","वि॑लँ॑","वि॒शँ॑","वि॑षुँ॑","वि॒षँ॑","वि॒षॢँ॒॑॑","वि॑ष्कँ॑","वि॑ष्कँ॒","वि॑सँ॑","बि॑सँ॑","वी॒","वी॑जँ॒","वी॑रँ॒","वु॑गिँ॑","वु॑सँ॑","वृ॑ञ्","वृ॑ञ्","वृ॑ङ्","बृ॑हिँ॑","बृ॑हिँ॑","वृ॑कँ॒","वृ॑क्षँ॒","वृ॑जीँ॑","वृ॑जीँ॒","वृ॑जीँ॑","वृ॑जिँ॒","वृ॑णँ॑","वृ॑तुँ॑","वृ॑तुँ॒","वृ॑तुँ॒","वृ॑धुँ॑","वृ॑धुँ॒","वृ॑शँ॑","वृ॑षुँ॑","वृ॑षँ॒","बृ॑हँ॑","वृ॑हूँ॑","वॄ॑ञ्","वॄ॑","वे॒ञ्","वे॑णृँ॒॑","वे॑थृँ॒","वे॑नृँ॒॑","टुवे॑पृ॒","वे॑लँ॑","वे॑लृँ॑","वे॑ल्लँ॑","वे॑वी॑ङ्","वे॑ष्टँ॒","वे॑सँ॑","वे॑हृँ॒","वे॑ल्लँ॑","ओँ॑वै॑","व्य॑चँ॑","व्य॑थँ॒","व्य॒धँ॑","व्य॑पँ॑","व्य॑यँ॑","व्य॑यँ॑","व्य॑यँ॒॑","व्यु॑षँ॑","व्यु॑षँ॑","व्यु॑सँ॑","व्यु॑सँ॑","व्ये॒ञ्","व्र॑जँ॑","व्र॑जँ॑","व्र॑जँ॑","व्र॑जिँ॑","व्र॑णँ॑","व्र॑णँ॑","ओँ॑व्र॑श्चूँ॑","व्री॒","व्री॒ङ्","व्री॑डँ॑","व्रु॑डँ॑","व्रू॑षँ॑","व्रू॑सँ॑","व्ली॒","शं॑सुँ॑","श॒कँ॒॑","श॒कॢँ॑","श॑किँ॒","श॑चँ॒","श॑टँ॑","श॑ठँ॑","श॑ठँ॑","श॑ठँ॑","श॑ठँ॒","श॑णँ॑","श॑डिँ॒","श॒दॢँ॑","श॒दॢँ॑","श॒पँ॒॑","श॒पँ॒॑","श॑ब्दँ॑","श॑मँ॒","श॑मुँ॑","श॑म्बँ॑","श॑र्बँ॑","श॑र्वँ॑","श॑लँ॑","श॑लँ॒","श॑ल्भँ॒","श॑वँ॑","श॑शँ॑","श॑षँ॑","श॑सुँ॑","शा॑खृँ॑","शा॑डृँ॒","शा॑नँ॒॑","शा॑न्त्वँ॑","शा॑सुँ॑","शि॒ञ्","शि॑क्षँ॒","शि॑खिँ॑","शि॑घिँ॑","शि॑जिँ॒","शि॑टँ॑","शि॑लँ॑","शि॑षँ॑","शि॑षँ॑","शि॒षॢँ॑","शी॑ङ्","शी॑कँ॑","शी॑कँ॑","शी॑कृँ॒","शी॑भृँ॒","शी॑लँ॑","शी॑लँ॑","शु॑कँ॑","ईँ॑शु॑चिँ॒॑र्","शु॑चँ॑","शु॑च्यँ॑","शु॑ठँ॑","शु॑ठँ॑","शु॑ठिँ॑","शु॑ठिँ॑","शु॑ठिँ॑","शु॒धँ॑","शु॑नँ॑","शु॑न्धँ॑","शु॑न्धँ॑","शु॑भँ॑","शु॑भँ॑","शु॑भँ॒","शु॑म्भँ॑","शु॑म्भँ॑","शु॑ल्कँ॑","शु॑ल्बँ॑","शु॒षँ॑","शू॑रँ॒","शू॑रीँ॒","शू॑र्पँ॑","शू॑लँ॑","शू॑षँ॑","शृ॑धुँ॒॑","शृ॑धुँ॑","शृ॑धुँ॒","शॄ॑","शे॑लृँ॑","शे॑वृँ॒","शै॒","शो॒","शो॑णृँ॑","शौ॑टृँ॑","श्चु॑तिँ॑र्","श्च्यु॑तिँ॑र्","श्न॑थँ॑","श्मी॑लँ॑","स्य॑न्दूँ॒","च्यु॒ङ्","श्यै॒ङ्","स्रं॑सुँ॒","स्रं॑सुँ॒","श्र॑किँ॒","श्र॑गिँ॑","श्र॑णँ॑","श्र॑णँ॑","श्र॑थँ॑","श्र॑थँ॑","श्र॑थँ॑","श्र॑थँ॑","श्र॑न्थँ॑","श्र॑न्थँ॑","श्र॑न्थँ॑","श्र॑थिँ॒","श्र॑मुँ॑","श्र॑म्भुँ॒","श्रा॒","श्रा॑","श्रि॑ञ्","श्रि॑षुँ॑","श्री॒ञ्","श्रु॒","श्रै॒","श्रो॑णृँ॑","श्ल॑किँ॒","श्ल॑गिँ॑","श्ल॑थँ॑","श्ला॑खृँ॑","श्ला॑घृँ॒","श्लि॑षुँ॑","श्लि॒षँ॑","श्लि॑षँ॑","श्लो॑कृँ॒","श्लो॑णृँ॑","श्व॑किँ॒","श्र॑गिँ॑","श्व॑चँ॒","श्व॑चिँ॒","श्व॑ठँ॑","श्व॑ठँ॑","श्व॑ठिँ॑","श्व॑भ्रँ॑","श्व॑र्तँ॑","श्व॑लँ॑","श्व॑ल्कँ॑","श्व॑ल्लँ॑","श्व॑सँ॑","टुओँश्वि॑","श्वि॑ताँ॑","श्वि॑दिँ॒","ष्ट्यै॒","ष्ठि॑वुँ॑","ष्ठि॑वुँ॑","ष्व॑स्कँ॒","ष्व॑स्कँ॒","ष॑स्तिँ॑","ष॑गेँ॑","स॑ङ्के॑तँ॑","स॑ङ्ग्रा॑मँ॒","ष॑चँ॒॑","ष॑चँ॒","ष॒ञ्जँ॑","ष॑टँ॑","ष॑ट्टँ॑","स॑त्रँ॒","स॑त्रँ॒","ष॒दॢँ॑","ष॒दॢँ॑","ष॑घँ॑","ष॑नुँ॒॑","ष॑नँ॑","ष॑पँ॑","स॑भा॑जँ॑","ष॑मँ॑","स॑मीँ॑","ष॑म्बँ॑","सा॑रँ॑","ष॑र्क्षँ॑","ष॑र्जँ॑","ष॑र्बँ॑","ष॑र्वँ॑","ष॑लँ॑","ष॑सँ॑","ष॑स्जँ॑","ष॑हँ॑","ष॑हँ॑","ष॑हँ॒","सा॒धँ॑","षा॑न्त्वँ॑","सा॑मँ॑","सा॑म्बँ॑","सा॑रँ॑","षि॒ञ्","षि॒ञ्","षि॒चँ॒॑","षि॑टँ॑","षि॑धँ॑","षि॑धूँ॑","षि॒धुँ॑","षि॑विँ॑","षि॑भुँ॑","षि॑म्भुँ॑","षि॑लँ॑","षि॑वुँ॑","सी॑कृँ॒","षु॒ञ्","षु॒","षु॒","सु॑खँ॑","षु॑ट्टँ॑","षु॑रँ॑","षु॑हँ॑","षू॑ङ्","षू॑ङ्","षू॑","सू॑चँ॑","सू॑त्रँ॑","षू॑दँ॒","षू॑दँ॑","सू॑र्क्षँ॑","षू॑र्क्ष्यँ॑","सू॑षँ॑","सृ॒","सृ॒","सृ॒जँ॒","सृ॒जँ॑","सृ॒पॢँ॑","षृ॑भुँ॑","षृ॑म्भुँ॑","से॑कृँ॒","षे॑लृँ॑","षे॑वृँ॒","षै॒","षो॒","स्क॒न्दिँ॑र्","स्क॒म्भुँ॑","स्क॑भिँ॒","स्कु॒ञ्","स्कु॑दिँ॒","स्कु॒म्भुँ॑","स्ख॑दँ॒","स्ख॑लँ॑","ष्ट॑कँ॑","स्त॑नँ॑","ष्ट॑नँ॑","ष्ट॑मँ॑","ष्ट॑भिँ॒","स्त॒म्भुँ॑","ष्ठ॑लँ॑","ष्टि॑घँ॒","ष्टि॑पृँ॒","ष्टि॑मँ॑","ष्टी॑मँ॑","ष्टु॒ञ्","ष्टु॑चँ॒","ष्टु॑पँ॑","ष्टु॑पँ॑","ष्टु॑भुँ॒","स्तु॒म्भुँ॑","ष्टू॑पँ॑","ष्टू॑पँ॑","स्तृ॒ञ्","ष्टृ॑क्षँ॑","स्तृ॑हूँ॑","स्तॄ॑ञ्","स्ते॑नँ॑","ष्टे॑पृँ॒","ष्टै॒","स्तो॑मँ॑","स्त्यै॒","ष्ट्र॑क्षँ॑","ष्ठ॑गेँ॑","ष्ठा॒","स्थु॑डँ॑","स्थू॑लँ॒","ष्ण॑सुँ॑","ष्णा॒","ष्णि॒हँ॑","ष्णि॑हँ॑","ष्णु॑","ष्णु॑सुँ॑","ष्णु॒हँ॑","ष्णै॒","स्प॑दिँ॒","स्प॑र्धँ॒","स्प॑शँ॒","स्प॑शँ॒॑","स्पृ॒","स्पृ॒शँ॑","स्पृ॑हँ॑","स्फ॑रँ॑","स्फ॑लँ॑","स्फा॑यीँ॒","स्फि॑टँ॑","स्फि॑ट्टँ॑","स्फु॑टँ॑","स्फु॑टँ॑","स्फु॑टँ॒","स्फु॑टिँ॑र्","स्फु॑डँ॑","स्फु॑टिँ॑","स्फु॑टिँ॑","स्फु॑डिँ॑","स्फु॑डिँ॒","स्फु॑रँ॑","स्फु॑र्छाँ॑","स्फु॑लँ॑","टुओँस्फू॑र्जाँ॑","ष्मि॑ङ्","ष्मि॒ङ्","स्मि॑टँ॑","स्मी॑लँ॑","स्मृ॒","स्मृ॑","स्मृ॒","स्य॑मुँ॑","स्य॑मँ॒","स्रं॑सुँ॒","स्र॑किँ॒","स्र॑म्भुँ॒","स्र॑म्भुँ॒","स्रि॑वुँ॑","स्रु॒","स्रे॑कृँ॒","स्रै॒","स्रो॑कृँ॒","ष्व॑किँ॒","श्र॑गिँ॑","ष्व॒ञ्जँ॒","ष्व॑दँ॒","ष्व॑दँ॑","स्व॑नँ॑","स्व॑नँ॑","ञिष्व॒पँ॑","स्व॑रँ॑","स्व॑र्तँ॑","स्व॑र्दँ॒","ष्व॑स्कँ॒","ष्व॑स्कँ॒","स्वा॑दँ॑","स्वा॑दँ॒","ष्वि॒दाँ॑","ञिष्वि॑दाँ॒","स्वृ॒","ह॑टँ॑","ह॑ठँ॑","ह॒दँ॒","ह॒नँ॑","ह॑म्मँ॑","ह॑र्यँ॑","ह॑यँ॑","ह॑लँ॑","ह॑सेँ॑","ह॑स्तँ॒","ओँ॑हा॒ङ्","ओँ॑हा॒क्","हि॒","हि॑सिँ॑","हि॑सिँ॑","हि॑क्कँ॒॑","हि॑टँ॑","हि॑डिँ॒","हि॑विँ॑","हि॑लँ॑","हि॑ष्कँ॒","हु॒","हु॑डृँ॑","हु॑डँ॑","हु॑डिँ॒","हु॑डिँ॒","हु॑र्छाँ॑","हु॑लँ॑","हु॑लँ॑","हू॑डृँ॑","हृ॒","हृ॒ञ्","हृ॑षुँ॑","हृ॑षँ॑","ह्र॑सँ॑","हे॑ठँ॑","हे॑ठँ॒","हे॑ठँ॑","हे॑डृँ॒","हे॑डँ॑","हे॑ढँ॑","हे॑पृँ॒","हे॑षृँ॒","हो॑डृँ॒","हो॑डृँ॑","ह्नु॒ङ्","ह्म॑लँ॑","ह्र॑गेँ॑","ह्र॑पँ॑","ह्र॑सँ॑","ह्रा॑दँ॒","ह्री॒","ह्री॑छँ॑","ह्रे॑षृँ॒","ह्ल॑गेँ॑","ह्ल॑पँ॑","ह्ल॑सँ॑","ह्ला॑दीँ॒","ह्व॑लँ॑","ह्वृ॒","ह्वृ॒","ह्वे॒ञ्");
// list of parasmai, Atmane and ubhayapadi.
$anudAttetverbs=array("ahi!","aki!","aGi!","awwa!","aRa!","aWi!","anuruDa!","ana!","abi!","aBi!","aya!","arTa!","aSU!","Asa!","Ikza!","Iji!","Iqa!","Ira!","ISa!","Iza!","Iha!","uWa!","urda!","UyI!","Uha!","fja!","fji!","ejf!","eWa!","eDa!","ezf!","ezf!","kasi!","kaka!","kaki!","kaca!","kaci!","kaWi!","kaqi!","katTa!","kada!","kadi!","kapa!","kabf!","kamu!","kapi!","kala!","kalla!","kaSa!","kasa!","kAci!","kASf!","kASf!","kAsf!","kuka!","kuwa!","kuwwa!","kuqi!","kutsa!","kusma!","kuha!","kUwa!","kURa!","kfpa!","kfpU!","kfpU!","kepf!","kevf!","knUyI!","krada!","kradi!","krapa!","klada!","kladi!","klidi!","kliSa!","klIbf!","kleSa!","kzaji!","kzamU!z","kzIbf!","kzIvf!","kzuBa!","kzmAyI!","Kaqi!","Kida!","Kida!","Kevf!","ganDa!","garva!","garha!","gala!","galBa!","galha!","gADf!","gAhU!","guda!","gupa!","gurI!","gUra!","gUrI!","gfhU!","gfha!","gepf!","gevf!","gezf!","gozwa!","graTi!","grasu!","glasu!","glaha!","glepf!","glepf!","glevf!","Gawa!","Gawwa!","Gaza!","GiRi!","Guzi!","Guwa!","GuRa!","GuRi!","GUrRa!","GfRi!","DrAGf!","caka!","cakzi!N","caqi!","caya!","cita!","cIBf!","cUrI!","cezwa!","janI!","jaBI!","ji!","jutf!","juzI!","jUrI!","jfBi!","jezf!","jehf!","wikf!","wIkf!","qapa!","qipa!","QOkf!","taqi!","tatri!","tapa!","taya!","tarja!","tAyf!","tikf!","tija!","tipf!","tIkf!","tuqi!","tuBa!","tURa!","tUrI!","tepf!","tevf!","traki!","trapU!z","truwa!","trOkf!","YitvarA!","daSi!","dasi!","dakza!","dakza!","dada!","daDa!","daya!","dasa!","divu!","dIkza!","dIpI!","devf!","dyuta!","drAGf!","drAqf!","drAhf!","drekf!","Dikza!","Dukza!","Depf!","DrAqf!","Drekf!","DvaMsu!","RaBa!","Raya!","Rasa!","nATf!","nADf!","RAsf!","Risi!","Riji!","nizka!","Rezf!","paci!","paRa!","paqi!","pada!","pada!","pana!","paya!","parda!","piji!","piqi!","pUyI!","pUrI!","pfcI!","pfji!","pevf!","pezf!","o!pyAyI!","praTa!","prasa!","prezf!","pliha!","plevf!","bahi!","baDa!","barha!","balha!","basta!","bADf!","bAhf!","bIBf!","buDa!","vehf!","Baqi!","Badi!","Bartsa!","Bala!","Bala!","Balla!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","BfjI!","Byasa!","BraMsu!","wuBrAjf!","BrAjf!","wuBrASf!","BrURa!","Brejf!","wuBlASf!","mahi!","maki!","maGi!","maca!","maci!","maWi!","maqi!","mada!","manu!","mana!","mAna!","matri!","madi!","maya!","mala!","malla!","maska!","maska!","mana!","mAna!","muWi!","muqi!","muda!","mfga!","mepf!","mevf!","mrada!","mlevf!","yakza!","yatI!","yuja!","yutf!","yuDa!","yezf!","raGi!","raBa!","ramu!","rabi!","raBi!","raya!","rAGf!","rAsf!","ruca!","ruwa!","rekf!","rejf!","repf!","reBf!","revf!","rezf!","lakza!","laGi!","o!lajI!","o!lasjI!","qulaBa!z","labi!","labi!","laBi!","laya!","lala!","o!lasjI!","lAGf!","liSa!","luwa!","luWa!","lepf!","lokf!","locf!","lozwa!","vaki!","vaki!","vaGi!","vaYcu!","vaWi!","vaqi!","vanu!","vadi!","vaya!","varca!","varza!","varha!","valBa!","valla!","valha!","vaska!","vasa!","vaska!","vasta!","vAvftu!","vASf!","bAhf!","o!vijI!","viTf!","vida!","vida!","vida!","vizka!","vIja!","vIra!","vfka!","vfkza!","vfjI!","vfji!","vftu!","vftu!","vfDu!","vfza!","veTf!","vezwa!","vehf!","vyaTa!","Saki!","Saca!","SaWa!","Saqi!","Sama!","Sala!","SalBa!","SAqf!","Sikza!","Siji!","SIkf!","SIBf!","SuBa!","SUra!","SUrI!","SfDu!","Sevf!","syandU!","sraMsu!","sraMsu!","Sraki!","SraTi!","SramBu!","Slaki!","SlAGf!","Slokf!","Svaki!","Svaca!","Svaci!","Svidi!","zvaska!","zvaska!","saNgrAma!","zaca!","satra!","satra!","zaha!","sIkf!","zUda!","sfja!","sekf!","zevf!","skaBi!","skudi!","sKada!","zwaBi!","zwiGa!","zwipf!","zwuca!","zwuBu!","zwepf!","sTUla!","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuqi!","syama!","sraMsu!","sraki!","sramBu!","sramBu!","srekf!","srokf!","zvaki!","zvaYja!","zvada!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","hada!","hasta!","hiqi!","hizka!","huqi!","huqi!","heWa!","heqf!","hepf!","hezf!","hoqf!","hrAda!","hrezf!","hlAdI!");
$svaritetverbs=array("kranda!","fRu!","kfpeSca","kfza!","kzaRu!","kzapayaSca","kziRu!","kzipa!","kzudi!r","Kanu!","guhU!","graha!","GfRu!","cate!","cade!","caza!","cAyf!","cIbf!","cIvf!","Caza!","Cidi!r","u!Cfdi!r","Jaza!","tanu!","tuda!","tfRu!","u!tfdi!r","tviza!","dAna!","dASf!","dAsf!","diSa!","diha!","duha!","dviza!","DAvu!","Raha!","Riji!r","Ridf!","Ruda!","Redf!","qupaca!z","proTf!","plakza!","buDi!r","u!bundi!r","Bakza!","Baja!","Bidi!r","Bezf!","Brakza!","Brasja!","Brasja!","Brezf!","Blakza!","Blezf!","mAhf!","miTf!","midf!","miDf!","mila!","mucx!","mfDu!","mfza!","mfza!","meTf!","medf!","meDf!","yaja!","wuyAcf!","yuji!r","raYja!","raYja!","rAjf!","rici!r","ruDi!r","rewf!","laza!","lipa!","liha!","lupx!","vada!","quvapa!","vaha!","vici!r","viji!r","vidx!","vizx!","veRf!","venf!","vyaya!","Saka!","Sapa!","Sapa!","SAna!","I!Suci!r","SfDu!","zaca!","zanu!","zica!","spaSa!","hikka!");
$Gitverbs=array("iN","iN","IN","uN","kuN","kuN","kUN","kluN","KuN","gAN","guN","guN","GuN","NuN","cakzi!N","juN","jyuN","qIN","qIN","trEN","dIN","dIDIN","dUN","dfN","deN","DIN","DfN","DfN","pIN","pUN","pfN","pyEN","prIN","pruN","pluN","mAN","mAN","mIN","mUN","mfN","meN","rIN","ruN","lIN","vfN","vevIN","vrIN","SIN","cyuN","SyEN","zUN","zUN","zmiN","zmiN","o!hAN","hnuN");
$Jitverbs=array("UrRuY","qukfY","kfY","kfY","kFY","knUY","qukrIY","ciY","ciY","qudAY","drUY","quDAY","DuY","DUY","DUY","DUY","DfY","RIY","pUY","prIY","prIY","brUY","quBfY","BfY","qumiY","mIY","mUY","yuY","lUY","vfY","vfY","vFY","veY","vyeY","SiY","SriY","SrIY","ziY","ziY","zuY","skuY","zwuY","stfY","stFY","hfY","hveY");
$parasmai=array("aka!","akzU!","aga!","agi!","aja!","aYcu!","aYjU!","awa!","aqa!","aqqa!","aRa!","ata!","ada!","aqqa!","iN","ik","ana!","ati!","adi!","aBra!","ama!","arGa!","arca!","arja!","arda!","arba!","arva!","arha!","ala!","ava!","aSa!","asu!","asa!","aha!","ACi!","Apx!","iR","ik","iKa!","iKi!","igi!","iwa!","idi!","ivi!","ila!","iza!","iza!","iza!","IKi!","IKi!","Irkzya!","Irzya!","Iza!","ukza!","uKa!","uKi!","uca!","uCI!","uCI!","ujJa!","uCi!","uCi!","uWa!","ujJa!","undI!","ubja!","uBa!","umBa!","urvI!","uza!","uhi!r","UWa!","Uza!","f","f","f","fca!","fCa!","fDu!","fDu!","fPa!","fmPa!","fzI!","F","ejf!","oKf!","oRf!","kaKa!","kaKe!","kage!","kaja!","kawI!","kawe!","kaWa!","kaqa!","kaqa!","kaqqa!","kaRa!","kaRa!","kaqi!","kaqqa!","kanI!","kadi!","karja!","karda!","karba!","karva!","kaza!","kasa!","kAkzi!","ki","kiwa!","kiwa!","kita!","kita!","kila!","kIla!","ku","kuMSa!","kuMsa!","kuca!","kuca!","kuca!","kuju!","kuYca!","kuji!","kuwa!","kuqa!","kuRa!","kuwi!","kuWi!","kuqi!","kuTa!","kuTi!","kunTa!","kupa!","kubi!","kura!","kula!","kuSa!","kuza!","kusa!","kUja!","kUla!","kfqa!","kfvi!","kftI!","kftI!","kfSa!","kfza!","kF","kF","kelf!","kE","knaTa!","knasu!","kmara!","kraTa!","kradi!","kramu!","krIqf!","kruYca!","kruqa!","kruDa!","kruSa!","klaTa!","kladi!","klamu!","klidU!","klidi!","kliSU!","kvaRa!","kvaTe!","kzapayaSca","kzamU!","kzara!","kzi","kzi","kzi","kzipa!","kzivu!","kzI","kzIja!","kzIz","wukzu","kzuDa!","kzuBa!","kzuBa!","kzura!","kzura!","kzevu!","kzE","kzRu","kzmIla!","YikzvidA!","YikzvidA!","kzvelf!","Kaca!","Kaja!","Kaji!","Kawa!","Kada!","Karja!","Karda!","Karba!","Karva!","Kala!","Kava!","Kaza!","KAdf!","Kiwa!","Kida!","Kuju!","Kuqa!","Kura!","Kelf!","KE","Korf!","Kolf!","KyA","gaja!","gaji!","gaqa!","gaqi!","gaqi!","gada!","gamx!","garja!","garda!","garba!","garva!","gala!","gA","gu","guja!","guja!","guji!","guqa!","guDa!","guDa!","gupU!","gupa!","guPa!","gumPa!","gurvI!","gf","gfja!","gfji!","gfDu!","gF","gF","gE","granTa!","grucu!","glucu!","gluYca!","glE","GagGa!","GaGa!","Gasx!","Guwa!","GuRa!","Gura!","Guzi!r","GUrRa!","Gf","Gf","Gfzu!","GrA","cakAsf!","caka!","caYcu!","cawe!","caRa!","cana!","cadi!","capa!","camu!","camu!","cara!","carca!","carca!","carba!","carva!","cala!","cala!","caha!","ciwa!","citI!","ciri","cila!","cilla!","cucya!","cuwa!","cuqa!","cuqqa!","cuqi!","cuqqa!","cupa!","cubi!","culla!","cUza!","cftI!","celf!","cyuti!r","Camu!","Cuwa!","Cuqa!","Cupa!","Cura!","Co","jakza!","jaja!","jaji!","jawa!","jana!","japa!","jamu!","jartsa!","jartsa!","jarja!","jartsa!","jala!","jalpa!","jaza!","jasu!","jAgf","ji","ji!","jivi!","jimu!","jiri","jizu!","jIva!","ju","jugi!","juwa!","juqa!","juqa!","juna!","jUza!","jFz","jF","jE","jYA","jyA","jyuti!r","jri","jvara!","jvala!","jvala!","Jawa!","Jamu!","Jartsa!","Jartsa!","JarJa!","Jartsa!","Jaza!","JF","JFz","wala!","wvala!","qipa!","qipa!","tasi!","taka!","takzU!","takza!","taki!","tagi!","taYcu!","taYcU!","tawa!","tapa!","tamu!","tarja!","tarda!","tasu!","tika!","tiga!","tima!","tila!","tila!","tilla!","tIma!","tIva!","tu","tuja!","tuji!","tuwa!","tuqa!","tuqf!","tuRa!","tupa!","tupa!","tuPa!","tuPa!","tuBa!","tuBa!","tumpa!","tumpa!","tumPa!","tumPa!","tubi!","tura!","turvI","tuza!","tusa!","tuhi!r","tUqf!","tUla!","tUza!","tfMhU!","tfkza!","tfpa!","tfpa!","tfpa!","tfPa!","tfmpa!","tfmPa!","Yitfza!","tfhU!","tfha!","tF","teja!","tyaja!","trakza!","traKa!","tragi!","tradi!","trasI!","triKi!","truwa!","trupa!","truPa!","trumpa!","trumPa!","tvakzU!","tvagi!","tvaca!","tvaYcu!","tsara!","Taki!","Tuqa!","TurvI","daMSa!","daGa!","daGi!","damu!","damBu!","daridrA","dala!","dASa!","dasu!","daha!","dAR","dAp","divi!","divu!","du","wudu","durvI!","duza!","duhi!r","dfhi!","dfpa!","dfpa!","dfPa!","dfBI!","dfmpa!","dfmPa!","dfha!","dF","dF","dF","dEp","dfSi!r","do","dyu","dyE","drama!","drA","drAKf!","drAkzi!","dru","druRa!","druha!","drE","dvf","DaRa!","Dana!","Davi!","Di","Divi!","Diza!","DU","DurvI!","DU","DUpa!","Dfja!","Dfji!","YiDfzA!","DF","Dew","Dorf!","DmA","DmAkzi!","DyE","Draja!","Draji!","DraRa!","u!Drasa!","DrAKf!","DrAkzi!","Drija!","Dru","Dru","DrE","Dvaja!","Dvaji!","DvaRa!","Dvana!","Dvana!","DvAkzi!","Dvf","Rakza!","RaKa!","RaKi!","Rawa!","Rawa!","Rada!","wunadi!","RaBa!","RaBa!","Rama!","narda!","Rala!","RaSa!","Rikza!","Ridi!","Rivi!","Rila!","RiSa!","Rizu!","RIla!","RIva!","RU","Ru","Ruda!","RU","nftI!","nF","nF","pakza!","pawa!","paWa!","patx!","paTe!","parpa!","parba!","parva!","pala!","pelf!","pA","pA","pi","piwa!","piWa!","pivi!","piSa!","pizx!","pisf!","pIla!","pIva!","puwa!","puwa!","puqa!","puqa!","puRa!","puqi!","puTa!","puTi!","pura!","purva!","pula!","puza!","puza!","puza!","puza!","puzpa!","purva!","pUla!","pUza!","pf","pf","pfcI!","pfqa!","pfRa!","pfzu!","pF","pF","pelf!","pesf!","pE","pERf!","pyuza!","pyusa!","praCa!","prA","pruzu!","pruza!","prERf!","plI","pluza!","pluza!","pluzu!","pluza!","psA","Pakka!","PaRa!","Pala!","YiPalA!","Pulla!","Pelf!","baWa!","baRa!","bawi!","bada!","banDa!","vaBra!","barba!","bala!","basu!","biwa!","bidi!","bila!","bisa!","visa!","bukka!","bugi!","buDa!","busa!","busa!","bfhi!","bfha!","bfhU!","besa!","byusa!","vraRa!","blI","BaYjo!","Bawa!","Bawa!","BaRa!","Barba!","BarBa!","Barva!","Baza!","Basu!","Basa!","BA","Bidi!","YiBI","Bujo!","Buja!","BU","BUza!","BfMSu!","Bfqa!","BfSu!","BF","BraMSu!","BraRa!","Bramu!","Bramu!","BrI","maKa!","maKi!","magi!","maGi!","wumasjo!","maWa!","maRa!","maqi!","maTe!","madI!","manTa!","manTa!","maTi!","maBra!","marba!","marva!","mava!","mavya!","maSa!","maza!","masI!","wumasjo!","maha!","mA","mAkzi!","miCa!","YimidA!","mivi!","mila!","miSa!","mizu!","miza!","miha!","mImf!","mIla!","mIva!","muKi!","muja!","muji!","muwa!","muwa!","muqa!","muRa!","muqi!","mura!","murCA!","murvI!","muza!","musa!","muha!","mUla!","mUza!","mfkza!","mfjU!","mfqa!","mfqa!","mfRa!","mfda!","mfSa!","mfzu!","mF","mnA","mrakza!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mleCa!","mlewf!","mlE","yaBa!","yama!","yasu!","yA","yu","yugi!","yuCa!","yupa!","yUza!","yOwf!","rahi!","rakza!","raKa!","rage!","raKi!","ragi!","rawa!","rawa!","raWa!","raRa!","raRa!","ravi!","rada!","raDa!","rapa!","raPa!","raPi!","rasa!","raha!","rA","rAKf!","rADa!","rADaH","ri","ri","riKa!","riKi!","rigi!","rivi!","riPa!","riSa!","riza!","riza!","riha!","rI","ru","rujo!","ruWa!","ruwi!","ruWi!","ruWi!","ruqi!","rudi!r","rupa!","ruSa!","ruza!","ruza!","ruha!","rUza!","rE","roqf!","rOqf!","laKa!","lage!","laKi!","lagi!","laGi!","laCa!","laja!","laji!","lawa!","laqa!","lapa!","larba!","lala!","lasa!","lA","lAKf!","lAja!","lACi!","lAji!","liKa!","liKa!","liKi!","ligi!","liSa!","lI","luYca!","luwa!","luwa!","luwa!","luWa!","luWa!","luWa!","luqa!","luqa!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lupa!","luBa!","luBa!","lubi!","lUza!","loqf!","vakza!","vaKa!","vaKi!","vagi!","vaca!","vaja!","vaYcu!","vawa!","vawa!","vaWa!","vaRa!","vawi!","vada!","vana!","vanu!","vana!","vaBra!","wuvama!","valga!","vaSa!","vaza!","vasa!","vasu!","vA","vAkzi!","vACi!","viCa!","o!vijI!","viwa!","vida!","viDa!","vila!","viSa!","vizu!","viza!","visa!","bisa!","vI","vugi!","vusa!","bfhi!","vfjI!","vfRa!","vfSa!","vfzu!","bfha!","vfhU!","vF","velf!","vella!","vesa!","vella!","o!vE","vyaca!","vyaDa!","vyuza!","vyuza!","vyusa!","vraja!","vraja!","vraji!","vraRa!","o!vraScU!","vrI","vrIqa!","vruqa!","vlI","SaMsu!","Sakx!","Sawa!","SaWa!","SaRa!","Sadx!","Sadx!","Samu!","Sarba!","Sarva!","Sala!","Sava!","SaSa!","Saza!","Sasu!","SAKf!","SAsu!","SiKi!","SiGi!","Siwa!","Sila!","Siza!","Sizx!","SIla!","Suka!","Suca!","Sucya!","SuWa!","SuWi!","SuWi!","SuDa!","Suna!","SunDa!","SuBa!","SuBa!","SumBa!","SumBa!","Suza!","SUla!","SUza!","SF","Self!","SE","So","SoRf!","SOwf!","Scuti!r","Scyuti!r","SnaTa!","SmIla!","Sragi!","SraRa!","SraTa!","SranTa!","SranTa!","Sramu!","SrA","SrA","Srizu!","Sru","SrE","SroRf!","Slagi!","SlaTa!","SlAKf!","Slizu!","Sliza!","SloRf!","Sragi!","Svala!","Svalla!","Svasa!","wuo!Svi","zwyE","zWivu!","zWivu!","zasti!","zage!","zasja!","zaYja!","zawa!","zadx!","zadx!","zaGa!","zana!","zapa!","zama!","samI!","zarkza!","zarja!","zarba!","zarva!","zala!","zasa!","zasja!","zaha!","sADa!","ziwa!","ziDa!","ziDU!","ziDu!","zivi!","ziBu!","zimBu!","zila!","zivu!","zu","zu","zura!","zuha!","zU","sUrkza!","zUrkzya!","sUza!","sf","sf","sfja!","sfpx!","zfBu!","zfmBu!","zelf!","zE","zo","skandi!r","skamBu!","skumBu!","sKala!","zwaka!","zwana!","zwama!","stamBu!","zWala!","zwima!","zwIma!","zwupa!","stumBu!","zwUpa!","zwfkza!","stfhU!","zwE","styE","zwrakza!","zWage!","zWA","sTuqa!","zRasu!","zRA","zRiha!","zRu","zRusu!","zRuha!","zRE","spf","spfSa!","sPara!","sPala!","sPuwa!","sPuwi!r","sPuqa!","sPuwi!","sPura!","sPurCA!","sPula!","wuo!sPUrjA!","smIla!","smf","smf","smf","syamu!","srivu!","sru","srE","Sragi!","svana!","svana!","Yizvapa!","zvidA!","svf","hawa!","haWa!","hana!","hamma!","harya!","haya!","hala!","hase!","o!hAk","hi","hisi!","hiwa!","hivi!","hila!","hu","huqf!","huqa!","hurCA!","hula!","hula!","hUqf!","hf","hfzu!","hfza!","hrasa!","heWa!","heWa!","heqa!","heQa!","hoqf!","hmala!","hrage!","hrasa!","hrI","hrICa!","hlage!","hlasa!","hvala!","hvf","hvf");
$Atmane=array("ahi!","aki!","aGi!","awwa!","aRa!","aWi!","anuruDa!","ana!","abi!","aBi!","aya!","arTa!","aSU!","ASasi","ASAsu!","Asa!","iN","YiinDI!","IN","Ikza!","Ija","Iji!","Iqa!","Ira!","ISa!","Iza!","Iha!","uN","uWa!","urda!","UyI!","Uha!","fja!","fji!","ejf!","eWa!","eDa!","ezf!","ezf!","kasi!","kaka!","kaki!","kaca!","kaci!","kaWi!","kaqi!","katTa!","kada!","kadi!","kapa!","kabf!","kamu!","kapi!","kala!","kalla!","kaSa!","kasa!","kAci!","kASf!","kASf!","kAsf!","kuN","kuN","kuka!","kuwa!","kuwwa!","kuqi!","kutsa!","kurda","kusma!","kuha!","kUN","kUwa!","kURa!","kfpa!","kfpU!","kfpU!","kepf!","kevf!","knUyI!","krada!","kradi!","krapa!","klada!","kladi!","klidi!","kliSa!","klIbf!","kluN","kleSa!","kzaji!","kzamU!z","kzIbf!","kzIvf!","kzuBa!","kzmAyI!","YikzvidA!","Kaqi!","Kida!","Kida!","KuN","Kurda","Kevf!","ganDa!","garva!","garha!","gala!","galBa!","galha!","gAN","gADf!","gAhU!","guN","guN","guda!","gupa!","gurI!","gurda","gUra!","gUrI!","gfhU!","gfha!","gF","gepf!","gevf!","gezf!","gozwa!","graTi!","grasu!","glasu!","glaha!","glepf!","glepf!","glevf!","glezf!","Gawa!","Gawwa!","Gaza!","GiRi!","GuN","Guzi!","Guwa!","GuRa!","GuRi!","GUrI","GUrRa!","GfRi!","DrAGf!","NuN","caka!","cakzi!N","caqi!","caya!","cita!","cIBf!","cUrI!","cezwa!","janI!","jaBI!","juN","jutf!","juzI!","jUrI!","jfBi!","jezf!","jehf!","jyuN","wikf!","wIkf!","qapa!","qipa!","qIN","qIN","QOkf!","taqi!","tatri!","tapa!","taya!","tarja!","tAyf!","tikf!","tija!","tipf!","tIkf!","tuqi!","tuBa!","tURa!","tUrI!","tepf!","tevf!","traki!","trapU!z","truwa!","trEN","trOkf!","YitvarA!","daSi!","dasi!","dakza!","dakza!","dada!","daDa!","daya!","dasa!","divu!","dIN","dIkza!","dIDIN","dIpI!","dUN","dfN","deN","devf!","dyuta!","drAGf!","drAqf!","drAhf!","drekf!","Dikza!","DIN","Dukza!","DUrI","DfN","DfN","Depf!","DrAqf!","Drekf!","DvaMsu!","RaBa!","Raya!","Rasa!","nATf!","nADf!","RAsf!","Risi!","Riji!","nizka!","Rezf!","paci!","paRa!","paqi!","pada!","pada!","pana!","paya!","parda!","piji!","piqi!","pIN","pUN","pUyI!","pUrI!","pfN","pfcI!","pfji!","pevf!","pezf!","o!pyAyI!","pyEN","praTa!","prasa!","prIN","pruN","prezf!","pliha!","pluN","plevf!","bahi!","baDa!","barha!","balha!","basta!","bAqf","bADf!","bAhf!","bIBf!","buDa!","vehf!","Baqi!","Badi!","Bartsa!","Bala!","Bala!","Balla!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","BfjI!","Byasa!","BraMSu!","BraMsu!","wuBrAjf!","BrAjf!","wuBrASf!","BrURa!","Brejf!","wuBlASf!","mahi!","maki!","maGi!","maca!","maci!","maWi!","maqi!","mada!","manu!","mana!","mAna!","matri!","madi!","maya!","mala!","malla!","maska!","maska!","mAN","mAN","mana!","mAna!","mIN","muci","muWi!","muqi!","muda!","mUN","mfN","mfga!","meN","mepf!","mevf!","mrada!","mlevf!","yakza!","yatI!","yu","yuja!","yutf!","yuDa!","yezf!","raGi!","raBa!","ramu!","rabi!","raBi!","raya!","rAGf!","rAsf!","rIN","ruN","ruca!","ruwa!","rekf!","rejf!","repf!","reBf!","revf!","rezf!","lakza!","laGi!","o!lajI!","o!lasjI!","qulaBa!z","labi!","labi!","laBi!","laya!","lala!","o!lasjI!","lAGf!","liSa!","lIN","luwa!","luWa!","lepf!","lokf!","locf!","lozwa!","vaki!","vaki!","vaGi!","vaYcu!","vaWi!","vaqi!","vanu!","vadi!","vaya!","varca!","varza!","varha!","vala","valBa!","valla!","valha!","vaska!","vasa!","vaska!","vasta!","vAqf","vAvftu!","vASf!","bAhf!","o!vijI!","viTf!","vida!","vida!","vida!","vizka!","vIja!","vIra!","vfN","vfka!","vfkza!","vfjI!","vfji!","vftu!","vftu!","vfDu!","vfza!","veTf!","wuvepf","vevIN","vezwa!","vehf!","vyaTa!","vrIN","Saki!","Saca!","SaWa!","Saqi!","Sama!","Sala!","SalBa!","SAqf!","Sikza!","Siji!","SIN","SIkf!","SIBf!","SuBa!","SUra!","SUrI!","SfDu!","Sevf!","syandU!","cyuN","SyEN","sraMsu!","sraMsu!","Sraki!","SraTi!","SramBu!","Slaki!","SlAGf!","Slokf!","Svaki!","Svaca!","Svaci!","SvitA!","Svidi!","zvaska!","zvaska!","saNgrAma!","zaca!","satra!","satra!","zaha!","sIkf!","zUN","zUN","zUda!","sfja!","sekf!","zevf!","skaBi!","skudi!","sKada!","zwaBi!","zwiGa!","zwipf!","zwuca!","zwuBu!","zwepf!","sTUla!","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuqi!","zmiN","syama!","sraMsu!","sraki!","sramBu!","sramBu!","srekf!","srokf!","zvaki!","zvaYja!","zvada!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","hada!","hasta!","o!hAN","hiqi!","hizka!","huqi!","huqi!","heWa!","heqf!","hepf!","hezf!","hoqf!","hnuN","hrAda!","hrezf!","hlAdI!");
$ubhaya=array("aMsa!","ahi!","aNka!","aNga!","acu!","aci!","aYcu!","aYcu!","aji!","awwa!","anDa!","ama!","aya!","arka!","arca!","arja!","arda!","arha!","arha!","aza!","asa!","Akranda!","Apx!","Asada!","ila!","Iqa!","Ira!","kaWi!","uGrasa!","Una!","Urja!","UrRuY","fRu!","o!laqi!","kaRa!","kaWi!","kaqi!","katra!","katra!","kaTa!","karRa!","karta!","kala!","kala!","kAla!","kIwa!","kuSi!","kusi!","kuwwa!","kuRa!","kuWi!","kuqi!","kuqi!","kudf!","kudri!","kupa!","kumAra!","kubi!","kuBi!","kUwa!","kURa!","qukfY","kfY","kfY","kfpa!","kfpeSca","kfza!","kFY","kFta!","keta!","knUY","qukrIY","klapa!","kzaji!","kzaRu!","kzapa!","kzapi!","kzala!","kziRu!","kzipa!","kzudi!r","kzowa!","Kawwa!","Kaqa!","Kaqi!","Kanu!","Kuqi!","Kewa!","Keqa!","Kowa!","gaja!","gaRa!","gadI!","garja!","garda!","garDa!","garha!","gaveza!","guRa!","guWi!","guqi!","gupa!","gurda!","guhU!","goma!","granTa!","granTa!","grasa!","graha!","grAma!","Gawa!","Gawa!","Gawwa!","Gawi!","Guzi!r","Gf","GfRu!","cakka!","cawa!","caqi!","cate!","cade!","cana!","capa!","capi!","cara!","carca!","cala!","caza!","caha!","caha!","cAyf!","ci","ciY","ciY","citra!","citi!","cIka!","cIva!","cIbf!","cIva!","cIvf!","cukka!","cuwa!","cuwwa!","cuwi!","cuda!","cubi!","cura!","cula!","cUrRa!","cUrRa!","cfpa!","cyu","Caji!","Cada!","Cada!","Cada!","Cadi!","Carda","Caza!","Cidi!r","Cidra!","u!Cfdi!r","CfdI!","Cfpa!","Ceda!","jasi!","jaBi!","jala!","jasu!","jasu!","ji","ci","ci","juqa!","juza!","jF","jYapa!","jri","Jaza!","waki!","qipa!","tasi!","taqa!","taqa!","tanu!","tanu!","tapa!","tarka!","tala!","tija!","tila!","tIra!","tuja!","tuji!","tuji!","tuqi!","tutTa!","tuda!","tubi!","tula!","tfRu!","u!tfdi!r","tfpa!","tfpa!","trasi!","trasa!","tviza!","daSi!","dasi!","daRqa!","dala!","qudAY","dAna!","dASf!","dAsf!","divu!","diSa!","diha!","duHKa!","dula!","duha!","dfpa!","dfBI!","dfBa!","drUY","dviza!","Dakka!","quDAY","DAvu!","DuY","DUpa!","DUY","DUY","DUY","DUpa!","DUSa!","DUza!","DUsa!","DfY","Dfza!","u!Drasa!","Dvana!","nakka!","nawa!","nawa!","Raqa!","nala!","Raha!","Riji!r","Ridf!","nivAsa!","RIY","Ruda!","Redf!","pasi!","pasi!","pakza!","qupaca!z","paci!","pawa!","pawa!","paqi!","pata!","paTa!","paTi!","parRa!","pala!","palyUla!","paSa!","paza!","pAra!","pAla!","pisi!","piCa!","pija!","piji!","piji!","piWi!","piqi!","piSa!","pisa!","pIqa!","puMsa!","puwa!","puwa!","puwwa!","puRa!","puwi!","puTa!","pula!","puza!","pusta!","pUY","pUja!","pUrI!","pUrRa!","pUrva!","pUla!","pfca!","pfTa!","pF","praTa!","prIY","prIY","proTf!","plakza!","baDa!","banDa!","barha!","barha!","bala!","balha!","bazka!","bila!","bukka!","buDi!r","u!bundi!r","busta!","bfhi!","brUY","brUsa!","Bakza!","Bakza!","Baja!","Baja!","Baji!","Baqi!","BAja!","BAma!","Bidi!r","BU","BU","BUza!","quBfY","BfY","BfSi!","Bezf!","Brakza!","Brasja!","Brasja!","Brezf!","Blakza!","Blezf!","mahi!","maqi!","marca!","maha!","mAna!","mArga!","mArja!","mAhf!","qumiY","miji!","miTf!","midf!","mida!","miDf!","midi!","mila!","miSra!","mI","mIY","muca!","mucx!","muwa!","muda!","musta!","mUY","mUtra!","mUla!","mfjU!","mfqi!","mfDu!","mfza!","mfza!","meTf!","medf!","meDf!","mokza!","mrakza!","mrakza!","mraCa!","mleCa!","yaja!","yata!","yatri!","yama!","wuyAcf!","yuY","yuja!","yuji!r","rahi!","raka!","raga!","raGa!","raNga!","raGi!","raca!","raYja!","raYja!","rawa!","rasa!","raha!","raha!","rAjf!","rica!","rici!r","ruSi!","rusi!","ruja!","ruwa!","ruwa!","ruDi!r","ruza!","rUkza!","rUpa!","rewf!","lakza!","laga!","laGi!","laGi!","laja!","laja!","laji!","laji!","laji!","laqa!","laqi!","o!laqi!","laza!","lasa!","lABa!","ligi!","liji!","lipa!","liha!","lI","luji!","luji!","luwa!","luRwa!","luRWa!","lupx!","lubi!","lUY","lUza!","lokf!","locf!","vaca!","vawa!","vawa!","vawi!","vawi!","vaqi!","vada!","quvapa!","vara!","varRa!","varRa!","varDa!","barha!","varha!","valka!","balha!","vasa!","vasa!","vaha!","vAta!","vAsa!","vici!r","viCa!","viji!r","vidx!","vipa!","vila!","vizx!","vizka!","vfY","vfY","bfhi!","vfjI!","vftu!","vfDu!","vFY","veY","veRf!","venf!","vela!","vyapa!","vyaya!","vyaya!","vyaya!","vyusa!","vyeY","vraja!","vraRa!","vrUza!","vrUsa!","Saka!","SaWa!","SaWa!","Sapa!","Sapa!","Sabda!","Samba!","SAna!","SAntva!","SiY","Siza!","SIka!","SIka!","SIla!","I!Suci!r","SuWa!","SuWi!","SunDa!","Sulka!","Sulba!","SUrpa!","SfDu!","SfDu!","SraRa!","SraTa!","SraTa!","SraTa!","SranTa!","SriY","SrIY","Sliza!","SvaWa!","SvaWa!","SvaWi!","SvaBra!","Svarta!","Svalka!","saNketa!","zaca!","zawwa!","zanu!","saBAja!","zamba!","sAra!","zaha!","zAntva!","sAma!","sAmba!","sAra!","ziY","ziY","zica!","zuY","suKa!","zuwwa!","sUca!","sUtra!","zUda!","skuY","stana!","zwuY","zwupa!","zwUpa!","stfY","stFY","stena!","stoma!","zRiha!","spaSa!","spfha!","sPiwa!","sPiwwa!","sPuwa!","sPuwi!","sPuqi!","zmiN","smiwa!","zvada!","svara!","svarta!","svAda!","hisi!","hikka!","hfY","hrapa!","hlapa!","hveY");
$sanAdilist=array("san","kyac","kAmyac","kyaz","kyaN","kvip","RiN","Ric","yak","Aya","IyaN","aN");
/* pratyayas as per sahajabodha text */
// 1st set
$sArvadhAtuka_tiG_set1_laT_parasmai=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas");
$sArvadhAtuka_tiG_set1_loT_parasmai=array("tu","tAt","tAm","antu","tAt","tam","ta","Ani","Ava","Ama",);
$sArvadhAtuka_tiG_set1_laG_parasmai=array("t","tAm","an","s","tam","t","am","va","ma");
$sArvadhAtuka_tiG_set1_vidhiliG_parasmai=array("it","itAm","iyus","is","itam","ita","iyam","iva","ima");
$sArvadhAtuka_tiG_set1_laT_Atmane=array("te","ite","ante","se","iTe","Dve","e","vahe","mahe");
$sArvadhAtuka_tiG_set1_loT_Atmane=array("tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE");
$sArvadhAtuka_tiG_set1_laG_Atmane=array("ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi");
$sArvadhAtuka_tiG_set1_vidhiliG_Atmane=array("Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// merging the members of first set sArvadhAtuka
$sArvadhAtuka_tiG_set1=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAt","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","t","am","va","ma","it","itAm","iyus","is","itam","ita","iyam","iva","ima","te","ite","ante","se","iTe","Dve","e","vahe","mahe","tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE","ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// 2nd set
$sArvadhAtuka_tiG_set2_laT_parasmai=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas");
$sArvadhAtuka_tiG_set2_loT_parasmai=array("tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama"); // tAt and hi are removed.
$sArvadhAtuka_tiG_set2_laG_parasmai=array("t","tAm","an","s","tam","ta","am","va","ma");
$sArvadhAtuka_tiG_set2_vidhiliG_parasmai=array("yAt","yAtAm","yus","yAH","yAtam","yAta","yAm","yAva","yAma");
$sArvadhAtuka_tiG_set2_laT_Atmane=array("te","Ate","ate","se","ATe","Dve","e","vahe","mahe");
$sArvadhAtuka_tiG_set2_loT_Atmane=array("tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE");
$sArvadhAtuka_tiG_set2_laG_Atmane=array("ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi");
$sArvadhAtuka_tiG_set2_vidhiliG_Atmane=array("Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// merging the members of second set sArvadhAtuka
$sArvadhAtuka_tiG_set2=array("ati","atu","us","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","ta","am","va","ma","yAt","yAtAm","yus","yAH","yAtam","yAta","yAm","yAva","yAma","te","Ate","ate","se","ATe","Dve","e","vahe","mahe","tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE","ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// sArvadhAtuka leT
$sArvadhAtuka_tiG_sArvadhAtukaleT_aDAgama_parasmai=array("ati","at","ad","atas","anti","an","asi","as","aTas","aTa","ami","am","avas","ava","amas","ama");
$sArvadhAtuka_tiG_sArvadhAtukaleT_ADAgama_parasmai=array("Ati","At","Ad","Atas","Anti","An","Asi","As","ATas","ATa","Ami","Am","Avas","Ava","Amas","Ama");
$sArvadhAtuka_tiG_sArvadhAtukaleT_aDAgama_Atmane=array("ate","atE","Ete","ante","antE","ase","asE","ETe","aDve","aDvE","e","E","avahe","avahE","amahe","amahE");
$sArvadhAtuka_tiG_sArvadhAtukaleT_ADAgama_Atmane=array("Ate","AtE","Ete","Ante","AntE","Ase","AsE","ETe","ADve","ADvE","e","E","Avahe","AvahE","Amahe","AmahE");
$sArvadhAtuka_tiG_sArvadhAtukaleT=array("ati","at","ad","atas","anti","an","asi","as","aTas","aTa","ami","am","avas","ava","amas","ama","Ati","At","Ad","Atas","Anti","An","Asi","As","ATas","ATa","Ami","Am","Avas","Ava","Amas","Ama","ate","atE","Ete","ante","antE","ase","asE","ETe","aDve","aDvE","e","E","avahe","avahE","amahe","amahE","Ate","AtE","Ete","Ante","AntE","Ase","AsE","ETe","ADve","ADvE","e","E","Avahe","AvahE","Amahe","AmahE");
// Total sArvadhAtuka tiG pratyayas.
$sArvadhAtuka_tiG_pratyayas=array("ati","at","ad","atas","anti","an","asi","as","aTas","aTa","ami","am","avas","ava","amas","ama","Ati","At","Ad","Atas","Anti","An","Asi","As","ATas","ATa","Ami","Am","Avas","Ava","Amas","Ama","ate","atE","Ete","ante","antE","ase","asE","ETe","aDve","aDvE","e","E","avahe","avahE","amahe","amahE","Ate","AtE","Ete","Ante","AntE","Ase","AsE","ETe","ADve","ADvE","e","E","Avahe","AvahE","Amahe","AmahE","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAt","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","t","am","va","ma","it","itAm","iyus","is","itam","ita","iyam","iva","ima","te","ite","ante","se","iTe","Dve","e","vahe","mahe","tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE","ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","ati","atu","us","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","ta","am","va","ma","yAt","yAtAm","yus","yAH","yAtam","yAta","yAm","yAva","yAma","te","Ate","ate","se","ATe","Dve","e","vahe","mahe","tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE","ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// sArvadhAtuka kRt pratyayas.
$sArvadhAtuka_kRt_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn");
// sArvadhAtuka vikaraNa pratyayas.
$sArvadhAtuka_vikaraNa_pratyayas=array("Sap","Syan","Snu","Sa","Snam","SnA","SAyac","SAnac");
$vikaraNa=array("ap","yan","nu","a","na","nA","Aya","Ana","u","Ri","ya");
// Total sArvadhAtuka pratyayas.
$sArvadhAtuka_pratyayas=array("ati","at","ad","atas","anti","an","asi","as","aTas","aTa","ami","am","avas","ava","amas","ama","Ati","At","Ad","Atas","Anti","An","Asi","As","ATas","ATa","Ami","Am","Avas","Ava","Amas","Ama","ate","atE","Ete","ante","antE","ase","asE","ETe","aDve","aDvE","e","E","avahe","avahE","amahe","amahE","Ate","AtE","Ete","Ante","AntE","Ase","AsE","ETe","ADve","ADvE","e","E","Avahe","AvahE","Amahe","AmahE","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAt","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","t","am","va","ma","it","itAm","iyus","is","itam","ita","iyam","iva","ima","te","ite","ante","se","iTe","Dve","e","vahe","mahe","tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE","ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","ati","atu","us","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","ta","am","va","ma","yAt","yAtAm","yus","yAH","yAtam","yAta","yAm","yAva","yAma","te","Ate","ate","se","ATe","Dve","e","vahe","mahe","tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE","ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","Sap","Syan","Snu","Sa","Snam","SnA","SAyac","SAnac");
// pit and apit sArvadhAtuka tiG pratyayas
$halAdi_pit_sArvadhAtuka_tiG_pratyayas=array("ti","si","mi","tu","t","s");
//$ajAdi_pit_sArvadhAtuka_tiG_pratyayas=array_merge(array("Ani","Ava","Ama","E","AvahE","AmahE","am"),$sArvadhAtuka_tiG_sArvadhAtukaleT);
$ajAdi_pit_sArvadhAtuka_tiG_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am",); // removed sArvadhAtukalew because it causes problems in ''anti' application to 'znu'.
$halAdi_apit_sArvadhAtuka_tiG_pratyayas=array("tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma",);
$ajAdi_apit_sArvadhAtuka_tiG_pratyayas=array("anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi",);
// pit and apit sArvadhAtuka kRt pratyayas
$ajAdi_apit_sArvadhAtuka_kRt_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn");
// pit and apit sArvadhAtuka vikaraNa pratyayas
$ajAdi_pit_sArvadhAtuka_vikaraNa_pratyayas=array("Sap");
$halAdi_apit_sArvadhAtuka_vikaraNa_pratyayas=array("Syan","Snu","Snam","SnA","SAyac","SAnac","ya"); // watch out for the 'ya' entry. It was made to make application of hali ca possible after robbing the vikaraNa zyan of it markers.
$ajAdi_apit_sArvadhAtuka_vikaraNa_pratyayas=array("Sa","SAyac","SAnac");
// ajAdi and halAdi pit total pratyayas 
$ajAdi_pit_sArvadhAtuka_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am","Sap");
$halAdi_pit_sArvadhAtuka_pratyayas=array("ti","si","mi","tu","t","s",);
// ajAdi and halAdi apit total pratyayas
$ajAdi_apit_sArvadhAtuka_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Sa","SAyac","SAnac");
$halAdi_apit_sArvadhAtuka_pratyayas=array("tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma","Syan","Snu","Snam","SnA","SAyac","SAnac","ya");
// pit pratyayas
$pit_sArvadhAtuka_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am","Sap","ti","si","mi","tu","t","s",);
// apit pratyayas
$apit_sArvadhAtuka_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Sa","SAyac","SAnac","tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma","Syan","Snu","Snam","SnA","SAyac","SAnac","ya");
// halAdi pratyayas and ajAdi pratyayas
$ajAdi_sArvadhAtuka_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am","Sap","Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Sa","SAyac","SAnac");
$halAdi_sArvadhAtuka_pratyayas=array("ti","si","mi","tu","t","s","tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma","Syan","Snu","Snam","SnA","SAyac","SAnac","ya");
// ArdhadhAtuka pratyayas trial. Not a complete list
$ajAdi_kitGit_ArdhadhAtuka_pratyayas=array("atus","u");
$halAdi_kitGit_ArdhadhAtuka_pratyayas=array("ya");
$other_ArdhadhAtuka_pratyayas=array("Ri");
$kitGit_ArdhadhAtuka_pratyayas=array("atus","u","ya");
$vikaraNa_ArdhadhAtuka_pratyayas=array("u","ya");
$ArdhadhAtuka_pratyayas=array("atus","u","ya","u","ya","Ri"); // will add others in ArdhadhAtuka prakaraNa
/* Preprocessing of verbs */
/*$sanubandhaverb=array("zage!","zaGa!","za॒ca॑!","zaca॑!","zaca॒!","zawa!","zaRu॑!","zaRa!","zaRa!","zatwa॑!","zatwa!","za॒dx!","zadx!","za॒dx!","zadx!","za॒dx!","zadx!","za॒dx!","za॒dx!","za॒dx!","za॒nja!","zanba॑!","zanba!","zapa!","zama!","zama!","zarja!","zarba!","zarva!","zala!","zasa!","zasa!","zasja!","zasti!","zasti!","za॒ha॒!","zaha॒!","zaha!","zaha॑!","zaha!","zA॒Da!","zAntva॑!","zAntva!","zi॒ca॑!","zi॒Y","zi॒Y","ziwa!","ziDu!","zi॒Du!","ziDU!","ziDU!","zila!","zivu!","zu॒","zu॒","zu॒","zu॒","zu॒","zu॒Y","zutwa॑!","zutwa!","zura!","zura!","zuha!","zuha!","zU","zUN","zUN","zU॒N","zUN","zUda॒!","zUda!","zUda॑!","zUda!","zUrkza!","zUrkzya!","zUza!","zfDf॑!","zfnBu!","zfBu!","zebf॒!","zevf॒!","zevf॒!","zE॒","zo॒","zo","zkaBi॒!","zwIma!","zwuca॒!","zwuBu॒!","zwfkza!","zwyE॒","zwyE॒","zWA॒","zWivu!","zWivu!","zRE॒","ztaka!","ztana!","ztaBi॒!","ztama!","ztama!","ztiGa॒!","ztipf॒!","ztima!","ztIma!","ztuca॒!","ztu॒Y","ztuBu॒!","ztUpa॑!","ztUpa!","ztepf॒!","ztE॒","zTage!","zTala!","zTA॒","zTuqa!","znasu!","znA॒","zni॒ha!","zniha॑!","zniha!","znu","znu","znusa","znusu!","znu॒ha!","znE॒","zmi॒N","zvakka॒!","zvakva॒!","zvada॒!","zvada!","zvada!","zva॒nja॒!","zvazka॒!","zvi॒dA","Ra॑kza!॑","Ra॑Ka!॑","Ra॑Ki!॑","Ra॑wa!॑","Ra॑qa!॑","Ra॑da!॑","wuna॑di!॑","Ra॑Ba!॑","Ra॑Ba!॒","Ra॒ma!॑","Ra॑ya!॒","Ra॑la!॑","Ra॒Sa!॑","Ra॑sa!॒","Ra॒ha!॒॑","RA॑sf!॒","Ri॑si!॒","Ri॑kza!॑","Ri॒ji!॒॑r","Ri॑ji!॒","Ri॑df!॒॑","Ri॑di!॑","Ri॑vi!॑","Ri॑la!॑","Ri॑Sa!॑","Ri॑zu!॑","RI॒Y","RI॑la!॑","RI॑va!॑","RU॑","Ru॑","Ru॒da!॑","Ru॒da!॒॑","RU॑","a॑hi!॑","a॑hi!॒","a॑ki!॒","a॑gi!॑","a॑Gi!॒","a॑ci!॑","a॑ji!॑","a॑Wi!॒","a॑ti!॑","a॑di!॑","a॑bi!॒","a॑Bi!॒","A॑Ci!॑","i॑Ki!॑","i॑gi!॑","i॑di!॑","i॑vi!॑","I॑Ki!॑","I॑Ki!॑","I॑ji!॒","u॑Ki!॑","u॑Ci!॑","u॑Ci!॑","ka॑Wi!॑","u॑hi!॑r","f॑ji!॒","o!॑la॑qi!॑","ka॑si!॒","ka॑ki!॒","ka॑ci!॒","ka॑Wi!॒","ka॑Wi!॑","ka॑qi!॑","ka॑qi!॑","ka॑qi!॒","ka॑di!॑","ka॑di!॒","ka॑pi!॒","kA॑kzi!॑","kA॑ci!॒","ku॑Si!॑","ku॑si!॑","ku॑ji!॑","ku॑wi!॑","ku॑Wi!॑","ku॑Wi!॑","ku॑qi!॑","ku॑qi!॒","ku॑qi!॑","ku॑qi!॑","ku॑Ti!॑","ku॑dri!॑","ku॑bi!॑","ku॑bi!॑","ku॑Bi!॑","kf॑vi!॑","kra॑di!॑","kra॑di!॒","kla॑di!॑","kla॑di!॒","kli॑di!॒","kli॑di!॑","kza॑ji!॑","kza॑ji!॒","kza॑pi!॑","kzu॒di!॒॑r","Ka॑ji!॑","Ka॑qi!॑","Ka॑qi!॒","Ku॑qi!॑","ga॑ji!॑","ga॑qi!॑","ga॑qi!॑","gu॑ji!॑","gu॑Wi!॑","gu॑qi!॑","gf॑ji!॑","gra॑Ti!॒","Ga॑wi!॑","Gi॑Ri!॒","Gu॑zi!॒","Gu॑Ri!॒","Gu॑zi!॑r","Gu॑zi!॑r","Gf॑Ri!॒","ca॒kzi!॒N","ca॑qi!॒","ca॑qi!॑","ca॑di!॑","ca॑pi!॑","ci॑ti!॑","cu॑wi!॑","cu॑qi!॑","cu॑bi!॑","cu॑bi!॑","cyu॑ti!॑r","Ca॑ji!॑","Ca॑di!॑","Ci॒di!॒॑r","u!॑Cf॑di!॒॑r","ja॑si!॑","ja॑ji!॑","ja॑Bi!॑","ji!॒","ji॑vi!॑","ju॑gi!॑","jf॑Bi!॒","jyu॑ti!॑r","wa॑ki!॑","ta॑si!॑","ta॑si!॑","ta॑ki!॑","ta॑gi!॑","ta॑qi!॒","ta॑tri!॒","tu॑ji!॑","tu॑ji!॑","tu॑ji!॑","tu॑qi!॑","tu॑qi!॒","tu॑bi!॑","tu॑bi!॑","tu॑hi!॑r","u!॑tf॑di!॒॑r","tra॑si!॑","tra॑ki!॒","tra॑gi!॑","tra॑di!॑","tri॑Ki!॑","tva॑gi!॑","Ta॑ki!॑","da॑Si!॑","da॑Si!॒","da॑si!॑","da॑si!॒","da॑Gi!॑","di॑vi!॑","du॑hi!॑r","df॑hi!॑","df॒Si!॑r","drA॑kzi!॑","Da॑vi!॑","Di॑vi!॑","Df॑ji!॑","DmA॑kzi!॑","Dra॑ji!॑","DrA॑kzi!॑","Dva॑ji!॑","DvA॑kzi!॑","Ra॑Ki!॑","wuna॑di!॑","Ri॑si!॒","Ri॒ji!॒॑r","Ri॑ji!॒","Ri॑di!॑","Ri॑vi!॑","pa॑si!॑","pa॑si!॑","pa॑ci!॑","pa॑ci!॒","pa॑qi!॑","pa॑qi!॒","pa॑Ti!॑","pi॑si!॑","pi॑ji!॑","pi॑ji!॑","pi॑ji!॒","pi॑Wi!॑","pi॑qi!॑","pi॑qi!॒","pi॑vi!॑","pu॑wi!॑","pu॑qi!॑","pu॑Ti!॑","pf॑ji!॒","ba॑hi!॒","ba॑wi!॑","bi॑di!॑","bu॑gi!॑","bu॑Di!॒॑r","u!॑bu॑ndi!॒॑r","bf॑hi!॑","bf॑hi!॑","Ba॑ji!॑","Ba॑qi!॑","Ba॑qi!॒","Ba॑di!॒","Bi॒di!॒॑r","Bi॑di!॑","Bf॑Si!॑","ma॑hi!॑","ma॑hi!॒","ma॑ki!॒","ma॑Ki!॑","ma॑gi!॑","ma॑Gi!॒","ma॑Gi!॑","ma॑ci!॒","ma॑Wi!॒","ma॑qi!॒","ma॑qi!॑","ma॑qi!॑","ma॑tri!॒","ma॑Ti!॑","ma॑di!॒","mA॑kzi!॑","mi॑ji!॑","mi॑di!॑","mi॑vi!॑","mu॑Ki!॑","mu॑ji!॑","mu॑Wi!॒","mu॑qi!॑","mu॑qi!॒","mf॑qi!॑","ya॑tri!॑","yu॑gi!॑","yu॒ji!॒॑r","ra॑hi!॑","ra॑hi!॑","ra॑Ki!॑","ra॑gi!॑","ra॑Gi!॑","ra॑Gi!॒","ra॑vi!॑","ra॑Pi!॑","ra॑bi!॒","ra॑Bi!॒","ri॑Ki!॑","ri॑gi!॑","ri॒ci!॒॑r","ri॑vi!॑","ru॑Si!॑","ru॑si!॑","ru॑wi!॑","ru॑Wi!॑","ru॑Wi!॑","ru॑qi!॑","ru॑di!॑r","ru॒Di!॒॑r","la॑Ki!॑","la॑gi!॑","la॑Gi!॑","la॑Gi!॑","la॑Gi!॒","la॑Gi!॑","la॑ji!॑","la॑ji!॑","la॑ji!॑","la॑ji!॑","la॑qi!॑","o!॑la॑qi!॑","la॑bi!॒","la॑bi!॒","la॑Bi!॒","lA॑Ci!॑","lA॑ji!॑","li॑Ki!॑","li॑gi!॑","li॑gi!॑","li॑ji!॑","lu॑ji!॑","lu॑ji!॑","lu॑wi!॑","lu॑Wi!॑","lu॑Wi!॑","lu॑Wi!॑","lu॑qi!॑","lu॑Ti!॑","lu॑bi!॑","lu॑bi!॑","va॑ki!॒","va॑ki!॒","va॑Ki!॑","va॑gi!॑","va॑Gi!॒","va॑wi!॑","va॑wi!॑","va॑wi!॑","va॑Wi!॒","va॑qi!॑","va॑qi!॒","va॑di!॒","vA॑kzi!॑","vA॑Ci!॑","vi॒ci!॒॑r","vi॒ji!॒॑r","vu॑gi!॑","bf॑hi!॑","bf॑hi!॑","vf॑ji!॒","vra॑ji!॑","Sa॑ki!॒","Sa॑qi!॒","Si॑Ki!॑","Si॑Gi!॑","Si॑ji!॒","I!॑Su॑ci!॒॑r","Su॑Wi!॑","Su॑Wi!॑","Su॑Wi!॑","Scu॑ti!॑r","Scyu॑ti!॑r","Sra॑ki!॒","Sra॑gi!॑","Sra॑Ti!॒","Sla॑ki!॒","Sla॑gi!॑","Sva॑ki!॒","Sra॑gi!॑","Sva॑ci!॒","Sva॑Wi!॑","Svi॑di!॒","za॑sti!॑","zi॑vi!॑","ska॒ndi!॑r","ska॑Bi!॒","sku॑di!॒","zwa॑Bi!॒","spa॑di!॒","sPu॑wi!॑r","sPu॑wi!॑","sPu॑wi!॑","sPu॑qi!॑","sPu॑qi!॒","sra॑ki!॒","zva॑ki!॒","Sra॑gi!॑","hi॑si!॑","hi॑si!॑","hi॑qi!॒","hi॑vi!॑","hu॑qi!॒","hu॑qi!॒","u॑rda!॒","u॑rvI!॑","ku॑rda!","gu॑rda!॑","gu॑rvI!॑","du॑rvI!॑","Du॑rvI!॑","pu॑rva!॑","pu॑rva!॑","mu॑rCA!॑","mu॑rvI!॑","sPu॑rCA!॑","hu॑rCA!॑");
$sanubandhaverb=  array_unique($sanubandhaverb);
$sanubandhaverb=  array_values($sanubandhaverb);
$sanubandhaverb=array_map('trim',$sanubandhaverb);
$noaccentsanubandha=array_map('removeaccent',$sanubandhaverb);
$noaccentsanubandhaslp=array_map('trim',$noaccentsanubandha);
$noaccentwithoutanusvar=array_map('removeanusvar',$noaccentsanubandhaslp);
$noaccentniranubandhaslp=array_map('verbprocess',$noaccentsanubandhaslp);*/

/* changing the pada of verb in case of upasargas */
$toatmane=array("niviSa!","parikrIY","vikrIY","avakrIY","viji","parAji","AkrIqf!","anukrIqf!","saMkrIqf!","parikrIqf!","saMsTA","avasTA","prasTA","visTA","uttapa!","vitapa!","Ayama!","Ahana!","saMgamlx!","saMfcCa!","saMpracCa!","saMsvf","saMf","saMzru","saMvidx!","nihveY","saMhveY","upahveY","vihveY","avagf","jijYA","SuSru","susmf","didfSir",);
$sutraenglish=array("nerviSaH (1.3.17)","parivyavebhyaH kriyaH (1.3.18)","parivyavebhyaH kriyaH (1.3.18)","parivyavebhyaH kriyaH (1.3.18)","viparAbhyAM jeH (1.3.19)","viparAbhyAM jeH (1.3.19)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","udvibhyAM tapaH (1.3.27)","udvibhyAM tapaH (1.3.27)","AGo yamahanaH (1.3.28)","AGo yamahanaH (1.3.28)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","avAdgraH (1.3.51)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)",);
$sutradeva=array("नेर्विशः (१.३.१७)","परिव्यवेभ्यः क्रियः (१.३.१८)","परिव्यवेभ्यः क्रियः (१.३.१८)","परिव्यवेभ्यः क्रियः (१.३.१८)","विपराभ्यां जेः (१.३.१९)","विपराभ्यां जेः (१.३.१९)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","उद्विभ्यां तपः (१.३.२७)","उद्विभ्यां तपः (१.३.२७)","आङो यमहनः (१.३.२८)","आङो यमहनः (१.३.२८)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","अवाद्ग्रः (१.३.५१)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)",);
/* Function to find pratyAhAra from given two letters */ 
// Enter your letters in the arguments like prat('Jl') will mean pratyAhAra jhal.
function prat($text)  // prat for pratyAhAra
{
global $shiv; // incorporating $shiv from arrays.
if ($text === "ra") // for circumventing the imaginary ra pratyAhAra
{
$text = array("r","l"); 
} 
elseif ($text === "yR") // for circumventing the yaN pratyAhAra because of problem of double N
{
$text = array("y","y","v","v","r","r","l","l");
}
else
{
$a = str_split($text); // separating starting letter and ending letter.
$a[1] = str_replace($a[1],"-".$a[1],$a[1]);  // adding a dash.
$text = array_slice($shiv,array_search($a[0],$shiv),array_search($a[1],$shiv)-array_search($a[0],$shiv)+1);    // taking the necessary pratyAhAra from $shiv.
$b = implode(" ",$text); // creating a single string of pratyAhAra.
$b = str_replace(" -R","",$b); // removing the end markers of pratyAhAras in between.
$b = str_replace(" -k","",$b);
$b = str_replace(" -N","",$b);
$b = str_replace(" -c","",$b);
$b = str_replace(" -w","",$b);
$b = str_replace(" -m","",$b);
$b = str_replace(" -Y","",$b);
$b = str_replace(" -z","",$b);
$b = str_replace(" -S","",$b);
$b = str_replace(" -v","",$b);
$b = str_replace(" -y","",$b);
$b = str_replace(" -r","",$b);
$b = str_replace(" -l","",$b);
$b = str_replace("a","a A",$b); // Adding the dIrgha of vowels.
$b = str_replace("i","i I",$b);
$b = str_replace("u","u U",$b);
$b = str_replace("f","f F",$b);
$b = str_replace("x","x X",$b);
$b = str_replace("y","y y",$b);
$b = str_replace("v","v V",$b);
$b = str_replace("r","r r",$b);
$b = str_replace("l","l l",$b);
$text = explode(" ",$b); // creating the array of pratyAhAra back.
}
return $text; // returning the result of function to user.
}
/* function pratyAhAra check is for checking in regular expressions. 
 * In regular expressions we don't treat arrays. usually it is 'aAiIuU'. 
 * so this function converts the pratyAhAra to this flat format. */
function pc($text) // pratyAhAra check
{
$text = "'".implode("",prat($text))."'"; // e.g. converting array("a","A") to 'aA'.
return $text; // returning the result to the user.
}
/* Function one is for replacing one letter in the whole array of $text with another letter */
// There are three arguments.
// $a is the array which you want to change. 
// $b is the array which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function one($a,$b,$merge)
{
    global $text; // taking $text from the subanta.php or sandhi.php and using it here.
    for($z=0;$z<count($text);$z++)
    {
        $p = $text[$z]; // $p is a word from the array $text.
        for($i=0;$i<count($a);$i++)
        {
            $p =  str_replace($a[$i],$b[$i],$p);    // Doing replace in $p.
        }
        $text1[$z] = $p; // storing $p in array $text1.
    }
    if ($merge === 0) // if the Adeza is mandatory.
    {
        $text = $text1; // replaced $text with $text1 (replace one)
        $text = array_unique($text); // keeping only unique values.
        $text = array_values($text); // giving new serial number to the values.
    }
    if ($merge === 1) // if the Adeza is optional.
    {
        $text = array_merge($text,$text1); // merging $text, and the replaced $text1.
        $text = array_unique($text);
        $text = array_values($text);
    }
return $text;  // giving the result to the user.
}
/* Function two is for replacing one letter in the whole array of $text with another letter */
// There are five arguments, $a,$b are the arrays which you want to change, $c,$d are the arrays which will be put in place of the replaced one.
// $merge can take five values. 
// 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
// 2 = without + sign, mandatory (apadAnta etc)
// 3 = without + sign, optional
// 4 = with + sign only, mandatory (padAnta etc)
// 5 = with + sign only, optional.
// 11 - change at the end of word only.
function two($a,$b,$c,$d,$merge) // the comments are the same as one function.
{
    global $text;
    for ($z=0;$z<count($text);$z++)
    {$p = $text[$z];
          for($i=0;$i<count($a);$i++)
          {
           for($j=0;$j<count($b);$j++)
                {
                    if($merge<2 || $merge===11)
                    {
                    $p =  str_replace($a[$i].$b[$j],$c[$i].$d[$j],$p);   // replacement without "+" sign.
                    $p =  str_replace($a[$i]."+".$b[$j],$c[$i]."+".$d[$j],$p); // replacement for "+" sign.
                    }
                    elseif ($merge<4)
                    {
                    $p =  str_replace($a[$i].$b[$j],$c[$i].$d[$j],$p);  // replacement without "+" sign.                     
                    }
                    else
                    {
                    $p =  str_replace($a[$i]."+".$b[$j],$c[$i]."+".$d[$j],$p); // replacement with "+" sign.                                          
                    }
                }
          }
     $text1[$z]  = $p;      
    }
if (($merge === 0) || ($merge === 2) ||($merge === 4) ) // mandatory Adezas
    {
        $text2 = $text1;
        $text2 = array_unique($text2);
        $text2 = array_values($text2);
    }
if (($merge === 1) || ($merge === 3) ||($merge === 5) ) // optional Adezas.
    {
        $text2 = array_merge($text,$text1);
        $text2 = array_unique($text2);
        $text2 = array_values($text2);
    }
    return $text2;
}

/* Function three is for replacing one letter in the whole array of $text with another letter */
// There are seven arguments, $a,$b,$c are the arrays which you want to change, $d,$e,$f are the arrays which will be put in place of the replaced one.
// $merge can take two values. 
// 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function three($a,$b,$c,$d,$e,$f,$merge) // comments are the same as one function.
{global $text;
   for ($z=0;$z<count($text);$z++)
    {$p = $text[$z]; 
     for($i=0;$i<count($a);$i++)
    {
    for($j=0;$j<count($b);$j++)
        {
        for($k=0;$k<count($c);$k++)
            {
            $p =  str_replace($a[$i].$b[$j].$c[$k],$d[$i].$e[$j].$f[$k],$p);       
           $p =  str_replace($a[$i]."+".$b[$j].$c[$k],$d[$i]."+".$e[$j].$f[$k],$p);       
           $p =  str_replace($a[$i].$b[$j]."+".$c[$k],$d[$i].$e[$j]."+".$f[$k],$p);       
           $p =  str_replace($a[$i]."+".$b[$j]."+".$c[$k],$d[$i]."+".$e[$j]."+".$f[$k],$p);       
            }
        }
    }
    $text1[$z] = $p;
    }
    if ($merge === 0)
    {
        $text = $text1;
        $text = array_unique($text);
        $text = array_values($text);
    }
    if ($merge === 1)
    {
        $text = array_merge($text,$text1);
        $text = array_unique($text);
        $text = array_values($text);
    }
    return $text;
}
/* function flatten is a function to flatten a multidimentional array */
// I have borrowed this function from examples in php.net site.
// e.g. array([0]=> a [1]=> array([0] => b [1] => c)) this is flattened in array([0]=>a [1]=>b [2]=>c).
/*function flatten(array $array) // $array is the multidimentional array which you want to flatten.
{
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}*/ // This code is immeculate. But unfortunately the servers don't support PHP5.4.
function flatten($array) {
    if (!is_array($array)) {
        // nothing to do if it's not an array
        return array($array);
    }

    $result = array();
    foreach ($array as $value) {
        // explode the sub-array, and add the parts
        $result = array_merge($result, flatten($value));
    }

    return $result;
}
/* function savarna is to find out savarNa of a character from the given pratyAhAra */
// $inarray is the array for which you are looking for savarNa.
// $array is the array in which you are looking for savarNa.
// e.g. savarNa(array("a"),prat('ac')) will give  savarNa of letter 'a' from the pratyAhAra 'ac'.
// Known issue - words having two Asyas are not treated properly.
function savarna($inarray,$array)
{
for($z=0;$z<count($inarray);$z++)
{
$text = $inarray[$z];    
    global $kantha,$talu,$murdha,$danta,$oshtha,$nasika,$kanthatalu,$kanthoshtha,$dantoshtha,$sprushta,$ishatsprushta,$vivruta,$samvruta,$aghosha,$alpaprana,$ghosha,$mahaprana,$ac,$udatta,$anudatta,$svarita,$shvasa,$nada,$vivara,$samvara,$hl,$ru,$e; // bringing the arrays in function
    // defining an array for sthAna
$i=0;
if (in_array($text,$kantha)) { $sthana[$i] = $kantha; $i++; } 
if (in_array($text,$talu)) { $sthana[$i] =  $talu; $i++; }
if (in_array($text,$murdha)) { $sthana[$i] = $murdha; $i++; }
if (in_array($text,$danta)) { $sthana[$i] = $danta; $i++; }
if (in_array($text,$oshtha)) { $sthana[$i] = $oshtha; $i++; }
if (in_array($text,$nasika)) { $sthana[$i] = $nasika; $i++; }
if (in_array($text,$kanthatalu)) { $sthana[$i] = $kanthatalu; $i++; }
if (in_array($text,$kanthoshtha)) { $sthana[$i] = $kanthoshtha; $i++;}
if (in_array($text,$dantoshtha)) { $sthana[$i] = $dantoshtha; $i++; }
// defining an array for Abhyantara prayatna for consonants
$j=0;
if (in_array($text,$sprushta)) { $abhyantara[$j] = $sprushta; $j++; }
if (in_array($text,$ishatsprushta)) { $abhyantara[$j] = $ishatsprushta; $j++; }
if (in_array($text,$vivruta)) { $abhyantara[$j] = $vivruta; $j++; }
if (in_array($text,$samvruta)) { $abhyantara[$j] = $samvruta; $j++; }
// defining an array for bAhya prayatna for consonants and prANa
$k=0;
if (in_array($text,$aghosha)) { $ghosh[$k] = $aghosha; $k++; }
if (in_array($text,$alpaprana)) { $prana[$k] = $alpaprana; $k++; }
if (in_array($text,$ghosha)) { $ghosh[$k] = $ghosha; $k++; }
if (in_array($text,$mahaprana)) { $prana[$k] = $mahaprana; $k++; }
// defining an array for bAhya prayatna of vowels
$u=0;
if (in_array($text,$ac)) { $svar[$u] = $udatta; $u++; }
// Finding out intersections of sthAna, Abhyantara prayatna and bAhya prayatnas of the given letter and the given array. 
if(empty($sthana)===FALSE)
{
$sthanasamya = array_intersect(flatten($sthana),$array);  // finding the intersection of sthAna
}
if(empty($abhyantara)===false)
{
$abhyantarasamya = array_intersect(flatten($abhyantara),$array); // finding the intersection of Abhyantara prayatna
}
if(empty($ghosh)===FALSE)
{
$ghoshasamya = array_intersect(flatten($ghosh),$array); // finding the intersection of bAhya prayatna
}
if(empty($prana)===FALSE)
{
$pranasamya = array_intersect(flatten($prana),$array); // finding the intersection of prANa.
}
if(empty($svar)===false)
{
if(in_array($text,$ac)) { $svarasamya = array_intersect(flatten($svar),$array,$ac); // finding the svarasAmya
}    
}
$l = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya,$pranasamya); // $l is the case in which sthAna, Abhyantaraprayatna, ghoSa and prANa all are matching. The best match.
$m = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya); // $m is the case in which sthAna, Abhyantaraprayatna and ghoSa are matching. The second best match.
$n = array_intersect($sthanasamya,$abhyantarasamya); // $n is the case in which sthAna and Abhyantaraprayatna are matching. The third best match.
$o = array_intersect($sthanasamya,$abhyantarasamya,$pranasamya); // $o is the case in which sthAna, Abhyantaraprayatna and prANa are matching. The second best match.
$p = array_intersect($sthanasamya,$ghoshasamya); // $p is the case in which sthAna and ghoSa are matching. The third best match.
$q = array_intersect($sthanasamya,$pranasamya); // $q is the case in which sthAna and prANa are matching. The third best match.
// Defining savarNas for consonants
if(in_array($text,$hl))
{
    if(empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($pranasamya)===FALSE&&empty($l)===false)  // four match
    {
            $savarna = implode(", ",$l);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($m)===false) // three match
    {
            $savarna = implode(", ",$m);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($pranasamya)===false&&empty($o)===false) // three match
    {
            $savarna = implode(", ",$o);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($n)===false) // two match
    {
            $savarna = implode(", ",$n);     
    }
     elseif (empty($sthanasamya)===false&&empty($ghoshasamya)===false&&empty($p)===false) // two match
    {
            $savarna = implode(", ",$p);     
    } elseif (empty($sthanasamya)===false&&empty($pranasamya)===false&&empty($q)===false) // two match
    {
            $savarna = implode(", ",$q);     
    }
    else // no match
    {
    $savarna = implode(", ",$sthanasamya);    
    }
} 
// defining savarNas for vowels
else
{  
    if (in_array($text,$ru)||in_array($text,$e))
    {// patch for $ru
        for($i=0;$i<4;$i++)
        {
        if ($text === $ru[$i])
        {
            if (in_array($text,$array))
            { $savarna = "f, F, x, X"; }
            else
            { $savarna = ""; }
        }
        // patch for non sAvarNya of e,E,o,O
        elseif ($text === $e[$i])
        {
            if (in_array($text,$array))
            { $savarna = $text; }
            else
            { $savarna = ""; }
        }
        }
    }
  else 
    {// In case of other vowels.
        $savarna = implode(", ",$sthanasamya);
    }
}
// stores that savarNa letter in memory.
$arr[$z] =  $savarna; // We got the savarNa for the first letter of the array. The loop is repeated for all members of the array.
}
return $arr; // returning the desired savarNa array.
}
/* function display will show the text on screen. */
// There are three arguments. 0 will simply display the message. 
// 1 will show an additional message in dvitva. 
// 2 is not used in the code. Useful where there were two optional forms.
// 3 is for aGgAdhikAra.
// 4 is for yaNaH pratiSedho vAcyaH in case of yaN.
// 5 is for sarvAdeza.
// 6 is for bhasya adhikAra.
// 7 is for padasya, padAt, anudAttaM sarvamapAdAdau adhikAra.
// 8 is for anupasarjanAt adhikAra.
// new messages can be added if the message is of repeated nature.
function display($n)
{
    global $text;  // bringing $text from subanta.php
    /* removal of two ++ signs */
    $text = one(array("++"),array("+"),0);

    if ($n === 1) // sending special messages.
        {
        echo "<p class = hn>Please note: Wherever there is dvitva, it is optionally negated by sarvatra zAkalyasya. (8.4.51)</p>";
        echo "<p class = hn>द्वित्व का सर्वत्र सर्वत्र शाकल्यस्य (८.४.५१) से पाक्षिक निषेध होता है ।</p>";
        }
    if ($n === 2) 
        { 
        global $text1; $text2 = $text; $text = $text1; 
        }
    if ($n === 3) 
        {
        echo "<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (2.4.13) and aGgasya (6.4.1) </p>";
        echo "<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३) तथा अङ्गस्य (६.४.१) </p>";
        }
    if ($n === 4) 
        {
        echo "<p class = hn>N.B.: yaNaH pratiSedho vAcyaH (vA 4806) prevents application of saMyogAntasya lopaH (8.2.23) </p>";
        echo "<p class = hn>यणः प्रतिषेधो वाच्यः (वा ४८०६) से संयोगान्तस्य लोपः (८.२.२३) का निषेध होता है ।</p>";
        }
    if ($n === 5) 
        {
        echo "<p class = hn>N.B.: anekAlzitsarvasya (1.1.55) mandates sarvAdeza.  </p>";
        echo "<p class = hn>अनेकाल्शित्सर्वस्य (१.१.५५) से सर्वादेश होता है ।</p>";
        }
    if ($n === 6) 
        {
        echo "<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (2.4.13) aGgasya (6.4.1) and bhasya (6.4.129) :</p>";
        echo "<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३), अङ्गस्य (६.४.१) तथा भस्य (६.४.१२९) :</p>";
        }
    if ($n === 7) 
        {
        echo "<p class = pa>padasya (8.1.16), padAt (8.1.17) and anudAttaM sarvamapAdAdau (8.1.18) :</p>";
        echo "<p class = pa>पदस्य (८.१.१६), पदात्‌ (८.१.१७) तथा अनुदात्तं सर्वमपादादौ (८.१.१८) :</p>";
        }
    if ($n === 8) 
        {
        echo "<p class = pa>anupasarjanAt (4.1.14) :</p>";
        echo "<p class = pa>अनुपसर्जनात्‌ (४.१.१४) :</p>";
        }
    for($i=1;$i<count($text)+1;$i++) // for all members of the $text array
    {
        echo "<p class = form>$i - ".convert($text[$i-1])."</p>"; // showing the output to the browser. e.g. 1. rAmaH. $i is for numbering. function convert converts the output into devanAgarI.
    }
    echo "<hr>"; // drawing a line after all the words are displayed. Thus two sUtras are separated by a separator line.
    if ($n === 2) { $text1 = $text; $text = $text2; } // not useful because the display(2) is not used in the code. If it is used, this will work.
}
/* function dvitva will be used to duplicate a letter */
// It has six arguments, first four arguments are the arrays which need to be replaced. 
// $location is to specify which of these 4 consecutive arrays is to be duplicated. e.g. 2 will mean that the second member will be duplicated.
// $merge is to specify whether to replace (0) or add (1) to the existing array. 0 is used for mandatory dvitva and 1 is used for optional dvitva.
// I am not able to elucidate this code much, because it is a borrowed code. I have kept it as the lender gave.
function dvitva ($kantha,$talu,$murdha,$oshtha,$location,$merge)
{ 
 global $text;   
// this is an array of the input values to use below 
 // get all possible combianations of $kantha+$talu+$murdha
   $combinations = array(); 
     foreach($kantha as $k) // "a","k","g","n","h"
     { 
        foreach($talu as $t) // "i","c","j","y","s"
        { 
            foreach($murdha as $m) // "f","w","q","r","z"
            {
                foreach ($oshtha as $o)
                {
                 $combinations[] = $k.$t.$m.$o;    
                }
            } 
        } 
     } 

$values1 = array();
foreach ($text as $stti => $string)  // 'aifkcwh', 'aifkcwhsz', 'kim', 'aif'
{
    $values = array($string);  
       reset($values); 
  // loop through $values using an array pointer 
    // while the current array pointer position is not null/false
    while(current($values)!==false)
    {
        // on the first iteration, $values will be the inputted string 
        // from $strings_to_test... our example is "aifkcwh"
        $value = current($values); 
        if ($merge === 1)
        {
        $values1[] = current($values);
        }
        // for each possible combination of $kantha.$talu.$murdha
        // let's say our first combination is "aif"
        foreach($combinations as $ci => $combination)
        {  
            // look and see if the current value we are looking
            // at ("aifkcwh") contains this combination string  
            if (strpos($value,$combination)!==false)
            { 
                // if it does... we perform the string mutation
                // "aif" does exist in the string "aifkcwh"

                // get the second letter in the combination string
               // echo $combination. "These are combinations </br>";
                $single = $combination[$location-1];   // i 

                // double that second letter
                $post = substr($combination,$location-1);
                // echo $post. "These are posts </br>";
                $pre = chop($combination,$post);
                // echo $pre. "These are pres </br>";
                // create a new string that is the combination with the 
                // second letter doubled... 
                $newcom = $pre.$combination[$location-1].$post;
               // echo $newcom."These are newcoms </br> ";
                // replace that string in $values so that
                // aifkcwh becomes aiifkcwh
                $newval = str_replace($combination, $newcom, $value); // aiifkcwh

                // does the new value ("aiifkcwh") exist in $values?  
                // have we already recorded this mutation?  
                if (!in_array($newval,$values1)) 
                { 
                    // if not... append it to the array $values
                    $values1[] = $newval; 
                    // now, values would go from being = array([0]=>'aifkcwh'); 
                    // to array ([ 0] => 'aifkcwh', [1] => 'aiifkcwh' ); 
                }
                else 
                {
                }
            } 
        } // <-- end of the foreach statement, this will go through all combinations 
          //     in our combinations array for this particular value which is currently aifkcwh


        // next($values) increments the array pointer so that we move to the next
        // value in the $values array.  since we just added a value, 
        // $values now contains array ([ 0] => 'aifkcwh', [1] => 'aiifkcwh' ); 

        // before this statement index 0, current($values) == 'aifkcwh'
        next($values);  
        // after this statement index 1, current($values) == 'aiifkcwh'
        // for the next loop, we will test this string for all the combinations
        // if there is no next value, the `while` loop will end 
    }  

    // after we have gone through every possible combination for "aifkcwh",
    // we will have something like this: 
    /*
        Array
          (
                [0] => aifkcwh
                [1] => aiifkcwh
                [2] => aifkccwh
                [3] => aiifkccwh
          )
    */
    // and we add that to the $output array that contains an index for 
    // each input string, which contains all possible mutations of that string 
    $output[$string] = $values1; 
}
$output = flatten($output);
$output = array_unique($output);
$output = array_values($output);
return $output;
}
/* function flat is used to make an array useful for regular expressions */
 function flat($array)
 {
     $array = "'".implode("",$array)."'";
     return $array;
 }
/* function blank will return an array having n blank members. blank(2) === array("",""); */
 function blank($n)
 {
     $array = array();
     while(count($array)< $n+1)
     {
        array_push($array,""); // adding blank ""s in the array.
     }
     return $array;
 }
/* function checkarray is used to see whether the sequence of $a,$b,$c,$d is found in any of the members of $text */ 
 function checkarray($a,$b,$c,$d) // usually sub function serves the purpose. Only once or twice this function is used where we have to test 4 consecutive letters to satisfy the demand of the rule.
 {
     global $text;
     $array = $text;
    $combinations = array();
     foreach ($a as $aa)
     {
         foreach ($b as $bb)
         {
             foreach ($c as $cc)
             {
                 foreach ($d as $dd)
                 {
                     $combinations[] = $aa.$bb.$cc.$dd; //  creating all permutations and combinations of given 4 arrays and storing it.
                 }
             }
         }
     }
     $counter = array();
     for ($i=0;$i<count($array);$i++)
     {
         for($j=0;$j<count($combinations);$j++)
         {
             if(strpos($array[$i],$combinations[$j]) !== false)
             {
                 $counter = 1; // if the occurence is found in any of the $text members, $counter is made 1. Otherwise it will remain 0.
                 break;
             }
             else
             {
                 $counter = 0;
             }  
         }
           if ($counter === 1)
           {
               break;
           }
           else 
           {
               $counter = 0;
           }
        
     }
     return $counter; // returns 1 for match found. 0 for no match found.
 }
/* function sub is a modified version of checkarray. It searches for the consecutive occurences of $a,$b,$c in the members of array $text. 
 * $repeat 0 will mean that the sequence doesnt matter. 1 will mean that the sequence has to be the same.
 */ 
 function sub($a,$b,$c,$repeat)
{   
     global $text;
     $needle = array();
    // for different length and all combinations
    if($repeat !== 1)
    {
        foreach ($a as $aa)
        {
         foreach ($b as $bb)
         {
             foreach ($c as $cc)
             {
                 $needle[]=$aa.$bb.$cc; // creating all permutations and combinations.
                 $needle[]=$aa."+".$bb.$cc; // adding "+" at all possible locations.
                 $needle[]=$aa.$bb."+".$cc;
                 $needle[]=$aa."+".$bb."+".$cc;
             }
         }
        }
    }
    // for similar length arrays and ordered combinations.
    if ($repeat === 1)
    {
        for($i=0;$i<count($a);$i++)
        {
            $needle[] = $a[$i].$b[$i].$c[$i]; // creating linear patterns.
            $needle[] = $a[$i]."+".$b[$i].$c[$i]; // adding "+" at all possible locations.
            $needle[] = $a[$i].$b[$i]."+".$c[$i];
            $needle[] = $a[$i]."+".$b[$i]."+".$c[$i];
        }
    }
    /*** map with preg_quote ***/
    $needle = array_map('preg_quote', $needle); 
    /*** loop of the array to get the search pattern ***/
    global $first;
    foreach ($needle as $pattern)
    {
        if ( $repeat<2 && count(preg_grep("/$pattern/", $text)) >0)
        {
        $can = 1; // match found
        break;
        }  
        elseif ( $repeat===2 && ends($text,$needle,0))
        {
        $can = 1; // match found
        break;
        }  
        else
        {
            $can = 0; // match not found
        }
    }
if ($can === 1)
{
    return true;
}
else
{
    return false;
}

}
/* function to search the occurence of a pattern in any of the member of an array */
// $text - the array to search for the occurence of pattern
// $a - pattern in regular expression.
function arr($text,$a)
{
    foreach ($text as $value)
    {
        if (preg_match($a,$value)) // if the regular expression matches the value of array member.
        {
            $count[] = 1; // match found
            break;
        }
        else 
        {
            $count[] = 0; // match not found
        }
    }
    if (in_array(1,$count))
    {
        return true; // if match found
    }
    else
    {
        return false; // if match not found
    }
}
/* function to remove the last n letters from a word in the $text array and replace them with another word */
function last($a,$b,$merge)
{
    global $text; // bringing $text from subanta.php.
    foreach ($text as $value)
    {
        for($i=0;$i<count($a);$i++)
        { $c = str_replace("\\","",$a[$i]);
            if (preg_match('/('.$a[$i].')$/',$value) || preg_match('/('.$c.')$/',$value))
            {
                $value1[] = substr($value,0,-strlen($a[$i])).$b[$i]; // removing the last letter and substituting it with the corresponding letter of $b.
                if ($merge === 1)
                {
                    $value1[] = $value;
                }
            }
            else
            {
                $value1[] = $value;
            }
        }
        if (array_unique($value1)===array($value))
        {
            $value2[] = array_unique($value1); // in case there is no change.
        }
        elseif ($merge === 1)
        {
            $value2[] = array_unique($value1); // in case there is optional Adeza.
        }
        else
        {
            $value2[] = array_diff($value1,array($value)); // in case there is mandatory Adeza.
        }
        $value1 = array(); // reseting the $value1 for future use.
    }
    $text = flatten($value2); // storing the result of $value2 in $text.
    $text = array_unique($text); // keeping only unique members
    $text = array_values($text); // reserialize the numbers.
    return $text; // return to the user.
}
/* function to remove the first n letters from a word in the $text array and replace them with another word */
function first($a,$b,$merge)
{
    global $text;
    foreach ($text as $value)
    {
        for($i=0;$i<count($a);$i++)
        {
            if (preg_match('/^['.$a[$i].']/',$value))
            {
                $value1[] = $b[$i].substr($value,strlen($a[$i])); // This function is the same as last function, except that the replacement here is preceded by the member of $b, unlike followed by member of $b in last function.
                if ($merge === 1)
                {
                    $value1[] = $value;
                }
            }
            else
            {
                $value1[] = $value;
            }
        }
        if (array_unique($value1)===array($value))
        {
            $value2[] = array_unique($value1);
        }
        elseif ($merge === 1)
        {
            $value2[] = array_unique($value1);
        }
        else
        {
            $value2[] = array_diff($value1,array($value));
        }
        $value1 = array();
    }
    $text = flatten($value2);
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
}
/* vriddhi function */
function vriddhi($a)
{ $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",);
  $acreplace = array("A","A","E","E","O","O","Ar","Ar","Al","Al","E","O","E","O",);
    foreach ($a as $value)
    {
        $out[] = str_replace($ac,$acreplace,$value); // replacing the vowels with their corresponding vRddhi letters.
    }
    return $out;
}
/* guna function */
function guna($a)
{ $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",);
  $acreplace = array("a","a","e","e","o","o","ar","ar","al","al","e","o","e","o",);
    foreach ($a as $value)
    {
        $out[] = str_replace($ac,$acreplace,$value); // replacing the vowels with their corresponding guNa letters.
    }
    return $out;
}
/* dirgha function */
function dirgha($a)
{ $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",);
  $acreplace = array("A","A","I","I","U","U","F","F","F","F","e","o","E","O",);
    foreach ($a as $value)
    {
        $out[] = str_replace($ac,$acreplace,$value); // replacing the vowels with their corresponding dIrgha letters.
    }
    return $out;
}

/* anekAca function */
// function to test whether the word is ekAc or anekAc i.e. whether there is only one vowel in it or more than one vowel in it.
function anekAca($a)
{
    $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",); // vowel list.
    $b = preg_split('/['.flat($ac).']/',$a); // splitting the word by vowels.
    if (count($b)>2) // if there are more than 2 pieces, that means there are more than one vowel mandatorily.
    {
        return true; // returns true to the user.
    }
    else
    {
        return false;  // returns false to the user.
    }
}
/* ends function */
// to find if there is any member of array which end in a particular member of another array.
// 0 -> doesn't start with but ends with it. 1 -> ends with it or is equal to it. 2 -> is equal to it., 3 -> starts with it but doesn't end with it. 4 -> ends in verb (upasargas don't bother)
function ends($a,$b,$n)
{
    $upasarga = array("pra","prati","api","parA","apa","upa","pari","anu","ava","vi","saM","su","ati","ni","nir","ut","aDi","dur","aBi","A"); 
    $pattern=array("pari","pary","pra","prA","pro","prati","praty","api","apy","parA","paro","apa","apA","apo","upa","upA","upo","anu","anU","anv","ava","avA","avo","vi","vy","saM","sam","san","su","sU","sv","ati","aty","ni","ny","nir","niH","nis","niz","ut","ud","uc","ul","aDi","aDy","dur","duH","dus","duz","aBi","aBy","A",);
    
    foreach ($a as $aa)
    {
        foreach ($b as $bb)
        {
            if ($n===0) 
            {
                if (strpos($aa,$bb)>0 && strpos(strrev($aa),strrev($bb)) ===0) // strpos($aa,$bb)>0 means that it doesn't start with it. the next means that it ends with it.
                {
                    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===1)
            {
                if (strpos($aa,$bb) >= 0 && strpos(strrev($aa),strrev($bb)) ===0) // strpos($aa,$bb) >= 0 means that it starts with it or is included in it. the next means that it ends with it.
                {
                    
		    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===2)
            {
                if ($aa===$bb) // they are the same.
                {
                    
		    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===3) 
            {
                if (strpos($aa,$bb)===0 && strpos(strrev($aa),strrev($bb)) !==0) 
                {
                    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===4) 
            {
                    foreach ($pattern as $one)
                    {
                        foreach ($pattern as $two)
                        {
                            if (strpos($aa,$one)===0 && strpos($aa,$two.$bb)!==false && strpos(strrev($aa),strrev($bb))===0 )
                            {
                                $prat[]=1;
                            }                            
                        }
                    }
                if ( (strpos($aa,$bb)>0 && in_array(1,$prat) ) || $aa===$bb) 
                {
                    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }

        }
    }
    if (in_array(1,$can))
    {
        return true; // if any time $can becomes 1, it means that match is found.
    }
    else
    {
        return false; // match not found.
    }
}
/* function Ti to remove the Ti */
// $merge 0 - mandatory Adezas, 1 - optional Adezas.
function Ti($merge)
{   
    global $text;
    $te1 = '/(['.pc('ac').'])(['.pc('hl').']*)([+])/'; // vowel - unlimited combinations of consonants - '+' combination.
    $te2 = '$3'; // keep only "+" and remove the first two members.
        foreach ($text as $value)
        {
            $val[] = preg_replace($te1,$te2,$value); // removing the first two members.
        }
        if ($merge===0) // mandatory Adezas
        {
            $text = $val;
        }
        if ($merge === 1) // optional Adezas
        {
            $text = array_merge($text,$val);
        }        
    $val=array();
    $text = array_unique($text);
    $text = array_values($text);
    return $text; // giving the result to the user.
}
/* function mit */
// $pattern is the pattern to search in the word to add mit pratyaya.
// $b is the addition to upadha
// $merge 0 is replacement, 1 is optional.
function mit($pattern,$b,$merge)
{   global $text;
    $te1 = '/(['.pc('ac').'])(['.pc('hl').']*)([+])/';
    $te2 = '$1'.$b.'$2$3'; // Adding the mit Agama after the last vowel. 'midaco'ntyAtparaH'.
        foreach ($text as $value)
        {
            if (preg_match($pattern,$value))
            {
//                $val[] = preg_replace($te1,'$1n$2$3',$value); // executing mit Agama.
                  $val[] = preg_replace($te1,$te2,$value); // executing mit Agama.
            }
            else
            {
                $val[] = $value;
            }
        }        
        if ($merge===0)
        {
            $text = $val;
        }
        if ($merge === 1)
        {
            $text = array_merge($text,$val);
        }        
    $val=array();
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
}
/* function samprasarana */
function samprasarana($a,$merge)
{
    $yan = array("y","v","r","l");
    $yanik = array("i","u","f","x"); // list of samprasAraNa for yaN.
    foreach ($a as $value)
    {
    $b[] = str_replace($yan,$yanik,$a);        // doing samprasARaNa.
    }    
    return $b;
}
/* function itcheck */
// $a to contain the array of it markers to check.
// $b. 0 for it. 1 for itprakriti. 2 for itpratyaya
function itcheck($a,$b)
{
    global $text; global $it; global $itprakriti; global $itpratyaya;
    if ($b===0)
    {
        if(count(array_intersect($it,$a))>0) // finds in $it.
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    if ($b===1)
    {
        if(count(array_intersect($itprakriti,$a))>0) // finds in $itprakriti
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    if ($b===2)
    {
        if(count(array_intersect($itpratyaya,$a))>0) // finds in $itpratyaya
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
/* function it (to find an it marker). The function adds the marker to its arrays. */
// $pattern is the pattern to look for
// $a 0 for finding it in the whole word. 1 for it in prakriti. 2 for it in pratyaya.
function it($pattern)
{
    global $text; global $it; global $itprakriti; global $itpratyaya;
        foreach ($text as $value)
        {
            $b = preg_split($pattern,$value,null,PREG_SPLIT_DELIM_CAPTURE); // spliting the string by the pattern.
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]); // removing !
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]); // removing +
                $it = array_merge($it,array($b[$i*2-1])); // adding the it marker to the array $it.
                $it = array_unique($it);
                $it = array_values($it);                
            }                   
        }
       foreach ($text as $value)
        {
            $c = explode("+",$value);
            $b = preg_split($pattern,$c[0],null,PREG_SPLIT_DELIM_CAPTURE);
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]);
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]);
                $itprakriti = array_merge($itprakriti,array($b[$i*2-1])); // adding it to array $itprakriti
                $itprakriti = array_unique($itprakriti);
                $itprakriti = array_values($itprakriti);         
            }                   
        }
       foreach ($text as $value)
        {
            $c = explode("+",$value);
            $pattern = str_replace("[+]","^",$pattern); 
            $b = preg_split($pattern,$c[1],null,PREG_SPLIT_DELIM_CAPTURE); 
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]);
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]);
                $itpratyaya = array_merge($itpratyaya,array($b[$i*2-1])); // adding it to array $itpratyaya
                $itpratyaya = array_unique($itpratyaya);
                $itpratyaya = array_values($itpratyaya);         
            }                   
        }
}
/* function to find out it markers when they can occur only in the pratayayas. */
function itprat($pattern)
{
    global $text; global $it; global $itprakriti; global $itpratyaya; 
       foreach ($text as $value)
        {
            $c = explode("+",$value);
            $b = preg_split($pattern,$c[1],null,PREG_SPLIT_DELIM_CAPTURE);
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]);
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]);
                $itpratyaya = array_merge($itpratyaya,array($b[$i*2-1])); // adding it to array $itpratyaya
                $itpratyaya = array_unique($itpratyaya);
                $itpratyaya = array_values($itpratyaya);         
            }                   
        }
}
/* function antya to do antyAdeza */
// $a - array where we want to do antyAdeza. $rep - replacement in place of the last letter.
function antya($a,$rep)
{
    foreach ($a as $value)
    {
        $value1[] = substr($value,0,-1).$rep;
    }
    return $value1;
}
/* adding a specific letter/word at the end of all members of array */
function addlast($a,$b,$merge)
{
    foreach($a as $value)
    {
        $value1[] = $value.$b;
    }
    if ($merge===0)
    {
        $text = $value1;
    }
    if ($merge === 1)
    {
        $text = array_merge($a,$value1);
    }
    $output = flatten($text);
    $output = array_unique($output);
    $output = array_values($output);
return $output;    
}
/* function anubandha to remove it markers */
function anubandha()
{ 
    global $text; global $first; global $pada; global $itprakriti; global $wa1; global $sarva2; global $purva; global $taddhita; global $sarva; global $sup; global $so; global $al; global $hl;
    /* AdirGiTuDavaH (1.3.5) */
    if ((substr($first,0,2) === "Yi" || substr($first,0,2) === "wu" || substr($first,0,2) === "qu") && $pada=== "pratyaya")
    {
        if(substr($first,0,2) === "Yi") { $itprakriti = array_merge($itprakriti,array("Yi")); }
        if(substr($first,0,2) === "wu") { $itprakriti = array_merge($itprakriti,array("wu")); }
        if(substr($first,0,2) === "qu") { $itprakriti = array_merge($itprakriti,array("qu")); }
        echo "<p class = pa >By AdirGiTuDavaH (1.3.5) :</p>";
        echo "<p class = pa >आदिर्ञिटुडवः (१.३.५) :</p>";
        display(0);
        $text = first(array("Yi","wu","qu"),array("","",""),0); // function first removes and replaces specific strings from the words. For details see function.php.
        echo "<p class = sa >tasya lopaH (1.3.9) :</p>";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>";
        display(0);
    }
    /* cuTU (1.3.7) */ 
    if (arr($text,'/[+][cCjJYwWqQR]/') )
    {
        echo "<p class = pa >By cuTU (1.3.7) :</p>";
        echo "<p class = pa >चुटू (१.३.७) :</p>";
        display(0);
        $text = two(array("+"),array("c","C","j","J","Y","w","W","q","Q","R"),array("+"),blank(10),0);
        $text = last(array("jas","wA",),array("as","A"),0);
        echo "<p class = sa >tasya lopaH (1.3.9) :</p>";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>";
        display(0);
    }
    /* SaH pratyayasya (1.3.6) */
    if (arr($text,'/[+][z]/') && $pada=== "pratyaya")
    {
        it('/([+][z])/');
        echo "<p class = pa >By SaH pratyayasya (1.3.6) :</p>";
        echo "<p class = pa >षः प्रत्ययस्य (१.३.६) :</p>";
        display(0);
        $text = two(array("+"),array("z"),array("+"),array(""),0);
        echo "<p class = sa >By tasya lopaH (1.3.9) :</p>";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>";
        display(0);
    }
    /* lazakvataddhite (1.3.8) */
    if (((arr($text,'/[+][lSkKgGN]/'))||$sarva2===1||$purva===1) && $taddhita === 0 )
    {
        it('/([+][lSkKgGN])/');
        echo "<p class = pa >By lazakvataddhite (1.3.8) :</p>";
        echo "<p class = pa >लशक्वतद्धिते (१.३.८) :</p>";
        display(0);
        $text = two(array("+"),array("l","S","k","K","g","G","N"),array("+"),array("","","","","","",""),0);
        echo "<p class = sa >By tasya lopaH (1.3.9) :</p>";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>";
        display(0);
    }
    if (arr($text,'/['.flat($ac).'][!]/')  )
    {
        it('/(['.flat($ac).'][!])/');
        echo "<p class = pa >By upadeze'janunAsika it (1.3.2) :</p>";
        echo "<p class = pa >उपदेशेऽजनुनासिक इत्‌ (१.३.२) :</p>";
        display(0);
        $text = two($ac,array("!"),blank(count($ac)),array(""),0);
        echo "<p class = sa >By tasya lopaH (1.3.9) :</p>";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>";
        display(0);    
    }

return $text;

}
/* function AdivRddhi to find AdivRddhi */
function AdivRddhi($a)
{
    foreach ($a as $value)
    {
        $b=preg_split('/([aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        if(in_array($b[1],array("A","E","O")))
        {
            $can[]=1;
        }
        else
        {
            $can[]=0;
        }
    }
    if (in_array(1,$can))
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}
/* function dvigu to find whether ther is dvigu */
function dvigu($a)
{
    if (ends($a,array("eka","ekA","eke","dvi","dvI","dvy","tri","trI","try","catur","catuH","catuz","paYc","zaq","zaw","sapt","azw","nav","daS","Sat"),3) && !ends($a,array("ekaka","dvika","trika","catuzka","paYcaka","zawka","saptaka","azwaka","navaka","daSaka","Sataka"),2))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function removeaccent($text)
{
$text = stripslashes($text);
    $a=array("\\","/","^","-","°","*","(",")","[","]","-","?","॑","॒",);
    $b=array("","","","","","","","","","","","","","");
$text = str_replace($a,$b,$text);
return $text;
}
function removeanusvar($text)
{
    $a=array("a!","A!","i!","I!","u!","U!","f!","F!","x!","X!","e!","o!","E!","O!",);
    $b=array("","","","","","","","","","","","","","");
    $text = str_replace($a,$b,$text);
    return $text;
}
function verbprocess($text)
{
    if(arr(array($text),'/^[Ywq][iu]/'))
    {
        $text=preg_replace('/^([Ywq][iu])/',"",$text);
    }
    if(arr(array($text),'/(^[z])/') && !in_array($text,array("zvazk","zWiv")))
    {
        $text=preg_replace('/^([z])/',"s",$text);
        $text=str_replace(array("sw","sW","sq","sQ","sR",),array("st","sT","sd","sd","sn",),$text);
    }
    if(arr(array($text),'/(^[R])/') )
    {
        $text=preg_replace('/^([R])/',"n",$text);
    }
    if(arr(array($text),'/[iu][r]['.pc('hl').']/') )
    {
        $text=str_replace(array("ir","ur"),array("Ir","Ur"),$text);              
    }
    return $text;
}

/* Process to remove it markers from verb lists and return pure verb lists */
// $text = array to be converted. $num 1 = nakARa is not changed to panchama letter. 2 = nakAra is changed to panchama lettter.
function pureverbs($text,$num)
{
$a=array_map('trim',$text);
$a=array_map('convert1',$a);
$a=array_map('removeaccent',$a);
foreach ($a as $value)
{
    if (preg_match('/[i][!]$/',$value))
    {
        $idit=1;
    }
    else { $idit=0; }
    $value=preg_replace('/(['.pc('hl').']$)/','',$value);
    $value=preg_replace('/([aAiIuUfFxXeoEO][!])/','',$value);
    if ($idit===1)
    {
        $value=preg_replace('/(['.pc('ac').'])(['.pc('hl').']*)$/','$1'.'n'.'$2',$value);
    }
    $value=preg_replace('/(^[Ywq][iu])/','',$value);
    if ($num===2)
    {
        $value=preg_replace('/([n])([kKgGN])/','N$2',$value);        
        $value=preg_replace('/([n])([cCjJY])/','Y$2',$value);        
        $value=preg_replace('/([n])([wWqQR])/','R$2',$value);        
        $value=preg_replace('/([n])([pPbBm])/','m$2',$value);        
    }
    $val1[]=$value;
}
return $val1;    
}
/* function Ti1 to remove the Ti for words and not for whole array $text. */
function Ti1($a)
{   
    $te1 = '/(['.pc('ac').'])(['.pc('hl').']*)$/'; // vowel - unlimited combinations of consonants - '+' combination.
    $te2 = ''; // keep only "+" and remove the first two members.
    $val = preg_replace($te1,$te2,$a); // removing the first two members.
    return $val;
}
/* function mit1 for arrays other than $text */
// $array is the input.
// $pattern is the pattern to search in the word to add mit pratyaya.
// $b is the addition to upadha
// $merge 0 is replacement, 1 is optional.
function mit1($array,$b,$merge)
{   
    $te1 = '/(['.pc('ac').'])(['.pc('hl').']*)([+])/';
    $te2 = '$1'.$b.'$2$3'; // Adding the mit Agama after the last vowel. 'midaco'ntyAtparaH'.
        foreach ($array as $value)
        {
                  $val[] = preg_replace($te1,$te2,$value); // executing mit Agama.
        }        
        if ($merge===0)
        {
            $text = $val;
        }
        if ($merge === 1)
        {
            $text = array_merge($text,$val);
        }        
    $val=array();
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
}

/* Creating a function to fetch data from the verbdata variable */
// The function is almost ready. Now rename the variables so that it can be used.
// $a = the input to take as base, $a1 = ref number of $a, $b = the thing to search. $c 1=whole list, 2=corresponding list. $d=additional field to be displayed, $e=additional condition, $e1= its ref no.
// Ref nos. 0=upadeza, 1=Meaning, 2=verb without anubandhas, 3=verbset, 4=number in dhatupatha, 5=Atmane/parasmai/ubhaya, 6=seT/aniT. 7. verb with accent 8.Set+number 9. Set name
// 0 to 6 are in the array. after that we process.
function scrape($a,$a1,$b,$c,$d,$e,$e1)
{
    global $verbdata;
    for($i=0;$i<count($verbdata);$i++)
    {
        $bomb=explode(':',$verbdata[$i]);
        $bomb[8]=$bomb[3].".".$bomb[4];
        $bomb[9]=str_replace(array("01","02","03","04","05","06","07","08","09","10",),array("BvAdi","adAdi","juhotyAdi","divAdi","svAdi","tudAdi","ruDAdi","tanAdi","kryAdi","curAdi",),$bomb[3]);
        if ($c===1 && $e!=="" && $d!=="")
        {
            if($a===$bomb[$a1] && $e===$bomb[$e1])
            {
                $ret[]=$bomb[$b]." ".$bomb[$d];
            }
        }
        if ($c===1 && $e==="" && $d!=="")
        {
            if($a===$bomb[$a1] )
            {
                $ret[]=$bomb[$b]." ".$bomb[$d];
            }
        }
        if ($c===1 && $e!=="" && $d==="")
        {
            if($a===$bomb[$a1] && $e===$bomb[$e1])
            {
                $ret[]=$bomb[$b];
            }
        }
        if ($c===1 && $e==="" && $d==="")
        {
            if($a===$bomb[$a1] )
            {
                $ret[]=$bomb[$b];
            }
        }
    }
    $ret=array_map('trim',$ret);
    return $ret;
}
// for ajax display in case the verb entered belongs to more than one gaNa.
function verb_meaning_gana_number($text)
{
    global $html;
    $verbaccent=scrape($text,0,7,1);
    $meaning=scrape($text,0,1,1);
    $verbset=scrape($text,0,9,1);
    $number=scrape($text,0,8,1);
    
            $html .= '<div id="step22">';
    for($i=0;$i<count($verbaccent);$i++)
    {
            $html .= '<input type="radio" value="'.trim($verbset[$i]).'" name="verbset" > '.$verbaccent[$i].' - '.convert($meaning[$i]).', '.convert($verbset[$i]).' '.$number[$i].' ';        
    }
            $html .= '</div>';            
return $html;
}
// for display in tiGanta.php
function verb_meaning_gana_number1($text)
{
    $verbaccent=scrape($text,0,7,1);
    $meaning=scrape($text,0,1,1);
    $verbset=scrape($text,0,9,1);
    $number=scrape($text,0,8,1);
    echo "<p class = st >".$verbaccent[0].' - '.convert($meaning[0]).', '.convert($verbset[0]).' '.$number[0].' '."</p>";
    echo "<hr>";
}
// for display in tiGanta.php in case the user has chosen the gaNa.
function verb_meaning_gana_number2($text)
{
    global $verbset;
    $verbaccent=scrape($text,0,7,1,"",$verbset,9);
    $meaning=scrape($text,0,1,1,"",$verbset,9);
    $verbset1=scrape($text,0,9,1,"",$verbset,9);
    $number=scrape($text,0,8,1,"",$verbset,9);
    echo "<p class = st >".$verbaccent[0].' - '.convert($meaning[0]).', '.convert($verbset1[0]).' '.$number[0].' '."</p>";
    echo "<hr>";
}
/* function change to change all members of $text based on a regular expression */
function change($a,$b)
{
    global $text;
    foreach ($text as $value)
    {
        $val[]=preg_replace($a,$b,$value);
    }
    return $val;
} 
/* function Adyanta */
function Adyanta($text,$a,$b)
{
    foreach ($text as $value)
    {
        if ($b===1)
        {
            $val[]=$a.$value;
        }
        if ($b===2)
        {
            $val[]=$value.$a;
        }
    }
    return $val;
}
/* function to replace the tiG pratyayas as per sahajabodha text. */
// Please note that when sUtras are taught to the machine, it will no longer be required. But till then, please bear with it.
function tiGreplace()
{
    global $text;
    global $lakAra;
    global $set;
    global $taG; global $tis; global $tiG; global $so;
    $default_Atmane_1=array("ta","AtAm","anta","TAs","ATAm","Dvam","i","vahi","mahi");  
    $tiG_law_Atmane_1=array("te","Ate","ante","se","ATe","Dve","i","vahe","mahe");
    $tiG_law_parasmai_1=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas");
    $tiG_law_Atmane_1=array("te","ite","ante","se","iTe","Dve","e","vahe","mahe");
    $tiG_low_parasmai_1=array("tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama"); // there is a blank pratyaya at ma.pu.
    $tiG_low_Atmane_1=array("tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE");
    $tiG_laN_parasmai_1=array("t","tAm","an","s","tam","ta","am","va","ma");
    $tiG_laN_Atmane_1=array("ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi");
    $tiG_viDiliN_parasmai_1=array("it","itAm","iyus","is","itam","ita","iyam","iva","ima");
    $tiG_viDiliN_Atmane_1=array("Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// second set pratyayas
    $default_Atmane_2=array("ta","AtAm","anta","TAs","ATAm","Dvam","i","vahi","mahi");  
    $tiG_law_Atmane_2=array("te","Ate","ante","se","ATe","Dve","i","vahe","mahe");
    $tiG_law_parasmai_2=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas");
    $tiG_law_Atmane_2=array("te","Ate","ate","se","ATe","Dve","e","vahe","mahe");
    $tiG_low_parasmai_2=array("tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama"); // there is tAt and hi missing.
    $tiG_low_Atmane_2=array("tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE");
    $tiG_laN_parasmai_2=array("t","tAm","an","s","tam","ta","am","va","ma");
    $tiG_laN_Atmane_2=array("ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi");
    $tiG_viDiliN_parasmai_2=array("yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma");
    $tiG_viDiliN_Atmane_2=array("Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
   if($set===1)
   {
        if ($lakAra==="low" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_1,$tiG_low_parasmai_1,$text);
        }        
        if ($lakAra==="laN" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_1,$tiG_laN_parasmai_1,$text);
        }        
        if ($lakAra==="viDiliN" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_1,$tiG_viDiliN_parasmai_1,$text);
        }        
        if ($lakAra==="law" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_1,$tiG_law_Atmane_1,$text);
        }        
        if ($lakAra==="low" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_1,$tiG_low_Atmane_1,$text);
        }        
        if ($lakAra==="laN" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_1,$tiG_laN_Atmane_1,$text);
        }        
        if ($lakAra==="viDiliN" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_1,$tiG_viDiliN_Atmane_1,$text);
        }               
   }
   if($set===2)
   {
        if ($lakAra==="low" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_1,$tiG_low_parasmai_1,$text);
        }        
        if ($lakAra==="laN" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_2,$tiG_laN_parasmai_2,$text);
        }        
        if ($lakAra==="viDiliN" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_2,$tiG_viDiliN_parasmai_2,$text);
        }        
        if ($lakAra==="law" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_2,$tiG_law_Atmane_2,$text);
        }        
        if ($lakAra==="low" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_2,$tiG_low_Atmane_2,$text);
        }        
        if ($lakAra==="laN" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_2,$tiG_laN_Atmane_2,$text);
        }        
        if ($lakAra==="viDiliN" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_2,$tiG_viDiliN_Atmane_2,$text);
        }               
   }
    // patch for optional forms.
    foreach ($text as $val1)
    {
        if (strpos($val1,"+tAt")!==false && $set===1)
        {
            $val2[]=$val1;
            $val2[]=str_replace("+tAt","",$val1);
        }
        elseif (strpos($val1,"+tAt")!==false && $set===2)
        {
            $val2[]=$val1;
            $val2[]=str_replace("+tAt","+hi",$val1);
        }
        elseif (strpos($val1,"+tu")!==false)
        {
            $val2[]=$val1;
            $val2[]=str_replace("+tu","+tAt",$val1);
        }        
        else
        {
            $val2[]=$val1;
        }
    }
    
    return $val2;
}
/* function pratyayareplace to change pratyayas as per Sahajabodha */
// sub is not specific. For pratyayas, we test whether it is at end or not.
function pratyayareplace($a,$b,$test)
{
    foreach($test as $value)
    {
        for($i=0;$i<count($a);$i++)
        {
            if(substr($value,(-strlen($a[$i])-1))==="+".$a[$i])
            {
                $out[]=substr($value,0,-strlen($a[$i])).$b[$i];
            }
        }
    }
    return $out;
}

/* function pratyayareplace to change pratyayas as per Sahajabodha */
// sub is not specific. For pratyayas, we test whether it is at end or not.
function pratyayareplace2($a,$b,$c,$d,$e,$f,$test)
{
    foreach($test as $value)
    {
        $counter=1;
        for($i=0;$i<count($a);$i++)
        {
            for($j=0;$j<count($b);$j++)
            {
                for($k=0;$k<count($c);$k++)
                {
                    if(substr($value,(-strlen($a[$i].$b[$j].$c[$k])))===$a[$i].$b[$j].$c[$k])
                    {
                        $out[]=substr($value,0,-strlen($a[$i].$b[$j].$c[$k])).$d[$i].$e[$j].$f[$k];
                        $counter=2;
                    }
                }
            }            
        }
        if(in_array($value,$out))
        {
            $test=array_diff($test,array($value));
            $out[]=$value;
        }
        elseif($counter===1)
        {
            $out[]=$value;
        }
        $counter=1;
    }
    return $out;
}

/* Functions which are not used in the code */
/* Function f to find the nth letter in the word */
function f($text,$n) // Not used in code.
{
$p = str_split($text); // splits the word in its letters.
$text = $p[$n-1]; // finds the nth letter. 1st letter is $p[0], 2nd $p[1]... nth is $p[$n-1]
return $text; // returning the result to the user.
}
/* find string after removing 'n' letters from beginning of the word (sa for string after) */
function sa($text,$n)        // Not used in code.
{
$p = str_split($text); 
$a = "";
for ($q=0;$q<$n;$q++)
{ $text = ltrim($text,$p[$q]); }
return $text;
}
/* find 'n'th letter from the end in a word (r for reverse direction) */
function r($text,$n)                 // Not used in code
{
$p = str_split($text);
$text = $p[count($p)-$n];
return $text;
}
/* find the string remaining after removing n characters from the end (sb for string before) */
function sb($text, $n)        // Not used in code.
{
$p = str_split($text);
$a= "";
for ($q=0;$q<$n;$q++)
{$text = chop($text,$p[count($p)-$q-1]);} 
return $text;
}
/* function lopa is not used in the code because it is not stable */
function lopa ($kantha,$talu,$murdha,$oshtha,$location,$merge)
{ 
 global $text;   
// this is an array of the input values to use below 
 // get all possible combianations of $kantha+$talu+$murdha
//$combinations = get_string_combinations(); 
   $combinations = array(); 

     foreach($kantha as $k) // "a","k","g","n","h"
     { 
        foreach($talu as $t) // "i","c","j","y","s"
        { 
            foreach($murdha as $m) // "f","w","q","r","z"
            {
                foreach ($oshtha as $o)
                {
                 $combinations[] = $k.$t.$m.$o;    
                }
            } 
        } 
     } 
//print_r($combinations);
$values1 = array();
foreach ($text as $stti => $string)  // 'aifkcwh', 'aifkcwhsz', 'kim', 'aif'
{

    $values = array($string);  
    
    reset($values); 


    // loop through $values using an array pointer 
    // while the current array pointer position is not null/false
    while(current($values)!==false)
    {
        // on the first iteration, $values will be the inputted string 
        // from $strings_to_test... our example is "aifkcwh"
        $value = current($values); 
        
       if ($merge === 1)
        {
        $values1[] = current($values);
        } 
        // for each possible combination of $kantha.$talu.$murdha
        // let's say our first combination is "aif"
        foreach($combinations as $ci => $combination)
        {  
            // look and see if the current value we are looking
            // at ("aifkcwh") contains this combination string  
            if (strpos($value,$combination)!==false)
            {   $posterior = substr($value,strpos($value,$combination)+$location+2);
                $previous = chop($value,$posterior);
                $previous = substr($previous,0,strlen($previous)); 
                $newval = $previous.$posterior; 
               // echo $value."<br>".$combination."</br>".$previous."</br>".$posterior."</br>";
                // have we already recorded this mutation?  
                if (!in_array($newval,$values1)) 
                { 
                    // if not... append it to the array $values
                    $values1[] = $newval; 
                    // now, values would go from being = array([0]=>'aifkcwh'); 
                    // to array ([ 0] => 'aifkcwh', [1] => 'aiifkcwh' ); 
                }
                else 
                {
                }
            } 
        } // <-- end of the foreach statement, this will go through all combinations 
          //     in our combinations array for this particular value which is currently aifkcwh
        next($values);  
    }  

    $output[$string] = $values1;
}
// print_r($output);
$output = flatten($output);
$output = array_unique($output);
$output = array_values($output);

return $output;
}
/* function nosavarna is not used in the code. It is for finding the array of savarNas without the letter itself. */
function nosavarna($c)
{
    global $ac;
     $i = array("i","I");$u = array("u","U");$f = array("f","F","x","X");
    
    if ( $c === $i[0] ) {$non = array_diff($ac, $i);}
    if ( $c === $i[1] ) {$non = array_diff($ac, $i);}
    if ( $c === $u[0] ) {$non = array_diff($ac, $u);}
    if ( $c === $u[1] ) {$non = array_diff($ac, $u);}
    if ( $c === $f[0] ) {$non = array_diff($ac, $f);}
    if ( $c === $f[1] ) {$non = array_diff($ac, $f);}
    if ( $c === $f[2] ) {$non = array_diff($ac, $f);}
    if ( $c === $f[3] ) {$non = array_diff($ac, $f);}
       return $non;
}
/* function get_string_combinations is a subset of the function dvitva and lopa. In modified version, this code segment is redundant. */
 function get_string_combinations()
 {
     $kantha = array("a","k","g","n","h");
     $talu   = array("i","c","j","y","s");
     $murdha = array("f","w","q","r","z");

     $combinations = array(); 

     foreach($kantha as $k) // "a","k","g","n","h"
     { 
        foreach($talu as $t) // "i","c","j","y","s"
        { 
            foreach($murdha as $m) // "f","w","q","r","z"
            {
                $combinations[] = $k.$t.$m; 
            } 
        } 
     } 
     // this gives us an array if 125 items 
     /*
     $combinations = 
        Array
        (
             [0] => aif
             [1] => aiw
             [2] => aiq
             [3] => air
             [4] => aiz
             .... 
             [121] => hsw
             [122] => hsq
             [123] => hsr
             [124] => hsz
        ) 
     */
     return $combinations;
 }
 /* function merge is not used in the code */
 function merge($text,$text1)
 {
     $text = array_merge($text,$text1);
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
 }
/* function blank1 will return an array having n members of $a. blank("a",2) === array("a","a"); Not used in code. */
 function blank1($a,$n)
 {
     $array = array();
     while(count($array)< $n+1)
     {
        array_push($array,$a);
     }
     return $array;
 }
/* Function to find savarna of a given letter from the given array. Not used in code. */
function sl($text,$array) // Known issue - words having two Asyas.
{
    global $kantha,$talu,$murdha,$danta,$oshtha,$nasika,$kanthatalu,$kanthoshtha,$dantoshtha,$sprushta,$ishatsprushta,$vivruta,$samvruta,$aghosha,$alpaprana,$ghosha,$mahaprana,$ac,$udatta,$anudatta,$svarita,$shvasa,$nada,$vivara,$samvara,$hl,$ru,$e;
    // defining an array for sthAna
$i=0;
if (in_array($text,$kantha)) { $sthana[$i] = $kantha; $i++; }
if (in_array($text,$talu)) { $sthana[$i] =  $talu; $i++; }
if (in_array($text,$murdha)) { $sthana[$i] = $murdha; $i++; }
if (in_array($text,$danta)) { $sthana[$i] = $danta; $i++; }
if (in_array($text,$oshtha)) { $sthana[$i] = $oshtha; $i++; }
if (in_array($text,$nasika)) { $sthana[$i] = $nasika; $i++; }
if (in_array($text,$kanthatalu)) { $sthana[$i] = $kanthatalu; $i++; }
if (in_array($text,$kanthoshtha)) { $sthana[$i] = $kanthoshtha; $i++;}
if (in_array($text,$dantoshtha)) { $sthana[$i] = $dantoshtha; $i++; }
// defining an array for Abhyantara prayatna for consonants
$j=0;
if (in_array($text,$sprushta)) { $abhyantara[$j] = $sprushta; $j++; }
if (in_array($text,$ishatsprushta)) { $abhyantara[$j] = $ishatsprushta; $j++; }
if (in_array($text,$vivruta)) { $abhyantara[$j] = $vivruta; $j++; }
if (in_array($text,$samvruta)) { $abhyantara[$j] = $samvruta; $j++; }
// defining an array for bAhya prayatna for consonants
$k=0;
if (in_array($text,$aghosha)) { $ghosh[$k] = $aghosha; $k++; }
if (in_array($text,$alpaprana)) { $prana[$k] = $alpaprana; $k++; }
if (in_array($text,$ghosha)) { $ghosh[$k] = $ghosha; $k++; }
if (in_array($text,$mahaprana)) { $prana[$k] = $mahaprana; $k++; }
// defining an array for bAhya prayatna of vowels
$u=0;
if (in_array($text,$ac)) { $svar[$u] = $udatta; $u++; }

// Finding out intersections of sthAna, Abhyantara prayatna and bAhya prayatnas of the given letter and the given array. 
if(empty($sthana)===FALSE)
{
$sthanasamya = array_intersect(flatten($sthana),$array); 
//echo "The letters in the pratyAhAra with same sthAna (Asya) as the letter input are: ".implode(",",$sthanasamya)."</br>";    
}
if(empty($abhyantara)===false)
{
$abhyantarasamya = array_intersect(flatten($abhyantara),$array);
//echo "The letters in the pratyAhAra with the same Abhyantara prayatna as the letter input are: ".implode(",",$abhyantarasamya)."</br>";    
}
if(empty($ghosh)===FALSE)
{
$ghoshasamya = array_intersect(flatten($ghosh),$array);
//echo "The letters in the pratyAhAra with the same ghoSa as the letter input are: ".implode(",",$ghoshasamya)."</br>";    
}
if(empty($prana)===FALSE)
{
$pranasamya = array_intersect(flatten($prana),$array);
//echo "The letters in the pratyAhAra with the same prANa as the letter input are: ".implode(",",$pranasamya)."</br>";    
}
if(empty($svar)===false)
{
if(in_array($text,$ac)) 
        { $svarasamya = array_intersect(flatten($svar),$array,$ac); 
//echo "The letters in the pratyAhAra with the same udAtta/anudAtta/svarita as the letter input are: ".implode(",",$svarasamya)."</br>";
        }    
}
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false && empty($ghoshasamya)===false && empty($pranasamya)===false)
{ $l = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya,$pranasamya); }
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false && empty($ghoshasamya)===false)
{ $m = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya); }
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false)
{ $n = array_intersect($sthanasamya,$abhyantarasamya); }
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false && empty($pranasamya)===false)
{ $o = array_intersect($sthanasamya,$abhyantarasamya,$pranasamya); }
if(empty($sthanasamya)===false && empty($ghoshasamya)===false)
{ $p = array_intersect($sthanasamya,$ghoshasamya); }
if(empty($sthanasamya)===false && empty($pranasamya)===false)
{ $q = array_intersect($sthanasamya,$pranasamya); }
// Defining savarNas for consonants
if(in_array($text,$hl))
{
    if(empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($pranasamya)===FALSE&&empty($l)===false) 
    {//echo "four match";
            $savarna = implode(", ",$l);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($m)===false)
    {//echo "three match";
            $savarna = implode(", ",$m);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($pranasamya)===false&&empty($o)===false)
    {//echo "three match";
            $savarna = implode(", ",$o);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($n)===false)
    {//echo "Two match";
            $savarna = implode(", ",$n);     
    }
     elseif (empty($sthanasamya)===false&&empty($ghoshasamya)===false&&empty($p)===false)
    {//echo "Two match";
            $savarna = implode(", ",$p);     
    } elseif (empty($sthanasamya)===false&&empty($pranasamya)===false&&empty($q)===false)
    {//echo "Two match";
            $savarna = implode(", ",$q);     
    }
    else
    {//echo "no match";
    $savarna = implode(", ",$sthanasamya);    
    }
} 
// defining savarNas for vowels
else
{  
    if (in_array($text,$ru)||in_array($text,$e))
    {// patch for $ru
        for($i=0;$i<4;$i++)
        {
        if ($text === $ru[$i])
        {
            if (in_array($text,$array))
            { $savarna = "f, F, x, X"; }
            else
            { $savarna = ""; }
        }
        // patch for non sAvarNya of e,E,o,O
        elseif ($text === $e[$i])
        {
            if (in_array($text,$array))
            { $savarna = $text; }
            else
            { $savarna = ""; }
        }
        }
    }
    
    
    else 
    {// In case of other vowels.
        $savarna = implode(", ",$sthanasamya);
    }
    
    if (in_array($text,$array))
    {
        $savarna = $text;
    }
}
// giving output to the browser for savarNa letter
//echo "The savarna letter of '".$text."' among the given pratyAhAra is: ".$savarna;    
// stores that savarNa letter in memory.
return $savarna;
}
/* Function one1 is for replacing one letter in the whole array of $text with another letter. Not used in code */
// There are three arguments, $a is the array which you want to change, $b is the array which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function one1($text,$a,$b,$merge)
{
        for($i=0;$i<count($a);$i++)
        {
            $text =  str_replace($a[$i],$b[$i],$text);    
        }
return $text;  
}
/* Function two is for replacing one letter in the whole array of $text with another letter. Not used in code */
// There are five arguments, $a,$b are the arrays which you want to change, $c,$d are the arrays which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function two1($text,$a,$b,$c,$d,$merge)
{
    for($i=0;$i<count($a);$i++)
          {
    for($j=0;$j<count($b);$j++)
            {
      $text =  str_replace($a[$i].$b[$j],$c[$i].$d[$j],$text);   
            }
          }
    return $text;
}

/* Function three1 is for replacing one letter in the whole array of $text with another letter. Not used in code */
// There are seven arguments, $a,$b,$c are the arrays which you want to change, $d,$e,$f are the arrays which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function three1($text,$a,$b,$c,$d,$e,$f,$merge)
{
     for($i=0;$i<count($a);$i++)
    {
    for($j=0;$j<count($b);$j++)
        {
        for($k=0;$k<count($c);$k++)
            {
         $text =  str_replace($a[$i].$b[$j].$c[$k],$d[$i].$e[$j].$f[$k],$text);       
            }
        }
    }
    return $text;
}

/* An attempt to create an all encompassing function 
 * name is panini
 * three arrays for checking,
 * one for adding additional checking in addition to sub function
 * one for adding whether pratyaya / pada
 *  one for the 0/1/2/3/4 etc of sub function, 
 * three for the substituted, 
 * three for substitution, 
 * one for 0/1 of one/two/three function,
 * one for english sutra name,
 * one for english sutra number
 * one for hindi sutra name,
 * one for hindi sutra number
 * 
 */
?>