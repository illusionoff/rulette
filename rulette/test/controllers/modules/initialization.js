/*Modul initialization
 * initialization all Localstore и проверка если на их существование
 * Необходим при первом запуске и при переносе проекта в другое местоположение
 */
let date = new Date();
//ассоциативный массив localstorage параметров
let arr_localStorage_init = new Map([
    ['rulette_status', 'stop'],
    ['rulette_id_lost', '0'],
    ['rulette_jornal', 'rulette_jornal initialization' + date.toISOString()],
    ['rulette_sum', '130'],
    ['rulette_max_sum', '5000'],
    ['rulette_winner', 'Name_Winner'],
    ['rulette_complete', 'false']
]);
function check_init_localstorage(){
// Перебор параметров, если нету то инициализируем
for (let key of arr_localStorage_init) {
    //console.log(`Ключ = ${key[0]}, значение = ${key[1]}`);
    if (localStorage[key[0]]) {
        //  console.log(`Ключ ${key[0]} Обнаружен`);
    } else {
        //console.log(`Ключ ${key[0]} Не обнружен. Инициализируем его`);
        localStorage[key[0]] = key[1];
    }
}
}
check_init_localstorage();
console.log('This modules/initialization.js');