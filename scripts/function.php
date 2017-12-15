<?php
 /* This code is developed by Dr. Dhaval Patel (drdhaval2785@gmail.com) of www.sanskritworld.in and Ms. Sivakumari Katuri.
  * Layout assistance by Mr Marcis Gasuns.
  * Available under GNU licence.
  * Version 1.10.1 date 6 September 2016
  * The latest source code is available at https://github.com/drdhaval2785/SanskritVerb .
  * Acknowledgements: The base book for coding has been Astadhyayi sahajabodha of Dr. Pushpa Dikshit, published by Pratibha Prakashan, Delhi.
  * I extend my heartfelt thanks to Ananda Loponen for the code to convert devanagari and various sanskrit transliterations. That can be accessed at http://www.ingmardeboer.nl/php/diCrunch.php?act=help.
  * I also extend my gratitude to gloomy.penguin of stackoverflow.com, who helped me create dvitva and lopa functions, without which I would be handicapped.
  * For setup, run install.sh.
  * tiGanta.html is the frontend for the code.
  * scripts/ajax.php and scripts/script.js are codes which asks for user feedback for particular words.
  * scripts/function.php stores the frequently used functions in this code (The description on how to use the code is there in function.php).
  * tiGanta.php is the code which actually gives the output of the word derivation.
  * scripts/slp-dev.php is for converting SLP1 data to Devanagari.
  * scripts/dev-slp.php is for converting Devanagari data to SLP1.
  * scripts/mystyle.css is stylesheet where you can change your preferences.
  * The code uses jquery.
  * The description part uses Harvard Kyoto protocol.
  * The coding uses SLP1 transliteration.
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
$upasarga = array("pra","prati","api","parA","apa","upa","pari","anu","ava","vi","saM","su","ati","ni","nir","ut","aDi","dur","aBi","A"); // upaaargas
$upasarga_combinations = array("ati,atinis,atipra,ativi,ativyA,atisam,atyati,atyaBi,atyA,atyud,atyupa,aDi,aDini,aDinis,aDivi,aDyava,aDyA,aDyupa,anu,anuni,anunis,anuparA,anupari,anuparyA,anupra,anuprati,anuvi,anuvyava,anuvyA,anusam,anusampra,anUd,anvapa,anvava,anvA,apa,apani,apanis,apaparA,apaparyA,apapra,apavyA,apA,apAti,api,apipari,apod,apyati,aBi,aBini,aBinis,aBiparA,aBipari,aBiparyA,aBipra,aBivi,aBivyA,aBisamA,aBisam,aByati,aByaDi,aByanu,aByapa,aByava,aByA,aByudA,aByud,aByupa,aByupA,aByupAva,ava,avani,avA,A,utpra,udava,udA,ud,udvi,unni,upa,upani,upanis,upanyA,upapari,upaparyA,upapra,upavi,upavyA,upasaṁni,upasamA,upasam,upA,upAti,upAva,upodA,upod,upopa,duHsam,duranu,durava,durA,durud,durupa,durni,duzpari,duzpra,dus,ni,nipra,nirati,niraDi,niranu,nirapa,niraBi,niraBi,nirava,nirupA,nirvi,nivyA,nizpra,nisu,nis,nyA,parA,pari,parini,parinis,paripra,parivi,parivyA,parisam,paryaDi,paryanu,paryava,paryA,paryud,paryupa,pra,praNi,prati,pratini,pratinis,pratiparA,pratipari,pratipra,prativi,prativyA,pratisam,pratyaDi,pratyanu,pratyapa,pratyapi,pratyaBi,pratyava,pratyA,pratyudA,pratyud,pratyupa,pratyupA,pravi,pravyA,prasam,prA,prADi,prod,vi,vini,vinis,viparA,vipari,viparyA,vipra,viprati,visam,vyati,vyanu,vyanvA,vyapa,vyapA,vyaBi,vyava,vyA,vyud,vyupa,saṁvi,saṁvyava,saṁvyA,sanni,samati,samaDi,samanu,samanuvi,samanvA,samapa,samapi,samaBi,samaBivyA,samaBisam,samaBisampra,samaByava,samaByA,samaByud,samava,samava,samavA,samA,samudA,samud,samupa,samupA,sam,samparA,sampari,sampra,samprati,samprA,samprod,sampvari,su,supari,suvi,susamA,svanu,svaBi,svaByA,");
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
foreach ($hl as $value){ $hlplus[] = $value."+"; } // defining $hlplus
$iN1 = array("i","I","u","U","f","F","x","X","e","o","E","O","h","y","v","r","l","k","K","g","G","N"); // iN and kavarga combined.
$iN2 = array("i","I","u","U","f","F","x","X","e","o","E","O","h","y","v","r","l",); // iN
$pratya =  array("aR","ak","ik","uk","eN","ac","ic","ec","Ec","aw","aR","iR","yaR","am","yam","Yam","Nam","yaY","Jaz","Baz","aS","haS","vaS","JaS","jaS","vaS","Cav","yay","may","Jay","Kay","cay","yar","Jar","Kar","car","Sar","al","hal","val","ral","Jal","Sal"); // valid pratyAhAras according to pANinIya vyAkaraNa
$sup = array("su!","O","jas","am","O","Sas","wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup"); // sup pratyayas
$sup1 = array("su!","O","jas","am","Ow","Sas","wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup","su!","O","jas"); // sup pratyayas + sambodhana
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
$ik = array("i","I","u","U","f","F","x","X"); // ik pratyAhAra.
$ikyan = array("y","y","v","v","ar","Ar","ar","Ar"); // yaN replacements of ik pratyAhAra.
// cleanup of $avyaya pending.
$avyaya = array("svar","antar","prAtar","punar","sanutar","uccEs","nIcEs","SanEs","fDak","fte","yugapat","ArAt","antikAt","pfTak","hyas","Svas","divA","rAtrO","sAyam","ciram","manAk","Izat","SaSvat","jozam","tUzRIm","bahis","aDas","avas","samayA","nikazA","svayam","mfzA","naktam","naY","hetO","he","hE","idDA","adDA","sAmi","vat","bata","sanA","sanat","sanAt","upaDA","tiras","AdyudAttAH","antarA","antareRa","mak","jyok","yok","nak","kam","Sam","sahasA","SradDA","alam","svaDA","vazaw","vinA","nAnA","svasti","anyat","asti","upAMSu","kzamA","vihAyasA","dozA","mfzA","miTyA","muDA","purA","miTo","miTas","prAyas","muhus","pravAhukam","pravAhikA","Aryahalam","aBIkzRam","sAkam","sArDam","namas","hiruk","Dik","aTa","am","Am","pratAm","praSAn","pratAn","mA","mAN","ham","vA","ha","aha","eva","evam","nUnam","SaSvat","yugapat","BUyas","kUpat","kuvit","net","cet","caR","kaccit","yatra","naha","hanta","mAkiH","mAkim","nakiH","nakim","mAN","naY","yAvat","tAvat","tve","dvE","tvE","rE","SrOzaw","vOzaw","svAhA","svaDA","vazaw","tum","taTAhi","Kalu","kila","aTo","aTa","suzWu","sma","Adaha","avadattam","ahaMyuH","astikzIrA","paSu","Sukam","yaTAkaTAcam","pAw","pyAw","aNga","hE","he","BoH","aye","dya","vizu","ekapade","yut","AtaH","am","Am","ca","vA","ha","aha","eva","evam","nUnam","SaSvat","yugapat","sUpat","kUpat","kuvit","net","cet","caR","kaccit","yatra","naha","hanta","mAkim","nakim","mAN","naY","yAvat","tAvat","tvA","tvE","dvE","rE","SrOzaw","vOzaw","svAhA","vazaw","svaDA","om","kila","taTA","aTa","su","sma","asmi","am","tak","uY","ukaY","velAyAm","mAtrAyAm","yaTA","yat","yam","tat","kim","purA","adDA","Dik","hAhA","he","hE","pyAw","pAw","TAw","aho","utAho","ho","tum","taTAhi","Kalu","Am","Aho","aTo","nanu","manye","miTyA","asi","brUhi","tu","nu","iti","iva","vat","cana","bata","iha","Sam","kam","anukam","nahikam","hikam","sukam","satyam","ftam","SradDA","idDA","muDA","no cet","na cet","nahi","jAtu","kaTam","kutaH","kutra","ava","anu","hAhO","hEhA","IhA","Ahosvit","Cambaw","Kam","dizwyA","paSu","vaw","saha","Anuzak","aNga","Paw","tAjak","aye","are","cawu","bAw","kum","Kum","Gum","hum","AIm","SIm","sIm","vE");
// For gaNapATha, we take gaNapATha taken after SK as base. Sometimes other words are supplied from gaNaratnamahodadhi of vardhamAna.
$TitprAtipadika = array("nada","Baza","gara","plava","cara","tara","cora","grAha","sUda","deva","moda"); // this list is carved out of gaNapATha.
$TiDDhA=array("dvayasa","daDna","mAtra","taya","AdfSa","itvara","naSvara","sftvara","Itvara","etvara","taruRa","taluna","cara","puraHsara","agrataHsara","agresara","purassara","pUrvasara","kara","dAsa","dASa","Palguna","Sakraga","sAmaga","surApa","SIDupa","jAyAhan","patihan","jAyAGna","patiGna","hastiGna","hastihan","kapAwahan","kapAwaGna","pARiGa","rAjaGa","tAqaGa","rAja","saKa","Aha","mahAha","paramAha","dIrghAha","gava","orasa","Anasa","ASma","Ayasa","sarasa","grAmatakza","kOwatakza","atiSva","AkarzaSva","PalakaSva","uttarasakTa","mftasakTa","pUrvasakTa","PalakasakTa","nAva","KAra","Jjala","surAzwrabrahma","avantibrahma","kubrahma","mahadbrahma","SrARika","mAMsOdanika","kaMsika","kArSApaRika","pratika","mahiza","vArkeRya","sOmya","sAyantana","cirantana","prAhRetana","pragetana","dozAtana","divAtana","pUrvAhRetana","aparAhRetana","SAmIla","stra","gAyana","daSa","viMSa","triMSa","paYcama","saptama","azwama","navama","daSama","zazWa","katiTa","katipayaTa","bahutiTa","pUgatiTa","gaRatiTa","saNGatiTa","titama","Witama","samamaya","viSamamaya","maya","ISvara","SaRQa",);
$aJwords=array("Otsa","OdapAna","vEkara","vEnoda","mAhAnada","mAhAnasa","mAhAprARa","tAruRa","tAluna","DEnava","pArTiva","pANkta","jAgata","tErzwupa","Anuzwupa","jAnapada","BArata","OSInara","grEzma","pElava","kOla","BAllakIya","rATAntara","mADyandina","bfrhat","mfhat","sAttvantava","kOrava","pAYcAla","EndrAvasAna","OzRih","kAkuB","sOvarRa","dEva","grEzma","bEda","Orva","kASyapa","kOSika","BAradvAja","Opamanyava","kElAlapa","kEdarBa","vESvAnara","ArwizeRa","ArtaBAga","hAryaSva","prEyaka","Apastamba","kOcavAra","SAradvat","SOnaka","DEnava","gOpavana","SEgrava","bEndava","BAjana","ASvAvatAna","SyAmAka","SyAmAka","SyAparRa","hArita","kEndAsa","vAhyaska","ArkalUza","vADyoza","vEzRuvfdDa","prAtiboDa","rATAntara","rATItara","gAvizWira","nEzAda","mAWara","mArda","pOnarBava","pOtra","dOhitra","nAnAndra","pArastrya","pAraSava","mAhAkula","mAnuza","hAridra","mAhArajana","dvEpa","vEyAGra","kApota","mAyUra","tEttira","KARqika","vAqava","kzOdraka","mAlava","sEna","BEkzuka","SOka","OlUka","SvAna","yOga","Ahana","vAratra","hAlabanDa","kAWaka","kAlApaka","CAndogya","OkTikya","ATarvaRa","mOdaka","pEppalAdaka","dErGavastra","kApilavastra","dAtta","gOpta","sANkala","pOzkala","Odvapa","Oqupa","Otpuwa","kOmBa","vEDAna","sOdakza","sOdatta","sOBUta","sOnetra","sOpiNgala","sEkata","pOtIka","pOlasa","kOlAsa","pAlASa","nEveSa","gAveza","gAmBIra","Etara","Sarma","aha","loma","vema","vAruRa","bAhula","sAdyoja","ABizikta","gOBft","rAjaBft","gArha","BArta","BAlla","mAla","vfta","dAttAmitra","vEDUmAgna","kAkanda","mAkanda","maRicara","jAruza","pOrvamadra","Aparamadra","SEvapura","mARqavapura","pOrvArDa","dAkziRArDa","OttarArDa","Apakara","sEnDava","vArRava","gAnDAra","maDumat","kAmboja","kASmIra","sAlva","kEzkinDa","gAdika","Orasa","darat","tAkzaSila","vAtsodDaraRa","kOmedura","kARqavAraRa","grAmaRI","sArAlaka","kAMsa","kEnnara","sAMkucita","sEMhakozWa","kArRakozWa","bArbara","AvasAna","ASvaraTa","OzwraraTa","gArdaBaraTa","ASva","Ozwra","gArdaBa","ADvarya","pArizada","rAjata","lOha","sEsa","sEsaka","Odumbara","nEladArava","rOhitaka","bEBItaka","pEtadAsa","tEvradArava","trEkaRwaka","kARwakAra","dADitTa","kApitTa","mAhitTa","pAlASa","KAdira","SEMSipa","spAndana","kArIra","SErIza","yAvAsa","vEkaNkata","vARDra","vAratra","SOrpa","sArvaBOma","pArTiva","kOmAra","kESora","OdgAtra","Onnetra","prAtihartra","rATagaRaka","pAkzigaRaka","sOzWava","dOzWava","ADvaryava","vADava","sOBaga","vyAvakroSa","vyAvaleKa","vyAvahAsa","vyAvacora","vyAvacarca",);
$aNwords=array("lAva","dAya","kAra","Aya","pAra","ASvapata","SAtapata","DAnapata","gARapata","rAzwrapata","kOlapata","gArhapata","DAnyapata","pASupata","DArmapata","sABApata","prARapata","kzEtrapata","SEva","prOzWa","prOzWika","cARqa","jAmBa","mOna","sAnDa","BOra","kOWAra","AnaBimlAna","kAkutsTa","kAhoqa","lEKa","rODa","KAYjana","kOhaqa","pEzwa","hEhaya","KAYjAra","KAYjAla","sOrohika","pArRa","kAhUza","pArila","vAtaRqa","tArRa","kArRa","kzErahrada","jAlahrada","pArizika","jAwilika","gOPilika","bADirikA","mAYjIraka","vArzRika","rEKa","AleKana","vESravaRa","rAvaRa","vArtanAkza","pEwaka","pEwAka","tArkzAka","nABAka","OrRanABa","jratkArava","Otkzipa","rOhitika","AryaSveta","sOpizwa","KArjUrakarRa","mAsUrakarRa","tURakarRa","mAyUrakarRa","KAqaraka","takza","ArwizeRa","gANga","vEpASa","yAska","lAhya","drOGa","AyaHsTURa","BAlandana","vErUpAkza","BOma","Ela","sApatna","trEveRa","trEvaRa","ErAvata","vEtasta","nArmada","SEkzita","cEntita","yAmuna","vAsizWa","vESvAmitra","SvAPalka","rAnDasa","vAsudeva","AnirudDa","sAhadeva","nAkula","kAnIna","vEkarRa","SONga","CAgala","pEla","mARwuka","ANga","vANga","sOhma","mAgaDa","kAliNga","sOramasa","kAzAya","mAYjizWa","kOsumBa","pOza","mAGa","kOmAra","SArAva","mAllika","kArpara","sTARwila","GArta","BrAzwra","kAlaSa","kOmBa","Aditya","bArhaspatya","prAjApatya","Endra","kAya","vEzRava","mAhendra","kAka","bAka","guRagrAma","karaRagrAma","tattvagrAma","SabdagrAma","indriyagrAma","BEkza","gArBiRa","SEba","Ozwra","pANkta","pragATa","AnuzwuBa","jAgata","gAyatra","trEzwuBa","sOBadra","gOrimitra","AhimAla","syAndanASva","CAndasa","vEyAkaraRa","nErukta","nEmitta","mOhUrta","OtpAta","Odumbara","bAlbaja","pArvata","sAhasra","kOSAmba","ArjunAva","SudizWa","vEdiSa","hEmavata","sOvAstava","vESaNka","cAkzuza","SrAvaRa","Opanizada","dArzada","OlUKala","cAtura","cAturdaSa","pAlada","pArizada","yAkflloma","rOmaka","kAlakUwa","pAwaccara","vAhIka","kAlakIwa","mAlakIwa","kAmalakIwa","kAmalaBida","gOzWa","kAmalakIra","bAhukIta","nEtaka","pAriKa","SOrasena","gOmata","OdayAna","dAkza","plAkza","mAhaka","pAnnAgAra","kOrava","yOganDara","EkzvAka","mAhizika","kAcCa","sEnDava","vArRava","gAnDAra","mADumata","kAmboja","kASmIra","sAlva","kOrava","rANkava","ARava","KARqa","dvEpa","AnUpa","AjavAha","vEjApaka","kOlUna","pArvata","yOzmAka","AsmAka","tAvaka","mAmaka","sAndivela","sAMDya","grEzma","SESira","tEza","pOza","sAnDivela","sAnDya","AmAvAsya","trAyodaSa","cAturdaSa","pAYcadaSa","pOrRamasa","prAtipada","sMavatsara","SArada","vArza","hEmana","vAsanta","sEnDava","Apakara","AmAvAsya","AmAvasya","vAtsaSAla","ABihjita","ASvayuja","SAtaBizaja","rOhiRa","mArgaSIrza","srOGna","mATura");
$dade = array("dah","dAh","dih","duh","dfh","drAh","doh");
$ekaco = array("gaD","gaB","gaQ","gAQ","gAD","gAQ","guD","guQ","gUQ","gfD","gfQ","graB","graQ","griQ","glaQ","qaQ","qiQ","quQ","daG","daG","daG","daG","diG","duG","duG","dfG","dfG","dfG","drAG","drAG","druG","druh","baD","baQ","bAQ","bAD","bAQ","bIB","buD","bfQ","beQ","braQ","druQ","gardaB"); // list of verbs satisfying the conditions.
$ekaco1 = array("GaD","GaB","GaQ","GAQ","GAD","GAQ","GuD","GuQ","GUQ","GfD","GfQ","GraB","GraQ","GriQ","GlaQ","QaQ","QiQ","QuQ","DaG","DaG","DaG","DaG","DiG","DuG","DuG","DfG","DfG","DfG","DrAG","DrAG","DruG","DruQ","BaD","BaQ","BAQ","BAD","BAQ","BIB","BuD","BfQ","BeQ","BraQ","DruQ","garDaB"); // list of verbs after application of this sUtra.
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
$tiG1=array("te","ite","ante","se","iTe","Dve","e","vahe","mahe","ti","tas","anti","si","Tas","Ta","mi","vas","mas","Ate","ATe","ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi","t","ant","s","m","tAm","tam","ta","am","AtAm","ATAm","va","ma","Ral","Ra","atus","us","Tal","Ta","aTus","a","va","ma","e","Ate","ire","se","ATe","Dve","e","vahe","mahe","O","ata","Ral","atus","us","Tal","aTus","Ral","va","ma","Ji","Dve","Ja","iw","mahiN","etAm","eTAm","ate"); // removal of anubandhas.
$shitpratyaya=array("Sap","Syan","Snu","Sa","Snam","SnA","SAyac","SAnac");
$Nitpratyaya=array("");
$Jitpratyaya=array("");
$navibhaktau=array("su!","jas","am","Sas","ByAm","Bis","Byas","os","Am","Ni","tas","Tas","vas","mas","AtAm","TAs","ATAm","Dvam","jus","tAt");
$inbetweenpratyaya=array("ap","yan");
$inbetweeenreplace=array("a","ya");
// Ashtadhyayi data, to enable separation of display from grammar context.
//https://docs.google.com/spreadsheet/ccc?key=0Aocnp1cX4xG8dGh5Q0JaX21WYTZ0MktsRVQ3NzVON0E#gid=0.
$ASdata=array("1.1.1:संज्ञा:वृद्धिरादैच्","1.1.2:संज्ञा:अदेङ् गुणः","1.1.3:परिभाषा:इको गुणवृद्धी","1.1.4::न धातुलोप आर्धधातुके","1.1.5::ग्क्ङिति च","1.1.6::दीधीवेवीटाम्","1.1.7:संज्ञा:हलोऽनन्तराः संयोगः","1.1.8:संज्ञा:मुखनासिकावचनोऽनुनासिकः","1.1.9:संज्ञा:तुल्यास्यप्रयत्नं सवर्णम्","1.1.10:संज्ञा:नाज्झलौ","1.1.11:संज्ञा:ईदूदेद्द्विवचनं प्रगृह्यम्","1.1.12:संज्ञा:अदसो मात्","1.1.13:संज्ञा:शे","1.1.14:संज्ञा:निपात एकाजनाङ्","1.1.15:संज्ञा:ओत्","1.1.16:संज्ञा:सम्बुद्धौ शाकल्यस्येतावनार्षे","1.1.17:संज्ञा:उञः","1.1.18:संज्ञा:ऊँ","1.1.19:संज्ञा:ईदूतौ च सप्तम्यर्थे","1.1.20:संज्ञा:दाधा घ्वदाप्","1.1.21:परिभाषा:आद्यन्तवदेकस्मिन्","1.1.22:संज्ञा:तरप्तमपौ घः","1.1.23:संज्ञा:बहुगणवतुडति संख्या","1.1.24:संज्ञा:ष्णान्ता षट्","1.1.25:संज्ञा:डति च","1.1.26:संज्ञा:क्तक्तवतू निष्ठा","1.1.27:संज्ञा:सर्वादीनि सर्वनामानि","1.1.28:संज्ञा:विभाषा दिक्समासे बहुव्रीहौ","1.1.29:संज्ञा:न बहुव्रीहौ","1.1.30:संज्ञा:तृतीयासमासे","1.1.31:संज्ञा:द्वन्द्वे च","1.1.32:संज्ञा:विभाषा जसि","1.1.33:संज्ञा:प्रथमचरमतयाल्पार्धकतिपयनेमाश्च","1.1.34:संज्ञा:पूर्वपरावरदक्षिणोत्तरापराधराणि","1.1.35:संज्ञा:स्वमज्ञातिधनाख्यायाम्","1.1.36:संज्ञा:अन्तरं बहिर्योगोपसंव्यानयोः","1.1.37:संज्ञा:स्वरादिनिपातमव्ययम्","1.1.38:संज्ञा:तद्धितश्चासर्वविभक्तिः","1.1.39:संज्ञा:कृन्मेजन्तः","1.1.40:संज्ञा:क्त्वातोसुन्कसुनः","1.1.41:संज्ञा:अव्ययीभावश्च","1.1.42:संज्ञा:शि सर्वनामस्थानम्","1.1.43:संज्ञा:सुडनपुंसकस्य","1.1.44:संज्ञा:न वेति विभाषा","1.1.45:संज्ञा:इग्यणः सम्प्रसारणम्","1.1.46:परिभाषा:आद्यन्तौ टकितौ","1.1.47:परिभाषा:मिदचोऽन्त्यात्परः","1.1.48:परिभाषा:एच इग्घ्रस्वादेशे","1.1.49:परिभाषा:षष्ठी स्थानेयोगा","1.1.50:परिभाषा:स्थानेऽन्तरतमः","1.1.51:परिभाषा:उरण् रपरः","1.1.52:परिभाषा:अलोऽन्त्यस्य","1.1.53:परिभाषा:ङिच्च","1.1.54:परिभाषा:आदेः परस्य","1.1.55:परिभाषा:अनेकाल्शित्सर्वस्य","1.1.56:अतिदेशः:स्थानिवदादेशोऽनल्विधौ","1.1.57:अतिदेशः:अचः परस्मिन् पूर्वविधौ","1.1.58:अतिदेशः:न पदान्तद्विर्वचनवरेयलोपस्वरसवर्णानुस्वारदीर्घजश्चर्विधिषु","1.1.59:अतिदेशः:द्विर्वचनेऽचि","1.1.60:संज्ञा:अदर्शनं लोपः","1.1.61:संज्ञा:प्रत्ययस्य लुक्‌श्लुलुपः","1.1.62:परिभाषा:प्रत्ययलोपे प्रत्ययलक्षणम्","1.1.63:परिभाषा:न लुमताऽङ्गस्य","1.1.64:संज्ञा:अचोऽन्त्यादि टि","1.1.65:संज्ञा:अलोऽन्त्यात् पूर्व उपधा","1.1.66:परिभाषा:तस्मिन्निति निर्दिष्टे पूर्वस्य","1.1.67:परिभाषा:तस्मादित्युत्तरस्य","1.1.68::स्वं रूपं शब्दस्याशब्दसंज्ञा","1.1.69::अणुदित् सवर्णस्य चाप्रत्ययः","1.1.70::तपरस्तत्कालस्य","1.1.71:संज्ञा:आदिरन्त्येन सहेता","1.1.72:संज्ञा:येन विधिस्तदन्तस्य","1.1.73:संज्ञा:वृद्धिर्यस्याचामादिस्तद् वृद्धम्","1.1.74:संज्ञा:त्यदादीनि च","1.1.75:संज्ञा:एङ् प्राचां देशे","1.2.1:अतिदेशः:गाङ्कुटादिभ्योऽञ्णिन्ङ् इत्","1.2.2:अतिदेशः:विज इट्","1.2.3:अतिदेशः:विभाषोर्णोः","1.2.4:अतिदेशः:सार्वधातुकमपित्","1.2.5:अतिदेशः:असंयोगाल्लिट् कित्","1.2.6:अतिदेशः:ईन्धिभवतिभ्यां च","1.2.7:अतिदेशः:मृडमृदगुधकुषक्लिशवदवसः क्त्वा","1.2.8:अतिदेशः:रुदविदमुषग्रहिस्वपिप्रच्छः सँश्च","1.2.9:अतिदेशः:इको झल्","1.2.10:अतिदेशः:हलन्ताच्च","1.2.11:अतिदेशः:लिङ्सिचावात्मनेपदेषु","1.2.12:अतिदेशः:उश्च","1.2.13:अतिदेशः:वा गमः","1.2.14:अतिदेशः:हनः सिच्","1.2.15:अतिदेशः:यमो गन्धने","1.2.16:अतिदेशः:विभाषोपयमने","1.2.17:अतिदेशः:स्था घ्वोरिच्च","1.2.18:अतिदेशः:न क्त्वा सेट्","1.2.19:अतिदेशः:निष्ठा शीङ्स्विदिमिदिक्ष्विदिधृषः","1.2.20:अतिदेशः:मृषस्तितिक्षायाम्","1.2.21:अतिदेशः:उदुपधाद्भावादिकर्मणोरन्यतरस्याम्","1.2.22:अतिदेशः:पूङः क्त्वा च","1.2.23:अतिदेशः:नोपधात्थफान्ताद्वा","1.2.24:अतिदेशः:वञ्चिलुञ्च्यृतश्च","1.2.25:अतिदेशः:तृषिमृषिकृशेः काश्यपस्य","1.2.26:अतिदेशः:रलो व्युपधाद्धलादेः संश्च","1.2.27:संज्ञा:ऊकालोऽज्झ्रस्वदीर्घप्लुतः","1.2.28:परिभाषा:अचश्च","1.2.29:संज्ञा:उच्चैरुदात्तः","1.2.30:संज्ञा:नीचैरनुदात्तः","1.2.31:संज्ञा:समाहारः स्वरितः","1.2.32::तस्यादित उदात्तमर्धह्रस्वम्","1.2.33::एकश्रुति दूरात् सम्बुद्धौ","1.2.34::यज्ञकर्मण्यजपन्यूङ्खसामसु","1.2.35::उच्चैस्तरां वा वषट्कारः","1.2.36::विभाषा छन्दसि","1.2.37::न सुब्रह्मण्यायां स्वरितस्य तूदात्तः","1.2.38::देवब्रह्मणोरनुदात्तः","1.2.39::स्वरितात् संहितायामनुदात्तानाम्","1.2.40::उदात्तस्वरितपरस्य सन्नतरः","1.2.41:संज्ञा:अपृक्त एकाल् प्रत्ययः","1.2.42:संज्ञा:तत्पुरुषः समानाधिकरणः कर्मधारयः","1.2.43:संज्ञा:प्रथमानिर्दिष्टं समास उपसर्जनम्","1.2.44:संज्ञा:एकविभक्ति चापूर्वनिपाते","1.2.45:संज्ञा:अर्थवदधातुरप्रत्ययः प्रातिपदिकम्","1.2.46:संज्ञा:कृत्तद्धितसमासाश्च","1.2.47::ह्रस्वो नपुंसके प्रातिपदिकस्य","1.2.48::गोस्त्रियोरुपसर्ज्जनस्य","1.2.49::लुक् तद्धितलुकि","1.2.50::इद्गोण्याः","1.2.51:अतिदेशः:लुपि युक्तवद्व्यक्तिवचने","1.2.52:अतिदेशः:विशेषणानां चाजातेः","1.2.53::तदशिष्यं संज्ञाप्रमाणत्वात्","1.2.54::लुब्योगाप्रख्यानात्","1.2.55::योगप्रमाणे च तदभावेऽदर्शनं स्यात्","1.2.56::प्रधानप्रत्ययार्थवचनमर्थस्यान्यप्रमाणत्वात्","1.2.57::कालोपसर्जने च तुल्यम्","1.2.58::जात्याख्यायामेकस्मिन् बहुवचनमन्यतरस्याम्","1.2.59::अस्मदो द्वायोश्च","1.2.60::फल्गुनीप्रोष्ठपदानां च नक्षत्रे","1.2.61::छन्दसि पुनर्वस्वोरेकवचनम्","1.2.62::विशाखयोश्च","1.2.63::तिष्यपुनर्वस्वोर्नक्षत्रद्वंद्वे बहुवचनस्य","1.2.64::सरूपाणामेकशेष एकविभक्तौ","1.2.65::वृद्धो यूना तल्लक्षणश्चेदेव विशेषः","1.2.66:अतिदेशः:स्त्री पुंवच्च","1.2.67::पुमान् स्त्रिया","1.2.68::भ्रातृपुत्रौ स्वसृदुहितृभ्याम्","1.2.69::नपुंसकमनपुंसकेनैकवच्चास्यान्यतरस्याम्","1.2.70::पिता मात्रा","1.2.71::श्वशुरः श्वश्र्वा","1.2.72::त्यदादीनि सर्वैर्नित्यम्","1.2.73::ग्राम्यपशुसंघेषु अतरुणेषु स्त्री","1.3.1:संज्ञा:भूवादयो धातवः","1.3.2:संज्ञा:उपदेशेऽजनुनासिक इत्","1.3.3:संज्ञा:हलन्त्यम्","1.3.4:संज्ञा:न विभक्तौ तुस्माः","1.3.5:संज्ञा:आदिर्ञिटुडवः","1.3.6:संज्ञा:षः प्रत्ययस्य","1.3.7:संज्ञा:चुटू","1.3.8:संज्ञा:लशक्वतद्धिते","1.3.9:संज्ञा:तस्य लोपः","1.3.10:परिभाषा:यथासंख्यमनुदेशः समानाम्","1.3.11:परिभाषा:स्वरितेनाधिकारः","1.3.12::अनुदात्तङित आत्मनेपदम्","1.3.13::भावकर्म्मणोः","1.3.14::कर्त्तरि कर्म्मव्यतिहारे","1.3.15::न गतिहिंसार्थेभ्यः","1.3.16::इतरेतरान्योन्योपपदाच्च","1.3.17::नेर्विशः","1.3.18::परिव्यवेभ्यः क्रियः","1.3.19::विपराभ्यां जेः","1.3.20::आङो दोऽनास्यविहरणे","1.3.21::क्रीडोऽनुसम्परिभ्यश्च","1.3.22::समवप्रविभ्यः स्थः","1.3.23::प्रकाशनस्थेयाख्ययोश्च","1.3.24::उदोऽनूर्द्ध्वकर्मणि","1.3.25::उपान्मन्त्रकरणे","1.3.26::अकर्मकाच्च","1.3.27::उद्विभ्यां तपः","1.3.28::आङो यमहनः","1.3.29::समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः","1.3.30::निसमुपविभ्यो ह्वः","1.3.31::स्पर्द्धायामाङः","1.3.32::गन्धनावक्षेपणसेवनसाहसिक्यप्रतियत्नप्रकथनोपयोगेषु कृञः","1.3.33::अधेः प्रसहने","1.3.34::वेः शब्दकर्म्मणः","1.3.35::अकर्मकाच्च","1.3.36::सम्माननोत्सञ्जनाचार्यकरणज्ञानभृतिविगणनव्ययेषु नियः","1.3.37::कर्तृस्थे चाशरीरे कर्मणि","1.3.38::वृत्तिसर्गतायनेषु क्रमः","1.3.39::उपपराभ्याम्","1.3.40::आङ उद्गमने","1.3.41::वेः पादविहरणे","1.3.42::प्रोपाभ्यां समर्थाभ्याम्","1.3.43::अनुपसर्गाद्वा","1.3.44::अपह्नवे ज्ञः","1.3.45::अकर्मकाच्च","1.3.46::सम्प्रतिभ्यामनाध्याने","1.3.47::भासनोपसम्भाषाज्ञानयत्नविमत्युपमन्त्रणेषु वदः","1.3.48::व्यक्तवाचां समुच्चारणे","1.3.49::अनोरकर्मकात्","1.3.50::विभाषा विप्रलापे","1.3.51::अवाद्ग्रः","1.3.52::समः प्रतिज्ञाने","1.3.53::उदश्चरः सकर्मकात्","1.3.54::समस्तृतीयायुक्तात्","1.3.55::दाणश्च सा चेच्चतुर्थ्यर्थे","1.3.56::उपाद्यमः स्वकरणे","1.3.57::ज्ञाश्रुस्मृदृशां सनः","1.3.58::नानोर्ज्ञः","1.3.59::प्रत्याङ्भ्यां श्रुवः","1.3.60::शदेः शितः","1.3.61::म्रियतेर्लुङ्‌लिङोश्च","1.3.62:अतिदेशः:पूर्ववत् सनः","1.3.63:अतिदेशः:आम्प्रत्ययवत् कृञोऽनुप्रयोगस्य","1.3.64::प्रोपाभ्यां युजेरयज्ञपात्रेषु","1.3.65::समः क्ष्णुवः","1.3.66::भुजोऽनवने","1.3.67::णेरणौ यत् कर्म णौ चेत् स कर्ताऽनाध्याने","1.3.68::भीस्म्योर्हेतुभये","1.3.69::गृधिवञ्च्योः प्रलम्भने","1.3.70::लियः सम्माननशालिनीकरणयोश्च","1.3.71::मिथ्योपपदात् कृञोऽभ्यासे","1.3.72::स्वरितञितः कर्त्रभिप्राये क्रियाफले","1.3.73::अपाद्वदः","1.3.74::णिचश्च","1.3.75::समुदाङ्भ्यो यमोऽग्रन्थे","1.3.76::अनुपसर्गाज्ज्ञः","1.3.77::विभाषोपपदेन प्रतीयमाने","1.3.78::शेषात् कर्तरि परस्मैपदम्","1.3.79::अनुपराभ्यां कृञः","1.3.80::अभिप्रत्यतिभ्यः क्षिपः","1.3.81::प्राद्वहः","1.3.82::परेर्मृषः","1.3.83::व्याङ्परिभ्यो रमः","1.3.84::उपाच्च","1.3.85::विभाषाऽकर्मकात्","1.3.86::बुधयुधनशजनेङ्प्रुद्रुस्रुभ्यो णेः","1.3.87::निगरणचलनार्थेभ्यः","1.3.88::अणावकर्मकाच्चित्तवत्कर्तृकात्","1.3.89::न पादम्याङ्यमाङ्यसपरिमुहरुचिनृतिवदवसः","1.3.90::वा क्यषः","1.3.91::द्युद्भ्यो लुङि","1.3.92::वृद्भ्यः स्यसनोः","1.3.93::लुटि च कॢपः","1.4.1:अधिकारः:आ कडारादेका संज्ञा","1.4.2:परिभाषा:विप्रतिषेधे परं कार्यम्","1.4.3:संज्ञा:यू स्त्र्याख्यौ नदी","1.4.4:संज्ञा:नेयङुवङ्स्थानावस्त्री","1.4.5:संज्ञा:वाऽऽमि","1.4.6:संज्ञा:ङिति ह्रस्वश्च","1.4.7:संज्ञा:शेषो घ्यसखि","1.4.8:संज्ञा:पतिः समास एव","1.4.9:संज्ञा:षष्ठीयुक्तश्छन्दसि वा","1.4.10:संज्ञा:ह्रस्वं लघु","1.4.11:संज्ञा:संयोगे गुरु","1.4.12:संज्ञा:दीर्घं च","1.4.13:संज्ञा:यस्मात् प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्","1.4.14:संज्ञा:सुप्तिङन्तं पदम्","1.4.15:संज्ञा:नः क्ये","1.4.16:संज्ञा:सिति च","1.4.17:संज्ञा:स्वादिष्वसर्वनामस्थाने","1.4.18:संज्ञा:यचि भम्","1.4.19:संज्ञा:तसौ मत्वर्थे","1.4.20:संज्ञा:अयस्मयादीनि च्छन्दसि","1.4.21::बहुषु बहुवचनम्","1.4.22::द्व्येकयोर्द्विवचनैकवचने","1.4.23:संज्ञा; अधिकारः:कारके","1.4.24:संज्ञा:ध्रुवमपायेऽपादानम्","1.4.25:संज्ञा:भीत्रार्थानां भयहेतुः","1.4.26:संज्ञा:पराजेरसोढः","1.4.27:संज्ञा:वारणार्थानां ईप्सितः","1.4.28:संज्ञा:अन्तर्द्धौ येनादर्शनमिच्छति","1.4.29:संज्ञा:आख्यातोपयोगे","1.4.30:संज्ञा:जनिकर्तुः प्रकृतिः","1.4.31:संज्ञा:भुवः प्रभवः","1.4.32:संज्ञा:कर्मणा यमभिप्रैति स सम्प्रदानम्","1.4.33:संज्ञा:रुच्यर्थानां प्रीयमाणः","1.4.34:संज्ञा:श्लाघह्नुङ्स्थाशपां ज्ञीप्स्यमानः","1.4.35:संज्ञा:धारेरुत्तमर्णः","1.4.36:संज्ञा:स्पृहेरीप्सितः","1.4.37:संज्ञा:क्रुधद्रुहेर्ष्याऽसूयार्थानां यं प्रति कोपः","1.4.38:संज्ञा:क्रुधद्रुहोरुपसृष्टयोः कर्म","1.4.39:संज्ञा:राधीक्ष्योर्यस्य विप्रश्नः","1.4.40:संज्ञा:प्रत्याङ्भ्यां श्रुवः पूर्वस्य कर्ता","1.4.41:संज्ञा:अनुप्रतिगृणश्च","1.4.42:संज्ञा:साधकतमं करणम्","1.4.43:संज्ञा:दिवः कर्म च","1.4.44:संज्ञा:परिक्रयणे सम्प्रदानमन्यतरस्याम्","1.4.45:संज्ञा:आधारोऽधिकरणम्","1.4.46:संज्ञा:अधिशीङ्स्थाऽऽसां कर्म","1.4.47:संज्ञा:अभिनिविशश्च","1.4.48:संज्ञा:उपान्वध्याङ्वसः","1.4.49:संज्ञा:कर्तुरीप्सिततमं कर्म","1.4.50:संज्ञा:तथायुक्तं चानिप्सीतम्","1.4.51:संज्ञा:अकथितं च","1.4.52:संज्ञा:गतिबुद्धिप्रत्यवसानार्थशब्दकर्माकर्मकाणामणि कर्ता","1.4.53:संज्ञा:हृक्रोरन्यतरस्याम्","1.4.54:संज्ञा:स्वतन्त्रः कर्ता","1.4.55:संज्ञा:तत्प्रयोजको हेतुश्च","1.4.56:अधिकारः:प्राग्रीश्वरान्निपाताः","1.4.57::चादयोऽसत्त्वे","1.4.58::प्रादयः","1.4.59:संज्ञा:उपसर्गाः क्रियायोगे","1.4.60:संज्ञा:गतिश्च","1.4.61:संज्ञा:ऊर्यादिच्विडाचश्च","1.4.62:संज्ञा:अनुकरणं चानितिपरम्","1.4.63:संज्ञा:आदरानादरयोः सदसती","1.4.64:संज्ञा:भूषणेऽलम्","1.4.65:संज्ञा:अन्तरपरिग्रहे","1.4.66:संज्ञा:कणेमनसी श्रद्धाप्रतीघाते","1.4.67:संज्ञा:पुरोऽव्ययम्","1.4.68:संज्ञा:अस्तं च","1.4.69:संज्ञा:अच्छ गत्यर्थवदेषु","1.4.70:संज्ञा:अदोऽनुपदेशे","1.4.71:संज्ञा:तिरोऽन्तर्द्धौ","1.4.72:संज्ञा:विभाषा कृञि","1.4.73:संज्ञा:उपाजेऽन्वाजे","1.4.74:संज्ञा:साक्षात्प्रभृतीनि च","1.4.75:संज्ञा:अनत्याधान उरसिमनसी","1.4.76:संज्ञा:मध्येपदेनिवचने च","1.4.77:संज्ञा:नित्यं हस्ते पाणावुपयमने","1.4.78:संज्ञा:प्राध्वं बन्धने","1.4.79:संज्ञा:जीविकोपनिषदावौपम्ये","1.4.80::ते प्राग्धातोः","1.4.81::छन्दसि परेऽपि","1.4.82::व्यवहिताश्च","1.4.83:संज्ञा; अधिकारः:कर्मप्रवचनीयाः","1.4.84:संज्ञा:अनुर्लक्षणे","1.4.85:संज्ञा:तृतीयाऽर्थे","1.4.86:संज्ञा:हीने","1.4.87:संज्ञा:उपोऽधिके च","1.4.88:संज्ञा:अपपरी वर्जने","1.4.89:संज्ञा:आङ् मर्यादावचने","1.4.90:संज्ञा:लक्षणेत्थम्भूताख्यानभागवीप्सासु प्रतिपर्यनवः","1.4.91:संज्ञा:अभिरभागे","1.4.92:संज्ञा:प्रतिः प्रतिनिधिप्रतिदानयोः","1.4.93:संज्ञा:अधिपरी अनर्थकौ","1.4.94:संज्ञा:सुः पूजायाम्","1.4.95:संज्ञा:अतिरतिक्रमणे च","1.4.96:संज्ञा:अपिः पदार्थसम्भावनान्ववसर्गगर्हासमुच्चयेषु","1.4.97:संज्ञा:अधिरीश्वरे","1.4.98:संज्ञा:विभाषा कृञि","1.4.99:संज्ञा:लः परस्मैपदम्","1.4.100:संज्ञा:तङानावात्मनेपदम्","1.4.101:संज्ञा:तिङस्त्रीणि त्रीणि प्रथममध्यमोत्तमाः","1.4.102:संज्ञा:तान्येकवचनद्विवचनबहुवचनान्येकशः","1.4.103:संज्ञा:सुपः","1.4.104:संज्ञा:विभक्तिश्च","1.4.105::युष्मद्युपपदे समानाधिकरणे स्थानिन्यपि मध्यमः","1.4.106::प्रहासे च मन्योपपदे मन्यतेरुत्तम एकवच्च","1.4.107::अस्मद्युत्तमः","1.4.108::शेषे प्रथमः","1.4.109:संज्ञा:परः संनिकर्षः संहिता","1.4.110:संज्ञा:विरामोऽवसानम्","2.1.1:परिभाषा:समर्थः पदविधिः","2.1.2:अतिदेशः:सुबामन्त्रिते पराङ्गवत्‌ स्वरे","2.1.3:संज्ञा; अधिकारः:प्राक् कडारात्‌ समासः","2.1.4::सह सुपा","2.1.5:संज्ञा; अधिकारः:अव्ययीभावः","2.1.6::अव्ययं विभक्तिसमीपसमृद्धिव्यृद्ध्यर्थाभावात्ययासम्प्रतिशब्दप्रादुर्भावपश्चाद्यथाऽऽनुपूर्व्ययौगपद्यसादृश्यसम्पत्तिसाकल्यान्तवचनेषु","2.1.7::यथाऽसादृये","2.1.8::यावदवधारणे","2.1.9::सुप्प्रतिना मात्राऽर्थे","2.1.10::अक्षशलाकासंख्याः परिणा","2.1.11::विभाषा","2.1.12::अपपरिबहिरञ्चवः पञ्चम्या","2.1.13::आङ् मर्यादाऽभिविध्योः","2.1.14::लक्षणेनाभिप्रती आभिमुख्ये","2.1.15::अनुर्यत्समया","2.1.16::यस्य चायामः","2.1.17::तिष्ठद्गुप्रभृतीनि च","2.1.18::पारे मध्ये षष्ठ्या वा","2.1.19::संख्या वंश्येन","2.1.20::नदीभिश्च","2.1.21::अन्यपदार्थे च संज्ञायाम्‌","2.1.22:संज्ञा; अधिकारः:तत्पुरुषः","2.1.23:संज्ञा:द्विगुश्च","2.1.24::द्वितीया श्रितातीतपतितगतात्यस्तप्राप्तापन्नैः","2.1.25::स्वयं क्तेन","2.1.26::खट्वा क्षेपे","2.1.27::सामि","2.1.28::कालाः","2.1.29::अत्यन्तसंयोगे च","2.1.30::तृतीया तत्कृतार्थेन गुणवचनेन","2.1.31::पूर्वसदृशसमोनार्थकलहनिपुणमिश्रश्लक्ष्णैः","2.1.32::कर्तृकरणे कृता बहुलम्‌","2.1.33::कृत्यैरधिकार्थवचने","2.1.34::अन्नेन व्यञ्जनम्‌","2.1.35::भक्ष्येण मिश्रीकरणम्‌","2.1.36::चतुर्थी तदर्थार्थबलिहितसुखरक्षितैः","2.1.37::पञ्चमी भयेन","2.1.38::अपेतापोढमुक्तपतितापत्रस्तैरल्पशः","2.1.39::स्तोकान्तिकदूरार्थकृच्छ्राणि क्तेन","2.1.40::सप्तमी शौण्डैः","2.1.41::सिद्धशुष्कपक्वबन्धैश्च","2.1.42::ध्वाङ्क्षेण क्षेपे","2.1.43::कृत्यैर्ऋणे","2.1.44::संज्ञायाम्‌","2.1.45::क्तेनाहोरात्रावयवाः","2.1.46::तत्र","2.1.47::क्षेपे","2.1.48::पात्रेसमितादयश्च","2.1.49::पूर्वकालैकसर्वजरत्पुराणनवकेवलाः समानाधिकरणेन","2.1.50::दिक्संख्ये संज्ञायाम्‌","2.1.51::तद्धितार्थोत्तरपदसमाहारे च","2.1.52::संख्यापूर्वो द्विगुः","2.1.53::कुत्सितानि कुत्सनैः","2.1.54::पापाणके कुत्सितैः","2.1.55::उपमानानि सामान्यवचनैः","2.1.56::उपमितं व्याघ्रादिभिः सामान्याप्रयोगे","2.1.57::विशेषणं विशेष्येण बहुलम्‌","2.1.58::पूर्वापरप्रथमचरमजघन्यसमानमध्यमध्यमवीराश्च","2.1.59::श्रेण्यादयः कृतादिभिः","2.1.60::क्तेन नञ्विशिष्टेनानञ्","2.1.61::सन्महत्परमोत्तमोत्कृष्टाः पूज्यमानैः","2.1.62::वृन्दारकनागकुञ्जरैः पूज्यमानम्‌","2.1.63::कतरकतमौ जातिपरिप्रश्ने","2.1.64::किं क्षेपे","2.1.65::पोटायुवतिस्तोककतिपयगृष्टिधेनुवशावेहत्बष्कयणीप्रवक्तॄश्रोत्रियाध्यापकधूर्तैर्जातिः","2.1.66::प्रशंसावचनैश्च","2.1.67::युवा खलतिपलितवलिनजरतीभिः","2.1.68::कृत्यतुल्याख्या अजात्या","2.1.69::वर्णो वर्णेन","2.1.70::कुमारः श्रमणाऽऽदिभिः","2.1.71::चतुष्पादो गर्भिण्या","2.1.72::मयूरव्यंसकादयश्च","2.2.1::पूर्वापराधरोत्तरमेकदेशिनैकाधिकरणे","2.2.2::अर्धं नपुंसकम्‌","2.2.3::द्वितीयतृतीयचतुर्थतुर्याण्यन्यतरस्याम्‌","2.2.4::प्राप्तापन्ने च द्वितीयया","2.2.5::कालाः परिमाणिना","2.2.6::नञ्‌","2.2.7::ईषदकृता","2.2.8::षष्ठी","2.2.9::याजकादिभिश्च","2.2.10::न निर्धारणे","2.2.11::पूरणगुणसुहितार्थसदव्ययतव्यसमानाधिकरणेन","2.2.12::क्तेन च पूजायाम्‌","2.2.13::अधिकरणवाचिना च","2.2.14::कर्म्मणि च","2.2.15::तृजकाभ्यां कर्तरि","2.2.16::कर्त्तरि च","2.2.17::नित्यं क्रीडाजीविकयोः","2.2.18::कुगतिप्रादयः","2.2.19::उपपदमतिङ्","2.2.20::अमैवाव्ययेन","2.2.21::तृतीयाप्रभृतीन्यन्यतरस्याम्‌","2.2.22::क्त्वा च","2.2.23:संज्ञा:शेषो बहुव्रीहिः","2.2.24::अनेकमन्यपदार्थे","2.2.25::संख्ययाऽव्ययासन्नादूराधिकसंख्याः संख्येये","2.2.26::दिङ्नामान्यन्तराले","2.2.27::तत्र तेनेदमिति सरूपे","2.2.28::तेन सहेति तुल्ययोगे","2.2.29:संज्ञा:चार्थे द्वंद्वः","2.2.30::उपसर्जनं पूर्वम्‌","2.2.31::राजदन्तादिषु परम्‌","2.2.32::द्वंद्वे घि","2.2.33::अजाद्यदन्तम्‌","2.2.34::अल्पाच्तरम्‌","2.2.35::सप्तमीविशेषणे बहुव्रीहौ","2.2.36::निष्ठा","2.2.37::वाऽऽहिताग्न्यादिषु","2.2.38::कडाराः कर्मधराये","2.3.1:अधिकारः:अनभिहिते","2.3.2::कर्मणि द्वितीया","2.3.3::तृतीया च होश्छन्दसि","2.3.4::अन्तराऽन्तरेण युक्ते","2.3.5::कालाध्वनोरत्यन्तसंयोगे","2.3.6::अपवर्गे तृतीया","2.3.7::सप्तमीपञ्चम्यौ कारकमध्ये","2.3.8::कर्मप्रवचनीययुक्ते द्वितीया","2.3.9::यस्मादधिकं यस्य चेश्वरवचनं तत्र सप्तमी","2.3.10::पञ्चमी अपाङ्परिभिः","2.3.11::प्रतिनिधिप्रतिदाने च यस्मात्‌","2.3.12::गत्यर्थकर्मणि द्वितीयाचतुर्थ्यौ चेष्टायामनध्वनि","2.3.13::चतुर्थी सम्प्रदाने","2.3.14::क्रियार्थोपपदस्य च कर्मणि स्थानिनः","2.3.15::तुमर्थाच्च भाववचनात्‌","2.3.16::नमःस्वस्तिस्वाहास्वधालंवषड्योगाच्च","2.3.17::मन्यकर्मण्यनादरे विभाषाऽप्राणिषु","2.3.18::कर्तृकरणयोस्तृतीया","2.3.19::सहयुक्तेऽप्रधाने","2.3.20::येनाङ्गविकारः","2.3.21::इत्थंभूतलक्षणे","2.3.22::संज्ञोऽन्यतरस्यां कर्मणि","2.3.23::हेतौ","2.3.24::अकर्तर्यृणे पञ्चमी","2.3.25::विभाषा गुणेऽस्त्रियाम्‌","2.3.26::षष्ठी हेतुप्रयोगे","2.3.27::सर्वनाम्नस्तृतीया च","2.3.28::अपादाने पञ्चमी","2.3.29::अन्यारादितरर्त्तेदिक्‌शब्दाञ्चूत्तरपदाजाहियुक्ते","2.3.30::षष्ठ्यतसर्थप्रत्ययेन","2.3.31::एनपा द्वितीया","2.3.32::पृथग्विनानानाभिस्तृतीयाऽन्यतरस्याम्‌","2.3.33::करणे च स्तोकाल्पकृच्छ्रकतिपयस्यासत्त्ववचनस्य","2.3.34::दूरान्तिकार्थैः षष्ठ्यन्यतरस्याम्‌","2.3.35::दूरान्तिकार्थेभ्यो द्वितीया च","2.3.36::सप्तम्यधिकरणे च","2.3.37::यस्य च भावेन भावलक्षणम्‌","2.3.38::षष्ठी चानादरे","2.3.39::स्वामीश्वराधिपतिदायादसाक्षिप्रतिभूप्रसूतैश्च","2.3.40::आयुक्तकुशलाभ्यां चासेवायाम्‌","2.3.41::यतश्च निर्धारणम्‌","2.3.42::पञ्चमी विभक्ते","2.3.43::साधुनिपुणाभ्याम् अर्चायां सप्तम्यप्रतेः","2.3.44::प्रसितोत्सुकाभ्यां तृतीया च","2.3.45::नक्षत्रे च लुपि","2.3.46::प्रातिपदिकार्थलिङ्गपरिमाणवचनमात्रे प्रथमा","2.3.47::सम्बोधने च","2.3.48:संज्ञा:साऽऽमन्त्रितम्‌","2.3.49:संज्ञा:एकवचनं संबुद्धिः","2.3.50::षष्ठी शेषे","2.3.51::ज्ञोऽविदर्थस्य करणे","2.3.52::अधीगर्थदयेशां कर्मणि","2.3.53::कृञः प्रतियत्ने","2.3.54::रुजार्थानां भाववचनानामज्वरेः","2.3.55::आशिषि नाथः","2.3.56::जासिनिप्रहणनाटक्राथपिषां हिंसायाम्‌","2.3.57::व्यवहृपणोः समर्थयोः","2.3.58::दिवस्तदर्थस्य","2.3.59::विभाषोपसर्गे","2.3.60::द्वितीया ब्राह्मणे","2.3.61::प्रेष्यब्रुवोर्हविषो देवतासम्प्रदाने","2.3.62::चतुर्थ्यर्थे बहुलं छन्दसि","2.3.63::यजेश्च करणे","2.3.64::कृत्वोऽर्थप्रयोगे कालेऽधिकरणे","2.3.65::कर्तृकर्मणोः कृति","2.3.66::उभयप्राप्तौ कर्मणि","2.3.67::क्तस्य च वर्तमाने","2.3.68::अधिकरणवाचिनश्च","2.3.69::न लोकाव्ययनिष्ठाखलर्थतृनाम्‌","2.3.70::अकेनोर्भविष्यदाधमर्ण्ययोः","2.3.71::कृत्यानां कर्तरि वा","2.3.72::तुल्यार्थैरतुलोपमाभ्यां तृतीयाऽन्यतरस्याम्‌","2.3.73::चतुर्थी चाशिष्यायुष्यमद्रभद्रकुशलसुखार्थहितैः","2.4.1:अतिदेशः:द्विगुरेकवचनम्‌","2.4.2::द्वंद्वश्च प्राणितूर्यसेनाङ्गानाम्‌","2.4.3::अनुवादे चरणानाम्‌","2.4.4::अध्वर्युक्रतुरनपुंसकम्.","2.4.5::अध्ययनतोऽविप्रकृष्टाख्यानाम्‌","2.4.6::जातिरप्राणिनाम्‌","2.4.7::विशिष्टलिङ्गो नदी देशोऽग्रामाः","2.4.8::क्षुद्रजन्तवः","2.4.9::येषां च विरोधः शाश्वतिकः","2.4.10::शूद्राणामनिरवसितानाम्‌","2.4.11::गवाश्वप्रभृतीनि च","2.4.12::विभाषा वृक्षमृगतृणधान्यव्यञ्जनपशुशकुन्यश्ववडवपूर्वापराधरोत्तराणाम्‌","2.4.13::विप्रतिषिद्धं चानधिकरणवाचि","2.4.14::न दधिपयआदीनि","2.4.15::अधिकरणैतावत्त्वे च","2.4.16::विभाषा समीपे","2.4.17::स नपुंसकम्‌","2.4.18::अव्ययीभावश्च","2.4.19:अधिकारः:तत्पुरुषोऽनञ्‌ कर्मधारयः","2.4.20::संज्ञायां कन्थोशीनरेषु","2.4.21::उपज्ञोपक्रमं तदाद्याचिख्यासायाम्‌","2.4.22::छाया बाहुल्ये","2.4.23::सभा राजाऽमनुष्यपूर्वा","2.4.24::अशाला च","2.4.25::विभाषा सेनासुराछायाशालानिशानाम्‌","2.4.26:अतिदेशः:परवल्लिङ्गं द्वन्द्वतत्पुरुषयोः","2.4.27::पूर्ववदश्ववडवौ","2.4.28::हेमन्तशिशिरावहोरात्रे च च्छन्दसि","2.4.29::रात्राह्नाहाः पुंसि","2.4.30::अपथं नपुंसकम्‌","2.4.31::अर्धर्चाः पुंसि च","2.4.32::इदमोऽन्वादेशेऽशनुदात्तस्तृतीयाऽऽदौ","2.4.33::एतदस्त्रतसोस्त्रतसौ चानुदात्तौ","2.4.34::द्वितीयाटौस्स्वेनः","2.4.35:अधिकारः:आर्द्धधातुके","2.4.36::अदो जग्धिर्ल्यप्ति किति","2.4.37::लुङ्सनोर्घसॢ","2.4.38::घञपोश्च","2.4.39::बहुलं छन्दसि","2.4.40::लिट्यन्यतरस्याम्‌","2.4.41::वेञो वयिः","2.4.42::हनो वध लिङि","2.4.43::लुङि च","2.4.44::आत्मनेपदेष्वन्यतरस्याम्‌","2.4.45::इणो गा लुङि","2.4.46::णौ गमिरबोधने","2.4.47::सनि च","2.4.48::इङश्च","2.4.49::गाङ्‌ लिटि","2.4.50::विभाषा लुङ्लृङोः","2.4.51::णौ च सँश्चङोः","2.4.52::अस्तेर्भूः","2.4.53::ब्रुवो वचिः","2.4.54::चक्षिङः ख्याञ्‌","2.4.55::वा लिटि","2.4.56::अजेर्व्यघञपोः","2.4.57::वा यौ","2.4.58::ण्यक्षत्रियार्षञितो यूनि लुगणिञोः","2.4.59::पैलादिभ्यश्च","2.4.60::इञः प्राचाम्‌","2.4.61::न तौल्वलिभ्यः","2.4.62::तद्राजस्य बहुषु तेनैवास्त्रियाम्‌","2.4.63::यस्कादिभ्यो गोत्रे","2.4.64::यञञोश्च","2.4.65::अत्रिभृगुकुत्सवसिष्ठगोतमाङ्गिरोभ्यश्च","2.4.66::बह्वचः इञः प्राच्यभरतेषु","2.4.67::न गोपवनादिभ्यः","2.4.68::तिककितवादिभ्यो द्वंद्वे","2.4.69::उपकादिभ्योऽन्यतरस्यामद्वंद्वे","2.4.70::आगस्त्यकौण्डिन्ययोरगस्तिकुण्डिनच्‌","2.4.71::सुपो धातुप्रातिपदिकयोः","2.4.72::अदिप्रभृतिभ्यः शपः","2.4.73::बहुलं छन्दसि","2.4.74::यङोऽचि च","2.4.75::जुहोत्यादिभ्यः श्लुः","2.4.76::बहुलं छन्दसि","2.4.77::गातिस्थाघुपाभूभ्यः सिचः परस्मैपदेषु","2.4.78::विभाषा घ्राधेट्शाच्छासः","2.4.79::तनादिभ्यस्तथासोः","2.4.80::मन्त्रे घसह्वरणशवृदहाद्वृच्कृगमिजनिभ्यो लेः","2.4.81::आमः","2.4.82::अव्ययादाप्सुपः","2.4.83::नाव्ययीभावादतोऽम्त्वपञ्चम्याः","2.4.84::तृतीयासप्तम्योर्बहुलम्‌","2.4.85::लुटः प्रथमस्य डारौरसः","3.1.1:संज्ञा; अधिकारः:प्रत्ययः","3.1.2:अधिकारः:परश्च","3.1.3::आद्युदात्तश्च","3.1.4::अनुदत्तौ सुप्पितौ","3.1.5::गुप्तिज्किद्भ्यः सन्","3.1.6::मान्बधदान्शान्भ्यो दीर्घश्चाभ्यासस्य","3.1.7::धातोः कर्मणः समानकर्तृकादिच्छायां वा","3.1.8::सुप आत्मनः क्यच्","3.1.9::काम्यच्च","3.1.10::उपमानादाचारे","3.1.11::कर्तुः क्यङ् सलोपश्च","3.1.12::भृशादिभ्यो भुव्यच्वेर्लोपश्च हलः","3.1.13::लोहितादिडाज्भ्यः क्यष्।","3.1.14::कष्टाय क्रमणे","3.1.15::कर्मणः रोमन्थतपोभ्यां वर्तिचरोः","3.1.16::बाष्पोष्माभ्यां उद्वमने","3.1.17::शब्दवैरकलहाभ्रकण्वमेघेभ्यः करणे","3.1.18::सुखादिभ्यः कर्तृवेदनायाम्","3.1.19::नमोवरिवश्चित्रङः क्यच्","3.1.20::पुच्छभाण्डचीवराण्णिङ्","3.1.21::मुण्डमिश्रश्लक्ष्णलवणव्रतवस्त्रहलकलकृततूस्तेभ्यो","3.1.22:अधिकारः:धातोरेकाचो हलादेः क्रियासमभिहारे यङ्","3.1.23::नित्यं कौटिल्ये गतौ","3.1.24::लुपसदचरजपजभदहदशगॄभ्यो भावगर्हायाम्","3.1.25::सत्यापपाशरूपवीणातूलश्लोकसेनालोमत्वचवर्मवर्णचूर्णचुरादिभ्यो णिच्","3.1.26::हेतुमति च","3.1.27::कण्ड्वादिभ्यो यक्","3.1.28::गुपूधूपविच्छिपणिपनिभ्य आयः","3.1.29::ऋतेरीयङ्","3.1.30::कमेर्णिङ्","3.1.31::आयादय आर्धद्धातुके वा","3.1.32:संज्ञा:सनाद्यन्ता धातवः","3.1.33::स्यतासी लृलुटोः","3.1.34::सिब्बहुलं लेटि","3.1.35::कास्प्रत्ययादाममन्त्रे लिटि","3.1.36::इजादेश्च गुरुमतोऽनृच्छः","3.1.37::दयायासश्च","3.1.38::उषविदजागृभ्योऽन्यतरस्याम्","3.1.39::भीह्रीभृहुवां श्लुवच्च","3.1.40::कृञ् चानुप्रयुज्यते लिटि","3.1.41::विदाङ्कुर्वन्त्वित्यन्यतरस्याम्","3.1.42::अभ्युत्सादयांप्रजनयांचिकयांरमयामकः","3.1.43::च्लि लुङि","3.1.44::च्लेः सिच्","3.1.45::शल इगुपधादनिटः क्सः","3.1.46::श्लिष आलिङ्गने","3.1.47::न दृशः","3.1.48::णिश्रिद्रुस्रुभ्यः कर्तरि चङ्","3.1.49::विभाषा धेट्श्व्योः","3.1.50::गुपेश्छन्दसि","3.1.51::नोनयतिध्वनयत्येलयत्यर्दयतिभ्यः","3.1.52::अस्यतिवक्तिख्यातिभ्यः अङ्","3.1.53::लिपिसिचिह्वश्च","3.1.54::आत्मनेपदेष्वन्यतरस्याम्","3.1.55::पुषादिद्युताद्यॢदितः परस्मैपदेषु","3.1.56::सर्त्तिशास्त्यर्तिभ्यश्च","3.1.57::इरितो वा","3.1.58::जृस्तम्भुम्रुचुम्लुचुग्रुचुग्लुचुग्लुञ्चुश्विभ्यश्च","3.1.59::कृमृदृरुहिभ्यश्छन्दसि","3.1.60::चिण् ते पदः","3.1.61::दीपजनबुधपूरितायिप्यायिभ्योऽन्यतरस्याम्","3.1.62::अचः कर्मकर्तरि","3.1.63::दुहश्च","3.1.64::न रुधः","3.1.65::तपोऽनुतापे च","3.1.66::चिण् भावकर्मणोः","3.1.67::सार्वधातुके यक्","3.1.68::कर्तरि शप्‌","3.1.69::दिवादिभ्यः श्यन्","3.1.70::वा भ्राशभ्लाशभ्रमुक्रमुक्लमुत्रसित्रुटिलषः","3.1.71::यसोऽनुपसर्गात्‌","3.1.72::संयसश्च","3.1.73::स्वादिभ्यः श्नुः","3.1.74::श्रुवः शृ च","3.1.75::अक्षोऽन्यतरस्याम्","3.1.76::तनूकरणे तक्षः","3.1.77::तुदादिभ्यः शः","3.1.78::रुधादिभ्यः श्नम्","3.1.79::तनादिकृञ्भ्य उः","3.1.80::धिन्विकृण्व्योर च","3.1.81::क्र्यादिभ्यः श्ना","3.1.82::स्तम्भुस्तुम्भुस्कम्भुस्कुम्भुस्कुञ्भ्यः श्नुश्च","3.1.83::हलः श्नः शानज्झौ","3.1.84::छन्दसि शायजपि","3.1.85::व्यत्ययो बहुलम्","3.1.86::लिङ्याशिष्यङ्","3.1.87:अतिदेशः:कर्मवत्‌ कर्मणा तुल्यक्रियः","3.1.88::तपस्तपःकर्मकस्यैव","3.1.89::न दुहस्नुनमां यक्चिणौ","3.1.90::कुषिरजोः प्राचां श्यन् परस्मैपदं च","3.1.91:अधिकारः:धातोः","3.1.92:संज्ञा:तत्रोपपदं सप्तमीस्थम्‌","3.1.93:संज्ञा:कृदतिङ्","3.1.94:परिभाषा:वाऽसरूपोऽस्त्रियाम्","3.1.95:संज्ञा:कृत्याः प्राङ् ण्वुलः","3.1.96::तव्यत्तव्यानीयरः","3.1.97::अचो यत्‌","3.1.98::पोरदुपधात्‌","3.1.99::शकिसहोश्च","3.1.100::गदमदचरयमश्चानुपसर्गे","3.1.101::अवद्यपण्यवर्या गर्ह्यपणितव्यानिरोधेषु","3.1.102::वह्यं करणम्‌","3.1.103::अर्यः स्वामिवैश्ययोः","3.1.104::उपसर्या काल्या प्रजने","3.1.105::अजर्यं संगतम्‌","3.1.106::वदः सुपि क्यप् च","3.1.107::भुवो भावे","3.1.108::हनस्त च","3.1.109::एतिस्तुशस्वृदृजुषः क्यप्‌","3.1.110::ऋदुपधाच्चाकॢपिचृतेः","3.1.111::ई च खनः","3.1.112::भृञोऽसंज्ञायाम्","3.1.113::मृजेर्विभाषा","3.1.114::राजसूयसूर्यमृषोद्यरुच्यकुप्यकृष्टपच्याव्यथ्याः","3.1.115::भिद्योद्ध्यौ नदे","3.1.116::पुष्यसिद्ध्यौ नक्षत्रे","3.1.117::विपूयविनीयजित्या मुञ्जकल्कहलिषु","3.1.118::प्रत्यपिभ्यां ग्रहेश्छन्दसि","3.1.119::पदास्वैरिबाह्यापक्ष्येषु च","3.1.120::विभाषा कृवृषोः","3.1.121::युग्यं च पत्त्रे","3.1.122::अमावस्यदन्यतरस्याम्","3.1.123::छन्दसि निष्टर्क्यदेवहूयप्रणीयोन्नीयोच्छिष्य","3.1.124::ऋहलोर्ण्यत्‌","3.1.125::ओरावश्यके","3.1.126::आसुयुवपिरपिलपित्रपिचमश्च","3.1.127::आनाय्योऽनित्ये","3.1.128::प्रणाय्योऽसंमतौ","3.1.129::पाय्यसान्नाय्यनिकाय्यधाय्या मानहविर्निवाससामिधेनीषु","3.1.130::क्रतौ कुण्डपाय्यसंचाय्यौ","3.1.131::अग्नौ परिचाय्योपचाय्यसमूह्याः","3.1.132::चित्याग्निचित्ये च","3.1.133::ण्वुल्तृचौ","3.1.134::नन्दिग्रहिपचादिभ्यो ल्युणिन्यचः","3.1.135::इगुपधज्ञाप्रीकिरः कः","3.1.136::आतश्चोपसर्गे","3.1.137::पाघ्राध्माधेट्दृशः शः","3.1.138::अनुपसर्गाल्लिम्पविन्दधारिपारिवेद्युदेजिचेतिसातिसाहिभ्यश्च","3.1.139::ददातिदधात्योर्विभाषा","3.1.140::ज्वलितिकसन्तेभ्यो णः","3.1.141::श्याऽऽद्व्यधास्रुसंस्र्वतीणवसाऽवहृलिहश्लिषश्वसश्च","3.1.142::दुन्योरनुपसर्गे","3.1.143::विभाषा ग्रहेः","3.1.144::गेहे कः","3.1.145::शिल्पिनि ष्वुन्","3.1.146::गस्थकन्","3.1.147::ण्युट् च","3.1.148::हश्च व्रीहिकालयोः","3.1.149::प्रुसृल्वः समभिहारे वुन्","3.1.150::आशिषि च","3.2.1::कर्मण्यण्","3.2.2::ह्वावामश्च","3.2.3::आतोऽनुपसर्गे कः","3.2.4::सुपि स्थः","3.2.5::तुन्दशोकयोः परिमृजापनुदोः","3.2.6::प्रे दाज्ञः","3.2.7::समि ख्यः","3.2.8::गापोष्टक्","3.2.9::हरतेरनुद्यमनेऽच्","3.2.10::वयसि च","3.2.11::आङि ताच्छील्ये","3.2.12::अर्हः","3.2.13::स्तम्बकर्णयोः रमिजपोः","3.2.14::शमि धातोः संज्ञायाम्","3.2.15::अधिकरणे शेतेः","3.2.16::चरेष्टः","3.2.17::भिक्षासेनाऽऽदायेषु च","3.2.18::पुरोऽग्रतोऽग्रेषु सर्तेः","3.2.19::पूर्वे कर्तरि","3.2.20::कृञो हेतुताच्छील्यानुलोम्येषु","3.2.21::दिवाविभानिशाप्रभाभास्करान्तानन्तादिबहुनान्दीकिम्लिपिलिबिबलिभक्तिकर्तृचित्रक्षेत्रसंख्याजङ्घाबाह्वहर्यत्तत्धनुररुष्षु","3.2.22::कर्मणि भृतौ","3.2.23::न शब्दश्लोककलहगाथावैरचाटुसूत्रमन्त्रपदेषु","3.2.24::स्तम्बशकृतोरिन्","3.2.25::हरतेर्दृतिनाथयोः पशौ","3.2.26::फलेग्रहिरात्मम्भरिश्च","3.2.27::छन्दसि वनसनरक्षिमथाम्","3.2.28::एजेः खश्","3.2.29::नासिकास्तनयोर्ध्माधेटोः","3.2.30::नाडीमुष्ट्योश्च","3.2.31::उदि कूले रुजिवहोः","3.2.32::वहाभ्रे लिहः","3.2.33::परिमाणे पचः","3.2.34::मितनखे च","3.2.35::विध्वरुषोः तुदः","3.2.36::असूर्यललाटयोर्दृशितपोः","3.2.37::उग्रम्पश्येरम्मदपाणिन्धमाश्च","3.2.38::प्रियवशे वदः खच्","3.2.39::द्विषत्परयोस्तापेः","3.2.40::वाचि यमो व्रते","3.2.41::पूःसर्वयोर्दारिसहोः","3.2.42::सर्वकूलाभ्रकरीषेषु कषः","3.2.43::मेघर्तिभयेषु कृञः","3.2.44::क्षेमप्रियमद्रेऽण् च","3.2.45::आशिते भुवः करणभावयोः","3.2.46::संज्ञायां भृतॄवृजिधारिसहितपिदमः","3.2.47::गमश्च","3.2.48::अन्तात्यन्ताध्वदूरपारसर्वानन्तेषु डः","3.2.49::आशिषि हनः","3.2.50::अपे क्लेशतमसोः","3.2.51::कुमारशीर्षयोर्णिनिः","3.2.52::लक्षणे जायापत्योष्टक्","3.2.53::अमनुष्यकर्तृके च","3.2.54::शक्तौ हस्तिकपाटयोः","3.2.55::पाणिघताडघौ शिल्पिनि","3.2.56::आढ्यसुभगस्थूलपलितनग्नान्धप्रियेषु च्व्य्र्थेष्वच्वौ कृञः करणे ख्युन्","3.2.57::कर्तरि भुवः खिष्णुच्खुकञौ","3.2.58::स्पृशोऽनुदके क्विन्","3.2.59::ऋत्विग्दधृक्स्रग्दिगुष्णिगञ्चुयुजिक्रुञ्चां च","3.2.60::त्यदादिषु दृशोऽनालोचने कञ् च","3.2.61::सत्सूद्विषद्रुहदुहयुजविदभिदच्छिदजिनीराजामुपसर्गेऽपि क्विप्‌","3.2.62::भजो ण्विः","3.2.63::छन्दसि सहः","3.2.64::वहश्च","3.2.65::कव्यपुरीषपुरीष्येषु ञ्युट्","3.2.66::हव्येऽनन्तः पादम्","3.2.67::जनसनखनक्रमगमो विट्","3.2.68::अदोऽनन्ने","3.2.69::क्रव्ये च","3.2.70::दुहः कब् घश्च","3.2.71::मन्त्रे श्वेतवहौक्थशस्पुरोडाशो ण्विन्","3.2.72::अवे यजः","3.2.73::विजुपे छन्दसि","3.2.74::आतो मनिन्क्वनिप्वनिपश्च","3.2.75::अन्येभ्योऽपि दृश्यन्ते","3.2.76::क्विप् च","3.2.77::स्थः क च","3.2.78::सुप्यजातौ णिनिस्ताच्छिल्ये","3.2.79::कर्तर्युपमाने","3.2.80::व्रते","3.2.81::बहुलमाभीक्ष्ण्ये","3.2.82::मनः","3.2.83::आत्ममाने खश्च","3.2.84:अधिकारः:भूते","3.2.85::करणे यजः","3.2.86::कर्मणि हनः","3.2.87::ब्रह्मभ्रूणवृत्रेषु क्विप्‌","3.2.88::बहुलं छन्दसि","3.2.89::सुकर्मपापमन्त्रपुण्येषु कृञः","3.2.90::सोमे सुञः","3.2.91::अग्नौ चेः","3.2.92::कर्मण्यग्न्याख्यायाम्","3.2.93::कर्मणीनिर्विक्रियः","3.2.94::दृशेः क्वनिप्‌","3.2.95::राजनि युधिकृञः","3.2.96::सहे च","3.2.97::सप्तम्यां जनेर्डः","3.2.98::पञ्चम्यामजातौ","3.2.99::उपसर्गे च संज्ञायाम्","3.2.100::अनौ कर्मणि","3.2.101::अन्येष्वपि दृश्यते","3.2.102::निष्ठा","3.2.103::सुयजोर्ङ्वनिप्‌","3.2.104::जीर्यतेरतृन्","3.2.105::छन्दसि लिट्","3.2.106::लिटः कानज्वा","3.2.107::क्वसुश्च","3.2.108::भाषायां सदवसश्रुवः","3.2.109::उपेयिवाननाश्वाननूचानश्च","3.2.110::लुङ्","3.2.111::अनद्यतने लङ्","3.2.112::अभिज्ञावचने लृट्","3.2.113::न यदि","3.2.114::विभाषा साकाङ्क्षे","3.2.115::परोक्षे लिट्","3.2.116::हशश्वतोर्लङ् च","3.2.117::प्रश्ने चासन्नकाले","3.2.118::लट् स्मे","3.2.119::अपरोक्षे च","3.2.120::ननौ पृष्टप्रतिवचने","3.2.121::नन्वोर्विभाषा","3.2.122::पुरि लुङ् चास्मे","3.2.123:अधिकारः:वर्तमाने लट्","3.2.124::लटः शतृशानचावप्रथमासमानाधिकरणे","3.2.125::सम्बोधने च","3.2.126::लक्षणहेत्वोः क्रियायाः","3.2.127:संज्ञा:तौ सत्‌","3.2.128::पूङ्यजोः शानन्","3.2.129::ताच्छील्यवयोवचनशक्तिषु चानश्","3.2.130::इङ्धार्योः शत्रकृच्छ्रिणि","3.2.131::द्विषोऽमित्रे","3.2.132::सुञो यज्ञसंयोगे","3.2.133::अर्हः पूजायाम्","3.2.134:अधिकारः:आक्वेस्तच्छीलतद्धर्मतत्साधुकारिषु","3.2.135::तृन्","3.2.136::अलंकृञ्निराकृञ्प्रजनोत्पचोत्पतोन्मदरुच्यपत्रपवृतुवृधुसहचर इष्णुच्","3.2.137::णेश्छन्दसि","3.2.138::भुवश्च","3.2.139::ग्लाजिस्थश्च क्स्नुः","3.2.140::त्रसिगृधिधृषिक्षिपेः क्नुः","3.2.141::शमित्यष्टाभ्यो घिनुण्","3.2.142::संपृचानुरुधाङ्यमाङ्यसपरिसृसंसृजपरिदेविसंज्वरपरिक्षिपपरिरटपरिवदपरिदहपरिमुहदुषद्विषद्रुहदुहयुजाक्रीडविविचत्यजरजभजातिचरापचरामुषाभ्याहनश्च","3.2.143::वौ कषलसकत्थस्रम्भः","3.2.144::अपे च लषः","3.2.145::प्रे लपसृद्रुमथवदवसः","3.2.146::निन्दहिंसक्लिशखादविनाशपरिक्षिपपरिरटपरिवादिव्याभाषासूञो वुञ्","3.2.147::देविक्रुशोश्चोपसर्गे","3.2.148::चलनशब्दार्थादकर्मकाद्युच्","3.2.149::अनुदात्तेतश्च हलादेः","3.2.150::जुचङ्क्रम्यदन्द्रम्यसृगृधिज्वलशुचलषपतपदः","3.2.151::क्रुधमण्डार्थेभ्यश्च","3.2.152::न यः","3.2.153::सूददीपदीक्षश्च","3.2.154::लषपतपदस्थाभूवृषहनकमगमशॄभ्य उकञ्","3.2.155::जल्पभिक्षकुट्टलुण्टवृङः षाकन्","3.2.156::प्रजोरिनिः","3.2.157::जिदृक्षिविश्रीण्वमाव्यथाभ्यमपरिभूप्रसूभ्यश्च","3.2.158::स्पृहिगृहिपतिदयिनिद्रातन्द्राश्रद्धाभ्य आलुच्","3.2.159::दाधेट्सिशदसदो रुः","3.2.160::सृघस्यदः क्मरच्","3.2.161::भञ्जभासमिदो घुरच्","3.2.162::विदिभिदिच्छिदेः कुरच्","3.2.163::इण्नश्जिसर्त्तिभ्यः क्वरप्‌","3.2.164::गत्वरश्च","3.2.165::जागुरूकः","3.2.166::यजजपदशां यङः","3.2.167::नमिकम्पिस्म्यजसकमहिंसदीपो रः","3.2.168::सनाशंसभिक्ष उः","3.2.169::विन्दुरिच्छुः","3.2.170::क्याच्छन्दसि","3.2.171::आदृगमहनजनः किकिनौ लिट् च","3.2.172::स्वपितृषोर्नजिङ्","3.2.173::शॄवन्द्योरारुः","3.2.174::भियः क्रुक्लुकनौ","3.2.175::स्थेशभासपिसकसो वरच्","3.2.176::यश्च यङः","3.2.177::भ्राजभासधुर्विद्युतोर्जिपॄजुग्रावस्तुवः क्विप्‌","3.2.178::अन्येभ्योऽपि दृश्यते","3.2.179::भुवः संज्ञाऽन्तरयोः","3.2.180::विप्रसम्भ्यो ड्वसंज्ञायाम्","3.2.181::धः कर्मणि ष्ट्रन्","3.2.182::दाम्नीशसयुयुजस्तुतुदसिसिचमिहपतदशनहः करणे","3.2.183::हलसूकरयोः पुवः","3.2.184::अर्तिलूधूसूखनसहचर इत्रः","3.2.185::पुवः संज्ञायाम्","3.2.186::कर्तरि चर्षिदेवतयोः","3.2.187::ञीतः क्तः","3.2.188::मतिबुद्धिपूजार्थेभ्यश्च","3.3.1::उणादयो बहुलम्","3.3.2::भूतेऽपि दृश्यन्ते","3.3.3:अधिकारः:भविष्यति गम्यादयः","3.3.4::यावत्पुरानिपातयोर्लट्","3.3.5::विभाषा कदाकर्ह्योः","3.3.6::किंवृत्ते लिप्सायाम्","3.3.7::लिप्स्यमानसिद्धौ च","3.3.8::लोडर्थलक्षणे च","3.3.9::लिङ् चोर्ध्वमौहूर्तिके","3.3.10::तुमुन्ण्वुलौ क्रियायां क्रियार्थायाम्‌","3.3.11::भाववचनाश्च","3.3.12::अण् कर्मणि च","3.3.13::लृट् शेषे च","3.3.14::लृटः सद् वा","3.3.15::अनद्यतने लुट्","3.3.16::पदरुजविशस्पृशो घञ्","3.3.17::सृ स्थिरे","3.3.18:अधिकारः:भावे","3.3.19:अधिकारः:अकर्तरि च कारके संज्ञायाम्","3.3.20::परिमणाख्यायां सर्वेभ्यः","3.3.21::इङश्च","3.3.22::उपसर्गे रुवः","3.3.23::समि युद्रुदुवः","3.3.24::श्रिणीभुवोऽनुपसर्गे","3.3.25::वौ क्षुश्रुवः","3.3.26::अवोदोर्नियः","3.3.27::प्रे द्रुस्तुस्रुवः","3.3.28::निरभ्योः पूल्वोः","3.3.29::उन्न्योर्ग्रः","3.3.30::कॄ धान्ये","3.3.31::यज्ञे समि स्तुवः","3.3.32::प्रे स्त्रोऽयज्ञे","3.3.33::प्रथने वावशब्दे","3.3.34::छन्दोनाम्नि च","3.3.35::उदि ग्रहः","3.3.36::समि मुष्टौ","3.3.37::परिन्योर्नीणोर्द्यूताभ्रेषयोः","3.3.38::परावनुपात्यय इणः","3.3.39::व्युपयोः शेतेः पर्याये","3.3.40::हस्तादाने चेरस्तेये","3.3.41::निवासचितिशरीरोपसमाधानेष्वादेश्च कः","3.3.42::संघे चानौत्तराधर्ये","3.3.43::कर्मव्यतिहारे णच् स्त्रियाम्","3.3.44::अभिविधौ भाव इनुण्","3.3.45::आक्रोशेऽवन्योर्ग्रहः","3.3.46::प्रे लिप्सायाम्","3.3.47::परौ यज्ञे","3.3.48::नौ वृ धान्ये","3.3.49::उदि श्रयतियौतिपूद्रुवः","3.3.50::विभाषाऽऽङि रुप्लुवोः","3.3.51::अवे ग्रहो वर्षप्रतिबन्धे","3.3.52::प्रे वणिजाम्","3.3.53::रश्मौ च","3.3.54::वृणोतेराच्छादने","3.3.55::परौ भुवोऽवज्ञाने","3.3.56::एरच्","3.3.57::ऋदोरप्‌","3.3.58::ग्रहवृदृनिश्चिगमश्च","3.3.59::उपसर्गेऽदः","3.3.60::नौ ण च","3.3.61::व्यधजपोरनुपसर्गे","3.3.62::स्वनहसोर्वा","3.3.63::यमः समुपनिविषु","3.3.64::नौ गदनदपठस्वनः","3.3.65::क्वणो वीणायां च","3.3.66::नित्यं पणः परिमाणे","3.3.67::मदोऽनुपसर्गे","3.3.68::प्रमदसम्मदौ हर्षे","3.3.69::समुदोरजः पशुषु","3.3.70::अक्षेषु ग्लहः","3.3.71::प्रजने सर्तेः","3.3.72::ह्वः सम्प्रसारणं च न्यभ्युपविषु","3.3.73::आङि युद्धे","3.3.74::निपानमाहावः","3.3.75::भावेऽनुपसर्गस्य","3.3.76::हनश्च वधः","3.3.77::मूर्तौ घनः","3.3.78::अन्तर्घनो देशे","3.3.79::अगारैकदेशे प्रघणः प्रघाणश्च","3.3.80::उद्घनोऽत्याधानम्","3.3.81::अपघनोऽङ्गम्","3.3.82::करणेऽयोविद्रुषु","3.3.83::स्तम्बे क च","3.3.84::परौ घः","3.3.85::उपघ्न आश्रये","3.3.86::संघोद्घौ गणप्रशंसयोः","3.3.87::निघो निमितम्","3.3.88::ड्वितः क्त्रिः","3.3.89::ट्वितोऽथुच्","3.3.90::यजयाचयतविच्छप्रच्छरक्षो नङ्","3.3.91::स्वपो नन्","3.3.92::उपसर्गे घोः किः","3.3.93::कर्मण्यधिकरणे च","3.3.94:अधिकारः:स्त्रियां क्तिन्","3.3.95::स्थागापापचां भावे","3.3.96::मन्त्रे वृषेषपचमनविदभूवीरा उदात्तः","3.3.97::ऊतियूतिजूतिसातिहेतिकीर्तयश्च","3.3.98::व्रजयजोर्भावे क्यप्‌","3.3.99::संज्ञायां समजनिषदनिपतमनविदषुञ्शीङ्भृञिणः","3.3.100::कृञः श च","3.3.101::इच्छा","3.3.102::अ प्रत्ययात्‌","3.3.103::गुरोश्च हलः","3.3.104::षिद्भिदादिभ्योऽङ्","3.3.105::चिन्तिपूजिकथिकुम्बिचर्चश्च","3.3.106::आतश्चोपसर्गे","3.3.107::ण्यासश्रन्थो युच्","3.3.108::रोगाख्यायां ण्वुल् बहुलम्","3.3.109::संज्ञायाम्","3.3.110::विभाषाऽऽख्यानपरिप्रश्नयोरिञ् च","3.3.111::पर्यायार्हर्णोत्पत्तिषु ण्वुच्","3.3.112::आक्रोशे नञ्यनिः","3.3.113::कृत्यल्युटो बहुलम्","3.3.114::नपुंसके भावे क्तः","3.3.115::ल्युट् च","3.3.116::कर्मणि च येन संस्पर्शात्‌ कर्तुः शरीरसुखम्","3.3.117:अधिकारः:करणाधिकरणयोश्च","3.3.118::पुंसि संज्ञायां घः प्रायेण","3.3.119::गोचरसंचरवहव्रजव्यजापणनिगमाश्च","3.3.120::अवे तॄस्त्रोर्घञ्","3.3.121::हलश्च","3.3.122::अध्यायन्यायोद्यावसंहाराधारावयाश्च","3.3.123::उदङ्कोऽनुदके","3.3.124::जालमानायः","3.3.125::खनो घ च","3.3.126::ईषद्दुःसुषु कृच्छ्राकृच्छ्रार्थेषु खल्","3.3.127::कर्तृकर्मणोश्च भूकृञोः","3.3.128::आतो युच्","3.3.129::छन्दसि गत्यर्थेभ्यः","3.3.130::अन्येभ्योऽपि दृश्यते","3.3.131:अतिदेशः:वर्तमानसामीप्ये वर्तमानवद्वा","3.3.132::आशंसायां भूतवच्च","3.3.133::क्षिप्रवचने लृट्","3.3.134::आशंसावचने लिङ्","3.3.135:अतिदेशः:नानद्यतनवत्‌ क्रियाप्रबन्धसामीप्ययोः","3.3.136::भविष्यति मर्यादावचनेऽवरस्मिन्","3.3.137::कालविभागे चानहोरात्राणाम्","3.3.138::परस्मिन् विभाषा","3.3.139::लिङ्‌निमित्ते लृङ् क्रियाऽतिपत्तौ","3.3.140::भूते च","3.3.141::वोताप्योः","3.3.142::गर्हायां लडपिजात्वोः","3.3.143::विभाषा कथमि लिङ् च","3.3.144::किंवृत्ते लिङ्लृटौ","3.3.145::अनवकॢप्त्यमर्षयोरकिंवृत्ते अपि","3.3.146::किंकिलास्त्यर्थेषु लृट्","3.3.147::जातुयदोर्लिङ्","3.3.148::यच्चयत्रयोः","3.3.149::गर्हायां च","3.3.150::चित्रीकरणे च","3.3.151::शेषे लृडयदौ","3.3.152::उताप्योः समर्थयोर्लिङ्","3.3.153::कामप्रवेदनेऽकच्चिति","3.3.154::सम्भवानेऽलमिति चेत्‌ सिद्धाप्रयोगे","3.3.155::विभाषा धातौ सम्भावनवचनेऽयदि","3.3.156::हेतुहेतुमतोर्लिङ्","3.3.157::इच्छार्थेषु लिङ्लोटौ","3.3.158::समानकर्तृकेषु तुमुन्","3.3.159::लिङ् च","3.3.160::इच्छार्थेभ्यो विभाषा वर्तमाने","3.3.161::विधिनिमन्‍त्रणामन्‍त्रणाधीष्‍टसंप्रश्‍नप्रार्थनेषु लिङ्","3.3.162::लोट् च","3.3.163::प्रैषातिसर्गप्राप्तकालेषु कृत्याश्च","3.3.164::लिङ् चोर्ध्वमौहूर्तिके","3.3.165::स्मे लोट्","3.3.166::अधीष्टे च","3.3.167::कालसमयवेलासु तुमुन्","3.3.168::लिङ् यदि","3.3.169::अर्हे कृत्यतृचश्च","3.3.170::आवश्यकाधमर्ण्ययोर्णिनिः","3.3.171::कृत्याश्च","3.3.172::शकि लिङ् च","3.3.173::आशिषि लिङ्लोटौ","3.3.174::क्तिच्क्तौ च संज्ञायाम्","3.3.175::माङि लुङ्","3.3.176::स्मोत्तरे लङ् च","3.4.1::धातुसम्बन्धे प्रत्ययाः","3.4.2::क्रियासमभिहारे लोट्; लोटो हिस्वौ; वा च तध्वमोः","3.4.3::समुच्चयेऽन्यतरस्याम्","3.4.4::यथाविध्यनुप्रयोगः पूर्वस्मिन्","3.4.5::समुच्चये सामान्यवचनस्य","3.4.6::छन्दसि लुङ्लङ्लिटः","3.4.7::लिङर्थे लेट्","3.4.8::उपसंवादाशङ्कयोश्च","3.4.9::तुमर्थे सेसेनसेअसेन्क्सेकसेनध्यैअध्यैन्कध्यैकध्यैन्शध्यैशध्यैन्तवैतवेङ्तवेनः","3.4.10::प्रयै रोहिष्यै अव्यथिष्यै","3.4.11::दृशे विख्ये च","3.4.12::शकि णमुल्कमुलौ","3.4.13::ईश्वरे तोसुन्कसुनौ","3.4.14::कृत्यार्थे तवैकेन्केन्यत्वनः","3.4.15::अवचक्षे च","3.4.16::भावलक्षणे स्थेण्कृञ्वदिचरिहुतमिजनिभ्यस्तोसुन्","3.4.17::सृपितृदोः कसुन्","3.4.18::अलङ्खल्वोः प्रतिषेधयोः प्राचां क्त्वा","3.4.19::उदीचां माङो व्यतीहारे","3.4.20::परावरयोगे च","3.4.21::समानकर्तृकयोः पूर्वकाले","3.4.22::आभीक्ष्ण्ये णमुल् च","3.4.23::न यद्यनाकाङ्क्षे","3.4.24::विभाषाऽग्रेप्रथमपूर्वेषु","3.4.25::कर्मण्याक्रोशे कृञः खमुञ्","3.4.26::स्वादुमि णमुल्","3.4.27::अन्यथैवंकथमित्थंसु सिद्धाप्रयोगश्चेत्‌","3.4.28::यथातथयोरसूयाप्रतिवचने","3.4.29::कर्मणि दृशिविदोः साकल्ये","3.4.30::यावति विन्दजीवोः","3.4.31::चर्मोदरयोः पूरेः","3.4.32::वर्षप्रमाण ऊलोपश्चास्यान्यतरस्याम्","3.4.33::चेले क्नोपेः","3.4.34::निमूलसमूलयोः कषः","3.4.35::शुष्कचूर्णरूक्षेषु पिषः","3.4.36::समूलाकृतजीवेषु हन्कृञ्ग्रहः","3.4.37::करणे हनः","3.4.38::स्नेहने पिषः","3.4.39::हस्ते वर्त्तिग्रहोः","3.4.40::स्वे पुषः","3.4.41::अधिकरणे बन्धः","3.4.42::संज्ञायाम्","3.4.43::कर्त्रोर्जीवपुरुषयोर्नशिवहोः","3.4.44::ऊर्ध्वे शुषिपूरोः","3.4.45::उपमाने कर्मणि च","3.4.46::कषादिषु यथाविध्यनुप्रयोगः","3.4.47::उपदंशस्तृतीयायाम्","3.4.48::हिंसार्थानां च समानकर्मकाणाम्","3.4.49::सप्तम्यां चोपपीडरुधकर्षः","3.4.50::समासत्तौ","3.4.51::प्रमाणे च","3.4.52::अपादाने परीप्सायाम्","3.4.53::द्वितीयायां च","3.4.54::स्वाङ्गेऽध्रुवे","3.4.55::परिक्लिश्यमाने च","3.4.56::विशिपतिपदिस्कन्दां व्याप्यमानासेव्यमानयोः","3.4.57::अस्यतितृषोः क्रियाऽन्तरे कालेषु","3.4.58::नाम्न्यादिशिग्रहोः","3.4.59::अव्ययेऽयथाभिप्रेताख्याने कृञः क्त्वाणमुलौ","3.4.60::तिर्यच्यपवर्गे","3.4.61::स्वाङ्गे तस्प्रत्यये कृभ्वोः","3.4.62::नाधाऽर्थप्रत्यये च्व्यर्थे","3.4.63::तूष्णीमि भुवः","3.4.64::अन्वच्यानुलोम्ये","3.4.65::'शकधृषज्ञाग्लाघटरभलभक्रमसहार्हास्त्यर्थेषु तुमुन्","3.4.66::पर्याप्तिवचनेष्वलमर्थेषु","3.4.67::कर्तरि कृत्‌","3.4.68::भव्यगेयप्रवचनीयोपस्थानीयजन्याप्लाव्यापात्या वा","3.4.69::लः कर्मणि च भावे चाकर्मकेभ्यः.","3.4.70::तयोरेव कृत्यक्तखलर्थाः","3.4.71::अदिकर्मणि क्तः कर्तरि च","3.4.72::गत्यर्थाकर्मकश्लिषशीङ्स्थाऽऽसवसजनरुहजीर्यतिभ्यश्च","3.4.73::दाशगोघ्नौ सम्प्रदाने","3.4.74::भीमादयोऽपादाने","3.4.75::ताभ्यामन्यत्रोणादयः","3.4.76::क्तोऽधिकरणे च ध्रौव्यगतिप्रत्यवसानार्थेभ्यः","3.4.77:अधिकारः:लस्य","3.4.78::तिप्तस्झिसिप्थस्थमिब्वस्मस् तातांझथासाथांध्वमिड्वहिमहिङ्","3.4.79::टित आत्मनेपदानां टेरे","3.4.80::थासस्से","3.4.81::लिटस्तझयोरेशिरेच्","3.4.82::परस्मैपदानां णलतुसुस्थलथुसणल्वमाः","3.4.83::विदो लटो वा","3.4.84::ब्रुवः पञ्चानामादित आहो ब्रुवः","3.4.85:अतिदेशः:लोटो लङ्वत्‌","3.4.86::एरुः","3.4.87:अतिदेशः:सेर्ह्यपिच्च","3.4.88::वा छन्दसि","3.4.89::मेर्निः","3.4.90::आमेतः","3.4.91::सवाभ्यां वामौ","3.4.92:अतिदेशः:आडुत्तमस्य पिच्च","3.4.93::एत ऐ","3.4.94::लेटोऽडाटौ","3.4.95::आत ऐ","3.4.96::वैतोऽन्यत्र","3.4.97::इतश्च लोपः परस्मैपदेषु","3.4.98::स उत्तमस्य","3.4.99::नित्यं ङितः","3.4.100::इतश्च","3.4.101::तस्थस्थमिपां तांतंतामः","3.4.102::लिङस्सीयुट्","3.4.103::यासुट् परस्मैपदेषूदात्तो ङिच्च","3.4.104::किदाशिषि","3.4.105::झस्य रन्","3.4.106::इटोऽत्‌","3.4.107::सुट् तिथोः","3.4.108::झेर्जुस्","3.4.109::सिजभ्यस्तविदिभ्यः च","3.4.110::आतः","3.4.111::लङः शाकटायनस्यैव","3.4.112::द्विषश्च","3.4.113:संज्ञा:तिङ्शित्सार्वधातुकम्","3.4.114:संज्ञा:आर्द्धधातुकं शेषः","3.4.115:संज्ञा:लिट् च","3.4.116:संज्ञा:लिङाशिषि","3.4.117:संज्ञा:छन्दस्युभयथा","4.1.1:अधिकारः:ङ्याप्प्रातिपदिकात्‌","4.1.2::स्वौजसमौट्छष्टाभ्याम्भिस्ङेभ्याम्भ्यस्ङसिभ्याम्भ्यस्ङसोसाम्ङ्योस्सुप्‌","4.1.3:अधिकारः:स्त्रियाम्","4.1.4::अजाद्यतष्टाप्‌","4.1.5::ऋन्नेभ्यो ङीप्‌","4.1.6::उगितश्च","4.1.7::वनो र च","4.1.8::पादोऽन्यतरस्याम्","4.1.9::टाबृचि","4.1.10::न षट्स्वस्रादिभ्यः","4.1.11::मनः","4.1.12::अनो बहुव्रीहेः","4.1.13::डाबुभाभ्यामन्यतरस्याम्‌","4.1.14:अधिकारः:अनुपसर्जनात्‌","4.1.15::टिड्ढाणञ्द्वयसज्दघ्नञ्मात्रच्तयप्ठक्ठञ्कञ्क्वरपः","4.1.16::यञश्च","4.1.17::प्राचां ष्फ तद्धितः","4.1.18::सर्वत्र लोहितादिकतान्तेभ्यः","4.1.19::कौरव्यमाण्डूकाभ्यां च","4.1.20::वयसि प्रथमे","4.1.21::द्विगोः","4.1.22::अपरिमाणबिस्ताचितकम्बल्येभ्यो न तद्धितलुकि","4.1.23::काण्डान्तात्‌ क्षेत्रे","4.1.24::पुरुषात्‌ प्रमाणेऽन्यतरस्याम्","4.1.25::बहुव्रीहेरूधसो ङीष्।","4.1.26::संख्याऽव्ययादेर्ङीप्‌","4.1.27::दामहायनान्ताच्च","4.1.28::अन उपधालोपिनोन्यतरस्याम्","4.1.29::नित्यं संज्ञाछन्दसोः","4.1.30::केवलमामकभागधेयपापापरसमानार्यकृत-सुमङ्गलभेषजाच्च","4.1.31::रात्रेश्चाजसौ","4.1.32::अन्तर्वत्पतिवतोर्नुक्","4.1.33::पत्युर्नो यज्ञसंयोगे","4.1.34::विभाषा सपूर्वस्य","4.1.35::नित्यं सपत्न्य्आदिषु","4.1.36::पूतक्रतोरै च","4.1.37::वृषाकप्यग्निकुसितकुसीदानामुदात्तः","4.1.38::मनोरौ वा","4.1.39::वर्णादनुदात्तात्तोपधात्तो नः","4.1.40::अन्यतो ङीष्।","4.1.41::षिद्गौरादिभ्यश्च","4.1.42::जानपदकुण्डगोणस्थलभाजनागकालनीलकुशकामुककबराद्वृत्त्यमत्रावपनाकृत्रिमाश्राणास्थौल्यवर्णानाच्छादनायोविकारमैथुनेच्छाकेशवेशेषु","4.1.43::शोणात्‌ प्राचाम्","4.1.44::वोतो गुणवचनात्‌","4.1.45::बह्वादिभ्यश्च","4.1.46::नित्यं छन्दसि","4.1.47::भुवश्च","4.1.48::पुंयोगादाख्यायाम्","4.1.49::इन्द्रवरुणभवशर्वरुद्रमृडहिमारण्ययवयवनमातुलाचार्याणामानुक्","4.1.50::क्रीतात्‌ करणपूर्वात्‌","4.1.51::क्तादल्पाख्यायाम्","4.1.52::बहुव्रीहेश्चान्तोदात्तात्‌","4.1.53::अस्वाङ्गपूर्वपदाद्वा","4.1.54::स्वाङ्गाच्चोपसर्जनादसंयोगोपधात्‌","4.1.55::नासिकोदरौष्ठजङ्घादन्तकर्णशृङ्गाच्च","4.1.56::न क्रोडादिबह्वचः","4.1.57::सहनञ्विद्यमानपूर्वाच्च","4.1.58::नखमुखात्‌ संज्ञायाम्","4.1.59::दीर्घजिह्वी च च्छन्दसि","4.1.60::दिक्पूर्वपदान्ङीप्‌","4.1.61::वाहः","4.1.62::सख्यशिश्वीति भाषायाम्","4.1.63::जातेरस्त्रीविषयादयोपधात्‌","4.1.64::पाककर्णपर्णपुष्पफलमूलबालोत्तरपदाच्च","4.1.65::इतो मनुष्यजातेः","4.1.66::ऊङुतः","4.1.67::बाह्वन्तात्‌ संज्ञायाम्","4.1.68::पङ्गोश्च","4.1.69::ऊरूत्तरपदादौपम्ये","4.1.70::संहितशफलक्षणवामादेश्च","4.1.71::कद्रुकमण्डल्वोश्छन्दसि","4.1.72::संज्ञायाम्","4.1.73::शार्ङ्गरवाद्यञो ङीन्","4.1.74::यङश्चाप्‌","4.1.75::आवट्याच्च","4.1.76:संज्ञा; अधिकारः:तद्धिताः","4.1.77::यूनस्तिः","4.1.78::अणिञोरनार्षयोर्गुरूपोत्तमयोः ष्यङ् गोत्रे","4.1.79::गोत्रावयवात्‌","4.1.80::क्रौड्यादिभ्यश्च","4.1.81::दैवयज्ञिशौचिवृक्षिसात्यमुग्रिकाण्ठेविद्धिभ्योऽन्यतरस्याम्","4.1.82:अधिकारः:समर्थानां प्रथमाद्वा","4.1.83:अधिकारः:प्राग्दीव्यतोऽण्","4.1.84::अश्वपत्यादिभ्यश्च","4.1.85::दित्यदित्यादित्यपत्युत्तरपदाण्ण्यः","4.1.86::उत्सादिभ्योऽञ्","4.1.87::स्त्रीपुंसाभ्यां नञ्स्नञौ भवनात्‌","4.1.88::द्विगोर्लुगनपत्ये","4.1.89::गोत्रेऽलुगचि","4.1.90::यूनि लुक्","4.1.91::फक्फिञोरन्यतरस्याम्","4.1.92:अधिकारः:तस्यापत्यम्","4.1.93::एको गोत्रे","4.1.94::गोत्राद्यून्यस्त्रियाम्","4.1.95::अत इञ्","4.1.96::बाह्वादिभ्यश्च","4.1.97::सुधातुरकङ् च","4.1.98::गोत्रे कुञ्जादिभ्यश्च्फञ्","4.1.99::नडादिभ्यः फक्","4.1.100::हरितादिभ्योऽञः","4.1.101::यञिञोश्च","4.1.102::शरद्वच्छुनकदर्भाद्भृगुवत्साग्रायणेषु","4.1.103::द्रोणपर्वतजीवन्तादन्यतरयाम्","4.1.104::अनृष्यानन्तर्ये बिदादिभ्योऽञ्","4.1.105::गर्गादिभ्यो यञ्","4.1.106::मधुबभ्र्वोर्ब्राह्मणकौशिकयोः","4.1.107::कपिबोधादाङ्गिरसे","4.1.108::वतण्डाच्च","4.1.109::लुक् स्त्रियाम्","4.1.110::अश्वादिभ्यः फञ्","4.1.111::भर्गात्‌ त्रैगर्ते","4.1.112::शिवादिभ्योऽण्","4.1.113::अवृद्धाभ्यो नदीमानुषीभ्यस्तन्नामिकाभ्यः","4.1.114::ऋष्यन्धकवृष्णिकुरुभ्यश्च","4.1.115::मातुरुत्‌ संख्यासम्भद्रपूर्वायाः","4.1.116::कन्यायाः कनीन च","4.1.117::विकर्णशुङ्गच्छगलाद्वत्सभरद्वाजात्रिषु","4.1.118::पीलाया वा","4.1.119::ढक् च मण्डूकात्‌","4.1.120::स्त्रीभ्यो ढक्","4.1.121::द्व्यचः","4.1.122::इतश्चानिञः","4.1.123::शुभ्रादिभ्यश्च","4.1.124::विकर्णकुषीतकात्‌ काश्यपे","4.1.125::भ्रुवो वुक् च","4.1.126::कल्याण्यादीनामिनङ्","4.1.127::कुलटाया वा","4.1.128::चटकाया ऐरक्","4.1.129::गोधाया ढ्रक्","4.1.130::आरगुदीचाम्","4.1.131::क्षुद्राभ्यो वा","4.1.132::पितृष्वसुश्छण्","4.1.133::ढकि लोपः","4.1.134::मातृष्वसुश्च","4.1.135::चतुष्पाद्भ्यो ढञ्","4.1.136::गृष्ट्यादिभ्यश्च","4.1.137::राजश्वशुराद्यत्‌","4.1.138::क्षत्राद्घः","4.1.139::कुलात्‌ खः","4.1.140::अपूर्वपदादन्यतरस्यां यड्ढकञौ","4.1.141::महाकुलादञ्खञौ","4.1.142::दुष्कुलाड्ढक्","4.1.143::स्वसुश्छः","4.1.144::भ्रातुर्व्यच्च","4.1.145::व्यन् सपत्ने","4.1.146::रेवत्यादिभ्यष्ठक्","4.1.147::गोत्रस्त्रियाः कुत्सने ण च","4.1.148::वृद्धाट्ठक् सौवीरेषु बहुलम्","4.1.149::फेश्छ च","4.1.150::फाण्टाहृतिमिमताभ्यां णफिञौ","4.1.151::कुर्वादिभ्यो ण्यः","4.1.152::सेनान्तलक्षणकारिभ्यश्च","4.1.153::उदीचामिञ्","4.1.154::तिकादिभ्यः फिञ्","4.1.155::कौसल्यकार्मार्याभ्यां च","4.1.156::अणो द्व्यचः","4.1.157::उदीचां वृद्धादगोत्रात्‌","4.1.158::वाकिनादीनां कुक् च","4.1.159::पुत्रान्तादन्यतरस्याम्","4.1.160::प्राचामवृद्धात्‌ फिन् बहुलम्‌","4.1.161::मनोर्जातावञ्यतौ षुक् च","4.1.162:संज्ञा:अपत्यं पौत्रप्रभृति गोत्रम्‌","4.1.163:संज्ञा:जीवति तु वंश्ये युवा","4.1.164:संज्ञा:भ्रातरि च ज्यायसि","4.1.165:संज्ञा:वाऽन्यस्मिन् सपिण्डे स्थविरतरे जीवति","4.1.166::वृद्धस्य च पूजायाम्","4.1.167::यूनश्च कुत्सायाम्","4.1.168::जनपदशब्दात्‌ क्षत्रियादञ्","4.1.169::साल्वेयगान्धारिभ्यां च","4.1.170::द्व्यञ्मगधकलिङ्गसूरमसादण्","4.1.171::वृद्धेत्कोसलाजादाञ्ञ्यङ्","4.1.172::कुरुणादिभ्यो ण्यः","4.1.173::साल्वावयवप्रत्यग्रथकलकूटाश्मकादिञ्","4.1.174:संज्ञा:ते तद्राजाः","4.1.175::कम्बोजाल्लुक्","4.1.176::स्त्रियामवन्तिकुन्तिकुरुभ्यश्च","4.1.177::अतश्च","4.1.178::न प्राच्यभर्गादियौधेयादिभ्यः","4.2.1::तेन रक्तं रागात्‌","4.2.2::लाक्षारोचना{शकलकर्दमा}ट्ठक्","4.2.3::नक्षत्रेण युक्तः कालः","4.2.4::लुबविशेषे","4.2.5::संज्ञायां श्रवणाश्वत्थाभ्याम्‌","4.2.6::द्वंद्वाच्छः","4.2.7::दृष्ट्अं साम","4.2.8::कलेर्ढक्","4.2.9::वामदेवाड्ड्यड्ड्यौ","4.2.10::परिवृतो रथः","4.2.11::पाण्डुकम्बलादिनिः","4.2.12::द्वैपवैयाघ्रादञ्","4.2.13::कौमारापूर्ववचने","4.2.14::तत्रोद्धृतममत्रेभ्यः","4.2.15::स्थण्डिलाच्छयितरि व्रते","4.2.16::संस्कृतं भक्षाः","4.2.17::शूलोखाद्यत्‌","4.2.18::दध्नष्ठक्","4.2.19::उदश्वितोऽन्यतरस्याम्","4.2.20::क्षीराड्ढञ्","4.2.21::साऽस्मिन् पौर्णमासीति {संज्ञायाम्}","4.2.22::आग्रहायण्यश्वत्थाट्ठक्","4.2.23::विभाषा फाल्गुनीश्रवणाकार्त्तिकीचैत्रीभ्यः","4.2.24::साऽस्य देवता","4.2.25::कस्येत्‌","4.2.26::शुक्राद्घन्","4.2.27::अपोनप्त्रपान्नप्तृभ्यां घः","4.2.28::छ च","4.2.29::महेन्द्राद्घाणौ च","4.2.30::सोमाट्ट्यण्","4.2.31::वाय्वृतुपित्रुषसो यत्‌","4.2.32::द्यावापृथिवीशुनासीरमरुत्वदग्नीषोमवास्तोष्पतिगृहमेधाच्छ च","4.2.33::अग्नेर्ढक्","4.2.34:अतिदेशः:कालेभ्यो भववत्‌","4.2.35::महाराजप्रोष्ठपदाट्ठञ्","4.2.36::पितृव्यमातुलमातामहपितामहाः","4.2.37::तस्य समूहः","4.2.38::भिक्षाऽऽदिभ्योऽण्","4.2.39::गोत्रोक्षोष्ट्रोरभ्रराजराजन्यराजपुत्रवत्समनुष्याजाद्वुञ्","4.2.40::केदाराद्यञ् च","4.2.41::ठञ् कवचिनश्च","4.2.42::ब्राह्मणमाणववाडवाद्यन्","4.2.43::ग्रामजनबन्धुसहायेभ्यः तल्","4.2.44::अनुदात्तादेरञ्","4.2.45::खण्डिकादिभ्यश्च","4.2.46:अतिदेशः:चरणेभ्यो धर्मवत्‌","4.2.47::अचित्तहस्तिधेनोष्ठक्","4.2.48::केशाश्वाभ्यां यञ्छावन्यतरस्याम्","4.2.49::पाशादिभ्यो यः","4.2.50::खलगोरथात्‌","4.2.51::इनित्रकट्यचश्च","4.2.52::विषयो देशे","4.2.53::राजन्यादिभ्यो वुञ्","4.2.54::भौरिक्याद्यैषुकार्यादिभ्यो विधल्भक्तलौ","4.2.55::सोऽस्यादिरिति च्छन्दसः प्रगाथेषु","4.2.56::संग्रामे प्रयोजनयोद्धृभ्यः","4.2.57::तदस्यां प्रहरणमिति क्रीडायाम् णः","4.2.58::घञः साऽस्यां क्रियेति ञः","4.2.59::तदधीते तद्वेद","4.2.60::क्रतूक्थादिसूत्रान्ताट्ठक्","4.2.61::क्रमादिभ्यो वुन्","4.2.62::अनुब्राह्मणादिनिः","4.2.63::वसन्तादिभ्यष्ठक्","4.2.64::प्रोक्ताल्लुक्","4.2.65::सूत्राच्च कोपधात्‌","4.2.66::छन्दोब्राह्मणानि च तद्विषयाणि","4.2.67::तदस्मिन्नस्तीति देशे तन्नाम्नि","4.2.68::तेन निर्वृत्तम्","4.2.69::तस्य निवासः","4.2.70::अदूरभवश्च","4.2.71::ओरञ्","4.2.72::मतोश्च बह्वजङ्गात्‌","4.2.73::बह्वचः कूपेषु","4.2.74::उदक् च विपाशः","4.2.75::संकलादिभ्यश्च","4.2.76::स्त्रीषु सौवीरसाल्वप्राक्षु","4.2.77::सुवास्त्वादिभ्योऽण्","4.2.78::रोणी","4.2.79::कोपधाच्च","4.2.80::वुञ्छण्कठजिलशेनिरढञ्ण्ययफक्फिञिञ्ञ्यकक्ठकोऽरीहणकृशाश्वर्श्यकुमुदकाशतृणप्रेक्षाऽश्मसखिसंकाशबलपक्षकर्णसुतंगमप्रगदिन्वराहकुमुदादिभ्यः","4.2.81::जनपदे लुप्‌","4.2.82::वरणादिभ्यश्च","4.2.83::शर्कराया वा","4.2.84::ठक्छौ च","4.2.85::नद्यां मतुप्‌","4.2.86::मध्वादिभ्यश्च","4.2.87::कुमुदनडवेतसेभ्यो ड्मतुप्‌","4.2.88::नडशादाड्ड्वलच्","4.2.89::शिखाया वलच्","4.2.90::उत्करादिभ्यश्छः","4.2.91::नडादीनां कुक् च","4.2.92::शेषे","4.2.93::राष्ट्रावारपाराद्घखौ","4.2.94::ग्रामाद्यखञौ","4.2.95::कत्त्र्यादिभ्यो ढकञ्","4.2.96::कुलकुक्षिग्रीवाभ्यः श्वास्यलंकारेषु","4.2.97::नद्यादिभ्यो ढक्","4.2.98::दक्षिणापश्चात्पुरसस्त्यक्","4.2.99::कापिश्याः ष्फक्","4.2.100::रंकोरमनुष्येऽण् च","4.2.101::द्युप्रागपागुदक्प्रतीचो यत्‌","4.2.102::कन्थायाष्ठक्","4.2.103::वर्णौ वुक्","4.2.104::अव्ययात्त्यप्‌","4.2.105::ऐषमोह्यःश्वसोऽन्यतरस्याम्","4.2.106::तीररूप्योत्तरपदादञ्ञौ","4.2.107::दिक्पूर्वपदादसंज्ञायां ञः","4.2.108::मद्रेभ्योऽञ्","4.2.109::उदीच्यग्रामाच्च बह्वचोऽन्तोदात्तात्‌","4.2.110::प्रस्थोत्तरपदपलद्यादिकोपधादण्","4.2.111::कण्वादिभ्यो गोत्रे","4.2.112::इञश्च","4.2.113::न द्व्यचः प्राच्यभरतेषु","4.2.114::वृद्धाच्छः","4.2.115::भवतष्ठक्छसौ","4.2.116::काश्यादिभ्यष्ठञ्ञिठौ","4.2.117::वाहीकग्रामेभ्यश्च","4.2.118::विभाषोशीनरेषु","4.2.119::ओर्देशे ठञ्","4.2.120::वृद्धात्‌ प्राचाम्","4.2.121::धन्वयोपधाद्वुञ्","4.2.122::प्रस्थपुरवहान्ताच्च","4.2.123::रोपधेतोः प्राचाम्","4.2.124::जनपदतदवध्योश्च","4.2.125::अवृद्धादपि बहुवचनविषयात्‌","4.2.126::क्अच्छाग्निवक्त्रगर्त्तोत्तरपदात्‌","4.2.127::धूमादिभ्यश्च","4.2.128::नगरात्‌ कुत्सनप्रावीण्ययोः","4.2.129::अरण्यान्मनुष्ये","4.2.130::विभाषा कुरुयुगन्धराभ्याम्","4.2.131::मद्रवृज्योः कन्","4.2.132::कोपधादण्","4.2.133::कच्छादिभ्यश्च","4.2.134::मनुष्यतत्स्थयोर्वुञ्","4.2.135::अपदातौ साल्वात्‌","4.2.136::गोयवाग्वोश्च","4.2.137::गर्तोत्तरपदाच्छः","4.2.138::गहादिभ्यश्च","4.2.139::प्राचां कटादेः","4.2.140::राज्ञः क च","4.2.141::वृद्धादकेकान्तखोपधात्‌","4.2.142::कन्थापलदनगरग्रामह्रदोत्तरपदात्‌","4.2.143::पर्वताच्च","4.2.144::विभाषाऽमनुष्ये","4.2.145::कृकणपर्णाद्भारद्वाजे","4.3.1::युष्मदस्मदोरन्यतरस्यां खञ् च","4.3.2::तस्मिन् नणि च युष्माकास्माकौ","4.3.3::तवकममकावेकवचने","4.3.4::अर्धाद्यत्‌","4.3.5::परावराधमोत्तमपूर्वाच्च","4.3.6::दिक्पूर्वपदाट्ठञ् च","4.3.7::ग्रामजनपदैकदेशादञ्ठञौ","4.3.8::मध्यान्मः","4.3.9::अ साम्प्रतिके","4.3.10::द्वीपादनुसमुद्रं यञ्","4.3.11::कालाट्ठञ्","4.3.12::श्राद्धे शरदः","4.3.13::विभाषा रोगातपयोः","4.3.14::निशाप्रदोषाभ्यां च","4.3.15::श्वसस्तुट् च","4.3.16::संधिवेलाऽऽद्यृतुनक्षत्रेभ्योऽण्","4.3.17::प्रावृष एण्यः","4.3.18::वर्षाभ्यष्ठक्","4.3.19::छन्दसि ठञ्","4.3.20::वसन्ताच्च","4.3.21::हेमन्ताच्च","4.3.22::सर्वत्राण् च तलोपश्च","4.3.23::सायंचिरम्प्राह्णेप्रगेऽव्ययेभ्यष्ट्युट्युलौ तुट् च","4.3.24::विभाषा पूर्वाह्णापराह्णाभ्याम्","4.3.25::तत्र जातः","4.3.26::प्रावृषष्ठप्‌","4.3.27::संज्ञायां शरदो वुञ्","4.3.28::पूर्वाह्णापराह्णार्द्रामूलप्रदोषावस्कराद्वुन्","4.3.29::पथः पन्थ च","4.3.30::अमावास्याया वा","4.3.31::अ च","4.3.32::सिन्ध्वपकराभ्यां कन्","4.3.33::अणञौ च","4.3.34::श्रविष्ठाफल्गुन्यनुराधास्वातितिष्यपुनर्वसुहस्तविशाखाऽषाढाबहुलाल्लुक्","4.3.35::स्थानान्तगोशालखरशालाच्च","4.3.36::वत्सशालाऽभिजिदश्वयुक्छतभिषजो वा","4.3.37::नक्षत्रेभ्यो बहुलम्","4.3.38::कृतलब्धक्रीतकुशलाः","4.3.39::प्रायभवः","4.3.40::उपजानूपकर्णोपनीवेष्ठक्","4.3.41::संभूते","4.3.42::कोशाड्ढञ्","4.3.43::कालात्‌ साधुपुष्प्यत्पच्यमानेषु","4.3.44::उप्ते च","4.3.45::आश्वयुज्या वुञ्","4.3.46::ग्रीष्मवसन्तादन्यतरस्याम्","4.3.47::देयमृणे","4.3.48::कलाप्यश्वत्थयवबुसाद्वुन्","4.3.49::ग्रीष्मावरसमाद्वुञ्","4.3.50::संवत्सराग्रहायणीभ्यां ठञ् च","4.3.51::व्याहरति मृगः","4.3.52::तदस्य सोढम्","4.3.53::तत्र भवः","4.3.54::दिगादिभ्यो यत्‌","4.3.55::शरीरावयवाच्च","4.3.56::दृतिकुक्षिकलशिवस्त्यस्त्यहेर्ढञ्","4.3.57::ग्रीवाभ्योऽण् च","4.3.58::गम्भीराञ्ञ्यः","4.3.59::अव्ययीभावाच्च","4.3.60::अन्तःपूर्वपदाट्ठञ्","4.3.61::ग्रामात्‌ पर्यनुपूर्वात्‌","4.3.62::जिह्वामूलाङ्गुलेश्छः","4.3.63::वर्गान्ताच्च","4.3.64::अशब्दे यत्खावन्यतरस्याम्","4.3.65::कर्णललाटात्‌ कनलंकारे","4.3.66::तस्य व्याख्यान इति च व्याख्यातव्यनाम्नः","4.3.67::बह्वचोऽन्तोदात्ताट्ठञ्","4.3.68::क्रतुयज्ञेभ्यश्च","4.3.69::अध्यायेष्वेवर्षेः","4.3.70::पौरोडाशपुरोडाशात् ष्ठन्","4.3.71::छन्दसो यदणौ","4.3.72::द्व्यजृद्ब्राह्मणर्क्प्रथमाध्वरपुरश्चरणनामाख्याताट्ठक्","4.3.73::अणृगयनादिभ्यः","4.3.74::तत आगतः","4.3.75::ठगायस्थानेभ्यः","4.3.76::शुण्डिकादिभ्योऽण्","4.3.77::विद्यायोनिसंबन्धेभ्यो वुञ्","4.3.78::ऋतष्ठञ्","4.3.79::पितुर्यच्च","4.3.80::गोत्रादङ्कवत्‌","4.3.81::हेतुमनुष्येभ्योऽन्यतरस्यां रूप्यः","4.3.82::मयट् च","4.3.83::प्रभवति","4.3.84::विदूराञ्ञ्यः","4.3.85::तद्गच्छति पथिदूतयोः","4.3.86::अभिनिष्क्रामति द्वारम्","4.3.87::अधिकृत्य कृते ग्रन्थे","4.3.88::शिशुक्रन्दयमसभद्वंद्वेन्द्रजननादिभ्यश्छः","4.3.89::सोऽस्य निवासः","4.3.90::अभिजनश्च","4.3.91::आयुधजीविभ्यश्छः पर्वते","4.3.92::शण्डिकादिभ्यो ञ्यः","4.3.93::सिन्धुतक्षशिलाऽऽदिभ्योऽणञौ","4.3.94::तूदीशलातुरवर्मतीकूचवाराड्ढक्छण्ढञ्यकः","4.3.95::भक्तिः","4.3.96::अचित्ताददेशकालाट्ठक्","4.3.97::महाराजाट्ठञ्","4.3.98::वासुदेवार्जुनाभ्यां वुन्","4.3.99::गोत्रक्षत्रियाख्येभ्यो बहुलं वुञ्","4.3.100::जनपदिनां जनपदवत्‌ सर्वं जनपदेन समानशब्दानां बहुवचने","4.3.101::तेन प्रोक्तम्","4.3.102::तित्तिरिवरतन्तुखण्डिकोखाच्छण्","4.3.103::काश्यपकौशिकाभ्यामृषिभ्यां णिनिः","4.3.104::कलापिवैशम्पायनान्तेवासिभ्यश्च","4.3.105::पुराणप्रोक्तेषु ब्राह्मणकल्पेषु","4.3.106::शौनकादिभ्यश्छन्दसि","4.3.107::कठचरकाल्लुक्","4.3.108::कलापिनोऽण्","4.3.109::छगलिनो ढिनुक्","4.3.110::पाराशर्यशिलालिभ्यां भिक्षुनटसूत्रयोः","4.3.111::कर्मन्दकृशाश्वादिनिः","4.3.112::तेनैकदिक्","4.3.113::तसिश्च","4.3.114::उरसो यच्च","4.3.115::उपज्ञाते","4.3.116::कृते ग्रन्थे","4.3.117::संज्ञायाम्","4.3.118::कुलालादिभ्यो वुञ्","4.3.119::क्षुद्राभ्रमरवटरपादपादञ्","4.3.120::तस्येदम्","4.3.121::रथाद्यत्‌","4.3.122::पत्त्रपूर्वादञ्","4.3.123::पत्त्राध्वर्युपरिषदश्च","4.3.124::हलसीराट्ठक्","4.3.125::द्वंद्वाद्वुन् वैरमैथुनिकयोः","4.3.126::गोत्रचरणाद्वुञ्","4.3.127::संघाङ्कलक्षणेष्वञ्यञिञामण्","4.3.128::शाकलाद्वा","4.3.129::छन्दोगौक्थिकयाज्ञिकबह्वृचनटाञ्ञ्यः","4.3.130::न दण्डमाणवान्तेवासिषु","4.3.131::रैवतिकादिभ्यश्छः","4.3.132::कौपिञ्जलहास्तिपदादण्","4.3.133::आथर्वणिकस्येकलोपश्च","4.3.134::तस्य विकारः","4.3.135::अवयवे च प्राण्योषधिवृक्षेभ्यः","4.3.136::बिल्वादिभ्योऽण्","4.3.137::कोपधाच्च","4.3.138::त्रपुजतुनोः षुक्","4.3.139::ओरञ्","4.3.140::अनुदात्तादेश्च","4.3.141::पलाशादिभ्यो वा","4.3.142::शम्याष्ट्लञ्","4.3.143::मयड्वैतयोर्भाषायामभक्ष्याच्छादनयोः","4.3.144::नित्यं वृद्धशरादिभ्यः","4.3.145::गोश्च पुरीषे","4.3.146::पिष्टाच्च","4.3.147::संज्ञायां कन्","4.3.148::व्रीहेः पुरोडाशे","4.3.149::असंज्ञायां तिलयवाभ्याम्‌","4.3.150::द्व्यचश्छन्दसि","4.3.151::नोत्वद्वर्ध्रबिल्वात्‌","4.3.152::तालादिभ्योऽण्","4.3.153::जातरूपेभ्यः परिमाणे","4.3.154::प्राणिरजतादिभ्योऽञ्","4.3.155::ञितश्च तत्प्रत्ययात्‌","4.3.156::क्रीतवत्‌ परिमाणात्‌","4.3.157::उष्ट्राद्वुञ्","4.3.158::उमोर्णयोर्वा","4.3.159::एण्या ढञ्","4.3.160::गोपयसोर्यत्‌","4.3.161::द्रोश्च","4.3.162::माने वयः","4.3.163::फले लुक्","4.3.164::प्लक्षादिभ्योऽण्","4.3.165::जम्ब्वा वा","4.3.166::लुप् च","4.3.167::हरीतक्यादिभ्यश्च","4.3.168::कंसीयपरशव्ययोर्यञञौ लुक् च","4.4.1:अधिकारः:प्राग्वहतेष्ठक्","4.4.2::तेन दीव्यति खनति जयति जितम्","4.4.3::संस्कृतम्","4.4.4::कुलत्थकोपधादण्","4.4.5::तरति","4.4.6::गोपुच्छाट्ठञ्","4.4.7::नौद्व्यचष्ठन्","4.4.8::चरति","4.4.9::आकर्षात् ष्ठल्","4.4.10::पर्पादिभ्यः ष्ठन्","4.4.11::श्वगणाट्ठञ्च","4.4.12::वेतनादिभ्यो जीवति","4.4.13::वस्नक्रयविक्रयाट्ठन्","4.4.14::आयुधाच्छ च","4.4.15::हरत्युत्सङ्गादिभ्यः","4.4.16::भस्त्राऽऽदिभ्यः ष्ठन्","4.4.17::विभाषा विवधवीवधात्‌","4.4.18::अण् कुटिलिकायाः","4.4.19::निर्वृत्तेऽक्षद्यूतादिभ्यः","4.4.20::क्त्रेर्मम् नित्यं","4.4.21::अपमित्ययाचिताभ्यां कक्कनौ","4.4.22::संसृष्टे","4.4.23::चूर्णादिनिः","4.4.24::लवणाल्लुक्","4.4.25::मुद्गादण्","4.4.26::व्यञ्जनैरुपसिक्ते","4.4.27::ओजस्सहोऽम्भसा वर्तते","4.4.28::तत् प्रत्यनुपूर्वमीपलोमकूलम्","4.4.29::परिमुखं च","4.4.30::प्रयच्छति गर्ह्यम्","4.4.31::कुसीददशैकादशात्‌ ष्ठन्ष्ठचौ","4.4.32::उञ्छति","4.4.33::रक्षति","4.4.34::शब्ददर्दुरं करोति","4.4.35::पक्षिमत्स्यमृगान् हन्ति","4.4.36::परिपन्थं च तिष्ठति","4.4.37::माथोत्तरपदपदव्यनुपदं धावति","4.4.38::आक्रन्दाट्ठञ्च","4.4.39::पदोत्तरपदं गृह्णाति","4.4.40::प्रतिकण्ठार्थललामं च","4.4.41::धर्मं चरति","4.4.42::प्रतिपथमेति ठंश्च","4.4.43::समवायान् समवैति","4.4.44::परिषदो ण्यः","4.4.45::सेनाया वा","4.4.46::संज्ञायां ललाटकुक्कुट्यौ पश्यति","4.4.47::तस्य धर्म्यम्","4.4.48::अण् महिष्यादिभ्यः","4.4.49::ऋतोऽञ्","4.4.50::अवक्रयः","4.4.51::तदस्य पण्यम्","4.4.52::लवणाट्ठञ्","4.4.53::किशरादिभ्यः ष्ठन्","4.4.54::शलालुनोऽन्यतरस्याम्","4.4.55::शिल्पम्‌","4.4.56::मड्डुकझर्झरादणन्यतरस्याम्","4.4.57::प्रहरणम्","4.4.58::परश्वधाट्ठञ्च","4.4.59::शक्तियष्ट्योरीकक्","4.4.60::अस्तिनास्तिदिष्टं मतिः","4.4.61::शीलम्","4.4.62::छत्रादिभ्यो णः","4.4.63::कर्माध्ययने वृत्तम्","4.4.64::बह्वच्पूर्वपदाट्ठच्","4.4.65::हितं भक्षाः","4.4.66::तदस्मै दीयते नियुक्तम्","4.4.67::श्राणामांसौदनाट्टिठन्","4.4.68::भक्तादणन्यतरस्याम्","4.4.69::तत्र नियुक्तः","4.4.70::अगारान्ताट्ठन्","4.4.71::अध्यायिन्यदेशकालात्‌","4.4.72::कठिनान्तप्रस्तारसंस्थानेषु व्यवहरति","4.4.73::निकटे वसति","4.4.74::आवसथात् ष्ठल्","4.4.75:अधिकारः:प्राग्घिताद्यत्‌","4.4.76::तद्वहति रथयुगप्रासङ्गम्","4.4.77::धुरो यड्ढकौ","4.4.78::खः सर्वधुरात्‌","4.4.79::एकधुराल्लुक् च","4.4.80::शकटादण्","4.4.81::हलसीराट्ठक्","4.4.82::संज्ञायां जन्याः","4.4.83::विध्यत्यधनुषा","4.4.84::धनगणं लब्धा","4.4.85::अन्नाण्णः","4.4.86::वशं गतः","4.4.87::पदमस्मिन् दृश्यम्‌","4.4.88::मूलमस्याबर्हि","4.4.89::संज्ञायां धेनुष्या","4.4.90::गृहपतिना संयुक्ते ञ्यः","4.4.91::नौवयोधर्मविषमूलमूलसीतातुलाभ्यस्तार्यतुल्यप्राप्यवध्यानाम्यसमसमितसम्मितेषु","4.4.92::धर्मपथ्यर्थन्यायादनपेते","4.4.93::छन्दसो निर्मिते","4.4.94::उरसोऽण् च","4.4.95::हृदयस्य प्रियः","4.4.96::बन्धने चर्षौ","4.4.97::मतजनहलात्‌ करणजल्पकर्षेषु","4.4.98::तत्र साधुः","4.4.99::प्रतिजनादिभ्यः खञ्","4.4.100::भक्ताण्णः","4.4.101::परिषदो ण्यः","4.4.102::कथाऽऽदिभ्यष्ठक्","4.4.103::गुडादिभ्यष्ठञ्","4.4.104::पथ्यतिथिवसतिस्वपतेर्ढञ्","4.4.105::सभाया यः","4.4.106::ढश्छन्दसि","4.4.107::समानतीर्थे वासी","4.4.108::समानोदरे शयित ओ चोदात्तः","4.4.109::सोदराद्यः","4.4.110::भवे छन्दसि","4.4.111::पाथोनदीभ्यां ड्यण्","4.4.112::वेशन्तहिमवद्भ्यामण्","4.4.113::स्रोतसो विभाषा ड्यड्ड्यौ","4.4.114::सगर्भसयूथसनुताद्यन्","4.4.115::तुग्राद्घन्","4.4.116::अग्राद्यत्‌","4.4.117::घच्छौ च","4.4.118::समुद्राभ्राद्घः","4.4.119::बर्हिषि दत्तम्","4.4.120::दूतस्य भागकर्मणी","4.4.121::रक्षोयातूनां हननी","4.4.122::रेवतीजगतीहविष्याभ्यः प्रशस्ये","4.4.123::असुरस्य स्वम्","4.4.124::मायायामण्","4.4.125::तद्वानासामुपधानो मन्त्र इतीष्टकासु लुक् च मतोः","4.4.126::अश्विमानण्","4.4.127::वयस्यासु मूर्ध्नो मतुप्‌","4.4.128::मत्वर्थे मासतन्वोः","4.4.129::मधोर्ञ च","4.4.130::ओजसोऽहनि यत्खौ","4.4.131::वेशोयशआदेर्भगाद्यल्","4.4.132::ख च","4.4.133::पूर्वैः कृतमिनियौ च","4.4.134::अद्भिः संस्कृतम्","4.4.135::सहस्रेण संमितौ घः","4.4.136::मतौ च","4.4.137::सोममर्हति यः","4.4.138::मये च","4.4.139::मधोः","4.4.140::वसोः समूहे च","4.4.141::नक्षत्राद्घः","4.4.142::सर्वदेवात्‌ तातिल्","4.4.143::शिवशमरिष्टस्य करे","4.4.144::भावे च","5.1.1:अधिकारः:प्राक् क्रीताच्छः","5.1.2::उगवादिभ्योऽत्‌","5.1.3::कम्बलाच्च संज्ञायाम्","5.1.4::विभाषा हविरपूपादिभ्यः","5.1.5::तस्मै हितम्","5.1.6::शरीरावयवाद्यत्‌","5.1.7::खलयवमाषतिलवृषब्रह्मणश्च","5.1.8::अजाविभ्यां थ्यन्","5.1.9::आत्मन्विश्वजनभोगोत्तरपदात्‌ खः","5.1.10::सर्वपुरुषाभ्यां णढञौ","5.1.11::माणवचरकाभ्यां खञ्","5.1.12::तदर्थं विकृतेः प्रकृतौ","5.1.13::छदिरुपधिबलेः ढञ्","5.1.14::ऋषभोपानहोर्ञ्यः","5.1.15::चर्म्मणोऽञ्","5.1.16::तदस्य तदस्मिन् स्यादिति","5.1.17::परिखाया ढञ्","5.1.18:अधिकारः:प्राग्वतेष्ठञ्","5.1.19:अधिकारः:आर्हादगोपुच्छसंख्यापरिमाणाट्ठक्","5.1.20::असमासे निष्कादिभ्यः","5.1.21::शताच्च ठन्यतावशते","5.1.22::संख्याया अतिशदन्तायाः कन्","5.1.23::वतोरिड्वा","5.1.24::विंशतित्रिंशद्भ्यां ड्वुन्नसंज्ञायाम्‌","5.1.25::कंसाट्टिठन्","5.1.26::शूर्पादञन्यतरस्याम्","5.1.27::शतमानविंशतिकसहस्रवसनादण्","5.1.28::अध्यर्धपूर्वद्विगोर्लुगसंज्ञायाम्","5.1.29::विभाषा कार्षापणसहस्राभ्याम्","5.1.30::द्वित्रिपूर्वान्निष्कात्‌","5.1.31::बिस्ताच्च","5.1.32::विंशतिकात्‌ खः","5.1.33::खार्या ईकन्","5.1.34::पणपादमाषशतादत्‌","5.1.35::शाणाद्वा","5.1.36::द्वित्रिपूर्वादण् च","5.1.37::तेन क्रीतम्","5.1.38::तस्य निमित्तं संयोगोत्पातौ","5.1.39::गोद्व्यचोरसंख्यापरिमाणाश्वादेर्यत्‌","5.1.40::पुत्राच्छ च","5.1.41::सर्वभूमिपृथिवीभ्यामणञौ","5.1.42::तस्येश्वरः","5.1.43::तत्र विदित इति च","5.1.44::लोकसर्वलोकाट्ठञ्","5.1.45::तस्य वापः","5.1.46::पात्रात् ष्ठन्","5.1.47::तदस्मिन् वृद्ध्यायलाभशुल्कोपदा दीयते","5.1.48::पूरणार्धाट्ठन्","5.1.49::भागाद्यच्च","5.1.50::तद्धरति वहत्यावहति भाराद्वंशादिभ्यः","5.1.51::वस्नद्रव्याभ्यां ठन्कनौ","5.1.52::सम्भवत्यवहरति पचति","5.1.53::आढकाचितपात्रात्‌ खोऽन्यतरयाम्","5.1.54::द्विगोष्ठंश्च","5.1.55::कुलिजाल्लुक्खौ च","5.1.56::सोऽस्यांशवस्नभृतयः","5.1.57::तदस्य परिमाणम्","5.1.58::संख्यायाः संज्ञासंघसूत्राध्ययनेषु","5.1.59::पङ्क्तिविंशतित्रिंशत्चत्वारिंशत्पञ्चाशत्षष्टिसप्तत्यशीतिनवतिशतम्","5.1.60::पञ्चद्दशतौ वर्गे वा","5.1.61::सप्तनोऽञ् छन्दसि","5.1.62::त्रिंशच्चत्वारिंशतोर्ब्राह्मणे संज्ञायां डण्","5.1.63::तद् अर्हति","5.1.64::छेदादिभ्यो नित्यम्","5.1.65::शीर्षच्छेदाद्यच्च","5.1.66::दण्डादिभ्यः","5.1.67::छन्दसि च","5.1.68::पात्राद्घंश्च","5.1.69::कडङ्गरदक्षिणाच्छ च","5.1.70::स्थालीबिलात्‌","5.1.71::यज्ञर्त्विग्भ्यां घखञौ","5.1.72::पारायणतुरायणचान्द्रायणं वर्तयति","5.1.73::संशयमापन्नः","5.1.74::योजनं गच्छति","5.1.75::पथः ष्कन्","5.1.76::पन्थो ण नित्यम्","5.1.77::उत्तरपथेनाहृतं च","5.1.78:अधिकारः:कालात्‌","5.1.79::तेन निर्वृत्तम्","5.1.80::तमधीष्टो भृतो भूतो भावी","5.1.81::मासाद्वयसि यत्खञौ","5.1.82::द्विगोर्यप्‌","5.1.83::षण्मासाण्ण्यच्च","5.1.84::अवयसि ठंश्च","5.1.85::समायाः खः","5.1.86::द्विगोर्वा","5.1.87::रात्र्यहस्संवत्सराच्च","5.1.88::वर्षाल्लुक् च","5.1.89::चित्तवति नित्यम्","5.1.90::षष्टिकाः षष्टिरात्रेण पच्यन्ते","5.1.91::वत्सरान्ताच्छश्छन्दसि","5.1.92::सम्परिपूर्वात्‌ ख च","5.1.93::तेन परिजय्यलभ्यकार्यसुकरम्","5.1.94::तदस्य ब्रह्मचर्यम्","5.1.95::तस्य च दक्षिणा यज्ञाख्येभ्यः","5.1.96::तत्र च दीयते कार्यं भववत्‌","5.1.97::व्युष्टादिभ्योऽण्","5.1.98::तेन यथाकथाचहस्ताभ्यां णयतौ","5.1.99::सम्पादिनि","5.1.100::कर्मवेषाद्यत्","5.1.101::तस्मै प्रभवति संतापादिभ्यः","5.1.102::योगाद्यच्च","5.1.103::कर्मण उकञ्","5.1.104::समयस्तदस्य प्राप्तम्","5.1.105::ऋतोरण्","5.1.106::छन्दसि घस्","5.1.107::कालाद्यत्‌","5.1.108::प्रकृष्टे ठञ्","5.1.109::प्रयोजनम्","5.1.110::विशाखाऽऽषाढादण् मन्थदण्डयोः","5.1.111::अनुप्रवचनादिभ्यश्छः","5.1.112::समापनात्‌ सपूर्वपदात्‌","5.1.113::ऐकागारिकट् चौरे","5.1.114::आकालिकडाद्यन्तवचने","5.1.115::तेन तुल्यं क्रिया चेद्वतिः","5.1.116::तत्र तस्येव","5.1.117::तदर्हम्","5.1.118::उपसर्गाच्छन्दसि धात्वर्थे","5.1.119::तस्य भावस्त्वतलौ","5.1.120:अधिकारः:आ च त्वात्‌","5.1.121::न नञ्पूर्वात्तत्पुरुषादचतुरसंगतलवणवटयुधकतरसलसेभ्यः","5.1.122::पृथ्वादिभ्य इमनिज्वा","5.1.123::वर्णदृढादिभ्यः ष्यञ् च","5.1.124::गुणवचनब्राह्मणादिभ्यः कर्मणि च","5.1.125::स्तेनाद्यन्नलोपश्च","5.1.126::सख्युर्यः","5.1.127::कपिज्ञात्योर्ढक्","5.1.128::पत्यन्तपुरोहितादिभ्यो यक्","5.1.129::प्राणभृज्जातिवयोवचनोद्गात्रादिभ्योऽञ्","5.1.130::हायनान्तयुवादिभ्योऽण्","5.1.131::इगन्ताच्च लघुपूर्वात्‌","5.1.132::योपधाद्गुरूपोत्तमाद्वुञ्","5.1.133::द्वंद्वमनोज्ञादिभ्यश्च","5.1.134::गोत्रचरणाच्श्लाघाऽत्याकारतदवेतेषु","5.1.135::होत्राभ्यश्छः","5.1.136::ब्रह्मणस्त्वः","5.2.1::धान्यानां भवने क्षेत्रे खञ्","5.2.2::व्रीहिशाल्योर्ढक्","5.2.3::यवयवकषष्टिकादत्‌","5.2.4::विभाषा तिलमाषोमाभङ्गाऽणुभ्यः","5.2.5::सर्वचर्मणः कृतः खखञौ","5.2.6::यथामुखसंमुखस्य दर्शनः खः","5.2.7::तत्सर्वादेः पथ्यङ्गकर्मपत्रपात्रं व्याप्नोति","5.2.8::आप्रपदं प्राप्नोति","5.2.9::अनुपदसर्वान्नायानयं बद्धाभक्षयतिनेयेषु","5.2.10::परोवरपरम्परपुत्रपौत्रमनुभवति","5.2.11::अवारपारात्यन्तानुकामं गामी","5.2.12::समांसमां विजायते","5.2.13::अद्यश्वीनाऽवष्टब्धे","5.2.14::आगवीनः","5.2.15::अनुग्वलंगामी","5.2.16::अध्वनो यत्खौ","5.2.17::अभ्यमित्राच्छ च","5.2.18::गोष्ठात्‌ खञ् भूतपूर्वे","5.2.19::अश्वस्यैकाहगमः","5.2.20::शालीनकौपीने अधृष्टाकार्ययोः","5.2.21::व्रातेन जीवति","5.2.22::साप्तपदीनं सख्यम्","5.2.23::हैयंगवीनं संज्ञायाम्","5.2.24::तस्य पाकमूले पील्वदिकर्णादिभ्यः कुणब्जाहचौ","5.2.25::पक्षात्तिः","5.2.26::तेन वित्तश्चुञ्चुप्चणपौ","5.2.27::विनञ्भ्यां नानाञौ नसह","5.2.28::वेः शालच्छङ्कटचौ","5.2.29::सम्प्रोदश्च कटच्","5.2.30::अवात्‌ कुटारच्च","5.2.31::नते नासिकायाः संज्ञायां टीटञ्नाटज्भ्राटचः","5.2.32::नेर्बिडज्बिरीसचौ","5.2.33::इनच्पिटच्चिकचि च","5.2.34::उपाधिभ्यां त्यकन्नासन्नारूढयोः","5.2.35::कर्मणि घटोऽठच्","5.2.36::तदस्य संजातं तारकाऽऽदिभ्य इतच्","5.2.37::प्रमाणे द्वयसज्दघ्नञ्मात्रचः","5.2.38::पुरुषहस्तिभ्यामण् च","5.2.39::यद्तदेतेभ्यः परिमाणे वतुप्‌","5.2.40::किमिदंभ्यां वो घः","5.2.41::किमः संख्यापरिमाणे डति च","5.2.42::संख्याया अवयवे तयप्‌","5.2.43::द्वित्रिभ्यां तयस्यायज्वा","5.2.44::उभादुदात्तो नित्यम्","5.2.45::तदस्मिन्नधिकमिति दशान्ताड्डः","5.2.46::शदन्तविंशतेश्च","5.2.47::संख्याया गुणस्य निमाने मयट्","5.2.48::तस्य पूरणे डट्","5.2.49::नान्तादसंख्याऽऽदेर्मट्","5.2.50::थट् च च्छन्दसि","5.2.51::षट्कतिकतिपयचतुरां थुक्","5.2.52::बहुपूगगणसंघस्य तिथुक्","5.2.53::वतोरिथुक्","5.2.54::द्वेस्तीयः","5.2.55::त्रेः सम्प्रसारणम् च","5.2.56::विंशत्यादिभ्यस्तमडन्यतरस्याम्","5.2.57::नित्यं शतादिमासार्धमाससंवत्सराच्च","5.2.58::षष्ट्यादेश्चासंख्याऽऽदेः","5.2.59::मतौ च्छः सूक्तसाम्नोः","5.2.60::अध्यायानुवाकयोर्लुक्","5.2.61::विमुक्तादिभ्योऽण्","5.2.62::गोषदादिभ्यो वुन्","5.2.63::तत्र कुशलः पथः","5.2.64::आकर्षादिभ्यः कन्","5.2.65::धनहिरण्यात्‌ कामे","5.2.66::स्वाङ्गेभ्यः प्रसिते","5.2.67::उदराट्ठगाद्यूने","5.2.68::सस्येन परिजातः","5.2.69::अंशं हारी","5.2.70::तन्त्रादचिरापहृते","5.2.71::ब्राह्मणकोष्णिके संज्ञायाम्","5.2.72::शीतोष्णाभ्यां कारिणि","5.2.73::अधिकम्","5.2.74::अनुकाभिकाभीकः कमिता","5.2.75::पार्श्वेनान्विच्छति","5.2.76::अयःशूलदण्डाजिनाभ्यां ठक्ठञौ","5.2.77::तावतिथं ग्रहणमिति लुग्वा","5.2.78::स एषां ग्रामणीः","5.2.79::शृङ्खलमस्य बन्धनं करभे","5.2.80::उत्क उन्मनाः","5.2.81::कालप्रयोजनाद्रोगे","5.2.82::तदस्मिन्नन्नं प्राये संज्ञायाम्‌","5.2.83::कुल्माषादञ्","5.2.84::श्रोत्रियंश्छन्दोऽधीते","5.2.85::श्राद्धमनेन भुक्तमिनिठनौ","5.2.86::पूर्वादिनिः","5.2.87::सपूर्वाच्च","5.2.88::इष्टादिभ्यश्च","5.2.89::छन्दसि परिपन्थिपरिपरिणौ पर्यवस्थातरि","5.2.90::अनुपद्यन्वेष्टा","5.2.91::साक्षाद्द्रष्टरि संज्ञायाम्","5.2.92::क्षेत्रियच् परक्षेत्रे चिकित्स्यः","5.2.93::'इन्द्रियमिन्द्रलिंगमिन्द्रदृष्टमिन्द्रसृष्टमिन्द्रजुष्टम्इन्द्रदत्तमिति वा","5.2.94::तदस्यास्त्यस्मिन्निति मतुप्‌","5.2.95::रसादिभ्यश्च","5.2.96::प्राणिस्थादातो लजन्यतरस्याम्","5.2.97::सिध्मादिभ्यश्च","5.2.98::वत्सांसाभ्यां कामबले","5.2.99::फेनादिलच् च","5.2.100::लोमादिपामादिपिच्छादिभ्यः शनेलचः","5.2.101::प्रज्ञाश्रद्धाऽर्चावृत्तिभ्यो णः","5.2.102::तपःसहस्राभ्यां विनीनी","5.2.103::अण् च","5.2.104::सिकताशर्कराभ्यां च","5.2.105::देशे लुबिलचौ च","5.2.106::दन्त उन्नत उरच्","5.2.107::ऊषसुषिमुष्कमधो रः","5.2.108::द्युद्रुभ्यां मः","5.2.109::केशाद्वोऽन्यतरस्याम्","5.2.110::गाण्ड्यजगात्‌ संज्ञायाम्","5.2.111::काण्डाण्डादीरन्नीरचौ","5.2.112::रजःकृष्यासुतिपरिषदो वलच्","5.2.113::दन्तशिखात्‌ संज्ञायाम्","5.2.114::ज्योत्स्नातमिस्राशृङ्गिणोजस्विन्नूर्जस्वलगोमिन्मलिनमलीमसाः","5.2.115::अत इनिठनौ","5.2.116::व्रीह्यादिभ्यश्च","5.2.117::तुन्दादिभ्य इलच् च","5.2.118::एकगोपूर्वाट्ठञ् नित्यम्","5.2.119::शतसहस्रान्ताच्च निष्कात्‌","5.2.120::रूपादाहतप्रशंसयोरप्‌","5.2.121::अस्मायामेधास्रजो विनिः","5.2.122::बहुलं छन्दसि","5.2.123::ऊर्णाया युस्","5.2.124::वाचो ग्मिनिः","5.2.125::आलजाटचौ बहुभाषिणि","5.2.126::स्वामिन्नैश्वर्ये","5.2.127::अर्शआदिभ्योऽच्","5.2.128::द्वंद्वोपतापगर्ह्यात्‌ प्राणिस्थादिनिः","5.2.129::वातातिसाराभ्यां कुक् च","5.2.130::वयसि पूरणात्‌","5.2.131::सुखादिभ्यश्च","5.2.132::धर्मशीलवर्णान्ताच्च","5.2.133::हस्ताज्जातौ","5.2.134::वर्णाद्ब्रह्मचारिणि","5.2.135::पुष्करादिभ्यो देशे","5.2.136::बलादिभ्यो मतुबन्यतरस्याम्","5.2.137::संज्ञायां मन्माभ्याम्.ह्","5.2.138::कंशंभ्यां बभयुस्तितुतयसः","5.2.139::तुन्दिवलिवटेर्भः","5.2.140::अहंशुभमोर्युस्","5.3.1:संज्ञा:प्राग्दिशो विभक्तिः","5.3.2:अधिकारः:किंसर्वनामबहुभ्योऽद्व्यादिभ्यः","5.3.3::इदम इश्","5.3.4::एतेतौ रथोः","5.3.5::एतदोऽश्","5.3.6::सर्वस्य सोऽन्यतरस्यां दि","5.3.7::पञ्चम्यास्तसिल्","5.3.8::तसेश्च","5.3.9::पर्यभिभ्यां च","5.3.10::सप्तम्यास्त्रल्","5.3.11::इदमो हः","5.3.12::किमोऽत्‌","5.3.13::वा ह च च्छन्दसि","5.3.14::इतराभ्योऽपि दृश्यन्ते","5.3.15::सर्वैकान्यकिंयत्तदः काले दा","5.3.16::इदमो र्हिल्","5.3.17::अधुना","5.3.18::दानीं च","5.3.19::तदो दा च","5.3.20::तयोर्दार्हिलौ च च्छन्दसि","5.3.21::अनद्यतने र्हिलन्यतरस्याम्","5.3.22::सद्यःपरुत्परार्यैषमःपरेद्यव्यद्यपूर्वेद्युरन्येद्युरन्यतरेद्युरितरेद्युरपरेद्युरधरेद्युरुभयेद्युरुत्तरेद्युः","5.3.23::प्रकारवचने थाल्","5.3.24::इदमस्थमुः","5.3.25::किमश्च","5.3.26::था हेतौ च च्छन्दसि","5.3.27::दिक्‌शब्देभ्यः सप्तमीपञ्चमीप्रथमाभ्यो दिग्देशकालेष्वस्तातिः","5.3.28::दक्षिणोत्तराभ्यामतसुच्","5.3.29::विभाषा परावराभ्याम्","5.3.30::अञ्चेर्लुक्","5.3.31::उपर्युपरिष्टात्‌","5.3.32::पश्चात्‌","5.3.33::पश्च पश्चा च च्छन्दसि","5.3.34::उत्तराधरदक्षिणादातिः","5.3.35::एनबन्यतरस्यामदूरेऽपञ्चम्याः","5.3.36::दक्षिणादाच्","5.3.37::आहि च दूरे","5.3.38::उत्तराच्च","5.3.39::पूर्वाधरावराणामसि पुरधवश्चैषाम्‌","5.3.40::अस्ताति च","5.3.41::विभाषाऽवरस्य","5.3.42::संख्याया विधाऽर्थे धा","5.3.43::अधिकरणविचाले च","5.3.44::एकाद्धो ध्यमुञन्यारयाम्","5.3.45::द्वित्र्योश्च धमुञ्","5.3.46::एधाच्च","5.3.47::याप्ये पाशप्‌","5.3.48::पूरणाद्भागे तीयादन्","5.3.49::प्रागेकादशभ्योऽच्छन्दसि","5.3.50::षष्ठाष्टमाभ्यां ञ च","5.3.51::मानपश्वङ्गयोः कन्लुकौ च","5.3.52::एकादाकिनिच्चासहाये","5.3.53::भूतपूर्वे चरट्","5.3.54::षष्ठ्या रूप्य च","5.3.55::अतिशायने तमबिष्ठनौ","5.3.56::तिङश्च","5.3.57::द्विवचनविभज्योपपदे तरबीयसुनौ","5.3.58::अजादी गुणवचनादेव","5.3.59::तुश्छन्दसि","5.3.60::प्रशस्यस्य श्रः","5.3.61::ज्य च","5.3.62::वृद्धस्य च","5.3.63::अन्तिकबाढयोर्नेदसाधौ","5.3.64::युवाल्पयोः कनन्यतरस्याम्","5.3.65::विन्मतोर्लुक्","5.3.66::प्रशंसायां रूपप्‌","5.3.67::ईषदसमाप्तौ कल्पब्देश्यदेशीयरः","5.3.68::विभाषा सुपो बहुच् पुरस्तात्तु","5.3.69::प्रकारवचने जातीयर्।","5.3.70:अधिकारः:प्रागिवात्कः","5.3.71::अव्ययसर्वनाम्नामकच् प्राक् टेः","5.3.72::कस्य च दः","5.3.73::अज्ञाते","5.3.74::कुत्सिते","5.3.75::संज्ञायां कन्","5.3.76::अनुकम्पायाम्","5.3.77::नीतौ च तद्युक्तात्‌","5.3.78::बह्वचो मनुष्यनाम्नष्ठज्वा","5.3.79::घनिलचौ च","5.3.80::प्राचामुपादेरडज्वुचौ च","5.3.81::जातिनाम्नः कन्","5.3.82::अजिनान्तस्योत्तरपदलोपश्च","5.3.83::ठाजादावूर्ध्वं द्वितीयादचः","5.3.84::शेवलसुपरिविशालवरुणार्यमादीनां तृतीयात्‌","5.3.85::अल्पे","5.3.86::ह्रस्वे","5.3.87::संज्ञायां कन्","5.3.88::कुटीशमीशुण्डाभ्यो रः","5.3.89::कुत्वा डुपच्","5.3.90::कासूगोणीभ्यां ष्टरच्","5.3.91::वत्सोक्षाश्वर्षभेभ्यश्च तनुत्वे","5.3.92::किंयत्तदो निर्द्धारणे द्वयोरेकस्य डतरच्","5.3.93::वा बहूनां जातिपरिप्रश्ने डतमच्","5.3.94::एकाच्च प्राचाम्","5.3.95::अवक्षेपणे कन्","5.3.96::इवे प्रतिकृतौ","5.3.97::संज्ञायां च","5.3.98::लुम्मनुष्ये","5.3.99::जीविकाऽर्थे चापण्ये","5.3.100::देवपथादिभ्यश्च","5.3.101::वस्तेर्ढञ्","5.3.102::शिलाया ढः","5.3.103::शाखाऽऽदिभ्यो यत्‌","5.3.104::द्रव्यं च भव्ये","5.3.105::कुशाग्राच्छः","5.3.106::समासाच्च तद्विषयात्‌","5.3.107::शर्कराऽऽदिभ्योऽण्","5.3.108::अङ्गुल्यादिभ्यष्ठक्","5.3.109::एकशालायाष्ठजन्यतरस्याम्","5.3.110::कर्कलोहितादीकक्","5.3.111::प्रत्नपूर्वविश्वेमात्थाल् छन्दसि","5.3.112::पूगाञ्ञ्योऽग्रामणीपूर्वात्‌","5.3.113::व्रातच्फञोरस्त्रियाम्","5.3.114::आयुधजीविसंघाञ्ञ्यड्वाहीकेष्वब्राह्मणराजन्यात्‌","5.3.115::वृकाट्टेण्यण्","5.3.116::दामन्यादित्रिगर्तषष्ठाच्छः","5.3.117::पर्श्वादियौधेयादिभ्यामणञौ","5.3.118::'अभिजिद्विदभृच्छालावच्छिखावच्छमीवदूर्णावच्छ्रुमदणो यञ्","5.3.119:संज्ञा:ञ्य्आदयस्तद्राजाः","5.4.1::पादशतस्य संख्याऽऽदेर्वीप्सायां वुन् लोपश्च","5.4.2::दण्डव्यवसर्गयोश्च","5.4.3::स्थूलादिभ्यः प्रकारवचने कन्","5.4.4::अनत्यन्तगतौ क्तात्‌","5.4.5::न सामिवचने","5.4.6::बृहत्या आच्छादने","5.4.7::अषडक्षाशितङ्ग्वलंकर्मालम्पुरुषाध्युत्तरपदात्‌ खः","5.4.8::विभाषा अञ्चेरदिक्स्त्रियाम्","5.4.9::जात्यन्ताच्छ बन्धुनि","5.4.10::स्थानान्ताद्विभाषा सस्थानेनेति चेत्‌","5.4.11::किमेत्तिङव्ययघादाम्वद्रव्यप्रकर्षे","5.4.12::अमु च च्छन्दसि","5.4.13::अनुगादिनष्ठक्","5.4.14::णचः स्त्रियामञ्","5.4.15::अणिनुणः","5.4.16::विसारिणो मत्स्ये","5.4.17::संख्यायाः क्रियाऽभ्यावृत्तिगणने कृत्वसुच्","5.4.18::द्वित्रिचतुर्भ्यः सुच्","5.4.19::एकस्य सकृच्च","5.4.20::विभाषा बहोर्धाऽविप्रकृष्टकाले","5.4.21::तत्प्रकृतवचने मयट्","5.4.22:अतिदेशः:समूहवच्च बहुषु","5.4.23::अनन्तावसथेतिहभेषजाञ्ञ्यः","5.4.24::देवतान्तात्तादर्थ्ये यत्‌","5.4.25::पादार्घाभ्यां च","5.4.26::अतिथेर्ञ्यः","5.4.27::देवात्तल्","5.4.28::अवेः कः","5.4.29::यावादिभ्यः कन्","5.4.30::लोहितान्मणौ","5.4.31::वर्णे चानित्ये","5.4.32::रक्ते","5.4.33::कालाच्च","5.4.34::विनयादिभ्यष्ठक्","5.4.35::वाचो व्याहृतार्थायाम्","5.4.36::तद्युक्तात्‌ कर्मणोऽण्","5.4.37::ओषधेरजातौ","5.4.38::प्रज्ञादिभ्यश्च","5.4.39::मृदस्तिकन्","5.4.40::सस्नौ प्रशंसायाम्","5.4.41::वृकज्येष्ठाभ्यां तिल्तातिलौ च च्छन्दसि","5.4.42::बह्वल्पार्थाच्छस् कारकादन्यतरस्याम्","5.4.43::संख्यैकवचनाच्च वीप्सायाम्","5.4.44::प्रतियोगे पञ्चम्यास्तसिः","5.4.45::अपादाने चाहीयरुहोः","5.4.46::अतिग्रहाव्यथनक्षेपेष्वकर्तरि तृतीयायाः","5.4.47::हीयमानपापयोगाच्च","5.4.48::षष्ठ्या व्याश्रये","5.4.49::रोगाच्चापनयने","5.4.50::अभूततद्भावे कृभ्वस्तियोगे सम्पद्यकर्तरि च्विः","5.4.51::अरुर्मनश्चक्षुश्चेतोरहोरजसां लोपश्च","5.4.52::विभाषा साति कार्त्स्न्ये","5.4.53::अभिविधौ सम्पदा च","5.4.54::तदधीनवचने","5.4.55::देये त्रा च","5.4.56::देवमनुष्यपुरुषमर्त्येभ्यो द्वितीयासप्तम्योर्बहुलम्","5.4.57::अव्यक्तानुकरणाद्द्व्यजवरार्धादनितौ डाच्","5.4.58::कृञो द्वितीयतृतीयशम्बबीजात्‌ कृषौ","5.4.59::संख्यायाश्च गुणान्तायाः","5.4.60::समयाच्च यापनायाम्","5.4.61::सपत्त्रनिष्पत्रादतिव्यथने","5.4.62::निष्कुलान्निष्कोषणे","5.4.63::सुखप्रियादानुलोम्ये","5.4.64::दुःखात्‌ प्रातिलोम्ये","5.4.65::शूलात्‌ पाके","5.4.66::सत्यादशपथे","5.4.67::मद्रात्‌ परिवापणे","5.4.68:अधिकारः:समासान्ताः","5.4.69::न पूजनात्‌","5.4.70::किमः क्षेपे","5.4.71::नञस्तत्पुरुषात्‌","5.4.72::पथो विभाषा","5.4.73::बहुव्रीहौ संख्येये डजबहुगणात्‌","5.4.74::ऋक्पूरप्धूःपथामानक्षे","5.4.75::अच्‌ प्रत्यन्ववपूर्वात्‌ सामलोम्नः","5.4.76::अक्ष्णोऽदर्शनात्‌","5.4.77::अचतुरविचतुरसुचतुरस्त्रीपुंसधेन्वनडुहर्क्सामवाङ्मनसाक्षिभ्रुवदारगवोर्वष्ठीवपदष्ठीवनक्तंदिवरत्रिंदिवाहर्दिवसरजसनिःश्रेयसपुरुषायुषद्व्यायुषत्र्यायुषर्ग्यजुषजातोक्षमहोक्षवृद्धोक्षोपशुनगोष्ठश्वाः","5.4.78::ब्रह्महस्तिभ्याम् वर्च्चसः","5.4.79::अवसमन्धेभ्यस्तमसः","5.4.80::श्वसो वसीयःश्रेयसः","5.4.81::अन्ववतप्ताद्रहसः","5.4.82::प्रतेरुरसः सप्तमीस्थात्‌","5.4.83::अनुगवमायामे","5.4.84::द्विस्तावा त्रिस्तावा वेदिः","5.4.85::उपसर्गादध्वनः","5.4.86::तत्पुरुषस्याङ्गुलेः संख्याऽव्ययादेः","5.4.87::अहस्सर्वैकदेशसंख्यातपुण्याच्च रात्रेः","5.4.88::अह्नोऽह्न एतेभ्यः","5.4.89::न संख्याऽऽदेः समाहारे","5.4.90::उत्तमैकाभ्यां च","5.4.91::राजाऽहस्सखिभ्यष्टच्‌","5.4.92::गोरतद्धितलुकि","5.4.93::अग्राख्यायामुरसः","5.4.94::अनोऽश्मायस्सरसाम् जातिसंज्ञयोः","5.4.95::ग्रामकौटाभ्यां च तक्ष्णः","5.4.96::अतेः शुनः","5.4.97::उपमानादप्राणिषु","5.4.98::उत्तरमृगपूर्वाच्च सक्थ्नः","5.4.99::नावो द्विगोः","5.4.100::अर्धाच्च","5.4.101::खार्याः प्राचाम्","5.4.102::द्वित्रिभ्यामञ्जलेः","5.4.103::अनसन्तान्नपुंसकाच्छन्दसि","5.4.104::ब्रह्मणो जानपदाख्यायाम्","5.4.105::कुमहद्भ्यामन्यतरस्याम्‌","5.4.106::द्वंद्वाच्चुदषहान्तात् समाहारे","5.4.107::अव्ययीभावे शरत्प्रभृतिभ्यः","5.4.108::अनश्च","5.4.109::नपुंसकादन्यतर्अस्याम्","5.4.110::नदीपौर्णमास्याग्रहायणीभ्यः","5.4.111::झयः","5.4.112::गिरेश्च सेनकस्य","5.4.113::बहुव्रीहौ सक्थ्यक्ष्णोः स्वाङ्गात्‌ षच्","5.4.114::अङ्गुलेर्दारुणि","5.4.115::द्वित्रिभ्यां ष मूर्ध्नः","5.4.116::अप् पूरणीप्रमाण्योः","5.4.117::अन्तर्बहिर्भ्यां च लोम्नः","5.4.118::अञ्नासिकायाः संज्ञायां नसं चास्थूलात्‌","5.4.119::उपसर्गाच्च","5.4.120::सुप्रातसुश्वसुदिवशारिकुक्षचतुरश्रैणीपदाजपदप्रोष्ठपदाः","5.4.121::नञ्दुःसुभ्यो हलिसक्थ्योरन्यतरस्याम्","5.4.122::नित्यमसिच् प्रजामेधयोः","5.4.123::बहुप्रजाश्छन्दसि","5.4.124::धर्मादनिच् केवलात्‌","5.4.125::जम्भा सुहरिततृणसोमेभ्यः","5.4.126::दक्षिणेर्मा लुब्धयोगे","5.4.127::इच् कर्मव्यतिहारे","5.4.128::द्विदण्ड्यादिभ्यश्च","5.4.129::प्रसम्भ्यां जानुनोर्ज्ञुः","5.4.130::ऊर्ध्वाद्विभाषा","5.4.131::ऊधसोऽनङ्","5.4.132::धनुषश्च","5.4.133::वा संज्ञायाम्","5.4.134::जायाया निङ्","5.4.135::गन्धस्येदुत्पूतिसुसुरभिभ्यः","5.4.136::अल्पाख्यायाम्","5.4.137::उपमानाच्च","5.4.138::पादस्य लोपोऽहस्त्यादिभ्यः","5.4.139::कुम्भपदीषु च","5.4.140::संख्यासुपूर्वस्य","5.4.141::वयसि दन्तस्य दतृ","5.4.142::छन्दसि च","5.4.143::स्त्रियां संज्ञायाम्","5.4.144::विभाषा श्यावारोकाभ्याम्","5.4.145::अग्रान्तशुद्धशुभ्रवृषवराहेभ्यश्च","5.4.146::ककुदस्यावस्थायां लोपः","5.4.147::त्रिककुत् पर्वते","5.4.148::उद्विभ्यां काकुदस्य","5.4.149::पूर्णाद्विभाषा","5.4.150::सुहृद्दुर्हृदौ मित्रामित्रयोः","5.4.151::उरःप्रभृतिभ्यः कप्‌","5.4.152::इनः स्त्रियाम्","5.4.153::नद्यृतश्च","5.4.154::शेषाद्विभाषा","5.4.155::न संज्ञायाम्","5.4.156::ईयसश्च","5.4.157::वन्दिते भ्रातुः","5.4.158::ऋतश्छन्दसि","5.4.159::नाडीतन्त्र्योः स्वाङ्गे","5.4.160::निष्प्रवाणिश्च","6.1.1::एकाचो द्वे प्रथमस्य","6.1.2::अजादेर्द्वितीयस्य","6.1.3::न न्द्राः संयोगादयः","6.1.4:संज्ञा:पूर्वोऽभ्यासः","6.1.5:संज्ञा:उभे अभ्यस्तम्","6.1.6::जक्षित्यादयः षट्","6.1.7::तुजादीनां दीर्घोऽभ्यासस्य","6.1.8::लिटि धातोरनभ्यासस्य","6.1.9::सन्यङोः","6.1.10::श्लौ","6.1.11::चङि","6.1.12::दाश्वान् साह्वान् मीढ्वांश्च","6.1.13::ष्यङः सम्प्रसारणं पुत्रपत्योस्तत्पुरुषे","6.1.14::बन्धुनि बहुव्रीहौ","6.1.15::वचिस्वपियजादीनां किति","6.1.16::ग्रहिज्यावयिव्यधिवष्टिविचतिवृश्चतिपृच्छतिभृज्जतीनां ङिति च","6.1.17::लिट्यभ्यासस्योभयेषाम्","6.1.18::स्वापेश्चङि","6.1.19::स्वपिस्यमिव्येञां यङि","6.1.20::न वशः","6.1.21::चायः की","6.1.22::स्फायः स्फी निष्ठायाम्","6.1.23::स्त्यः प्रपूर्वस्य","6.1.24::द्रवमूर्तिस्पर्शयोः श्यः","6.1.25::प्रतेश्च","6.1.26::विभाषाऽभ्यवपूर्वस्य","6.1.27::शृतं पाके","6.1.28::प्यायः पी","6.1.29::लिड्यङोश्च","6.1.30::विभाषा श्वेः","6.1.31::णौ च संश्चङोः","6.1.32::ह्वः सम्प्रसारणम्","6.1.33::अभ्यस्तस्य च","6.1.34::बहुलं छन्दसि","6.1.35::चायः की","6.1.36::अपस्पृधेथामानृचुरानृहुश्चिच्युषेतित्याजश्राताःश्रितमाशीराशीर्त्तः","6.1.37::न सम्प्रसारणे सम्प्रसारणम्","6.1.38::लिटि वयो यः","6.1.39::वश्चास्यान्यतरस्याम् किति","6.1.40::वेञः","6.1.41::ल्यपि च","6.1.42::ज्यश्च","6.1.43::व्यश्च","6.1.44::विभाषा परेः","6.1.45::आदेच उपदेशेऽशिति","6.1.46::न व्यो लिटि","6.1.47::स्फुरतिस्फुलत्योर्घञि","6.1.48::क्रीङ्जीनां णौ","6.1.49::सिध्यतेरपारलौकिके","6.1.50::मीनातिमिनोतिदीङां ल्यपि च","6.1.51::विभाषा लीयतेः","6.1.52::खिदेश्छन्दसि","6.1.53::अपगुरो णमुलि","6.1.54::चिस्फुरोर्णौ","6.1.55::प्रजने वीयतेः","6.1.56::बिभेतेर्हेतुभये","6.1.57::नित्यं स्मयतेः","6.1.58::सृजिदृशोर्झल्यमकिति","6.1.59::अनुदात्तस्य चर्दुपधस्यान्यतरस्याम्","6.1.60::शीर्षंश्छन्दसि","6.1.61::ये च तद्धिते","6.1.62::अचि शीर्षः","6.1.63::पद्दन्नोमास्हृन्निशसन्यूषन्दोषन्यकञ्छकन्नुदन्नासञ्छस्प्रभृतिषु","6.1.64::धात्वादेः षः सः","6.1.65::णो नः","6.1.66::लोपो व्योर्वलि","6.1.67::वेरपृक्तस्य","6.1.68::हल्ङ्याब्भ्यो दीर्घात्‌ सुतिस्यपृक्तं हल्","6.1.69::एङ्ह्रस्वात्‌ सम्बुद्धेः","6.1.70::शेश्छन्दसि बहुलम्","6.1.71:अधिकारः:ह्रस्वस्य पिति कृति तुक्","6.1.72::संहितायाम्","6.1.73::छे च","6.1.74::आङ्माङोश्च","6.1.75::दीर्घात्‌","6.1.76::पदान्ताद्वा","6.1.77::इको यणचि","6.1.78::एचोऽयवायावः","6.1.79::वान्तो यि प्रत्यये","6.1.80::धातोस्तन्निमित्तस्यैव","6.1.81::क्षय्यजय्यौ शक्यार्थे","6.1.82::क्रय्यस्तदर्थे","6.1.83:अधिकारः:भय्यप्रवय्ये च च्छन्दसि","6.1.84::एकः पूर्वपरयोः","6.1.85:अतिदेशः:अन्तादिवच्च","6.1.86:अतिदेशः:षत्वतुकोरसिद्धः","6.1.87::आद्गुणः","6.1.88::वृद्धिरेचि","6.1.89::एत्येधत्यूठ्सु","6.1.90::आटश्च","6.1.91::उपसर्गादृति धातौ","6.1.92::वा सुप्यापिशलेः","6.1.93::औतोऽम्शसोः","6.1.94::एङि पररूपम्","6.1.95::ओमाङोश्च","6.1.96::उस्यपदान्तात्‌","6.1.97::अतो गुणे","6.1.98::अव्यक्तानुकरणस्यात इतौ","6.1.99::नाम्रेडितस्यान्त्यस्य तु वा","6.1.100::नित्यमाम्रेडिते डाचि","6.1.101::अकः सवर्णे दीर्घः","6.1.102::प्रथमयोः पूर्वसवर्णः","6.1.103::तस्माच्छसो नः पुंसि","6.1.104::नादिचि","6.1.105::दीर्घाज्जसि च","6.1.106::वा छन्दसि","6.1.107::अमि पूर्वः","6.1.108::सम्प्रसारणाच्च","6.1.109::एङः पदान्तादति","6.1.110::ङसिङसोश्च","6.1.111::ऋत उत्‌","6.1.112::ख्यत्यात्‌ परस्य","6.1.113::अतो रोरप्लुतादप्लुते","6.1.114::हशि च","6.1.115::प्रकृत्याऽन्तःपादमव्यपरे","6.1.116::अव्यादवद्यादवक्रमुरव्रतायमवन्त्ववस्युषु च","6.1.117::यजुष्युरः","6.1.118::आपोजुषाणोवृष्णोवर्षिष्ठेऽम्बेऽम्बालेऽम्बिकेपूर्वे","6.1.119::अङ्ग इत्यादौ च","6.1.120::अनुदात्ते च कुधपरे","6.1.121::अवपथासि च","6.1.122::सर्वत्र विभाषा गोः","6.1.123::अवङ् स्फोटायनस्य","6.1.124::इन्द्रे च {नित्यम्}","6.1.125::प्लुतप्रगृह्या अचि नित्यम्","6.1.126::आङोऽनुनासिकश्छन्दसि","6.1.127::इकोऽसवर्णे शाकल्यस्य ह्रस्वश्च","6.1.128::ऋत्यकः","6.1.129:अतिदेशः:अप्लुतवदुपस्थिते","6.1.130::ई३ चाक्रवर्मणस्य","6.1.131::दिव उत्‌","6.1.132::एतत्तदोः सुलोपोऽकोरनञ्समासे हलि","6.1.133:अधिकारः:स्यश्छन्दसि बहुलम्","6.1.134::सोऽचि लोपे चेत्‌ पादपूरणम्","6.1.135::सुट् कात्‌ पूर्वः","6.1.136::अडभ्यासव्यवायेऽपि","6.1.137::सम्पर्युपेभ्यः करोतौ भूषणे","6.1.138::समवाये च","6.1.139::उपात्‌ प्रतियत्नवैकृतवाक्याध्याहारेषु","6.1.140::किरतौ लवने","6.1.141::हिंसायां प्रतेश्च","6.1.142::अपाच्चतुष्पाच्छकुनिष्वालेखने","6.1.143::कुस्तुम्बुरूणि जातिः","6.1.144::अपरस्पराः क्रियासातत्ये","6.1.145::गोष्पदं सेवितासेवितप्रमाणेषु","6.1.146::आस्पदं प्रतिष्ठायाम्‌","6.1.147::आश्चर्यमनित्ये","6.1.148::वर्चस्केऽवस्करः","6.1.149::अपस्करो रथाङ्गम्","6.1.150::विष्किरः शकुनिर्विकरो वा","6.1.151::ह्रस्वाच्चन्द्रोत्तरपदे मन्त्रे","6.1.152::प्रतिष्कशश्च कशेः","6.1.153::प्रस्कण्वहरिश्चन्द्रावृषी","6.1.154::मस्करमस्करिणौ वेणुपरिव्राजकयोः","6.1.155::कास्तीराजस्तुन्दे नगरे","6.1.156::कारस्करो वृक्षः","6.1.157::पारस्करप्रभृतीनि च संज्ञायाम्","6.1.158:परिभाषा:अनुदात्तं पदमेकवर्जम्‌","6.1.159::कर्षात्वतो घञोऽन्त उदात्तः","6.1.160::उञ्छादीनां च","6.1.161::अनुदात्तस्य च यत्रोदात्तलोपः","6.1.162::धातोः","6.1.163::चितः","6.1.164::तद्धितस्य","6.1.165::कितः","6.1.166::तिसृभ्यो जसः","6.1.167::चतुरः शसि","6.1.168::सावेकाचस्तृतीयाऽऽदिविभक्तिः","6.1.169::अन्तोदत्तादुत्तरपदादन्यतरस्यामनित्यसमासे","6.1.170::अञ्चेश्छन्दस्यसर्वनामस्थानम्","6.1.171::ऊडिदम्पदाद्यप्पुम्रैद्युभ्यः","6.1.172::अष्टनो दीर्घात्‌","6.1.173::शतुरनुमो नद्यजादी","6.1.174::उदात्तयणो हल्पूर्वात्‌","6.1.175::नोङ्धात्वोः","6.1.176::ह्रस्वनुड्भ्यां मतुप्‌","6.1.177::नामन्यतरस्याम्‌","6.1.178::ङ्याश्छन्दसि बहुलम्","6.1.179::षट्त्रिचतुर्भ्यो हलादिः","6.1.180::झल्युपोत्तमम्","6.1.181::विभाषा भाषायाम्","6.1.182::न गोश्वन्त्साववर्णराडङ्क्रुङ्कृद्भ्यः","6.1.183::दिवो झल्","6.1.184::नृ चान्यतरस्याम्","6.1.185::तित्स्वरितम्","6.1.186::तास्यनुदात्तेन्ङिददुपदेशाल्लसार्वधातुकमनुदात्तमहन्विङोः","6.1.187::आदिः सिचोऽन्यतरस्याम्","6.1.188::स्वपादिर्हिंसामच्यनिटि","6.1.189::अभ्यस्तानामादिः","6.1.190::अनुदात्ते च","6.1.191::सर्वस्य सुपि","6.1.192::भीह्रीभृहुमदजनधनदरिद्राजागरां प्रत्ययात् पूर्वम् पिति","6.1.193::लिति","6.1.194::आदिर्णमुल्यन्यतरस्याम्","6.1.195::अचः कर्तृयकि","6.1.196::थलि च सेटीडन्तो वा","6.1.197::ञ्णित्यादिर्नित्यम्","6.1.198::आमन्त्रितस्य च","6.1.199::पथिमथोः सर्वनामस्थाने","6.1.200::अन्तश्च तवै युगपत्‌","6.1.201::क्षयो निवासे","6.1.202::जयः करणम्","6.1.203::वृषादीनां च","6.1.204::संज्ञायामुपमानम्‌","6.1.205::निष्ठा च द्व्यजनात्‌","6.1.206::शुष्कधृष्टौ","6.1.207::आशितः कर्ता","6.1.208::रिक्ते विभाषा","6.1.209::जुष्टार्पिते च छन्दसि","6.1.210::नित्यं मन्त्रे","6.1.211::युष्मदस्मदोर्ङसि","6.1.212::ङयि च","6.1.213::यतोऽनावः","6.1.214::ईडवन्दवृशंसदुहां ण्यतः","6.1.215::विभाषा वेण्विन्धानयोः","6.1.216::त्यागरागहासकुहश्वठक्रथानाम्","6.1.217::उपोत्तमं रिति","6.1.218::चङ्यन्यतरस्याम्","6.1.219::मतोः पूर्वमात्‌ संज्ञायां स्त्रियाम्‌","6.1.220::अन्तोऽवत्याः","6.1.221::ईवत्याः","6.1.222::चौ","6.1.223::समासस्य","6.2.1::बहुव्रीहौ प्रकृत्या पूर्वपदम्","6.2.2::तत्पुरुषे तुल्यार्थतृतीयासप्तम्युपमानाव्ययद्वितीयाकृत्याः","6.2.3::वर्णः वर्णेष्वनेते","6.2.4::गाधलवणयोः प्रमाणे","6.2.5::दायाद्यं दायादे","6.2.6::प्रतिबन्धि चिरकृच्छ्रयोः","6.2.7::पदेऽपदेशे","6.2.8::निवाते वातत्राणे","6.2.9::शारदेअनार्तवे","6.2.10::अध्वर्युकषाययोर्जातौ","6.2.11::सदृशप्रतिरूपयोः सादृश्ये","6.2.12::द्विगौ प्रमाणे","6.2.13::गन्तव्यपण्यं वाणिजे","6.2.14::मात्रोपज्ञोपक्रमच्छाये नपुंसके","6.2.15::सुखप्रिययोर्हिते","6.2.16::प्रीतौ च","6.2.17::स्वं स्वामिनि","6.2.18::पत्यावैश्वर्ये","6.2.19::न भूवाक्चिद्दिधिषु","6.2.20::वा भुवनम्","6.2.21::आशङ्काबाधनेदीयस्सु संभावने","6.2.22::पूर्वे भूतपूर्वे","6.2.23::सविधसनीडसमर्यादसवेशसदेशेषु सामीप्ये","6.2.24::विस्पष्टादीनि गुणवचनेषु","6.2.25::श्रज्याऽवमकन्पापवत्सु भावे कर्मधारये","6.2.26::कुमारश्च","6.2.27::आदिः प्रत्येनसि","6.2.28::पूगेष्वन्यतरस्याम्","6.2.29::इगन्तकालकपालभगालशरावेषु द्विगौ","6.2.30::बह्वन्यतरस्याम्","6.2.31::दिष्टिवितस्त्योश्च","6.2.32::सप्तमी सिद्धशुष्कपक्वबन्धेष्वकालात्‌","6.2.33::परिप्रत्युपापा वर्ज्यमानाहोरात्रावयवेषु","6.2.34::राजन्यबहुवचनद्वंद्वेऽन्धकवृष्णिषु","6.2.35::संख्या","6.2.36::आचार्योपसर्जनश्चान्तेवासी","6.2.37::कार्तकौजपादयश्च","6.2.38::महान् व्रीह्यपराह्णगृष्टीष्वासजाबालभारभारतहैलिहिलरौरवप्रवृद्धेषु","6.2.39::क्षुल्लकश्च वैश्वदेवे","6.2.40::उष्ट्रः सादिवाम्योः","6.2.41::गौः सादसादिसारथिषु","6.2.42::कुरुगार्हपतरिक्तगुर्वसूतजरत्यश्लीलदृढरूपापारेवडवातैतिलकद्रूःपण्यकम्बलो दासीभाराणां च","6.2.43::चतुर्थी तदर्थे","6.2.44::अर्थे","6.2.45::क्ते च","6.2.46::कर्मधारयेऽनिष्ठा","6.2.47::अहीने द्वितीया","6.2.48::तृतीया कर्मणि","6.2.49::गतिरनन्तरः","6.2.50::तादौ च निति कृत्यतौ","6.2.51::तवै चान्तश्च युगपत्‌","6.2.52::अनिगन्तोऽञ्चतौ वप्रत्यये","6.2.53::न्यधी च","6.2.54::ईषदन्यतरस्याम्","6.2.55::हिरण्यपरिमाणं धने","6.2.56::प्रथमोऽचिरोपसम्पत्तौ","6.2.57::कतरकतमौ कर्मधारये","6.2.58::आर्यो ब्राह्मणकुमारयोः","6.2.59::राजा च","6.2.60::षष्ठी प्रत्येनसि","6.2.61::क्ते नित्यार्थे","6.2.62::ग्रामः शिल्पिनि","6.2.63::राजा च प्रशंसायाम्","6.2.64:अधिकारः:आदिरुदात्तः","6.2.65::सप्तमीहारिणौ धर्म्येऽहरणे","6.2.66::युक्ते च","6.2.67::विभाषाऽध्यक्षे","6.2.68::पापं च शिल्पिनि","6.2.69::गोत्रान्तेवासिमाणवब्राह्मणेषु क्षेपे","6.2.70::अङ्गानि मैरेये","6.2.71::भक्ताख्यास्तदर्थेषु","6.2.72::गोबिडालसिंहसैन्धवेषूपमाने","6.2.73::अके जीविकाऽर्थे","6.2.74::प्राचां क्रीडायाम्","6.2.75::अणि नियुक्ते","6.2.76::शिल्पिनि चाकृञः","6.2.77::संज्ञायां च","6.2.78::गोतन्तियवं पाले","6.2.79::णिनि","6.2.80::उपमानं शब्दार्थप्रकृतावेव","6.2.81::युक्तारोह्यादयश्च","6.2.82::दीर्घकाशतुषभ्राष्ट्रवटं जे","6.2.83::अन्त्यात्‌ पूर्वं बह्वचः","6.2.84::ग्रामेऽनिवसन्तः","6.2.85::घोषादिषु","6.2.86::छात्र्यादयः शालायाम्","6.2.87::प्रस्थेऽवृद्धमकर्क्यादीनाम्‌","6.2.88::मालाऽऽदीनां च","6.2.89::अमहन्नवं नगरेऽनुदीचाम्","6.2.90::अर्मे चावर्णं द्व्यच्त्र्यच्","6.2.91::न भूताधिकसंजीवमद्राश्मकज्जलम्","6.2.92:अधिकारः:अन्तः","6.2.93::सर्वं गुणकार्त्स्न्ये","6.2.94::संज्ञायां गिरिनिकाययोः","6.2.95::कुमार्यां वयसि","6.2.96::उदकेऽकेवले","6.2.97::द्विगौ क्रतौ","6.2.98::सभायां नपुंसके","6.2.99::पुरे प्राचाम्","6.2.100::अरिष्टगौडपूर्वे च","6.2.101::न हास्तिनफलकमार्देयाः","6.2.102::कुसूलकूपकुम्भशालं बिले","6.2.103::दिक्‌शब्दा ग्रामजनपदाख्यानचानराटेषु","6.2.104::आचार्योपसर्जनश्चान्तेवासिनि","6.2.105::उत्तरपदवृद्धौ सर्वं च","6.2.106::बहुव्रीहौ विश्वं संज्ञयाम्","6.2.107::उदराश्वेषुषु","6.2.108::क्षेपे","6.2.109::नदी बन्धुनि","6.2.110::निष्ठोपसर्गपूर्वमन्यतरस्याम्‌","6.2.111:अधिकारः:उत्तरपदादिः","6.2.112::कर्णो वर्णलक्षणात्‌","6.2.113::संज्ञौपम्ययोश्च","6.2.114::कण्ठपृष्ठग्रीवाजंघं च","6.2.115::शृङ्गमवस्थायां च","6.2.116::नञो जरमरमित्रमृताः","6.2.117::सोर्मनसी अलोमोषसी","6.2.118::क्रत्वादयश्च","6.2.119::आद्युदात्तं द्व्यच् छन्दसि","6.2.120::वीरवीर्यौ च","6.2.121::कूलतीरतूलमूलशालाऽक्षसममव्ययीभावे","6.2.122::कंसमन्थशूर्पपाय्यकाण्डं द्विगौ","6.2.123::तत्पुरुषे शालायां नपुंसके","6.2.124::कन्था च","6.2.125::आदिश्चिहणादीनाम्","6.2.126::चेलखेटकटुककाण्डं गर्हायाम्","6.2.127::चीरमुपमानम्‌","6.2.128::पललसूपशाकं मिश्रे","6.2.129::कूलसूदस्थलकर्षाः संज्ञायाम्","6.2.130::अकर्मधारये राज्यम्","6.2.131::वर्ग्यादयश्च","6.2.132::पुत्रः पुंभ्यः","6.2.133::नाचार्यराजर्त्विक्संयुक्तज्ञात्याख्येभ्यः","6.2.134::चूर्णादीन्यप्राणिषष्ठ्याः","6.2.135::षट् च काण्डादीनि","6.2.136::कुण्डं वनम्","6.2.137::प्रकृत्या भगालम्","6.2.138::शितेर्नित्याबह्वज्बहुव्रीहावभसत्‌","6.2.139::गतिकारकोपपदात्‌ कृत्‌","6.2.140::उभे वनस्पत्यादिषु युगपत्‌","6.2.141::देवताद्वंद्वे च","6.2.142::नोत्तरपदेऽनुदात्तादावपृथिवीरुद्रपूषमन्थिषु","6.2.143:अधिकारः:अन्तः","6.2.144::थाथघञ्क्ताजबित्रकाणाम्","6.2.145::सूपमानात्‌ क्तः","6.2.146::संज्ञायामनाचितादीनाम्‌","6.2.147::प्रवृद्धादीनां च","6.2.148::कारकाद्दत्तश्रुतयोरेवाशिषि","6.2.149::इत्थम्भूतेन कृतमिति च","6.2.150::अनो भावकर्मवचनः","6.2.151::मन्क्तिन्व्याख्यानशयनासनस्थानयाजकादिक्रीताः","6.2.152::सप्तम्याः पुण्यम्","6.2.153::ऊनार्थकलहं तृतीयायाः","6.2.154::मिश्रं चानुपसर्गमसंधौ","6.2.155::नञो गुणप्रतिषेधे सम्पाद्यर्हहितालमर्थास्तद्धिताः","6.2.156::ययतोश्चातदर्थे","6.2.157::अच्कावशक्तौ","6.2.158::आक्रोशे च","6.2.159::संज्ञायाम्","6.2.160::कृत्योकेष्णुच्चार्वादयश्च","6.2.161::विभाषा तृन्नन्नतीक्ष्णशुचिषु","6.2.162::बहुव्रीहाविदमेतत्तद्भ्यः प्रथमपूरणयोः क्रियागणने","6.2.163::संख्यायाः स्तनः","6.2.164::विभाषा छन्दसि","6.2.165::संज्ञायां मित्राजिनयोः","6.2.166::व्यवायिनोऽन्तरम्","6.2.167::मुखं स्वाङ्गम्","6.2.168::नाव्ययदिक्‌शब्दगोमहत्स्थूलमुष्टिपृथुवत्सेभ्यः","6.2.169::निष्ठोपमानादन्यतरस्याम्","6.2.170::जातिकालसुखादिभ्योऽनाच्छादनात्‌ क्तोऽकृतमितप्रतिपन्नाः","6.2.171::वा जाते","6.2.172::नञ्सुभ्याम्","6.2.173::कपि पूर्वम्","6.2.174::ह्रस्वान्तेऽन्त्यात्‌ पूर्वम्","6.2.175::बहोर्नञ्वदुत्तरपदभूम्नि","6.2.176::न गुणादयोऽवयवाः","6.2.177::उपसर्गात्‌ स्वाङ्गं ध्रुवमपर्शु","6.2.178::वनं समासे","6.2.179::अन्तः","6.2.180::अन्तश्च","6.2.181::न निविभ्याम्","6.2.182::परेरभितोभाविमण्डलम्","6.2.183::प्रादस्वाङ्गं संज्ञायाम्","6.2.184::निरुदकादीनि च","6.2.185::अभेर्मुखम्","6.2.186::अपाच्च","6.2.187::स्फिगपूतवीणाऽञ्जोऽध्वकुक्षिसीरनामनाम च","6.2.188::अधेरुपरिस्थम्","6.2.189::अनोरप्रधानकनीयसी","6.2.190::पुरुषश्चान्वादिष्टः","6.2.191::अतेरकृत्पदे","6.2.192::नेरनिधाने","6.2.193::प्रतेरंश्वादयस्तत्पुरुषे","6.2.194::उपाद् द्व्यजजिनमगौरादयः","6.2.195::सोरवक्षेपणे","6.2.196::विभाषोत्पुच्छे","6.2.197::द्वित्रिभ्यां पाद्दन्मूर्धसु बहुव्रीहौ","6.2.198::सक्थं चाक्रान्तात्‌","6.2.199::परादिश्छन्दसि बहुलम्","6.3.1::अलुगुत्तरपदे","6.3.2::पञ्चम्याः स्तोकादिभ्यः","6.3.3::ओजःसहोऽम्भस्तमसः तृतीयायाः","6.3.4::मनसः संज्ञायाम्","6.3.5::आज्ञायिनि च","6.3.6::आत्मनश्च पूरणे","6.3.7::वैयाकरणाख्यायां चतुर्थ्याः","6.3.8::परस्य च","6.3.9::हलदन्तात्‌ सप्तम्याः संज्ञायाम्","6.3.10::कारनाम्नि च प्राचां हलादौ","6.3.11::मध्याद्गुरौ","6.3.12::अमूर्धमस्तकात्‌ स्वाङ्गादकामे","6.3.13::बन्धे च विभाषा","6.3.14::तत्पुरुषे कृति बहुलम्","6.3.15::प्रावृट्शरत्कालदिवां जे","6.3.16::विभाषा वर्षक्षरशरवरात्‌","6.3.17::घकालतनेषु कालनाम्नः","6.3.18::शयवासवासिषु अकालात्‌","6.3.19::नेन्सिद्धबध्नातिषु","6.3.20::स्थे च भाषायाम्","6.3.21::षष्ठ्या आक्रोशे","6.3.22::पुत्रेऽन्यतरस्याम्","6.3.23::ऋतो विद्यायोनिसम्बन्धेभ्यः","6.3.24::विभाषा स्वसृपत्योः","6.3.25::आनङ् ऋतो द्वंद्वे","6.3.26::देवताद्वंद्वे च","6.3.27::ईदग्नेः सोमवरुणयोः","6.3.28::इद्वृद्धौ","6.3.29::दिवो द्यावा","6.3.30::दिवसश्च पृथिव्याम्","6.3.31::उषासोषसः","6.3.32::मातरपितरावुदीचाम्","6.3.33::पितरामातरा च च्छन्दसि","6.3.34:अतिदेशः:स्त्रियाः पुंवद्भाषितपुंस्कादनूङ् समानाधिकरणे स्त्रियामपूरणीप्रियाऽऽदिषु","6.3.35:अतिदेशः:तसिलादिषु आकृत्वसुचः","6.3.36:अतिदेशः:क्यङ्मानिनोश्च","6.3.37:अतिदेशः:न कोपधायाः","6.3.38:अतिदेशः:संज्ञापूरण्योश्च","6.3.39:अतिदेशः:वृद्धिनिमित्तस्य च तद्धितस्यारक्तविकारे","6.3.40:अतिदेशः:स्वाङ्गाच्चेतोऽमानिनि","6.3.41:अतिदेशः:जातेश्च","6.3.42:अतिदेशः:पुंवत्‌ कर्मधारयजातीयदेशीयेषु","6.3.43::घरूपकल्पचेलड्ब्रुवगोत्रमतहतेषु ङ्योऽनेकाचो ह्रस्वः","6.3.44::नद्याः शेषस्यान्यतरस्याम्","6.3.45::उगितश्च","6.3.46::आन्महतः समानाधिकरणजातीययोः","6.3.47::द्व्यष्टनः संख्यायामबहुव्रीह्यशीत्योः","6.3.48::त्रेस्त्रयः","6.3.49::विभाषा चत्वारिंशत्प्रभृतौ सर्वेषाम्","6.3.50::हृदयस्य हृल्लेखयदण्लासेषु","6.3.51::वा शोकष्यञ्रोगेषु","6.3.52::पादस्य पदाज्यातिगोपहतेषु","6.3.53::पद् यत्यतदर्थे","6.3.54::हिमकाषिहतिषु च","6.3.55::ऋचः शे","6.3.56::वा घोषमिश्रशब्देषु","6.3.57::उदकस्योदः संज्ञायाम्","6.3.58::पेषंवासवाहनधिषु च","6.3.59::एकहलादौ पूरयितव्येऽन्यतरस्याम्","6.3.60::मन्थौदनसक्तुबिन्दुवज्रभारहारवीवधगाहेषु च","6.3.61::इको ह्रस्वोऽङ्यो गालवस्य","6.3.62::एक तद्धिते च","6.3.63::ङ्यापोः संज्ञाछन्दसोर्बहुलम्","6.3.64::त्वे च","6.3.65::इष्टकेषीकामालानां चिततूलभारिषु","6.3.66::खित्यनव्ययस्य","6.3.67::अरुर्द्विषदजन्तस्य मुम्","6.3.68:अतिदेशः:इच एकाचोऽम्प्रत्ययवच्च","6.3.69::वाचंयमपुरंदरौ च","6.3.70::कारे सत्यागदस्य","6.3.71::श्येनतिलस्य पाते ञे","6.3.72::रात्रेः कृति विभाषा","6.3.73::नलोपो नञः","6.3.74::तस्मान्नुडचि","6.3.75::नभ्राण्नपान्नवेदानासत्यानमुचिनकुलनखनपुंसकनक्षत्रनक्रनाकेषु प्रकृत्या","6.3.76::एकादिश्चैकस्य चादुक्","6.3.77::नगोऽप्राणिष्वन्यतरस्याम्","6.3.78::सहस्य सः संज्ञायाम्","6.3.79::ग्रन्थान्ताधिके च","6.3.80::द्वितीये चानुपाख्ये","6.3.81::अव्ययीभावे चाकाले","6.3.82::वोपसर्जनस्य","6.3.83::प्रकृत्याऽऽशिष्यगोवत्सहलेषु","6.3.84::समानस्य छन्दस्यमूर्धप्रभृत्युदर्केषु","6.3.85::ज्योतिर्जनपदरात्रिनाभिनामगोत्ररूपस्थानवर्णवयोवचनबन्धुषु","6.3.86::चरणे ब्रह्मचारिणि","6.3.87::तीर्थे ये","6.3.88::विभाषोदरे","6.3.89::दृग्दृशवतुषु","6.3.90::इदङ्किमोरीश्की","6.3.91::आ सर्वनाम्नः","6.3.92::विष्वग्देवयोश्च टेरद्र्यञ्चतौ वप्रत्यये","6.3.93::समः समि","6.3.94::तिरसस्तिर्यलोपे","6.3.95::सहस्य सध्रिः","6.3.96::सध मादस्थयोश्छन्दसि","6.3.97::द्व्यन्तरुपसर्गेभ्योऽप ईत्‌","6.3.98::ऊदनोर्देशे","6.3.99::अषष्ठ्यतृतीयास्थस्यान्यस्य दुगाशिराशाऽऽस्थाऽऽस्थितोत्सुकोतिकारकरागच्छेषु","6.3.100::अर्थे विभाषा","6.3.101::कोः कत्‌ तत्पुरुषेऽचि","6.3.102::रथवदयोश्च","6.3.103::तृणे च जातौ","6.3.104::का पथ्यक्षयोः","6.3.105::ईषदर्थे","6.3.106::विभाषा पुरुषे","6.3.107::कवं चोष्णे","6.3.108::पथि च च्छन्दसि","6.3.109::पृषोदरादीनि यथोपदिष्टम्","6.3.110::संख्याविसायपूर्वस्याह्नस्याहन्नन्यतरस्यां ङौ","6.3.111::ढ्रलोपे पूर्वस्य दीर्घोऽणः","6.3.112::सहिवहोरोदवर्णस्य","6.3.113::साढ्यै साढ्वा साढेति निगमे","6.3.114:अधिकारः:संहितायाम्","6.3.115::कर्णे लक्षणस्याविष्टाष्टपञ्चमणिभिन्नछिन्नछिद्रस्रुवस्वस्तिकस्य","6.3.116::नहिवृतिवृषिव्यधिरुचिसहितनिषु क्वौ","6.3.117::वनगिर्योः संज्ञायां कोटरकिंशुलकादीनाम्","6.3.118::वले","6.3.119::मतौ बह्वचोऽनजिरादीनाम्","6.3.120::शरादीनां च","6.3.121::इकः वहे अपीलोः","6.3.122::उपसर्गस्य घञ्यमनुष्ये बहुलम्","6.3.123::इकः काशे","6.3.124::दस्ति","6.3.125::अष्टनः संज्ञायाम्","6.3.126::छन्दसि च","6.3.127::चितेः कपि","6.3.128::विश्वस्य वसुराटोः","6.3.129::नरे संज्ञायाम्","6.3.130::मित्रे चर्षौ","6.3.131::मन्त्रे सोमाश्वेन्द्रियविश्वदेव्यस्य मतौ","6.3.132::ओषधेश्च विभक्तावप्रथमायाम्","6.3.133::ऋचि तुनुघमक्षुतङ्कुत्रोरुष्याणाम्","6.3.134::इकः सुञि","6.3.135::द्व्यचोऽतस्तिङः","6.3.136::निपातस्य च","6.3.137::अन्येषामपि दृश्यते","6.3.138::चौ","6.3.139::सम्प्रसारणस्य","6.4.1:अधिकारः:अङ्गस्य","6.4.2::हलः","6.4.3::नामि","6.4.4::न तिसृचतसृ","6.4.5::छन्दस्युभयथा","6.4.6::नृ च","6.4.7::नोपधायाः","6.4.8::सर्वनामस्थाने चासम्बुद्धौ","6.4.9::वा षपूर्वस्य निगमे","6.4.10::सान्तमहतः संयोगस्य","6.4.11::अप्तृन्तृच्स्वसृनप्तृनेष्टृत्वष्टृक्षत्तृहोतृपोतृप्रशास्तॄणाम्","6.4.12::इन्हन्पूषार्यम्णां शौ","6.4.13::सौ च","6.4.14::अत्वसन्तस्य चाधातोः","6.4.15::अनुनासिकस्य क्विझलोः क्ङिति","6.4.16::अज्झनगमां सनि","6.4.17::तनोतेर्विभाषा","6.4.18::क्रमश्च क्त्वि","6.4.19::च्छ्वोः शूडनुनासिके च","6.4.20::ज्वरत्वरश्रिव्यविमवामुपधायाश्च","6.4.21::राल्लोपः","6.4.22:अतिदेशः; अधिकारः:असिद्धवदत्राभात्‌","6.4.23:अतिदेशः:श्नान्नलोपः","6.4.24:अतिदेशः:अनिदितां हल उपधायाः क्ङिति","6.4.25:अतिदेशः:दन्शसञ्जस्वञ्जां शपि","6.4.26:अतिदेशः:रञ्जेश्च","6.4.27:अतिदेशः:घञि च भावकरणयोः","6.4.28:अतिदेशः:स्यदो जवे","6.4.29:अतिदेशः:अवोदैधौद्मप्रश्रथहिमश्रथाः","6.4.30:अतिदेशः:नाञ्चेः पूजायाम्","6.4.31:अतिदेशः:क्त्वि स्कन्दिस्यन्दोः","6.4.32:अतिदेशः:जान्तनशां विभाषा","6.4.33:अतिदेशः:भञ्जेश्च चिणि","6.4.34:अतिदेशः:शास इदङ्हलोः","6.4.35:अतिदेशः:शा हौ","6.4.36:अतिदेशः:हन्तेर्जः","6.4.37:अतिदेशः:अनुदात्तोपदेशवनतितनोत्यादीनामनुनासिकलोपो झलि क्ङिति","6.4.38:अतिदेशः:वा ल्यपि","6.4.39:अतिदेशः:न क्तिचि दीर्घश्च","6.4.40:अतिदेशः:गमः क्वौ","6.4.41:अतिदेशः:विड्वनोरनुनासिकस्यात्‌","6.4.42:अतिदेशः:जनसनखनां सञ्झलोः","6.4.43:अतिदेशः:ये विभाषा","6.4.44:अतिदेशः:तनोतेर्यकि","6.4.45:अतिदेशः:सनः क्तिचि लोपश्चास्यान्यतरस्याम्","6.4.46:अतिदेशः; अधिकारः:आर्धधातुके","6.4.47:अतिदेशः:भ्रस्जो रोपधयोः रमन्यतरस्याम्‌","6.4.48:अतिदेशः:अतो लोपः","6.4.49:अतिदेशः:यस्य हलः","6.4.50:अतिदेशः:क्यस्य विभाषा","6.4.51:अतिदेशः:णेरनिटि","6.4.52:अतिदेशः:निष्ठायां सेटि","6.4.53:अतिदेशः:जनिता मन्त्रे","6.4.54:अतिदेशः:शमिता यज्ञे","6.4.55:अतिदेशः:अयामन्ताल्वाय्येत्न्विष्णुषु","6.4.56:अतिदेशः:ल्यपि लघुपूर्वात्‌","6.4.57:अतिदेशः:विभाषाऽऽपः","6.4.58:अतिदेशः:युप्लुवोर्दीर्घश्छन्दसि","6.4.59:अतिदेशः:क्षियः","6.4.60:अतिदेशः:निष्ठायां अण्यदर्थे","6.4.61:अतिदेशः:वाऽऽक्रोशदैन्ययोः","6.4.62:अतिदेशः:स्यसिच्सीयुट्तासिषु भावकर्मणोरुपदेशेऽज्झनग्रहदृशां वा चिण्वदिट् च","6.4.63:अतिदेशः:दीङो युडचि क्ङिति","6.4.64:अतिदेशः:आतो लोप इटि च","6.4.65:अतिदेशः:ईद्यति","6.4.66:अतिदेशः:घुमास्थागापाजहातिसां हलि","6.4.67:अतिदेशः:एर्लिङि","6.4.68:अतिदेशः:वाऽन्यस्य संयोगादेः","6.4.69:अतिदेशः:न ल्यपि","6.4.70:अतिदेशः:मयतेरिदन्यतरस्याम्","6.4.71:अतिदेशः:लुङ्लङ्लृङ्क्ष्वडुदात्तः","6.4.72:अतिदेशः:आडजादीनाम्","6.4.73:अतिदेशः:छन्दस्यपि दृश्यते","6.4.74:अतिदेशः:न माङ्योगे","6.4.75:अतिदेशः:बहुलं छन्दस्यमाङ्योगेऽपि","6.4.76:अतिदेशः:इरयो रे","6.4.77:अतिदेशः:अचि श्नुधातुभ्रुवां य्वोरियङुवङौ","6.4.78:अतिदेशः:अभ्यासस्यासवर्णे","6.4.79:अतिदेशः:स्त्रियाः","6.4.80:अतिदेशः:वाऽम्शसोः","6.4.81:अतिदेशः:इणो यण्","6.4.82:अतिदेशः:एरनेकाचोऽसंयोगपूर्वस्य","6.4.83:अतिदेशः:ओः सुपि","6.4.84:अतिदेशः:वर्षाभ्वश्च","6.4.85:अतिदेशः:न भूसुधियोः","6.4.86:अतिदेशः:छन्दस्युभयथा","6.4.87:अतिदेशः:हुश्नुवोः सार्वधातुके","6.4.88:अतिदेशः:भुवो वुग्लुङ्लिटोः","6.4.89:अतिदेशः:ऊदुपधाया गोहः","6.4.90:अतिदेशः:दोषो णौ","6.4.91:अतिदेशः:वा चित्तविरागे","6.4.92:अतिदेशः:मितां ह्रस्वः","6.4.93:अतिदेशः:चिण्णमुलोर्दीर्घोऽन्यतरस्याम्","6.4.94:अतिदेशः:खचि ह्रस्वः","6.4.95:अतिदेशः:ह्लादो निष्ठायाम्","6.4.96:अतिदेशः:छादेर्घेऽद्व्युपसर्गस्य","6.4.97:अतिदेशः:इस्मन्त्रन्क्विषु च","6.4.98:अतिदेशः:गमहनजनखनघसां लोपः क्ङित्यनङि","6.4.99:अतिदेशः:तनिपत्योश्छन्दसि","6.4.100:अतिदेशः:घसिभसोर्हलि च","6.4.101:अतिदेशः:हुझल्भ्यो हेर्धिः","6.4.102:अतिदेशः:श्रुशृणुपॄकृवृभ्यश्छन्दसि","6.4.103:अतिदेशः:अङितश्च","6.4.104:अतिदेशः:चिणो लुक्","6.4.105:अतिदेशः:अतो हेः","6.4.106:अतिदेशः:उतश्च प्रत्ययादसंयोगपूर्वात्‌","6.4.107:अतिदेशः:लोपश्चास्यान्यतरस्यां म्वोः","6.4.108:अतिदेशः:नित्यं करोतेः","6.4.109:अतिदेशः:ये च","6.4.110:अतिदेशः:अत उत्‌ सार्वधातुके","6.4.111:अतिदेशः:श्नसोरल्लोपः","6.4.112:अतिदेशः:श्नाऽभ्यस्तयोरातः","6.4.113:अतिदेशः:ई हल्यघोः","6.4.114:अतिदेशः:इद्दरिद्रस्य","6.4.115:अतिदेशः:भियोऽन्यतरस्याम्","6.4.116:अतिदेशः:जहातेश्च","6.4.117:अतिदेशः:आ च हौ","6.4.118:अतिदेशः:लोपो यि","6.4.119:अतिदेशः:घ्वसोरेद्धावभ्यासलोपश्च","6.4.120:अतिदेशः:अत एकहल्मध्येऽनादेशादेर्लिटि","6.4.121:अतिदेशः:थलि च सेटि","6.4.122:अतिदेशः:तॄफलभजत्रपश्च","6.4.123:अतिदेशः:राधो हिंसायाम्","6.4.124:अतिदेशः:वा जॄभ्रमुत्रसाम्","6.4.125:अतिदेशः:फणां च सप्तानाम्","6.4.126:अतिदेशः:न शसददवादिगुणानाम्","6.4.127:अतिदेशः:अर्वणस्त्रसावनञः","6.4.128:अतिदेशः:मघवा बहुलम्","6.4.129:अतिदेशः; अधिकारः:भस्य","6.4.130:अतिदेशः:पादः पत्","6.4.131:अतिदेशः:वसोः सम्प्रसारणम्","6.4.132:अतिदेशः:वाह ऊठ्","6.4.133:अतिदेशः:श्वयुवमघोनामतद्धिते","6.4.134:अतिदेशः:अल्लोपोऽनः","6.4.135:अतिदेशः:षपूर्वहन्धृतराज्ञामणि","6.4.136:अतिदेशः:विभाषा ङिश्योः","6.4.137:अतिदेशः:न संयोगाद्वमन्तात्‌","6.4.138:अतिदेशः:अचः","6.4.139:अतिदेशः:उद ईत्‌","6.4.140:अतिदेशः:आतो धातोः","6.4.141:अतिदेशः:मन्त्रेष्वाङ्यादेरात्मनः","6.4.142:अतिदेशः:ति विंशतेर्डिति","6.4.143:अतिदेशः:टेः","6.4.144:अतिदेशः:नस्तद्धिते","6.4.145:अतिदेशः:अह्नष्टखोरेव","6.4.146:अतिदेशः:ओर्गुणः","6.4.147:अतिदेशः:ढे लोपोऽकद्र्वाः","6.4.148:अतिदेशः:यस्येति च","6.4.149:अतिदेशः:सूर्यतिष्यागस्त्यमत्स्यानां य उपधायाः","6.4.150:अतिदेशः:हलस्तद्धितस्य","6.4.151:अतिदेशः:आपत्यस्य च तद्धितेऽनाति","6.4.152:अतिदेशः:क्यच्व्योश्च","6.4.153:अतिदेशः:बिल्वकादिभ्यश्छस्य लुक्","6.4.154:अतिदेशः:तुरिष्ठेमेयस्सु","6.4.155:अतिदेशः:टेः","6.4.156:अतिदेशः:स्थूलदूरयुवह्रस्वक्षिप्रक्षुद्राणां यणादिपरं पूर्वस्य च गुणः","6.4.157:अतिदेशः:प्रियस्थिरस्फिरोरुबहुलगुरुवृद्धतृप्रदीर्घवृन्दारकाणां प्रस्थस्फवर्बंहिगर्वर्षित्रब्द्राघिवृन्दाः","6.4.158:अतिदेशः:बहोर्लोपो भू च बहोः","6.4.159:अतिदेशः:इष्ठस्य यिट् च","6.4.160:अतिदेशः:ज्यादादीयसः","6.4.161:अतिदेशः:र ऋतो हलादेर्लघोः","6.4.162:अतिदेशः:विभाषर्जोश्छन्दसि","6.4.163:अतिदेशः:प्रकृत्यैकाच्","6.4.164:अतिदेशः:इनण्यनपत्ये","6.4.165:अतिदेशः:गाथिविदथिकेशिगणिपणिनश्च","6.4.166:अतिदेशः:संयोगादिश्च","6.4.167:अतिदेशः:अन्","6.4.168:अतिदेशः:ये चाभावकर्मणोः","6.4.169:अतिदेशः:आत्माध्वानौ खे","6.4.170:अतिदेशः:न मपूर्वोऽपत्येऽवर्मणः","6.4.171:अतिदेशः:ब्राह्मोअजातौ","6.4.172:अतिदेशः:कार्मस्ताच्छील्ये","6.4.173:अतिदेशः:औक्षमनपत्ये","6.4.174:अतिदेशः:दाण्डिनायनहास्तिनायनाथर्वणिकजैह्माशिनेयवाशिनायनिभ्रौणहत्यधैवत्यसारवैक्ष्वाकमैत्रेयहिरण्मयानि","6.4.175:अतिदेशः:ऋत्व्यवास्त्व्यवास्त्वमाध्वीहिरण्ययानि च्छन्दसि","7.1.1::युवोरनाकौ","7.1.2::आयनेयीनीयियः फढखच्छघां प्रत्ययादीनाम्‌","7.1.3::झोऽन्तः","7.1.4::अदभ्यस्तात्‌","7.1.5::आत्मनेपदेष्वनतः","7.1.6::शीङो रुट्","7.1.7::वेत्तेर्विभाषा","7.1.8::बहुलं छन्दसि","7.1.9::अतो भिस ऐस्","7.1.10::बहुलं छन्दसि","7.1.11::नेदमदसोरकोः","7.1.12::टाङसिङसामिनात्स्याः","7.1.13::ङेर्यः","7.1.14::सर्वनाम्नः स्मै","7.1.15::ङसिङ्योः स्मात्स्मिनौ","7.1.16::पूर्वादिभ्यो नवभ्यो वा","7.1.17::जसः शी","7.1.18::औङ आपः","7.1.19::नपुंसकाच्च","7.1.20::जश्शसोः शिः","7.1.21::अष्टाभ्य औश्","7.1.22::षड्भ्यो लुक्","7.1.23::स्वमोर्नपुंसकात्‌","7.1.24::अतोऽम्","7.1.25::अद्ड् डतरादिभ्यः पञ्चभ्यः","7.1.26::नेतराच्छन्दसि","7.1.27::युष्मदस्मद्भ्यां ङसोऽश्","7.1.28::ङे प्रथमयोरम्","7.1.29::शसो न","7.1.30::भ्यसो भ्यम्","7.1.31::पञ्चम्या अत्‌","7.1.32::एकवचनस्य च","7.1.33::साम आकम्","7.1.34::आत औ णलः","7.1.35::तुह्योस्तातङाशिष्यन्यतरस्याम्","7.1.36::विदेः शतुर्वसुः","7.1.37::समासेऽनञ्पूर्वे क्त्वो ल्यप्‌","7.1.38::क्त्वाऽपि छन्दसि","7.1.39::सुपां सुलुक्पूर्वसवर्णाऽऽच्छेयाडाड्यायाजालः","7.1.40::अमो मश्","7.1.41::लोपस्त आत्मनेपदेषु","7.1.42::ध्वमो ध्वात्‌","7.1.43::यजध्वैनमिति च","7.1.44::तस्य तात्‌","7.1.45::तप्तनप्तनथनाश्च","7.1.46::इदन्तो मसि","7.1.47::क्त्वो यक्","7.1.48::इष्ट्वीनमिति च","7.1.49::स्नात्व्यादयश्च","7.1.50::आज्जसेरसुक्","7.1.51::अश्वक्षीरवृषलवणानामात्मप्रीतौ क्यचि","7.1.52::आमि सर्वनाम्नः सुट्","7.1.53::त्रेस्त्रयः","7.1.54::ह्रस्वनद्यापो नुट्","7.1.55::षट्चतुर्भ्यश्च","7.1.56::श्रीग्रामण्योश्छन्दसि","7.1.57::गोः पादान्ते","7.1.58::इदितो नुम् धातोः","7.1.59::शे मुचादीनाम्","7.1.60::मस्जिनशोर्झलि","7.1.61::रधिजभोरचि","7.1.62::नेट्यलिटि रधेः","7.1.63::रभेरशब्लिटोः","7.1.64::लभेश्च","7.1.65::आङो यि","7.1.66::उपात्‌ प्रशंसायाम्","7.1.67::उपसर्गात्‌ खल्घञोः","7.1.68::न सुदुर्भ्यां केवलाभ्याम्","7.1.69::विभाषा चिण्णमुलोः","7.1.70::उगिदचां सर्वनामस्थानेऽधातोः","7.1.71::युजेरसमासे","7.1.72::नपुंसकस्य झलचः","7.1.73::इकोऽचि विभक्तौ","7.1.74::तृतीयाऽऽदिषु भाषितपुंस्कं पुंवद्गालवस्य","7.1.75::अस्थिदधिसक्थ्यक्ष्णामनङुदात्तः","7.1.76::छन्दस्यपि दृश्यते","7.1.77::ई च द्विवचने","7.1.78::नाभ्यस्ताच्छतुः","7.1.79::वा नपुंसकस्य","7.1.80::आच्छीनद्योर्नुम्","7.1.81::शप्श्यनोर्नित्यम्","7.1.82::सावनडुहः","7.1.83::दृक्स्ववस्स्वतवसां छन्दसि","7.1.84::दिव औत्‌","7.1.85::पथिमथ्यृभुक्षामात्‌","7.1.86::इतोऽत्‌ सर्वनामस्थाने","7.1.87::थो न्थः","7.1.88::भस्य टेर्लोपः","7.1.89::पुंसोऽसुङ्","7.1.90:अतिदेशः:गोतो णित्‌","7.1.91:अतिदेशः:णलुत्तमो वा","7.1.92:अतिदेशः:सख्युरसम्बुद्धौ","7.1.93::अनङ् सौ","7.1.94::ऋदुशनस्पुरुदंसोऽनेहसां च","7.1.95:अतिदेशः:तृज्वत्‌ क्रोष्टुः","7.1.96::स्त्रियां च","7.1.97::विभाषा तृतीयाऽऽदिष्वचि","7.1.98::चतुरनडुहोरामुदात्तः","7.1.99::अम् सम्बुद्धौ","7.1.100::ॠत इद्धातोः","7.1.101::उपधायाश्च","7.1.102::उदोष्ठ्यपूर्वस्य","7.1.103::बहुलं छन्दसि","7.2.1::सिचि वृद्धिः परस्मैपदेषु","7.2.2::अतो र्लान्तस्य","7.2.3::वदव्रजहलन्तस्याचः","7.2.4::नेटि","7.2.5::ह्म्यन्तक्षणश्वसजागृणिश्व्येदिताम्","7.2.6::ऊर्णोतेर्विभाषा","7.2.7::अतो हलादेर्लघोः","7.2.8::नेड् वशि कृति","7.2.9::तितुत्रतथसिसुसरकसेषु च","7.2.10::एकाच उपदेशेऽनुदात्तात्‌","7.2.11::श्र्युकः किति","7.2.12::सनि ग्रहगुहोश्च","7.2.13::कृसृभृवृस्तुद्रुस्रुश्रुवो लिटि","7.2.14::श्वीदितो निष्ठायाम्","7.2.15::यस्य विभाषा","7.2.16::आदितश्च","7.2.17::विभाषा भावादिकर्मणोः","7.2.18::क्षुब्धस्वान्तध्वान्तलग्नम्लिष्टविरिब्धफाण्टबाढानि मन्थमनस्तमःसक्ताविस्पष्टस्वरानायासभृशेषु","7.2.19:अधिकारः:धृषिशसी वैयात्ये","7.2.20::दृढः स्थूलबलयोः","7.2.21::प्रभौ परिवृढः","7.2.22::कृच्छ्रगहनयोः कषः","7.2.23::घुषिरविशब्दने","7.2.24::अर्देः संनिविभ्यः","7.2.25::अभेश्चाविदूर्ये","7.2.26::णेरध्ययने वृत्तम्","7.2.27::वा दान्तशान्तपूर्णदस्तस्पष्टच्छन्नज्ञप्ताः","7.2.28::रुष्यमत्वरसंघुषास्वनाम्","7.2.29::हृषेर्लोमसु","7.2.30::अपचितश्च","7.2.31::ह्रु ह्वरेश्छन्दसि","7.2.32::अपरिह्वृताश्च","7.2.33::सोमे ह्वरितः","7.2.34::ग्रसितस्कभितस्तभितोत्तभितचत्तविकस्तविशस्तॄशंस्तृशास्तृतरुतृतरूतृवरुतृवरूतृवरुत्रीरुज्ज्वलितिक्षरितिक्षमितिवमित्यमितीति च","7.2.35::आर्धधातुकस्येड् वलादेः","7.2.36::स्नुक्रमोरनात्मनेपदनिमित्ते","7.2.37::ग्रहोऽलिटि दीर्घः","7.2.38::वॄतो वा","7.2.39::न लिङि","7.2.40::सिचि च परस्मैपदेषु","7.2.41::इट् सनि वा","7.2.42::लिङ्सिचोरात्मनेपदेषु","7.2.43::ऋतश्च संयोगादेः","7.2.44::स्वरतिसूतिसूयतिधूञूदितो वा","7.2.45::रधादिभ्यश्च","7.2.46::निरः कुषः","7.2.47::इण्निष्ठायाम्","7.2.48::तीषसहलुभरुषरिषः","7.2.49::सनीवन्तर्धभ्रस्जदम्भुश्रिस्वृयूर्णुभरज्ञपिसनाम्","7.2.50::क्लिशः क्त्वानिष्ठयोः","7.2.51::पूङश्च","7.2.52::वसतिक्षुधोरिट्","7.2.53::अञ्चेः पूजायाम्","7.2.54::लुभो विमोचने","7.2.55::जॄव्रश्च्योः क्त्वि","7.2.56::उदितो वा","7.2.57::सेऽसिचि कृतचृतच्छृदतृदनृतः","7.2.58::गमेरिट् परस्मैपदेषु","7.2.59::न वृद्भ्यश्चतुर्भ्यः","7.2.60::तासि च कॢपः","7.2.61::अचस्तास्वत्‌ थल्यनिटो नित्यम्","7.2.62::उपदेशेऽत्वतः","7.2.63::ऋतो भारद्वाजस्य","7.2.64::बभूथाततन्थजगृम्भववर्थेति निगमे","7.2.65::विभाषा सृजिदृषोः","7.2.66::इडत्त्यर्तिव्ययतीनाम्","7.2.67::वस्वेकाजाद्घसाम्","7.2.68::विभाषा गमहनविदविशाम्","7.2.69::सनिंससनिवांसम्","7.2.70::ऋद्धनोः स्ये","7.2.71::अञ्जेः सिचि","7.2.72::स्तुसुधूञ्भ्यः परस्मैपदेषु","7.2.73::यमरमनमातां सक् च","7.2.74::स्मिपूङ्रञ्ज्वशां सनि","7.2.75::किरश्च पञ्चभ्यः","7.2.76::रुदादिभ्यः सार्वधातुके","7.2.77::ईशः से","7.2.78::ईडजनोर्ध्वे च","7.2.79::लिङः सलोपोऽनन्त्यस्य","7.2.80::अतो येयः","7.2.81::आतो ङितः","7.2.82::आने मुक्","7.2.83::ईदासः","7.2.84::अष्टन आ विभक्तौ","7.2.85::रायो हलि","7.2.86::युष्मदस्मदोरनादेशे","7.2.87::द्वितीयायां च","7.2.88::प्रथमायाश्च द्विवचने भाषायाम्","7.2.89::योऽचि","7.2.90::शेषे लोपः","7.2.91::मपर्यन्तस्य","7.2.92::युवावौ द्विवचने","7.2.93::यूयवयौ जसि","7.2.94::त्वाहौ सौ","7.2.95::तुभ्यमह्यौ ङयि","7.2.96::तवममौ ङसि","7.2.97::त्वमावेकवचने","7.2.98::प्रतयोत्तरपदयोश्च","7.2.99::त्रिचतुरोः स्त्रियां तिसृचतसृ","7.2.100::अचि र ऋतः","7.2.101::जराया जरसन्यतरस्याम्","7.2.102::त्यदादीनामः","7.2.103::किमः कः","7.2.104::कु तिहोः","7.2.105::क्वाति","7.2.106::तदोः सः सावनन्त्ययोः","7.2.107::अदस औ सुलोपश्च","7.2.108::इदमो मः","7.2.109::दश्च","7.2.110::यः सौ","7.2.111::इदोऽय् पुंसि","7.2.112::अनाप्यकः","7.2.113::हलि लोपः","7.2.114::मृजेर्वृद्धिः","7.2.115::अचो ञ्णिति","7.2.116::अत उपधायाः","7.2.117::तद्धितेष्वचामादेः","7.2.118::किति च","7.3.1::देविकाशिंशपादित्यवाड्दीर्घसत्रश्रेयसामात्‌","7.3.2::केकयमित्त्रयुप्रलयानां यादेरियः","7.3.3::न य्वाभ्यां पदान्ताभ्याम् पूर्वौ तु ताभ्यामैच्","7.3.4::द्वारादीनां च","7.3.5::न्यग्रोधस्य च केवलस्य","7.3.6::न कर्मव्यतिहारे","7.3.7::स्वागतादीनां च","7.3.8::श्वादेरिञि","7.3.9::पदान्तस्यान्यतरस्याम्","7.3.10:अधिकारः:उत्तरपदस्य","7.3.11::अवयवादृतोः","7.3.12::सुसर्वार्धाज्जनपदस्य","7.3.13::दिशोऽमद्राणाम्","7.3.14::प्राचां ग्रामनगराणाम्","7.3.15::संख्यायाः संवत्सरसंख्यस्य च","7.3.16::वर्षस्याभविष्यति","7.3.17::परिमाणान्तस्यासंज्ञाशाणयोः","7.3.18::जे प्रोष्ठपदानाम्","7.3.19::हृद्भगसिन्ध्वन्ते पूर्वपदस्य च","7.3.20::अनुशतिकादीनां च","7.3.21::देवताद्वंद्वे च","7.3.22::नेन्द्रस्य परस्य","7.3.23::दीर्घाच्च वरुणस्य","7.3.24::प्राचां नगरान्ते","7.3.25::जङ्गलधेनुवलजान्तस्य विभाषितमुत्तरम्‌","7.3.26::अर्धात्‌ परिमाणस्य पूर्वस्य तु वा","7.3.27::नातः परस्य","7.3.28::प्रवाहणस्य ढे","7.3.29::तत्प्रत्ययस्य च","7.3.30::नञः शुचीश्वरक्षेत्रज्ञकुशलनिपुणानाम्","7.3.31::यथातथयथापुरयोः पर्यायेण","7.3.32::हनस्तोऽचिण्णलोः","7.3.33::आतो युक् चिण्कृतोः","7.3.34::नोदात्तोपदेशस्य मान्तस्यानाचमेः","7.3.35::जनिवध्योश्च","7.3.36::अर्त्तिह्रीब्लीरीक्नूयीक्ष्माय्यातां पुङ्णौ","7.3.37::शाच्छासाह्वाव्यावेपां युक्","7.3.38::वो विधूनने जुक्","7.3.39::लीलोर्नुग्लुकावन्यतरस्यां स्नेहविपातने","7.3.40::भियो हेतुभये षुक्","7.3.41::स्फायो वः","7.3.42::शदेरगतौ तः","7.3.43::रुहः पोऽन्यतरस्याम्","7.3.44::प्रत्ययस्थात्‌ कात्‌ पूर्वस्यात इदाप्यसुपः","7.3.45::न यासयोः","7.3.46::उदीचामातः स्थाने यकपूर्वायाः","7.3.47::भस्त्रैषाऽजाज्ञाद्वास्वानञ्पूर्वाणामपि","7.3.48::अभाषितपुंस्काच्च","7.3.49::आदाचार्याणाम्","7.3.50::ठस्येकः","7.3.51::इसुसुक्तान्तात्‌ कः","7.3.52::चजोः कु घिन्ण्यतोः","7.3.53::न्यङ्क्वादीनां च","7.3.54::हो हन्तेर्ञ्णिन्नेषु","7.3.55::अभ्यासाच्च","7.3.56::हेरचङि","7.3.57::सन्लिटोर्जेः","7.3.58::विभाषा चेः","7.3.59::न क्वादेः","7.3.60::अजिवृज्योश्च","7.3.61::भुजन्युब्जौ पाण्युपतापयोः","7.3.62::प्रयाजानुयाजौ यज्ञाङ्गे","7.3.63::वञ्चेर्गतौ","7.3.64::ओक उचः के","7.3.65::ण्य आवश्यके","7.3.66::यजयाचरुचप्रवचर्चश्च","7.3.67::वचोऽशब्दसंज्ञायाम्","7.3.68::प्रयोज्यनियोज्यौ शक्यार्थे","7.3.69::भोज्यं भक्ष्ये","7.3.70::घोर्लोपो लेटि वा","7.3.71::ओतः श्यनि","7.3.72::क्सस्याचि","7.3.73::लुग्वा दुहदिहलिहगुहामात्मनेपदे दन्त्ये","7.3.74::शमामष्टानां दीर्घः श्यनि","7.3.75::ष्ठिवुक्लम्याचमां शिति","7.3.76::क्रमः परस्मैपदेषु","7.3.77::इषुगमियमां छः","7.3.78::पाघ्राध्मास्थाम्नादाण्दृश्यर्त्तिसर्त्तिशदसदां पिबजिघ्रधमतिष्ठमनयच्छपश्यर्च्छधौशीयसीदाः","7.3.79::ज्ञाजनोर्जा","7.3.80::प्वादीनां ह्रस्वः","7.3.81::मीनातेर्निगमे","7.3.82::मिदेर्गुणः","7.3.83::जुसि च","7.3.84::सार्वधातुकार्धधातुकयोः","7.3.85::जाग्रोऽविचिण्णल्ङित्सु","7.3.86::पुगन्तलघूपधस्य च","7.3.87::नाभ्यस्तस्याचि पिति सार्वधातुके","7.3.88::भूसुवोस्तिङि","7.3.89::उतो वृद्धिर्लुकि हलि","7.3.90::ऊर्णोतेर्विभाषा","7.3.91::गुणोऽपृक्ते","7.3.92::तृणह इम्","7.3.93::ब्रुव ईट्","7.3.94::यङो वा","7.3.95::तुरुस्तुशम्यमः सार्वधातुके","7.3.96::अस्तिसिचोऽपृक्ते","7.3.97::बहुलं छन्दसि","7.3.98::रुदश्च पञ्चभ्यः","7.3.99::अड्गार्ग्यगालवयोः","7.3.100::अदः सर्वेषाम्","7.3.101::अतो दीर्घो यञि","7.3.102::सुपि च","7.3.103::बहुवचने झल्येत्‌","7.3.104::ओसि च","7.3.105::आङि चापः","7.3.106::सम्बुद्धौ च","7.3.107::अम्बाऽर्थनद्योर्ह्रस्वः","7.3.108::ह्रस्वस्य गुणः","7.3.109::जसि च","7.3.110::ऋतो ङिसर्वनामस्थानयोः","7.3.111::घेर्ङिति","7.3.112::आण्नद्याः","7.3.113::याडापः","7.3.114::सर्वनाम्नः स्याड्ढ्रस्वश्च","7.3.115::विभाषा द्वितीयातृतीयाभ्याम्","7.3.116::ङेराम्नद्याम्नीभ्यः","7.3.117::इदुद्भ्याम्","7.3.118::औत्‌","7.3.119::अच्च घेः","7.3.120::आङो नाऽस्त्रियाम्","7.4.1::णौ चङ्युपधाया ह्रस्वः","7.4.2::नाग्लोपिशास्वृदिताम्","7.4.3::भ्राजभासभाषदीपजीवमीलपीडामन्यतरस्याम्‌","7.4.4::लोपः पिबतेरीच्चाभ्यासस्य","7.4.5::तिष्ठतेरित्‌","7.4.6::जिघ्रतेर्वा","7.4.7::उर्ऋत्‌","7.4.8::नित्यं छन्दसि","7.4.9::दयतेर्दिगि लिटि","7.4.10::ऋतश्च संयोगादेर्गुणः","7.4.11::ऋच्छत्यॄताम्","7.4.12::शृदॄप्रां ह्रस्वो वा","7.4.13::केऽणः","7.4.14::न कपि","7.4.15::आपोऽन्यतरस्याम्","7.4.16::ऋदृशोऽङि गुणः","7.4.17::अस्यतेस्थुक्","7.4.18::श्वयतेरः","7.4.19::पतः पुम्","7.4.20::वच उम्","7.4.21::शीङः सार्वधातुके गुणः","7.4.22::अयङ् यि क्ङिति","7.4.23::उपसर्गाद्ध्रस्व ऊहतेः","7.4.24::एतेर्लिङि","7.4.25::अकृत्सार्वधातुकयोर्दीर्घः","7.4.26::च्वौ च","7.4.27::रीङ् ऋतः","7.4.28::रिङ् शयग्लिङ्क्षु","7.4.29::गुणोऽर्तिसंयोगाद्योः","7.4.30::यङि च","7.4.31::ई घ्राध्मोः","7.4.32::अस्य च्वौ","7.4.33::क्यचि च","7.4.34::अशनायोदन्यधनाया बुभुक्षापिपासागर्द्धेषु","7.4.35::न च्छन्दस्यपुत्रस्य","7.4.36::दुरस्युर्द्रविणस्युर्वृषण्यतिरिषण्यति","7.4.37::अश्वाघस्यात्‌","7.4.38::देवसुम्नयोर्यजुषि काठके","7.4.39::कव्यध्वरपृतनस्यर्चि लोपः","7.4.40::द्यतिस्यतिमास्थामित्ति किति","7.4.41::शाछोरन्यतरस्याम्","7.4.42::दधातेर्हिः","7.4.43::जहातेश्च क्त्वि","7.4.44::विभाषा छन्दसि","7.4.45::सुधितवसुधितनेमधितधिष्वधिषीय च","7.4.46::दो दद् घोः","7.4.47::अच उपसर्गात्तः","7.4.48::अपो भि","7.4.49::सः स्यार्द्धधातुके","7.4.50::तासस्त्योर्लोपः","7.4.51::रि च","7.4.52::ह एति","7.4.53::यीवर्णयोर्दीधीवेव्योः","7.4.54::सनि मीमाघुरभलभशकपतपदामच इस्","7.4.55::आप्ज्ञप्यृधामीत्‌","7.4.56::दम्भ इच्च","7.4.57::मुचोऽकर्मकस्य गुणो वा","7.4.58::अत्र लोपोऽभ्यासस्य","7.4.59::ह्रस्वः","7.4.60::हलादिः शेषः","7.4.61::शर्पूर्वाः खयः","7.4.62::कुहोश्चुः","7.4.63::न कवतेर्यङि","7.4.64::कृषेश्छन्दसि","7.4.65::दाधर्तिदर्धर्तिदर्धर्षिबोभूतुतेतिक्तेऽलर्ष्यापनीफणत्संसनिष्यदत्करिक्रत्कनिक्रदद्भरिभ्रद्दविध्वतोदविद्युतत्तरित्रतःसरीसृपतंवरीवृजन्मर्मृज्यागनीगन्तीति च","7.4.66::उरत्‌","7.4.67::द्युतिस्वाप्योः सम्प्रसारणम्","7.4.68::व्यथो लिटि","7.4.69::दीर्घ इणः किति","7.4.70::अत आदेः","7.4.71::तस्मान्नुड् द्विहलः","7.4.72::अश्नोतेश्च","7.4.73::भवतेरः","7.4.74::ससूवेति निगमे","7.4.75::निजां त्रयाणां गुणः श्लौ","7.4.76::भृञामित्‌","7.4.77::अर्तिपिपर्त्योश्च","7.4.78::बहुलं छन्दसि","7.4.79::सन्यतः","7.4.80::ओः पुयण्ज्यपरे","7.4.81::स्रवतिशृणोतिद्रवतिप्रवतिप्लवतिच्यवतीनां वा","7.4.82::गुणो यङ्लुकोः","7.4.83::दीर्घोऽकितः","7.4.84::नीग्वञ्चुस्रंसुध्वंसुभ्रंसुकसपतपदस्कन्दाम्","7.4.85::नुगतोऽनुनासिकान्तस्य","7.4.86::जपजभदहदशभञ्जपशां च","7.4.87::चरफलोश्च","7.4.88::उत्‌ परस्यातः","7.4.89::ति च","7.4.90::रीगृदुपधस्य च","7.4.91::रुग्रिकौ च लुकि","7.4.92::ऋतश्च","7.4.93:अतिदेशः:सन्वल्लघुनि चङ्परेऽनग्लोपे","7.4.94::दीर्घो लघोः","7.4.95::अत्‌ स्मृदृत्वरप्रथम्रदस्तॄस्पशाम्","7.4.96::विभाषा वेष्टिचेष्ट्योः","7.4.97::ई च गणः","8.1.1:अधिकारः:सर्वस्य द्वे","8.1.2:संज्ञा:तस्य परमाम्रेडितम्‌","8.1.3::अनुदात्तं च","8.1.4::नित्यवीप्सयोः","8.1.5::परेर्वर्जने","8.1.6::प्रसमुपोदः पादपूरणे","8.1.7::उपर्यध्यधसः सामीप्ये","8.1.8::वाक्यादेरामन्त्रितस्यासूयासम्मतिकोपकुत्सनभर्त्सनेषु","8.1.9:अतिदेशः:एकं बहुव्रीहिवत्‌","8.1.10::आबाधे च","8.1.11:अतिदेशः:कर्मधारयवत्‌ उत्तरेषु","8.1.12::प्रकारे गुणवचनस्य","8.1.13::अकृच्छ्रे प्रियसुखयोरन्यतरस्याम्","8.1.14::यथास्वे यथायथम्","8.1.15::द्वन्द्वं रहस्यमर्यादावचनव्युत्क्रमणयज्ञपात्रप्रयोगाभिव्यक्तिषु","8.1.16:अधिकारः:पदस्य","8.1.17:अधिकारः:पदात्‌","8.1.18:अधिकारः:अनुदात्तं सर्वमपादादौ","8.1.19::आमन्त्रितस्य च","8.1.20::युष्मदस्मदोः षष्ठीचतुर्थीद्वितीयास्थयोर्वान्नावौ","8.1.21::बहुवचने वस्नसौ","8.1.22::तेमयावेकवचनस्य","8.1.23::त्वामौ द्वितीयायाः","8.1.24::न चवाहाहैवयुक्ते","8.1.25::पश्यार्थैश्चानालोचने","8.1.26::सपूर्वायाः प्रथमाया विभाषा","8.1.27::तिङो गोत्रादीनि कुत्सनाभीक्ष्ण्ययोः","8.1.28::तिङ्ङतिङः","8.1.29::न लुट्","8.1.30::निपातैर्यद्यदिहन्तकुविन्नेच्चेच्चण्कच्चिद्यत्रयुक्तम्","8.1.31::नह प्रत्यारम्भे","8.1.32::सत्यं प्रश्ने","8.1.33::अङ्गाप्रातिलोम्ये","8.1.34::हि च","8.1.35::छन्दस्यनेकमपि साकाङ्क्षम्‌","8.1.36::यावद्यथाभ्याम्","8.1.37::पूजायां नानन्तरम्","8.1.38::उपसर्गव्यपेतं च","8.1.39::तुपश्यपश्यताहैः पूजायाम्","8.1.40::अहो च","8.1.41::शेषे विभाषा","8.1.42::पुरा च परीप्सायाम्","8.1.43::नन्वित्यनुज्ञैषणायाम्","8.1.44::किं क्रियाप्रश्नेऽनुपसर्गमप्रतिषिद्धम्‌","8.1.45::लोपे विभाषा","8.1.46::एहिमन्ये प्रहासे लृट्","8.1.47::जात्वपूर्वम्","8.1.48::किम्वृत्तं च चिदुत्तरम्","8.1.49::आहो उताहो चानन्तरम्","8.1.50::शेषे विभाषा","8.1.51::गत्यर्थलोटा लृण्न चेत्‌ कारकं सर्वान्यत्‌","8.1.52::लोट् च","8.1.53::विभाषितं सोपसर्गमनुत्तमम्‌","8.1.54::हन्त च","8.1.55::आम एकान्तरमामन्त्रितमनन्तिके","8.1.56::यद्धितुपरं छन्दसि","8.1.57::चनचिदिवगोत्रादितद्धिताम्रेडितेष्वगतेः","8.1.58::चादिषु च","8.1.59::चवायोगे प्रथमा","8.1.60::हेति क्षियायाम्","8.1.61::अहेति विनियोगे च","8.1.62::चाहलोप एवेत्यवधारणम्","8.1.63::चादिलोपे विभाषा","8.1.64::वैवावेति च च्छन्दसि","8.1.65::एकान्याभ्यां समर्थाभ्याम्","8.1.66::यद्वृत्तान्नित्यं","8.1.67::पूजनात्‌ पूजितमनुदात्तम् {काष्ठादिभ्यः}","8.1.68::सगतिरपि तिङ्","8.1.69::कुत्सने च सुप्यगोत्रादौ","8.1.70::गतिर्गतौ","8.1.71::तिङि चोदात्तवति","8.1.72:अतिदेशः:आमन्त्रितं पूर्वम् अविद्यमानवत्‌","8.1.73::नामन्त्रिते समानाधिकरणे {सामान्यवचनम्}","8.1.74::विभाषितं विशेषवचने बहुवचनम्","8.2.1:अतिदेशः; अधिकारः:पूर्वत्रासिद्धम्","8.2.2:अतिदेशः:नलोपः सुप्स्वरसंज्ञातुग्विधिषु कृति","8.2.3:अतिदेशः:न मु ने","8.2.4:अतिदेशः:उदात्तस्वरितयोर्यणः स्वरितोऽनुदात्तस्य","8.2.5:अतिदेशः:एकादेश उदात्तेनोदात्तः","8.2.6:अतिदेशः:स्वरितो वाऽनुदात्ते पदादौ","8.2.7:अतिदेशः:नलोपः प्रातिपदिकान्तस्य","8.2.8:अतिदेशः:न ङिसम्बुद्ध्योः","8.2.9:अतिदेशः:मादुपधायाश्च मतोर्वोऽयवादिभ्यः","8.2.10:अतिदेशः:झयः","8.2.11:अतिदेशः:संज्ञायाम्","8.2.12:अतिदेशः:आसन्दीवदष्ठीवच्चक्रीवत्कक्षीवद्रुमण्वच्चर्मण्वती","8.2.13:अतिदेशः:उदन्वानुदधौ च","8.2.14:अतिदेशः:राजन्वान् सौराज्ये","8.2.15:अतिदेशः:छन्दसीरः","8.2.16:अतिदेशः:अनो नुट्","8.2.17:अतिदेशः:नाद्घस्य","8.2.18:अतिदेशः:कृपो रो लः","8.2.19:अतिदेशः:उपसर्गस्यायतौ","8.2.20:अतिदेशः:ग्रो यङि","8.2.21:अतिदेशः:अचि विभाषा","8.2.22:अतिदेशः:परेश्च घाङ्कयोः","8.2.23:अतिदेशः:संयोगान्तस्य लोपः","8.2.24:अतिदेशः:रात्‌ सस्य","8.2.25:अतिदेशः:धि च","8.2.26:अतिदेशः:झलो झलि","8.2.27:अतिदेशः:ह्रस्वादङ्गात्‌","8.2.28:अतिदेशः:इट ईटि","8.2.29:अतिदेशः:स्कोः संयोगाद्योरन्ते च","8.2.30:अतिदेशः:चोः कुः","8.2.31:अतिदेशः:हो ढः","8.2.32:अतिदेशः:दादेर्धातोर्घः","8.2.33:अतिदेशः:वा द्रुहमुहष्णुहष्णिहाम्","8.2.34:अतिदेशः:नहो धः","8.2.35:अतिदेशः:आहस्थः","8.2.36:अतिदेशः:व्रश्चभ्रस्जसृजमृजयजराजभ्राजच्छशां षः","8.2.37:अतिदेशः:एकाचो बशो भष् झषन्तस्य स्ध्वोः","8.2.38:अतिदेशः:दधस्तथोश्च","8.2.39:अतिदेशः:झलां जशोऽन्ते","8.2.40:अतिदेशः:झषस्तथोर्धोऽधः","8.2.41:अतिदेशः:षढोः कः सि","8.2.42:अतिदेशः:रदाभ्यां निष्ठातो नः पूर्वस्य च दः","8.2.43:अतिदेशः:संयोगादेरातो धातोर्यण्वतः","8.2.44:अतिदेशः:ल्वादिभ्यः","8.2.45:अतिदेशः:ओदितश्च","8.2.46:अतिदेशः:क्षियो दीर्घात्‌","8.2.47:अतिदेशः:श्योऽस्पर्शे","8.2.48:अतिदेशः:अञ्चोऽनपादाने","8.2.49:अतिदेशः:दिवोऽविजिगीषायाम्","8.2.50:अतिदेशः:निर्वाणोऽवाते","8.2.51:अतिदेशः:शुषः कः","8.2.52:अतिदेशः:पचो वः","8.2.53:अतिदेशः:क्षायो मः","8.2.54:अतिदेशः:प्रस्त्योऽन्यतरस्याम्","8.2.55:अतिदेशः:अनुपसर्गात्‌ फुल्लक्षीबकृशोल्लाघाः","8.2.56:अतिदेशः:नुदविदोन्दत्राघ्राह्रीभ्योऽन्यतरस्याम्","8.2.57:अतिदेशः:न ध्याख्यापॄमूर्छिमदाम्","8.2.58:अतिदेशः:वित्तो भोगप्रत्यययोः","8.2.59:अतिदेशः:भित्तं शकलम्","8.2.60:अतिदेशः:ऋणमाधमर्ण्ये","8.2.61:अतिदेशः:नसत्तनिषत्तानुत्तप्रतूर्तसूर्तगूर्तानि छन्दसि","8.2.62:अतिदेशः:क्विन्प्रत्ययस्य कुः","8.2.63:अतिदेशः:नशेर्वा","8.2.64:अतिदेशः:मो नो धातोः","8.2.65:अतिदेशः:म्वोश्च","8.2.66:अतिदेशः:ससजुषो रुः","8.2.67:अतिदेशः:अवयाःश्वेतवाःपुरोडाश्च","8.2.68:अतिदेशः:अहन्","8.2.69:अतिदेशः:रोऽसुपि","8.2.70:अतिदेशः:अम्नरूधरवरित्युभयथा छन्दसि","8.2.71:अतिदेशः:भुवश्च महाव्याहृतेः","8.2.72:अतिदेशः:वसुस्रंसुध्वंस्वनडुहां दः","8.2.73:अतिदेशः:तिप्यनस्तेः","8.2.74:अतिदेशः:सिपि धातो रुर्वा","8.2.75:अतिदेशः:दश्च","8.2.76:अतिदेशः:र्वोरुपधाया दीर्घ इकः","8.2.77:अतिदेशः:हलि च","8.2.78:अतिदेशः:उपधायां च","8.2.79:अतिदेशः:न भकुर्छुराम्","8.2.80:अतिदेशः:अदसोऽसेर्दादु दो मः","8.2.81:अतिदेशः:एत ईद्बहुवचने","8.2.82:अतिदेशः; अधिकारः:वाक्यस्य टेः प्लुत उदात्तः","8.2.83:अतिदेशः:प्रत्यभिवादेअशूद्रे","8.2.84:अतिदेशः:दूराद्धूते च","8.2.85:अतिदेशः:हैहेप्रयोगे हैहयोः","8.2.86:अतिदेशः:गुरोरनृतोऽनन्त्यस्याप्येकैकस्य प्राचाम्","8.2.87:अतिदेशः:ओमभ्यादाने","8.2.88:अतिदेशः:ये यज्ञकर्मणि","8.2.89:अतिदेशः:प्रणवष्टेः","8.2.90:अतिदेशः:याज्याऽन्तः","8.2.91:अतिदेशः:ब्रूहिप्रेस्यश्रौषड्वौषडावहानामादेः","8.2.92:अतिदेशः:अग्नीत्प्रेषणे परस्य च","8.2.93:अतिदेशः:विभाषा पृष्टप्रतिवचने हेः","8.2.94:अतिदेशः:निगृह्यानुयोगे च","8.2.95:अतिदेशः:आम्रेडितं भर्त्सने","8.2.96:अतिदेशः:अङ्गयुक्तं तिङ् आकाङ्क्षम्","8.2.97:अतिदेशः:विचार्यमाणानाम्","8.2.98:अतिदेशः:पूर्वं तु भाषायाम्","8.2.99:अतिदेशः:प्रतिश्रवणे च","8.2.100:अतिदेशः:अनुदात्तं प्रश्नान्ताभिपूजितयोः","8.2.101:अतिदेशः:चिदिति चोपमाऽर्थे प्रयुज्यमाने","8.2.102:अतिदेशः:उपरिस्विदासीदिति च","8.2.103:अतिदेशः:स्वरितमाम्रेडितेऽसूयासम्मतिकोपकुत्सनेषु","8.2.104:अतिदेशः:क्षियाऽऽशीःप्रैषेषु तिङ् आकाङ्क्षम्","8.2.105:अतिदेशः:अनन्त्यस्यापि प्रश्नाख्यानयोः","8.2.106:अतिदेशः:प्लुतावैच इदुतौ","8.2.107:अतिदेशः:एचोऽप्रगृह्यस्यादूराद्धूते पूर्वस्यार्धस्यादुत्तरस्येदुतौ","8.2.108:अतिदेशः; अधिकारः:तयोर्य्वावचि संहितायाम्","8.3.1:अतिदेशः:मतुवसो रु सम्बुद्धौ छन्दसि","8.3.2:अतिदेशः:अत्रानुनासिकः पूर्वस्य तु वा","8.3.3:अतिदेशः:आतोऽटि नित्यम्","8.3.4:अतिदेशः:अनुनासिकात्‌ परोऽनुस्वारः","8.3.5:अतिदेशः:समः सुटि","8.3.6:अतिदेशः:पुमः खय्यम्परे","8.3.7:अतिदेशः:नश्छव्यप्रशान्","8.3.8:अतिदेशः:उभयथर्क्षु","8.3.9:अतिदेशः:दीर्घादटि समानपदे","8.3.10:अतिदेशः:नॄन् पे","8.3.11:अतिदेशः:स्वतवान् पायौ","8.3.12:अतिदेशः:कानाम्रेडिते","8.3.13:अतिदेशः:ढो ढे लोपः","8.3.14:अतिदेशः:रो रि","8.3.15:अतिदेशः:खरवसानयोर्विसर्जनीयः","8.3.16:अतिदेशः:रोः सुपि","8.3.17:अतिदेशः:भोभगोअघोअपूर्वस्य योऽशि","8.3.18:अतिदेशः:व्योर्लघुप्रयत्नतरः शाकटायनस्य","8.3.19:अतिदेशः:लोपः शाकल्यस्य","8.3.20:अतिदेशः:ओतो गार्ग्यस्य","8.3.21:अतिदेशः:उञि च पदे","8.3.22:अतिदेशः:हलि सर्वेषाम्","8.3.23:अतिदेशः:मोऽनुस्वारः","8.3.24:अतिदेशः:नश्चापदान्तस्य झलि","8.3.25:अतिदेशः:मो राजि समः क्वौ","8.3.26:अतिदेशः:हे मपरे वा","8.3.27:अतिदेशः:नपरे नः","8.3.28:अतिदेशः:ङ्णोः कुक्टुक् शरि","8.3.29:अतिदेशः:डः सि धुट्","8.3.30:अतिदेशः:नश्च","8.3.31:अतिदेशः:शि तुक्","8.3.32:अतिदेशः:ङमो ह्रस्वादचि ङमुण्नित्यम्","8.3.33:अतिदेशः:मय उञो वो वा","8.3.34:अतिदेशः:विसर्जनीयस्य सः","8.3.35:अतिदेशः:शर्परे विसर्जनीयः","8.3.36:अतिदेशः:वा शरि","8.3.37:अतिदेशः:कुप्वोः XकXपौ च","8.3.38:अतिदेशः:सोऽपदादौ","8.3.39:अतिदेशः:इणः षः","8.3.40:अतिदेशः:नमस्पुरसोर्गत्योः","8.3.41:अतिदेशः:इदुदुपधस्य चाप्रत्ययस्य","8.3.42:अतिदेशः:तिरसोऽन्यतरस्याम्","8.3.43:अतिदेशः:द्विस्त्रिश्चतुरिति कृत्वोऽर्थे","8.3.44:अतिदेशः:इसुसोः सामर्थ्ये","8.3.45:अतिदेशः:नित्यं समासेऽनुत्तरपदस्थस्य","8.3.46:अतिदेशः:अतः कृकमिकंसकुम्भपात्रकुशाकर्णीष्वनव्ययस्य","8.3.47:अतिदेशः:अधःशिरसी पदे","8.3.48:अतिदेशः:कस्कादिषु च","8.3.49:अतिदेशः:छन्दसि वाऽप्राम्रेडितयोः","8.3.50:अतिदेशः:कःकरत्करतिकृधिकृतेष्वनदितेः","8.3.51:अतिदेशः:पञ्चम्याः परावध्यर्थे","8.3.52:अतिदेशः:पातौ च बहुलम्","8.3.53:अतिदेशः:षष्ठ्याः पतिपुत्रपृष्ठपारपदपयस्पोषेषु","8.3.54:अतिदेशः:इडाया वा","8.3.55:अतिदेशः; अधिकारः:अपदान्तस्य मूर्धन्यः","8.3.56:अतिदेशः:सहेः साडः सः","8.3.57:अतिदेशः; अधिकारः:इण्कोः","8.3.58:अतिदेशः:नुम्विसर्जनीयशर्व्यवायेऽपि","8.3.59:अतिदेशः:आदेशप्रत्यययोः","8.3.60:अतिदेशः:शासिवसिघसीनां च","8.3.61:अतिदेशः:स्तौतिण्योरेव षण्यभ्यासात्‌","8.3.62:अतिदेशः:सः स्विदिस्वदिसहीनां च","8.3.63:अतिदेशः:प्राक्सितादड्व्यवायेऽपि","8.3.64:अतिदेशः:स्थाऽऽदिष्वभ्यासेन चाभ्यासय","8.3.65:अतिदेशः:उपसर्गात्‌ सुनोतिसुवतिस्यतिस्तौतिस्तोभतिस्थासेनयसेधसिचसञ्जस्वञ्जाम्","8.3.66:अतिदेशः:सदिरप्रतेः","8.3.67:अतिदेशः:स्तम्भेः","8.3.68:अतिदेशः:अवाच्चालम्बनाविदूर्ययोः","8.3.69:अतिदेशः:वेश्च स्वनो भोजने","8.3.70:अतिदेशः:परिनिविभ्यः सेवसितसयसिवुसहसुट्स्तुस्वञ्जाम्","8.3.71:अतिदेशः:सिवादीनां वाऽड्व्यवायेऽपि","8.3.72:अतिदेशः:अनुविपर्यभिनिभ्यः स्यन्दतेरप्राणिषु","8.3.73:अतिदेशः:वेः स्कन्देरनिष्ठायाम्","8.3.74:अतिदेशः:परेश्च","8.3.75:अतिदेशः:परिस्कन्दः प्राच्यभरतेषु","8.3.76:अतिदेशः:स्फुरतिस्फुलत्योर्निर्निविभ्यः","8.3.77:अतिदेशः:वेः स्कभ्नातेर्नित्यम्","8.3.78:अतिदेशः:इणः षीध्वंलुङ्‌लिटां धोऽङ्गात्‌","8.3.79:अतिदेशः:विभाषेटः","8.3.80:अतिदेशः:समासेऽङ्गुलेः सङ्गः","8.3.81:अतिदेशः:भीरोः स्थानम्","8.3.82:अतिदेशः:अग्नेः स्तुत्स्तोमसोमाः","8.3.83:अतिदेशः:ज्योतिरायुषः स्तोमः","8.3.84:अतिदेशः:मातृपितृभ्यां स्वसा","8.3.85:अतिदेशः:मातुःपितुर्भ्यामन्यतरस्याम्‌","8.3.86:अतिदेशः:अभिनिसः स्तनः शब्दसंज्ञायाम्","8.3.87:अतिदेशः:उपसर्गप्रादुर्भ्यामस्तिर्यच्परः","8.3.88:अतिदेशः:सुविनिर्दुर्भ्यः सुपिसूतिसमाः","8.3.89:अतिदेशः:निनदीभ्यां स्नातेः कौशले","8.3.90:अतिदेशः:सूत्रं प्रतिष्णातम्‌","8.3.91:अतिदेशः:कपिष्ठलो गोत्रे","8.3.92:अतिदेशः:प्रष्ठोऽग्रगामिनि","8.3.93:अतिदेशः:वृक्षासनयोर्विष्टरः","8.3.94:अतिदेशः:छन्दोनाम्नि च","8.3.95:अतिदेशः:गवियुधिभ्यां स्थिरः","8.3.96:अतिदेशः:विकुशमिपरिभ्यः स्थलम्","8.3.97:अतिदेशः:अम्बाम्बगोभूमिसव्यापद्वित्रिकुशेकुशङ्क्वङ्गुमञ्जिपुञ्जिपरमेबर्हिर्दिव्यग्निभ्यः स्थः","8.3.98:अतिदेशः:सुषामादिषु च","8.3.99:अतिदेशः:ऐति संज्ञायामगात्‌","8.3.100:अतिदेशः:नक्षत्राद्वा","8.3.101:अतिदेशः:ह्रस्वात्‌ तादौ तद्धिते","8.3.102:अतिदेशः:निसस्तपतावनासेवने","8.3.103:अतिदेशः:युष्मत्तत्ततक्षुःष्वन्तःपादम्","8.3.104:अतिदेशः:यजुष्येकेषाम्","8.3.105:अतिदेशः:स्तुतस्तोमयोश्छन्दसि","8.3.106:अतिदेशः:पूर्वपदात्‌","8.3.107:अतिदेशः:सुञः","8.3.108:अतिदेशः:सनोतेरनः","8.3.109:अतिदेशः:सहेः पृतनर्ताभ्यां च","8.3.110:अतिदेशः:न रपरसृपिसृजिस्पृशिस्पृहिसवनादीनाम्","8.3.111:अतिदेशः:सात्पदाद्योः","8.3.112:अतिदेशः:सिचो यङि","8.3.113:अतिदेशः:सेधतेर्गतौ","8.3.114:अतिदेशः:प्रतिस्तब्धनिस्तब्धौ च","8.3.115:अतिदेशः:सोढः","8.3.116:अतिदेशः:स्तम्भुसिवुसहां चङि","8.3.117:अतिदेशः:सुनोतेः स्यसनोः","8.3.118:अतिदेशः:सदिष्वञ्जोः परस्य लिटि","8.3.119:अतिदेशः:निव्यभिभ्योऽड्व्यावये वा छन्दसि","8.4.1:अतिदेशः:रषाभ्यां नो णः समानपदे","8.4.2:अतिदेशः:अट्कुप्वाङ्नुम्व्यवायेऽपि","8.4.3:अतिदेशः:पूर्वपदात्‌ संज्ञायामगः","8.4.4:अतिदेशः:वनं पुरगामिश्रकासिध्रकाशारिकाकोटराऽग्रेभ्यः","8.4.5:अतिदेशः:प्रनिरन्तःशरेक्षुप्लक्षाम्रकार्ष्यखदिरपियूक्षाभ्योऽसंज्ञायामपि","8.4.6:अतिदेशः:विभाषौषधिवनस्पतिभ्यः","8.4.7:अतिदेशः:अह्नोऽदन्तात्‌","8.4.8:अतिदेशः:वाहनमाहितात्‌","8.4.9:अतिदेशः:पानं देशे","8.4.10:अतिदेशः:वा भावकरणयोः","8.4.11:अतिदेशः:प्रातिपदिकान्तनुम्विभक्तिषु च","8.4.12:अतिदेशः:एकाजुत्तरपदे णः","8.4.13:अतिदेशः:कुमति च","8.4.14:अतिदेशः:उपसर्गादसमासेऽपि णोपदेशस्य","8.4.15:अतिदेशः:हिनुमीना","8.4.16:अतिदेशः:आनि लोट्","8.4.17:अतिदेशः:नेर्गदनदपतपदघुमास्यतिहन्तियातिवातिद्रातिप्सातिवपतिवहतिशाम्यतिचिनोतिदेग्धिषु च","8.4.18:अतिदेशः:शेषे विभाषाऽकखादावषान्त उपदेशे","8.4.19:अतिदेशः:अनितेः","8.4.20:अतिदेशः:अन्तः","8.4.21:अतिदेशः:उभौ साभ्यासस्य","8.4.22:अतिदेशः:हन्तेरत्पूर्वस्य","8.4.23:अतिदेशः:वमोर्वा","8.4.24:अतिदेशः:अन्तरदेशे","8.4.25:अतिदेशः:अयनं च","8.4.26:अतिदेशः:छन्दस्यृदवग्रहात्‌","8.4.27:अतिदेशः:नश्च धातुस्थोरुषुभ्यः","8.4.28:अतिदेशः:उपसर्गाद् बहुलम्","8.4.29:अतिदेशः:कृत्यचः","8.4.30:अतिदेशः:णेर्विभाषा","8.4.31:अतिदेशः:हलश्च इजुपधात्‌","8.4.32:अतिदेशः:इजादेः सनुमः","8.4.33:अतिदेशः:वा निंसनिक्षनिन्दाम्","8.4.34:अतिदेशः:न भाभूपूकमिगमिप्यायीवेपाम्","8.4.35:अतिदेशः:षात्‌ पदान्तात्‌","8.4.36:अतिदेशः:नशेः षान्तस्य","8.4.37:अतिदेशः:पदान्तस्य","8.4.38:अतिदेशः:पदव्यवायेऽपि","8.4.39:अतिदेशः:क्षुभ्नाऽऽदिषु च","8.4.40:अतिदेशः:स्तोः श्चुना श्चुः","8.4.41:अतिदेशः:ष्टुना ष्टुः","8.4.42:अतिदेशः:न पदान्ताट्टोरनाम्","8.4.43:अतिदेशः:तोः षि","8.4.44:अतिदेशः:शात्‌","8.4.45:अतिदेशः:यरोऽनुनासिकेऽनुनासिको वा","8.4.46:अतिदेशः:अचो रहाभ्यां द्वे","8.4.47:अतिदेशः:अनचि च","8.4.48:अतिदेशः:नादिन्याक्रोशे पुत्रस्य","8.4.49:अतिदेशः:शरोऽचि","8.4.50:अतिदेशः:त्रिप्रभृतिषु शाकटायनस्य","8.4.51:अतिदेशः:सर्वत्र शाकल्यस्य","8.4.52:अतिदेशः:दीर्घादाचार्याणाम्","8.4.53:अतिदेशः:झलां जश् झशि","8.4.54:अतिदेशः:अभ्यासे चर्च्च","8.4.55:अतिदेशः:खरि च","8.4.56:अतिदेशः:वाऽवसाने","8.4.57:अतिदेशः:अणोऽप्रगृह्यस्यानुनासिकः","8.4.58:अतिदेशः:अनुस्वारस्य ययि परसवर्णः","8.4.59:अतिदेशः:वा पदान्तस्य","8.4.60:अतिदेशः:तोर्लि","8.4.61:अतिदेशः:उदः स्थास्तम्भोः पूर्वस्य","8.4.62:अतिदेशः:झयो होऽन्यतरस्याम्","8.4.63:अतिदेशः:शश्छोऽटि","8.4.64:अतिदेशः:हलो यमां यमि लोपः","8.4.65:अतिदेशः:झरो झरि सवर्णे","8.4.66:अतिदेशः:उदात्तादनुदात्तस्य स्वरितः","8.4.67:अतिदेशः:नोदात्तस्वरितोदयमगार्ग्यकाश्यपगालवानाम्‌","8.4.68:अतिदेशः:अ अ इति"); // adanta dhAtus of curAdi need special treatment. Database corrected on 7 Jan 2015.
// https://docs.google.com/spreadsheet/ccc?key=0Al_QBT-hoqqVdGV5U2tQZ3ltX3poX1hjZmhqcGQzN1E#gid=6
$vdata=array("1.1.1-1:saYjYADikAraH saYjYAsampratyayArTaH ","1.1.1-2:itaraTA hi asampratyayaH yaTA loke ","1.1.1-3:saYjYAsaYjYyasandehaH ca ","1.1.1-4:AcAryAcArAt saYjYAsidDiH yaTA lOkikavEdikezu ","1.1.1-5:saYjYAsaYjYyasandehaH ","1.1.1-6:anAkftiH ","1.1.1-7:liNgena vA ","1.1.1-8:sataH vfdDyAdizu saYjYABAvAt tadASraye itaretarASrayatvAt asidDiH ","1.1.1-9:sidDam tu nityaSabdatvAt ","1.1.1-10:kimarTam SAstram iti cet nivartakatvAt sidDam ","1.1.1-11:anyatra sahavacanAt samudAye saYjYAprasaNgaH ","1.1.1-12:pratyavayavam ca vAkyaparisamApteH ","1.1.1-13:AkArasya taparakaraRam savarRArTam BedakatvAt svarasya","1.1.3-1:iggrahaRam AtsanDyakzaravyaYjananivfttyarTam ","1.1.3-2:saYjYayA viDAne niyamaH ","1.1.3-3:vfdDiguRO alaH antyasya iti cet midipugantalaGUpaDarcCidfSikziprakzudrezu iggrahaRam ","1.1.3-4:sarvAdeSaprasaNgaH ca anigantasya ","1.1.3-5:igmAtrasya iti cet jusisArvaDAtukArDaDAtukahrasvAdyoH guRezu anantyapratizeDaH ","1.1.3-6:pugantalaGUpaDagrahaRam anantyaniyamArTam ","1.1.3-7:vfdDigrahaRam uttarArTam ","1.1.3-8:mfjyarTam iti cet yogaviBAgAt sidDam ","1.1.3-9:awi ca uktam ","1.1.3-10:vfdDipratizeDAnupapattiH tu ikprakaraRAt ","1.1.3-11:RiSviByAm tO nimAtavyO tasmAt iglakzaRA vfdDiH ","1.1.3-12:zazWyAH sTAneyogatvAt ignivfttiH ","1.1.3-13:anyatarArTam punarvacanam ","1.1.3-14:prasAraRe ca ","1.1.3-15:vizayArTam punarvacanam ","1.1.3-16:uH aR rapare ca ","1.1.3-17:sidDam tu zazWyaDikAre vacanAt","1.1.4-1:yaNyakkyavalope pratizeDaH ","1.1.4-2:numlopasrivyanubanDalope apratizeDArTam ","1.1.4-3:ikprakaraRAt numlope vfdDiH ","1.1.4-4:nipAtanAt syadAdizu ","1.1.4-5:pratyayASrayatvAt anyatra sidDam ","1.1.4-6:raki jyaH prasAraRam ","1.1.4-7:allopasya sTAnivatNat anAramBaH vA ","1.1.4-8:uktam Seze","1.1.5-1:kNiti pratizeDe tannimittagrahaRam ","1.1.5-2:upaDAroravItyarTam ","1.1.5-3:SacaNantasya antaraNgalakzaRatvAt ","1.1.5-4:tadDitakAmyoH ikprakaraRAt ","1.1.5-5:lakArasya NittvAt AdeSezu sTAnivadBAvaprasaNgaH iti cet yAsuwaH NidvacanAt sidDam","1.1.6-1:dIDIvevyoH CandovizayatvAt dfzwAnuviDitvAt ca CandasaH adIDet adIDayuH iti ca guRadarSanAt apratizeDaH ","1.1.6-2:dIDyat iti Syanvyatyayena","1.1.7-1:saMyogasaYjYAyAm sahavacanam yaTA anyatra ","1.1.7-2:samudAye saMyogAdilopaH masjeH ","1.1.7-3:dvayoH haloH saMyogaH iti cet dvirvacanam ","1.1.7-4:na vA ajviDeH ","1.1.7-5:svarAnantarhitavacanam ","1.1.7-6:dfzwam Anantaryam vyavahite ","1.1.7-7:Anantaryavacanam kimarTam iti cet ekapratizeDArTam ","1.1.7-8:na vA atajjAtIyavyavAyAt","1.1.8-1:anunAsikasaYjYAyAm itaretarASraye uktam","1.1.9-1:savarRasaYjYAyAm BinnadeSezu atiprasaNgaH prayatnasAmAnyAt ","1.1.9-2:sidDam tu Asye tulyadeSaprayatnam savarRam ","1.1.9-3:tasya avacanam vacanaprAmARyAt ","1.1.9-4:sambanDiSabdEH vA tulyam ","1.1.9-5:fkAraxkArayoH savarRaviDiH","1.1.10-1:ajJaloH pratizeDe SakArapratizeDaH ajJaltvAt ","1.1.10-2:tatra savarRalope dozaH ","1.1.10-3:sidDam anactvAt ","1.1.10-4:vAkyAparisamApteH vA","1.1.11-1:IdAdayaH dvivacanam pragfhyAH iti cet antyasya viDiH ","1.1.11-2:IdAdyantam iti cet ekasya viDiH ","1.1.11-3:na vA AdyantatvAt ","1.1.11-4:IdAdyantam dvivacanAntam iti cet luki pratizeDaH ","1.1.11-5:saptamyAm arTagrahaRam jYApakam pratyayalakzaRapratizeDasya","1.1.12-1:mAt pragfhyasaYjYAyAm tasya asidDatvAt ayAvekAdeSapratizeDaH ","1.1.12-2:vacanArTaH hi sidDe ","1.1.12-3:vipratizeDAt vA ","1.1.12-4:ASrayAt sidDatvam ca yaTA roH uttve ","1.1.12-5:asidDe hi uttve AdguRAprasidDiH ","1.1.12-6:uktam vA ","1.1.12-7:tatra saki dozaH ","1.1.12-8:na vA grahaRaviSezaRatvAt","1.1.13-1:Se arTavadgrahaRAt","1.1.15-1:otaH cvipratizeDaH","1.1.17- 18-1:uYaH iti yogaviBAgaH ","1.1.17- 18-2:uM vA SAkalyasya","1.1.19-1:IdutO saptamI iti eva lupte arTagrahaRAt Bavet pUrvasya cet savarRaH asO AqAmBAvaH prasajyate ","1.1.19-2:vacanAt yatra dIrGatvam tatra api sarasI yadi jYApakam syAt tadantatve mA vA pUrvapadasya BUt","1.1.20-1:GusaYjYAyAm prakftigrahaRam SidarTam ","1.1.20-2:samAnaSabdapratizeDaH ","1.1.20-3:samAnaSabdApratizeDaH arTavadgrahaRAt ","1.1.20-4:anupasargAt vA ","1.1.20-5:na vA arTavataH hi AgamaH tadguRIBUtaH tadgrahaRena gfhyate yaTA anyatra","1.1.20-6:dINaH pratizeDaH sTAGvoH ittve ","1.1.20-7:dappratizeDe na dEpi anejantatvAt ","1.1.20-8:sidDam anubanDasya anekAntatvAt ","1.1.20-9:pitpratizeDAt vA","1.1.21-1:sati anyasmin AdyantavadBAvAt ekasmin Adyantavadvacanam ","1.1.21-2:tatra vyapadeSivadvacanam ","1.1.21-3:ekAcaH dve praTamArTam ","1.1.21-4:zatve ca AdeSasampratyayArTam ","1.1.21-5:avacanAt lokavijYAnAt sidDam ","1.1.21-6:apUrvAnuttaralakzaRatvAt AdyantayoH sidDam ekasmin ","1.1.21-7:Adivattve prayojanam pratyayaYnidAdyudAttatve ","1.1.21-8:valAdeH ArDaDAtukasya iw ","1.1.21-9:asmin viDiH tadAditve ","1.1.21-10:ajAdyAwtve ","1.1.21-11:antavat dvivacanAntapragfhyatve ","1.1.21-12:mit acaH antyAt paraH ","1.1.21-13:acaH antyAdi wi ","1.1.21-14:alaH antyasya ","1.1.21-15:yena viDiH tadantatve","1.1.22-1:GasaYjYAyAm nadItare pratizeDaH ","1.1.22-2:GasaYjYAyAm nadItare apratizeDaH ","1.1.22-3:tarabgrahaRam hi OpadeSikam","1.1.23-:","bahugaRavatuqati saNKyA -:","bahugaRavatuqati saNKyA -1:saNKyAsaYjYAyAm saNKyAgrahaRam ","bahugaRavatuqati saNKyA -2:saNKyAsampratyayArTam ","bahugaRavatuqati saNKyA -3:itaraTA hi asampratyayaH akftrimatvAt yaTA loke ","bahugaRavatuqati saNKyA -4:uttarArTam ca ","bahugaRavatuqati saNKyA -5:aDyarDagrahaRam ca samAsakanviDyarTam ","bahugaRavatuqati saNKyA -6:luki ca agrahaRam ","bahugaRavatuqati saNKyA -7:arDapUrvapadaH ca pUraRapratyayAntaH ","bahugaRavatuqati saNKyA -8:aDikagrahaRam ca aluki samAsottarapadavfdDyarTam ","bahugaRavatuqati saNKyA -9:bahuvrIhO ca agrahaRam ","bahugaRavatuqati saNKyA -10:bahvAdInAm agrahaRam","1.1.24-1:zawsaYjYAyAm upadeSavacanam ","1.1.24-2:SatAdyazwanoH numnuqarTam ","1.1.24-3:uktam vA","1.1.26-1:nizWAsaYjYAyAm samAnaSabdapratizeDaH ","1.1.26-2:nizWAsaYjYAyAm samAnaSabdApratizeDaH ","1.1.26-3:anubanDaH anyatvakaraH iti cet na lopAt ","1.1.26-4:sidDaviparyAsaH ca ","1.1.26-5:kArakakAlaviSezAt sidDam ","1.1.26-6:luNi sijAdidarSanAt","1.1.27-1:sarvanAmasaYjYAyAm nipAtanAt RatvABAvaH ","1.1.27-2:saYjYopasarjanapratizeDaH ","1.1.27-3:pAWAt paryudAsaH paWitAnAm saYjYAkaraRam ","1.1.27-4:sarvAdyAnantaryakAryArTam ","1.1.27-5:prayojanam qatarAdInAm adBAve ","1.1.27-6:tyadAdiviDO ca ","1.1.27-7:uBasya sarvanAmatve akajarTaH ","1.1.27-8:anyABAvaH dvivacanawAbvizayatvAt ","1.1.27-9:uBayaH anyatra ","1.1.27-10:avacanAt Api tatparavijYAnam iti cet ke api tulyam ","1.1.27-11:BavataH akacCezAtvAni","1.1.29-20:R I","1.1.29-1:pratizeDe BUtapUrvasya upasaNKyAnam ","1.1.29-2:pratizeDe BUtapUrvasya upasaNKyAnAnarTakyam pUrvAdInAm vyavasTAyAm iti vacanAt","1.1.34-:","1.1.34-:","1.1.34-1:avarAdInAm ca punaH sUtrapAWe grahaRAnarTakyam gaRe paWitatvAt","1.1.36-:","antaram bahiryogopasaMvyAnayoH -:","antaram bahiryogopasaMvyAnayoH -1:upasaMvyAnagrahaRam anarTakam bahiryogeRa kftatvAt ","antaram bahiryogopasaMvyAnayoH -2:na vA SAwakayugAdyarTam ","antaram bahiryogopasaMvyAnayoH","1.1.36-3:vAprakaraRe tIyasya Nitsu upasaNKyAnam","1.1.38-1:asarvaviBaktO aviBaktinimittasya upasaNKyAnam ","1.1.38-2:sarvaviBaktiH hi aviSezAt ","1.1.38-3:tralAdInAm ca upasaNKyAnam ","1.1.38-4:aviBaktO itaretarASrayatvAt aprasidDiH ","1.1.38-5:aliNgam asaNKyam iti vA ","1.1.38-6:sidDam tu pAWAt Sloka: evam gate kfti api tulyam etat mAntasya kAryam grahaRam na tatra tataH pare ca aBimatAH kAryAH trayaH kfdarTAH grahaRena yogAH kfttadDitAnAm grahaRam tu kAryam saNKyAviSezam hi aBiniSritAH ye tasmAt svarAdigrahaRam ca kAryam kfttadDitAnAm ca pAWe","1.1.39-1:kft mejantaH ca anikArokAraprakftiH ","1.1.39-2:ananyaprakftiH iti vA ","1.1.39-3:na vA sannipAtalakzaRaH viDiH animittam tadviGAtasya ","1.1.39-4:prayojanam hrasvatam tugviDeH grAmaRikulam ","1.1.39-5:nalopaH vftrahaBiH ","1.1.39-6:udupaDatvam akittvasya nikucite ","1.1.39-7:nABAvaH yaYi dIrGatvasya amunA ","1.1.39-8:Attvam kittvasya upAdAsta ","1.1.39-9:tisfcatasftvam NIbviDeH ","1.1.39-10:tasya dozaH varRASrayaH pratyayaH varRavicAlasya ","1.1.39-11:Attvam pugviDeH krApayati ","1.1.39-12:pug hrasvatvasya adIdapat ","1.1.39-13:tyadAdyakAraH wAbviDeH ","1.1.39-14:iqviDiH AkAralopasya papivAn ","1.1.39-15:matubviBaktyudAttatvam pUrvaniGAtasya ","1.1.39-16:nadIhrasvratvam sambudDilopasya","1.1.41-1:avyayIBAvasya avyayatve prayojanam lugmuKsvaropacArAH","1.1.42- 43-1:Si sarvanAmasTAnam suw anapuMsakasya iti cet jasi SipratizeDaH","1.1.44-1:na vA iti viBAzAyAm arTasaYjYAkaraRam ","1.1.44-2:SabdasaYjYAyAm hi arTAsampratyayaH yaTA anyatra ","1.1.44-3:itikaraRaH arTanirdeSArTaH ","1.1.44-4:samAnaSabdapratizeDaH ","1.1.44-5:na vA viDipUrvakatvAt pratizeDasamapratyayaH yaTA loke ","1.1.44-6:viDyanityatvam anupapannam pratizeDasaYjYAkaraRAt ","1.1.44-7:sidDam tu prasajyapratizeDAt ","1.1.44-8:vipratizidDam tu ","1.1.44-9:na vA prasaNgasAmarTyAt anyatra pratizeDavizayAt ","1.1.44-10:vipratizeDayoH yugapadvacanAnupapattiH ","1.1.44-11:Bavati iti cet na pratizeDaH ","1.1.44-12:na iti cet na viDiH ","1.1.44-13:sidDam tu pUrvasya uttareRa bADitatvAt ","1.1.44-14:sADvanuSAsane asmin yasya viBAzA tasya sADutvam ","1.1.44-15:dveDApratipattiH ","1.1.44-16:yugapadanvAcayayOgapadyam ","1.1.44-17:AcAryadeSaSIlane ca tadvizayatA ","1.1.44-18:tatkIrtane ca dveDApratipattiH ","1.1.44-19:aSizyaH vA viditatvAt ","1.1.44-20:aprApte trisaMSayAH ","1.1.44-21:prApte ca ","1.1.44-22:uBayatra ca","1.1.45-1:samprasAraRasaYjYAyAm vAkyasaYjYA cet varRaviDiH ","1.1.45-2:varRasaYjYA cet nirvfttiH ","1.1.45-3:viBaktiviSezanirdeSaH tu jYApakaH uBayasaYjYAtvasya","1.1.46-1:wakitoH AdyantaviDAne pratyayapratizeDaH ","1.1.46-2:paravacanAt sidDam iti cet na apavAdatvAt ","1.1.46-3:sidDam tu zazWyaDikAre vacanAt ","1.1.46-4:AdyantayoH vA zazTyarTatvAt tadaBAve asampratyayaH","1.1.47-1:mit acaH antyAt paraH iti sTAnaparapratyayApavAdaH ","1.1.47-2:antyAt pUrvaH masjeH anuzaNgasaMyogAdilopArTam ","1.1.47-3:BarjimarcyoH ca ","1.1.47-4:aBakte dIrGanalopasvaraRatvAnusvAraSIBAvAH ","1.1.47-5:parAdO guRavfdDyOttvadIrGanalopAnusvAraSIBAvenakArapratizeDaH ","1.1.47-6:pUrvAnte napuMsakopasarjanahrasvatvam dvigusvaraH ca ","1.1.47-7:na vA bahiraNgalakzaRatvAt","1.1.48-1:ecaH ik savarRAkAranivfttyarTam ","1.1.48-2:dIrGAprasaNgaH tu nivartakatvAt ","1.1.48-3:sidDam eNaH sasTAnatvAt ","1.1.48-4:EcoH ca uttaraBUyastvAt","1.1.49-1:zazWyAH sTAneyogavacanam niyamArTam ","1.1.49-2:avayavazazWyAdizu atiprasaNgaH SAsaH gohaH iti ","1.1.49-3:avayavazazWyAdInAm ca aprAptiH yogasya asandigDatvAt ","1.1.49-4:viSizwA vA zazWI sTAneyogA","1.1.50-1:sTAninaH ekatvanirdeSAt anekAdeSanirdeSAt ca sarvaprasaNgaH tasmAt sTAnentaratamavacanam ","1.1.50-2:sTAne antaratamanirvatake sTAninivfttiH ","1.1.50-3:nirvfttapratipattO nirvfttiH ","1.1.50-4:anarTakam ca ","1.1.50-5:uktam vA ","1.1.50-6:pratyAtmavacanam ca ","1.1.50-7:pratyAtmavacanam aSizyam svaBAvasidDatvAt ","1.1.50-8:antaratamavacanam ca ","1.1.50-9:vyaYjanasvaravyatikrame ca tatkAlaprasaNgaH ","1.1.50-10:akzu ca anekavarRAdeSezu ","1.1.50-11:guRavfdDyejBAvezu ca ","1.1.50-12:fvarRasya guRavfdDiprasaNge sarvaprasaNgaH aviSezAt ","1.1.50-13:na vA fvarRasya sTAne raparaprasaNgAt avarRasya Antaryam ","1.1.50-14:sarvAdeSaprasaNgaH tu anekAltvAt ","1.1.50-15:na vA anekAltvasya tadASrayatvAt fvarRAdeSasya aviGAtaH ","1.1.50-16:samprayogaH vA nazwASvadagDaraTavat ","1.1.50-17:ejavarRayoH AdeSe avarRam sTAninaH avarRapraDAnatvAt ","1.1.50-18:sidDam tu uBayAntaryAt","1.1.51-1:uraRraparavacanam anyanivfttyarTam cet udAttAdizu dozaH ","1.1.51-2:yaH uH sTAne saH raparaH iti cet guRavfdDyoH avarRApratipattiH ","1.1.51-3:sidDam tu prasaNge raparatvAt ","1.1.51-4:AdeSaH raparaH iti cet rIriviDizu raparapratizeDaH ","1.1.51-5:udAttAdizu ca ","1.1.51-6:ekAdeSasya upasaNKyAnam ","1.1.51-7:avayavagrahaRAt sidDam iti cet AdeSe rAntapratizeDaH ","1.1.51-8:aBakte dIrGalatvayagaByastasvarahalAdiSezavisarjanIyapratizeDaH pratyayAvyavasTA ca ","1.1.51-9:pUrvAnte rvavaDAraRam visarjanIyapratizeDaH yaksvaraH ca ","1.1.51-10:parAdO akAralopOtvapukpratizeDaH caNi upaDAhrasvatvam iwaH avyavasTA aByAsalopaH aByastatAdisvaraH dIrGatvam ca","1.1.52-1:alaH antyasya iti sTAne vijYAtasya anusaMhAraH ","1.1.52-2:itaraTA hi anizwaprasaNgaH ","1.1.52-3:yogaSeze ca","1.1.53-1:tAtaNi NitkaraRasya sAvakASatvAt vipratizeDAt sarvAdeSaH","1.1.54-1:alaH antyasya adeH parasya anekAlSit sarvasya iti apavAdavipratizeDAt sarvAdeSaH","1.1.56-1:sTAnyAdeSapfTaktvAt AdeSe sTAnivadanudeSaH guruvat guruputre iti yaTA ","1.1.56-2:alviDO pratizeDe aviSezaRe aprAptiH tasya adarSanAt ","1.1.56-3:sAmAnyAtideSe viSezAnatideSaH ","1.1.56-4:sati ASraye viDiH izwaH ","1.1.56-5:pratizeDaH tu prApnoti alviDitvAt ","1.1.56-6:na vA AnudeSikasya pratizeDAt itareRa BAvaH ","1.1.56-7:AdeSyalviDipratizeDe kuruvaDapibAm guRavfdDipratizeDaH ","1.1.56-8:AdeSyAdeSe iti cet suptiNkfdatidizwezu upasaNKyAnam ","1.1.56-9:ekadeSavikftasya upasaNKyAnam ","1.1.56-10:ekadeSavikftasya ananyatvAt sidDam ","1.1.56-11:anityatvavijYAnam tu tasmAt upasaNKyanam","1.1.56-20:23","1.1.56-410: BAradvAjIyAH paWanti ekadeSavikftezu upasaNKyAnam anAdeSatvAt rUpAnyatvAt ca AdeSaH sTAnivat iti cet na anASritatvAt ASrayaH iti cet alviDiprasaNgaH ] :","1.1.56-12:anupapannam sTAnyAdeSatvam nityatvAt ","1.1.56-13:sidDam tu yaTA lOkikavEdikezu aBUtapUrve api sTAnaSabdaprayogAt ","1.1.56-14:kAryavipariRAmAt vA sidDam ","1.1.56-15:apavAdaprasaNgaH tu sTAnivattvAt ","1.1.56-16:uktam vA ","1.1.56-17:sidDam tu zazWInirdizwasya sTAnivadvacanAt ","1.1.56-18:tasya dozaH tayAdeSe uBayapratizeDaH ","1.1.56-19:jAtyaKyAyAm vacanAtideSe sTAnivadBAvapratizeDaH ","1.1.56-20:NyAbgrahaRe adIrGaH ","1.1.56-21:AhiBuvoH IwpratizeDaH ","1.1.56-22:vaDyAdeSe vfdDitatvapratizeDaH ","1.1.56-23:iqviDiH ca ","1.1.56-24:AkArAntAt nukzukpratizeDaH ","1.1.56-25:loqAdeSe SABAvajaBAvaDitvahilopEttvapratizeDaH ","1.1.56-26:trayAdeSe srantapratizeDaH ","1.1.56-27:AmviDO ca ","1.1.56-28:svare vasvAdeSe ","1.1.56-29:goH pUrvRittvAtvasvarezu ","1.1.56-30:karotipibyoH pratizeDaH ","1.1.56-31:uktam vA","1.1.57-1:acaH pUrvavijYAnAt EcoH sidDam ","1.1.57-2:tatra AdeSalakzaRapratizeDaH ","1.1.57-3:asidDavacanAt sidDam iti cet utsargalakzaRAnAm anudeSaH ","1.1.57-4:asidDavacanAt sidDam iti cet na anyasya asidDavacanAt anyasya BAvaH ","1.1.57-5:tasmAt sTAnivadvacanam asidDatvam ca ","1.1.57-6:uktam vA SlokavArttika: kAmam atidiSyatAm vA sat ca asat ca api na iha BAraH asti kalpyaH hi vAkyaSezaH vAkyam vaktari aDInam hi ","1.1.57-7:anantarasya cet ekAnanudAttadvigusvaragatiniGAtezu upasaNKyAnam ","1.1.57-8:pUrvamAtrasya iti cet upaDAhrasvatvam ","1.1.57-9:gurusaYjYA ca ","1.1.57-10:na vA saMyogasya apUrvaviDitvAt ","1.1.57-11:ekAdeSasya upasaNKyAnam ","1.1.57-12:uBayanimittatvAt ","1.1.57-13:uBayAdeSatvAt ca ","1.1.57-14:halacoH AdeSaH sTAnivat iti cet viMSateH tilopaH ekAdeSaH ","1.1.57-15:sTUlAdInAm yaRAdilope avAdeSaH ","1.1.57-16:kekayimitrayvoH iyAdeSe etvam ","1.1.57-17:uttarapadalope ca ","1.1.57-18:yaNlope yaRiyaNuvaNaH ","1.1.57-19:asTAnivattve yaNlope guRavfdDipratizeDaH ","1.1.57-20:aviSezeRa sTAnivat iti cet lopayaRAdeSe guruviDiH ","1.1.57-21:dvirvacanAdayaH ca pratizeDe ","1.1.57-22:ksalope lugvacanam ","1.1.57-23:hanteH Gatvam ","1.1.57-24:grahaRezu sTAnivat iti cet jagDyAdizu AdeSapratizeDaH ","1.1.57-25:yaRAdeSe yulopetvAnunAsikAttvapratizeDaH ","1.1.57-26:rAyAtvapratizeDaH ca ","1.1.57-27:dIrGe yalopapratizeDaH ","1.1.57-28:ataH dIrGe yalopavacanam","1.1.58-1:pratizeDe svaradIrGayalopezu lopAjAdeSaH na sTAnivat ","1.1.58-2:kvilugupaDAtvacaNparanirhrAsakutvezu upasaNKyAnam ","1.1.58-3:pUrvatrAsidDe ca ","1.1.58-4:prayojanam ksalopaH salope ","1.1.58-5:daDaH AkAralope AdicaturTatve ","1.1.58-6:halaH yamAm yami lope ","1.1.58-7:allopaRilopO saMyogAntalopapraBftizu ","1.1.58-8:dvirvacanAdIni ca ","1.1.58-9:vareyalopasvaravarjam ","1.1.58-10:tasya dozaH saMyogAdilopalatvaRatvezu","1.1.59-1:AdeSe sTAnivadanudeSAt tadvataH dvirvacanam ","1.1.59-2:tatra aByAsarUpam ","1.1.59-3:ajgrahaRam tu jYApakam rUpasTAnivadBAvasya ","1.1.59-4:tatra gANpratizeDaH ","1.1.59-5:kFtyejantadivAdinAmaDAtuzu aByAsarUpam ","1.1.59-6:pratyaye iti cet kFtyejantanamaDAtuzu aByAsarUpam ","1.1.59-7:dvirvacananimitte aci sTAnivat iti cet RO sTAnivadvacanam ","1.1.59-8:oH puyaRjizu vacanam jYApakam RO sTAnivadBAvasya Cross ref","1.1.60-1:lopasaYjYAyAm arTasatoH uktam ","1.1.60-2:sarvaprasaNgaH tu sarvasya anyatra adfzwatvAt ","1.1.60-3:tatra pratyayalakzaRapratizeDaH ","1.1.60-4:sidDam tu prasaktAdarSanasya lopasaYjYitvAt Cross ref","1.1.61-1:lumati pratyayagrahaRam apratyayasaYjYApratizeDArTam ","1.1.61-2:prayojanam tadDitaluki kaMsIyaparaSavyayoH luki ca goprakftinivfttyarTam ","1.1.61-3:yogaviBAgAt sidDam ","1.1.61-4:kaMsIyaparaSavyayoH viSizwanirdeSAt sidDam ","1.1.61-5:uktam vA ","1.1.61-6:zazWInirdeSArTam tu ","1.1.61-7:anirdeSe hi zazWyarTAprasidDiH ","1.1.61-8:sarvAdeSArTam vA vacanaprAmARyAt ","1.1.61-9:uttarArTam tu","1.1.62-1:pratyayalope pratyayalakzaRavacanam sadanvAKyAnAt SAstrasya ","1.1.62-2:luki upasaNKyAnam ","1.1.62-3:lope hi viDAnam ","1.1.62-4:na vA adarSanasya lopasaYjYitvAt ","1.1.62-5:pratyayAdarSanam tu lumatsaYjYam ","1.1.62-6:tatra luki SluviDipratizeDaH ","1.1.62-7:na vA pfTaksaYjYAkaraRAt ","1.1.62-8:lumati pratizeDAt vA ","1.1.62-9:sataH nimittABAvAt padasaYjYABAvaH ","1.1.62-10:tugdIrGatvayoH ca vipratizeDAnupapattiH ekayogalakzaRatvAt parivIH iti ","1.1.62-11:sidDam tu sTAnisaYjYAnudeSAt AnyaBAvyasya ","1.1.62-12:BasaYjYANIpzPagorAtvezu ca sidDam ","1.1.62-13:tasya dozaH NOnakAralopettvemviDayaH ","1.1.62-14:prayojanam apfktaSilope numamAmO guRavfdDidIrGatvemaqAwSnamviDayaH ","1.1.62-15:BasaYjYANIpzPgorAtvezu dozaH","1.1.63-1:lumati pratizeDe ekapadasvarasya upasaNKyAnam ","1.1.63-2:sarvAmantritasijluksvaravarjam ","1.1.63-3:prayojanam Yinikilluki svarAH ","1.1.63-4:paTimaToH sarvanAmasTAne ","1.1.63-5:ahnaH raviDO ","1.1.63-6:uttarapadatve ca apadAdiviDO ","1.1.63-7:dvandve antyasya ","1.1.63-8:sicaH usaH aprasaNgaH AkAraprakaraRAt ","1.1.63-9:yuzmadasmadoH sTagrahaRAt ","1.1.63-10:Ami lilopAt tasya ca aniGAtaH tasmAt ca niGAtaH ","1.1.63-11:aNgADikAre iwaH viDipratizeDO ","1.1.63-12:krameH dIrGatvam ca ","1.1.63-13:na lumatA tasmin iti cet haniRiNAdeSAH talope","1.1.65-1:upaDAsaYjYAyAm algrahaRam antyanirdeSaH cet saNGAtapratizeDaH ","1.1.65-2:antyavijYAnAt sidDam iti cet na anarTake alontyaviDiH anaByAsavikAre ","1.1.65-3:prayojanam avyaktAnukaraRasya ataH itO ","1.1.65-4:GvasoH et hO aByAsalopaH ca ","1.1.65-5:Api lopaH akaH anaci ","1.1.65-6:atra lopaH aByAsasya ","1.1.65-7:alaH antyAt pUrvaH al upaDA iti vA ","1.1.65-8:avacanAt lokavijYAnAt sidDam","1.1.66- 67-1:nirdizwagrahaRam AnantaryArTam ","1.1.66- 67-2:tasmin tasmAt iti pUrvottarayoH yogayoH aviSezAt niyamArTam vacanam daDi udakam pacati odanam ","1.1.66- 67-3:uBayanirdeSe vipratizeDAt paYcamInirdeSaH ","1.1.66- 67-4:prayojanam ataH lasArvaDAtukanudAttatve ","1.1.66- 67-5:bahoH izWAdInAm AdilopaH ","1.1.66- 67-6:gotaH Rit ","1.1.66- 67-7:rudAdiByaH sArvaDAtuke ","1.1.66- 67-8:Ane muk It AsaH ","1.1.66- 67-9:Ami sarvanAmnaH suw ","1.1.66- 67-10:GeH Niti Aw nadyAH ","1.1.66- 67-11:yAw ApaH ","1.1.66- 67-12:NamaH hrasvAt aci Namuw nityam ","1.1.66- 67-13:viBaktiviSezanirdeSAnavakASatvAt avipratizeDaH ","1.1.66- 67-14:yaTArTam vA zazWInirdeSaH ","1.1.66- 67-15:prakalpakam iti cet niyamABAvaH ","1.1.66- 67-16:prakftivikArAvyavasTA ca ","1.1.66- 67-17:saptamIpaYcamyoH ca BAvAt uBayatra zazWIprakxptiH tatra uBayakAryaprasaNgaH","1.1.68-1:Sabdena arTagateH arTasya asamBavAt tadvAcinaH saYjYApratizeDArTam svaMrUpavacanam ","1.1.68-2:na vA SabdapUrvakaH hi arTe sampratyayaH tasmAt arTanivfttiH ","1.1.68-3:saYjYApratizeDAnarTakyam vacanaprAmARyAt ","1.1.68-4:mantrAdyarTam iti cet SAstrasAmarTyAt arTagateH sidDam ","1.1.68-5:sit tadviSezARAm vfkzAdyarTam ","1.1.68-6:pit paryAyavacanasya ca svAdyarTam ","1.1.68-7:jit paryAyavacanasya eva rAjAdyarTam ","1.1.68-8:Jit tasya ca tadviSezARAm ca matsyAdyarTam","1.1.69-1:aR savarRasya iti svarAnunAsikyakAlaBedAt ","1.1.69-2:tatra pratyAhAragrahaRe savarRAgrahaRam anupadeSAt ","1.1.69-3:hrasvasampratyayAt iti cet uccAryamARasampratyAyakatvAt Sabdasya avacanam ","1.1.69-4:arRapAWe upadeSaH iti cet avarkAlatvAt pariBAzAyAH anupadeSaH ","1.1.69-5:tasmAt upadeSaH ","1.1.69-6:tatra anuvfttinirdeSe savarRAgrahaRam anaRtvAt ","1.1.69-7:[ = Sloka] vacanAt yatra tat na asti savarRe aRgrahaRam apariBAzyam AkftigrahaRAt ","1.1.69-8:ananyatvAt ca ","1.1.69-9:anekAntaH hi ananyatvakaraH","533: aparaH Aha savarRe aRgrahaRam apariBAzyam AkftigrahaRAt ananyatvam anekAntaH hi ananyatvakaraH] ","533: aparaH Aha savarRe aRgrahaRam apariBAzyam AkftigrahaRAt ananyatvam anekAntaH hi ananyatvakaraH] ","-10:tadvat ca halgrahaRezu ","533: aparaH Aha savarRe aRgrahaRam apariBAzyam AkftigrahaRAt ananyatvam anekAntaH hi ananyatvakaraH] ","-11:drutavilambitayoH ca anupadeSAt ","533: aparaH Aha savarRe aRgrahaRam apariBAzyam AkftigrahaRAt ananyatvam anekAntaH hi ananyatvakaraH] ","-12:vfttipfTaktvam tu na upapadyate ","533: aparaH Aha savarRe aRgrahaRam apariBAzyam AkftigrahaRAt ananyatvam anekAntaH hi ananyatvakaraH] ","-13:tasmAt tatra taparanirdeSAt sidDam","1.1.70-1:taparaH tatkAlasya iti niyamAfTam iti cet dIrGagrahaRe svaraBinnAgrahaRam ","1.1.70-2:prApakam iti cet hrasvagrahaRe dIrGaplutapratizeDaH ","1.1.70-3:vipratizeDAt sidDam ","1.1.70-4:drutAyAm taparakaraRe maDyamavilambitayoH upasaNKyAnam kAlaBedAt ","1.1.70-5:sidDam tu avasTitAH varRAH vaktuH cirAciravacanAt vfttayaH viSizyante","1.1.71-1:AdiH antyena saha iti asampratyayaH saYjYinaH anirdeSAt ","1.1.71-2:sidDam tu AdiH itA saha tanmaDyasya iti vacanAt ","1.1.71-3:sambanDiSabdEH vA tulyam","1.1.72-1:yena viDiH tadantasya iti cet grahaRopADInAm tadantopADiprasaNgaH ","1.1.72-2:sidDam tu viSezaRaviSezyayoH yaTezwatvAt ","1.1.72-3:samAsapratyayaviDO pratizeDaH ","1.1.72-4:ugidvarRagrahaRavarjam ","1.1.72-5:akacSnamvataH sarvanAmAvyayaDAtuviDO upasaNKyAnam ","1.1.72-6:sidDam tu tadantAntavacanAt ","1.1.72-7:tadekadeSavijYAnAt vA sidDam ","1.1.72-8:prayojanam sarvanAmAvyayasaYjYAyAm ","1.1.72-9:upapadaviDO BayAQyAdigrahaRam ","1.1.72-10:NIbviDO ugidgrahaRam ","1.1.72-11:pratizeDe svasrAdigrahaRam ","1.1.72-12:aparimARabistAdigrahaRam ca pratizeDe ","1.1.72-13:diti ","1.1.72-14:roRyAH aR ","1.1.72-15:tasya ca ","1.1.72-16:raTasItAhaleByaH yadviDO ","1.1.72-17:susarvArDadikSabdeByaH janapadasya ","1.1.72-18:ftoH vfdDimadviDO avayavAnAm ","1.1.72-19:WaYviDO saNKyAyAH ","1.1.72-20:DarmAt naYaH ","1.1.72-21:padANgADikAre tasya ca taduttarapadasya ca ","1.1.72-22:prayojanam izwikezIkAmAlAnAm citatUlaBArizu ","1.1.72-23:mahadapsvasftFRAm dIrGaviDO ","1.1.72-24:padyuzmadasmadasTyAdyanquhaH num ","1.1.72-25:dyupaTimaTipuNoasaKicaturanaquttrigrahaRam ","1.1.72-26:tyadAdiviDiBastrAdistrIgrahaRam ca ","1.1.72-27:varRagrahaRam ca sarvatra ","1.1.72-28:pratyayagrahaRam ca apaYcamyAH ","1.1.72-29:yasmin viDiH tadAdO algrahaRe","1.1.73-1:vfdDasaYjYAyAm ajasanniveSAt anAditvam ","1.1.73-2:ekAntAditve ca sarvaprasaNgaH ","1.1.73-3:sidDam ajAkftinirdeSAt ","1.1.73-4:vyaYjanasya avidyamAnatvam yaTA anyatra ","1.1.73-5:vA nAmaDeyasya ","1.1.73-6:gotrottarapadasya ca ","1.1.73-7:gotrAntAt vA asamastavat ","1.1.73-8:jihvAkAtyaharitakAtyavarjam","1.2.1-1:Nitkidvacane tayoH aBAvAt aprasidDiH ","1.2.1-2:Bavati iti cet AdeSapratizeDaH ","1.2.1-3:saYjYAkaraRe kNidgrahaRe asampratyayaH SabdaBedAt ","1.2.1-4:tadvadatideSe akidviDiprasaNgaH ","1.2.1-5:sidDam tu prasajyapratizeDAt ","1.2.1-6:sarvatra sanantAt AtmanepadapratizeDaH ","1.2.1-7:sidDam tu pUrvasya kAryAtideSAt ","1.2.1-8:pfTaganubanDatve prayojanam vacisvapiyajAdInAm asamprasAraRam sArvaDAtukacaNAdizu ","1.2.1-9:jAgraH aguRaviDiH ","1.2.1-10:kuwAdInAm iwpratizeDaH ","1.2.1-11:ktvAyAm kitpratizeDaH ca","1.2.4-1:apit Nit iti cet SabdekAdeSapratizeDaH AdivattvAt ","1.2.4-2:na pit Nit iti cet uttamEkAdeSapratizeDaH","1.2.5-1:fdupaDeByaH liwaH kittvam guRAt vipratizeDena ","1.2.5-2:uktam vA","1.2.6-1:inDeH CandovizayatvAt BuvaH vukaH nityatvAt tAByAm kidvacanAnarTakyam","1.2.10-1:damBeH halgrahaRasya jAtivAcakatvAt sidDam","1.2.21-1:udupaDAt SapaH","1.2.22-1:pUNaH ktvAnizWayoH iwi vAprasaNgaH sewprakaraRAt ","1.2.22-2:na vA sewtvasya akidASrayatvAt aniwi vA kittvam ","1.2.22-3:iqviDO hi agrahaRam","1.2.26-1:ralaH ktvAsanoH kittvam","1.2.27-1:hrasvAdizu samasaNKyAprasidDiH nirdeSavEzamyAt ","1.2.27-2:sidDam tu samasNKyatvAt ","1.2.27-3:trayARAm hi vikAranirdeSaH ","1.2.27-4:dIrGaplutayoH tu pUrvasaYjYAprasaNgaH ","1.2.27-5:sidDam tu taparanirdeSAt ","1.2.27-6:drutAdizu ca uktam","1.2.28-1:hrasvAdiviDiH alaH antyasya iti cet vacipracCiSamAdipraBftihanigamidIrGezu ajgrahaRam ","1.2.28-2:acaH cet napuMsakahrasvAkftsArvaDAtukanAmidIrGezu anantyapratizeDaH ","1.2.28-3:saYjYayA viDAne niyamaH ","1.2.28-4:ajgrahaRam saMyogAcsamudAyanivfttyarTam","1.2.29- 30-1:uccanIcasya anavasTitatvAt saYjYAprasidDiH ","1.2.29- 30-2:sidDam tu samAnaprakramavacanAt","1.2.31-1:samAhAraH acoH cet na aBAvAt ","1.2.31-2:guRayoH cet na acprakaraRAt ","1.2.31-3:sidDam tu acsamudAyasya aBAvAt tadguRe sampratyayaH","1.2.32-1:svaritasyArDahrasvodAttAt A udAttasvaritaparasyasannatarAt UrDvam udAttAdanudAttasyasvaritAt kAryam svaritAt iti sidDyarTam ","1.2.32-2:svaritodAttArTam ca ","1.2.32-3:svaritodAttAt ca asvaritArTam ","1.2.32-4:svaritaparasannatarArTam ca ","1.2.32-5:devabrahmaRoH anudAttavacanam jYApakam svaritAt iti sidDatvasya","1.2.37-1:subrahmaRyAyam okAraH udAttaH ","1.2.37-2:AkAraH AKyAte parAdiH ca ","1.2.37-3:vAkyAdO ca dve dve ","1.2.37-4:maGavanvarjam ","1.2.37-5:sutyAparARAm antaH ","1.2.37-6:asO iti antaH ","1.2.37-7:amuzya iti antaH ","1.2.37-8:syAntasya upottamam ca ","1.2.37-9:vA nAmaDeyasya","1.2.38-1:devabrahmaRoH anudAttatvam eke","1.2.39-1:svaritAt saMhitAyAm anudAttAnAm iti cet dvyekayoH EkaSrutyavacanam ","1.2.39-2:aviSezeRa EkaSrutyam iti cet vyavahitAnAm aprasidDiH ","1.2.39-3:anekam api iti tu vacanAt sidDam","1.2.41-1:apfktasaYjYAyAm halgrahaRam svAdilope halaH agrahaRArTam","1.2.41-2:aRiYoH lugarTam iti cet Re atiprasaNgaH ","1.2.41-3:vacanaprAmARyAt iti cet PagnivfttyarTam vacanam ","1.2.41-4:pElAdizu vacanAt sidDam","1.2.42-1:tatpuruzaH samAnADikaraRaH karmaDArayaH iti cet samAsEkArTatvAt aprasidDiH ","1.2.42-2:sidDam tu padasAmAnADikaraRyAt","1.2.43-1:praTamAnirdizwam samAse upasajanam iti cet anirdeSAt praTamAyAH samAse saYjYAprasidDiH ","1.2.43-2:sidDam tu samAsaviDAne vacanAt ","1.2.43-3:na vA tAdarTyAt tAcCabdyam ","1.2.43-4:yasya viDO praTamAnirdeSaH tataH anyatra api upasarjanasaYjYAprasaNgaH ","1.2.43-5:sidDam tu yasya viDO tam prati iti vacanAt ","1.2.43-6:zazWyantayoH upasarjanatve uktam ","1.2.43-7:uktam vA","1.2.44-1:ekaviBaktO azazWyantavacanam ","1.2.44-2:uktam vA ","1.2.44-3:prayojanam dviguprAptApannAlampUrvopasargAH ktArTe","1.2.45-1:arTavati anekapadaprasaNgaH ","1.2.45-2:samudAyaH anarTakaH iti cet avayavArTavattvAt samudAyArTavattvam yaTA loke ","1.2.45-3:vAkyapratizeDaH arTavattvAt ","1.2.45-4:padArTAt anyasya anupalabDiH iti cet padArTABisambanDasya upalabDiH ","1.2.45-5:tasmAt pratizeDaH ","1.2.45-6:arTavatsamudAyAnAm samAsagrahaRam niyamArTam ","1.2.45-7:arTavattA na upapadyate kevalena avacanAt ","1.2.45-8:na vA pratyayena nityasambanDAt kevalasya aprayogaH ","1.2.45-9:sidDam tu anvayavyatirekAByAm ","1.2.45-10:varRasya arTavadanarTakatve uktam ","1.2.45-11:saNGAtArTavattvAt ca iti cet dfzwaH hi atadarTena guRena guRinaH arTaBAvaH ","1.2.45-12:nipAtasya anarTakasya prAtipadikatvam ","1.2.45-13:apratyayaH iti cet tibekAdeSe pratizeDaH antavattvAt ","1.2.45-14:na pratyayaH iti cet UNekAdeSe pratizeDaH AdivattvAt ","1.2.45-15:sublope ca pratyayalakzaRatvAt","1.2.46-1:samAsagrahaRe uktam","1.2.47-1:napuMsakahrasvatve prAtipadikagrahaRam tibnivfttyarTam ","1.2.47-2:avyayapratizeDaH ","1.2.47-3:na vA liNgABAvAt ","1.2.47-4:yaYekAdeSadIrGEttvezu pratizeDaH ","1.2.47-5:yaYekAdeSadIrGEttvezu bahiraNgalakzaRatvAt sidDam","1.2.48-1:upasarjanahrasvatve ca ","1.2.48-2:gowANgrahaRam kfnnivfttyarTam ","1.2.48-3:IyasaH bahuvrIhO puMvadvacanam ","1.2.48-4:pUrvapadasya ca pratizeDaH gosamAsanivfttyarTam ","1.2.48-5:kapi ca ","1.2.48-6:dvandve ca ","1.2.48-7:uktam vA","1.2.49-1:tadDitaluki avantyAdInAm pratizeDaH ","1.2.49-2:tadDitaluki avantyAdInAm apratizeDaH alukparatvAt","1.2.51-1:anyatra aBiDeyavyaktivacanaBAvAt lupi yuktavadanudeSaH ","1.2.51-2:lupaH adarSanasaYjYitvAt arTagatiH na upapadyate ","1.2.51-3:na vA adarSanasya aSakyatvAt arTagatiH sAhacaryAt ","1.2.51-4:yogABAvAt ca anyasya ","1.2.51-5:samAse uttarapadasya bahuvacanasya lupaH","1.2.52-1:viSezaRAnAm vacanam jAtinivfttyarTam ","1.2.52-2:samAnADikaraRatvAt sidDam ","1.2.52-3:harItakyAdizu vyaktiH ","1.2.52-4:KalatikAdizu vacanam ","1.2.52-5:manuzyalupi pratizeDaH","1.2.58-1:jAtyAKyAyAm sAmAnyABiDAnAt EkArTyam ","1.2.58-2:tatra ekavacanAdeSe uktam ","1.2.58-3:arTAtideSAt sidDam ","1.2.58-4:saNKyAprayoge pratizeDaH ","1.2.58-5:asmadaH nAmayuvapratyayayoH ca ","1.2.58-6:aSizyam vA bahuvat pfTakttvABiDAnAt ","1.2.58-7:jAtiSabdena hi dravyABiDAnam","1.2.61- 62-1:punarvasuviSAKayoH supAm sulukpUrvasavarRa iti sidDam","1.2.64-1:pratyarTam SabdaniveSAt na ekena anekasya aBiDAnam ","1.2.64-2:tatra anekArTABiDAne anekaSabdatvam ","1.2.64-3:tasmAt ekaSezaH ","1.2.64-4:ekaviBaktO iti cet na aBAvAd viBakteH ","1.2.64-5:pfTak sarvezAm iti cet ekaSeze pfTak viBaktyupalabDiH tadASrayatvAt ","1.2.64-6:samAse iti cet svarasamAsAntezu dozaH ","1.2.64-7:aNgASraye ca ekaSezavacanam ","1.2.64-8:tiNsamAse tiNsamAsavacanam ","1.2.64-9:tiNviDipratizeDaH ca ","1.2.64-10:asamAse vacanalopaH ","1.2.64-11:dvivacanabahuvacanaviDiH ","1.2.64-12:dvandvapratizeDaH ca ","1.2.64-13:viBaktyantAnAm ekaSeze ekaviBaktyantAnAm iti tu pfTagviBaktipratizeDArTam ","1.2.64-14:na vA arTavipratizeDAt yugapadvacanABAvaH ","1.2.64-15:anekArTASrayaH ca punaH ekaSezaH ","1.2.64-16:tasmAt na ekaSabdatvam ","1.2.64-17:prAtipadikAnAm ekaSeze mAtfmAtroH pratizeDaH sarUpatvAt ","1.2.64-18:haritahariRaSyetaSyenarohitarohiRAnAm striyAm upasaNKyAnam ","1.2.64-19:na vA padasya arTe prayogAt ","1.2.64-20:sarvatra apatyAdizu upasaNKyAnam ","1.2.64-21:sidDam tu samAnArTAnAm ekaSezavacanAt ","1.2.64-22:nAnArTAnAm api sarUpARAm ","1.2.64-23:ekArTAnAm api virUpARAm ","1.2.64-24:svaraBinnAnAm yasya uttarasvaraviDiH ","1.2.64-25:saNKyAyAH arTAsampratyayAt anyapadArTatvAt ca anekaSezaH","1.2.64-26:praTamamaDyamottamAnAm ekaSezaH sarUpatvAt ","1.2.64-27:dvivacanabahuvacanAprasidDiH ca ekArTatvAt ","1.2.64-28:na EkArTyam iti cet AramBAnarTakyam ","1.2.64-29:aSizyaH ekaSezaH ekena uktatvAt ","1.2.64-30:pratyarTam SabdaniveSAt ekena anekasya aBiDAnAt apratyarTam iti cet tat api pratyarTam eva ","1.2.64-31:yAvatAm aBiDAnam tAvatAm prayogaH nyAyyaH iti cet ekena api anekasya aBiDAnam ","1.2.64-32:ekena uktatvAt aparasya prayogaH anupapannaH iti cet anuktatvAt plakzeRa nyagroDasya nyagroDaprayogaH ","1.2.64-33:aBiDAnam punaH svABAvikam ","1.2.64-34:uBayadarSanAt ca ","1.2.64-35:AkftyaBiDAnAt vA ekam viBaktO vAjapyAyanaH ","1.2.64-36:praKyAviSezAt ","1.2.64-37:avyapavargagateH ca ","1.2.64-38:jYAyate ca ekopadizwam ","1.2.64-39:DarmaSAstram ca taTA ","1.2.64-40:asti ca ekam anedkADikaraRasTam yugapat itIndravat vizayaH ","1.2.64-41:na ekam anekADikaraRasTam yugapat iti cet taTA ekaSeze ","1.2.64-42:dravyABiDAne hi AkftyasampratyayaH ","1.2.64-43:tatra asarvadravyagatiH ","1.2.64-44:codanAyAm ca ekasya upADivftteH ","1.2.64-45:dravyABiDAnam vyAqiH ","1.2.64-46:taTA ca liNgavacanasidDiH ","1.2.64-47:codanAsu ca tasya AramBAt ","1.2.64-48:na ca ekam anekADikaraRasTam yugapat ","1.2.64-49:vinASe prAdurBAve ca sarvam taTA syAt ","1.2.64-50:asti ca vErUpyam ","1.2.64-51:taTA ca vigrahaH ","1.2.64-52:vyarTezu ca muktasaMSayam ","1.2.64-53:liNgavacanasidDiH guRasya anityatvAt","1.2.64-54:guRavacanavat vA ","1.2.64-55:aDikaraRagatiH sAhacaryAt ","1.2.64-56:na cEkam anekADikaraRasTam yugapat iti Adityavat vizayaH ","1.2.64-57:avinASaH anASritatvAt ","1.2.64-58:vErUpyavigrahO dravyaBedAt ","1.2.64-59:","1.2.68-1:asarUpARAm yuvasTavirastrIpuMsAnAm viSezasya avivakzitatvAt sAmAnyasya ca vivakzitatvAt sidDam ","1.2.68-2:brAhmaRavatsAbrAhmaRIvatsayoH viBaktiparasya viSezavAcakatvAt anekaSezaH","1.2.69-1:praDAne kAryasampratyayAt SezaH ","1.2.69-2:AkftivAcitvAt ekavacanam","1.2.70- 71-1:BrAtfputrapitfSvaSurARAm kAraRAt dravye SabdaniveSaH iti cet tulyakAraRatvAt sidDam ","1.2.70- 71-2:darSanam hetuH iti cet tulyam ","1.2.70- 71-3:tadvizayam ca ","1.2.70- 71-4:anyatra api tadvizayadarSanAt","1.2.72-1:tyadAditaH Seze punnapuMsakataH liNgavacanAni ","1.2.72-2:advandvatatpuruzaviSezaRAnAm ","1.2.72-3:tyadAdInAm sAmAnyArTatvAt ","1.2.72-4:parasya ca uBayavAcitvAt ","1.2.72-5:pUrvaSezadarSanAt ca ","1.2.72-6:sAmAnyaviSezavAcinoH ca dvandvABAvAt sidDam","1.3.1-1:pAWena DAtusaYjYAyAm samAnaSabdapratizeDaH ","1.3.1-2:parimARagrahaRam ca ","1.3.1-3:kriyAvacane upasargapratyayapratizeDaH ","1.3.1-4:saNGAtena arTagateH ","1.3.1-5:astiBavatividyatInAm DAtutvam ","1.3.1-6:pratyayArTasya avyatirekAt prakftyantarezu DAtoH ca arTABedAt pratyayAntarezu sidDam tu anvayavyatirekAByAm ","1.3.1-7:kriyAviSezakaH upasargaH ","1.3.1-8:BAvavacane tadarTapratyayapratizeDaH ","1.3.1-9:itaretarASrayam ca pratyaye BAvavacanatvam tasmAt ca pratyayaH ","1.3.1-10:sidDam tu nityaSabdatvAt anASritya BAvavacanatvam pratyayaH ","1.3.1-11:praTamaBAvagrahaRam ca ","1.3.1-12:BUvAdipAWaH prAtipadikARapayatyAdinivfttyarTaH ","1.3.1-13:svarAnubanDajYApanAya ca","1.3.2-1:itsaYjYAyAm sarvaprasaNgaH aviSezAt ","1.3.2-2:sidDam tu upadeSane anunAsikavacanAt","1.3.3-1:halantye sarvprasaNgaH sarvAntyatvAt ","1.3.3-2:sidDam tu vyavasitAntyatvAt ","1.3.3-3:lakArasya anubanDAjYApitatvAt halgrahaRAprasidDiH ","1.3.3-4:sidDam tu lakAranirdeSAt ","1.3.3-5:ekaSezanirdeSAt vA ","1.3.3-6:prAtipadikapratizeDaH akfttadDite ","1.3.3-7:idarTABAvAt sidDam","1.3.4-1:viBaktO tavargapratizeDaH atadDite","1.3.7-1:cuYcupcaRapoH cakArapratizeDaH ","1.3.7-2:itkAryABAvAt sidDam ","1.3.7-3:pitkaraRam kimarTam iti cet paryAyArTam ","1.3.7-4:iraH upasaNKyAnam ","1.3.7-5:avayavagrahaRAt iti cet ididviDiprasaNgaH","1.3.9-1:itaH lope RalktvAnizWAsu upasaNKyAnam itpratizeDAt ","1.3.9-2:sidDam tu RalAdInAm grahaRapratizeDAt ","1.3.9-3:nirdizwalopAt vA ","1.3.9-4:tatra tusmAnAm pratizeDaH ","1.3.9-5:na vA uccAraRasAmarTyAt ","1.3.9-6:anubanDalope BAvABAvayoH vipratizeDAt aprasidDiH ","1.3.9-7:sidDam tu apavAdanyAyena ","1.3.9-8:BAvaH hi kAryAfTaH nanyArTaH lopaH ","1.3.9-9:ekAntaH tatra upalabDeH ","1.3.9-10:tatra asarUpasarvAdeSadAppratizeDe pfTaktvanirdeSaH anAkArAntatvAt ","1.3.9-11:anekAnte vfttiviSezaH ","1.3.9-12:anantaraH iti cet pUrvaparayoH itkftaprasaNgaH ","1.3.9-13:sidDam tu vyavasitapAWAt ","1.3.9-14:itaraTA hi ekAnte api sandehaH ","1.3.9-15:vfttAt vA","1.3.10-1:saYjYAsamAsanirdeSAt sarvaprasaNgaH anudeSasya yaTAsaNKyavacanam niyamArTam ","1.3.10-2:saYjYAsamAsanirdeSaH lpfTak viBaktisaYjYyanuccAraRArTaH ","1.3.10-3:prakaraRe ca sarvasampratyayArTaH ","1.3.10-4:saNKyAsAmyam SabdataH cet RalAdayaH parasmEpadAnAm qArOrasaH praTamasya ayavAyAvaH ecaH iti anirdeSaH ","1.3.10-5:lfluwornandyarIhaRasinDutakzaSilAdizu dozaH ","1.3.10-6:AtmanepadaviDinizWAsArvaDAtukadvigrahaRezu ","1.3.10-7:eNaH pUrvatve pratizeDaH ","1.3.10-8:atiprasaNgaH guRavfdDipratizeDe kNiti ","1.3.10-9:udi kUle rujivahoH ","1.3.10-10:tacCIlAdizu DAtutrigrahaRezu ","1.3.10-11:GaYAdizu dvigrahaRezu ","1.3.10-12:ave tFstroH karaRADikaraRayoH ","1.3.10-13:kartfkarmaRoH ca BUkfYoH ","1.3.10-14:anavakxptyamarzayoH akiMvftte api ","1.3.10-15:kfBvoH ktvARamulO ","1.3.10-16:aDIyAnaviduzoH CandobrAhmaRAni ","1.3.10-17:ropaDetoH paTidUtayoH ","1.3.10-18:tatra BavataH tasya vyAKyAnaH kratuyajYeByaH ","1.3.10-19:saNGAdizu aYpraBftayaH ","1.3.10-20:veSoyaSaAdeH BagAt yalKO ","1.3.10-21:NasiNasoH KyatyAt parasya ","1.3.10-22:na vA samAnayogavacanAt ","1.3.10-23:tasya dozaH vidaH lawaH vA ","1.3.10-24:DmADetwoH nAqImuzwyoH ca ","1.3.10-25:KalagoraTAt initrakawyacaH ca ","1.3.10-26:sinDvapakarAByAm kan aRaYO ca ","1.3.10-27:yuzmadasmadoH ca AdeSAH","1.3.11-1:aDikAraH pratiyogam tasya anirdeSArTaH ","1.3.11-2:na vA nirdiSyamAnADikftatvAt yaTA loke ","1.3.11-3:anyanirdeSaH tu nivartakaH tasmAt pariBAzA ","1.3.11-4:aDikAraparimARAjYAnam tu ","1.3.11-5:aDikAraparimARajYAnArTam tu ","1.3.11-6:na aDikAraH iti cet uktam ","1.3.11-7:yAvatiTaH al anubanDaH tAvataH yogAn iti vacanAt sidDam ","1.3.11-8:BUyasi prAgvacanam","1.3.12-1:Atmanepadavacanam niyamArTam ","1.3.12-2:laviDAnAt vihitam ","1.3.12-3:tatra pratyayaniyame Sezavacanam parasmEpadasya anivfttatvAt ","1.3.12-4:kyazaH Atmanepadavacanam tasya anyatra niyamAt ","1.3.12-5:prakftyarTaniyame anyABAvaH ","1.3.12-6:Sezavacanam ca ","1.3.12-7:kartari ca Atmanepadavizaye parasmEpadapratizeDArTam","1.3.14-1:karmavyatihArAdizu kartfgrahaRam BAvakarmanivfttyarTam ","1.3.14-2:itaraTA hi tatra pratizeDe BAvakarmaRoH pratizeDaH ","1.3.14-3:na vA anantarasya pratizeDAt","1.3.15-1:pratizeDe hasAdInAm upasaNKyAnam ","1.3.15-2:harivahyoH apratizeDaH","1.3.16-1:prarasparopapadAt ca","1.3.20-1:ANaH daH avyasanakriyasya ","1.3.20-2:svANgakarmAt ca","1.3.21-1:samaH akUjane ","1.3.21-2:AgameH kzamAyAm ","1.3.21-3:SikzeH jijYAsAyAm ","1.3.21-4:kirateH harzajIvikAkulAyakaraRezu ","1.3.21-5:harateH gatatAcCIlye ","1.3.21-6:ANi nupracCyoH ","1.3.21-7:ASizi nATaH ","1.3.21-8:SapaH upalamBane","1.3.22-1:ANaH sTaH pratijYAne","1.3.24-1:udaH IhAyAm","1.3.25-1:upAt pUjAsaNgatakaraRayoH","[Sloka: bahUnAm api acittAnAm ekaH Bavati cittavAn paSya vAnarasEnye asmin yat arkam upatizWate mA evam maMsTAH sacittaH ayam ezaH api yaTA vayam etat api asya kApeyam yat arkam upatizWati ] ","-2:vA lipsAyAm","1.3.27-1:svANgakarmakAt ca","1.3.28-1:svANgakarmakAt ca","1.3.29-1:samaH gamyAdizu vidipracCisvaratInAm upasaNKyAnam ","1.3.29-2:artiSrudfSiByaH ca ","1.3.29-3:upasargAt asyatyUhyoH vAvacanam","1.3.40-1:jyotizAm udgamane","1.3.51-1:avAd graH girateH","1.3.58-1:anoH jYaH pratizeDe sakarmakavacanam ","1.3.58-2:na vA akarmakasya uttareRa viDAnAt ","1.3.58-3:pratizeDaH pUrvasya ca","1.3.60-1:SadeH SitaH parasmEpadASrayatvAt AtmanepadABAvaH ","1.3.60-2:sidDam tu laqAdInAm Atmanepadavacanam ","1.3.60-3:upasargapUrvaniyame aqvyavAye upasaNKyAnam ","1.3.60-4:nityatvAt lAdeSasya Atmanepade aw AgamaH iti cet awaH nityanimittatvAt AtmanepadABAvaH ","1.3.60-5:tasmAt upasaNKyAnam","1.3.62-1:pUrvavat sanaH iti SadimriyatyarTam ","1.3.62-2:itaraTA hi tAByAm sanantAByAm AtmanepadapratizeDaH ","1.3.62-3:pUrvasya AtmanepadadarSanAt sanantAt AtmanepadaBAvaH iti cet gupAdizu aprasidDiH ","1.3.62-4:sidDam tu pUrvasya liNgAtideSAt ","1.3.62-5:kfYAdizu tu liNgapratizeDaH ","1.3.62-6:pratyayagrahaRam RijarTam ","1.3.62-7:tatra hetumaRRicaH pratizeDaH","1.3.65-1:samaH kzRuvaH sakarmakArTam","1.3.67-1:ReH AtmanepadaviDAne aRyantasya karmaRaH tatra upalabDiH ","1.3.67-2:itaraTA hi sarvaprasaNgaH ","1.3.67-3:karmakartftvAt sidDam iti cet yakciRoH nivfttyarTam vacanam ","1.3.67-4:na vA yakciRoH pratizeDAt ","1.3.67-5:itaraTA hi yatra niyamaH tataH anyatra pratizeDaH ","1.3.67-6:Atmanepadasya ca ","1.3.67-7:AtmanepadapratizeDArTam tu ","1.3.67-8:AtmanaH karmatve pratizeDaH ","1.3.67-9:na vA Ryante anyasya kartftvAt","1.3.78-1:Sezavacanam paYcamyA cet arTe pratizeDaH ","1.3.78-2:saptamyA cet prakfteH ","1.3.78-3:sidDam tu uBayanirdeSAt ","1.3.78-4:kartfgrahaRam anuparAdyarTam","1.3.79-1:parasmEpadapratizeDAt kfYAdizu viDAnam ","1.3.79-2:tatra AtmanepadapratizeDaH apratizidDatvAt ","1.3.79-3:na vA dyutAdiByaH vAvacanAt ","1.3.79-4:Atmanepadaniyame vA pratizeDaH","1.3.88-1:aRO akarmakAt iti curAdiRicaH RyantAt parasmEpadavacanam ","1.3.88-2:sidDam tu atasmin RO iti vacanAt","1.3.89-1:pAdizu DewaH upasaNKyAnam","1.4.1-1:anyatra saYjYAsamAveSAnniyamArTam vacanam ","1.4.1-2:tatra ekasaYjYADikAre tadvacanam ","1.4.1-3:aNgasaYjYayA BapadasaYjYayoH asamAveSaH ","1.4.1-4:karmaDArayatve tatpuruzagrahaRam ","1.4.1-5:tatpuruzatve dvigucagrahaRam ","1.4.1-6:gatidivaHkarmahetumatsu cagrahaRam ","1.4.1-7:gurulaGusaYjYe nadIGisaYjYe ","1.4.1-8:parasmEpadasaYjYAm puruzasaYjYA ","1.4.1-9:paravacane siti padaM Bam ","1.4.1-10:gatibudDyAdInAm RyantAnAm karma kartfsaYjYam ","1.4.1-11:Sezavacanam ca GisaYjYAnivfttyarTam ","1.4.1-12:na vA asamBavAt ","1.4.1-13:hrasvalakzaRA hi nadIsaYjYA GisaYjYAyAm ca guRaH ","1.4.1-14:tatra vacanaprAmARyAt nadIsaYjYAyAm GisaYjYABAvaH ","1.4.1-15:ASrayABAvAt nadIsaYjYAyAm GisaYjYAnivfttiH iti cet yaRAdeSABAvaH ","1.4.1-16:nadyASrayatvAt yaRAdeSasya hrasvasya nadIsaYjYABAvaH ","1.4.1-17:bahuvrIhyarTam tu ","1.4.1-18:prayojanamavyayIBAvopamAnadvigukfllopezu ","1.4.1-19:tatra SezavacanAt dozaH saNKyAsamAnADikaraRaYsamAsezu bahuvrIhipratizeDaH ","1.4.1-20:kfllope ca SezavacanAt prAdiBiH na bahuvrIhiH ","1.4.1-21:ekasaYjYADikAre vipratizeDAt bahuvrIhiH iti cet ktArTe pratizeDaH ","1.4.1-22:tatpuruzaH iti cet anyatra ktArTAt pratizeDaH ","1.4.1-23:sidDam tu prAdInAm ktArTe tatpuruzavacanAt ","1.4.1-24:prayojanam hrasvasaYjYAm dIrGaplutO ","1.4.1-25:tiNsArvaDAtukam liNliwoH ArDaDAtukam ","1.4.1-26:apatyam vfdDam yuvA ","1.4.1-27:Gim nadI ","1.4.1-28:laGu guru ","1.4.1-29:padam Bam ","1.4.1-30:apAdAdnam uttarARi DanuzA viDyati kaMsapAtryAm BuNkte gAm dogDi DanuH viDyati iti ","1.4.1-31:kruDadruhoH upsfzwayoH karma saMpradAnam ","1.4.1-32:karaRam parARi sADu asiH Cinatti ","1.4.1-33:aDikaraRam karma geham praviSati ","1.4.1-34:aDikaraRam kartA sTAlI pacati ","1.4.1-35:aDyupasfzwam karma ","1.4.1-36:gatyupasargasaYjYe karmapravacanIyasaYjYA ","1.4.1-37:parasmEpadam Atmanepadam ","1.4.1-38:samAsasaYjYAH ca ","1.4.1-39:arTavat prAtipadikam ","1.4.1-40:guRavacanam ca ","1.4.1-41:samAsakfttadDitAvyayasarvanAma asarvaliNgA jAtiH ","1.4.1-42:saNKyA ","1.4.1-43:qu ca ","1.4.1-44:ekadravyopaniveSinI saYjYA","1.4.2-1:dvO prasaNgO anyArTO ekasmin saH vipratizeDaH ","1.4.2-2:ekasmin yugapadasamBavAt pUrvaparaprApteH uBayaprasaNgaH ","1.4.2-3:tfjAdiBiH tulyam ","1.4.2-4:anavayaprasaNgAt pratipadam viDeH ca ","1.4.2-5:apratipattiH vA uBayoH tulyabalatvAt ","1.4.2-6:tatra pratipattyarTam vacanam ","1.4.2-7:tavyadAdInAm tu aprasidDiH ","1.4.2-8:antaraNgam ca ","1.4.2-9:prayojanam yaRekAdeSettvottvAni guRavfdDidvirvacanAllopasvareByaH ","1.4.2-10:iRNiSInAm At guRaH savarRadIrGatvAt ","1.4.2-11:na vA savarRadIrGatvasya anavakASatvAt ","1.4.2-12:UNApoH ekAdeSaH ItvalopAByAm ","1.4.2-13:AttvanapuMsakopasarjanahrasvatvAni ayavAyAvekAdeSatugviDiByaH ","1.4.2-14:tuk yaRekAdeSaguRavfdDyOttvadIrGatvetvamumetttvarIviDiByaH ","1.4.2-15:iyaNAdeSaH guRAt ","1.4.2-16:SveH samprasAraRapUrvatvam yaRAdeSAt ","1.4.2-17:hvaH AkAralopAt ","1.4.2-18:svaraH lopAt ","1.4.2-19:pratyayaviDiH ekAdeSAt ","1.4.2-20:lAdeSaH varRaviDeH ","1.4.2-21:tatpuruzAntodAttatvam pUrvapadaprakftisvarAt ","1.4.2-22:tasya dozaH pUrvapadottarapadayoH vfdDisvarO ekAdeSAt ","1.4.2-23:yaRAdeSAt iyuvO ","1.4.2-24:usi pararUpAt ca ","1.4.2-25:luk lopayaRayavAyAvekAdeSeByaH","1.4.3-1:nadIsaYjYAyAm AKyAgrahaRam strIvizayArTam ","1.4.3-2:praTamaliNgagrahaRam ca ","1.4.3-3:prayojanam kviblupsamAsAH ","1.4.3-4:avayavastrIvizayatvAt sidDam iti cet iyaNuvaNsTAnapratizeDe yaRsTAnapratizeDaprasaNgaH avayavasya iyaNuvaNsTAnatvAt ","1.4.3-5:sidDam tvaNgarUpagrahaRAt yasya aNgasya iyuvO tatpratizeDAt ","1.4.3-6:hrasveyuvsTAnapravfttO ca strIvacane","1.4.13-1:aNgasaYjYAyAm tadAdivacanam syAdinumarTam ","1.4.13-2:mitsuwoH upasamKyAnam ","1.4.13-3:sidDam tu tadAdyAdivacanAt ","1.4.13-4:tadekadeSavijYAnAt vA sidDam ","1.4.13-5:pratyayagrahaRam padAdO aprasaNgArTamP I","1.4.13-6:parimARArTam ca ","1.4.13-7:sidDam tu pratyayagrahaRe yasmAt saH tadAditadantavijYAnAt ","1.4.13-8:prayojanam DAtuprAtipadikapratyayasamAsatadDitaviDisvarAH ","1.4.13-9:kfdgrahaRe gatikArakapUrvasya api ","1.4.13-10:prayojanam samAsatadDitaviDisvarAH","1.4.14-1:padasaYjYAyAm antavacanam anyatra saYjYAviDO pratyayagrahaRe tadantaviDipratizeDArTam","1.4.18-1:BasaYjYAyAm uttarapadalope zazaH pratizeDaH ","1.4.18-2:sidDam acaH sTAnivattvAt ","1.4.18-3:naBoNgiromanuzAm vati upasamKyAnam ","1.4.18-4:vfzaR vasvaSvayoH","1.4.21-1:suptiNAm aviSezaviDAnAt dfztaviprayogatvAt ca niyamArTam vacanam ","1.4.21-2:tatra pratyayaniyame avyayAnAm padasaYjYABAvaH asubantatvAt ","1.4.21-3:arTaniyame sidDam SlokavArttika: supAm karmAdayaH api arTAH saNKyA ca eva taTA tiNAm prasidDaH niyamaH tatra niyamaH prakftezu vA","1.4.23-1:kArake iti saYjYAnirdeSaH cetsaYjYinaH api nirdeSaH ","1.4.23-2:itaraTA hi anizwaprasaNgaH grAmasya samIpAt AgacCati iti akArakasya ","1.4.23-3:karmasaYjYAprasaNgaH akaTitasya brAhmaRasya putram panTAnam pfcCati iti ","1.4.23-4:apAdAnam ca vfkzasya parRam patati iti ","1.4.23-5:nA vA apAyasyAvivakzitatvAt ","1.4.23-6:anvarTam iti cet akartari kartfSabdAnupapattiH ","1.4.23-7:sidDam tu pratikArakam kriyABedAt pacAdInAm karaRADikaraRayoH kartfBAvaH ","1.4.23-8:aDiSrayaRodakAsecanataRqulAvapanEDopadakarzaRikriyAH praDAnasya kartuH pAkaH ","1.4.23-9:droRam pacati AQakam pacati ti samBavanakriyA DAraRakriyA ca aDikaraRasya pAkaH ","1.4.23-10:eDAH pakzyanti A viklitteH jvalizyanti iti jvalvanakriyA karaRasya pAkaH ","1.4.23-11:udyamananipAtanAni kartuH CidikriyA ","1.4.23-12:yat tat na tfRena tatparaSoH Cedanam ","1.4.23-13:itaraTA hi asitfRayoH Cedane aviSezaH syAt ","1.4.23-14:apAdAnAdInAm tu aprasidDiH ","1.4.23-15:na vA svatantraparatantratvAt tayoH paryAyeRa vacanam vacanASrayA ca saYjYA","1.4.24-1:jugupsAvirAmapramAdArTAnAm upasamKyAnam ","1.4.24-2:gatiyuktezu apAdAnasaYjYA na papadyate aDruvatvAt ","1.4.24-3:na vA aDrOvyasya avivikzitatvAt","1.4.27-1:vAraRarTezu karmagrahaRAnarTakyam kartuH Ipsitatamam karma iti vacanAt","1.4.29-1:AKyAtA anupayoge kArakam iti cet akaTitvAt karmasaYjYAprasaNgaH ","1.4.29-2:akArakam iti cet upayogavacanAnarTakyam","1.4.48-1:vaseH aSyarTasya pratizeDaH","1.4.49-1:Ipsitasya karmasaYjYAyAm nirvfttasya kArakatve karmasaYjYAprasaNgaH kriyepsitatvAt ","1.4.49-2:na vA uBayepsitatvAt","1.4.52-1:SabdakarmanirdeSe SabdakriyARAm iti cet hvayatyAdInAm pratizeDaH ","1.4.52-2:SfRotyAdIn Am ca upasamKyAnam aSabdakriyatvAt ","1.4.52-3:SabdakarmaRaH iti cet jalpatipraBftInAm upasamKyAnam ","1.4.52-4:dfSeH sarvatra ","1.4.52-5:adiKAdinIvahInAm pratizeDaH ","1.4.52-6:vaheH aniyantfkartfkasya iti vaktavyam ","1.4.52-7:BakzeH ahiMsArTasya ","1.4.52-8:akarmakagrahaRe kAlakarmakARAm upasaNKyAnam ","1.4.52-9:sidDam tu kAlakarmakARAm akarmakavadvacanAt","1.4.53-1:hfkroH vAvacane aBivAdidfSyoH Atmanepade upasaNKyAnam","1.4.54-1:svatantrasya kartfsaYjYAyAm hetumati upasaNKyAnam asvatrantvAt ","1.4.54-2:na vA svAtrantryAt itaraTA hi akurvati api kArayati iti syAt ","1.4.54-3:na akurvat i iti cet svatantraH","1.4.55-1:prEze asvatantraprayojakatvAt hetusaYjYAprasidDiH ","1.4.55-2:svatantratvAt sidDam iti cet svatantraparatantratvam vipratiziddam ","1.4.55-3:uktam vA","1.4.58- 59-1:prAdayaH iti yogaviBAgaH ","1.4.58- 59-2:nipAtasaYjYArTaH ","1.4.58- 59-3:ekayoge hi nipAtasaYjYABAvaH ","1.4.58- 59-4:marucCabdasya upsaNKyAnam ","1.4.58- 59-5:SracCabdasya upasamKyAnam","1.4.60-1:kArikASabdasya ","1.4.60-2:punaScanasO Candasi ","1.4.60-3:gatyupasargasaYjYAH kriyAyoge yatkriyAyuktAH tam prati iti vacanam ","1.4.60-4:prayojanam GaY zawvaRatve ","1.4.60-5:vfdDiviDO ca DAtugrahaRAnarTakyam ","1.4.60-6:vadviDinasBAvabIttvasvANgadisvaraRatvezu vacanaprAmARyAt sidDam ","1.4.60-7:suduroH pratizeDaH numviDitatvazatvaRatvezu","1.4.62-1:anukaraRasya itikaraRaparatvapratizeDaH anizwaSabdanivfttyarTaH","1.4.65-1:antaHSabdasya ANkiviDisamAsaRatvezu pasaNKyAnam","1.4.74-1:sAkzAtpraBftizu cvyarTagrahaRam ","1.4.74-2:makArAntatvam ca gatisaYjYAsanniyuktam ","1.4.74-3:tatra cvipratizeDaH ","1.4.74-4:na vA pUrveRa kftatvAt","1.4.80-1:prAgDAtuvacanam prayoganiyamArTam iti cet anukaraRasya itikaraRaparapratizeDaH anizwaSabdanivfttyarTaH ","1.4.80-2:Candasi paravyavahitavacanam ca ","1.4.80-3:saYjYAniyame sidDam ","1.4.80-4:uBayoH anarTakam vacanam anizwAdarSanAt ","1.4.80-5:upasarjanasannipAte tu pUrvaparavyavasTArTam","1.4.84-1:anurlakzaRevacanAnarTakyam sAmAnyakftatvAt ","1.4.84-2:hetvarTam tu vacanam","1.4.97-1:aDirISvaravacane uktam","1.4.99-1:lAdeSe parasmEpadagrahaRam puruzabADitatvAt ","1.4.99-2:iha vacane hi saYjYAbADanam ","1.4.99-3:sici vfdDO tu parasmEpadagrahaRam jYApakam puruzAbADakatvasya","1.4.101-1:praTamamaDyamottamasaYjYAyAm AtmanepadagrahaRam samasaNKyArTam ","1.4.101-2:AnupUrvyavacanam ca ","1.4.101-3:na vEkaSezanirdeSAt","1.4.10-:","-1:yuzmadasmacCezavacanam niyamArTam ","-2:tatra yuzmadasmadanyezu praTamapratizeDaH SezatvAt ","-3:sidDam tu yuzmadasmadoH pratizeDAt ","-4:yuzmadi maDyamAt asmadi uttamaH pratizeDena ","-5:anekaSezaBAvArTam tu ","-6:na vA yuzmadasmadoH anekaSezaBAvAt tadaDikaraRAnAm api anekaSezaBAvAt avipratizeDaH ","-7:kriyApfTaktve ca dravyapfTaktvadarSanam anumAnam uttaratra anekaSezaBAvasya","1.4.110-1:aBAve avasAnalakzaRe uparyaBAvavacanam ","1.4.110-2:virAme virAmavacanam ","1.4.110-3:aBAve avasAnasaYjYini uparyaBAvavacanam ","1.4.110-4:virAme virAmavacanam ","1.4.110-5:BAvAvirAmaBAvitvAt Sabdasya vasAnalakzaRam na ","1.4.110-6:tatparaH iti vA varRasya avasAnam ","1.4.110-7:varRaH antyaH vA avasAnam ","1.4.110-8:saMhitAvasAnayoH lokaviditatvAt sidDam","2.1.1-1:pfTagarTAnAm ekArTIBAvaH samarTavacanam Sloka: subalopaH vyavaDAnam yaTezwam anyatareRa aBisambanDaH svaraH saNKyAviSezaH vyaktABidAnam lkupasarjanaviSezaRam cayogaH ","2.1.1-2:vAvacanAnarTakyam ca svaBAvasidDatvAt ","2.1.1-3:saNGAtasya EkArTyAt na avayavasaNKyAtaH subutpattiH ","2.1.1-4:parasparavyapekzA sAmarTyem eke ","2.1.1-5:tatra nAnAkArakAt niGAtayuzmadasmadAdeSepratizeDaH ","2.1.1-6:racaye samAsapratizeDaH ","2.1.1-7:samarTatarARAm vA ","2.1.1-8:samudAyasAmarTyAt vA sidDam ","2.1.1-9:AKyAtam sAvyayakArakaviSezaRam vAkyam ","2.1.1-10:ekatiN ","2.1.1-11:samAnavAkye niGAtayuzmadasmadAdeSAH ","2.1.1-12:yoge pratizeDaH cAdiBiH ","2.1.1-13:samarTaniGAte hi samAnADikaraRayuktayuktezu upasaNKyAnam asamarTatvAt ","2.1.1-14:rAjagavIkzIre dvisamAsaprasaNgaH dvizazWIBAvAt ","2.1.1-15:sidDam tu rAjaviSizwAyAH goH kzIreRa sAmarTyAt ","2.1.1-16:padaviDO samarTavacanam varRASraye SAstre AnantaryavijYAnAt ","2.1.1-17:samarTADikArasya viDeyasAmAnADikaraRyAt nirdeSAnarTakyam ","2.1.1-18:sidDam tu samarTAnAm iti vacanAt ","2.1.1-19:ekaSezanirdeSAt vA ","2.1.1-20:samAnADikaraRezu upasaNKyAnam asamarTatvAt ","2.1.1-21:dravyam padArTaH iti cet ","2.1.1-22:na vA vacanaprAmARyAt ","2.1.1-23:luptAKyAtezu ca ","2.1.1-24:tadarTagateH vA ","2.1.1-24:samAsaH dvayoH dvayoH cet dvandve anekagrahaRam ","2.1.1-26:dvayoH dvayoH samAsaH iti cet na bahuzu dvitvABAvAt ","2.1.1-27:samAsAntapratizeDaH ca","2.1.1-28:aviSezeRa bahuvrIhO anekapadaprasaNgaH ","2.1.1-29:tatra svarasamAsAntapuMvadBAvezu dozaH ","2.1.1-30:na vA avayavatatpuruzatvAt ","2.1.1-31:tasya antodAttatvam vipratizeDAt ","2.1.1-32:nimittisvarabalIyastvAt vA ","2.1.1-33:ekaSitipAtsvaravacanam tu jYApakam nimittisvarabalIyastvasya","2.1.2-1:Amantritasya parANgvadBAve zazWyAmantritakArakavacanam ","2.1.2-2:tannimittagrahaRam vA ","2.1.2-3:avacane hi subantamAtraprasaNgaH ","2.1.2-4:subantasya parANgavadBAve samAnADikaraRasya upasaNKyanam ananantaratvAt ","2.1.2-5:svare avaDAraRAt ca ","2.1.2-6:param api Candasi ","2.1.2-7:avyayapratizeDaH ca ","2.1.2-8:anavyayIBAvasya ","2.1.2-9:svare avaDAraRam subalopArTam ","2.1.2-10:na vA subantEkAntatvAt ","2.1.2-11:prAtipadikEkAntaH tu sublope","2.1.3-1:prAgvacanam saYjYAnivfttyarTam","2.1.4-1:sahavacanam pfTak asamAsArTam ","2.1.4-2:ivena viBaktyalopaH pUrvapadaprakftisvaratvam ca","2.1.17-1:tizWadgu kAlaviSeze ","2.1.17-2:KaleyavAdIni praTamAntAni anyapadArTe","2.1.18-1:pAre maDye zazWyA vAvacanam ","2.1.18-2:avacane hi zazWIsamAsABAvaH yaTA ekadeSipraDAne ","2.1.18-3:ekArAntanipAtanam ca","2.1.20-1:nadIBiH saNKyAsamAse anyapadArTe pratizeDaH","2.1.24-1:SritAdizu gamigAmyAdInAm upasaNKyAnam ","2.1.24-2:SritAdiBiH ahIne dvitIyAsamAsavacanAnarTakyam bahuvrIhikftatvAt ","2.1.24-3:ahIne dvItIyAsvaravacanAnarTakyam ca ","2.1.24-4:jAtisvaraprasaNgaH tu ","2.1.24-5:tatra jAtAdizu vAvacanAt sidDam","2.1.29-1:atyantasaMyoge samAsasya aviSezavacanAt ktena samAsavacanAnarTakyam ","2.1.29-2:anatyantasaMyogArTam tu","2.1.30-1:tftIyAsamAse arTagrahaRam anarTakam arTagatiH hi avacanAt ","2.1.30-2:nirdeSyam iti cet tftIyArTanirdeSaH api","2.1.31-1:pUrvAdizu avarasya upasaNKyAnam ","2.1.31-2:sadfSagrahaRe uktam","2.1.32-1:kartfkaraRe kftA ktena","2.1.33-1:kftryEH aDikArTavacane anyatra api dfSyate ","2.1.33-2:sADanam kftA iti vA pAdahArakAdyarTam","2.1.34- 35-1:annena vyaYjanam BakzyeRa miSrIkaraRam iti asamarTasamAsaH ","2.1.34- 35-2:kArakARAm kriyayA sAmarTyAt ","2.1.34- 35-3:vacanaprAmARyAt iti cet nAnAkArakARAm pratizeDaH ","2.1.34- 35-4:sidDam tu samAnADikaraRADikAre ktaH tftIyApUrvapadaH uttarapadalopaH ca ","2.1.34- 35-5:zazWIsamAsaH ca yuktapUrRAntaH ","2.1.34- 35-6:na vA asamAse adarSanAt ","2.1.34- 35-7:yuktArTasampratyayAt ca sAmarTyam ","2.1.34- 35-8:sampratyayAt ca tadarTADyavasAnam ","2.1.34- 35-9:sampratIyamAnArTalope hi anavasTA","2.1.36-1:caturTI tadarTamAtreRa cet sarvaprasaNgaH aviSezAt ","2.1.36-2:balirakzitAByAm ca anarTakam vacanam ","2.1.36-3:vikftiH prakftyA iti cet aSvaGAsAdInAm upasaNKyAnam ","2.1.36-4:arTena nityasamAsavacanam ","2.1.36-5:sarvaliNgatA ca","2.1.42-1:DvANkzeRa iti arTagrahaRam","2.1.43-1:kftyEH niyoge yadgrahaRam","2.1.47-1:kzepe gatikArakapUrve uktam","2.1.51-1:dvigusaYjYA pratyayottarapadayoH cet itaretarASrayatvAt aprasidDiH ","2.1.51-2:arTe cet tadDitAnutpattiH bahuvrIhivat ","2.1.51-3:samAsatadDitaviDO iti cet anyatra samAsasaYjYABAvaH ","2.1.51-4:sidDam tu pratyayottarapadayoH ca iti vacanAt ","2.1.51-5:dvigoH vA lugvacanam jYApakam tadDitotpatteH ","2.1.51-6:samAhArasamUhayoH aviSezAt samAhAragrahaRAnarTakyam tadDitArTena kftatvAt ","2.1.51-7:aBiDAnArTam tu ","2.1.51-8:dvandvatatpuruzayoH uttarapade nityasamAsavacanam ","2.1.51-9:uttarapadena parimARina dvigoH samAsavacanam ","2.1.51-10:anyatra samudAyabahuvrIhitvAt uttarapadaprasidDiH ","2.1.51-11:sarvatra matvarTe pratizeDaH","2.1.55-1:upamAnasamAse guRavacanasya viSezaBAktvAt sAmanyavacanAprasidDiH ","2.1.55-2:na vA SyAmatvasyo uhhayatra BAvAt tadvAcaktvAt ca Sabdasya sAmAnyavacanaprasidDiH","2.1.57-1:viSezaRaviSezyayoH uBayaviSezaRatvAt uBayoH ca viSezyatvAt upasarjanAprasidDiH ","2.1.57-2:na vA anyatarasya praDAnaBAvAt tadviSezakatvAt ca aparasya upasarjanaprasidDiH","2.1.58-1:bahulavacanasya akftsnatvAt uttaratrAnukramaRasAmarTyam","2.1.59-1:SreRyAdizu cvyarTavacanam","2.1.60-1:naYviSizwe samAnaprakftivacanam ","2.1.60-2:nuqiqaDikena ca Sloka: avaDAraRam naYA cet nuqiqviSizwena na prakalpeta aTa cet aDikavivakzA kAryam tulyaprakftikena iti ","2.1.60-3:kftApakftAdInAm ca upasaNKyAnam ","2.1.60-4:sidDam tu ktena visamAptO anaY ","2.1.60-5:gatapratyAgatAdInAm ca upasaNKyAnam","2.1.69-1:varRena tftIyAsamAsaH etapratizeDe varRagrahaRam ","2.1.69-2:samAnADikaraRe dviH varRagrahaRam ","2.1.69-3:samAnADikaraRADikAre praDAnopasarjanAnAm param param vipratizeDena ","2.1.69-4:samAnADikaraRasamAsAt bahuvrIhiH ","2.1.69-5:kadA cit karmaDArayaH sarvaDanAdyarTaH ","2.1.69-6:pUrvapadAtiSaye AtiSAyikAt bahuvrIhiH sUkzmavastratarAdyarTaH ","2.1.69-7:uttarapadArTAtiSaye AtiSAyikaH bahuvrIheH bahvAQyatarAdyarTaH ","2.1.69-8:samAnADikaraRADikAre SAkapArTivAdInAm upasaNKyAnam uttarapadalopaH ca","2.2.3-1:dvitIyAdInAm viBAzAprakaraRe viBAzAvacanam jYApakam avayavaviDAne sAmAnyaviDAnABAvasya","2.2.5-1:kAlasya yena samAsaH tasya aparimARitvAt anirdeSaH ","2.2.5-2:sidDam tu kAlaparimARam yasya sa kAlaH tena ","2.2.5-3:ekavacanadvigoH ca upasaNKyAnam ","2.2.5-4:uktam vA","2.2.6-1:naYsamAse BAvavacane uktam","2.2.7-1:Izat guRavacanena","2.2.8-1:kfdyogA ca ","2.2.8-2:tatsTEH ca guREH ","2.2.8-3:na tu tadviSezaREH","2.2.10-1:pratipadaviDAnA ca","2.2.14-1:karmaRi iti zazWInirdeSaH cet akartari kftA samAsavacanam ","2.2.14-2:tfkakAByam ca anarTakaH pratizeDaH ","2.2.14-3:ktanirdeSe asamarTatvAt apratizeDaH ","2.2.14-4:pratizeDyam iti cet kartari api pratizeDaH ","2.2.14-5:pUjAyAm ca pratizeDAnarTakyam ","2.2.14-6:tasmAt uBayaprAptO karmaRi zazWyAH pratizeDaH","2.2.18-1:prAdiprasaNge karmapravacanIyapratizeDaH ","2.2.18-2:vyavetapratizeDaH ca ","2.2.18-3:sidDam tu kvANsvatidurgativacanAt ","2.2.18-4:prAdayaH ktArTe","2.2.18-5:avyayam pravfdDAdiBiH ","2.2.18-6:ivena viBaktyantalopaH pUrvpadaprakftisvaratvam ca ","2.2.18-7:avyayam avyayena ","2.2.18-8:udAttavatA tiNA gatimatA ca avyayam","2.2.19-1:upapadam atiN iti tadarTapratizeDaH ","2.2.19-2:kriyApratizeDaH vA ","2.2.19-3:zazWIsamAsAt upasargasamAsaH vipratizeDena ","2.2.19-4:na vA zazWIsamAsABAvAd upapadasamAsaH","2.2.23-1:Sezavacanam padataH cet na aBAvAt ","2.2.23-2:arTataH cet aviSizwam","2.2.24-1:Sezavacane uktam","2.2.24-2:anekavacanam upasarjanArTam ","2.2.24-3:na vA ekaviBaktitvAt ","2.2.24-4:padArTABiDAne anuprayogAnupapattiH aBihitatvAt ","2.2.24-5:na vA anaBihitatvAt ","2.2.24-6:sAmAnyABiDAne hi viSezAnaBiDAnam ","2.2.24-7:viBaktyarTABiDAne adravyasya liNgasaNKyopacArAnupapattiH","2.2.24-8:sidDam tu yaTA guRavacanezu ","2.2.24-9:uktam vA ","2.2.24-10:parigaRanam kartavyam bahuvrIhiH samAnADikaraRAnAm ","2.2.24-11:avyayAnAm ca ","2.2.24-12:saptamyupamAnapUrvapadasya uttarapadalopaH ca ","2.2.24-13:samudAyavikArazazWyAH ca ","2.2.24-14:prAdiByaH DAtujasya vA ","2.2.24-15:naYaH astyarTAnAm ","2.2.24-16:na vA anaBiDAnAt asamAnADikaraRe saYjYABAvaH ","2.2.24-17:arTaniyame matvarTagrahaRam ","2.2.24-18:taTA ca uttarasya vacanArTaH ","2.2.24-19:karmavacanena apraTmAyAH ","2.2.24-20:kartfvacanena api ","2.2.24-21:subaDikAre astikzIrAdivacanam ","2.2.24-22:na vA avyayatvAt","2.2.25-1:saNKyAsamAse sujantatvAt saNKyAprasidDiH ","2.2.25-2:na vA asujantatvAt ","2.2.25-3:sujaBAvaH ahihitArTatvAt samAse ","2.2.25-4:aSizyaH saNKyottarapadaH saNKyeyavABiDyAyitvAt ","2.2.25-5:matvarTe vA pUrvasya viDAnAt ","2.2.25-6:kabaBAvArTam vA","2.2.2-:","-1:diksamAsasahayogayoH ca antarAlapraDAnABiDAnAt ","-2:matvarTe vA pUrvasya viDAnAt ","-3:kabaBAvArTam vA","2.2.27-1:tftIyAsaptamyantezu ca kriyABiDAnAt ","2.2.27-2:na vA ekaSezapratizeDArTam ","2.2.27-3:pUrvadIrGArTam ca ","2.2.27-4:matvarTe vA pUrvasya viDAnAt ","2.2.27-5:kabaBAvArTam vA","2.2.29-1:cArTe dvandvavacane asamAse api cArTasampratyayAt anizwaprasaNgaH","2.2.29-2:sidDam tu yugapadaDikaraRavacane dvandvavacanAt ","2.2.29-3:tatra puMvadBAvapratizeDaH ","2.2.29-4:vipratizidDezu ca anupapattiH ","2.2.29-5:SabdapOrvAparyaprayogAt arTapOrvAparyABiDAnam iti cet dvivacanabahuvacanAnupapattiH ","2.2.29-6:vigrahe tu yugapadvacanam jYApakam yugapadvacanasya ","2.2.29-7:samudAyAt sidDam iti cet na ekArTatvAt samudAyasya ","2.2.29-8:tayoH anekArTatvAt bahuvacanaprasaNgaH iti cet na bahutvABAvAt ","2.2.29-9:anyavAcakena anyasya vacanAnupapattiH iti cet plakzasya nyagroDatvAt nyagroDasya plakzatvAt svaSabdena aBiDAnam ","2.2.29-10:kAraRAt dravye SabdaniveSaH iti cet tulyakAraRatvAt sidDam ","2.2.29-11:darSanam hetuH iti cet tulyam ","2.2.29-12:tadvizayam ca ","2.2.29-13:anyatra api tadvizayadarSanAt ","2.2.29-14:ekena uktatvAt aparasya prayogaH anupapannaH iti cet anuktatvAt plakzeRa nyagroDasya nyagroDaprayogaH ","2.2.29-15:aBiDAnam punaH svABAvikam ","2.2.29-16:ekAdInAm daSAdiBiH dvandvaH iti cet viMSatyAdizu vacanaprasaNgaH ","2.2.29-17:sidDam tu aDikAntA saNKya saNKyayA samAnADikaraRADikAre aDikalopaH ca","2.2.30-1:upasarjanasya pUrvavacanam paraprayoganivfttyarTam ","2.2.30-2:na vA anizwadarSanAt ","2.2.30-3:zazWyantayoH samAse arTABedAt praDAnasya apUrvanipAtaH","2.2.34-1:atantre taranirdeSe SaNKatURavayoH mfdaNgena samAsaH ","2.2.34-2:anekaprAptO ekasya niyamaH aniyamaH Sezezu ","2.2.34-3:ftunakzatrARAm AnupUrvyeRa samAnAkzarARAm ","2.2.34-4:aByarhitam ","2.2.34-5:laGakzaram ","2.2.34-6:varRAnAm AnupUrvyeRa ","2.2.34-7:BrAtuH ca jyAyasaH ","2.2.34-8:saNKyAyAH alpIyasaH ","2.2.34-9:DarmAdizu uBayam","2.2.35-1:bahuvrIhO sarvanAmasaNKyayoH upasaNKyAnam ","2.2.35-2:vA priyasya ","2.2.35-3:saptamyAH pUrvanipAte gaqvAdiByaH paravacanam","2.2.36-1:nizWAyAH pUrvanipAte jAtikAlasuKAdiByaH paravacanam ","2.2.36-2:na vA uttarapadasya antodAttavacanam jYApakam paraBAvasya ","2.2.36-3:pratizeDe tu pUrvanipAtaprasaNgaH tasmAt rAjadantAdizu pAWaH ","2.2.36-4:praharaRArTeByaH ca ","2.2.36-5:dvandve Gi ajAdyantam vipratizeDena ","2.2.36-6:uBAByAm alpActaram","2.3.1-1:anaBihitavacanam anarTakam anyatra api vihitasya aBAvAt aBihite ","2.3.1-2:Snambahujakakzu nAnAdeSatvAt utsargApratizeDaH ","2.3.1-3:anaBitaH tu viBaktyarTaH tasmAt anaBihitavacanam ","2.3.1-4:aBihite praTamABAvaH ","2.3.1-5:tiNkfttadDitasamAsEH parisaNKyAnam ","2.3.1-6:utsarge hi prAtipadikasAmAnADikaraRye viBaktivacanam ","2.3.1-7:dvayoH kriyayoH kArake anyatareRa aBihite viBaktyaBAvaprasaNgaH ","2.3.1-8:na vA anyatareRa anaBiDAnAt ","2.3.1-9:anaBihite hi viDAnam ","2.3.1-10:anaBihitavacanam anarTakam praTamAviDAnasya anavakASatvAt ","2.3.1-11:avakASaH akArakam iti cet na astiH BavantIparaH praTamapuruzaH aprayujyamAnaH api asti ","2.3.1-12:vipratizeDAt vA praTamABAvaH ","2.3.1-13:kftprayoge tu param viDAnam zazWyAH tatpratizeDArTam","2.3.2-1:samayAnikazAhAyogezu upasaNKyAnam","2.3.4-1:antarAntareRayuktAnAm apraDAnavacanam","2.3.5-1:atyantasaMyoge karmavat lAdyarTam","2.3.8-1:karmapravacanIyayukte pratyAdiBiH ca lakzaRAdizu upasaNKyAnam saptamIpaYcamyoH pratizeDArTam ","2.3.8-2:uktam vA","2.3.9-1:yasya ca ISvaravacanam iti kartfnirdeSaH cet avacanAt sidDam ","2.3.9-2:praTamAnupapattiH tu ","2.3.9-3:svavacanAt sidDam","2.3.12-1:aDvani arTagrahaRam ","2.3.12-2:AsTitapratizeDaH ca ","2.3.12-3:cezwAyAm anaDvani striyam gacCati ajAm nayati iti atiprasaNgaH ","2.3.12-4:sidDam tu asamprAptavacanAt ","2.3.12-5:aDvanaH ca anapavAdaH","2.3.13-1:caturTIviDAne tAdarTye upasaNKyAnam ","2.3.13-2:kxpi sampadyamAne ","2.3.13-3:utpAtena jYApyamAne","2.3.13-4:hitayoge ca","2.3.16-1:svastiyoge caturTI kuSalArTEH ASizi vAviDAnAt ","2.3.16-2:alamiti paryAptyarTagrahaRam","2.3.17-1:manyakarmaRi prakfzyakutsitagrahaRam","2.3.18-1:tftIyAviDAne prakftyAdiByaH upasaNKyAnam","2.3.19-1:sahayukte apraDAnavacanam anarTakam upapadaviBakteH kArakaviBaktibalIyastvAt anyatra api","2.3.20-1:aNgAt vikftAt tadvikArataH cet aNginaH vacanam","2.3.21-1:itTamBUtalakzaRe tatsTe pratizeDaH ","2.3.21-2:na vA itTamBUtasya lakzaRena apfTagBAvAt","2.3.22-1:saYjYaH kftprayoge zazWI vipratizeDena ","2.3.22-2:upapadaviBakteH ca upapadaviBaktiH","2.3.28-1:paYcamIviDAne lyablope karmaRi upasaNKyAnam ","2.3.28-2:aDikaraRe ca ","2.3.28-3:praSnAKyAnayoH ca ","2.3.28-4:yataH ca aDvakAlanirmARam ","2.3.28-5:tadyuktAt kAle saptamI ","2.3.28-6:aDvanaH praTama ca","2.3.32-1:pfTagAdizu paYcamIviDAnam ","2.3.32-2:anaDikArAt ","2.3.32-3:aDikAre hi dvitIyAzazWIvizaye pratizeDaH","2.3.35-1:dUrAntikArTeByaH paYcamIviDAne tadyuktAt paYcamIpratizeDaH ","2.3.35-2:na vA tatra api darSanAt apratizeDaH","2.3.36-1:saptamIviDAne ktasya invizayasya karmaRi upsaNKyAnam ","2.3.36-2:sADvasADuprayoge ca ","2.3.36-3:kArakArhARAm ca kArakatve ","2.3.36-4:akArakArhARAm cAkArakatve ","2.3.36-5:tadviparyAse ca ","2.3.36-6:nimittAt karmasaMyoge","2.3.37-1:BAvalakzaRe saptamIviDAne aBAvalakzaRe upasaNKyAnam ","2.3.37-2:sidDam tu BAvapravfttO yasya BAvAramBavacanAt","2.3.46-1:prAtipadikArTaliNgaparimARavacanamAtre praTamAlakzaRe padasAmAnADikaraRye upasaNKyAnam aDikatvAt ","2.3.46-2:na vA vAkyArTatvAt ","2.3.46-3:aBihitalakzaRAyAm anaBihite praTamAviDiH ","2.3.46-4:uktam vA ","2.3.46-5:aBihitAnaBihite praTamABAvaH ","2.3.46-6:tiNsamAnADikaraRe iti cet tiNaH aprayoge praTamAviDiH ","2.3.46-7:uktam pUrveRa ","2.3.46-8:SatfSAnacoH ca nimittaBAvAt tiNaH aBAvaH tayoH apavAdatvAt","2.3.50-1:pratyayAvaDAraRAt Sezavacanam ","2.3.50-2:arTAvaDAraRAt vA ","2.3.50-3:zazWI Seze iti cet viSezyasya pratizeDaH ","2.3.50-4:tatra praTamAviDiH ","2.3.50-5:uktam pUrveRa","2.3.52-1:karmAdizu akarmakavadvacanam ","2.3.52-2:karmABiDAne hi liNgavacanAnupapattiH ","2.3.52-3:zazWIprasaNgaH ca","2.3.61-1:havizaH aprasTitasya","2.3.62-1:zazTyarTe caturTIvacanam","2.3.65-1:kartfkarmaRoH zazWIviDAne kfdgrahaRAnarTakyam lapratizeDAt ","2.3.65-2:tasya karmakartrarTam iti cet pratizeDe api tadantakarmakartftvAt sidDam","2.3.66-1:uBayaprAptO karmaRi zazWyAH pratizeDe akAdiprayoge apratizeDaH","2.3.67-1:ktasya ca vartamAne nApuMsake BAve upasaNKyAnam ","2.3.67-2:SezavijYAnAt sidDam","2.3.69-1:lAdeSe salliqgrahaRam kikinoH pratizeDArTam ","2.3.69-2:tayoH alAdeSatvAt ","2.3.69-3:ukapratizeDe kameH BAzAyAm apratizeDaH ","2.3.69-4:avyayapratizeDe tosunkasunoH apratizeDaH ","2.3.69-5:SAnaMScAnaSSatFfRAm upasaNKyAnam ","2.3.69-6:dvizaH SatuH vAvacanam","2.3.70-1:akasya Bavizyati ","2.3.70-2:inaH ADarmarRye ca","2.3.71-1:BavyAdInam karmaRaH anaBiDAnAt kftyAnAm kartfgrahaRam","2.4.1-1:pratyaDikaraRam vacanotpatteH saNKyAsAmAnADikaraRyAt ca dvigoH ekavacanaviDAnam ","2.4.1-2:tatra anuprayogasya ekavacanABAvaH advigutvAt ","2.4.1-3:sidDam tu dvigvarTasya ekavadvacanAt ","2.4.1-4:ekaSezapratizeDaH ca ","2.4.1-5:na vA anyasya anekatvAt ","2.4.1-6:samAhAragrahaRam ca tadDitArTapratizeDArTam ","2.4.1-7:na vA samAhArEkatvAt","2.4.2-1:prARitUryasenANgAnAm tatpUrvapadottarapadagrahaRam ","2.4.2-2:yogaviBAgAt sidDam","2.4.3-1:sTeRoH ","2.4.3-2:adyatanyAm ca","2.4.7-1:grAmapratizeDe nagarapratizeDaH ","2.4.7-2:uBayataH ca grAmARAm","2.4.11-1:gavASvapraBftizu yaToccAritam dvandvavfttam","2.4.12-1:bahuprakftiH PalasenAvanaspatimfgaSakuntkzudrajantuDAnyatfRAnAm ","2.4.12-2:paSuSakunidvandve viroDinAm pUrvavipratizidDam ","2.4.12-3:aSvavaqavayoH pUrvaliNgatvAt paSudvandvanapuMsakam ","2.4.12-4:pratipadaviDAnAt sidDam ","2.4.12-5:ekavacanam anarTakam samAhArEkatvAt","2.4.26-1:paravat liNgam dvandvatatpuruzayoH iti cet prAptApannAlampUrvagatisamAsezu pratizeDaH ","2.4.26-2:pUrvapadasya ca ","2.4.26-3:samAsAt anyat liNgam iti cet aSvavaqavayoH wAblugvacanam ","2.4.26-4:nipAtanAt sidDam ","2.4.26-5:upasarjanahrasvatvam vA ","2.4.26-6:paravat liNgam iti SabdaSabdArTO ","2.4.26-7:prAptAdizu ca ekadeSigrahaRAt sidDam","2.4.29-1:anuvAkAdayaH puMsi","2.4.30-1:puRyasudinAByAm ahnaH ] ","2.4.30-1:paTaH saNKyAvyayAdeH ","2.4.30-2:dviguH ca","2.4.30-4:akArAntottarapadaH dviguH striyAm ] ","2.4.30-3:vA AbantaH","2.4.30-6:anaH nalopaH ca ","2.4.30-7:pAtrAidByaH pratizeDaH ]","2.4.32-1:anvAdeSe samAnADikaraRagrahaRam devadattam Bojaya imam ca iti aprasaNgArTam ","2.4.32-2:anvAdeSaH ca kaTitAnukaTanamAtram ","2.4.32-3:AdeSavacanam sAkackArTam ","2.4.32-4:SitkaraRam sarvAdeSArTam ","2.4.32-5:na vA antyasya vikAravacanAnarTakyAt ","2.4.32-6:arTavat tu AdeSapratizeDAfTam ","2.4.32-7:tasmAt SitkaraRam","2.4.34-1:enat iti napuMsakEkavacane","2.4.35-1:jagDyAdizu ArDaDAtukASrayatvAt sati tasmin viDAnam ","2.4.35-2:tatra utsargalakzaRapratizeDaH ","2.4.35-3:sAmAnyASrayatvAt viSezasya anASrayaH iti cet uvarRAkArAnteByaH RyadviDiprasaNgaH ","2.4.35-4:pOrvAparyABAt ca sAmAnyena anupapattiH ","2.4.35-5:sidDam tu sArvaDAtuke pratizeDAt","2.4.37-1:GasxBAve aci upasaNKyAnam","2.4.42- 43-1:vaDO vyaYjanAnte uktam","2.4.45-1:iRvat ikaH","2.4.49-1:gANi anubanDakaraRam viSezaRAfTam ","2.4.49-2:jYApakam vA sAnubanDakasya AdeSavacane itkAryABAvasya ","2.4.49-3:prayojanam cakziNaH KyAY ","2.4.49-4:lawaH SatfSAnacO ","2.4.49-5:yuvoH anAkO ","2.4.49-6:meH ca ananubanDakasya amvacanam","2.4.54-1:cakziNaH kSAYKyAYO ","2.4.54-2:KaSAdiH vA ","2.4.54-3:asidDe Sasya yavacanam viBAzA ","2.4.54-4:prayojanam sOpraKye vuYviDiH ","2.4.54-5:nizWAnatvam AKyAte ","2.4.54-6:ruviDiH puNKyAne ","2.4.54-7:Ratvam paryAKyAte ","2.4.54-8:sasTAnatvam namaH KyAtre ","2.4.54-9:varjane pratizeDaH ","2.4.54-10:asanayoH ca ","2.4.54-11:bahulam taRi ","2.4.54-12:annavaDakagAtravicakzaRAjirAdyarTam","2.4.56-1:GaYapoH pratizeDe kyapaH upasaNKyAnam","2.4.58-1:aRiYoH luki tadrAjAt yuvapratyayasya upasaNKyAnam","2.4.62-1:tadrAjAdInAm luki samAsabahutve pratizeDaH ","2.4.62-2:abahutve ca lugvacanam ","2.4.62-3:dvandve abahuzu lugvacanam ","2.4.62-4:sidDam tu pratyayArTabahutve lugvacanAt ","2.4.62-5:dvandve abahuzu lugvacanam ","2.4.62-6:gotrasya bahuzu lopinaH bahuvacanAntasya pravfttO dvyekayoH aluk ","2.4.62-7:ekavacanadvivacanAntasya pravfttO bahuzu lopaH yUni ","2.4.62-8:na vA sarvezAm dvandve bahvarTatvAt","2.4.64-1:yaYAdInAm ekadvayoH vA tatpuruze zazWyAH upasaNKyAnam","2.4.67-1:gopavanAdipratizeDaH prAk haritAdiByaH","2.4.69-1:advandve iti dvandvADikAranivfttyarTam","2.4.70-1:AgastyakORqinyayoH prakftinipAtanam ","2.4.70-2:lukpratizeDe vfdDyarTam ","2.4.70-3:pratyayAntanipAtane hi vfdDyaBAvaH ","2.4.70-4:aDikArAt pratyayalopaH","2.4.74-1:UtaH aci","2.4.77-1:gApoH grahaRe iRpibatyoH grahaRam","2.4.79-1:taTAsoH Atmanepadavacanam ","2.4.79-2:ekavacanagrahaRam vA ","2.4.79-3:avacane hi anizwaprasaNgaH","2.4.81-1:AmaH leH lope luNlowoH upasaNKyAnam ","2.4.81-2:AmanteByaH RalaH pratizeDaH ","2.4.81-3:AmanteByaH arTavadgrahaRAt RalaH apratizeDaH iti cet amaH pratizeDaH ","2.4.81-4:uktam vA ","2.4.81-5:luk AdeSApavAdaH ","2.4.81-6:tiNkftABAvaH tu ","2.4.81-7:subantapadatvAt sidDam ","2.4.81-8:lakArasya kfttvAt prAtipadikatvam tadASrayam pratyayaviDAnam ","2.4.81-9:avyayatvam makArAntatvAt ","2.4.81-10:svaraH kfdantaprakftisvaratvAt ","2.4.81-11:taTA ca niGAtAniGAtasidDiH ","2.4.81-12:naYA tu samAsaprasaNgaH ","2.4.81-13:uktam vA","2.4.82-1:avyayAt ApaH lugvacanAnarTakyam liNgABAvAt","2.4.83-1:na avyayIBAvAt ataH iti yogavyavasAnam ","2.4.83-2:paYcamyAH ampratizeDArTam ","2.4.83-3:ekayoge hi uBayoH pratizeDaH ","2.4.83-4:tuH niyAmakaH ","2.4.83-5:ami paYcamIpratizeDe apAdAnagrahaRam ","2.4.83-6:karmapravacanIyayukte apratizeDArTam ","2.4.83-7:na vA uttarapadasya karmapravacanIyayogAt samAsAt paYcamyaBAvaH","2.4.84-1:saptamyAH fdDinadIsamAsasaNKyAvayaveByaH nityam","2.4.85-1:witAm weH eviDeH luwaH qArOrasaH pUrvavipratizidDam ","2.4.85-2:AtmanepadAnAm ca iti vacanAt sidDam ","2.4.85-3:tat ca samasaNKyArTam","2.4.85-4:qAvikArasya SitkaraRam sarvAdeSArTam ","2.4.85-5:niGAtaprasaNgaH tu ","2.4.85-6:sidDam alaH antyavikArAt ","2.4.85-7:qiti weH lopAt lopaH ","2.4.85-8:anittvAt vA ","2.4.85-9:praSlizwanirdeSAt vA ","2.4.85-10:tiNgrahaRam ekadeSavikftasya ananyatvAt ","2.4.85-11:svare vipratizeDAt sidDam","3.1.1-1:pratyayADikAre prakftyupapadopADInAm apratizeDaH ","3.1.1-2:nimittasya nimittikAryArTatvAt anyatra api ","3.1.1-3:praDAne kAryasampratyayAt vA sidDam ","3.1.1-4:vikArAgamezu ca paravijYAnAt ","3.1.1-5:zazWInirdizwasya ca tadyuktatvAt ","3.1.1-6:pratyayaviDAnAnupapattiH tu ","3.1.1-7:tasmAt tatra paYcamInirdeSAt sidDam ","3.1.1-8:arTASrayatvAt vA","3.1.2-1:paravacanam anarTakam paYcamInirdizwatvAt parasya ","3.1.2-2:vikArAgamezu ca uktam ","3.1.2-3:atyantAparadfzwAnAm vA paraBUtalopArTam ","3.1.2-4:prayoganiyamArTam vA ","3.1.2-5:prakfteH arTABiDAne pratyayAdarSanAt ","3.1.2-6:dvayasajAdInAm ca kevaladfzwatvAt ","3.1.2-7:vAvacane ca anutpattyarTam ","3.1.2-8:vAvacane ca uktam ","3.1.2-9:tatra pratyayaniyame prkftiniyamABAvaH ","3.1.2-10:prakftiniyame pratyayAniyamaH ","3.1.2-11:sidDam tu uBayaniyamAt","3.1.3-1:AdyudAttatvasya pratyayasaYjYAsanniyoge prayojanam yasya saYjYAkaraRam tasya AdyudAttArTam ","3.1.3-2:asanniyoge hi yasmAt saH tadAdeH AdyudAttatvam tadantasya ca anudAttatvam ","3.1.3-3:na vA prakfteH AdyudAttavacanam jYApakam tadAdeH agrahaRasya ","3.1.3-4:prkftisvarasya ca viDAnasAmarTyAt pratyayasvarABAvaH ","3.1.3-5:AgamAnudAttArTam vA ","3.1.3-6:na vA Agamasya anudAttavacanAt ","3.1.3-7:avacane hi sIyuqAdeH AdyudAttatvam ","3.1.3-8:AdyudAttasya vA lopArTam ","3.1.3-9:na vA bahiraNgalakzaRatvAt ","3.1.3-10:avacane hi Yinnitkitsu atiprasaNgaH ","3.1.3-11:pratyayAdyudAttatvAt DAtoH antaH ","3.1.3-12:pitsvarAt titsvaraH wApi ","3.1.3-13:citsvaraH cApi pitsvarAt ","3.1.3-14:na vA AdyutAttasya pratyayasaYjYAsanniyogAt ","3.1.3-15:wApi svaritenEkAdeSaH ","3.1.3-16:cApi citkaraRAt","3.1.5-1:gupAdizu anubanDakaraRam AtmanepadArTam","3.1.6-1:aByAsadIrGatve avarRasya dIrGaprasaNgaH ","3.1.6-2:na vA aByAsavikArezu apavAdasya utsargAbADakatvAt","3.1.7-1:karmagrahaRAt sanviDO DAtugrahaRAnarTakyam ","3.1.7-2:sopasargam karma iti cet karmaviSezakatvAt upasargasya anupasargam karma ","3.1.7-3:sopasargasya hi karmatve DAtvaDikAre api sanaH aviDAnam akarmatvAt ","3.1.7-4:subantAt ca aprasaNgaH kyajAdInAm apavAdatvAt ","3.1.7-5:anaBiDAnAt vA ","3.1.7-6:karmasamAnakartfkagrahaRAnarTakyam ca icCABiDAne pratyayaviDAnAt ","3.1.7-7:akarmaRaH hi asamAnakartfkAt vA anaBiDAnam ","3.1.7-8:aNgaparimARArTam tu ","3.1.7-9:vAvacanAnarTakyam ca tatra nityatvAt sanaH ","3.1.7-10:tumunantAt vA tasya ca lugvacanam ","3.1.7-11:liNuttamAt vA ","3.1.7-12:ASaNkAyAm acetanezu upasaNKyAnam ","3.1.7-13:na vA tulyakAraRatvAt icCayAH hi pravfttitaH upalabDiH ","3.1.7-14:upamAnAt vA sidDam ","3.1.7-15:sarvasya vA cetanAvattvAt saNgrahaSloka: SEzikAt matubarTIyAt SEzikaH matubarTikaH sarUpaH pratyayaH na izwaH sanantAt na san izyate","3.1.8-1:kyaci mAntAvyayapratizeDaH ","3.1.8-2:gosamAnAkzaranAntAt iti eke","3.1.9-1:kAmyacaH citkaraRAnarTakyam kasya idarTABAvAt","3.1.10-1:aDikaraRAt ca","3.1.11-1:salopaH vA ","3.1.11-2:ojopsarasoH nityam ","3.1.11-3:AcAre galBaklIbahoqeByaH kvip vA","3.1.12-1:BfSAdizu aBUtatadBAvagrahaRam ","3.1.12-2:cvipratizeDAnarTakyam ca BavatyarTe kyaNvacanAt ","3.1.12-3:Bavatiyoge cviviDAnam ","3.1.12-4:qAci vacanaprAmARyAt ","3.1.12-5:BfSAdizu upasargaH pratyayArTaviSezaRam iti cet svare dozaH ","3.1.12-6:sopasargAt iti cet awi dozaH","3.1.13-1:lohitaqAjByaH kyazvacanam ","3.1.13-2:BfSAdizu itarARi","3.1.14-1:sattrakakzakazwagahaneByaH kaRvacikIrzAyAm","3.1.15-1:tapasaH parasmEpadam ca","3.1.17-1:sudinadurdinAByAm ca ","3.1.17-2:nIhArAt ca","3.1.19-1:namasaH kyaci dvitIyAnupapattiH ","3.1.19-2:prakftyantaratvAt sidDam ","3.1.19-3:kyajAdizu pratyayArTanirdeSaH","3.1.21-1:halikalyoH atvanipAtanam sanvadBAvapratizeDArTam","3.1.22-1:yaNviDO DAtugrahaRe uktam ","3.1.22-2:ekAjJalAdigrahaRe ca ","3.1.22-3:UrRoteH ca upasaNKyAnam","3.1.22-9:sUcisUtrimUtryawyartyaSyUrRugrahaRam yaNviDO anekAjahalAdyarTam vAcyaH UrRorRuvadBAvaH yaNprasidDiH prayojanam AmaH ca pratizeDArTam ekAcaH ca iqupagrahAt ","3.1.22-4:kriyAsamaBihAre yaNaH vipratizeDena loqviDAnam ","3.1.22-5:na vA nAnArTatvAt kartfkarmaRoH hi laviDAnam kriyAviSeze svArTe yaN ","3.1.22-6:uttarayoH vigraheRa viSezAsampratyayAt nityagrahaRAnarTakyam ","3.1.22-7:kriyAsamaBihAre ca na eteByaH","3.1.25-1:satyasya kfYi Apuk ca ","3.1.25-2:RividO arTavedasatyAnAm apuk ca","3.1.26-1:hetumati iti kArakopAdAnam pratyayArTaparigrahArTam yaTA tanUkaraRe takzaH ","3.1.26-2:hetunirdeSaH ca nimittamAtram bikzAdizu darSanAt ","3.1.26-3:kfzyAdizu ca anutpattiH nAnAkriyARAm kfzyarTatvAt ","3.1.26-4:yajyAdizu ca aviparyAsaH nAnAkriyARAm yajyarTatvAt ","3.1.26-5:tat karoti iti upasaNKyAnam sUtrayatyAdyarTam ","3.1.26-6:AKyAnAt kftaH tat Acazwe iti kflluk prakftipratyApattiH prakftivat ca kArakam ","3.1.26-7:AKyAnAt ca pratizeDaH ","3.1.26-8:dfSyarTAnAm ca pravfttO ","3.1.26-9:ANlopaH ca kAlAtyantasaMyoge maryAdAyAm ","3.1.26-10:citrIkaraRe prApi ","3.1.26-11:nakzatrayoge jYi ","3.1.26-12:na vA sAmAnyakftatvAt hetutaH hi aviSizwam ","3.1.26-13:svatantraprayojakatvAt aprayojakaH iti cet muktasaMSayena tulyam ","3.1.26-14:pravfttiH hi uBayatra anapekzya ","3.1.26-15:kurvataH prayojakaH iti cet tulyam","3.1.27-1:kaRqvAdiByaH vAvacanam ","3.1.27-2:avacane hi nityapratyayatvam ","3.1.27-3:tatra DAtuviDitukpratizeDaH ","3.1.27-4:hrasvayalopO ca vaktavyO SlokavArttika: DAtuprakaraRAt DAtuH kasya AsaYjanAt api Aha ca ayam imam dIrGam manye DAtuH viBAzitaH","3.1.30-1:RiNi RitkaraRasya sAvakASatvAt vfdDipratizeDaprasaNgaH ","3.1.30-2:mitpratizeDasya ca arTavattvAt ","3.1.30-3:uktam vA","3.1.31-1:AyAdiByaH yat ArDaDAtukam AyAdiprakfteH yat ArDaDAtukam iti ca uBayaTA anizwaprasaNgaH ","3.1.31-2:sidDam tu sArvaDAtuke nityavacanAt anASritya vAviDAnam ","3.1.31-3:syAdibalIyastvam tu vipratizeDena tulyanimittatvAt ","3.1.31-4:na vA AyAdiviDAnasya anavakASatvAt","3.1.32-1:sanAdizu antagrahaRe uktam","3.1.34-1:sip utsargaH Candasi ","3.1.34-2:sanAdyante nezatvAdyarTaH ","3.1.34-3:prakftyantaratvAt sidDam ","3.1.34-4:nezatu nezwAt iti darSanAt ","3.1.34-5:pitkaraRAnarTakyam ca anackatvAt ","3.1.34-6:iwaH anudAttArTam iti cet AgamAnudAttatvAt sidDam ","3.1.34-7:sip bahulam Candasi Rit","3.1.35-1:kAsgrahaRe cakAsaH upasaNKyAnam","3.1.36-1:gurumataH AmviDAne liRnimittAt pratizeDaH ","3.1.36-2:gurumadvacanam kimarTam iti cet Rali uttame yajAdipratizeDAfTam ","3.1.36-3:upadeSavacanAt sidDam ","3.1.36-4:fcCipratizeDaH jYapakaH ucCeH AmBAvasya ","3.1.36-5:uktam vA ","3.1.36-6:UrRoteH ca upasaNKyAnam SlokavArttika: vAcyaH UrRoH RuvadBAvaH yaNprasidDiH prayojanam AmaH ca pratizeDArTam ekAcaH ca iqupagrahAt","3.1.38-1:videH Am kit BAradvAjIyAH paWanti videH Am kit nipAtanAt vA aguRatvam iti","3.1.39-1:SluvadatideSe prayojanam dvitvettve","3.1.40-1:kfYaH anuprayogavacanam astiBUpratizeDArTam ","3.1.40-2:AtmanepadaviDyarTam ca ","3.1.40-3:izwaH sarvAnuprayogaH ","3.1.40-4:sarvAnuprayogaH iti cet aSizyam arTABAvAt ","3.1.40-5:arTABAvAt ca anyasya ","3.1.40-6:liwparArTam vA ","3.1.40-7:arTasamApteH vA anuprayogaH na syAt ","3.1.40-8:viparyAsanivfttyarTam vA ","3.1.40-9:vyavahitnivfttyarTam ca","3.1.43-1:clyutsargaH sAmAnyagrahaRArTaH ","3.1.43-2:ksaviDAne ca aniqvacane clisampratyayArTaH ","3.1.43-3:GasxBAve ca ","3.1.43-4:cleH citkaraRam viSezaRAfTam ","3.1.43-5:iditkaraRam sAmAnyagrahaRArTam","3.1.44-1:sicaH citkaraRAnarTakyam sTAnivatvAt ","3.1.44-2:arTavat tu citkaraRasAmarTyAt hi iwaH udAttatvam ","3.1.44-3:tasmAt citkaraRam ","3.1.44-4:iditkaraRam nakAralopABAvArTam ","3.1.44-5:na vA hanteH sicaH kitkaraRam nakAralopABAvasya ","3.1.44-6:idittvAt vA sTAnivattvAt ","3.1.44-7:spfSamfSakfzatfpadfpaH sic vA","3.1.45-1:ksaviDAne igupaDABAvaH cleH guRanimittatvAt ","3.1.45-2:na vA ksasya anavakASatvAt apavAdaH guRasya ","3.1.45-3:aniqvacanam aviSezaRam cleH nityAdizwatvAt ","3.1.45-4:na vA ksasya sijapavAdatvAt tasya ca aniqASrayatvAt aniwi prasidDe ksavidDiH ","3.1.45-5:Seze sijviDAnam","3.1.46-1:SlizaH AliNgane niyamAnupapattiH viDeyaBAvAtyogaviBAgAt sidDam ","3.1.46-2:sidDam tu SlizaH AliNgane aciRvizaye ","3.1.46-3:aNviDAne ca SlizaH anAliNgane ","3.1.46-4:yogaviBAgAt sidDam","3.1.48-1:RiSridrusruzu kameH upasaNKyAnam","3.1.48-2:karmakartari ca ","3.1.48-3:na vA karmaRi aviDAnAt kartftvAt ca karmakartuH sidDam","3.1.52-1:asyatigrahaRam AtmanepadArTam ","3.1.52-2:karmakartari ca","3.1.67-1:BAvakarmakartAraH sArvaDAtukArTAH cet ekadvibahuzu niyamAnupapattiH atadarTatvAt ","3.1.67-2:vikaraRArTAH iti cet kftA aBihite vikaraRABAvaH SlokavArttika: supAm karmAdayaH api arTAH saNKyA ca eva taTA tiNAm prasidDaH niyamaH tatra niyamaH prakftezu vA ","3.1.67-3:BAvakarmaRoH yagviDAne karmakartari upasaNKyAnam ","3.1.67-4:vipratizeDAt hi SapaH balIyastvam ","3.1.67-5:yogaviBAgAt sidDam SlokavArttika: BAvakarmaRoH iti anuvfttyA eva sidDe sati anivfttiH yakaH BAvAya kartari iti ca yogaviBAgaH SyanaH pUrvavipratizeDAvacanAya","3.1.78-1:Snami SitkaraRam pvAdihrasvArTam ","3.1.78-2:na vA DAtvanyatvAt ","3.1.78-3:bahulam pit sArvaDAtukam Candasi","3.1.83-1:SnAvikArasya SitkaraRAnarTakyam sTAnivatvAt ","3.1.83-2:arTavat tu jYApakam sArvaDAtukAdeSe anubanDAsTAnivattvasya ","3.1.83-3:prayojanam hitAtaNoH apittvam ","3.1.83-4:tabAdizu ca aNittvam ","3.1.83-5:tasya dozaH mipaH AdeSe pidaBAvaH ","3.1.83-6:videH vasoH Sittvam ","3.1.83-7:kitkaraRAt vA sidDam","3.1.84-1:SAyac Candasi sarvatra","3.1.86-1:ASizi aNaH prayojanam sTAgAgamivacividayaH ","3.1.86-2:dfSoH ak pitaram ca dfSeyam mAtaram ca","3.1.87-1:karmavat akarmakasya kartA ","3.1.87-2:karma dfzwaH cet samAnaDAtO ","3.1.87-3:karmasTaBAvakAnam karmasTakriyARAm ca ","3.1.87-4:AtmanepadaSabAdiviDipratizeDaH ","3.1.87-5:karmakartari kartftvam svAtantryasya vivakzitatvAt ","3.1.87-6:tatra lAntasya karmavadanudeSaH ","3.1.87-7:itaraTA hi kftyaktaKalarTezu pratizeDaH ","3.1.87-8:sidDam tu prAkftakarmatvAt ","3.1.87-9:AtmasaMyoge akarmakartuH karmadarSanAt ","3.1.87-10:padalopaH ca ","3.1.87-11:sakarmakARAm pratizeDaH anyonyam ASlizyataH iti ","3.1.87-12:tapeH vA sakarmakasya vacanam niyamArTam ","3.1.87-13:tasya ca tapaHkarmakasya eva ","3.1.87-14:duhipacyoH bahulam sakarmakayoH ","3.1.87-15:sfjiyujyoH Syan tu ","3.1.87-16:karaRena tulyakriyaH kartA bahulam ","3.1.87-17:sravatyAdInAm pratizeDaH ","3.1.87-18:BUzAkarmakiratisanAm ca anyatra AtmanepadAt","3.1.89-1:yakciRoH pratizeDe hetumaRRiSribrUYAm upasaNKyAnam","3.1.90-1:kuzirajoH SyanviDAne sArvaDAtukavacanam ","3.1.90-2:avacane hi liNliwoH pratizeDaH","3.1.91-1:DAtuvaDikAraH prAk lAdeSAt ","3.1.91-2:lAdeSe hi vyavahitatvAt aprasidDiH SlokavArttika: Adye yoge na vyavAye tiNaH syuH na syAt etvam weH witAm yat viDatte eSaH Sittvam yat ca lowaH viDatte yat ca api uktam laNliNoH tat ca na syAt ","3.1.91-3:prayojanam prAtipadikapratizeDaH ","3.1.91-4:svapAdizu ","3.1.91-5:aNgasaYjYA ca ","3.1.91-6:kftsaYjYA ca ","3.1.91-7:upapadasaYjYA ca ","3.1.91-8:DAtugrahaRam anarTakam yaNviDO DAtvaDikArAt ","3.1.91-9:anaDikAre hi aNgasaYjYABAvaH ","3.1.91-10:hetumadvacanam tu jYApakam anyatrABAvasya ","3.1.91-11:kaRqvAdizu ca vyapadeSivadvacanAt","3.1.92-1:tatragrahaRam vizayArTam ","3.1.92-2:upapadasaYjYAyAm samarTavacanam ","3.1.92-3:nimittopAdanam ca ","3.1.92-4:anupAdAne hi anupapade pratyayaprasaNgaH ","3.1.92-5:nirdeSaH saYjYAkaraRArTaH ","3.1.92-6:tatravacanam upapadasanniyogArTam","3.1.94-1:asarUpasya vAvacanam utsargasya bADakavizaye anivfttyarTam ","3.1.94-2:tatra utpattivAprasaNgaH yaTA tadDite ","3.1.94-3:sidDam tu asarUpasya bADakasya vAvacanAt ","3.1.94-4:anubanDaBinnezu viBAzAprasaNgaH ","3.1.94-5:sidDam anubanDasya anekAntatvAt ","3.1.94-6:prayoge cet lAdeSezu pratizeDaH ","3.1.94-7:striyAm pratizeDe ktalyuwtumunKalarTezu viBAzAprasaNgaH ","3.1.94-8:striyAH prAk iti cet ktvAyAm vAvacanam ","3.1.94-9:kAlAdizu tumuni ","3.1.94-10:arhe tfjviDAnam","3.1.95-1:kftyasaYjYAyAm prANRvulvacanam ","3.1.95-2:arhe kftyatrjvacanam tu jYApakam prANRvulavanAnarTyasya","3.1.96-1:kelimaraH upasaNKyAnam ","3.1.96-2:vaseH tavyat kartari Rit ca ","3.1.96-3:tadDitaH vA","3.1.97-1:yati jAteH upasaNKyAnam","3.1.97-2:hanaH vA vaDa ca ","3.1.97-3:tadDitaH vA","3.1.100-1:anupasargAt careH ANi ca agurO","3.1.103-1:svAmini antodAttatvam ca","3.1.105-1:ajaryam kartari","3.1.106-1:vadaH supi anupasargagrahaRam","3.1.108-1:hanaH taH cit striyAm Candasi","3.1.109-1:kyabviDO vfYgrahaRam ","3.1.109-2:aYjeH ca upasaNKyAnam saYjYAyAm","3.1.112-1:BfYaH saYjYApratizeDe striyAm apratizeDaH anyena vihitatvAt ","3.1.112-2:pratizeDaH kimarTaH iti cet astrIsaYjYApratizeDArTaH ","3.1.112-3:sidDam tu striyAm saYjYApratizeDAt SlokavArttika: aparaH Aha saYjYAyAm puMsi dfzwatvAt na te BAryA prasiDyati striyAm BAvADikAraH asti tena BAryA prasiDyati aTa vA bahulam kftyAH saYjYAyAm iti tat smftam yaTA yatyam janyam yaTA BittiH taTA eva sA ","3.1.112-4:samaH ca bahulam","3.1.114-1:sUryarucyAvyaTyAH kartari ","3.1.114-2:sUsartiByAm sarteH utvam suvateH vA ruqAgamaH kupyam saYjYAyAm ","3.1.114-3:kfzwapacyasya antodAttatvam ca karmakartari ca","3.1.118-1:pratyapiByAm graheH Candasi","3.1.124-1:pARO sfjeH RyadviDiH ","3.1.124-2:samavapUrvAt ca ","3.1.124-3:lapidamiByAm ca","3.1.125-1:AvaSyake upapade iti cet dyotye upasaNKyAnam ","3.1.125-2:dyotye iti cet svarasamAsAnupapattiH ","3.1.125-3:oH AvaSyake RyataH stOteH kyap pUrvavipratizidDam","3.1.129-1:pAyyanikAyyayoH AdipatvakatvanipAtanam","3.1.130-1:kuRqapAyye yadviDiH","3.1.131-1:samUhyaH iti anarTakam vacanam sAmAnyena kftatvAt ","3.1.131-3:UhivigrahAt ca brAhmaRe sidDam","3.1.132-1:agnicityA BAve antodAttaH","3.1.133-1:Rvuli sakarmakagrahaRam ","3.1.133-2:na vA DAtumAtrAt darSanAt RvulaH ","3.1.133-3:tfjAdizu vartamAnakAlopAdAnam aDyAyakavedADyAyakArTam ","3.1.133-4:na vA kAlamAtre darSanAt anyezAm","3.1.134-1:ac api sarvaDAtuByaH ","3.1.134-2:pacAdyanukramaRam anubanDAsaYjArTam apavAdabADanArTam ca","3.1.135-1:igupaDeByaH upasarge kaviDiH mezAdyarTaH ","3.1.135-2:na vA buDAdInAm darSanAt anupasarge api","3.1.137-1:jiGraH saYjYAyAm pratizeDaH","3.1.138-1:anupasargAt nO limpeH ","3.1.138-2:gavi ca vindeH saYjYAyAm","3.1.140-1:tanoteH RaH upasaNKyAnam","3.1.141-1:prusflvaH sADukAriRi vunviDAnam","3.2.1-1:karmaRi nirvartyamARavikriyamARe cet vedADyAyAdInAm upasaNKyAnam ","3.2.1-2:yatra ca niyuktaH ","3.2.1-3:hfgrahinIvahiByaH ca ","3.2.1-4:aparigaRanam vA ","3.2.1-5:anaBiDAnAt ","3.2.1-6:akArAt anupapadAt karmopapadaH vipratizeDena ","3.2.1-7:SIlikAmiBakzyAcariByaH RaH pUrvapadaprakftisvaratvam ca ","3.2.1-8:IkzikzamiByAm ca ","3.2.1-9:na tu amBoBigamA AnnAdAya iti ca kftAm vyatyayaH Candasi","3.2.3-1:kaviDO sarvatra prasAraRiByaH qaH ","3.2.3-2:ke hi samprasAraRaprasaNgaH SlokavArttika: nityam prasAraRam hvaH yaR vArRAt ANgam na pUrvatvam yaH anAdizwAt acaH pUrvaH tatkArye sTAnivattvam hi provAca BagavAn kAtyaH tena asidDiH yaRaH te AtaH kaH liw na eNaH pUrvaH sidDaH AhvaH taTA sati","3.2.4-1:supi sTaH BAve ca ","3.2.4-2:yogaviBAgAt sidDam","3.2.5-1:tundaSokayoH parimfjApanudoH AlasyasuKAharaRayoH ","3.2.5-2:kaprakaraRe mUliaviBujAdiByaH upasaNKyAnam","3.2.8-1:surAsIDvoH pibateH ","3.2.8-2:bahulam taRi","3.2.9-1:acprakaraRe SaktilANgalANkuSayazwitomaraGawaGawIDanuHzu GraheH upasaNKyAnam ","3.2.9-2:sUtre ca DAryarTe","3.2.13-1:stambakarRayoH hastisUcakayoH","3.2.14-1:Sami saYjYayAm DAtugrahaRam kfYaH hetvAdizu wapratizeDArTam","3.2.15-1:aDikaraRe SeteH pArSvAdizu upasaNKyAnam ","3.2.15-2:digDasahapUrvAt ca ","3.2.15-3:uttAnAdizu kartfzu ","3.2.15-4:girO qaH Candasi ","3.2.15-5:tadDitaH vA","3.2.16-1:careH BikzAgrahaRam jYapakam karmaRi aprasaNgaH","3.2.21-1:kiMyattadbahuzu kfYaH ajviDAnam","3.2.24-1:stambaSakftoH vrIhivatsayoH","3.2.26-1:BfYaH kukzyAtmanoH mum ca","3.2.28-1:KaSprakaraRe vAtasunItilaSarDezu ajaDewtudajahAtiByaH","3.2.29-1:stane DewaH ","3.2.29-2:muzwO DmaH ca","3.2.38-1:KacprakaraRe gameH supi upasaNKyAnam ","3.2.38-2:vihAyasaH viha ca ","3.2.38-3:Kac ca qit vA ","3.2.38-4:qe ca","3.2.48-1:qaprakaraRe sarvatrapannayoH upasaNKyAnam ","3.2.48-2:urasaH lopaH ca ","3.2.48-3:suduroH aDikaraRe ","3.2.48-4:nisaH deSe","3.2.49-1:dArO AhanaH aR antyasya ca waH saYjYAyAm ","3.2.49-2:cArO vA ","3.2.49-3:karmaRi sami ca","3.2.55-1:rAjaGe upasaNKyAnam","3.2.56-1:Kyuni cvipratizeDAnarTakyam lyuwKynoH aviSezAt ","3.2.56-2:mumarTam iti cet na avyayatvAt ","3.2.56-3:uttarArTam tu","3.2.59-1:DfzeH dvirvacanam antodAttatvam ca","3.2.60-1:dfSeH samAnAnyayoH ca upasaNKyAnam ","3.2.60-2:kfdarTAnupapattiH tu ","3.2.60-3:ivArTe tu tadDitaH","3.2.61-1:sadAdizu subgrahaRam","3.2.68- 69-1:adaH ananne kravyegrahaRam vAsarUpanivfttyarTam","3.2.71-1:SvetavahAdInAM qas ","3.2.71-2:padasya ca ","3.2.71-3:rvarTam","3.2.78-1:RinviDO sADukAriRi upasaNKyAnam ","3.2.78-2:brahmaRi vadaH","3.2.83-1:karmakartari ca","3.2.84-1:nizWAyAm itaretarASrayatvAt aprasidDiH ","3.2.84-2:avyayanirdeSAt sidDam ","3.2.84-3:na vA tadviDAnasya anyatra aBAvAt ","3.2.84-4:BUtADikArasya prayojanam kumAraGAtI SIrzaGAtI AKuhA biqAlaH sutvAnaH sunavantaH suzupuzaH anehAH agnim AdaDAnasya","3.2.87-1:brahmAdizu hanteH kvibvacanam niyamArTam ","3.2.87-2:taTA ca uttarasya niyamAfTam","3.2.93-1:karmaRi kutsite","3.2.102-1:nizWAyAm itaretarASrayatvAt aprasidDiH ","3.2.102-2:dviH vA ktaktavtugrahaRam ","3.2.102-3:AdikarmaRi nizWA ","3.2.102-4:yat vA BavantyarTe ","3.2.102-5:nyAyyA tu AdyapavargAt ","3.2.102-6:vA ca AdyatanyAm","3.2.106- 107-1:kAnackvasoH vAvacanam Candasi tiNaH darSanAt ","3.2.106- 107-2:na vA anena vihitasya AdeSavacanAt ","3.2.106- 107-3:kitkararaRam saMyogArTam ","3.2.106- 107-4:FkArAntaguRapratizeDArTam vA","3.2.108-1:BAzAyAm sadAdiByaH vA liw ","3.2.108-2:tadvizaye luNaH anivfttyarTam ","3.2.108-3:anadyatanaparokzayoH ca ","3.2.108-4:apavAdavipratizeDAt hi tayoH BAvaH ","3.2.108-5:tasya kvasuH aparokze nityam","3.2.109-1:upeyuzi nipAtanam iqarTam iti cet ajAdO atiprasaNgaH ","3.2.109-2:ekAdizwasya IyBAvArTam tu ","3.2.109-3:vyaYjane yaRAdeSArTam vA SlokavArttika: na upeyivAn nipAtyaH dvirvacanAd iw Bavizyati paratvAt anyezAm ekAcAm dvirvacanam nityam iti AhuH asya punaH iw ca nityaH dvivracanam ca na vihanyate hi asya dvirvacane ca ekActvAt tasmAt iw bADate dvitvam ","3.2.109-4:anUcAnaH kartari","3.2.110-1:luNlfwoH apavAdaprasaNgaH BUtaBavizyatoH aviSezavacanAt ","3.2.110-2:na vA apavAdasya nimittABAvAt anadyatane hi tayoH viDAnam ","3.2.110-3:vaseH luN rAtriSeze ","3.2.110-4:jAgaraRasantatO","3.2.111-1:anadyatane iti bahuvrIhinirdeSaH adya hyaH aBukzmahi iti ","3.2.111-2:parokze ca lokavijYAte prayoktuH darSanavizaye","3.2.114-1:viBAzA sAkANkze sarvatra","3.2.115-1:parokze liw atyantaApahnave ca","3.2.118-1:sma purA BUtamAtre na sma purA adyatane SlokavArttika: smAdiviDiH purAntaH yadi aviSezeRa kim kftam Bavati na sma purA adyatane iti bruvatA kAtyAyanena iha anuvfttiH anadyatanasya lAt sme iti tatra na asti naYkAryam aparokzAnadyatanaH nanO ca nanvoH ca nivfttO na purA adyatane iti Bavet etat vAcyam tatra ca api laNgrahaRam aTa budDiH aviSezAd sma purA hetU tatra ca api SrRu BUyaH aparokze ce iti ezaH prAk purisaMSabdanAt avinivfttaH sarvatra anadyatanaH taTA sati naYA kim iha kAryam smAdO aparokze ca iti akAryam iti Sakyam etat api vidDi Sakyam hi nivartayitum parokze iti lAt sme iti atra syAt ezA tava budDiH smalakzaRe api evam eva sidDam iti law sme iti Bavet na arTaH tasmAt kAryam parArTam tu","3.2.120-1:nanO pfzwaprativacane iti aSizyam kriyAsamApteH vivakzitatvAt","3.2.122-1:haSaSvadByAm purA ","3.2.122-2:smaH sarveByaH vipratizeDena","3.2.123-1:pravfttasya avirAme SizyA BavantI avartamAnatvAt ","3.2.123-2:nityapravftte ca kAlAviBAgAt ","3.2.123-3:nyAyyA tu AramBAnapavargAt ","3.2.123-4:asti ca muktasaMSaye virAmaH ","3.2.123-5:santi ca kAlaviBAgAH Slokas: na vartate cakram izuH na pAtyate na syandante saritaH sAgarAya kUwasTaH ayam lokaH na vicezwA asti yaH hi evam paSyati saH api ananDaH .mImAMsakaH manyamAnaH yuvA meDAvisammataH kAkam sma iha anupfcCati kim te patitalakzaRam anAgate na patasi atikrAnte ca kAka na yadi samprati patasi sarvaH lokaH patati ayam himavAn api gacCati anAgatam atikrAntam vartamAnam iti trayam sarvatra gatiH na asti gacCati iti kim ucyate kriyApravfttO yaH hetuH tadarTam yat vicezwitam tat samIkzya prayuYjIta gacCati iti avicArayan bisasya vAlAH iva dahyamAnAH na lakzyate vikftiH sannipAte asti iti tAm vedayante triBaBAvAH sUkzmaH hi BAvaH anumitena gamyaH","3.2.124-1:lasya apraTamAsamAnADikaraRena ayogAt adeSAnupapattiH yaTA anyatra ","3.2.124-2:yogaH iti cet anyatra api yogaH syAt ","3.2.124-3:lawaH SatfSAnacO apraTamAsamAnADikaraRe iti cet pratyayottarapadayoH upasaNKyAnam ","3.2.124-4:prasajyapratizeDeuttarapade AdeSAnupapattiH ","3.2.124-5:sidDam tu pratyayottarapadayoH ca iti vacanAt ","3.2.124-6:tatra pratyayasya AdeSanimittatvAt aprasidDiH ","3.2.124-7:uttarapadasya ca subantanimittatvAt SatfSAnacoH aprasidDiH ","3.2.124-8:na vA lakArasya kfttvAt prAtipadikatvam tadASrayam pratyayaviDAnam ","3.2.124-9:tiNAdeSAt subutpattiH ","3.2.124-10:tasmAt uttarapadaprasidDiH SatfSAnacO yadi lawaH vA","3.2.126-1:lakzaRahetvoH kriyAyAH guRe upasaNKyAnam ","3.2.126-2:kartuH ca lakzaRayoH paryAyeRa acayoge ","3.2.126-3:tattvAnvAKyAne ca ","3.2.126-4:sadAdayaH ca bahulam ","3.2.126-5:iNjuhotyoH vAvacanam ","3.2.126-6:mANi AkroSe","3.2.127-1:tO sat iti vacanam asaMsargArTam SlokavArttika: avaDAraRam lfwi viDAnam yogaviBAgataH ca vihitam sat ","3.2.127-2:uttarayoH lAdeSe vAvacanam ","3.2.127-3:sADanABiDAnam ","3.2.127-4:svaraH ","3.2.127-5:upagrahapratizeDaH ca ","3.2.127-6:alAdeSe zazWIpratizeDaH ","3.2.127-7:dvizaH SatuH vAvacanam","3.2.135-1:tfnviDO ftvikzu ca anupasargasya ","3.2.135-2:nayateH zuk ca ","3.2.135-3:na vA DAtvanyatvAt ","3.2.135-4:nezatu nezwAt iti darSanAt ","3.2.135-5:tvizeH devatAyAm akAraH ca upaDAyAH aniwvam ca ","3.2.135-6:kzadeH ca yukte ","3.2.135-7:Candasi tfc ca","3.2.139-1:snoH kittve sTaH IkArpratizeDaH ","3.2.139-2:akiti guRapratizeDaH ","3.2.139-3:BuvaH iwpratizeDaH ca ","3.2.139-4:sTAdaMSiByAm snuH Candasi SlokavArttika: sToH gittvAt na sTaH IkAraH kNitoH IttvaSAsanAt guRABAvaH trizu smAryaH Sryuko aniwtvam gakoH itoH","3.2.141-1:GinuR akarmakARAm ","3.2.141-2:uktam vA","3.2.146-1:vuYm anekAcaH ","3.2.146-2:nindAdiByaH vuYvacanam anyeByaH RvulaH pratizeDArTam ","3.2.146-3:tfjAdipratizeDAfTam vA","3.2.150-1:padigrahaRam anarTakam anudAttetaH ca halAdeH iti sidDatvAt ","3.2.150-2:asarUpanivfttyarTam tu","3.2.158-1:Aluci SINgrahaRam","3.2.171-1:kikinoH kittvam FkAraguRapratizeDAfTam ","3.2.171-2:utsargaH Candasi sadAdiByaH darSanAt ","3.2.171-3:BAzAyAm DAYkfsfjaninimiByaH ","3.2.171-4:sAsahivAvahicAcalipApatInAm nipAtanam","3.2.178-1:kvibviDiH anupapadArTaH ","3.2.178-2:vacipracCyAyatastukawaprujuSrIRAm dIrGaH ca ","3.2.178-3:dyutigamijuhotInAm dve ca ","3.2.178-4:DAyateH samprasAraRam ca","3.2.180-1:quprakaraRe mitadrvAdiByaH upasaNKyAnam DAtuviDitukpratizeDArTam","3.3.3-1:Bavizyati iti anadyatane upasaNKyAnam ","3.3.3-2:itaretarASrayam ca ","3.3.3-3:uktam vA ","3.3.3-4:BavizyadaDikArasya prayojanam yAvat pacati purA pacati iti anapaSabdatvAya","3.3.4-1:yAvatpurAdizu laqviDiH luwaH pUrvavipratizidDam","3.3.10-1:RvulaH kriyArTopapadasya punarviDAnam tfjAdipratizeDArTam","3.3.11-1:BAvavacanAnAm yaTAvihitAnAm pratipadaviDyarTam","3.3.12-1:aRaH punarvacanam apavAdavizaye anivfttyarTam","3.3.13-1:lfwi Sezavacanam kriyAyAm pratipadaviDyarTam ","3.3.13-2:aviSezeRa viDAne lfwaH aBAvaH pratizidDatvAt","3.3.14-1:sadviDiH nityam apraTamAsamAnADikaraRe","3.3.15-1:paridevane SvastanIBavizyantyarTe ","3.3.15-2:kAlaprakarzAt tu upamAnam","3.3.16-1:spfSaH upatApe","3.3.18-1:BAve sarvaliNgo nirdeSaH","3.3.19-1:kArakagrahaRam anAdeSe svArTavijYAnAt ","3.3.19-2:saYjYAgrahaRAnarTakyam ca sarvatra GaYaH darSanAt ","3.3.19-3:atiprasaNgaH iti cet aBiDAnalakzaRatvAt pratyayasya sidDam","3.3.20-1:sarvagrahaRam anarTakam parimARAKyAyam iti sidDatvAt ","3.3.20-2:GaYanukramaRam ajabvizaye ","3.3.20-3:avacane hi strIpratyayAnAm api apavAdavijYAnam ","3.3.20-4:dArajArO kartari Riluk ca ","3.3.20-5:karaRe vA","3.3.21-1:iNaH ca iti apAdAne striyAm upasaNKyAnam tadantAt ca vA NIz ","3.3.21-2:SF vAyuvarRanivftezu","3.3.36-1:sami muzwO iti anarTakam vacanam parimARAKyAyAm iti sidDatvAt ","3.3.36-2:aparimARArTam tu ","3.3.36-3:udgrABinigrABO ca Candasi srugudyamananipAtanayoH","3.3.43-1:karmavyatihAre strIgrahaRam vyatipAkArTam ","3.3.43-2:pfTak grahaRam bADakabADanArTam ","3.3.43-3:vyAvacorIvyAvacarcyarTam ","3.3.43-4:tatra vyatIkzAdizu dozaH ","3.3.43-5:sidDam tu prakfte strIgrahaRe RajgrahaRam RijgrahaRam ca","3.3.44-1:aBiviDO BAvagrahaRam napuMsake ktAdinivfttyarTam ","3.3.44-2:pfTak grahaRam bADakabADArTam ","3.3.44-3:na tu lyuw","3.3.56-1:ajviDO Bayasya upasaNKyAnam ","3.3.56-2:napuMsake ktAdinivfttyarTam ","3.3.56-3:kalpAdiByaH ca pratizeDaH ","3.3.56-4:javasavO Candasi","3.3.58-1:abviDO niScigrahaRam anarTakam steyasya GaYviDO pratizeDAt ","3.3.58-2:asteyArTam iti cet na anizwatvAt ","3.3.58-3:vaSiraRyoH ca upasaNKyAnam ","3.3.58-4:GaYarTe kaviDAnam sTAsnApAvyaDihaniyuDyarTam","3.3.90-1:yajAdiByaH nasya Nittve samprasAraRapratizeDaH ","3.3.90-2:aNiti guRapratizeDaH","3.3.94-1:striyAm ktin AbAdiByaH ca ","3.3.94-2:nizWAyAm vA sewaH akAravacanAt sidDam","3.3.95-1:sTAdiByaH sarvApavAdaprasaNgaH ","3.3.95-2:sidDam tu aNviDAne sTAdipratizeDAt ","3.3.95-3:SrutijizistuByaH karaRe ","3.3.95-4:glAjyAhAByaH niH","3.3.98-1:kyabviDiH aDikaraRe ca","3.3.100-1:kfYaH Sa ca iti vAvacanam ktinarTam","3.3.104-1:BidA vidAraRe ","3.3.104-2:CiDA dvEDIkaraRe ","3.3.104-3:ArA SastryAm ","3.3.104-4:DArA prapAte ","3.3.104-5:guhA giryozaDyoH","3.3.107-1:yucprakaraRe GawwivandiviDiByaH ca upasaNKyAnam ","3.3.107-2:izeH anicCArTasya ","3.3.107-3:pareH vA","3.3.108-1:DAtvarTanirdeSe Rvul ","3.3.108-2:ikStipO DAtunirdeSe ","3.3.108-3:varRAt kAraH ","3.3.108-4:rAt iPaH ","3.3.108-5:matvarTAt CaH ","3.3.108-6:iR ajAdiByaH ","3.3.108-7:iY vapAdiByaH ","3.3.108-8:ik kfzyAdiByaH ","3.3.108-9:sampadAdiByaH kvip","3.3.119-1:gocarAdInAm agrahaRam prAyavacanAt yaTA kazaH nikazaH iti","3.3.121-1:GaYviDO avahArADArAvAyAnAm upasaNKyAnam","3.3.123-1:udaNkaH anudakagrahaRAnarTakyam ca prAyavacanAt yaTA godohanaH prasADanaH iti","3.3.125-1:KanaH qaqarekekavakAH ]","3.3.126-1:ajabByAm strIKalanAH ","3.3.126-2:striyAH KalanO vipratizeDena","3.3.127-1:Kal kartfkaraRayoH cvyarTayoH ","3.3.127-2:kartfkarmagrahaRam ca upapadasaYjYArTam","3.3.130-1:BAzAyAm SAsiyuDidfSiDfziByaH yuc","3.3.131-1:vartamAnasAmIpye vartamAnavadvacanam SatrAdyarTam","3.3.132-1:ASaMsAyAm BUtavadatideSe laNliwoH pratizeDaH ","3.3.132-2:na vA apavAdasya nimittABAvAt anadyatane hi tayoH viDAnam ","3.3.132-3:ASaMsAsamBAvanayoH aviSezAt tadviDAnasya aprAptiH ","3.3.132-4:na vA samBAvanAvayavatvAt ASaMsAyAH ","3.3.132-5:arTAsandehaH vA alamarTatvAt samBAvanasya","3.3.133-1:kzipravacane lfaH ASaMsAvacane liN vipratizeDena ","3.3.133-2:anizpanne nizpannaSabdaH SizyaH anizpannatvAt ","3.3.133-3:sidDam tu BavizyatpratizeDAt ","3.3.133-4:hetuBUtakAlasamprekzitatvAt vA ","3.3.133-5:astyarTAnAm BavantyarTe sarvAH viBaktayaH ","3.3.133-6:sidDam tu yaTAsvam kAlasamuccAraRAt ","3.3.133-7:avAtvAt ","3.3.133-8:asidDaviparyAsaH ca","3.3.135-1:na anadyatanavatpratizeDe laNluwoH pratizeDaH ","3.3.135-2:adyatanavadvacane hi viDAnam ","3.3.135-3:tatra laqviDiprasaNgaH ","3.3.135-4:luNlfwoH ca ayaTAkAlam","3.3.136-1:Bavizyati maryAdAvacane avarasmin iti akriyAprabanDArTam ","3.3.136-2:kriyAprabanDArTam iti cet vacanAnarTakyam ","3.3.136-3:ahorAtrapratizeDArTam iti cet na anizwatvAt","3.3.137-1:anahorAtrARAm iti tadviBAge pratizeDaH ","3.3.137-2:tEH ca viBAge","3.3.140-1:BUte lfN utApyAdizu","3.3.141-1:viBAzA garhApraBftO prAk utApiByAm","3.3.142-1:garhAyAm laqviDAnAnarTakyam kriyAsamAptivivakzitatvAt","3.3.145-1:kiMvfttasya anaDikArAt uttaratra akiMvfttagrahaRAnarTakyam","3.3.147-1:jAtuyadoH liNviDAne yadAyadyoH upasaNKyAnam","3.3.151-1:citrIkaraRe yadipratizeDAnarTakyam arTAnyatvAt","3.3.156-1:hetuhetumatoH liN vA ","3.3.156-2:BavizyadaDikAre Sloka: devatrAtaH galaH grAhaH itiyoge ca sadviDiH miTaH te na viBAzyante gavAkzaH saMSitavrataH","3.3.157-1:kAmapravedanam cet","3.3.161-1:nimantraRAdIInAm arTe iti cet AmantrayE nimantrayE Bavantam iti pratyayAnupapattiH prakftyA aBihitatvAt ","3.3.161-2:dvivacanabahuvanAprasidDiH ca ekArTatvAt ","3.3.161-3:sidDam tu dvitIyAkANkzasya prakfte pratyayArTe pratyayaviDAnAt SlokavArttika: supAm karmAdayaH api arTAH saNKyA ca eva taTA tiNAm prasidDaH niyamaH tatra niyamaH prakftezu vA","3.3.163-1:prEzAdizu kftyAnAm vacanam niyamArTam iti cet tat anizwam ","3.3.163-2:viDyarTam tu striyAH prAk iti vacanAt","3.4.1-1:DAtusambanDe pratyayasya yaTAkAlaviDAnAt sidDam ","3.4.1-2:upapadasya tu kAlAnyatvam","3.4.2-1:hisvoH parasmEpadAtmanepadagrahaRam lAdeSapratizeDArTam ","3.4.2-2:samasaNKyArTam ca ","3.4.2-3:na vA taDvamoH AdeSavacanam jYApakam padAdeSasya ","3.4.2-4:tatra padAdeSe pittvAwoH pratizeDaH ","3.4.2-5:sidDam tu loqmaDyamapuruzEkavacanasya kriyAsamaBihAre dvirvacanAt ","3.4.2-6:yogaviBAgAt sidDam","3.4.8-1:upasaMvAdASaNkayoH vacanAnarTakyam liNarTatvAt","3.4.21-1:samAnakartfkayoH iti bahuzu aprAptiH ","3.4.21-2:sidDam tu kriyApraDanatvAt ","3.4.21-3:lokavijYAnAt na siDyati ","3.4.21-4:anantyavacanAt tu sidDam ","3.4.21-5:vyAdAya svapiti iti upasaNKyAnam apUrvakAlatvAt ","3.4.21-6:na vA svapnasya avakAlatvAt","3.4.24-1:agrAdizu aprAptaviDeH samAsapratizeDaH","3.4.26-1:svAdumi mAntanipAtanam IkArABAvArTam ","3.4.26-2:cvyantasya ca makArAntArTam ","3.4.26-3:A ca tumunaH samAnADikaraRe","3.4.37-1:hanaH karaRe anarTakam vacanam hiMsArTeByaH RamulviDAnAt ","3.4.37-2:arTavat tu ahiMsArTasya viDAnAt ","3.4.37-3:nityasamAsArTam ca Sloka: hanteH pUrvavipratizeDaH vArttikena eva jYApitaH","3.4.67-1:kartari kfdvacanam anAdeSe svAfTavijYAnAt ","3.4.67-2:tatra KyunAdipratizeDaH nAnAvAkyatvAt ","3.4.67-3:tadvat ca kftyezu evakArakaraRam ","3.4.67-4:tat ca BavyAdyarTam ","3.4.67-5:fzidevatayoH tu kfdBiH samAveSavacanam jYApakam asamAveSasya ","3.4.67-6:evakArakaraRam ca cArTe ","3.4.67-7:tat ca BavyAdyarTam ","3.4.67-8:tatra pratyayaniyame anizwaprasaNgaH ","3.4.67-9:saYjYAniyame sidDam ","3.4.67-10:viBaktAdizu ca aprAptiH prakfteH pratyayaparavacanAt","3.4.69-1:lagrahaRam sakarmakanivfttyarTam","3.4.77-1:lAdeSe sarvaprasaNgaH aviSezAt ","3.4.77-2:arTavadgrahaRAt sidDam iti cet na varRagrahaRezu ","3.4.77-3:tasmAt viSiztagrahaRam ","3.4.77-4:lAdeSaH varRaviDeH pUrvavipratizidDam ","3.4.77-5:uktam vA","3.4.79-1:witaH etve Atmanepadezu AnapratizeDaH ","3.4.79-2:uktam vA SlokavArttika: Ane muk jYApakam tu etve wittaNAm iSisIricaH qArOraHsu wit awitaH prakfte tat guRe kaTam","3.4.82-1:RalaH SitkaraRam sarvAdeSArTam ","3.4.82-2:uktam vA ","3.4.82-3:akArasya SitkaraRam sarvAdeSArTam ","3.4.82-4:akAravacanam samasaNKyArTam ","3.4.82-5:tasmAt SitkaraRam","3.4.85-1:laNvadatideSe jusBAvapratizeDaH ","3.4.85-2:utvavacanAt sidDam","3.4.8-:","-1:hinyoH utvapratizeDaH ","-2:na vA uccAraRasAmarTyAt","3.4.93-1:etaH Etve AdguRapratizeDaH ","3.4.93-2:na vA bahiraNgalakzaRatvAt","3.4.102-1:yAsuqAdeH sIyuwpratizeDaH ","3.4.102-2:na vA vAkyApakarzAt ","3.4.102-3:suwtiToH tu apakarzavijYAnam ","3.4.102-3:anAdeH ca suqvacanam ","3.4.102-4:na vA tiToH praDAnaBAvAt tadviSezaRam liNgrahaRam","3.4.103-1:yAsuwaH Nidvacanam pidarTam ","3.4.103-2:udAttavacanam ca ","3.4.103-3:AgamAnudAttArTam vA","3.4.110-1:jusi AkAragrahaRam niyamArTam iti cet sijluggrahaRam ","3.4.110-2:prApakam iti cet pratyayalakzaRapratizeDaH ","3.4.110-3:evakArakaraRam ca ","3.4.110-4:laNgrahaRam ca","3.4.114-1:ArDaDAtukasaYjYAyAm DAtugrahaRam ","3.4.114-2:svAdipratizeDaH ","3.4.114-3:tadviDAnAt sidDam","4.1.1-1:NyApprAtipadikagrahaRam aNgaBapadasaYjYArTam ","4.1.1-2:yacCayoH ca lugarTam ","4.1.1-3:vfdDAvfdDAvarRasvaradvyajlakzaRe ca pratyayaviDO tatsampratyayArTam ","4.1.1-4:NyAbgrahaRam anarTakam prAtipadikagrahaRe liNgaviSizwasya api grahaRAt ","4.1.1-5:prayojanam sarvanAmasvarasamAsatadDitaviDilugalugarTam ","4.1.1-6:mAnini ca viDipratizeDAfTam ","4.1.1-7:pratyayagrahaRopacArezu ca ","4.1.1-8:atiprasaNgaH upapadaviDO ","4.1.1-9:yaYiYoH Paki ","4.1.1-10:samAsAntezu ca ","4.1.1-11:mahadAttve priyAdizu ","4.1.1-12:Ynitsvare ","4.1.1-13:rAjYaH svare brAhmaRakumArayoH ","4.1.1-14:samAsasaNGAtagrahaRezu ca ","4.1.1-15:viBaktO ca uktam ","4.1.1-16:tadDitaviDAnAfTam tu ","4.1.1-17:vipratizeDAt hi tadDitabalIyastvam ","4.1.1-18:tatra samAsAntezu dozaH ","4.1.1-19:tyUNoH ca grahaRam ","4.1.1-20:tadantasya ca pratyayArTena ayogAt tadDitAnutpattiH ","4.1.1-21:uktam vA","4.1.3-1:striyAm iti stryarTABiDAne cet wAbAdayaH dvivacanabahuvacanAnekapratyayAnupapattiH ","4.1.3-2:stryarTasya ca prAtipadikArTatvAt striyAm iti liNgAnupapattiH ","4.1.3-3:P II","4.1.3-4:zawsaYjYakeByaH ca pratizeDaH ","4.1.3-5:sidDam tu striyAH prAtipadikaviSezaRatvAt svArTe wAbAdayaH ","4.1.3-6:guRavacanasya ca ASrayataH liNgavacanaBAvAt ","4.1.3-7:BAvasya ca BAvayuktatvAt ","4.1.3-8:strIvizaye NyApoH aprasidDiH akArAntAdarSanAt ","4.1.3-9:sarvezAm tu svaravarRAnupUrvIjYAnArTaH upadeSaH ","4.1.3-10:tasmAt sidDam","4.1.4-1:SUdrA ca amahatpUrvA ","4.1.4-2:jAtiH","4.1.6-1:DAtoH ugitaH pratizeDaH ","4.1.6-2:aYcateH ca upasaNKyAnam ","4.1.6-3:ugiti aYcatigrahaRAt sidDam aDAtoH","4.1.7-1:vanaH na haSaH ","4.1.7-2:raviDAne bahuvrIheH upasaNKyAnam pratizidDatvAt ","4.1.7-3:anaH bahuvrIhipratizeDe vA upaDAlopinaH vAvacanam","4.1.14-1:anupasarjanagrahaRam anarTakam prAtipadikena tadantaviDipratizeDAt ","4.1.14-2:jYApakam tu pUrvatra tadantApratizeDasya ","4.1.14-3:pUrvasUtranirdeSaH vA ApiSalam aDIte iti ","4.1.14-4:jAtiSabdeByaH tu atiprasaNgaH ","4.1.14-5:sidDam tu jAteH anupasarjanatvAt ","4.1.14-6:anupasarjanADikAre jAteH NIzviDAne suparRyAH upasaNKyAnam ","4.1.14-7:na vA samAsasya anupasarjanatvAt jAtivAcakatvAt ca Sabdasya sAmAnyena NIzviDAnam","4.1.15-1:QagrahaRe sAnubanDakasya upasaNKyAnam ","4.1.15-2:ananubanDakagrahaRe hi na sAnubanDakasya ","4.1.15-3:aYgrahaRam anarTakam tadantAt hi NInviDAnam ","4.1.15-4:na vA jAtyaDikArAt ","4.1.15-5:anaDikAre hi puMyogAt AKyAyAm NInprasaNgaH ","4.1.15-6:KyunaH upasaNKyAnam","4.1.17-1:tadDitavacanam zitaH prAtipadikAt IkArArTam","4.1.18-1:lohitAdizu SAkalyasya upasaNKyAnam SlokavArttika: kaRvAt tu SakalaH pUrvaH katAt uttaraH izyate pUrvottarO tadantAdI zPARO tatra praoyjanam kaRvAt tu SakalaH pUrvaH katAt uttaraH izyate pUrvottarO tadantAdI zPARO tatra praoyjanam","4.1.19-1:kOravyamARqUkayoH AsureH upasaNKyAnam ","4.1.19-2:CaH ca","4.1.25-1:UDasaH nakAraH liNgADikAre ","4.1.25-2:na vA samAsAntADikAre strIgrahaRAt ","4.1.25-3:itaraTA hi kabviDiprasaNgaH","4.1.27-1:dAmahAyanAntAt saNKyAdeH ","4.1.27-2:tatpuruzavijYAnAt vA sidDam ","4.1.27-3:hAyanaH vayasi smftaH","4.1.32-1:antarvat pativat iti garBaBartfsaMyoge SlokavArttika: antarvatpativatoH tu matubvatve nipAtanAt garBiRyAm jIvapatyAm ca vA ca Candasi nuk Bavet","4.1.34-1:patyuH sapUrvAt upasarjanasamAse upasaNknhyAnam ","4.1.34-2:sidDam tu patyuH prAtipadikaviSezaRatvAt","4.1.36-1:pUtakratvAdInAm puMyogaprakaraRe vacanam ","4.1.36-2:liNgasannigoyena sarvatra AgamAdeSAnAm vacane liNgaluki tatkftaprasaNgaH ","4.1.36-3:sidDam tu AgamAdeSAnAm aNgataH strIprakaraRe vacanAt ","4.1.36-4:liNgaluki vA prakftipratyApattivacanam","4.1.39-1:asitapalitayoH pratizeDaH ","4.1.39-2:Candasi knam eke ","4.1.39-3:varRAt NIbviDAne piSaNgAt upasaNKyAnam","4.1.42-1:nIlAt ozaDO ","4.1.42-2:prARini ca ","4.1.42-3:vA saYjYAyAm","4.1.44-1:guRavacanAt NIp AdyudAttArTam ","4.1.44-2:KarusaMyogopaDapratizeDaH ca","4.1.48-1:puMyogAt AKyAyAm tadDitalugvacanam ","4.1.48-2:subantasamAsavacanAt ca akArAntAnupapattiH ","4.1.48-3:sidDam tu striyAH puMSabdena aBiDAnAt ","4.1.48-4:gatikArakopapadAnAm kfdBiH saha samAsavacanam ","4.1.48-5:prayojanam ktAt alpAKyAyAm ","4.1.48-6:jAteH NIzviDAne ","4.1.48-7:samAsAntasya Ratve ","4.1.48-8:kfdantAt tadDite vfdDisvarO ca ","4.1.48-9:avadAtAyAm tu NIpprasaNgaH Sloka: trIRi yasya avadAtAni vidyA yoniH ca karma ca etat Sivam vijAnIhi brAhmaRAgryasya lakzaRam","4.1.49-1:himAraRyayoH mahattve ","4.1.49-2:yavAt doze ","4.1.49-3:yavanAt lipyAm ","4.1.49-4:upADyAyamAtulAByAm vA ","4.1.49-5:mudgalAt Candasi lit ca ","4.1.49-6:AcAryAt aRatvam ca ","4.1.49-7:AryakzatriyAByAm vA","4.1.52-1:antodAtte jAtapratizeDaH ","4.1.52-2:pARigfhItyAdInAm viSeze ","4.1.52-3:bahulam taRi ","4.1.52-4:prabadDavilUnAdyarTam ","4.1.52-5:antodAttAt abahunaYsukAlasuKAdipUrvAt ","4.1.52-6:jAtipUrvAt vA","4.1.54-1:upasarjanagrahaRam anarTakam bahuvrIhyaDikArAt ","4.1.54-2:bahvajarTam iti cet svANgagrahaRAt sidDam ","4.1.54-3:antodAttArTam iti cet sahAdikftatvAt sidDam ","4.1.54-4:svANgasamudAyapratizeDArTam tu","4.1.55-1:nAsikAdInAm viBAzAyAm pucCAt ca ","4.1.55-2:kabaramaRivizaSareByaH nityam ","4.1.55-3:upamAnAt pakzAt ca ","4.1.55-4:nAsikAdiByaH viBAzAyAH sahanaYvidyamAnapUrveByaH pratizeDaH vipratizeDena","4.1.60-1:dikpUrvapadAt NIzaH anudAttatvam ","4.1.60-2:NIbviDAne hi anyatra api NIzvizayAn NIpprasaNgaH","4.1.64-1:sadakkARqaprAntaSatEkeByaH puzpAt pratizeDaH ","4.1.64-2:samBastrAjinaSaRapiRqeByaH PalAt ","4.1.64-3:treH ca ","4.1.64-4:mulAt naYaH","4.1.65-1:itaH manuzyajAteH iYaH upasaNKyAnam","4.1.66-1:UNprakaraRe aprARijAteH ca arajjvAdInAm","4.1.74-1:zAt ca yaYaH cAp","4.1.75-1:anaH upaDAlopinaH UDasaH NIz pUrvavipratizidDam ","4.1.75-2:AvawyAt yaYaH zPaH cApaH","4.1.78-1:zyaNi anAdeSe yalopavacanam ","4.1.78-2:dviH aRviDiH ","4.1.78-3:AdeSe nalopavacanam ","4.1.78-4:na vA zyaNaH lopanimittatvAt Sloka: anubanDO tvayA kAryO cAparTam wAbviDiH mama ukte api hi Bavanti ete asTAnivattve dozaH te vfdDiH atra na siDyati tvayA api atra viSezArTam kartavyam syAt viSezaRam akriyA eva viSezaH atra sAnubanDaH viSezavAn pASyAyAm te kaTam na syAt ekaH me syAt viSezaRam anyasmin sUtraBedaH syAt ziti liNgam prasajyeta Niti cekrIyite dozaH vyavaDAnAt na duzyati yaH anantaraH na DAtuH saH yaH DAtuH saH ananantaraH na cet uBayataH sAmyam uBayatra prasajyeta yaNA viSezyeta yadi iha DAtuH yaN DAtunA vA yadi tulyam etat uBO praDAnam yadi na atra dozaH taTA prasAryeta tu vAkpatiH te DAtuprakaraRasya iha na sTAnam iti niScayaH ÊAttvArTam yadi kartavyam tatra eva tat karizyate upadeSe yat ejantam tasya ced Attvam izyate uddeSaaH fUQiSabdAnAm tena goH na Bavizyati","4.1.79-1:gotrAvayavAt agotrArTam iti cet tat anizwam ","4.1.79-2:gotrAt iti cet vacanAnarTakyam ","4.1.79-3:agurUpottamAfTam iti cet sarvezAm avayavatvAt sarvaprasaNgaH ","4.1.79-4:sidDam tu rOQyAdizu upasaNKyAnAt","4.1.82-1:samarTavacanam anarTakam na hi asamarTena arTABiDAnam ","4.1.82-2:praTamavacanam anarTakam na hi apraTamena arTABiDAnam ","4.1.82-3:vAvacane ca uktam","4.1.83-1:prAgvacanam sakfdviDAnArTam ","4.1.83-2:aDikArAt sidDam iti cet apavAdavizaye aRprasaNgaH ","4.1.83-3:tasmAt prAgvacanam ","4.1.83-4:na vA kva cit vAvacanAt","4.1.85-1:vANmatipitfmatAm Candasi upasaNKyAnam ","4.1.85-2:pfTivyAH YAYO ","4.1.85-3:devasya yaYaYO ","4.1.85-4:bahizaH wilopaH ca yaY ca ","4.1.85-5:Ikak ca ","4.1.85-6:IkaY Candasi ","4.1.85-7:sTAmnaH akAraH ","4.1.85-8:lomnaH apatyezu bahuzu ","4.1.85-9:sarvatra goH ajAdiprasaNge yat ","4.1.85-10:RyAdayaH arTaviSezalakzaRAt aRapavAdAt pUrvavipratizedDam","4.1.86-1:aYprakaraRe grIzmAt acCandasi","4.1.87-1:naYsnaYO BavanAt iti cet vatyarTe pratizeDaH ","4.1.87-2:vateH prAk iti cet BAve upasaNKyAnam","4.1.88-1:dvigoH luki tannimittagrahaRam ","4.1.88-2:arTaviSezAsampratyaye atannimittAt api","4.1.89-1:gotre aluk aci iti cet itaretarASrayatvAt aprasidDiH ","4.1.89-2:vipratizeDAt tu lukaH CaviDAnam SlokavArttika: BUmni ca luk prAptaH bAhye ca arTe viDIyate ajAdiH bahiraNgam antaraNgAt vipratizeDAt ayuktam syAt BUmni prAptasya lukaH yat ajAdO tadDite alukam SAsti etat bravIti kUrvan samAnakAlO aluk luk ca yadi vA lukaH prasaNge Bavati aluk CaH taTA prasidDaH asya luk vA alukaH prasaNgam pratIkzate Ce aluk asya taTA ","4.1.89-3:gotrasya bahuzu lopinaH bahuvacanAntasya pravfttO dvyekayoH aluk ","4.1.89-4:ekavacanadvivacanAntasya pravfttO bahuzu lopaH yUni ","4.1.89-5:gargaBArgavikAgrahaRam vA niyamArTam ","4.1.89-6:uktam vA","4.1.90-1:yUni luk aci iti cet pratyayasya ayaTezwaprasaNgaH ","4.1.90-2:sidDam tu aviSezeRa lugvacanam hali ca pratizeDaH ","4.1.90-3:prayojanam sOvIragotreByaH RaWakCAH ","4.1.90-4:iYRyO sarvatra ","4.1.90-5:prAgdIvyatoDikAre yUnaH vfdDavadatideSaH Sloka: rAjanyAt vuY manuzyAt ca jYApakam lOkikam param","4.1.92-1:tadDitArTanirdeSe liNgavacanam apramARam tasya avivakzitatvAt ","4.1.92-2:sarvanAmanirdeSe viSezAsampratyayaH sAmAnyanirdeSAt ","4.1.92-3:sAmAnyacodanAH tu viSezezu ","4.1.92-4:apatyABiDAne strIpuMliNgasya aprasidDiH napuMsakatvAt ","4.1.92-5:sidDam tu prajanasya vivakzitatvAt ","4.1.92-6:ekArTe SabdAnyatvAt dfzwam liNgAnyatvam ","4.1.92-7:avayavAnyatvAt ca","4.1.93-1:utpAdayitAram prati apatyayogAt tasya ca vivakzitatvAt ekavacanam gotre ","4.1.93-2:tatra pratyayAntAt gotre pratizeDaH gotre niyatatvAt ","4.1.93-3:paramaprakfteH ca utpattiH ","4.1.93-4:striyAm ca aniyamaH ","4.1.93-5:yUni ca antarhite aprAptiH ","4.1.93-6:","4.1.93-7:niyamAnupapattiH ca ","4.1.93-8:na hi ekasmin apatye anekapratyayaprAptiH ","4.1.93-9:apatyAntare SabdAntarAt pratyayAntaraprAptiH SlokavArttika: apatyam samudAyaH cet niyamaH atra samIkzitaH tasmin subahavaH prAptAH niyamaH asya Bavizyati ","4.1.93-10:tasmAt pratizeDaH ","4.1.93-11:saYjYAkAriByaH vA pratyayotpattiH ","4.1.93-12:gotrAt yUni ca ","4.1.93-13:tat ca jAtyAdinivfttyarTam Sloka: kutaH carati mAyUriH kena kApiYjaliH kfSaH Aheyena ca dazwasya pAYciH sutamasaH mataH","4.1.95-1:iYaH vfdDAvfdDAByAm PiYPinO vipratizeDena ","4.1.95-2:tadrAjaH ca","4.1.96-1:bAhvAdipraBftiz yezAm darSanam gotraBAve lOkike tataH anyatra tezAm pratizeDaH ","4.1.96-2:sambanDiSabdapratyayAnAm tatsadfSAt pratizeDaH","4.1.97-1:suDAtfvyAsayoH","4.1.104-1:anfzyAnantaryavacanam anarTakam saYjYAgotrADikArAt","4.1.114-1:fzistryaRaH QagQrakO vipratizeDena ","4.1.114-2:dvyacaH QakaH QragQaYO ","4.1.114-3:na vA fzyaRaH punarvacanam anyanivfttyarTam ","4.1.114-4:tasmAt fziByaH aRviDAne atryAdipratizeDaH ","4.1.114-5:QakaH punarvacanam anyanivfttyarTam ","4.1.114-6:tasmAt tannAmikARi advyacaH ","4.1.114-7:fzyanDakavfzRikurvaRaH senAntAt RyaH","4.1.128-1:cawakAyAH pulÎmliNganirdeSaH ","4.1.128-2:striyAm apatye luk","4.1.130-1:Aragvacanam anarTakam rakA sidDatvAt","4.1.137-1:rAjYaH apatye jAtigrahaRam","4.1.145-1:vyanvacanam anarTakam pratyayArTABAvAt","4.1.147-1:gotrastriyAH pratyayasya RitkaraRAnarTakyam vfdDatvAt prAtipadikasya ","4.1.147-2:lugarTam iti cet na lukpratizeDAt ","4.1.147-3:vyavahitatvAt apratizeDaH iti cet na puMvadBAvAt ","4.1.147-4:PinarTam tu ","4.1.147-5:puMvadBAvapratizeDArTam ca ","4.1.147-6:gotrAt yUni astriyAm iti vacanAt aprayojanam ","4.1.147-7:avaMSyatvAt vA striyAH prayojanam","4.1.150-1:PARwAhfteH pratyayasya RitkaraRAnarTakyam vfdDatvAt prAtipadikasya ","4.1.150-2:puMvadBAvapratizeDArTam tu ","4.1.150-3:uktam vA","4.1.151-1:vAmaraTasya kaRvAdivat svaravarjam","4.1.153-1:udIcAm aYviDO takzRaH aRvacanam ","4.1.153-2:SivAdiH iti cet RyaviDiH ","4.1.153-3:sidDam tu udIcAm vA RyavacanAt","4.1.155-1:PiYprakaraRe dagukosalakarmAracCAgavfzaRAm yuw ca","4.1.155-2:sidDam tu Adizwasya yuqvacanAt ]","4.1.158-1:kuwi pratyayAdeH AdeSAnupapattiH anAditvAt ","4.1.158-2:pUrvAnte nalopavacanam ","4.1.158-3:sidDam tu Adizwasya kuqvacanAt ","4.1.158-4:kAriByaH iYaH agotrAt PiY vipratizeDena","4.1.162-1:pOtrapraBfteH gotrasaYjYAyAm yasya apatyam tasya pOtrapraBftisaYjYAkaraRam ","4.1.162-2:jIvadvaMSyam ca kutsitam","4.1.163-1:jIvati tu vaMSye yuvA iti pOtrapraBftyapekzam ca ","4.1.163-2:tat ca dEvadattyarTam ","4.1.163-3:vfdDasya ca pUjAyAm ","4.1.163-4:ApatyaH vA gotram ","4.1.163-5:paramaprakfteH ca ApatyaH ","4.1.163-6:ApatyAt jIvadvaMSyAt svArTe dvitIyaH yuvasaYjYaH ","4.1.163-7:saH ca astriyAm ","4.1.163-8:ekogotragrahaRAnarTakyam ca ","4.1.163-9:bahuvacanalopizu ca sidDam","4.1.168-1:kzatriyAt ekarAjAt saNGapratizeDArTam ","4.1.168-2:kzatriyagrahaRAnarTakye ca uktam ","4.1.168-3:kzatriyasamAnaSabdAt janapadAt tasya rAjani apatyavat","4.1.170-1:aRaH RyaNRyeYaH vipratizeDena ","4.1.170-2:YyaNaH kurunAdiByaH RyaH","4.1.175-1:kambojAdiByaH lugvacanam coqAdyarTam","4.1.177-1:ataH iti tadantAgrahaRam avantyAdiByaH lugvacanAt ","4.1.177-2:yODeyAdipratizeDaH jYApakaH pArSvAdilukaH","4.2.1-1:raktAdInAm arTABiDAne pratyayaviDAnAt upADyAnarTakyam","4.2.2-1:WakprakaraRe SakalakardamAByAm upasaNKyAnam ","4.2.2-2:nIlyAH an ","4.2.2-3:pItAt kan ","4.2.2-4:haridrAmahArajanAByAm aY","4.2.3-1:nakzatreRa candramasaH yogAt tadyuktAt kAle pratyayaviDAnam ","4.2.3-2:tatra uttarapadalopaH ","4.2.3-3:liNgavacanAnupapattiH ca ","4.2.3-4:kAlayogAt sidDam ","4.2.3-5:taTA ca sampratyayaH","4.2.7-1:dfzwam sAma kaleH Qak SlokavArttika: dfzwe sAmani jAte ca api aR qit dviH vA viDIyate tIyAt Ikak na vidyAyAH gotrAt aNkavat izyate dfzwe sAmani jAte ca api aR qit dviH vA viDIyate tIyAt Ikak na vidyAyAH gotrAt aNkavat izyate","4.2.10-1:parivftaH raTaH iti tadekAntagrahaRam","4.2.13-1:kOmArApUrvavacane iti uBayataH striyAH apUrvatve SlokavArttika: kOmArApUrvavacane kumAryAH aR viDIyate apUrvatvam yadA tasyAH kumAryAm Bavati iti vA ","4.2.13-2:puMyogAt stryaBiDAnam","4.2.21-1:sA asmin pOrRamAsI iti saYjYAgrahaRam ","4.2.21-2:asaYjYAyAm garIyAn upsaMyogaH","4.2.28-1:CaprakaraRe pENgAkzIputrAdiByaH upasaNKyAnam ","4.2.28-2:SatarudrAt Ga ca","4.2.34-1:kAleByaH Bave pratyayamAtraprasaNgaH ","4.2.34-2:yaH kAleByaH Bave tasya viDAne prAtipadikamAtrAt prasaNgaH ","4.2.34-3:sidDam tu uBayanirdeSAt","4.2.35-1:WaYprakaraRe tat asmin vartate iti navayajYAdiByaH upasaNKyAnam ","4.2.35-2:pUrRamAsAt aR","4.2.36-1:pitfmAtfByAm BrAtari vyaqqulacO ","4.2.36-2:mAtfpitfByAm pitari qAmahac ","4.2.36-3:mAtari zit ca ","4.2.36-4:mahaH vA Candasi AnaNaH avagrahadarSanAt ","4.2.36-5:aveH dugDe soQadUsamarIsacaH ","4.2.36-6:tilAt nizPalAt piYjapejO ","4.2.36-7:piYjaH Candasi qit ca","4.2.38-1:BikzAdizu yuvatigrahaRAnarTakyam puMvadBAvasya sidDatvAt pratyayaviDO","4.2.39-1:aYaH vuY pUrvavipratizidDam ","4.2.39-2:Wak tu vipratizeDAt","4.2.42-1:yanprakaraRe pfzWAt upasaNKyAnam","4.2.43-1:ahnaH KaH ","4.2.43-2:kratO ","4.2.43-3:parSvAH saR","4.2.45-1:aYsidDiH anudAttAdeH kaH arTaH kzudrakamAlavAt gotrAt vuY na ca tat gotram tadantAt na saH sarvataH ","4.2.45-2:jYApakam syAt tadantatve taTA ca ApiSaleH viDiH senAyAm niyamArTam vA yaTA bADyeta vA aY vuYA vt ","4.2.45-1:aYprakaraRe kzudrakamAlavAt senAsaYjYAyAm","4.2.45-:1|| jYApakam syAt tadantatve taTA ca ApiSaleH viDiH senAyAm niyamArTam vA yaTA bADyeta vA aY vuYA ||","4.2.45-:2||]","4.2.49-1:pfTagvAtAdarSanAt asamUhaH ","4.2.49-2:SIGratve tu","4.2.50- 51-1:KalAdiByaH iniH","4.2.52-1:vizayABiDAne janapade lup bahuvacanavizayAt ","4.2.52-2:gAnDAryAdiByaH vA ","4.2.52-3:rAjanyAdiByaH vA vuY ","4.2.52-4:bElvavanAdiByaH nityam ","4.2.52-5:na vA aBiDeyasya nivAsavizayatvAt nivAsavivakzAyAm lup vizayavivakzAyAm pratyayaH","4.2.55-1:CandasaH pratyayaviDAne napuMsakAt svArTe upasaNKyAnam","[tasyedampratyayAt luk ]-SlokavArttika: sarvasAdeH dvigoH ca laH anusUH lakzyalakzaRe sarvasAdeH dvigoH ca laH ikan padottarapadAt SatazazweH zikan paTaH:","4.2.66-1:anyatra aBiDeyasya anityatvAt CandobrAhmaRAnAm tadvizayavacanam ","4.2.66-2:tatra yaTADikAram tadvizayaprasaNgaH ","4.2.66-3:sidDam tu proktADikAre tadvizayavacanAt ","4.2.66-4:yAjYavakkyAdiByaH pratizeDaH ","4.2.66-5:iniH vA prokte tadvizayaH ","4.2.66-6:kASyapakOSikagrahaRam ca kalpe niyamArTam","4.2.71-1:oH aYviDeH nadyAm matup vipratizidDam","4.2.85-1:nadyAm matubvacanam matvarTe aRviDAnAt ","4.2.85-2:nirvfttAdyarTam ca","4.2.91-1:kuwi pratyayAdeH AdeSAnupapattiH anAditvAt ","4.2.91-2:pUrvAnte hrasvatvam ","4.2.91-3:sidDam tu Adizwasya kuqvacanAt ","4.2.91-4:sanniyogAt sidDam","4.2.92-1:Sezavacanam GAdInAm apatyAdizu aprasaNgArTam ","4.2.92-2:tasyedaMvacanAt prasaNgaH ","4.2.92-3:vipratizeDAt sidDam ","4.2.92-4:na vA paratvAt GAdInAm ","4.2.92-5:aRapavAdatvAt ca aRvizaye GAdiprasaNgaH","4.2.93-1:avArapArAt vigfhItAt api ","4.2.93-2:viparItAt ca","4.2.96-1:kukzigrIvAt tu kan QaYaH","4.2.100-1:raNkoH amanuzyagrahaRAnarTakyam manuzyatatsTayoH vuYviDAnAt ","4.2.100-2:amanuzye manuzyasTe zPagaRoH jYApakam iti cet na anizwatvAt ","4.2.100-3:aRgrahanam ca kacCAdiByaH aRvacanAt","4.2.104-1:avyayAt tyapi Avizwasya upasaNKyAnam Candasi ","4.2.104-2:ayayatIrarUpyottarapadodIcyagrAmakopaDaviDeH vfdDAt CaH vipratizeDena ","4.2.104-3:teByaH WaYYiWO ","4.2.104-4:na vA WaYAdInAm CApavAdatvAt tadvizaye ca aBAvAt itarezAm ","4.2.104-5:kopaDAt aRaH punarvacanam anyanivfttyarTam ","4.2.104-6:tasmAt antodAtte kopaDapratizeDaH ","4.2.104-7:CAt oH deSe kAlAt WaY ","4.2.104-8:nakzatrAt aR ","4.2.104-9:avyayAt wyuwyulO ","4.2.104-10:SarIrAvayavAt yat ","4.2.104-11:vargAntAt ca aSabde yatKO ","4.2.104-12:bahvacaH antodAttAt WaY ","4.2.104-13:AyasTAneByaH Wak ","4.2.104-14:vidyAyonisambanDeByaH vuY ","4.2.104-15:ftaH WaY ","4.2.104-16:rUpyamayawO ","4.2.104-17:acittAt Wak ","4.2.104-18:gotrakzatriyAKyeByaH bahulam vuY ","4.2.104-19:RiniH antevAsibrAhmaReByaH ","4.2.104-20:pattrapUrvAt aY ","4.2.104-21:dvandvAt vun vEramETunikayoH ","4.2.104-22:gotracaraRAt vuY ","4.2.104-23:kaRvAdIYaH aRviDeH ","4.2.104-24:WaYYiWAByAm oH deSe WaY ","4.2.104-25:na vA WaYaH anavakASatvAt ","4.2.104-26:yopaDaprasTAdInAm vuY ","4.2.104-27:oH ca WaYaH ","4.2.104-28:janapadAnAm akARO ","4.2.104-29:na vA vuYapavAdatvAt aRaH ","4.2.104-30:kopaDAt aRaH akAntAt CaH ","4.2.104-31:DanvavuYaH ca ","4.2.104-32:na vA Casya punarvacanam CApavAdanivfttyarTam","4.2.124-1:janapadatadavahyoH vuYviDAne avayavamAtrAt prasaNgaH ","4.2.124-2:janapadAt iti cet vacanAnarTakyam","4.2.130-1:kuruyuganDareByaH vAvacanAt manuzyatatsTayoH vuYviDAnam","4.2.133-1:sAlvAnAm kacCAdizu pAWaH aRviDAnArTaH ","4.2.133-2:na vA apadAtiyogavAgrahaRam avaDAraRArTam","4.2.137-1:gartottarapadAt CaviDeH janapadAt vuY pUrvavipratizidDam","4.2.138-1:gahAdizu pfTivImaDyasya maDyamaBAvaH ","4.2.138-2:caraRasambanDena nivAsalakzaRaH aR","4.2.141-1:akekAntagrahaRe kopaDagrahaRam sOsukAdyarTam","4.3.1-1:yuzmadasmadByAm pratyayaviDAne yogaviBAgaH ","4.3.1-2:samasaNKyApratizeDArTaH","4.3.2-1:AdeSavacane ca ","4.3.2-2:tatra punaH KaYgrahaRam","4.3.3-1:ekArTagrahaRam ca","4.3.4-1:arDAt yadviDAne sapUrvAt WaY ","4.3.4-2:dikpUrvapadAt yat ca","4.3.15-1:SvasaH tuwi AdeSAnupapattiH anAditvAt ","4.3.15-2:pUrvAnte kapratizeDaH ","4.3.15-3:sidDam tu Adizwasya tuqvacanAt ","4.3.15-4:sanniyogAt vA","4.3.22-1:hemantasya aRi talopavacanAnarTakyam hemnaH prakftyantaratvAt ","4.3.22-2:alopadarSanAt ca","4.3.23-1:sAyacirayoH makArAntatvam pratyayasanniyuktam ","4.3.23-2:prAhRapragyoH ekArAntatvam ","4.3.23-3:tuwi uktam ","4.3.23-4:pUrvAnte visarjanIyaH ","4.3.23-5:sidDam tu Adizwasya tuqvacanAt ","4.3.23-6:sanniyogAt vA","4.3.24-1:pUrvAhRAparAhRAByAm subantavacanam saptamISravaRAfTam ","4.3.24-2:alugvacanam jYApakam iti cet avyayAt saptamIprasaNgaH","4.3.25-1:tatrajAtAdizu vacanam niyamArTam","4.3.34-1:lukprakaraRe citrArevatIrohiRIByaH striyAm upasaNKyAnam ","4.3.34-2:PalgunyazAQAByAm wAnO ","4.3.34-3:SravizWAzAQAByAm CaR ","4.3.34-4:na vA nakzatreByaH balulam lugvacanAt","4.3.39-1:prAyaBavagrahaRam anarTakam tatraBavena kftatvAt ","4.3.39-2:anityaBavaH prAyaBavaH iti cet muktasaMSayena tulyam","4.3.42-1:vikAre koSAt QaY ","4.3.42-2:samBUte hi arTAnupapattiH","4.3.53-1:tatraprakaraRe tatra iti punarvacanam kAlanivfttyarTam","4.3.58-1:YyaprakaraRe parimuKAdiByaH upasaNKyAnam ","4.3.58-2:avyayIBAvAd viDAne upakUlAdiByaH pratizeDaH","4.3.60-1:samAnasya tadAdeH ca aDyAtmAdizu ca izyate UrDvandamAt ca dehAt ca lokottarapadasya ca ","4.3.60-2:muKapArSvatasoH IyaH kuk janasya parasya ca IyaH kAryaH aTa maDyasya maRmIyO ca pratyayO maDya","4.3.66-1:BavavyAKyAnayoH yugapat aDikAraH apavAdaviDAnArTaH ","4.3.66-2:kftanirdeSO hi tO ","4.3.66-3:tatra vyAKyAtavyanAmnaH grahaRam BavArTam ","4.3.66-4:vyAKyAne hi avacanAt sidDam ","4.3.66-5:Bave mantrezu lugvacanam ","4.3.66-6:kalpe ca vyAKyAne ","4.3.66-7:na vA tAdarTyAt tAcCabdyam","4.3.72-1:nAmAKyAtagrahaRam saNGAtavigfhItArTam","4.3.87-1:aDikftya kfte granTe lup AKyAyikAByaH bahulam","4.3.88-1:dvandve devAsurAdiByaH pratizeDaH","4.3.100-1:sarvavacanam prakftinirhrAsArTam ","4.3.100-2:tat ca madravfjyarTam","4.3.101-1:proktagrahaRam anarTakam tatra adarSanAt ","4.3.101-2:granTe ca darSanAt ","4.3.101-3:CandorTam iti cet tulayam","4.3.104-1:pratyakzakArigrahaRam ","4.3.104-2:kalApiKAqAyagrahaRam jYApakam vESampAyanAntevAsizu pratyakzakArigrahaRasya ","4.3.104-3:CandograhaRam ca itaraTA hi atiprasaNgaH","4.3.105-1:purARaproktezu brAhmaRakalpezu yAjYavalkyAdiByaH pratizeDaH tulyakAlatvAt","4.3.116-1:kfte granTe makzikAdiByaH aR ","4.3.116-2:tadviSezeByaH ca ","4.3.116-3:yogaviBAgAt sidDam","4.3.120-1:tasya idam iti asannihite aprAptiH idamaH pratyakzavAcitvAt ","4.3.120-2:sidDam tu yadyogA zazWI tatra ","4.3.120-3:anantarAdizu ca pratizeDaH ","4.3.120-4:sidDam tu parigaRanAt ","4.3.120-5:sve grAmajanapadmanuzyeByaH ","4.3.120-6:pattrAt vAhye ","4.3.120-7:raTAt raTANge ","4.3.120-8:vaheH tuH aR iw ca ","4.3.120-9:agnIDaH SaraRe raY Ba ca ","4.3.120-10:samiDAm ADAne zeRyaR ","4.3.120-11:caraRAt DarmAmnAyayoH","4.3.125-1:vEre devAsurAdiByaH pratizeDaH","4.3.127-1:saNGAdizu GozagrahaRam ","4.3.127-2:saNGAdizu pratyayasya RitkaraRAnarTakyam vfdDatvAt prAtidikasya ","4.3.127-3:liNgapuMvadBAvapratizeDArTam tu","4.3.131-1:kOpiYjalahastipadAd aR ","4.3.131-2:ATarvaRikasya ikalopaH ca","4.3.134-1:tasyaprakaraRe tasyapunarvacanam SEzikanivfttyarTam Sloka: ","4.3.134-2:tasyedaMvacanAt prasaNgaH ","4.3.134-3:bADanArTam kftam Bavet utsargaH SezaH eva asO na vA sampratyayaH ","4.3.134-4:avayave ca aprARyozaDivfkzeByaH anivfttiH ","4.3.134-5:aRmayawoH ca vipratizeDAnupapattiH mayaqutsargAt ","4.3.134-6:anuvfttO hi CotsargApavAdavipratizeDAt mayaw","4.3.135-1:vikArAvayavayoH uktam","4.3.136-1:bilvAdizu gavIDukAgrahaRam mayawpratizeDArTam","4.3.140-1:anudAttAdeH aYaH viDAne AdyudAttAt NIzaH upasaNKyAnam ","4.3.140-2:padasya hi anudAttAditvam ","4.3.140-3:na vA samarTasya anudAttAditvAt ","4.3.140-4:padagrahaRam parimARArTam","4.3.143-1:mayaqvEtayorvacanam apavAdavizaye anivfttyarTam ","4.3.143-2:etayoH iti arTanirdeSaH","4.3.155-1:vikArAvayavayoH vikArAvayavayuktatvAt mayawpratizeDArTam YitaH ca tatpratyayAt aYaH viDAnam ","4.3.155-2:na vA dfzwaH hi avayave samudAyaSabdaH vikAre ca prakftiSabdaH tasmAt mayaqaBAvaH ","4.3.155-3:vikArAvayavaSabdAt prasaNgaH iti cet na tena anaBiDAnAt ","4.3.155-4:aBiDAne hi anyataH api mayawprasaNgaH ","4.3.155-5:tasmAt tatpratyayAntAt lugvacanam","4.3.156-1:krItavat parimARAt aNgam ca ","4.3.156-2:aRaH vfdDAt mayaw ","4.3.156-3:oH aYaH anudAttAdeH aYaH ca ","4.3.156-4:mayawaH prARyaY vipratizeDena ","4.3.156-5:na vA anavakASatvAt apavAdaH mayaw ","4.3.156-6:prARyaYaH ca ","4.3.156-7:tasmAt mayaqviDAne prARipratizeDaH ","4.3.156-8:anudAttAdeH aYaH prARyaY vipratizeDena","4.3.163-1:Pale lugvacanAnarTakyam prakftyantaratvAt ","4.3.163-2:ekAntadarSanAt prasaNgaH iti cet vfkze lugvacanam","4.3.166-1:lupprakaraRe PalapAkaSuzAm upasaNKyAnam ","4.3.166-2:puzpamUlezu ca bahulam","4.4.1-1:WakprakaraRe tat Aha iti mASabdAdiByaH upasaNKyAnam ","4.4.1-2:AhO praBUtAdiByaH ","4.4.1-3:pfcCatO susnAtAdiByaH ","4.4.1-4:gacCatO paradArAdiByaH","4.4.20-1:treH mamnityavacanam vizayArTam ","4.4.20-2:tatra yaTADikAram tadvizayaprasaNgaH","4.4.24-1:lavaRAt lugvacanAnarTakyam rasavAcivtAt ","4.4.24-2:asaMsfzwe ca darSanAt ","4.4.24-3:saMsfzwe ca adarSanAt","4.4.30-1:prayacCati garhAya ","4.4.30-2:mesyAllopaH vA ","4.4.30-3:vfdDeH vfDuziBAvaH","4.4.41-1:aDarmAt ca","4.4.49-1:nfnarAByAm aYvacanam ","4.4.49-2:viSasituH iqlopaH ca ","4.4.49-3:viBAjayituH RilopaH ca","4.4.65-1:hitam BakzAH iti caturTInirdeSaH ","4.4.65-2:itaraTA hi anirdeSaH","4.4.76-1:vahatyaBiDAne raTaSakawahalasIreByaH pratyayaviDAnAnarTakyam vihitatvAt ","4.4.76-2:SabdaBedAt aviDAnam iti cet arTASrayatvAt pratyayaviDAnasya arTasAmAnyAt sidDam","4.4.82-1:janyAH iti nipAtanAnarTakyam paYcamInirdeSAt","4.4.83-1:viDyati akaraRena ","4.4.83-2:itaraTA ha atiprasaNgaH","4.4.128-1:mAsatanvoH anantarArTe vA ","4.4.128-2:lugakArekArarePAH ca","4.4.140-1:akzarasamUhe CandasaH upasaNKyAnam ","4.4.140-2:Candasi bahuBirvasavyErupasaNKyAnam ","4.4.140-3:agnirISevasavyasya ","4.4.140-4:svArTavijYAnAt sidDam","5.1.1-1:prAgvacane uktam","5.1.2-1:yaYYyO aYaH pUrvavipratizidDam sanaNgUpAnahO prayojanam ","5.1.2-2:QaY ca ","5.1.2-3:havirapUpAdiByaH viBAzAyAH yat ","5.1.2-4:annavikAreByaH ca ","5.1.2-5:nABeH naBaBAve pratyayAnupapattiH prakftyaBAvAt ","5.1.2-6:sidDam tu SAKAdizu vacanAt hrasvatvam ca ","5.1.2-7:naByAt tu lugvacanam","5.1.4-1:havirapUpAdiByaH aprApte","5.1.6-1:yatprakaraRe raTAt ca","5.1.9-1:BogottarapadAt KaviDAne anirdeSaH pUrvapadArTahitatvAt ","5.1.9-2:BogInar iti cet vAvacanam ","5.1.9-3:rAjAcAryAByAm nityam ","5.1.9-4:KaviDAne paYcajanAt upasaNKyAnam ","5.1.9-5:sarvajanAt WaY ca ","5.1.9-6:mahAjanAt nityam","5.1.10-1:sarvAt Rasya vAvacanam ","5.1.10-2:puruzAt vaDe","5.1.12-1:tadarTam iti kftyanAmaByaH WaY ","5.1.12-2:na vA prayojanena kftatvAt","5.1.13-1:upaDyarTam iti pratyayAnupapattiH ","5.1.13-2:sidDam tu kfdantasya svArTe aYvacanAt","5.1.19-1:WagAdayaH prAk arhAt cet arhe tadviDiH ","5.1.19-2:vasne vacanAt sidDam iti cet mAMsOdanikAdizu aprAptiH ","5.1.19-3:A arhAt cet BojanAdizu atrprasaNgaH ","5.1.19-4:uktam vA","5.1.20-1:nizkAdizu asamAsagrahaRam jYApakam pUrvatra tadantApratizeDasya ","5.1.20-2:prAk vateH saNKyApUrvapadAnAm tadantagrahaRam aluki","5.1.21-1:SatapratizeDe anyaSatatve apratizeDaH","5.1.22-1:tipratizeDAt qatigrahaRam iti cet arTavadgrahaRAt sidDam","5.1.25-1:wiTan arDAt ca ","5.1.25-2:kArzApaRAt vA pratiH ca P II","5.1.28-1:dvigoH luki uktam ","5.1.28-2:saYjYApratizeDAnarTakyam ca tannimittatvAt lopasya ","5.1.28-3:uktam saNKyAtve prayojanam tasmAt iha aDyarDagrahaRAnarTakyam","5.1.29-1:kArzApaRasahasrAByAm suvarRaSatamAnayoH upasaNKyAnam","5.1.30-1:dvitriByAm dvEyogyam ","5.1.30-2:tatra ca bahugrahaRam","5.1.33-1:KAryAH Ikan kevalAyAH ca ","5.1.33-2:kAkiRyAH ca upasaNKyAnam ","5.1.33-3:kevalAyAH ca","5.1.35-1:SataSARAByAm vA ","5.1.35-2:dvitripUrvAt aR ca","5.1.37-1:tena krItam iti karaRAt ","5.1.37-2:akartrekAntAt ","5.1.37-3:saNKyEkavacanAt dvigoH ca upasaNKyAnam ","5.1.37-4:uktam vA","5.1.38-1:tasyanimittaprakaraRe vAtapittaSlezmaByaH SamanakopanayoH upasaNKyAnam ","5.1.38-2:sannipAtAt ca","5.1.39-1:yatprakaraRe brahmavarcasAt ca","5.1.47-1:tad asmin dIyate asmE iti ca","5.1.48-1:WanprakaraRe anantAt upasaNKyAnam","5.1.52-1:tat pacati iti droRAt aR ca","5.1.55-1:kulijAt ca iti sidDe lukKagrahaRAnarTakyam pUrvsamin trikaBAvAt","5.1.57-1:saYjYAyAm svArTe ","5.1.57-2:tataH parimARini ","5.1.57-3:jIvitaparimARe ca upasaNKyAnam ","5.1.57-4:jIvitaparimARe ca iti anarTakam vacanam kAlAt iti sidDatvAt ","5.1.57-5:iha vacane hi lukprasaNgaH ","5.1.57-6:anyeByaH api dfSyate KAraSatAdyarTam ","5.1.57-7:uktam vA ","5.1.57-8:stome qaviDiH paYcadaSAdyarTaH","5.1.59-1:viMSatyAdayaH daSAt cet samAsavacanAnupapattiH ","5.1.59-2:parimARini cet punaH svArTe pratyayaviDAnam ","5.1.59-3:zazWIvacanaviDiH ca ","5.1.59-4:anAramBaH vA prAtipadikavijYAnAt yaTA sahasrAdizu","5.1.6-:","-1:CedAdipaTiByaH vigrahadarSanAt nityagrahaRAnarTakyam ","-2:vikArArTam iti cet akaNAdiBiH tulyam","5.1.71-1:yajYartvigByAmtat karma arhati iti upasaNKyAnam","5.1.72-1:tat vartayati iti anirdeSaH tatra adarSanAt ","5.1.72-2:iNyajyoH ca darSanAt","5.1.74-1:yojanam gacCati iti kroSaSatayojanaSatayoH upasaNKyAnam ","5.1.74-2:tataH aBigamanam arhati iti ca","5.1.77-1:AhftaprakaraRe vArijaNgalasTalakAntArapUrvapadAt upasaNKyAnam ","5.1.77-2:ajapaTaSaNkupaTAByAm ca ","5.1.77-3:maDukamaricayoH aR sTalAt","5.1.80-1:aDIzwaBftayoH dvitIyAnirdeSaH anarTakaH tatra adarSanAt ","5.1.80-2:sidDam tu caturTInirdeSAt","5.1.84-1:avayasi Wan ca iti anantarasya anukarzaH","5.1.90-1:zazwike saYjYAgrahaRam ","5.1.90-2:uktam vA","5.1.94-1:tat asya brahmacaryam iti mahAnAmnyAdiByaH upasaNKyAnam ","5.1.94-2:tat carati iti ca ","5.1.94-3:avAntaradIkzAdiByaH qiniH ","5.1.94-4:azwAcatvAriMSataH qvun ca ","5.1.94-5:cAturmAsyAnAm yalopaH ca ","5.1.94-6:caturmAsAt RyaH yajYe tatra Bave ","5.1.94-7:saYjYAyAm aR","5.1.96-1:kAryagrahaRam anarTakam tatraBavena kftatvAt","5.1.97-1:aRprakaraRe agnipadAdiByaH upasaNKyAnam","5.1.111-1:CaprakaraRe viSipUripadiruhiprakfteH anAt sapUrvapadAt upasaNKyAnam ","5.1.111-2:svargAdiByaH yat ","5.1.111-3:puRyAhavAcanAdiByaH luk","5.1.113-1:ekAgArAt nipAtanAnarTakyam WaYprakaraRAt","5.1.114-1:AkAlAt nipAtanAnarTakyam WaYprakaraRAt ","5.1.114-2:AkAlAt Wan ca","5.1.118-1:strIpuMsAByAm vatyupasaNKyAnam","5.1.119-1:strIpuMsAByAm tvataloH upasaNKyAnam ","5.1.119-2:vAvacanam ca ","5.1.119-3:apavAdasamAveSAt vA sidDam ","5.1.119-4:tasya BAvaH iti aBiprAyAdizu atiprasaNgaH ","5.1.119-5:sidDam tu yasya guRasya BAvAt dravye SabdaniveSaH tadaBiDAne tvatalO ","5.1.119-6:yat vA sarve BAvAH svena BAvena Bavanti saH tezAm BAvaH tadaBiDAne ","5.1.119-7:uktam vA ","5.1.119-8:tvatalByAm naYsamAsaH pUrvavipratizidDam tvataloH svarasidDyarTam ","5.1.119-9:vA Candasi ","5.1.119-10:naYsamAsAt anyaH BAvavacanaH svarottarapadavfdDyarTam","5.1.120-1:A ca tvAt iti cakArakaraRam apavAdasamAveSArTam","5.1.121-1:na naYpUrvAt iti uttarasya pratizeDaH","5.1.122-1:pfTvAdiByaH vAvacanam aRsamAveSArTam","5.1.124-1:brAhmaRAdizu cAturvarRyAdInAm upasaNKyAnam ","5.1.124-2:arhataH num ca","5.1.130-1:aRprakaraRe Srotriyasya","5.2.4-:","viBAzA tilamAzomABaNgARuByaH -:","viBAzA tilamAzomABaNgARuByaH -1:tilAdiByaH KaY ca ","viBAzA tilamAzomABaNgARuByaH -2:umABaNgayoH aDAnyatvAt","5.2.6-1:sammuKa iti samasya antalopaH","5.2.10-1:parovara iti parasotvavacanam ","5.2.10-2:paraparatarARAm paramparaBAvaH P II","5.2.12-1:samAm samAm vijAyate iti yalopavacanAt alugvijYAnam iti cet uttarapadasya lugvacanam ","5.2.12-2:sidDam tu pUrvapadasya yalopavacanAt ","5.2.12-3:anutpattO uttarapadasya ca vAvacanam","5.2.14-1:goH ANpUrvAt a tasya goH pratidAnAt kAriRi KaH","5.2.23-1:hyogodohasya hiyaNgvAdeSaH saYjYAyAm tasya vikAre","5.2.29-1:kawacprakaraRe alAbUtilomAByaH rajasi upasaNKyAnam ","5.2.29-2:BaNgAyAH ca ","5.2.29-3:gozWAdayaH sTAnAdizu paSunAmAdiByaH ","5.2.29-3:upamAnAt vA sidDam","5.2.33-1:inacpiwackAH cikacicikAdeSAH ca ","5.2.33-2:klinnasya cilpil laH ca asya cakzuzI","5.2.37-1:vatvantAt svArTe dvayasajmAtracO bahulam","5.2.39-1:vatupprakaraRe yuzmadasmadByAm Candasi sAdfSe upasaNKyAnam","5.2.42-1:avayavaviDAne avayavini pratyayaH","5.2.45-1:qaviDAne parimARaSabdAnAm ADikyasya aDikaraRABAvAt anirdeSaH ","5.2.45-2:sidDam tu paYcamInirdeSAt","5.2.46-1:SadgrahaRe antagrahaRam pratyayagrahaRe yasmAt saH tadAdeH aDikArTam ","5.2.46-2:saNKyAgrahaRam ca ","5.2.46-3:viMSateH ca","5.2.47-1:nimAne guRini ","5.2.47-2:BUyasaH ","5.2.47-3:ekaH anyataraH ","5.2.47-4:samAnAnAm SlokapAda: nimeye ca api dfSyate","5.2.48-1:tasya pUraRe iti atiprasaNgaH ","5.2.48-2:sidDam tu saNKyApUraRe iti vacanAt ","5.2.48-3:yasya vA BAvAt anyasaNKyAtvam tatra Sloka: prakftyarTAt bahiH sarvA vfttiH prAyeRa lakzyate pUraRe syAt kaTam vfttiH vacanAt iti lakzyatAm tasyAH pUrvA tu yA saNKyA tasyAH","5.2.49-1:maqAdizu yasya AdiH tannirderdeSaH ","5.2.49-2:pratyayAntare hi svare dozaH","5.2.51-1:caturaH CayatO AdyakzaralopaH ca ","5.2.51-2:TawTukoH pfTakkaraRam padAntaviDipratizeDAfTam","5.2.52-1:bahukatipayavatUnAm liNgaviSizwAt utpattiH sidDA ","5.2.52-2:puMvadvacanam ca","5.2.59-1:CaprakaraRe anekapadAt api ","5.2.59-2:sidDam tu prAtipadikavijYAnAt ","5.2.59-3:svam rUpam Sabdasya aSabdasaYjYA iti vacanAt ","5.2.59-4:AmnAyaSabdAnAm anyaBAvyam svaravarRAnupUrvIdeSakAlaniyatatvAt ","5.2.59-5:padEkadeSasubalopadarSanAt ca","5.2.60-1:aDyAyAnuvAkAByAm vA luk","5.2.65-1:DanahiraRyAt kAmABiDAne ","5.2.65-2:zazTyarTe hi anizwaprasaNgaH P II","5.2.77-1:tAvatiTam grahaRam iti luk vAvacanAnarTakyam viBAzAprakaraRAt ","5.2.77-2:tAvatiTena gfhRAti iti luk ca","5.2.79-1:SfNKalam asya banDanam karaBe iti anirdeSaH ","5.2.79-2:sidDam tu tadvannirdeSAt luk ca","5.2.82-1:prAye saYjYAyAm vawakeByaH iniH","5.2.84-1:Srotriyan CandaH aDIte iti vAkyArTe padavacanam ","5.2.84-2:CandasaH vA SrtotraBAvaH tat aDIte iti Gan ca","5.2.85-1:iniWanoH samAnakAlagrahaRam ","5.2.85-2:uktam vA","5.2.92-1:kzetriyaH Srotriyavat ","5.2.92-2:parakzetrAt vA tatra cikitsyaH iti paralopaH Gac ca","5.2.94-1:matuppraBftayaH sanmAtre cet atiprasaNgaH Sloka: BUmanindApraSaMsAsu nityayoge atiSAyane saMsarge astivivakzAyAm Bavanti matubAdayaH ","5.2.94-2:uktam vA SlokapAda: sanmAtre ca fzidarSanAt ","5.2.94-3:guRavacaneByaH matupaH luk ","5.2.94-4:avyatirekAt sidDam iti cet dfzwaH vyatirekaH ","5.2.94-5:taTA ca liNgavacanasidDiH","5.2.95-1:rasAdiByaH punarvacanam anyanirvfttyarTam","5.2.97-1:lac anyatarasyAm iti samuccayaH ","5.2.97-2:picCAdiByaH tundAdInAm nAnAyogakaraRam jYApakam asamAveSasya ","5.2.97-3:vasya ca punarvacanam sarvaviBAzArTam","5.2.100-1:naprakaraRe dadrvAH hrasvatvam ca ","5.2.100-2:vizvak iti uttarapadalopaH ca akftasanDeH","5.2.101-1:vftteH ca","5.2.102- 103-1:tapasaH vinvacanam aRviDAnAt ","5.2.102- 103-2:aRprakaraRe jyotsnAdiByaH upasaNKyAnam","5.2.107-1:raprakaraRe KamuKkuYjeByaH upasaNKyAnam","5.2.107-2:nagAt ca ]","5.2.109-1:vaprakaraRe maRihiraRyAByAm upasaNKyAnam ","5.2.109-2:Candasi IvanipO ca ","5.2.109-3:meDAraTAByAm iraniracO","5.2.112-1:valacprakaraRe anyeByaH api dfSyate","5.2.115-1:iniWanoH ekAkzarAt pratizeDaH ","5.2.115-2:ekAkzarAt kftaH jAteH saptamyAm ca na tO smftO","5.2.116-1:SiKAyavaKadAdiByaH niyamasya avacanam nivartakatvAt","5.2.120-1:yapprakaraRe anyeByaH api dfSyate","5.2.122-1:CandovinprakaraRe azwfAmeKalAdvayoBayarujAhfdayAnAm dIrGaH ca ","5.2.122-2:sarvatra Amayasya ","5.2.122-3:SfNgavfndAByAm Arakan ","5.2.122-4:PalabarhAByAm inac ","5.2.122-5:hfdayAt cAluH anyatarasyAm ","5.2.122-6:SItozRatfpreByaH tat na sahate ","5.2.122-7:himAt celuH ","5.2.122-8:balAt ca UlaH ","5.2.122-9:vAtAt samUhe ca ","5.2.122-10:parvamarudByAm tap ","5.2.122-11:dadAtivfttam vA","5.2.135-1:iniprakaraRe balAt bAhUrupUrvapadAt upasaNKyAnam ","5.2.135-2:sarvAdeH ca ","5.2.135-3:arTAt ca asannihite ","5.2.135-4:tadantAt ca","5.3.1-1:viBaktitve prayojanam itpratizeDaH ","5.3.1-2:tO ca uktam ","5.3.1-3:idamaH viBaktisvaraH ca ","5.3.1-4:tyadAdiviDayaH ca","5.3.2-1:bahugrahaRe saNKyAgrahaRam ","5.3.2-2:dvyAtipratizeDAt kimaH upasaNKyAnam","5.3.5-1:etadaH iti yogaviBAgaH ","5.3.5-2:etadaH ca TamaH upasaNKyAnam","5.3-1:tasilAdayaH viBaktyAdeSAH cet subluksvaraguRadIrGEttvOttvasmAyAdiviDipratizeDaH ","5.3-2:paYcamInirdeSAt sidDam ","5.3-3:anAdeSe svArTavijYAnAt samAnaSabdApratizeDaH","5.3.8-1:taseH tasilvacanam svarArTam","5.3.9-1:paryaBiByAm ca sarvoBayArTe","5.3.18-1:dAnIm iti nipAtanAt svarasidDiH ","5.3.18-2:uktam vA","5.3.19-1:tadaH dAvacanam anarTakam vihitatvAt","5.3.20-1:tayoH iti prAtipadikanirdeSaH","5.3.22-1:samAnasya saBAvaH dyaH ca ahani ","5.3.22-2:pUrvapUrvatayoH paraBAvaH udArI ca saMvatsare ","5.3.22-3:idamaH samasaR ","5.3.22-4:parasmAt edyavi ahani ","5.3.22-5:idamaH aSBAvaH dyaH ca ","5.3.22-6:pUrvAnyAnyatarerAparADaroBayottareByaH edyusuc ","5.3.22-7:dyuH ca uBayAt","5.3.31-1:UrDvasya upaBAvaH rilizwAtilO ca","5.3.32-1:aparasya paScaBAvaH AtiH ca pratayayaH ","5.3.32-2:dikpUrvapadasya ca ","5.3.32-3:arDottarapadasya ca samAse ","5.3.32-4:arDe ca","5.3.35-1:apaYcamyAH iti prAk asaH","5.3.42-1:DAviDAnam DAtvarTapfTagBAve","5.3.44-1:sahaBAve DyamuY","5.3.45-1:DamuYantAt svArTe qadarSanam","5.3.47-1:pASapi kutsitagrahaRam","5.3.52-1:ekAt Akinici dvibahvarTe pratyayaviDAnam ","5.3.52-2:sidDam tu saNKyAdeSavacanAt ","5.3.52-3:asahAyasya vA","5.3.55-1:atiSAyane bahuvrIhO uktam ","5.3.55-2:Suklatarasya SuklaBAvAt prakfteH pratyayavijYAnam ","5.3.55-3:tadantAt ca svArTe Candasi darSanam SrezWamAya iti Sloka: pUrveRa sparDamAnaH ayam laBate sitaH parasmin nyUnatAm eti na ca nyUnaH pravartate apekzya maDyamaH pUrvam ADikyam laBate sitaH parasmin nyUnatAm eti yaTA amAtyaH sTite nfpe astu vA api taraH tasmAt na apaSabdaH Bavizyati vAcakaH cet prayoktavyaH vAcakaH cet prayujyatAm","5.3.57-1:tarabIyasunoH ekadravyasya utkarzApakarzayoH upasaNKyAnam ","5.3.57-2:sidDam tu guRapraDAnatvAt","5.3.66-1:prakfteH liNgavacanABAvAt tiNprakfteH amBAvavacanam ","5.3.66-2:sidDam tu kriyApraDAnatvAt ","5.3.66-3:vfzalAdiByaH upasaNKyAnam ","5.3.66-2:sidDam tu prakftyarTavESizwyavacanAt","5.3.67-1:IzadasamAptOkriyApraDAnatvAt liNgavacanAnupapattiH ","5.3.67-2:prakftyarTaviSezaRatvAd sidDam ","5.3.67-3:prakftyarTe cet liNgavacanAnupapattiH ","5.3.67-4:sidDam tu tatsambanDe uttarapadArTe pratyayavacanAt ","5.3.67-5:ktAntAt pratyayaviDAnAnupapattiH ktasya BUtakAlalakzaRatvAt kalpAdInAm ca asamAptivacanAt ","5.3.67-6:sidDam tu ASaMsAyAm BUtavadvacanAt","5.3.68-1:bahuci subgrahaRAt pUrvatra tiNaH viDAnam ","5.3.68-2:svaraH prAtipadikatvAt ","5.3.68-3:tugrahaRam nityapUrvArTam ","5.3.68-4:tamAdiByaH kalpAdayaH vipratizeDena ","5.3.68-5:tamAdiH IzatpraDAnAt","5.3.71- 72-1:akacprakaraRe tUzRImaH kAm ","5.3.71- 72-2:SIle kaH malopaH ca ","5.3.71- 72-3:Snambahujakakzu nAnAdeSatvAt utsargapratizeDaH ","5.3.71- 72-4:kaviDeH tamAdayaH pUrvavipratizidDam ","5.3.71- 72-5:kadA cit CinnakatarAdayaH ","5.3.71- 72-6:ekadeSipraDAnaH ca samAsaH ","5.3.71- 72-7:uttarapadArTapraDAnaH ca saYjYAyAm kanviDyarTam ","5.3.71- 72-8:kadA cit dvandvaH","5.3.74-1:kutsidAdInAm arTe cet liNgavacanAnupapattiH ","5.3.74-2:kutsidAdisamAnADikaraRAt iti cet atiprasaNgaH yaTA wAbAdizu ","5.3.74-3:sidDam tu yena kutsitAdivacanam tadyuktAt svArTe pratyayaviDAnAt","5.3.83-1:ugrahaRam ukaH dvitIyatve kaviDAnArTam ","5.3.83-2:ajAdilakzaRe hi mATikAdivat prasaNgaH ","5.3.83-3:dvitIyAt acaH lope sanDyakzaradvitIyatve tadAdeH lopavacanam","5.3.84-1:varuRAdInAm ca tftIyAt saH ca akftasanDInAm ","5.3.84-2:zaqike jaStve uktam ","5.3.84-3:vAcikAdizu padavfttapratizeDaH ","5.3.84-4:sidDam ekAkzarapUrvapadAnAm uttarapadalopavacanAt ","5.3.84-5:zazaH WAjAdivacanAt sidDam","5.3.88-1:kuwISamISuRqAByaH pratyayasanniyogena puMvadBAvaH ","5.3.88-2:uktam vA","5.3.91-1:vatsAdiByaH tanutve kArSye pratizeDaH","5.3.92- 93-1:kimAdInAm dvibahvarTe pratyayaviDAnAt upADyAnarTakyam","5.3.94-1:prAgvacanAnarTakyam ca viBAzAprakaraRAt","5.3.98-1:liNgasidDyarTam lup manuzye","5.3.118-1:aRaH gotrAt gotravacanam","5.4.1-1:pAdaSatagrahaRam anarTakam anyatra api darSanAt","5.4.3-1:kanprakaraRe caYcadbrhatoH upasaNKyAnam","5.4.4-1:anatyantagatO ktAntAt tamAdayaH pUrvavipratizidDam ","5.4.4-2:tadantAt ca svArTe kanvacanam","5.4.5-1:sAmivacane pratizeDAnarTakyam prakftyaBihitatvAt","5.4.7-1:aDyuttarapadAt pratyayaviDAnAnupapattiH vigrahABAvAt ","5.4.7-2:tasmAt tatra idam iti saDInar P II","5.4.27-1:tali strIliNgavacanam ","5.4.27-2:uktam vA","5.4.30-1:lohitAt liNgabADanam vA ","5.4.30-2:akzarasamUhe CandasaH upasaNKyAnam ","5.4.30-3:Candasi bahuBiH vasavyEH upasaNKyAnam ","5.4.30-4:agniH ISe vasavyasya iti ","5.4.30-5:uktam vA ","5.4.30-6:navasya nU tnaptanaKAH ca ","5.4.30-7:naH ca purARe prAt","5.4.36-1:aRprakaraRe kulAlavaruqanizAdacaRqAlAmitreByaH Candasi ","5.4.36-2:BAgarUpanAmaByaH DeyaH ","5.4.36-3:mitrAt Candasi ","5.4.36-4:aR amitrAt ca ","5.4.36-5:agnIDrasADAraRAt aY ","5.4.36-6:ayavasamarudByAm Candasi ","5.4.36-7:navasUramartayavizWeByaH yat ","5.4.36-8:kzemAt yaH","5.4.37-1:bahvalpArTAt maNgalavacanam","5.4.44-1:tasiprakaraRe AdyAdiByaH upasaNKyAnam","5.4.50-1:cviviDO aBUtatadBAvagrahaRam ","5.4.50-2:prakftivivakzAgrahaRam ca ","5.4.50-3:samIpAdiByaH upasaNKyAnam","5.4.57-1:qAci citkaraRam viSezaRArTam","5.4.68-1:prayojanam avyayIBAvadvigudvandvatatpuruzabahuvrIhisaYjYAH SlokapAda: kzeme suBikze kftasaYcayAni purARi vinayanti kopam","5.4.69-1:pUjAyAm svatigrahaRam ","5.4.69-2:prAgbahuvrIhigrahaRam ca","5.4.73-1:qacprakaraRe saNKyAyAH tatpuruzasya upasaNKyAnam nistriMSAdyarTam ","5.4.73-2:anyatra aDikalopAt","5.4.77-1:caturaH acprakaraRe tryupAByAm upasaNKyAnam","5.4.87-1:ahargrahaRam dvandvArTam","5.4.88-1:ahnaH ahnavacanAnarTakyam ca ahnaH waKoH niyamavacanAt","5.4.113-1:zaci pratyayAntarakaraRam anantodAttArTam","5.4.115-1:mUrDnaH ca zavacanam","5.4.116-1:api praDAnapUraRIgrahaRam ","5.4.116-2:netuH nakzatre upasaNKyAnam ","5.4.116-3:Candasi ca ","5.4.116-4:mAsAt BftipratyayapUrvapadAt WajviDiH","5.4.131-1:UDasaH anaNi strIgrahaRam","5.4.135-1:ganDasya ittve tadekAntagrahaRam","5.4.156-1:IyasaH upasarjanadIrGatvam ca ","5.4.156-2:puMvadvacanAt sidDam","6.1.1-1:ekAcaH dve praTamasya iti bahuvrIhinirdeSaH ","6.1.1-2:ekavarRezu vyapadeSivadvacanAt ","6.1.1-3:praTamatve ca ","6.1.1-4:uktam vA ","6.1.1-5:yogaviBAgaH vA ","6.1.1-6:ekAjmAtrasta dvirvacanArTaH ","6.1.1-7:ekAcaH avayavEkActvAt avayavAnAm dvirvacanaprasaNgaH ","6.1.1-8:tatra jusBAvavacanam ","6.1.1-9:svaraH ca ","6.1.1-10:adBAvaH ca ","6.1.1-11:numpratizeDaH ca ","6.1.1-12:SAstrahAniH ca ","6.1.1-13:sidDam tu tatsamudAyEkActvAt SAstrAhAneH ","6.1.1-14:tatra bahuvrIhinirdeSe anackasya dvirvacanam anyapadArTatvAt ","6.1.1-15:sidDam tu tadguRasaMvijYAnAt pARineH yaTA loke ","6.1.1-16:sTAne dvirvacane Rilopavacanam samudAyAdeSatvAt ","6.1.1-17:yat ca sanyaNantasya dvirvacane ","6.1.1-18:dviHprayogaH iti cet RakArazakArAdeSAdeH ettvavacanam liwi ","6.1.1-19:iqvacanam ca yaNlope ","6.1.1-20:iqdIrGapratizeDaH ca","6.1.2-1:dvitIyasya iti avacanam ajAdeH iti karmaDArayAt paYcamI ","6.1.2-2:dvitIyadvirvacane praTamanivfttiH prAptatvAt ","6.1.2-3:na vA praTamavijYAne hi dvitIyAprAptiH advitIyatvAt ","6.1.2-4:yaTA vA AdivikAre alaH antyavikArABAvaH ","6.1.2-5:tatra pUrvasya acaH nivfttO vyaYjanAnivfttiH aSAsanAt pUrvasya ","6.1.2-6:ndrAdipratizeDAt ca ","6.1.2-7:tatra dvitIyABAve praTamAdvirvacanam pratizidDatvAt ","6.1.2-8:sati tasmin pratizeDaH iti cet halAdiSeze dozaH ","6.1.2-9:lokavat halAdiSeze ","6.1.2-10:kva cit anyatra lopaH iti cet dvirvacanam","6.1.3-1:ndrAdeH dvirvacanaprasaNgaH tatra ndrARAm pratizeDaH ","6.1.3-2:IrzyateH tftIyasya ","6.1.3-3:kaRqvAdInAm ca ","6.1.3-4:vA nAmaDAtUnAm","6.1.5-1:aByastasaYjYAyAm sahavacanam ","6.1.5-2:AdyudAttatve pfTagaprasaNgArTam","6.1.6-1:jakzityAdizu saptagrahaRam vevItyarTam ","6.1.6-2:aparigaRanam vA AgaRAntatvAt","6.1.7-1:tujAdizu CandaHpratyayagrahaRam ","6.1.7-2:anAramBaH vA aparigaRitatvAt ","6.1.7-3:anyezAm ca darSanAt ","6.1.7-4:anekAntatvAt ca","6.1.8-1:liwi dvirvacane jAgarteH vAvacanam ","6.1.8-2:aByAsapratizeDAnarTakyam ca Candasi vAvacanAt ","6.1.8-3:prayojanam AdityAn yAcizAmahe ","6.1.9-1:sanyaNoH parataH iti cet iwaH dvirvacanam parAditvAt ","6.1.9-2:hanteH ca IwaH ","6.1.9-3:ekAcaH upadeSe anudAttAt iti upadeSavacanam udAttaviSezaRam cet sanaH iwpratizeDaH ","6.1.9-4:sanyaNantasya iti cet aSeH sani aniwaH ","6.1.9-5:dIrGakutvaprasAraRazatvam aDikasya dvirvacanAt ","6.1.9-6:AbfDyoH ca aByastaviDipratizeDaH ","6.1.9-7:saNASraye ca samudAyasya samudAyAdeSatvAt JalASraye ca avyapadeSaH AmiSratvAt","6.1.12-1:dASeH vasO dvitvewpratizeDO ","6.1.12-2:saheH dIrGatvam ca ","6.1.12-3:miheH Qatvam ca ","6.1.12-4:mahyarTaH iti cet miheH tadarTatvAt sidDam ","6.1.12-5:dvirvacanaprakaraRe kfYAdInAm ke ","6.1.12-6:caricalipativadInAm aci Ak ca aByAsasya ","6.1.12-7:hanteH GaH ca ","6.1.12-8:pAweH Riluk ca dIrGaH ca aByAsasya Uk ca ","6.1.12-9:dvirvacanam yaRayavAyAvAdeSAllopopaDAlopaRilopakikinoruttveByaH ","6.1.12-10:dvirvacanAt prasAraRAttvaDAtvAdivikArarItvettvottvaguRavfdDiviDayaH","6.1.13-1:zyaNaH samprasAraRe putrapatyoH tadAdO atiprasaNgaH ","6.1.13-2:varRagrahaRe iti cet tadantapratizeDaH ","6.1.13-3:sidDam tu uttarapadavacanAt ","6.1.13-4:yaTAgfhItasya AdeSavacanAt apratyayasTe sidDam ","6.1.13-5:anantyavikAre antyasadeSasya vA ","6.1.13-6:prayojanam na samprasAraRe samprasAraRam ","6.1.13-7:sAntamahataH dIrGatve ","6.1.13-8:ankArAntasya allope ","6.1.13-9:mfjeH vfdDiviDO ","6.1.13-10:vasoH samprasAraRe ca ","6.1.13-11:yuvAdInAm ca ","6.1.13-12:rvoH upaDAgrahaRam ca ","6.1.13-13:AdityadAdiviDisaMyogAdilopakutvaQatvaBazBAvazatvaRatvezu atiprasaNgaH ","6.1.13-14:udAttanirdeSAt sidDam","6.1.16-1:vayigrahaRam veYaH pratizeDAt ","6.1.16-2:na vA yakArapratizeDaH jYApakaH apratizeDasya ","6.1.16-3:piti aByAsArTam iti cet na aviSizwatvAt","6.1.17-1:aByAsasamprasAraRam halAdiSezAt vipratizeDena ","6.1.17-2:na vA samprasAraRASrayabalIyastvAt anyatra api ","6.1.17-3:prayojanam ramAllopeyiaNyaRaH ","6.1.17-4:vyaceH kuwAditvam anasi aYRiti samprasAraRArTam","6.1.20-1:vaSeH yaNi pratizeDaH","6.1.27-1:SrAsrapyoH SfBAvaH ","6.1.27-2:SrapeH Sftam anyatra hetoH","6.1.28-1:ANpUrvAt anDUDasoH","6.1.30-1:SveH liwi aByAsalakzaRapratizeDaH","6.1.32- 33-1:hvaH samprasAraRe yogaviBAgaH ","6.1.32- 33-2:RO saMScaNvizayAfTaH ","6.1.32- 33-3:aByastinimitte anaByastaprasAraRArTam ","6.1.32- 33-4:aByastaprasAraRe hi aByAsaprasAraRAprAptiH ","6.1.32- 33-5:samAnANge prasAraRapratizeDAt pratizeDaH ","6.1.32- 33-6:kfdantapratizeDArTam ca","6.1.37-1:prasAraRaprakaraRe punaH prasAraRagrahaRam ataH anyatra prasAraRapratizeDArTam ","6.1.37-2:samAnANgagrahaRam ca ","6.1.37-3:tatra upozuzi dozaH ","6.1.37-4:na vA yasya aNgasya prasAraRaprAptiH tasmin prAptipratizeDAt ","6.1.37-5:fci treH uttarapadAdilopaH Candasi ","6.1.37-6:rayeH matO bahulam ","6.1.37-7:kakzyAyAH saYjYAyAm","6.1.45-1:Attve eSi upasaNKyAnam ","6.1.45-2:aSiti ekAdeSe pratizeDaH AdivattvAt ","6.1.45-3:pratyayaviDiH ","6.1.45-4:aByAsarUpam ca ","6.1.45-5:ayavAyAvAm pratizeDaH ca ","6.1.45-6:Siti pratizeDe SlulukoH upasaNKyAnam rarIDvam trADvam SiSIte ","6.1.45-7:prAtipadikapratizeDaH ","6.1.45-8:DAtvaDikArAt prAtipadikasyAprAptiH","6.1.48-1:Attve RO lIyateH upasaNKyAnam pralamBanaSAlInIkaraRayoH","6.1.49-1:siDyateH ajYAnArTasya ","6.1.49-2:itaraTA hi anizwaprasaNgaH ","6.1.50-1:mInAtyAdInAm Attve upadeSavacanam pratyayaviDyarTam ","6.1.50-2:nimimIliyAm KalacoH pratizeDaH","6.1.58-1:ami saNgrahaRam ","6.1.58-2:kvippratizeDAfTam ","6.1.58-3:uktam vA","6.1.60-1:SIrzan Candasi prakftyantaram ","6.1.60-2:AdeSapratizeDArTam","6.1.61-1:ye ca tadDite SirasaH AdeSArTam ","6.1.61-2:vA keSezu ","6.1.61-3:aci SIrzaH ","6.1.61-4:Candasi ca","6.1.63-1:padAdizu mAMspftsnUnAm upasaNKyAnam ","6.1.63-2:nas nAsikAyAH yattaskzudrezu","6.1.64-1:sAdeSe subDAtuzWivuzvazkatInAm pratizeDaH","6.1.66-1:vyoH lope kvO upasaNKyAnam ","6.1.66-2:valopAprasidDiH UqBAvavacanAt ","6.1.66-3:atiprasaNgaH vraScAdizu ","6.1.66-4:upadeSasAmarTyAt sidDam iti cet samprasAraRahalAdiSezezu sAmarTyam ","6.1.66-5:na vA bahiraNgalakzaRatvAt ","6.1.66-6:anAramBaH vA ","6.1.66-7:AsremARam jIradAnuH iti varRalopAt","6.1.67-1:veH lope darvijAgfvyoH apratizeDaH anunAsikaparatvAt ","6.1.67-2:DAtvantasya ca arTavadgrahaRAt ","6.1.67-3:vasya vA anunAsikatvAt sidDam ","6.1.68-1:halantAt apfktalopaH saMyogAntalopaH cet nalopABAvaH yaTA pacan iti ","6.1.68-2:vasvAdizu datvam saMyogAdilopabalIyastvAt yaTA kUwataw iti ","6.1.68-3:rAttalopaH niyamavacanAt ","6.1.68-4:roH uttvam ca ","6.1.68-5:na vA saMyogAntalopasya uttve sidDatvAt yaTA harivaH medinam iti","6.1.69-1:sambudDilope qatarAdiByaH pratizeDaH ","6.1.69-2:apfktADikArasya nivfttatvAt ","6.1.69-3:tat ca amarTam ","6.1.69-4:uktam vA ","6.1.69-5:apfktasambudDilopAByAm luk ","6.1.69-6:na vA lopalukoH lugavaDAraRAt yaTA anaquhyate iti","6.1.71-1:tuki pUrvAnte napuMsakopasarjanahrasvatvam dvigusvaraH ca ","6.1.71-2:na vA bahiraNgalakzaRatvAt ","6.1.71-3:grAmaRiputrAdizu ca aprAptiH ","6.1.71-4:parAdO saMyogAdeH iti atiprasaNgaH ","6.1.71-5:vilopavacanam ca ","6.1.71-6:iwpratizeDaH ca ","6.1.71-7:aBakte svaraH","6.1.74-1:ANmANoH sAnubanDakanirdeSaH gatikarmapravacanIyapratizeDasampratyayArTaH","6.1.75- 76-1:dIrGAt padAntAt vA viSvajanAdInAm Candasi","6.1.77-1:yaRAdeSaH plutapUrvasya ca ","6.1.77-2:dIrGaSAkalapratizeDArTam jaStvam na sidDam yaRam atra paSya yaH ca apadAntaH hal acaH ca pUrvaH dIrGasya yaR hrasvaH iti prtavfttam sambanDavfttyA guRavfdDibADyaH nitye ca yaH SAkalaBAksamAse tadarTam etad BagavAn cakAra sAmarTyayogAt na hi kim cit asmin paSyAmi SAstre yat anarTakam syAt","6.1.79-1:vAntAdeSe sTAninirdeSaH ","6.1.79-2:goH yUtO Candasi ","6.1.79-3:aDvaparimARe ca","6.1.83-1:BayyAdiprakaraRe hradayyAH upasaNKyAnam ","6.1.83-2:av Sarasya ca ","6.1.83-3:SaruvfttAt vA sidDam ","6.1.83-4:fYjatI SaruH iti api dfSyate ","6.1.83-5:SaruhastaH iti ca loke","6.1.84-1:ekavacanam pfTak AdeSapratizeDArTam ","6.1.84-2:na vA dravyavat karmacodanAyAm dvayoH ekasya aBinirvftteH ","6.1.84-3:tat ca ekavAkyaBAvAt ","6.1.84-4:tatra avayave SAstrArTasampratyayaH yaTA loke ","6.1.84-5:sidDam tu DarmopadeSane anavayavavijYAnAt yaTA lOkikavEdikezu","6.1.84-6:pUrvaparagrahaRam parasya AdeSapratizeDArTam ","6.1.84-7:paYcamInirdizwAt hi parasya ","6.1.84-8:zazWInirdizwArTam tu ","6.1.84-9:anirdizwe hi zazWyarTAprasidDiH","6.1.85-1:antAdivadvacanam AmiSrasya AdeSavacanAt ","6.1.85-2:tatra yasya antAdivat tannirdeSaH ","6.1.85-3:sidDam tu pUrvaparADikArAt ","6.1.85-4:antavattve prayojanam bahvacpUrvapadAt WajviDAne ","6.1.85-5:pratyayEkAdeSaH pUrvaviDO ","6.1.85-6:vEBaktasya Ratve ","6.1.85-7:adasaH Ittvottve ","6.1.85-8:svaritatvam vipratizeDAt ","6.1.85-9:liNgaviSiztagrahaRAt vA ","6.1.85-10:pUrvapadAntodAttatvam ca ","6.1.85-11:ekAdeSe hi svaritAprasidDiH ","6.1.85-12:kfdantaprakftisvaratvam ca ","6.1.85-13:ekAdeSe hi a prasidDiH uttarapadasya aparatvAt ","6.1.85-14:uttarapadavfdDiH ca ekAdeSAt ","6.1.85-15:ekAdeSaprasaNgaH tu antaraNgabalIyastvAt ","6.1.85-16:tatra vfdDiviDAnam ","6.1.85-17:Adivattve prayojanam pragfhyasaYjYAyAm ","6.1.85-18:suptiNAbviDizu ","6.1.85-19:ANgrahaRe padaviDO ","6.1.85-20:AwaH ca vfdDiviDO ","6.1.85-21:kfdantaprAtipadikatve ca ","6.1.85-22:na aByAsAdInAm hrasvatve ","6.1.85-23:na vA bahiraNgalakzaRatvAt ","6.1.85-24:varRASrayaviDO ca ","6.1.85-25:prayojanam KawvABiH juhAva asyE aSvaH iti ","6.1.85-26:na vA atAdrUpyAtideSAt","6.1.86-1:zatvatukoH asidDavacanam AdeSalakzaRapratizeDAfTam utsargalakzaRaBAvArTam ca ","6.1.86-2:tatra utsargalakzaRAprasidDiH utsargABAvAt ","6.1.86-3:asidDavacanAt sidDam iti cet na anyasya asidDavacanAt anyasya BAvaH ","6.1.86-4:tasmAt sTAnivadvacanam asidDatvam ca ","6.1.86-5:sTAnivadvacanAnarTakyam SAstrAsidDatvAt ","6.1.86-6:samprasAraRaNIwsu sidDaH padAntapadAdyoH ekAdeSasya asidDavacanAt","6.1.87-1:guRe NiSItAm upasaNKyAnam dIrGatvabADanArTam ","6.1.87-2:na vA bahiraNgalakzaRatvAt At ekaH cet guRaH kena sTAne antaratamaH hi saH EdOtO na eci tO uktO fkAraH na uBayAntaraH AkAraH na fti DAtO saH plutaH ca vizaye smftaH AntaryAt trimAtracaturmAtrAH taparatvAt ne te smftAH","6.1.89-1:iRi ikArAdO vfdDipratizeDaH ","6.1.89-2:yogaviBAgAt sidDam ","6.1.89-3:akzAt UhinyAm ","6.1.89-4:prAt UhoQoQyezEzyezu ","6.1.89-5:svAt IreriRoH ","6.1.89-6:fte ca tftIyAsamAse ","6.1.89-7:pravatsatarakambalvasanAnAm ca fRe ","6.1.89-8:fRadaSAByAm ca","6.1.91-1:upasargAt vfdDiviDO DAtugrahaRe uktam ","6.1.91-2:Ce tukaH sambudDiguRaH ","6.1.91-3:na vA bahiraNgalakzaRatvAt ","6.1.91-4:samprasAraRadIrGatvaRyallopAByAsaguRAdayaH ca ","6.1.91-5:yaRadeSAt At guRaH ","6.1.91-6:irurguRavfdDiviDayaH ca ","6.1.91-7:BalopaDAtuprAtipadikapratyayasamAsAntodAttanivfttisvarAH ekAdeSAt ca ","6.1.91-8:allopAllopO ca ArDaDAtuke ","6.1.91-9:iyaNuvaNguRavfdDiwitkinmitpUrvapadavikArAH ca","6.1.93-1:otaH tiNi pratizeDaH ","6.1.93-2:gograhaRe dyoH upasaNKyanam ","6.1.93-3:samAsAt ca pratizeDaH ","6.1.93-4:na vA bahiraNgalakzaRatvAt ","6.1.93-5:subaDikArAt sidDam ","6.1.93-6:ekayoge ca ekadeSAnuvfttiH anyatra api ","6.1.93-7:ami upasaNKyAnam vfdDibalIyastvAt ","6.1.93-8:na vA anavakASatvAt ","6.1.93-9:dyoH ca sarvanAmasTAne vfdDiviDiH ","6.1.93-10:yat dyAvaH indra iti darSanAt","6.1.94-1:pararUpaprakaraRe tunvoH vi nipAte upasaNKyAnam ","6.1.94-2:na vA nipAtEkatvAt ","6.1.94-3:eve ca aniyoge ","6.1.94-4:SakanDvAdizu ca ","6.1.94-5:otvozWayoH samAse vA ","6.1.94-6:emanAdizu Candasi","6.1.95-1:usyomANkzu AwaH pratizeDaH","6.1.98-1:itO anekAjgrahaRam SradarTam","6.1.99-1:nityam Amreqite qAci ","6.1.99-2:akArantAt anukaraRAt vA","6.1.101-1:savarRadIrGatve fti fvAvacanam ","6.1.101-2:lfti lfvAvacanam","6.1.102-1:praTamayoH iti yogaviBAgaH savarRadIrGArTaH ","6.1.102-2:ekayoge hi jaSSahoH pararUpaprasaNgaH ","6.1.102-3:AdguRayaRAdeSayoH apavAdAH vfdDisavarRadIrGapUrvasavarRAdeSAH tezAm pararUpam svarasanDizu ","6.1.102-4:yogaviBAgaH anyaSAstranivfttiyarTaH cet ami atiprasaNgaH ","6.1.102-5:nakArABAvaH ca tasmAt iti anantaranirdeSAt ","6.1.102-6:ijgrahaRam tu jYApakam pararUpABAvasya","6.1.108-1:samprasAraRAt pUrvatve samAnANgagrahaRam asamAnANgapratizeDArTam ","6.1.108-2:sidDam asamprasAraRAt ","6.1.108-3:kAryakftatvAt vA ","6.1.108-4:dIrGatvam vacanaprAmARyAt ","6.1.108-5:antavattvAt vA ","6.1.108-6:AwaH vfdDeH iyaN ","6.1.108-7:At guRAt savarRadIrGatvam ANaByAsayoH ","6.1.108-8:svare dozaH tu ","6.1.108-9:ANi pararUpavacanam tu jYApakam antaraNgabalIyastvAt ","6.1.108-10:prayojanam pUrvasavarRapUrvatvatahilopawenaNeryaNisminNiRalOtvam antaraNgam bahiraNgalakzaRAt varRavikArAt","6.1.113-1:aplutAdaplutavacane akArahaSoH samAnapade pratizeDaH ","6.1.113-2:na vA bahiraNgalakzaRatvAt","6.1.115-1:nAntaHpAdam iti sarvapratizeDaH cet atiprasaNgaH ","6.1.115-2:akArASrayam iti cet uttvavacanam ","6.1.115-3:ayavoH pratizeDaH ca ","6.1.115-4:eNprakaraRAt sidDam cet uttvapratizeDaH ","6.1.115-5:punaH eNgrahaRAt sidDam","6.1.123-1:goH agvacanam gavAgre svarasidDyarTam ","6.1.123-2:avaNAdeSe hi svare dozaH","6.1.125-1:plutapragfhyezu ajgrahaRam anarTakam aDikArAt sidDam ","6.1.125-2:tat tu tasmin prakftiBAvArTam ","6.1.125-3:plutaprakftiBAvavacanam tu jYApakam ekAdeSAt plutaH vipratizeDena iti ","6.1.125-4:ekAdeSAt plutaH vipratizeDena iti cet SAlendre atiprasaNgaH ","6.1.125-5:na vA bahiraNgalakzaRatvAt","6.1.126-1:ANaH anarTakasya","6.1.127-1:sinnityasamAsayoH SAkalapratizeDaH ","6.1.127-2:IzA akzAdizu Candasi prakftiBAvamAtram","6.1.128-1:fti akaH savarRArTam ","6.1.128-2:anigantArTam ca ","6.1.128-3:fti hrasvAt upasargAt vfdDiH vipratizeDena","6.1.129-1:vadvacanam plutakAryapratizeDArTam ","6.1.129-2:plutapratizeDe hi pragfhyaplutapratizeDaprasaNgaH anyena vihitatvAt","6.1.130-3:cAkravarmaRasya ","6.1.130-1:I","6.1.130-3:cAkravarmaRasya iti anupasTitArTam","6.1.135-1:suwi kAtpUrvavacanam akakArAdO kAtpUrvArTam iti cet antareRa api tat sidDam ","6.1.135-2:dvirvacanAt suw vipratizeDena iti cet dvirBUte SabdAntaraBAvAt punaH prasaNgaH ","6.1.135-3:dvirBUte SabdAntaraBAvAt punaH prasaNgaH iti cet dvirvacanam ","6.1.135-4:taTA ca anavasTA ","6.1.135-5:aqvyavAye upasaNKyAnam ","6.1.135-6:aByAsavyavAye ca ","6.1.135-7:avipratizeDaH vA bahiraNgalakzaRatvAt ","6.1.135-8:upadeSivadvacanam ca ","6.1.135-9:liwiguRacaNidIrGapratizeDArTam ","6.1.135-10:kAt pUrvAntaH iti cet ruviDipratizeDaH ","6.1.135-11:parAdO iqguRaprasaNgaH ","6.1.135-12:aBakte svaraH","6.1.142-1:kirateH harzajIvikAkulAyakaraRezu","6.1.144-1:samaH hitatatayoH vA lopaH ","6.1.144-2:samtumunoH kAme ","6.1.144-3:avaSyamaH kftye","6.1.150-1:vizkiraH SakunO vikiraH vA","6.1.157-1:AScaryam adBute","6.1.158-1:anudAtte vipratizeDAnupapattiH ekasmin yugapat samBavAt ","6.1.158-2:sidDam tu ekAnanudAttatvAt ","6.1.158-3:ekavarjam iti ca aprasidDiH sandehAt ","6.1.158-4:sidDam tu yasmin anudAtte udAttavacanAnarTakyam tadvarjam ","6.1.158-5:prakftipratyayayoH svarasya sAvakASatvAt aprasidDiH ","6.1.158-6:vipratizeDAt pratyayasvaraH iti cet kAmyAdizu citkaraRam ","6.1.158-7:prakftisvare pratyayasvarABAvaH ","6.1.158-8:sidDam tu prakftisvarabalIyastvAt pratyayasvaraBAvaH ","6.1.158-9:satiSizwasvarabalIyastvam ca ","6.1.158-10:tat ca anekapratyayasamAsArTam ","6.1.158-11:syAdisvarAprasaNgaH ca tAseH parasya anudAttavacanAt ","6.1.158-12:SAstraparavipratizeDAniyamAt vA SabdavipratizeDAt sidDam ","6.1.158-13:viBaktisvarAt naYsvaraH balIyAn ","6.1.158-14:viBaktinimittasvarAt ca ","6.1.158-15:yat ca upapadam kfti naY ","6.1.158-16:sahanirdizwasya ca","6.1.161-1:udAttalope svaritodAttayoH aBAvAt anudAttagrahaRAnarTakyam ","6.1.161-2:antaH iti cet SnamksayuzmadasmadidaNkiMlopezu svaraH ","6.1.161-3:AdiH iti cet inDIta dvayam iti antaH ","6.1.161-4:AdO sidDam ","6.1.161-5:vidInDiKidiByaH ca lasArvaDAtukAnudAttapratizeDAt liNi sidDam ","6.1.161-6:ayaci citkaraRAt","6.1.162-1:DAtoH antaH iti cet anudAtte ca bagrahaRam ","6.1.162-2:san ca nit ","6.1.162-3:AdO UrRapratyayaDAtuzu antodAttatvam ","6.1.162-4:antodAttavacanAt sidDam ","6.1.162-5:pibO nipAtanAt","6.1.163-1:citaH saprakfteH bahvakajarTam","6.1.166-1:tisfByaH jasgrahaRAnarTakyam anyatra aBAvAt","6.1.167-1:caturaH Sasi striyAm apratizeDaH AdyudAttanipAtanAt ","6.1.167-2:viBaktisvaraBAvaH ca halAdigrahaRAt ","6.1.167-3:AdyudAttanipAtane hi halAdigrahaRAnarTakyam","6.1.168-1:sO ekAcaH udAttatve tvanmadoH pratizeDaH ","6.1.168-2:sidDam tu yasmAt tftIyAdiH tasya aBAvAt sO ","6.1.168-3:prakfteH ca anekActvAt","6.1.171-1:UWi upaDAgrahaRam antyapratizeDArTam","6.1.172-1:azwanaH dIrGagrahaRam zawsaYjYAjYApakam AkArAntasya nuqarTam","6.1.173-1:nadyajAdyudAttatve bfhanmahatoH upasaNKyAnam","6.1.174-1:udAttayaRi halgrahaRam nakArAntArTam ","6.1.174-2:halpUrvagrahaRAnarTakyam ca samudAyAdeSatvAt ","6.1.174-3:svaritatve ca avacanAt","6.1.176-1:matubudAttatve regrahaRam ","6.1.176-2:tripratizeDaH ca","6.1.177-1:nAmsvare matO hrasvagrahaRam","6.1.185-1:titi pratyayagrahaRam","6.1.186-1:tAsyAdiByaH anudAttatve saptamInirdeSaH aByastasijarTaH ","6.1.186-2:citsvarAt tAsyAdiByaH anudAttatvam vipratizeDena ","6.1.186-3:mukaH ca upasaNKyAnam ","6.1.186-4:itaH ca upasaNKyAnam ","6.1.186-5:itaH ca anekAntatvAt ","6.1.186-6:tatra adipraBftijuhotyAdiByaH apratizeDaH sTAnyAdeSABAvAt ","6.1.186-7:anudAttaNidgrahaRAt vA ","6.1.186-8:NitaH anudAttatve vikaraReByaH apratizeDaH sarvasya upadeSaviSezaRatvAt","6.1.187-1:sicaH AdyudAttatve aniwaH pitaH upasaNKyAnam","6.1.188-1:svapAdInAm vAvacanAt aByastasvaraH vipratizeDena","6.1.190-1:anudAtte ca iti bahuvrIhinirdeSaH lopayaRAdeSArTam","6.1.191-1:sarvasvaraH anackasya","6.1.195-1:yaki rapare upasaNKyAnam ","6.1.195-2:upadeSavacanAt sidDam ","6.1.195-3:upadeSavacane janAdInAm ","6.1.195-4:yogaviBAgAt sidDam","6.1.203-1:upamAnasya AdyudAttavacanam jYApakam anubanDalakzaRe svare pratyayalakzaRapratizeDasya","6.1.205-1:nizWAyAm ya!i dIrGatve pratizeDaH ","6.1.205-2:na vA bahiraNgalakzaRatvAt","6.1.207-1:ASite kartari nipAtanam upaDAdIrhatvam AdyudAttatvam ca","6.1.20-:","-1:veRuriktayoH aprApte","6.1.222-1:coH atadDite","6.1.223-1:samAsAntodAttatve vyaYjanAntezu upasaNKyAnam ","6.1.223-2:halsvaraprAptO vA vyaYjanam avidyamAnavat ","6.1.223-3:prayojanam lidAdyudAttAntodAttviDayaH","6.2.2-1:tatpuruze viBaktiprakftisvaratve karmaDAraye pratizeDaH ","6.2.2-2:sidDam tu lakzaRapratipadoktayoH pratipadoktasya eva grahaRAt ","6.2.2-3:avyaye naYkunipAtAnAm ","6.2.2-4:ktvAyAm vA pratizeDaH ","6.2.2-5:nipAtanAt sidDam","6.2.19-1:sadfSagrahaRam anarTakam tftIyAsamAsavacanAt ","6.2.19-2:zazWyarTam iti cet tftIyAsamAsavacanAnarTakyam P III","6.2.19-544):","6.2.29-1:igantaprakftisvaratve yaRguRayoH upasaNKyAnam ","6.2.29-2:na vA bahiraNgalakzaRatvAt","6.2.33-1:paripratyupApeByaH vanam samAse vipratizeDena ","6.2.33-2:na vA vanasyAndodAttatvavacanam tadapavAdanivfttyarTam","6.2.36-1:AcAryopasarjane anekasya api pUrvapadatvAt sandehaH ","6.2.36-2:lokavijYAnAt sidDam","6.2.42-1:kuruvfjyoH gArhapate ","6.2.42-2:paRyakambalaH saYjYAyAm","6.2.47-1:ahIne dvitIyA anupasarge","6.2.49-1:gateH anantaragrahaRam anarTakam gatiH gatO anudAttavacanAt ","6.2.49-2:tatra yasya aprakftisvaratvam tasmAt antodAttaprasaNgaH ","6.2.49-3:prakftisvaravacanAt hi anantodAttatvam ","6.2.49-4:prakftisvaravacanam kimarTam iti cet ekagatyarTam ","6.2.49-5:apUrvapadArTam iti cet kArake atiprasaNgaH ","6.2.49-6:sidDam tu gateH antodAttAprasaNgAt","6.2.50-1:tAdO niti kfdgrahaRAnarTakyam ","6.2.50-2:kfdupadeSe vA tAdyarTam iqarTam","6.2.52-1:anigantaprakftisvaratve yaRAdeSe prakftisvaraBAvaprasaNgaH ","6.2.52-2:anigantavacanam kimarTam iti cet ayaRAdizwArTam ","6.2.52-3:uktam vA ","6.2.52-4:coH anigantaH aYcatO vapratyaye ","6.2.52-5:na vA cusvarasya pUrvapadaprakftisvaraBAvini pratizeDAt itaraTA hi sarvApavAdaH ","6.2.52-6:viBaktIzatsvarAt kftsvaraH ","6.2.52-7:citsvarAt hArisvaraH ","6.2.52-8:kftsvarAt ca ","6.2.52-9:na vA haraRapratizeDaH jYApakaH kftsvarABADakatvasya ","6.2.52-10:yuktasvaraH ca","6.2.82-1:je dIrGAt bahvacaH","6.2.91-1:AdyudAttaprakaraRe divodAsAdInAm Candasi upasaNKyAnam","6.2.9-:","6.2.106-1:bahuvrIhO viSvasya antodAttAt saYjYAyAm mitrAjinayoH antaH ","6.2.106-2:antodAttaprakaraRe marudvfDAdInAm Candasi upasaNKyAnam","6.2.10- 108-1:udarAdiByaH naYsuByAm","6.2.117-1:soH manasoH kapi ","6.2.121-1:pUrvAdiByaH kUlAdInAm AdyudAttatvam","6.2.12-:","-1:celarAjyAdiByaH avyayam","6.2.136-1:kuRqAdyudAttatve tatsamudAyagrahaRam","6.2.139-1:gatyAdiByaH prakftisvaratve kfdgrahaRAnarTakyam anyasya uttarapadasya aBAvAt ","6.2.139-2:kftprakftO vA gatitvAt aDikAfTam kfdgrahaRam","6.2.143-1:antodAttatvam samAsasya iti cet kapi upasaNKyAnam ","6.2.143-2:uttarapadAntodAttatve naYsuByAm samAsAntodAttatvam ","6.2.143-3:na vA kapi pUrvavacanam jYApakam uttarapadAnantodAttatvasya ","6.2.143-4:prakaraRAt ca samAsAntodAttatvam","6.2.148-1:kArakAt dattaSrutayoH anASizi pratizeDaH ","6.2.148-2:sidDam tu uBayaniyamAt","6.2.165-1:fzipratizeDaH mitre","6.2.175-1:bahoH naYvat uttarapadAdyudAttArTam","6.2.177-1:upasargAt svANgam Druvam muKasya antodAttatvAt","6.2.185- 186-1:aBeH muKam apAt ca aDruvArTam ","6.2.185- 186-2:aBuvrIhyarTam vA","6.2.187-1:sPigapUtagrahaRam ca","6.2.191-1:ateH DAtulope","6.2.197-1:dvitriByAm mUrDani akArAntagrahaRam cet nakArAntasya upasaNKyAnam ","6.2.197-2:nakArAnte akArAntasya ","6.2.197-3:udAttalopAt sidDam","6.2.199-1:antodAttaprakaraRe tricakrAdInAm Candasi upasaNKyAnam","6.3.1-1:uttarapadADikArasya prayojanam stokAdiByolukAnaNikohrasvanalopAH ","6.3.1-2:ekavadvcanam anarTakam ","6.3.1-3:dvibahuzu asamAsaH ","6.3.1-4:uktam vA ","6.3.1-5:ekavadvacane hi gozucare atiprasaNgaH ","6.3.1-6:varzAByaH ca je ","6.3.1-7:apaH yoniyanmatizu ca ","6.3.1-8:je care ca","6.3.2-1:paYcamIprakaraRe brAhmaRAcCaMsinaH upasaNKyAnam ","6.3.2-2:anyArTe ca","6.3.3-1:aYjasaH upasaNKyAnam ","6.3.3-2:puMsAnujaH januzAnDaH vikftAkzaH iti ca","6.3.5-1:AtmanaH ca pUraRe ","6.3.5-2:anyArTe ca","6.3.7- 8-1:AtmaneBAzaparasmEBAzayoH upasaNKyAnam","6.3.9-1:hfddyuByAm NeH upasaNKyAnam ","6.3.9-2:anyArTe ca ","6.3.9-3:haladantADikAre goH upasaNKyAnam ","6.3.9-4:lukaH avAdeSaH vipratizeDena iti cet BUmipASe atiprasaNgaH ","6.3.9-5:akaH ataH iti vA sanDyakzarArTam","6.3.10-1:kAranAmni vAvacanArTam cet ajAdO atiprasaNgaH ","6.3.10-2:aprApte samAsaviDAnam ","6.3.10-3:yogaviBAgAt sidDam","6.3.11-1:gurO antAt ca","6.3.14-1:tatpuruze kfti bahulam akarmaDAraye ","6.3.14-2:lugaluganukramaRam bahulavacanasya akftsnatvAt","6.3.21-1:zazWIprakaraRe vAgdikpaSyadByaH yuktidaRqaharezu upasaNKyAnam ","6.3.21-2:AmuzyAyaRAmuzyputrikA iti upasaNKyAnam ","6.3.21-3:devAnAmpriyaH iti ca ","6.3.21-4:SepapucCalANgUlezu SunaH saYjYAyAm ","6.3.21-5:divaH ca dAse","6.3.23-1:vidyAyonisambanDeByaH tatpUrvapadottarapadagrahaRam","6.3.25-1:fkArAntAnAm dvandve putre upasaNKyAnam ","6.3.25-2:kAryI ca anirdizwaH ","6.3.25-3:aviSezeRa pitfpitAmahAdizu atiprasaNgaH","6.3.26-1:devatAdvandve uBayatra vAyoH pratizeDaH ","6.3.26-2:brahmaprajApatyAdInAm ca","6.3.28-1:id vfdDO vizRoH pratizeDaH","6.3.34-1:puMvadBAve strIgrahaRam strIpratyayagrahaRam cet tatra puMvat iti uttarapade tatpratizeDavijYAnam ","6.3.34-2:prAtipadikasya ca pratyApattiH ","6.3.34-3:sTAnivatprasaNgaH ca ","6.3.34-4:vataRqyAdizu puMvadvacanam ","6.3.34-5:strISabdasya puMSabdAtideSaH iti cet sarvaprasaNgaH aviSezAt ","6.3.34-6:BAzitapuMskAnupapattiH ca ","6.3.34-7:arTAtideSe vipratizeDAnupapattiH ","6.3.34-8:pUraRyAm praDAnapUraRIgrahaRam","6.3.35-1:tasilAdI tratasO ","6.3.35-2:taratamapO ","6.3.35-3:caraqjAtIyarO ","6.3.35-4:kalpabdeSIyarO ","6.3.35-5:rUpappASapO ","6.3.35-6:TamTAlO ","6.3.35-7:dArhilO ","6.3.35-8:tilTyanO ","6.3.35-9:Sasi bahvalpArTasya ","6.3.35-10:tvataloH guRavacanasya ","6.3.35-11:Basya aQe tadDite ","6.3.35-12:WakCasoH ca","6.3.36-1:mAningrahaRam astryarTam asamAnADikaraRArTam ca","6.3.37-1:na kopaDapratizeDe tadDitavugrahaRam","6.3.40-1:svANgAt ca ItaH amAnini","6.3.42-1:puMvat karmaDAraye pratizidDArTam ","6.3.42-2:kukkuwyAdInAm aRqAdizu puMvadvacanam ","6.3.42-3:na vA astrIpUrvapadavivakzitatvAt ","6.3.42-4:agneH IttvAt varuRasya vfdDiH vipratizeDena ","6.3.42-5:pUMvadBAvAt hrasvatvam KidGAdizu","6.3.46-1:mahadAttve GAsakaraviSizwezu upasaNKyAnam puMvadvacanam ca asamAnADikaraRArTam ","6.3.46-2:azwanaH kapAle havizi ","6.3.46-3:gavi ca yukte","6.3.50-1:yadaRgrahaRe rUpagrahaRam leKagrahaRAt","6.3.52-1:padAdeSe antodAttanipAtanam padopahatArTam ","6.3.52-2:upadeSivadvacanam ca svarasidDyarTam","6.3.53-1:padBAve ike caratO upasaNKyAnam","6.3.57-1:saYjYAyAm uttarapadasya ca","6.3.61-1:ikaH hrasvatvam uttarapadamAtre ","6.3.61-2:sarvAnte hi lokavijYAnam ","6.3.61-3:iyaNuvaNavyayapratizeDaH","6.3.66-1:Kiti hrasvAprasidDiH anajantatvAt ","6.3.66-2:sidDam tu hrasvAntasya mumvacanAt ","6.3.66-3:sanniyogAt vA","6.3.68-1:amaH pratyayavadanudeSe prayojanam AtvapUrvasavarRaguReyaNuvaNAdeSAH ","6.3.68-2:amaH pratyayavadanudeSe AtvapUrvasavarRAprasidDiH apraTamAtvAt ","6.3.68-3:sAmAnyAtideSe","6.3.68-4:sidDam tu dvitIyEkavacanavadvacanAt ","6.3.68-5:ekaSezanirdeSAt vA","6.3.70-1:astusatyAgadasya kAre ","6.3.70-2:Bakzasya Candasi ","6.3.70-3:DenoH BavyAyAm ","6.3.70-4:lokasya pfRe ","6.3.70-5:itye anaByASasya ","6.3.70-6:BrAzwrAgnyoH inDe ","6.3.70-7:gile agilasya ","6.3.70-8:uzRaBadrayoH karaRe ","6.3.70-9:sUtograrAjaBojakulameruByaH duhituH putraw vA","6.3.72-1:rAtreH aprApte","6.3.73-1:naYaH nalope avakzepe tiNi upasaNKyAnam","6.3.78-1:sahasya halopavacanam ","6.3.78-2:sAdeSe hi svare dozaH","6.3.79-1:granTAnte vacanAnarTakyam avyayIBAvena kftatvAt","6.3.82-1:upasarjanasya vAvacane sarvaprasaNgaH aviSezAt ","6.3.82-2:sidDam tu bahuvrIhinirdeSAt","6.3.83-1:prakftyA ASizi agavAdizu","6.3.86-1:brahmaRi upapade samAnapUrve vrate karmaRi careH RiniH vratalopaH ca","6.3.89-1:dfgdfSavatuzu dfkze upasaNKyAnam","6.3.9-:","-1:adrisaDryoH antodAttavacanam kftsvaranivfttyarTam ","-2:tatra Candasi striyAm pratizeDaH","6.3.9-:","-1:aYcatinahyAdizu kvibgrahaRaAnarTakyam yasmin viDiH tadAdO algrahaRe","6.3.97-1:samApaH IttvapratizeDaH","6.3.101-1:kadBAve trO upasaNKyAnam","6.3.109-1:dikSabdeByaH tIrasya tAraBAvaH vA ","6.3.109-2:vAcaH vAde qatvam valaBAvaH ca uttarapadasya iYi ","6.3.109-3:zazaH utvam datfdaSasu uttarapadAdeH zwutvam ca ","6.3.109-4:DAsu vA ","6.3.109-5:duraH dASanASadaBaDyezu ","6.3.109-6:svaro rohatO Candasi","6.3.122-1:sAdakArayoH kftrime ","6.3.122-2:prativeSAdInAm viBAzA","6.3.139-1:ikaH hrasvAt samprasAraRadIrGatvam vipratizeDena ","6.3.139-6:4","6.4.2-1:aRprakaraRAt fkArasya aprAptiH ","6.4.2-2:iggrahaRasya ca aRviSezaRatvAt","6.4.12- 13-1:hanaH kvO upaDAdIrGatvaprasaNgaH ","6.4.12- 13-2:niyamavacanAt sidDam iti cet sarvanAmasTAnaprakaraRe niyamavacanAt anyatra aniyamaH SlokavArttika: dIrGaviDiH yaH iha inpraBftInAm tam viniyamya suwi iti suvidvAn SO niyamam punaH eva vidaDyAt BrURahani iti taTA asya na duzyet SAsti nivartya suwi iti aviSeze SO niyamam kuru vA api asamIkzya dIrGaviDeH upaDAniyamAt me hanta yi dIrGaviDO ca na dozaH suwi api vA prakfte anavakASaH SO niyamaH aprakftapratizeDe yasya hi SO niyamaH suwi na etat tena na tatra Bavet viniyamyam dIrGaviDiH yaH iha inpraBftInAm tam viniyamya suwi iti suvidvAn SO niyamam punaH eva vidaDyAt BrURahani iti taTA asya na duzyet SAsti nivartya suwi iti aviSeze SO niyamam kuru vA api asamIkzya dIrGaviDeH upaDAniyamAt me hanta yi dIrGaviDO ca na dozaH suwi api vA prakfte anavakASaH SO niyamaH aprakftapratizeDe yasya hi SO niyamaH suwi na etat tena na tatra Bavet viniyamyam","6.4.14-1:atvasantasya dIrGatve pitaH upasaNKyAnam","6.4.16-1:gameH dIrGatve iNgrahaRam ","6.4.16-2:agrahaRe hi anAdeSasya api dIrGaprasaNgaH ","6.4.16-3:na vA Candasi anAdeSasya api dIrGatvadarSanAt iNgrahaRAnarTakyam ","6.4.16-4:sani dIrGe upaDADikAraH cet vyaYjanapratizeDaH ","6.4.16-5:anaDikAre uktam","6.4.22-1:asidDavacane uktam ","6.4.22-2:atragrahaRam vizayArTam ","6.4.22-3:prayojanam SEttvam Ditve ","6.4.22-4:hilopaH uttve ","6.4.22-5:tAstilopeRyaRAdeSAH aqAqviDO ","6.4.22-6:anunAsikalopaH hilopAllopayoH jaBAvaH ca ","6.4.22-7:samprasAraRam avarRalope ","6.4.22-8:reBAvaH Allope SlokavArttika: ut tu kfYaH kaTam oH vinivfttO ReH api ca iwi kaTam vinivfttiH abruvataH tava yogam imam syAt luk ca ciRaH nu kaTam na tarasya cam BagavAn kftavAn tu tadarTam tena Bavet iwi ReH nivfttiH mvoH api ye ca taTA api anuvfttO ciRluki ca kNitaH eva luk syAt ut tu kfYaH kaTam oH vinivfttO ReH api ca iwi kaTam vinivfttiH abruvataH tava yogam imam syAt luk ca ciRaH nu kaTam na tarasya cam BagavAn kftavAn tu tadarTam tena Bavet iwi ReH nivfttiH mvoH api ye ca taTA api anuvfttO ciRluki ca kNitaH eva luk syAt ","6.4.22-9:sidDam vasusamprasAraRam ajviDO ","6.4.22-10:bahiraNgalakzaRatvAt asidDatvAt ca ","6.4.22-11:Attvam yalopAllopayoH paSuzaH na vAjAn cAKAyitA cAKAyitum ","6.4.22-12:samAnASrayavacanAt sidDam ","6.4.22-13:hrasvayalopAllopAH ca ayAdeSe lyapi ","6.4.22-14:vugyuwO uvaNyaRoH ","6.4.22-15:prAk BAt iti cet sunAmaGonABUguRezu upasaNKyAnam ","6.4.22-16:A BAt iti cet susamprasAraRayalopaprasTAdInAm pratizeDaH","6.4.24-1:aniditAm nalope laNgikampyoH upatapaSarIravikArayoH upasaNKyAnam ","6.4.24-2:bfheH aci aniwi ","6.4.24-3:raYjeH RO mfgamaraRe ","6.4.24-4:GinuRi nipAtanAt sidDam ","6.4.24-5:rajakarajanarajaHsu kittvAt sidDam","6.4.34-1:SAsaH ittve ASAsaH kvO","6.4.37-1:anudAttopadeSe anunAsikalopaH lyapi ca ","6.4.37-2:vA amaH","6.4.42-1:sanoteH anunAsikalopAt Attvam vipratizeDena","6.4.47-1:BrasjAdeSAt samprasAraRam vipratizeDena ","6.4.47-2:rasoH vA fvacane sici vfdDeH BrasjAdeSaH","6.4.48-1:RyallopO iyaNyaRguRavfdDidIrGatveByaH pUrvavipratizidDam","6.4.49-1:yalope varRagrahaRam cet DAtvantasya pratizeDaH ","6.4.49-2:saNGAtagrahaRam cet kyasya viBAzAyAm dozaH ","6.4.49-3:AdeH paravacanAt sidDam","6.4.52-1:nizWAyAm seqgrahaRam aniwi pratizeDArTam iti cet tat sidDam aniqaBAvAt ","6.4.52-2:ekAcaH hi pratizeDaH ","6.4.52-3:iqBAvArTam tu tannimittatvAt lopasya ","6.4.52-4:avacane hi Rilope iwpratizeDaprasaNgaH ","6.4.52-5:vfDiramiSfDInAm upasaNKyAnam sArvaDAtukatvAt","6.4.55-1:ktnO iwi ReH guRavacanam ","6.4.55-2:itnO pratyayAntarakaraRam ","6.4.55-3:ayAdeSe ca upasaNKyAnam","6.4.56-1:lyapi laGupUrvasya iti cet vyaYjanAntezu upasaNKyAnam ","6.4.56-2:allope ca gurupUrvAt pratizeDaH ","6.4.56-3:lyapi laGupUrvAt iti vacanAt sidDam ","6.4.56-4:hrasvAdizu ca uktam","6.4.57-1:ApaH sAnubanDakanirdeSAt iNi sidDam","6.4.62-1:ciRvadBAve upadeSavacanam fkAraguRabalIyastvAt ","6.4.62-2:vaDiBAvAt sIyuwi ciRvadBAvaH vipratizeDena ","6.4.62-3:haniRiNAdeSapratizeDaH ca ","6.4.62-4:aNgasya iti tu prakaraRAt aNgaSAstrAtideSAt sidDam","6.4.64-1:iqgrahaRam akNidarTam ","6.4.64-2:sArvaDAtuke ca Adi iti ArDaDAtukADikArAt upasaNKyAnam","6.4.66-1:Ittve vakArapratizeDaH Gftam GftapAvAnaH iti darSanAt ","6.4.66-2:DIvarI pIvarI iti ca uktam","6.4.77-1:iyaNAdiprakaraRe tanvAdInAm Candasi bahulam","6.4.82-1:yaRAdeSaH svarapadapUrvopaDasya ca ","6.4.82-2:asaMyogapUrve hi anizwaprasaNgaH","6.4.84-1:varzABUpunarBvaH ca","6.4.84-2:dfnkarapunaHpUrvasya Buvo yaR vaktavyaH","6.4.87-1:huSnugrahaRAnarTakyam anyasya aBAvAt ","6.4.87-2:yaNlugarTam iti cet ArDaDAtukatvAt sidDam","6.4.89-1:gohigrahaRam vizayArTam ","6.4.89-2:ayAdeSapratizeDArTam ca ","6.4.89-3:hrasvAdeSe hi ayAdeSaprasaNgaH Uttvasya asidDatvAt","6.4.90-1:dozigrahaRam ca","6.4.93-1:ciRRamuloH RijvyavetAnAm yaNlope ca antaraNgalakzaRatvAt sidDam","6.4.100-1:halgrahaRam anarTakam anyatra api darSanAt","6.4.101-1:heH Ditve halaDikArAt iwaH apratizeDaH","6.4.104-1:ciRaH luki tagrahaRAnarTakyam saNGAtasya apratyayatvAt ","6.4.104-2:talopasya ca asidDatvAt ","6.4.104-3:kAryakftatvAt vA","6.4.106-1:utaH ca pratyayAt CandovAvacanam ","6.4.106-2:uttarArTam ca","6.4.107-1:kfYaH uttve ukArAntanirdeSAt syAntasya apratizeDaH SlokavArttika: anuprayoge tu BuvA astyabADanam smaranti kartuH vacanAt manIziRaH lope dvirvacanAsidDiH sTAnivat iti cet kfte Bavet dvitve na evam siDyati kasmAt pratyaNgatvAt Bavet hi pararUpam tasmin ca kfte lopaH dIrGatvam bADakam Bavet tatra","6.4.114-1:daridrAteH ArDaDAtuke lopaH ","6.4.114-2:sidDaH ca pratyayaviDO SlokavArttika: na daridrAyake lopaH daridrARe ca na izyate didaridrAsasti iti eke didaridrizati iti vA ","6.4.114-3:vA adyatanyAm","6.4.120-1:RakArazakArAdeSAdeH ettvavacanam liwi ","6.4.120-2:PaliBajigrahaRam tu jYApakam aByAsAdeSasidDatvasya ","6.4.120-3:praTamatftIyAdInAm AdeSAditvAt ettvABAvaH ","6.4.120-4:na vA SasidadyoH pratizeDaH jYApakaH rUpABede ettvavijYAnasya SlokavArttika: damBaH ettvam nalopasya asidDatvAt naSimanyoH aliwi ettvam Candasi amipacyoH api aneSam menakA iti etat vyemAnam liNi peciran yaj Ayeje vap Avepe damBaH ettvam alakzaRam SnasoH attve takAreRa jYApyate tu ettvaSAsanam","6.4.121-1:TalgrahaRam akNidarTam","6.4.123-1:rADAdizu sTAninirdeSaH","6.4.130-1:pAdaH upaDAhrasvatvam ","6.4.130-2:AdeSe hi sarvAdeSaprasaNgaH ","6.4.130-3:na vA nirdiSyamAnasya AdeSatvAt ","6.4.130-4:prayojanam suptiNAdeSe ","6.4.130-5:lyabBAve ca ","6.4.130-6:tricaturyuzmadasmattyadAdivikArezu ca ","6.4.130-7:udaH pUrvatve","6.4.132-1:vAhaH UqvacanAnarTakyam samprasAraRena kftatvAt ","6.4.132-2:guRaH pratyayalakzaRatvAt ","6.4.132-3:ejgrahaRAt vfdDiH","6.4.133-1:SvAdInAm prasAraRe nakArAntagrahaRam anakArAntapratizeDArTam ","6.4.133-2:uktam vA","6.4.135-1:zapUrvAdInAm punarvacanam allopArTam avaDAraRe hi anyatra prakftiBAve upaDAlopaprasaNgaH","6.4.140-1:AtaH anApaH","6.4.141-1:mantrezu AtmanaH pratyayamAtraprasaNgaH ","6.4.141-2:AdigrahaRAnarTakyam ca AkAraprakaraRAt","6.4.143-1:qiti aBasya api anubanDakaraRasAmarTyAt","6.4.144-1:nakArantasya wilope sabrahmacAripIWasarpikalApikuTumitEtilijAjalilANgaliSilAliSiKaRqisUkarasdmasuparvaRAm upasaNKyAnam ","6.4.144-2:carmaRaH koSe ","6.4.144-3:aSmanaH vikAre ","6.4.144-4:SunaH saNkoce ","6.4.144-5:avyayAnAm ca sAyampratikAdyarTam","6.4.148-1:yasya ItyAdO SyAm pratizeDaH ","6.4.148-2:iyaNuvaNByAm lopaH vipratizeDena ","6.4.148-3:guRavfdDI ca ","6.4.148-4:na vA iyaNuvaNAdeSasya anyavizaye vacanAt ","6.4.148-5:tasmAt tatra guRavfdDivizaye pratizeDaH","6.4.149-1:sUryAdInAm aRante aprasidDiH aNgAnyatvAt ","6.4.149-2:sidDam tu sTAnivatpratizeDAt ","6.4.149-3:upaDAgrahaRAnarTakyam ca ","6.4.149-4:vizayaparigaRanam ca ","6.4.149-5:sUryamatsyayoH NyAm ","6.4.149-6:sUryAgastyayoH Ce ca ","6.4.149-7:tizyapuzyayoH nakzatrARi ","6.4.149-8:antikasya tasi kAdilopaH AdyudAttatvam ca ","6.4.149-9:tame tAdeH ca SlokavArttika: tasi iti ezaH na vaktavyaH dfzwaH dASataye api hi GO lopaH antizat iti yatra taTA aGO ye antyaTarvasu","6.4.154-1:tuH sarvalopavijYAnam antyasya vacanAnarTakyAt","6.4.155-1:RO izWavat prAtipadikasya puMvadBAvaraBAvawilopayaRAdiparArTam","6.4.163-1:prakftyA ekAc izWeymeyassu cet ekAcaH uccAraRasAmarTyAt avacanAt prakftiBAvaH ","6.4.163-2:vinmatoH tu lugarTam ","6.4.163-3:prakftyA ake rAjanyamanuzyayuvAnaH","6.4.170-1:mapUrvAt pratizeDe vA hitanAmnaH","6.4.171-1:brAhmasya ajAtO lopArTam vacanam ","6.4.171-2:tatra aprAptaviDAne prAptapratizeDaH ","6.4.171-3:na vA paryudAsasAmarTyAt","6.4.174-1:BrORahatye tatvanipAtanAnarTakyam sAmAnyena kftatvAt ","6.4.174-2:jYApakam tu tadDite tatvapratizeDasya ","6.4.174-3:EkzvAkasya svaraBedAt nipAtanam pfTaktvena ","6.4.174-4:ekaSrutyA nirdeSAt sidDam ","6.4.174-5:mEtreye QaYi yAdilopanipAtanam ","6.4.174-6:hiraRmaye yalopavacanam ","6.4.174-7:hiraRyayasya Candasi malopavacanAt sidDam","7.1.1-1:yuvoH anAkO iti cet DAtupratizeDaH ","7.1.1-2:BujyvAdInAm ca ","7.1.1-3:anunAsikaparatvAt sidDam ","7.1.1-4:tatra NIbnumoH pratizeDaH ","7.1.1-5:DAtvantasya ca ","7.1.1-6:ziwwitkaraRam tu jYApakam ugitkAryABAvasya ","7.1.1-7:na vA zitkaraRam NIzviDAnArTam ","7.1.1-8:witkaraRam anupasarjanArTam ","7.1.1-9:vipratizeDAt tu wApaH balIyastvam ","7.1.1-10:DAtvantasya ca arTavadgrahaRAt ","7.1.1-11:numviDO JalgrahaRam ","7.1.1-12:liNgaviSizwapratizeDArTam ","7.1.1-13:na vA viBaktO liNgaviSizwAgrahaRAt ","7.1.1-14:prayojanam SunaH svare ","7.1.1-15:yUnaH samprasAraRe ","7.1.1-16:ugidacAm numviDO ","7.1.1-17:anaquhaH ca AmviDO ","7.1.1-18:paTimaToH Attve ","7.1.1-19:puMsaH asuNviDO ","7.1.1-20:saKyuH RittvAnaNO ","7.1.1-21:BavadBagavadaGavatAm odBAve ","7.1.1-22:sidDam tu yuvoH anunAsikatvAt","7.1.2-1:AyanAdizu upadeSivadvacanam svarasidDyarTam ","7.1.2-2:na vA kva cit citkaraRAt upadeSivadvacanAnarTakyam ","7.1.2-3:tatra uRAdipratizeDaH ","7.1.2-4:DAtoH vA IyaNvacanAt ","7.1.2-5:prAtipadikavijYAnAt ca pARineH sidDam","7.1.3-1:JAdeSe DAtvantapratizeDaH ","7.1.3-2:pratyayADikArAt sidDam iti cet anAdeH AdeSavacanam ","7.1.3-3:asamAsanirdeSAt sidDam ","7.1.3-4:tatra SayAntE iti anakArAntatvAt aNgasya AdBAvapratizeDaH ","7.1.3-5:sidDam anAnantaryAt anakArAntena AdBAvanivfttiH ","7.1.3-6:tatra ruwi sanniyogavacanAt sidDam","7.1.6-1:ruwi dfSiguRapratizeDaH ","7.1.6-2:pUrvAnte SINaH guRaviDiH ","7.1.6-3:JAdeSAt Aw lewi ","7.1.6-4:na vA nityatvAt AwaH ","7.1.6-5:antaraNgalakzaRatvAt ca","7.1.14-1:aSaH ekAdizwAt smAyAdInAm upasaNKyAnam ","7.1.14-2:na vA bahiraNgalakzaRatvAt","7.1.21-1:OSaGO astu luk tatra zaqByaH api evam prasajyate apavAdaH yasya vizaye yaH vA tasmAt anantaraH ","7.1.21-2:Atvam yatra tu tatra OStvam taTA hi asya grahaH kftaH svamoH luk ca tyadAdInAm kfte hi atve na luk Bavet SlokavArttika OSaGO astu luk tatra zaqByaH api evam prasajyate apavAdaH yasya vizaye yaH vA tasmAt anantaraH Atvam yatra tu tatra OStvam taTA hi asya grahaH kftaH svamoH luk ca tyadAdInAm kfte hi atve na luk Bavet","7.1.23-1:svamoH luk tyadAdiByaH ca ","7.1.23-2:SiSIlugnumviDizu napuMsakagrahaRam SabdagrahaRam cet anyapadArTe pratizeDaH ","7.1.23-3:sidDam tu prakftArTaviSezaRatvAt ","7.1.23-4:asTyAdizu SabdagrahaRam","7.1.25-1:adBAve pUrvasavarRapratizeDaH ","7.1.25-2:sidDam anunAsikopaDatvAt ","7.1.25-3:dukkaraRAt vA ","7.1.25-4:qitkaraRAt vA","7.1.26-1:itarAt Candasi pratizeDaH ekatarAt sarvatra ","7.1.26-2:napuMsakAdeSeByaH yuzmadasmadoH viBaktyAdeSAH vipratizeDena","7.1.27-1:NasaH AdeSe SitkaraRAnarTakyam akArasya akAravacanAnarTakyAt ","7.1.27-2:arTavattvAdeSe lopArTam SlokavArttika sarve sarvapadAdeSA dAkzIputrasya pARineH ","7.1.27-3:tasmAt SitkaraRam","7.1.33-1:sAmgrahaRam yaTAgfhItasya AdeSavacanAt ","7.1.33-2:na vA dviparyantAnAm akAravacanAt Ami sakArABAvaH ","7.1.33-3:suwpratizeDaH tu AdeSe lopavijYAnAt ","7.1.33-4:na vA wilopavacanAt AdeSe wAppratizeDArTam ","7.1.33-5:na vA liNgABAvAt wilopavacanAnarTakyam ","7.1.33-6:tasmAt suwpratizeDaH","7.1.36-1:videH vasoH kittvam","7.1.37-1:lyabAdeSe upadeSivadvacanam ","7.1.37-2:anAdizwArTam ","7.1.37-3:bahiraNgalakzaRatvAt ","7.1.37-4:snAtvAkAlakAdizu ca pratizeDaH ","7.1.37-5:tadantanirdeSAt sidDam ","7.1.37-6:samAsanipAtanAt vA ","7.1.37-7:anaYaH vA parasya kim naYaH pratizeDena na gatiH na ca kArakam yAvatA naYi pUrve tu lyabBAvaH na Bavizyati pratizeDAt tu jAnImaH tatpUrvam na iha gfhyate pratyaygrahaRe yAvat tAvat Bavitum arhati","7.1.39-1:iyAqiyAjIkArARAm upasaNKyAnam","7.1.39-2:ANayAjayArAm ca upasaNKyAnam kartavyam ]","7.1.51-1:aSvavfzayoH mETunecCAyAm ","7.1.51-2:kzIralavaRayoH lAlasAyAm","7.1.58-1:numviDO upadeSivadvacanam pratyayaviDyarTam ","7.1.58-2:itaraTA hi anakAre pratyayaH ","7.1.58-3:tatra ayaTezwaprasaNgaH ","7.1.58-4:DAtugrahaRasAmarTyAt vA tadupadeSe numviDAnam","7.1.59-1:Se tfmpAdInAm ","7.1.59-2:luptanakAratvAt","7.1.68-1:suduroH kevalagrahaRam anyopasargapratizeDArTam","7.1.69-1:ciRRamuloH anupasargasya","7.1.70-1:ugiti aYcatigrahaRAt sidDam aDAtoH","7.1.72-1:JalacaH numviDO ugitpratizeDaH ","7.1.72-2:vipratizeDAt sidDam ","7.1.72-3:punaHprasaNgaH iti cet amAdiBiH tulyam ","7.1.72-4:tatra bahUrji pratizeDaH ","7.1.72-5:antyAt pUrvam numam eke","7.1.73-1:ikaH aci viBaktO ajgrahaRam numnuwoH vipratizeDArTam ","7.1.73-2:itaraTA hi numaH nityanimittatvAt nuqaBAvaH ","7.1.73-3:uttarArTam ca SlokavArttika ikaH aci vyaYjane mA BUt astu lopaH svaraH kaTam ","7.1.74-1:puMvat iti numpratizeDaH cet guRanABAvanuqOttvapratizeDaH ","7.1.74-2:hrasvABAvArTam ca ","7.1.74-3:arTAtideSAt sidDam ","7.1.74-4:tadDitalukpratizeDaH ca ","7.1.74-5:na vA samAnAyAm AkftO BAzitapuMskavijYAnAt","7.1.82-1:anaquhaH sO AmpratizeDaH numaH anavakASatvAt ","7.1.82-2:na vA avarRopaDasya numvacanAt ","7.1.82-3:punaHprasaNgavijYAnAt vA sidDam ","7.1.82-4:yaTAttvAdizu dvirvacanam","7.1.84-1:divaH Ottve DAtupratizeDaH ","7.1.84-2:aDAtvaDikArAt sidDam iti cet napuMsake dozaH ","7.1.84-3:uktam vA","7.1.86-1:itaH advacanam anarTakam AkAraprakaraRAt ","7.1.86-2:zapUrvArTam tu","7.1.89-1:asuNi upadeSivadvacanam svarasidDyarTam bahiraNgalakzaRatvAt","7.1.90-1:gotaH sarvanAmasTAne NitkAryAtideSaH ","7.1.90-2:sarvanAmasTAne Rittvavacane hi asampratyayaH zazWyanirdeSAt ","7.1.90-3:taparakaraRam anarTakam sTAnivatpratizeDAt ","7.1.90-4:itaraTA hi sambudDijasoH pratizeDaH","96: striyAm ca SlokavArttika tfjvat striyAm viBaktO cet krozwrIBaktiH na siDyati ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-1:tfjvat iti SAstrAtideSaH cet yaTA ciRi tadvat ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-2:tatra raparavacanam ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-3:rUpAtideSaH iti cet sarvAdeSaprasaNgaH ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-4:sidDam tu rUpAtideSAt ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-5:sidDam tu pratyayagrahaRe yasmAt saH tadAditadantavijYAnAt ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-6:AntaratamyAt ca sidDam ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-7:tfjvadvacanam anarTakam tfjvizaye tfcaH mfgavAcitvAt ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-8:tunaH nivfttyarTam iti cet sidDam yaTA anyatra api ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-9:vAvacanAnarTakyam ca svaBAvasidDatvAt ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-10:guRavfdDyOttvatfjvadBAveByaH num pUrvavipratizidDam ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-11:numaciratfjvadBAveByaH nuw ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-12:na vA nuqvizaye rapratizeDAt ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-13:itaraTA hi sarvApavAdaH ","[na ca aparam nimittam saYjYA ca pratyayalakzaRena ] ","-14:tasmAt nuqvizaye rapratizeDaH","7.1.98-1:Am anaquhaH striyAm vA","7.2.1-1:sici vfdDO okArapratizeDaH ","7.2.1-2:okArAt vfdDiH vipratizeDena iti cet ottvABAvaH ","7.2.1-3:punaHprasaNgavijYAnAt vA sidDam yaTA prasAraRAdizu dvirvacanam ","7.2.1-4:sOQAmitrO bahiraNgalakzaRatvAsidDam","7.2.3-1:halgrahaRam iwi pratizeDArTam ","7.2.3-2:na vA anantarasya pratizeDAt ","7.2.3-3:tat ca anantyArTam ","7.2.3-4:antyasya vacanAnarTakyAt ","7.2.3-5:ataH viBAzArTam iti cet sidDam vfdDeH lopabalIyastvAt ekAcaH tO vali iti vA","7.2.8-1:na iw varam anAdO kfti","7.2.9-1:titutrezu agrahAdInAm","7.2.10-1:ekAjgrahaRam jAgartyarTam ","7.2.10-2:vaDaH iwpratizeDaH sannipAte ekActvAt prakfteH ca anudAttatvAt ","7.2.10-3:ekAcaH upadeSe anudAttAt iti upadeSavacanam anudAttaviSezaRam cet kfYAdiByaH liwi niyamAnupapattiH aprAptatvAt pratizeDasya ","7.2.10-4:tatra pacAdiByaH iqvacanam ","7.2.10-5:sanaH ca iwpratizeDaH ","7.2.10-6:uBayaviSezaRatvAt sidDam ","7.2.10-7:yaNlope ca tadantadvirvacanAt","7.2.13-1:kfYaH asuwaH","7.2.14-1:SvigrahaRam idantatvAt upadeSasya","7.2.15-1:yasya viBAzA avideH","7.2.18-1:kzubDam manTABiDAne ","7.2.18-2:svAntam mano'BiDAne","7.2.18-3:DvAntam tamo'BiDAne ]","7.2.18-4:lagnam saktABiDAne ","7.2.18-5:mlizwAm avispazwABiDAne ","7.2.18-6:viribDam svarABiDAne ","7.2.18-7:PARwam anAyAsABiDAne ","7.2.18-8:bAQam BfSABiDAne ]","7.2.20-1:dfQanipAtanam nakArahakAralopArTam parasya ca qatvArTam ","7.2.20-2:aniqvacane hi raBAvAprasidDiH alaGutvAt ","7.2.20-3:nalopavacanam ca","7.2.21-1:parivfQanipAtanam ca","7.2.26-1:vfttanipAtane RigrahaRam aRyantasya avaDAraRapratizeDArTam ","7.2.26-2:nipAtanam RilpeqguRapratizeDArTam","7.2.27-1:dAntaSAntayoH upaDAdIrGatvam ca ","7.2.27-2:spazwacCannayoH upaDAhrasvatvam ca","7.2.28-1:GuzisvanoH vAvacanam iwpratizeDAt vipratizeDena","7.2.36-1:snukramoH anAtmanepadanimitte cet kfti upasaNKyAnam ","7.2.36-2:AtmanepadaparapratizeDe tatparaparasIyuqekAdeSezu pratizeDaH ","7.2.36-3:sidDam tu snoH Atmanepadena samAnapadasTasya iwpratizeDAt ","7.2.36-4:kramoH ca ","7.2.36-5:kartari ca AtmanepadavizayAt kfti","7.2.37-1:graheH dIrGatve iqgrahaRam ","7.2.37-2:agrahaRe hi asampratyayaH zazWyaBAvAt ","7.2.37-3:ciRvadiwaH pratizeDaH ","7.2.37-4:yaNlope ca ","7.2.37-5:iw dIrGaH iti cet vipratizidDam ","7.2.37-6:pratizidDasya ca punarviDAne dIrGatvABAvaH ","7.2.37-7:yaNlope ca uktam","7.2.44-1:punaH vAvacanam kriyate liNsicoH nivfttyarTam ","7.2.44-2:svaratiH udAttaH ","7.2.44-3:vAvacanam nivfttyarTam ","7.2.44-4:anudAtte hi kiti vAprasaNgaH pratiziDya punaH viDAnAt","7.2.47-1:iqgrahaRam nityArTam","7.2.48-1:izeH takAre SyanpratyayAt pratizeDaH","7.2.52-1:punaH iqgrahaRam nityArTam","7.2.58-1:gameH iw parasmEpadezu cet kfti upasaNKyAnam ","7.2.58-2:AtmanepadaparapratizeDe uktam ","7.2.58-3:sidDam tu gameH Atmanepadena samAnapadasTasya iwpratizeDAt","7.2.59-1:vftAdipratizeDe ca ","7.2.59-2:Atmanepadapare iqvacane tatparaparasIyuqekAdeSezu iqvacanam ","7.2.59-3:sidDam tu vftAdInAm Atmanepadena samAnapadasTasya iqvacanAt ","7.2.59-4:catustAsikxpigrahaRAnarTakyam ca ","7.2.59-5:nivfttatvAt sakArasya","7.2.62-1:tAsO atvatpratizeDe GaseH pratizeDaprasaNgaH akAravattvAt ","7.2.62-2:sidDam tu halAdigrahaRAt ","7.2.62-3:tasya ca aBAvAt tAsO","7.2.63-1:ftaH BAradvAjasya iti niyamAnupapattiH aprAptatvAt pratizeDasya ","7.2.63-2:tatra pacAdiByaH iqvacanam ","7.2.63-3:yogaviBAgAt sidDam","7.2.67-1:vasvekAjAdGasAMvacanam niyamArTam ","7.2.67-2:GasigrahaRam anackatvAt","7.2.70-1:svarateH vewtvAt ftaH sye vipratizeDena","7.2.82-1:muki svare dozaH ","7.2.82-2:aBakte ca ","7.2.82-3:parAdO dIrGaprasaNgaH","7.2.84-2:sidDam anaRtvAt ","7.2.84-3:uccAraRasAmarTyAt vA","7.2.98-1:tricaturyuzmadasmadgrahaRezu arTagrahaRam SabdaviSezaRam","7.2.99-1:tisfBAve saYjYAyAm kani upasaNKyAnam ","7.2.99-2:catasari AdyudAttanipAtanam ca ","7.2.99-3:upadeSivadvacanam ca ","7.2.99-4:svarasidDyarTam ","7.2.99-5:uktam vA","7.2.100-:","aci raH ftaH -:","aci raH ftaH -1:aci rAdeSe jasi upasaNKyAnam guRaparatvAt ","aci raH ftaH -2:na vA anavakASatvAt rasya","7.2.102-1:tyadAdInAm dviparyantAnAm akAravacanam SlokavArttika tyadAdInAm akAreRa sidDatvAt yuzmadasmadoH ","7.2.102-2:api vA upasamastArTam atvABAvAt kftam Bavet ","7.2.102-3:aTa vA SezasaptamyA Seze lopaH viDIyate ","7.2.107-1:adasaH soH Bavet Otvam kim sulopaH viDIyate ","7.2.107-2:ApaH ettvam Bavet tasmin na Jali iti anuvartanAt ","7.2.107-1:sO OtvapratizeDaH sAkackAt vA sAt utvam ca ","7.2.107-2:uttarapadaBUtAnAm AdeSe upadeSavadvacanam ","7.2.107-3:anAdizwArTam ","7.2.107-4:bahiraNgalakzaRatvAt SlokavArttika adasaH soH Bavet Otvam kim sulopaH viDIyate ","7.2.114-1:mfjeH vfdDiviDO kvipratizeDaH ","7.2.114-2:DAtoH svarUpagrahaRe vA tatpratyayavijYAnAt sidDam ","7.2.114-3:prayojanam sfjidfSimasjinaSihantigiratyarTam","7.2.115-1:vfdDO ajgrahaRam go'rTam ","7.2.115-2:yogaviBAgaH saKivyaYjanAdyarTaH","7.2.117-1:tadDitezu acAm AdivfdDO antyopaDalakzaRapratizeDaH ","7.2.117-2:lokavijYAnAt sidDam ","7.2.117-3:puzkarasadgrahaRAt vA","7.3.1-1:devikAdizu tadAdigrahaRam ","7.3.1-2:anyatra tadgrahaRAt tadantagrahaRAt vA ","7.3.1-3:AdyajviSezaRatvAt sidDam ","7.3.1-4:AntaratamyanivartakatvAt vA ","7.3.1-5:nyagroDe ca kevalagrahaRAt ","7.3.1-6:vahInarasya idvacanam","7.3.3-1:ecoH vizayArTam pratizeDasanniyuktavacanam SlokavArttika yatra yvAByAm parAvfdDiH tatra aDyaSveH yaTA na tO ","7.3.3-2:SakalAyAvAdeSezu ca uktam SlokavArttika ","7.3.3-1:yvAByAm parasya avfdDitvam apavAdO vfdDeH hi tO ","7.3.3-2:yatra yvAByAm parAvfdDiH tatra aDyaSveH yaTA na tO ","7.3.3-3:yatra vfdDiH acAm AdeH tatra EcO atra GoH hi sA ","7.3.8-1:pratizeDe SvAdigrahaRam jYApakam anyatra SvangrahaRe tadAdigrahaRasya SOvahAnAdyarTam ","7.3.8-2:ikArAdigrahaRam ca SvAgaRikAdyarTam ","7.3.8-3:tadantasya ca anyatra pratizeDaH","7.3.10-1:tadDitezu acAm AdivfdDeH uttarapadavfdDiH vipratizeDena dvyASItikAdyarTam","7.3.15-1:saMvatsaragrahaRam anarTakam parimARAntasya iti kftatvAt ","7.3.15-2:jYApakam tu kAlaparimARAnAm vfdDipratizeDasya","7.3.32-1:hanteH takAre tadDite pratizeDaH ","7.3.32-2:uktam vA","7.3.37-1:RicprakaraRe DUYprIYoH nugvacanam ","7.3.37-2:pAteH lugvacanam","7.3.44-1:ittve kagrahaRam saNGAtagrahaRam cet etikAsu aprAptiH ","7.3.44-2:varRagrahaRam cet vyavahitatvAt aprasidDiH ","7.3.44-3:vacanaprAmARyAt iti cet raTakawyAdizu atiprasaNgaH ","7.3.44-4:mamakanarakayoH upasaNKyAnam apratyayasTatvAt ","7.3.44-5:tyaktyapoH ca pratizidDatvAt","7.3.45-1:pratizeDe tyakanaH upasaNKyAnam ","7.3.45-2:pAvakAdInAm Candasi upasaNKyAnam ","7.3.45-3:ASizi ca ","7.3.45-4:uttarapadalope ca ","7.3.45-5:kzipakAdInAm ca ","7.3.45-6:tArakA jyotizi ","7.3.45-7:varRakA tAnave ","7.3.45-8:vartakA SakunO prAcAm ","7.3.45-9:azwakA pitfdevatye ","7.3.45-10:vA sUtakAputrakAvfndArakARAm","7.3.46-1:yakapUrve DAtvantapratizeDaH","7.3.47-1:BastrAgrahaRam upasarjanArTam ","7.3.47-2:naYpUrvagrahaRAnarTakyam ca uttarapadamAtrasya idvacanAt","7.3.50-1:WAdeSe varRagrahaRam cet DAtvantasya pratizeDaH ","7.3.50-2:saNGAtagrahaRam cet aRAdimATitikAdInAm pratizeDaH ","7.3.50-3:tasmAt viSizwagrahaRam","7.3.54-1:hanteH tatparasya iti cet nakAre aprasidDiH ","7.3.54-2:hakArasya iti cet YRiti aprAptiH ","7.3.54-3:sTAnivadBAvAt ca acaH nakAre aprasidDiH ","7.3.54-4:vacanaprAmARyAt iti cet alope pratizeDaH ","7.3.54-5:sidDam tu upaDAlope iti vacanAt","7.3.55-1:aByAsAt kutvam asupaH","7.3.56-1:heH caNi pratizeDAnarTakyam aNgAnyatvAt ","7.3.56-2:jYApakam tu anytra RyaDikasya kutvavijYAnArTam","7.3.57-1:jigrahaRe jyaH pratizeDaH","7.3.59-1:kvAdyajivrajiyAcirucInAm apratizeDaH nizWAyAm aniwaH kutvavacanAt ","7.3.59-2:SucyubjyoH GaYi kutvam ","7.3.59-3:arceH kaviDAnAt sidDam","7.3.61-1:BujaH pARO ","7.3.61-2:nyubjeH kartftvAt apratizeDaH","7.3.66-1:pravacigrahaRam anarTakam vacaH aSabdasaYjYABAvAt ","7.3.66-2:upasargapUrvaniyamArTam iti cet avivAkyasya viSezavacanat sidDam ","7.3.66-3:RyapratizeDe tyajeH upasaNKyAnam","7.3.69-1:Bojyam aByavahArhye ]","7.3.71-1:otaH Siti ] ","7.3.71-2:uttaratra SidgrahaRABAvAya","7.3.75-1:dIrGatvam ANi camaH","7.3.77-1:izeH Catvam ahali","7.3.78-1:pibeH guRapratizeDaH ","7.3.78-2:adante iti cet uktam","7.3.83-1:jusi guRe yAsuwpratizeDaH","7.3.85-1:ciRRaloH pratizeDasAmarTyAt anyatra guRaBUtasya vfdDipratizeDaH ","7.3.85-2:prasajyapratizeDe jusiguRapratizeDaprasaNgaH ","7.3.85-3:uttame ca Rali ","7.3.85-4:na vA anantarasya pratizeDAt ","7.3.85-5:jusi pUrveRa guRaviDAnam ","7.3.85-6:Rali ca ","7.3.85-7:ataH anyatra viDAne vO aguRatvam ","7.3.85-8:na vA paryudAsasAmarTyAt ","7.3.85-9:vasvarTam iti cet na sArvaDAtukatvAt sidDam","7.3.87-1:aByastAnAm upaDAhrasvatvam aci paspaSAte ","7.3.87-2:bahulam Candasi Anuzak ","7.3.88-1:BUsuvoH pratizeDe ekAjgrahaRam boBavItyarTam","7.3.92-1:tfRahigrahaRam SnamimoH vyavasTArTam ","7.3.92-2:tfhigrahaRe hi imvizaye SnamaBAvaH anavakASatvAt","7.3.95-1:punaH sArvaDAtukagrahaRam apidarTam","7.3.103-1:ataH dIrGAt bahuvacane ettvam vipratizeDena","7.3.107-2:talhrasvatvam vA NisambudDayoH ] ambArTam dvyakzaram yadi","7.3.107-4:mAtFRAm mAtac putrArTam arhate ]","7.3.109-1:jasAdizu Candasi vAvacanam prAk RO caNi upaDAyAH ","7.3.109-2:ambe","7.3.111-1:GeH Niti guRaviDAne NIsArvaDAtuke pratizeDaH ","7.3.111-2:subaDikArAt sidDam","7.3.113-1:yAqviDAne atiKawvAya iti apratizeDaH hrasvAdeSatvAt","7.3.116-1:idudByAm AmviDAnam Ottvasya paratvAt ","7.3.116-2:yogaviBAgAt sidDam","7.3.118- 119-1:Ottve yogaviBAgaH ","7.3.118- 119-2:saKipatiByAm OttvArTaH ","7.3.118- 119-3:ekayoge hi aprAptiH attvasanniyogAt ","7.3.118- 119-4:na vA akArasya anvAcayavacanAt yaTA kyaNi salopaH ","7.3.118- 119-5:attve wAppratizeDaH ","7.3.118- 119-6:na vA sannipAtalakzaRasya animittatvAt ","7.3.118- 119-7:qitkaraRAt vA","7.4.1-1:RO caNi upaDAgrahaRam antyapratizeDArTam ","7.4.1-2:upaDAhrasvatve ReH Rici upasaNKyAnAt","7.4.2-1:aglopipratizeDAnarTakyam ca sTAnivadBAvAt","7.4.9-1:digyAdeSasya paratvAt sAByAsasya AdeSavacanam","7.4.10-1:saMyogAdeH guRaviDAne saMyogopaDagrahaRam kfYarTam ","7.4.10-2:ftaH liwi guRAt YRiti vfdDiH vipratizeDena ","7.4.10-3:punaHprasaNgavijYAnAt vA sidDam","7.4.12-1:ftaH hrasvatvam ittvapratizeDArTam","7.4.24-1:eteH liNi upasargAt","7.4.30-1:yaNprakaraRe hanteH hiMsAyAm Iw","7.4.35-1:Candasi pratizeDe dIrGapratizeDaH ","7.4.35-2:na vA aSvAGasya Advacanam avaDAraRArTam","7.4.41-1:SyateH ittvam vrate nityam SlokavArttika devatrAtaH galaH grAhaH itiyoge ca sadviDiH ","7.4.47-1:acaH upasargAt tatve AkAragrahaRam ","7.4.47-2:AdeH hi parasya ","7.4.47-3:avarRaprakaraRAt sidDam ","7.4.47-4:dyateH ittvAt acaH taH","7.4.48-1:apaH Bi mAsaH Candasi SlokavArttika svavassvatavasoH mAsaH uzasaH ca taH izyate","7.4.54-1:istvam sani rADaH hiMsAyAm","7.4.55-1:jYapeH Ittvam anantyasya","7.4.58-1:aByAsasya anaci","7.4.60-1:halAdiSeze zazWIsamAsaH iti cet ajAdizu SezaprasaNgaH ","7.4.60-2:karmaDArayaH iti cet AdiSezanimittatvAt lopasya tadaBAve lopavacanam ","7.4.60-3:tasmAt anAdilopaH ","7.4.60-4:uktam vA","7.4.61-1:SarpUrvaSeze KarpUrvagrahaRam ","7.4.61-2:AdiSezaprasaNgaH tu ","7.4.61-3:SarpUrvavacanam kimarTam iti cet KayAm lopapratizeDArTam ","7.4.61-4:vyapakarzavijYAnAt sidDam","7.4.67-1:svApigrahaRam vyapetArTam ","7.4.67-2:tatra kyajante atiprasaNgaH ","7.4.67-3:sidDam tu RigrahaRAt","7.4.75-1:trigrahaRAnarTakyam gaRAntatvAt ","7.4.75-2:uttarArTam tu","7.4.82-1:EcoH yaNi dIrGaprasaNgaH hrasvAt hi param dIrGatvam ","7.4.82-2:na vA aByAsavikArezu apavAdasya utsargAbADakatvAt ","7.4.82-3:prayojanam sanvadBAvasya dIrGatvam ","7.4.82-4:mAnpraBftInAm dIrGatvam ittvasya ","7.4.82-5:gaReH Itvam halAdiSezasya","7.4.83-1:akidvacanam anyatra kidantasya alaH antyanivfttyarTam ","7.4.83-2:prayojanam hrasvatvAttvettvaguRezu ","7.4.83-3:vipratizeDAt sidDam ","7.4.83-4:tadantAgrahaRAt vA","7.4.85-1:nuki yaMyamyate ","7.4.85-2:anusvArAgamavacanAt sidDam ","7.4.85-3:padAntavat ca","7.4.90-1:rIk ftvataH saMyogArTam","7.4.91-1:marmfjyate ","7.4.93-1:sanvadBAvadIrGatve ReH Rici upasaNKyAnam ","7.4.93-2:mImAdInAm tu lopaprasaNgaH ","7.4.93-3:sidDam tu rUpAtideSAt ","7.4.93-4:aNgAnyatvAt vA sidDam","8.1.1-1:sarvavacanam alaH antyanivfttyarTam ","8.1.1-2:zazWInirdeSArTam ca ","8.1.1-3:anirdeSe hi zazWyarTAprasidDiH ","8.1.1-4:na vA padADikArAt ","8.1.1-5:tat ca samAsatadDitavAkyanivfttyarTam ","8.1.1-6:sagatigrahaRam ca","8.1.4-1:anavayavABiDAnam vIpsArTaH iti cet jAtyAKyAyAm dvirvacanaprasaNgaH ","8.1.4-2:na vA ekArTatvAt jAteH ","8.1.4-3:anekArTASrayatvAt ca vIpsAyAH ","8.1.4-4:nivartakatvAt vA ","8.1.4-5:sarvapadasagatigrahaRAnarTakyam ca arTABiDAne dvirvacanaviDAnAt ","8.1.4-6:vIpsAyAm sarvABiDAne vacanAprasidDiH ","8.1.4-7:ekABiDAne asarvadravyagatiH ","8.1.4-8:na vA padArTatvAt","8.1.5-1:pareH asamAse ","8.1.5-2:pareH varjane vAvacanam","8.1.8-1:asUyAkutsanayoH kopaBartsanayoH ca ekArTatvAt pfTaktvanirdeSAnarTakyam","8.1.9-1:ekasya dvirvacanasaMbanDena iti cet arTanirdeSaH ","8.1.9-2:na vA vIpsADikArAt ","8.1.9-3:bahuvrIhivattve prayojanam sublopapuMvadBAvO ","8.1.9-4:sarvanAmasvarasamAsAntezu dozaH","8.1.11-1:karmaDArayavattve prayojanam sublopapuMvadBAvAntodAttatvAni","8.1.12-1:prakAre sarvezAm guRavacanatvAt sarvaprasaNgaH ","8.1.12-2:sidDam tu prakftyarTaviSezaRatvAt ","8.1.12-3:[AnupUrvye] ","8.1.12-4:svArTe avaDAryamARe anekasmin ","8.1.12-5:[cApale] ","8.1.12-6:kriyAsamaBihAre ","8.1.12-7:[ABIkzRye] ","8.1.12-8:qAci ca ","8.1.12-9:pUrvapraTamayoH arTAtiSayavivakzAyAm ","8.1.12-10:qataraqatamayoH samasaMpraDAraRAyAm strInigade BAve ","8.1.12-11:karmavyatihAre sarvanAmnaH samAsavat ca bahulam yadA na samAsavat praTamEkavacanam tadA pUrvapadasya ","8.1.12-12:strInapuMsakayoH uttarapadasya vA amBAvaH","8.1.15-1:atyantasahacarite lokavijYAte dvandvam iti upasaMKyAnam ","8.1.15-2:dvandvam iti pUrvapadasya ca amBAvaH uttarapadasya ca atvam napuMsakatvam ca ","8.1.15-3:uktam vA","8.1.16- 17-1:padADikAraH prAk apadAntADikArAt ","8.1.16- 17-2:padAt prAk supi kutsanAt ","8.1.16- 17-3:yaRekAdeSasvaraH tu UrDvam padADikArAt ","8.1.16- 17-4:iha vacane hi apadAntasya aprAptiH ","8.1.16- 17-5:na vA padADikArasya viSezaRatvAt ","8.1.16- 17-6:antagrahaRAt vA nalope","8.1.18-1:sarvavacanam anAdeH anudAttArTam iti cet luwi pratizeDAt sidDam ","8.1.18-2:alo'ntyaviDiprasaNgaH tu ","8.1.18-3:lfwi pratizeDAt sidDam ","8.1.18-4:uktam vA ","8.1.18-5:samAnavAkye niGAtayuzmadasmadAdeSAH ","8.1.18-6:paSyArTEH ca pratizeDaH","8.1.26-1:yuzmadasmadoH anyatarasyAm ananvAdeSe","8.1.27-1:tiNaH gotrAdizu kutsanABIkzRyagrahaRam pAWaviSezaRam ","8.1.27-2:anudAttaviSezaRe hi anyatra gotrAdigrahaRe kutsanABIkzRyagrahaRam ","8.1.27-3:anudAttagrahaRam vA","8.1.28-1:atiNvacanam anarTakam samAnavAkyADikArAt","8.1.30-1:caR RidviSizwaH cedarTe","8.1.51-1:lfwaH prakftiBAve kartuH anyatve upasaMKyAnam kArakAnyatvAt ","8.1.51-2:kartfsAmAnyAt sidDam iti cet tadBede anyasAmAnye prakftiBAvaprasaNgaH ","8.1.51-3:na cet kartA sarvAnyaH iti cet anyABiDAne pratizeDam eke ","8.1.51-4:sidDam tu tiNoH ekadravyABiDAnAt","8.1.55-1:AmaH ekAntare EkaSrutyapratizeDaH ","8.1.55-2:niGAtaprasaNgaH tu ","8.1.55-3:sidDam tu pratizeDADikAre pratizeDavacanAt","8.1.56-1:yadDituparasya Candasi aniGAtaH anyaparapratizeDArTaH","8.1.57-1:Amreqitezu agateH sagatiH api tiN iti atra gatigrahaRe upasargagrahaNam","8.1.66-1:vA yATAkAmye","8.1.67-1:pUjitasya anudAttatve kAzWAdigrahaRam ","8.1.67-2:malopavacanam ca","8.1.68-1:sagatigrahaRam apadatvAt ","8.1.68-2:uttarArTam ca ","8.1.68-3:tiNniGAtAt pUjanAt pUjitam anudAttam vipratizeDena","8.1.70-1:gateH anudAttatve gatigrahaRAnarTakyam tiNi avaDAraRAt ","8.1.70-2:CandaH arTam iti cet na agatitvAt Sloka: gatinA tu viSizwasya gatiH eva viSezakaH sADane kena te na syAt bAhyam AByantaraH hi saH","8.1.71-1:tiNgrahaRam udAttavataH parimARArTam ","8.1.71-2:yadyogAt gatiH iti cet pratyayodAttatve aprasidDiH","8.1.72-1:pUrvam prati vidyamAnavattvAt uttaratra AnantaryAprasidDiH ","8.1.72-2:sidDam tu padapUrvasya iti vacanAt ","8.1.72-3:avidyamAnavattve prayojanam AmantritayuzmadasmattiNniGAtAH ","8.1.72-4:pUjAyAm anantarapratizeDaH ","8.1.72-5:jAtu apUrvam ","8.1.72-6:Aho utAho ca anantaraviDO ","8.1.72-7:AmaH ekAntaraviDO","8.2.1-1:pUrvatrAsidDe na asti vipratizeDaH aBAvAt uttarasya ","8.2.1-2:apavAdaH vacanaprAmARyAt ","8.2.1-3:pUrvatra asidDam aDikAraH ","8.2.1-4:parasya parasya pUrvatra pUrvatra asidDavijYAnArTam ","8.2.1-5:anaDikAre hi samudAye asidDavijYAnam ","8.2.1-6:tatra ayaTezwaprasaNgaH ","8.2.1-7:tasmAt aDikAraH ","8.2.1-8:asidDavacane uktam","8.2.2-:",": nalopaH supsvarasaMjYAtugviDizu -:",": nalopaH supsvarasaMjYAtugviDizu -1:saMjYAgrahaRAnarTakyam ca tannimittatvAt lopasya ",": nalopaH supsvarasaMjYAtugviDizu -2:svare avaDAraRAt ca ",": nalopaH supsvarasaMjYAtugviDizu -3:tugviDO ca uktam","8.2.3-1:na mu wAdeSe","8.2.4-1:yaRsvaraH yaRAdeSe svaritayaRaH svaritArTam ","8.2.4-2:ASrayAt sidDatvam iti cet udAttAt svarite dozaH","8.2.6-1:ekAdeSasvaraH antaraNgaH ","8.2.6-2:ayavAyAvekAdeSaSatfsvarEkAnanudAttasarvAnudAttArTam ","8.2.6-3:saMyogAntalopaH roH uttve harivaH medinam tvA ","8.2.6-4:plutiH ca ","8.2.6-5:sijlopaH ekAdeSe ","8.2.6-6:saMyogAdilopaH saMyogAntalope ","8.2.6-7:nizWAdeSaH zatvasvarapratyayeqviDizu ","8.2.6-8:vasvAdizu datvam sO dIrGatve ","8.2.6-9:adasaH Itvotve svare bahizpadalakzaRe ","8.2.6-10:pragfhyasaMjYAyAm ca ","8.2.6-11:plutiH tugviDO Ce ","8.2.6-12:Scutvam Duwtve ","8.2.6-13:aByAsajaStvacartvam ettvatukoH ","8.2.6-14:dvirvacane parasavarRatvam ","8.2.6-15:padADikAraH cet latvaGatvanatvarutvazatvaRatvAnunAsikaCatvAni","8.2.7-1:nalope antagrahaRam padADikArasya viSezaRatvAt ","8.2.7-2:ahnaH nalopapratizeDaH ","8.2.7-3:ahangrahaRAt iti cet saMbudDyarTam vacanam","8.2.8-1:na NisaMbudDyoH anuttarapade ","8.2.8-2:vA napuMsakAnAm ","8.2.8-3:BatvAt tu NO pratizeDAnarTakyam","8.2-1:anantyayoH api nizWAmatupoH AdeSaH ","8.2-2:nArmate pratizeDaH ","8.2-3:uktam vA","8.2.16-1:anaH nuki vinAmaruviDipratizeDaH ","8.2.16-2:parAdO vatvapratizeDaH avagrahaH ca ","8.2.16-3:BatvAt sidDam ","8.2.16-4:anaH tu prakftiBAve matubgrahaRam Candasi ","8.2.16-5:GagrahaRam ca","8.2.17-1:It raTinaH ","8.2.17-2:BUridAvnaH tuw","8.2.18-1:[kfpaRAdInAm pratizeDaH] ","8.2.18-2:[vAlamUlalaGvalamaNgulInAm vA laH ram Apadyate] ","8.2.18-3:[saMjYAcCandasoH vA kapilakAdInAm]","8.2.19-1:rePasya ayatO iti cet pareH upasaMKyAnam ","8.2.19-2:upasargasya iti cet ekAdeSe aprasidDiH","8.2.21-1:girateH latve RO uktam","8.2.22-1:saNi latvasalopasaMyogAdilopakutvadIrGatvAni ","8.2.22-2:prayojanam girO giraH payaH DAvati dvizwarAm dfzatsTAnam kAzWaSaksTAtA kruYcA DuryaH iti","8.2.23-1:saMyogAntasya lope yaRaH pratizeDaH ","8.2.23-2:na vA JalaH lopAt ","8.2.23-3:bahiraNgalakzaRatvAt vA ","8.2.23-4:saMyogAntalope sagrahaRam ","8.2.23-5:ruviDAnasya anavakASatvAt ","8.2.23-6:yogaviBAgAt sidDam","8.2.25-1:sarvatra evam prasidDam syAt SrutiH ca api na Bidyate luNaH ca api na mUrDanye grahaRam sewi duzyati ","8.2.25-2:GasiBasyoH na siDyet tu tasmAt sijgrahaRam na tat CAndasaH varRalopaH vA yaTA izkartAram aDvare ","8.2.32-1:hfgrahoH BaH Candasi hasya","8.2.38-1:daDaH taToH anukarzaRAnarTakyam sTAnivatpratizeDAt ","8.2.38-2:itaraTA hi alope pratizeDaH","8.2.42-1:nizWAdeSe pUrvagrahaRam parasya AdeSapratizeDArTam ","8.2.42-2:paYcamInirdizwAt hi parasya ","8.2.42-3:vfdDinimittAt pratizeDaH ","8.2.42-4:prayojanam kArtikzEtiPOllayaH ","8.2.42-5:na vA bahiraNgalakzaRatvAt","8.2.44-1:fkAralvAdiByaH ktin nizWAvat ","8.2.44-2:dugvoH dIrGaH ca ","8.2.44-3:pUYaH vinASe ","8.2.44-4:sinoteH grAsakarmakartfkasya","8.2.48-1:aYceH natve vyaktapratizeDaH ","8.2.48-2:aYjivijYAnAt sidDam ","8.2.48-3:aYcatyarTaH iti cet aYjeH tadarTatvAt sidDam","8.2.50-1:avAtABiDAne","8.2.55-1:PaleH latve utpUrvasya upasaMKyAnam","Sloka: vetteH tu viditaH nizWA vidyateH vinnaH izyate vintteH vinnaH ca vittaH ca vittaH Bogezu vindateH","8.2.68-1:ruviDO ahnaH rUparAtriraTaMtarezu upasaMKyAnam","8.2.69-1:asupi rAdeSe upasarjanasamAse pratizeDaH aluki ","8.2.69-2:sidDam tu supi pratizeDAt ","8.2.69-3:luki ca uktam","8.2.70-1:Candasi BAzAyAm ca pracetasaH rAjani upasaMKyAnam ","8.2.70-2:[aharAdInAm patyAdizu upasaMKyAnam]","8.2.72-1:anaquhaH datve nakArapratizeDaH ","8.2.72-2:sidDam tu pratipadaviDAnAt numaH","8.2.78-1:upaDAdIrGatve aByAsajivricaturRAm pratizeDaH ","8.2.78-2:uRAdipratizeDaH ca","8.2.80-1:adasaH anosreH Sloka: adasaH adreH pfTak mutvam kecit icCanti latvavat kecit antyasadeSasya na iti eke aseH hi dfSyate ","8.2.80-2:tatra padADikArAt apadAntasya aprAptiH ","8.2.80-3:sidDam tu sakArapratizeDAt ","8.2.80-4:dAdgrahaRam antyapratizeDArTam","8.2.81-1:Ittvam bahuvacanAntasya","8.2.82-1:vAkyADikAraH padanivfttyarTaH ","8.2.82-2:wigrahaRam alo'ntyaniyame vyaYjanAntArTam ","8.2.82-3:sarvAdeSaprasaNgaH tu ","8.2.82-4:uktam vA","8.2.83-1:[aSUdrastryasUyakezu] ","8.2.83-2:BorAjanyaviSAm vA","8.2.85-1:hEheprayoge hEhegrahaRam hEhayoH plutyarTam ","8.2.85-2:prayogagrahaRam arTavadgrahaRe anarTakArTam ","8.2.85-3:punaH hEhegrahaRam anantyArTam","8.2.86-1:guroH plutaviDAne laGoH antyasya plutaprasaNgaH anyena vihitatvAt ","8.2.86-2:na vA anantyasya api iti vacanam uBayanirdeSArTam ","8.2.86-3:prAgvacanam viBAzArTam ","8.2.86-4:prAgvacanAnarTakyam ca ekEkasya iti vacanAt","8.2.88-1:ye yajYakarmaRi iti atiprasaNgaH ","8.2.88-2:sidDam tu ye yajAmahe iti brUhyAdizu upasaMKyAnAt","8.2.89-1:wigrahaRam sarvAdeSArTam","8.2.92-1:agnItprezaRe iti atiprasaNgaH ","8.2.92-2:sidDam tu oSrAvaye parasya ca iti vacanAt","8.2.95-1:Bartsane paryAyeRa","8.2.103-1:asUyAdizu vAvacanam","8.2.106-1:EcoH uBayavivfdDiprasaNgAt idutoH plutavacanam ","8.2.106-2:tatra ayaTezwaprasaNgaH ","8.2.106-3:sidDam tu idutoH dIrGavacanAt","8.2.107-1:ecaH plutavikAre padAntagrahaRam ","8.2.107-2:vizayaparigaRanam ca ","8.2.107-3:Amantrite Candasi upasaMKyAnam","8.2.108-1:ik tu yadA Bavati plutapUrvaH tasya yaRam vidaDAti apavAdam tena tayoH ca na SAkaladIrGO yaRsvarabADanam eva tu hetuH ","8.3.1-1:matuvasoH rAdeSe vanaH upasaMKyAnam ","8.3.1-2:viBAzA BavadBagavadaGavatAm ot ca avasya","8.3.5-1:saMpuMkAnAm satvam ","8.3.5-2:ruviDO hi anizwaprasaNgaH","8.3.13-1:Qalope apadAntagrahaRam ","8.3.13-2:jaSBAvAt iti cet uttaratra Qasya aBAvAt apavAdaprasaNgaH ","8.3.13-3:tasmAt sidDavacanam ","8.3.13-4:saNgrahaRam vA","8.3.15-1:visarjanIyaH anuttarapade ","8.3.15-2:na vA bahiraNgalakzaRatvAt","8.3.17-1:aSgrahaRam anarTakam anyatra aBAvAt","8.3.20-1:okArAt lopavacanam nityArTam","8.3.26-1:yavalapare yavalAH vA","8.3.29- 31-1:DugAdizu zwutvaRatvapratizeDaH ","8.3.29- 31-2:parAdO CatvazatvaviDipratizeDaH","8.3.32-1:Namuwi padAdigrahaRam","8.3.36-1:vASarprakaraRe Karpare lopaH","8.3.37-1:sasya kupvoH visarjanIyajihvAmUlIyopaDmAnIyAH ","8.3.37-2:visarjanIyAdeSe hi SarparayoH eva AdeSaprasaNgaH","8.3.38-1:saH apadAdO anavyayasya ","8.3.38-2:roH kAmye niyamArTam","8.3.41-1:idudupaDasya ca apratyayasya iti cet pummuhusoH pratizeDaH ","8.3.41-2:plutAnAm tAdO ca ","8.3.41-3:na vA bahiraNgalakzaRatvAt ","8.3.41-4:BrAtuzputragrahaRam jYApakam ekAdeSanimittAt zatvapratizeDasya","8.3.43-1:sidDe hi ayam viDatte caturaH zatvam yadA api krtvo'rTe lupte kftvo'rTIye rePasya visarjanIyaH hi ","8.3.43-2:evam sati tu idAnIm dviH triH catuH iti anena kim kAryam anyaH hi na idudupaDaH kftvo'rTe kaH cit api asti ","8.3.43-3:akriyamARe grahaRe visarjanIyaH tadA viSezyeta caturaH na siDyati tadA rePasya visarjanIyaH hi ","8.3.43-4:tasmin tu gfhyamARe yuktam caturaH viSezaRam Bavati prakftam padam tadantam tasya api viSezaRam nyAyyam ","8.3.45-1:EkArTye sAmarTye vAkye zatvam na me prasajyeta tasmAt iha vyapekzAm sAmarTyam sADu manyante ","8.3.45-2:aTa cet kfdantam etat tataH aDike na eva me Bavet prAptiH vAkye ca me viBAzA pratizeDaH na prakalpeta ","8.3.45-3:aTa cet saMvijYAnam nitye zatve tataH viBAzA iyam sidDam ca me samAse pratizeDArTaH tu yatnaH ayam ","8.3.56-1:sAqaH zatve samAnaSabdapratizeDaH ","8.3.56-2:arTavadgrahaRAt sidDam iti cet tadDitalope arTavattvAt pratizeDaH","8.3.57- 58-1:numvisarjanIyaSarvyavAye niMseH pratizeDaH ","8.3.57- 58-2:yogaviBAgAt sidDam","8.3.59-1:AdeSapratyayayoH zatve sarakaH pratizeDaH ","8.3.59-2:bahulavacanAt sidDam ","8.3.59-3:AdeSapratyayayoH iti avayavazazWI cet dvirvacane pratizeDaH ","8.3.59-4:samAnADikaraRAnAm ca aprAptiH ","8.3.59-5:nAnAviBaktInAm ca samAsAnupapattiH ","8.3.59-6:yogaviBAgAt sidDam ","8.3.59-7:uktam vA","8.3.64-1:sTAdizu aByAsavacanam niyamArTam ","8.3.64-2:tadvyavAye ca azopadeSArTam ","8.3.64-3:avarRArTam zaRi pratizeDArTam ca","8.3.65-1:upasargAt zatve nisaH upasaMKyAnam aniRantatvAt ","8.3.65-2:na vA varRASrayatvAt zatvasya tadviSezakaH upasargaH DAtuH ca ","8.3.65-3:sunotyAdInAm zatve Ryantasya upasaMKyAnam aDikatvAt ","8.3.65-4:na vA avayavasya ananyatvAt ","8.3.65-5:nAmaDAtoH tu pratizeDaH ","8.3.65-6:na vA anupasargatvAt","8.3.78- 79-1:iRgrahaRam Qatve kavarganivfttyarTam ","8.3.78- 79-2:tatra pratyayaparatve iwaH liwi Qatvam parAditvAt ","8.3.78- 79-3:DakAraparatve zIDvami ananantaratvAt iwaH viBAzABAvaH ","8.3.78- 79-4:iRgrahaRasya ca aviSezaRatvAt zyAdimAtre QatvaprasaNgaH","8.3.82-1:agneH dIrGAt somasya ","8.3.82-2:itaraTA hi anizwaprasaNgaH","8.3.85-1:mAtuH pituH iti sAntagrahaRAnarTakyam ekadeSavikftasya ananyatvAt","8.3.88-1:sTAdInAm niyamaH na atra prAksitAt uttaraH supiH anarTake vizuzupuH supiBUtaH dviH ucyate ","8.3.91-1:kapizWalaH gotraprakftO","8.3.97-1:[sTaH sTAsTinsTFRAm iti vaktavyam]","8.3.101-1:hrasvAt tAdO tiNi pratizeDaH","8.3.105-1:stutastomayoH Candasi anarTakam vacanam pUrvapadAt iti sidDatvAt","8.3.108-1:sanoteH anaH iti ca ","8.3.108-2:sanoteH anaH iti niyamArTam iti cet savanAdikftatvAt sidDam ","8.3.108-3:sanarTam tu","8.3.116-1:stamBusivusahAm caNi upasargAt","8.3.118-1:sadaH liwi pratizeDe svaYjeH upasaMKyAnam","8.4.1-1:razAByAm Ratve fkAragrahaRam ","8.4.1-2:ekadeSe nuqAdizu ca uktam","8.4.2-1:aqvyavAye Ratve anyavyavAye pratizeDaH ","8.4.2-2:na vA anyena vyapetatvAt ","8.4.2-3:tatsamudAye RatvAprasidDiH yaTA anyatra ","8.4.2-4:kuvyavAye hAdeSezu pratizeDaH ","8.4.2-5:prayojanam vftraGnaH sruGnaH prAGAni iti ","8.4.2-6:numvyavAye Ratve anusvArABAve pratizeDaH ","8.4.2-7:anAgame ca Ratvam ","8.4.2-8:anusvAravyavAyavacanAt tu sidDam","8.4.3-1:pUrvapadAt saMjYAyAm uttarapadagrahaRam ","8.4.3-2:tadDitapUrvapadasTApratizeDArTam ","8.4.3-3:saMjYAyAm niyamavacane gapratizeDAt niyamapratizeDaH ","8.4.3-4:tatra nityam RatvaprasaNgaH ","8.4.3-5:yogaviBAgAt sidDam ","8.4.3-6:apratizeDaH vA yaTA sarvanAmasaMjYAyAm","8.4.8-1:[vAhyAt iti vaktavyam]","8.4.10-1:vAprakaraRe girinadyAdInAm upasaMKyAnam","8.4.11-1:prAtipadikAntasya Ratve samAsAntagrahaRam asamAsAntapratizeDArTam ","8.4.11-2:liNgaviSizwagrahaRe ca uktam ","8.4.11-3:tatra yuvAdipratizeDaH","8.4.14-1:RopadeSam prati upasargABAvAt anirdeSaH ","8.4.14-2:vacanaprAmARyAt iti cet padalope pratizeDaH ","8.4.14-3:sidDam tu yam prati upasargaH tatsTasya iti vacanAt","8.4.15-1:hinumInAgrahaRe vikftasya upasaMKyAnam ","8.4.15-2:sidDam acaH sTAnivattvAt","8.4.16-1:AniloqgrahaRAnarTakyam arTavadgrahaRAt ","8.4.16-2:anupasargAt vA","8.4.17-1:neH gadAdizu aqvyavAye upasaMKyAnam","8.4.19- 20-1:aniteH antagrahaRam saMbudDyarTam","[aniteH antaH padAntasya] yaH vA tasmAt anantaraH","8.4.22-1:hanteH atpUrvasya vacane uktam","[aniteH antaH padAntasya yaH vA tasmAt anantaraH sAByAsasya dvayoH izwam BAvini api oti na izyate ]","8.4.29-1:kftsTasya Ratve nirviRRasya upasaMKyAnam","8.4.30-1:RerviBAzAyAm sADanavyavAye upasaMKyAnam ","8.4.30-2:tadviDAnAt sidDam ","8.4.30-3:aqaDikArAt vA","8.4.32-1:sanumaH Ratve avaDAraRAprasidDiH viDeyaBAvAt ","8.4.32-2:sidDam tu pratizeDADikAre sanumgrahaRAt ","8.4.32-3:kftsTasya ca Ratve ijAdeH sanumaH grahaRam","8.4.34-1:BAdizu pUYgrahaRam ","8.4.34-2:Ryantasya ca upasaMKyAnam","8.4.35-1:zAtpadAdiparavacanam","8.4.36-1:naSeH aSaH","8.4.38-1:padavyavAye atadDite","8.4.45-1:yaraH anunAsike pratyaye BAzAyAm nityavacanam","8.4.47-1:dvirvacane yaRaH mayaH ","8.4.47-2:SaraH KayaH ","8.4.47-3:avasAne ca","8.4.48-1:na Adini AkroSe putrasya iti tatpare ca ","8.4.48-2:vA hatajagDapare ca ","8.4.48-3:cayaH dvitIyAH Sari pOzkarasAdeH","8.4.61-1:udaH pUrvatve skandeH Candasi upasaMKyAnam","8.4.63-1:Catvam ami tacClokena tacCmaSruRA iti prayojanam","8.4.65-1:JaraH Jari savarRagrahaRam samasaMKyapratizeDArTam","8.4.68-1:akArasya pratyApattO dIrGapratizeDaH ","8.4.68-2:AdeSasya ca anaRtvAt na savarRagrahaRam ","8.4.68-3:sidDam tu taparanirdeSAt ","8.4.68-4:ekaSezanirdeSAt vA svaraBinnAnAm BagavataH pARineH sidDam","8.4.68-6:numvyavAye Ratve anusvArABAve pratizeDaH ","8.4.68-7:anAgame ca Ratvam ","8.4.68-8:anusvAravyavAyavacanAt tu sidDam","8.4.3-1:pUrvapadAt saMjYAyAm uttarapadagrahaRam ","8.4.3-2:tadDitapUrvapadasTApratizeDArTam ","8.4.3-3:saMjYAyAm niyamavacane gapratizeDAt niyamapratizeDaH ","8.4.3-4:tatra nityam RatvaprasaNgaH ","8.4.3-5:yogaviBAgAt sidDam ","8.4.3-6:apratizeDaH vA yaTA sarvanAmasaMjYAyAm","8.4.8-1:[vAhyAt iti vaktavyam]","8.4.10-1:vAprakaraRe girinadyAdInAm upasaMKyAnam","8.4.11-1:prAtipadikAntasya Ratve samAsAntagrahaRam asamAsAntapratizeDArTam ","8.4.11-2:liNgaviSizwagrahaRe ca uktam ","8.4.11-3:tatra yuvAdipratizeDaH","8.4.14-1:RopadeSam prati upasargABAvAt anirdeSaH ","8.4.14-2:vacanaprAmARyAt iti cet padalope pratizeDaH ","8.4.14-3:sidDam tu yam prati upasargaH tatsTasya iti vacanAt","8.4.15-1:hinumInAgrahaRe vikftasya upasaMKyAnam ","8.4.15-2:sidDam acaH sTAnivattvAt","8.4.16-1:AniloqgrahaRAnarTakyam arTavadgrahaRAt ","8.4.16-2:anupasargAt vA","8.4.17-1:neH gadAdizu aqvyavAye upasaMKyAnam","8.4.19 20: -1:aniteH antagrahaRam saMbudDyarTam","[aniteH antaH padAntasya] yaH vA tasmAt anantaraH","8.4.22-1:hanteH atpUrvasya vacane uktam","8.4.29-1:kftsTasya Ratve nirviRRasya upasaMKyAnam","8.4.30-1:RerviBAzAyAm sADanavyavAye upasaMKyAnam ","8.4.30-2:tadviDAnAt sidDam ","8.4.30-3:aqaDikArAt vA","8.4.32-1:sanumaH Ratve avaDAraRAprasidDiH viDeyaBAvAt ","8.4.32-2:sidDam tu pratizeDADikAre sanumgrahaRAt ","8.4.32-3:kftsTasya ca Ratve ijAdeH sanumaH grahaRam","8.4.34-1:BAdizu pUYgrahaRam ","8.4.34-2:Ryantasya ca upasaMKyAnam","8.4.35-1:zAtpadAdiparavacanam","8.4.36-1:naSeH aSaH","8.4.38-1:padavyavAye atadDite","8.4.45-1:yaraH anunAsike pratyaye BAzAyAm nityavacanam","8.4.47-1:dvirvacane yaRaH mayaH ","8.4.47-2:SaraH KayaH ","8.4.47-3:avasAne ca","8.4.48-1:na Adini AkroSe putrasya iti tatpare ca ","8.4.48-2:vA hatajagDapare ca ","8.4.48-3:cayaH dvitIyAH Sari pOzkarasAdeH","8.4.61-1:udaH pUrvatve skandeH Candasi upasaMKyAnam","8.4.63-1:Catvam ami tacClokena tacCmaSruRA iti prayojanam","8.4.65-1:JaraH Jari savarRagrahaRam samasaMKyapratizeDArTam","8.4.68-1:akArasya pratyApattO dIrGapratizeDaH ","8.4.68-2:AdeSasya ca anaRtvAt na savarRagrahaRam ","8.4.68-3:sidDam tu taparanirdeSAt ","8.4.68-4:ekaSezanirdeSAt vA svaraBinnAnAm BagavataH pARineH sidDam","8.4.68-1:akArasya pratyApattO dIrGapratizeDaH ","8.4.68-2:AdeSasya ca anaRtvAt na savarRagrahaRam ","8.4.68-3:sidDam tu taparanirdeSAt ","8.4.68-4:ekaSezanirdeSAt vA svaraBinnAnAm BagavataH pARineH sidDam","7.2.35-1:valAdAvArDaDAtuke vikalpa izyate","7.2.13-krAdiniyamaH:krAdiniyamAtkrAdaya eva liwi aniwaH, tato'nye sewaH");
$miscdata=array("AkusmAd:AkusmAdAtmanepadinaH","AgarvAd:AgarvAdAtmanepadinaH","uBayapadI:uBayapadI","AtmanepadI:AtmanepadI","parasmEpadI:parasmEpadI","vA 903:parANgakarmakAnna nizeDaH","bakAra:bakArasyApyayaM pratizeDaH (vA)","nuqviDO fkAra:nuqviDO fkArEkadeSo rePo haltvena gfhyate (vA)","UrRote:UrRoteSca pratizeDo vAdyaH (vA)","seTverb:sew DAtuH","aniTverb:aniw DAtuH","sambudDi:sambuddhiH","zliSa:zliSa AliNgane (gaRapAWa)","anteidita:ante idita iti kOmudIvyAKyAnAt num tu na","skoHsaM:skoH saMyogAdyorante ca iti kalope prApte katvasya asidDatvAt‌ saMyogAntalopaH . sakArasya lope 'nimittABAve nEmittikasyApyapAyaH' iti zatvamapi nivartate .","skoHc:'skoH...' iti kalopaM prati kutvasya asidDatvAt saMyogAntalopaH","karaBU:dIrGapAWe karapUrvasya uvaNeva . hrasvapAWe karapUrvasya yaReva iti vivekaH .","eranek:DAtunA saMyogasya viSezaRAdiha eranekAco ityanena sUtreRa syAdeva yaR‌","osupi:DAtunA saMyogasya viSezaRAdiha oH supi ityanena sUtreRa syAdeva yaR‌","skoni:skoH saMyogAdyorante ca iti kalope prApte katvasya asidDatvAt‌ saMyogAntalopaH . sakArasya lope 'nimittABAve nEmittikasyApyapAyaH' iti zatvamapi nivartate .","takzi:takzirakziByAM RyantAByAM kvipi tu 'skoH..' iti na pravartate . Rilopasya sTAnivadBAvAt‌ .'pUrvatrAsidDe na sTAnivat‌' (vA 443) iha nAsti . 'tasya dozaH saMyogAdilopalatvaRatvezu (vA 440) iti nizeDAt‌ .","nityabahu:nityabahuvacanAntaH SabdaH","nityadvi:nityadvivacanAntaH SabdaH","tyadsam:tyadAdeH samboDanaM nAsti","gasU1:pUrvaparAvaradakziRottarAparADarARi vyavasTAyAmasaYjYAyAm‌ (ga sU 1)","gasU2:svamajYAtiDanAKyAyAm‌ (ga sU 2)","gasU3a:'antaraM bahiryogopasaMvyAnayoH' (ga sU 3) iti gaRasUtre 'apuri' iti vaktavyam‌ (vA 240)","gasU3:antaraM bahiryogopasaMvyAnayoH' (ga sU 3)","anyatama:sarvAdigaRe anyatarasyEva gaRanA, na tu anyatamasya . tena tasya sarvanAmasaYjYA nAsti .","sama:samaH sarvaparyAyaH","tulya:tulyaparyAyastu neha gfhyate","dvandvesarva:sarvAdIni sarvanAmAni (1.1.27) taTA tadantasyApIyaM saYjYA . dvandve ca iti jYApakAt‌","apadAt:apadAdasmadyuzmadorAdeSA na","pAdAdi:pAdAditvAdasmadyuzmadorAdeSA na","DvaMs:udit DAtuH","praDI:praDISabdasya tu vfttikArAnAM mate lakzmIvadrUpam‌ . kEyawamate tu puMvadrUpam‌ .","suDI:suzWu DIryasyAH, suzWu DyAyatIti veti vigrahe tu vfttikAramate suDIH SrIvat . matAntare tu puMvat‌ .","suDI1:'suzWu DIH' iti vigrahe tu SrIvadeva","kfdakAr:bahvAdiByaSca (4.1.45), kfdakArAdaktinaH (ga 50)","sarvato:bahvAdiByaSca (4.1.45), kfdakArAdaktinaH (ga 50) taTA sarvato'ktinnarTAdityeke (ga 51)","dalivali:dalivalisKaliraRiDvanitrapikzapayaSceti BojaH (ga) iti mittvam","jvala:jvalahvalahmalanamAmanupasargAdvA (ga) iti vEkalpikamittvam","janI:janIjFzknasuraYjo'mantASca (ga) iti mittvam","nakami:na kamiamicamAm (ga)","glA:glAsnAvanuvamAM ca (ga) iti mittvam","mfga:raYjerRO mfgaramaRe nalopo vaktavyaH (vA)","sKad:sKadir avapariByAM ca (ga) iti mittvam","BAvauni:BAvavAcyakarmakartfvAcyayoH praTamapuruzEkavacanarUpameva Bavati","kamivami:anAcamikamivamAmiti vaktavyam (vA)","noyaN:asya DAtoH yaNantarUpaM nAsti","GnI:hanterhiMsAyAM GnIBAvo vAcyaH (vA)","jYA:jYA mAraRatozaRaniSAmanezu (ga)","smf:smf ADyAne mit","Dvana:Dvana Sabde mit","svana:svana avataMsane mit","cala:cala kampane mit","laqa:laqiH jihvonmaTane mit","yama: yamo'parivezaRe mit","madI:madI harzaglepanayoH mit","Samu:Samu darSane mit","nF:nF naye mit","dF:dF Baye mit","SrA:SrA pake mit","jYA:jYA mAraRatozaRaniSAmanezu","Cadir:Cadir Urjane mit","GawAdi:GawAdayo mitaH (ga)","Bawi:avyayAnAM BamAtre wilopaH (vA)","asmtri:asmadyuzmatzawsaYjYakAH trizu sarUpAH","aja:jAtilakzaRaNIzaM bADitumajAdizvezAM parigaRanam","dviguaja:dvigorityanena prAptaM NIpaM bADitumajAdizvezAM parigaRanam","vayasiaja:vayasi prathama ityanena prAptaM NIpaM bADitumajAdizvezAM parigaRanam","anadantaaja:adantABAve'pi wAbarTamajAdizvezAM parigaRanam","puMyogaaja:puMyoge'pi wAbarTamajAdizvezAM parigaRanam","jAtiaja:jAtilakzaRe'pi wAbarTamajAdizvezAM parigaRanam","pAlaka:pAlakAntAnna (vA)","sUryadevatA:sUryAddevatAyAM cAbvAcyaH (vA 2471)","mAtula:mAtulopADyAyayorAnugvA (vA) ca yA tu svayamevADyApikA tatra vA NIz vAcyaH (vA)","SvaSura:SvaSurasyokArAkAralopazca (vA 5039)","sahitasaha:sahitasahAByAM ceti vaktavyam (vA 2503)","kvacinna:kvacinna (vA)","jAtAnta:jAtAntAnna (vA 2479)","nfnara:nfnarayorvfdDiSca (ga 54)","naYsnaY:naYsnaYIkakKyuMstaruRatalunAnAmupasaNKyAnam (vA 2425)","anapatya:anapatyAdikArastAnna NIp (vA 2426)","upasargawit:upsarjanatvena wiqQARityasya pravfttirnAsti","vayasyacarama:vayasyacarama iti vAcyam (vA 2435)","kanyA:kanyAyA na | kanyAyAH kanIna ceti nirdeSAt","nalopABAva:nalopABAvAdakAralopo na","akftaaca:yaRo'ntaraNgatve'pi akftavyUhAH pARinIyAH ityanena na pravartate","DAtvantayak:DAtvantayakostu nityam (vA 4536)","asfj:asfjaH padAnte kutvam, kvino viDAnAt","viSvasfj:viSvasfq ityAdO tu kutvaM na, sfjidfSoH iti sUtre rajjusfqByAmiti BAzyaprayogAt","vasvanta:ayaM vasvantaSabdaH","dfn1:dfnkarapUnaHpUrvasya Buvo yaR vaktavyaH (vA 4118) ityanena iyaNuvaNO bADyete, ataH nadIkAryARi Bavantyeva","dfn2:atra karakArayoruBayoraNgIkAraH","arvan:arvaRastrasAvanaYaH (6.4.127) ityanena trAdeSo'tra na Bavati","lumkimka:na lumatA'Ngasyeti pariBAzayA kimaH kaH (7.2.103) bADyate","lumprat:na lumatA'Ngasyeti pariBAzayA pratyayalope pratyayalakzaRam (1.1.62) bADyate","lumpratvA:na lumatA'Ngasyeti pariBAzayA pratyayalope pratyayalakzaRam (1.1.62) vikalpena bADyate","jarAsan:sannipAtapariBAzayA jarAyA jarasanyatarasyAm (7.2.101) bADyate","viBpra:viBaktO liNgaviSizwasyAgrahaRam (pa) ityanena prAtipadikagrahaRe liNgaviSizwasyApi grahaRaM niziDyate . ataH saKyurasamBudDO niziDyate","anaN:anaNRidvadBAvayorANgatvAttadante'pi pravfttiH","anaN1:viBaktO liNgaviSizwasyAgrahaRam (pa) ityanena prAtipadikagrahaRe liNgaviSizwasyApi grahaRaM niziDyate . ataH anaN sO niziDyate","alsTAn:alviDO sTAnivadBAvaM nAstyataH halNyAb.. ityasya pravfttirnAsti","gORanuw:gORatve tu nuw nezyate","anasmin:aninasmangrahaRAni arTavatA cAnarTakena ca tadantaviDiM prayojayanti (pa)","ANostri:ANo'striyAmityanena iko'ci viBaktO pratiziDyate","nalumanaN:na lumatA'Ngasyetyanena anaN pratiziDyate","vAnaN:asya sambudDO vA'naN nalopaSceti vAcyaH (vA 5037)","iwsamp:antaraNgo'pi iqAgamaH samprasAraRavizaye na pravartate, akftavyUhAH pARinIyA iti pariBAzayA","gORavA:gORatve tu neti kecit","okAr:okArAntAdvihitaM sarvanAmasTAnamiti vyAKyAnAdoto Riditi vAcyamityasya pravfttirnAsti","sanAto:sannipAtapariBAzayA Ato DAtoH pratiziDyate","ftvik:ftvigdaDfksradigaYcuyujikruYcAM ca ityanena nalopo'pi nipAtyate","cADAtoH:cADAtoH ityanena atvasantasya cADAtoH (6.4.14) bADyate","uginnum:ugittvABAvAnna num","DAtougit:DAtoScedugitkAryaM tarhyaYcatereva","aDAtonum:aDAtoH iti tvaDAtuBUtapUrvasyApi numarTam","alupnum:aluptanAkAratvAnna num","ikAra:kvipkvinoH ikAraH muKasuKArTaH","SAvallopa:SAvallopasya sTAnivattvAdazalantatvAnna num, ajantalakzaRastu num na, svaviDO sTAnivattvABAvAt","nirav:niravakASaM pratipadoktamiti pakze tu prakfte tadvirahAnnumeva","DAtueran:DAtunA saMyogasya viSezaRAdiha syAdeva yaR eranekAco sUtreRa","DAtuoH:DAtunA saMyogasya viSezaRAdiha syAdeva yaR oH supItyanena","sAnta:sAntamahataH saMyogasya (6.4.10) ityatra sAntasaMyogo'pi prAtipadikasyEva gfhyate, na tu DAtoH, mahacCabdasAhacaryAt","zatvAsidDa:zatvasyAsidDatvAt","rAyo:mADavamate atra rAyo halItyanena AtvaM, kOmudIkAramate tu na","supinAmi:yadyapi supi ceti parasUtramasti, tadatra na pravartate, sannipAtapariBAzAviroDena ca nAmIti sUtrAramBavEyarTyAcca","bahuv:supi ca paratvAdbahuvacane Jalyediti sUtreRa bADyate","sannanitya:sannipAtapariBAzA atra na pravartate,  kazwAya kramaRa ityanena asya pariBAzAyAH anityatvajYApanAt","fty:ftyakaH iti upasargAdfti DAtO ityanena bADyate","sIman:sImanta keSaveSe vA sAraNga paSAvevedaM sUtraM pravartate","pUrvasa:purastAdapavAdA anantarAnviDIn bADante nottarAn (pa 60) iti pariBAzayA ato guRe (6.1.96) iti sUtraM akaH savarRe dIrGaH (6.1.101) ityasyEvApavAdaH, na tu praTamayoH pUrvasavarRasya . ataH pUrvasavarRadIrGaH tu Bavatyeva","Beka:BekajAtO nityastrItvABAvAt kEyawamate he varzABUH, matAntare tu he varzABu","ruasidDa:rutvaM prati zatvasyAsidDatvAt sasajuzo ruH iti rutvam","visarga:BavatA visargAntaH SabdaH waNkitaH . sAmAnyatayA'syotpattiH sakArAntaSabdAdBavati","ahan:ahan (8.2.68) ityanena nalopABAvaM nipAtyate","KyA:KyAYAdeSe na (vA 1591)","rAtsas:rAtsasyetyanena saMyogAntasya lopaH pratiziDyate","sasaj:sasajuzo ruH ityanena JalAM jaSo'nte pratiziDyate","tyadA:tyadAdizu dfSo'nAlocane kaYca (3.2.60) iti dfSeH kvinviDAnAdanyatrApi kutvam","allopsTAn:sTAnivadBAvasya dIrGaviDO nizeDAdallopasya sTAnivadbAvaM nAsti","adasodre:adaso'dreH pfTaNmutvaM kecidicCanti latvavat‌ . kecidantyasadeSasya netyeke'serhi dfSyate ..","roHsupi:roH supi (8.3.16) ityanena KaravasAnayorvisarjanIyaH pratiziDyate","samovA:samo vA lopameke (BAzyam)","pASak:pASakalpakakAmyezviti vAcyam (vA 5033), anavyayasyeti vAcyam (vA 4902), kAmye roreveti vAcyam (vA 4902)","tric:tricaturByAM hAyanasya RatvaM vAcyam (vA 5038)","anAmn:na padAntAwworanAm‌ (8.4.42) ca anAmnavatinagarIRAmiti vAcyam‌ (vA 5016)","zwu:pUrvasmAdapi viDAvallopasya sTAnivadBAvAnna zwutvam‌ . kAryakAlapakze bahiraNgasya allopasya asidDatvAdvA .","nAdin:nAdinyAkroSe putrasya (8.4.27) ityanena AkroSa eva dvitvaM, anyatra tu dvitvaM nAsti","tripr:tripraBftizu SAkawAyanasya (8.4.50) ityanena vikalpena dvitvaM Bavati","gatik:gatikAraketarapUrvapadasya yaR nezyate (vA 5034) ityanena gatikArakaBinnapUrvapade yaR na Bavati, iyaNuvaNO BavataH","nalumanitya:na lumatA'Ngasyeti pariBAzA anityA","vA 49:upasargAdastyUhyorvacanam (vA 49)","damBeSca:damBeSceti vaktavyam (vA)","SranTi:SranTigranTidamBisvaYjInAM kittvaM vA vaktavyam (vA)","digy:digyAdeSena dvirvacanasya bADanamizyata iti vfttiH","sarti:sartervegitAyAM gatO DAvAdeSamicCanti (vA)","Aya:anubanDaSca kevale caritArTaH, tena AyapratyayAntaH nAtmanepadaM Bavati (kASikA)");
$paribhASAdata=array("par@1:vyAKyAnato viSezapratipattirna hi sandehAdalakzaRam","par@2:yaToddeSaM saYjYApariBAzam","par@3:kAryakAlaM saYjYApariBAzam","par@4:anekAntA anubanDA iti","par@5:ekAntAH","par@6:nAnubanDakftamanekAltvam","par@7:nAnubanDakFtamanejantatvam","par@8:nAnubanDakftamasArUpyam","par@9:uBayagatiriha Bavati","par@10:kAryamanuBavan hi kAryI nimittatayA nASrIyate","par@11:yadAgamAstadguRIBUtAstadgrahaRena gfhyante","par@12:nirdiSyamAnasyAdeSA Bavanti","par@13:yatrAnekaviDamAntaryaM tatra sTAnata AntaryaM balIyaH","par@14:arTavadgrahaRe nAnarTakasya","par@15:gORamuKyayormuKye kAryasampratyayaH","par@16:aninasmingrahaRAnyarTavatA cAnarTakena ca tadantaviDiM prayojayanti","par@17:ekayoganirdizwAnAM saha vA pravfttiH saha vA nivfttiH","par@18:ekayoganirdizwAnAmekadeSo'pyanuvartate","par@19:BAvyamAnena savarRAnAM grahaRaM na","par@20:BAvyamAno'pyukAraH savarRAn gfhRAti","par@21:varRASraye nAsti pratyayalakzaRam","par@22:uRAdayo'vyutpannAni prAtipadikAni","par@23:pratyayagrahaRe yasmAtsa vihitastadAdestadantasya grahaRam","par@24:pratyayagrahaRe cApaYcamyAH","par@25:uttarapadADikAre pratyayagrahaRe na tadantagrahaRam","par@26:strIpratyaye cAnupasarjane na","par@27:saYjYAviDO pratyayagrahaRe tadantagrahaRaM nAsti","par@28:kfdgrahaRe gatikArakapUrvasyApi grahaRam","par@29:padANgADikAre tasya ca tadantasya ca","par@30:vyapadeSivadekasmin","par@31:grahaRavatA prAtipadikena tadantaviDirnAsti","par@32:vyapadeSivadBavo'prAtipadikena","par@33:yasminviDistadAdAvalgrahaRe","par@34:sarvo dvandvo viBAzayEkavadBavati","par@35:sarve viDayaSCandasi vikalpyante","par@36:prakftivadanukaraRaM Bavati","par@37:ekadeSavikftamananyavat","par@38:pUrvaparanityAntaraNgApavAdAnAmuttarottaraM balIyaH","par@39:punaHprasaNgavijYAnAtsidDam","par@40:sakfdgatO vipratizeDe yadbADitaM tadbADitameva","par@41:vikaraReByo niyamo balIyAn","par@42:parAnnityaM balavat","par@43:SabdAntarasya prApnuvanviDiranityo Bavati","par@44:SabdAntarAtprApnuvataH SabdAtare prApnuvatazcAnityatvam","par@45:lakzaRAntareRa prApnuvan viDiranityaH","par@46:kvacitkftAkftaprasaNgamAtreRApi nityatA","par@47:yasya ca lakzaRAntareRa nimittaM vihantyate na tadanityam","par@48:yasya ca lakzaRAntareRa nimittaM vihantyate tadapyanityam","par@49:svaraBinnasya prApnuvanviDiranityo Bavati","par@50:asidDaM bahiraNgamantaraNge","par@51:nAjAnantarye bahizwvaprakxptiH","par@52:antaraNgAnapi viDInbahiraNgo lugbADate","par@53:pUrvottarapadanimittakAryAtpUrvamantaraNgo'pyekAdeSo na","par@54:antaraNgAnapi viDIn bahiraNgo lyabbADate","par@55:vArRAdANgaM balIyo Bavati","par@56:akftavyUhAH pARinIyAH","par@57:antaraNgAdapyapavAdo balavAn","par@58:kvacidapavAdavizaye'pyutsargo'BiniviSata iti","par@59:purastAdapavAdA anantarAn viDIn bADante nottarAn","par@60:maDye'pavAdAH pUrvAn viDIn bADante nottarAn","par@61:anantarasya viDirvA Bavati pratizeDo veti","par@62:pUrvaM hyapavAdA aBiniviSante paScAdutsargAH","par@63:prakalpya vA'pavAdavizayaM tata utsargo'BiniviSate","par@64:upasaMjanizyamARanimitto'pyapavAda upasaMjAtanimittamapyutsargaM bAData iti","par@65:apavAdo yadyanyatra caritArTastarhyantaraNgeRa bADyate","par@66:aByAsavikArezu bADyabADakaBAvo nAsti","par@67:tAcCIlikezu vAsarUpaviDirnAsti","par@68:ktalyuwtumunKlarTezu vAsarUpaviDirnAsti","par@69:lAdeSezu vAsarUpaviDirnAsti","par@70:uBayanirdeSe paYcamInirdeSo balIyAn","par@71:prAtipadikagrahaRe liNgaviSizwasyApi grahaRam","par@72:viBaktO liNgaviSizwAgrahaRam","par@73:sUtre liNgavacanamatantram","par@74:naYivayuktamanyasadfSADikaraRe taTA hyarTagatiH","par@75:yatikArakopapadAnAM kfdBiH saha samAsavacanaM prAk subutpatteH","par@76:sAmpratikABave BUtapUrvagatiH","par@77:bahuvrIhO tadguRasaMvijYAnamapi","par@78:cAnukfzwaM nottaratra","par@79:svaraviDO vyaYjanamavidyamAnavat","par@80:halsvaraprAptO vyaYjanamavidyamAnavat","par@81:niranubanDakagrahaRe na sAnubanDakasya","par@82:tadanubanDakagrahaRe nAtadanubanDakasya","par@83:kvacitsvArTikAH prakftito liNgavacanAnyativartante","par@84:samAsAntaviDiranityaH","par@85:sannipAtalakzaRo viDiranimittaM tadviGAtasya","par@86:sanniyogaSizwAnAmanyatarApAya uBayorapyapAyaH","par@87:tAcCIlike Re'kftAni Bavanti","par@88:DAtoH kAryamucyamAnaM tatpratyaye Bavati","par@89:tanmaDyapatitastadgrahaRena gfhyate","par@90:lugvikaraRAlugvikaraRayoralugvikaraRasy","par@91:prakftigrahaRe RyaDikasyApi grahaRam","par@92:aNgavftte puarvfttAvaviDiH","par@93:saYjYApUrvakaviDeranityatvam","par@94:AgamaSAstramanityam","par@95:gaRakAryamanityam","par@96:anudAttettvalakzaRamAtmanepadamanityam","par@97:naYGawitamanityam:","par@98:AtideSikamanityam","par@99:sarvaviDiByo lopaviDiraqviDiSca balavAn","par@100:prakftigrahaRe yaNlugantasyApi grahaRam","par@101:viDO pariBAzopatizWate nAnuvAde","par@102:upapadaviBakteH kArakaviBaktirbalIyasI","par@103:anantyavikAre'ntyasadeSasya","par@104:nAnarTake'lo'ntyaviDiranaByAsavikAre","par@105:praDAnApraDAnayoH praDAne kAryasampratyayaH","par@106:avayavaprasidDeH samudAyaprasidDirbalIyasI","par@107:vyavasTitaviBAzayA'pi kAryARi kriyante","par@108:viDiniyamasamBave viDireva jyAyAn","par@109:sAmAnyAtideSe viSezAnatideSaH","par@110:pratyayApratyayayoH pratyayasya grahaRam","par@111:sahacaritAsahacaritayoH sahacaritasyEa grahaRam","par@112:SrutAnumitayoH Srutasambando balavAn","par@113:lakzaRapratipadoktayoH pratipadoktasyEva grahaRam","par@114:gAmAdAgrahaRezvaviSezaH","par@115:pratyekaM vAkyaparisamAptiH","par@116:kvacitsamudAye'pi","par@117:aBedakA guRAH","par@118:bADakAnyeva nipAtanAni","par@119:parjanyavallakzaRapravfttiH","par@120:nizeDASca balIyAMsaH","par@121:anirdizwArTAH pratyayAH svArTe","par@122:yogaviBAgAdizwasidDiH","par@123:paryAyaSabdAnAM lAGavagOravacarcA nAdriyate","par@124:jYApakasidDaM na sarvatra","par@125:pUrvatrAsidDIyamadvitve","par@126:ekasyA AkfteScaritaH prayogo dvitIyasyAstftIyasyASca na Bavizyati","par@127:samprasAraRaM tadASrayaM ca kAryaM balavat","par@128:kvacidvikftiH prakftiM gfhRAti","par@129:OpadeSikaprAyogikayorOpadeSikasyEva grahaRam","par@130:StipA SapA'nubanDena nirdizwaM yadgaRena ca | yatrEkAjgrahaRaM cEva paYcEtAni na yaNluki ||","par@131:padagOravAdyogaviBAgo garIyAn","par@56.1:nimittApAye nEmittikasyApyapAyaH");
$otherdata=array("~1:vac dhAtu doesn't have prathama puruSa bahuvacana form.:वच्‌ धातु का प्रथम पुरुष बहुवचन का रूप नहीं होता है ।","~2:Final form:अन्तिमं रूपम्‌");
// $verbdata and its derivatives
// verbwithanubandha:meaning:verbwithoutanubandha:gana:number:pada:iDAgama:pureverb:mAdhavIyadhAtuvRtti:kzIrataraGgiNI:dhAtupradIpa:uohydlink:jnulink
#Legacy data before 21092016
#$verbdata = array("aMsa:samAGAte:aMsa:10:0460:u:sew:अं॑स॑:1420::1475:aMsa1_aMsa_curAxiH+samAGAwe:","ahi!:BAzArTaH ca:aMh:10:0328:u:sew:अ॑हिँ॑:1322:::aMh2_ahiz_curAxiH+BARArWaH:","ahi!:gatO:aMh:01:0722:A:sew:अ॑हिँ॒:386:403:408:aMh1_ahiz_BvAxiH+gawO:","aka!:kuwilAyAM gatO:ak:01:0901:pa:sew:अ॑कँ॑:488:512:517:ak1_akaz_BvAxiH+kutilAyAM_gawO:","akzU!:vyAptO:akz:01:0742:pa:sew:अ॑क्षूँ॑:399:416:423:akR1_akRUz_BvAxiH+vyApwO:","aga!:kuwilAyAM gatO:ag:01:0902:pa:sew:अ॑गँ॑:488:512:517:ag1_agaz_BvAxiH+kutilAyAM_gawO:","aNka:pade lakzaRe ca:aNka:10:0473:u:sew:अ॑ङ्क॑:1429::1485:afka1_afka_curAxiH+paxe_lakRaNe_ca:","aki!:lakzaRe:aNk:01:0092:A:sew:अ॑किँ॒:67:66:68:afk1_akiz_BvAxiH+lakRaNe:45","aNga:pade lakzaRe ca:aNga:10:0474:u:sew:अ॑ङ्ग॑:1430:1447:1486:afga1_afga_curAxiH+paxe_lakRaNe_ca:","agi!:gatyarTaH:aNg:01:0155:pa:sew:अ॑गिँ॑:84:87:88:afg1_agiz_BvAxiH+gawyarWaH:56","aGi!:gatyAkzepe gatO gatyAramBe cetyapare:aNG:01:0115:A:sew:अ॑घिँ॒:74:74:75::","acu!:gatO yAcane ca ityeke:ac:01:0999:u:sew:अ॑चुँ॒॑::559::ac1_acuz_BvAxiH+gawO_yAcane_ca:","aja!:gatikzapanayoH:aj:01:0262:pa:sew:अ॑जँ॑:130:137:138:aj1_ajaz_BvAxiH+gawikRepaNayoH:77","aci!:gatO yAcane ca ityepare:aYc:01:1000:u:sew:अ॑चिँ॑::559::aFc3_aciz_BvAxiH+gawO_yAcane_ca:","aYcu!:gatipUjanayoH:aYc:01:0998:pa:sew:अ॑ञ्चुँ॑:107,538:113:114,570:aFc1_aFcuz_BvAxiH+gawipUjanayoH,aFc2_aFcuz_BvAxiH+gawO_yAcane_ca:67","aYcu!:gatO yAcane ca:aYc:01:0215:u:sew:अ॑ञ्चुँ॒॑:107,538:113:114,570:aFc1_aFcuz_BvAxiH+gawipUjanayoH,aFc2_aFcuz_BvAxiH+gawO_yAcane_ca:67","aYcu!:viSezaRe:aYc:10:0266:u:sew:अ॑ञ्चुँ॑:1307:1332:1365:aFc4_aFcuz_curAxiH+viSeRaNe:","aji!:BAzArTaH ca:aYj:10:0021:u:sew:अ॑जिँ॑:1322:::aFj2_ajiz_curAxiH+BARArWaH:","aYjU!:vyaktimrakzaRakAntigatizu vyaktimarzaRakAntigatizu:aYj:07:0316:pa:sew:अ॑ञ्जूँ॑:1059:1077:1110::211","awa!:gatO:aw:01:0332:pa:sew:अ॑टँ॑:181:190:190:at1_ataz_BvAxiH+gawO:90","awwa!:anAdare:aww:10:0037:u:sew:अ॑ट्टँ॑:1156::1210:att2_attaz_curAxiH+anAxare:","awwa!:atikramaRahiMsanayoH atikramahiMsayoH:aww:01:0287:A:sew:अ॑ट्टँ॒:145:153:154:att1_attaz_BvAxiH+awikramahiMsayoH:","aqa!:udyame:aq:01:0414:pa:sew:अ॑डँ॑:229:241:241:ad1_adaz_BvAxiH+uxyame:","aqqa!:aBiyoge:aqq:01:0403:pa:sew:अ॑ड्डँ॑:222:235:235:add1_addaz_BvAxiH+aBiyoge:","aRa!:SabdArTaH:aR:01:0512:pa:sew:अ॑णँ॑:277:290:293:aN1_aNaz_BvAxiH+SabxArWaH:","aRa!:prARane:aR:04:0071:A:sew:अ॑णँ॒:816::856:aN2_aNaz_xivAxiH+prANane:","aWi!:gatO:aRW:01:0294:A:sew:अ॑ठिँ॒::158:160:aNT1_aTiz_BvAxiH+gawO:","ata!:sAtatyagamane:at:01:0038:pa:sew:अ॑तँ॑:30:31:32:aw1_awaz_BvAxiH+sAwawyagamane:","ada!:BakzaRe:ad:02:0001:pa:aniw:अ॒दँ॑:661:685:699:ax1_axaz_axAxiH+BakRaNe:","adqa!:aBiyoge:adq:01:0403:pa:sew:अ॑द्डँ॑:222:235:235:add1_addaz_BvAxiH+aBiyoge:","iN:aDyayane nityamaDipUrvaH:i:02:0041:A:aniw:इ॒ङ्:696:718:735:i2_if_axAxiH+aXyayane:","ik:smaraRe ayamapyaDipUrvaH:i:02:0042:pa:aniw:इ॒क्:697:719:736:i3_ik_axAxiH+smaraNe:","anuruDa!:kAme:anuruD:04:0070:A:aniw:अ॑नुरु॒धँ॒:::::","ana!:prARane ityeke:an:04:0072:A:sew:अ॑नँ॒:::::","ana!:ca prARane:an:02:0065:pa:sew:अ॑नँ॑:720:742:759:an1_anaz_axAxiH+prANane:","ati!:banDane:ant:01:0063:pa:sew:अ॑तिँ॑:49:49:51:anw1_awiz_BvAxiH+banXane:34","adi!:banDane:and:01:0064:pa:sew:अ॑दिँ॑:49:49:51:anx1_axiz_BvAxiH+banXane:","anDa:dfzwyupaGAte upasaMhAra ityanye:anDa:10:0471:u:sew:अ॑न्ध॑:1427::1483:anXa1_anXa_curAxiH+xqRtyupaGAwe:","aBra!:gatyarTaH:aBr:01:0637:pa:sew:अ॑भ्रँ॑:341:357:361:aBr1_aBraz_BvAxiH+gawyarWaH:","ama!:gatyAdizu gatO Sabde samBaktO ca:am:01:0536:pa:sew:अ॑मँ॑:287:300:303:am1_amaz_BvAxiH+gawiSabxasamBakwiRu:","ama!:roge na mit 1950:am:10:0245:u:sew:अ॑मँ॑:1292:1311:1344:am3_amaz_curAxiH+roge:","abi!:Sabde:amb:01:0438:A:sew:अ॑बिँ॒:241:255:256:amb1_abiz_BvAxiH+Sabxe:","aBi!:Sabde kvacitpaWyate:amB:01:0448:A:sew:अ॑भिँ॒:::::","aya!:gatO:ay:01:1031:A:sew:अ॑यँ॒:291:305,576:307:ay1_ayaz_BvAxiH+gawO:109","aya!:gatO:ay:01:0546:u:sew:अ॑यँ॒॑:291:305,576:307:ay1_ayaz_BvAxiH+gawO:109","arka!:stavane:ark:10:0145:u:sew:अ॑र्कँ॑:1224:1239:1276:ark1_arkaz_curAxiH+swavane_wapane_ca:","arGa!:mUlye:arG:01:0185:pa:sew:अ॑र्घँ॑:::::","arca!:pUjAyAm:arc:01:0232:pa:sew:अ॑र्चँ॑:112:118:119:arc1_arcaz_BvAxiH+pUjAyAm:69","arca!:pUjAyAm:arc:10:0340:u:sew:अ॑र्चँ॑:1326:1345:1379:arc2_arcaz_curAxiH+pUjAyAm:259","arja!:arjane:arj:01:0256:pa:sew:अ॑र्जँ॑:125:132:133:arj1_arjaz_BvAxiH+arjane:74","arja!:pratiyatne sampAdane ca:arj:10:0250:u:sew:अ॑र्जँ॑:1295:1315:1348:arj2_arjaz_curAxiH+prawiyawne_sampAxane_ca:246","arTa:upayAcYAyAm:arTa:10:0447:A:sew:अ॑र्थ॒:1409::1465:arWa1_arWa_curAxiH+upayAcFAyAm:439","arda!:hiMsAyAm:ard:10:0365:u:sew:अ॑र्दँ॑:1345:1362:1399:arx2_arxaz_curAxiH+hiMsAyAm:","arda!:gatO yAcane ca:ard:01:0057:pa:sew:अ॑र्दँ॑:44:44:46:arx1_arxaz_BvAxiH+gawO_yAcane_ca:","arba!:gatO:arb:01:0481:pa:sew:अ॑र्बँ॑:264:279:280:arb1_arbaz_BvAxiH+gawO:","arva!:hiMsAyAm:arv:01:0667:pa:sew:अ॑र्वँ॑:353:370:374:arv1_arvaz_BvAxiH+hiMsAyAm:","arha!:pUjAyAm:arh:10:0257:u:sew:अ॑र्हँ॑:1301:1321:1354:arh2_arhaz_curAxiH+pUjAyAM_yogyawve_ca,arh3_arhaz_curAxiH+pUjAyAM_yogyawve_ca:","arha!:pUjAyAm:arh:10:0367:u:sew:अ॑र्हँ॑:1301:1321:1354:arh2_arhaz_curAxiH+pUjAyAM_yogyawve_ca,arh3_arhaz_curAxiH+pUjAyAM_yogyawve_ca:","arha!:pUjAyAm:arh:01:0841:pa:sew:अ॑र्हँ॑:448:468:476:arh1_arhaz_BvAxiH+pUjAyAM_yogyawve_ca:","ala!:BUzaRaparyAptivAraRezu:al:01:0593:pa:sew:अ॑लँ॑:314::331::119","ava!:rakzaRagatikAntiprItitfptyavagamapraveSaSravaRasvAmyarTayAcanakriyecCAdIptyavAptyAliNganahiMsAdAnaBAgavfdDizu:av:01:0684:pa:sew:अ॑वँ॑:360:377:381:av1_avaz_BvAxiH+rakRaNagawikAnwiprIwiwqpwyavagamapraveSaSravaNasvAmyarWayAcanakriyecCAxIpwyavApwyAlifganahiMsAxAnaBAgavqxXiRu,av1_avaz_BvAxiH+rakRaNagawikAnwi...:137","aSa!:Bojane:aS:09:0059:pa:sew:अ॑शँ॑:1123:1138:1176:aS2_aSaz_kryAxiH+Bojane:218","aSU!:vyAptO saNGAte ca:aS:05:0020:A:sew:अ॑शूँ॒:898:919:939:aS1_aSUz_svAxiH+vyApwO_saMGAwe_ca:390","aza!:gatidIptyAdAnezu ityeke:az:01:1030:u:sew:अ॑षँ॒॑::::aR1_aRaz_BvAxiH+gawixIpwyAxAneRu:","asu!:kzepane:as:04:0106:pa:sew:अ॑सुँ॑:850:869:889:as3_asuz_xivAxiH+kRepaNe:366","asa!:gatidIptyAdAnezu:as:01:1029:u:sew:अ॑सँ॒॑:557:578:589:as1_asaz_BvAxiH+gawixIpwyAxAneRu:","asa!:Buvi:as:02:0060:pa:sew:अ॑सँ॑:715:737:754:as2_asaz_axAxiH+Buvi:193","aha!:vyAptO:ah:05:0029:pa:sew:अ॑हँ॑::926:947:ah1_ahaz_svAxiH+vyApwO:","Akranda!:sAtatye:Akrand:10:0252:u:sew:आ॑क्रन्दँ:::::","ACi!:AyAme:AYC:01:0237:pa:sew:आ॑छिँ॑:116:122:123:AFC1_ACiz_BvAxiH+AyAme:","Apx!:lamBane:Ap:05:0016:pa:aniw:आ॒पॢँ॑:895:916:936::391","Apx!:vyAptO:Ap:10:0376:u:sew:आ॑पॢँ॑:1354:1369:1407::288","ASasi!:icCAyAm:ASaMs:01:0716:A:sew:आ॑श॒सि:::::","ASAsu!:icCAyAm:ASAs:02:0012:A:sew:आ॑शा॒सुँ:::::","Azada!:padyarTe:Asad:10:0368:u:sew:आ॒षदँ:::::","Asa!:upaveSane:As:02:0011:A:sew:आ॑सँ॒:671:695:709::348","iR:gatO:i:02:0040:pa:aniw:इ॒ण्:695:717:734:i1_iN_axAxiH+gawO:350","iKa!:gatyarTaH:iK:01:0148:pa:sew:इ॑खँ॑:84:87::iK1_iKaz_BvAxiH+gawyarWaH:","iKi!:gatyarTaH:iNK:01:0149:pa:sew:इ॑खिँ॑:84::88:ifK1_iKiz_BvAxiH+gawyarWaH:","igi!:gatyarTaH:iNg:01:0163:pa:sew:इ॑गिँ॑:84:87:88:ifg1_igiz_BvAxiH+gawyarWaH:","iwa!:gatO:iw:01:0357:pa:sew:इ॑टँ॑:200:210:209:it1_itaz_BvAxiH+gawO:","idi!:paramESvarye:ind:01:0065:pa:sew:इ॑दिँ॑:50:50:52:inx1_ixiz_BvAxiH+paramESvarye:35","YiinDI!:dIptO:inD:07:0011:A:sew:ञिइ॒न्धीँ॑:1049:1068:1101:inX1_FiinXIz_ruXAxiH+xIpwO:","ivi!:vyAptO:inv:01:0670:pa:sew:इ॑विँ॑:354:371,373:375:inv1_iviz_BvAxiH+vyApwO:136","ila!:preraRe:il:10:0084:u:sew:इ॑लँ॑:1238:1253:1290:il2_ilaz_curAxiH+preraNe:","ila!:svapnakzepanayoH:il:06:0167:pa:sew:इ॑लँ॑:968:991:1011:il1_ilaz_wuxAxiH+svapnakRepaNayoH:","iza!:icCAyAm:iz:06:0078:pa:sew:इ॑षँ॑:962::::397","iza!:Iza! gatO:iz:04:0022:pa:sew:इ॑षँ॑:772:794:811:iR1_iRaz_xivAxiH+gawO:","iza!:ABIkzRye:iz:09:0061:pa:sew:इ॑षँ॑:1125:1140:1178:iR3_iRaz_kryAxiH+ABIkRNye:","IN:gatO:I:04:0038:A:aniw:ई॒ङ्:786:807:825::","Ikza!:darSane:Ikz:01:0694:A:sew:ई॑क्षँ॒:369:385:390:IkR1_IkRaz_BvAxiH+xarSane:143","IKa!:gatyarTaH:IK:01:0150:pa:sew:ई॑खँ॑:84:87:88:IfK1_IKiz_BvAxiH+gawyarWaH:","IKi!:gatyarTaH:INK:01:0151:pa:sew:ई॑खिँ॑:84:87:88:IfK1_IKiz_BvAxiH+gawyarWaH:","Ija!:gatikutsanayoH:Ij:01:0207:A:sew:ई॑ज॒ँ:103:107:109:Ij1_Ijaz_BvAxiH+gawikuwsanayoH:","Iji!:gatikutsanayoH ityeke:IYj:01:0208:A:sew:ई॑जिँ॒:::::","Iqa!:stutO:Iq:10:0009:u:sew:ई॑डँ॑:1244:1262:1297:Id2_Idaz_curAxiH+swuwO:","Iqa!:stutO:Iq:02:0183:A:sew:ई॑डँ॒:669:693:707:Id1_Idaz_axAxiH+swuwO:","Ira!:kzepe:Ir:10:0008:u:sew:ई॑रँ॑:1328:1347:1381:Ir2_Iraz_curAxiH+kRepe:","Ira!:gatO kampane ca:Ir:02:0342:A:sew:ई॑रँ॒:668:692:706:Ir1_Iraz_axAxiH+gawO+kampane_ca:","Irkzya!:IrzyArTaH:Irkzy:01:0587:pa:sew:ई॑र्क्ष्यँ॑:310:325:327:IrkRy1_IrkRyaz_BvAxiH+IrRyArWaH:","Irzya!:IrzyArTAH:Irzy:01:0588:pa:sew:ई॑र्ष्यँ॑:310:325:327:IrRy1_IrRyaz_BvAxiH+IrRyArWaH:118","ISa!:ESvarye:IS:02:0010:A:sew:ई॑शँ॒:670:694:708:IS1_ISaz_axAxiH+ESvarye:199","Iza!:uYCe:Iz:01:0780:pa:sew:ई॑षँ॑:370,420:386,437:394,446:IR1_IRaz_BvAxiH+gawihiMsAxarSaneRu,IR2_IRaz_BvAxiH+uFCe:144","Iza!:gatihiMsAdarSanezu:Iz:01:0695:A:sew:ई॑षँ॒:370,420:386,437:394,446:IR1_IRaz_BvAxiH+gawihiMsAxarSaneRu,IR2_IRaz_BvAxiH+uFCe:144","Iha!:cezwAyAm:Ih:01:0719:A:sew:ई॑हँ॒:384:401:406:Ih1_Ihaz_BvAxiH+ceRtAyAm:149","uN:Sabde:u:01:1102:A:aniw:उ॒ङ्:607:633:645:u1_uf_BvAxiH+Sabxe:","ukza!:secane:ukz:01:0745:pa:sew:उ॑क्षँ॑:401:418:425:ukR1_ukRaz_BvAxiH+secane:292","uKa!:gatyarTaH:uK:01:0136:pa:sew:उ॑खँ॑:84:87:88:uK1_uKaz_BvAxiH+gawyarWaH:54","uKi!:gatyarTaH:uNK:01:0137:pa:sew:उ॑खिँ॑:84:87::ufK1_uKiz_BvAxiH+gawyarWaH:55","uca!:samavAye:uc:04:0135:pa:sew:उ॑चँ॑:863:883:903:uc1_ucaz_xivAxiH+samavAye:","uCI!:vivAse:uC:06:0015:pa:sew:उ॑छीँ॑::944:964:uC2_uCIz_wuxAxiH+vivAse:","uCI!:vivAse:uC:01:0244:pa:sew:उ॑छीँ॑:122:129:130:uC1_uCIz_BvAxiH+vivAse:","ujJa!:utsarge:ujJ:06:0024:pa:sew:उ॑ज्झँ॑:928:951:971:ujJ1_ujJaz_wuxAxiH+uwsarge:","uCi!:uYCe:uYC:06:0014:pa:sew:उ॑छिँ॑:921:943:963:uFC2_uCiz_wuxAxiH+uFCe:","uCi!:uYCe:uYC:01:0243:pa:sew:उ॑छिँ॑:121:128:129:uFC1_uCiz_BvAxiH+uFCe:72","uWa!:upaGAte ityeke:uW:01:0852:pa:sew:उ॑ठँ॑:213:226:::","uWa!:upaGAte pratiGAte:uW:01:0392:A:sew:उ॑ठँ॒:213:226:::","uGrasa!:uYCe ityeke:uDras:10:0271:u:sew:उ॑घ्र॑सँ॑:::::","undI!:kledane:und:07:0020:pa:sew:उ॑न्दीँ॑:1058:1076:1109:unx1_unxIz_ruXAxiH+klexane:","ubja!:Arjave:ubj:06:0023:pa:sew:उ॑ब्जँ॑:927:950:970:ubj1_ubjaz_wuxAxiH+Arjave:","uBa!:pUraRe:uB:06:0044:pa:sew:उ॑भँ॑:936:959:979:uB1_uBaz_wuxAxiH+pUraNe:","umBa!:pUraRe:umB:06:0045:pa:sew:उ॑म्भँ॑:936:959:979:umB1_umBaz_wuxAxiH+pUraNe:","urda!:mAne krIqAyAM ca:urd:01:0020:A:sew:उ॑र्दँ॒:17:18:18::","urvI!:hiMsArTaH:urv:01:0650:pa:sew:उ॑र्वीँ॑:347:363:367:urv1_urvIz_BvAxiH+hiMsArWaH:","uza!:dAhe:uz:01:0792:pa:sew:उ॑षँ॑:423:440:449:uR1_uRaz_BvAxiH+xAhe:","uhi!r:ardane:uh:01:0840:pa:sew:उ॑हिँ॑र्::467::uh1_uhizr_BvAxiH+arxane:","UWa!:upaGAte:UW:01:0391:pa:sew:ऊ॑ठँ॑:::::","Una:parihARe:Una:10:0430:u:sew:ऊ॑न॑:1398:1415:1454:Una1_Una_curAxiH+parihANe:","UyI!:tantusantAne:Uy:01:0556:A:sew:ऊ॑यीँ॒:294:309:311:Uy1_UyIz_BvAxiH+wanwusanwAne:111","Urja!:balaprARanayoH:Urj:10:0023:u:sew:ऊ॑र्जँ॑:1147:1163:1201:Urj1_Urjaz_curAxiH+balaprANanayoH:","UrRuY:AcCAdane:UrRu:02:0034:u:sew:ऊ॑र्णु॑ञ्:689:711:728:UrNu1_UrNuF_axAxiH+AcCAxane:","Uza!:rujAyAm:Uz:01:0779:pa:sew:ऊ॑षँ॑:419:436:445:UR1_URaz_BvAxiH+rujAyAm:","Uha!:vitarke:Uh:01:0735:A:sew:ऊ॑हँ॒:394:411:417:Uh1_Uhaz_BvAxiH+viwarke:","f:gatO:f:03:0017:pa:aniw:ऋ॒:747:769:785:q2_q_juhowyAxiH+gawO:","f:hiMsAyAm ityeke:f:05:0038:pa:sew:ऋ॑:::::","f:gatiprApaRayoH:f:01:1086:pa:aniw:ऋ॒:595:620:633:q1_q_BvAxiH+gawiprApaNayoH:","fca!:stutO:fc:06:0022:pa:sew:ऋ॑चँ॑:926:949:969:qc1_qcaz_wuxAxiH+swuwO:","fCa!:gatIndriyapralayamUrtiBAvezu:fC:06:0016:pa:sew:ऋ॑छँ॑:922:945:965:qC1_qCaz_wuxAxiH+gawInxriyapralayamUrwiBAveRu:","fja!:gatisTAnArjanopArjanezu:fj:01:0200:A:sew:ऋ॑जँ॒:100:104:106:qj1_qjaz_BvAxiH+gawisWAnArjanopArjaneRu:60","fji!:Barjane:fYj:01:0201:A:sew:ऋ॑जिँ॒:101:105:107:qFj1_qjiz_BvAxiH+Barjane:","fRu!:gatO:fR:08:0005:u:sew:ऋ॑णुँ॒॑:1068:1085:1119::","fDu!:vfdDO:fD:05:0027:pa:sew:ऋ॑धुँ॑:904:925:945:qX2_qXuz_svAxiH+vqxXO:","fDu!:vfdDO:fD:04:0160:pa:sew:ऋ॑धुँ॑:880:901:920:qX1_qXuz_xivAxiH+vqxXO:","fPa!:hiMsAyAm:fP:06:0040:pa:sew:ऋ॑फँ॑:934:954:977:qP1_qPaz_wuxAxiH+hiMsAyAm:","fmPa!:hiMsAyAm:fmP:06:0041:pa:sew:ऋ॑म्फँ॑:934:954:977:qmP1_qmPaz_wuxAxiH+hiMsAyAm:","fzI!:gatO:fz:06:0007:pa:sew:ऋ॑षीँ॑:915:936:957:qR1_qRIz_wuxAxiH+gawO:","F:gatO:F:09:0032:pa:sew:ॠ:1099:1115:1150:Q1_Q_kryAxiH+gawO:","ejf!:dIptO:ej:01:0203:A:sew:ए॑जृँ॒:102,134:106,141:108,142:ej1_ejqz_BvAxiH+xIpwO,ej2_ejqz_BvAxiH+kampane:62,79","ejf!:kampane:ej:01:0267:pa:sew:ए॑जृँ॑:102,134:106,141:108,142:ej1_ejqz_BvAxiH+xIpwO,ej2_ejqz_BvAxiH+kampane:62,79","eWa!:ca vibADAyAM:eW:01:0300:A:sew:ए॑ठँ॒:156:163:165:eT1_eTaz_BvAxiH+vibAXAyAm:","eDa!:vfdDO:eD:01:0002:A:sew:ए॑धँ॒:2:2:2:eX1_eXaz_BvAxiH+vqxXO:2","ezf!:gatO:ez:01:0705:A:sew:ए॑षृँ॒:374,375:391:397:eR1_eRqz_BvAxiH+prayawne:","ezf!:prayatne ityeke:ez:01:0701:A:sew:ए॑षृँ॒:374,375:391:397:eR1_eRqz_BvAxiH+prayawne:","oKf!:SozaRAlamarTyoH:oK:01:0129:pa:sew:ओ॑खृँ॑:82:85:86:oK1_oKqz_BvAxiH+SoRaNAlamarWayoH:","oRf!:apanayane:oR:01:0523:pa:sew:ओ॑णृँ॑:278:291:294:oN1_oNqz_BvAxiH+apanayane:","o!laqi!:utkzepane ityeke:laRq:10:0014:u:sew:ओँ॑ल॑डिँ॑:1140:1156:1194:laNd1_ozladiz_curAxiH+uwkRepaNe:","kasi!:gatiSAsanayoH:kaMs:02:0014:A:sew:क॑सिँ॒:674:698:712:kaMs1_kasiz_axAxiH+gawiSAsanayoH:","kaka!:lOlye:kak:01:0095:A:sew:क॑कँ॒:70:69:71:kak1_kakaz_BvAxiH+lOlye:","kaKa!:hasane:kaK:01:0128:pa:sew:क॑खँ॑:81::::","kaKe!:hasane:kaK:01:0893:pa:sew:क॑खेँ॑:484:507:512:kaK2_kaKez_BvAxiH+hasane:","kage!:nocyate kriyAsAmAnyArTatvAt anekArTatvAdityanye:kag:01:0900:pa:sew:क॑गेँ॑:487:511:516:kag1_kagez_BvAxiH+nocyawe:","kaki!:gatyarTaH:kaNk:01:0099:A:sew:क॑किँ॒:73:72:74:kafk1_kakiz_BvAxiH+gawyarWaH:","kaca!:banDane:kac:01:0192:A:sew:क॑चँ॒:94:98:100:kac1_kacaz_BvAxiH+banXane:","kaja!:made ityeke:kaj:01:0265:pa:sew:क॑जँ॑::138:::","kaci!:dIptibanDanayoH:kaYc:01:0193:A:sew:क॑चिँ॒:95:99:101:kaFc1_kaciz_BvAxiH+xIpwibanXanayoH:","kawI!:gatO:kaw:01:0330:pa:sew:क॑टीँ॑:200:210::kat2_katIz_BvAxiH+gawO:","kawe!:varzAvaraRayoH:kaw:01:0359:pa:sew:क॑टेँ॑:180:189:189:kat1_katez_BvAxiH+varRAvaraNayoH:","kaWa!:kfcCrajIvane:kaW:01:0385:pa:sew:क॑ठँ॑:210:222:222:kaT1_kaTaz_BvAxiH+kqcCrajIvane:","kaqa!:made:kaq:06:0108:pa:sew:क॑डँ॑:989:1010:1032:kad2_kadaz_wuxAxiH+maxe:","kaqa!:made:kaq:01:0417:pa:sew:क॑डँ॑:231::243:kad1_kadaz_BvAxiH+maxe:","kaqqa!:kArkaSye:kaqq:01:0404:pa:sew:क॑ड्डँ॑:223:244:244:kadd1_kaddaz_BvAxiH+kArkaSye:","kaRa!:gatO:kaR:01:0517:pa:sew:क॑णँ॑:277,489:290,513:293,518:kaN2_kaNaz_BvAxiH+gawO:","kaRa!:SabdArTaH:kaR:01:0903:pa:sew:क॑णँ॑:277,489:290,513:293,518:kaN2_kaNaz_BvAxiH+gawO:","kaRa!:nimIlane:kaR:10:0240:u:sew:क॑णँ॑:1287:1306:1339:kaN3_kaNaz_curAxiH+nimIlane:","kaWi!:Soke:kaRW:01:0297:A:sew:क॑ठिँ॒:153:160:162::","kaWi!:Soke prAyeRotpUrva utkaRWAvacanaH:kaRW:10:0385:u:sew:क॑ठिँ॑:1362:1378:1415:kaNT2_kaTiz_curAxiH+Soke:","kaqi!:made ityeke:kaRq:01:0418:pa:sew:क॑डिँ॑::179,243:176:kaNd1_kadiz_BvAxiH+maxe,kaNd2_kadiz_BvAxiH+maxe:","kaqi!:KaRqane Bedane:kaRq:10:0067:u:sew:क॑डिँ॑:1171::1227:kaNd3_kadiz_curAxiH+Bexane:","kaqi!:made:kaRq:01:0316:A:sew:क॑डिँ॒::179,243:176:kaNd1_kadiz_BvAxiH+maxe,kaNd2_kadiz_BvAxiH+maxe:","katTa!:SlAGAyAm:katT:01:0037:A:sew:क॑त्थँ॒:29:30:31:kawW1_kawWaz_BvAxiH+SlAGAyAm:26","katra:SETilye:katra:10:0456:u:sew:क॑त्र॑:1417::1473:kawra1_kawra_curAxiH+SEWilye:","kaTa:vAkyaprabanDe vAkyaprabanDane:kaTa:10:0389:u:sew:क॑थ॑:1366::1420:kaWa1_kaWa_curAxiH+vAkyaprabanXe:237","kada!:vEklavye vEkalya ityeke ityanye:kad:01:0881:A:sew:क॑दँ॒:57,475:56,498:58,503::","kanI!:dIptikAntigatizu:kan:01:0531:pa:sew:क॑नीँ॑:284:297:300:kan1_kanIz_BvAxiH+xIpwikAnwigawiRu:","kadi!:AhvAne rodane ca:kand:01:0878:pa:sew:क॑दिँ॑:57,475:56,498:58,503:kanx1_kaxiz_BvAxiH+AhvAne_roxane_ca,kanx2_kaxiz_BvAxiH+vEkalye:","kadi!:vEklavye vEkalya ityeke:kand:01:0073:A:sew:क॑दिँ॒:57,475:56,498:58,503:kanx1_kaxiz_BvAxiH+AhvAne_roxane_ca,kanx2_kaxiz_BvAxiH+vEkalye:","kapa!:kfpAyAM gatO ca ityanye:kap:01:0877:A:sew:क॑पँ॒:240:254:255::","kabf!:varRe:kab:01:0440:A:sew:क॑बृँ॒:243:257:258:kab1_kabqz_BvAxiH+varNe:","kamu!:kAntO na mit 1949:kam:01:0511:A:sew:क॑मुँ॒:276:289:292:kam1_kamuz_BvAxiH+kAnwO:164","kapi!:calane:kamp:01:0435:A:sew:क॑पिँ॒:240:254:255:kamp1_kapiz_BvAxiH+calane_kampane_ca:105","karja!:vyaTane:karj:01:0260:pa:sew:क॑र्जँ॑:128:135:136:karj1_karjaz_BvAxiH+vyaWane:","karRa:Bedane iti DAtvantaramityapare:karRa:10:0470:u:sew:क॑र्णँ॑:::::","karta:ityapyeke:karta:10:0457:u:sew:क॑र्तँ॑:::::","karda!:kutsite Sabde:kard:01:0061:pa:sew:क॑र्दँ॑:47:47:49::33","karba!:gatO:karb:01:0486:pa:sew:क॑र्बँ॑:264:279:280:karb1_karbaz_BvAxiH+gawO:","karva!:darpe:karv:01:0664:pa:sew:क॑र्वँ॑:352::373:karv1_karvaz_BvAxiH+xarpe:","kala:gatO saNKyAne ca:kala:10:0404:u:sew:क॑ल॑:1377:1394:1431:kala1_kala_curAxiH+gawO_safKyAne_ca:","kala:kzepe:kala:10:0093:u:sew:क॑ल॑:1377:1394:1431:kala1_kala_curAxiH+gawO_safKyAne_ca:","kala!:SabdasaNKyAnayoH:kal:01:0570:A:sew:क॑लँ॒:304:319:321::116","kalla!:avyakte Sabde aSabda ityeke:kall:01:0571:A:sew:क॑ल्लँ॒:305:320:322:kall1_kallaz_BvAxiH+avyakwe_Sabxe:","kaSa!:gatiSAsanayoH ityanye ityapi:kaS:02:0016:A:sew:क॑शँ॒::::kaS1_kaSaz_axAxiH+gawiSAsanayoH:","kaza!:hiMsArTaH:kaz:01:0781:pa:sew:क॑षँ॑:421:438:447,593:kaR1_kaRaz_BvAxiH+hiMsArWaH:","kasa!:gatiSAsanayoH ityeke:kas:02:0015:A:sew:क॑सँ॒:674:698:712:kas2_kasaz_axAxiH+gawiSAsanayoH:","kasa!:gatO:kas:01:0996:pa:sew:क॑सँ॑:536:557:462,568:kas1_kasaz_BvAxiH+gawO:","kAkzi!:kANkzAyAm:kANkz:01:0760:pa:sew:का॑क्षिँ॑:409:426:435:kAfkR1_kAkRiz_BvAxiH+kAfkRAyAm:165","kAci!:dIptibanDanayoH:kAYc:01:0194:A:sew:का॑चिँ॒:95:::kAFc1_kAciz_BvAxiH+xIpwibanXanayoH:","kAla:kAlopadeSe ca iti pfTagDAturityeke:kAla:10:0422:u:sew:का॑ल॑::::kAla1_kAla_curAxiH+iwi_pqWagXAwuriwyeke:","kASf!:dIptO:kAS:04:0058:A:sew:का॑शृँ॒:803:824:842:kAS2_kASqz_xivAxiH+xIpwO:","kASf!:dIptO:kAS:01:0734:A:sew:का॑शृँ॒:393:410:416:kAS1_kASqz_BvAxiH+xIpwO:152","kAsf!:SabdakutsAyAm:kAs:01:0710:A:sew:का॑सृँ॒:377:393:399:kAs1_kAsqz_BvAxiH+SabxakuwsAyAm:","ki:jYAne:ki:03:0020:pa:aniw:कि॒:749:770:787:ki1_ki_juhowyAxiH+jFAne:","kiwa!:gatO:kiw:01:0338:pa:sew:कि॑टँ॑:186,200:210:195,209:kit1_kitaz_BvAxiH+wrAse:","kiwa!:trAse:kiw:01:0358:pa:sew:कि॑टँ॑:186,200:210:195,209:kit1_kitaz_BvAxiH+wrAse:","kita!:jYAne ca:kit:03:0021:pa:sew:कि॑तँ॑::772:787::","kita!:nivAse rogApanayane ca:kit:01:1148:pa:sew:कि॑तँ॑:643:668:681:kiw1_kiwaz_BvAxiH+nivAse_rogApanayane_ca:291","kila!:SvEtyakrIqanayoH SvEtye:kil:06:0080:pa:sew:कि॑लँ॑:964:986:1007:kil1_kilaz_wuxAxiH+SvEwyakrIdanayoH:","kIwa!:varRe varaRe:kIw:10:0142:u:sew:की॑टँ॑:1221:1236:1273:kIt1_kItaz_curAxiH+varNe:","kIla!:banDane:kIl:01:0602:pa:sew:की॑लँ॑:320:335:337:kIl1_kIlaz_BvAxiH+banXane:293","kuN:Sabde:ku:01:1103:A:aniw:कु॒ङ्:607:633:645:ku1_kuf_BvAxiH+Sabxe:","ku:Sabde:ku:02:0127:pa:aniw:कु॒:692:714:731:ku2_ku_axAxiH+Sabxe:","kuN:Sabde:ku:06:0296:A:aniw:कु॑ङ्:1004:1025:1056::","kuSi!:BAzArTaH:kuMS:10:1103:u:sew:कु॑शिँ॑:1321::1374:kuMS1_kuSiz_curAxiH+BARArWaH:","kuMSa!:saMSlezaRe SlezaRe ityapare:kuMS:04:0294:pa:sew:कुं॑शँ॑:::::","kusi!:BAzArTaH:kuMs:10:0294:u:sew:कु॑सिँ॑:1321::1374:kuMs1_kusiz_curAxiH+BARArWaH:","kuMsa!:saMSlezaRe SlezaRe ityanye:kuMs:04:0127:pa:sew:कुं॑सँ॑:::::","kuka!:AdAne:kuk:01:0096:A:sew:कु॑कँ॒:71:70:72:kuk1_kukaz_BvAxiH+AxAne:","kuca!:Sabde tAre:kuc:01:0211:pa:sew:कु॑चँ॑:533:109,556:111,565:kuc1_kucaz_BvAxiH+Sabxe_wAre,kuc2_kucaz_BvAxiH+samparcanakOtilyaprawiRtamBavileKaneRu:","kuca!:saNkocane:kuc:06:0095:pa:sew:कु॑चँ॑:978:999:1021:kuc3_kucaz_wuxAxiH+safkocane:","kuca!:samparcanakOwilyapratizwamBavileKanezu:kuc:01:0993:pa:sew:कु॑चँ॑:533:109,556:111,565:kuc1_kucaz_BvAxiH+Sabxe_wAre,kuc2_kucaz_BvAxiH+samparcanakOtilyaprawiRtamBavileKaneRu:","kuju!:steyakaraRe:kuj:01:0226:pa:sew:कु॑जुँ॑:109:115:116::","kuYca!:kOwilyAlpIBAvayoH:kuYc:01:0212:pa:sew:कु॑ञ्चँ॑:105:111:112:kuFc1_kuFcaz_BvAxiH+kOtilyAlpI_BAvayoH:65","kuji!:avyakte Sabde:kuYj:01:0255:pa:sew:कु॑जिँ॑:::::","kuwa!:Cedane ityeke:kuw:10:0222:A:sew:कु॑टँ॒:976:997:1019:kut2_kutaz_wuxAxiH+kOtilye:","kuwa!:kOwilye:kuw:06:0093:pa:sew:कु॑टँ॑:976:997:1019:kut2_kutaz_wuxAxiH+kOtilye:","kuwwa!:CedanaBartsanayoH:kuww:10:0034:u:sew:कु॑ट्टँ॑:1154,1275:1169:1208:kutt1_kuttaz_curAxiH+CexanaBarwsanayoH,kutt2_kuttaz_curAxiH+prawApane:","kuwwa!:pratApane:kuww:10:0226:A:sew:कु॑ट्टँ॒:1154,1275:1169:1208:kutt1_kuttaz_curAxiH+CexanaBarwsanayoH,kutt2_kuttaz_curAxiH+prawApane:","kuqa!:bAlye:kuq:06:0113:pa:sew:कु॑डँ॑:992:1011:1036:kud1_kudaz_wuxAxiH+bAlye:","kuRa:AmantraRe:kuRa:10:0435:u:sew:कु॑ण॑:1401:1419:1457:kuNa1_kuNa_curAxiH+AmanwraNe:","kuRa!:SabdopakaraRayoH SabdopatApayoH:kuR:06:0061:pa:sew:कु॑णँ॑:949:972:992:kuN1_kuNaz_wuxAxiH+SabxopakaraNayoH:","kuwi!:vEkalye ityeke:kuRw:01:0363:pa:sew:कु॑टिँ॑:::::","kuWi!:rakzaRe vezwane ca rakzaRa ityeke ityanye:kuRW:10:0070:u:sew:कु॑ठिँ॑::::kuNT2_kuTiz_curAxiH+veRtane_rakRaNe_iwyeke:","kuWi!:ca gatipratiGAte pratiGAte ityeke:kuRW:01:0397:pa:sew:कु॑ठिँ॑:217:230:211,230:kuNT1_kuTiz_BvAxiH+prawiGAwe:100","kuqi!:anftaBAzaRe ityapare:kuRq:10:0068:u:sew:कु॑डिँ॑:1172::1228:kuNd3_kudiz_curAxiH+Bexane:","kuqi!:dAhe:kuRq:01:0303:A:sew:कु॑डिँ॒:159,202:166,212:167,211:kuNd1_kudiz_BvAxiH+xAhe,kuNd2_kudiz_BvAxiH+vEkalye:","kuqi!:rakzaRe:kuRq:10:0009:u:sew:कु॑डिँ॑:1172::1228:kuNd3_kudiz_curAxiH+Bexane:","kuqi!:vEkalye:kuRq:01:0362:pa:sew:कु॑डिँ॑:159,202:166,212:167,211:kuNd1_kudiz_BvAxiH+xAhe,kuNd2_kudiz_BvAxiH+vEkalye:","kutsa!:avakzepane:kuts:10:0220:A:sew:कु॑त्सँ॒:1270:1289:1323:kuws1_kuwsaz_curAxiH+avakRepaNe:443","kuTa!:pUtIBAve:kuT:04:0012:pa:sew:कु॑थँ॑:765:787:804:kuW1_kuWaz_xivAxiH+pUwIBAve:","kudf!:anftaBAzaRe ityeke:kud:10:0008:u:sew:कु॑दृँ॑:::::","kuTi!:hiMsAsaNkleSanayoH:kunT:01:0045:pa:sew:कु॑थिँ॑:35:35:37:kunW1_kuWiz_BvAxiH+hiMsAsaMkleSanayoH:","kunTa!:saMSlezaRe:kunT:09:0050:pa:sew:कु॑न्थँ॑:1115:1131:1168:kunW2_kunWaz_kryAxiH+saMSleRaNe:","kudri!:anftaBAzaRe:kundr:10:0007:u:sew:कु॑द्रिँ॑:1137:1153:1191:kunxr1_kuxriz_curAxiH+anqwaBARaNe:","kupa!:BAzArTaH:kup:10:0146:u:sew:कु॑पँ॑:1321::1374:kup2_kupaz_curAxiH+BARArWaH:","kupa!:kroDe:kup:04:0310:pa:sew:कु॑पँ॑:871:892:911:kup1_kupaz_xivAxiH+kroXe:367","kumAra:krIqAyAm:kumAra:10:0418:u:sew:कु॑मा॑र॑:1387:1404:1442:kumAra1_kumAra_curAxiH+krIdAyAm:","kubi!:AcCAdane CAdane:kumb:10:0157:u:sew:कु॑बिँ॑:1234::1286:kumb2_kubiz_curAxiH+AcCAxane:","kubi!:AcCAdane CAdane:kumb:01:0492:pa:sew:कु॑बिँ॑:265::281,282:kumb1_kubiz_BvAxiH+AcCAxane:","kuBi!:AcCAdane CAdane ityeke:kumB:10:0158:u:sew:कु॑भिँ॑::::kumB1_kuBiz_curAxiH+AcCAxane:","kura!:Sabde:kur:06:0067:pa:sew:कु॑रँ॑:954:977:997:kur1_kuraz_wuxAxiH+Sabxe:","kurda!:krIqAyAmeva:kurd:01:0021:A:sew:कु॑र्द॒:18:19:19:kurx1_kurxaz_BvAxiH+krIdAyAmeva:18","kula!:saMstyAne banDuzu ca:kul:01:0976:pa:sew:कु॑लँ॑:520:539:551:kul1_kulaz_BvAxiH+saMswyAne_banXuRu_ca:","kuSa!:saMSlezaRe SlezaRe ityeke:kuS:04:0126:pa:sew:कु॑शँ॑:::::","kuza!:nizkarze:kuz:09:0054:pa:sew:कु॑षँ॑:1119:1134:1172:kuR1_kuRaz_kryAxiH+niRkarRe:","kusa!:saMSlezaRe SlezaRe:kus:04:0125:pa:sew:कु॑सँ॑:858:878:898:kus1_kusaz_xivAxiH+saMSleRaNe:","kusma!:nAmno vA kutsismayane:kusm:10:0236:A:sew:कु॑स्मँ॒:1284:1302:1335:kusm1_kusmaz_curAxiH+nAmno_vA_kuwsirasmayane:","kuha:vismApane:kuha:10:0443:A:sew:कु॑ह॒:1406:1424:1462:kuha1_kuha_curAxiH+vismApane:","kUN:Sabde ityeke:kU:06:0137:A:sew:कू॑ङ्:::::","kUja!:avyakte Sabde:kUj:01:0254:pa:sew:कू॑जँ॑:124:131:132:kUj1_kUjaz_BvAxiH+avyakwe_Sabxe:73","kUwa:paritApe paridAha ityanye:kUwa:10:0432:u:sew:कू॑ट॑:1400::1456:kUta1_kUta_curAxiH+pariwApe:","kUwa!:apradAne avasAdana ityeke:kUw:10:0225:A:sew:कू॑टँ॒:1400::1456:kUta1_kUta_curAxiH+pariwApe:","kURa:SrAvaRe nimantraRe ca saNkocane'pi:kURa:10:0438:u:sew:कू॑णँ॑:1262:1281:1315:kUN1_kUNaz_curAxiH+safkoce:","kURa!:saNkocane:kUR:10:0211:A:sew:कू॑णँ॒:1262:1281:1315:kUN1_kUNaz_curAxiH+safkoce:","kUla!:AvaraRe:kUl:01:0603:pa:sew:कू॑लँ॑:321:336:338:kUl1_kUlaz_BvAxiH+AvaraNe:","qukfY:karaRe:kf:08:0010:u:aniw:डुकृ॒ञ्:1073:1090:1124:kq3_dukqF_wanAxiH+karaNe:212","kfY:karaRe:kf:01:1048:u:aniw:कृ॒ञ्::591:::","kfY:hiMsAyAm:kf:05:0007:u:aniw:कृ॒ञ्:888:909:928:kq2_kqF_svAxiH+hiMsAyAm:437","kfqa!:Ganatve:kfq:06:0112:pa:sew:कृ॑डँ॑:991:1012::kqd1_kqdaz_wuxAxiH+Ganawve:","kfvi!:hiMsAkaraRayoSca:kfRv:01:0682:pa:sew:कृ॑विँ॑:358:375:379:kqNv1_kqviz_BvAxiH+hiMsAkaraNayoSca:","kftI!:Cedane:kft:06:0171:pa:sew:कृ॑तीँ॑:1036:1055:1088:kqw1_kqwIz_wuxAxiH+Cexane:417","kftI!:vezwane:kft:07:0010:pa:sew:कृ॑तीँ॑:1048:1067:1100:kqw2_kqwIz_ruXAxiH+veRtane:","kfpa:dOrbalye:kfpa:10:0408:u:sew:कृ॑प॑:1380:1397:1434:kqpa3_kqpa_curAxiH+xOrbalye:","kfpa!:avakalkane miSrIkaraRa ityeke cintana ityanye:kfp:10:0278:u:sew:कृपँ॑::::kqp2_kqpaz_curAxiH+avakalkane:","kfpa!:krapa!m kapa!m kfpAyAM gatO ca:kfp:01:0875:A:sew:कृ॑पँ॒:465:487:493::","kfSa!:tanUkaraRe:kfS:04:0140:pa:sew:कृ॑शँ॑:866:886:905:kqS1_kqSaz_xivAxiH+wanUkaraNe:","kfza!:vileKane:kfz:06:0006:u:aniw:कृ॒षँ॒॑:914:935:956:kqR2_kqRaz_wuxAxiH+vileKane:405","kfza!:vileKane:kfz:01:1145:pa:aniw:कृ॒षँ॑:640:665:678:kqR1_kqRaz_BvAxiH+vileKane:166","kF:vikzepe nikzepe:kF:06:0145:pa:sew:कॄ॑:1011:1032:1063:kQ1_kQ_wuxAxiH+vikRepe:","kFY:hiMsAyAm:kF:09:0018:u:sew:कॄ॑ञ्:1086:1103:1137:kQ2_kQF_kryAxiH+hiMsAyAm:","kF:hiMsAyAm:kF:09:0031:pa:sew:कॄ॑:1098:1114:1152::","kFta!:saMSabdane:kFt:10:0155:u:sew:कॄ॑तँ॑:1232:1247:1284:kQw1_kQwaz_curAxiH+saMSabxane:","kfpU!:sAmarTye:kxp:01:0866:A:sew:कृ॑पूँ॒:465:487:493:kqp1_kqpUz_BvAxiH+sAmarWye:167","keta:SrAvaRe nimantraRe ca:keta:10:0437:u:sew:के॑त॑:::1457::","kepf!:kampane ca:kep:01:0426:A:sew:के॑पृँ॒:237:250:251:kep1_kepqz_BvAxiH+kampane:","kelf!:calane:kel:01:0616:pa:sew:के॑लृँ॑::346:348::","kevf!:sevane ityapyeke:kev:01:0583:A:sew:के॑वृँ॒::322:::","kE:Sabde:kE:01:1064:pa:aniw:कै॒:580:604:616::","knaTa!:hiMsArTaH:knaT:01:0911:pa:sew:क्न॑थँ॑:::::","knasu!:hvaraRadIptyoH mit 1939:knas:04:0007:pa:sew:क्न॑सुँ॑:760:782:799:knas2_knasuz_xivAxiH+haraNaxIpwyoH:","knUY:Sabde:knU:09:0012:u:sew:क्नू॑ञ्:1081:1098:1132::","knUyI!:Sabda unde ca:knUy:01:0558:A:sew:क्नू॑यीँ॒:296:311:313:knUy1_knUyIz_BvAxiH+Sabxe_unxe_ca:","kmara!:hUrCane:kmar:01:0636:pa:sew:क्म॑रँ॑:340::360:kmar1_kmaraz_BvAxiH+hUrcCane:","kraTa!:hiMsArTaH:kraT:01:0912:pa:sew:क्र॑थँ॑::515:520:kraW1_kraWaz_BvAxiH+hiMsArWaH:","krada!:vEklavye vEkalya ityeke ityanye:krad:01:0882:A:sew:क्र॑दँ॒:::503::","kradi!:AhvAne rodane ca:krand:01:0879:pa:sew:क्र॑दिँ॑:57,475:56,498:58,503:kranx1_kraxiz_BvAxiH+AhvAne_roxane_ca,kranx2_kraxiz_BvAxiH+vEkalye:39","kradi!:vEklavye vEkalya ityeke:krand:01:0074:A:sew:क्र॑दिँ॒:57,475:56,498:58,503:kranx1_kraxiz_BvAxiH+AhvAne_roxane_ca,kranx2_kraxiz_BvAxiH+vEkalye:39","krapa!:kfpAyAM gatO ca ityeke:krap:01:0876:A:sew:क्र॑पँ॒:474:497:502:krap1_krapaz_BvAxiH+kqpAyAM_gawO_ca:","kramu!:pAdavikzepe:kram:01:0545:pa:sew:क्र॑मुँ॑:290:304:306:kram1_kramuz_BvAxiH+pAxavikRepe:108","qukrIY:dravyavinimaye:krI:09:0001:u:aniw:डुक्री॒ञ्:1074:1091:1125:krI1_dukrIF_kryAxiH+xravyavinimaye:226","krIqf!:vihAre:krIq:01:0405:pa:sew:क्री॑डृँ॑:224:236:236:krId1_krIdqz_BvAxiH+vihAre:101","kruYca!:kOwilyAlpIBAvayoH:kruYc:01:0213:pa:sew:क्रु॑ञ्चँ॑:105:110:112:kruFc1_kruFcaz_BvAxiH+kOtilyAlpI_BAvayoH:","kruqa!:nimajjane ityeke:kruq:06:0128:pa:sew:क्रु॑डँ॑:::1047:krud1_krudaz_wuxAxiH+samvaraNe:","kruDa!:kroDe kope:kruD:04:0086:pa:aniw:क्रु॒धँ॑:830:849:869:kruX1_kruXaz_xivAxiH+kroXe:201","kruSa!:AhvAne rodane ca:kruS:01:0992:pa:aniw:क्रु॒शँ॑:532:553:564:kruS1_kruSaz_BvAxiH+AhvAne_roxane_ca:294","klaTa!:hiMsArTAH:klaT:01:0913:pa:sew:क्ल॑थँ॑:491:515:520:klaW1_klaWaz_BvAxiH+hiMsArWaH:","klada!:vEklavye vEkalya ityeke ityanye:klad:01:0883:A:sew:क्ल॑दँ॒:::503::","kladi!:AhvAne rodane ca:kland:01:0880:pa:sew:क्ल॑दिँ॑:57,475:56,498:58:klanx1_klaxiz_BvAxiH+AhvAne_roxane_ca,klanx2_klaxiz_BvAxiH+vEkalye_vEkalye_iwyeke:13","kladi!:vEklavye vEkalya ityeke ityanye:kland:01:0075:A:sew:क्ल॑दिँ॒:57,475:56,498:58:klanx1_klaxiz_BvAxiH+AhvAne_roxane_ca,klanx2_klaxiz_BvAxiH+vEkalye_vEkalye_iwyeke:13","klapa!:vyaktAyAM vAci ityeke:klap:10:0162:u:sew:क्ल॑पँ॑:::::","klamu!:glAnO:klam:04:0104:pa:sew:क्ल॑मुँ॑:848:867:887:klam1_klamuz_xivAxiH+glAnO:","klidU!:AdrIBAve:klid:04:0157:pa:sew:क्लि॑दूँ॑:877:898:917:klix1_klixUz_xivAxiH+ArxrIBAve:","klidi!:paridevane:klind:01:0015:A:sew:क्लि॑दिँ॒:14,58:14,57:14,59:klinx1_klixiz_BvAxiH+parixevane,klinx2_klixiz_BvAxiH+parixevane:40","klidi!:paridevane:klind:01:0076:pa:sew:क्लि॑दिँ॑:14,58:14,57:14,59:klinx1_klixiz_BvAxiH+parixevane,klinx2_klixiz_BvAxiH+parixevane:40","kliSa!:upatApe:kliS:04:0057:A:sew:क्लि॑शँ॒:802:823:841:kliS1_kliSaz_xivAxiH+upawApe:368","kliSU!:vibADane:kliS:09:0058:pa:sew:क्लि॑शूँ॑:1122:1137:1175:kliS2_kliSUz_kryAxiH+vibAXane:434","klIbf!:aDArzWye:klIb:01:0441:A:sew:क्ली॑बृँ॒:244:258:259:klIb1_klIbqz_BvAxiH+aXArRtye:106","kluN:gatO ityeke:klu:01:1113:A:aniw:क्लु॒ङ्:::::","kleSa!:avyaktAyAM vAci bADana ityanye iti durgaH:kleS:01:0691:A:sew:क्ले॑शँ॒:366::387:kleS1_kleSaz_BvAxiH+avyakwAyAM_vAci_bAXana_iwyanye:","kvaRa!:SabdArTaH:kvaR:01:0518:pa:sew:क्व॑णँ॑:277:290:293:kvaN1_kvaNaz_BvAxiH+SabxArWaH:","kvaTe!:nizpAke:kvaT:01:0981:pa:sew:क्व॑थेँ॑:522:542:554:kvaW1_kvaWez_BvAxiH+niRpAke:","kzaji!:kfcCrajIvane:kzaYj:10:0113:u:sew:क्ष॑जिँ॑:1204:1220:1259::","kzaji!:gatidAnayoH:kzaYj:01:0873:A:sew:क्ष॑जिँ॒:472:495:500:kRaFj1_kRajiz_BvAxiH+gawixAnayoH:","kzaRu!:hiMsAyAm:kzaR:08:0003:u:sew:क्ष॑णुँ॒॑:1066:1084:1117:kRaN1_kRaNuz_wanAxiH+hiMsAyAm:214","kzapa:preraRe:kzapa:10:0487:u:sew:क्ष॑पँ॑:1203:1219:1258::","kzapa!:mit iti BojaH:kzap:01:0935:pa:sew:क्ष॒प॑य॒॑श्च॑:1203:1219:1258::","kzamU!:sahane:kzam:04:0103:pa:sew:क्ष॑मूँ॑:847::886::","kzamU!z:sahane:kzam:01:0510:A:sew:क्ष॑मूँ॒ष्:275:288:291:kRam1_kRamUzR_BvAxiH+sahane:","kzapi!:kzAntyAm:kzamp:10:0112:u:sew:क्ष॑पिँ॑:1203:1219:1258:kRamp1_kRapiz_curAxiH+kRAnwyAm:","kzara!:saYcalane:kzar:01:0986:pa:sew:क्ष॑रँ॑:527:547:559:kRar1_kRaraz_BvAxiH+saFcalane:295","kzala!:SOcakarmaRi:kzal:10:0086:u:sew:क्ष॑लँ॑:1183:1199:1239:kRal1_kRalaz_curAxiH+SOcakarmaNi:240","kzi:kzI' hiMsAyAm kzirBAzAyAmityeke:kzi:05:0033:pa:aniw:क्षि॑:908::950:kRi2_kRi_svAxiH+hiMsAyAm:","kzi:kzaye:kzi:01:0269:pa:aniw:क्षि॒:136:143:144:kRi1_kRi_BvAxiH+kRaye:80","kzi:nivAsagatyoH:kzi:06:0143:pa:aniw:क्षि॒:1009:1030:1061:kRi3_kRi_wuxAxiH+nivAsagawyoH:","kziRu!:hiMsAyAm ca:kziR:08:0004:u:sew:क्षि॑णुँ॒॑:1067::1118:kRiN1_kRiNuz_wanAxiH+hiMsAyAm:","kzipa!:preraRe:kzip:06:0005:u:aniw:क्षि॒पँ॒॑:913:934:955:kRip2_kRipaz_wuxAxiH+preraNe:398","kzipa!:prerane:kzip:04:0015:pa:aniw:क्षि॒पँ॑:768:790:807:kRip1_kRipaz_xivAxiH+preraNe:388","kzivu!:nirasane:kziv:01:0648:pa:sew:क्षि॑वुँ॑:::366::","kzI:hiMsAyAm ityeke kzirBAzAyAmityeke:kzI:05:0039:pa:sew:क्षी॑:::::","kzIja!:avyakte Sabde:kzIj:01:0270:pa:sew:क्षी॑जँ॑:137:144:145:kRIj1_kRIjaz_BvAxiH+avyakwe_Sabxe:","kzIbf!:made:kzIb:01:0442:A:sew:क्षी॑बृँ॒:245:259:260:kRIb1_kRIbqz_BvAxiH+maxe:","kzIvf!:made ityeke:kzIv:01:0443:A:sew:क्षी॑वृँ॒:346:362:::107","kzIz:hiMsAyAm:kzI:09:0042:pa:aniw:क्षी॒ष्:1108::1161::","wukzu:Sabde:kzu:02:0031:pa:sew:टु॑क्षु॑:686:708:725:kRu1_tukRu_axAxiH+Sabxe:","kzudi!r:samprezaRe:kzud:07:0006:u:aniw:क्षु॒दिँ॒॑र्:1044:1063:1096:kRux1_kRuxizr_ruXAxiH+sampreRaNe:","kzuDa!:buBukzAyAm:kzuD:04:0087:pa:aniw:क्षु॒धँ॑:831:850:870:kRuX1_kRuXaz_xivAxiH+buBukRAyAm:","kzuBa!:saYcalane:kzuB:09:0055:pa:sew:क्षु॑भँ॑:1120:1135:1173:kRuB3_kRuBaz_kryAxiH+saMcalane:","kzuBa!:saYcalane:kzuB:04:0154:pa:sew:क्षु॑भँ॑:875:896:915:kRuB2_kRuBaz_xivAxiH+saFcalane:","kzuBa!:saYcalane:kzuB:01:0854:A:sew:क्षु॑भँ॒:457:478:485:kRuB1_kRuBaz_BvAxiH+saFcalane:347","kzura!:vileKane:kzur:06:0070:pa:sew:क्षु॑रँ॑:957:978:1000:kRur1_kRuraz_wuxAxiH+vileKane:","kzura!:saYcaye:kzur:01:0987:pa:sew:क्षु॑रँ॑:::::","kzevu!:nirasane:kzev:01:0649:pa:sew:क्षे॑वुँ॑::::kRev1_kRevuz_BvAxiH+nirasane:","kzE:kzaye:kzE:01:1061:pa:aniw:क्षै॒:579:603:615:kRE1_kRE_BvAxiH+kRaye:","kzowa:kzepe:kzowa:10:0416:u:sew:क्षो॑ट॑:1385::1440:kRota1_kRota_curAxiH+kRepe:","kzRu:tejane:kzRu:02:0032:pa:sew:क्ष्णु॑:687:709:726:kRNu1_kRNu_axAxiH+wejane:","kzmAyI!:viDUnane:kzmAy:01:0559:A:sew:क्ष्मा॑यीँ॒:297:312:314:kRmAy1_kRmAyIz_BvAxiH+viXUnane:","kzmIla!:nimezaRe:kzmIl:01:0598:pa:sew:क्ष्मी॑लँ॑:316::333:kRmIl1_kRmIlaz_BvAxiH+nimeRaNe:","YikzvidA!:snehanamocanayoH gAtraprasravaRe:kzvid:04:0159:A:sew:ञिक्ष्वि॑दाँ॑:879:900:919:kRvix2_FikRvixAz_xivAxiH+snahenamocanayoH:","YikzvidA!:avyakte Sabde:kzvid:01:1133:pa:sew:ञिक्ष्वि॑दाँ॑:629:472,654:667::","kzvelf!:calane:kzvel:01:0618:pa:sew:क्ष्वे॑लृँ॑::346:348::","Kaca!:BUtaprAdurBAve:Kac:09:0067:pa:sew:ख॑चँ॑:1130::1183:Kac1_Kacaz_kryAxiH+BUwaprAxurBAve:","Kaja!:manTe:Kaj:01:0264:pa:sew:ख॑जँ॑:132:139:140:Kaj1_Kajaz_BvAxiH+manWe:","Kaji!:gativEkalye:KaYj:01:0266:pa:sew:ख॑जिँ॑:133:140:141:KaFj1_Kajiz_BvAxiH+gawivEkalye:78","Kawa!:kANkzAyAm:Kaw:01:0346:pa:sew:ख॑टँ॑:191:200:200::","Kawwa!:saMvaraRe:Kaww:10:0127:u:sew:ख॑ट्टँ॑:1215:1228:1266:Katt1_Kattaz_curAxiH+saMvaraNe:","Kaqa!:KaRqane Bedane:Kaq:10:0065:u:sew:ख॑डँ॑:1171:1186:1227:Kad1_Kadaz_curAxiH+Bexane:","Kaqi!:KaRqane Bedane:KaRq:10:0066:u:sew:ख॑डिँ॑:1171:1186:1227:KaNd2_Kadiz_curAxiH+Bexane:438","Kaqi!:manTe:KaRq:01:0317:A:sew:ख॑डिँ॒:172:180:181:KaNd1_Kadiz_BvAxiH+manWe:","Kada!:sTErye hiMsAyAM ca:Kad:01:0052:pa:sew:ख॑दँ॑:39:39:41:Kax1_Kaxaz_BvAxiH+sWErye_hiMsAyAM_BakRaNe_ca:","Kanu!:avadAraRe:Kan:01:1020:u:sew:ख॑नुँ॒॑:550:571:582:Kan1_Kanuz_BvAxiH+avaxAraNe:296","Karja!:vyaTane pUjane ca:Karj:01:0261:pa:sew:ख॑र्जँ॑:129:135,136:137::","Karda!:dandaSUke:Kard:01:0062:pa:sew:ख॑र्दँ॑:48:48:50::","Karba!:gatO:Karb:01:0487:pa:sew:ख॑र्बँ॑:264:279:280:Karb1_Karbaz_BvAxiH+gawO:","Karva!:darpe:Karv:01:0665:pa:sew:ख॑र्वँ॑:352:369:373::","Kala!:saYcalane saYcaye ca:Kal:01:0626:pa:sew:ख॑लँ॑:333:349:350,351::","Kava!:BUtaprAdurBAve ityeke:Kav:09:0068:pa:sew:ख॑वँ॑::1145:::","Kaza!:hiMsArTaH:Kaz:01:0782:pa:sew:ख॑षँ॑:421:::KaR1_KaRaz_BvAxiH+hiMsArWaH:","KAdf!:BakzaRe:KAd:01:0051:pa:sew:खा॑दृँ॑:38:38:40:KAx1_KAxqz_BvAxiH+BakRaNe:28","Kiwa!:trAse:Kiw:01:0339:pa:sew:खि॑टँ॑:186:195:195:Kit1_Kitaz_BvAxiH+wrAse:","Kida!:dEnye:Kid:07:0012:A:aniw:खि॒दँ॒:1050:1069:1102:Kix3_Kixaz_ruXAxiH+xEnye:","Kida!:dEnye:Kid:04:0066:A:aniw:खि॒दँ॒:811::850:Kix1_Kixaz_xivAxiH+xEnye:383","Kida!:pariGAte pariGAtane:Kid:06:0172:pa:aniw:खि॒दँ॑:1037:1056:1089::","KuN:Sabde:Ku:01:1104:A:aniw:खु॒ङ्::::Ku1_Kuf_BvAxiH+Sabxe:","Kuju!:steyakaraRe:Kuj:01:0227:pa:sew:खु॑जुँ॑:109:115:116:Kuj1_Kujuz_BvAxiH+sweyakaraNe:","Kuqa!:saMvaraRe ityeke:Kuq:06:0119:pa:sew:खु॑डँ॑:::::","Kuqi!:KaRqane:KuRq:10:0072:u:sew:खु॑डिँ॑:1174:1189::KuNd1_Kudiz_curAxiH+KaNdane:","Kura!:Cedane:Kur:06:0068:pa:sew:खु॑रँ॑:955:978:998::","Kurda!:krIqAyAmeva:Kurd:01:0022:A:sew:खु॑र्द॒:18::19:Kurx1_Kurxaz_BvAxiH+krIdAyAmeva:","Kewa:BakzaRe:Kewa:10:0413:u:sew:खे॑ट॑:1384:1401:1438:Keta1_Keta_curAxiH+MISSING:","Keqa:BakzaRe ityeke:Keqa:10:0414:u:sew:खे॑डँ॑:::::","Kelf!:calane:Kel:01:0617:pa:sew:खे॑लृँ॑:330:346:348::126","Kevf!:sevane ityapyeke:Kev:01:0581:A:sew:खे॑वृँ॒::322::Kev1_Kevqz_BvAxiH+sevane:","KE:Kadane:KE:01:1060:pa:aniw:खै॒:578:602:614:KE1_KE_BvAxiH+Kaxane:","Kowa:BakzaRe ityanye:Kowa:10:0415:u:sew:खो॑ट॑:::1439::","Korf!:gatipratiGAte:Kor:01:0633:pa:sew:खो॑रृँ॑:338:354:356:Kor1_Korqz_BvAxiH+gawiprawiGAwe:","Kolf!:gatipratiGAte:Kol:01:0632:pa:sew:खो॑लृँ॑:338:354:::","KyA:prakaTane:KyA:02:0055:pa:aniw:ख्या॒:710:732:749:KyA1_KyA_axAxiH+prakaWane:","gaja!:SabdArTaH:gaj:10:0149:u:sew:ग॑जँ॑:1228:1243:1280:gaj2_gajaz_curAxiH+SabxArWaH:","gaja!:SabdArTaH:gaj:01:0279:pa:sew:ग॑जँ॑:143:150,151:151,152:gaj1_gajaz_BvAxiH+Sabxe_maxe_ca:","gaji!:SabdArTaH:gaYj:01:0280:pa:sew:ग॑जिँ॑:143:150:151:gaFj1_gajiz_BvAxiH+SabxArWaH:","gaqa!:secane:gaq:01:0886:pa:sew:ग॑डँ॑:478:501:506:gad1_gadaz_BvAxiH+secane:","gaRa:saNKyAne:gaRa:10:0391:u:sew:ग॑ण॑:1368:1384:1422:gaNa1_gaNa_curAxiH+safKyAne:239","gaqi!:vadanEkadeSe:gaRq:01:0068:pa:sew:ग॑डिँ॑:52,232:245:245:gaNd1_gadiz_BvAxiH+vaxanEkaxeSe,gaNd2_gadiz_BvAxiH+vaxanEkaxeSe:","gaqi!:vadanEkadeSe:gaRq:01:0419:pa:sew:ग॑डिँ॑:52,232:245:245:gaNd1_gadiz_BvAxiH+vaxanEkaxeSe,gaNd2_gadiz_BvAxiH+vaxanEkaxeSe:","gada:devaSabde:gada:10:0399:u:sew:ग॑द॑:1372:1389:1426:gax2_gaxIz_curAxiH+xevaSabxe:","gada!:vyaktAyAM vAci:gad:01:0054:pa:sew:ग॑दँ॑:41:41:43::","ganDa!:ardane:ganD:10:0204:A:sew:ग॑न्धँ॒:1258:1277:1311:ganX1_ganXaz_curAxiH+arxane:","gamx!:gatO:gam:01:1137:pa:aniw:ग॒मॢँ॑:633:658:671:gam1_gamLz_BvAxiH+gawO:","garja!:Sabde:garj:10:0177:u:sew:ग॑र्जँ॑::::garj2_garjaz_curAxiH+aBikAfkRAyAm:","garja!:Sabde:garj:01:0258:pa:sew:ग॑र्जँ॑:126:133:134:garj1_garjaz_BvAxiH+Sabxe:75","garda!:Sabde:gard:01:0059:pa:sew:ग॑र्दँ॑:45:45:47:garx1_garxaz_BvAxiH+Sabxe:31","garda!:Sabde:gard:10:0178:u:sew:ग॑र्दँ॑::1257::garx2_garxaz_curAxiH+aBikAfkRAyAm:","garDa!:aBikANkzAyAm:garD:10:0179:u:sew:ग॑र्धँ॑::1258:1294:garX1_garXaz_curAxiH+aBikAfkRAyAm:","garba!:gatO:garb:01:0488:pa:sew:ग॑र्बँ॑:264:279:280:garb1_garbaz_BvAxiH+gawO:","garva:mAne:garva:10:0449:A:sew:ग॑र्व॒:1411:1429:1467:garva1_garva_curAxiH+mAne:","garva!:darpe:garv:01:0666:pa:sew:ग॑र्वँ॑:352:369:373:garv1_garvaz_BvAxiH+xarpe:297","garha!:kutsAyAm:garh:01:0723:A:sew:ग॑र्हँ॒:387:404:409:garh1_garhaz_BvAxiH+kuwsAyAm:151","garha!:vinindane:garh:10:0383:u:sew:ग॑र्हँ॑:1360::1413:garh2_garhaz_curAxiH+vininxane:","gala!:adane BakzaRe srAve ca:gal:01:0627:pa:sew:ग॑लँ॑:334:350:352,547:gal1_galaz_BvAxiH+axane:","gala!:sravaRe:gal:10:0223:A:sew:ग॑लँ॒:1272:1291::gal2_galaz_curAxiH+sravaNe:","galBa!:DArzwye:galB:01:0457:A:sew:ग॑ल्भँ॒:253:267:268:galB1_galBaz_BvAxiH+XArRtye:","galha!:kutsAyAm:galh:01:0724:A:sew:ग॑ल्हँ॒:387:404:409:galh1_galhaz_BvAxiH+kuwsAyAm:","gaveza:mArgaRe:gaveza:10:0425:u:sew:ग॑वे॑ष॑:1393:1410:1449:gaveRa1_gaveRa_curAxiH+mArgaNe:283","gAN:gatO:gA:01:1101:A:aniw:गा॒ङ्:606:632:644:gA1_gAf_BvAxiH+gawO:","gA:stutO:gA:03:0026:pa:aniw:गा॒:754:777:792:gA2_gA_juhowyAxiH+swuwO:","gADf!:pratizWAlipsayorgranTe ca:gAD:01:0004:A:sew:गा॑धृँ॒:4:4:4::4","gAhU!:viloqane:gAh:01:0736:A:sew:गा॑हूँ॒:395:412:418:gAh1_gAhUz_BvAxiH+vilodane:154","guN:Sabde:gu:01:1105:A:aniw:गु॒ङ्:605:631:643:gu1_guf_BvAxiH+Sabxe:","guN:avyakte Sabde:gu:01:1100:A:aniw:गु॒ङ्:605:631:643:gu1_guf_BvAxiH+Sabxe:","gu:purIzotsarge:gu:06:0134:pa:aniw:गु॒:1002::1054:gu2_gu_wuxAxiH+purIRowsarge:","guja!:avyakte Sabde:guj:01:0230:pa:sew:गु॑जँ॑:111:117:118::","guja!:Sabde:guj:06:0096:pa:sew:गु॑जँ॑:979:1000:1022:guj2_gujaz_wuxAxiH+Sabxe:","guji!:avyakte Sabde:guYj:01:0231:pa:sew:गु॑जिँ॑:111:117:118:guFj1_gujiz_BvAxiH+avyakwe_Sabxe:68","guqa!:rakzAyAm:guq:06:0097:pa:sew:गु॑डँ॑:980:1001,1013:1023:gud1_gudaz_wuxAxiH+rakRAyAm:","guRa:cAmantraRe:guRa:10:0436:u:sew:गु॑ण॑:1401:1419:1457:guNa1_guNa_curAxiH+AmanwraNe:","guWi!:rakzaRe vezwane ca rakzaRa ityeke ityapare:guRW:10:0071:u:sew:गु॑ठिँ॑::1188::guNT1_guTiz_curAxiH+veRtane:","guqi!:rakzaRe vezwane ca rakzaRa ityeke:guRq:10:0069:u:sew:गु॑डिँ॑:1173:1187:1229:guNd1_gudiz_curAxiH+rakRaNe:","guda!:krIqAyAmeva:gud:01:0024:A:sew:गु॑दँ॒:18:19:19:gux1_guxaz_BvAxiH+krIdAyAmeva:","guDa!:parivezwane:guD:04:0014:pa:sew:गु॑धँ॑:767:789:806::","guDa!:roze:guD:09:0053:pa:sew:गु॑धँ॑:1118::1171:guX1_guXaz_kryAxiH+roRe:","gupa!:BAzArTaH:gup:10:0302:u:sew:गु॑पँ॑:872:893:912:gup3_gupaz_xivAxiH+vyAkulawve:","gupa!:gopane:gup:01:1125:A:sew:गु॑पँ॒:620:646:659:gup2_gupaz_BvAxiH+gopane:298","gupU!:rakzaRe:gup:01:0461:pa:sew:गु॑पूँ॑:256:270:271::","gupa!:vyAkulatve:gup:04:0147:pa:sew:गु॑पँ॑:872:893:912:gup3_gupaz_xivAxiH+vyAkulawve:","guPa!:granTe:guP:06:0042:pa:sew:गु॑फँ॑:935:958:978:guP1_guPaz_wuxAxiH+granWe:","gumPa!:granTe:gumP:06:0043:pa:sew:गु॑म्फँ॑:935:958:978:gumP1_gumPaz_wuxAxiH+granWe:399","gurI!:udyamane:gur:06:0131:A:sew:गु॑रीँ॒:999:1020:1051:gur1_gurIz_wuxAxiH+uxyamane:","gurda!:krIqAyAmeva guqakrIqAyAmeva:gurd:01:0023:A:sew:गु॑र्द॒:18:19::gurx1_gurxaz_BvAxiH+krIdAyAmeva:","gurda!:pUrvaniketane niketane ityanye:gurd:10:0180:u:sew:गु॑र्दँ॑:1242:1259::gurx2_gurxaz_curAxiH+pUrva_nikewane:","gurvI!:udyamane:gurv:01:0655:pa:sew:गु॑र्वीँ॑:348:364:368:gurv1_gurvIz_BvAxiH+uxyamane:","guhU!:saMvaraRe:guh:01:1043:u:sew:गु॑हूँ॒॑:566:587:599:guh1_guhUz_BvAxiH+saMvaraNe:","gUra!:udyamane:gUr:10:0217:A:sew:गू॑रँ॒:1268::1321:gUr2_gUraz_curAxiH+uxyamane:","gUrI!:hiMsAgatyoH:gUr:04:0049:A:sew:गू॑रीँ॒:796::835::","gfhU!:grahaRe:gfh:01:0737:A:sew:गृ॑हूँ॒:396::419:gqh1_gqhUz_BvAxiH+grahaNe:155","gf:secane:gf:01:1087:pa:aniw:गृ॒:596:621:634::","gfja!:SabdArTaH gaja! madane ca:gfj:01:0281:pa:sew:गृ॑जँ॑:143:150:151:gqj1_gqjaz_BvAxiH+SabxArWaH:","gfji!:SabdArTaH:gfYj:01:0282:pa:sew:गृ॑जिँ॑:143:150:151:gqFj1_gqjiz_BvAxiH+garjane:","gfDu!:aBikANkzAyAm:gfD:04:0161:pa:sew:गृ॑धुँ॑:881:902:921:gqX1_gqXuz_xivAxiH+aBikAMkRAyAm:","gfha:grahaRe:gfha:10:0441:A:sew:गृ॑ह॒:1404:1422:1460:gqha1_gqha_curAxiH+grahaNe:","gF:nigaraRe:gF:06:0146:pa:sew:गॄ॑:1100:1116:1151:gQ2_gQ_kryAxiH+Sabxe:","gF:vijYAne:gF:10:0231:A:sew:गॄ॑:1012:1033:1064:gQ1_gQ_wuxAxiH+nigaraNe:","gF:Sabde:gF:09:0033:pa:sew:गॄ॑:1100:1116:1151:gQ2_gQ_kryAxiH+Sabxe:","gepf!:kampane ca:gep:01:0427:A:sew:गे॑पृँ॒:237:250:249,251:gep1_gepqz_BvAxiH+kampane:","gevf!:sevane:gev:01:0575:A:sew:गे॑वृँ॒:307::324:gev1_gevqz_BvAxiH+sevane:","gezf!:anvicCAyAm:gez:01:0698:A:sew:गे॑षृँ॒:373:389::geR1_geRqz_BvAxiH+anvicCAyAm:","gE:Sabde:gE:01:1065:pa:aniw:गै॒:580:604:616::299","goma:upalepane:goma:10:0417:u:sew:गो॑म॑:1386:1403:1441:goma1_goma_curAxiH+upalepane:","gozwa!:saNGAte:gozw:01:0290:A:sew:गो॑ष्टँ॒:148:156:157:goRt1_goRtaz_BvAxiH+saMGAwe:","graTi!:kOwilye:granT:01:0036:A:sew:ग्र॑थिँ॒:28:29:29:granW1_graWiz_BvAxiH+kOtilye:","granTa!:banDane:granT:10:0362:u:sew:ग्र॑न्थँ॑:1342,1353:1368:1395,1406:granW3_granWaz_curAxiH+sanxarBe:261","granTa!:sandarBe:granT:10:0375:u:sew:ग्र॑न्थँ॑:1342,1353:1368:1395,1406:granW3_granWaz_curAxiH+sanxarBe:261","granTa!:sandarBe:granT:09:0049:pa:sew:ग्र॑न्थँ॑:1114:1130:1167:granW2_granWaz_kryAxiH+sanxarBe:221","grasu!:adane:gras:01:0717:A:sew:ग्र॑सुँ॒:383:400:405:gras1_grasuz_BvAxiH+axane:148","grasa!:grahaRe:gras:10:0279:u:sew:ग्र॑सँ॑:1318:1337:1371:gras2_grasaz_curAxiH+grahaNe:","graha!:upAdAne:grah:09:0071:u:sew:ग्र॑हँ॒॑:1131:1147:1185:grah1_grahaz_kryAxiH+upAxAne:227","grAma:AmantraRe:grAma:10:0434:u:sew:ग्रा॑म॑:1401::1457:grAma1_grAma_curAxiH+AmanwraNe:","grucu!:steyakaraRe:gruc:01:0224:pa:sew:ग्रु॑चुँ॑:109:115:116:gruc1_grucuz_BvAxiH+sweyakaraNe:","glasu!:adane:glas:01:0718:A:sew:ग्ल॑सुँ॒:383:400:405:glas1_glasuz_BvAxiH+axane:","glaha!:grahaRe ca apAdAne:glah:01:0738:A:sew:ग्ल॑हँ॒::::glah1_glahaz_BvAxiH+grahaNe:","glucu!:steyakaraRe:gluc:01:0225:pa:sew:ग्लु॑चुँ॑:109:115:116:gluc1_glucuz_BvAxiH+sweyakaraNe:","gluYca!:gatO:gluYc:01:0228:pa:sew:ग्लु॑ञ्चँ॑:110:116:117::","glepf!:ca kampane:glep:01:0424:A:sew:ग्ले॑पृँ॒:235,237:248,250:248,251:glep1_glepqz_BvAxiH+xEnye:","glepf!:dEnye:glep:01:0428:A:sew:ग्ले॑पृँ॒:235,237:248,250:248,251:glep1_glepqz_BvAxiH+xEnye:","glevf!:sevane:glev:01:0576:A:sew:ग्ले॑वृँ॒:307:322:324:glev1_glevqz_BvAxiH+sevane:","glezf!:anvicCAyAm ityeke:glez:01:0699:A:sew:ग्ले॑षृँ॑:::393:gleR1_gleRqz_BvAxiH+anvicCAyAm:","glE:harzakzaye mit anupasargAdvA 1945:glE:01:1051:pa:aniw:ग्लै॒:573:594:606:glE1_glE_BvAxiH+harRakRaye:186","GagGa!:hasane ityeke:GagG:01:0180:pa:sew:घ॑ग्घँ॑::91:::","GaGa!:hasane:GaG:01:0179:pa:sew:घ॑घँ॑:86::92:GaG1_GaGaz_BvAxiH+hasane:","Gawa!:BAzArTaH:Gaw:10:0297:u:sew:घ॑टँ॑:1294,1321::1346,1374:Gat2_Gataz_curAxiH+safGAwe,Gat3_Gataz_curAxiH+BARArWaH:","Gawa!:cezwAyAm:Gaw:01:0867:A:sew:घ॑टँ॒:466:488:494:Gat1_Gataz_BvAxiH+ceRtAyAm:300","Gawa!:saNGAte hantyarTASca:Gaw:10:0248:u:sew:घ॑टँ॑:1294,1321::1346,1374:Gat2_Gataz_curAxiH+safGAwe,Gat3_Gataz_curAxiH+BARArWaH:","Gawwa!:calane:Gaww:10:0125:u:sew:घ॑ट्टँ॑:1213:1227:1265:Gatt2_Gattaz_curAxiH+calane:","Gawwa!:calane:Gaww:01:0292:A:sew:घ॑ट्टँ॒:149:157:158:Gatt1_Gattaz_BvAxiH+saMGAwe:84","Gawi!:BAzArTaH:GaRw:10:0298:u:sew:घ॑टिँ॑:1321::1374:GaNt1_Gatiz_curAxiH+BARArWaH:","Gaza!:kAntikaraRe iti kecit:Gaz:01:0740:A:sew:घ॑षँ॒:::::","Gasx!:adane:Gas:01:0812:pa:sew:घ॑सॢँ॑:432:451:::","GiRi!:grahaRe:GiRR:01:0502:A:sew:घि॑णिँ॒:270:283:286:GiNN1_GiNiz_BvAxiH+grahaNe:","GuN:Sabde:Gu:01:0739:A:aniw:घु॒ङ्:607:633:645:Gu1_Guf_BvAxiH+Sabxe:","Guzi!:kAntikaraRe:GuMz:01:1106:A:sew:घु॑षिँ॒:397::421:GuMR1_GuRiz_BvAxiH+kAnwikaraNe:","Guwa!:parivartane:Guw:01:0848:A:sew:घु॑टँ॒:454:474:482:Gut1_Gutaz_BvAxiH+parivarwane:","Guwa!:pratiGAte:Guw:06:0115:pa:sew:घु॑टँ॑:994::1038:Gut2_Gutaz_wuxAxiH+prawiGAwe:","GuRa!:BramaRe:GuR:06:0064:pa:sew:घु॑णँ॑:952:975:995::","GuRa!:BramaRe:GuR:01:0505:A:sew:घु॑णँ॒:271:284:287:GuN1_GuNaz_BvAxiH+grahaNe:","GuRi!:grahaRe:GuRR:01:0503:A:sew:घु॑णिँ॒:270:283:286:GuNN1_GuNiz_BvAxiH+grahaNe:","Gura!:BImArTaSabdayoH:Gur:06:0071:pa:sew:घु॑रँ॑:958:980:1001:Gur1_Guraz_wuxAxiH+BImArWaSabxayoH:","Guzi!r:aviSabdane Sabda ityanye peWuH:Guz:01:0741:pa:sew:घु॑षिँ॑र्:398:415:422:GuR1_GuRizr_BvAxiH+aviSabxane:","Guzi!r:viSabdane:Guz:10:0251:u:sew:घु॑षिँ॑र्:1296::1349:GuR2_GuRizr_curAxiH+viSabxane:","GUrI!:hiMsAvayohanyoH:GUr:04:0050:A:sew:घू॑री॒ँ:797:817:836:GUr1_GUrIz_xivAxiH+hiMsAvayohAnyoH:","GUrRa!:BramaRe:GUrR:06:0065:pa:sew:घू॑र्णँ॑:952:975:995:GUrN2_GUrNaz_wuxAxiH+BramaNe:400","GUrRa!:BramaRe:GUrR:01:0506:A:sew:घू॑र्णँ॒:271:284:287:GUrN1_GUrNaz_BvAxiH+BramaNe:302","Gf:kzaraRadIptyoH:Gf:03:0015:pa:aniw:घृ॒:745:767:783::","Gf:prasravaRe srAvaRa ityeke:Gf:10:0152:u:sew:घृ॑:1229:1244:1281:Gq3_Gq_curAxiH+prasravaNe:","Gf:secane:Gf:01:1088:pa:aniw:घृ॒:596:621:634:Gq1_Gq_BvAxiH+secane:","GfRu!:dIptO:GfR:08:0007:u:sew:घृ॑णुँ॒॑:1070:1087:1121:GqN2_GqNuz_wanAxiH+xIpwO:","GfRi!:grahaRe:GfRR:01:0504:A:sew:घृ॑णिँ॒:270:283:286:GqNN1_GqNiz_BvAxiH+grahaNe:","Gfzu!:saNGarze:Gfz:01:0805:pa:sew:घृ॑षुँ॑:428:447:454:GqR1_GqRuz_BvAxiH+safGarRe:","GrA:ganDopAdAne GrARe:GrA:01:1075:pa:aniw:घ्रा॒:586:610:623:GrA1_GrA_BvAxiH+ganXopAxAne:301","DrAGf!:sAmarTye ityapi kecit:DrAG:01:0121:A:sew:ध्रा॑घृँ॒::76:::","NuN:Sabde:Nu:01:1107:A:aniw:ङु॑ङ्:::645::","cakAsf!:dIptO:cakAs:02:0069:pa:sew:च॑का॑सृँ॑:724:746:763:cakAs1_cakAsqz_axAxiH+xIpwO:","caka!:tfptO:cak:01:0098:pa:sew:च॑कँ॑:72,483:71,505:73,511:cak1_cakaz_BvAxiH+wqpwO_prawiGAwe_ca,cak2_cakaz_BvAxiH+wqpwO:46","caka!:tfptO pratiGAte ca:cak:01:0892:A:sew:च॑कँ॒:72,483:71,505:73,511:cak1_cakaz_BvAxiH+wqpwO_prawiGAwe_ca,cak2_cakaz_BvAxiH+wqpwO:46","cakka!:vyaTane:cakk:10:0084:u:sew:च॑क्कँ॑:1182:1198:1238:cakk1_cakkaz_curAxiH+vyaWane:","cakzi!N:vyaktAyAM vAci ayaM darSane'pi:cakz:02:0007:A:aniw:च॒क्षिँ॒ङ्:667:691:705:cakR1_cakRizf_axAxiH+vyakwAyAM_vAci:","caYcu!:gatyarTaH:caYc:01:0217:pa:sew:च॑ञ्चुँ॑:108:114:115:caFc1_caFcuz_BvAxiH+gawyarWaH:","cawa!:Bedane:caw:10:0246:u:sew:च॑टँ॑:1293:1312:1345:cat2_cataz_curAxiH+Bexane:","cawe!:varzAvaraRayoH ityeke:caw:01:0331:pa:sew:च॑टेँ॑::::cat1_catez_BvAxiH+varRAvaraNayoH:","caRa!:gatO dAne ca:caR:01:0905:pa:sew:च॑णँ॑:490:514:519:caN1_caNaz_BvAxiH+xAne_ca:","caqi!:kope:caRq:01:0312:A:sew:च॑डिँ॒:167:175:178:caNd1_cadiz_BvAxiH+kope:88","caqi!:kope caRqa ityanye:caRq:10:0075:u:sew:च॑डिँ॑::1191:1231:caNd2_cadiz_curAxiH+MISSING:","cate!:pariBAzaRe yAcane ca:cat:01:1003:u:sew:च॑तेँ॒॑:541:562:573:caw1_cawez_BvAxiH+yAcane:","cade!:pariBAzaRe yAcane ca:cad:01:1004:u:sew:च॑देँ॒॑:541:562:573:cax1_caxez_BvAxiH+yAcane:","cana!:ca hiMsArTaH:can:01:0914:pa:sew:च॑नँ॑:492::521::","cana!:SradDopahananayorityeke:can:10:0378:u:sew:च॑नँ॑::::can2_canaz_curAxiH+SraxXopakaraNayoH:","cadi!:AhlAde dIptO ca:cand:01:0071:pa:sew:च॑दिँ॑:55:54:56:canx1_caxiz_BvAxiH+AhlAxe_xIpwO_ca:38","capa!:parikalpane ityeke:cap:10:0121:u:sew:च॑पँ॑:::1263::","capa!:sAntvane:cap:01:0465:pa:sew:च॑पँ॑:259:274:275:cap1_capaz_BvAxiH+sAnwvane:","camu!:adane na mit 1951:cam:01:0540:pa:sew:च॑मुँ॑:289:303:305::","camu!:BakzaRe na mit 1951:cam:05:0540:pa:sew:च॑मुँ॑:907:928:949:cam3_camuz_svAxiH+BakRaNe:","capi!:gatyAm:camp:10:0111:u:sew:च॑पिँ॑:1202::1257:camp1_capiz_curAxiH+gawyAm:","caya!:gatO:cay:01:0550:A:sew:च॑यँ॒:291:305:307:cay1_cayaz_BvAxiH+gawO:","cara!:gatyarTAH caratirBakzaRarTo'pi! cara! BakzaRe ca caratirBakzaRe'pi:car:01:0640:pa:sew:च॑रँ॑:341:357:361:car1_caraz_BvAxiH+gawyarWaH:129","cara!:saMSaye:car:10:0274:u:sew:च॑रँ॑:1314:1327:1360:car2_caraz_curAxiH+saMSaye:","carca!:pariBAzaRaBartsanayoH:carc:06:0019:pa:sew:च॑र्चँ॑:924::967:carc2_carcaz_wuxAxiH+pariBARaNaBarwsanayoH:","carca!:pariBAzaRahiMsAtarjanezu:carc:01:0814:pa:sew:च॑र्चँ॑:433:452:459:carc1_carcaz_BvAxiH+pariBARaNahiMsAwarjaneRu:","carca!:aDyayane:carc:10:0237:u:sew:च॑र्चँ॑:1285:1303:1336:carc3_carcaz_curAxiH+aXyayane:","carba!:gatO carba! adane ca:carb:01:0491:pa:sew:च॑र्बँ॑:264:279:280:carb1_carbaz_BvAxiH+gawO:","carva!:adane:carv:01:0660:pa:sew:च॑र्वँ॑:350:367:371:carv1_carvaz_BvAxiH+axane:135","cala!:kampane kampane caliH mit 1924:cal:01:0966:pa:sew:च॑लँ॑:512:530:541:cal1_calaz_BvAxiH+kampane:303","cala!:BftO:cal:10:0097:u:sew:च॑लँ॑:1193:1209::cal3_calaz_curAxiH+BqwO:","cala!:vilasane:cal:06:0083:pa:sew:च॑लँ॑:967:989:1010:cal2_calaz_wuxAxiH+vilasane:","caza!:BakzaRe:caz:01:1034:u:sew:च॑षँ॒॑:560:581:592:caR1_caRaz_BvAxiH+BakRaNe:","caha:parikalkane:caha:10:0405:u:sew:च॑ह॑:1378::1432:caha1_caha_curAxiH+parikalkane:","caha!:parikalkane:cah:01:0830:pa:sew:च॑हँ॑:442:462:469:cah1_cahaz_BvAxiH+parikalkane:","caha!:parikalpane:caha:10:0120:u:sew:च॑हँ॑:1378::1432:caha1_caha_curAxiH+parikalkane:","cAyf!:pUjAniSAmanayoH:cAy:01:1023:u:sew:चा॑यृँ॒॑:552:573:584:cAy1_cAyqz_BvAxiH+pUjAniSAmanayoH:","ci:BAzArTaH ca:ci:10:0325:u:sew:चि॑:1212:1226::ci3_ci_curAxiH+BARArWaH:","ciY:cayane:ci:10:0005:u:sew:चि॑ञ्:1212:1226::ci2_ciF_curAxiH+cayane:","ciY:cayane:ci:05:0124:u:aniw:चि॒ञ्:886:907:926:ci1_ciF_svAxiH+cayane:206","ciwa!:paraprEzye paraprezye:ciw:01:0353:pa:sew:चि॑टँ॑:197:206:206:cit1_citaz_BvAxiH+parapreRye:94","cita!:saYcetane:cit:10:0192:A:sew:चि॑तँ॒:1250:1269:1303:ciw2_ciwaz_curAxiH+saMcewane:","citI!:saYjYAne:cit:01:0039:pa:sew:चि॑तीँ॑:31:32:33:ciw1_ciwIz_BvAxiH+saMjFAne:27","citra:citrIkaraRe kadAciddarSane:citra:10:0459:u:sew:चि॑त्र॑:1419::1474:ciwra1_ciwra_curAxiH+ciwrIkaraNe:266","citi!:smftyAm:cint:10:0002:u:sew:चि॑तिँ॑:1133:1149:1187:cinw1_ciwiz_curAxiH+smqwyAm:236","ciri:hiMsAyAm:ciri:05:0034:pa:sew:चि॑रि॑:908:929:950:ciri1_ciri_svAxiH+hiMsAyAm:","cila!:vasane:cil:06:0082:pa:sew:चि॑लँ॑:966:988:1009:cil1_cilaz_wuxAxiH+vasane:","cilla!:SETilye BAvakaraRe ca:cill:01:0611:pa:sew:चि॑ल्लँ॑:329:344:346:cill1_cillaz_BvAxiH+SEWilye_BAvakaraNe_ca:","cIka!:AmarzaRe ca:cIk:10:0364:u:sew:ची॑कँ॑:1344::1398:cIk1_cIkaz_curAxiH+AmarRaNe:","cIbf!:AdAnasaMvaraRayoH ityeke:cIb:01:1022:u:sew:ची॑बृँ॒॑:::::","cIBf!:ca katTane:cIB:01:0446:A:sew:ची॑भृँ॒:247:261:262:cIB1_cIBqz_BvAxiH+Sabxe:","cIva!:BAzArTaH:cIv:10:0305:u:sew:ची॑वँ॑:1321::1374:cIv2_cIvaz_curAxiH+BARArWaH:","cIvf!:AdAnasaMvaraRayoH:cIv:01:1021:u:sew:ची॑वृँ॒॑:::583:cIv1_cIvqz_BvAxiH+AxAnasaMvaraNayoH:","cukka!:vyaTane:cukk:10:0085:u:sew:चु॑क्कँ॑:1182:1198:1238:cukk1_cukkaz_curAxiH+vyaWane:","cucya!:aBizave ityeke:cucy:01:0591:pa:sew:चु॑च्यँ॑::::cucy1_cucyaz_BvAxiH+iwyeke:","cuwa!:Cedane:cuw:06:0103:pa:sew:चु॑टँ॑:987:1008:1030:cut1_cutaz_wuxAxiH+Cexane:","cuwa!:Cedane:cuw:10:0104:u:sew:चु॑टँ॑:1197:1252:1253:cut2_cutaz_curAxiH+Cexane:","cuwwa!:alpIBAve:cuww:10:0036:u:sew:चु॑ट्टँ॑:1155:1170:1209:cutt1_cuttaz_curAxiH+alpIBAve:","cuqa!:saMvaraRe:cuq:06:0126:pa:sew:चु॑डँ॑:998:::cud1_cudaz_wuxAxiH+samvaraNe:","cuqqa!:BAvakaraRe:cuqq:01:0402:pa:sew:चु॑ड्डँ॑:221:234:234:cudd1_cuddaz_BvAxiH+BAvakaraNe:","cuwi!:Cedane:cuRw:10:0164:u:sew:चु॑टिँ॑:1237::1289:cuNt1_cutiz_curAxiH+Cexane:","cuqi!:alpIBAve:cuRq:01:0368:pa:sew:चु॑डिँ॑:204:214::cuNd1_cudiz_BvAxiH+alpIBAve:","cuda!:saYcodane:cud:10:0081:u:sew:चु॑दँ॑:1180:1196:1236:cux1_cuxaz_curAxiH+saMcoxane:444","cupa!:mandAyAM gatO:cup:01:0469:pa:sew:चु॑पँ॑:262:277:278::","cubi!:vaktrasaMyoge:cumb:01:0495:pa:sew:चु॑बिँ॑:267:280:283:cumb1_cubiz_BvAxiH+vakwrasaMyoge:304","cubi!:hiMsAyAm:cumb:10:0130:u:sew:चु॑बिँ॑:1216:::cumb2_cubiz_curAxiH+hiMsAyAm:","cura!:steye:cur:10:0001:u:sew:चु॑रँ॑:1132:1148:1186:cur1_curaz_curAxiH+sweye:235","cula!:samucCrAye:cul:10:0091:u:sew:चु॑लँ॑:1188::1244:cul1_culaz_curAxiH+samucCrAye:","culla!:BAvakaraRe:cull:01:0609:pa:sew:चु॑ल्लँ॑:327:342:344:cull1_cullaz_BvAxiH+BAvakaraNe:","cUrI!:dAhe:cUr:04:0053:A:sew:चू॑रीँ॒:799:820:838:cUr1_cUrIz_xivAxiH+xAhe:","cUrRa!:preraRe:cUrR:10:0143:u:sew:चू॑र्णँ॑:1149,1222:1165:1202,1274:cUrN1_cUrNaz_curAxiH+preraNe:241","cUrRa!:saNkocane:cUrR:10:0026:u:sew:चू॑र्णँ॑:1149,1222:1165:1202,1274:cUrN1_cUrNaz_curAxiH+preraNe:241","cUza!:pAne:cUz:01:0767:pa:sew:चू॑षँ॑:411:429:437:cUR1_cURaz_BvAxiH+pAne:305","cftI!:hiMsAgranTanayoH:cft:06:0049:pa:sew:चृ॑तीँ॑:939:962:982:cqw1_cqwIz_wuxAxiH+hiMsASranWanayoH:","cfpa!:sandIpane ityeke:cfp:10:0353:u:sew:चृ॑पँ॑:::::","celf!:calane:cel:01:0615:pa:sew:चे॑लृँ॑:330:346:348::","cezwa!:cezwAyAm:cezw:01:0289:A:sew:चे॑ष्टँ॒:147:155:156:ceRt1_ceRtaz_BvAxiH+ceRtAyAm:83","cyu:hasane sahane cetyeke:cyu:10:0275:u:sew:च्यु॑:1315::1361::","cyuti!r:Asecane:cyut:01:0040:pa:sew:च्यु॑तिँ॑र्:32:33:34:cyuw1_cyuwizr_BvAxiH+Asecane:","Caji!:kfcCrajIvane ityeke:CaYj:10:0114:u:sew:छ॑जिँ॑::::CaFj1_Cajiz_curAxiH+kqcCrajIvane:","Cada:apavAraRe:Cada:10:0481:u:sew:छ॑द॑:::::","Cada!:apavAraRe Cadir Urjane mit 1925:Cada!:10:0359:u:sew:छ॑दँ॑:::::","Cada!:saMvaraRe Cadir Urjane mit 1925:Cada:10:0370:u:sew:छ॑दँ॑:::::","Cadi!:saMvaraRe:Cand:10:0062:u:sew:छ॑दिँ॑:1168::1224:Canx1_Caxiz_curAxiH+saMvaraNe:","Camu!:adane:Cam:01:0541:pa:sew:छ॑मुँ॑:289:303:305:Cam1_Camuz_BvAxiH+axane:","Carda:vamane:Card:10:0078:u:sew:छ॑र्द॑:1178:1194:1234::","Caza!:hiMsAyAm:Caz:01:1035:u:sew:छ॑षँ॒॑:561:582:594:CaR1_CaRaz_BvAxiH+hiMsAyAm:","Cidi!r:dvEDIkaraRe:Cid:07:0003:u:aniw:छि॒दिँ॒॑र्:1041:1060:1093:Cix1_Cixizr_ruXAxiH+xvEXIkaraNe:","Cidra:karRaBedane karaRaBedana ityeke:Cidra:10:0469:u:sew:छि॑द्र॑:1426::1482:Cixra1_Cixra_curAxiH+karNaBexane:","Cuwa!:Cedane:Cuw:06:0105:pa:sew:छु॑टँ॑:987:1008:1030::","Cuqa!:saMvaraRe ityeke:Cuq:06:0120:pa:sew:छु॑डँ॑:::::","Cupa!:sparSe:Cup:06:0154:pa:aniw:छु॒पँ॑:1020:1040:1072:Cup1_Cupaz_wuxAxiH+sparSe:","Cura!:Cedane:Cur:06:0099:pa:sew:छु॑रँ॑:982:1003:1025:Cur1_Curaz_wuxAxiH+Cexane:","u!Cfdi!r:dIptidevanayoH:Cfd:07:0008:u:sew:उँ॑छृ॑दिँ॒॑र्:1046:1065:1098::","CfdI!:sandIpane:Cfd:10:0352:u:sew:छृ॑दीँ॑:1046:1065:1098::","Cfpa!:sandIpane ityeke:Cfp:10:0354:u:sew:छृ॑पँ॑:::::","Ceda:dvEDIkaraRe:Ceda:10:0480:u:sew:छे॑द॑:1435:1453:1491:Cexa1_Cexa_curAxiH+xvEXIkaraNe:","Co:Cedane:Co:04:0041:pa:aniw:छो॒:789:810:828:Co1_Co_xivAxiH+Cexane:","jasi!:rakzaRe mokzaRa ityeke:jaMs:10:0182:u:sew:ज॑सिँ॑:1243:1260:1296:jaMs1_jasiz_curAxiH+rakRaNe:","jakza!:BakzyahasanayoH:jakz:02:0066:pa:sew:ज॑क्षँ॑:721:743:760:jakR1_jakRaz_axAxiH+BakRahasanayoH:","jaja!:yudDe:jaj:01:0275:pa:sew:ज॑जँ॑:140:147:148:jaj1_jajaz_BvAxiH+yuxXe:","jaji!:yudDe:jaYj:01:0276:pa:sew:ज॑जिँ॑:140:147:148::","jawa!:saNGAte:jaw:01:0342:pa:sew:ज॑टँ॑:188:197:197:jat1_jataz_BvAxiH+safGAwe:","jana!:janane mit 1937:jan:03:0025:pa:sew:ज॑नँ॑:753:776:791:jan2_janaz_juhowyAxiH+janane:","janI!:prAdurBAve mit 1937:jan:04:0044:A:sew:ज॑नीँ॒:792:813:831:jan3_janIz_xivAxiH+prAxurBAve:376","japa!:vyaktAyAM vAci japa! mAnase ca:jap:01:0463:pa:sew:ज॑पँ॑:258:272,273:273,274::306","jaBI!:gAtravinAme:jaB:01:0453:A:sew:ज॑भीँ॒:250:::jaB1_jaBIz_BvAxiH+gAwravinAme:","jamu!:adane:jam:01:0542:pa:sew:ज॑मुँ॑:289:303:305:jam1_jamuz_BvAxiH+axane:","jaBi!:nASane:jamB:10:0241:u:sew:ज॑भिँ॑:1288:1307:1340:jamB1_jaBiz_curAxiH+nASane:","jarja!:pariBAzaRaBartsanayoH:jarj:06:0018:pa:sew:ज॑र्जँ॑:924:947::jarj2_jarjaz_wuxAxiH+pariBARANahiMsAwarjaneRu:","jartsa!:pariBAzaRahiMsAtarjanezu:jarts:01:0813:pa:sew:ज॑र्त्सँ॑:::::","jala!:apavAraRe:jal:10:0015:u:sew:ज॑लँ॑:1141:1157:1195:jal2_jalaz_curAxiH+apavAraNe:","jala!:GAtane:jal:01:0967:pa:sew:ज॑लँ॑:513:531:542:jal1_jalaz_BvAxiH+GAwane:","jalpa!:vyaktAyAM vAci:jalp:01:0464:pa:sew:ज॑ल्पँ॑:258:272:273::307","jaza!:hiMsArTaH:jaz:01:0784:pa:sew:ज॑षँ॑:421:438:447:jaR1_jaRaz_BvAxiH+hiMsArWaH:","jasu!:tAqane:jas:10:0243:u:sew:ज॑सुँ॑:1245,1290:1263:1298,1342:jas2_jasuz_curAxiH+hiMsAyAm,jas3_jasuz_curAxiH+wAdane:234","jasu!:mokzane:jas:04:0184:pa:sew:ज॑सुँ॑:852:871:891:jas1_jasuz_xivAxiH+mokRaNe:","jasu!:hiMsAyAm:jas:10:0108:u:sew:ज॑सुँ॑:852:871:891:jas1_jasuz_xivAxiH+mokRaNe:","jAgf:nidrAkzaye:jAgf:02:0067:pa:sew:जा॑गृ॑:722:744:761:jAgq1_jAgq_axAxiH+nixrAkRaye:357","ji:BAzArTaH ca:ji:10:0324:u:sew:जि॑:::::","ji:aBiBave:ji:01:0642:pa:aniw:जि॒:343,603:359,628:363,641:ji1_ji_BvAxiH+jaye:131","ji:jaye:ji:01:1096:pa:aniw:जिँ॒:343,603:359,628:363,641:ji1_ji_BvAxiH+jaye:131","jivi!:prIRanArTAH:jinv:01:0678:pa:sew:जि॑विँ॑:356:373:377:jinv1_jiviz_BvAxiH+prINanArWaH:","jimu!:adane iti kecit:jim:01:0544:pa:sew:जि॑मुँ॑:::::","jiri:hiMsAyAm:jiri:05:0035:pa:sew:जि॑रि॑:908:929:950:jiri1_jiri_svAxiH+hiMsAyAm:","jizu!:secane:jiz:01:0793:pa:sew:जि॑षुँ॑:424:441:450:jiR1_jiRuz_BvAxiH+secane:","jIva!:prARaDAraRe:jIv:01:0643:pa:sew:जी॑वँ॑:344:360:364:jIv1_jIvaz_BvAxiH+prANaXAraNe:132","juN:gatO:ju:01:1098:A:aniw:जु॒ङ्:::::","ju:iti sOtro DAtuH gatyarTaH:ju:01:1110:pa:aniw:जु॒:::::","jugi!:varjane:juNg:01:0176:pa:sew:जु॑गिँ॑:85:89:89:jufg1_jugiz_BvAxiH+varjane:","juci!:BAzArTaH ca:juYc:10:0325:u:sew:जु॑चि॑:::::","juwa!:banDane ityeke:juw:06:0107:pa:sew:जु॑टँ॑:::::","juqa!:gatO:juq:06:0051:u:sew:जु॑डँ॑:1227:1242:1279:jud2_judaz_curAxiH+preraNe:","juqa!:preraRe:juq:10:0148:u:sew:जु॑डँ॑:941,988:1009:984,1031::","juqa!:banDane:juq:06:0106:pa:sew:जु॑डँ॑:941,988:1009:984,1031::","jutf!:BAsaRe:jut:01:0032:A:sew:जु॑तृँ॒:25:26:26::","juna!:gatO ityeke:jun:06:0052:pa:sew:जु॑नँ॑::964:::","juza!:paritarkane paritarpaRa ityanye:juz:10:0008:u:sew:जु॑षँ॑:1350:1365:1403:juR2_juRaz_curAxiH+pariwarkaNe:","juzI!:prItisevanayoH:juz:06:0371:A:sew:जु॑षीँ॒:916:937:958:juR1_juRIz_wuxAxiH+prIwisevanayoH:","jUrI!:hiMsAvayohanyoH:jUr:04:0051:A:sew:जू॑रीँ॒:797:817:836:jUr1_jUrIz_xivAxiH+hiMsAvayohAnyoH:","jUza!:ca hiMsAyAm:jUz:01:0776:pa:sew:जू॑षँ॑:417::443::","jfBi!:gAtravinAme:jfmB:01:0454:A:sew:जृ॑भिँ॒:250:264:265:jqmB1_jqBiz_BvAxiH+gAwravinAme:","jFz:vayohAnO mit 1938:jF:04:0027:pa:sew:जॄ॑ष्:774:796:813:jQ2_jQR_xivAxiH+vayohAnO:","jF:vayohAnO:jF:10:0025:u:sew:जॄ॑:774:796:813::","jF:vayohAnO mit 1938:jF:09:0346:pa:sew:जॄ॑:1095:1112:1146:jQ3_jQ_kryAxiH+vayohAnO:","jezf!:gatO:jez:01:0703:A:sew:जे॑षृँ॒:375:391:397:jeR1_jeRqz_BvAxiH+gawO:","jehf!:prayatne jehf! gatAvapi:jeh:01:0731:A:sew:जे॑हृँ॒:391:408:413::","jE:kzaye:jE:01:1062:pa:aniw:जै॒:579:603:615:jE1_jE_BvAxiH+kRaye:","jYapa!:jYapa! jYAnajYApanamAraRatozaRaniSAnaniSAmanezu:jYap:10:0118:u:sew:ज्ञ॑पँ॑:1207:1222:1261:jFap1_jFapaz_curAxiH+jFAnajFApanamAraNawoRaNaniSAnaniSAmaneRu:","jYA:avaboDane mAraRatozaRaniSAmanezu jYA mit 1923:jYA:09:0258:pa:aniw:ज्ञा॒:1109:1125:1162:jFA2_jFA_kryAxiH+avaboXane:225","jYA:niyoge:jYA:10:0043:u:sew:ज्ञा॑:1302:1322:1355:jFA3_jFA_curAxiH+niyoge:249","jyA:vayohAnO:jyA:09:0034:pa:aniw:ज्या॒:1101:1117:1154:jyA1_jyA_kryAxiH+vayohAnO:433","jyuN:gatO:jyu:01:1109:A:aniw:ज्यु॒ङ्:608:634:646:jyu1_jyuf_BvAxiH+gawO:","jyuti!r:BAsane:jyut:01:0043:pa:sew:ज्यु॑तिँ॑र्:::::","jri:vayohAnO ca:jri:10:0347:u:sew:ज्रि॑::::jri2_jri_curAxiH+vayohAnO:","jri:aBiBave:jri:01:1097:pa:aniw:ज्रि॒:603::641::","jvara!:roge:jvar:01:0885:pa:sew:ज्व॑रँ॑:477:500:505:jvar1_jvaraz_BvAxiH+roge:","jvala!:dIptO mit anupasargAdvA 1941:jval:01:0916:pa:sew:ज्व॑लँ॑:494,511:518,529:523,540:jval1_jvalaz_BvAxiH+xIpwO:308","jvala!:dIptO mit anupasargAdvA 1941:jval:01:0965:pa:sew:ज्व॑लँ॑:494,511:518,529:523,540:jval1_jvalaz_BvAxiH+xIpwO:308","Jawa!:saNGAte:Jaw:01:0343:pa:sew:झ॑टँ॑:188:197:197::","Jamu!:adane:Jam:01:0543:pa:sew:झ॑मुँ॑:289:303:305::","JarJa!:pariBAzaRaBartsanayoH:JarJ:06:0020:pa:sew:झ॑र्झँ॑:924:947:::","Jartsa!:pariBAzaRahiMsAtarjanezu:Jarts:01:0815:pa:sew:झ॑र्त्सँ॑:::::","Jaza!:hiMsArTaH:Jaz:01:0785:pa:sew:झ॑षँ॑:421,562:438,583:447,595:JaR2_JaRaz_BvAxiH+AxAnasaMvaraNayoH:","Jaza!:AdAnasaMvaraRayoH:Jaz:01:1036:u:sew:झ॑षँ॒॑:421,562:438,583:447,595:JaR2_JaRaz_BvAxiH+AxAnasaMvaraNayoH:","JF:vayohAnO ityeke:JF:09:0028:pa:sew:झॄ॑:::::","JFz:vayohAnO:JF:04:0026:pa:sew:झॄ॑ष्:774:796:813::","waki!:banDane:waNk:10:0135:u:sew:ट॑किँ॑:1219:1234:1271:tafk1_takiz_curAxiH+banXane:445","wala!:vEkalye:wal:01:0968:pa:sew:ट॑लँ॑:514:532:543:tal1_talaz_BvAxiH+vEkalye:","wikf!:gatyarTaH:wik:01:0108:A:sew:टि॑कृँ॒:73:72:74:tik1_tikqz_BvAxiH+gawyarWaH:","wIkf!:gatyarTaH:wIk:01:0109:A:sew:टी॑कृँ॒:73:72:74:tIk1_tIkqz_BvAxiH+gawyarWaH:","wvala!:vEkalye:wval:01:0969:pa:sew:ट्व॑लँ॑:514:532:543:tval1_tvalaz_BvAxiH+vEkalye:","qapa!:saNGAte:qap:10:0196:A:sew:ड॑पँ॒:1253::1306:dap1_dapaz_curAxiH+saMGAwe:","qipa!:kzepe:qip:10:0145:u:sew:डि॑पँ॑:1248,1253:1267:1301,1306:dip3_dipaz_curAxiH+kRepe,dip4_dipaz_curAxiH+saMGAwe:","qipa!:kzepe:qip:06:0189:pa:sew:डि॑पँ॑:981:1002:1024:dip2_dipaz_wuxAxiH+kRepe:","qipa!:kzepe:qip:04:0197:pa:sew:डि॑पँ॑:870:890:910::","qipa!:saNGAte:qip:10:0098:A:sew:डि॑पँ॒:1248,1253:1267:1301,1306:dip3_dipaz_curAxiH+kRepe,dip4_dipaz_curAxiH+saMGAwe:","qIN:vihAyasA gatO:qI:04:0030:A:sew:डी॒ङ्:778:800:817::379","qIN:vihAyasA gatO:qI:01:1123:A:sew:डी॑ङ्:618:644:657::","QOkf!:gatyarTaH:QOk:01:0103:A:sew:ढौ॑कृँ॒:73:72:74:DOk1_DOkqz_BvAxiH+gawyarWaH:","tasi!:alaNkAre:taMs:10:0254:u:sew:त॑सिँ॑:1299::1352:waMs1_wasiz_curAxiH+alafkaraNe:","tasi!:alaNkAre:taMs:01:0778:pa:sew:त॑सिँ॑:::::","taka!:hasane:tak:01:0124:pa:sew:त॑कँ॑:78:80:81:wak1_wakaz_BvAxiH+hasane:","takzU!:tanUkaraRe:takz:01:0756:pa:sew:त॑क्षूँ॑:400:417:424:wakR1_wakRUz_BvAxiH+wanUkaraNe:","takza!:tvacane:takz:01:0743:pa:sew:त॑क्षँ॑:407::432:wakR2_wakRaz_BvAxiH+wvacane:","taki!:kfcCrajIvane:taNk:01:0125:pa:sew:त॑किँ॑:79:81:82:wafk1_wakiz_BvAxiH+kqcCrajIvane:51","tagi!:gatyarTaH:taNg:01:0158:pa:sew:त॑गिँ॑:84:87:88:wafg1_wagiz_BvAxiH+gawyarWaH:","taYcu!:gatyarTaH:taYc:01:0218:pa:sew:त॑ञ्चुँ॑:108:114:115:waFc1_waFcuz_BvAxiH+gawyarWaH:","taYcU!:saNkocane:taYc:07:0022:pa:sew:त॑ञ्चूँ॑:1060::1111::","tawa!:ucCrAye:taw:01:0345:pa:sew:त॑टँ॑:190:199:199:wat1_wataz_BvAxiH+ucCrAye:","taqa!:AGAte:taq:10:0064:u:sew:त॑डँ॑:1170:1185:1226:wad1_wadaz_curAxiH+AGAwe:271","taqa!:BAzArTaH ca:taq:10:0332:u:sew:त॑डँ॑:1170:1185:1226:wad1_wadaz_curAxiH+AGAwe:271","taqi!:tAqane:taRq:01:0314:A:sew:त॑डिँ॒:169:177:180:waNd1_wadiz_BvAxiH+wAdane:89","tanu!:vistAre:tan:08:0377:u:sew:त॑नुँ॒॑:1064:1082:1115:wan1_wanuz_wanAxiH+viswAre:213","tanu!:SradDopakaraRayoH upasargAcca dErGye:tan:10:0001:u:sew:त॑नुँ॑:1355:1370:1408:wan2_wanuz_curAxiH+SraxXopakaraNayoH_hanana_iwyanye:","tatri!:kuwumbaDAraRe:tantr:10:0198:A:sew:त॑त्रिँ॒:1254:1273:1307:wanwr1_wawriz_curAxiH+kutumbaXAraNe:","tapa!:dAhe ESverye vA:tap:04:0350:A:aniw:त॒पँ॒:800:821:839:wap2_wapaz_xivAxiH+ESvarye_vA:","tapa!:dAhe:tap:10:0054:u:sew:त॑पँ॑:800:821:839:wap2_wapaz_xivAxiH+ESvarye_vA:","tapa!:santApe:tap:01:1140:pa:aniw:त॒पँ॑:635:660:673:wap1_wapaz_BvAxiH+sanwApe:182","tamu!:kANkzAyAm:tam:04:0099:pa:sew:त॑मुँ॑:843:862:882:wam1_wamuz_xivAxiH+kAfkRAyAm:","taya!:gatO:tay:01:0551:A:sew:त॑यँ॒:291:305,306:307:way1_wayaz_BvAxiH+gawO:","tarka!:BAzArTaH:tark:10:0311:u:sew:त॑र्कँ॑:1321::1374:wark1_warkaz_curAxiH+BARArWaH:440","tarja!:santarjane tarjane:tarj:10:0201:A:sew:त॑र्जँ॒:1257:1276:1310:warj2_warjaz_curAxiH+MISSING:","tarja!:Bartsane:tarj:01:0259:pa:sew:त॑र्जँ॑:127:134:135:warj1_warjaz_BvAxiH+Barwsane:76","tarda!:hiMsAyAm:tard:01:0060:pa:sew:त॑र्दँ॑:46:46:48:warx1_warxaz_BvAxiH+hiMsAyAm:32","tala!:pratizWAyAm:tal:10:0087:u:sew:त॑लँ॑:1184:1200:1240:wal1_walaz_curAxiH+prawiRTAyAm:","tasu!:upakzaye:tas:04:0109:pa:sew:त॑सुँ॑:853:872:892::","tAyf!:santAnapAlanayoH:tAy:01:0562:A:sew:ता॑यृँ॒:299:314:316:wAy1_wAyqz_BvAxiH+saMwAnapAlanayoH:114","tika!:Askandane gatO ca:tik:05:0022:pa:sew:ति॑कँ॑:900:921:941::","tikf!:gatyarTaH:tik:01:0110:A:sew:ति॑कृँ॒:::74:wik1_wikqz_BvAxiH+gawyarWaH:","tiga!:Askandane gatO ca:tig:05:0023:pa:sew:ति॑गँ॑:900:921:941::","tija!:niSAne:tij:01:1126:A:sew:ति॑जँ॒:621:647:660::","tija!:niSAne niSAtane:tij:10:0154:u:sew:ति॑जँ॑:1231:1246:1283:wij2_wijaz_curAxiH+niSAne:","tipf!:kzaraRArTaH:tip:01:0420:A:aniw:ति॒पृँ॒:233:246:246:wip1_wipqz_BvAxiH+kRaraNArWaH:102","tima!:ArdrIBAve:tim:04:0017:pa:sew:ति॑मँ॑:770:792:809:wim1_wimaz_xivAxiH+ArxrIBAve:","tila!:gatO:til:01:0612:pa:sew:ति॑लँ॑:::347:wil1_wilaz_BvAxiH+gawO:","tila!:snehane:til:10:0096:u:sew:ति॑लँ॑:965:987:1008:wil2_wilaz_wuxAxiH+snehane:","tila!:snehane snehe:til:06:0081:pa:sew:ति॑लँ॑:965:987:1008:wil2_wilaz_wuxAxiH+snehane:","tilla!:gatO ityeke:till:01:0613:pa:sew:ति॑ल्लँ॑::345::will1_willaz_BvAxiH+gawO:","tIkf!:gatyarTaH:tIk:01:0111:A:sew:ती॑कृँ॒::::wIk1_wIkqz_BvAxiH+gawyarWaH:","tIma!:ArdrIBAve:tIm:04:0018:pa:sew:ती॑मँ॑::792:::","tIra:karmasamAptO:tIra:10:0454:u:sew:ती॑र॑:1415:1433:1471:wIra1_wIra_curAxiH+karmasamApwO:","tIva!:sTOlye:tIv:01:0646:pa:sew:ती॑वँ॑:345:361:365:wIv1_wIvaz_BvAxiH+sWOlye:","tu:gativfdDihiMsAsu vfdDyarTaH iti sOtro DAtuH:tu:02:0029:pa:aniw:तु॑:::::","tuja!:hiMsAbalAdAnaniketanezu:tuj:10:0044:u:sew:तु॑जँ॑:1159,1321:1174:1214,1374::","tuja!:hiMsAyAm:tuj:01:0277:pa:sew:तु॑जँ॑:141:148:149:wuj1_wujaz_BvAxiH+hiMsAyAm:","tuji!:BAzArTaH:tuYj:10:0285:u:sew:तु॑जिँ॑:1159,1321:1174:1214,1374:wuFj2_wujiz_curAxiH+hiMsAbalAxAnanikewaneRu:","tuji!:hiMsAbalAdAnaniketanezu:tuYj:10:0045:u:sew:तु॑जिँ॑:1159,1321:1174:1214,1374:wuFj2_wujiz_curAxiH+hiMsAbalAxAnanikewaneRu:","tuji!:pAlane:tuYj:01:0278:pa:sew:तु॑जिँ॑:142:148,149:149,150::","tuwa!:kalahakarmaRi:tuw:06:0103:pa:sew:तु॑टँ॑:986:1007:1029:wut1_wutaz_wuxAxiH+kalahakarmaNi:","tuqa!:toqane:tuq:06:0116:pa:sew:तु॑डँ॑:995:1014:1039::","tuqf!:toqane:tuq:01:0406:pa:sew:तु॑डृँ॑:225::237:wud1_wudqz_BvAxiH+wodane:","tuRa!:kOwilye:tuR:06:0058:pa:sew:तु॑णँ॑:946:969:989:wuN1_wuNaz_wuxAxiH+kOtilye:","tuqi!:preraRe:tuRq:10:0166:u:sew:तु॑डिँ॑:::::","tuqi!:toqane:tuRq:01:0309:A:sew:तु॑डिँ॒:165:172:174:wuNd1_wudiz_BvAxiH+wodane:","tutTa:AvaraRe:tutTa:10:0489:u:sew:तु॑त्थ॑:1443::1499:wuwWa1_wuwWa_curAxiH+AvaraNe:","tuda!:vyaTane:tud:06:0001:u:aniw:तु॒दँ॒॑:909:930:951:wux1_wuxaz_wuxAxiH+vyaWane:403","tupa!:hiMsAyAm:tup:06:0032:pa:sew:तु॑पँ॑:932:956:975:wup2_wupaz_wuxAxiH+hiMsAyAm:","tupa!:hiMsArTaH:tup:01:0470:pa:sew:तु॑पँ॑:263:278:279:wup1_wupaz_BvAxiH+hiMsArWaH:","tuPa!:hiMsAyAm:tuP:06:0034:pa:sew:तु॑फँ॑:932:956:975:wuP2_wuPaz_wuxAxiH+hiMsAyAm:","tuPa!:hiMsArTaH:tuP:01:0474:pa:sew:तु॑फँ॑:263:278:279:wuP1_wuPaz_BvAxiH+hiMsArWaH:","tuBa!:hiMsAyAm:tuB:09:0057:pa:sew:तु॑भँ॑:1121:1136:1174:wuB3_wuBaz_kryAxiH+hiMsAyAm:","tuBa!:hiMsAyAm:tuB:04:0156:pa:sew:तु॑भँ॑:876:897:916:wuB2_wuBaz_xivAxiH+hiMsAyAm:","tuBa!:hiMsAyAm:tuB:01:0856:A:sew:तु॑भँ॒:458:479:486:wuB1_wuBaz_BvAxiH+hiMsAyAm:","tumpa!:hiMsAyAm:tump:06:0033:pa:sew:तु॑म्पँ॑:932:956:975:wump2_wumpaz_wuxAxiH+hiMsAyAm:","tumpa!:hiMsArTaH:tump:01:0471:pa:sew:तु॑म्पँ॑:263:278:279:wump1_wumpaz_BvAxiH+hiMsArWaH:","tumPa!:hiMsArTaH:tumP:01:0475:pa:sew:तु॑म्फँ॑:263:278:279:wumP1_wumPaz_BvAxiH+hiMsArWaH:","tumPa!:hiMsAyAm:tumP:06:0035:pa:sew:तु॑म्फँ॑:932:956:975:wumP2_wumPaz_wuxAxiH+hiMsAyAm:","tubi!:adarSane ardana ityeke:tumb:10:0160:u:sew:तु॑बिँ॑:1235:1250:1287:wumb2_wubiz_curAxiH+axarSane_arxane_iwyeke:","tubi!:ardane:tumb:01:0494:pa:sew:तु॑बिँ॑:266:::wumb1_wubiz_BvAxiH+arxane:","tura!:tvaraRe:tur:03:0022:pa:sew:तु॑रँ॑:750:773:788:wur1_wuraz_juhowyAxiH+wvaraNe:","turvI!:hiMsArTaH:turv:01:0651:pa:sew:तु॑र्वी॑:347:363:367:wurv1_wurvIz_BvAxiH+hiMsArWaH:","tula!:unmAne:tul:10:0088:u:sew:तु॑लँ॑:1185:1201:1241:wul1_wulaz_curAxiH+unmAne:448","tuza!:prItO:tuz:04:0081:pa:aniw:तु॒षँ॑:825:844:864:wuR1_wuRaz_xivAxiH+prIwO:","tusa!:Sabde:tus:01:0807:pa:sew:तु॑सँ॑:430:449:456:wus1_wusaz_BvAxiH+Sabxe:","tuhi!r:ardane:tuh:01:0838:pa:sew:तु॑हिँ॑र्::467:474:wuh1_wuhizr_BvAxiH+arxane:","tUqf!:toqane ityeke:tUq:01:0407:pa:sew:तू॑डृँ॑::237:::","tURa!:pUraRe:tUR:10:0212:A:sew:तू॑णँ॒:1263:1282:1316:wUN1_wUNaz_curAxiH+pUraNe:","tUrI!:gatitvaraRahiMsanayoH:tUr:04:0047:A:sew:तू॑रीँ॒:795:816:834:wUr1_wUrIz_xivAxiH+gawiwvaraNahiMsanayoH:","tUla!:nizkarze:tUl:01:0605:pa:sew:तू॑लँ॑:323:338:340:wUl1_wUlaz_BvAxiH+rujAyAm:","tUza!:tuzwO:tUz:01:0768:pa:sew:तू॑षँ॑:412:430:438:wUR1_wURaz_BvAxiH+wuRtO:","tfMhU!:hiMsArTAH:tfMh:06:0077:pa:sew:तृं॑हूँ॑::::wqMh1_wqMhUz_wuxAxiH+hiMsAyAm:","tfkza!:gatO:tfkz:01:0750:pa:sew:तृ॑क्षँ॑:404:421:428:wqkR1_wqkRaz_BvAxiH+gawO:","tfRu!:adane:tfR:08:0006:u:sew:तृ॑णुँ॒॑:1069:1086::wqN1_wqNuz_wanAxiH+axane:215","u!tfdi!r:hiMsAnAdarayoH:tfd:07:0009:u:sew:उँ॑तृ॑दिँ॒॑र्:1047:1066:1099:wqx1_uzwqxizr_ruXAxiH+hiMsAZnAxarayoH:","tfpa!:tfptO:tfp:06:0355:pa:sew:तृ॑पँ॑:931:::wqp3_wqpaz_wuxAxiH+wqpwO:","tfpa!:sandIpane ityeke:tfp:10:0028:u:sew:तृ॑पँ॑:1336::1389:wqp4_wqpaz_curAxiH+wqpwO:","tfpa!:tfptO sandIpana ityeke:tfp:10:0092:u:sew:तृ॑पँ॑:836:855:875::","tfpa!:prIRana ityeke:tfp:05:0351:pa:sew:तृ॑पँ॑:::946:wqp2_wqpaz_svAxiH+MISSING:","tfpa!:prIRane:tfp:06:0028:pa:aniw:तृ॒पँ॑:931:::wqp3_wqpaz_wuxAxiH+wqpwO:","tfPa!:tfptO ityeke:tfP:06:0030:pa:sew:तृ॑फँ॑::955:974::","tfmpa!:tfptO:tfmp:06:0029:pa:sew:तृ॑म्पँ॑:::::","tfmPa!:tfptO ityeke:tfmP:06:0031:pa:sew:तृ॑म्फँ॑:931:955:974::","Yitfza!:pipAsAyAm:tfz:04:0141:pa:sew:ञितृ॑षँ॑:867:887:907:wqR1_FiwqRaz_xivAxiH+pipAsAyAm:","tfhU!:hiMsArTaH:tfh:06:0075:pa:sew:तृ॑हूँ॑:961:983:1004:wqh1_wqhUz_wuxAxiH+hiMsAyAm:","tfha!:hiMsAyAm:tfh:07:0018:pa:sew:तृ॑हँ॑:1056:1075:1108:wqh2_wqhaz_ruXAxiH+hiMsAyAm:","tF:plavanataraRayoH:tF:01:1124:pa:sew:तॄ॑:619:645:658:wQ1_wQ_BvAxiH+plavanawaraNayoH:","teja!:pAlane:tej:01:0263:pa:sew:ते॑जँ॑:131::139:wej1_wejaz_BvAxiH+pAlane:","tepf!:kzaraRArTaH tepf! kampane ca:tep:01:0421:A:sew:ते॑पृँ॒:233,234:246,247:246,247:wep1_wepqz_BvAxiH+kRaraNArWaH:","tevf!:devane:tev:01:0572:A:sew:ते॑वृँ॒:306:321:323:wev1_wevqz_BvAxiH+xevane:","tyaja!:hAnO:tyaj:01:1141:pa:aniw:त्य॒जँ॑:636:661:674::183","trasi!:BAzArTaH:traMs:10:0292:u:sew:त्र॑सिँ॑:1321::1374:wraMs1_wrasiz_curAxiH+BARArWaH:","trakza!:gatO:trakz:01:0748:pa:sew:त्र॑क्षँ॑:::::","traKa!:gatyarTaH ityapi kecit:traK:01:0172:pa:sew:त्र॑खँ॑:::::","traki!:gatyarTaH:traNk:01:0102:A:sew:त्र॑किँ॒:73:72:74:wrafk1_wrakiz_BvAxiH+gawyarWaH:","tragi!:gatyarTaH:traNg:01:0160:pa:sew:त्र॑गिँ॑:::88::","tradi!:cezwAyAm:trand:01:0072:pa:sew:त्र॑दिँ॑:56:55:57:wranx1_wraxiz_BvAxiH+ceRtAyAm:","trapU!z:lajjAyAm mit iti BojaH 0934:trap:01:0434:A:sew:त्र॑पूँ॒ष्:239:253:254:wrap1_wrapUzR_BvAxiH+lajjAyAm:","trasI!:udvege:tras:04:0011:pa:sew:त्र॑सीँ॑:764:786:803:wras1_wrasIz_xivAxiH+uxvege:","trasa!:DAraRe grahaRa ityeke vAraRa ityanye DAraRagrahaRavAraRezu:tras:10:0269:u:sew:त्र॑सँ॑:764:786:803::","triKi!:gatyarTaH ityapi kecit:triNK:01:0173:pa:sew:त्रि॑खिँ॑:::::","truwa!:Cedane:truw:10:0102:A:sew:त्रु॑टँ॒:985:1006:1028:wrut1_wrutaz_wuxAxiH+Cexane:","truwa!:Cedane:truw:06:0221:pa:sew:त्रु॑टँ॑:985:1006:1028:wrut1_wrutaz_wuxAxiH+Cexane:","trupa!:hiMsArTaH:trup:01:0472:pa:sew:त्रु॑पँ॑:263:278:279:wrup1_wrupaz_BvAxiH+hiMsArWaH:","truPa!:hiMsArTaH:truP:01:0476:pa:sew:त्रु॑फँ॑:263::279::","trumpa!:hiMsArTaH:trump:01:0473:pa:sew:त्रु॑म्पँ॑:263:278::wrump1_wrumpaz_BvAxiH+hiMsArWaH:","trumPa!:hiMsArTAH:trumP:01:0477:pa:sew:त्रु॑म्फँ॑:263::279::","trEN:pAlane:trE:01:1120:A:aniw:त्रै॒ङ्:615:641:654:wrE1_wrEf_BvAxiH+pAlane:156","trOkf!:gatyarTaH:trOk:01:0104:A:sew:त्रौ॑कृँ॒:73:72:74:wrOk1_wrOkqz_BvAxiH+gawyarWaH:","tvakzU!:tanUkaraRe:tvakz:01:0744:pa:sew:त्व॑क्षूँ॑:400:417:424:wvakR1_wvakRUz_BvAxiH+wanUkaraNe:","tvagi!:gatyarTaH tvagi! kampane ca:tvaNg:01:0159:pa:sew:त्व॑गिँ॑:84:87,88:88:wvafg1_wvagiz_BvAxiH+gawyarWaH:","tvaca!:saMvaraRe:tvac:06:0021:pa:sew:त्व॑चँ॑:925:948:968:wvac1_wvacaz_wuxAxiH+samvaraNe:","tvaYcu!:gatyarTaH:tvaYc:01:0219:pa:sew:त्व॑ञ्चुँ॑::114:115:wvaFc1_wvaFcuz_BvAxiH+gawyarWaH:","YitvarA!:samBrame:tvar:01:0884:A:sew:ञित्व॑राँ॒:476:499:504:wvar1_FiwvarAz_BvAxiH+saMBrame:","tviza!:dIptO:tviz:01:1156:u:aniw:त्वि॒षँ॒॑:651:675:689:wviR1_wviRaz_BvAxiH+xIpwO:","tsara!:CadmagatO:tsar:01:0635:pa:sew:त्स॑रँ॑:339:356:359:wsar1_wsaraz_BvAxiH+CaxmagawO:","Taki!:gatyarTaH ityapi kecit:TaNk:01:0167:pa:sew:थ॑किँ॑:::::","Tuqa!:saMvaraRe:Tuq:06:0117:pa:sew:थु॑डँ॑:996:1015:1040:Wud1_Wudaz_wuxAxiH+samvaraNe:","TurvI!:hiMsArTaH:Turv:01:0652:pa:sew:थु॑र्वी॑:347::367::","daSi!:BAzArTaH:daMS:10:0295:u:sew:द॑शिँ॑:1251,1321:1271:1304,1374:xaMS2_xaSiz_curAxiH+xaMSane,xaMS3_xaSiz_curAxiH+BARArWaH:256","daSi!:daMSane darSanadaMSanayoH:daMS:10:0193:A:sew:द॑शिँ॒:1251,1321:1271:1304,1374:xaMS2_xaSiz_curAxiH+xaMSane,xaMS3_xaSiz_curAxiH+BARArWaH:256","daMSa!:daSane:daMS:01:1144:pa:aniw:दं॒शँ॑::::xaMS1_xaMSaz_BvAxiH+xaSane:","dasi!:BAzArTaH ca:daMs:10:0317:u:sew:द॑सिँ॑:1252,1322:1272:1305,1374:xaMs1_xasiz_curAxiH+xaMSane,xaMs2_xasiz_curAxiH+BARArWaH:","dasi!:darSanadaMSanayoH:daMs:10:0194:A:sew:द॑सिँ॒:1252,1322:1272:1305,1374:xaMs1_xasiz_curAxiH+xaMSane,xaMs2_xasiz_curAxiH+BARArWaH:","dakza!:gatihiMsanayoH gatiSAsanayoH vfdDO SIGrArTe ca:dakz:01:0874:A:sew:द॑क्षँ॒:367,473:383,496:388,501:xakR1_xakRaz_BvAxiH+vqxXO_SIGrArWe_ca,xakR2_xakRaz_BvAxiH+gawihiMsanayoH:141","dakza!:vfdDO SIGrArTe ca:dakz:01:0692:A:sew:द॑क्षँ॒:367,473:383,496:388,501:xakR1_xakRaz_BvAxiH+vqxXO_SIGrArWe_ca,xakR2_xakRaz_BvAxiH+gawihiMsanayoH:141","daGa!:GAtane pAlane ca:daG:05:0030:pa:sew:द॑घँ॑:906:927:948:xaG1_xaGaz_svAxiH+GAwane_pAlane_ca:","daGi!:pAlane:daNG:01:0181:pa:sew:द॑घिँ॑::90:90::","daRqa:daRqanipAte:daRqa:10:0472:u:sew:द॑ण्ड॑:1428::1484::232","dada!:dAne:dad:01:0017:A:sew:द॑दँ॒:15:16:16:xax1_xaxaz_BvAxiH+xAne:15","daDa!:DAraRe:daD:01:0008:A:sew:द॑धँ॒:7:7:7::7","damu!:upaSame:dam:04:0100:pa:sew:द॑मुँ॑:844:863:883:xam1_xamuz_xivAxiH+upaSame:","damBu!:damBane damBe:damB:05:0026:pa:sew:द॑म्भुँ॑:903:924:944:xamB1_xamBuz_svAxiH+xamBane:","daya!:dAnagatirakzaRahiMsAdAnezu:day:01:0553:A:sew:द॑यँ॒:292:307:309:xay1_xayaz_BvAxiH+xAnagawirakRaNa_hiMsAxAneRu:110","daridrA:durgatO:daridrA:02:0068:pa:sew:द॑रि॑द्रा॑:723:745:762:xarixrA1_xarixrA_axAxiH+xurgawO:","dala!:vidAraRe mit iti BojaH 1929:dal:10:0281:u:sew:द॑लँ॑:1320:1339:1373:xal2_xalaz_curAxiH+vixAraNe:","dala!:viSaraRe mit iti BojaH 1929:dal:01:0629:pa:sew:द॑लँ॑:336:352:354:xal1_xalaz_BvAxiH+viSaraNe:128","dASa!:hiMsAyAm:daS:05:0036:pa:sew:दा॑शँ॑:::::","dasa!:darSanadaMSanayoH ityapyeke:das:10:0110:A:sew:द॑सँ॒:1252,1322:1272:1305,1374::","dasu!:ca upakzaye:das:04:0195:pa:sew:द॑सुँ॑::873:893:xas1_xasuz_xivAxiH+upakRaye:","daha!:BasmIkaraRe:dah:01:1146:pa:aniw:द॒हँ॑:641:666:679:xah1_xahaz_BvAxiH+BasmIkaraNe:312","qudAY:dAne:dA:03:0010:u:aniw:डुदा॒ञ्:740:762:778:xA3_duxAF_juhowyAxiH+xAne:363","dAR:dAne:dA:01:1079:pa:aniw:दा॒ण्:590:614:627:xA1_xAN_BvAxiH+xAne:184","dAp:lavane:dA:02:0054:pa:aniw:दा॒प्:709:731:748:xA2_xAp_axAxiH+lavaNe:","dAna!:KaRqane avaKaRqane:dAn:01:1149:u:sew:दा॑नँ॒॑:644:669:682:xAn1_xAnaz_BvAxiH+KaNdane:","dASf!:dAne:dAS:01:1025:u:sew:दा॑शृँ॒॑:554:575:586:xAS1_xASqz_BvAxiH+xAne:","dAsf!:dAne:dAs:01:1041:u:sew:दा॑सृँ॒॑:564:585:597:xAs1_xAsqz_BvAxiH+xAne:","divi!:prIRanArTaH:dinv:01:0676:pa:sew:दि॑विँ॑:356:373:377:xinv1_xiviz_BvAxiH+prINanArWaH:","divu!:krIqAvijigIzAvyavahAradyutistutimodamadasvapnakAntigatizu:div:04:0249:pa:sew:दि॑वुँ॑:755:778:793:xiv1_xivuz_xivAxiH+krIdAvijigIRAvyavahAraxyuwiswuwimoxamaxasvapnakAnwigawiRu:372","divu!:parikUjane:div:10:0001:A:sew:दि॑वुँ॒:1279:1297,1314:1330,1347:xiv2_xivuz_curAxiH+paripUjane,xiv3_xivuz_curAxiH+marxane:","divu!:mardane:div:10:0230:u:sew:दि॑वुँ॑:1279:1297,1314:1330,1347:xiv2_xivuz_curAxiH+paripUjane,xiv3_xivuz_curAxiH+marxane:","diSa!:atisarjane:diS:06:0003:u:aniw:दि॒शँ॒॑:911:932:953:xiS1_xiSaz_wuxAxiH+awisarjane:","diha!:upacaye:dih:02:0005:u:aniw:दि॒हँ॒॑:665:689:703:xih1_xihaz_axAxiH+upacaye:","dIN:kzaye:dI:04:0029:A:aniw:दी॑ङ्:777:799:816:xI1_xIf_xivAxiH+kRaye:","dIkza!:mORqyejyopanayananiyamavratAdeSezu:dIkz:01:0693:A:sew:दी॑क्षँ॒:368:384:389:xIkR1_xIkRaz_BvAxiH+mONdayejyopanayananiyamavrawAxeSeRu:142","dIDIN:dIptidevanayoH:dIDI:02:0071:A:sew:दी॑धी॑ङ्:726:748:765:xIXI1_xIXIf_axAxiH+xIpwixevanayoH:","dIpI!:dIptO:dIp:04:0045:A:sew:दी॑पीँ॒:793:814:832:xIp1_xIpIz_xivAxiH+xIpwO:373","du:gatO:du:01:1094:pa:aniw:दु॒:602:627:640:xu1_xu_BvAxiH+gawO:","wudu:upatApe:du:05:0476:pa:aniw:टु॑दु॒:891:912:931:xu2_tuxu_svAxiH+upawApe:","duHKa:tatkriyAyAm:duHKa:10:0476:u:sew:दुः॑ख॑:1431:1448:1487:xuHKa1_xuHKa_curAxiH+wawkriyAyAm:","durvI!:hiMsArTaH:durv:01:0653:pa:sew:दु॑र्वीँ॑:347:363:367:xurv1_xurvIz_BvAxiH+hiMsArWaH:","dula!:utkzepe:dul:10:0089:u:sew:दु॑लँ॑:1186:1202:1242:xul1_xulaz_curAxiH+uwkRepe:","duza!:vEkftye:duz:04:0082:pa:aniw:दु॒षँ॑:826:845:865:xuR1_xuRaz_xivAxiH+vEkqwye:","duhi!r:ardane:duh:01:0839:pa:sew:दु॑हिँ॑र्:::474:xuh1_xuhizr_BvAxiH+arxane:","duha!:prapUraRe:duh:02:0004:u:aniw:दु॒हँ॒॑:664:688:702:xuh2_xuhaz_axAxiH+prapUraNe:","dUN:paritApe:dU:04:0028:A:sew:दू॑ङ्:776:798:815:xU1_xUf_xivAxiH+pariwApe:","dfN:Adare:df:06:0147:A:aniw:दृ॒ङ्:1013:1034:1065::","dfhi!:vfdDO:dfMh:01:0835:pa:sew:दृ॑हिँ॑:::::","dfpa!:utkleSe:dfp:06:0036:pa:sew:दृ॑पँ॑::::xqp2_xqpaz_wuxAxiH+uwkaleSe:","dfpa!:sandIpane ityeke:dfp:10:0356:u:sew:दृ॑पँ॑:837:856:876:xqp1_xqpaz_xivAxiH+harRamohanayoH:","dfpa!:harzamohanayoH:dfp:04:0093:pa:aniw:दृ॒पँ॑:837:856:876:xqp1_xqpaz_xivAxiH+harRamohanayoH:","dfPa!:utkleSe ityeke:dfP:06:0038:pa:sew:दृ॑फँ॑:933:957:976::","dfBI!:granTe:dfB:06:0357:pa:sew:दृ॑भीँ॑:938:961:981:xqB1_xqBIz_wuxAxiH+granWe:","dfBI!:Baye granTe:dfB:10:0048:u:sew:दृ॑भीँ॑:938:961:981:xqB1_xqBIz_wuxAxiH+granWe:","dfBa!:sandarBe:dfB:10:0358:u:sew:दृ॑भँ॑:1339::1392:xqB3_xqBaz_curAxiH+sanxarBe:","dfmpa!:utkleSe:dfmp:06:0037:pa:sew:दृ॑म्पँ॑:::::","dfmPa!:utkleSe ityeke:dfmP:06:0039:pa:sew:दृ॑म्फँ॑:933:957:976:xqmP1_xqmPaz_wuxAxiH+uwkaleSe:","dfha!:vfdDO:dfh:01:0834:pa:sew:दृ॑हँ॑:446:465::xqh1_xqhaz_BvAxiH+vqxXO:","dF:Baye:dF:01:0920:pa:sew:दॄ॑:497:521:::","dF:vidAraRe:dF:09:0026:pa:sew:दॄ॑:1094:1111:1145:xQ2_xQ_kryAxiH+vixAraNe:","dF:hiMsAyAm:dF:05:0037:pa:sew:दॄ॑:::::","deN:rakzaRe:de:01:1117:A:aniw:दे॒ङ्:612:638:651:xe1_xef_BvAxiH+rakRaNe:","devf!:devane:dev:01:0573:A:sew:दे॑वृँ॒:306:321:323:xev1_xevqz_BvAxiH+xevane:117","dEp:SoDane:dE:01:1073:pa:aniw:दै॒प्:584:608:621:xE1_xEp_BvAxiH+SoXane:","dfSi!r:prekzaRe:dfS:01:1143:pa:aniw:दृ॒शिँ॑र्:638:663:676:xqS1_xqSizr_BvAxiH+prekRaNe:","do:avaKaRqane:do:04:0043:pa:aniw:दो॒:791:812:830:xo1_xo_xivAxiH+avaKaNdane:","dyu:aBigamane:dyu:02:0035:pa:aniw:द्यु॒:690:712:729:xyu1_xyu_axAxiH+aBigamane:","dyuta!:dIptO:dyut:01:0842:A:sew:द्यु॑तँ॒:449:469:477:xyuw1_xyuwaz_BvAxiH+xIpwO:313","dyE:nyakkaraRe:dyE:01:1053:pa:aniw:द्यै॒:574:596:608:xyE1_xyE_BvAxiH+nyakkaraNe:","drama!:gatO:dram:01:0537:pa:sew:द्र॑मँ॑:288:301:304:xram1_xramaz_BvAxiH+gawO:","drA:kutsAyAM gatO:drA:02:0049:pa:aniw:द्रा॒:704:726:743:xrA1_xrA_axAxiH+kuwsAyAM_gawO:","drAKf!:SozaRAlamarTyoH:drAK:01:0132:pa:sew:द्रा॑खृँ॑:82:85:86::","drAGf!:sAmarTye drAGf! AyAme ca:drAG:01:0120:A:sew:द्रा॑घृँ॒::76,77:77,78::","drAkzi!:kANkzAyAm GoravAsite ca:drANkz:01:0763:pa:sew:द्रा॑क्षिँ॑:410:426,427:436::","drAqf!:viSareRe:drAq:01:0322:A:sew:द्रा॑डृँ॒:175:184:184:xrAd1_xrAdqz_BvAxiH+viSaraNe:","drAhf!:nidrAkzaye nikzepa ityeke:drAh:01:0733:A:sew:द्रा॑हृँ॒:392:409:415:xrAh1_xrAhqz_BvAxiH+nixrAkRaye:","dru:gatO:dru:01:1095:pa:aniw:द्रु॒:602:627:640:xru1_xru_BvAxiH+gawO:","druRa!:hiMsAgatikOwilyezu:druR:06:0063:pa:sew:द्रु॑णँ॑:951:974:994:xruN1_xruNaz_wuxAxiH+hiMsAgawikOtilyeRu:","druha!:jiGAMsAyAm:druh:04:0094:pa:aniw:द्रु॒हँ॑:838:857:877:xruh1_xruhaz_xivAxiH+jiGAMsAyAm:202","drUY:hiMsAyAm:drU:09:0013:u:sew:द्रू॑ञ्:1082:1099:1133::","drekf!:SabdotsAhayoH:drek:01:0083:A:sew:द्रे॑कृँ॒:63:62:64:xrek1_xrekqz_BvAxiH+SabxowsAhayoH:","drE:svapne:drE:01:1054:pa:aniw:द्रै॒:575:597:609:xrE1_xrE_BvAxiH+svapne:","dviza!:aprItO:dviz:02:0003:u:aniw:द्वि॒षँ॒॑:663:687:701:xviR1_xviRaz_axAxiH+aprIwO:","dvf:saMvaraRe varaRe:dvf:01:1083:pa:aniw:द्वृ॒::618:631::","Dakka!:nASane:Dakk:10:0083:u:sew:ध॑क्कँ॑:1181:1197:1237:Xakk1_Xakkaz_curAxiH+vyaWane:","DaRa!:SabdArTaH ityapi kecit:DaR:01:0522:pa:sew:ध॑णँ॑::296::XaN1_XaNaz_BvAxiH+Sabxe:","Dana!:DAnye:Dan:03:0024:pa:sew:ध॑नँ॑:752:775:790:Xan1_Xanaz_juhowyAxiH+XAnye:","Davi!:gatyarTAH:Danv:01:0681:pa:sew:ध॑विँ॑:357:374:378:Xanv1_Xaviz_BvAxiH+gawyarWaH:","quDAY:DAraRapozaRayoH dAna ityapyeke:DA:03:0011:u:aniw:डुधा॒ञ्:741:763:779:XA1_duXAF_juhowyAxiH+XAraNapoRaNayoH:364","DAvu!:gatiSudDyoH:DAv:01:0685:u:sew:धा॑वुँ॒॑:361:378:382:XAv1_XAvuz_BvAxiH+gawiSuxXayoH:138","Di:DAraRe:Di:06:0142:pa:aniw:धि॒:1008:1029:1060:Xi1_Xi_wuxAxiH+XAraNe:","Dikza!:sandIpanakleSanajIvanezu:Dikz:01:0687:A:sew:धि॑क्षँ॒:362:379:383::","Divi!:prIRanArTaH:Dinv:01:0677:pa:sew:धि॑विँ॑:356:373:377:Xinv1_Xiviz_BvAxiH+prINanArWaH:","Diza!:Sabde:Diz:03:0023:pa:sew:धि॑षँ॑:751:774:789:XiR1_XiRaz_juhowyAxiH+Sabxe:","DIN:ADAre:DI:04:0031:A:aniw:धी॒ङ्:779:801:818:XI1_XIf_xivAxiH+AXAre:","DU:viDUnane:DU:06:0133:pa:sew:धू॑:1001:1022:1053::","DuY:kampane:Du:05:0009:u:aniw:धु॒ञ्:890::930:Xu1_XuF_svAxiH+kampane:","Dukza!:sandIpanakleSanajIvanezu:Dukz:01:0686:A:sew:धु॑क्षँ॒:362:379:383:XukR1_XukRaz_BvAxiH+saMxIpanakleSanajIvaneRu:","DurvI!:hiMsArTAH:Durv:01:0654:pa:sew:धु॑र्वीँ॑:347:363:367::","DU:viDUnane:DU:06:0020:pa:sew:धू॑:1088:1105:1139::","DUY:kampane ityeke:DU:05:0133:u:aniw:धू॑ञ्::911:::396","DUY:kampane:DU:10:0010:u:sew:धू॑ञ्:1351:1366:1404:XU4_XUF_curAxiH+kampane:","DUY:kampane:DU:09:0372:u:sew:धू॑ञ्:1088:1105:1139::428","DUpa!:BAzArTaH:DUp:10:0303:u:sew:धू॑पँ॑:1321::1374:XUp2_XUpaz_curAxiH+BARArWaH:","DUpa!:santApe:DUp:01:0462:pa:sew:धू॑पँ॑:257:271:272:XUp1_XUpaz_BvAxiH+saMwApe:","DUrI!:hiMsAgatyoH:DUr:04:0048:A:sew:धू॑री॒:796:818:835:XUr1_XUrIz_xivAxiH+hiMsAgawyoH:","DUSa!:kAntikaraRe ityapare:DUS:10:0141:u:sew:धू॑शँ॑:::::","DUza!:kAntikaraRe ityeke:DUz:10:0140:u:sew:धू॑षँ॑::1235:::","DUsa!:kAntikaraRe:DUs:10:0139:u:sew:धू॑सँ॑:1220::1272:XUs1_XUsaz_curAxiH+kAnwikaraNe:","DfN:avaDvaMsane:Df:01:1047:A:aniw:धृ॒ङ्:610:636:649:Xq2_Xqf_BvAxiH+avaXvaMsane:","DfN:avasTAne:Df:06:0148:A:aniw:धृ॒ङ्:1014::1066::","DfY:DAraRe:Df:01:1115:u:aniw:धृ॒ञ्:570::603:Xq1_XqF_BvAxiH+XAraNe:188","Dfja!:gatO:Dfj:01:0249:pa:sew:धृ॑जँ॑:123::131::","Dfji!:gatO:DfYj:01:0250:pa:sew:धृ॑जिँ॑:123::131::","Dfza!:prasahane:Dfz:10:0025:u:sew:धृ॑षँ॑:902:923:943::","YiDfzA!:prAgalBye:Dfz:05:0388:pa:sew:ञिधृ॑षाँ॑:902:923:943:XqR1_FiXqRAz_svAxiH+prAgalBe:","DF:vayohAnO ityanye:DF:09:0029:pa:sew:धॄ॑::::XQ1_XQ_kryAxiH+MISSING:","Dew:pAne:De:01:1050:pa:aniw:धे॒ट्:572:593:605:Xe1_Xet_BvAxiH+pAne:","Depf!:ca gatO:Dep:01:0433:A:sew:धे॑पृँ॒:::::","Dorf!:gaticAturye:Dor:01:0634:pa:sew:धो॑रृँ॑::355:358:Xor1_Xorqz_BvAxiH+gawicAwurye:","DmA:SabdAgnisaMyogayoH:DmA:01:1076:pa:aniw:ध्मा॒:587:611:624:XmA1_XmA_BvAxiH+SabxAgnisaMyogayoH:","DmAkzi!:kANkzAyAm GoravAsite ca ityeke:DmANkz:01:0766:pa:sew:ध्मा॑क्षिँ॑:::::","DyE:cintAyAm:DyE:01:1056:pa:aniw:ध्यै॒::599:611:XyE1_XyE_BvAxiH+cinwAyAm:314","Draja!:gatO:Draj:01:0245:pa:sew:ध्र॑जँ॑:123:130:131::","Draji!:gatO:DraYj:01:0246:pa:sew:ध्र॑जिँ॑:123:130:131::","DraRa!:Sabde:DraR:01:0529:pa:sew:ध्र॑णँ॑:283::299::","u!Drasa!:uGrasa! uYCe:Dras:10:0060:u:sew:उँ॑ध्र॑सँ॑:1124:1139:1177:Xras1_uzXrasaz_kryAxiH+uFCe:","u!Drasa!:uYCe:Dras:09:0270:pa:sew:उँ॑ध्र॒सँ॑:1124:1139:1177:Xras1_uzXrasaz_kryAxiH+uFCe:","DrAKf!:SozaRAlamarTyoH:DrAK:01:0133:pa:sew:ध्रा॑खृँ॑:82:85:86:XrAK1_XrAKqz_BvAxiH+SoRaNAlamarWayoH:","DrAkzi!:kANkzAyAm GoravAsite ca:DrANkz:01:0764:pa:sew:ध्रा॑क्षिँ॑:410:426,427:436:XrAfkR1_XrAkRiz_BvAxiH+GoravAsiwe_AkAfkRAyAm_ca:","DrAqf!:viSareRe:DrAq:01:0323:A:sew:ध्रा॑डृँ॒:175:184:184::","Drija!:gatO ca:Drij:01:0253:pa:sew:ध्रि॑जँ॑:::::","Dru:gatisTEryayoH Druva ityeke:Dru:06:0135:pa:sew:ध्रु॒:1003:1024:1055::","Dru:sTErye:Dru:01:1093:pa:aniw:ध्रु॒:601:626:639:Xru1_Xru_BvAxiH+sWErye:","Drekf!:SabdotsAhayoH:Drek:01:0084:A:sew:ध्रे॑कृँ॒:63::64::","DrE:tfptO:DrE:01:1055:pa:aniw:ध्रै॒::598:610:XrE1_XrE_BvAxiH+wqpwO:","DvaMsu!:avasraMsane DvaMsu! gatO ca:DvaMs:01:0858:A:sew:ध्वं॑सुँ॒::::XvaMs1_XvaMsuz_BvAxiH+avasraMsane:","Dvaja!:gatO:Dvaj:01:0251:pa:sew:ध्व॑जँ॑:123::131:Xvaj1_Xvajaz_BvAxiH+gawO:","Dvaji!:gatO:DvaYj:01:0252:pa:sew:ध्व॑जिँ॑:123:130:131:XvaFj1_Xvajiz_BvAxiH+gawO:","DvaRa!:SabdArTAH:DvaR:01:0521:pa:sew:ध्व॑णँ॑:277:290::XvaN1_XvaNaz_BvAxiH+SabxArWaH:","Dvana:Sabde:Dvana:10:0431:u:sew:ध्व॑न॑:1399:1416:1455:Xvana1_Xvana_curAxiH+Sabxe:","Dvana!:Sabde Sabde mit 1928, 1933:Dvan:01:0933:pa:sew:ध्व॑नँ॑:509:298,527:538:Xvan2_Xvanaz_BvAxiH+Sabxe:315","Dvana!:Sabde Sabde mit 1928, 1933:Dvan:01:0962:pa:sew:ध्व॑नँ॑:509:298,527:538:Xvan2_Xvanaz_BvAxiH+Sabxe:315","DvAkzi!:DmAkzi! kANkzAyAm GoravAsite ca:DvANkz:01:0765:pa:sew:ध्वा॑क्षिँ॑:410:426:436::","Dvf:hUrCane:Dvf:01:1089:pa:aniw:ध्वृ॒:597:622:635:Xvq1_Xvq_BvAxiH+hUrcCane:","nakka!:nASane:nakk:10:0082:u:sew:न॑क्कँ॑:1181:1197:1237:nakk1_nakkaz_curAxiH+nASane:","Rakza!:gatO:nakz:01:0752:pa:sew:ण॑क्षँ॑:404:421:428:nakR1_NakRaz_BvAxiH+gawO:","RaKa!:gatyarTaH:naK:01:0142:pa:sew:ण॑खँ॑:84:87:88:naK1_NaKaz_BvAxiH+gawyarWaH:","RaKi!:gatyarTaH:naNK:01:0143:pa:sew:ण॑खिँ॑:84:87::nafK1_NaKiz_BvAxiH+gawyarWaH:","Rawa!:nftO:naw:01:0347:pa:sew:ण॑टँ॑:192,481:201,504:201,509:nat1_Nataz_BvAxiH+nqwwO,nat2_Nataz_BvAxiH+nqwwO_gawAviwyanye:","nawa!:BAzArTaH ca:naw:10:0322:u:sew:न॑टँ॑:1143,1322:1159:1197:nat3_nataz_curAxiH+avasyanxane:","nawa!:avasyandane:naw:10:0018:u:sew:न॑टँ॑:1143,1322:1159:1197:nat3_nataz_curAxiH+avasyanxane:","Rawa!:nfttO natAvityeke gatAvityanye:naw:01:0890:pa:sew:ण॑टँ॑:192,481:201,504:201,509:nat1_Nataz_BvAxiH+nqwwO,nat2_Nataz_BvAxiH+nqwwO_gawAviwyanye:","Raqa!:BAzArTaH:naq:10:0309:u:sew:ण॑डँ॑:::::","Rada!:avyakte Sabde:nad:01:0056:pa:sew:ण॑दँ॑:43:43:45::","wunadi!:samfdDO:nand:01:0070:pa:sew:टुन॑दिँ॑:54:53:55:nanx1_tunaxiz_BvAxiH+samqxXO:37","RaBa!:hiMsAyAm:naB:09:0056:pa:sew:ण॑भँ॑:1121:1136:1174:naB3_NaBaz_kryAxiH+hiMsAyAm:","RaBa!:hiMsAyAm:naB:04:0155:pa:sew:ण॑भँ॑:876:897:916:naB2_NaBaz_xivAxiH+hiMsAyAm:","RaBa!:hiMsAyAm aBAve'pi:naB:01:0855:A:sew:ण॑भँ॒:458:479:486:naB1_NaBaz_BvAxiH+hiMsAyAm:","Rama!:prahvatve Sabde ca mit anupasargAdvA 1944:nam:01:1136:pa:aniw:ण॒मँ॑:632:657:670::318","Raya!:gatO Raya! rakzaRe ca:nay:01:0552:A:sew:ण॑यँ॒:291:305:307,308:nay1_Nayaz_BvAxiH+gawO:","narda!:Sabde:nard:01:0058:pa:sew:न॑र्दँ॑:45:45:47:narx1_narxaz_BvAxiH+Sabxe:30","nala!:BAzArTaH ca:nal:10:0333:u:sew:न॑लँ॑::::nal2_nalaz_curAxiH+BARArWaH:","Rala!:ganDe banDana ityeke:nal:01:0972:pa:sew:ण॑लँ॑:516:535:546:nal1_Nalaz_BvAxiH+ganXe:","RaSa!:adarSane:naS:04:0091:pa:aniw:ण॒शँ॑:835:854:874:naS1_NaSaz_xivAxiH+axarSane:371","Rasa!:kOwilye:nas:01:0714:A:sew:ण॑सँ॒:380:397:402:nas1_Nasaz_BvAxiH+kOtilye:","Raha!:banDane:nah:04:0062:u:aniw:ण॒हँ॒॑:807:828:846:nah1_Nahaz_xivAxiH+banXane:","nATf!:yAcYopatApESvaryASIzzu:nAT:01:0007:A:sew:ना॑थृँ॒:6:6:6:nAW1_nAWqz_BvAxiH+yAcFopawApESvaryASIHRu:175","nADf!:yAcYopatApESvaryASIzzu:nAD:01:0006:A:sew:ना॑धृँ॒:6:6:::","RAsf!:Sabde:nAs:01:0712:A:sew:णा॑सृँ॒:379:396:401:nAs1_NAsqz_BvAxiH+Sabxe:147","Risi!:cumbane:niMs:02:0017:A:sew:णि॑सिँ॒:675:699:713:niMs1_Nisiz_axAxiH+cumbane:","Rikza!:cumbane:nikz:01:0747:pa:sew:णि॑क्षँ॑:403:420:427:nikR1_NikRaz_BvAxiH+cumbane:","Riji!r:SOcapozaRayoH:nij:03:0012:u:aniw:णि॒जिँ॒॑र्:742:764:780:nij1_Nijizr_juhowyAxiH+SOcapoRaNayoH:","Riji!:SudDO:niYj:02:0018:A:sew:णि॑जिँ॒:676:700:714:niFj1_Nijiz_axAxiH+SuxXO:","Ridf!:kutsAsannikarzayoH:nid:01:1012:u:sew:णि॑दृँ॒॑:545:566:577::","Ridi!:kutsAyAm:nind:01:0069:pa:sew:णि॑दिँ॑:53:52:54:ninx1_Nixiz_BvAxiH+kuwsAyAm:36","Rivi!:secane secane cetyeke:ninv:01:0673:pa:sew:णि॑विँ॑:355:372:376::","Rila!:gahane:nil:06:0087:pa:sew:णि॑लँ॑:971:993:1013:nil1_Nilaz_wuxAxiH+gahane:","nivAsa:AcCAdane:nivAsa:10:0427:u:sew:नि॑वा॑स॑:1395:1412:1451:nivAsa1_nivAsa_curAxiH+AcCAxane:441","RiSa!:samADO:niS:01:0823:pa:sew:णि॑शँ॑:436:455:463:niS1_NiSaz_BvAxiH+samAXO:","Rizu!:secane:niz:01:0796:pa:sew:णि॑षुँ॑:::::","nizka!:parimARe:nizk:10:0209:A:sew:नि॑ष्कँ॒::::niRk1_niRkaz_curAxiH+parimANe:","RIY:prApaRe:nI:01:1049:u:aniw:णी॒ञ्:571:592:604:nI1_NIF_BvAxiH+prApaNe:160","RIla!:varRe:nIl:01:0600:pa:sew:णी॑लँ॑:318:333:335:nIl1_NIlaz_BvAxiH+varNe:","RIva!:sTOlye:nIv:01:0647:pa:sew:णी॑वँ॑:345:361:365:nIv1_NIvaz_BvAxiH+sWOlye:","RU:stutO:nu:06:0132:pa:sew:णू॑:1000:1021:1052:nU1_NU_wuxAxiH+swavane:","Ru:stutO:nu:02:0030:pa:sew:णु॑:685:707:724:nu1_Nu_axAxiH+swuwO:","Ruda!:preraRe:nud:06:0002:pa:aniw:णु॒दँ॑:910,1027:931,1047:952,1079:nux1_Nuxaz_wuxAxiH+preraNe,nux2_Nuxaz_wuxAxiH+preraNe:412","Ruda!:preraRe:nud:06:0162:u:aniw:णु॒दँ॒॑:910,1027:931,1047:952,1079:nux1_Nuxaz_wuxAxiH+preraNe,nux2_Nuxaz_wuxAxiH+preraNe:412","nftI!:gAtravikzepe:nft:04:0010:pa:sew:नृ॑तीँ॑:763:785:802:nqw1_nqwIz_xivAxiH+gAwravikRepe:370","nF:naye:nF:09:0030:pa:sew:नॄ॑:1097:1113:1148:nQ2_nQ_kryAxiH+naye:","nF:naye:nF:01:0921:pa:sew:नॄ॑:498:522:::","Redf!:kutsAsannikarzayoH:ned:01:1013:u:sew:णे॑दृँ॒॑:545:566:577:nex1_Nexqz_BvAxiH+kuwsAsannikarRayoH:","Rezf!:gatO:nez:01:0704:A:sew:णे॑षृँ॒:375:391:::","paSi!:nASane ityeke:paMS:10:0108:u:sew:प॑शिँ॑:1199:1215:1255:paMs1_pasiz_curAxiH+nASane:","pasi!:nASane:paMs:10:0107:u:sew:प॑सिँ॑:1199:1215:1255:paMs1_pasiz_curAxiH+nASane:","pakza!:parigraha ityeke:pakz:01:0757:pa:sew:प॑क्षँ॑:::433::","pakza!:parigrahe:pakz:10:0024:u:sew:प॑क्षँ॑:1148:::pakR2_pakRaz_curAxiH+parigrahe:","qupaca!z:pAke:pac:01:1151:u:aniw:डुप॒चँ॒॑ष्:646:671:684:pac1_dupacazR_BvAxiH+pAke:","paci!:vistAravacane:paYc:10:0153:u:sew:प॑चिँ॑:1230:1245:1282:paFc2_paciz_curAxiH+viswAravacane:","paci!:vyaktIkaraRe:paYc:01:0198:A:sew:प॑चिँ॒:98:102:104::59","pawa:granTe:pawa:10:0394:u:sew:प॑ट:1370:1386:1424:pata1_pata_curAxiH+granWe:","pawa!:BAzArTaH:paw:10:0282:u:sew:प॑टँ॑:1370:1386:1424:pata1_pata_curAxiH+granWe:","pawa!:gatO:paw:01:0333:pa:sew:प॑टँ॑:181:190:190:pat1_pataz_BvAxiH+gawO:","paWa!:vyaktAyAM vAci:paW:01:0381:pa:sew:प॑ठँ॑:208:219:219::99","paRa!:vyavahAre stutO ca:paR:01:0507:A:sew:प॑णँ॒:272:285:288::317","paqi!:nASane:paRq:10:0106:u:sew:प॑डिँ॑:1199:::paNd2_padiz_curAxiH+nASane:","paqi!:gatO:paRq:01:0315:A:sew:प॑डिँ॒:170:178:175:paNd1_padiz_BvAxiH+gawO:","pata:devaSabde gatO vA vAdanta ityeke:pata:10:0400:u:sew:प॑त॑:1373:1390:1427::","patx!:gatO:pat:01:0979:pa:sew:प॑तॢँ॑:521:540:552::316","paTa!:prakzepe ityeke:paT:10:0029:u:sew:प॑थँ॑:1166:1181:1222:paW2_paWaz_curAxiH+prakRepe:","paTe!:gatO:paT:01:0982:pa:sew:प॑थेँ॑::543:555:paW1_paWez_BvAxiH+gawO:","pada:gatO:pada:10:0440:A:sew:प॑द॒:1403:1421:1459:pax2_paxa_curAxiH+gawO:","pada!:gatO:pad:04:0065:A:aniw:प॒दँ॒:810:831:849:pax1_paxaz_xivAxiH+gawO:375","pana!:ca vyavahAre stutO ca:pan:01:0508:A:sew:प॑नँ॒:273:286:289:pan1_panaz_BvAxiH+swuwO:","paTi!:gatO:panT:10:0060:u:sew:प॑थिँ॑:1166:1181:1222:panW1_paWiz_curAxiH+gawO:","paya!:gatO:pay:01:0548:A:sew:प॑यँ॒:291:305::pay1_payaz_BvAxiH+gawO:","parRa:haritaBAve:parRa:10:0485:u:sew:प॑र्ण॑:1439::1495:parNa1_parNa_curAxiH+hariwaBAve:","parda!:kutsite Sabde:pard:01:0029:A:sew:प॑र्दँ॒:23:24:24::23","parpa!:gatO:parp:01:0478:pa:sew:प॑र्पँ॑:264::280:parp1_parpaz_BvAxiH+gawO:","parba!:gatO:parb:01:0482:pa:sew:प॑र्बँ॑:::280:parb1_parbaz_BvAxiH+gawO:","parva!:pUraRe:parv:01:0658:pa:sew:प॑र्वँ॑:264,349:366:370::","pala!:rakzaRe ityeke:pal:10:0099:u:sew:प॑लँ॑::1210:1250::","pala!:gatO:pal:01:0973:pa:sew:प॑लँ॑:517:536:548::","palyUla:lavanapavanayoH:palyUla:10:0423:u:sew:प॑ल्यू॑ल॑:1391:1408:1447:palyUla1_palyUla_curAxiH+lavupavanayoH:","palla!:gatO:pall:01:0621:pa:sew:प॑ल्लँ॑:331:347:349::","paSa!:banDane:paS:10:0244:u:sew:प॑शँ॑:1291:1310:1343,1419:paS1_paSaz_curAxiH+banXane:","paza:anupasargAt gatO:paza:10:0401:u:sew:प॑ष॑:1374::1428::","pA:pAne:pA:01:1074:pa:aniw:पा॒:585:609:622:pA1_pA_BvAxiH+pAne:185","pA:rakzaRe:pA:02:0051:pa:aniw:पा॒:706:728:745:pA2_pA_axAxiH+rakRaNe:356","pAra:karmasamAptO:pAra:10:0453:u:sew:पा॑र॑:1415:1433:1471:pAra1_pAra_curAxiH+karmasamApwO:","pAla!:rakzaRe:pAl:10:0098:u:sew:पा॑लँ॑:1194:::pAl1_pAlaz_curAxiH+rakRaNe:274","pi:gatO:pi:06:0293:pa:aniw:पि॒:1007:1028:1059:pi1_pi_wuxAxiH+gawO:","pisi!:BAzArTaH:piMs:10:0141:u:sew:पि॑सिँ॑:::::","piCa!:kuwwane:piC:10:0061:u:sew:पि॑छँ॑:1167::1223:piC1_piCaz_curAxiH+kuttane:","pija!:hiMsAbalAdAnaniketanezu:pij:10:0046:u:sew:पि॑जँ॑:1159,1321:1174:1214,1374::","piji!:BAzArTaH:piYj:10:0047:u:sew:पि॑जिँ॑:678::716::","piji!:hiMsAbalAdAnaniketanezu:piYj:10:0287:u:sew:पि॑जिँ॑:1159,1321:1174:1214,1374:piFj2_pijiz_curAxiH+hiMsAbalAxAnanikewaneRu,piFj3_pijiz_curAxiH+BARArWaH:","piji!:varRe samparcana ityeke uBayannetyanye avayava ityapare avyakte Sabda itItare:piYj:02:0020:A:sew:पि॑जिँ॒:678::716::","piwa!:SabdasaNGAtayoH:piw:01:0348:pa:sew:पि॑टँ॑:193:202,207:202:pit1_pitaz_BvAxiH+SabxasaMGAwayoH:","piWa!:hiMsAsaNkleSanayoH:piW:01:0393:pa:sew:पि॑ठँ॑:214:227:227::","piWi!:saNGAte ityeke:piRW:10:0186:u:sew:पि॑ठिँ॑:::::","piqi!:saNGAte:piRq:10:0185:u:sew:पि॑डिँ॑:1246:1264:1299:piNd2_pidiz_curAxiH+safGAwe:","piqi!:saNGAte:piRq:01:0307:A:sew:पि॑डिँ॒:163:170:172:piNd1_pidiz_BvAxiH+saMGAwe:87","pivi!:secane secane cetyeke:pinv:01:0671:pa:sew:पि॑विँ॑:355:372:376::","piSa!:nASane:piS:10:0105:u:sew:पि॑शँ॑:1038:1057:1090:piS1_piSaz_wuxAxiH+avayave:","piSa!:avayave ayaM dIpanAyAmapi:piS:10:0173:u:sew:पि॑शँ॑:::::","pizx!:saYcUrRane:piz:07:0015:pa:aniw:पि॒षॢँ॑:1053:1072:1105:piR1_piRLz_ruXAxiH+saMcUrNane:","pisf!:gatO:pis:01:0816:pa:sew:पि॑सृँ॑:434:453:460:pis1_pisqz_BvAxiH+gawO:","pisa!:gatO:pis:10:0050:u:sew:पि॑सँ॑:1160:1175:1215:pis2_pisaz_curAxiH+gawO:","pIN:pAne:pI:04:0036:A:aniw:पी॒ङ्:784:806:823:pI1_pIf_xivAxiH+pAne:","pIqa!:avagAhane:pIq:10:0017:u:sew:पी॑डँ॑:1142:1158:1196:pId1_pIdaz_curAxiH+avagAhane:269","pIla!:pratizwamBe:pIl:01:0599:pa:sew:पी॑लँ॑:317:332:334:pIl1_pIlaz_BvAxiH+prawiRtamBe:","pIva!:sTOlye:pIv:01:0644:pa:sew:पी॑वँ॑:345:361:365:pIv1_pIvaz_BvAxiH+sWOlye:133","puMsa!:aBivarDaRe:puMs:10:0134:u:sew:पुं॑सँ॑:1218:1232:1269:puMs1_puMsaz_curAxiH+aBivarXane:","puwa:saMsarge:puwa:10:0455:u:sew:पु॑ट॑:1416::1472:puta4_puta_curAxiH+saMsarge:","puwa!:BAzArTaH:puwa:10:0094:u:sew:पु॑टँ॑:1416::1472:puta4_puta_curAxiH+saMsarge:","puwa!:mardane pramardane ityeke:puw:01:0367:pa:sew:पु॑टँ॑:::::","puwa!:saMSlezaRe:puw:06:0283:pa:sew:पु॑टँ॑:977:998:1020:put2_putaz_wuxAxiH+saMSleRaNe:","puwwa!:alpIBAve:puww:10:0035:u:sew:पु॑ट्टँ॑:1155::1209:putt1_puttaz_curAxiH+alpIBAve:","puqa!:puwa! mardane pramardane:puq:01:0365:pa:sew:पु॑डँ॑:::215::","puqa!:utsarge:puq:06:0114:pa:sew:पु॑डँ॑:993::1037:pud1_pudaz_wuxAxiH+uwsarge:","puRa!:saNGAte ityanye:puR:06:0059:u:sew:पु॑णँ॑:947:970:990::","puRa!:karmaRi SuBe:puR:10:0133:u:sew:पु॑णँ॑:::::","puwi!:BAzArTaH ca:puRw:10:0323:u:sew:पु॑टिँ॑:1322:::puNt1_putiz_curAxiH+BARArWaH:","puqi!:KaRqane cetyeke:puRq:01:0370:pa:sew:पु॑डिँ॑:::215:puNd1_pudiz_BvAxiH+KaNdane:","puTa!:BAzArTaH:puT:04:0013:u:sew:पु॑थँ॑:766:788:805:puW1_puWaz_xivAxiH+hiMsAyAm:","puTa!:hiMsAyAm:puT:10:0306:pa:sew:पु॑थँ॑:766:788:805:puW1_puWaz_xivAxiH+hiMsAyAm:","puTi!:hiMsAsaNkleSanayoH:punT:01:0046:pa:sew:पु॑थिँ॑:35:35:37:punW1_puWiz_BvAxiH+hiMsAsaMkleSanayoH:","pura!:agragamane:pur:06:0072:pa:sew:पु॑रँ॑:959:981:1002:pur1_puraz_wuxAxiH+agragamane:","purva!:pUraRe:purv:01:0657:pa:sew:पु॑र्वँ॑:::370:purv1_purvaz_BvAxiH+pUraNe:","pula!:mahattve:pul:10:0090:u:sew:पु॑लँ॑:1187:1203:1243:pul2_pulaz_curAxiH+mahawwve:","pula!:mahattve:pul:01:0975:pa:sew:पु॑लँ॑:519:538:550::","puza!:viBAge ca iti kecit:puz:04:0121:pa:sew:पु॑षँ॑:823:842:862:puR2_puRaz_xivAxiH+puRtO:","puza!:DAraRe:puz:10:0280:u:sew:पु॑षँ॑:823:842:862:puR2_puRaz_xivAxiH+puRtO:","puza!:puzwO:puz:04:0079:pa:aniw:पु॒षँ॑:823:842:862:puR2_puRaz_xivAxiH+puRtO:","puza!:puzwO:puz:09:0065:pa:sew:पु॑षँ॑:1128:1143:1181:puR3_puRaz_kryAxiH+puRtO:222","puza!:puzwO:puz:01:0797:pa:sew:पु॑षँ॑:425:442:451:puR1_puRaz_BvAxiH+puRtO:","puzpa!:vikasane:puzp:04:0016:pa:sew:पु॑ष्पँ॑:769:791:808::","pusta!:AdarAnAdarayoH:pust:10:0079:u:sew:पु॑स्तँ॑:1179:1195:1235,1270:pusw1_puswaz_curAxiH+AxarAnAxarayoH:","pUY:pavane:pU:09:0014:u:sew:पू॑ञ्:1083:1100:1134:pU2_pUF_kryAxiH+pavane:436","pUN:pavane:pU:01:1121:A:sew:पू॑ङ्:616:642:655:pU1_pUf_BvAxiH+pavane:345","pUja!:pUjAyAm:pUj:10:0144:u:sew:पू॑जँ॑:1223:1238:1275:pUj1_pUjaz_curAxiH+pUjAyAm:242","pUyI!:viSaraRe durganDe ca:pUy:01:0557:A:sew:पू॑यीँ॒:295:310:312::112","pUrI!:ApyAyane:pUr:04:0046:u:sew:पू॑रीँ॑:794:815:833:pUr1_pUrIz_xivAxiH+ApyAyane:","pUrI!:ApyAyane:pUr:10:0334:A:sew:पू॑रीँ॒:794:815:833:pUr1_pUrIz_xivAxiH+ApyAyane:","pUrRa!:saNGAte ityeke:pUrR:10:0132:u:sew:पू॑र्णँ॑::::pUrN1_pUrNaz_curAxiH+safGAwe:","pUrva!:niketane ityanye:pUrv:10:0181:u:sew:पू॑र्वँ॑:1242::1295::","pUla!:saNGAte:pUl:10:0131:u:sew:पू॑लँ॑:1217:1231:1268:pUl2_pUlaz_curAxiH+safGAwe:","pUla!:saNGAte:pUl:01:0606:pa:sew:पू॑लँ॑:324:339:341:pUl1_pUlaz_BvAxiH+niRkarRe:","pUza!:vfdDO:pUz:01:0769:pa:sew:पू॑षँ॑:413:431:439:pUR1_pURaz_BvAxiH+wuRtO:","pf:pAlanapUraRayoH ityeke:pf:03:0005:pa:sew:पृ॒:::773::","pf:prItO:pf:05:0013:pa:aniw:पृ॒:893:914:933:pq1_pq_svAxiH+prIwO:","pfN:vyAyAme:pf:06:0138:A:aniw:पृ॒ङ्:1005:1026:1057::","pfca!:saMyamane:pfc:10:0024:u:sew:पृ॑चँ॑:1326::1378:pqc3_pqcaz_curAxiH+saMyamane:","pfcI!:samparke:pfc:07:0339:pa:sew:पृ॑चीँ॑:1063:1081:1114:pqc2_pqcIz_ruXAxiH+samparke:","pfcI!:samparcane samparke:pfc:02:0025:A:sew:पृ॑चीँ॒:1063:1081:1114:pqc2_pqcIz_ruXAxiH+samparke:","pfji!:varRe samparcana ityeke uBayannetyanye avayava ityapare avyakte Sabda itItare ityeke:pfYj:02:0021:A:sew:पृ॑जिँ॒:::::","pfqa!:suKane ca:pfq:06:0054:pa:sew:पृ॑डँ॑:943:966:986:pqd1_pqdaz_wuxAxiH+suKane:","pfRa!:prIRane:pfR:06:0055:pa:sew:पृ॑णँ॑:944:967:987:pqN1_pqNaz_wuxAxiH+prINane:","pfTa!:prakzepe:pfT:10:0028:u:sew:पृ॑थँ॑:1151::1204:pqW1_pqWaz_curAxiH+prakRepe:","pfzu!:secane hiMsAsaNkleSanayoSca:pfz:01:0802:pa:sew:पृ॑षुँ॑:427:444:453::","pF:pAlanapUraRayoH:pF:03:0004:pa:sew:पॄ॑:735:757::pQ1_pQ_juhowyAxiH+pAlanapUraNayoH:","pF:pAlanapUraRayoH:pF:09:0022:pa:sew:पॄ॑:1090:1107:1141:pQ2_pQ_kryAxiH+pAlanapUraNayoH:","pelf!:gatO:pel:01:0621:pa:sew:पे॑लृँ॑:331:347:349::","pevf!:sevane:pev:01:0577:A:sew:पे॑वृँ॒::322:324:pev1_pevqz_BvAxiH+sevane:","pezf!:prayatne:pez:01:0700:A:sew:पे॑षृँ॒::::peR1_peRqz_BvAxiH+prayawne:","pesf!:gatO:pes:01:0817:pa:sew:पे॑सृँ॑:434:453:460:pes1_pesqz_BvAxiH+gawO:","pE:SozaRe:pE:01:1069:pa:aniw:पै॒:582:606:618:pE1_pE_BvAxiH+SoRaNe:","pERf!:gatipreraRaSlezaRezu:pER:01:0527:pa:sew:पै॑णृँ॑:282:295:298:pEN1_pENqz_BvAxiH+gawiprareNaSleRaNeRu:","o!pyAyI!:vfdDO:pyAy:01:0561:A:sew:ओँ॑प्या॑यीँ॒:298:313:315:pyAy1_ozpyAyIz_BvAxiH+vqxXO:","pyuza!:viBAge iti kecit:pyuz:04:0119:pa:sew:प्यु॑षँ॑:::::","pyusa!:viBAge iti kecit:pyus:04:0120:pa:sew:प्यु॑सँ॑::783,875:::","pyEN:vfdDO:pyE:01:1119:A:aniw:प्यै॒ङ्:614:640:653:pyE1_pyEf_BvAxiH+vqxXO:","praCa!:jYIpsAyAm:praC:06:0149:pa:aniw:प्र॒छँ॑:1015:1035:1067:praC1_praCaz_wuxAxiH+jFIpsAyAm:","praTa!:praKyAne:praT:10:0027:u:sew:प्र॑थँ॑:1150::1203:praW2_praWaz_curAxiH+praKyAne:","praTa!:praKyAne:praT:01:0869:A:sew:प्र॑थँ॒:468:490:496:praW1_praWaz_BvAxiH+praKyAne:","prasa!:vistAre:pras:01:0870:A:sew:प्र॑सँ॒:469:492:497:pras1_prasaz_BvAxiH+viswAre:","prA:pUraRe:prA:02:0056:pa:aniw:प्रा॒:711:733:750:prA1_prA_axAxiH+pUraNe:","prIY:tarpane:prI:04:0039:u:sew:प्री॑ञ्:787:808:826::","prIY:tarpane kAntO ca:prI:10:0373:u:aniw:प्री॒ञ्:1075:1092:1126:prI1_prIF_kryAxiH+warpaNe:426","prIN:prItO prIRane:prI:09:0002:A:aniw:प्री॒ङ्:1075:1092:1126::","pruN:gatO:pru:01:1111:A:aniw:प्रु॒ङ्:608:634:646:pru1_pruf_BvAxiH+gawO:","pruzu!:dAhe:pruz:01:0800:pa:sew:प्रु॑षुँ॑:426:443:452:pruR1_pruRuz_BvAxiH+xAhe:","pruza!:snehanasevanapUraRezu:pruz:09:0063:pa:sew:प्रु॑षँ॑:1127:1142:1180:pruR2_pruRaz_kryAxiH+snehasecanapUraNeRu:","prezf!:gatO:prez:01:0706:A:sew:प्रे॑षृँ॒:375::395:preR1_preRqz_BvAxiH+gawO:","prERf!:ityapi gatipreraRaSlezaRezu:prER:01:0528:pa:sew:प्रै॑णृँ॑:::::","proTf!:paryAptO:proT:01:1005:u:sew:प्रो॑थृँ॒॑:542:563:574:proW1_proWqz_BvAxiH+paryApwO:","plakza!:ca adane:plakz:01:1040:u:sew:प्ल॑क्षँ॒॑:::::","pliha!:gatO:plih:01:0729:A:sew:प्लि॑हँ॒:390:407:412:plih1_plihaz_BvAxiH+gawO:","plI:gatO:plI:09:0039:pa:aniw:प्ली॒:1105::1158:plI1_plI_kryAxiH+gawO:","pluN:gatO:plu:01:1112:A:aniw:प्लु॒ङ्:608:634:646:plu1_pluf_BvAxiH+gawO:","pluza!:ca dAhe:pluz:04:0122:pa:sew:प्लु॑षँ॑:762,856:784,876:801,896:pluR2_pluRaz_xivAxiH+xAhe,pluR3_pluRaz_xivAxiH+xAhe:","pluza!:dAhe:pluz:04:0009:pa:sew:प्लु॑षँ॑:762,856:784,876:801,896:pluR2_pluRaz_xivAxiH+xAhe,pluR3_pluRaz_xivAxiH+xAhe:","pluzu!:dAhe:pluz:01:0801:pa:sew:प्लु॑षुँ॑::443:452::","pluza!:snehanasevanapUraRezu:pluz:09:0064:pa:sew:प्लु॑षँ॑:1127:1142:1180:pluR4_pluRaz_kryAxiH+snehasecanapUraNeRu:","plevf!:sevane ityapyeke:plev:01:0582:A:sew:प्ले॑वृँ॒::322:325::","psA:BakzaRe:psA:02:0050:pa:aniw:प्सा॒:705:727:744:psA1_psA_axAxiH+BakRaNe:","Pakka!:nicErgatO:Pakk:01:0123:pa:sew:फ॑क्कँ॑:77:79:80:Pakk1_Pakkaz_BvAxiH+nIcErgawO:50","PaRa!:gatO gatidIptyoH:PaR:01:0955:pa:sew:फ॑णँ॑:506:524:535:PaN1_PaNaz_BvAxiH+gawO:","Pala!:nizpattO:Pal:01:0608:pa:sew:फ॑लँ॑:326:341:343:Pal2_Palaz_BvAxiH+niRpawwO:124","YiPalA!:viSaraRe:Pal:01:0594:pa:sew:ञिफ॑लाँ॑:315:330:332:Pal1_FiPalAz_BvAxiH+viSaraNe:120","Pulla!:vikasane:Pull:01:0610:pa:sew:फु॑ल्लँ॑:328:343:345:Pull1_Pullaz_BvAxiH+vikasane:125","Pelf!:gatO:Pel:01:0622:pa:sew:फे॑लृँ॑:331:347:349::","bahi!:vfdDO:baMh:01:0720:A:sew:ब॑हिँ॒:385:402::baMh1_bahiz_BvAxiH+vqxXO:","baWa!:sTOlye ityeke:baW:01:0383:pa:sew:ब॑ठँ॑:::::","baRa!:Sabde ityapi kecit:baR:01:0530:pa:sew:ब॑णँ॑::::baN1_baNaz_BvAxiH+Sabxe:","bawi!:viBAjane ityeke:baRw:01:0378:pa:sew:ब॑टिँ॑:::::","bada!:sTErye:bad:01:0053:pa:sew:ब॑दँ॑:40:40:42:bax1_baxaz_BvAxiH+sWErye:","baDa!:banDane:baD:01:1128:A:sew:ब॑धँ॒:623:649:662:baX1_baXaz_BvAxiH+banXane:","baDa!:saMyamane:baD:10:0020:u:sew:ब॑धँ॑:1145:1161:1199:baX2_baXaz_curAxiH+saMyamane:272","banDa!:saMyamane iti cAndrAH:banD:10:0044:u:sew:ब॑न्धँ॑:::::","banDa!:banDane:banD:09:0021:pa:aniw:ब॒न्धँ॑:1110:1126:1163:banX1_banXaz_kryAxiH+banXane:219","barba!:gatO:barb:01:0484:pa:sew:ब॑र्बँ॑:264:279::barb1_barbaz_BvAxiH+gawO:","barha!:BAzArTaH:barh:10:0300:u:sew:ब॑र्हँ॑:1241:1256:1293:barh2_barhaz_curAxiH+hiMsAyAm:","barha!:prADAnye:barh:01:0725:A:sew:ब॑र्हँ॒:388,389:405::barh1_barhaz_BvAxiH+prAXAnye:","barha!:hiMsAyAm:barh:10:0173:u:sew:ब॑र्हँ॑:1241:1256:1293:barh2_barhaz_curAxiH+hiMsAyAm:","bala!:prARane:bal:10:0123:u:sew:ब॑लँ॑:1211:1225:1249,1264:bal2_balaz_curAxiH+prANane:","bala!:prARane DAnyAvaroDe ca DAnyAvaroDane ca:bal:01:0974:pa:sew:ब॑लँ॑:518:537:549::","balha!:BAzArTaH:balh:10:0301:u:sew:ब॑ल्हँ॑::::balh2_balhaz_curAxiH+BARArWaH:","balha!:prADAnye:balh:01:0726:A:sew:ब॑ल्हँ॒:388,389:405::balh1_balhaz_BvAxiH+prAXAnye:","bazka:darSane:bazka:10:0458:u:sew:ब॑ष्कँ॑:::::","basu!:stamBe ityeke:bas:04:0112:pa:sew:ब॑सुँ॑:859::::","basta!:ardane:bast:10:0203:A:sew:ब॑स्तँ॒:1258:1277:1311:basw1_baswaz_curAxiH+arxane:","bAqf!:AplAvye:bAq:01:0320:A:sew:बा॑डृ॒::::bAd1_bAdqz_BvAxiH+AplAvye:","bADf!:loqane viloqane:bAD:01:0005:A:sew:बा॑धृँ॒:5:5:5:bAX1_bAXqz_BvAxiH+lodane:5","bAhf!:prayatne:bAh:01:0732:A:sew:बा॑हृँ॒:391:408::bAh1_bAhqz_BvAxiH+prayawne:","biwa!:AkroSe:biw:01:0355:pa:sew:बि॑टँ॑:199::208:bit1_bitaz_BvAxiH+AkroSe:","bidi!:avayave:bind:01:0066:pa:sew:बि॑दिँ॑:51:51:53:binx1_bixiz_BvAxiH+avayave:","bila!:Bedane:bil:10:0095:u:sew:बि॑लँ॑:1191:1207:1247:bil2_bilaz_curAxiH+Bexane:","bisa!:gatO:bis:01:0820:pa:sew:बि॑सँ॑:::::","visa!:preraRe:vis:04:0123:pa:sew:वि॑सँ॑:::897:vis1_visaz_xivAxiH+preraNe:","bIBf!:katTane ca:bIB:01:0445:A:sew:बी॑भृँ॒:::::","bukka!:BazaRe:bukk:01:0126:pa:sew:बु॑क्कँ॑:80:83:84:bukk1_bukkaz_BvAxiH+BaRaNe:52","bukka!:BAzaRe:bukk:10:0238:u:sew:बु॑क्कँ॑:1286:1304:1337:bukk2_bukkaz_curAxiH+BaRaNe:","bugi!:varjane:buNg:01:0177:pa:sew:बु॑गिँ॑::::bufg1_bugiz_BvAxiH+varjane:","buDa!:avagamane:buD:04:0068:A:aniw:बु॒धँ॒:813:833:853:buX3_buXaz_xivAxiH+avagamane:203","buDa!:avagamane:buD:01:0994:pa:sew:बु॑धँ॑:534:554:566:buX1_buXaz_BvAxiH+avagamane:170","buDi!r:boDane:buD:01:1016:u:sew:बु॑धिँ॒॑र्:547:568:579:buX2_buXizr_BvAxiH+boXane:","u!bundi!r:niSAmane:bund:01:1017:u:sew:उँ॑बु॑न्दिँ॒॑र्:548:569::bunx1_uzbunxizr_BvAxiH+niSAmane:","busa!:viBAge ityapare:bus:04:0117:pa:sew:बु॑सँ॑::879:899:bus1_busaz_xivAxiH+uwsarge:","busa!:utsarge:bus:04:0129:pa:sew:बु॑सँ॑::879:899:bus1_busaz_xivAxiH+uwsarge:","busta!:AdarAnAdarayoH:bust:10:0080:u:sew:बु॑स्तँ॑:1179:1195:1235:busw1_buswaz_curAxiH+AxarAnAxarayoH:","bfhi!:BAzArTaH:bfMh:10:0299:u:sew:बृ॑हिँ॑::::bqMh2_bqhiz_curAxiH+BARArWaH:","bfhi!:vfdDO bfhi! vfhi! Sabde ca:bfMh:01:0837:pa:sew:बृ॑हिँ॑::465,466::bqMh1_bqhiz_BvAxiH+vqxXO:","bfha!:vfdDO bfhi!r vfhi!r vfdDO Sabde ca ityeke:bfh:01:0836:pa:sew:बृ॑हँ॑::465::bqh1_bqhaz_BvAxiH+vqxXO:","bfhU!:udyamane ityeke:bfh:06:0074:pa:sew:बृ॑हूँ॑::982:::","besa!:gatO:bes:01:0821:pa:sew:बे॑सँ॑:::::","behf!:prayatne:beh:01:0730:A:sew:बे॑हृँ॒:391:408:413:veh1_vehqz_BvAxiH+prayawne:","byusa!:viBAge ityanye:byus:04:0116:pa:sew:ब्यु॑सँ॑:::::","brUY:vyaktAyAM vAci:brU:02:0039:u:aniw:ब्रू॑ञ्:694:716:733:brU1_brUF_axAxiH+vyakwAyAM_vAci:190","brUsa!:hiMsAyAm:brUs:10:0172:u:sew:ब्रू॑सँ॑:1241::1293:brUs1_brUsaz_curAxiH+hiMsAyAm:","blI:varaRe ityeke:blI:09:0038:pa:aniw:ब्ली॒:1104::::","Bakza!:adane iti mEtreyaH:Bakz:01:1039:u:sew:भ॑क्षँ॒॑:::596::","Bakza!:adane:Bakz:10:0033:u:sew:भ॑क्षँ॑:1153:1168:1207:BakR2_BakRaz_curAxiH+axane:238","Baja!:viSrARane:Baj:10:0259:u:sew:भ॑जँ॑:1303:1323:1356:Baj2_Bajaz_curAxiH+viSrANane:","Baja!:sevAyAm:Baj:01:1153:u:aniw:भ॒जँ॒॑:648:672:686:Baj1_Bajaz_BvAxiH+sevAyAm:180","Baji!:BAzArTaH:BaYj:10:0016:u:sew:भ॑जिँ॑:1321::1374:BaFj2_Bajiz_curAxiH+BARArWaH:","BaYjo!:Amardane:BaYj:07:0290:pa:aniw:भ॒ञ्जोँ॑:1054:1073:1106:BaFj1_BaFjoz_ruXAxiH+Amarxane:421","Bawa!:pariBAzaRe:Baw:01:0889:pa:sew:भ॑टँ॑:189,480:198,503:198,508:Bat1_Bataz_BvAxiH+BqwO,Bat2_Bataz_BvAxiH+pariBARaNe:","Bawa!:BftO:Baw:01:0344:pa:sew:भ॑टँ॑:189,480:198,503:198,508:Bat1_Bataz_BvAxiH+BqwO,Bat2_Bataz_BvAxiH+pariBARaNe:","BaRa!:SabdArTaH:BaR:01:0515:pa:sew:भ॑णँ॑:277:296:293:BaN1_BaNaz_BvAxiH+SabxArWaH:","Baqi!:kalyARe:BaRq:10:0077:u:sew:भ॑डिँ॑:1177:1193:1233:BaNd2_Badiz_curAxiH+kalyANe:","Baqi!:pariBAzaRe:BaRq:01:0306:A:sew:भ॑डिँ॒:162:169:171:BaNd1_Badiz_BvAxiH+pariBARaNe:","Badi!:kalyARe suKe ca:Band:01:0012:A:sew:भ॑दिँ॒:11:11:11::10","Bartsa!:santarjane tarjane:Barts:10:0202:A:sew:भ॑र्त्सँ॒:1257:1276:1310:Barws1_Barwsaz_curAxiH+warjane:","Barba!:hiMsAyAm ityeke:Barb:01:0662:pa:sew:भ॑र्बँ॑::279:::","BarBa!:hiMsAyAm ityanye:BarB:01:0663:pa:sew:भ॑र्भँ॑:::::","Barva!:hiMsAyAm:Barv:01:0661:pa:sew:भ॑र्वँ॑:351:368:372:Barv1_Barvaz_BvAxiH+hiMsAyAm:","Bala!:pariBAzaRahiMsAdAnezu:Bal:01:0568:A:sew:भ॑लँ॒:303:318:320:Bal1_Balaz_BvAxiH+pariBARaNahiMsAxAneRu:","Bala!:ABaRqane:Bal:10:0224:A:sew:भ॑लँ॒:1273:1292:1324:Bal2_Balaz_curAxiH+ABaNdane:","Balla!:pariBAzaRahiMsAdAnezu:Ball:01:0569:A:sew:भ॑ल्लँ॒:303:318:320:Ball1_Ballaz_BvAxiH+pariBARaNahiMsAxAneRu:","Baza!:Bartsane:Baz:01:0791:pa:sew:भ॑षँ॑:422:439:448:BaR1_BaRaz_BvAxiH+Barwsane:","Basu!:stamBe iti kecit:Bas:04:0113:pa:sew:भ॑सुँ॑:::::","Basa!:BartsanadIptyoH:Bas:03:0019:pa:sew:भ॑सँ॑:748:771:786:Bas1_Basaz_juhowyAxiH+BarwsanaxIpwyoH:","BA:dIptO:BA:02:0046:pa:aniw:भा॒:701:723:740:BA1_BA_axAxiH+xIpwO:","BAja:pfTakkarmaRi:BAja:10:0428:u:sew:भा॑ज॑:1396:1413:1452::264","BAma:kroDe:BAma:10:0411:u:sew:भा॑म॑:1382:1399:1436::","BAma!:kroDe:BAm:01:0509:A:sew:भा॑मँ॒:274:287:290:BAm1_BAmaz_BvAxiH+kroXe:","BAza!:vyaktAyAM vAci:BAz:01:0696:A:sew:भा॑षँ॒:371:387:391:BAR1_BARaz_BvAxiH+vyakwAyAM_vAci:145","BAsf!:dIptO:BAs:01:0711:A:sew:भा॑सृँ॒:378:394:400:BAs1_BAsqz_BvAxiH+xIpwO:146","Bikza!:BikzAyAmalABe lABe ca:Bikz:01:0690:A:sew:भि॑क्षँ॒:365:382:386::140","Bidi!r:vidAraRe:Bid:07:0002:u:aniw:भि॒दिँ॒॑र्:1040:1059:1092:Bix1_Bixizr_ruXAxiH+vixAraNe:","YimidA!:snehane:mid:01:0844:A:sew:ञिमि॑दाँ॒:451:471:479:mix2_FimixAz_BvAxiH+snehane:","Bidi!:avayave ityeke:Bind:01:0067:pa:sew:भि॑दिँ॑::::Binx1_Bixiz_BvAxiH+avayave:","YiBI:Baye:BI:03:0002:pa:aniw:ञिभी॒:733:755:771:BI1_FiBI_juhowyAxiH+Baye:200","Bujo!:kOwilye:Buj:06:0153:pa:aniw:भु॒जोँ॑:1019:1039:1071::","Buja!:pAlanAByavahArayoH:Buj:07:0017:pa:aniw:भु॒जँ॑:1055:1074:1107:Buj2_Bujaz_ruXAxiH+pAlanAByavahArayoH:418","BU:avakalkane miSrIkaraRa ityeke cintana ityanye:BU:10:0382:u:sew:भू॑:1359:1374:1411:BU2_BU_curAxiH+prApwO:","BU:prAptO:BU:10:0277:u:sew:भू॑:1359:1374:1411:BU2_BU_curAxiH+prApwO:","BU:sattAyAm:BU:01:0001:pa:sew:भू॑:1:1:1:BU1_BU_BvAxiH+sawwAyAm:1","BUza!:alaNkAre:BUz:01:0777:pa:sew:भू॑षँ॑:418:435:444:BUR1_BURaz_BvAxiH+alafkAre:320","BUza!:alaNkAre:BUz:10:0255:u:sew:भू॑षँ॑:1299:::BUR2_BURaz_curAxiH+alafkaraNe:247","quBfY:DAraRapozaRayoH:Bf:03:0006:u:aniw:डुभृ॒ञ्:736:758:774:Bq2_duBqF_juhowyAxiH+MISSING:362","BfY:BaraRe:Bf:01:1045:u:aniw:भृ॒ञ्:568:590:602:Bq1_BqF_BvAxiH+BaraNe:319","BfSi!:BAzArTaH ca:BfMS:10:0318:u:sew:भृ॑शिँ॑:1322:::BqMS1_BqSiz_curAxiH+BARArWaH:","BfMSu!:aDaHpatane:BfMS:04:0137:pa:sew:भृं॑शुँ॑:::::","BfjI!:Barjane:Bfj:01:0202:A:sew:भृ॑जीँ॒:101:105:107:Bqj1_BqjIz_BvAxiH+Barjane:61","Bfqa!:nimajjane ityeke:Bfq:06:0129:pa:sew:भृ॑डँ॑::::Bqd1_Bqdaz_wuxAxiH+samvaraNe_nimajjana_iwyeke:","BfSu!:aDaHpatane:BfS:04:0136:pa:sew:भृ॑शुँ॑:864:884:904:BqS1_BqSuz_xivAxiH+aXaHpawane:","BF:Bartsane Barane'pyeke:BF:09:0024:pa:sew:भॄ॑:1092:1109,1110:1144:BQ1_BQ_kryAxiH+Barwsane_BaraNe_iwyeke:","Bezf!:Baye gatAvityeke:Bez:01:1026:u:sew:भे॑षृँ॒॑:555:577:587:BeR1_BeRqz_BvAxiH+Baye:","Byasa!:Baye:Byas:01:0715:A:sew:भ्य॑सँ॒:381:398:403:Byas1_Byasaz_BvAxiH+Baye:","BraMSu!:avasraMsane ityapi kecit:BraMS:01:0860:A:sew:भ्रं॑शुँ॑::::BraMS1_BraMSuz_BvAxiH+MISSING:","BraMSu!:aDaHpatane:BraMS:04:0138:pa:sew:भ्रं॑शुँ॑::::BraMS2_BraMSuz_xivAxiH+aXaHpawane:","BraMsu!:avasraMsane:BraMs:01:0859:A:sew:भ्रं॑सुँ॒::::BraMs1_BraMsuz_BvAxiH+avasraMsane:","Brakza!:adane:Brakz:01:1037:u:sew:भ्र॑क्षँ॒॑:563:::BrakR1_BrakRaz_BvAxiH+axane:","Brasja!:pAke:Brajj:06:0004:u:aniw:भ्र॒स्जँ॒॑:912:933:954:Brasj1_Brasjaz_wuxAxiH+pAke:","BraRa!:SabdArTaH:BraR:01:0520:pa:sew:भ्र॑णँ॑:277:290:293:BraN1_BraNaz_BvAxiH+SabxArWaH:","Bramu!:anavasTAne:Bram:04:0102:pa:sew:भ्र॑मुँ॑:846:865:885:Bram2_Bramuz_xivAxiH+anavasWAne:","Bramu!:calane:Bram:01:0985:pa:sew:भ्र॑मुँ॑:526:546:558:Bram1_Bramuz_BvAxiH+calane:322","wuBrAjf!:dIptO:BrAj:01:0205:A:sew:टुभ्रा॑जृँ॒:508:526:537::","BrAjf!:dIptO:BrAj:01:0957:A:sew:भ्रा॑जृँ॒:102:106:108:BrAj1_BrAjqz_BvAxiH+xIpwO:63","wuBrASf!:dIptO:BrAS:01:0958:A:sew:टुभ्रा॑शृँ॒:508:526:537:BrAS1_tuBrASqz_BvAxiH+xIpwO:","BrI:Baye BaraRa ityeke:BrI:09:0041:pa:aniw:भ्री॒:1107:1123:1160::","BrURa!:ASAviSaNkayoH ASAyAm:BrUR:10:0213:A:sew:भ्रू॑णँ॒:1264:1283:1317:BrUN1_BrUNaz_curAxiH+ASAviSafkayoH:","Brejf!:dIptO:Brej:01:0204:A:sew:भ्रे॑जृँ॒:102:106:108::","Brezf!:gatO:Brez:01:1027:u:sew:भ्रे॑षृँ॒॑:556:577:588:BreR1_BreRqz_BvAxiH+gawO:","Blakza!:adane:Blakz:01:1038:u:sew:भ्ल॑क्षँ॒॑::584::BlakR1_BlakRaz_BvAxiH+axane:","wuBlASf!:dIptO:BlAS:01:0959:A:sew:टुभ्ला॑शृँ॒:508:526:537:BlAS1_tuBlASqz_BvAxiH+xIpwO:","Blezf!:gatO:Blez:01:1028:u:sew:भ्ले॑षृँ॒॑:::588::","mahi!:BAzArTaH ca:maMh:10:0330:u:sew:म॑हिँ॑:1322:::maMh2_mahiz_curAxiH+BARArWaH:","mahi!:vfdDO:maMh:01:0721:A:sew:म॑हिँ॒:385:402:407:maMh1_mahiz_BvAxiH+vqxXO:150","maKa!:gatyarTaH:maK:01:0140:pa:sew:म॑खँ॑:84:87:88:maK1_maKaz_BvAxiH+gawyarWaH:","maki!:maRqane:maNk:01:0094:A:sew:म॑किँ॒:69:68:70:mafk1_makiz_BvAxiH+maNdane:","maKi!:gatyarTaH:maNK:01:0141:pa:sew:म॑खिँ॑:84:87::mafK1_maKiz_BvAxiH+gawyarWaH:","magi!:gatyarTaH:maNg:01:0157:pa:sew:म॑गिँ॑:84:87:88::","maGi!:gatyAkzepe gatO gatyAramBe cetyapare maGi! kEtave ca:maNG:01:0117:A:sew:म॑घिँ॒:74,87:74,75:75,76,93:mafG1_maGiz_BvAxiH+gawyAkRepe,mafG2_maGiz_BvAxiH+maNdane:","maGi!:maRqane:maNG:01:0183:pa:sew:म॑घिँ॑:74,87:74,75:75,76,93:mafG1_maGiz_BvAxiH+gawyAkRepe,mafG2_maGiz_BvAxiH+maNdane:","maca!:kalkane kaTana ityanye:mac:01:0195:A:sew:म॑चँ॒:96:100:102::","maci!:DAraRocCrAyapUjanezu:maYc:01:0197:A:sew:म॑चिँ॒:97:101:103:maFc1_maciz_BvAxiH+XAraNocCrAyapUjaneRu:","maWa!:madanivAsayoH:maW:01:0384:pa:sew:म॑ठँ॑:210:221:221:maT1_maTaz_BvAxiH+maxanivAsayoH:","maRa!:SabdArTaH:maR:01:0516:pa:sew:म॑णँ॑:277:290:293:maN1_maNaz_BvAxiH+SabxArWaH:","maWi!:Soke:maRW:01:0296:A:sew:म॑ठिँ॒:153:160:162:maNT1_maTiz_BvAxiH+Soke:","maqi!:ca viBAjane:maRq:01:0305:A:sew:म॑डिँ॒:161,201:168,211:170,210:maNd1_madiz_BvAxiH+viBAjane,maNd2_madiz_BvAxiH+BURAyAm:96","maqi!:BUzAyAM harze ca:maRq:10:0076:u:sew:म॑डिँ॑:1176:1192:1232:maNd3_madiz_curAxiH+BURAyAM_harRe_ca:273","maqi!:BUzAyAm:maRq:01:0361:pa:sew:म॑डिँ॑:161,201:168,211:170,210:maNd1_madiz_BvAxiH+viBAjane,maNd2_madiz_BvAxiH+BURAyAm:96","maTe!:viloqane:maT:01:0983:pa:sew:म॑थेँ॑:524:544:556:maW1_maWez_BvAxiH+vilodane:","mada!:tfptiyoge:mad:10:0105:A:sew:म॑दँ॒:::::","madI!:harze harzaglepanayoH mit 1927:mad:04:0229:pa:sew:म॑दीँ॑:849:868:888::","manu!:avaboDane:man:08:0233:A:sew:म॑नुँ॒:1072:1089:1123::216","mana!:jYAne:man:04:0073:A:aniw:म॒नँ॒:817:836:857::380","matri!:guptapariBAzaRe:mantr:10:0199:A:sew:म॑त्रिँ॒:1255:1274:1308:manwr1_mawriz_curAxiH+gupwapariBARaNe:229","manTa!:viloqane:manT:09:0047:pa:sew:म॑न्थँ॑:1113:1129:1166:manW3_manWaz_kryAxiH+vilodane:223","manTa!:viloqane:manT:01:0048:pa:sew:म॑न्थँ॑:34:35:36:manW1_manWaz_BvAxiH+vilodane:323","maTi!:hiMsAsaNkleSanayoH:manT:01:0044:pa:sew:म॑थिँ॑:35::37:manW2_maWiz_BvAxiH+hiMsAsaMkleSanayoH:","madi!:stutimodamadasvapnakAntigatizu:mand:01:0013:A:sew:म॑दिँ॒:12:12:12:manx1_maxiz_BvAxiH+swuwimoxamaxasvapnakAnwigawiRu:11","maBra!:gatyarTaH:maBr:01:0639:pa:sew:म॑भ्रँ॑:341:357:361:maBr1_maBraz_BvAxiH+gawyarWaH:","maya!:gatO:may:01:0549:A:sew:म॑यँ॒:291:305:307:may1_mayaz_BvAxiH+gawO:","marca!:SabdArTaH ca:marc:10:0151:u:sew:म॑र्चँ॑::1243::marc1_marcaz_curAxiH+SabxArWaH:","marba!:gatO:marb:01:0485:pa:sew:म॑र्बँ॑:264::280:marb1_marbaz_BvAxiH+gawO:","marva!:pUraRe:marv:01:0659:pa:sew:म॑र्वँ॑:349:366:370:marv1_marvaz_BvAxiH+pUraNe:","mala!:DAraRe:mal:01:0566:A:sew:म॑लँ॒:302:317:319:mal1_malaz_BvAxiH+XAraNe:","malla!:DAraRe:mall:01:0567:A:sew:म॑ल्लँ॒:302:317:319:mall1_mallaz_BvAxiH+XAraNe:","mava!:banDane:mav:01:0683:pa:sew:म॑वँ॑:359:376:380:mav1_mavaz_BvAxiH+banXane:","mavya!:banDane:mavy:01:0585:pa:sew:म॑व्यँ॑:309:324:326:mavy1_mavyaz_BvAxiH+banXane:","maSa!:Sabde:maS:01:0825:pa:sew:म॑शँ॑:437:456:464::","maza!:hiMsArTaH:maz:01:0788:pa:sew:म॑षँ॑:421:438:447:maR1_maRaz_BvAxiH+hiMsArWaH:","maska!:gatyarTaH:mask:01:0107:A:sew:म॑स्कँ॒:73:72:74:mask1_maskaz_BvAxiH+gawyarWaH:","masI!:parimAne:mas:04:0131:pa:sew:म॑सीँ॑:861:881:901:mas1_masIz_xivAxiH+pariNAme:","wumasjo!:SudDO:masj:06:0151:pa:aniw:टुम॒स्जोँ॑:1017:1037:1069::","maha:pUjAyAm:maha:10:0406:u:sew:म॑ह॑:1379:1396:1433::","maha!:pUjAyAm:mah:01:0831:pa:sew:म॑हँ॑:443::470:mah1_mahaz_BvAxiH+pUjAyAm:","mAN:mAne:mA:04:0037:A:aniw:मा॒ङ्:785::824:mA3_mAf_xivAxiH+mAne:","mA:mAne:mA:02:0057:pa:aniw:मा॒:712:734:751:mA1_mA_axAxiH+mAne:","mAN:mAne Sabde ca:mA:03:0007:A:aniw:मा॒ङ्:737:759:775::365","mAkzi!:kANkzAyAm:mANkz:01:0762:pa:sew:मा॑क्षिँ॑:409:426:435::","mAna!:stamBe ityeke:mAn:10:0234:A:sew:मा॑नँ॒:1282:1300:1333::","mAna!:pUjAyAm:mAn:10:0381:u:sew:मा॑नँ॑:1358:1373:1410:mAn2_mAnaz_curAxiH+pUjAyAm:","mAna!:pUjAyAm:mAn:01:1127:A:sew:मा॑नँ॒:622:648:661::324","mArga!:anvezaRe:mArg:10:0384:u:sew:मा॑र्गँ॑:1361:1377:1414:mArg1_mArgaz_curAxiH+anveRaNe:280","mArja!:SabdArTO:mArj:10:0150:u:sew:मा॑र्जँ॑:1228:1243:1280:mArj1_mArjaz_curAxiH+SabxArWaH:","mAhf!:mAne:mAh:01:1042:u:sew:मा॑हृँ॒॑::586:598:mAh1_mAhqz_BvAxiH+mAne:","qumiY:prakzepane:mi:05:0004:u:aniw:डुमि॒ञ्:885:906:925:mi1_dumiF_svAxiH+prakRepaNe:","miCa!:utkleSe:miC:06:0017:pa:sew:मि॑छँ॑:923:946:966:miC1_miCaz_wuxAxiH+uwkleSe:","miji!:BAzArTaH:miYj:10:0286:u:sew:मि॑जिँ॑:1321::1374:miFj1_mijiz_curAxiH+BARArWaH:","miTf!:meDAhiMsanayoH ityeke:miT:01:1008:u:sew:मि॑थृँ॒॑::564:::","midf!:meDAhiMsanayoH:mid:01:1006:u:sew:मि॑दृँ॒॑:543::575:mix1_mixqz_BvAxiH+meXAhiMsanayoH:","mida!:snehane ityeke:mid:04:0158:u:sew:मि॑दँ॑:::::","YimidA!:snehane:mid:10:0012:u:sew:ञिमि॑दाँ॑:::::","miDf!:meDAhiMsanayoH ityanye:miD:01:1010:u:sew:मि॑धृँ॒॑:::::","midi!:snehane:mind:10:0011:u:sew:मि॑दिँ॑:1139:1155:1193:minx1_mixiz_curAxiH+snehane:","mivi!:secane secane cetyeke:minv:01:0672:pa:sew:मि॑विँ॑:355:372:376::","mila!:SlezaRe:mil:06:0091:pa:sew:मि॑लँ॑:974,1030::1017,1082:mil1_milaz_wuxAxiH+SleRaNe:406","mila!:saNgame saNgamane:mil:06:0165:u:sew:मि॑लँ॒॑:974,1030::1017,1082:mil1_milaz_wuxAxiH+SleRaNe:406","miSa!:Sabde:miS:01:0824:pa:sew:मि॑शँ॑:437:456:464::","miSra:samparke:miSra:10:0466:u:sew:मि॑श्र॑:1423::1479::285","mizu!:secane:miz:01:0795:pa:sew:मि॑षुँ॑:424:441:450:miR1_miRuz_BvAxiH+secane:","miza!:sparDAyAm:miz:06:0079:pa:sew:मि॑षँ॑:963:985:1006:miR2_miRaz_wuxAxiH+sparxXAyAm:","miha!:secane:mih:01:1147:pa:aniw:मि॒हँ॑:642:667:680:mih1_mihaz_BvAxiH+secane:","mI:gatO:mI:10:0361:u:sew:मी॑:::::","mIN:hiMsAyAm:mI:04:0032:A:aniw:मी॒ङ्:::::","mIY:hiMsAyAm banDane mAne:mI:09:0004:u:aniw:मी॒ञ्:1077:1094:1128:mI2_mIF_kryAxiH+banXane:430","mImf!:gatO mImf! Sabde ca:mIm:01:0539:pa:sew:मी॑मृँ॑:288:301,302:304::","mIla!:nimezaRe:mIl:01:0595:pa:sew:मी॑लँ॑:316:331:333:mIl1_mIlaz_BvAxiH+nimeRaNe:121","mIva!:sTOlye:mIv:01:0645:pa:sew:मी॑वँ॑:345:361:365:mIv1_mIvaz_BvAxiH+sWOlye:","muKi!:gatyarTaH ityapi kecit:muNK:01:0166:pa:sew:मु॑खिँ॑:::::","muca!:pramocane modane ca pramocanamodanayoH:muc:10:0272:u:sew:मु॑चँ॑:::::","mucx!:mokzaRe mocane:muc:06:0166:u:aniw:मु॒चॢँ॒॑॑:1031:1050:1083::404","muja!:SabdArTaH:muj:01:0283:pa:sew:मु॑जँ॑:143::151:muj1_mujaz_BvAxiH+SabxArWaH:","muci!:kalkane kaTana ityanye:muYc:01:0196:A:sew:मु॑चि॒::::muFc1_muciz_BvAxiH+kalkane:","muji!:SabdArTAH:muYj:01:0284:pa:sew:मु॑जिँ॑:143:150:151:muFj1_mujiz_BvAxiH+SabxArWaH:","muwa!:mardane pramardane ityeke:muw:01:0366:pa:sew:मु॑टँ॑:203::212:mut1_mutaz_BvAxiH+marxane:","muwa!:AkzepapramardanayoH:muw:06:0101:pa:sew:मु॑टँ॑:984:1005:1027:mut2_mutaz_wuxAxiH+AkRepamarxanayoH:","muwa!:saYcUrRane:muw:10:0104:u:sew:मु॑टँ॑:984:1005:1027:mut2_mutaz_wuxAxiH+AkRepamarxanayoH:","muqa!:muwa!' mardane pramardane:muq:01:0364:pa:sew:मु॑डँ॑:::::","muRa!:pratijYAne:muR:06:0060:pa:sew:मु॑णँ॑:948:971:991:muN1_muNaz_wuxAxiH+prawijFAne:","muWi!:pAlane:muRW:01:0298:A:sew:मु॑ठिँ॒:154:161:163:muNT1_muTiz_BvAxiH+pAlane:","muqi!:KaRqane:muRq:01:0369:pa:sew:मु॑डिँ॑:164,205:171,213,215:173,214:muNd1_mudiz_BvAxiH+mArjane,muNd2_mudiz_BvAxiH+KaNdane:98","muqi!:mArjane:muRq:01:0308:A:sew:मु॑डिँ॒:164,205:171,213,215:173,214:muNd1_mudiz_BvAxiH+mArjane,muNd2_mudiz_BvAxiH+KaNdane:98","muda!:saMsarge:mud:10:0268:u:sew:मु॑दँ॑:1309:1334:1367:mux2_muxaz_curAxiH+saMsarge:","muda!:harze:mud:01:0016:A:sew:मु॑दँ॒:14:15:15:mux1_muxaz_BvAxiH+harRe:14","mura!:saMvezwane saYcezwane:mur:06:0069:pa:sew:मु॑रँ॑:956:979:999:mur1_muraz_wuxAxiH+saMveRtane:","murCA!:mohanasamucCrAyayoH:murC:01:0240:pa:sew:मु॑र्छाँ॑:118:125:126:murC1_murCAz_BvAxiH+mohasamucCrAyayoH:","murvI!:banDane:murv:01:0656:pa:sew:मु॑र्वीँ॑::365:369:murv1_murvIz_BvAxiH+banXane:","muza!:steye:muz:09:0066:pa:sew:मु॑षँ॑:1129:1144:1182:muR1_muRaz_kryAxiH+sweye:224","musa!:KaRqane:mus:04:0130:pa:sew:मु॑सँ॑:860:880:900:mus1_musaz_xivAxiH+KaNdane:","musta!:saNGAte:must:10:0126:u:sew:मु॑स्तँ॑::1233::musw1_muswaz_curAxiH+safGAwe:","muha!:vEcittye:muh:04:0095:pa:aniw:मु॒हँ॑:839:858:878::","mUY:banDane:mU:09:0015:u:sew:मू॑ञ्:::::","mUN:banDane:mU:01:1122:A:sew:मू॑ङ्:617:643:656:mU1_mUf_BvAxiH+banXane:","mUtra:prasravaRe:mUtra:10:0451:u:sew:मू॑त्र॑:1413:1431:1469:mUwra1_mUwra_curAxiH+prasravaNe:","mUla!:pratizWAyAm:mUl:01:0607:pa:sew:मू॑लँ॑:325:340:342:mUl1_mUlaz_BvAxiH+prawiRTAyAm:123","mUla!:rohane:mUl:10:0092:u:sew:मू॑लँ॑:1189:1205:1245:mUl2_mUlaz_curAxiH+rohaNe:449","mUza!:steye:mUz:01:0770:pa:sew:मू॑षँ॑:414:432:440:mUR1_mURaz_BvAxiH+sweye:","mfN:prARatyAge:mf:06:0139:A:aniw:मृ॒ङ्:1006:1027:1058:mq1_mqf_wuxAxiH+prANawyAge:410","mfkza!:saNGAte:mfkz:01:0754:pa:sew:मृ॑क्षँ॑:406:::mqkR1_mqkRaz_BvAxiH+saMGAwe:","mfga:anvezaRe:mfga:10:0442:A:sew:मृ॑ग॒:1405:1423:1461:mqga1_mqga_curAxiH+anveRaNe:","mfjU!:mfjU!S SudDO:mfj:02:0061:pa:sew:मृ॑जूँ॑:716::755::","mfjU!:SOcAlaNkArayoH:mfj:10:0386:u:sew:मृ॑जूँ॑:716::755::","mfqa!:kzode suKe ca:mfq:09:0052:pa:sew:मृ॑डँ॑:1117:1133:1170:mqd2_mqdaz_kryAxiH+kRoxe:","mfqa!:suKane:mfq:06:0053:pa:sew:मृ॑डँ॑:942:965:985:mqd1_mqdaz_wuxAxiH+suKane:","mfRa!:hiMsAyAm:mfR:06:0057:pa:sew:मृ॑णँ॑:945:968:988:mqN1_mqNaz_wuxAxiH+hiMsAyAm:","mfqi!:preraRe:mfRq:10:0165:u:sew:मृ॑डिँ॑:::::","mfda!:kzode:mfd:09:0051:pa:sew:मृ॑दँ॑:1116:1132:1169:mqx1_mqxaz_kryAxiH+kRoxe:","mfDu!:undane:mfD:01:1015:u:sew:मृ॑धुँ॒॑:546:::mqX1_mqXuz_BvAxiH+unxane:","mfSa!:AmarSaRe:mfS:06:0161:pa:aniw:मृ॒शँ॑:1026:1046:1078:mqS1_mqSaz_wuxAxiH+AmarSane:","mfza!:titikzAyAm:mfz:10:0060:u:sew:मृ॑षँ॒॑:1364:1380:1417:mqR3_mqRaz_curAxiH+wiwikRAyAm:","mfza!:titikzAyAm:mfz:04:0387:u:sew:मृ॑षँ॒॑:805:826:844:mqR2_mqRaz_xivAxiH+wiwikRAyAm:","mfzu!:secane mfzu! sahane ca:mfz:01:0804:pa:sew:मृ॑षुँ॑:427:444,445:453::","mF:hiMsAyAm:mF:09:0025:pa:sew:मॄ॑:1093:1108::mQ1_mQ_kryAxiH+hiMsAyAm:","meN:praRidAne:me:01:1116:A:aniw:मे॒ङ्:611:637:650:me1_mef_BvAxiH+praNixAne:","meTf!:meDAhiMsanayoH ityeke:meT:01:1009:u:sew:मे॑थृँ॒॑::564:::","medf!:meDAhiMsanayoH:med:01:1007:u:sew:मे॑दृँ॒॑:543::575:mex1_mexqz_BvAxiH+meXAhiMsanayoH:","meDf!:meDAhiMsanayoH ityanye meDf! saNgame ca:meD:01:1011:u:sew:मे॑धृँ॒॑:544:565:576::","mepf!:gatO:mep:01:0429:A:sew:मे॑पृँ॒:238:251::mep1_mepqz_BvAxiH+gawO:","mevf!:sevane:mev:01:0578:A:sew:मे॑वृँ॒::322:324:mev1_mevqz_BvAxiH+sevane:","mokza!:Asane asane:mokz:10:0256:u:sew:मो॑क्षँ॑:1300:1320:1353::","mnA:aByAse:mnA:01:1078:pa:aniw:म्ना॒:589:613:626:mnA1_mnA_BvAxiH+aByAse:","mrakza!:saNGAte ityeke:mrakz:01:0755:pa:sew:म्र॑क्षँ॑:::430:mrakR1_mrakRaz_BvAxiH+saMGAwe:","mrakza!:Cedane:mrakz:10:0168:u:sew:म्र॑क्षँ॑:1239:1254:1291::","mrakza!:mlecCane:mrakz:10:0171:u:sew:म्र॑क्षँ॑:1239:1254:1291::","mraCa!:mlecCane ityeke:mraC:10:0169:u:sew:म्र॑छँ॑:::::","mrada!:mardane:mrad:01:0871:A:sew:म्र॑दँ॒:470:493:498:mrax1_mraxaz_BvAxiH+marxane:","mrucu!:gatyarTaH:mruc:01:0222:pa:sew:म्रु॑चुँ॑:108:114:115:mruc1_mrucuz_BvAxiH+gawyarWaH:","mruYcu!:gatyarTaH:mruYc:01:0220:pa:sew:म्रु॑ञ्चुँ॑::::mruFc1_mruFcuz_BvAxiH+gawyarWaH:","mrewf!:unmAde:mrew:01:0327:pa:sew:म्रे॑टृँ॑:179:188:188::","mreqf!:unmAde:mreq:01:0328:pa:sew:म्रे॑डृँ॑::::mred1_mredqz_BvAxiH+unmAxe:","mlucu!:gatyarTAH:mluc:01:0223:pa:sew:म्लु॑चुँ॑:108:114:115:mluc1_mlucuz_BvAxiH+gawyarWaH:","mluYcu!:gatyarTaH:mluYc:01:0221:pa:sew:म्लु॑ञ्चुँ॑::::mluFc1_mluFcuz_BvAxiH+gawyarWaH:","mleCa!:Cedane mleCa! avyaktAyAM vAci:mleC:10:0170:u:sew:म्ले॑छँ॑:1240:1255:1292::","mleCa!:avyakte Sabde:mleC:01:0233:pa:sew:म्ले॑छँ॑:113:119:120::","mlewf!:unmAde ityeke:mlew:01:0329:pa:sew:म्ले॑टृँ॑::188:188:mlet1_mletqz_BvAxiH+unmAxe:","mlevf!:sevane:mlev:01:0579:A:sew:म्ले॑वृँ॒:307:322:324:mlev1_mlevqz_BvAxiH+sevane:","mlE:harzakzaye:mlE:01:1052:pa:aniw:म्लै॒:573:595:607:mlE1_mlE_BvAxiH+harRakRaye:","yakza!:pUjAyAm:yakz:10:0215:A:sew:य॑क्षँ॒:1266:1285:1319:yakR1_yakRaz_curAxiH+pUjAyAm:","yaja!:devapUjAsaNgatikaraRadAnezu:yaj:01:1157:u:aniw:य॒जँ॒॑:652:676:690:yaj1_yajaz_BvAxiH+xevapUjAsafgawikaraNaxAneRu:176","yata!:nikAropaskArayoH:yat:10:0261:u:sew:य॑तँ॑:1305:1325:1358:yaw2_yawaz_curAxiH+nikAropaskArayoH:","yatI!:prayatne:yat:01:0030:A:sew:य॑तीँ॒:24:25:25:yaw1_yawIz_BvAxiH+prayawne:24","yatri!:saNkocane:yantr:10:0003:u:sew:य॑त्रिँ॑:1134:1150:1188:yanwr1_yawriz_curAxiH+saMkocane:447","yaBa!:mETune viparItamETune:yaB:01:1135:pa:aniw:य॒भँ॑:631:656:669:yaB1_yaBaz_BvAxiH+mEWune:","yama!:uparame yamo'parivezaRe na mit 1953:yam:01:1139:pa:aniw:य॒मँ॑:634:659::yam2_yamaz_BvAxiH+uparame:","yama!:parivezaRe mit 1953:yam:10:0119:u:sew:य॑मँ॑:1208:1223:1262:yam3_yamaz_curAxiH+pariveRaNe:","yasu!:prayatne:yas:04:0107:pa:sew:य॑सुँ॑:851:870:890:yas1_yasuz_xivAxiH+prayawne:","yA:prApaRe:yA:02:0044:pa:aniw:या॒:699:721:738:yA1_yA_axAxiH+prApaNe:195","wuyAcf!:yAcYAyAm:yAc:01:1001:u:sew:टुया॑चृँ॒॑:539::571:yAc1_tuyAcqz_BvAxiH+yAcFAyAm:157","yu:jugupsAyAm:yu:10:0235:A:sew:यु॑:683:705:722:yu1_yu_axAxiH+miSraNeZmiSraNe_ca:","yuY:banDane:yu:09:0011:u:aniw:यु॒ञ्:1080:1097:1131:yu2_yuF_kryAxiH+banXane:429","yu:miSreRe'BiSraRe ca:yu:02:0027:pa:sew:यु॑:1080:1097:1131::","yugi!:varjane:yuNg:01:0175:pa:sew:यु॑गिँ॑:85:89:89:yufg1_yugiz_BvAxiH+varjane:","yuCa!:pramAde:yuC:01:0242:pa:sew:यु॑छँ॑:120:127:128:yuC1_yuCaz_BvAxiH+pramAxe:","yuja!:saMyamane:yuj:10:0338:u:sew:यु॑जँ॑:1326::1378:yuj3_yujaz_curAxiH+saMyamane:450","yuji!r:yoge:yuj:07:0007:u:aniw:यु॒जिँ॒॑र्:1045:1064:1097::","yuja!:samADO:yuj:04:0074:A:aniw:यु॒जँ॒:1045:1064:1097::","yutf!:BAsaRe:yut:01:0031:A:sew:यु॑तृँ॒:25:26:26:yuw1_yuwqz_BvAxiH+BAsane:","yuDa!:samprahAre:yuD:04:0069:A:aniw:यु॒धँ॒:814:834:854:yuX1_yuXaz_xivAxiH+saMprahAre:377","yupa!:vimohane:yup:04:0148:pa:sew:यु॑पँ॑:873:894:913:yup1_yupaz_xivAxiH+vimohane:","yUza!:hiMsAyAm:yUz:01:0775:pa:sew:यू॑षँ॑:416:434:442:yUR1_yURaz_BvAxiH+hiMsAyAm:","yezf!:prayatne ityanye:yez:01:0702:A:sew:ये॑षृँ॒::390:396:yeR1_yeRqz_BvAxiH+prayawne:","yOwf!:banDe:yOw:01:0326:pa:sew:यौ॑टृँ॑:178:187:187:yOt1_yOtqz_BvAxiH+banXe:","rahi!:BAzArTaH ca:raMh:10:0329:u:sew:र॑हिँ॑:1322:::raMh2_rahiz_curAxiH+BARArWaH:","rahi!:gatO:raMh:01:0833:pa:sew:र॑हिँ॑:445:464:472:raMh1_rahiz_BvAxiH+gawO:","raka!:AsvAdane:rak:10:0262:u:sew:र॑कँ॑:1306::1364:rak1_rakaz_curAxiH+AsvAxane:","rakza!:pAlane:rakz:01:0746:pa:sew:र॑क्षँ॑:402:419:426:rakR1_rakRaz_BvAxiH+pAlane:325","raKa!:gatyarTaH:raK:01:0144:pa:sew:र॑खँ॑:84:87:88:raK1_raKaz_BvAxiH+gawyarWaH:","raga!:AsvAdane ityanye:rag:10:0265:u:sew:र॑गँ॑::::rag2_ragaz_curAxiH+AsvAxane:","rage!:SaNkAyAm:rag:01:0894:pa:sew:र॑गेँ॑:485:508:513:rag1_ragez_BvAxiH+SafkAyAm:","raGa!:AsvAdane ityeke:raG:10:0264:u:sew:र॑घँ॑:1322:::raG1_raGaz_curAxiH+AsvAxane:","raKi!:gatyarTaH:raNK:01:0145:pa:sew:र॑खिँ॑:84:87::rafK1_raKiz_BvAxiH+gawyarWaH:","raNga:gatO:raNga:10:0397:u:sew:र॑ङ्गँ॑:::::","ragi!:gatyarTaH:raNg:01:0153:pa:sew:र॑गिँ॑:84:87:88:rafg1_ragiz_BvAxiH+gawyarWaH:","raGi!:BAzArTaH ca:raNG:10:0326:u:sew:र॑घिँ॑:1322:::rafG2_raGiz_curAxiH+BARArWaH:","raGi!:gatyarTaH:raNG:01:0112:A:sew:र॑घिँ॒:73:72:74:rafG1_raGiz_BvAxiH+gawyarWaH:","raca:pratiyatne:raca:10:0403:u:sew:र॑च॑:1376:1393:1430:raca1_raca_curAxiH+prawiyawne:263","raYja!:rAge mit 1940:raYj:04:0063:u:aniw:र॒ञ्जँ॒॑:808:829:847:raFj3_raFjaz_xivAxiH+rAge:","raYja!:rAge mit 1940:raYj:01:1154:u:aniw:र॒ञ्जँ॒॑:649:673:687:raFj2_raFjaz_BvAxiH+rAge:","rawa:pariBAzaRe:rawa:10:0462:u:sew:र॑टँ॑:::::","rawa!:pariBAzaRe ityeke:raw:01:0334:pa:sew:र॑टँ॑:182:191:191:rat1_rataz_BvAxiH+pariBARaNe:91","rawa!:pariBAzaRe:raw:01:0387:pa:sew:र॑टँ॑:182:191:191:rat1_rataz_BvAxiH+pariBARaNe:91","raWa!:pariBAzaRe:raW:01:0386:pa:sew:र॑ठँ॑:211:224:223:raT1_raTaz_BvAxiH+pariBARaNe:","raRa!:SabdArTaH mit iti BojaH 0932:raR:01:0904:pa:sew:र॑णँ॑:277,489:290,513:293,518:raN1_raNaz_BvAxiH+SabxArWaH,raN2_raNaz_BvAxiH+gawO:","raRa!:gatO mit iti BojaH 0932:raR:01:0513:pa:sew:र॑णँ॑:277,489:290,513:293,518:raN1_raNaz_BvAxiH+SabxArWaH,raN2_raNaz_BvAxiH+gawO:","ravi!:gatyarTaH:raRv:01:0680:pa:sew:र॑विँ॑:357:374:378:raNv1_raviz_BvAxiH+gawyarWaH:","rada!:vileKane:rad:01:0055:pa:sew:र॑दँ॑:42:42:44:rax1_raxaz_BvAxiH+vileKane:","raDa!:hiMsAsaMrAdDyoH:raD:04:0090:pa:aniw:र॒धँ॑:834:853:873:raX1_raXaz_xivAxiH+hiMsAsaMrAXyoH:","rapa!:vyaktAyAM vAci:rap:01:0467:pa:sew:र॑पँ॑:261:276:277:rap1_rapaz_BvAxiH+vyakwAyAM_vAci:","raPa!:gatO:raP:01:0479:pa:sew:र॑फँ॑:264:279:280:raP1_raPaz_BvAxiH+gawO:","raBa!:rABasye:raB:01:1129:A:aniw:र॒भँ॒:625:650:663:raB1_raBaz_BvAxiH+rABasye:346","ramu!:krIqAyAm rama! iti mADavaH:ram:01:0989:A:aniw:र॒मुँ॒:::561:ram1_ramuz_BvAxiH+krIdAyAm:326","raPi!:gatO:ramP:01:0480:pa:sew:र॑फिँ॑:264:279::ramP1_raPiz_BvAxiH+gawO:","rabi!:Sabde:ramb:01:0436:A:sew:र॑बिँ॒:241:255:256:ramb1_rabiz_BvAxiH+Sabxe:","raBi!:Sabde kvacitpaWyate ityeke:ramB:01:0449:A:sew:र॑भिँ॒::::ramB1_raBiz_BvAxiH+Sabxe:","raya!:gatO:ray:01:0554:A:sew:र॑यँ॒:293:308:310:ray1_rayaz_BvAxiH+gawO:","rasa:AsvAdanasnehanayoH:rasa:10:0477:u:sew:र॑स॑:1432:1449:1488:rasa1_rasa_curAxiH+AsvAxanasnehanayoH:","rasa!:Sabde:ras:01:0810:pa:sew:र॑सँ॑:430:449:456:ras1_rasaz_BvAxiH+Sabxe:","raha:tyAge:raha:10:0396:u:sew:र॑ह॑:1371:1387:1425:raha1_raha_curAxiH+wyAge:","raha!:tyAge:rah:10:0122:u:sew:र॑हँ॑:1371:1387:1425:raha1_raha_curAxiH+wyAge:","raha!:tyAge:rah:01:0832:pa:sew:र॑हँ॑:444:463:471:rah1_rahaz_BvAxiH+wyAge:","rA:dAne:rA:02:0052:pa:aniw:रा॒:707:729:746:rA1_rA_axAxiH+xAne:","rAKf!:SozaRAlamarTyoH:rAK:01:0130:pa:sew:रा॑खृँ॑:82:85:86:rAK1_rAKqz_BvAxiH+SoRaNAlamarWayoH:","rAGf!:sAmarTye:rAG:01:0118:A:sew:रा॑घृँ॒:75:76:77:rAG1_rAGqz_BvAxiH+sAmarWye:","rAjf!:dIptO:rAj:01:0956:u:sew:रा॑जृँ॒॑:507:525:536:rAj1_rAjqz_BvAxiH+xIpwO:327","rADa!:saMsidDO:rAD:05:0018:pa:aniw:रा॒धँ॑:897:918:938:rAX2_rAXaz_svAxiH+saMsixXO:","rADo!:akarmakAdvfdDAveva:rAD:04:0077:pa:aniw:राधोँ॑:821:840:860:rAX1_rAXoz_xivAxiH+vqxXO:","rAsf!:Sabde:rAs:01:0713:A:sew:रा॑सृँ॒:379:395:401:rAs1_rAsqz_BvAxiH+Sabxe:","ri:f' hiMsAyAm:ri:05:0032:pa:aniw:रि॑:908::950:ri1_ri_svAxiH+hiMsAyAm:","ri:gatO:ri:06:0140:pa:aniw:रि॒:1007:1028:1059:ri2_ri_wuxAxiH+gawO:","riKa!:gatyarTaH ityapi kecit:riK:01:0168:pa:sew:रि॑खँ॑::::riK1_riKaz_BvAxiH+MISSING:","riKi!:gatyarTaH ityapi kecit:riNK:01:0169:pa:sew:रि॑खिँ॑:::::","rigi!:gatyarTaH:riNg:01:0164:pa:sew:रि॑गिँ॑:84:87:88:rifg1_rigiz_BvAxiH+gawyarWaH:","rica!:viyojanasamparcanayoH:ric:10:0348:u:sew:रि॑चँ॑:1042:1061:1094::","rici!r:virecane:ric:07:0004:u:aniw:रि॒चिँ॒॑र्:1042:1061:1094:ric1_ricizr_ruXAxiH+virecane:","rivi!:gatyarTaH:riRv:01:0679:pa:sew:रि॑विँ॑:357:374:378:riNv1_riviz_BvAxiH+gawyarWaH:","riPa!:katTanayudDanindAhiMsAdAnezu:riP:06:0026:pa:sew:रि॑फँ॑:930::973:riP1_riPaz_wuxAxiH+kawWanayuxXaninxAhiMsAxAneRu:","riSa!:hiMsAyAm:riS:06:0156:pa:aniw:रि॒शँ॑:1021:1041:1073:riS1_riSaz_wuxAxiH+hiMsAyAm:","riza!:hiMsAyAm:riz:04:0144:pa:sew:रि॑षँ॑:::::","riza!:hiMsArTAH:riz:01:0790:pa:sew:रि॑षँ॑:421:438:447:riR1_riRaz_BvAxiH+hiMsArWaH:","riha!:katTanayudDanindAhiMsAdAnezu ityeke:rih:06:0027:pa:sew:रि॑हँ॑::::rih1_rihaz_wuxAxiH+kawWanayuxXaninxAhiMsAxAneRu:","rI:gatirezaRayoH:rI:09:0035:pa:aniw:री॒:1102:1119:1156:rI2_rI_kryAxiH+gawireRaNayoH:","rIN:SravaRe:rI:04:0033:A:aniw:री॒ङ्:781:803:820:rI1_rIf_xivAxiH+SravaNe:","ruN:gatirozaRayoH:ru:01:1114:A:sew:रु॒ङ्:::::","ru:Sabde:ru:02:0028:pa:sew:रु॑:684:706:723:ru2_ru_axAxiH+Sabxe:","ruSi!:BAzArTaH ca:ruMS:10:0319:u:sew:रु॑शिँ॑::::ruMS1_ruSiz_curAxiH+BARArWaH:","rusi!:BAzArTaH ca:ruMs:10:0321:u:sew:रु॑सिँ॑:::::","ruca!:dIptAvaBiprItO ca:ruc:01:0847:A:sew:रु॑चँ॒:453:473:481:ruc1_rucaz_BvAxiH+xIpwAvaBiprIwO_ca:159","rujo!:BaNge:ruj:06:0152:pa:aniw:रु॒जोँ॑:1018:1038:1070:ruj1_rujoz_wuxAxiH+Bafge:","ruja!:hiMsAyAm:ruj:10:0335:u:sew:रु॑जँ॑:1018:1038:1070::","ruwa!:BAzArTaH ca:ruw:10:0314:u:sew:रु॑टँ॑::1265::rut2_rutaz_curAxiH+MISSING,rut3_rutaz_curAxiH+BARArWaH:","ruwa!:upaGAte pratiGAte:ruw:01:0849:A:sew:रु॑टँ॒:455:475:483:rut1_rutaz_BvAxiH+prawiGAwe:","ruwa!:roze ityeke:ruw:10:0188:u:sew:रु॑टँ॑::1265::rut2_rutaz_curAxiH+MISSING,rut3_rutaz_curAxiH+BARArWaH:","ruWa!:upaGAte:ruW:01:0389:pa:sew:रु॑ठँ॑:213:476:225:ruT1_ruTaz_BvAxiH+upaGAwe:","ruwi!:steye:ruRw:01:0371:pa:sew:रु॑टिँ॑::217:217:ruNt1_rutiz_BvAxiH+sweye:","ruWi!:steye ityeke:ruRW:01:0400:pa:sew:रु॑ठिँ॑:206,220:231,233:233:ruNT1_ruTiz_BvAxiH+gawO:","ruWi!:gatO:ruRW:01:0373:pa:sew:रु॑ठिँ॑:206,220:231,233:233:ruNT1_ruTiz_BvAxiH+gawO:","ruqi!:steye ityapare:ruRq:01:0375:pa:sew:रु॑डिँ॑:::::","rudi!r:aSruvimocane:rud:02:0062:pa:sew:रु॑दिँ॑र्:717:739:756:rux1_ruxizr_axAxiH+aSruvimocane:","ruDi!r:AvaraRe:ruD:07:0001:u:aniw:रु॒धिँ॒॑र्:1039:1058:1091:ruX1_ruXizr_ruXAxiH+AvaraNe:","rupa!:vimohane:rup:04:0149:pa:sew:रु॑पँ॑:873:894:913:rup1_rupaz_xivAxiH+vimohane:","ruSa!:hiMsAyAm:ruS:06:0155:pa:aniw:रु॒शँ॑:1021:1041:1073:ruS1_ruSaz_wuxAxiH+hiMsAyAm:","ruza!:hiMsAyAm roze:ruz:04:0187:pa:sew:रु॑षँ॑:869:889:909:ruR2_ruRaz_xivAxiH+hiMsAyAm:","ruza!:hiMsArTaH:ruz:01:0789:pa:sew:रु॑षँ॑:421:438:447:ruR1_ruRaz_BvAxiH+hiMsArWaH:","ruza!:roze:ruz:10:0143:u:sew:रु॑षँ॑:1247::1300:ruR3_ruRaz_curAxiH+roRe:276","ruha!:bIjajanmani prAdurBAve ca:ruh:01:0995:pa:aniw:रु॒हँ॑:535:555:567:ruh1_ruhaz_BvAxiH+bIjajanmani_prAxurBAve_ca:","rUkza:pAruzye:rUkza:10:0452:u:sew:रू॑क्ष॑::1432:1470:rUkRa1_rUkRa_curAxiH+pAruRye:","rUpa:rUpakriyAyAm:rUpa:10:0479:u:sew:रू॑प॑:1434:1452:1490:rUpa1_rUpa_curAxiH+rUpakriyAyAm:286","rUza!:BUzAyAm:rUz:01:0772:pa:sew:रू॑षँ॑::::rUR1_rURaz_BvAxiH+BURAyAm:","rekf!:SaNkAyAm:rek:01:0085:A:sew:रे॑कृँ॒:64:63:65:rek1_rekqz_BvAxiH+SafkAyAm:","rejf!:dIptO:rej:01:0206:A:sew:रे॑जृँ॒:::::","rewf!:pariBAzaRe:rew:01:1002:u:sew:रे॑टृँ॒॑:540:561:572:ret1_retqz_BvAxiH+pariBARaNe:","repf!:gatO:rep:01:0430:A:sew:रे॑पृँ॒:238:251,252::rep1_repqz_BvAxiH+gawO:","reBf!:Sabde:reB:01:0447:A:sew:रे॑भृँ॒:248:262:263:reB1_reBqz_BvAxiH+Sabxe:","revf!:plavagatO:rev:01:0584:A:sew:रे॑वृँ॒:308:323:325:rev1_revqz_BvAxiH+plavagawO:","rezf!:avyakte Sabde:rez:01:0707:A:sew:रे॑षृँ॒:376::398:reR1_reRqz_BvAxiH+avyakwe_Sabxe:","rE:Sabde:rE:01:1057:pa:aniw:रै॒:576:600:612:rE1_rE_BvAxiH+SabxE:","roqf!:unmAde:roq:01:0412:pa:sew:रो॑डृँ॑:228::240:rod1_rodqz_BvAxiH+unmAxe:","rOqf!:anAdare:rOq:01:0411:pa:sew:रौ॑डृँ॑::239:239:rOd1_rOdqz_BvAxiH+anAxare:","lakza!:Alocane:lakz:10:0219:A:sew:ल॑क्षँ॒:1136,1269:1152,1288:1190,1322:lakR1_lakRaz_curAxiH+xarSanAfkanayoH,lakR2_lakRaz_curAxiH+lakRaNe:268","lakza!:darSanANkanayoH:lakz:10:0006:u:sew:ल॑क्षँ॑:1136,1269:1152,1288:1190,1322:lakR1_lakRaz_curAxiH+xarSanAfkanayoH,lakR2_lakRaz_curAxiH+lakRaNe:268","laKa!:gatyarTaH:laK:01:0146:pa:sew:ल॑खँ॑:84:87:88:laK1_laKaz_BvAxiH+gawyarWaH:","laga!:AsvAdane:lag:10:0263:u:sew:ल॑गँ॑:1306:::lag2_lagaz_curAxiH+AsvAxane:","lage!:saNge:lag:01:0895:pa:sew:ल॑गेँ॑::509:514:lag1_lagez_BvAxiH+safge:","laKi!:gatyarTaH:laNK:01:0147:pa:sew:ल॑खिँ॑:84:87:88:lafK1_laKiz_BvAxiH+gawyarWaH:","lagi!:gatyarTaH:laNg:01:0154:pa:sew:ल॑गिँ॑:84:87:88:lafg1_lagiz_BvAxiH+gawyarWaH:","laGi!:BAzArTaH ca:laNG:10:0291:u:sew:ल॑घिँ॑:1321::1374:lafG3_laGiz_curAxiH+BARArWaH:279","laGi!:BAzArTaH:laNG:10:0327:u:sew:ल॑घिँ॑:1321::1374:lafG3_laGiz_curAxiH+BARArWaH:279","laGi!:gatyarTaH laGi! BojananivfttAvapi:laNG:01:0113:A:sew:ल॑घिँ॒:73:72,73:74,91:lafG1_laGiz_BvAxiH+gawyarWaH_BojananivqwwAvapi,lafG2_laGiz_BvAxiH+MISSING:328","laGi!:SozaRe BAzAyAM dIptO sImAtikrame ca:laNG:01:0182:pa:sew:ल॑घिँ॑:73:72,73:74,91:lafG1_laGiz_BvAxiH+gawyarWaH_BojananivqwwAvapi,lafG2_laGiz_BvAxiH+MISSING:328","laCa!:lakzaRe:laC:01:0234:pa:sew:ल॑छँ॑:114:120:121:laC1_laCaz_BvAxiH+lakRaNe:","laja:prakASane:laja:10:0463:u:sew:ल॑ज॑:1422::1477::","laja!:apavAraRe ityeke:laj:10:0016:u:sew:ल॑जँ॑:1422::1477::","laja!:Barjane:laj:01:0271:pa:sew:ल॑जँ॑:138:145:146:laj1_lajaz_BvAxiH+Barjane:","o!lajI!:vrIqAyAm vrIqe:laj:06:0010:A:sew:ओँ॑ल॑जीँ॒:1322::::","laji!:BAzArTaH ca:laYj:10:0315:u:sew:ल॑जिँ॑::::laFj2_lajiz_curAxiH+hiMsAbalAxAnanikewaneRu,laFj3_lajiz_curAxiH+BARArWaH,laFj4_lajiz_curAxiH+MISSING:","laji!:hiMsAbalAdAnaniketanezu:laYj:10:0048:u:sew:ल॑जि॑::::laFj2_lajiz_curAxiH+hiMsAbalAxAnanikewaneRu,laFj3_lajiz_curAxiH+BARArWaH,laFj4_lajiz_curAxiH+MISSING:","laji!:Barjane:laYj:01:0272:pa:sew:ल॑जिँ॑:138:145:146:laFj1_lajiz_BvAxiH+Barjane:","laji!:prakASane ityeke:laYj:10:0465:u:sew:ल॑जि॑::::laFj2_lajiz_curAxiH+hiMsAbalAxAnanikewaneRu,laFj3_lajiz_curAxiH+BARArWaH,laFj4_lajiz_curAxiH+MISSING:","lawa!:bAlye:law:01:0335:pa:sew:ल॑टँ॑:183:192:192:lat1_lataz_BvAxiH+bAlye:","laqa!:upasevAyAm jihvonmaTane laqiH mit 1926:laq:10:0010:u:sew:ल॑डँ॑:1138:1154:1192:lad3_ladaz_curAxiH+upasevAyAm:","laqa!:vilAse:laq:01:0415:pa:sew:ल॑डँ॑:230:242:242:lad1_ladaz_BvAxiH+vilAse:","laqi!:BAzArTaH ca:laRq:10:0331:u:sew:ल॑डिँ॑::::laNd2_ladiz_curAxiH+BARArWaH:","o!laqi!:olaqi! utkzepane u!laqi! ityanye:laRq:10:0013:u:sew:ओँ॑ल॑डिँ॑:1140:1156:1194:laNd1_ozladiz_curAxiH+uwkRepaNe:","lapa!:vyaktAyAM vAci:lap:01:0468:pa:sew:ल॑पँ॑:261:276:277:lap1_lapaz_BvAxiH+vyakwAyAM_vAci:","qulaBa!z:prAptO:laB:01:1130:A:aniw:डुल॒भँ॒ष्:626:651:664:laB1_dulaBazR_BvAxiH+prApwO:","labi!:Sabde:lamb:01:0439:A:sew:ल॑बिँ॒:241,242:255,256:256,257:lamb1_labiz_BvAxiH+Sabxe:","labi!:Sabde avasraMsane ca:lamb:01:0437:A:sew:ल॑बिँ॒:241,242:255,256:256,257:lamb1_labiz_BvAxiH+Sabxe:","laBi!:ca Sabde kvacitpaWyate:lamB:01:0450:A:sew:ल॑भिँ॒:::::","laya!:ca gatO:lay:01:0555:A:sew:ल॑यँ॒:::::","larba!:gatO:larb:01:0483:pa:sew:ल॑र्बँ॑:264:::larb1_larbaz_BvAxiH+gawO:","lala!:vilAse ityeke IpsAyAm:lal:01:0416:pa:sew:ल॑लँ॑:::::","lala!:IpsAyAm:lal:10:0210:A:sew:ल॑लँ॒:1261:1280:1314:lal1_lalaz_curAxiH+IpsAyAm:","laza!:kAntO:laz:01:1033:u:sew:ल॑षँ॒॑:559:580:591:laR1_laRaz_BvAxiH+kAnwO:","lasa!:Sabde SlezaRakrIqanayoH ca:las:01:0811:pa:sew:ल॑सँ॑:431:450:457:las1_lasaz_BvAxiH+SleRaNakrIdanayoH:","lasa!:Silpayoge:las:10:0253:u:sew:ल॑सँ॑:1298::1351:las2_lasaz_curAxiH+Silpayoge:","o!lasjI!:vrIqAyAm vrIqe:lasj:06:0011:A:sew:ओँ॑ल॑स्जीँ॒:918:939:960:lasj1_ozlasjIz_wuxAxiH+vrIdAyAm:","lA:AdAne dAne:lA:02:0053:pa:aniw:ला॒:708:730:747:lA1_lA_axAxiH+AxAne:","lAKf!:SozaRAlamarTyoH:lAK:01:0131:pa:sew:ला॑खृँ॑:82:85:86:lAK1_lAKqz_BvAxiH+SoRaNAlamarWayoH:","lAGf!:sAmarTye:lAG:01:0119:A:sew:ला॑घृँ॒:75:76:77:lAG1_lAGqz_BvAxiH+sAmarWye:48","lAja!:Barjane Bartsane ca:lAj:01:0273:pa:sew:ला॑जँ॑:139:146:147:lAj1_lAjaz_BvAxiH+Barwsane_ca:","lACi!:lakzaRe:lAYC:01:0235:pa:sew:ला॑छिँ॑:114:120:121:lAFC1_lACiz_BvAxiH+lakRaNe:","lAji!:Barjane Bartsane ca:lAYj:01:0274:pa:sew:ला॑जिँ॑:139:146:147:lAFj1_lAjiz_BvAxiH+Barwsane_ca:","lABa:preraRe:lABa:10:0482:u:sew:ला॑भ॑:1436:1455:1494:lABa1_lABa_curAxiH+preraNe:","liKa!:gatyarTaH ityapi kecit:liK:01:0170:pa:sew:लि॑खँ॑:::::","liKa!:akzaravinyAse:liK:06:0092:pa:sew:लि॑खँ॑:975:996:1018:liK1_liKaz_wuxAxiH+akRaravinyAse:401","liKi!:gatyarTaH ityapi kecit:liNK:01:0171:pa:sew:लि॑खिँ॑:::::","ligi!:gatyarTAH:liNg:01:0165:pa:sew:लि॑गिँ॑:84:87:88:lifg1_ligiz_BvAxiH+gawyarWaH:","ligi!:citrIkaraRe:liNg:10:0267:u:sew:लि॑गिँ॑:1308:1333:1366:lifg2_ligiz_curAxiH+ciwrIkaraNe:","liji!:BAzArTaH:liYj:10:0288:u:sew:लि॑जिँ॑:::::","lipa!:upadehe:lip:06:0169:u:aniw:लि॒पँ॒॑:1034:1053:1086:lip1_lipaz_wuxAxiH+upaxehe:413","liSa!:alpIBAve:liS:04:0076:A:aniw:लि॒शँ॒:820:839:851:liS1_liSaz_xivAxiH+alpIBAve:","liSa!:gatO:liS:06:0157:pa:aniw:लि॒शँ॑:1022:1042:1074:liS2_liSaz_wuxAxiH+gawO:","liha!:AsvAdane:lih:02:0006:u:aniw:लि॒हँ॒॑:666:690:704:lih1_lihaz_axAxiH+AsvAxane:","lI:dravIkaraRe:lI:10:0343:u:sew:ली॑:1329:1348:1382:lI3_lI_curAxiH+xravIkaraNe:","lIN:SlezaRe:lI:04:0034:A:aniw:ली॒ङ्:::::","lI:SlezaRe:lI:09:0036:pa:aniw:ली॒:1103:1120:1157::","luYca!:apanayane:luYc:01:0214:pa:sew:लु॑ञ्चँ॑:106:112:113::66","luji!:BAzArTaH:luYj:10:0049:u:sew:लु॑जिँ॑:1321:1174:1374:luFj1_lujiz_curAxiH+hiMsAbalAxAnanikewaneRu,luFj2_lujiz_curAxiH+BARArWaH:","luji!:hiMsAbalAdAnaniketanezu:luYj:10:0289:u:sew:लु॑जिँ॑:1321:1174:1374:luFj1_lujiz_curAxiH+hiMsAbalAxAnanikewaneRu,luFj2_lujiz_curAxiH+BARArWaH:","luwa!:upaGAte pratiGAte:luw:01:0351:A:sew:लु॑टँ॒:196,455:205:205,483:lut1_lutaz_BvAxiH+vilodane,lut2_lutaz_BvAxiH+prawiGAwe:93","luwa!:BAzArTaH:luw:10:0133:u:sew:लु॑टँ॑:1321::1374:lut5_lutaz_curAxiH+BARArWaH:","luwa!:viloqane:luw:04:0109:pa:sew:लु॑टँ॑:862:882:902::","luwa!:viloqane:luw:01:0850:pa:sew:लु॑टँ॑:196,455:205:205,483:lut1_lutaz_BvAxiH+vilodane,lut2_lutaz_BvAxiH+prawiGAwe:93","luwa!:saMSlezaRe:luw:06:0284:pa:sew:लु॑टँ॑:990::::","luWa!:upaGAte pratiGAte:luW:01:0390:A:sew:लु॑ठँ॒:213,218,455:476:225,483:luT1_luTaz_BvAxiH+upaGAwe:","luWa!:upaGAte:luW:01:0851:pa:sew:लु॑ठँ॑:213,218,455:476:225,483:luT1_luTaz_BvAxiH+upaGAwe:","luWa!:viloqane ityeke:luW:04:0134:pa:sew:लु॑ठँ॑:::::","luWa!:saMSlezaRe ityeke:luW:06:0110:pa:sew:लु॑ठँ॑:::1033:luT3_luTaz_wuxAxiH+saMSleRaNayoH:","luqa!:viloqane ityeke:luq:01:0352:pa:sew:लु॑डँ॑::::lud1_ludaz_BvAxiH+vilodane:","luqa!:saMSlezaRe ityanye:luq:06:0111:pa:sew:लु॑डँ॑:::::","luRwa!:steye:luRw:10:0039:u:sew:लु॑ण्टँ॑:::::","luwi!:steye:luRw:01:0372:pa:sew:लु॑टिँ॑::217:217::","luRWa!:steye iti kecit:luRW:10:0040:u:sew:लु॑ण्ठँ॑:1157:1172:1211:luNT3_luNTaz_curAxiH+sweye:","luWi!:steye ityeke:luRW:01:0374:pa:sew:लु॑ठिँ॑:206,220:233:231,233:luNT2_luTiz_BvAxiH+gawO:","luWi!:Alasye pratiGAte ca:luRW:01:0398:pa:sew:लु॑ठिँ॑:206,220:233:231,233:luNT2_luTiz_BvAxiH+gawO:","luWi!:gatO:luRW:01:0401:pa:sew:लु॑ठिँ॑:206,220:233:231,233:luNT2_luTiz_BvAxiH+gawO:","luqi!:steye ityapare:luRq:01:0376:pa:sew:लु॑डिँ॑:::::","luTi!:hiMsAsaNkleSanayoH:lunT:01:0047:pa:sew:लु॑थिँ॑:35:35:37:lunW1_luWiz_BvAxiH+hiMsAsaMkleSanayoH:","lupx!:Cedane:lup:06:0167:u:aniw:लु॒पॢँ॒॑॑:1032:1051:1084::","lupa!:vimohane:lup:04:0150:pa:sew:लु॑पँ॑:873:894:913::","luBa!:gArdDye gArDnye:luB:04:0153:pa:sew:लु॑भँ॑:874:895:914:luB1_luBaz_xivAxiH+gArXye:","luBa!:vimohane:luB:06:0025:pa:sew:लु॑भँ॑:929:952:972:luB2_luBaz_wuxAxiH+vimohane:","lubi!:adarSane ardana ityeke:lumb:10:0159:u:sew:लु॑बिँ॑:1235:1250:1287:lumb2_lubiz_curAxiH+AcCAxane:","lubi!:ardane:lumb:01:0493:pa:sew:लु॑बिँ॑:266::282:lumb1_lubiz_BvAxiH+arxane:","lUY:Cedane:lU:09:0016:u:sew:लू॑ञ्:1084:1101:1135:lU1_lUF_kryAxiH+Cexane:425","lUza!:BUzAyAm:lUz:01:0771:pa:sew:लू॑षँ॑::::lUR1_lURaz_BvAxiH+BURAyAm:","lUza!:hiMsAyAm:lUz:10:0100:u:sew:लू॑षँ॑:1195:1211:1251:lUR2_lURaz_curAxiH+MISSING:","lepf!:gatO:lep:01:0431:A:sew:ले॑पृँ॒:238:251::lep1_lepqz_BvAxiH+gawO:","lokf!:BAzArTaH:lok:10:0307:u:sew:लो॑कृँ॑:1321::1374:lok2_lokqz_curAxiH+BARArWaH:257","lokf!:darSane:lok:01:0080:A:sew:लो॑कृँ॒:61:60:62:lok1_lokqz_BvAxiH+xarSane:42","locf!:BAzArTaH:loc:10:0308:u:sew:लो॑चृँ॑:1321::1374:loc2_locqz_curAxiH+BARArWaH:278","locf!:darSane:loc:01:0188:A:sew:लो॑चृँ॒:91:95:97:loc1_locqz_BvAxiH+xarSane:58","loqf!:unmAde:loq:01:0413:pa:sew:लो॑डृँ॑:228::240:lod1_lodqz_BvAxiH+unmAxe:","lozwa!:saNGAte:lozw:01:0291:A:sew:लो॑ष्टँ॒:148:156:157:loRt1_loRtaz_BvAxiH+calane:","vakza!:roze saNGAta ityeke:vakz:01:0753:pa:sew:व॑क्षँ॑:405:423:429:vakR1_vakRaz_BvAxiH+roRe:","vaKa!:gatyarTaH:vaK:01:0138:pa:sew:व॑खँ॑:84:87:88:vaK1_vaKaz_BvAxiH+gawyarWaH:","vaki!:gatyarTaH:vaNk:01:0093:A:sew:व॑किँ॒:68,73:67:69,74:vafk1_vakiz_BvAxiH+gawyarWaH:","vaki!:kOwilye:vaNk:01:0100:A:sew:व॑किँ॒:68,73:67:69,74:vafk1_vakiz_BvAxiH+gawyarWaH:","vaKi!:gatyarTaH:vaNK:01:0139:pa:sew:व॑खिँ॑:84:87:88:vafK1_vaKiz_BvAxiH+gawyarWaH:","vagi!:gatyarTaH:vaNg:01:0156:pa:sew:व॑गिँ॑:84:87:88:vafg1_vagiz_BvAxiH+gawyarWaH:","vaGi!:gatyAkzepe gatO gatyAramBe cetyapare:vaNG:01:0116:A:sew:व॑घिँ॒:74:74:75::","vaca!:pariBAzaRe:vac:10:0380:u:sew:व॑चँ॑:713:735:752:vac1_vacaz_axAxiH+pariBARaNe:","vaca!:pariBAzaRe:vac:02:0058:pa:aniw:व॒चँ॑:713:735:752:vac1_vacaz_axAxiH+pariBARaNe:","vaja!:gatO:vaj:01:0285:pa:sew:व॑जँ॑:144:152:153:vaj1_vajaz_BvAxiH+gawO:","vaYcu!:gatyarTaH:vaYc:01:0216:pa:sew:व॑ञ्चुँ॑:108:114:115:vaFc1_vaFcuz_BvAxiH+gawyarWaH:","vaYcu!:pralamBane:vaYc:10:0227:A:sew:व॑ञ्चुँ॒:1276:1294:1327:vaFc2_vaFcuz_curAxiH+pralamBane:","vawa:granTe:vawa:10:0395:u:sew:व॑ट॑:1370,1421:1386:1424,1476:vata1_vata_curAxiH+granWe:","vawa:viBAjane:vawa:10:0461:u:sew:व॑ट॑:1370,1421:1386:1424,1476:vata1_vata_curAxiH+granWe:","vawa!:pariBAzaRe:vaw:01:0888:pa:sew:व॑टँ॑:185,480:194,503:193,508::","vawa!:vezwane:vaw:01:0337:pa:sew:व॑टँ॑:185,480:194,503:193,508::","vaWa!:sTOlye:vaW:01:0382:pa:sew:व॑ठँ॑:209:220:220::","vaRa!:SabdArTaH:vaR:01:0514:pa:sew:व॑णँ॑:277:290:293:vaN1_vaNaz_BvAxiH+SabxArWaH:","vawi!:viBAjane:vaRw:10:0073:u:sew:व॑टिँ॑::::vaNt1_vatiz_curAxiH+viBAjane:","vawi!:viBAjane:vaRw:01:0377:pa:sew:व॑टिँ॑::216:216::","vawi!:prakASane ityeke:vaRw:10:0464:u:sew:व॑टिँ॑::::vaNt1_vatiz_curAxiH+viBAjane:","vaWi!:ekacaryAyAm:vaRW:01:0295:A:sew:व॑ठिँ॒:152:159:161:vaNT1_vaTiz_BvAxiH+ekacaryAyAm:","vaqi!:viBAjane ityeke:vaRq:10:0074:u:sew:व॑डिँ॑::1190::vaNd2_vadiz_curAxiH+viBAjane:","vaqi!:viBAjane:vaRq:01:0304:A:sew:व॑डिँ॒:160:167:169:vaNd1_vadiz_BvAxiH+viBAjane:","vada!:sandeSavacane:vad:10:0379:u:sew:व॑दँ॒॑:1356:1372:1409:vax2_vaxaz_curAxiH+sanxeSavacane:","vada!:vyaktAyAM vAci:vad:01:1164:pa:sew:व॑दँ॑:659:683:697::178","vana!:samBaktO:van:01:0534:pa:sew:व॑नँ॑:285,286:296,299:301,302:van1_vanaz_BvAxiH+Sabxe:","vanu!:ca nocyate nopalaByate:van:01:0915:pa:sew:व॑नुँ॑:493:517:522:van2_vanuz_BvAxiH+nocyawe:","vanu!:yAcane mit anupasargAdvA 1947:van:08:0008:A:sew:व॑नुँ॒:1071:1088:1122:van3_vanuz_wanAxiH+yAcane:217","vana!:Sabde:van:01:0533:pa:sew:व॑नँ॑:285,286:296,299:301,302:van1_vanaz_BvAxiH+Sabxe:","vadi!:aBivAdanastutyoH:vand:01:0011:A:sew:व॑दिँ॒:10:10:10:vanx1_vaxiz_BvAxiH+aBivAxanaswuwyoH:9","quvapa!:bIjasantAne Cedane'pi:vap:01:1158:u:aniw:डुव॒पँ॒॑:653:677:691:vap1_duvapaz_BvAxiH+bIjasanwAne:","vaBra!:gatyarTaH:vaBr:01:0638:pa:sew:व॑भ्रँ॑:341::361:vaBr1_vaBraz_BvAxiH+gawyarWaH:","wuvama!:udgiraRe mit anupasargAdvA 1948:vam:01:0984:pa:sew:टुव॑मँ॑:525:545:557:vam2_tuvamaz_BvAxiH+uxigaraNe:","vaya!:gatO:vay:01:0547:A:sew:व॑यँ॒:291:305:307:vay1_vayaz_BvAxiH+gawO:","vara:IpsAyAm:vara:10:0390:u:sew:व॑र॑:1367:1383:1421:vara1_vara_curAxiH+IpsAyAm:","varca!:dIptO:varc:01:0186:A:sew:व॑र्चँ॒:89:93:95:varc1_varcaz_BvAxiH+xIpwO:57","varRa:varRakriyAvistAraguRavacanezu bahulametannidarSanam ityeke:varRa:10:0484:u:sew:व॑र्ण॑:1438:1457:1493:varNa1_varNa_curAxiH+varNakriyAviswAraguNavacaneRu:267","varRa!:preraRe varRa! varRana ityeke:varR:10:0025:u:sew:व॑र्णँ॑:1438:1457:1493:varNa1_varNa_curAxiH+varNakriyAviswAraguNavacaneRu:267","varDa!:CedanapUranayoH:varD:10:0156:u:sew:व॑र्धँ॑:1233:1248:1285:varX1_varXaz_curAxiH+CexanapUraNayoH:243","varza!:snehane:varz:01:0697:A:sew:व॑र्षँ॒:372::392:varR1_varRaz_BvAxiH+snehane:","varha!:BAzArTaH:varh:10:0175:u:sew:ब॑र्हँ॑:1241:1256:1293:barh2_barhaz_curAxiH+hiMsAyAm:","varha!:pariBAzaRahiMsAcCAdanezu:varh:01:0727:A:sew:व॑र्हँ॒::406:411:varh1_varhaz_BvAxiH+pariBARaNahiMsAcCAxaneRu:","varha!:hiMsAyAm ityeke:varh:10:0300:u:sew:व॑र्हँ॑:1321::1374::","vala!:saMvaraRe saYcalane ca mit iti BojaH 0930:val:01:0564:A:sew:व॑ल॒:301:316:::115","valka!:pariBAzaRe:valk:10:0054:u:sew:व॑ल्कँ॑:1162:1177:1217:valk1_valkaz_curAxiH+pariBARaNe:","valga!:gatyarTaH:valg:01:0152:pa:sew:व॑ल्गँ॑:84:87:88::","valBa!:Bojane:valB:01:0456:A:sew:व॑ल्भँ॒:252:266:267:valB1_valBaz_BvAxiH+Bojane:","valla!:saMvaraRe saYcalane ca:vall:01:0565:A:sew:व॑ल्लँ॒:301::318::","valha!:pariBAzaRahiMsAcCAdanezu:valh:01:0728:A:sew:व॑ल्हँ॒:::410,411:valh1_valhaz_BvAxiH+pariBARaNahiMsAcCAxaneRu:","vaSa!:kAntO:vaS:02:0075:pa:sew:व॑शँ॑:729:751:768:vaS1_vaSaz_axAxiH+kAnwO:","vaza!:hiMsArTaH:vaz:01:0787:pa:sew:व॑षँ॑::438:447:vaR1_vaRaz_BvAxiH+hiMsArWaH:","vasa:nivAse:vasa:10:0488:u:sew:व॑स॑:1442::1498:vasa1_vasa_curAxiH+nivAse:252","vasa!:AcCAdane:vas:02:0013:A:sew:व॑सँ॒:673:697:711:vas2_vasaz_axAxiH+AcCAxane:","vasa!:nivAse:vas:01:1160:pa:aniw:व॒सँ॑:655:679:693:vas1_vasaz_BvAxiH+nivAse:179","vasu!:stamBe:vas:04:0111:pa:sew:व॑सुँ॑:854:874:894:vas3_vasuz_xivAxiH+swamBe:","vasa!:snehacCedApaharaRezu:vas:10:0273:u:sew:व॑स॑::::vas2_vasaz_axAxiH+AcCAxane:","vaska!:gatyarTaH:vask:01:0106:A:sew:व॑स्कँ॒:73:72:74:vask1_vaskaz_BvAxiH+gawyarWaH:","vasta!:ardane ityeke:vast:10:0205:A:sew:व॑स्तँ॒:::::","vaha!:prApaRe:vah:01:1159:u:aniw:व॒हँ॒॑:654:678:692:vah1_vahaz_BvAxiH+prApaNe:","vA:gatiganDanayoH:vA:02:0045:pa:aniw:वा॒:700:722:739:vA1_vA_axAxiH+gawiganXanayoH:","vAkzi!:kANkzAyAm:vANkz:01:0761:pa:sew:वा॑क्षिँ॑:409:426:435:vAfkR1_vAkRiz_BvAxiH+kAfkRAyAm:","vACi!:icCAyAm:vAYC:01:0236:pa:sew:वा॑छिँ॑:115:121:122:vAFC1_vACiz_BvAxiH+icCAyAm:70","vAqf!:AplAvye ityeke:vAq:01:0321:A:sew:वा॑डृ॒:174:183:183::","vAta:suKasevanayoH:vAta:10:0424:u:sew:वा॑त॑:1392::1448:vAwa1_vAwa_curAxiH+suKasevanayoH:","vAvftu!:varaRe vartane iti kecit:vAvft:04:0056:A:sew:वा॑वृ॑तुँ॒::822:::","vASf!:Sabde:vAS:04:0059:A:sew:वा॑शृँ॒:804:825:843:vAS1_vASqz_xivAxiH+Sabxe:","vAsa:upasevAyAm:vAsa:10:0426:u:sew:वा॑स॑:1394:1411:1450:vAsa1_vAsa_curAxiH+upasevAyAm:","vici!r:pfTagBAve:vic:07:0005:u:aniw:वि॒चिँ॒॑र्::1062:1095:vic1_vicizr_ruXAxiH+pqWagBAve:","viCa!:BAzArTaH:viC:06:0159:u:sew:वि॑छँ॑:1024:1044:1076:viC1_viCaz_wuxAxiH+gawO:","viCa!:gatO:viC:10:0304:u:sew:वि॑छँ॑:1321::1374:viC2_viCaz_curAxiH+BARArWaH:","viji!r:pfTagBAve:vij:03:0013:u:aniw:वि॒जिँ॒॑र्:743:765:781:vij1_vijizr_juhowyAxiH+varaNe:","o!vijI!:BayacalanayoH:vij:06:0009:A:sew:ओँ॑वि॑जीँ॒:917:938:959::","o!vijI!:BayacalanayoH:vij:07:0023:pa:sew:ओँ॑वि॑जीँ॑:1061:1079:1112:vij2_ozvijIz_ruXAxiH+BayacalanayoH:","viwa!:Sabde:viw:01:0354:pa:sew:वि॑टँ॑:198:208:207:vit1_vitaz_BvAxiH+Sabxe:","viTf!:yAcane:viT:01:0033:A:sew:वि॑थृँ॒:26:27:27:viW1_viWqz_BvAxiH+yAcane:","vida!:cetanAKyAnanivAsezu:vid:10:0232:A:sew:वि॑दँ॒:714:736:753:vix1_vixaz_axAxiH+jFAne:196","vida!:jYAne:vid:02:0059:pa:sew:वि॑दँ॑:714:736:753:vix1_vixaz_axAxiH+jFAne:196","vidx!:lABe:vid:06:0168:u:sew:वि॑दॢँ॒॑॑:1051:1070:1103::","vida!:vicAraRe:vid:07:0013:A:aniw:वि॒दँ॒:1051:1070:1103:vix4_vixaz_ruXAxiH+vicArane:","vida!:sattAyAm:vid:04:0067:A:aniw:वि॒दँ॒:812:832:852:vix2_vixaz_xivAxiH+sawwAyAm:369","viDa!:viDAne:viD:06:0050:pa:sew:वि॑धँ॑:940:963:983:viX1_viXaz_wuxAxiH+viXAne:","vipa!:kzepe cetyeke:vip:10:0138:u:sew:वि॑पँ॑:::::","vila!:kzepe:vil:10:0094:u:sew:वि॑लँ॑:969:990:1016:vil1_vilaz_wuxAxiH+saMvaraNe:","vila!:saMvaraRe:vil:06:0085:pa:sew:वि॑लँ॑:969:990:1016:vil1_vilaz_wuxAxiH+saMvaraNe:","viSa!:praveSane:viS:06:0160:pa:aniw:वि॒शँ॑:1025:1045:1077::","vizu!:secane:viz:01:0794:pa:aniw:वि॑षुँ॑:424:441:450::","viza!:viprayoge:viz:09:0062:pa:aniw:वि॒षँ॑:1126:1141:1179::","vizx!:vyAptO:viz:03:0014:u:aniw:वि॒षॢँ॒॑॑:744:766:782:viR2_viRLz_juhowyAxiH+vyApwO:","vizka:darSane:vizka:10:0486:u:sew:वि॑ष्क॑:::1496:viRka1_viRka_curAxiH+xarSane:","vizka!:hiMsAyAm:vizk:10:0207:A:sew:वि॑ष्कँ॒:::1496:viRka1_viRka_curAxiH+xarSane:","visa!:gatO:vis:01:0818:pa:sew:वि॑सँ॑:::::","bisa!:preraRe ityeke:bis:04:0124:pa:sew:बि॑सँ॑:857:877:::","vI:gatiprajanakAntyasanaKAdanezu:vI:02:0043:pa:aniw:वी॒:698:720:737:vI1_vI_axAxiH+gawivyApwiprajanakAnwyasanaKAxaneRu:","vIja!:gatO:vIj:01:0209:A:sew:वी॑जँ॒:::::","vIra:vikrAntO:vIra:10:0445:A:sew:वी॑र॒:1407:1425:1463:vIra1_vIra_curAxiH+vikrAnwO:","vugi!:varjane ityeke:vuNg:01:0178:pa:sew:वु॑गिँ॑::89:::","vusa!:viBAge iti kecit:vus:04:0118:pa:sew:वु॑सँ॑:::::","vfY:AvaraRe:vf:10:0345:u:sew:वृ॑ञ्:1331:1350:1384:vq4_vqF_curAxiH+AvaraNe:","vfY:varaRe:vf:05:0008:u:sew:वृ॑ञ्:889:910:929:vq2_vqF_svAxiH+varaNe:394","vfN:samBaktO:vf:09:0045:A:sew:वृ॑ङ्:1111:1127:1164::228","vfhi!:BAzArTaH:vfMh:10:0299:u:sew:वृ॑हिँ॑::::bqMh2_bqhiz_curAxiH+BARArWaH:","bfhi!:vfdDO bfhi! vfhi! Sabde ca:vfMh:01:0837:pa:sew:बृ॑हिँ॑:::::","vfka!:AdAne:vfk:01:0097:A:sew:वृ॑कँ॒:71:70:72:vqk1_vqkaz_BvAxiH+AxAne:","vfkza!:varaRe:vfkz:01:0688:A:sew:वृ॑क्षँ॒:363:380:384:vqkR1_vqkRaz_BvAxiH+varaNe:","vfjI!:varjane:vfj:10:0022:u:sew:वृ॑जीँ॑:1330:1349:1383:vqj3_vqjIz_curAxiH+varjane:260","vfjI!:varjane:vfj:02:0024:A:sew:वृ॑जीँ॒:679::718:vqj1_vqjIz_axAxiH+varjane:","vfjI!:varjane:vfj:07:0344:pa:sew:वृ॑जीँ॑:1062:1080:1113:vqj2_vqjIz_ruXAxiH+varjane:420","vfji!:varjane ityeke:vfYj:02:0023:A:sew:वृ॑जिँ॒:::::","vfRa!:ca prIRane:vfR:06:0056:pa:sew:वृ॑णँ॑::::vqN1_vqNaz_wuxAxiH+prINane:","vftu!:BAzArTaH:vft:10:0055:u:sew:वृ॑तुँ॑:1321::1374:vqw3_vqwuz_curAxiH+BARArWaH:","vftu!:varaRe vartane:vft:04:0312:A:sew:वृ॑तुँ॒:801::840:vqw2_vqwuz_xivAxiH+varaNe:","vftu!:vartane:vft:01:0862:A:sew:वृ॑तुँ॒:462:483:489:vqw1_vqwuz_BvAxiH+varwane:330","vfDu!:BAzArTAH:vfD:10:0313:u:sew:वृ॑धुँ॑:1321::1374:vqX2_vqXuz_curAxiH+BARArWaH:","vfDu!:vfDO:vfD:01:0863:A:sew:वृ॑धुँ॒::484:490:vqX1_vqXuz_BvAxiH+vqxXO:331","vfSa!:varaRe:vfS:04:0139:pa:sew:वृ॑शँ॑:865:885:906:vqS1_vqSaz_xivAxiH+AvaraNe:","vfzu!:secane hiMsAsaNkleSanayoSca:vfz:01:0803:pa:sew:वृ॑षुँ॑:427:444:453::333","vfza!:SaktibanDane:vfz:10:0228:A:sew:वृ॑षँ॒:1277:1295::vqR2_vqRaz_curAxiH+SakwibanXane:","vfhU!:udyamane:vfh:06:0073:pa:sew:वृ॑हूँ॑:960::1003:vqh1_vqhUz_wuxAxiH+uxyamane:","vFY:varaRe:vF:09:0019:u:sew:वॄ॑ञ्:1087:1104:1138:vQ1_vQF_kryAxiH+varaNe:","vF:varaRe BaraRa ityeke:vF:09:0023:pa:sew:वॄ॑:1091:1109:1143:vQ2_vQ_kryAxiH+varaNe:","veY:tantusantAne:ve:01:1161:u:aniw:वे॒ञ्:656:680:694:ve1_veF_BvAxiH+wanwusanwAne:","veRf!:gatijYAnacintAniSAmanavAditragrahaRezu:veR:01:1018:u:sew:वे॑णृँ॒॑:549:570:581:veN1_veNqz_BvAxiH+gawijFAnacinwAniSAmanavAxiwragrahaNeRu:","veTf!:yAcane:veT:01:0034:A:sew:वे॑थृँ॒:26:27:27:veW1_veWqz_BvAxiH+yAcane:","venf!:gatijYAnacintAniSAmanavAditragrahaRezu ityeke:ven:01:1019:u:sew:वे॑नृँ॒॑:::::","wuvepf!:kampane:vep:01:0425:A:sew:टुवे॑पृ॒:236:249:250:vep1_tuvepqz_BvAxiH+kampane:103","vela:kAlopadeSe:vela:10:0421:u:sew:वे॑ल॑:1390:1407:1446:vela1_vela_curAxiH+kAlopaxeSe:","velf!:calane:vel:01:0614:pa:sew:वे॑लृँ॑:330::348::","vella!:calane:vell:01:0619:pa:sew:वे॑ल्लँ॑:330::348:vell1_vellaz_BvAxiH+calane:","vevIN:vetinA tulye:vevI:02:0072:A:sew:वे॑वी॑ङ्:727:749:766:vevI1_vevIf_axAxiH+vewinA_wulye:","vezwa!:vezwane:vezw:01:0288:A:sew:वे॑ष्टँ॒:146:154:155:veRt1_veRtaz_BvAxiH+veRtane:82","vesa!:gatO:ves:01:0819:pa:sew:वे॑सँ॑:::::","vehf!:prayatne:veh:01:0730:A:sew:वे॑हृँ॒:391:408:413:veh1_vehqz_BvAxiH+prayawne:","vehla!:calane:vehl:01:0620:pa:sew:वे॑ह्लँ॑:330::348:vell1_vellaz_BvAxiH+calane:","o!vE:SozaRe:vE:01:1070:pa:aniw:ओँ॑वै॑:582:606:618:vE1_ozvE_BvAxiH+SoRaNe:","vyaca!:vyAjIkaraRe:vyac:06:0013:pa:sew:व्य॑चँ॑:920:941:962:vyac1_vyacaz_wuxAxiH+vyAjIkaraNe:","vyaTa!:BayasaYcalanayoH:vyaT:01:0868:A:sew:व्य॑थँ॒:467:489:495:vyaW1_vyaWaz_BvAxiH+BayasaFcalanayoH:334","vyaDa!:tAqane:vyaD:04:0078:pa:aniw:व्य॒धँ॑:822:841:861:vyaX1_vyaXaz_xivAxiH+wAdane:","vyapa!:kzepe:vyap:10:0136:u:sew:व्य॑पँ॑:::::","vyaya:vittasamutsarge:vyaya:10:0478:u:sew:व्य॑य॑:1433::1489:vyaya1_vyaya_curAxiH+viwwasamuwsarge:","vyaya!:kzepe catyeke:vyay:10:0137:u:sew:व्य॑यँ॑:1433::1489:vyaya1_vyaya_curAxiH+viwwasamuwsarge:","vyaya!:gatO:vyay:01:1024:u:sew:व्य॑यँ॒॑:553:574:585:vyay1_vyayaz_BvAxiH+gawO:","vyuza!:dAhe:vyuz:04:0114:pa:sew:व्यु॑षँ॑:761,855::800,895:vyuR1_vyuRaz_xivAxiH+xAhe_viBAge_ca,vyuR2_vyuRaz_xivAxiH+viBAge:","vyuza!:viBAge:vyuz:04:0008:pa:sew:व्यु॑षँ॑:761,855::800,895:vyuR1_vyuRaz_xivAxiH+xAhe_viBAge_ca,vyuR2_vyuRaz_xivAxiH+viBAge:","vyusa!:viBAge ityeke:vyus:04:0115:pa:sew:व्यु॑सँ॑:::::","vyusa!:hasane sahane cetyeke ityeke:vyus:10:0276:u:sew:व्यु॑सँ॑:::::","vyeY:saMvaraRe:vye:01:1162:u:aniw:व्ये॒ञ्:657:681:695:vye1_vyeF_BvAxiH+saMvaraNe:","vraja!:gatO:vraj:01:0247:pa:sew:व्र॑जँ॑:144:152:153:vraj1_vrajaz_BvAxiH+gawO:81","vraja!:gatO:vraj:01:0286:pa:sew:व्र॑जँ॑:144:152:153:vraj1_vrajaz_BvAxiH+gawO:81","vraja!:mArgasaMskAragatyoH:vraj:10:0109:u:sew:व्र॑जँ॑:1200::1256:vraj2_vrajaz_curAxiH+mArgasaMskAragawyoH:275","vraji!:gatO:vraYj:01:0248:pa:sew:व्र॑जिँ॑:::::","vraRa:gAtravicUrRane:vraRa:10:0483:u:sew:व्र॑ण॑:1437:1456:1492:vraNa1_vraNa_curAxiH+gAwravicUrNane:","vraRa!:SabdArTaH:vraR:01:0519:pa:sew:व्र॑णँ॑:277:290:293:vraN1_vraNaz_BvAxiH+SabxArWaH:","o!vraScU!:Cedane:vraSc:06:0012:pa:sew:ओँ॑व्र॑श्चूँ॑::::vraSc1_ozvraScUz_wuxAxiH+Cexane:","vrI:varaRe:vrI:09:0040:pa:aniw:व्री॒:1106:1122:1159:vrI2_vrI_kryAxiH+varaNe:","vrIN:vfRotyarTe!:vrI:04:0035:A:aniw:व्री॒ङ्:783:805:822:vrI1_vrIf_xivAxiH+vqNowyarWe:","vrIqa!:codane lajjAyAM ca:vrIq:04:0021:pa:sew:व्री॑डँ॑:771:793:810::","vruqa!:saMvaraRe:vruq:06:0127:pa:sew:व्रु॑डँ॑:998:1017::vrud1_vrudaz_wuxAxiH+samvaraNe:","vrUza!:hiMsAyAm ityanye:vrUz:10:0176:u:sew:व्रू॑षँ॑:::::","vrUsa!:hiMsAyAm ityeke:vrUs:10:0174:u:sew:व्रू॑सँ॑:::::","vlI:varaRe:vlI:09:0037:pa:aniw:व्ली॒::1118:1155:vlI1_vlI_kryAxiH+varaNe:","SaMsu!:stutO durgatAvapItyeke iti durgaH:SaMs:01:0829:pa:sew:शं॑सुँ॑:::::","Saka!:viBAzito marzaRe:Sak:04:0084:u:aniw:श॒कँ॒॑:828:847:867:Sak2_Sakaz_xivAxiH+marRaNe:","Sakx!:SaktO:Sak:05:0017:pa:aniw:श॒कॢँ॑:896:917:937::392","Saki!:SaNkAyAm:SaNk:01:0091:A:sew:श॑किँ॒:66:65:67:Safk1_Sakiz_BvAxiH+SafkAyAm:44","Saca!:vyaktAyAM vAci:Sac:01:0189:A:sew:श॑चँ॒:92:96:98::","Sawa!:rujAviSaraRagatyavasAdanezu:Saw:01:0336:pa:sew:श॑टँ॑:184:193:194::","SaWa:samyagavaBAzaRe:SaWa:10:0392:u:sew:श॑ठ॑:1369::1423:SaT4_SaTa_curAxiH+samyag_avaBARaNe:","SaWa!:asaMskAragatyoH:SaW:10:0041:u:sew:श॑ठँ॑:1369::1423:SaT4_SaTa_curAxiH+samyag_avaBARaNe:","SaWa!:hiMsAsaNkleSanayoH kEtave ca:SaW:01:0394:pa:sew:श॑ठँ॑:215:228:228::","SaWa!:SlAGAyAm:SaW:10:0214:A:sew:श॑ठँ॒:1369::1423:SaT4_SaTa_curAxiH+samyag_avaBARaNe:","SaRa!:gatO dAne ca SaRa! gatAvityanye:SaR:01:0906:pa:sew:श॑णँ॑:490::519:SaN1_SaNaz_BvAxiH+xAne_ca:","Saqi!:rujAyAM saNGAte ca:SaRq:01:0313:A:sew:श॑डिँ॒:168:176:179:SaNd1_Sadiz_BvAxiH+rujAyAM_saMGAwe_ca:","Sadx!:SAtane:Sad:06:0164:pa:aniw:श॒दॢँ॑:1029:1048:1081::","Sadx!:SAtane:Sad:01:0991:pa:aniw:श॒दॢँ॑:531:552:563:Sax1_SaxLz_BvAxiH+SAwane:","Sapa!:AkroSe:Sap:04:0064:u:aniw:श॒पँ॒॑:809:830:848:Sap2_Sapaz_xivAxiH+AkroSe:","Sapa!:AkroSe:Sap:01:1155:u:aniw:श॒पँ॒॑:650:674:688:Sap1_Sapaz_BvAxiH+AkroSe:172","Sabda!:BAzaRe SabdakriyAyAm upasargAdAvizkAre ca:Sabd:10:0239:u:sew:श॑ब्दँ॑:::1338::244","Sama!:Alocane Samo darSane na mit 1952:Sam:10:0098:A:sew:श॑मँ॒:1269:1288:1322:Sam3_Samaz_curAxiH+Alocane:","Samu!:upaSame:Sam:04:0218:pa:sew:श॑मुँ॑:842:861:881:Sam2_Samuz_xivAxiH+upaSame:","Samba!:sambanDane ca:Samb:10:0031:u:sew:श॑म्बँ॑:::1206:Samb1_Sambaz_curAxiH+saMbanXane:","Sarba!:gatO:Sarb:01:0489:pa:sew:श॑र्बँ॑:264:279:280:Sarb1_Sarbaz_BvAxiH+gawO:","Sarva!:hiMsAyAm:Sarv:01:0668:pa:sew:श॑र्वँ॑:353:370:374:Sarv1_Sarvaz_BvAxiH+hiMsAyAm:","Sala!:gatO:Sal:01:0977:pa:sew:श॑लँ॑:300,521:315,353,540:317,552:Sal1_Salaz_BvAxiH+calanasaMvaraNayoH,Sal2_Salaz_BvAxiH+gawO:","Sala!:calanasaMvaraRayoH:Sal:01:0563:A:sew:श॑लँ॒:300,521:315,353,540:317,552:Sal1_Salaz_BvAxiH+calanasaMvaraNayoH,Sal2_Salaz_BvAxiH+gawO:","SalBa!:katTane:SalB:01:0455:A:sew:श॑ल्भँ॒:251:265:266:SalB1_SalBaz_BvAxiH+kawWane:","Sava!:gatO:Sav:01:0826:pa:sew:श॑वँ॑:438:457:465:Sav1_Savaz_BvAxiH+gawO:","SaSa!:plutagatO:SaS:01:0827:pa:sew:श॑शँ॑:439:458:466:SaS1_SaSaz_BvAxiH+pluwagawO:","Saza!:hiMsArTaH:Saz:01:0786:pa:sew:श॑षँ॑:421:438:447:SaR1_SaRaz_BvAxiH+hiMsArWaH:","Sasu!:hiMsAyAm:Sas:01:0828:pa:sew:श॑सुँ॑:440:460:467:Sas1_Sasuz_BvAxiH+hiMsAyAm:","SAKf!:vyAptO:SAK:01:0134:pa:sew:शा॑खृँ॑:83:86:87:SAK1_SAKqz_BvAxiH+vyApwO:53","SAqf!:SlAGAyAm:SAq:01:0324:A:sew:शा॑डृँ॒:176:185:185:SAd1_SAdqz_BvAxiH+SlAGAyAm:","SAna!:tejane avatejane:SAn:01:1150:u:sew:शा॑नँ॒॑:645:670:683:SAn1_SAnaz_BvAxiH+wejane:","SAntva!:sAmaprayoge ityeke:SAntv:10:0052:u:sew:शा॑न्त्वँ॑:::::","SAsu!:anuSizwO:SAs:02:0070:pa:sew:शा॑सुँ॑:725:747:764:SAs1_SAsuz_axAxiH+anuSiRtO:191","SiY:niSAne:Si:05:0003:u:aniw:शि॒ञ्:884:905:924:Si1_SiF_svAxiH+niSAne:","Sikza!:vidyopAdAne:Sikz:01:0689:A:sew:शि॑क्षँ॒:364:381:385:SikR1_SikRaz_BvAxiH+vixyopAxAne:139","SiKi!:gatyarTaH ityapi kecit:SiNK:01:0174:pa:sew:शि॑खिँ॑:::::","SiGi!:AGrARe:SiNG:01:0184:pa:sew:शि॑घिँ॑:88:92:94:SifG1_SiGiz_BvAxiH+AGrANe:","Siji!:avyakte Sabde:SiYj:02:0019:A:sew:शि॑जिँ॒:677:701:715::","Siwa!:anAdare:Siw:01:0340:pa:sew:शि॑टँ॑:187:196:196:Sit1_Sitaz_BvAxiH+anAxare:","Sila!:uYCe:Sil:06:0089:pa:sew:शि॑लँ॑:973:995:1015:Sil1_Silaz_wuxAxiH+uFCe:","Siza!:hiMsArTaH:Siz:01:0783:pa:sew:शि॑षँ॑:421:438:447:SiR1_SiRaz_BvAxiH+hiMsArWaH:","Siza!:asarvopayoge:Siz:10:0349:u:sew:शि॑षँ॑:1052:1071:1104::","Sizx!:viSezaRe:Siz:07:0014:pa:aniw:शि॒षॢँ॑:1052:1071:1104:SiR2_SiRLz_ruXAxiH+viSeRaNe:","SIN:svapne:SI:02:0026:A:sew:शी॑ङ्:682:704:721:SI1_SIf_axAxiH+svapne:197","SIka!:BAzArTaH ca:SIk:10:0363:u:sew:शी॑कँ॑:1322,1343::1397:SIk2_SIkaz_curAxiH+BARArWaH:","SIka!:AmarzaRe:SIk:10:0320:u:sew:शी॑कँ॑:1322,1343::1397:SIk2_SIkaz_curAxiH+BARArWaH:","SIkf!:secane:SIk:01:0078:A:sew:शी॑कृँ॒:60:59,64:61:SIk1_SIkqz_BvAxiH+secane:","SIBf!:katTane ca:SIB:01:0444:A:sew:शी॑भृँ॒:246:260:261:SIB1_SIBqz_BvAxiH+kawWane:","SIla:upaDAraRe:SIla:10:0419:u:sew:शी॑ल॑:1388:1405:1444:SIla1_SIla_curAxiH+upaXAraNe:","SIla!:samADO:SIl:01:0601:pa:sew:शी॑लँ॑:316,319:334:336:SIl1_SIlaz_BvAxiH+samAXO:","Suka!:gatO:Suk:01:0127:pa:sew:शु॑कँ॑::82:83::","I!Suci!r:pUtIBAve:Suc:04:0061:u:sew:ईँ॑शु॑चिँ॒॑र्:806:827:845::","Suca!:Soke:Suc:01:0210:pa:sew:शु॑चँ॑:104:108:110:Suc1_Sucaz_BvAxiH+Soke:64","Sucya!:aBizave:Sucy:01:0590:pa:sew:शु॑च्यँ॑:312::329:Sucy1_Sucyaz_BvAxiH+aBiRave:","SuWa!:Alasye:SuW:10:0146:u:sew:शु॑ठँ॑:1225:1240:1277:SuT2_SuTaz_curAxiH+Alasye:","SuWa!:gatipratiGAte pratiGAte:SuW:01:0395:pa:sew:शु॑ठँ॑:216::229:SuT1_SuTaz_BvAxiH+gawiprawiGAwe:","SuWi!:gatipratiGAte pratiGAte ityeke:SuRW:01:0396:pa:sew:शु॑ठिँ॑:219:229,232:232:SuNT1_SuTiz_BvAxiH+SoRaNe:","SuWi!:SozaRe:SuRW:10:0147:u:sew:शु॑ठिँ॑:1226:1241:1278:SuNT2_SuTiz_curAxiH+SoRaNe:","SuWi!:SozaRe:SuRW:01:0399:pa:sew:शु॑ठिँ॑:219:229,232:232:SuNT1_SuTiz_BvAxiH+SoRaNe:","SuDa!:SOce:SuD:04:0088:pa:aniw:शु॒धँ॑:832:851:871:SuX1_SuXaz_xivAxiH+SOce:384","Suna!:gatO:Sun:06:0062:pa:sew:शु॑नँ॑:950:973:993:Sun1_Sunaz_wuxAxiH+gawO:","SunDa!:SudDO:SunD:01:0077:pa:sew:शु॑न्धँ॑:59:58:60:SunX1_SunXaz_BvAxiH+SuxXO:41","SunDa!:SOcakarmaRi:SunD:10:0369:u:sew:शु॑न्धँ॑:1348::1401:SunX2_SunXaz_curAxiH+SOcakarmaNi:","SuBa!:BAzane BAsana ityeke hiMsAyAmityanye:SuB:01:0853:pa:sew:शु॑भँ॑:269,456:477:285,484:SuB2_SuBaz_BvAxiH+xIpwO:336","SuBa!:SoBArTe:SuB:06:0046:pa:sew:शु॑भँ॑:937:960:980:SuB4_SuBaz_wuxAxiH+SoBArWe:","SuBa!:dIptO:SuB:01:0500:A:sew:शु॑भँ॒:269,456:477:285,484:SuB2_SuBaz_BvAxiH+xIpwO:336","SumBa!:BAzane BAsana ityeke hiMsAyAmityanye:SumB:01:0501:pa:sew:शु॑म्भँ॑:269:282:285::","SumBa!:SoBArTe:SumB:06:0047:pa:sew:शु॑म्भँ॑:937:960:980:SumB2_SumBaz_wuxAxiH+SoBArWe:","Sulka!:atisarjane atisparSane:Sulk:10:0110:u:sew:शु॑ल्कँ॑::1217::Sulk1_Sulkaz_curAxiH+awisparSane:","Sulba!:mAne:Sulb:10:0101:u:sew:शु॑ल्बँ॑:1196:1212::Sulb1_Sulbaz_curAxiH+mAne:","Suza!:SozaRe:Suz:04:0080:pa:aniw:शु॒षँ॑:824:843:863:SuR1_SuRaz_xivAxiH+SoRaNe:385","SUra:vikrAntO:SUra:10:0444:A:sew:शू॑र॒:1407:1425:1463:SUra1_SUra_curAxiH+vikrAnwO:","SUrI!:hiMsAstamBanayoH hiMsastamBayoH:SUr:04:0052:A:sew:शू॑रीँ॒:798:819:837:SUr1_SUrIz_xivAxiH+hiMsAswamBanayoH:","SUrpa!:ca mAne:SUrp:10:0102:u:sew:शू॑र्पँ॑:::1252:SUrp1_SUrpaz_curAxiH+mAne:","SUla!:rujAyAM saNGAte ca:SUl:01:0604:pa:sew:शू॑लँ॑:322:337:339:SUl1_SUlaz_BvAxiH+AvaraNe:122","SUza!:prasave:SUz:01:0773:pa:sew:शू॑षँ॑:415:::SUR1_SURaz_BvAxiH+prasave:","SfDu!:undane:SfD:01:0864:u:sew:शृ॑धुँ॒॑:463,546:485:491:SqX1_SqXuz_BvAxiH+SabxakuwsAyAm,SqX2_SqXuz_BvAxiH+unxane:","SfDu!:prasahane:SfD:10:0260:u:sew:शृ॑धुँ॑:1304::1357:SqX3_SqXuz_curAxiH+prasahane:","SfDu!:SabdakutsAyAm:SfD:01:1014:A:sew:शृ॑धुँ॒:463,546:485:491:SqX1_SqXuz_BvAxiH+SabxakuwsAyAm,SqX2_SqXuz_BvAxiH+unxane:","SF:hiMsAyAm:SF:09:0021:pa:sew:शॄ॑:1089::1140:SQ1_SQ_kryAxiH+hiMsAyAm:","Self!:gatO:Sel:01:0623:pa:sew:शे॑लृँ॑:331:347:349::","Sevf!:sevane ityapyeke:Sev:01:0580:A:sew:शे॑वृँ॒::322:324:Sev1_Sevqz_BvAxiH+sevane:","SE:pAke:SE:01:1066:pa:aniw:शै॒:581:::SE1_SE_BvAxiH+Sabxe:","So:tanUkaraRe:So:04:0040:pa:aniw:शो॒:788:809:827:So1_So_xivAxiH+wanUkaraNe:","SoRf!:varRagatyoH:SoR:01:0524:pa:sew:शो॑णृँ॑:279:292:295:SoN1_SoNqz_BvAxiH+varNagawyoH:","SOwf!:garve:SOw:01:0325:pa:sew:शौ॑टृँ॑:177:186:186:SOt1_SOtqz_BvAxiH+garve:","Scuti!r:Asecane ityeke:Scut:01:0041:pa:sew:श्चु॑तिँ॑र्:::::","Scyuti!r:kzaraRe:Scyut:01:0042:pa:sew:श्च्यु॑तिँ॑र्:33:34:35:Scyuw1_Scyuwizr_BvAxiH+kRaraNe:","SnaTa!:hiMsArTaH:SnaT:01:0909:pa:sew:श्न॑थँ॑:::::","SmIla!:nimezaRe:SmIl:01:0596:pa:sew:श्मी॑लँ॑::331::SmIl1_SmIlaz_BvAxiH+nimeRaNe:","syandU!:prasravaRe:Syand:01:0865:A:sew:स्य॑न्दूँ॒:464:486:492:syanx1_syanxUz_BvAxiH+prasravaNe:","cyuN:gatO:cyu:01:1108:A:aniw:च्यु॒ङ्:608:634:646:cyu1_cyuf_BvAxiH+gawO:","SyEN:gatO:SyE:01:1118:A:aniw:श्यै॒ङ्:613:639:652:SyE1_SyEf_BvAxiH+gawO:","sraMsu!:avasraMsane:SraMS:01:0857:A:sew:स्रं॑सुँ॒::::sraMs1_sraMsuz_BvAxiH+avasraMsane:","Sraki!:gatO:SraNk:01:0089:A:sew:श्र॑किँ॒:65::66:Srafk1_Srakiz_BvAxiH+gawO:","Sragi!:gatyarTaH:SraNg:01:0161:pa:sew:श्र॑गिँ॑:84:87:88:Srafg1_Sragiz_BvAxiH+gawyarWaH:","SraRa!:gatO dAne ca:SraR:01:0907:pa:sew:श्र॑णँ॑:490:514:519::","SraRa!:dAne:SraR:10:0063:u:sew:श्र॑णँ॑::1184:1225:SraN2_SraNaz_curAxiH+xAne:","SraTa:dOrbalye:SraTa:10:0409:u:sew:श्र॑थ॑:1380:1397:1434:SraWa1_SraWa_curAxiH+xOrbalye:","SraTa!:hiMsArTaH:SraT:01:0908:pa:sew:श्र॑थँ॑:491:515:520:SraW1_SraWaz_BvAxiH+hiMsArWaH:","SraTa:prayatne prasTAna ityeke:SraTa:10:0019:u:sew:श्र॑थ॑:1380:1397:1434:SraWa1_SraWa_curAxiH+xOrbalye:","SraTa!:mokzaRe hiMsAyAmityeke:SraT:10:0360:u:sew:श्र॑थँ॑:1380:1397:1434:SraWa1_SraWa_curAxiH+xOrbalye:","SranTa!:sandarBe:SranT:10:0046:u:sew:श्र॑न्थँ॑:1353:1368:1406:SranW3_SranWaz_curAxiH+sanxarBe:","SranTa!:sandarBe:SranT:09:0374:pa:sew:श्र॑न्थँ॑:1112:1128:1165,1167:SranW2_SranWaz_kryAxiH+vimocanaprawiharRayoH:","SranTa!:vimocanapratiharzayoH:SranT:09:0048:pa:sew:श्र॑न्थँ॑:1112:1128:1165,1167:SranW2_SranWaz_kryAxiH+vimocanaprawiharRayoH:","SraTi!:SETilye:SranT:01:0035:A:sew:श्र॑थिँ॒:27:28:28:SranW1_SraWiz_BvAxiH+SEWilye:25","Sramu!:tapasi Kede ca:Sram:04:0101:pa:sew:श्र॑मुँ॑:845:864:884:Sram1_Sramuz_xivAxiH+wapasi:","SramBu!:pramAde:SramB:01:0458:A:sew:श्र॑म्भुँ॒:254::::","SrA:pAke:SrA:02:0048:pa:aniw:श्रा॒:703:725:742:SrA2_SrA_axAxiH+pAke:","SriY:sevAyAm:Sri:01:1044:u:sew:श्रि॑ञ्:567:588:600:Sri1_SriF_BvAxiH+sevAyAm:290","Srizu!:dAhe:Sriz:01:0798:pa:sew:श्रि॑षुँ॑:426:443:452:SriR1_SriRuz_BvAxiH+xAhe:","SrIY:pAke:SrI:09:0003:u:aniw:श्री॒ञ्:1076:1093:1127::431","Sru:SravaRe:Sru:01:1092:pa:aniw:श्रु॒:600:623:638:Sru1_Sru_BvAxiH+SravaNe:289","SrE:pAke:SrE:01:1067:pa:aniw:श्रै॒:581:605:617:SrE1_SrE_BvAxiH+pAke:","SroRf!:saNGAte:SroR:01:0525:pa:sew:श्रो॑णृँ॑:280:293:296:SroN1_SroNqz_BvAxiH+safGAwe:","Slaki!:gatO gatyarTaH:SlaNk:01:0090:A:sew:श्ल॑किँ॒:65:64:66:Slafk1_Slakiz_BvAxiH+gawO:","Slagi!:gatyarTaH:SlaNg:01:0162:pa:sew:श्ल॑गिँ॑:84:87:88:Slafg1_Slagiz_BvAxiH+gawyarWaH:","SlaTa!:hiMsArTaH:SlaT:01:0910:pa:sew:श्ल॑थँ॑:::520:SlaW1_SlaWaz_BvAxiH+hiMsArWaH:","SlAKf!:vyAptO:SlAK:01:0135:pa:sew:श्ला॑खृँ॑:83:86:87:SlAK1_SlAKqz_BvAxiH+vyApwO:","SlAGf!:katTane:SlAG:01:0122:A:sew:श्ला॑घृँ॒:76:78:79:SlAG1_SlAGqz_BvAxiH+kawWane:49","Slizu!:dAhe:Sliz:01:0799:pa:sew:श्लि॑षुँ॑:426:443:452:SliR1_SliRuz_BvAxiH+xAhe:","Sliza!:AliNgane:Sliz:04:0083:pa:sew:श्लि॒षँ॑:1165:1180:1221:SliR3_SliRaz_curAxiH+SleRaNe:","Sliza!:SlezaRe:Sliz:10:0059:u:sew:श्लि॑षँ॑:1165:1180:1221:SliR3_SliRaz_curAxiH+SleRaNe:","Slokf!:saNGAte:Slok:01:0081:A:sew:श्लो॑कृँ॒:62:61:63::43","SloRf!:ca saNGAte:SloR:01:0526:pa:sew:श्लो॑णृँ॑:281:294:297:SloN1_SloNqz_BvAxiH+saMGAwe:","Svaki!:gatyarTaH:SvaNk:01:0101:A:sew:श्व॑किँ॒:73:72:74::","Svaca!:gatO:Svac:01:0190:A:sew:श्व॑चँ॒:93:97:99:Svac1_Svacaz_BvAxiH+gawO:","Svaci!:gatO:SvaYc:01:0191:A:sew:श्व॑चिँ॒:93:97:99:SvaFc1_Svaciz_BvAxiH+gawO:","SvaWa:samyagavaBAzaRe:SvaWa:10:0393:u:sew:श्व॑ठ॑:1369::1423:SvaT2_SvaTa_curAxiH+samyag_avaBARaNe:","SvaWa!:asaMskAragatyoH:SvaW:10:0042:u:sew:श्व॑ठँ॑:1369::1423:SvaT2_SvaTa_curAxiH+samyag_avaBARaNe:","SvaWi!:asaMskAragatyoH ityeke:SvaRW:10:0043:u:sew:श्व॑ठिँ॑::::SvaNT1_SvaTiz_curAxiH+asaMskAragawyoH:","SvaBra!:gatyAm ca:SvaBr:10:0117:u:sew:श्व॑भ्रँ॑:1206:::SvaBr1_SvaBraz_curAxiH+gawyAm:","Svarta!:gatyAm:Svart:10:0115:u:sew:श्व॑र्तँ॑:1205::1260:Svarw1_Svarwaz_curAxiH+gawyAm:","Svala!:ASugamane:Sval:01:0630:pa:sew:श्व॑लँ॑:337::355:Sval1_Svalaz_BvAxiH+ASugamane:","Svalka!:pariBAzaRe:Svalk:10:0053:u:sew:श्व॑ल्कँ॑:1162:1177:1217:Svalk1_Svalkaz_curAxiH+pariBARaNe:","Svalla!:ASugamane:Svall:01:0631:pa:sew:श्व॑ल्लँ॑:337:353:355:Svall1_Svallaz_BvAxiH+ASugamane:","Svasa!:prARane:Svas:02:0064:pa:sew:श्व॑सँ॑:719:741:758:Svas1_Svasaz_axAxiH+prANane:358","wuo!Svi:gativfdDyoH:Svi:01:1165:pa:sew:टुओँश्वि॑:660:684:698:Svi1_tuozSvi_BvAxiH+gawivqxXayoH:","SvitA!:varRe:Svit:01:0843:A:sew:श्वि॑ताँ॑:450:470:478:Sviw1_SviwAz_BvAxiH+varNe:","Svidi!:SvEtye:Svind:01:0010:A:sew:श्वि॑दिँ॒:9:9:9:Svinx1_Svixiz_BvAxiH+SvEwye:","zwyE:SabdasaNGAtayoH:zwyE:01:1059:pa:aniw:ष्ट्यै॒:577:601:613:swyE2_RtyE_BvAxiH+SabxasafGAwayoH:","zWivu!:nirasane:zWiv:01:0641:pa:sew:ष्ठि॑वुँ॑:342:358:362:RTiv1_RTivuz_BvAxiH+nirasane:130","zWivu!:nirasane kecidihemaM na paWanti:zWiv:04:0004:pa:sew:ष्ठि॑वुँ॑:758::796:RTiv2_RTivuz_xivAxiH+nirasane:","zasti!:svapne:saMst:02:0074:pa:sew:ष॑स्तिँ॑:728::767:saMsw2_Raswiz_axAxiH+svapne:","zage!:saMvaraRe:sag:01:0898:pa:sew:ष॑गेँ॑:486::515:sag1_Ragez_BvAxiH+saMvaraNe:","saNketa:AmantraRe:saNketa:10:0433:u:sew:स॑ङ्के॑तँ॑:::::","saNgrAma:yudDe ayamanudAttet:saNgrAma:10:0467:A:sew:स॑ङ्ग्रा॑म॒:::::","zaca!:samavAye:sac:01:0187:u:sew:ष॑चँ॒॑:90,647:94:96,685:sac1_Racaz_BvAxiH+secane_sevane_ca,sac2_Racaz_BvAxiH+samavAye:","zaca!:secane sevane ca:sac:01:1152:A:sew:ष॑चँ॒:90,647:94:96,685:sac1_Racaz_BvAxiH+secane_sevane_ca,sac2_Racaz_BvAxiH+samavAye:","zasja!:gatO:sajj:01:0229:u:sew:ष॑स्जँ॑:110:116:117:sasj1_Rasjaz_BvAxiH+gawO:","zaYja!:saNge:saYj:01:1142:pa:aniw:ष॒ञ्जँ॑::::saFj1_RaFjaz_BvAxiH+safge:","zawa!:avayave:saw:01:0350:pa:sew:ष॑टँ॑:195:204:204:sat1_Rataz_BvAxiH+avayave:","zawwa!:hiMsAyAm:saww:10:0128:u:sew:ष॑ट्टँ॑::1229::satt1_Rattaz_curAxiH+hiMsAyAm:","satra:santAnakriyAyAm:satra:10:0448:A:sew:स॑त्र॒:1410:1428:1466:sawra1_sawra_curAxiH+sanwAnakriyAyAm:","zadx!:viSaraRagatyavasAdanezu:sad:06:0163:pa:aniw:ष॒दॢँ॑:1028:1049:1080::409","zadx!:viSaraRagatyavasAdanezu:sad:01:0990:pa:aniw:ष॒दॢँ॑:530:551:562:sax1_RaxLz_BvAxiH+viSaraNagawyavasAxaneRu:337","zaGa!:hiMsAyAm:saG:05:0024:pa:sew:ष॑घँ॑:901:922:942:saG1_RaGaz_svAxiH+hiMsAyAm:","zanu!:dAne:san:08:0002:u:sew:ष॑नुँ॒॑:::::","zana!:samBaktO:san:01:0535:pa:sew:ष॑नँ॑:::::","zapa!:samavAye:sap:01:0466:pa:sew:ष॑पँ॑:260:275:276:sap1_Rapaz_BvAxiH+samavAye:","saBAja:prItidarSanayoH prItisevanayorityeke:saBAja:10:0429:u:sew:स॑भा॑ज॑::::saBAja1_saBAja_curAxiH+MISSING:","zama!:avEkalye vEkalye:sam:01:0963:pa:sew:ष॑मँ॑:510:528:539:sam1_Ramaz_BvAxiH+avEkalye:","samI!:parimAne ityeke:sam:04:0132:pa:sew:स॑मीँ॑:::::","zamba!:sambanDane:samb:10:0030:u:sew:ष॑म्बँ॑::::samb1_Rambaz_curAxiH+saMbanXane:","zarkza!:Adare iti kecit:sarkz:01:0759:pa:sew:ष॑र्क्षँ॑:::::","zarja!:arjane:sarj:01:0257:pa:sew:ष॑र्जँ॑:125::133:sarj1_Rarjaz_BvAxiH+arjane:","zarba!:gatO:sarb:01:0490:pa:sew:ष॑र्बँ॑:264:279:280::","zarva!:hiMsAyAm:sarv:01:0669:pa:sew:ष॑र्वँ॑:353::374:sarv1_Rarvaz_BvAxiH+hiMsAyAm:","zala!:gatO:sal:01:0628:pa:sew:ष॑लँ॑:335:::sal1_Ralaz_BvAxiH+gawO:","zasa!:svapne:sas:02:0073:pa:sew:ष॑सँ॑:728:750:767:sas1_Rasaz_axAxiH+svapne:","zaha!:cakyarTe:sah:04:0023:pa:sew:ष॑हँ॑:::812:sah2_Rahaz_xivAxiH+cakyarWe:","zaha!:marzaRe:sah:10:0341:u:sew:ष॑हँ॑:::812:sah2_Rahaz_xivAxiH+cakyarWe:","zaha!:marzaRe:sah:01:0988:A:sew:ष॑हँ॒:528:549:560:sah1_Rahaz_BvAxiH+marRaNe:338","sADa!:saMsidDO:sAD:05:0019:pa:aniw:सा॒धँ॑:897::938:sAX1_sAXaz_svAxiH+saMsixXO:","zAntva!:sAmaprayoge:sAntv:10:0051:u:sew:षा॑न्त्वँ॑:1161::1216:sAnwv1_RAnwvaz_curAxiH+sAmaprayoge:270","sAma:sAntvaprayoge:sAma:10:0420:u:sew:सा॑म॑:1389::1445:sAma1_sAma_curAxiH+sAnwvaprayoge:","sAmba!:sambanDane ityeke:sAmb:10:0032:u:sew:सा॑म्बँ॑::1167::sAmb1_sAmbaz_curAxiH+saMbanXane:","sAra:dOrbalye:sAra:10:0407:u:sew:सा॑र॑:1380::1434:sAra1_sAra_curAxiH+xOrbalye:","ziY:banDane:si:05:0002:u:aniw:षि॒ञ्:883:904:923:si1_RiF_svAxiH+banXane:395","ziY:banDane:si:09:0005:u:aniw:षि॒ञ्:1078:1095:1129:si2_RiF_kryAxiH+banXane:435","zica!:kzaraRe:sic:06:0170:u:aniw:षि॒चँ॒॑:1035:1054:1087:sic1_Ricaz_wuxAxiH+kRaraNasa:","ziwa!:anAdare:siw:01:0341:pa:sew:षि॑टँ॑:187:196:196:sit1_Ritaz_BvAxiH+anAxare:","ziDa!:gatyAm:siD:01:0049:pa:sew:षि॑धँ॑:::::","ziDU!:SAstre mANgalye ca:siD:01:0050:pa:sew:षि॑धूँ॑:37:37:39::","ziDu!:saMrAdDO:siD:04:0089:pa:aniw:षि॒धुँ॑:833:852:872:siX3_RiXuz_xivAxiH+saMrAxXO:","zivi!:secane ityeke sevana iti taraNgiRyAm:sinv:01:0674:pa:sew:षि॑विँ॑:::::","ziBu!:hiMsArTaH ityeke:siB:01:0498:pa:sew:षि॑भुँ॑::::siB1_RiBuz_BvAxiH+hiMsAyAm:","zimBu!:hiMsArTaH ityeke:simB:01:0499:pa:sew:षि॑म्भुँ॑:::::","zila!:uYCe:sil:06:0090:pa:sew:षि॑लँ॑:973:995:1015:sil1_Rilaz_wuxAxiH+uFCe:","zivu!:tantusantAne:siv:04:0002:pa:sew:षि॑वुँ॑:756:779:794:siv1_Rivuz_xivAxiH+wanwusanwAne:374","sIkf!:secane ityeke:sIk:01:0079:A:sew:सी॑कृँ॒:::::","zuY:aBizave:su:05:0001:u:aniw:षु॒ञ्:882:903:922:su3_RuF_svAxiH+aBiRave:393","zu:prasavasESvaryayoH:su:01:1091:pa:aniw:षु॒:599:624:636,637:su1_Ru_BvAxiH+prasavESvaryayoH:","zu:prasavESvaryayoH:su:02:0036:pa:aniw:षु॒:691:713:730:su2_Ru_axAxiH+prasavESvaryayoH:","suKa:tatkriyAyAm:suKa:10:0475:u:sew:सु॑ख॑:1431:1448:1487:suKa1_suKa_curAxiH+wawkriyAyAm:","zuwwa!:anAdare:suww:10:0038:u:sew:षु॑ट्टँ॑::1171::sutt1_Ruttaz_curAxiH+anAxare:","zura!:ESvaryadIptyoH:sur:06:0066:pa:sew:षु॑रँ॑:953::996:sur1_Ruraz_wuxAxiH+ESvaryaxIpwyoH:","zuha!:cakyarTe:suh:04:0024:pa:sew:षु॑हँ॑:773:795:812:suh1_Ruhaz_xivAxiH+cakyarWe:","zUN:prARigarBavimocane:sU:02:0025:A:sew:षू॑ङ्:681:703:720:sU1_RUf_axAxiH+prANigarBavimocane:","zUN:prARiprasave:sU:04:0027:A:sew:षू॑ङ्:775:797:814:sU2_RUf_xivAxiH+prANiprasave:","zU:preraRe:sU:06:0144:pa:sew:षू॑:1010:1031:1062:sU3_RU_wuxAxiH+preraNe:","sUca:pESunye:sUca:10:0412:u:sew:सू॑च॑:1383:1400:1437:sUca1_sUca_curAxiH+pESunye:282","sUtra:vezwane vimocana ityanye:sUtra:10:0450:u:sew:सू॑त्र॑:1412::1468:sUwra1_sUwra_curAxiH+veRtane:265","zUda!:kzaraRe:sUd:01:0025:A:sew:षू॑दँ॒:19:20:20:sUx1_RUxaz_BvAxiH+kRaraNe:19","zUda!:kzaraRe:sUd:10:0242:u:sew:षू॑दँ॑:1289::1341:sUx2_RUxaz_curAxiH+kRaraNe:","sUrkza!:Adare:sUrkz:01:0758:pa:sew:सू॑र्क्षँ॑:408:::sUrkR1_sUrkRaz_BvAxiH+Axare:","zUrkzya!:IrzyArTaH:sUrkzy:01:0586:pa:sew:षू॑र्क्ष्यँ॑:::327::","sUza!:prasave ityeke:sUz:01:0774:pa:sew:सू॑षँ॑:::::","sf:gatO:sf:03:0018:pa:aniw:सृ॒:747:769:785:sq2_sq_juhowyAxiH+gawO:","sf:gatO:sf:01:1085:pa:aniw:सृ॒:594:619:632:sq1_sq_BvAxiH+gawO:339","sfja!:visarge:sfj:04:0075:A:aniw:सृ॒जँ॒:819:838:859:sqj1_sqjaz_xivAxiH+visarge:","sfja!:visarge:sfj:06:0150:pa:aniw:सृ॒जँ॑:1016:1036:1068:sqj2_sqjaz_wuxAxiH+visarge:408","sfpx!:gatO:sfp:01:1138:pa:aniw:सृ॒पॢँ॑:633:658:671::","zfBu!:hiMsArTaH:sfB:01:0496:pa:sew:षृ॑भुँ॑:268::284:sqB1_RqBuz_BvAxiH+hiMsAyAm:","zfmBu!:hiMsArTO:sfmB:01:0497:pa:sew:षृ॑म्भुँ॑::281::sqmB1_RqmBuz_BvAxiH+hiMsArWaH:","sekf!:gatO:sek:01:0086:A:sew:से॑कृँ॒:65:64:66:sek1_sekqz_BvAxiH+gawO:","zelf!:gatO ityeke:sel:01:0624:pa:sew:षे॑लृँ॑:::::","zevf!:sevane:sev:01:0574:A:sew:षे॑वृँ॒:307:322:324:sev1_Revqz_BvAxiH+sevane:340","zE:kzaye:sE:01:1063:pa:aniw:षै॒:579::615::","zo:antakarmaRi:so:04:0042:pa:aniw:षो॒:790:811:829:so1_Ro_xivAxiH+anwakarmaNi:","skandi!r:gatiSozaRayoH:skand:01:1134:pa:aniw:स्क॒न्दिँ॑र्:630:655:668:skanx1_skanxizr_BvAxiH+gawiSoRaNayoH:","skamBu!:roDana ityeke stamBa iti mADavaH:skamB:09:0009:pa:aniw:स्क॒म्भुँ॑:::::","skaBi!:pratibanDe:skamB:01:0452:A:sew:स्क॑भिँ॒:249:263::skamB1_skaBiz_BvAxiH+prawibanXe:","skuY:Apravane:sku:09:0006:u:aniw:स्कु॒ञ्:1079:1096:1130:sku1_skuF_kryAxiH+ApravaNe:","skudi!:ApravaRe:skund:01:0009:A:sew:स्कु॑दिँ॒:8:8:8:skunx1_skuxiz_BvAxiH+ApravaNe:8","skumBu!:roDana ityeke DAraRa ityanye:skumB:09:0010:pa:aniw:स्कु॒म्भुँ॑:::::","sKada!:sKadane sKadir avapariByAM ca na mit 1954:sKad:01:0872:A:sew:स्ख॑दँ॒:471:494:499:sKax1_sKaxaz_BvAxiH+sKaxane:","sKala!:saYcalane mit iti BojaH 0931:sKal:01:0625:pa:sew:स्ख॑लँ॑:332:348:350:sKal1_sKalaz_BvAxiH+saMcalane:127","zwaka!:pratiGAte pratIGAte:stak:01:0891:pa:sew:ष्ट॑कँ॑::506::swak1_Rtakaz_BvAxiH+prawIGAwe:","stana:devaSabde:stana:10:0398:u:sew:स्त॑न॑:1372:1389:1426:swana1_swana_curAxiH+xevaSabxe:","zwana!:Sabde:stan:01:0532:pa:sew:ष्ट॑नँ॑::298,527::swan1_Rtanaz_BvAxiH+Sabxe:","zwama!:avEkalye vEkalye:stam:01:0964:pa:sew:ष्ट॑मँ॑::298,527::swam1_Rtamaz_BvAxiH+avEkalye:","zwaBi!:pratibanDe:stamB:01:0451:A:sew:ष्ट॑भिँ॒::::swamB1_RtaBiz_BvAxiH+prawibanXe:","stamBu!:roDana ityeke stamBa iti mADavaH:stamB:09:0007:pa:aniw:स्त॒म्भुँ॑:::::","zWala!:sTAne:stal:01:0970:pa:sew:ष्ठ॑लँ॑:::::","zwiGa!:Askandane:stiG:05:0021:A:sew:ष्टि॑घँ॒::::swiG1_RtiGaz_svAxiH+Askanxane:","zwipf!:kzaraRArTaH:stip:01:0422:A:sew:ष्टि॑पृँ॒::::swip1_Rtipqz_BvAxiH+kRaraNArWaH:","zwima!:ArdrIBAve:stim:04:0019:pa:sew:ष्टि॑मँ॑::::swim1_Rtimaz_xivAxiH+ArxrIBAve:","zwIma!:ArdrIBAve:stIm:04:0020:pa:sew:ष्टी॑मँ॑:770:::swIm1_RtImaz_xivAxiH+ArxrIBAve:","zwuY:stutO:stu:02:0038:u:aniw:ष्टु॒ञ्::::swu1_RtuF_axAxiH+swuwO:355","zwuca!:prasAde:stuc:01:0199:A:sew:ष्टु॑चँ॒:99:::swuc1_Rtucaz_BvAxiH+prasAxe:","zwupa!:zwUpa! samucCrAye:stup:10:0190:u:sew:ष्टु॑पँ॑:::::","zwupa!:samucCrAye:stup:04:0151:pa:sew:ष्टु॑पँ॑:::::","zwuBu!:stamBe:stuB:01:0460:A:sew:ष्टु॑भुँ॒:255:::swuB1_RtuBuz_BvAxiH+swamBe:","stumBu!:roDana ityeke nizkozaRe ityanye:stumB:09:0008:pa:aniw:स्तु॒म्भुँ॑:::::","zwUpa!:samucCrAye ityeke:stUp:10:0152:u:sew:ष्टू॑पँ॑:::::","zwUpa!:samucCrAye ityeke:stUp:04:0191:pa:sew:ष्टू॑पँ॑::891:::","stfY:AcCAdane:stf:05:0006:u:aniw:स्तृ॒ञ्:887:908:927:swq1_swqF_svAxiH+AcCAxane:","zwfkza!:gatO:stfkz:01:0751:pa:sew:ष्टृ॑क्षँ॑:::428:swqkR1_RtqkRaz_BvAxiH+gawO:","stfhU!:hiMsArTaH:stfh:06:0076:pa:sew:स्तृ॑हूँ॑:961:983:1004:swqh1_swqhUz_wuxAxiH+hiMsAyAm:","stFY:AcCAdane:stF:09:0017:u:sew:स्तॄ॑ञ्:1085:1102:1136:swQ1_swQF_kryAxiH+AcCAxane:","stena:cOrye:stena:10:0439:u:sew:स्ते॑न॑:1402:1420:1458:swena1_swena_curAxiH+cOrye:","zwepf!:kzaraRArTaH:step:01:0423:A:sew:ष्टे॑पृँ॒:::::","zwE:vezwane SoBAyAM cetyeke:stE:01:1071:pa:aniw:ष्टै॒::::swE1_RtE_BvAxiH+veRtane:","stoma:SlAGAyAm:stoma:10:0468:u:sew:स्तो॑मँ॑:::::","styE:SabdasaNGAtayoH:styE:01:1058:pa:aniw:स्त्यै॒:577:601:613:swyE1_swyE_BvAxiH+SabxasafGAwayoH:","zwrakza!:gatO:strakz:01:0749:pa:sew:ष्ट्र॑क्षँ॑:::::","zWage!:saMvaraRe:sTag:01:0899:pa:sew:ष्ठ॑गेँ॑::510:::","zWA:gatinivfttO:sTA:01:1077:pa:aniw:ष्ठा॒:588:::sWA1_RTA_BvAxiH+gawinivqwwO:174","sTuqa!:saMvaraRe:sTuq:06:0118:pa:sew:स्थु॑डँ॑::1015::sWud1_sWudaz_wuxAxiH+samvaraNe:","sTUla:paribfMhaRe:sTUla:10:0446:A:sew:स्थू॑ल॒:1408::1464:sWUla1_sWUla_curAxiH+parivqMhaNe:","zRasu!:nirasane:snas:04:0006:pa:sew:ष्ण॑सुँ॑::::snas1_RNasuz_xivAxiH+nirasane:","zRA:SOce mit anupasargAdvA 1946:snA:02:0047:pa:aniw:ष्णा॒::::snA2_RNA_axAxiH+SOce:354","zRiha!:prItO:snih:04:0055:pa:aniw:ष्णि॒हँ॑::::snih1_RNihaz_xivAxiH+prIwO:387","zRiha!:snehane:snih:10:0097:u:sew:ष्णि॑हँ॑::::snih2_RNihaz_curAxiH+snehane:442","zRu:prasravaRe:snu:02:0033:pa:sew:ष्णु॑::::snu1_RNu_axAxiH+prasravaNe:","zRusu!:adane! AdAna ityeke! adarSana ityapare:snus:04:0005:pa:sew:ष्णु॑सुँ॑:::::","zRuha!:udgiraRe:snuh:04:0096:pa:aniw:ष्णु॒हँ॑:::::","zRE:vezwane SoBAyAM cetyeke:snE:01:1072:pa:aniw:ष्णै॒:::620::","spadi!:kiYciccalane:spand:01:0014:A:sew:स्प॑दिँ॒:13:13:13:spanx1_spaxiz_BvAxiH+kiFciccalane:12","sparDa!:saNGarze:sparD:01:0003:A:sew:स्प॑र्धँ॒:3:3:3:sparX1_sparXaz_BvAxiH+safGarRe:3","spaSa!:grahaRasaMSlezaRayoH:spaS:10:0200:A:sew:स्प॑शँ॒:1256:1275:1309:spaS2_spaSaz_curAxiH+grahaNasaMSleRaNayoH:","spaSa!:bADanasparSanayoH:spaS:01:1032:u:sew:स्प॑शँ॒॑:558:579:590:spaS1_spaSaz_BvAxiH+bAXanasparSanayoH:","spf:prItipAlanayoH prIticalanayorityanye:spf:05:0014:pa:aniw:स्पृ॒:894::934::","spfSa!:saMsparSane:spfS:06:0158:pa:aniw:स्पृ॒शँ॑:1023:1043:1075:spqS1_spqSaz_wuxAxiH+saMsparSane:402","spfha:IpsAyAm:spfha:10:0410:u:sew:स्पृ॑ह॑:1381:1398:1435:spqha1_spqha_curAxiH+IpsAyAm:","sPara!:saYcalane ityanye:sPar:06:0123:pa:sew:स्फ॑रँ॑::1018:::","sPala!:saYcalane ityanye:sPal:06:0124:pa:sew:स्फ॑लँ॑::1018:::","sPAyI!:vfdDO:sPAy:01:0560:A:sew:स्फा॑यीँ॒:298:313:315:sPAy1_sPAyIz_BvAxiH+vqxXO:113","sPiwa!:snehane ityeke:sPiw:10:0129:u:sew:स्फि॑टँ॑::1179:1267::","sPiwwa!:hiMsAyAm:sPiww:10:0056:u:sew:स्फि॑ट्टँ॑::1179:1267:sPitt1_sPittaz_curAxiH+hiMsAyAm:","sPuwa!:Bedane:sPuw:10:0247:u:sew:स्फु॑टँ॑:983:1004:1026:sPut3_sPutaz_wuxAxiH+vikasane:415","sPuwa!:vikasane:sPuw:06:0100:pa:sew:स्फु॑टँ॑:983:1004:1026:sPut3_sPutaz_wuxAxiH+vikasane:415","sPuwa!:vikasane:sPuw:01:0293:A:sew:स्फु॑टँ॒:150::159:sPut1_sPutaz_BvAxiH+vikasane:85","sPuwi!r:viSaraRe:sPuw:01:0379:pa:sew:स्फु॑टिँ॑र्:207:218:218:sPut2_sPutizr_BvAxiH+viSaraNe:","sPuqa!:saMvaraRe:sPuq:06:0125:pa:sew:स्फु॑डँ॑:996,998::1046:sPud1_sPudaz_wuxAxiH+samvaraNe:","sPuwi!:viSaraRe ityapi kecit:sPuRw:01:0380:pa:sew:स्फु॑टिँ॑:::::","sPuwi!:ityapi parihAse:sPuRw:10:0005:u:sew:स्फु॑टिँ॑::::sPuNt2_sPutiz_curAxiH+parihAse:","sPuqi!:parihAse:sPuRq:10:0004:u:sew:स्फु॑डिँ॑:1135::1189:sPuNd1_sPudiz_curAxiH+parihAse:","sPuqi!:vikasane:sPuRq:01:0311:A:sew:स्फु॑डिँ॒::174:::","sPura!:saYcalane sPura! sPuraRa ityeke:sPur:06:0121:pa:sew:स्फु॑रँ॑:997:1018:1044:sPur1_sPuraz_wuxAxiH+saFcalane:416","sPurCA!:vistftO:sPurC:01:0241:pa:sew:स्फु॑र्छाँ॑:119::127::","sPula!:saYcalane:sPul:06:0122:pa:sew:स्फु॑लँ॑:997:1018,1019:1050:sPul1_sPulaz_wuxAxiH+saFcalane:","wuo!sPUrjA!:vajranirGoze:sPUrj:01:0268:pa:sew:टुओँस्फू॑र्जाँ॑:135:142:143:sPUrj1_tuozsPUrjAz_BvAxiH+vajranirGoRe:","zmiN:anAdare ityeke:smi:10:0058:u:sew:ष्मि॑ङ्::::smi2_Rmif_curAxiH+anAxare:","zmiN:IzadDasane:smi:01:1099:A:aniw:ष्मि॒ङ्:604::642:smi1_Rmif_BvAxiH+IRaxXasane:","smiwa!:anAdare:smiw:10:0057:u:sew:स्मि॑टँ॑:1164::1219:smit1_smitaz_curAxiH+anAxare:","smIla!:nimezaRe:smIl:01:0597:pa:sew:स्मी॑लँ॑:::333::","smf:prItipAlanayoH prIticalanayorityanye ityeke:smf:05:0015:pa:aniw:स्मृ॒::915::smq3_smq_svAxiH+prIwipAlanayoH:","smf:ADyAne:smf:01:0919:pa:sew:स्मृ॑:496,593:520,617:525,630:smq1_smq_BvAxiH+AXyAne,smq2_smq_BvAxiH+cinwAyAm:171","smf:cintAyAm:smf:01:1082:pa:aniw:स्मृ॒:496,593:520,617:525,630:smq1_smq_BvAxiH+AXyAne,smq2_smq_BvAxiH+cinwAyAm:171","syamu!:Sabde:syam:01:0960:pa:sew:स्य॑मुँ॑:509:527:538:syam1_syamuz_BvAxiH+Sabxe:","syama!:vitarke:syam:10:0216:A:sew:स्य॑मँ॒:1267:1286:1320:syam2_syamaz_curAxiH+viwarke:","sraki!:gatO:sraNk:01:0088:A:sew:स्र॑किँ॒:65:64:66:srafk1_srakiz_BvAxiH+gawO:","sramBu!:pramAde ityeke:sramB:01:0459:A:sew:स्र॑म्भुँ॒:461:268,482:488:sramB1_sramBuz_BvAxiH+pramAxe:","sramBu!:viSvAse:sramB:01:0861:A:sew:स्र॑म्भुँ॒:461:268,482:488:sramB1_sramBuz_BvAxiH+pramAxe:","srivu!:gatiSozaRayoH:sriv:04:0003:pa:sew:स्रि॑वुँ॑:757:780:795:sriv1_srivuz_xivAxiH+gawiSoRaNayoH:","sru:gatO:sru:01:1090:pa:aniw:स्रु॒:598:625:636:sru1_sru_BvAxiH+gawO:342","srekf!:gatO:srek:01:0087:A:sew:स्रे॑कृँ॒:65:64:66:srek1_srekqz_BvAxiH+gawO:","srE:pAke iti kezucitpAWaH:srE:01:1068:pa:aniw:स्रै॒::605:617::","srokf!:saNGAte iti pAWAntaram:srok:01:0082:A:sew:स्रो॑कृँ॒:::::","zvaki!:gatyarTaH ityeke:svaNk:01:0114:A:sew:ष्व॑किँ॒:::::","zvaYja!:parizvaNge:svaYj:01:1131:A:aniw:ष्व॒ञ्जँ॒::::svaFj1_RvaFjaz_BvAxiH+pariRvafge:","zvada!:AsvAdane:svad:01:0018:A:sew:ष्व॑दँ॒:16:17:17:svax1_Rvaxaz_BvAxiH+AsvAxane:16","zvada!:AsvAdane:svad:10:0336:u:sew:ष्व॑दँ॑:::1377:svax2_Rvaxaz_curAxiH+AsvAxane:","svana!:Sabde:svan:01:0961:pa:sew:स्व॑नँ॑:509:527:538:svan1_svanaz_BvAxiH+avawaMsane:","svana!:avataMsane mit:svan:01:0936:pa:sew:स्व॑नँ॑:509:527:538:svan1_svanaz_BvAxiH+avawaMsane:","Yizvapa!:Saye:svap:02:0063:pa:aniw:ञिष्व॒पँ॑:718:740:757:svap1_FiRvapaz_axAxiH+Saye:","svara:Akzepe:svara:10:0402:u:sew:स्व॑र॑:1375:1392:1429:svara1_svara_curAxiH+AkRepe:","svarta!:gatyAm ityeke:svart:10:0116:u:sew:स्व॑र्तँ॑::1221:::","svarda!:AsvAdane:svard:01:0019:A:sew:स्व॑र्दँ॒:16:17:17:svarx1_svarxaz_BvAxiH+AsvAxane:","zvaska!:gatyarTaH:svazk:01:0105:A:sew:ष्व॑स्कँ॒:::::","svAda!:AsvAdane ityeke:svAd:10:0337:u:sew:स्वा॑दँ॑::::svAx2_svAxaz_curAxiH+AsvAxane:","svAda!:AsvAdane:svAd:01:0028:A:sew:स्वा॑दँ॒:22:23:23:svAx1_svAxaz_BvAxiH+AsvAxane:22","zvidA!:gAtraprakzaraRe YizvidA! ityeke:svid:04:0085:pa:aniw:ष्वि॒दाँ॑:::::","YizvidA!:snehanamocanayoH gAtraprasravaRe snehanamohanayorityeke:svid:01:0845:A:sew:ञिष्वि॑दाँ॒:452::480:svix1_FiRvixAz_BvAxiH+snehanamocanayoH:","svf:SabdopatApayoH:svf:01:1081:pa:aniw:स्वृ॒:592:616:629:svq1_svq_BvAxiH+SabxopAwapayoH:344","hawa!:SabdasaNGAtayoH dIptO ca:haw:01:0349:pa:sew:ह॑टँ॑:194:203:203:hat1_hataz_BvAxiH+xIpwO:","haWa!:plutiSaWatvayoH balAtkAra ityanye:haW:01:0388:pa:sew:ह॑ठँ॑:212:225:224::","hada!:purIzotsarge:had:01:1132:A:aniw:ह॒दँ॒:628:653:666:hax1_haxaz_BvAxiH+purIRowsarge:","hana!:hiMsAgatyoH:han:02:0002:pa:aniw:ह॒नँ॑:662:686:700:han1_hanaz_axAxiH+hiMsAgawyoH:353","hamma!:gatO:hamm:01:0538:pa:sew:ह॑म्मँ॑:288:301:304:hamm1_hammaz_BvAxiH+gawO:","harya!:gatikAntyoH:hay:01:0592:pa:sew:ह॑र्यँ॑:313:328:330:hary1_haryaz_BvAxiH+gawikAnwyoH:","haya!:gatO:hay:01:0589:pa:sew:ह॑यँ॑:311:326:328:hay1_hayaz_BvAxiH+gawO:","hala!:vileKane:hal:01:0971:pa:sew:ह॑लँ॑:515:534:545:hal1_halaz_BvAxiH+vileKane:","hase!:hasane:has:01:0822:pa:sew:ह॑सेँ॑:435:454:461:has1_hasez_BvAxiH+hasane:177","hasta!:ardane ityanye:hast:10:0206:A:sew:ह॑स्तँ॒:::::","o!hAN:gatO:hA:03:0008:A:aniw:ओँ॑हा॒ङ्:738,739:760,761:776,777:hA1_ozhAf_juhowyAxiH+gawO:","o!hAk:tyAge:hA:03:0009:pa:aniw:ओँ॑हा॒क्:739:761::hA2_ozhAk_juhowyAxiH+wyAge:","hi:gatO vfdDO ca:hi:05:0012:pa:aniw:हि॒:892:913:932::","hisi!:hiMsAyAm:hiMs:10:0012:u:sew:हि॑सिँ॑:1346:1362:1399:hiMs2_hisiz_curAxiH+hiMsAyAm:","hisi!:hiMsAyAm:hiMs:07:0366:pa:sew:हि॑सिँ॑:1057:1075:1108:hiMs1_hisiz_ruXAxiH+hiMsAyAm:419","hikka!:avyakte Sabde:hikk:01:0997:u:sew:हि॑क्कँ॒॑:537:558:569::","hiwa!:AkroSe ityeke:hiw:01:0356:pa:sew:हि॑टँ॑::::hit1_hitaz_BvAxiH+AkroSe:","hiqi!:gatyanAdarayoH:hiRq:01:0301:A:sew:हि॑डिँ॒:157:164:166:hiNd1_hidiz_BvAxiH+gawyanAxarayoH:86","hivi!:prIRanArTaH:hinv:01:0675:pa:sew:हि॑विँ॑:356::377:hinv1_hiviz_BvAxiH+prINanArWaH:","hila!:BAvakaraRe:hil:06:0088:pa:sew:हि॑लँ॑:972:994:1014:hil1_hilaz_wuxAxiH+BAvakaraNe:","hizka!:hiMsAyAm ityeke:hizk:10:0208:A:sew:हि॑ष्कँ॒:::1312:hiRk1_hiRkaz_curAxiH+hiMsAyAm:","hu:dAnAdanayoH AdAne cetyeke prIRane'pIti BAzyam:hu:03:0001:pa:aniw:हु॒:732:754:770:hu1_hu_juhowyAxiH+xAnAxAnayoH_AxAne_ca_iwyeke:360","huqf!:gatO:huq:01:0408:pa:sew:हु॑डृँ॑:226:238::hud1_hudqz_BvAxiH+anAxare:","huqa!:saNGAte:huq:06:0130:pa:sew:हु॑डँ॑::1016:1035,1042::","huqi!:varaRe haraRa ityeke:huRq:01:0302:A:sew:हु॑डिँ॒:158,166:165,173:168,177:huNd1_hudiz_BvAxiH+saMGAwe:","huqi!:saNGAte:huRq:01:0310:A:sew:हु॑डिँ॒:158,166:165,173:168,177:huNd1_hudiz_BvAxiH+saMGAwe:","hurCA!:kOwilye:hurC:01:0239:pa:sew:हु॑र्छाँ॑:117:124:125:hurC1_hurCAz_BvAxiH+kOtilye:","hula!:gatO:hul:01:0980:pa:sew:हु॑लँ॑:521:540,541:552,553:hul1_hulaz_BvAxiH+gawO:","hula!:hiMsAsaMvaraRayoSca hiMsAyAM saMvaraRe ca:hul:01:0978:pa:sew:हु॑लँ॑:521:540,541:552,553:hul1_hulaz_BvAxiH+gawO:","hUqf!:gatO:hUq:01:0409:pa:sew:हू॑डृँ॑:226:238:238:hUd1_hUdqz_BvAxiH+gawO:","hf:prasahyakaraRe:hf:03:0016:pa:aniw:हृ॒:746:768:784:hq2_hq_juhowyAxiH+prasahyakaraNe:","hfY:haraRe:hf:01:1046:u:aniw:हृ॒ञ्:569:589:601:hq1_hqF_BvAxiH+haraNe:","hfzu!:alIke:hfz:01:0806:pa:sew:हृ॑षुँ॑:429:448:455::","hfza!:tuzwO:hfz:04:0142:pa:sew:हृ॑षँ॑:868:888:908:hqR1_hqRaz_xivAxiH+wuRtO:","heWa!:heQa! ca BUtaprAdurBAve:heW:09:0069:pa:sew:हे॑ठँ॑::1146:::","heWa!:vibADAyAm:heW:01:0299:A:sew:हे॑ठँ॒:155:162:164:heT1_heTaz_BvAxiH+vibAXAyAm:","heWa!:vibADAyAm:heW:01:0360:pa:sew:हे॑ठँ॑:155:162:164:heT1_heTaz_BvAxiH+vibAXAyAm:","heqf!:anAdare:heq:01:0318:A:sew:हे॑डृँ॒:173:182:182:hed1_hedqz_BvAxiH+anAxare:","heqa!:vezwane:heq:01:0887:pa:sew:हे॑डँ॑:479:209,502:507:hed2_hedaz_BvAxiH+veRtane:","heQa!:ca BUtaprAdurBAve ityeke:heQ:09:0070:pa:sew:हे॑ढँ॑:::::","hepf!:ca gatO:hep:01:0432:A:sew:हे॑पृँ॒:::::","hezf!:avyakte Sabde:hez:01:0708:A:sew:हे॑षृँ॒:376:392:398::","hoqf!:anAdare:hoq:01:0319:A:sew:हो॑डृँ॒:173,226::182,238:hod1_hodqz_BvAxiH+anAxare:","hoqf!:gatO:hoq:01:0410:pa:sew:हो॑डृँ॑:173,226::182,238:hod1_hodqz_BvAxiH+anAxare:","hnuN:apanayane:hnu:02:0076:A:aniw:ह्नु॒ङ्:731:753:769:hnu1_hnuf_axAxiH+apanayane:198","hmala!:saYcalane calane mit anupasargAdvA 1943:hmal:01:0918:pa:sew:ह्म॑लँ॑:495:519:524:hmal1_hmalaz_BvAxiH+calane:","hrage!:saMvaraRe:hrag:01:0896:pa:sew:ह्र॑गेँ॑:486:510:515:hrag1_hragez_BvAxiH+saMvaraNe:","hrapa!:vyaktAyAM vAci ityanye:hrap:10:0163:u:sew:ह्र॑पँ॑:::::","hrasa!:Sabde:hras:01:0808:pa:sew:ह्र॑सँ॑::449:456:hras1_hrasaz_BvAxiH+Sabxe:","hrAda!:avyakte Sabde:hrAd:01:0026:A:sew:ह्रा॑दँ॒:20:21:21::20","hrI:lajjAyAm:hrI:03:0003:pa:aniw:ह्री॒:734:756:772:hrI1_hrI_juhowyAxiH+lajjAyAm:","hrICa!:lajjAyAm:hrIC:01:0238:pa:sew:ह्री॑छँ॑::123:124:hrIC1_hrICaz_BvAxiH+lajjAyAm:","hrezf!:avyakte Sabde:hrez:01:0709:A:sew:ह्रे॑षृँ॒::391:397::","hlage!:saMvaraRe:hlag:01:0897:pa:sew:ह्ल॑गेँ॑::510:515:hlag1_hlagez_BvAxiH+saMvaraNe:","hlapa!:vyaktAyAM vAci:hlap:10:0161:u:sew:ह्ल॑पँ॑:1236:1251:1288::","hlasa!:Sabde:hlas:01:0809:pa:sew:ह्ल॑सँ॑:430:449:456:hlas1_hlasaz_BvAxiH+Sabxe:","hlAdI!:avyakte Sabde suKe ca:hlAd:01:0027:A:sew:ह्ला॑दीँ॒:21:22:22::21","hvala!:saYcalane calane mit anupasargAdvA 1942:hval:01:0917:pa:sew:ह्व॑लँ॑:495:519:524:hval1_hvalaz_BvAxiH+calane:","hvf:saMvaraRe varaRe ityeke:hvf:01:1080:pa:aniw:ह्वृ॒:591:615:628:hvq1_hvq_BvAxiH+kOtilye:","hvf:kOwilye:hvf:01:1084:pa:aniw:ह्वृ॒:591:615:628:hvq1_hvq_BvAxiH+kOtilye:","hveY:sparDAyAM Sabde ca:hve:01:1163:u:aniw:ह्वे॒ञ्:658:682:696::");
# Current data after corrections made for issue https://github.com/drdhaval2785/SanskritVerb/issues/965 is stored in verbdata.php
include('verbdata.php');
// Specific sets
$juhotyAdi=array("ki","kita!","gA","Gf","jana!","tura!","qudAY","Dana!","quDAY","Diza!","Riji!r","pf","pF","pF","Basa!","YiBI","quBfY","BfMSu!","mAN","viji!r","vizx!","sf","o!hAN","o!hAk","hu","hf","hrI","f");
$juhotyAdireplace=array("kiki","kikit","gigA","GiGf","jajan","tutur","dadA","daDan","daDA","diDiz","nenij","pipf","pipF","pipF","baBas","biBI","biBf","biBfMS","mimA","vevij","veviz","sisf","hihA","hahA","huhu","hihf","jihrI","if",);
$juhotyAdia=array("ki","kit","gA","Gf","jan","tur","dA","Dan","DA","Diz","nij","pf","pF","Bas","BI","Bf","mA","vij","viz","sf","hA","hA","hu","hf","hrI","f",);
$juhotyAdib=array("kiki","kikit","gigA","GiGf","jajan","tutur","dadA","daDan","daDA","diDiz","nenij","pipf","pipF","baBas","biBI","biBf","mimA","vevij","veviz","sisf","hihA","hahA","huhu","hihf","jihrI","if",);
$pvAdi=array("pUY","lUY","stFY","kFY","vFY","DUY","SF","pF","vF","BF","mF","dF","jF","nF","kF","F","gF","jyA","rI","lI","blI","plI","DF","JF","vlI");
$lvAdi=array("lUY","stFY","kFY","vFY","DUY","SF","pF","vF","BF","mF","dF","jF","nF","kF","F","gF","jyA","rI","lI","blI","plI");
$ghuset=array("qudAY","dAR","do","deN","quDAY","Dew");
$aniditverbs=array("skandi!r","sraMsu!","DvaMsu!","BraMsu!","BraMSu!","sraMBu!","sramBu!","maTi!","graTi!","granTa!","SranTa!","SraTi!","kuTi!","kunTa!","SunDa!","kuYca!","kruYca!","luYca!","mfYcu!","mluYcu!","gluYca!","vaYcu!","caYcu!","tvaYcu!","taYcu!","taYcU!","SramBu!","damBu!","zfmBu!","hamma!","SaMsu!","kuMsa!","kusi!","raYja!","syandU!","Baji!","banDa!","aYcu!","aYjU!","undI!","YiinDI!","trumpa!","trumPa!","tfmPa!","tumPa!","dfmPa!","fmPa!","gumPa!","umBa!","SumBa!","tumpa!","tfMhU!","bundi!r","zaYja!","zvaYja!","daMSa!","stamBu!","stumBu!","skamBu!","skumBu!","manTa!","tfmpa!","tfmPa!","dfmpa!","u!bundi!r","ganDa!");
//$aniditverbs=array("skand","sraMs","DvaMs","BraMs","BraMS","sraMB","sramB","manT","granT","SranT","kunT","SunD","kuYc","kruYc","luYc","mfYc","mluYc","gluYc","vaYc","caYc","tvaYc","taYc","SramB","damB","zfmB","hamm","SaMs","kuMs","raYj","syand","BaYj","banD","aYc","aYj","und","inD!","trump","trumP","tfmP","tumP","dfmP","fmP","gumP","umB","SumB","tump","tfMh","tfnh","bund","zaYj","zvaYj","daMS","stamB","stumB","skamB","skumB");
$iditverbs=array("ahi!","ahi!","aki!","agi!","aGi!","aci!","aji!","aWi!","ati!","adi!","abi!","aBi!","ACi!","iKi!","igi!","idi!","ivi!","IKi!","IKi!","Iji!","uKi!","uCi!","uCi!","kaWi!","fji!","o!laqi!","kasi!","kaki!","kaci!","kaWi!","kaWi!","kaqi!","kaqi!","kaqi!","kadi!","kadi!","kapi!","kAkzi!","kAci!","kuSi!","kusi!","kuji!","kuwi!","kuWi!","kuWi!","kuqi!","kuqi!","kuqi!","kuqi!","kuTi!","kudri!","kubi!","kubi!","kuBi!","kfvi!","kradi!","kradi!","kladi!","kladi!","klidi!","klidi!","kzaji!","kzaji!","kzapi!","Kaji!","Kaqi!","Kaqi!","Kuqi!","gaji!","gaqi!","gaqi!","guji!","guWi!","guqi!","gfji!","graTi!","Gawi!","GiRi!","Guzi!","GuRi!","GfRi!","cakzi!N","caqi!","caqi!","cadi!","capi!","citi!","cuwi!","cuqi!","cubi!","cubi!","Caji!","Cadi!","jasi!","jaji!","jaBi!","ji!","jivi!","jugi!","jfBi!","waki!","tasi!","tasi!","taki!","tagi!","taqi!","tatri!","tuji!","tuji!","tuji!","tuqi!","tuqi!","tubi!","tubi!","trasi!","traki!","tragi!","tradi!","triKi!","tvagi!","Taki!","daSi!","daSi!","dasi!","dasi!","daGi!","divi!","dfhi!","drAkzi!","Davi!","Divi!","Dfji!","DmAkzi!","Draji!","DrAkzi!","Dvaji!","DvAkzi!","RaKi!","wunadi!","Risi!","Riji!","Ridi!","Rivi!","pasi!","pasi!","paci!","paci!","paqi!","paqi!","paTi!","pisi!","piji!","piji!","piji!","piWi!","piqi!","piqi!","pivi!","puwi!","puqi!","puTi!","pfji!","bahi!","bawi!","bidi!","bugi!","bfhi!","bfhi!","Baji!","Baqi!","Baqi!","Badi!","Bidi!","BfSi!","mahi!","mahi!","maki!","maKi!","magi!","maGi!","maGi!","maci!","maWi!","maqi!","maqi!","maqi!","matri!","maTi!","madi!","mAkzi!","miji!","midi!","mivi!","muKi!","muji!","muWi!","muqi!","muqi!","mfqi!","yatri!","yugi!","rahi!","rahi!","raKi!","ragi!","raGi!","raGi!","ravi!","raPi!","rabi!","raBi!","riKi!","rigi!","rivi!","ruSi!","rusi!","ruwi!","ruWi!","ruWi!","ruqi!","laKi!","lagi!","laGi!","laGi!","laGi!","laGi!","laji!","laji!","laji!","laji!","laqi!","o!laqi!","labi!","labi!","laBi!","lACi!","lAji!","liKi!","ligi!","ligi!","liji!","luji!","luji!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lubi!","lubi!","vaki!","vaki!","vaKi!","vagi!","vaGi!","vawi!","vawi!","vawi!","vaWi!","vaqi!","vaqi!","vadi!","vAkzi!","vACi!","vugi!","bfhi!","bfhi!","vfji!","vraji!","Saki!","Saqi!","SiKi!","SiGi!","Siji!","SuWi!","SuWi!","SuWi!","Sraki!","Sragi!","SraTi!","Slaki!","Slagi!","Svaki!","Sragi!","Svaci!","SvaWi!","Svidi!","zasti!","zivi!","skaBi!","skudi!","zwaBi!","spadi!","sPuwi!","sPuwi!","sPuqi!","sPuqi!","sraki!","zvaki!","Sragi!","hisi!","hisi!","hiqi!","hivi!","huqi!","huqi!","muci!");
$editverbs=array("kaKe!","kage!","kawe!","kvaTe!","cawe!","cate!","cade!","paTe!","maTe!","rage!","lage!","zage!","zWage!","hase!","hrage!","hlage!");
$iditverbs1=array("anh","anh","ank","ang","anG","anc","anj","anW","ant","and","anb","anB","AnC","inK","ing","ind","inv","InK","InK","Inj","unK","unC","unC","kanW","fnj","o!lanq","kans","kank","kanc","kanW","kanW","kanq","kanq","kanq","kand","kand","kanp","kAnkz","kAnc","kunS","kuns","kunj","kunw","kunW","kunW","kunq","kunq","kunq","kunq","kunT","kundr","kunb","kunb","kunB","kfnv","krand","krand","kland","kland","klind","klind","kzanj","kzanj","kzanp","Kanj","Kanq","Kanq","Kunq","ganj","ganq","ganq","gunj","gunW","gunq","gfnj","granT","Ganw","GinR","Gunz","GunR","GfnR","cakzin!N","canq","canq","cand","canp","cint","cunw","cunq","cunb","cunb","Canj","Cand","jans","janj","janB","j","jinv","jung","jfnB","wank","tans","tans","tank","tang","tanq","tantr","tunj","tunj","tunj","tunq","tunq","tunb","tunb","trans","trank","trang","trand","trinK","tvang","Tank","danS","danS","dans","dans","danG","dinv","dfnh","drAnkz","Danv","Dinv","Dfnj","DmAnkz","Dranj","DrAnkz","Dvanj","DvAnkz","RanK","wunand","Rins","Rinj","Rind","Rinv","pans","pans","panc","panc","panq","panq","panT","pins","pinj","pinj","pinj","pinW","pinq","pinq","pinv","punw","punq","punT","pfnj","banh","banw","bind","bung","bfnh","bfnh","Banj","Banq","Banq","Band","Bind","BfnS","manh","manh","mank","manK","mang","manG","manG","manc","manW","manq","manq","manq","mantr","manT","mand","mAnkz","minj","mind","minv","munK","munj","munW","munq","munq","mfnq","yantr","yung","ranh","ranh","ranK","rang","ranG","ranG","ranv","ranP","ranb","ranB","rinK","ring","rinv","runS","runs","runw","runW","runW","runq","lanK","lang","lanG","lanG","lanG","lanG","lanj","lanj","lanj","lanj","lanq","o!lanq","lanb","lanb","lanB","lAnC","lAnj","linK","ling","ling","linj","lunj","lunj","lunw","lunW","lunW","lunW","lunq","lunT","lunb","lunb","vank","vank","vanK","vang","vanG","vanw","vanw","vanw","vanW","vanq","vanq","vand","vAnkz","vAnC","vung","bfnh","bfnh","vfnj","vranj","Sank","Sanq","SinK","SinG","Sinj","SunW","SunW","SunW","Srank","Srang","SranT","Slank","Slang","Svank","Srang","Svanc","SvanW","Svind","zanst","zinv","skanB","skund","zwanB","spand","sPunw","sPunw","sPunq","sPunq","srank","zvank","Srang","hins","hins","hinq","hinv","hunq","hunq","munc");
$iditverbs2=array("ah","ah","ak","ag","aG","ac","aj","aW","at","ad","ab","aB","AC","iK","ig","id","iv","IK","IK","Ij","uK","uC","uC","kaW","fj","o!laq","kas","kak","kac","kaW","kaW","kaq","kaq","kaq","kad","kad","kap","kAkz","kAc","kuS","kus","kuj","kuw","kuW","kuW","kuq","kuq","kuq","kuq","kuT","kudr","kub","kub","kuB","kfv","krad","krad","klad","klad","klid","klid","kzaj","kzaj","kzap","Kaj","Kaq","Kaq","Kuq","gaj","gaq","gaq","guj","guW","guq","gfj","graT","Gaw","GiR","Guz","GuR","GfR","cakzi!N","caq","caq","cad","cap","cit","cuw","cuq","cub","cub","Caj","Cad","jas","jaj","jaB","j","jiv","jug","jfB","wak","tas","tas","tak","tag","taq","tatr","tuj","tuj","tuj","tuq","tuq","tub","tub","tras","trak","trag","trad","triK","tvag","Tak","daS","daS","das","das","daG","div","dfh","drAkz","Dav","Div","Dfj","DmAkz","Draj","DrAkz","Dvaj","DvAkz","RaK","wunad","Ris","Rij","Rid","Riv","pas","pas","pac","pac","paq","paq","paT","pis","pij","pij","pij","piW","piq","piq","piv","puw","puq","puT","pfj","bah","baw","bid","bug","bfh","bfh","Baj","Baq","Baq","Bad","Bid","BfS","mah","mah","mak","maK","mag","maG","maG","mac","maW","maq","maq","maq","matr","maT","mad","mAkz","mij","mid","miv","muK","muj","muW","muq","muq","mfq","yatr","yug","rah","rah","raK","rag","raG","raG","rav","raP","rab","raB","riK","rig","riv","ruS","rus","ruw","ruW","ruW","ruq","laK","lag","laG","laG","laG","laG","laj","laj","laj","laj","laq","o!laq","lab","lab","laB","lAC","lAj","liK","lig","lig","lij","luj","luj","luw","luW","luW","luW","luq","luT","lub","lub","vak","vak","vaK","vag","vaG","vaw","vaw","vaw","vaW","vaq","vaq","vad","vAkz","vAC","vug","bfh","bfh","vfj","vraj","Sak","Saq","SiK","SiG","Sij","SuW","SuW","SuW","Srak","Srag","SraT","Slak","Slag","Svak","Srag","Svac","SvaW","Svid","zast","ziv","skaB","skud","zwaB","spad","sPuw","sPuw","sPuq","sPuq","srak","zvak","Srag","his","his","hiq","hiv","huq","huq","muc");
$irendiditverbs=array("uhi!r","kzudi!r","Guzi!r","Guzi!r","cyuti!r","Cidi!r","u!Cfdi!r","jyuti!r","tuhi!r","u!tfdi!r","duhi!r","dfSi!r","Riji!r","buDi!r","u!bundi!r","Bidi!r","yuji!r","rici!r","rudi!r","ruDi!r","vici!r","viji!r","I!Suci!r","Scuti!r","Scyuti!r","skandi!r","sPuwi!r");
$Uditverbs=array("akzU!","takzU!","tvakzU!","gfhU!","mfjU!","aSU!","vfhU!","tfMhU!","kzamU!","klidU!","aYjU!","kliSU!","ziDU!","trapU!z","kzamU!z","gAhU!","guhU!","syandU!","kfpU!","gupU!","o!vraScU!","tfhU!","stfhU!","taYcU!",);
$AkArAntaverbs=array("KyA","gAN","gA","GrA","jYA","jYA","jyA","daridrA","qudAY","dAR","dAp","drA","quDAY","DmA","pA","pA","prA","psA","BA","mAN","mA","mAN","mnA","yA","rA","lA","vA","SrA","SrA","zWA","zRA","o!hAN","o!hAk");
$ghaTAdi_mit=array("kaKe!","rage!","lage!","hvage!","hlage!","zage!","zwage!","kage!","Gawa!","vyaTa!","praTa!","prasa!","mrada!","sKada!","dakza!","heqa!","krapa!","YitvarA!","jvara!","gaqa!","nawa!","Bawa!","Rawa!","caka!","aka!","aga!","kuRa!","caRa!","SaRa!","SraRa!","SraTa!","SlaTa!","kraTa!","klaTa!","vana!","zfka!","kzaji!","kadi!","kradi!","kladi!","jF");
$mitcurAdiverbs=array("jYapa!","yama!","caha!","raha!","bala!","ciY","kaKe!","rage!","lage!","hvage!","hlage!","zage!","zwage!","kage!","Gawa!","vyaTa!","praTa!","prasa!","mrada!","sKada!","dakza!","heqa!","krapa!","YitvarA","jvara!","gaqa!","nawa!","Bawa!","Rawa!","caka!","aka!","aga!","kaRa!","caRa!","SaRa!","SraRa!","SaRa!","SraTa!","SlaTa!","kraTa!","klaTa!","vana!","zfka!","kzaji!","kadi!","kradi!","kladi!","kzapa!",);
$ugitverbs=array("akzU!","acu!","aYjU!","aSU!","asu!","Apx!","Apx!","ASAsu!","fRu!","fDu!","fDu!","ejf!","ejf!","ezf!","ezf!","oKf!","oRf!","kabf!","kamu!","kASf!","kASf!","kAsf!","kuju!","kudf!","kfpU!","kfpU!","kepf!","kelf!","kevf!","knasu!","kramu!","krIqf!","klamu!","klidU!","kliSU!","klIbf!","kzaRu!","kzamU!","kzamU!z","kziRu!","kzivu!","kzIbf!","kzIvf!","kzevu!","kzvelf!","Kanu!","KAdf!","Kuju!","Kelf!","Kevf!","Korf!","Kolf!","gamx!","gADf!","gAhU!","gupU!","guhU!","gfhU!","gfDu!","gepf!","gevf!","gezf!","grasu!","grucu!","glasu!","glucu!","glepf!","glepf!","glevf!","glezf!","Gasx!","GfRu!","Gfzu!","DrAGf!","cakAsf!","caYcu!","camu!","camu!","cAyf!","cIbf!","cIBf!","cIvf!","celf!","Camu!","u!Cfdi!r","jamu!","jasu!","jasu!","jasu!","jimu!","jizu!","jutf!","jezf!","jehf!","Jamu!","wikf!","wIkf!","QOkf!","takzU!","taYcu!","taYcU!","tanu!","tanu!","tamu!","tasu!","tAyf!","tikf!","tipf!","tIkf!","tuqf!","tUqf!","tfMhU!","tfRu!","u!tfdi!r","tfhU!","tepf!","tevf!","trapU!z","trOkf!","tvakzU!","tvaYcu!","damu!","damBu!","dasu!","dASf!","dAsf!","divu!","divu!","divu!","devf!","drAKf!","drAGf!","drAqf!","drAhf!","drekf!","DAvu!","Depf!","Dorf!","u!Drasa!","u!Drasa!","DrAKf!","DrAqf!","Drekf!","DvaMsu!","nATf!","nADf!","RAsf!","Ridf!","Rizu!","Redf!","Rezf!","patx!","pelf!","pizx!","pisf!","pfzu!","pelf!","pevf!","pezf!","pesf!","pERf!","pruzu!","prezf!","prERf!","proTf!","pluzu!","plevf!","Pelf!","basu!","bADf!","bAhf!","bIBf!","u!bundi!r","bfhU!","vehf!","Basu!","BAsf!","BfMSu!","BfSu!","Bezf!","BraMSu!","BraMSu!","BraMsu!","Bramu!","Bramu!","wuBrAjf!","BrAjf!","wuBrASf!","Brejf!","Brezf!","wuBlASf!","Blezf!","manu!","mAhf!","miTf!","midf!","miDf!","mizu!","mImf!","mucx!","mfjU!","mfjU!","mfDu!","mfzu!","meTf!","medf!","meDf!","mepf!","mevf!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mlewf!","mlevf!","yasu!","wuyAcf!","yutf!","yezf!","yOwf!","ramu!","rAKf!","rAGf!","rAjf!","rAsf!","rekf!","rejf!","rewf!","repf!","reBf!","revf!","rezf!","roqf!","rOqf!","lAKf!","lAGf!","lupx!","lepf!","lokf!","lokf!","locf!","locf!","loqf!","vaYcu!","vaYcu!","vanu!","vanu!","vasu!","vAvftu!","vASf!","bAhf!","viTf!","vidx!","vizu!","vizx!","vftu!","vftu!","vftu!","vfDu!","vfDu!","vfzu!","vfhU!","veRf!","veTf!","venf!","velf!","vehf!","o!vraScU!","SaMsu!","Sakx!","Sadx!","Sadx!","Samu!","Sasu!","SAKf!","SAqf!","SAsu!","Sizx!","SIkf!","SIBf!","SfDu!","SfDu!","SfDu!","Self!","Sevf!","SoRf!","SOwf!","syandU!","sraMsu!","sraMsu!","Sramu!","SramBu!","Srizu!","SroRf!","SlAKf!","SlAGf!","Slizu!","Slokf!","SloRf!","zWivu!","zWivu!","zadx!","zadx!","zanu!","ziDU!","ziDu!","ziBu!","zimBu!","zivu!","sIkf!","sfpx!","zfBu!","zfmBu!","sekf!","zelf!","zevf!","skamBu!","skumBu!","stamBu!","zwipf!","zwuBu!","stumBu!","stfhU!","zwepf!","zRasu!","zRusu!","syamu!","sraMsu!","sramBu!","sramBu!","srivu!","srekf!","srokf!","huqf!","hUqf!","hfzu!","heqf!","hepf!","hezf!","hoqf!","hoqf!","hrezf!");
$curAdi_optionalNic_idud=array("pUrI!","ancu!","divu!","jasu!","SfDu!","vftu!","vfDu!","tanu!","uDrasa!","mfjU!","vaYcu!","BU","kfpa!","grasa!","dala!","ruja!","puza!","ji","ci","paw","ciY","pawa!","Gawa!","Rada!","nawa!","taqa!","nala!","puwa!","luwa!","gupa!","puTa!","kupa!","ruwa!","vftu!","vfDu!","tuji!","miji!","piji!","luji!","Baji!","laDi!","trasi!","pisi!","kusi!","daSi!","kuSi!","Gawi!","bfhi!","laji!","aji!","dasi!","BfSi!","ruSi!","rusi!","puwi!","raGi!","laGi!","ahi!","rahi!","mahi!","laqi!","vicCa!","cIva!","lokf!","locf!","tarka!","SIka!","DUpa!",);
$curAdi_optionalNic_Asvada=array("grasa!","dala!","ruja!","puza!","ji","ci","paw","ciY","pawa!","Gawa!","Rada!","nawa!","taqa!","nala!","puwa!","luwa!","gupa!","puTa!","kupa!","ruwa!","vftu!","vfDu!","tuji!","miji!","piji!","luji!","Baji!","laDi!","trasi!","pisi!","kusi!","daSi!","kuSi!","Gawi!","bfhi!","laji!","aji!","dasi!","BfSi!","ruSi!","rusi!","puwi!","raGi!","laGi!","ahi!","rahi!","mahi!","laqi!","vicCa!","cIva!","lokf!","locf!","tarka!","SIka!","DUpa!","pUrI!");
$curAdi_optionalNic_AdhRSIya=array("lI","jri","mI","prIY","BU","DUY","vfY","jF","zaha!","tapa!","SraTa!","Cada!","tanu!","vada!","vaca!","Asada!","rica!","Siza!","yuja!","juza!","pfca!","vfjI!","tfpa!","CfdI!","dfBI!","dfBa!","mfjU!","mfza!","Dfza!","granTa","granTa!","SranTa","SunDa!","hisi!","kaWi!","arca!","Ira!","SIka!","cIka!","arda!","arha!","Aplx!","mAna!","garha!","mArga!",);
$curAdi_optionalNic_extra=array("garva!","arTa!","mUtra!","karta!","pata!","pata");
$curAdi_optionalNic=array_merge($curAdi_optionalNic_AdhRSIya,$curAdi_optionalNic_Asvada,$curAdi_optionalNic_extra,$curAdi_optionalNic_idud);
$AkusmIya=array("yu","gF","qapa!","spaSa!","lala!","SaWa!","syama!","Sama!","gala!","Bala!","mada!","cita!","qipa!","divu!","vida!","truwa!","vfza!","tarja!","daSi!","tatri!","matri!","Bartsa!","basta!","ganDa!","vizka!","nizka!","kURa!","tURa!","BrURa!","yakza!","gUra!","lakza!","kutsa!","kUwa!","kuwwa!","vaYcu!","mAna!","kusma!");
$AgarvIya=array("pada","gfha","mfga","kuha","SUra","vIra","sTUla","satra","arTa","garva");
$curAdi_adanta=array("pada","gfha","mfga","kuha","SUra","vIra","sTUla","sTUla","satra","arTa","garva","kaTa","vara","gaRa","SaWa","SvaWa","pawa","vawa","raha","stana","pata","paza","svara","raca","kala","caha","maha","sAra","kfpa","SraTa","spfha","BAma","sUca","Kewa","Kowa","kzowa","goma","kumAra","SIla","sAma","vela","kAla","palyUla","vAta","gaveza","vAsa","nivAsa","BAja","saBAja","Una","Dvana","kUwa","saMketa","grAma","kuRa","guRa","keta","kUwa","stena","sUtra","mUtra","rUkza","pAra","tIra","puwa","Deka","katra","vazka","citra","aMsa","vawa","laja","vawi!","laji!","miSra","saNgrAma","Cidra","anDa","daRqa","aNka","aNga","suKa","duHKa","rasa","vyaya","rUpa","Ceda","Cada","lABa","vraRa","varRa","parRa","vizka","kzipa","vasa","tutTa","vala","gada");
$tudAdi_mucAdi=array("muc","lup","vid","lip","zic","Kid","kft","piS","sic");
$tudAdi_kuTAdi=array("kuN","gu","Dru","RU","DU","kaqa!","qipa!","kuca!","guja!","kuwa!","Guwa!","cuwa!","Cuwa!","juqa!","tuwa!","puwa!","muwa!","truwa!","luwa!","sPuwa!","kuqa!","kruqa!","guqa!","cuqa!","tuqa!","Tuqa!","puqa!","vruqa!","sTuqa!","sPuqa!","gurI!","Cura!","sPura!","sPula!","kfqa!","mfqa!","Bfqa!");
$divAdi_puSAdi=array("puza!","Suza!","tuza!","duza!","Sliza!","Saka!","zvidA!","YizvidA!","kruDa!","kzuDa!","SuDa!","ziDu!","raDa!","RaSa!","tfpa!","dfpa!","dfha!","muha!","zRuha!","zRiha!","Samu!","tamu!","damu!","Sramu!","Bramu!","kzamU!","klamu!","madI!","asu!","yasu!","jasu!","tasu!","dasu!","vasu!","basu!","Basu!","vyuza!","vyusa!","byusa!","busa!","vusa!","pyuza!","pyusa!","puza!","pluza!","visa!","bisa!","kusa!","kuSa!","kuMsa!","kuMSa!","busa!","musa!","masI!","samI!","luwa!","luWa!","uca!","BfSu!","BfMSu!","BraMSu!","vfSa!","kfSa!","Yitfza!","YitfzA!","hfza!","ruza!","riza!","kupa!","gupa!","yupa!","rUpa!","lupa!","rupa!","lupa!","zwupa!","zwUpa!","luBa!","kzuBa!","RaBa!","tuBa!","klidU!","YimidA!","YikzvidA!","fDu!","gfDu!");
$bhvAdi_dyutAdi=array("RaBa!","SvitA!","YimidA!","YizvidA!","ruca!","Guwa!","ruwa!","luwa!","luWa!","dyuta!","kzuBa!","tuBa!","SuBa!","vftu!","vfDu!","SfDu!","syandU!","kfpU!","sraMBu!","BraMSu!","sramBu!","DvaMsu!","BraMsu!","sraMsu!",);
$lRdit=array("Sakx!","patx!","Sadx!","zadx!","gamx!","Gasx!","vidx!","Sizx!","pizx!","vizx!","mucx!","lupx!","kfpx!","Apx!","sfpx!");
$Rditverbs=array("ejf!","ejf!","ezf!","ezf!","oKf!","oRf!","kabf!","kASf!","kASf!","kAsf!","kudf!","kepf!","kelf!","kevf!","krIqf!","klIbf!","kzIbf!","kzIvf!","kzvelf!","KAdf!","Kelf!","Kevf!","Korf!","Kolf!","gADf!","gepf!","gevf!","gezf!","glepf!","glepf!","glevf!","glezf!","DrAGf!","cakAsf!","cAyf!","cIbf!","cIBf!","cIvf!","celf!","jutf!","jezf!","jehf!","wikf!","wIkf!","QOkf!","tAyf!","tikf!","tipf!","tIkf!","tuqf!","tUqf!","tepf!","tevf!","trOkf!","dASf!","dAsf!","devf!","drAKf!","drAGf!","drAqf!","drAhf!","drekf!","Depf!","Dorf!","DrAKf!","DrAqf!","Drekf!","nATf!","nADf!","RAsf!","Ridf!","Redf!","Rezf!","pelf!","pisf!","pelf!","pevf!","pezf!","pesf!","pERf!","prezf!","prERf!","proTf!","plevf!","Pelf!","bADf!","bAhf!","bIBf!","vehf!","BAsf!","Bezf!","wuBrAjf!","BrAjf!","wuBrASf!","Brejf!","Brezf!","wuBlASf!","Blezf!","mAhf!","miTf!","midf!","miDf!","mImf!","meTf!","medf!","meDf!","mepf!","mevf!","mrewf!","mreqf!","mlewf!","mlevf!","wuyAcf!","yutf!","yezf!","yOwf!","rAKf!","rAGf!","rAjf!","rAsf!","rekf!","rejf!","rewf!","repf!","reBf!","revf!","rezf!","roqf!","rOqf!","lAKf!","lAGf!","lepf!","lokf!","lokf!","locf!","locf!","loqf!","vASf!","bAhf!","viTf!","veRf!","veTf!","venf!","velf!","vehf!","SAKf!","SAqf!","SIkf!","SIBf!","Self!","Sevf!","SoRf!","SOwf!","SroRf!","SlAKf!","SlAGf!","Slokf!","SloRf!","sIkf!","sekf!","zelf!","zevf!","zwipf!","zwepf!","srekf!","srokf!","huqf!","hUqf!","heqf!","hepf!","hezf!","hoqf!","hoqf!","hrezf!");
$sanAdilist=array("san","kyac","kAmyac","kyaz","kyaN","kvip","RiN","Ric","yak","Aya","IyaN","aN");
$sArvadhatuka_lakAra=array("law","low","laN","viDiliN","sArvaDAtukalew");
$ArdhadhAtuka_lakAra=array("lfw","lfN","luw","ASIrliN","liw","luN","ArDaDAtukalew");
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
$vikaraNa=array("ap","yan","nu","a","na","nA","Aya","Ana","u","Ri","ya","aN");
// Total sArvadhAtuka pratyayas.
$sArvadhAtuka_pratyayas=array("ati","at","ad","atas","anti","an","asi","as","aTas","aTa","ami","am","avas","ava","amas","ama","Ati","At","Ad","Atas","Anti","An","Asi","As","ATas","ATa","Ami","Am","Avas","Ava","Amas","Ama","ate","atE","Ete","ante","antE","ase","asE","ETe","aDve","aDvE","e","E","avahe","avahE","amahe","amahE","Ate","AtE","Ete","Ante","AntE","Ase","AsE","ETe","ADve","ADvE","e","E","Avahe","AvahE","Amahe","AmahE","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAt","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","t","am","va","ma","it","itAm","iyus","is","itam","ita","iyam","iva","ima","te","ite","ante","se","iTe","Dve","e","vahe","mahe","tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE","ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","ati","atu","us","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","ta","am","va","ma","yAt","yAtAm","yus","yAH","yAtam","yAta","yAm","yAva","yAma","te","Ate","ate","se","ATe","Dve","e","vahe","mahe","tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE","ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","Sap","Syan","Snu","Sa","Snam","SnA","SAyac","SAnac");
// pit and apit sArvadhAtuka tiG pratyayas
$halAdi_pit_sArvadhAtuka_tiG_pratyayas=array("ti","si","mi","tu","t","s");
$ajAdi_pit_sArvadhAtuka_tiG_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am","AE","Iti","Isi","Izi","Imi","Itu","It","Is",); // removed sArvadhAtukalew because it causes problems in ''anti' application to 'znu'.
$halAdi_apit_sArvadhAtuka_tiG_pratyayas=array("tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma",);
$ajAdi_apit_sArvadhAtuka_tiG_pratyayas=array("anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi",);
// pit and apit sArvadhAtuka kRt pratyayas
$ajAdi_apit_sArvadhAtuka_kRt_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn");
// pit and apit sArvadhAtuka vikaraNa pratyayas
$ajAdi_pit_sArvadhAtuka_vikaraNa_pratyayas=array("Sap","a");
$halAdi_apit_sArvadhAtuka_vikaraNa_pratyayas=array("Syan","Snu","Snam","SnA","SAyac","SAnac","ya"); // watch out for the 'ya' entry. It was made to make application of hali ca possible after robbing the vikaraNa zyan of it markers.
$ajAdi_apit_sArvadhAtuka_vikaraNa_pratyayas=array("Sa","SAyac","SAnac");
// ajAdi and halAdi pit total pratyayas
$ajAdi_pit_sArvadhAtuka_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am","Sap","a","AE","Iti","Isi","Izi","Imi","Itu","It","Is",);
$halAdi_pit_sArvadhAtuka_pratyayas=array("ti","si","mi","tu","t","s",);
// ajAdi and halAdi apit total pratyayas
$ajAdi_apit_sArvadhAtuka_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Sa","SAyac","SAnac");
$halAdi_apit_sArvadhAtuka_pratyayas=array("tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma","Syan","Snu","Snam","SnA","SAyac","SAnac","ya");
// pit pratyayas
$pit_sArvadhAtuka_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am","Sap","ti","si","mi","tu","t","s","AE","Iti","Isi","Izi","Imi","Itu","It","Is",);
// apit pratyayas
$apit_sArvadhAtuka_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Sa","SAyac","SAnac","tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma","Syan","Snu","Snam","SnA","SAyac","SAnac","ya","ant","Ji","atus","aTus");
// halAdi pratyayas and ajAdi pratyayas
$ajAdi_sArvadhAtuka_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am","Sap","Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Sa","SAyac","SAnac");
$halAdi_sArvadhAtuka_pratyayas=array("ti","si","mi","tu","t","s","tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma","Syan","Snu","Snam","SnA","SAyac","SAnac","ya");
// ArdhadhAtuka tiG pratyayas. Now trying to complete the list according to sahajabodha.
$ArdhadhAtuka_tiG_lRT_parasmai=array("syati","syatas","syanti","syasi","syaTas","syaTa","syAmi","syAvas","syAmas",);
$ArdhadhAtuka_tiG_lRG_parasmai=array("syat","syatAm","syan","syas","syatam","syata","syam","syAva","syAma",);
$ArdhadhAtuka_tiG_luT_parasmai=array("tA","tArO","tAras","tAsi","tAsTas","tAsTa","tAsmi","tAsvas","tAsmas",);
$ArdhadhAtuka_tiG_ASIrliN_parasmai=array("yAt","yAstAm","yAsus","yAs","yAstam","yAsta","yAsam","yAsva","yAsma");
$ArdhadhAtuka_tiG_liT_parasmai=array("Ral","atus","us","Tal","aTus","a","Ral","va","ma",);
$ArdhadhAtuka_tiG_luG_parasmai=array("t","tAm","an","s","tam","ta","am","va","ma","sIt","sizwAm","sizus","sIs","sizwam","sizwa","sizam","sizva","sizma","at","atAm","an","as","atam","ata","am","Ava","Ama","at","atAm","an","as","atam","ata","am","Ava","Ama","sat","satAm","san","sas","satam","sata","sam","sAva","sAma","sIt","stAm","sus","sIs","stam","sta","sam","sva","sma","It","izwAm","izus","Is","izwam","izwa","izam","izva","izma");
$ArdhadhAtuka_tiG_ArDaDAtukalew_parasmai=array("sati","satas","santi","sat","sad","san","sasi","sas","saTas","saTa","sami","sam","savas","sava","samas","sama","sAti","sAt","sAd","sAtas","sAnti","sAn","sAsi","sAs","sATas","sATa","sAmi","sAm","sAvas","sAva","sAmas","sAma",);
$ArdhadhAtuka_tiG_lRT_Atmane=array("syate","syete","syante","syase","syeTe","syaDve","sye","syAvahe","syAmahe",);
$ArdhadhAtuka_tiG_lRG_Atmane=array("syata","syetAm","syanta","syaTAs","syaeTAm","syaDvam","sye","syAvahi","syAmahi",);
$ArdhadhAtuka_tiG_luT_Atmane=array("tA","tArO","tAras","tAse","tAsATe","tADve","tAhe","tAsvahe","tAsmahe",);
$ArdhadhAtuka_tiG_ASIrliN_Atmane=array("sIzwa","sIyAstAm","sIran","sIzWAs","sIyAsTAm","sIDvam","sIya","sIvahi","sImahi");
$ArdhadhAtuka_tiG_liT_Atmane=array("e","Ate","ire","se","ATe","Dve","e","vahe","mahe",);
$ArdhadhAtuka_tiG_luG_Atmane=array("ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","sata","sAtAm","santa","saTAs","sATAm","saDvam","si","sAvahi","sAmahi","sta","sAtAm","sata","sTAs","sATAm","Dvam","si","svahi","smahi","izwa","izAtAm","izata","izWAs","izATAm","iQvam","izi","izvahi","izmahi",);
$ArdhadhAtuka_tiG_ArDaDAtukalew_Atmane=array("sate","satE","sEte","sante","santE","sase","sasE","sETe","saDve","saDvE","se","sE","savahe","savahE","samahe","samahE","sAte","sAtE","sEte","sAnte","sAntE","sAse","sAsE","sETe","sADve","sADvE","se","sE","sAvahe","sAvahE","sAmahe","sAmahE",);
// ArdhadhAtuka tiG pratyayas
$ArdhadhAtuka_tiG_pratyayas=array("syati","syatas","syanti","syasi","syaTas","syaTa","syAmi","syAvas","syAmas","syat","syatAm","syan","syas","syatam","syata","syam","syAva","syAma","tA","tArO","tAras","tAsi","tAsTas","tAsTa","tAsmi","tAsvas","tAsmas","yAt","yAstAm","yAsus","yAs","yAstam","yAsta","yAsam","yAsva","yAsma","Ral","atus","us","Tal","aTus","a","Ral","va","ma","t","tAm","an","s","tam","ta","am","va","ma","sIt","sizwAm","sizus","sIs","sizwam","sizwa","sizam","sizva","sizma","at","atAm","an","as","atam","ata","am","Ava","Ama","at","atAm","an","as","atam","ata","am","Ava","Ama","sat","satAm","san","sas","satam","sata","sam","sAva","sAma","sIt","stAm","sus","sIs","stam","sta","sam","sva","sma","It","izwAm","izus","Is","izwam","izwa","izam","izva","izma","sati","satas","santi","sat","sad","san","sasi","sas","saTas","saTa","sami","sam","savas","sava","samas","sama","sAti","sAt","sAd","sAtas","sAnti","sAn","sAsi","sAs","sATas","sATa","sAmi","sAm","sAvas","sAva","sAmas","sAma","syate","syete","syante","syase","syeTe","syaDve","sye","syAvahe","syAmahe","syata","syetAm","syanta","syaTAs","syeTAm","syaDvam","sye","syAvahi","syAmahi","tA","tArO","tAras","tAse","tAsATe","tADve","tAhe","tAsvahe","tAsmahe","sIzwa","sIyAstAm","sIran","sIzWAs","sIyAsTAm","sIDvam","sIya","sIvahi","sImahi","e","Ate","ire","se","ATe","Dve","e","vahe","mahe","ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","sata","sAtAm","santa","saTAs","sATAm","saDvam","si","sAvahi","sAmahi","sta","sAtAm","sata","sTAs","sATAm","Dvam","si","svahi","smahi","izwa","izAtAm","izata","izWAs","izATAm","iQvam","izi","izvahi","izmahi","sate","satE","sEte","sante","santE","sase","sasE","sETe","saDve","saDvE","se","sE","savahe","savahE","samahe","samahE","sAte","sAtE","sEte","sAnte","sAntE","sAse","sAsE","sETe","sADve","sADvE","se","sE","sAvahe","sAvahE","sAmahe","sAmahE","ista","isAtAm","isata","isTAs","isATAm","iDvam","isDvam","isi","isvahi","ismahi","sDvam","Ji","a","Ta","syant","isyeTAm","isye","isyai","sye","syai");
// ArdhadhAtuka kRt pratyayas.
$ArdhadhAtuka_kRt_pratyayas= array("Rvul","vuY","Ryat","GaY","Rini","Ra","Ryuw","aR","KukaY","Rvi","Yyuw","Rvin","GinuR","ukaY","uR","Rac","inuR","iY","Rvuc","Ramul","KamuY","tavya","tavyat","anIyar","yat","tfc","lyu","ac","zvun","Takan","vun","wa","in","Kac","qa","KizRuc","viw","vic","manin","vanip","ini","Kyun","tfn","izRuc","yuc","zAkan","Aluc","ru","Gurac","u","Uk","ra","Aru","lukan","varac","qu","zwran","itra","tumun","ap","aTuc","nan","a","ani","lyuw","Ga","Kal","se","sen","ase","asen","aDyE","aDyEn","tavE","taven","tosun","tvan","atfn","kyap","ka","wak","kvin","kaY","kvip","kaY","kvanip","kta","ktavatu","Nvanip","kAnac","kvasu","gsnu","kmarac","kurac","kvarap","kin","ki","najiN","kuk","ktri","naN","ktin","aN","ktic","kse","kasen","kaDyE","kaDyEn","taveN","kamul","kasun","ken","kenya","ktvA",);
// ArdhadhAtuka vikaraNa pratyayas.
$ArdhadhAtuka_vikaraNa_pratyayas=array("ksa","caN","aN","sip","sya","tAs","cli","sic","ciR","u","yak",);
// ArdhadhAtuka prakrIrNa pratyayas.
$ArdhadhAtuka_remaining_pratyayas=array("Am","Ric","IyaN","yaN","san",);
// All ArdhadhAtuka_pratyayas
$ArdhadhAtuka_pratyayas=array("syati","syatas","syanti","syasi","syaTas","syaTa","syAmi","syAvas","syAmas","syat","syatAm","syan","syas","syatam","syata","syam","syAva","syAma","tA","tArO","tAras","tAsi","tAsTas","tAsTa","tAsmi","tAsvas","tAsmas","yAt","yAstAm","yAsus","yAs","yAstam","yAsta","yAsam","yAsva","yAsma","Ral","atus","us","Tal","aTus","a","Ral","va","ma","t","tAm","an","s","tam","ta","am","va","ma","sIt","sizwAm","sizus","sIs","sizwam","sizwa","sizam","sizva","sizma","at","atAm","an","as","atam","ata","am","Ava","Ama","at","atAm","an","as","atam","ata","am","Ava","Ama","sat","satAm","san","sas","satam","sata","sam","sAva","sAma","sIt","stAm","sus","sIs","stam","sta","sam","sva","sma","It","izwAm","izus","Is","izwam","izwa","izam","izva","izma","sati","satas","santi","sat","sad","san","sasi","sas","saTas","saTa","sami","sam","savas","sava","samas","sama","sAti","sAt","sAd","sAtas","sAnti","sAn","sAsi","sAs","sATas","sATa","sAmi","sAm","sAvas","sAva","sAmas","sAma","syate","syete","syante","syase","syeTe","syaDve","sye","syAvahe","syAmahe","syata","syetAm","syanta","syaTAs","syaeTAm","syaDvam","sye","syAvahi","syAmahi","tA","tArO","tAras","tAse","tAsATe","tADve","tAhe","tAsvahe","tAsmahe","sIzwa","sIyAstAm","sIran","sIzWAs","sIyAsTAm","sIDvam","sIya","sIvahi","sImahi","e","Ate","ire","se","ATe","Dve","e","vahe","mahe","ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","sata","sAtAm","santa","saTAs","sATAm","saDvam","si","sAvahi","sAmahi","sta","sAtAm","sata","sTAs","sATAm","Dvam","si","svahi","smahi","izwa","izAtAm","izata","izWAs","izATAm","iQvam","izi","izvahi","izmahi","sate","satE","sEte","sante","santE","sase","sasE","sETe","saDve","saDvE","se","sE","savahe","savahE","samahe","samahE","sAte","sAtE","sEte","sAnte","sAntE","sAse","sAsE","sETe","sADve","sADvE","se","sE","sAvahe","sAvahE","sAmahe","sAmahE","Rvul","vuY","Ryat","GaY","Rini","Ra","Ryuw","aR","KukaY","Rvi","Yyuw","Rvin","GinuR","ukaY","uR","Rac","inuR","iY","Rvuc","Ramul","KamuY","tavya","tavyat","anIyar","yat","tfc","lyu","ac","zvun","Takan","vun","wa","in","Kac","qa","KizRuc","viw","vic","manin","vanip","ini","Kyun","tfn","izRuc","yuc","zAkan","Aluc","ru","Gurac","u","Uk","ra","Aru","lukan","varac","qu","zwran","itra","tumun","ap","aTuc","nan","a","ani","lyuw","Ga","Kal","se","sen","ase","asen","aDyE","aDyEn","tavE","taven","tosun","tvan","atfn","kyap","ka","wak","kvin","kaY","kvip","kaY","kvanip","kta","ktavatu","Nvanip","kAnac","kvasu","gsnu","kmarac","kurac","kvarap","kin","ki","najiN","kuk","ktri","naN","ktin","aN","ktic","kse","kasen","kaDyE","kaDyEn","taveN","kamul","kasun","ken","kenya","ktvA","ksa","caN","aN","sip","sya","tAs","cli","sic","ciR","u","yak","Am","Ric","IyaN","yaN","san","ista","isAtAm","isata","isTAs","isATAm","iDvam","isDvam","isi","isvahi","ismahi","sDvam");
// ArdhadhAtuka seT pratyayas.
$ArdhadhAtuka_seT_pratyayas=array("Tal","va","ma","se","Dve","vahe","mahe","kvasu","kta","ktavatu","ktvA","tumun","tavya","tavyat","tfc","tfn","tAs","tavE","taven","tosun","tvan","taveN","sic","sIyuw","san","sya","kse","se","sen","sip",);
$ajAdi_kitGit_ArdhadhAtuka_pratyayas=array("atus","u");
$halAdi_kitGit_ArdhadhAtuka_pratyayas=array("ya");
$other_ArdhadhAtuka_pratyayas=array("Ri");
$kitGit_ArdhadhAtuka_pratyayas=array("atus","u","ya");
$vikaraNa_ArdhadhAtuka_pratyayas=array("u","ya");
$TitlakAra=array("law","liw","luw","lfw","ArDaDAtukalew","sArvaDAtukalew","low");
$GitlakAra=array("laN","viDiliN","ASIrliN","luN","lfN",);
/* Preprocessing of verbs */
/*$sanubandhaverb=array("zage!","zaGa!","za॒ca॑!","zaca॑!","zaca॒!","zawa!","zaRu॑!","zaRa!","zaRa!","zatwa॑!","zatwa!","za॒dx!","zadx!","za॒dx!","zadx!","za॒dx!","zadx!","za॒dx!","za॒dx!","za॒dx!","za॒nja!","zanba॑!","zanba!","zapa!","zama!","zama!","zarja!","zarba!","zarva!","zala!","zasa!","zasa!","zasja!","zasti!","zasti!","za॒ha॒!","zaha॒!","zaha!","zaha॑!","zaha!","zA॒Da!","zAntva॑!","zAntva!","zi॒ca॑!","zi॒Y","zi॒Y","ziwa!","ziDu!","zi॒Du!","ziDU!","ziDU!","zila!","zivu!","zu॒","zu॒","zu॒","zu॒","zu॒","zu॒Y","zutwa॑!","zutwa!","zura!","zura!","zuha!","zuha!","zU","zUN","zUN","zU॒N","zUN","zUda॒!","zUda!","zUda॑!","zUda!","zUrkza!","zUrkzya!","zUza!","zfDf॑!","zfnBu!","zfBu!","zebf॒!","zevf॒!","zevf॒!","zE॒","zo॒","zo","zkaBi॒!","zwIma!","zwuca॒!","zwuBu॒!","zwfkza!","zwyE॒","zwyE॒","zWA॒","zWivu!","zWivu!","zRE॒","ztaka!","ztana!","ztaBi॒!","ztama!","ztama!","ztiGa॒!","ztipf॒!","ztima!","ztIma!","ztuca॒!","ztu॒Y","ztuBu॒!","ztUpa॑!","ztUpa!","ztepf॒!","ztE॒","zTage!","zTala!","zTA॒","zTuqa!","znasu!","znA॒","zni॒ha!","zniha॑!","zniha!","znu","znu","znusa","znusu!","znu॒ha!","znE॒","zmi॒N","zvakka॒!","zvakva॒!","zvada॒!","zvada!","zvada!","zva॒nja॒!","zvazka॒!","zvi॒dA","Ra॑kza!॑","Ra॑Ka!॑","Ra॑Ki!॑","Ra॑wa!॑","Ra॑qa!॑","Ra॑da!॑","wuna॑di!॑","Ra॑Ba!॑","Ra॑Ba!॒","Ra॒ma!॑","Ra॑ya!॒","Ra॑la!॑","Ra॒Sa!॑","Ra॑sa!॒","Ra॒ha!॒॑","RA॑sf!॒","Ri॑si!॒","Ri॑kza!॑","Ri॒ji!॒॑r","Ri॑ji!॒","Ri॑df!॒॑","Ri॑di!॑","Ri॑vi!॑","Ri॑la!॑","Ri॑Sa!॑","Ri॑zu!॑","RI॒Y","RI॑la!॑","RI॑va!॑","RU॑","Ru॑","Ru॒da!॑","Ru॒da!॒॑","RU॑","a॑hi!॑","a॑hi!॒","a॑ki!॒","a॑gi!॑","a॑Gi!॒","a॑ci!॑","a॑ji!॑","a॑Wi!॒","a॑ti!॑","a॑di!॑","a॑bi!॒","a॑Bi!॒","A॑Ci!॑","i॑Ki!॑","i॑gi!॑","i॑di!॑","i॑vi!॑","I॑Ki!॑","I॑Ki!॑","I॑ji!॒","u॑Ki!॑","u॑Ci!॑","u॑Ci!॑","ka॑Wi!॑","u॑hi!॑r","f॑ji!॒","o!॑la॑qi!॑","ka॑si!॒","ka॑ki!॒","ka॑ci!॒","ka॑Wi!॒","ka॑Wi!॑","ka॑qi!॑","ka॑qi!॑","ka॑qi!॒","ka॑di!॑","ka॑di!॒","ka॑pi!॒","kA॑kzi!॑","kA॑ci!॒","ku॑Si!॑","ku॑si!॑","ku॑ji!॑","ku॑wi!॑","ku॑Wi!॑","ku॑Wi!॑","ku॑qi!॑","ku॑qi!॒","ku॑qi!॑","ku॑qi!॑","ku॑Ti!॑","ku॑dri!॑","ku॑bi!॑","ku॑bi!॑","ku॑Bi!॑","kf॑vi!॑","kra॑di!॑","kra॑di!॒","kla॑di!॑","kla॑di!॒","kli॑di!॒","kli॑di!॑","kza॑ji!॑","kza॑ji!॒","kza॑pi!॑","kzu॒di!॒॑r","Ka॑ji!॑","Ka॑qi!॑","Ka॑qi!॒","Ku॑qi!॑","ga॑ji!॑","ga॑qi!॑","ga॑qi!॑","gu॑ji!॑","gu॑Wi!॑","gu॑qi!॑","gf॑ji!॑","gra॑Ti!॒","Ga॑wi!॑","Gi॑Ri!॒","Gu॑zi!॒","Gu॑Ri!॒","Gu॑zi!॑r","Gu॑zi!॑r","Gf॑Ri!॒","ca॒kzi!॒N","ca॑qi!॒","ca॑qi!॑","ca॑di!॑","ca॑pi!॑","ci॑ti!॑","cu॑wi!॑","cu॑qi!॑","cu॑bi!॑","cu॑bi!॑","cyu॑ti!॑r","Ca॑ji!॑","Ca॑di!॑","Ci॒di!॒॑r","u!॑Cf॑di!॒॑r","ja॑si!॑","ja॑ji!॑","ja॑Bi!॑","ji!॒","ji॑vi!॑","ju॑gi!॑","jf॑Bi!॒","jyu॑ti!॑r","wa॑ki!॑","ta॑si!॑","ta॑si!॑","ta॑ki!॑","ta॑gi!॑","ta॑qi!॒","ta॑tri!॒","tu॑ji!॑","tu॑ji!॑","tu॑ji!॑","tu॑qi!॑","tu॑qi!॒","tu॑bi!॑","tu॑bi!॑","tu॑hi!॑r","u!॑tf॑di!॒॑r","tra॑si!॑","tra॑ki!॒","tra॑gi!॑","tra॑di!॑","tri॑Ki!॑","tva॑gi!॑","Ta॑ki!॑","da॑Si!॑","da॑Si!॒","da॑si!॑","da॑si!॒","da॑Gi!॑","di॑vi!॑","du॑hi!॑r","df॑hi!॑","df॒Si!॑r","drA॑kzi!॑","Da॑vi!॑","Di॑vi!॑","Df॑ji!॑","DmA॑kzi!॑","Dra॑ji!॑","DrA॑kzi!॑","Dva॑ji!॑","DvA॑kzi!॑","Ra॑Ki!॑","wuna॑di!॑","Ri॑si!॒","Ri॒ji!॒॑r","Ri॑ji!॒","Ri॑di!॑","Ri॑vi!॑","pa॑si!॑","pa॑si!॑","pa॑ci!॑","pa॑ci!॒","pa॑qi!॑","pa॑qi!॒","pa॑Ti!॑","pi॑si!॑","pi॑ji!॑","pi॑ji!॑","pi॑ji!॒","pi॑Wi!॑","pi॑qi!॑","pi॑qi!॒","pi॑vi!॑","pu॑wi!॑","pu॑qi!॑","pu॑Ti!॑","pf॑ji!॒","ba॑hi!॒","ba॑wi!॑","bi॑di!॑","bu॑gi!॑","bu॑Di!॒॑r","u!॑bu॑ndi!॒॑r","bf॑hi!॑","bf॑hi!॑","Ba॑ji!॑","Ba॑qi!॑","Ba॑qi!॒","Ba॑di!॒","Bi॒di!॒॑r","Bi॑di!॑","Bf॑Si!॑","ma॑hi!॑","ma॑hi!॒","ma॑ki!॒","ma॑Ki!॑","ma॑gi!॑","ma॑Gi!॒","ma॑Gi!॑","ma॑ci!॒","ma॑Wi!॒","ma॑qi!॒","ma॑qi!॑","ma॑qi!॑","ma॑tri!॒","ma॑Ti!॑","ma॑di!॒","mA॑kzi!॑","mi॑ji!॑","mi॑di!॑","mi॑vi!॑","mu॑Ki!॑","mu॑ji!॑","mu॑Wi!॒","mu॑qi!॑","mu॑qi!॒","mf॑qi!॑","ya॑tri!॑","yu॑gi!॑","yu॒ji!॒॑r","ra॑hi!॑","ra॑hi!॑","ra॑Ki!॑","ra॑gi!॑","ra॑Gi!॑","ra॑Gi!॒","ra॑vi!॑","ra॑Pi!॑","ra॑bi!॒","ra॑Bi!॒","ri॑Ki!॑","ri॑gi!॑","ri॒ci!॒॑r","ri॑vi!॑","ru॑Si!॑","ru॑si!॑","ru॑wi!॑","ru॑Wi!॑","ru॑Wi!॑","ru॑qi!॑","ru॑di!॑r","ru॒Di!॒॑r","la॑Ki!॑","la॑gi!॑","la॑Gi!॑","la॑Gi!॑","la॑Gi!॒","la॑Gi!॑","la॑ji!॑","la॑ji!॑","la॑ji!॑","la॑ji!॑","la॑qi!॑","o!॑la॑qi!॑","la॑bi!॒","la॑bi!॒","la॑Bi!॒","lA॑Ci!॑","lA॑ji!॑","li॑Ki!॑","li॑gi!॑","li॑gi!॑","li॑ji!॑","lu॑ji!॑","lu॑ji!॑","lu॑wi!॑","lu॑Wi!॑","lu॑Wi!॑","lu॑Wi!॑","lu॑qi!॑","lu॑Ti!॑","lu॑bi!॑","lu॑bi!॑","va॑ki!॒","va॑ki!॒","va॑Ki!॑","va॑gi!॑","va॑Gi!॒","va॑wi!॑","va॑wi!॑","va॑wi!॑","va॑Wi!॒","va॑qi!॑","va॑qi!॒","va॑di!॒","vA॑kzi!॑","vA॑Ci!॑","vi॒ci!॒॑r","vi॒ji!॒॑r","vu॑gi!॑","bf॑hi!॑","bf॑hi!॑","vf॑ji!॒","vra॑ji!॑","Sa॑ki!॒","Sa॑qi!॒","Si॑Ki!॑","Si॑Gi!॑","Si॑ji!॒","I!॑Su॑ci!॒॑r","Su॑Wi!॑","Su॑Wi!॑","Su॑Wi!॑","Scu॑ti!॑r","Scyu॑ti!॑r","Sra॑ki!॒","Sra॑gi!॑","Sra॑Ti!॒","Sla॑ki!॒","Sla॑gi!॑","Sva॑ki!॒","Sra॑gi!॑","Sva॑ci!॒","Sva॑Wi!॑","Svi॑di!॒","za॑sti!॑","zi॑vi!॑","ska॒ndi!॑r","ska॑Bi!॒","sku॑di!॒","zwa॑Bi!॒","spa॑di!॒","sPu॑wi!॑r","sPu॑wi!॑","sPu॑wi!॑","sPu॑qi!॑","sPu॑qi!॒","sra॑ki!॒","zva॑ki!॒","Sra॑gi!॑","hi॑si!॑","hi॑si!॑","hi॑qi!॒","hi॑vi!॑","hu॑qi!॒","hu॑qi!॒","u॑rda!॒","u॑rvI!॑","ku॑rda!","gu॑rda!॑","gu॑rvI!॑","du॑rvI!॑","Du॑rvI!॑","pu॑rva!॑","pu॑rva!॑","mu॑rCA!॑","mu॑rvI!॑","sPu॑rCA!॑","hu॑rCA!॑");
$sanubandhaverb=  array_unique($sanubandhaverb);
$sanubandhaverb=  array_values($sanubandhaverb);
$sanubandhaverb=array_map('trim',$sanubandhaverb);
$noaccentsanubandha=array_map('removeaccent',$sanubandhaverb);
$noaccentsanubandhaslp=array_map('trim',$noaccentsanubandha);
$noaccentwithoutanusvar=array_map('removeanusvar',$noaccentsanubandhaslp);
$noaccentniranubandhaslp=array_map('verbprocess',$noaccentsanubandhaslp);*/
// Verb pada by sUtra number database
$verb_sutra_pada=array("1.3.13:A","1.3.15:p","1.3.16:p","1.3.14:A","1.3.20:A","1.3.23:A","vA903:A","1.3.24:A","1.3.25:A","1.3.26:A","1.3.31:A","1.3.79:p","1.3.32:A","1.3.33:A","1.3.34:A","1.3.35:A","1.3.37:A","1.3.36:A","1.3.43:u","1.3.39:A","1.3.40:A","1.3.41:A","1.3.42:A","1.3.44:A","1.3.45:A","1.3.46:A","1.3.47:A","1.3.50:u","1.3.49:A","1.3.52:A","1.3.53:A","1.3.54:A","1.3.55:A","1.3.56:A","1.3.58:p","1.3.59:p","1.3.57:A","1.3.60:A","1.3.61:p","1.3.65:A","1.3.66:A","1.3.68:A","1.3.69:A","1.3.70:A","1.3.71:A","1.3.18:A","1.3.19:A","1.3.21:A","1.3.22:A","1.3.27:A","1.3.28:A","1.3.29:A","1.3.30:A","1.3.51:A","1.3.57:A","1.3.83:p","1.3.84:p","1.3.74:u","1.3.91:u","1.3.92:u","1.3.93:u","1.3.12:A","1.3.73:u","1.3.75:u","1.3.76:u","1.3.80:p","1.3.81:p","1.3.82:p","1.3.86:p","1.3.89:A","1.3.90:u","1.3.87:p","1.3.72:u","1.3.38:u","AkusmAd:A","AgarvAd:A","1.3.21-7:u","uBayapadI:u","AtmanepadI:A","parasmEpadI:p","vA 903:A","1.3.29-2:A","3.1.90:u","1.3.78:p","vA 49:A","Aya:p");
/* changing the pada of verb in case of upasargas */
$toatmane=array("niviSa!","parikrIY","vikrIY","avakrIY","viji","parAji","AkrIqf!","anukrIqf!","samkrIqf!","parikrIqf!","samsTA","avasTA","prasTA","visTA","udtapa!","vitapa!","Ayama!","Ahana!","samgamx!","samfcCa!","sampracCa!","samsvf","samf","samzru","nihveY","samhveY","upahveY","vihveY","avagf","jijYA","SuSru","susmf","didfSir",);
$sutraenglish=array("nerviSaH (1.3.17)","parivyavebhyaH kriyaH (1.3.18)","parivyavebhyaH kriyaH (1.3.18)","parivyavebhyaH kriyaH (1.3.18)","viparAbhyAM jeH (1.3.19)","viparAbhyAM jeH (1.3.19)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","udvibhyAM tapaH (1.3.27)","udvibhyAM tapaH (1.3.27)","AGo yamahanaH (1.3.28)","AGo yamahanaH (1.3.28)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","avAdgraH (1.3.51)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)",);
$sutradeva=array("नेर्विशः (१.३.१७)","परिव्यवेभ्यः क्रियः (१.३.१८)","परिव्यवेभ्यः क्रियः (१.३.१८)","परिव्यवेभ्यः क्रियः (१.३.१८)","विपराभ्यां जेः (१.३.१९)","विपराभ्यां जेः (१.३.१९)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","उद्विभ्यां तपः (१.३.२७)","उद्विभ्यां तपः (१.३.२७)","आङो यमहनः (१.३.२८)","आङो यमहनः (१.३.२८)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","अवाद्ग्रः (१.३.५१)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)",);
$lakAralist=array("la!w","li!w","lu!w","lf!w","le!w","lo!w","la!N","li!N","lu!N","lf!N");
$ayavayavah = array("ay","av","Ay","Av");
// defining IAST letters.
$iast = array("a","ā","i","ī","u","ū","ṛ","ṝ","ḷ","ḹ","e","ai","o","au","ṃ","ḥ","kh","ch","ṭh","th","ph","gh","jh","ḍh","dh","bh","ṅ","ñ","ṇ","k","c","ṭ","t","p","g","j","ḍ","d","b","n","m","y","r","l","v","s","h","ś","ṣ","ṃ");
// defining SLP1 letters.
$slp = array("a","A","i","I","u","U","f","F","x","X","e","E", "o","O", "M","H","K", "C",  "W", "T", "P","G", "J",  "Q", "D","B", "N","Y","R","k","c","w","t","p","g","j","q","d","b","n","m","y","r","l","v","s","h","S","z","!");
/* Function to find Asya and prayatna of a given letter */
// asyaprayatna.php removed and subsumed in this function.
function asyaprayatna($text)
{
	global $kantha, $talu, $murdha, $danta, $oshtha, $nasika, $kanthatalu, $kanthoshtha, $dantoshtha, $sprushta, $ishatsprushta, $vivruta, $samvruta, $aghosha, $vivara, $shvasa, $alpaprana, $ghosha, $samvara, $nada, $mahaprana, $ac;
	$i=0;
	if (in_array($text,$kantha)) { $sthana[$i] = "kantha"; $i++; }
	if (in_array($text,$talu)) { $sthana[$i] =  "talu"; $i++; }
	if (in_array($text,$murdha)) { $sthana[$i] = "murdha"; $i++; }
	if (in_array($text,$danta)) { $sthana[$i] = "danta"; $i++; }
	if (in_array($text,$oshtha)) { $sthana[$i] = "oshtha"; $i++; }
	if (in_array($text,$nasika)) { $sthana[$i] = "nasika"; $i++; }
	if (in_array($text,$kanthatalu)) { $sthana[$i] = "kanthatalu(kantha,talu)"; $i++; }
	if (in_array($text,$kanthoshtha)) { $sthana[$i] = "kanthoshtha(kantha,oshtha)"; $i++;}
	if (in_array($text,$dantoshtha)) { $sthana[$i] = "dantooshtha(danta,oshtha)"; $i++; }
	$j=0;
	if (in_array($text,$sprushta)) { $abhyantara[$j] = "sprushta"; $j++; }
	if (in_array($text,$ishatsprushta)) { $abhyantara[$j] = "ishatsprushta"; $j++; }
	if (in_array($text,$vivruta)) { $abhyantara[$j] = "vivruta"; $j++; }
	if (in_array($text,$samvruta)) { $abhyantara[$j] = "samvruta"; $j++; }
	$k=0;
	if (in_array($text,$aghosha)) { $bahya[$k] = "aghosha"; $k++; }
	if (in_array($text,$vivara)) { $bahya[$k] = "vivAra"; $k++; }
	if (in_array($text,$shvasa)) { $bahya[$k] = "shvasa"; $k++; }
	if (in_array($text,$alpaprana)) { $bahya[$k] = "alpaprana"; $k++; }
	if (in_array($text,$ghosha)) { $bahya[$k] = "ghosha"; $k++; }
	if (in_array($text,$samvara)) { $bahya[$k] = "samvara"; $k++; }
	if (in_array($text,$nada)) { $bahya[$k] = "nada"; $k++; }
	if (in_array($text,$mahaprana)) { $bahya[$k] = "mahaprana"; $k++; }
	if (in_array($text,$ac)) { $bahya[$k] = "udatta"; $k++; }
	if (in_array($text,$ac)) { $bahya[$k] = "anuudatta"; $k++; }
	if (in_array($text,$ac)) { $bahya[$k] = "svarita"; $k++; }
	$output = array($sthana,$abhyantara,$bahya);
	$a = "The sthana is: ".implode(",",$sthana).".</br>\n"."The abhyantara prayatna is: ".implode(",",$abhyantara).".</br>\n"."The bahya prayatna is: ".implode(",",$bahya);
	echo $a;
}
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
    global $text, $debug, $debugmode; // taking $text from the subanta.php or sandhi.php and using it here.
	if ($debug===1 && $debugmode<2){
	echo "one started at ";
	timestamp();}
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
    global $text, $debug, $debugmode;
	if ($debug===1 && $debugmode<2){
	echo "two started at ";
	timestamp();}
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
{
	global $text, $debug, $debugmode;
	if ($debug===1 && $debugmode<2){
	echo "three started at ";
	timestamp();}
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
	if ($debug===1 && $debugmode<2){
	echo "three ended at ";
	timestamp();}
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
    global $text; global $upasarga_joined; global $us; // bringing $text from main php function.
    /* removal of two ++ signs */
    $text = one(array("++"),array("+"),0);
    if ($n === 1) // sending special messages.
        {
        echo "<p class = hn>Please note: Wherever there is dvitva, it is optionally negated by sarvatra zAkalyasya. (".link_sutra("8.4.51").")</p>\n";
        echo "<p class = hn>द्वित्व का सर्वत्र सर्वत्र शाकल्यस्य (८.४.५१) से पाक्षिक निषेध होता है ।</p>\n";
        }
    if ($n === 2)
        {
        global $text1; $text2 = $text; $text = $text1;
        }
    if ($n === 3)
        {
        echo "<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (".link_sutra("2.4.13").") and aGgasya (".link_sutra("6.4.1").") </p>\n";
        echo "<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३) तथा अङ्गस्य (६.४.१) </p>\n";
        }
    if ($n === 4)
        {
        echo "<p class = hn>N.B.: yaNaH pratiSedho vAcyaH (vA 4806) prevents application of saMyogAntasya lopaH (".link_sutra("8.2.23").") </p>\n";
        echo "<p class = hn>यणः प्रतिषेधो वाच्यः (वा ४८०६) से संयोगान्तस्य लोपः (८.२.२३) का निषेध होता है ।</p>\n";
        }
    if ($n === 5)
        {
        echo "<p class = hn>N.B.: anekAlzitsarvasya (".link_sutra("1.1.55").") mandates sarvAdeza.  </p>\n";
        echo "<p class = hn>अनेकाल्शित्सर्वस्य (१.१.५५) से सर्वादेश होता है ।</p>\n";
        }
    if ($n === 6)
        {
        echo "<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (".link_sutra("2.4.13").") aGgasya (".link_sutra("6.4.1").") and bhasya (".link_sutra("6.4.129").") :</p>\n";
        echo "<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३), अङ्गस्य (६.४.१) तथा भस्य (६.४.१२९) :</p>\n";
        }
    if ($n === 7)
        {
        echo "<p class = pa>padasya (".link_sutra("8.1.16")."), padAt (".link_sutra("8.1.17").") and anudAttaM sarvamapAdAdau (".link_sutra("8.1.18").") :</p>\n";
        echo "<p class = pa>पदस्य (८.१.१६), पदात्‌ (८.१.१७) तथा अनुदात्तं सर्वमपादादौ (८.१.१८) :</p>\n";
        }
    if ($n === 8)
        {
        echo "<p class = pa>anupasarjanAt (".link_sutra("4.1.14").") :</p>\n";
        echo "<p class = pa>अनुपसर्जनात्‌ (४.१.१४) :</p>\n";
        }
    for($i=1;$i<count($text)+1;$i++) // for all members of the $text array
    {
        if (($us==="" && $type==="tiGanta") || $type!=="tiGanta")
        {
        echo "<p class = form>$i - ".convert($text[$i-1])."</p>\n"; // showing the output to the browser. e.g. 1. rAmaH. $i is for numbering. function convert converts the output into devanAgarI.
        }
        elseif ($us!=="" && $type==="tiGanta")
        {
        echo "<p class = form>$i - ".convert($us."+".$text[$i-1])."</p>\n"; // showing the output to the browser. e.g. 1. rAmaH. $i is for numbering. function convert converts the output into devanAgarI.
        }
    }
    if ($n === 2) { $text1 = $text; $text = $text2; } // not useful because the display(2) is not used in the code. If it is used, this will work.
}
/* function display2 is specially designed to try with gui function. */
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
function display2($text,$n,$us='')
{
    global $upasarga_joined, $debug, $debugmode; // bringing $text from main php function.
	foreach ($text as $val) { $out[] = str_replace("++","+",$val);}
	$text = $out;
    if ($n === 1) // sending special messages.
        {
        echo "<p class = hn>Please note: Wherever there is dvitva, it is optionally negated by sarvatra zAkalyasya. (".link_sutra("8.4.51").")</p>\n";
        echo "<p class = hn>द्वित्व का सर्वत्र सर्वत्र शाकल्यस्य (८.४.५१) से पाक्षिक निषेध होता है ।</p>\n";
        }
    if ($n === 2)
        {
        global $text1; $text2 = $text; $text = $text1;
        }
    if ($n === 3)
        {
        echo "<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (".link_sutra("2.4.13").") and aGgasya (".link_sutra("6.4.1").") </p>\n";
        echo "<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३) तथा अङ्गस्य (६.४.१) </p>\n";
        }
    if ($n === 4)
        {
        echo "<p class = hn>N.B.: yaNaH pratiSedho vAcyaH (vA 4806) prevents application of saMyogAntasya lopaH (".link_sutra("8.2.23").") </p>\n";
        echo "<p class = hn>यणः प्रतिषेधो वाच्यः (वा ४८०६) से संयोगान्तस्य लोपः (८.२.२३) का निषेध होता है ।</p>\n";
        }
    if ($n === 5)
        {
        echo "<p class = hn>N.B.: anekAlzitsarvasya (".link_sutra("1.1.55").") mandates sarvAdeza.  </p>\n";
        echo "<p class = hn>अनेकाल्शित्सर्वस्य (१.१.५५) से सर्वादेश होता है ।</p>\n";
        }
    if ($n === 6)
        {
        echo "<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (".link_sutra("2.4.13").") aGgasya (".link_sutra("6.4.1").") and bhasya (".link_sutra("6.4.129").") :</p>\n";
        echo "<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३), अङ्गस्य (६.४.१) तथा भस्य (६.४.१२९) :</p>\n";
        }
    if ($n === 7)
        {
        echo "<p class = pa>padasya (".link_sutra("8.1.16")."), padAt (".link_sutra("8.1.17").") and anudAttaM sarvamapAdAdau (".link_sutra("8.1.18").") :</p>\n";
        echo "<p class = pa>पदस्य (८.१.१६), पदात्‌ (८.१.१७) तथा अनुदात्तं सर्वमपादादौ (८.१.१८) :</p>\n";
        }
    if ($n === 8)
        {
        echo "<p class = pa>anupasarjanAt (".link_sutra("4.1.14").") :</p>\n";
        echo "<p class = pa>अनुपसर्जनात्‌ (४.१.१४) :</p>\n";
        }
	if ($debug===1 && $debugmode<2){ dibug('DISPLAY2 NOTES PRINT END');}
    for($i=1;$i<count($text)+1;$i++) // for all members of the $text array
    {
        echo "<p class = form>$i - ".convert(trim($us."+".$text[$i-1],'+'))."</p>\n"; // showing the output to the browser. e.g. 1. rAmaH. $i is for numbering. function convert converts the output into devanAgarI.
    }
	if ($debug===1 && $debugmode<2){ dibug('DISPLAY2 ACTUAL PRINT END');}
    if ($n === 2) { $text1 = $text; $text = $text2; } // not useful because the display(2) is not used in the code. If it is used, this will work.
}
/* function display3 is specially designed to try with gui function. */
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
function display3($text,$n,$us='')
{
    global $upasarga_joined, $debug, $debugmode; // bringing $text from main php function.
	$htmloutput = '';
	foreach ($text as $val) { $out[] = str_replace("++","+",$val);}
	$text = $out;
    if ($n === 1) // sending special messages.
        {
        $htmloutput=$htmloutput."<p class = hn>Please note: Wherever there is dvitva, it is optionally negated by sarvatra zAkalyasya. (".link_sutra("8.4.51").")</p>\n";
        $htmloutput=$htmloutput."<p class = hn>द्वित्व का सर्वत्र सर्वत्र शाकल्यस्य (८.४.५१) से पाक्षिक निषेध होता है ।</p>\n";
        }
    if ($n === 2)
        {
        global $text1; $text2 = $text; $text = $text1;
        }
    if ($n === 3)
        {
        $htmloutput=$htmloutput."<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (".link_sutra("2.4.13").") and aGgasya (".link_sutra("6.4.1").") </p>\n";
        $htmloutput=$htmloutput."<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३) तथा अङ्गस्य (६.४.१) </p>\n";
        }
    if ($n === 4)
        {
        $htmloutput=$htmloutput."<p class = hn>N.B.: yaNaH pratiSedho vAcyaH (vA 4806) prevents application of saMyogAntasya lopaH (".link_sutra("8.2.23").") </p>\n";
        $htmloutput=$htmloutput."<p class = hn>यणः प्रतिषेधो वाच्यः (वा ४८०६) से संयोगान्तस्य लोपः (८.२.२३) का निषेध होता है ।</p>\n";
        }
    if ($n === 5)
        {
        $htmloutput=$htmloutput."<p class = hn>N.B.: anekAlzitsarvasya (".link_sutra("1.1.55").") mandates sarvAdeza.  </p>\n";
        $htmloutput=$htmloutput."<p class = hn>अनेकाल्शित्सर्वस्य (१.१.५५) से सर्वादेश होता है ।</p>\n";
        }
    if ($n === 6)
        {
        $htmloutput=$htmloutput."<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (".link_sutra("2.4.13").") aGgasya (".link_sutra("6.4.1").") and bhasya (".link_sutra("6.4.129").") :</p>\n";
        $htmloutput=$htmloutput."<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३), अङ्गस्य (६.४.१) तथा भस्य (६.४.१२९) :</p>\n";
        }
    if ($n === 7)
        {
        $htmloutput=$htmloutput."<p class = pa>padasya (".link_sutra("8.1.16")."), padAt (".link_sutra("8.1.17").") and anudAttaM sarvamapAdAdau (".link_sutra("8.1.18").") :</p>\n";
        $htmloutput=$htmloutput."<p class = pa>पदस्य (८.१.१६), पदात्‌ (८.१.१७) तथा अनुदात्तं सर्वमपादादौ (८.१.१८) :</p>\n";
        }
    if ($n === 8)
        {
        $htmloutput=$htmloutput."<p class = pa>anupasarjanAt (".link_sutra("4.1.14").") :</p>\n";
        $htmloutput=$htmloutput."<p class = pa>अनुपसर्जनात्‌ (४.१.१४) :</p>\n";
        }
	if ($debug===1 && $debugmode<2){ dibug('DISPLAY3 NOTES PRINT END');}
    for($i=1;$i<count($text)+1;$i++) // for all members of the $text array
    {
        $htmloutput=$htmloutput."<p class = form>$i - ".convert(trim($us."+".$text[$i-1],'+'))."</p>\n"; // showing the output to the browser. e.g. 1. rAmaH. $i is for numbering. function convert converts the output into devanAgarI.
    }
	if ($debug===1 && $debugmode<2){ dibug('DISPLAY3 ACTUAL PRINT END');}
    if ($n === 2) { $text1 = $text; $text = $text2; } // not useful because the display(2) is not used in the code. If it is used, this will work.
	return $htmloutput;
}
/* function print2 is specially designed to try with gui function. */
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
function print2($text,$n)
{
    global $upasarga_joined, $outfile; global $us; global $outfile;// bringing $text from main php function.
	foreach ($text as $val) { $out[] = str_replace("++","+",$val);}
	$text = $out;
    if ($n === 1) // sending special messages.
        {
        fputs($outfile,"<p class = hn>Please note: Wherever there is dvitva, it is optionally negated by sarvatra zAkalyasya. (".link_sutra("8.4.51").")</p>\n");
        fputs($outfile,"<p class = hn>द्वित्व का सर्वत्र सर्वत्र शाकल्यस्य (८.४.५१) से पाक्षिक निषेध होता है ।</p>\n");
        }
    if ($n === 2)
        {
        global $text1; $text2 = $text; $text = $text1;
        }
    if ($n === 3)
        {
        fputs($outfile,"<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (".link_sutra("2.4.13").") and aGgasya (".link_sutra("6.4.1").") </p>\n");
        fputs($outfile,"<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३) तथा अङ्गस्य (६.४.१) </p>\n");
        }
    if ($n === 4)
        {
        fputs($outfile,"<p class = hn>N.B.: yaNaH pratiSedho vAcyaH (vA 4806) prevents application of saMyogAntasya lopaH (".link_sutra("8.2.23").") </p>\n");
        fputs($outfile,"<p class = hn>यणः प्रतिषेधो वाच्यः (वा ४८०६) से संयोगान्तस्य लोपः (८.२.२३) का निषेध होता है ।</p>\n");
        }
    if ($n === 5)
        {
        fputs($outfile,"<p class = hn>N.B.: anekAlzitsarvasya (".link_sutra("1.1.55").") mandates sarvAdeza.  </p>\n");
        fputs($outfile,"<p class = hn>अनेकाल्शित्सर्वस्य (१.१.५५) से सर्वादेश होता है ।</p>\n");
        }
    if ($n === 6)
        {
        fputs($outfile,"<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (".link_sutra("2.4.13").") aGgasya (".link_sutra("6.4.1").") and bhasya (".link_sutra("6.4.129").") :</p>\n");
        fputs($outfile,"<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३), अङ्गस्य (६.४.१) तथा भस्य (६.४.१२९) :</p>\n");
        }
    if ($n === 7)
        {
        fputs($outfile,"<p class = pa>padasya (".link_sutra("8.1.16")."), padAt (".link_sutra("8.1.17").") and anudAttaM sarvamapAdAdau (".link_sutra("8.1.18").") :</p>\n");
        fputs($outfile,"<p class = pa>पदस्य (८.१.१६), पदात्‌ (८.१.१७) तथा अनुदात्तं सर्वमपादादौ (८.१.१८) :</p>\n");
        }
    if ($n === 8)
        {
        fputs($outfile,"<p class = pa>anupasarjanAt (".link_sutra("4.1.14").") :</p>\n");
        fputs($outfile,"<p class = pa>अनुपसर्जनात्‌ (४.१.१४) :</p>\n");
        }
    for($i=1;$i<count($text)+1;$i++) // for all members of the $text array
    {
        if ($upasarga_joined===1 || $us==="")
        {
        fputs($outfile,"<p class = form>$i - ".convert($text[$i-1])."</p>\n"); // showing the output to the browser. e.g. 1. rAmaH. $i is for numbering. function convert converts the output into devanAgarI.
        }
        elseif ($upasarga_joined===0)
        {
        fputs($outfile,"<p class = form>$i - ".convert($us."+".$text[$i-1])."</p>\n"); // showing the output to the browser. e.g. 1. rAmaH. $i is for numbering. function convert converts the output into devanAgarI.
        }
    }
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
     global $text, $debug, $debugmode;
	if ($debug===1 && $debugmode<2){
	echo "sub ", $repeat, " started at ";
	timestamp();}
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
	$output = array();
	foreach($text as $value)
	{
		foreach($needle as $need)
		{
			if (strpos($value,$need)!==false)
			{
				$can=1;
				break;
			}
		}
	}
    /*** map with preg_quote ***/
    //$needle = array_map('preg_quote', $needle);
    /*** loop of the array to get the search pattern ***/
    /*global $first;
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
    }*/
	if ($debug===1 && $debugmode<2){
	echo "sub ", $repeat, " ended at ";
	timestamp();}
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
	global $debug, $debugmode;
	if ($debug===1 && $debugmode<2){
	echo "arr started at ";
	timestamp();}
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
	if ($debug===1 && $debugmode<2){
	echo "arr ended at ";
	timestamp();}
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
	global $debug, $debugmode;
	if ($debug===1 && $debugmode<2){
	echo "ends ", $n, " started at ";
	timestamp();}
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
					$prat=array(0);
                    foreach ($pattern as $one)
                    {
                        foreach ($pattern as $two)
                        {
                            if (strpos($aa,$one)===0 && strpos($aa,$two.$bb)!==false && strpos(strrev($aa),strrev($bb))===0 )
                            {
                                $prat[]=1;
								break;
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
	if ($debug===1 && $debugmode<2){
	echo "ends ", $n, " ended at ";
	timestamp();}
    if (isset($can) && in_array(1,$can))
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
function samprasarana($input,$merge)
{
    global $text; global $ac; global $storedata, $lakAra, $sanAdi;
    $yan = array("ya","va","ra","la");
    $yanik = array("ia","ua","fa","xa"); // list of samprasAraNa for yaN.
    foreach ($input as $value)
    {
        $val1[]=str_replace($yan,$yanik,$value);
    }
	if ($merge===0)
	{
		$text = one($input,$val1,0);        // doing samprasARaNa.
	}
	if ($merge===1)
	{
		$text = one($input,$val1,1);        // doing samprasARaNa.
	}
	storedata('1.1.45','sa',0);
	if (arr($text,'/[iufx][aAiIuUfFxXeEoO]/'))
	{
		$text = change('/([iufx])([aAiIuUfFxXeEoO])/','$1');
		storedata('6.1.108','sa',0);
	}
	if ( (arr($text,'/^i[+]ij/')||arr($text,'/^u[+]u[cpdhSs]/')) )
	{
		$text = one(array("u+uc","i+ij","u+up","u+ud","u+uh","u+uS","u+us"),array("Uc","Ij","Up","Ud","Uh","US","Us"),0);
		storedata('6.1.101','sa',0);
	}
	if(arr($text,'/^ji[+]['.pc(hl).']/') && $lakAra!=="liw")
	{
		$text=change('/^ji[+]/','jI+');
		storedata('6.4.2','sa',0);
	}
	/* halaH (6.4.2) */
	if(arr($text,'/['.pc(hl).'][iufx][+]/') && $sanAdi==="yaNluk")
	{
		$text=change('/(['.pc(hl).'])[i][+]/','$1I+');
		$text=change('/(['.pc(hl).'])[u][+]/','$1U+');
		$text=change('/(['.pc(hl).'])[f][+]/','$1ar+');
		$text=change('/(['.pc(hl).'])[x][+]/','$1al+');
		storedata('6.4.2','sa',0);
	}
	return $text;
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
    global $text; global $first; global $pada; global $itprakriti; global $wa1; global $sarva2; global $purva; global $taddhita; global $sarva; global $sup; global $so; global $al; global $hl; global $storedata;
    /* AdirGiTuDavaH (1.3.5) */
    if ((substr($first,0,2) === "Yi" || substr($first,0,2) === "wu" || substr($first,0,2) === "qu") && $pada=== "pratyaya")
    {
        if(substr($first,0,2) === "Yi") { $itprakriti = array_merge($itprakriti,array("Yi")); }
        if(substr($first,0,2) === "wu") { $itprakriti = array_merge($itprakriti,array("wu")); }
        if(substr($first,0,2) === "qu") { $itprakriti = array_merge($itprakriti,array("qu")); }
		storedata('1.3.5','pa',0);
        $text = first(array("Yi","wu","qu"),array("","",""),0); // function first removes and replaces specific strings from the words. For details see function.php.
		storedata('1.3.9','sa',0);
    }
    /* cuTU (1.3.7) */
    if (arr($text,'/[+][cCjJYwWqQR]/') )
    {
		storedata('1.3.7','pa',0);
        $text = two(array("+"),array("c","C","j","J","Y","w","W","q","Q","R"),array("+"),blank(10),0);
        $text = last(array("jas","wA",),array("as","A"),0);
		storedata('1.3.9','sa',0);
    }
    /* SaH pratyayasya (1.3.6) */
    if (arr($text,'/[+][z]/') && $pada=== "pratyaya" && !preg_match('/^z/',$fo))
    {
        it('/([+][z])/');
		storedata('1.3.6','pa',0);
        $text = two(array("+"),array("z"),array("+"),array(""),0);
		storedata('1.3.9','sa',0);
    }
    /* lazakvataddhite (1.3.8) */
    if (((arr($text,'/[+][lSkKgGN]/'))||$sarva2===1||$purva===1) && $taddhita === 0 )
    {
        it('/([+][lSkKgGN])/');
		storedata('1.3.8','pa',0);
        $text = two(array("+"),array("l","S","k","K","g","G","N"),array("+"),array("","","","","","",""),0);
		storedata('1.3.9','sa',0);
    }
    if (arr($text,'/['.flat($ac).'][!]/')  )
    {
        it('/(['.flat($ac).'][!])/');
		storedata('1.3.2','pa',0);
        $text = two($ac,array("!"),blank(count($ac)),array(""),0);
		storedata('1.3.9','sa',0);
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
// Ref nos. 0=upadeza, 1=Meaning, 2=verb without anubandhas, 3=verbset, 4=number in dhatupatha, 5=Atmane/parasmai/ubhaya, 6=seT/aniT. 7. verb with accent. 8. mAdhavIyadhAtuvRtti. 9. kSIrataraGgiNI. 10. dhAtupradIpa. 11.UoHyd. 12. JNU. 13.Set+number. 14. Set name.
// 0 to 12 are in the array. after that we process.
function scrape($a,$a1,$b,$c,$d,$e,$e1)
{
    global $verbdata;
	$verbdata1 = array_filter($verbdata, function($var) use ($a) { return preg_match("/$a/i", $var); });
	$verbdata1 = array_unique($verbdata1);
	$verbdata1 = array_values($verbdata1);
    for($i=0;$i<count($verbdata1);$i++)
    {
        $bomb=explode(':',$verbdata1[$i]);
        $bomb[13]=$bomb[3].".".$bomb[4];
        $bomb[14]=str_replace(array("01","02","03","04","05","06","07","08","09","10",),array("BvAdi","adAdi","juhotyAdi","divAdi","svAdi","tudAdi","ruDAdi","tanAdi","kryAdi","curAdi",),$bomb[3]);
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
/* verbdata1 creates one variable for the given verb number */
function verbdata1($number)
{
	global $verbdata;
	$parts = explode('.',$number);
	$gana = $parts[0];
	$id = $parts[1];
	$output = array();
	foreach($verbdata as $value)
	{
		if (strpos($value,$gana.":".$id)>0)
		{
			$output[] = $value;
		}
	}
	#$verbdata1 = array_filter($verbdata, function($var) use ($number) { 	list($gana,$id) = explode('.',$number); return preg_match("/$gana:$id/i", $var); });
	return $output;
}
/* verbdata2 creates one variable for the given verb text */
function verbdata2($text)
{
	global $verbdata;
	$verbdata1 = array_filter($verbdata, function($var) use ($text) { 	list($gana,$id) = explode('.',$number); return preg_match("/$text/i", $var); });
	return $verbdata2;
}
/* Creating a function to fetch data from the verbdata variable */
// The function is almost ready. Now rename the variables so that it can be used.
// $a = the input to take as base, $a1 = ref number of $a, $b = the thing to search. $c 1=whole list, 2=corresponding list. $d=additional field to be displayed, $e=additional condition, $e1= its ref no.
// Ref nos. 0=upadeza, 1=Meaning, 2=verb without anubandhas, 3=verbset, 4=number in dhatupatha, 5=Atmane/parasmai/ubhaya, 6=seT/aniT. 7. verb with accent  8. mAdhavIyadhAtuvRtti. 9. kSIrataraGgiNI. 10. dhAtupradIpa. 11.UoHyd. 12.JNU. 13.Set+number. 14. Set name.
// 0 to 12 are in the array. after that we process.
function scrape1($a,$a1,$b,$c)
{
    global $debug, $debugmode, $verbdata, $verbdata2;
	if ($debug===1 && $debugmode<2){ dibug("scrape1 start");}
	if (!isset($verbdata2))
	{
		$verbdata2 = array_filter($verbdata, function($var) use ($a) { return preg_match("/$a/i", $var); });
	}
	if ($debug===1 && $debugmode<2){ dibug("scrape1 middle");}
	$verbdata2 = array_unique($verbdata2);
	$verbdata2 = array_values($verbdata2);
    for($i=0;$i<count($verbdata2);$i++)
    {
		$bomb=explode(':',$verbdata2[$i]);
		$bomb[13]=$bomb[3].".".$bomb[4];
		$bomb[14]=str_replace(array("01","02","03","04","05","06","07","08","09","10",),array("BvAdi","adAdi","juhotyAdi","divAdi","svAdi","tudAdi","ruDAdi","tanAdi","kryAdi","curAdi",),$bomb[3]);
			if($a===$bomb[$a1] )
			{
				$ret[]=$bomb[$b];
			}
    }
    if (isset($ret)) {$ret=array_map('trim',$ret);}
	if ($debug===1 && $debugmode<2){ dibug("scrape1 end");}
    return $ret;
}
/* Creating a function to fetch data from the verbdata variable */
// $a = the input to take as base, $a1 = ref number of $a, $b = the thing to search. $c 1=whole list, 2=corresponding list. $d=additional field to be displayed, $e=additional condition, $e1= its ref no.
// Ref nos. 0=upadeza, 1=Meaning, 2=verb without anubandhas, 3=verbset, 4=number in dhatupatha, 5=Atmane/parasmai/ubhaya, 6=seT/aniT. 7. verb with accent  8. mAdhavIyadhAtuvRtti. 9. kSIrataraGgiNI. 10. dhAtupradIpa. 11.UoHyd. 12.JNU. 13.Set+number. 14. Set name.
// 0 to 12 are in the array. after that we process.
function scrape2($a,$a1,$b,$c)
{
    global $verbdata1, $debug, $debugmode;
	if ($debug===1 && $debugmode<2){ dibug("scrape2 start");}
	$verbdata1 = array_unique($verbdata1);
	$verbdata1 = array_values($verbdata1);
    for($i=0;$i<count($verbdata1);$i++)
    {
		$bomb=explode(':',$verbdata1[$i]);
		$bomb[13]=$bomb[3].".".$bomb[4];
		$bomb[14]=str_replace(array("01","02","03","04","05","06","07","08","09","10",),array("BvAdi","adAdi","juhotyAdi","divAdi","svAdi","tudAdi","ruDAdi","tanAdi","kryAdi","curAdi",),$bomb[3]);
			if($a===$bomb[$a1] )
			{
				$ret[]=$bomb[$b];
			}
    }
    if (isset($ret)) {$ret=array_map('trim',$ret);}
	if ($debug===1 && $debugmode<2){ dibug("scrape2 end");}
    return $ret;
}
// function ldc (link_dhatu_commentary)
// 'Data/dhaatupaatha/files-6-9-2014/mA106.html for mAdhavIyadhAtuvRtti
// 'Data/dhaatupaatha/files-6-9-2014/kRi106.html for kSIrataraGgiNI
// 'Data/dhaatupaatha/files-6-9-2014/XA106.html for dhAtupradIpa.
// $commentary = "m"/"k"/"d"/"u"/"j"/"i"
function ldc($numberstring,$commentary)
{
	$expansion = str_replace(array("m","k","d"),array("mA","kRi","XA"),$commentary);
	$commname = str_replace(array("m","k","d","u","j","i"),array("मा.धा.","क्षी.त.","धा.प्र.","UoHyd","JNU","INRIA"),$commentary);
	$errorname = str_replace(array("m","k","d","u","j","i"),array("मा.धा.-X","क्षी.त.-X","धा.प्र.-X","UoHyd-X","JNU-X","INRIA-X"),$commentary);
	$numberlist = explode(',',$numberstring);
	if (in_array($commentary,array("m","k","d")))
	{
		if ($numberlist[0]!=="")
		{
			foreach($numberlist as $number)
			{
				$output[] = '<a href="Data/dhaatupaatha/files-6-9-2014/'.$expansion.$number.'.html" target="_blank">'.$commname.'</a>';
			}
		}
		else
		{
			$output[] = $errorname;
		}
	}
	elseif ($commentary==="u")
	{
		if ($numberlist[0]!=="")
		{
			foreach($numberlist as $number)
			{
				$number = str_replace('+','_',$number);
				//http://sanskrit.uohyd.ac.in/cgi-bin/scl/skt_gen/verb/verb_gen.cgi?vb=ak1_akaz_BvAxiH+kutilAyAM_gawO&prayoga=karwari&encoding=WX
				$output[] = '<a href="http://sanskrit.uohyd.ac.in/cgi-bin/scl/skt_gen/verb/verb_gen.cgi?vb='.$number.'&prayoga=karwari&encoding=WX" target="_blank">'.$commname.'</a>';
			}
		}
		else
		{
			$output[] = $errorname;
		}
	}
	elseif ($commentary==="j")
	{
		if ($numberlist[0]!=="")
		{
			foreach($numberlist as $number)
			{
				//http://sanskrit.jnu.ac.in/tinanta/tinanta.jsp?t=77
				$output[] = '<a href="http://sanskrit.jnu.ac.in/tinanta/tinanta.jsp?t='.$number.'" target="_blank">'.$commname.'</a>';
			}
		}
		else
		{
			$output[] = $errorname;
		}
	}
	return implode(' , ',$output);
}
// function ldc_abs (link_dhatu_commentary)
// $commentary = "m"/"k"/"d"/"u"/"j"/"i"
function ldc_abs($numberstring,$commentary)
{
	$expansion = str_replace(array("m","k","d"),array("mA","kRi","XA"),$commentary);
	$commname = str_replace(array("m","k","d","u","j","i"),array("मा.धा.","क्षी.त.","धा.प्र.","UoHyd","JNU","INRIA"),$commentary);
	$errorname = str_replace(array("m","k","d","u","j","i"),array("मा.धा.-X","क्षी.त.-X","धा.प्र.-X","UoHyd-X","JNU-X","INRIA-X"),$commentary);
	$numberlist = explode(',',$numberstring);
	if (in_array($commentary,array("m","k","d")))
	{
		if ($numberlist[0]!=="")
		{
			foreach($numberlist as $number)
			{
				$output[] = 'http://sanskrit.uohyd.ac.in/scl/dhaatupaatha/files-15-03-2017//'.$expansion.$number.'.html';
			}
		}
		else
		{
			$output[] = $errorname;
		}
	}
	elseif ($commentary==="u")
	{
		if ($numberlist[0]!=="")
		{
			foreach($numberlist as $number)
			{
				$number = str_replace('+','_',$number);
				$output[] = 'http://sanskrit.uohyd.ac.in/cgi-bin/scl/skt_gen/verb/verb_gen.cgi?vb='.$number.'&prayoga=karwari&encoding=WX&upasarga=-&paxI='.$verbpadaforUohyd;
			}
		}
		else
		{
			$output[] = $errorname;
		}
	}
	elseif ($commentary==="j")
	{
		if ($numberlist[0]!=="")
		{
			foreach($numberlist as $number)
			{
				//http://sanskrit.jnu.ac.in/tinanta/tinanta.jsp?t=77
				$output[] = 'http://sanskrit.jnu.ac.in/tinanta/tinanta.jsp?t='.$number;
			}
		}
		else
		{
			$output[] = $errorname;
		}
	}
	return implode(' , ',$output);
}
function inrialink($verbwithoutanubandha,$gana)
{
	$gana=str_replace(array("BvAdi","adAdi","juhotyAdi","divAdi","svAdi","tudAdi","ruDAdi","tanAdi","kryAdi","curAdi"),array("1","2","3","4","5","6","7","8","9","10"),$gana);
	return '<a href="http://sanskrit.inria.fr/cgi-bin/SKT/sktconjug?lex=SH&q='.$verbwithoutanubandha.'&t=SL&c='.$gana.'&font=deva" target="_blank">INRIA</a>';
}
// for ajax display in case the verb entered belongs to more than one gaNa.
function verb_meaning_gana_number($text)
{
    global $html;
    $verbaccent=scrape1($text,0,7,1);
    $meaning=scrape1($text,0,1,1);
    $verbset=scrape1($text,0,14,1);
    $number=scrape1($text,0,13,1);
    $html .= '<div id="step22">';
    for($i=0;$i<count($verbaccent);$i++)
    {
            $html .= '<input required autocomplete="off" type="radio" value="'.trim($number[$i]).'" name="number" > '.$verbaccent[$i].' - '.convert($meaning[$i]).', '.convert($verbset[$i]).' '.$number[$i];
    }
            $html .= '</div>';
	return $html;
}
// for display in tiGanta.php
function verb_meaning_gana_number1($text)
{
	global $frontend, $outfile, $jsonmode;
    $verbaccent=scrape1($text,0,7,1);
    $meaning=scrape1($text,0,1,1);
	$verbwithoutanubandha=scrape1($text,0,2,1);
    $verbset=scrape1($text,0,14,1);
    $madhav=scrape1($text,0,8,1);
    $kzir=scrape1($text,0,9,1);
    $dp=scrape1($text,0,10,1);
	$uohyd=scrape1($text,0,11,1);
	$jnu=scrape1($text,0,12,1);
    $number=scrape1($text,0,13,1);
	if ($frontend==='1' && $jsonmode!==1)
	{
		echo "<p class = st >".toiast($verbaccent[0]).' - '.toiast($meaning[0]).', '.toiast($verbset[0]).' '.$number[0]."</p>\n";
		echo "<p class = st >".$verbaccent[0].' - '.convert($meaning[0]).', '.convert($verbset[0]).' '.convert($number[0]).', '.ldc($madhav[0],'m').', '.ldc($kzir[0],'k').', '.ldc($dp[0],'d').', '.ldc($uohyd[0],'u').', '.ldc($jnu[0],'j').', '.inrialink($verbwithoutanubandha[0],$verbset[0])."</p>\n";
		echo "<hr>\n";
		fputs($outfile,"<p class = st >".toiast($verbaccent[0]).' - '.toiast($meaning[0]).', '.toiast($verbset[0]).' '.$number[0]."</p>\n");
		fputs($outfile,"<p class = st >".$verbaccent[0].' - '.convert($meaning[0]).', '.convert($verbset[0]).' '.convert($number[0]).', '.ldc($madhav[0],'m').', '.ldc($kzir[0],'k').', '.ldc($dp[0],'d').', '.ldc($uohyd[0],'u').', '.ldc($jnu[0],'j').', '.inrialink($verbwithoutanubandha[0],$verbset[0])."</p>\n");
		fputs($outfile,"<hr>\n");
	}
	return array('verb' => $verbaccent[0], 'meaning' => $meaning[0], 'gana' => $verbset[0], 'number' => $number[0], 'mAdhavIya' => ldc_abs($madhav[0],'m'), 'kzIratarangiNI' => ldc_abs($kzir[0],'k'), 'dhAtupradIpa' => ldc_abs($dp[0],'d'), 'UoHyd' => ldc_abs($uohyd[0],'u'), 'jnu' => ldc_abs($jnu[0],'j'));
}
// for display in tiGanta.php in case the user has chosen the gaNa.
function verb_meaning_gana_number2($text)
{
   global $verbset, $frontend, $outfile, $jsonmode;
	global $debug, $debugmode;
	if ($debug===1 && $debugmode<2){
	echo "verb_meaning_gana_number2 started at ";
	timestamp();}
    $verbaccent=scrape($text,0,7,1,"",$verbset,14);
	$verbwithoutanubandha=scrape($text,0,2,1,"",$verbset,14);
    $meaning=scrape($text,0,1,1,"",$verbset,14);
    $verbset1=scrape($text,0,14,1,"",$verbset,14);
    $madhav=scrape($text,0,8,1,"",$verbset,14);
    $kzir=scrape($text,0,9,1,"",$verbset,14);
    $dp=scrape($text,0,10,1,"",$verbset,14);
	$uohyd=scrape($text,0,11,1,"",$verbset,14);
	$jnu=scrape($text,0,12,1,"",$verbset,14);
    $number=scrape($text,0,13,1,"",$verbset,14);
	if ($frontend==='1' && $jsonmode!==1)
	{
		echo "<p class = st >".toiast($verbaccent[0]).' - '.toiast($meaning[0]).', '.toiast($verbset[0]).' '.$number[0]."</p>\n";
		echo "<p class = st >".$verbaccent[0].' - '.convert($meaning[0]).', '.convert($verbset[0]).' '.convert($number[0]).', '.ldc($madhav[0],'m').', '.ldc($kzir[0],'k').', '.ldc($dp[0],'d').', '.ldc($uohyd[0],'u').', '.ldc($jnu[0],'j').', '.inrialink($verbwithoutanubandha[0],$verbset[0])."</p>\n";
		echo "<hr>\n";
		fputs($outfile,"<p class = st >".toiast($verbaccent[0]).' - '.toiast($meaning[0]).', '.toiast($verbset[0]).' '.$number[0]."</p>\n");
		fputs($outfile,"<p class = st >".$verbaccent[0].' - '.convert($meaning[0]).', '.convert($verbset[0]).' '.convert($number[0]).', '.ldc($madhav[0],'m').', '.ldc($kzir[0],'k').', '.ldc($dp[0],'d').', '.ldc($uohyd[0],'u').', '.ldc($jnu[0],'j').', '.inrialink($verbwithoutanubandha[0],$verbset[0])."</p>\n");
		fputs($outfile,"<hr>\n");
	}
	if ($debug===1 && $debugmode<2){
	echo "verb_meaning_gana_number2 ended at ";
	timestamp();}
	return array('verb' => $verbaccent[0], 'meaning' => $meaning[0], 'gana' => $verbset[0], 'number' => $number[0], 'mAdhavIya' => ldc_abs($madhav[0],'m'), 'kzIratarangiNI' => ldc_abs($kzir[0],'k'), 'dhAtupradIpa' => ldc_abs($dp[0],'d'), 'UoHyd' => ldc_abs($uohyd[0],'u'), 'jnu' => ldc_abs($jnu[0],'j'));
}
// for display in tiGanta.php in case the verb is not in our database.
function verb_meaning_gana_number3($text)
{
	global $frontend, $outfile, $jsonmode;
	if ($frontend==='1' && $jsonmode!==1)
	{
		echo "<p class = st >dhAtuH - ".$text."</p>\n";
		echo "<p class = st >धातुः - ".convert($text)."</p>\n";
		echo "<hr>\n";
		fputs($outfile,"<p class = st >dhAtuH - ".$text."</p>\n");
		fputs($outfile,"<p class = st >धातुः - ".convert($text)."</p>\n");
		fputs($outfile,"<hr>\n");
	}
}
// for display in tiGanta.php
function verb_meaning_gana_number4($number)
{
	global $frontend, $outfile, $debug, $debugmode, $jsonmode;
	if ($debug===1 && $debugmode<2){ dibug("verb_meaning_gana_number4 start");}
    $verbaccent=scrape2($number,13,7,1);
	$upadeza=scrape2($number,13,0,1);
	$verbwithoutanubandha=scrape2($number,13,2,1);
    $meaning=scrape2($number,13,1,1);
    $verbset=scrape2($number,13,14,1);
    $madhav=scrape2($number,13,8,1);
    $kzir=scrape2($number,13,9,1);
    $dp=scrape2($number,13,10,1);
	$uohyd=scrape2($number,13,11,1);
	$jnu=scrape2($number,13,12,1);
    $number=scrape2($number,13,13,1);
	if ($debug===1 && $debugmode<2){ dibug("verb_meaning_gana_number4 middle");}
	if ($frontend==='1' && $jsonmode!==1)
	{
		echo "<p class = st >".toiast($upadeza[0].' - '.$meaning[0].', '.$verbset[0].' '.$number[0])."</p>\n";
		echo "<p class = st >".$verbaccent[0].' - '.convert($meaning[0].', '.$verbset[0].' '.$number[0]).', '.ldc($madhav[0],'m').', '.ldc($kzir[0],'k').', '.ldc($dp[0],'d').', '.ldc($uohyd[0],'u').', '.ldc($jnu[0],'j').', '.inrialink($verbwithoutanubandha[0],$verbset[0])."</p>\n";
		echo "<hr>\n";
		/*fputs($outfile,"<p class = st >".toiast($upadeza[0].' - '.$meaning[0].', '.$verbset[0].' '.$number[0])."</p>\n");
		fputs($outfile,"<p class = st >".$verbaccent[0].' - '.convert($meaning[0].', '.$verbset[0].' '.$number[0]).', '.ldc($madhav[0],'m').', '.ldc($kzir[0],'k').', '.ldc($dp[0],'d').', '.ldc($uohyd[0],'u').', '.ldc($jnu[0],'j').', '.inrialink($verbwithoutanubandha[0],$verbset[0])."</p>\n");
		fputs($outfile,"<hr>\n");*/
	}
	if ($debug===1 && $debugmode<2){ dibug("verb_meaning_gana_number4 end");}
	return array('verb' => $verbaccent[0], 'meaning' => $meaning[0], 'gana' => $verbset[0], 'number' => $number[0], 'mAdhavIya' => ldc_abs($madhav[0],'m'), 'kzIratarangiNI' => ldc_abs($kzir[0],'k'), 'dhAtupradIpa' => ldc_abs($dp[0],'d'), 'UoHyd' => ldc_abs($uohyd[0],'u'), 'jnu' => ldc_abs($jnu[0],'j'));
}
function verbset_from_number($number)
{
	$parts=explode('.',$number);
	$verbset=str_replace(array("01","02","03","04","05","06","07","08","09","10",),array("BvAdi","adAdi","juhotyAdi","divAdi","svAdi","tudAdi","ruDAdi","tanAdi","kryAdi","curAdi",),$parts[0]);
	return $verbset;
}
function dhatu_from_number($number)
{
	global $frontend, $outfile, $debug, $debugmode;
	if ($debug===1 && $debugmode<2){ dibug("dhatu_from_number start");}
	$first = scrape1($number,13,0,1);
	if ($debug===1 && $debugmode<2){ dibug("dhatu_from_number end");}
	return $first[0];
}
// for display of upasarga details.
function upasarga_display($text)
{
	global $frontend, $outfile, $jsonmode;
	if ($frontend==='1' && $jsonmode!==1)
	{
		echo "<p class = st >upasarga - ".toiast($text)."</p>\n";
		echo "<p class = st >उपसर्गः - ".convert($text)."</p>\n";
		echo "<hr>\n";
		//fputs($outfile,"<p class = st >upasarga - ".toiast($text)."</p>\n");
		//fputs($outfile,"<p class = st >उपसर्गः - ".convert($text)."</p>\n");
		//fputs($outfile,"<hr>\n");
	}
}
/* Display warning message for dropped sUtra */
function droppedsutra($removed_sutras)
{
	if (count($removed_sutras)>0 && $removed_sutras[0]!=="")
	{
		$removed_sutras = array_map('link_sutra',$removed_sutras);
		echo "<p class = drop >You have chosen to prevent application of these sUtras - ".implode(', ',$removed_sutras)."<br/>They will be highlighted in this colour, but would not be applied.</p>\n<hr>\n";
	}
}
// for display of lakAra and suffix details.
function suffix_display($fo,$so)
{
	global $frontend, $outfile, $lakAra, $type, $removed_sutras;
	$sanAdi = $_GET['sanAdi'];
	if ($type==="tiGanta")
	{
		if ($frontend!=="0")
		{
			if ($sanAdi!=="")
			{
			echo "<p class = red >".convert($fo." + ".$sanAdi." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n";
			//fputs($outfile,"<p class = red >".convert($fo." + ".$sanAdi." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n");
			}
			else
			{
			echo "<p class = red >".convert($fo." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n";
			//fputs($outfile,"<p class = red >".convert($fo." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n");
			}
		}
		else
		{
			if ($sanAdi!=="")
			{
			//fputs($outfile,"<p class = red >".convert($fo." + ".$sanAdi." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n");
			}
			else
			{
			//fputs($outfile,"<p class = red >".convert($fo." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n");
			}
		}
	}
	elseif ($type==="subanta")
	{
		if ($frontend!=="0")
		{
			echo "<p class = red >".convert($fo)." + ".convert($so)." <a href = subanta.html>Go Back</a></p>\n<hr>\n";
			//fputs($outfile,"<p class = red >".convert($fo)." + ".convert($so)." <a href = subanta.html>Go Back</a></p>\n<hr>\n");
		}
		else
		{
			//fputs($outfile,"<p class = red >".convert($fo)." + ".convert($so)." <a href = subanta.html>Go Back</a></p>\n<hr>\n");
		}
	}
	elseif ($type==="sandhi")
	{
		if ($frontend!=="0")
		{
			echo "<p class = red >".convert($fo)." + ".convert($so)." <a href = sandhi.html>Go Back</a></p>\n<hr>\n";
			//fputs($outfile,"<p class = red >".convert($fo)." + ".convert($so)." <a href = sandhi.html>Go Back</a></p>\n<hr>\n");
		}
		else
		{
			//fputs($outfile,"<p class = red >".convert($fo)." + ".convert($so)." <a href = sandhi.html>Go Back</a></p>\n<hr>\n");
		}
	}
}
// for display of lakAra and suffix details.
function suffix_storage()
{
	global $storedata, $frontend, $outfile, $sanAdi, $lakAra, $fo, $so, $type;
	if ($type==="tiGanta")
	{
		if ($frontend!=="0")
		{
			if ($sanAdi!=="")
			{
			echo "<p class = red >".convert($fo." + ".$sanAdi." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n";
			//fputs($outfile,"<p class = red >".convert($fo." + ".$sanAdi." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n");
			}
			else
			{
			echo "<p class = red >".convert($fo." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n";
			//fputs($outfile,"<p class = red >".convert($fo." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n");
			}
		}
		else
		{
			if ($sanAdi!=="")
			{
			//fputs($outfile,"<p class = red >".convert($fo." + ".$sanAdi." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n");
			}
			else
			{
			//fputs($outfile,"<p class = red >".convert($fo." + ".$so." - ".$lakAra." lakAraH ")." <a href = tiGanta.html>Go Back</a></p>\n<hr>\n");
			}
		}
	}
	elseif ($type==="subanta")
	{
		if ($frontend!=="0")
		{
			echo "<p class = red >".convert($fo)." + ".convert($so)." <a href = subanta.html>Go Back</a></p>\n<hr>\n";
			//fputs($outfile,"<p class = red >".convert($fo)." + ".convert($so)." <a href = subanta.html>Go Back</a></p>\n<hr>\n");
		}
		else
		{
			//fputs($outfile,"<p class = red >".convert($fo)." + ".convert($so)." <a href = subanta.html>Go Back</a></p>\n<hr>\n");
		}
	}
	elseif ($type==="sandhi")
	{
		if ($frontend!=="0")
		{
			echo "<p class = red >".convert($fo)." + ".convert($so)." <a href = sandhi.html>Go Back</a></p>\n<hr>\n";
			//fputs($outfile,"<p class = red >".convert($fo)." + ".convert($so)." <a href = sandhi.html>Go Back</a></p>\n<hr>\n");
		}
		else
		{
			//fputs($outfile,"<p class = red >".convert($fo)." + ".convert($so)." <a href = sandhi.html>Go Back</a></p>\n<hr>\n");
		}
	}
}
// for deciding verb padas.
function verb_pada($sutra)
{
	global $padadecider_id, $padadecider_sutra;
	$padadecider_sutra = gui2($sutra);
	global $verb_sutra_pada; // This variable has two components e.g. "1.3.13:A" where the first part is sUtra number and the second part is the pada. We are trying to glean the second part from first part as input.
	$matches = array_filter($verb_sutra_pada, function($var) use ($sutra) { return strpos($var,$sutra.":")!==false; }); // This function is taken from some Stackoverflow suggestion.
	$matches=array_values($matches);
	$int = explode(':',$matches[0]); // We presume that there would be only one such match.
	$verbpada = $int[1];
	$padadecider_id = $int[0];
	return $verbpada;
}
// for deciding verb padas.
function verb_pada1()
{
	global $toatmane, $us, $first, $sutraenglish, $sutradeva, $outfile, $frontend, $padadecider_id;
	  $temp = array();
    for($i=0;$i<count($toatmane);$i++)
    {
        if($us.$first===$toatmane[$i] && $frontend!=="0")
        {
						$temp = $sutradeva[$i];
            echo "<p class = st >By ".toiast($sutraenglish[$i])." :</p>\n";
            echo "<p class = st >".$sutradeva[$i]." :</p>\n";
            echo "<hr>\n";
            fputs($outfile,"<p class = st >By ".toiast($sutraenglish[$i])." :</p>\n");
            fputs($outfile,"<p class = st >".$sutradeva[$i]." :</p>\n");
            fputs($outfile,"<hr>\n");
						break;
        }
    }
		return $temp;
}
// for deciding suffixes as per the verb padas.
function verb_suffixes($pada)
{
	global $taG, $tis, $tiG;
	global $suffix;
	if ($pada==="A")
	{
		return $taG;
	}
	elseif ($pada==="p")
	{
		return $tis;
	}
	elseif ($pada==="u")
	{
		return $tiG;
	}
	else
	{
		echo "Error - verb pada may not have been decided properly. Check";
		return $tiG;
	}
}
// for display in tiGanta.php in case the user has chosen the gaNa.
function verb_padafinder($text)
{
    /*global $verbset;
    $verbpada=scrape($text,0,5,1,"",$verbset,12);*/
	global $number;
	$verbpada = scrape2($number,13,5,1);
	$verbpada=array_unique($verbpada);
	$verbpada=array_values($verbpada);
    return $verbpada;
}
// Searching for seT / aniT of a verb for use in tiGanta.php in case the user has chosen the gaNa.
function verb_itfinder($text)
{
    global $verbset;
	global $fo; global $number;
    $verb_it=scrape2($number,13,6,1);
	$verb_it=array_unique($verb_it);
	$verb_it=array_values($verb_it);
	return $verb_it;
}
/* function change to change all members of $text based on a regular expression */
function change($a,$b)
{
    global $text; global $debug, $debugmode;
	if ($debug===1 && $debugmode<2){ echo "change started at "; timestamp(); };
    foreach ($text as $value)
    {
        $val[]=preg_replace($a,$b,$value);
    }
	if ($debug===1 && $debugmode<2){ echo "change ended at "; timestamp(); };
    return $val;
}
/* function Adyanta */
// $text - input array, $a - string to be added. $b - 1 for Adi, 2 for anta.
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

/* function pratyayareplace2 (pr2) to change pratyayas as per Sahajabodha */
// sub is not specific. For pratyayas, we test whether it is at end or not.
function pr2($a,$b,$c,$d,$e,$f,$test)
{
	global $debug, $debugmode;
	if ($debug===1 && $debugmode<2){
	echo "pr2 started at ";
	timestamp();}
	$out = array();
    foreach($test as $value)
    {
        $counter=1;
        for($i=0;$i<count($a);$i++)
        {
			if(strpos($value,$a[$i])!==false)
			{
				for($j=0;$j<count($b);$j++)
				{
					if(strpos($value,$a[$i].$b[$j])!==false)
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
	$out = array_unique($out);
	$out = array_values($out);
	if ($debug===1 && $debugmode<2){
	echo "pr2 ended at ";
	timestamp();}
    return $out;
}

/* Code for converting from IAST and Devanagari to SLP1 for input from tiGanta.html */
function toslp($text)
{
    global $tran;
    // defining IAST letters.
    $iast = array("a","ā","i","ī","u","ū","ṛ","ṝ","ḷ","ḹ","e","ai","o","au","ṃ","ḥ","kh","ch","ṭh","th","ph","gh","jh","ḍh","dh","bh","ṅ","ñ","ṇ","k","c","ṭ","t","p","g","j","ḍ","d","b","n","m","y","r","l","v","s","h","ś","ṣ",);
    // defining SLP1 letters.
    $slp = array("a","A","i","I","u","U","f","F","x","X","e","E", "o","O", "M","H","K", "C",  "W", "T", "P","G", "J",  "Q", "D","B", "N","Y","R","k","c","w","t","p","g","j","q","d","b","n","m","y","r","l","v","s","h","S","z",);
      if (preg_match('/[āĀīĪūŪṛṚṝṜḷḶḹḸṃṂḥḤṭṬḍḌṅṄñÑṇṆśŚṣṢV]/',$text) )// if there is IAST letters in the input, change them to SLP1
    {
        $text = str_replace($iast,$slp,$text);
    }
    if ($tran === "IAST") // if the user says that the input is IAST - change it to SLP1.
    {
         $text = str_replace($iast,$slp,$text);
    }
    /* Code for converting from devanagari - SLP1 */
    //This is innocuous. Therefore even running without the selection in dropdown menu.
    $text = json_encode($text);
    $text = str_replace("\u200d","",$text); // removing whitespace
    $text = str_replace("\u200c","",$text); // removing whitespace
    $text = json_decode($text);
    $text = convert1($text); // converting to SLP1
    return $text;
}
function toiast($text)
{
	global $tran, $iast, $slp;
    /* Code for converting from devanagari - SLP1 */
    //This is innocuous. Therefore even running without the selection in dropdown menu.
    $text = json_encode($text);
    $text = str_replace("\u200d","",$text); // removing whitespace
    $text = str_replace("\u200c","",$text); // removing whitespace
    $text = json_decode($text);
	if ($tran==="Devanagari")
	{
		$text = convert1($text); // converting to SLP1
	}

	$text = str_replace($slp,$iast,$text);
    return $text;
}

function Adezapratyaya($text)
{
	global $text, $ksa, $SaHsaH, $sic, $syatAsI, $us, $fo;
	$text = change('/([iIuUfFxXeEoOhyvrlkKgGN])([+]*)s(['.pc('al').'])/','$1$2z$3');
	$text = change('/([iIuUfFxXeEoOhyvrlkKgGN][+]*[iI]*)sI/','$1zI');
	$text = one(array("zIs"),array("zIz"),0);
	/*
	foreach ($text as $value)
	{
		if (preg_match('/[iIuUfFxXeEoOhyvrlkKgGN][+][s]/',$value) && ($ksa===1 || $SaHsaH===1 || $sic===1 || $syatAsI===1 || $us!=="" || $fo==="Sru")) // patch for ksa
		{
			$val[]=preg_replace('/([iIuUfFxXeEoOhyvrlkKgGN])([+][s])/',"$1+z",$value);
		}
		elseif (preg_match('/^[s]/',$value) && ends(array($us),prat('ik'),1))
		{
			$val[]=preg_replace('/^([s])/',"z",$value);
		}
		else
		{
			$parts=explode('+',$value);
			for ($i=1;$i<count($parts);$i++) // leaving the first part and starting from second because it is not pratyaya. Mostly it is prakRti.
			{
				$parts[$i]=preg_replace('/([iIuUfFxXeEoOhyvrlkKgGN])([s])/','$1z',$parts[$i]);
				if (arr($text,'/[s]$/')) // patch for aDAsIs, aDAsisus
				{
					$parts[count($parts)-1]=preg_replace('/([z])$/','s',$parts[count($parts)-1]);
				}
			}
			$val[] = implode('+',$parts);
		}
	}
	if ($val!==$text)
	{
		$output = $val;
	}
	else
	{
		$output = $text;
	}
	$text = $output;
    return $output;
	*/
	return $text;
}


function ekAcobazo()
{
    global $text; global $verb_without_anubandha; global $storedata, $sanAdi;
	foreach ($text as $value)
	{
		if ( (!anekAca($verb_without_anubandha||$sanAdi==="yaNluk")) && ( preg_match('/[bgqd](['.pc('al').']*)[JBGQD][+][sDz]/',$value) || preg_match('/[JBGQD][+]$/',$value) ) )
		{
			$value = preg_replace('/([b])(['.pc('al').']*)([JBGQD][+])/',"B$2$3",$value);
			$value = preg_replace('/([g])(['.pc('al').']*)([JBGQD][+])/',"G$2$3",$value);
			$value = preg_replace('/([q])(['.pc('al').']*)([JBGQD][+])/',"Q$2$3",$value);
			$val[] = preg_replace('/([d])(['.pc('al').']*)([JBGQD][+])/',"D$2$3",$value);
		}
		elseif (preg_match('/[bgqd](['.pc('al').']*)[JBGQD]$/',$value))
		{
			$value = preg_replace('/([b])(['.pc('al').']*)([JBGQD]$)/',"B$2$3",$value);
			$value = preg_replace('/([g])(['.pc('al').']*)([JBGQD]$)/',"G$2$3",$value);
			$value = preg_replace('/([q])(['.pc('al').']*)([JBGQD]$)/',"Q$2$3",$value);
			$val[] = preg_replace('/([d])(['.pc('al').']*)([JBGQD]$)/',"D$2$3",$value);
		}
		else
		{
			$val[] = $value;

		}
	}
		$text = $val;
		storedata('8.2.37','sa',0);
    return $text;
}

/* link_sutra function is courtesy of Funderburk Jim of sanskrit-lexicon. */
function link_sutra($s,$relativepath="") {
 /* $s is a string of form X.Y.Z where X,Y,Z are digits
   Returns a string
   <a href="Data/allsutrani/X.Y.Z.htm">X.Y.Z</a>
  e.g., if s = "3.4.113", returns
   <a href="Data/allsutrani/3.4.113.htm">3.4.113</a>
 */
 global $dropping;
 $parts = preg_split('/[.]/',$s);
 if (count($parts) != 3) {  // error checking
	$ans = $s;
	if(!isset($argv[0])||$dropping!==0)
	{
	  echo "<p>link_sutra error: input = $s</p>\n";
	  exit(1);
	}
 }
 else
 {
	 $X=$parts[0];
	 $Y=$parts[1];
	 $Z=$parts[2];
	 if ($relativepath!=="")
	 {
		$ans = "<a href=\"$relativepath/Data/allsutrani/$X.$Y.$Z.htm\" target='_blank'>$X.$Y.$Z</a>";
	 }
	 else
	 {
		$ans = "<a href=\"Data/allsutrani/$X.$Y.$Z.htm\" target='_blank'>$X.$Y.$Z</a>";
	 }
 }
 return $ans;
}

/* link_vartika function is modification of link_sutra for vArtikas. */
function link_vartika($s) {
 /* $s is a string of form X.Y.Z where X,Y,Z are digits
   Returns a string
   <a href="Data/allsutrani/X.Y.Z.htm">X.Y.Z</a>
  e.g., if s = "3.4.113", returns
   <a href="Data/allsutrani/3.4.113.htm">3.4.113</a>
 */
 $parts = preg_split('/[.-]/',$s);
 if (count($parts) != 4) {  // error checking
  echo "<p>link_sutra error: input = $s</p>\n";
  exit(1);
 }
 $X=$parts[0];
 $Y=$parts[1];
 $Z=$parts[2];
 $W=$parts[3];
 $ans = "<a href=\"Data/allsutrani/$X.$Y.$Z.htm\" target=\"_blank\">$X.$Y.$Z-$W</a>";
 return $ans;
}

function caG_halAdi()
{
	global $text; global $storedata, $us, $sanAdi;
	if (arr($text,'/^(['.pc('hl').']*['.pc('ac').']{1}['.pc('hl').'MH]*)[+]a[+]/'))
	{
		$text = change('/^(['.pc('hl').']*['.pc('ac').']{1}['.pc('hl').'MH]*)[+]a[+]/','$1+$1+a+');
	}
	elseif (arr($text,'/^(['.pc('hl').']*['.pc('ac').']{1})['.pc('hl').'MH]*['.pc('ac').']['.pc('al').'MH]*[+]a[+]/'))
	{
		$text = change('/^(['.pc('hl').']*['.pc('ac').']{1})(['.pc('hl').'MH]*['.pc('ac').']['.pc('al').'MH]*[+]a[+])/','$1+$1$2');
	}
	elseif ($sanAdi==="Ric" && arr($text,'/^(['.pc('hl').']+['.pc('al').']*)[+]Ric[+]a[+]/'))
	{
		$text = change('/^(['.pc('hl').']+['.pc('al').']*)[+]Ric[+]a[+]/','$1+$1+Ric+a+');
	}
	/* caGi (6.1.11) */
	storedata('6.1.1','pa',0);
	storedata('6.1.11','sa',0);
	return $text;
}
function caG_ajAdi()
{
	global $text; global $caG; global $fo; global $storedata, $us;	global $liT_Adeza;
	if (arr($text,'/^(['.pc('ac').']['.pc('al').'MH]*[ndrNYRm])(['.pc('hl').']['.pc('ac').'][^+]*)[+][ae]/'))
	{
		$text = change('/^(['.pc('ac').']['.pc('al').'MH]*[ndrNYRm])(['.pc('hl').']['.pc('ac').'][^+]*)([+][ae])/','$1$2+$2+$3');
		/* na ndrAH saMyogAdayaH (6.1.3) */
		storedata('6.1.3','sa',0);
		$nandra=1;
	}
	elseif (arr($text,'/^(['.pc('ac').']['.pc('al').'MH]*[b])(['.pc('hl').']['.pc('ac').'][^+]*)([+][ae])/'))
	{
		$text = change('/^(['.pc('ac').']['.pc('al').'MH]*[b])(['.pc('hl').']['.pc('ac').'][^+]*)([+][ae])/','$1$2+$2+$3');
		/* bakArasyApyayaM pratiSedhaH (vA) */
		storedata('bakAra','sa',0);
		$bakara=1;
	}
	elseif (arr($text,'/^(['.pc('ac').']['.pc('hl').'MH]*)(['.pc('hl').']*['.pc('ac').'])([^+]*)([+][ae])/'))
	{
		storedata('6.1.2','pa',0);
		$text = change('/^(['.pc('ac').']['.pc('hl').'MH]*)(['.pc('hl').']['.pc('ac').'])([^+]*)([+][ae])/','$1$2+$2+$3+$4');
		// caGi (6.1.11)
		if ($caG===1)
		{
			storedata('6.1.11','sa',0);
		}
	}
	/* Making changes to abhyAsa */
	/* urat (7.4.66) */
	if (arr($text,'/([^+]*)[fF][+]/'))
	{
		$text = change('/([^+]*)[fF][+]/','$1a+');
		storedata('7.4.66','sa',0);
	}
	/* zarpUrvAH khayaH (7.4.61) */
	if (arr($text,'/^([^+]*)[Szs](['.pc('Ky').'][^+]*[+])/'))
	{
		$text = change('/^([^+]*)[Szs](['.pc('Ky').'][^+]*[+])/','$1$2');
		storedata('7.4.61','sa',0);
	}
	/* halAdiH zeSaH (7.4.60) */
	elseif(arr($text,'/^(['.pc('hl').'])[^'.pc('ac').']*(['.pc('ac').'])([^+]*[+])/'))
	{
		$text = change('/^(['.pc('hl').'])[^'.pc('ac').']*(['.pc('ac').'])([^+]*[+])/','$1$2$3');
		storedata('7.4.60','sa',0);
	}
	/* kuhozcuH (7.4.62) */
	if(arr($text,'/^[^+]*[kKgGNh][^+]*[+]/'))
	{
		$text=change('/^([^+]*)k([^+]*[+])/','$1c$2');
		$text=change('/^([^+]*)K([^+]*[+])/','$1C$2');
		$text=change('/^([^+]*)g([^+]*[+])/','$1j$2');
		$text=change('/^([^+]*)G([^+]*[+])/','$1J$2');
		$text=change('/^([^+]*)N([^+]*[+])/','$1Y$2');
		$text=change('/^([^+]*)h([^+]*[+])/','$1j$2');
		storedata('7.4.62','sa',0);
	}
	/* abhyAse carca (8.4.54) */
	if (arr($text,'/^[^+]*[JBGQDKPCWT][^+]*[+]/'))
	{
		$text=change('/^([^+]*)J([^+]*[+])/','$1j$2');
		$text=change('/^([^+]*)B([^+]*[+])/','$1b$2');
		$text=change('/^([^+]*)G([^+]*[+])/','$1g$2');
		$text=change('/^([^+]*)Q([^+]*[+])/','$1q$2');
		$text=change('/^([^+]*)D([^+]*[+])/','$1d$2');
		$text=change('/^([^+]*)K([^+]*[+])/','$1k$2');
		$text=change('/^([^+]*)P([^+]*[+])/','$1p$2');
		$text=change('/^([^+]*)C([^+]*[+])/','$1c$2');
		$text=change('/^([^+]*)W([^+]*[+])/','$1w$2');
		$text=change('/^([^+]*)T([^+]*[+])/','$1t$2');
		storedata('8.4.54','sa',0);
	}
	$text = change('/[+]+/','+');
	return $text;
}
function san_ajAdi()
{
	global $text; global $fo; global $storedata, $us;
	/* ajAderdvitIyasya (6.1.2) */
	if (arr($text,'/^UrRu[+]*[i]*sa/'))
	{
		$text = change('/^UrRu([+]*[i]*sa)/','UrRunu$1');
		storedata('6.1.2','sa',0);
	}
	/* na ndrAH saMyogAdayaH (6.1.3) */
	elseif (arr($text,'/^(['.pc('ac').']['.pc('al').'MH]*[ndrNYRm])(['.pc('hl').']['.pc('ac').'])([^+]*)$/'))
	{
		$text = change('/^(['.pc('ac').']['.pc('al').'MH]*[ndrNYRm])(['.pc('hl').']['.pc('ac').'])([^+]*)$/','$1$2+$2$3');
		storedata('6.1.3','sa',0);
		$nandra=1;
	}
	/* IrSyatestRtIyasya dve (vA 6.1.3-2) */
	elseif (arr($text,'/^Irzyiza$/'))
	{
		$text1 = change('/^Irzyiza$/','Irzyiyiza');
		$text2 = change('/^Irzyiza$/','Irzyizisa');
		$text = array_merge($text1,$text2);
		storedata('6.1.3-2','sa',0);
		$nandra=1;
	}
	elseif (arr($text,'/^(['.pc('ac').']['.pc('al').'MH]*[b])(['.pc('hl').']['.pc('ac').'][^+]*)$/'))
	{
		$text = change('/^(['.pc('ac').']['.pc('al').'MH]*[b])(['.pc('hl').']['.pc('ac').'])([^+]*)$/','$1$2$2$3');
		/* bakArasyApyayaM pratiSedhaH (vA) */
		storedata('bakAra','sa',0);
		$bakara=1;
	}
	elseif (arr($text,'/^(['.pc('ac').']['.pc('hl').'MH])(['.pc('hl').'MH]+)(['.pc('ac').'])([^+]*)$/'))
	{
		$text = change('/^(['.pc('ac').'])(['.pc('hl').'MH])(['.pc('hl').'MH]+)(['.pc('ac').'])([^+]*)$/','$1$2$3$4+$3$4$5');
		storedata('6.1.2','sa',0);
	}
	elseif (arr($text,'/^(['.pc('ac').']['.pc('hl').'MH])(['.pc('hl').'MH]*)(['.pc('ac').'])([^+]*)$/'))
	{
		$text = change('/^(['.pc('ac').'])(['.pc('hl').'MH])(['.pc('hl').'MH]*)(['.pc('ac').'])([^+]*)$/','$1$2$4+$2$3$4$5');
		storedata('6.1.2','sa',0);
	}
	if (sub(array("IrDsa"),blank(0),blank(0),0))
	{
		$text = one(array("IrDsa"),array("IrDsa+sa"),0);
		storedata('6.1.2','sa',0);
	}
	/* Making changes to abhyAsa */
	/* urat (7.4.66) */
	if (arr($text,'/([^+]*)[fF][+]/'))
	{
		$text = change('/([^+]*)[fF][+]/','$1a+');
		storedata('7.4.66','sa',0);
	}
	/* zarpUrvAH khayaH (7.4.61) */
	if (arr($text,'/^([^+]*)[Szs](['.pc('Ky').'][^+]*[+])/'))
	{
		$text = change('/^([^+]*)[Szs](['.pc('Ky').'][^+]*[+])/','$1$2');
		storedata('7.4.61','sa',0);
	}
	/* halAdiH zeSaH (7.4.60) */
	elseif(arr($text,'/^(['.pc('hl').'])[^'.pc('ac').']*(['.pc('ac').'])([^+]*[+])/'))
	{
		$text = change('/^(['.pc('hl').'])[^'.pc('ac').']*(['.pc('ac').'])([^+]*[+])/','$1$2$3');
		storedata('7.4.60','sa',0);
	}
	/* kuhozcuH (7.4.62) */
	if(arr($text,'/^[^kKgGh]*[kKgGNh][^+]*[+]/'))
	{
		$text=change('/^([^kKgGh]*)k([^+]*[+])/','$1c$2');
		$text=change('/^([^kKgGh]*)K([^+]*[+])/','$1C$2');
		$text=change('/^([^kKgGh]*)g([^+]*[+])/','$1j$2');
		$text=change('/^([^kKgGh]*)G([^+]*[+])/','$1J$2');
		$text=change('/^([^kKgGh]*)N([^+]*[+])/','$1Y$2');
		$text=change('/^([^kKgGh]*)h([^+]*[+])/','$1j$2');
		storedata('7.4.62','sa',0);
	}
	/* abhyAse carca (8.4.54) */
	if (arr($text,'/^[^JBGQDKPCWT]*[JBGQDKPCWT][^+]*[+]/'))
	{
		$text=change('/^([^JBGQDKPCWT]*)J([^+]*[+])/','$1j$2');
		$text=change('/^([^JBGQDKPCWT]*)B([^+]*[+])/','$1b$2');
		$text=change('/^([^JBGQDKPCWT]*)G([^+]*[+])/','$1g$2');
		$text=change('/^([^JBGQDKPCWT]*)Q([^+]*[+])/','$1q$2');
		$text=change('/^([^JBGQDKPCWT]*)D([^+]*[+])/','$1d$2');
		$text=change('/^([^JBGQDKPCWT]*)K([^+]*[+])/','$1k$2');
		$text=change('/^([^JBGQDKPCWT]*)P([^+]*[+])/','$1p$2');
		$text=change('/^([^JBGQDKPCWT]*)C([^+]*[+])/','$1c$2');
		$text=change('/^([^JBGQDKPCWT]*)W([^+]*[+])/','$1w$2');
		$text=change('/^([^JBGQDKPCWT]*)T([^+]*[+])/','$1t$2');
		storedata('8.4.54','sa',0);
	}
	return $text;
}
function san_aGgAdikArya()
{
	global $text;global $fo; global $storedata, $us, $san, $ac, $ghu;
	/* abhyastasya ca (6.1.33) */
	if (arr($text,'/hvA+sa$/'))
	{
		$text=two(array("hvA"),array("+sa"),array("hu"),array("+sa"),0);
		storedata('6.1.33','sa',0);
	}
	/* janasanakhanAM saJjhaloH (6.4.42) */
	if (arr($text,'/[jsK]an[+]sa$/') )
	{
		$text=change('/([jsK])an([+]sa)$/','$1A$2');
		storedata('6.4.42','sa',0);
	}
	/* sani mImAghurabhalabhazakapatapadAM aca is (7.4.54) */
	if (sub(array("mI","mA","raB","laB","Sak","pad","pat","raD"),array("+sa"),blank(0),0) || $ghu===1)
	{
		$text=two(array("mI","mA","dA","DA","raB","laB","Sak","pad","pat"),array("+sa"),array("mis","mis","dis","Dis","risB","lisB","Sisk","pisd","pist"),array("+sa"),0);
		if (arr($text,'/raD[+]sa$/'))
		{
			$text = two(array("raD"),array("+sa"),array("risD"),array("+sa"),0);
			storedata('7.4.54-1','sa',0);
		}
		else
		{
			storedata('7.4.54','sa',0);
		}
		if (sub(array("risB","lisB","Sisk","pisd","pist","risD"),array("+sa"),blank(0),0))
		{
			$text = two(array("risB","lisB","Sisk","pisd","pist","risD"),array("+sa"),array("riB","liB","Sik","pid","pit","riD"),array("+sa"),0);
			storedata('8.2.29','sa',0);
		}
	}
	/* ApjJapyRdhAmIt (7.4.55) */
	elseif ( sub(array("jYap"),array("+sa"),blank(0),0))
	{
		$text = two(array("jYap"),array("+sa"),array("jYIp"),array("+sa"),0);
		storedata('7.4.55','sa',0);
	}
	/* dambha icca (7.4.56) */
	elseif ( sub(array("damB"),array("+sa"),blank(0),0))
	{
		$text = two(array("damB"),array("+sa"),array("dimB"),array("+sa"),1);
		$text = two(array("damB"),array("+sa"),array("dImB"),array("+sa"),0);
		storedata('7.4.56','sa',0);
	}
	/* muco'karmakasya guNo vA (7.4.57) */
	elseif ( sub(array("muc"),array("+sa"),blank(0),0))
	{
		$text = two(array("muc"),array("+sa"),array("moc"),array("+sa"),1);
		storedata('7.4.57','sa',0);
	}
	/* tanotervibhASA (6.4.17) */
	elseif ( arr($text,'/^tan[+]*[sz]a$/') && $san===1)
	{
		$text = two(array("tan"),array("+sa"),array("tAn"),array("+sa"),1);
		storedata('6.4.17','sa',0);
	}
	/* ajjhanagamAM sani (6.4.16) */
	elseif ( arr($text,'/^[^+]*['.pc('ac').'][+]*[sz]a$/') && $san===1 && $fo!=="UrRuY" )
	{
		$text = two($ac,array("+sa"),dirgha($ac),array("+sa"),0);
		storedata('6.4.16','sa',0);
	}
	/* ajjhanagamAM sani (6.4.16) */
	elseif ( arr($text,'/han[+]*[sz]a$/') && $san===1 && $fo!=="UrRuY" )
	{
		$text = two(array("han"),array("+sa"),array("hAn"),array("+sa"),0);
		storedata('6.4.16','sa',0);
	}
	/* cCvoH zUDanunAsike (6.4.19) */
	if (arr($text,'/v[+]sa$/') )
	{
		$text = change('/v[+]sa$/','U+sa');
		storedata('6.4.19','sa',0);
		$text = change('/iU[+]sa$/','yU+sa');
		storedata('6.1.77','sa',0);
	}
	/* grahijyAvayivyadhivaSTivicativRzcatipRcCatibhRjjatInAM Giti ca (6.1.16) */
	if ( in_array($fo,array("graha!","praCa!",)) && sub(array("grah","praC",),array("+sa","+isa"),blank(0),0) )
	{
		$text=two(array("grah","praC"),array("+sa","+isa"),array("gfh","pfC"),array("+sa","+isa"),0);
		storedata('6.1.16','sa',0);
	}
	/* vacisvapiyajAdInAm kiti (6.1.15) */
	if ( in_array($fo,array("Yizvapa!")) && sub(array("svap"),array("+sa"),blank(0),0) )
	{
		$text=two(array("svap"),array("+sa"),array("sup"),array("+sa"),0);
		storedata('6.1.15','sa',0);
	}
	/* aniditAM hala upadhAyAH kGiti (6.4.24) */
	if (in_array($fo,array("tfMhU!","damBu!")) && sub(array("tfMh","dimB","dImB"),array("+sa"),blank(0),0) )
	{
		$text = two(array("tfMh","dimB","dImB"),array("+sa"),array("tfh","diB","dIB"),array("+sa"),0);
		storedata('6.4.24','sa',0);
	}
	/* udoSThyapUrvasya (7.1.102) */
	if ( arr($text,'/[pPbBmv]F[+]sa$/'))
	{
		$text=change('/([pPbBmv])F([+]sa)$/','$1ur$2');
		storedata('7.1.102','sa',0);
	}
	/* RRta iddhAtoH (7.1.100) */
	elseif (arr($text,'/F[+]sa$/'))
	{
		$text=change('/F([+]sa)$/','ir$1');
		storedata('7.1.100','sa',0);
	}
	/* masjinazorjhali (7.1.60) */
	if (in_array($fo,array("wumasjo!","RaSa!")) && sub(array("masj","naS"),array("+"),array("sa"),0) )
	{
		$text = three(array("masj","naS"),array("+"),array("sa"),array("mansj","nanS"),array("+"),array("sa"),0);
		storedata('7.1.60','sa',0);
	}
	/* bhrasjo ropadhayoH ramanyatarasyAm (6.4.47) */
	if (in_array($fo,array("Brasja!")) && sub(array("Brasj"),array("+sa"),blank(0),0) )
	{
		$text = two(array("Brasj"),array("+sa"),array("Barj"),array("+sa"),1);
		storedata('6.4.47','sa',0);
	}
	/* mRjervRddhiH (7.2.114) */
	if (  $fo==="mfjU!" && arr($text,'/mfj[+][i]*sa$/') )
	{
		$text=two(array("mfj"),array("+sa","+isa"),array("mArj"),array("+sa","+isa"),0);
		storedata('7.2.114','sa',0);
	}
	$vrasca = array("vfSc","vraSc","sfj","mfj","yaj","rAj","BrAj","devej","parivrAj","Bfj","ftvij","mArj","vraSc","Brasj","sraj","sfaj","Barj","vrASc","vrAc","vrac","BrAj","BArj");
	$vrashca = array("vfSz","vraSz","sfz","mfz","yaz","rAz","BrAz","devez","parivrAz","Bfz","ftviz","mArz","vraSz","Brasz","sraz","sfaz","Barz","vrAz","vrAz","vraz","BrAz","BArz");
	if (in_array($fo,array("o!vraScU!","sfja!","mfja!","yaja!","rAjf!","wuBrAjf!","Bfja!","mfjU!","Brasja!")) && sub($vrasca,array("+"),array("sa"),0)  )
	{
		if (sub($vrasca,array("+sa"),blank(0),0))
		{
		$text = two($vrasca,array("+sa"),$vrashca,array("+sa"),0);
		}
		storedata('8.2.36','sa',0);
		$vras = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
	}
	if (arr($text,'/[CS][+]sa$/'))
	{
		$text = change('/[CS][+]sa/','z+sa');
		storedata('8.2.36','sa',0);
		$vras=1;
	}
	/* nimittApAye naimittikasyApyapAyaH (paribhASA) */
	if (( arr($text,'/Sz/') && sub(array("vfSz","vraSz"),blank(0),blank(0),0))  || arr($text,'/cz/'))
	{
		$text = one(array("vfSz","vraSz"),array("vfsz","vrasz"),0);
		$text = one(array("cz"),array("z"),0);
		storedata('par@56-1','sa',0);
	}
	/* skoH saMyogAdyorante ca (8.2.29) */
	if (arr($text,'/s['.pc('hl').'][+]sa/'))
	{
		$text = change('/s(['.pc('hl').'][+]sa)/','$1');
		storedata('8.2.29','sa',0);
	}
	/* coH kuH (8.2.30) */
	$coku=0; global $cu, $ku;
	if (arr($text,'/['.flat($cu).'][+]*[sz]a$/'))
	{
		$text = two($cu,array("+sa","+za"),$ku,array("+sa","+za"),0);
		storedata('8.2.30','sa',0);
		$coku=1; // 0 - doesn't prevent kvinpratyayasya kuH. 1 - prevents kvinpratyayasya kuH.
	}
	/* dAderdhAtorghaH (8.2.32) */
	if (arr($text,'/['.pc('hl').'][+][sz]a$/') && sub(array("dah","dAh","dih","duh","dfh","drAh","druh","deh"),array("+sa"),blank(0),0) )
	{
		$text = two(array("dah","dAh","dih","duh","dfh","drAh","druh","deh"),array("+sa"),array("daG","dAG","diG","duG","dfG","drAG","druG","deG"),array("+sa"),0);
		storedata('8.2.32','sa',0);
	}
	/* naho dhaH (8.2.34) */
	elseif (in_array($fo,array("Raha!")) && (arr($text,'/h[+][sz]a$/') ) && sub(array("nah","nAh"),blank(0),blank(0),0) )
	{
		$text = one(array("nah+sa","nAh+sa"),array("naD+sa","nAD+sa"),0);
		storedata('8.2.34','sa',0);
	}
	/* ho DhaH (8.2.31) */
	elseif (arr($text,'/[h][+][sz]a$/') )
	{
		$text = change('/[h]([+][sz]a)$/','Q$1');
		storedata('8.2.31','sa',0);
	}
	/* ekAco bazo bhaS jhaSantasya sdhvoH (8.2.37) */
	if ( arr($text,'/[bgqd](['.pc('al').']*)[JBGQD][+][sz]a$/')  )
	{
		ekAcobazo(); // created a new function 19/12/2014.
	}
	/* SaDhoH kassi (8.2.41) */
	if (arr($text,'/[zQ][+]sa$/') )
	{
		$text = change('/[zQ][+]sa$/','k+sa');
		storedata('8.2.41','sa',0);
	}
	/* nazcApadAntasya jhali (8.3.24) */
	if (arr($text,'/[mn][+]sa$/') )
	{
	$text = two(array('m','n'),array("+sa"),array('M','M'),array("+sa"),0);
		storedata('8.3.24','sa',0);
	}
	/* AdezapratyayayoH (8.3.59) */
	if (arr($text,'/^[+]*[iu][+]s/') && preg_match('/^z/',$fo))
	{
		$text = change('/^([+]*[iu][+])s/','$1z');
		storedata('8.3.59','sa',0);
	}
	/* khari ca (8.4.55) */
	$Jl1 = array("J","B","G","Q","D","j","b","g","q","d","K","P","C","W","T","c","w","t","k","p","S","z","s","h"); // complete jhal.
	$Jl2 = array("J","B","G","Q","D","j","b","g","q","d","K","P","C","W","T","h"); // jhal without car.
    while(arr($text,'/[JBGQDjbgqdKPCWTh]([+]*)['.pc('Kr').']/')) // this rule can apply add infinitum.
    {
        if ( (arr($text,'/[JBGQDjbgqdKPCWTcwtkpSzsh]([+]*)['.pc('Kr').']/') || $dhut === 1))
        {
        $text = two($Jl1,prat('Kr'),savarna(prat('Jl'),prat('cr')),prat('Kr'),0);
		storedata('8.4.55','sa',0);
        }
    }
	return $text;
}
function liT_ajAdi()
{
	global $text, $caG, $lakAra, $verb_without_anubandha, $storedata, $us, $verbset;
	/* ajAderdvitIyasya (6.1.2) */
	if (anekAca($verb_without_anubandha) )
	{
		storedata('6.1.2','pa',0);
		$text=change('/^([^+]*['.pc('ac').'])(['.pc('hl').'MH]*['.pc('ac').'])[+]/','$1$2+$2+');
		$text=one(array("UrRu+rRu"),array("UrRu+nu"),0);
		storedata('6.1.8','sa',0);
	}
	else
	{
		storedata('6.1.1','pa',0);
		$text=change('/^(['.pc('ac').'][^+]*)[+]/','$1+$1+');
		/* liTi dhAtoranabhyAsasya (6.1.8) */
		storedata('6.1.8','sa',0);
	}
	/* halAdiH zeSaH (7.4.60) */
	if(arr($text,'/^(['.pc('ac').'])[^+]*[+]/') && !arr($text,'/UrRu/'))
	{
		$text = change('/^(['.pc('ac').'])([^+]*)[+]/','$1+');
		storedata('7.4.60','sa',0);
	}
	/* urat (7.4.66) */
	if (arr($text,'/^[fF][+]/'))
	{
		$text=change('/^[fF][+]/','a+');
		storedata('7.4.66','sa',0);
	}
	/* ata AdeH (7.4.70) */
	if (arr($text,'/^[a]/') )
	{
		$text=change('/^[a]/','A');
		storedata('7.4.70','sa',0);
		/* tasmAnnuDdvihalaH (7.4.71) */
		if(arr($text,'/^[A][+]a(['.pc('hl').'MH]['.pc('hl').'MH])/'))
		{
			$text=change('/^[A][+]a(['.pc('hl').'MH]['.pc('hl').'MH])/','A+na$1');
			storedata('7.4.71','sa',0);
		}
		if(arr($text,'/^([^+]*[+])f(['.pc('hl').'MH])/'))
		{
			$text=change('/^([^+]*[+])f(['.pc('hl').'MH])/','$1nf$2');
			storedata('nuqviDO fkAra','sa',0);
		}
		/* aznotezca (7.4.72) */
		if(arr($text,'/^A[+]aS[+]/') && $verbset==="svAdi")
		{
			$text=change('/^A[+]aS[+]/','A+naS+');
			storedata('7.4.72','sa',0);
		}
	}
	return $text;
}

function liT_halAdi()
{
	global $text; global $storedata, $us;
	storedata('6.1.1','pa',0);
	if(arr($text,'/^(['.pc('hl').'MH]+['.pc('ac').'][^+]*)[+]/'))
	{
		$text=change('/^(['.pc('hl').'MH]+['.pc('ac').'][^+]*)[+]/','$1+$1+');
	}
	storedata('6.1.8','sa',0);
	return $text;
}

function abhyAsa_halAdi()
{
	global $text, $zlu, $zluvat; global $caG; global $lakAra; global $fo; global $storedata, $us, $verbset, $sanAdi; global $liT_Adeza, $coku, $cu, $ku, $san, $id_dhAtu, $id_pratyaya;
	/* zlau (6.1.10) */
	if( ($zlu===1||$zluvat===1) && arr($text,'/^(['.pc('al').'MH]+[^+]*)[+]/'))
	{
		$text=change('/^(['.pc('al').'MH]+[^+]*)[+]/','$1+$1+');
		storedata('6.1.10','sa',0);
	}
	/* liTyabhyAsasyobhayeSAm (6.1.17) */
	elseif($zlu!==1 && $lakAra==="liw"  && (in_array($fo,array("brUY","Yizvapa!","vaca!","jyA","graha!","vaya!","vyaDa!","vaSa!","vyaca!","o!vraScU!","praCa!","Brasja!"))||(in_array($fo,array("yaja!","quvapa!","vaha!","veY","vyeY","hveY","vada!","wuo!Svi!","vaca!","vasa!"))&&$verbset==="BvAdi")) && sub(array("vac+vac+","svap+svap+","yaj+yaj+","vap+vap+","vah+vah+","vas+vas+","vad+vad+","ve+ve+","hve+hve+","Svi+Svi+","vye+vye+","grah+grah+","jyA+jyA+","vay+vay+","vyaD+vyaD+","vaS+vaS+","vyac+vyac+","vraSc+vraSc+","pracC+pracC+","Brasj+Brasj+"),blank(0),blank(0),0) && !in_array($sanAdi,array("yaN","yaNluk","san")))
	{
		$text=one(array("vac+vac+","svap+svap+","yaj+yaj+","vap+vap+","vah+vah+","vas+vas+","vad+vad+","ve+ve+","hve+hve+","Svi+Svi+","vye+vye+","grah+grah+","jyA+jyA+","vay+vay+","vyaD+vyaD+","vaS+vaS+","vyac+vyac+","vraSc+vraSc+","pracC+pracC+","Brasj+Brasj+"),array("uc+vac+","sup+svap+","ij+yaj+","up+vap+","uh+vah+","us+vas+","ud+vad+","u+ve+","hu+hve+","Su+Svi+","vi+vye+","gfh+grah+","ji+jyA+","uy+vay+","viD+vyaD+","uS+vaS+","vic+vyac+","vfSc+vraSc+","pfcC+pracC+","Bfsj+Brasj+"),0);
		storedata('6.1.17','sa',0);
		storedata('6.1.108','sa',0);
	}
	if (sub(array("vyaT+vyaT+"),blank(0),blank(0),0) && !in_array($sanAdi,array("yaN","yaNluk")))
	{
		$text=one(array("vyaT+vyaT+"),array("viT+vyaT+"),0);
		storedata('7.4.68','sa',0);
		storedata('6.1.108','sa',0);
	}
	if (sub(array("dyut+dyut+","svap+svap+"),blank(0),blank(0),0) && !in_array($sanAdi,array("yaN","yaNluk")))
	{
		$text=one(array("dyut+dyut+","svap+svap+"),array("dit+dyut+","sup+svap+"),0);
		storedata('7.4.67','sa',0);
		storedata('6.1.108','sa',0);
	}
	/* changes to abhyAsa */
	/* zarpUrvAH khayaH (7.4.61) */
	if (arr($text,'/^[Szs]['.pc('Ky').']['.pc('hl').']*['.pc('ac').'][^+]*[+]/'))
	{
		$text = change('/^[Szs](['.pc('Ky').'])['.pc('hl').']*(['.pc('ac').'])[^+]*[+]/','$1$2+');
		storedata('7.4.61','sa',0);
	}
	/* halAdiH zeSaH (7.4.60) */
	elseif(arr($text,'/^(['.pc('hl').']*['.pc('ac').'])([^+]*)[+]/'))
	{
		$text = change('/^(['.pc('hl').'])['.pc('hl').'MH]*(['.pc('ac').'])([^+]*)[+]/','$1$2+'); // jaglO
		$text = change('/^(['.pc('ac').'])([^+]*)[+]/','$1+');
		storedata('7.4.60','sa',0);
	}
	/* urat (7.4.66) */
	if (arr($text,'/^([^+]*)[fF][+]/'))
	{
		$text = change('/^([^+]*)[fF][+]/','$1a+');
		storedata('7.4.66','sa',0);
		$liT_Adeza=1;
	}
	/* hrasvaH (7.4.59) */
	if (arr($text,'/^([^+]*)[AIUeoEO][+]/'))
	{
		$text=change('/^([^+]*)A[+]/','$1a+');
		$text=change('/^([^+]*)I[+]/','$1i+');
		$text=change('/^([^+]*)U[+]/','$1u+');
		$text=change('/^([^+]*)e[+]/','$1i+');
		$text=change('/^([^+]*)o[+]/','$1u+');
		$text=change('/^([^+]*)E[+]/','$1i+');
		$text=change('/^([^+]*)O[+]/','$1u+');
		storedata('7.4.59','sa',0);
	}
	/* na kavateryaGi (7.4.63) */
	if($fo==="kuN" && $verbset==="BvAdi" && $sanAdi==="yaN")
	{
		storedata('7.4.63','sa',0);
	}
	/* kuhozcuH (7.4.62) */
	elseif(arr($text,'/^[^+]*[kKgGNh][^+]*[+]/'))
	{
		$text=change('/^([^+]*)k([^+]*[+])/','$1c$2');
		$text=change('/^([^+]*)K([^+]*[+])/','$1C$2');
		$text=change('/^([^+]*)g([^+]*[+])/','$1j$2');
		$text=change('/^([^+]*)G([^+]*[+])/','$1J$2');
		$text=change('/^([^+]*)N([^+]*[+])/','$1Y$2');
		$text=change('/^([^+]*)h([^+]*[+])/','$1j$2');
		storedata('7.4.62','sa',0);
		$liT_Adeza=1;
	}
	/* abhyAse carca (8.4.54) */
	if (arr($text,'/^[^+]*[JBGQDKPCWT][^+]*[+]/'))
	{
		$text=change('/^([^+]*)J([^+]*[+])/','$1j$2');
		$text=change('/^([^+]*)B([^+]*[+])/','$1b$2');
		$text=change('/^([^+]*)G([^+]*[+])/','$1g$2');
		$text=change('/^([^+]*)Q([^+]*[+])/','$1q$2');
		$text=change('/^([^+]*)D([^+]*[+])/','$1d$2');
		$text=change('/^([^+]*)K([^+]*[+])/','$1k$2');
		$text=change('/^([^+]*)P([^+]*[+])/','$1p$2');
		$text=change('/^([^+]*)C([^+]*[+])/','$1c$2');
		$text=change('/^([^+]*)W([^+]*[+])/','$1w$2');
		$text=change('/^([^+]*)T([^+]*[+])/','$1t$2');
		storedata('8.4.54','sa',0);
		$liT_Adeza=1;
	}
	/* abhyAsAcca (7.3.55) */
	if (arr($text,'/ja[+]h[aA]n[+]/') && in_array($fo,array("hana!")))
	{
		$text=one(array("ja+han+","ja+hAn+"),array("ja+Gan+","ja+GAn+"),0);
		storedata('7.3.55','sa',0);
	}
	/* saH syArdhadhAtuke (7.4.49) */
	if (arr($text,'/s\+s/') && $id_dhAtu==="aniw" && $id_pratyaya==="aniw")
	{
		$text = one(array("s+s"),array("t+s",),0);
		storedata('7.4.49','sa',0);
	}
	if ($zlu===1||$zluvat===1)
	{
		/* bhRJAmit (7.4.76) */
		if(in_array($fo,array("quBfY","mAN","o!hAN")) && sub(array("ba+Bf","ma+mA","ja+hA"),array("+"),blank(0),0))
		{
			$text=two(array("ba+Bf","ma+mA","ja+hA"),array("+"),array("bi+Bf","mi+mA","ji+hA"),array("+"),0);
			storedata('7.4.76','sa',0);
		}
		/* artipipartyozca (7.4.77) */
		elseif(in_array($fo,array("f","pF","pf")) && sub(array("a+f","pa+pF","pa+pf"),array("+"),blank(0),0))
		{
			$text=two(array("a+f","pa+pF","pa+pf"),array("+"),array("i+f","pi+pF","pi+pf"),array("+"),0);
			storedata('7.4.77','sa',0);
			/* aci znudhAtubhruvAM yvoriyaGuvaGau (6.4.77) */
			// patch for 'f' juhotyAdi.
			if (arr($text,'/^i[+]f[+]/'))
			{
				$text = change('/^i[+]f[+]/','iy+f+');
				storedata('6.4.77','sa',3);
			}
		}
		/* nijAM trayANAM guNaH zlau (7.4.75) */
		elseif(in_array($fo,array("Riji!r","viji!r","vizx!")) && sub(array("ni+nij","vi+vij","vi+viz"),array("+"),blank(0),0))
		{
			$text=two(array("ni+nij","vi+vij","vi+viz"),array("+"),array("ne+nij","ve+vij","ve+viz"),array("+"),0);
			storedata('7.4.75','sa',0);
		}
		/* bahulaM Chandasi (7.4.78) */
		elseif(in_array($fo,array("Gf","hf","f","sf","gA")) && sub(array("ja+Gf","ja+hf","a+f","sa+sf","ja+gA"),array("+"),blank(0),0))
		{
			$text=two(array("ja+Gf","ja+hf","a+f","sa+sf","ja+gA"),array("+"),array("ji+Gf","ji+hf","i+f","si+sf","ji+gA"),array("+"),0);
			storedata('7.4.78','sa',0);
		}
		$text = change('/^([^+]*)[+]/','$1'); // Making it anekAc.
	}
	/* Ato lopa iTi ca (6.4.64) */
	if (arr($text,'/^[^+]+[+][^+]+A[+]a[+]/') && $caG===1)
	{
		$text = change('/^([^+]+[+][^+]+)A[+]a[+]/','$1+a+');
		storedata('6.4.64','sa',0);
	}
}
function yaG_abhyAsa_special()
{
	global $text;	global $caG; global $lakAra; global $fo; global $storedata, $us, $verbset, $sanAdi; global $liT_Adeza;
	/* nugato'nunAsikasya (7.4.85) */
	if (arr($text,'/^([^+]*)a[+]([^+]*[YmNRn])$/'))
	{
		$text=change('/^([^+]*)a[+]([^+]*[YmNRn])$/','$1aM$2');
		storedata('7.4.85','sa',0);
	}
	/* japajabhadahadazabhaJjapazAM ca (7.4.86) */
	elseif (sub(array("ja+jap","ja+jaB","da+dah","pa+paS","da+daS","ba+Baj"),blank(0),blank(0),0))
	{
		$text=one(array("ja+jap","ja+jaB","da+dah","pa+paS","da+daS","ba+Baj"),array("janjap","janjaB","dandah","panpaS","dandaS","banBaj"),0);
		storedata('7.4.86','sa',0);
	}
	/* nIgvaJcusraMsudhvaMsubhraMsukasapatapadaskandAm (7.4.84) */
	elseif (sub(array("va+vac","sa+sras","da+Dvas","ba+Bras","ca+kas","pa+pat","pa+pad","ca+skad"),blank(0),blank(0),0) && !in_array($fo,array("vaca!")))
	{
		$text=one(array("va+vac","sa+sras","da+Dvas","ba+Bras","ca+kas","pa+pat","pa+pad","ca+skad"),array("vanI+vac","sanI+sras","danI+Dvas","banI+Bras","canI+kas","panI+pat","panI+pad","canI+skad"),0);
		storedata('7.4.84','sa',0);
	}
	/* caraphalozca (7.4.87) and utparasyAtaH (7.4.88) */
	elseif (sub(array("ca+car","pa+Pal"),blank(0),blank(0),0))
	{
		$text=one(array("ca+car","pa+Pal"),array("cancar","panPal"),0);
		storedata('7.4.87','sa',0);
		$text=one(array("cancar","panPal"),array("cancur","panPul"),0);
		storedata('7.4.88','sa',0);
	}
	/* rugrikau ca luki (7.4.91) */
	elseif (arr($text,'/^([^+]*)a[+]([^+]*f[^+]{1})$/') && $sanAdi==="yaNluk")
	{
		$text=change('/^([^+]*)a[+]([^+]*f[^+]{1})$/','$1arI+$2');
		$text=one(array("arI+"),array("ari+"),1);
		$text=one(array("arI+"),array("ar+"),1);
		storedata('7.4.91','sa',0);
	}
	/* rIgRdupadhasya ca (7.4.90) */
	elseif (arr($text,'/^([^+]*)a[+]([^+]*f[^+]{1})$/'))
	{
		$text=change('/^([^+]*)a[+]([^+]*f[^+]{1})$/','$1arI+$2');
		storedata('7.4.90','sa',0);
	}
	/* Rtaza(7.4.92) */
	elseif (arr($text,'/^([^+]*)a[+]([^+]*f)$/') && $sanAdi==="yaNluk")
	{
		$text=change('/^([^+]*)a[+]([^+]*f)$/','$1arI+$2');
		$text=one(array("arI+"),array("ari+"),1);
		$text=one(array("arI+"),array("ar+"),1);
		storedata('7.4.92','sa',0);
	}
	/* rIgRtvata iti vaktavyam (vA 7.4.90-1) */
	elseif (arr($text,'/^([^+]*)a[+]([^+]*f[^+]*)$/'))
	{
		$text=change('/^([^+]*)a[+]([^+]*f[^+]*)$/','$1arI+$2');
		storedata('7.4.90-1','sa',0);
	}
	/* guNo yaGlukoH (7.4.82) */
	elseif (arr($text,'/^([^+]*)i[+]/'))
	{
		$text=change('/^([^+]*)i[+]/','$1e+');
		storedata('7.4.82','sa',0);
	}
	/* guNo yaGlukoH (7.4.82) */
	elseif (arr($text,'/^([^+]*)u[+]/'))
	{
		$text=change('/^([^+]*)u[+]/','$1o+');
		storedata('7.4.82','sa',0);
	}
	/* dIrgho'kitaH (7.4.83) */
	elseif (arr($text,'/^([^+]*)a[+][^+]*/'))
	{
		$text=change('/^([^+]*)a([+][^+]*)/','$1A$2');
		storedata('7.4.83','sa',0);
	}
	/* dIrgho'kitaH (7.4.83) */
	// Patch because of optional forms in these three by ye vibhASA.
	if (sub(array("ja+jAn","sa+sAn","ca+KAn"),blank(0),blank(0),0) && in_array($fo,array("janI!","zana!","Kanu!")))
	{
		$text=change('/^([^+]*)a[+]/','$1A+');
		storedata('7.4.83','sa',0);
	}
	/* guNo yaGlukoH (7.4.82) */
	if (arr($text,'/^ji[+]GnI$/'))
	{
		$text=change('/^ji[+]GnI$/','je+GnI');
		storedata('7.4.82','sa',0);
	}
	return $text;
}
function san()
{
	global $text, $atolopa; global $storedata, $us, $sanAdi, $fo;
	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		if (preg_match('/[a]$/',$parts[0]) && !preg_match('/^['.pc('hl').']*['.pc('ac').']['.pc('hl').']['.pc('hl').']/',$parts[1]) && !preg_match('/^[AIUFXeoEO]/',$parts[1]) && !in_array($parts[1],array("smar","dar","tvar","praT","mrad","star","spaS")) )
		{
			$parts[0]=preg_replace('/([a])$/','i',$parts[0]);
			$sanyata=1;
		}
		$val1[]=implode('+',$parts);
	}
	$text = $val1;
	/* atsmRdRtvaraprathamradastRRspazAm (7.4.95) */
	if (in_array($parts[1],array("smar","dar","tvar","praT","mrad","star","spaS","smari","dari","tvari","praTi","mradi","stari","spaSi")))
	{
		$text = one(array("si+smar","di+dar","ti+tvar","pi+praT","mi+mrad","ti+star","pi+spaS","si+smari","di+dari","ti+tvari","pi+praTi","mi+mradi","ti+stari","pi+spaSi"),array("sa+smar","da+dar","ta+tvar","pa+praT","ma+mrad","ta+star","pa+spaS","sa+smari","da+dari","ta+tvari","pa+praTi","ma+mradi","ta+stari","pa+spaSi"),0);
		storedata('7.4.95','sa',0);
	}
	/* vibhASA veSTiceSTyoH (7.4.96) */
	elseif (in_array($parts[1],array("vezw","cezw","vezwi","cezwi")))
	{
		$text = one(array("vi+vezw","ci+cezw"),array("va+vezw","ca+cezw"),1);
		storedata('7.4.96','sa',0);
	}
	/* I ca gaNaH (7.4.97) */
	elseif (in_array($parts[1],array("gaR","gaRi")))
	{
		$text = one(array("ja+gaR"),array("jI+gaR"),0);
		storedata('7.4.97','sa',0);
	}
	/* sanyataH (7.4.79) */
	elseif ($sanyata===1)
	{
		storedata('7.4.79','sa',0);
	}

	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		if (preg_match('/[u]$/',$parts[0]) && preg_match('/^[pPbBmyrlvj][a]/',$parts[1]) )
		{
			$parts[0]=preg_replace('/([u])$/','i',$parts[0]);
			$ohpuyan=1;
		}
		$val3[]=implode('+',$parts);
	}
	$text = $val3;
	/* oH puyaNjyapare (7.4.80) */
	if ($ohpuyan===1)
	{
		storedata('7.4.80','sa',0);
	}

	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		$val4[]=implode('+',$parts);
		if (in_array($sanAdi,array("Ric","san")) && preg_match('/[u]$/',$parts[0]) && in_array($parts[1],array("srav","Srav","drav","prav","plav","cyav",)) )
		{
			$parts[0]=preg_replace('/([u])$/','i',$parts[0]);
			$sravati=1;
			$val4[]=implode('+',$parts);
		}
	}
	$text = $val4;
	/* sravatizRNotidravatipravatiplavaticyavatInAM vA (7.4.81) */
	if ($sravati===1)
	{
		storedata('7.4.81','sa',0);
	}
	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		if (arr(array($value),'/^[^+]*[aiufx][+]['.pc('hl').']{1}['.pc('ac').']['.pc('hl').']/') && !arr(array($value),'/^[^+]*[aiufx][+]['.pc('hl').']*['.pc('ac').']['.pc('hl').']['.pc('hl').']/') && !in_array($parts[1],array("smar","dar","tvar","praT","mrad","star","spaS")) )
		{
			$parts[0]=preg_replace('/([a])$/','A',$parts[0]);
			$parts[0]=preg_replace('/([i])$/','I',$parts[0]);
			$parts[0]=preg_replace('/([u])$/','U',$parts[0]);
			$parts[0]=preg_replace('/([f])$/','F',$parts[0]);
			$parts[0]=preg_replace('/([x])$/','X',$parts[0]);
			$dirgholagho=1;
		}
		$val2[]=implode('+',$parts);
	}
	$text = $val2;
	/* dIrgho laghoH (7.4.94) */
	if ($dirgholagho===1)
	{
		storedata('7.4.94','sa',0);
	}
	/* AdezapratyayayoH (8.3.59) */
	if (arr($text,'/^[^+]*[iIuUfFxXeEoOhyvrlkKgGN][+]s/') && preg_match('/^z/',$fo))
	{
		$text = change('/^([^+]*[iIuUfFxXeEoOhyvrlkKgGN][+])s/','$1z');
		storedata('8.3.59','sa',0);
		$Adezapratyaya=1;
	}

}

function firstmember($a,$b)
{
	foreach ($a as $value)
	{
		$parts=explode('[\+]',$value);
		if (preg_match($b,$parts[0]))
		{
			$can[]=1;
			break;
		}
		else
		{
			$cal[]=0;
		}
	}
	if (in_array(1,$can))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function zlu()
{
	global $first, $text, $juhotyAdia, $juhotyAdib, $tiG, $storedata, $so, $pada, $us;
	// taking replacements directly from sahajabodha p 329. Only hu's process is shown. For everything else there is direct substitution.
	$juhotyAdireplace1=array("kiki","kikit","gAgA","GiGf","jajan","tutur","dAdA","daDan","dADA","diDiz","nenij","pipf","pipF","baBas","biBI","biBfMS","mimA","vevij","veviz","sisf","hihA","hahA","huhu","hihf","jihrI","if");
	$juhotyAdireplace2=array("kiki","kikit","gigA","GiGf","jajan","tutur","dadA","daDan","daDA","diDiz","nenij","pipf","pipF","baBas","biBI","biBfMS","mimA","vevij","veviz","sisf","hihA","hahA","huhu","hihf","jihrI","if",);
	/* bhRJAmit (7.4.76) */
	if(sub(array("BfY","mAN","o!hAN"),array("+"),blank(0),0))
	{
		$text=two(array("BfY","mAN","o!hAN"),array("+"),array("biBf","mimA","jihA"),array("+"),0);
		storedata('6.1.10','sa',0);
		storedata('7.4.76','sa',0);
	}
	elseif( (arr($text,'/^f[+]/')||arr($text,'/^pF[+]/')) && sub(array("f","pF",),array("+"),blank(0),0))
	{
		$text=change('/^f[+]/','if+');
		$text=change('/^pF[+]/','pipar+');
		storedata('6.1.10','sa',0);
		storedata('7.4.77','sa',0);
	}
	elseif(sub(array("Riji!r","viji!r","vizx!"),array("+"),blank(0),0))
	{
		$text=two(array("Riji!r","viji!r","vizx!"),array("+"),array("nenij","vevij","veviz"),array("+"),0);
		storedata('6.1.10','sa',0);
		storedata('7.4.75','sa',0);
	}
	else
	{
		$text=two($juhotyAdia,array("+"),$juhotyAdireplace1,array("+"),0);
		$text=change('/(['.pc('hl').']+)if[+]/','$1f+');
		storedata('6.1.10','sa',0);
		$text=two($juhotyAdireplace1,array("+"),$juhotyAdireplace2,array("+"),0);
		storedata('7.4.59','sa',0);
	}
	if (sub(array("kiki","kikit","gagA","GiGf","hahA","huhu","hihf","hihrI","gigA"),array("+"),array_merge($tiG,array("Am")),0))
	{
		$text=three(array("kiki","kikit","gagA","GiGf","hahA","huhu","hihf","hihrI","gigA"),array("+"),array_merge($tiG,array("Am")),array("ciki","cikit","jagA","JiGf","JahA","Juhu","Jihf","JihrI","jigA"),array("+"),array_merge($tiG,array("Am")),0);
		storedata('7.4.62','sa',0);
	}
	if (sub(array("JiGf","JahA","Juhu","Jihf","JihrI"),array("+"),array_merge($tiG,array("Am")),0))
	{
		$text=three(array("JiGf","JahA","Juhu","Jihf","JihrI"),array("+"),array_merge($tiG,array("Am")),array("jiGf","jahA","juhu","jihf","jihrI"),array("+"),array_merge($tiG,array("Am")),0);
		storedata('8.4.54','sa',0);
	}
	if (sub(array("JiGf","JahA","Juhu","Jihf","JihrI"),array("+"),array_merge($tiG,array("Am")),0))
	{
		$text=three(array("JiGf","JahA","Juhu","Jihf","JihrI"),array("+"),array_merge($tiG,array("Am")),array("jiGf","jahA","juhu","jihf","jihrI"),array("+"),array_merge($tiG,array("Am")),0);
		storedata('8.4.54','sa',0);
	}
}
/* function storedata to store necessary information for display later on. */
function storedata($sutra_number,$style,$note)
{
	global $text, $storedata, $us, $removed_sutras, $debugmode, $first, $so, $jsonmode;
	$text = change('/[+]+/','+'); // To remove double consecutive + signs before storing.
	if (!in_array($style,array("pa","hn","st","red"))) { $style="sa"; }
	if (!isset($note)) { $note=0; }
	if (!in_array($sutra_number,$removed_sutras) && $jsonmode!==1)
	{
		$storedata[]=array($text,$sutra_number,$style,$note,$us,$first,$so);
	}
	elseif (in_array($sutra_number,$removed_sutras) && $jsonmode!==1)
	{
		$prevdata = array_pop($storedata);
		$text = $prevdata[0];
		$storedata[]=array($text,$sutra_number,'drop',$note,$us,$first,$so);
	}
	elseif (!in_array($sutra_number,$removed_sutras) && $jsonmode===1)
	{
		$storedata[]=array('text' => $text, 'sutra_num' => $sutra_number, 'style' => $style, 'note' => $note, 'upasarga' => $us, 'input' => $first, 'suffix' => $so);
	}
	elseif (in_array($sutra_number,$removed_sutras) && $jsonmode===1)
	{
		$prevdata = array_pop($storedata);
		$text = $prevdata[0];
		$storedata[]=array('text' => $text, 'sutra_num' => $sutra_number, 'style' => 'drop', 'note' => $note, 'upasarga' => $us, 'input' => $first, 'suffix' => $so);
	}
	// debug details
	if ($debugmode===3)
	{
		echo 'sutra '.$sutra_number.' - '; print_r($text); echo "<br/>\n";
	}
}
/* Read applied sUtras from storedata */
function sutrasfromstoredata()
{
	global $storedata;
	$output = array();
	foreach ($storedata as $value)
	{
		$output[]=$value[1];
	}
	return $output;
}
/* displaying from the storedata */
function display_from_storedata()
{
	global $storedata, $text, $us;
	$htmloutput = '';
	foreach ($storedata as $value)
	{
		gui3($value[0],$value[1],$value[2],$value[3],$value[4],$htmloutput);
		$laststoredata = $value[-1];
	}
}
/* printing from the storedata to HTML file */
function print_from_storedata()
{
	global $storedata, $outfile;
	foreach ($storedata as $value)
	{
		fputs($outfile,print_to_file($value[0],$value[1],$value[2],$value[3]));
	}
}
//$text,$sutra_number,$style,$note,$us
function shortendisplaydata($storestore)
{
	global $frontend, $storedata, $debug, $debugmode;
	global $ASdata, $vdata, $miscdata, $upasarga_joined, $otherdata, $paribhASAdata; // bringing $text from main php function.
	$totaldata = array_merge($ASdata, $vdata, $miscdata, $otherdata, $paribhASAdata);
	foreach($storestore as $val)
	{
		$storedata = $val;
		foreach($storedata as $value)
		{
			$sutralist[] = $value[1];
		}
	}
	$sutralist = array_unique($sutralist);
	$matches = array();
	foreach ($sutralist as $sutra_number)
	{
			$output = array_filter($totaldata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
			$matches = array_merge($output,$matches);
	}
	$matches = array_unique($matches);
	$matches = array_values($matches);
	return $matches;
}
function gui3($text,$sutra_number,$style,$note,$us,$htmloutput)
{
	global $shortdata;
	global $frontend, $storedata, $debug, $debugmode, $tran;
	global $ASdata, $vdata, $miscdata, $upasarga_joined, $otherdata, $paribhASAdata; // bringing $text from main php function.
	if (strpos($sutra_number,'~')!==false && $frontend==='1')
	{
		$matches = array_filter($shortdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		$msg_no[$i] = $int[0];
		$msg_eng[$i] = $int[1];
		$msg_dev[$i] = $int[2];
		if ($msg_no[$i] === $sutra_number)
		{
		//$htmloutput = $htmloutput."<p class = ".$style." >$msg_eng[$i]</p>\n";
		$htmloutput = $htmloutput."<p class = ".$style." >$msg_dev[$i]</p>\n";
		$htmloutput=$htmloutput.display3($text,$note,$us);
		}
	}
	elseif (strpos($sutra_number,'@')!==false && $frontend==='1')
	{
		$matches = array_filter($shortdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		$msg_no[$i] = $int[0];
		$msg_eng[$i] = $int[1];
		$msg_dev[$i] = $int[2];
		if ($msg_no[$i] === $sutra_number)
		{
		//$htmloutput=$htmloutput."<p class = ".$style." >$msg_eng[$i]</p>\n";
		$htmloutput=$htmloutput."<p class = ".$style." >$msg_dev[$i]</p>\n";
		$htmloutput=$htmloutput.display3($text,$note,$us);
		}
	}
	elseif (strpos($sutra_number,'-')===false && arr(array($sutra_number),'/\./') && $frontend==='1') // AS numbers are 1.1.1 format. Vartikas are in 1.1.1-1 format. So, - is the delimiter which is differentiating point.
	{
		$matches = array_filter($shortdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one such match.
		// The data in $ASdata is in "sutra_no:sutra_type:sutra_dev" format.
		$sutra_no[$i] = $int[0];
		$sutra_type[$i] = $int[1];
		$sutra_dev[$i] = $int[2];
		if ($debug===1 && $debugmode<2){ dibug('GUI ASDATA ANALYSIS END');}
		if ($sutra_no[$i] === $sutra_number)
		{
		//	$htmloutput=$htmloutput."<p class = ".$style." >By ".toiast($sutra_dev[$i])." (".link_sutra($sutra_number).") :</p>\n";
		//	$htmloutput=$htmloutput."<p class = ".$style." >".$sutra_dev[$i]." (".convert($sutra_number).") :</p>\n";
			$htmloutput=$htmloutput."<p class = ".$style." >".$sutra_dev[$i]." (".link_sutra($sutra_number).") :</p>\n";
			$htmloutput=$htmloutput.display3($text,$note,$us);
		}
	}
	elseif (strpos($sutra_number,'-')!==false && $frontend==='1')
	{
		$matches = array_filter($shortdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		// Data in $vdata is in "$vartika_no:$vartika" format.
		$vartika_no[$i] = $int[0];
		$sutra_dev[$i] = $int[1];
		if ($vartika_no[$i] === $sutra_number)
		{
		//	$htmloutput=$htmloutput."<p class = ".$style." >By ".toiast($sutra_dev[$i])." (vA ".link_vartika($sutra_number).") :</p>\n";
		//	$htmloutput=$htmloutput."<p class = ".$style." >".convert($sutra_dev[$i])." (वा ".convert($sutra_number).") :</p>\n";
		$htmloutput=$htmloutput."<p class = ".$style." >".convert($sutra_dev[$i])." (वा ".link_vartika($sutra_number).") :</p>\n";
		$htmloutput=$htmloutput.display3($text,$note,$us);
		}
	}
	elseif ($frontend==='1') // For $miscdata for displaying miscellaneous information.
	{
		$matches = array_filter($shortdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]);
		$vartika_no[$i] = $int[0];
		$sutra_dev[$i] = $int[1];
		if ($vartika_no[$i] === $sutra_number)
		{
		//	$htmloutput=$htmloutput."<p class = ".$style." >By ".toiast($sutra_dev[$i])." :</p>\n";
			$htmloutput=$htmloutput."<p class = ".$style." >".convert($sutra_dev[$i])." :</p>\n";
		//	$htmloutput=$htmloutput."<p class = ".$style." >".toiast($sutra_dev[$i])." :</p>\n";
			$htmloutput=$htmloutput.display3($text,$note,$us);
		}
	}
	echo $htmloutput;
}

/* Function gui to overcome issues pointed out in https://github.com/drdhaval2785/SanskritVerb/issues/125 */
// matches function makes the code fast. Earlier we were using a for loop over vdata / ASdata which was very costly. matches function is derived from the answer of Aleks G from http://stackoverflow.com/questions/12315536/search-for-php-array-element-containing-string
function gui($text,$sutra_number,$style,$note,$us)
{
	global $frontend, $storedata, $debug, $debugmode;
	global $ASdata, $vdata, $miscdata, $upasarga_joined, $otherdata, $paribhASAdata; // bringing $text from main php function.
	if (!in_array($style,array("pa","hn","st","red","drop"))) { $style="sa"; }
	if (!isset($note)) { $note=0; }
	if ($debug===1 && $debugmode<2){ dibug('GUI START');}
	if (strpos($sutra_number,'~')!==false && $frontend==='1')
	{
		$matches = array_filter($otherdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		$msg_no[$i] = $int[0];
		$msg_eng[$i] = $int[1];
		$msg_dev[$i] = $int[2];
		if ($msg_no[$i] === $sutra_number)
		{
		echo "<p class = ".$style." >$msg_eng[$i]</p>\n";
		echo "<p class = ".$style." >$msg_dev[$i]</p>\n";
		display2($text,$note,$us);
		}
	}
	elseif (strpos($sutra_number,'@')!==false && $frontend==='1')
	{
		$matches = array_filter($paribhASAdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		$msg_no[$i] = $int[0];
		$msg_eng[$i] = $int[1];
		$msg_dev[$i] = $int[2];
		if ($msg_no[$i] === $sutra_number)
		{
		echo "<p class = ".$style." >$msg_eng[$i]</p>\n";
		echo "<p class = ".$style." >$msg_dev[$i]</p>\n";
		display2($text,$note,$us);
		}
	}
	elseif (strpos($sutra_number,'-')===false && arr(array($sutra_number),'/\./') && $frontend==='1') // AS numbers are 1.1.1 format. Vartikas are in 1.1.1-1 format. So, - is the delimiter which is differentiating point.
	{
		$matches = array_filter($ASdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one such match.
		// The data in $ASdata is in "sutra_no:sutra_type:sutra_dev" format.
		$sutra_no[$i] = $int[0];
		$sutra_type[$i] = $int[1];
		$sutra_dev[$i] = $int[2];
		if ($debug===1 && $debugmode<2){ dibug('GUI ASDATA ANALYSIS END');}
		if ($sutra_no[$i] === $sutra_number)
		{
			echo "<p class = ".$style." >By ".toiast($sutra_dev[$i])." (".link_sutra($sutra_number).") :</p>\n";
			echo "<p class = ".$style." >".$sutra_dev[$i]." (".convert($sutra_number).") :</p>\n";
			display2($text,$note,$us);
		}
	}
	elseif (strpos($sutra_number,'-')!==false && $frontend==='1')
	{
		$matches = array_filter($vdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		// Data in $vdata is in "$vartika_no:$vartika" format.
		$vartika_no[$i] = $int[0];
		$sutra_dev[$i] = $int[1];
		if ($vartika_no[$i] === $sutra_number)
		{
			echo "<p class = ".$style." >By ".toiast($sutra_dev[$i])." (vA ".link_vartika($sutra_number).") :</p>\n";
			echo "<p class = ".$style." >".convert($sutra_dev[$i])." (वा ".convert($sutra_number).") :</p>\n";
			display2($text,$note,$us);
		}
	}
	elseif ($frontend==='1') // For $miscdata for displaying miscellaneous information.
	{
		$matches = array_filter($miscdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]);
		$vartika_no[$i] = $int[0];
		$sutra_dev[$i] = $int[1];
		if ($vartika_no[$i] === $sutra_number)
		{
			echo "<p class = ".$style." >By ".toiast($sutra_dev[$i])." :</p>\n";
			echo "<p class = ".$style." >".convert($sutra_dev[$i])." :</p>\n";
			display2($text,$note,$us);
		}
	}
	if ($debug===1 && $debugmode<2){ dibug('GUI END');}
}
/* Function gui2 to use in case we don't want to display the word (e.g. before entering prakriyA e.g. dhAtu pada etc. */
// matches function makes the code fast. Earlier we were using a for loop over vdata / ASdata which was very costly. matches function is derived from the answer of Aleks G from http://stackoverflow.com/questions/12315536/search-for-php-array-element-containing-string
function gui2($sutra_number)
{
	$style="st";
	$response = '';
	global $ASdata, $vdata, $miscdata, $frontend, $paribhASAdata, $jsonmode; global $upasarga_joined; global $us, $outfile, $otherdata; // bringing $text from main php function.
	if (strpos($sutra_number,'~')!==false && $frontend==='1')
	{
		$matches = array_filter($otherdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		$msg_no[$i] = $int[0];
		$msg_eng[$i] = $int[1];
		$msg_dev[$i] = $int[2];
		if ($msg_no[$i] === $sutra_number)
		{
			if ($jsonmode!==1){
				echo "<p class = ".$style." >$msg_eng[$i]</p>\n";
				echo "<p class = ".$style." >$msg_dev[$i]</p>\n";
				echo "<hr/>";
				fputs($outfile,"<p class = ".$style." >$msg_eng[$i]</p>\n");
				fputs($outfile,"<p class = ".$style." >$msg_dev[$i]</p>\n");
				fputs($outfile,"<hr/>");
				}
			$response = $msg_eng[$i];
		}
	}
	elseif (strpos($sutra_number,'@')!==false && $frontend==='1')
	{
		$matches = array_filter($paribhASAdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		$msg_no[$i] = $int[0];
		$msg_eng[$i] = $int[1];
		$msg_dev[$i] = $int[2];
		if ($msg_no[$i] === $sutra_number)
		{
			if ($jsonmode!==1){
				echo "<p class = ".$style." >$msg_eng[$i]</p>\n";
				echo "<p class = ".$style." >$msg_dev[$i]</p>\n";
				echo "<hr/>";
				fputs($outfile,"<p class = ".$style." >$msg_eng[$i]</p>\n");
				fputs($outfile,"<p class = ".$style." >$msg_dev[$i]</p>\n");
				fputs($outfile,"<hr/>");
				}
			$response = $msg_eng[$i];
		}
	}
	elseif (strpos($sutra_number,'-')===false && strpos($sutra_number,'.')!==false && $frontend==='1')
	{
		$matches = array_filter($ASdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one such match.
		$sutra_no[$i] = $int[0];
		$sutra_type[$i] = $int[1];
		$sutra_dev[$i] = $int[2];
		if ($sutra_no[$i] === $sutra_number)
		{
			if ($jsonmode!==1){
				echo "<p class = ".$style." >By ".toiast($sutra_dev[$i])." (".link_sutra($sutra_number).") :</p>\n";
				echo "<p class = ".$style." >".$sutra_dev[$i]." (".convert($sutra_number).") :</p>\n";
				echo "<hr/>";
				/*fputs($outfile,"<p class = ".$style." >By ".toiast($sutra_dev[$i])." (".link_sutra($sutra_number).") :</p>\n");
				fputs($outfile,"<p class = ".$style." >".$sutra_dev[$i]." (".convert($sutra_number).") :</p>\n");
				fputs($outfile,"<hr/>");*/
				}
			$response = toiast($sutra_dev[$i]);
		}
	}
	elseif (strpos($sutra_number,'-')!==false && strpos($sutra_number,'.')!==false && $frontend==='1')
	{
		$matches = array_filter($vdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]);
		$vartika_no[$i] = $int[0];
		$sutra_dev[$i] = $int[1];
		if ($vartika_no[$i] === $sutra_number)
		{
			if ($jsonmode!==1){
				echo "<p class = ".$style." >By ".toiast($sutra_dev[$i])." (vA ".link_vartika($sutra_number).") :</p>\n";
				echo "<p class = ".$style." >".convert($sutra_dev[$i])." (वा ".convert($sutra_number).") :</p>\n";
				echo "<hr/>";
				fputs($outfile,"<p class = ".$style." >By ".toiast($sutra_dev[$i])." (vA ".link_vartika($sutra_number).") :</p>\n");
				fputs($outfile,"<p class = ".$style." >".convert($sutra_dev[$i])." (वा ".convert($sutra_number).") :</p>\n");
				fputs($outfile,"<hr/>");
				}
			$response = toiast($sutra_dev[$i]);
		}
	}
	elseif ( $frontend==='1') // For $miscdata for displaying miscellaneous information.
	{
		$matches = array_filter($miscdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]);
		$vartika_no[$i] = $int[0];
		$sutra_dev[$i] = $int[1];
		if ($vartika_no[$i] === $sutra_number)
		{
			if ($jsonmode!==1){
				echo "<p class = ".$style." >By ".toiast($sutra_dev[$i])." :</p>\n";
				echo "<p class = ".$style." >".convert($sutra_dev[$i])." :</p>\n";
				echo "<hr/>";
				/*fputs($outfile,"<p class = ".$style." >By ".toiast($sutra_dev[$i])." :</p>\n");
				fputs($outfile,"<p class = ".$style." >".convert($sutra_dev[$i])." :</p>\n");
				fputs($outfile,"<hr/>");*/
				}
			$response = toiast($sutra_dev[$i]);
		}
	}
	return $response;
}
/* Function print_to_file prints the output from storedata to the local HTML file for viewing later. */
function print_to_file($text,$sutra_number,$style,$note)
{
	global $frontend, $storedata, $outfile;
	if (!in_array($style,array("pa","hn","st","red"))) { $style="sa"; }
	if (!isset($note)) { $note=0; }
	global $ASdata, $vdata, $miscdata, $upasarga_joined, $us, $otherdata; // bringing $text from main php function.
	if (strpos($sutra_number,'~')!==false && $frontend==='1')
	{
		$matches = array_filter($otherdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		$msg_no[$i] = $int[0];
		$msg_eng[$i] = $int[1];
		$msg_dev[$i] = $int[2];
		if ($msg_no[$i] === $sutra_number)
		{
			echo "<p class = ".$style." >$msg_eng[$i]</p>\n";
			echo "<p class = ".$style." >$msg_dev[$i]</p>\n";
			echo "<hr/>";
			fputs($outfile,"<p class = ".$style." >$msg_eng[$i]</p>\n");
			fputs($outfile,"<p class = ".$style." >$msg_dev[$i]</p>\n");
			fputs($outfile,"<hr/>");
		}
	}
	elseif (strpos($sutra_number,'-')===false && $frontend==='1') // AS numbers are 1.1.1 format. Vartikas are in 1.1.1-1 format. So, - is the delimiter which is differentiating point.
	{
		$matches = array_filter($ASdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one such match.
		// The data in $ASdata is in "sutra_no:sutra_type:sutra_dev" format.
		$sutra_no[$i] = $int[0];
		$sutra_type[$i] = $int[1];
		$sutra_dev[$i] = $int[2];
		if ($sutra_no[$i] === $sutra_number)
		{
			fputs($outfile,"<p class = ".$style." >By ".toiast($sutra_dev[$i])." (".link_sutra($sutra_number).") :</p>\n");
			fputs($outfile,"<p class = ".$style." >".$sutra_dev[$i]." (".convert($sutra_number).") :</p>\n");
			print2($text,$note);
		}
	}
	elseif (strpos($sutra_number,'-')!==false && $frontend==='1')
	{
		$matches = array_filter($vdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		// Data in $vdata is in "$vartika_no:$vartika" format.
		$vartika_no[$i] = $int[0];
		$sutra_dev[$i] = $int[1];
		if ($vartika_no[$i] === $sutra_number)
		{
			fputs($outfile,"<p class = ".$style." >By ".toiast($sutra_dev[$i])." (vA ".link_vartika($sutra_number).") :</p>\n");
			fputs($outfile,"<p class = ".$style." >".convert($sutra_dev[$i])." (वा ".convert($sutra_number).") :</p>\n");
			print2($text,$note);
		}
	}
	elseif ($frontend==='1') // For $miscdata for displaying miscellaneous information.
	{
		$matches = array_filter($miscdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]);
		$vartika_no[$i] = $int[0];
		$sutra_dev[$i] = $int[1];
		if ($vartika_no[$i] === $sutra_number)
		{
			fputs($outfile,"<p class = ".$style." >By ".toiast($sutra_dev[$i])." :</p>\n");
			fputs($outfile,"<p class = ".$style." >".convert($sutra_dev[$i])." :</p>\n");
			print2($text,$note);
		}
	}
}
/* function tablemaker */
function tablemaker($ou)
{
	global $verbpada, $vAcya;
	if ($verbpada==='p')
	{
			echo "<table border='1'>
		<tr>
		<td>परस्मैपदम्‌</td>
		<td>एकवचनम्‌</td>
		<td>द्विवचनम्‌</td>
		<td>बहुवचनम्‌</td>
		</tr>
		<tr>
		<td>प्रथमपुरुषः</td>
		<td>$ou[0]</td>
		<td>$ou[1]</td>
		<td>$ou[2]</td>
		</tr>
		<tr>
		<td>मध्यमपुरुषः</td>
		<td>$ou[3]</td>
		<td>$ou[4]</td>
		<td>$ou[5]</td>
		</tr>
		<tr>
		<td>उत्तमपुरुषः</td>
		<td>$ou[6]</td>
		<td>$ou[7]</td>
		<td>$ou[8]</td>
		</tr>
		</table>
		";
	}
	elseif ($verbpada==='A')
	{
			echo "<table border='1'>
		<tr>
		<td>आत्मनेपदम्</td>
		<td>एकवचनम्‌</td>
		<td>द्विवचनम्‌</td>
		<td>बहुवचनम्‌</td>
		</tr>
		<tr>
		<td>प्रथमपुरुषः</td>
		<td>$ou[0]</td>
		<td>$ou[1]</td>
		<td>$ou[2]</td>
		</tr>
		<tr>
		<td>मध्यमपुरुषः</td>
		<td>$ou[3]</td>
		<td>$ou[4]</td>
		<td>$ou[5]</td>
		</tr>
		<tr>
		<td>उत्तमपुरुषः</td>
		<td>$ou[6]</td>
		<td>$ou[7]</td>
		<td>$ou[8]</td>
		</tr>
		</table>
		";
	}
	elseif ($verbpada==='u' && in_array($vAcya,array("bhAva","karmakartR")))
	{
			echo "<table border='1'>
		<tr>
		<td>परस्मैपदम्</td>
		<td>एकवचनम्‌</td>
		<td>द्विवचनम्‌</td>
		<td>बहुवचनम्‌</td>
		</tr>
		<tr>
		<td>प्रथमपुरुषः</td>
		<td>$ou[0]</td>
		<td></td>
		<td></td>
		</tr>
		<tr>
		<td>मध्यमपुरुषः</td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<tr>
		<td>उत्तमपुरुषः</td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		</table>
		";
		echo "<hr/>";
			echo "<table border='1'>
		<tr>
		<td>आत्मनेपदम्</td>
		<td>एकवचनम्‌</td>
		<td>द्विवचनम्‌</td>
		<td>बहुवचनम्‌</td>
		</tr>
		<tr>
		<td>प्रथमपुरुषः</td>
		<td>$ou[1]</td>
		<td></td>
		<td></td>
		</tr>
		<tr>
		<td>मध्यमपुरुषः</td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<tr>
		<td>उत्तमपुरुषः</td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		</table>
		";
	}
	elseif ($verbpada==='u')
	{
			echo "<table border='1'>
		<tr>
		<td>परस्मैपदम्</td>
		<td>एकवचनम्‌</td>
		<td>द्विवचनम्‌</td>
		<td>बहुवचनम्‌</td>
		</tr>
		<tr>
		<td>प्रथमपुरुषः</td>
		<td>$ou[0]</td>
		<td>$ou[1]</td>
		<td>$ou[2]</td>
		</tr>
		<tr>
		<td>मध्यमपुरुषः</td>
		<td>$ou[3]</td>
		<td>$ou[4]</td>
		<td>$ou[5]</td>
		</tr>
		<tr>
		<td>उत्तमपुरुषः</td>
		<td>$ou[6]</td>
		<td>$ou[7]</td>
		<td>$ou[8]</td>
		</tr>
		</table>
		";
		echo "<hr/>";
			echo "<table border='1'>
		<tr>
		<td>आत्मनेपदम्</td>
		<td>एकवचनम्‌</td>
		<td>द्विवचनम्‌</td>
		<td>बहुवचनम्‌</td>
		</tr>
		<tr>
		<td>प्रथमपुरुषः</td>
		<td>$ou[9]</td>
		<td>$ou[10]</td>
		<td>$ou[11]</td>
		</tr>
		<tr>
		<td>मध्यमपुरुषः</td>
		<td>$ou[12]</td>
		<td>$ou[13]</td>
		<td>$ou[14]</td>
		</tr>
		<tr>
		<td>उत्तमपुरुषः</td>
		<td>$ou[15]</td>
		<td>$ou[16]</td>
		<td>$ou[17]</td>
		</tr>
		</table>
		";
	}

}
/* function tablemaker1 for subanta */
function tablemaker1($ou)
{
		echo "<table border='1'>
		<tr>
		<th>विभक्तिः/वचनम्‌</th>
		<th>एकवचनम्‌</th>
		<th>द्विवचनम्‌</th>
		<th>बहुवचनम्‌</th>
		</tr>
		<tr>
		<td>प्रथमा</td>
		<td>$ou[0]</td>
		<td>$ou[1]</td>
		<td>$ou[2]</td>
		</tr>
		<tr>
		<td>द्वितीया</td>
		<td>$ou[3]</td>
		<td>$ou[4]</td>
		<td>$ou[5]</td>
		</tr>
		<tr>
		<td>तृतीया</td>
		<td>$ou[6]</td>
		<td>$ou[7]</td>
		<td>$ou[8]</td>
		</tr>
		<tr>
		<td>चतुर्थी</td>
		<td>$ou[9]</td>
		<td>$ou[10]</td>
		<td>$ou[11]</td>
		</tr>
		<tr>
		<td>पञ्चमी</td>
		<td>$ou[12]</td>
		<td>$ou[13]</td>
		<td>$ou[14]</td>
		</tr>
		<tr>
		<td>षष्ठी</td>
		<td>$ou[15]</td>
		<td>$ou[16]</td>
		<td>$ou[17]</td>
		</tr>
		<tr>
		<td>सप्तमी</td>
		<td>$ou[18]</td>
		<td>$ou[19]</td>
		<td>$ou[20]</td>
		</tr>
		<tr>
		<td>सम्बोधनम्‌</td>
		<td>$ou[21]</td>
		<td>$ou[22]</td>
		<td>$ou[23]</td>
		</tr>
		</table>
		";
}
function timestamp()
{
	global $start_time, $argv;
	echo (microtime(true) - $start_time);
	if (isset($argv[0]))
	{
		echo "\n";
	}
	else
	{
		echo "<br/>";
	}
}
function dibug($a)
{
	global $time, $text, $debugmode, $argv, $first, $second, $lakAra;
	if ($debugmode>2)
	{
		echo $a.','; print_r($text);
	}
	else
	{
		echo $a.','.$first.','.$second.','.$lakAra.','; timestamp();
	}
}
function verbformlist()
{
	$inputtext = file_get_contents('Data/verbforms_gerard.txt');
	$controllist = explode(',',$inputtext);
	$inputtext1 = file_get_contents('Data/verbforms_amba.txt');
	$controllist1 = explode(',',$inputtext1);
	$okprelim = file('Data/okforms.txt');
	$okfinal=array();
	foreach ($okprelim as $okp)
	{
		$okfinal[] = explode('-',$okp)[0];
	}
	$finallist = array_merge($controllist,$controllist1,$okfinal);
	return $finallist;
}
function verblist()
{
	$inputtext = file_get_contents('Data/verblist_gerard.txt');
	$controllist = explode(',',$inputtext);
	return $controllist;
}
function verbnumberlist()
{
	global $verbdata;
	foreach($verbdata as $datum)
	{
		$split = explode(':',$datum);
		echo "$split[3].$split[4] ";
	}
}
function abridged_verbnumberlist()
{
	global $verbdata;
	$inputtext = file_get_contents('Data/verblist_gerard.txt');
	$verbsingerard = explode(',',$inputtext);
	foreach($verbdata as $datum)
	{
		$split = explode(':',$datum);
		if(in_array($split[2],$verbsingerard))
		{
		echo "$split[3].$split[4] ";
		}
	}
}
// $list is the array to test. $verblist is the established list of correct forms from Gerard's database. $strength may be set to "full" or "fast"
function wrongformlist($list,$verblist,$strength="full")
{
	global $verb_without_anubandha, $first, $number, $verbset, $lakAra, $suffix, $suspectentryfile, $verbsingerard;
	$diff = array_diff($list,$verblist);
	if ($strength==="full"||in_array($verb_without_anubandha,$verbsingerard))
	{
		for($i=0;$i<18;$i++)
		{
			if (isset($diff[$i]))
			{
				$membersplit = explode(',',$diff[$i]);
				//$diff1 = array_diff($membersplit,$verblist);
				foreach($membersplit as $mem)
				{
					if (!in_array($mem,$verblist))
					{
						if (substr($mem,-1)==="H" && in_array(substr($mem,0,-1)."s",$verblist) ) { }
						elseif (substr($mem,-1)==="H" && in_array(substr($mem,0,-1)."r",$verblist) ) { }
						elseif (substr($mem,-1)==="d" && in_array(substr($mem,0,-1)."t",$verblist) ) { }
						elseif (substr($mem,-3)==="tAd" && in_array(substr($mem,0,-3)."tu",$verblist) ) { }
						elseif (substr($mem,-3)==="tAt" && in_array(substr($mem,0,-3)."tu",$verblist) ) { }
						elseif (substr($mem,-5)==="Dvam" && in_array(substr($mem,0,-5)."Qvam",$verblist) ) { }
						elseif (preg_match('/AYcak/',$mem) ) { }
						else { fputs($suspectentryfile,$mem."-($first,$lakAra,$suffix[$i],$verbset,$number)\n"); }
					}
				}
			}
		}
	}
}
// Function which puts the output of tiGanta.php into a file.
function generatedforms($list,$outputfile)
{
	global $first, $number, $lakAra, $verbpada;
	$tiplist = array("<tip/>","<tas/>","<Ji/>","<sip/>","<Tas/>","<Ta/>","<mip/>","<vas/>","<mas/>","<ta/>","<AtAm/>","<Ja/>","<TAs/>","<ATAm/>","<Dvam/>","<iw/>","<vahi/>","<mahiN/>",);
	if ($verbpada==="A")
	{
		$startup = 9;
	}
	else
	{
		$startup = 0;
	}
	for($i=0;$i<count($list);$i++)
	{
		$split=explode(',',$list[$i]);
		foreach($split as $member)
		{
			fputs($outputfile,'<f form="'.$member.'"><root name="'.$first.'" num="'.$number.'"/><'.$lakAra.'/>'.$tiplist[$startup]."</f>\n");
		}
		$startup = $startup+1;
	}
}
function vidhisutraseparator($storedata)
{
	$vidhisutra = array();
	foreach ($storedata as $value)
	{
		if ($value[2] === "sa")
		{
			$vidhisutra[] = $value[1];
		}
	}
	$vidhisutra = array_unique($vidhisutra);
	$vidhisutra = array_values($vidhisutra);
	return $vidhisutra;
}
function allsutras($storedata)
{
	if (count($storedata)>0)
	{
		foreach ($storedata as $value)
		{
			if ($value[2] !== "drop")
			{
				$allsutra[] = $value[1];
			}
		}
		$allsutra = array_unique($allsutra);
		$allsutra = array_values($allsutra);
	}
	else
	{
		$allsutra = array();
	}
	return $allsutra;
}
function difflister($firstfile,$secondfile)
{
	$firstlist = file($firstfile);
	$firstlist = array_map('trim',$firstlist);
	$secondlist = file($secondfile);
	$secondlist = array_map('trim',$secondlist);
	return array_diff($firstlist,$secondlist);
}
/* Generate idit list */
function iditlistgenerator()
{
$iditverbs=array("ahi!","ahi!","aki!","agi!","aGi!","aci!","aji!","aWi!","ati!","adi!","abi!","aBi!","ACi!","iKi!","igi!","idi!","ivi!","IKi!","IKi!","Iji!","uKi!","uCi!","uCi!","kaWi!","fji!","o!laqi!","kasi!","kaki!","kaci!","kaWi!","kaWi!","kaqi!","kaqi!","kaqi!","kadi!","kadi!","kapi!","kAkzi!","kAci!","kuSi!","kusi!","kuji!","kuwi!","kuWi!","kuWi!","kuqi!","kuqi!","kuqi!","kuqi!","kuTi!","kudri!","kubi!","kubi!","kuBi!","kfvi!","kradi!","kradi!","kladi!","kladi!","klidi!","klidi!","kzaji!","kzaji!","kzapi!","Kaji!","Kaqi!","Kaqi!","Kuqi!","gaji!","gaqi!","gaqi!","guji!","guWi!","guqi!","gfji!","graTi!","Gawi!","GiRi!","Guzi!","GuRi!","GfRi!","cakzi!N","caqi!","caqi!","cadi!","capi!","citi!","cuwi!","cuqi!","cubi!","cubi!","Caji!","Cadi!","jasi!","jaji!","jaBi!","ji!","jivi!","jugi!","jfBi!","waki!","tasi!","tasi!","taki!","tagi!","taqi!","tatri!","tuji!","tuji!","tuji!","tuqi!","tuqi!","tubi!","tubi!","trasi!","traki!","tragi!","tradi!","triKi!","tvagi!","Taki!","daSi!","daSi!","dasi!","dasi!","daGi!","divi!","dfhi!","drAkzi!","Davi!","Divi!","Dfji!","DmAkzi!","Draji!","DrAkzi!","Dvaji!","DvAkzi!","RaKi!","wunadi!","Risi!","Riji!","Ridi!","Rivi!","pasi!","pasi!","paci!","paci!","paqi!","paqi!","paTi!","pisi!","piji!","piji!","piji!","piWi!","piqi!","piqi!","pivi!","puwi!","puqi!","puTi!","pfji!","bahi!","bawi!","bidi!","bugi!","bfhi!","bfhi!","Baji!","Baqi!","Baqi!","Badi!","Bidi!","BfSi!","mahi!","mahi!","maki!","maKi!","magi!","maGi!","maGi!","maci!","maWi!","maqi!","maqi!","maqi!","matri!","maTi!","madi!","mAkzi!","miji!","midi!","mivi!","muKi!","muji!","muWi!","muqi!","muqi!","mfqi!","yatri!","yugi!","rahi!","rahi!","raKi!","ragi!","raGi!","raGi!","ravi!","raPi!","rabi!","raBi!","riKi!","rigi!","rivi!","ruSi!","rusi!","ruwi!","ruWi!","ruWi!","ruqi!","laKi!","lagi!","laGi!","laGi!","laGi!","laGi!","laji!","laji!","laji!","laji!","laqi!","o!laqi!","labi!","labi!","laBi!","lACi!","lAji!","liKi!","ligi!","ligi!","liji!","luji!","luji!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lubi!","lubi!","vaki!","vaki!","vaKi!","vagi!","vaGi!","vawi!","vawi!","vawi!","vaWi!","vaqi!","vaqi!","vadi!","vAkzi!","vACi!","vugi!","bfhi!","bfhi!","vfji!","vraji!","Saki!","Saqi!","SiKi!","SiGi!","Siji!","SuWi!","SuWi!","SuWi!","Sraki!","Sragi!","SraTi!","Slaki!","Slagi!","Svaki!","Sragi!","Svaci!","SvaWi!","Svidi!","zasti!","zivi!","skaBi!","skudi!","zwaBi!","spadi!","sPuwi!","sPuwi!","sPuqi!","sPuqi!","sraki!","zvaki!","Sragi!","hisi!","hisi!","hiqi!","hivi!","huqi!","huqi!");
foreach($iditverbs as $value)
{
	$val = preg_replace('/i[!]$/','',$value);
	$val1[] = $val;
	$val2[] = preg_replace('/(['.pc('ac').'])([^'.pc('ac').']+)$/','$1n$2',$val);
}
echo '$iditverbs1=array("'.implode('","',$val2).'");<br/>';
echo '$iditverbs2=array("'.implode('","',$val1).'");';
}
/* function to find out errors in $verbdata */
// See https://github.com/drdhaval2785/SanskritVerb/issues/668 and https://github.com/drdhaval2785/SanskritVerb/issues/669
#"aMsa:samAGAte:aMsa:10:0460:u:sew:अं॑स॑:1420::1475"
function verbdataerrors()
{
	global $verbdata;
	foreach ($verbdata as $verbdatum)
	{
		list($verb[],$meaning[],$verb1[],$verbset[],$verbnumber[],$verbpada[],$verbit[],$deva[],$ma[],$ks[],$dh[],$uohyd[],$jnu[]) = explode(':',$verbdatum);
	}
	for($i=0;$i<count($verbdata);$i++)
	{
		for($j=$i+1;$j<count($verb);$j++)
		{
			if ($verbset[$i]===$verbset[$j] && $verbnumber[$i]===$verbnumber[$j])
			{
				echo $verbdata[$i]."<-->".$verbdata[$j]."\n";
				$j++;
			}
		}
		$i++;
	}
}
//verbdataerrors();

/* function to find non-curAdi adanta verbs (mostly errors) */
// See https://github.com/drdhaval2785/SanskritVerb/issues/729
function adantanoncurAdi()
{
	global $verbdata;
	foreach ($verbdata as $verbdatum)
	{
		list($verb[],$meaning[],$verb1[],$verbset[],$verbnumber[],$verbpada[],$verbit[],$deva[],$ma[],$ks[],$dh[],$uohyd[],$jnu[]) = explode(':',$verbdatum);
	}
	for ($i=0;$i<count($verb);$i++)
	{
		if (preg_match('/a$/',$verb[$i]) && $verbset[$i]!='10')
		{
			echo $verb[$i].":".$meaning[$i],":".$verb1[$i].":".$verbset[$i].":".$verbnumber[$i].":".$verbit[$i].":".$deva[$i].":".$ma[$i].":".$ks[$i].":".$dh[$i]."\n<br/>";
		}
	}
}
/* function multivowelverbs finds verbs having more than one vowel */
function multivowelverbs()
{
	global $verbdata;
	foreach ($verbdata as $verbdatum)
	{
		list($verb[],$meaning[],$verb1[],$verbset[],$verbnumber[],$verbpada[],$verbit[],$deva[],$ma[],$ks[],$dh[],$uohyd[],$jnu[]) = explode(':',$verbdatum);
	}
	for($i=0;$i<count($verb);$i++)
	{
		if (preg_match_all('/['.pc('ac').']/',$verb1[$i])>1 && $verbset[$i]!=="10")
		{
			echo $verbdata[$i]."\n";
			$i++;
		}
		elseif (preg_match_all('/['.pc('ac').']/',$verb[$i])>1 && preg_match('/[AiIuUfFxXeEoO]$/',$verb[$i]))
		{
			echo $verbdata[$i]."\n";
			$i++;
		}
	}

}
//multivowelverbs();
/* See issue https://github.com/drdhaval2785/SanskritVerb/issues/798 */
function sAdeza()
{
	global $verbdata;
	foreach ($verbdata as $verbdatum)
	{
		list($verb[],$meaning[],$verb1[],$verbset[],$verbnumber[],$verbpada[],$verbit[],$deva[],$ma[],$ks[],$dh[],$uohyd[],$jnu[]) = explode(':',$verbdatum);
	}
	for($i=0;$i<count($verb);$i++)
	{
		if (preg_match('/[iIuUfFxXeEoOhyvrlkKgGN]s/',$verb1[$i]))
		{
			echo $verbdata[$i]."\n";
			$i++;
		}
	}
}
//sAdeza();
function issue842()
{
	global $verbdata;
	foreach ($verbdata as $verbdatum)
	{
		list($verb[],$meaning[],$verb1[],$verbset[],$verbnumber[],$verbpada[],$verbit[],$deva[],$ma[],$ks[],$dh[],$uohyd[],$jnu[]) = explode(':',$verbdatum);
	}
	for($i=0;$i<count($verb);$i++)
	{
		if (preg_match('/[NYRnmM]['.pc('hl').']$/',$verb1[$i]) && $verbset[$i]==="10")
		{
			echo $verbdata[$i]."\n";
			$i++;
		}
	}
}
//issue842();
function issue910()
{
	global $verbdata;
	foreach ($verbdata as $verbdatum)
	{
		list($verb[],$meaning[],$verb1[],$verbset[],$verbnumber[],$verbpada[],$verbit[],$deva[],$ma[],$ks[],$dh[],$uohyd[],$jnu[]) = explode(':',$verbdatum);
	}
	for($i=0;$i<count($verb);$i++)
	{
		if ($verbit[$i]!=="sew" && $verbset[$i]==="10")
		{
			echo $verbdata[$i]."\n";
			$i++;
		}
	}
}
//issue910();


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
    global $kantha,$talu,$murdha,$danta,$oshtha,$nasika,$kanthatalu,$kanthoshtha,$dantoshtha,$sprushta,$ishatsprushta,$vivruta,$samvruta,$aghosha,$alpaprana,$ghosha,$mahaprana,$ac,$udatta,$anudatta,$svarita,$shvasa,$nada,$vivara,$samvara,$hl,$ru,$e,$type;
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
	if ($type==="savarna") {echo "The letters in the pratyAhAra with same sthAna (Asya) as the letter input are: ".implode(",",$sthanasamya)."</br>"; }
}
if(empty($abhyantara)===false)
{
$abhyantarasamya = array_intersect(flatten($abhyantara),$array);
	if ($type==="savarna") {echo "The letters in the pratyAhAra with the same Abhyantara prayatna as the letter input are: ".implode(",",$abhyantarasamya)."</br>"; }
}
if(empty($ghosh)===FALSE)
{
$ghoshasamya = array_intersect(flatten($ghosh),$array);
	if ($type==="savarna") {echo "The letters in the pratyAhAra with the same ghoSa as the letter input are: ".implode(",",$ghoshasamya)."</br>"; }
}
if(empty($prana)===FALSE)
{
$pranasamya = array_intersect(flatten($prana),$array);
	if ($type==="savarna") {echo "The letters in the pratyAhAra with the same prANa as the letter input are: ".implode(",",$pranasamya)."</br>"; }
}
if(empty($svar)===false)
{
if(in_array($text,$ac))
        { $svarasamya = array_intersect(flatten($svar),$array,$ac);
			if ($type==="savarna") {echo "The letters in the pratyAhAra with the same udAtta/anudAtta/svarita as the letter input are: ".implode(",",$svarasamya)."</br>"; }
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
    $tiG_sArvaDAtukalew_parasmai_1=array("ati","atas","anti","asi","aTas","aTa","ami","avas","amas");
    $tiG_sArvaDAtukalew_Atmane_1=array("ate","Ete","ante","ase","ETe","aDve","e","avahe","amahe");
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
    $tiG_sArvaDAtukalew_parasmai_2=array("ati","atas","anti","asi","aTas","aTa","ami","avas","amas");
    $tiG_sArvaDAtukalew_Atmane_2=array("ate","Ete","ante","ase","ETe","aDve","e","avahe","amahe");
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
        if ($lakAra==="sArvadhAtukalew" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_1,$tiG_sArvaDAtukalew_parasmai_1,$text);
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
        if ($lakAra==="sArvadhAtukalew" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_1,$tiG_sArvaDAtukalew_Atmane_1,$text);
        }
   }
   if($set===2)
   {
        if ($lakAra==="low" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_2,$tiG_low_parasmai_2,$text);
        }
        if ($lakAra==="laN" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_2,$tiG_laN_parasmai_2,$text);
        }
        if ($lakAra==="viDiliN" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_2,$tiG_viDiliN_parasmai_2,$text);
        }
        if ($lakAra==="sArvadhAtukalew" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_2,$tiG_sArvaDAtukalew_parasmai_2,$text);
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
        if ($lakAra==="sArvadhAtukalew" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_2,$tiG_sArvaDAtukalew_Atmane_2,$text);
        }
   }
    // patch for optional forms.
   // Patch for sArvadhAtuka leT forms is pending.
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
function generatesutrainfo()
{
	include 'dev-slp.php';
	global $ASdata, $vdata, $miscdata, $paribhASAdata, $otherdata;
	$result = array();
	foreach($ASdata as $asd){
		$split = explode(':', $asd);
		$result[$split[0]] = convert1($split[2]);
	}
	foreach($vdata as $asd){
		$split = explode(':', $asd);
		$result[$split[0]] = $split[1];
	}
	foreach($paribhASAdata as $asd){
		$split = explode(':', $asd);
		$result[$split[0]] = $split[1];
	}
	foreach($miscdata as $asd){
		$split = explode(':', $asd);
		$result[$split[0]] = $split[1];
	}
	foreach($otherdata as $asd){
		$split = explode(':', $asd);
		$result[$split[0]] = $split[1];
	}
	file_put_contents('../data/sutrainfo.json', json_encode($result));
}
generatesutrainfo();
?>
