export default [
        {
            path: '/',
            name: 'home',
            component: require('./components/pages/home'),
            meta: {
                auth: true
            }
        },
        {
            path: '/login',
            name: 'login',
            component: require('./components/views/Login.vue'),
            meta: {
                auth: false
            }
        },
        {
            path: '/logout',
            name: 'logout',
            component: require('./components/views/Logout.vue'),
            meta: {
                auth: true
            }
        },
        // {
        //     path: '/mahasiswa',
        //     name: 'mahasiswa',
        //     component: require('./components/Mahasiswa.vue'),
        //     meta: {
        //         auth: true
        //     }
        // },
        // {
        //     path: '/mahasiswa/create',
        //     name: 'create.mahasiswa',
        //     component: require('./components/CreateMahasiswa'),
        //     meta: {
        //         auth: true
        //     }
        // },
        // {
        //     path: '/mahasiswa/show/:id',
        //     name: 'show.mahasiswa',
        //     component: require('./components/ShowMahasiswa'),
        //     meta: {
        //         auth: true
        //     }
        // },
        // {
        //     path: '/mahasiswa/edit/:id',
        //     name: 'edit.mahasiswa',
        //     component: require('./components/EditMahasiswa'),
        //     meta: {
        //         auth: true
        //     }
        // },
    // {
    //     path: '/user',
    //     name: 'user',
    //     component: require('./components/views/user/User.vue'),
    //     meta: {
    //         auth: true
    //     }
    // },
    // {
    //     path: '/user/create',
    //     name: 'create.user',
    //     component: require('./components/views/user/CreateUser'),
    //     meta: {
    //         auth: true
    //     }
    // },
    // {
    //     path: '/user/show/:id',
    //     name: 'show.user',
    //     component: require('./components/views/user/ShowUser'),
    //     meta: {
    //         auth: true
    //     }
    // },
    // {
    //     path: '/user/edit/:id',
    //     name: 'edit.user',
    //     component: require('./components/views/user/EditUser'),
    //     meta: {
    //         auth: true
    //     }
    // },
    ]
