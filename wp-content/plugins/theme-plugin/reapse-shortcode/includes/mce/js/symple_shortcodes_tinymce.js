(function() {

    tinymce.PluginManager.add('my_mce_button', function( editor, url ) {

        editor.addButton( 'my_mce_button', {

            text: 'Shortcode',

            icon: false,

            type: 'menubutton',

            menu: [
                    {

                            text: 'Section Content Wrapper',

                            onclick: function() {                                   
                        
                                        editor.insertContent( '[reapse_content_wrapper]<br/><br/>[/reapse_content_wrapper]' );                              

                            }

                    },

                    {

                            text: 'Section row',

                            onclick: function() {                                   
                        
                                        editor.insertContent( '[reapse_row]<br/><br/>[/reapse_row]' );                              

                            }

                    },                    
                    {

                            text: 'Section HeadLine',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Section HeadLine Shortcode',

                                    body: [

                                        {
                                            type: 'textbox',

                                            name: 'headline',

                                            label: 'Section HeadLine',

                                            value: 'About Me',

                                            multiline: true,

                                            minWidth: 450,
                                        },                                                                               
                                        
                                    ],

                                    onsubmit: function( e ) {
                                        editor.insertContent( '[reapse_section_headline headline="' + e.data.headline + '"]' );
                                        
                                        

                                    }

                                });

                            }

                        },

                        {

                            text: 'Reapse Profile',

                            onclick: function() {
                                  
                                   
                                        editor.insertContent( '[reapse_Profile]' );
                                        
                            }

                        },                        

                        {

                            text: 'Reapse About',

                            onclick: function() {
                                  
                                   
                                        editor.insertContent( '[reapse_about_me]' );
                                        
                            }

                        },                        
                        {

                            text: 'Facts Content',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Fact Title',

                                    body: [

                                        {
                                            type: 'textbox',

                                            name: 'fact_title',

                                            label: 'Facts Title',

                                            value: 'Happy Customers',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {
                                            type: 'textbox',

                                            name: 'fact_number',

                                            label: 'Number of Facts',

                                            value: '208',

                                            multiline: true,

                                            minWidth: 450,
                                        },                                        
                                        
                                    ],

                                    onsubmit: function( e ) {
                                        editor.insertContent( '[reapse_fact fact_title="' + e.data.fact_title + '" fact_number="' + e.data.fact_number + '"]' );
                                        
                                        

                                    }

                                });

                            }

                        },                       
                        {

                        text: 'Services Content',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Services Content ShortCode',

                                    body: [

                                        
                                        {

                                            type: 'textbox',

                                            name: 's_title',

                                            label: 'Services Title',

                                            value: 'Programming',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {

                                            type: 'textbox',

                                            name: 's_icon',

                                            label: 'Services Icon',

                                            value: 'icon-basic-keyboard',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {

                                            type: 'textbox',

                                            name: 's_content',

                                            label: 'Services Content',

                                            value: 'Lorem ipsum dolor sit amet is simply a dummy text.',

                                            multiline: true,

                                            minWidth: 450,

                                            minHeight: 60,
                                        },
                                        
                                    ],

                                    onsubmit: function( e ) {
                                        editor.insertContent( '[reapse_services s_title="' + e.data.s_title + '" s_icon="' + e.data.s_icon + '" s_content="' + e.data.s_content + '"]' );
                                        
                                        

                                    }

                                });

                            }

                        },                        
                        {

                        text: 'Skill Content',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Skill Content ShortCode',

                                    body: [

                                        
                                        {

                                            type: 'textbox',

                                            name: 'sk_title',

                                            label: 'Skill Title',

                                            value: 'HTML/CSS',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {

                                            type: 'textbox',

                                            name: 'sk_percent',

                                            label: 'Skill Percentage',

                                            value: '90',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                    ],

                                    onsubmit: function( e ) {
                                        editor.insertContent( '[reapse_skill sk_title="' + e.data.sk_title + '" sk_percent="' + e.data.sk_percent + '"]' );
                                        
                                        

                                    }

                                });

                            }

                        },
                        {

                        text: 'Price Table Content',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Price Table Content ShortCode',

                                    body: [

                                        
                                        {

                                            type: 'textbox',

                                            name: 'p_title',

                                            label: 'Price Table Title',

                                            value: 'Basic',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {

                                            type: 'textbox',

                                            name: 'p_currency',

                                            label: 'Price Currency',

                                            value: '$',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {

                                            type: 'textbox',

                                            name: 'p_amount',

                                            label: 'Price Amount',

                                            value: '19',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {

                                            type: 'textbox',

                                            name: 'p_duretion',

                                            label: 'Time Period',

                                            value: 'HR',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {

                                            type: 'textbox',

                                            name: 'content',

                                            label: 'Content',

                                            value: 'Can Use HTML tag',

                                            multiline: true,

                                            minWidth: 450,

                                            minHeight: 100,
                                        },
                                        {

                                            type: 'textbox',

                                            name: 'p_btn_content',

                                            label: 'Button Content',

                                            value: 'Choose This',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {

                                            type: 'textbox',

                                            name: 'p_btn_link',

                                            label: 'Button Link',

                                            value: '#',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        
                                        
                                    ],

                                    onsubmit: function( e ) {
                                        editor.insertContent( '[reapse_price p_title="' + e.data.p_title + '" p_currency="' + e.data.p_currency + '" p_amount="' + e.data.p_amount + '" p_duretion="' + e.data.p_duretion + '" p_btn_content="' + e.data.p_btn_content + '" p_btn_link="' + e.data.p_btn_link + '"]<br/>'+e.data.content+'<br/>[/reapse_price]' );
                                        
                                        

                                    }

                                });

                            }

                        },                        
                       
                        {

                            text: 'Education',

                            onclick: function() {
                                    
                                        editor.insertContent( '[reapse_education]' );
                                        
                            }

                        },
                        {

                            text: 'Employment',

                            onclick: function() {
                                    
                                        editor.insertContent( '[reapse_employment]' );
                                        
                            }

                        },                        
                        
                        {

                            text: 'Portfolio',

                            onclick: function() {
                                    
                                        editor.insertContent( '[reapse_portfolio]' );
                                        
                            }

                        },
                        {

                            text: 'My Blog',

                            onclick: function() {
                                    
                                        editor.insertContent( '[reapse_blog]' );
                                        
                            }

                        },
                        {

                            text: 'Client Wrapper',

                            onclick: function() {
                                    
                                        editor.insertContent( '[reapse_client_wrapper][/reapse_client_wrapper]' );
                                        
                            }

                        },
                        {

                        text: 'Client Content',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Client Content ShortCode',

                                    body: [
                                        
                                        {
                                            type: 'textbox',

                                            name: 'c_name',

                                            label: 'Client Nmae',

                                            value: 'Jake Doe',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {
                                            type: 'textbox',

                                            name: 'c_img',

                                            label: 'Client Image Link',

                                            value: 'http://localhost/reapse/wp-content/uploads/2016/12/person1.jpg',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {
                                            type: 'textbox',

                                            name: 'c_deg',

                                            label: 'Client Deg: / Org:',

                                            value: 'CEO at Company',

                                            multiline: true,

                                            minWidth: 450,
                                        },
                                        {
                                            type: 'textbox',

                                            name: 't_content',

                                            label: 'Client Content',

                                            value: 'Consul latine iudicabit eu vel. Cu has animal eruditi voluptatibus. Eu volumus explicari sed.',

                                            multiline: true,

                                            minWidth: 450,

                                            minHeight: 50,
                                        },
                                        
                                    ],

                                    onsubmit: function( e ) {
                                        editor.insertContent( '[reapse_client c_name="' + e.data.c_name + '" c_img="' + e.data.c_img + '" c_deg="' + e.data.c_deg + '" t_content="' + e.data.t_content + '"]' );
                                        
                                        

                                    }

                                });

                            }

                        },
                        
                        {

                        text: 'Contact',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Reapse Contact ShortCode',

                                    body: [

                                        
                                        {

                                            type: 'textbox',

                                            name: 'contact',

                                            label: 'Contact from-7 Shortcode',

                                            value: '[contact-form-7 id="26" title="Contact form 1"]',

                                            multiline: true,

                                            minWidth: 450,
                                        },

                                        
                                    ],

                                    onsubmit: function( e ) {
                                        editor.insertContent( '[reapse_contact]' + e.data.contact + '[/reapse_contact]' );
                                        
                                        

                                    }

                                });

                            }

                        },
                     
                    ]
        });

    });

})();
