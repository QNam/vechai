<template>
    <a-upload 
        name="avatar" 
        listType="picture-card" 
        class="avatar-uploader" 
        :showUploadList="false"
        :multiple="false"
        :action="action" 
        :beforeUpload="beforeUpload" 
        @change="handleChange">
        <img v-if="imageUrl && !loading" class="img-preview" :src="imageUrl" alt="avatar" />
        <div v-else>
            <a-icon :type="loading ? 'loading' : 'plus'" />
            <div class="ant-upload-text">Upload</div>
        </div>
    </a-upload>
</template>
<script>
    function getBase64(img, callback) {
        const reader = new FileReader();
        reader.addEventListener('load', () => callback(reader.result));
        reader.readAsDataURL(img);
    }
    export default {
        props: ['url'],
        data() {
            return {
                action: api('fake.upload'),
                loading: false,
                imageUrl: this.url || "",
            };
        },
        methods: {
            handleChange(info) {
                if (info.file.status === 'uploading') {
                    this.loading = true;
                    return;
                }
                if (info.file.status === 'done') {
                    getBase64(info.file.originFileObj, imageUrl => {
                        this.imageUrl = imageUrl;
                        this.loading = false;

                        this.$emit('change', imageUrl);
                    });
                }
            },
            beforeUpload(file) {
                const isFormat = (file.type === 'image/jpeg' || file.type === 'image/png');
                if (!isFormat) {
                    this.$message.error('You can only upload JPG file!');
                }
                const isLt2M = file.size / 1024 / 1024 < 2;
                if (!isLt2M) {
                    this.$message.error('Image must smaller than 2MB!');
                }
                return isFormat && isLt2M;
            },
        },
        watch: {
            url: function(){
                this.imageUrl = this.url
            }
        }
    };
</script>
<style>
    .avatar-uploader>.ant-upload {
        width: 128px;
        height: 128px;
    }

    .ant-upload-select-picture-card i {
        font-size: 32px;
        color: #999;
    }

    .ant-upload-select-picture-card .ant-upload-text {
        margin-top: 8px;
        color: #666;
    }

    .img-preview
    {
        width: 200px;
        height: auto;
    }
    .avatar-uploader .ant-upload.ant-upload-select-picture-card {
        width: 200px;
        height: 200px;
    }
</style>


