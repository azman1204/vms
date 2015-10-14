function initMyKAD()
{
    try {
		obj = new ActiveXObject("MyKAD.MyKADACX");
        output= obj.InitDLL();
        return output;		
    }
    catch (err) {
    	alert(err);
    	obj={};
    	return 99;
    }
}
function freeMyKAD() 
{
    output = obj.FreeDLL();
    return output;
}
function closeReader()
{
    return obj.CloseReader();
}
function openReader(reader_port_1, reader_port_2)
{
    obj.ReaderPort1 = reader_port_1;
    obj.ReaderPort2 = reader_port_2;
    return obj.OpenReader();
}
function loadMyKAD()
{
    return obj.LoadMyKAD();
}
function unloadMyKAD()
{
    return obj.UnloadMyKAD();
}
function version()
{
    return obj.Version();
}

function setReadHolderName(v) { obj.bHolderName= v; }
function setICNo(v) { obj.bICNo= v; }
function setReadOldICNo(v) { obj.bOldICNo= v; }
function setReadAddress1(v) { obj.bAddress1= v; }
function setReadAddress2(v) { obj.bAddress2= v; }
function setReadAddress3(v) { obj.bAddress3= v; }
function setReadState(v) { obj.bState= v; }
function setReadPostCode(v) { obj.bPostCode= v; }
function setReadCity(v) { obj.bCity= v; }
function setReadReligion(v) { obj.bReligion= v; }
function setReadGender(v) { obj.bGender= v; }
function setReadBirthDate(v) { obj.bBirthDate= v; }
function setReadBirthPlace(v) { obj.bBirthPlace= v; }
function setReadRace(v) { obj.bRace= v; }
function setReadCitizenship(v) { obj.bCitizenship= v; }
function setReadDateIssued(v) { obj.bDateIssued= v; }
function setReadDateRegistered(v) { obj.bDateRegistered= v; }
function setReadPhoto(v) { obj.bPhoto= v; } // v is local full path filename

function readMyKAD()
{
    return obj.ReadMyKAD();
}
function holderName() { return obj.pHolderName; }	
function icNo() { return obj.pICNo; }	
function oldICNo() { return obj.pOldICNo; }	
function address1() { return obj.pAddress1; }	
function address2() { return obj.pAddress2; }	
function address3() { return obj.pAddress3; }	
function state() { return obj.pState; }	
function postcode() { return obj.pPostCode; }	
function city() { return obj.pCity; }	
function religion() { return obj.pReligion; }	
function gender() { return obj.pGender; }	
function birthDate() { return obj.pBirthDate; }	
function birthPlace() { return obj.pBirthPlace; }	
function race() { return obj.pRace; }	
function citizenship() { return obj.pCitizenship; }	
function dateIssued() { return obj.pDateIssued; }	
function dateRegistered() { return obj.pDateRegistered; }	
