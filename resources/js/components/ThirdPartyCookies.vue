<template></template>

<script>
export default {
    name: "ThirdPartyCookies",
    mounted() {
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-202725263-1');
    }
}
</script>
