<template>
    <slot :onevent="onevent"></slot>
</template>

<script>
export default {
    methods: {
        onevent(payload,method){
            var alloweds = [
                '/profile/mini',
                '/profile/header',
            ];

            if(!alloweds.includes(method))return

            var event = new Event('click', {
                bubbles: true,
                cancelable: true,
            });

            var input = document.createElement('input')
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/png, image/gif, image/jpeg');
            input.style.visibility = 'hidden'
            input.addEventListener('change',async ($event)=>{
                const file = $event.target.files[0]
                console.log(file)
                if(method == '/profile/header'){
                    this.profileMini(file)
                }
                if(method == '/profile/mini'){

                    this.profileMini(file)
                }
            })
            document.body.append(input)
            input.click()
        },
        profileMini(file){
            axios.post('/profile/mini', {file}).then((result) => {
                console.log(result)
            }).catch((err) => {

            });
        },
        profileHeader(file){
            axios.post('/profile/mini', {file}, { headers: {
            'Content-Type': 'multipart/form-data'
            }}).then((result) => {
                console.log(result)
            }).catch((err) => {

            });
        }
    },
}
</script>

<style>

</style>
