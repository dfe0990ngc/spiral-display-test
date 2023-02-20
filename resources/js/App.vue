<template>
    <div class="position-absolute w-100 h-100">
        <div class="position-absolute start-50 top-50 translate-middle">
            <p id="spiral-text">{{ breakdowns }}</p>
            <p v-show="isError">{{ error }}</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            error: '',
            isError: false,
            breakdowns: ''
        }
    },
    methods: {
        async getRandomBreakDowns() {
            const data = await axios.get('/api/random/show');
            return data;
        },
        revolveText(
            options = {
                target: undefined,
                span: 100,
                north: 0,
                spiral: true
            }
        ) {
            const {
                target,
                span,
                north,
                spiral,
                size
            } = options;
            const message = target.textContent;
            const quaterWidth = target.clientWidth / 4;
            const diameter = size || quaterWidth;
            const messageChunks = message.split(String());
            const { length } = messageChunks;
            const offsetEnd = 1;
            const l = length + offsetEnd;
            const CIRC_MAX = 360;
            const PERC_MAX = 100;
            const ofDeg = span * CIRC_MAX / PERC_MAX;
            const ofNorth = north * CIRC_MAX / PERC_MAX;
            const segDeg = ofDeg / l;
            let a = 0;
            let i = 0;

            target.setAttribute('style', `
                    padding-left: ${diameter / 2}px;
                    display: inline-block;
                    width: ${diameter / 2}px;
                    height: ${diameter}px;
                    transform: rotate3d(0, 0, 1, -${segDeg + ofNorth}deg);
                    border-radius: 9e9em;
                `);

            target.classList.add('fx-Revolve');
            target.textContent = '';

            while (a < ofDeg) {
                a += segDeg;
                const charWrapper = document.createElement('span');
                charWrapper.textContent = messageChunks[i];
                i++;
                charWrapper.classList.add('fx-RevolveCharWrap');
                charWrapper.setAttribute(
                    'style',
                    `display: inline-block;
                    transform: rotate3d(0, 0, 1, ${a}deg) ${spiral ? 'translateY(' + (i) + 'px)' : ''};
                    position: absolute;
                    height: ${diameter / 2}px;
                    transform-origin: bottom left;
                    font-size: 1em;`
                );
                target.appendChild(charWrapper);
            }
    
        }
    },
    updated(){

        console.log(document.querySelector('#spiral-text').textContent);

        this.revolveText({
            target: document.querySelector('#spiral-text'),
            span: 100,
            north: 0,
            spiral: true,
            size: 250
        });
    },
    async mounted() {
        const dd = await this.getRandomBreakDowns();
        let strData = [];
        if (dd.data) {

            if (dd.data.error)
                strData = dd.data.error;
            else {

                const arrJoinedValues = [];
                const intDataLength = dd.data.length;
                for (let i = 0; i < intDataLength; i++) {
                    arrJoinedValues.push(...dd.data[i].values, ' ');
                }

                strData = arrJoinedValues.join('');
            }

            this.breakdowns = strData;

        } else {
            this.isError = true;
            this.error = 'Something went wrong!';
        }
    }
}
</script>