import React from 'react';

const FeatureCard = ({ title, description, icon }) => {
    return (
        <div className="feature-card">
            <div className="icon">{icon}</div>
            <h3>{title}</h3>
            <p>{description}</p>
            <button className="action-button">Learn More</button>
        </div>
    );
};

export default FeatureCard;
