console.log("hello");

var dept1 = new Array("Python", "Javascript", "Java Programming", "Web development", "C## programming", "C Programming", "React", "Django")
var itSoft = new Array("AWS Certification", "Ethical hacking", "Cyber Security", "Linux", "Information Security", "Shell Scripting", "Powershell", "macOS")
var design = new Array("Web Design", "Fashion Design", "Interior Design", "Architecture Desgin", "User Interface", "3D animation", "Graphics Design", "Illustration")
var business = new Array("Enterpreneurship", "Communication", "Management", "Industry", "E-Commerce", "Media", "Sales", "Project Management")
var photo = new Array("Photography", "Portrait", "Video Design", "Photography tools", "Commercials", "3D Modelling", "Film Making", "Video Production")
var music = new Array("Instrumental", "Music", "Music Fundamentals", "Vocal Music", "Music Software", "Song Writing", "Music Marketing", "Luthiery")
var teach = new Array("Engineering", "Science", "Mathematics", "Social Science", "Teacher Training", "Test Prep", "Language Learning", "Online Education")

function getDept(branch){
    for(i = document.Form1.sub_category.options.length - 1; i > 0; i--){
        document.Form1.sub_category.options.remove(i);
    }

    let cat = branch.options[branch.selectedIndex].value;

    if(cat != ""){
        if(cat == '2'){
            for (let i = 0; i < itSoft.length; i++) {
                let val = 9;
                document.Form1.sub_category.options[i] = new Option(itSoft[i])
                document.Form1.sub_category.options[i].value = val++;
            }
        }

        else if(cat == '1'){
            for (let i = 0; i < dept1.length; i++) {
                document.Form1.sub_category.options[i] = new Option(dept1[i])
                document.Form1.sub_category.options[i].value = i+1;
            }
        }

        else if(cat == '3'){
            let val = 17;
            for (let i = 0; i < design.length; i++) {
                document.Form1.sub_category.options[i] = new Option(design[i])
                document.Form1.sub_category.options[i].value = val++;
            }
        }

        else if(cat == '4'){
            let val = 25;
            for (let i = 0; i < business.length; i++) {
                document.Form1.sub_category.options[i] = new Option(business[i])
                document.Form1.sub_category.options[i].value = val++;
            }
        }
        
        else if(cat == '6'){
            let val = 33;
            for (let i = 0; i < photo.length; i++) {
                document.Form1.sub_category.options[i] = new Option(photo[i])
                document.Form1.sub_category.options[i].value = val++;
            }
        }

        else if(cat == '7'){
            let val = 41;
            for (let i = 0; i < music.length; i++) {
                document.Form1.sub_category.options[i] = new Option(music[i])
                document.Form1.sub_category.options[i].value = val++;
            }
        }
        else if(cat == '8'){
            let val = 49;
            for (let i = 0; i < teach.length; i++) {
                document.Form1.sub_category.options[i] = new Option(teach[i])
                document.Form1.sub_category.options[i].value = val++;
            }
        }
    }
}