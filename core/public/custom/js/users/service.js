//MODEL
var dating = dating || {};
dating.service = {
    _user : {
        _display: {
            _get_list: function(data, callback){

            }
        },
        _create: function(data, callback){

        },
        _update: {
            _settings: {
                _profile: function(data, callback){
                    $.ajax({
                        url: '/user_settings/update',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                },
                _chat: function(data, callback){
                    $.ajax({
                        url: '/user_settings/update',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                },
                _character: function(data, callback){
                    $.ajax({
                        url: '/user_settings/update',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                }
            },

            _settings_status: {
                _profile_disable: function(data, callback){
                    $.ajax({
                        url: '/user_settings/update_status',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                },
                _chat_disable: function(data, callback){
                    $.ajax({
                        url: '/user_settings/update_status',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                },
                _character_disable: function(data, callback){
                    $.ajax({
                        url: '/user_settings/update_status',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                }
            },
            _profile:{
                _name: function(data, callback){
                    $.ajax({
                        url: '/user/update_profile_name',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                },
                _avatar: function(data, callback){
                    $.ajax({
                        url: '/user/update_profile_avatar',
                        type: 'POST',
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                },
                _email_address: function(data, callback){
                    $.ajax({
                        url: '/user/update_profile_email_address',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                },
                _password: function(data, callback){
                    $.ajax({
                        url: '/user/update_profile_password',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                },
                _birth_date: function(data, callback){
                    $.ajax({
                        url: '/user/update_profile_birth_date',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                },
                _country: function(data, callback){
                    $.ajax({
                        url: '/user/update_profile_country',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                },
                _gender: function(data, callback){
                    $.ajax({
                        url: '/user/update_profile_gender',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(result){
                            callback && callback.success(result);
                        }
                    }).always(function(data){
                        callback && callback.done(data);
                    });
                }
            }
        },
        _delete: function(data, callback){

        }
    },

    _character : {
        _display: {
            _get_list: {

            },
            _get_details: function(data, callback){
                $.ajax({
                    url: '/character/get_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(result){
                        callback && callback.success(result);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            }
        },
        _create: {
            _save: function(data, callback){

            }
        },
        _update: {
            _current: function(data, callback){
                $.ajax({
                    url: '/character/change_character',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(result){
                        callback && callback.success(result);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            },
            _save: function(data, callback){
                $.ajax({
                    url: '/character/update',
                    type: 'POST',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function(result){
                        callback && callback.success(result);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            },
            _archive: function(data, callback){
                $.ajax({
                    url: '/character/update_status_archive',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(result){
                        callback && callback.success(result);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            },
            _activate: function(data, callback){
                $.ajax({
                    url: '/character/update_status_activate',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(result){
                        callback && callback.success(result);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            }
        },
        _delete: {
            _used: function(data, callback){
                $.ajax({
                    url: '/character/delete',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(result){
                        callback && callback.success(result);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            }
        }
    },
    _family: {
        _display: {
            _get_list: function(data, callback){
                $.ajax({
                    url: '/family/get_by_specy',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        console.log(response);
                        callback && callback.success(response);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            },
            _get_details: function(data, callback){

            }
        },
        _create: {

        },
        _update: {

        },
        _delete: {

        }
    },
    _like: {
        _display: {
            _get_list: function(data, callback){
                $.ajax({
                    url: '/family/get_by_specy',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        console.log(response);
                        callback && callback.success(response);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            },
            _get_details: function(data, callback){

            }
        },
        _create: {
            _add: function(data, callback){
                $.ajax({
                    url: '/like/create',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        callback && callback.success(response);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            }
        },
        _update: {

        },
        _delete: {

        }
    },
    _mate: {
        _display: {
            _get_list: function(data, callback){
                $.ajax({
                    url: '/family/get_by_specy',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        console.log(response);
                        callback && callback.success(response);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            },
            _get_details: function(data, callback){

            }
        },
        _create: {
            _add: function(data, callback){
                $.ajax({
                    url: '/mate/create',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        callback && callback.success(response);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            }
        },
        _update: {
            _cancel: function(data, callback){
                $.ajax({
                    url: '/mate/cancel',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        callback && callback.success(response);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            },
            _accept: function(data, callback){
                $.ajax({
                    url: '/mate/accept',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        callback && callback.success(response);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            },
            _remove: function(data, callback){
                $.ajax({
                    url: '/mate/remove',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        callback && callback.success(response);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            }
        },
        _delete: {

        }
    },
    _comment: {
        _display: {
            _get_details: function(e, callback){
                $.ajax({
                    url: '/comment/get_comments_by_photo_id',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        callback && callback.success(response);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            },
            _get_details_from_photo: function(data, callback){
                $.ajax({
                    url: '/comment/get_comments_by_photo_id',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        callback && callback.success(response);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            }
        },
        _create: {
            _add: function(data, callback){
                $.ajax({
                    url: '/comment/create',
                    type: 'POST',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function(result){
                        callback && callback.success(result);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            }
        },
        _update: {},
        _delete: {}
    },
    _updates: {
        _display: {
            _get_lists: function(data, callback){

            },
            _get_details: function(data, callback){
                $.ajax({
                    url: '/updates/get_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(result){
                        callback && callback.success(result);
                    }
                }).always(function(data){
                    callback && callback.done(data);
                });
            }
        }
    }
};