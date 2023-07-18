let no_of_lec = 0;
var lecture_title = '';

function addLec(){
    lecture_title = document.getElementById('lecture_title').value;
    lec_title = lecture_title.slice(0,4);
    
    no_of_lec++
    let lec_section = document.getElementById(`add_lecture`)

    // console.log(lec_section.parentElement.parentElement.parentElement.parentElement)
    lec_section.parentElement.parentElement.parentElement.parentElement.innerHTML += `<div id="lec">
    <div>
        <p class="head" id="">Lecture ${no_of_lec} :</p>
        </div>
        
        <div id="title">
        <i class='bx bx-file'></i>
        <p id="lec_title">..</p>
        </div>

        <div id="content_btn">
            <button class="add_content" id="${no_of_lec}" onclick="addContent(this.id)">Content</button>
        </div>

        <div id="video_form">
        
        </div>

    </div>`

    // document.getElementById('lecture').style.display = 'none'
}

function addContent(video){
    let video_id = Number (video)
    console.log(video_id)

    let video_section = document.getElementById('add_lecture')
    // console.log(video_section)

    console.log(video_section.parentElement.parentElement.parentElement.parentElement.children[video_id+1])
    
    video_section.parentElement.parentElement.parentElement.parentElement.children[video_id+1].lastElementChild.innerHTML += `<form id="submit_lec">
    <input type="file" name="file" id="upload_video">
    <input type="hidden" value="${video_id}" name="video_lec_id" id="video_lec_id">
    <input type="submit" name="upload" value="upload" id="upload">
    </form>`
}
