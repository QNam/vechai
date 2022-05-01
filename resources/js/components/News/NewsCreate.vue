<template>
    <section class="newsCreate">
        <div class="newsCreate__header">
            <div class="row">
                <div class="form-group col-8">
                    <label for="">Tiếu đề</label>
                    <input type="text" v-model="title" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-8">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" v-model="desc"></textarea>
                </div>
            </div>
        </div>
        <div class="newsCreate__editor">
            <Editor :content="content" @contentChanged="handerContentChanged"></Editor>
        </div>
        <div class="newsCreate__info">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="newsCreate__info__seo">
                        <div class="avcollapse">
                            <div class="avcollapse__header" data-toggle="collapse" data-target="#newsCreate__info__seo__wrap">
                                SEO
                            </div>
                            <div class="avcollapse__body" id="newsCreate__info__seo__wrap">
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="">Meta Title</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" v-model="metaTitle" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="">Meta Description</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea v-model="metaDesc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="">Meta Keyword</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" v-model="metaKeyword" class="form-control">
                                    </div>
                                </div>

                                <div class="newsCreate__info__seo__preview">
                                    <a href="">
                                        <span>www.anvui.vn{{titleToUrl }}</span> <br>
                                        <h3>{{ toMetaTitle }}</h3>
                                    </a>
                                    <div>
                                        {{ metaDesc }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="newsCreate__info__setting">
                        <div class="avcollapse">
                            <div class="avcollapse__header" data-toggle="collapse" data-target="#newsCreate__info__setting_wrap">
                                Thông tin
                            </div>
                            <div class="avcollapse__body" id="newsCreate__info__setting_wrap">
                                <div class="newsCreate__info__setting__item row"><b class="col-3">Ngày đăng:</b><span class="col-9">{{ created_at }}</span></div>
                                <div class="newsCreate__info__setting__item row"><b class="col-3">Tác giả:</b><span class="col-9">Meobeodamdang</span></div>
                                <div class="newsCreate__info__setting__item row"><b class="col-3">Hiện/Ẩn:</b> <span  class="col-9"><a-checkbox v-model="status"></a-checkbox></span> </div>
                                <div class="newsCreate__info__setting__item row">
                                    <b class="col-3">Ảnh:</b>
                                    <div class="col-9">
                                        <UploadSingleFile :url="image" @change="handerChangeImage"></UploadSingleFile>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsCreate__submit">
            <button class="newsCreate__submit__save" @click="submitNews">Lưu</button>
            <router-link to="/news"><button class="newsCreate__submit__cancle">Hủy</button></router-link>
        </div>
    </section>
</template>

<script>
import Editor from '../Templates/Editor' ;
import UploadSingleFile from '../Templates/UploadSingleFile' ;
import axios from 'axios';

function slugify(str)
{
    str = str.replace(/^\s+|\s+$/g, '');
    str = str.toLowerCase();

    var from = "àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ·/_,:;";
    var to = "aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyyd------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') 
    .replace(/\s+/g, '-') 
    .replace(/-+/g, '-'); 

    return str;
}
export default {
    components: {
        Editor,
        UploadSingleFile
    },
    props: ['data'],
    data: function() {
        return {
            title: "",
            desc: "",
            content: "",
            status: false,
            metaTitle: "",
            metaDesc: "",
            metaKeyword: "",
            image: "",

            created_at: "",
            imageEdited: false,
        }
    },
    computed: {
        titleToUrl: function () {
            return '/tin-tuc/' + slugify( this.title ) + ".html";
        },
        toMetaTitle: function() {
            return this.metaTitle + " - Anvui.vn";
        }
    },
    methods: {
        handerContentChanged(event) {
            this.content = event;
        },
        handerChangeImage(event) {
            this.image = event;
            this.imageEdited = true;
        },
        setDefaultValue() {
            if(this.data) {
                this.title = this.data.title || "";
                this.desc = this.data.desc || "";
                this.content = this.data.content || "";

                this.metaTitle = this.data.seo.meta_title || "";
                this.metaKeyword = this.data.seo.meta_keyword || "";
                this.metaDesc = this.data.seo.meta_desc || "";
                
                this.image = this.data.img || "";
                this.status = this.data.status == 1 ? true : false;
                this.created_at = this.data.created_at_format;
            }
        },
        submitNews() {
            var params = {
                image: this.image,
                title: this.title,
                status: this.status ? 1 : 0,
                desc: this.desc,
                content: this.content,
                lang: "vi",
                meta_title: this.metaTitle  + " - Anvui.vn",
                meta_desc: this.metaDesc,
                meta_keyword: this.metaKeyword,
            }

            if(this.$route.params && this.$route.params.id !== undefined) {
                params.id = this.$route.params.id
                if(this.imageEdited) {
                    params.image = this.image;
                } else {
                    delete params.image
                }
            }

            axios.post(api('news.store'), params)
            .then( (response) => {
                if(response.data.status) {
                    this.$router.push({ name: 'NewsIndex'});
                    this.$message.success('Lưu bài viết thành công !');
                } else {
                    this.$message.error('Có lỗi xảy ra vui lòng thử lại sau !');
                }
                
            })
            .catch((error) => {
                this.$message.error('Có lỗi xảy ra vui lòng thử lại sau !');
            });
        }
    },
    watch: {
        data: function() {
            this.setDefaultValue();
        }
    }
}
</script>

<style lang="scss">
.newsCreate {
    .form-control {
        border-color: #cccccc;
    }
    padding-bottom: 40px;
    &__editor {
        margin-bottom: 40px;
    }

    &__info {
        &__seo {
            &__preview {
                padding: 24px 0px;
                * {
                    font-family: Arial;
                }
                a {
                    display: block;
                    margin-bottom: 8px;
                    span {
                        color: #3C4043;
                        display: inline-block;
                        margin-bottom: 8px;
                    }

                    h3 {
                        display: inline-block;
                        color:rgb(26, 13, 171);
                        font-size: 20px;
                        font-weight: 400;
                        margin-bottom: 0px;
                    }
                }
            }
        }

        &__setting {
            &__item {
                margin-bottom: 8px;
                &:last-child {
                    margin-bottom: 0px;
                }
                b {
                    font-size: 1rem;
                    color: #333;
                    font-weight: 400;
                }

                .ant-upload-select-picture-card {
                    height: 186px!important;
                    width: 186px!important;
                }
            }
        }
    }

    &__submit {
        text-align: left;
        margin-top: 24px;
        &__cancle {
            background-color: #fff;
            border: 1px solid #ccc;
            color: 3372e8;
            border-radius: 4px;
            font-weight: bold;
            height: 30px;
            padding: 0px 15px;

        }
        &__save {
            border-radius: 4px;
            border: none;
            background-color: #3372e8;
            color: #fff;
            font-weight: bold;
            height: 30px;
            padding: 0px 15px;
        }
    }
}
.avcollapse {
    &__header {
        padding: 15px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border: 1px solid #cccc;
        &:hover{
            cursor: pointer;
        }
    }
    &__body {
        padding: 15px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border-bottom: 1px solid #cccccc;
        border-right: 1px solid #cccccc;
        border-left: 1px solid #cccccc;
    }
}
</style>