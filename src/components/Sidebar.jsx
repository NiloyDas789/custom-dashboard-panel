import React from 'react';

const Sidebar = () => {
    return (
        <aside className="sidebar">
            <ul>
                <li><button>Dashboard</button></li>
                <li><button>Analytics</button></li>
                <li><button>User Management</button></li>
                <li><button>Settings</button></li>
            </ul>
        </aside>
    );
};

export default Sidebar;
