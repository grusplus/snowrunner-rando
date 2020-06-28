main = () => {
    let truck1 = getTruck();
    let truck2 = getTruck("Crane", "Yes", truck1.Name, null);
    let truck3 = getTruck(null, null, truck1.Name, truck2.Name);

    console.log("CHOSEN ONES:");
    console.log(truck1.Name);
    console.log(truck2.Name);
    console.log(truck3.Name);
};

getTruck = (key = null, value = null, noTruckName1 = null, noTruckName2 = null) => {
    let truck = TRUCKS[Math.floor(Math.random() * TRUCKS.length)];

    if( (!key || truck[key] == value) && noTruckName1 != truck.Name && noTruckName2 != truck.Name){
        return truck;
    }

    return getTruck(key, value, noTruckName1, noTruckName2);
};

const TRUCKS = [
 {
   "Include": "Yes",
   "Name": "Ford CLT9000",
   "Type": "Highway",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "GMC MH9500",
   "Type": "Highway",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "International Transtar 4070A",
   "Type": "Highway",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Caterpillar CT680",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Chevrolet Kodiak C70",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Fleetstar F 2070A",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "White Western Star 4964",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Azov 42-20 Antarctic",
   "Type": "Heavy",
   "Crane": "No",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "Azov 73210",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Caterpillar 745C",
   "Type": "Heavy",
   "Crane": "No",
   "1 Cargo": "No",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "DAN 96320",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Derry Longhorn 3194",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Derry Longhorn 4520",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "KOLOB 74760",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "KOLOB 74941",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Pacific P12",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "No",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Pacific P16",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "No",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Western Star 6900 TwinSteer",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "ANK MK38",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Azov 5319",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Azov 64131",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Freightliner 114SD",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Freightliner M916A1",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "International Paystar 5070",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Royal BM17",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Step 310E",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Tayga 6436",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Voron AE-4380",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Voron D-53233",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "Voron Grad",
   "Type": "Heavy",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "Yes",
   "Name": "ZIKZ 5368",
   "Type": "Highway",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "Yes",
   "5 Cargo": "Yes",
   "High Saddle": "Yes"
 },
 {
   "Include": "No",
   "Name": "TUZ 16 \"Actaeon\"",
   "Type": "Scout",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "Chevrolet CK1500",
   "Type": "Scout",
   "Crane": "No",
   "1 Cargo": "?",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "DON 71",
   "Type": "Scout",
   "Crane": "No",
   "1 Cargo": "?",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "Hummer H2",
   "Type": "Scout",
   "Crane": "No",
   "1 Cargo": "?",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "International Loadstar 1700",
   "Type": "Scout",
   "Crane": "?",
   "1 Cargo": "Yes",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "KHAN Lo4F",
   "Type": "Scout",
   "Crane": "No",
   "1 Cargo": "?",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "Scout 800",
   "Type": "Scout",
   "Crane": "No",
   "1 Cargo": "?",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "TUZ 166",
   "Type": "Scout",
   "Crane": "No",
   "1 Cargo": "?",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "TUZ 420 \"Tatarin\"",
   "Type": "Scout",
   "Crane": "No",
   "1 Cargo": "No",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "YAR 87",
   "Type": "Scout",
   "Crane": "No",
   "1 Cargo": "Yes",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "Ford F 750",
   "Type": "Scout",
   "Crane": "Yes",
   "1 Cargo": "Yes",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 },
 {
   "Include": "Yes",
   "Name": "KHAN 39 Marshall",
   "Type": "Scout",
   "Crane": "No",
   "1 Cargo": "No",
   "2 Cargo": "No",
   "5 Cargo": "No",
   "High Saddle": "No"
 }
];

main();