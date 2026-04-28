

var messageCount = 0;

var lastMsgBy = "";





jQuery(document).on('click', '.iconInner', function (e) {

    jQuery(this).parents('.botIcon').addClass('showBotSubject');

    if (messageCount == 0) {

         aiMsg(`Hi! I am Ama bot. How can I assist you today?`)

        .then(() => {

            aiMsg("Choose Your Persona");

        })

        .then(() => {

           

            $('.Messages_list').append(

                '    <div class="msg d-flex justify-content-center "><a href = "#"><span class="avatar mr-3 girl-image" id = "girl-image" style="width:60px;cursor:pointer" onclick="setPersonal(1)"><figure id = "girl-image" style="background-image: url(img/girl.png)"></figure></span></a> <span onclick="setPersonal(0)" style="width:60px;cursor:pointer" class="avatar" id= "boy-image"><figure id= "boy-image" style="background-image: url(img/boy.png)"></figure></span></div>'

            );

        })

        .then(() => {

            messageCount = 1;

            $("[name='msg']").focus();

        });

            

    }

});


function setPersonal(type)
{
    // Save persona
    localStorage.setItem('personatype', type);

    // 🔥 Track selection
    trackPageClick([
        "persona_selection",              // parent_page
        type == 1 ? "female" : "male"     // value
    ]);

    userMsg("");
    startmessage();
}

function getPersonaType()

{

    let personatypeValue = localStorage.getItem('personatype');

    return personatypeValue;

}



jQuery(document).on('click', '.closeBtn, .chat_close_icon', function (e) {

    jQuery(this).parents('.botIcon').removeClass('showBotSubject');

    jQuery(this).parents('.botIcon').removeClass('showMessenger');

});



jQuery(document).on('submit', '#botSubject', function (e) {

    e.preventDefault();

    jQuery(this).parents('.botIcon').removeClass('showBotSubject');

    jQuery(this).parents('.botIcon').addClass('showMessenger');

});









let chatFlow = [];

function startmessage(){

    // goback(); return false;

    if (messageCount == 1) {

        aiMsg(`Alright Lets get started, What do you want to know more about ?`)

            .then(() => {

                // Append the HTML content without backticks

                $('.Messages_list').append(

                    '<div class="msg"><span class="avatar"></span><span class="responsText"><ul class=\'responsText-ai-ul\'>' +

                    '<li id = "career-id" class=\'responsText-ai-li-career-id\' onclick="sendMessage(this,\'2\',\'Career\')">Career</li>' +

                    '<li id = "institution-id" class=\'responsText-ai-li-institution-id\' onclick="sendMessage(this,\'2\',\'Institution\')">Institution</li>' +

                    '<li id = "entrance-exam-id" class=\'responsText-ai-li-entrance-exam-id\' onclick="sendMessage(this,\'2\',\'Entrance Exam\')">Entrance Exam</li>' +

                    '<li id = "scholarship-id" class=\'responsText-ai-li-scholarship-id\' onclick="sendMessage(this,\'2\',\'Scholarship\')">Scholarship</li>' +

                    '</ul></span></div>'

                );

            });



        messageCount = 2;

    }



}





function displayLoader() {



}

function sendMessage(element, tab, value) {

    // $(element).closest('.msg').hide();    

  userMsg(value);

  // ✅ Track flow
  chatFlow = []; // reset when new main category starts
  chatFlow.push(value);

//   trackPageClick(chatFlow);


        if (value == "Career") {

            $.ajax({

                type: 'post',

                url: 'backend/getData.php',

                data: { 'tab': '100' },

                beforeSend: function () {

                    displayLoader();

                },

                success: function (resp) {

                    resp = JSON.parse(resp);

                    if (resp.response == 1) {

                        // console.log(resp.data)

                        if (Array.isArray(resp.data)) {

                            // Create the message container

                            var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                            // Iterate over each element in resp.data

                            $.each(resp.data, function (index, item) {

                                // Append each item as a list item inside the ul

                                var listItem = $('<li class="responsText-ai-li" onclick="getCareerSubCat(this,\'3\', \'' + item.name + '\',\'' + item.id + '\')"></li>').text(item.name);

                                messageContainer.find('ul').append(listItem);

                                scrollToBottom()

                            });



                            // Append the constructed message container to the Messages_list

                            $('.Messages_list').append(messageContainer);

                            messageCount = 3;

                            lastMsgBy = "ai";

                        }

                        else {

                            goback();

                        }

                    }

                    else

                    {

                        goback();

                    }

                }

            });

        }

        else if (value == "Institution") {

            aiMsg(`Please select institution type.`)

                .then(() => {

                    $('.Messages_list').append(

                        '<div class="msg"><span class="avatar"></span><span class="responsText"><ul class=\'responsText-ai-ul\'>' +

                        '<li class=\'responsText-ai-li\' onclick="getInstitutionDomain(this,\'6\',\'Government\')">Government</li>' +

                        '<li class=\'responsText-ai-li\' onclick="getInstitutionDomain(this,\'6\',\'Private\')">Private</li>' +

                        '</ul></span></div>'

                    );

                });

        }

        else if (value == "Entrance Exam") {

            aiMsg(`Please select entrance exam type.`)

                .then(() => {

                    $('.Messages_list').append(

                        '<div class="msg"><span class="avatar"></span><span class="responsText"><ul class=\'responsText-ai-ul\'>' +

                        '<li class=\'responsText-ai-li\' onclick="getEntranceExamQualification(this,\'200\',1,\'Under Graduate\')">Under Graduate</li>' +

                        '<li class=\'responsText-ai-li\' onclick="getEntranceExamQualification(this,\'200\',2,\'Post Graduate\')">Post Graduate</li>' +

                        '<li class=\'responsText-ai-li\' onclick="getEntranceExamQualification(this,\'200\',3,\'Competitive exam for job\')">Competitive exam for job</li>' +

                        '</ul></span></div>'

                    );

                });

        }

        else if (value == "Scholarship") {

            aiMsg(`Please select Scholarship type.`)

                .then(() => {

                    $('.Messages_list').append(

                        '<div class="msg"><span class="avatar"></span><span class="responsText"><ul class=\'responsText-ai-ul\'>' +

                        '<li class=\'responsText-ai-li\' onclick="getScholarship(this,\'11\',1,\'Central\')">Central</li>' +

                        '<li class=\'responsText-ai-li\' onclick="getScholarship(this,\'11\',2,\'State\')">State</li>' +

                        '<li class=\'responsText-ai-li\' onclick="getScholarship(this,\'11\',3,\'Private\')">Private</li>' +

                        '<li class=\'responsText-ai-li\' onclick="getScholarship(this,\'11\',4,\'PSU\')">PSU</li>' +

                        '</ul></span></div>'

                    );

                });

        }

        else {

            notGet(2);

        }

    

}



// entrance exam start



function getEntranceExamQualification(element, tab, id, value) {

    userMsg(value);
    // ✅ Track flow
    chatFlow.push(value);
    $.ajax({

        type: 'post',

        url: 'backend/getData.php',

        data: { 'tab': '400', id },

        beforeSend: displayLoader,

        success: function (resp) {

            resp = JSON.parse(resp);

            if (resp.response == 1 && Array.isArray(resp.data)) {

                var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');

                resp.data.forEach(function (item) {

                    var listItem = $('<li class="responsText-ai-li" onclick="getlocationforentrance(this, \'' + item.id + '\', \'' + item.name + '\', \'' + id + '\')"></li>').text(item.name);

                    messageContainer.find('ul').append(listItem);

                    scrollToBottom()

                });

                $('.Messages_list').append(messageContainer);

                messageCount = 9;

                lastMsgBy = "ai";

            } else {

                goback();

            }

        }

    });

}



function getlocationforentrance(element, qualification_id, value, institute_typ) {

    userMsg(value);
    
    // ✅ Track flow
    chatFlow.push(value);
    aiMsg(`Please choose your location.`)

        .then(() => {

            $('.Messages_list').append(

                '<div class="msg"><span class="avatar"></span><span class="responsText"><ul class="responsText-ai-ul">' +

                '<li class="responsText-ai-li" onclick="getEntranceResult(this, 1, \'Odisha\', \'' + institute_typ + '\', \'' + qualification_id + '\')">Odisha</li>' +

                '<li class="responsText-ai-li" onclick="getEntranceResult(this, 2, \'All India\', \'' + institute_typ + '\', \'' + qualification_id + '\')">All India</li>' +

                '</ul></span></div>'

            );

        });

}



function getEntranceResult(element, location_id, value, institute_typ, qualification_id) {

    userMsg(value);
    chatFlow.push(value); // ✅ keep
   trackPageClick(chatFlow);

    $.ajax({
        type: 'post',
        url: 'backend/getData.php',
        data: { 'tab': '401', location_id, institute_typ, qualification_id },

        beforeSend: displayLoader,

        success: function (resp) {

            resp = JSON.parse(resp);

            if (resp.response == 1 && Array.isArray(resp.data)) {

                var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');

$.each(resp.data, function (index, item) {

    var listItem = $('<li class="responsText-ai-li"></li>');

    var name = $('<div>' + item.name + '</div>');

    // ✅ View Details
    var btn = $('<button>View Details</button>');
    btn.on('click', function () {

        // ✅ push into main flow
        chatFlow.push(item.name);
        chatFlow.push("View Details");

        trackPageClick(chatFlow, this);

        ScholarDetails(item.id);
    });

    // ✅ Visit Link
    var link = $('<a target="_blank" href="' + item.link + '">visit</a>');
link.on('click', function (e) {
    e.preventDefault();

    // ✅ ALWAYS build fresh final flow
    let finalFlow = [...chatFlow];

    // ✅ ensure last step is added properly
    finalFlow.push(item.name);
    finalFlow.push("Visit");

    console.log("FINAL FLOW:", finalFlow); // 🔍 debug

    trackPageClick(finalFlow, this);

    let url = this.href;

    setTimeout(() => {
        window.open(url, '_blank');
    }, 1200);
});

    listItem.append(name).append('<br>').append(btn).append('<br>').append(link);

    messageContainer.find('ul').append(listItem);
});

                $('.Messages_list').append(messageContainer);
            }
        }
    });
}


// entrance exam end



//scholarship start



function getScholarship(element, tab, id, value) {

    userMsg(value);

    // ✅ Track flow
    chatFlow.push(value);
    // trackPageClick(chatFlow);

    // ✅ CASE 1 → STATE (Class selection)
    if (id == 2) {

        aiMsg(`Please select Class`)
            .then(() => {
                $('.Messages_list').append(
                    '<div class="msg"><span class="avatar"></span><span class="responsText"><ul class=\'responsText-ai-ul\'>' +
                    '<li onclick="getScholarshipcls(this,\'11\',2,1,\'1st - 5th\')">1st - 5th</li>' +
                    '<li onclick="getScholarshipcls(this,\'11\',2,2,\'6th - 8th\')">6th - 8th</li>' +
                    '<li onclick="getScholarshipcls(this,\'11\',2,3,\'9th - 10th\')">9th - 10th</li>' +
                    '<li onclick="getScholarshipcls(this,\'11\',2,4,\'11th - 12th\')">11th - 12th</li>' +
                    '<li onclick="getScholarshipcls(this,\'11\',2,5,\'Under Graduate\')">Under Graduate</li>' +
                    '<li onclick="getScholarshipcls(this,\'11\',2,6,\'Post Graduate\')">Post Graduate</li>' +
                    '</ul></span></div>'
                );
            });

    } 
    // ✅ CASE 2 → DIRECT (Central, Private, PSU)
    else {

        $.ajax({
            type: 'post',
            url: 'backend/getData.php',
            data: { 'tab': '300', id },

            beforeSend: function () {
                displayLoader();
            },

            success: function (resp) {

                resp = JSON.parse(resp);

                if (resp.response == 1 && Array.isArray(resp.data)) {

                    var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');

                    $.each(resp.data, function (index, item) {

                        var listItem = $('<li class="responsText-ai-li"></li>');

                        var name = $('<div>' + item.name + '</div>');

                        var btn = $('<button>View Details</button>');
                        btn.on('click', function () {
                            const finalFlow = [...chatFlow, item.name, "View Details"];
                            trackPageClick(finalFlow, this);
                            ScholarDetails(item.id);
                        });

                        var link = $('<a target="_blank" href="' + item.link + '">visit</a>');
                        link.on('click', function () {
                            const finalFlow = [...chatFlow, item.name, "Visit"];
                            trackPageClick(finalFlow, this);
                        });

                        listItem.append(name).append('<br>').append(btn).append('<br>').append(link);

                        messageContainer.find('ul').append(listItem);
                    });

                    $('.Messages_list').append(messageContainer);
                    messageCount = 9;
                    lastMsgBy = "ai";

                } else {
                    goback();
                }
            }
        });
    }
}
function getScholarshipcls(element, tab, id,cls, value)

{
    userMsg(value);

    // ✅ Track flow
    chatFlow.push(value);
    // trackPageClick(chatFlow);

    $.ajax({

        type: 'post',

        url: 'backend/getData.php',

        data: { 'tab': '301', id,cls },

        beforeSend: function () {

            displayLoader();

        },

        success: function (resp) {

            resp = JSON.parse(resp)



            if (resp.response == 1) {

                if (Array.isArray(resp.data)) {

                    var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                    $.each(resp.data, function (index, item) {



var listItem = $('<li class="responsText-ai-li"></li>');

var name = $('<div>' + item.name + '</div>');

var btn = $('<button>View Details</button>');
btn.on('click', function () {
    const finalFlow = [...chatFlow, item.name, "View Details"];
    trackPageClick(finalFlow, this);
    ScholarDetails(item.id);
});

var link = $('<a target="_blank" href="' + item.link + '">visit</a>');
link.on('click', function () {
    const finalFlow = [...chatFlow, item.name, "Visit"];
    trackPageClick(finalFlow, this);
});

listItem.append(name).append('<br>').append(btn).append('<br>').append(link);

messageContainer.find('ul').append(listItem);
                        messageContainer.find('ul').append(listItem);

                        scrollToBottom()



                    });



                    // Append the constructed message container to the Messages_list

                    $('.Messages_list').append(messageContainer);

                    messageCount = 9;

                    lastMsgBy = "ai";

                }

                else {

                    goback();

                }



            }

            else

            {

                goback();

            }

        }

    });

}

function ScholarDetails(id) {

    $.ajax({

        type: 'post',

        url: 'backend/getData.php',

        data: { 'tab': '502', id },

        beforeSend: function () {

            displayLoader();

        },

        success: function (resp) {

                // $("#instituteModal-box").html('');

                // $("#instituteModal-box").append(resp);

                // $("#instituteDetails-modal").modal('show');

            

        }

    });

}

//scholarship end



//start institution filter

function getInstitutionDomain(element, tab, value) {

      // ✅ ADD THIS
    chatFlow.push(value);
    // trackPageClick(chatFlow);
    userMsg(value);

        $.ajax({

            type: 'post',

            url: 'backend/getData.php',

            data: { 'tab': '200', 'type': value },

            beforeSend: function () {

                displayLoader();

            },

            success: function (resp) {

                resp = JSON.parse(resp)



                if (resp.response == 1) {

                    if (Array.isArray(resp.data)) {

                        // Create the message container

                        var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                        // Iterate over each element in resp.data

                        $.each(resp.data, function (index, item) {

                            if(item.id == '1' || item.id == '2'  || item.id == '4' )

                            {

                                var listItem = $('<li class="responsText-ai-li" onclick="getInsCat(this,\'7\', \'' + item.name + '\',\'' + item.id + '\',\'' + value + '\')"></li>').text(item.name);

                            }

                            else if(item.id == '5')

                            {

                                var listItem = $('<li class="responsText-ai-li" onclick="getnutralinstitutesubmenus(this, \'' + item.name + '\',\'' + item.id + '\',\'' + value + '\')"></li>').text(item.name);

                            }

                            else 

                            {

                                var listItem = $('<li class="responsText-ai-li" onclick="getInstitutiondirectdetails(this,\'' + item.name + '\',\'' + item.id + '\',\'' + value + '\')"></li>').text(item.name);

                            }



                            messageContainer.find('ul').append(listItem);

                            scrollToBottom()



                        });



                        // Append the constructed message container to the Messages_list

                        $('.Messages_list').append(messageContainer);

                        messageCount = 7;

                        lastMsgBy = "ai";

                    }

                    else {

                        goback();

                    }



                }

                else {goback();}

            }

        });

    

}

function redirectToNewPage(url)

{

    window.open(url, '_blank');

}

function getnutralinstitutesubmenus(element,value, cat_id, instype){
    

    userMsg(value);
      // ✅ ADD
    chatFlow.push(value);
    // trackPageClick(chatFlow);

    $.ajax({

            type: 'post',

            url: 'backend/getData.php',

            data: { 'tab': '205',instype,cat_id },

            beforeSend: function () {

                displayLoader();

            },

            success: function (resp) {

               

                resp = JSON.parse(resp);

                

               if (resp.response == 1) {

                if (Array.isArray(resp.data)) {

                    // Create the message container

                    var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                    // Iterate over each element in resp.data

                    $.each(resp.data, function (index, item) {

                        var listItem = $('<li class="responsText-ai-li" onclick="getInstitutionsubdetails(this,\'' + item.name + '\',\'' + item.id + '\',\'' + value + '\',\'' + instype + '\',\'' + cat_id + '\')"></li>').text(item.name);

                        // var listItem = $('<li class="responsText-ai-li">' + item.name + '<br> <button onclick=instituteDetails(\'' + item.id + '\')>View Details</button><br><a target=\'_blank\' href=\'' + item.link + '\'>visit college</a></li>')

                        messageContainer.find('ul').append(listItem);

                        scrollToBottom()



                    });



                    // Append the constructed message container to the Messages_list

                    $('.Messages_list').append(messageContainer);

                    messageCount = 9;

                    lastMsgBy = "ai";

                }

                else {

                    goback();

                }



                }

                else {goback();}

            }

        });

}

function getInstitutionsubdetails(element,value,sub_cat_id,cat_name, instype,cat_id)

{

    userMsg(value);
      // ✅ ADD
    chatFlow.push(value);
    // trackPageClick(chatFlow);

    $.ajax({

            type: 'post',

            url: 'backend/getData.php',

            data: { 'tab': '206',instype,cat_id,sub_cat_id },

            beforeSend: function () {

                displayLoader();

            },

            success: function (resp) {

                if(resp == ''){goback();return false;}

                resp = JSON.parse(resp);

                if (resp.response == 1) {

                if (Array.isArray(resp.data)) {

                    // Create the message container

                    var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                    // Iterate over each element in resp.data

                    $.each(resp.data, function (index, item) {



var listItem = $('<li class="responsText-ai-li"></li>');

var name = $('<div>' + item.name + '</div>');

var btn = $('<button>View Details</button>');
btn.on('click', function () {
    const finalFlow = [...chatFlow, item.name, "View Details"];
    trackPageClick(finalFlow, this);
    instituteDetails(item.id);
});

var link = $('<a target="_blank" href="' + item.link + '">visit college</a>');
link.on('click', function () {
    const finalFlow = [...chatFlow, item.name, "Visit"];
    trackPageClick(finalFlow, this);
});

listItem.append(name).append('<br>').append(btn).append('<br>').append(link);
                        messageContainer.find('ul').append(listItem);

                        scrollToBottom()



                    });



                    // Append the constructed message container to the Messages_list

                    $('.Messages_list').append(messageContainer);

                    messageCount = 9;

                    lastMsgBy = "ai";

                }

                else {

                    goback();

                }



                }

                else {goback();}

            }

        });

}

function getInstitutiondirectdetails(element,value, cat_id, instype)

{

    userMsg(value);

    // ✅ ADD
    chatFlow.push(value);
    // trackPageClick(chatFlow);

    $.ajax({

            type: 'post',

            url: 'backend/getData.php',

            data: { 'tab': '204',instype,cat_id },

            beforeSend: function () {

                displayLoader();

            },

            success: function (resp) {

                // console.log(resp);

                // return false;

                resp = JSON.parse(resp)

                

               if (resp.response == 1) {

                if (Array.isArray(resp.data)) {

                    // Create the message container

                    var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                    // Iterate over each element in resp.data

                    $.each(resp.data, function (index, item) {



var listItem = $('<li class="responsText-ai-li"></li>');

var name = $('<div>' + item.name + '</div>');

var btn = $('<button>View Details</button>');
btn.on('click', function () {
    const finalFlow = [...chatFlow, item.name, "View Details"];
    trackPageClick(finalFlow, this);
    instituteDetails(item.id);
});

var link = $('<a target="_blank" href="' + item.link + '">visit college</a>');
link.on('click', function () {
    const finalFlow = [...chatFlow, item.name, "Visit"];
    trackPageClick(finalFlow, this);
});

listItem.append(name).append('<br>').append(btn).append('<br>').append(link);
                        messageContainer.find('ul').append(listItem);

                        scrollToBottom()



                    });



                    // Append the constructed message container to the Messages_list

                    $('.Messages_list').append(messageContainer);

                    messageCount = 9;

                    lastMsgBy = "ai";

                }

                else {

                    goback();

                }



                }

                else {goback();}

            }

        });

}



function getInsCat(element, tab, value, catId, insType) {

    userMsg(value);

     // ✅ ADD
    chatFlow.push(value);
    // trackPageClick(chatFlow);

        $.ajax({

            type: 'post',

            url: 'backend/getData.php',

            data: { 'tab': '201' },

            beforeSend: function () {

                displayLoader();

            },

            success: function (resp) {

                resp = JSON.parse(resp)



                if (resp.response == 1) {

                    // console.log(resp.data)

                    if (Array.isArray(resp.data)) {

                        // Create the message container

                        var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                        // Iterate over each element in resp.data

                        $.each(resp.data, function (index, item) {



                            var listItem = $('<li class="responsText-ai-li" onclick="getInsState(this,\'8\', \'' + item.name + '\',\'' + item.id + '\', \'' + catId + '\', \'' + insType + '\')"></li>').text(item.name);

                            messageContainer.find('ul').append(listItem);

                            scrollToBottom()



                        });



                        // Append the constructed message container to the Messages_list

                        $('.Messages_list').append(messageContainer);

                        messageCount = 8;

                        lastMsgBy = "ai";

                    }

                    else {

                        goback();

                    }



                }

                else {goback();}

            }

        });

    

}

function getInsState(element, tab, value, stateId, catId, insType) {

    userMsg(value);
          // ✅ ADD
    chatFlow.push(value);
    // trackPageClick(chatFlow);
        if (value == "Odisha") {

            $.ajax({

                type: 'post',

                url: 'backend/getData.php',

                data: { 'tab': '202', stateId },

                beforeSend: function () {

                    displayLoader();

                },

                success: function (resp) {

                    resp = JSON.parse(resp)



                    if (resp.response == 1) {

                        // console.log(resp.data)

                        if (Array.isArray(resp.data)) {

                            // Create the message container

                            var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                            // Iterate over each element in resp.data

                            $.each(resp.data, function (index, item) {



                                var listItem = $('<li class="responsText-ai-li" onclick="getInsDetails(this,\'8\', \'' + item.name + '\',\'' + item.id + '\', \'' + catId + '\', \'' + insType + '\', \'' + stateId + '\')"></li>').text(item.name);

                                messageContainer.find('ul').append(listItem);

                                scrollToBottom()



                            });



                            // Append the constructed message container to the Messages_list

                            $('.Messages_list').append(messageContainer);

                            messageCount = 9;

                            lastMsgBy = "ai";

                        }

                        else {

                            goback();

                        }



                    }

                    else {goback();}

                }

            });

        }

        else {

        

            // var distId = 0;

            $.ajax({

                type: 'post',

                url: 'backend/getData.php',

                data: { 'tab': '203', stateId, insType, catId },

                beforeSend: function () {

                    displayLoader();

                },

                success: function (resp) {

                    resp = JSON.parse(resp);

                    if (resp.response == 1) {

                        // console.log(resp.data)

                        if (Array.isArray(resp.data)) {

                            // Create the message container

                            var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                            // Iterate over each element in resp.data

                            $.each(resp.data, function (index, item) {



var listItem = $('<li class="responsText-ai-li"></li>');

var name = $('<div>' + item.name + '</div>');

var btn = $('<button>View Details</button>');
btn.on('click', function () {
    const finalFlow = [...chatFlow, item.name, "View Details"];
    trackPageClick(finalFlow, this);
    instituteDetails(item.id);
});

var link = $('<a target="_blank" href="' + item.link + '">visit college</a>');
link.on('click', function () {
    const finalFlow = [...chatFlow, item.name, "Visit"];
    trackPageClick(finalFlow, this);
});

listItem.append(name).append('<br>').append(btn).append('<br>').append(link);
                                messageContainer.find('ul').append(listItem);

                                scrollToBottom()



                            });



                            // Append the constructed message container to the Messages_list

                            $('.Messages_list').append(messageContainer);

                            messageCount = 9;

                            lastMsgBy = "ai";

                        }

                        else {

                            goback();

                        }



                    }

                    else {goback();}

                }

            });

        }





    

}



function getInsDetails(element, tab, value, distId, catId, insType, stateId) {

    

    userMsg(value);
    // ✅ ADD
    chatFlow.push(value);
    // trackPageClick(chatFlow);
    $.ajax({

        type: 'post',

        url: 'backend/getData.php',

        data: { 'tab': '203', stateId, insType, catId, distId },

        beforeSend: function () {

            displayLoader();

        },

        success: function (resp) {

            // console.log(resp);return false;

            resp = JSON.parse(resp)

            if (resp.response == 1) {

                if (Array.isArray(resp.data)) {

                    // Create the message container

                    var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                    // Iterate over each element in resp.data

                    $.each(resp.data, function (index, item) {



var listItem = $('<li class="responsText-ai-li"></li>');

var name = $('<div>' + item.name + '</div>');

var btn = $('<button>View Details</button>');
btn.on('click', function () {
    const finalFlow = [...chatFlow, item.name, "View Details"];
    trackPageClick(finalFlow, this);
    instituteDetails(item.id);
});

var link = $('<a target="_blank" href="' + item.link + '">visit college</a>');
link.on('click', function () {
    const finalFlow = [...chatFlow, item.name, "Visit"];
    trackPageClick(finalFlow, this);
});

listItem.append(name).append('<br>').append(btn).append('<br>').append(link);
                        messageContainer.find('ul').append(listItem);

                        scrollToBottom()



                    });



                    // Append the constructed message container to the Messages_list

                    $('.Messages_list').append(messageContainer);

                    messageCount = 9;

                    lastMsgBy = "ai";

                }

                else {

                    goback();

                }



            }

            else {goback();}

        }

    });

}









function instituteDetails(id) {

    $.ajax({

        type: 'post',

        url: 'backend/getData.php',

        data: { 'tab': '500', id },

        beforeSend: function () {

            displayLoader();

        },

        success: function (resp) {

            resp = JSON.parse(resp)



            if (resp.response == 1) {

                // console.log(resp.data)

                $("#instituteModal-box").html('');

                $("#instituteModal-box").append(resp.data);

                $("#instituteDetails-modal").modal('show');







            }

        }

    });

}

//end institution filter







// start career details 

function getCareerSubCat(element, tab, value, id) {

  userMsg(value);

  // ✅ Track
  chatFlow.push(value);
//   trackPageClick(chatFlow);
        $.ajax({

            type: 'post',

            url: 'backend/getData.php',

            data: { 'tab': '101', 'id': id },

            beforeSend: function () {

                displayLoader();

            },

            success: function (resp) {

                resp = JSON.parse(resp)



                if (resp.response == 1) {

                    if (Array.isArray(resp.data)) {

                        var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                        $.each(resp.data, function (index, item) {

                            if (item.is_sub_subcategory == '0') {

var listItem = $('<li class="responsText-ai-li"></li>');
var link = $('<a target="_blank" href="' + item.slug + '.php">' + item.name + '</a>');

link.on('click', function () {
    const finalFlow = [...chatFlow, item.name];
    trackPageClick(finalFlow, this);
});

listItem.append(link);
                                messageContainer.find('ul').append(listItem);

                                scrollToBottom()



                            }

                            else {

                                var listItem = $('<li class="responsText-ai-li" onclick="getCareerSubSubCat(this,\'4\', \'' + item.name + '\',\'' + item.id + '\')"></li>').text(item.name);

                                messageContainer.find('ul').append(listItem);

                                scrollToBottom()

                            }

                        });



                        // Append the constructed message container to the Messages_list

                        $('.Messages_list').append(messageContainer);

                        messageCount = 4;

                        lastMsgBy = "ai";

                    }

                    else {

                        goback();

                    }



                }

                else {goback();}

            }

        });

    

}



function getCareerSubSubCat(element, tab, value, id) {



    // $(element).closest('.msg').hide();    

   userMsg(value);

   // ✅ Track
   chatFlow.push(value);
//    trackPageClick(chatFlow);


        $.ajax({

            type: 'post',

            url: 'backend/getData.php',

            data: { 'tab': '102', 'id': id },

            beforeSend: function () {

                displayLoader();

            },

            success: function (resp) {

                resp = JSON.parse(resp);

                if (resp.response == 1) {

                    // console.log(resp.data)

                    if (Array.isArray(resp.data)) {

                        // Create the message container

                        var messageContainer = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"><ul class="responsText-ai-ul"></ul></span></div>');



                        // Iterate over each element in resp.data
$.each(resp.data, function (index, item) {

    var listItem = $('<li class="responsText-ai-li"></li>');

    var link = $('<a target="_blank" href="' + item.slug + '.php">' + item.name + '</a>');

    link.on('click', function () {

        const finalFlow = [...chatFlow, String(item.name).trim()];

        trackPageClick(finalFlow, this);

    });

    listItem.append(link);
    messageContainer.find('ul').append(listItem);

    scrollToBottom();

});



                        // Append the constructed message container to the Messages_list

                        $('.Messages_list').append(messageContainer);

                        messageCount = 5;

                        lastMsgBy = "ai";

                    }

                    else {

                        goback();

                    }



                }

                else {goback();}

            }

        });

}









function goback()

{

    aiMsg(`We regret to inform you that we do not have the necessary data at this time. Kindly provide us with your details, and our career guidance team will contact you.`)

            .then(() => {

                // Append the HTML content without backticks

                $('.Messages_list').append(

                    '<div class="msg"><span class="avatar"></span><span class="responsText"><ul class=\'responsText-ai-ul\'>' +

                    '<li class=\'responsText-ai-li\'"><button type="button"  data-toggle="modal" data-target=".openchatbotContactModal">Contact us</button></li>' +

                    '</ul></span></div>'

                );

            });



        messageCount = 2;

        

        // $('.Messages_list').append(

        //             '<div class="msg"><span class="avatar"></span><span class="responsText"><ul class=\'responsText-ai-ul\'>' +

        //             '<li class=\'responsText-ai-li\' onclick="sendMessage(this,\'2\',\'Career\')">Career</li>' +

        //             '<li class=\'responsText-ai-li\' onclick="sendMessage(this,\'2\',\'Institution\')">Institution</li>' +

        //             '<li class=\'responsText-ai-li\' onclick="sendMessage(this,\'2\',\'Entrance Exam\')">Entrance Exam</li>' +

        //             '<li class=\'responsText-ai-li\' onclick="sendMessage(this,\'2\',\'Scholarship\')">Scholarship</li>' +

        //             '</ul></span></div>'

        //         );

}







$(document).ready(function(){

    $("#chatbot-contactform").submit(function(e){

        e.preventDefault();

        var formData = new FormData(this);

        formData.append('tab', 1001);



        $.ajax({

            type: "post",

            url: "backend/getData.php",

            data: formData,

            processData: false,

            contentType: false,

            beforeSend: function(){

            },

            success: function(resp){

                console.log(resp);

                resp = JSON.parse(resp);

                alert(resp.message);

                $('#chatbot-contactform').trigger("reset");

                $(".openchatbotContactModal").modal('hide');

            }

        });

    });

});









function userMsg(msg) {

    if (lastMsgBy == "ai") {

        var url ="";

        // alert(getPersonaType());

        if(getPersonaType() == 1)

        {

            //boy image 

            $('.Messages_list').append('<div class="msg user"><span class="avatar"><figure id = "girl-image" style="background-image: url(img/girl.png)"></figure></span><span class="responsText">' + msg + '</span></div>');

            

        }

        else

        {

        $('.Messages_list').append('<div class="msg user"><span class="avatar"><figure id = "boy-image" style="background-image: url(img/boy.png)"></figure></span><span class="responsText">' + msg + '</span></div>');

        }

        // $('.Messages_list').append('<div class="msg user"><span class="avatar"><figure style="background-image: url(img/userimg.png)"></figure></span><span class="responsText">' + msg + '</span></div>');

    }

    else {

        $('.Messages_list').append('<div class="msg user"><span class="avatar"></span><span class="responsText">' + msg + '</span></div>');

    }

    lastMsgBy = "user";

    scrollToBottom();

};

function firstaiMsg(msg) {

    return new Promise((resolve) => {

        if (lastMsgBy == "ai") {

            var messageElement = $('<div class="msg"><span class="avatar"></span><span class="responsText"></span></div>');

        }

        else {

            var messageElement = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"></span></div>');

        }

        $('.Messages_list').append(messageElement);



        lastMsgBy = "ai";

        

        // Pass the responsText element to animateMessage function and resolve the promise

        animateMessage(msg, messageElement.find('.responsText')).then(() => {

            scrollToBottom();

            resolve();

        });

        

    });

}

function aiMsg(msg) {

    return new Promise((resolve) => {

        if (lastMsgBy == "ai") {

            var messageElement = $('<div class="msg"><span class="avatar"></span><span class="responsText"></span></div>');

        }

        else {

            var messageElement = $('<div class="msg"><span class="avatar"><figure style="background-image: url(img/bot.png)"></figure></span><span class="responsText"></span></div>');

        }

        $('.Messages_list').append(messageElement);



        lastMsgBy = "ai";

        

        // Pass the responsText element to animateMessage function and resolve the promise

        animateMessage(msg, messageElement.find('.responsText')).then(() => {

            scrollToBottom();

            resolve();

        });

        

    });

}



function animateMessage(msg, element) {

    return new Promise((resolve) => {

        var chars = msg.split('');

        var delay = 1; // Adjust as needed

        var currentIndex = 0;



        function addChar() {

            if (currentIndex < chars.length) {

                element.append(chars[currentIndex]);

                currentIndex++;

                setTimeout(addChar, delay);

            } else {

                resolve();

            }

        }



        addChar();

    });

}



function sayBye() {

    if (nowHour <= 10) {

        aiMsg(" have nice day! :)");

    } else if (nowHour >= 11 || nowHour <= 20) {sendMessage

        aiMsg(" bye!");

    } else {

        aiMsg(" good night!");

    }

}



function scrollToBottom() {

    $(".Messages").stop().animate({ scrollTop: $('.Messages_list').prop("scrollHeight") }, "fast");

}





// ✅ Generate device id (once)
if (!localStorage.getItem("device_id")) {
    localStorage.setItem("device_id", 'dev-' + Math.random().toString(36).substr(2, 12));
}

function trackPageClick(levels = [], el = null) {

    let deviceId = localStorage.getItem("device_id");

    let pageUrl = '';

    // If link click
    if (el && el.getAttribute("href")) {
        pageUrl = el.getAttribute("href")
                    .split("/")
                    .pop()
                    .split("?")[0];
    } 
    // If form / ajax (NO redirect)
    else {
        pageUrl = window.location.pathname.split("/").pop() || 'home';
    }

    $.ajax({
        type: "POST",
        url: "backend/track_page.php",
        data: {
            device_id: deviceId,
            parent_page: levels[0] || '',
            page_url: pageUrl,
            page_title: document.title,
            page_flow: JSON.stringify(levels)
        }
    });
}
// ✅ Track each YouTube click
$(document).ready(function() {

    $('.youtube-link').on('click', function(e) {

        let category = $(this).text().trim(); // Arts, Science, etc.

        // call tracking
        trackPageClick(
            ["YouTube", "Career Planning", category],
            this
        );

        // OPTIONAL: delay redirect so AJAX completes
        let link = this.href;
        e.preventDefault();

        setTimeout(function() {
            window.location.href = link;
        }, 300); // 300ms delay
    });

});