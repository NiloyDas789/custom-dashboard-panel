import React from 'react';
import FeatureCard from './FeatureCard';

const Dashboard = () => {
    const features = [
        { title: 'Analytics', description: 'Get detailed analytics about user activity.', icon: '📊' },
        { title: 'User Management', description: 'Manage users, roles, and permissions.', icon: '👥' },
        { title: 'Custom Reports', description: 'Generate and download reports as needed.', icon: '📄' },
        { title: 'Settings', description: 'Configure settings for the application.', icon: '⚙️' },
    ];

    return (
        <div className="dashboard">
            <h2>Dashboard Overview</h2>
            <div className="feature-cards">
                {features.map((feature, index) => (
                    <FeatureCard key={index} {...feature} />
                ))}
            </div>
        </div>
    );
};

export default Dashboard;
