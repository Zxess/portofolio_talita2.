import React from 'react';
import ParticleBackground from './components/ParticleBackground';
import CustomCursor from './components/CustomCursor';
import PageTransition from './components/PageTransition';
import AnimatedCounter from './components/AnimatedCounter';
import AnimatedSkills from './components/AnimatedSkills';
import TiltCard from './components/TiltCard';
import MagneticButton from './components/MagneticButton';
import TextSplitter from './components/TextSplitter';
import InfiniteTestimonials from './components/InfiniteTestimonials';

const App = ({ pageData }) => {
    const stats = [
        { end: 50, label: 'Projects', icon: 'code' },
        { end: 30, label: 'Clients', icon: 'users' },
        { end: 5, label: 'Years', icon: 'clock' },
        { end: 15, label: 'Awards', icon: 'trophy' },
    ];

    const skills = [
        { name: 'Laravel', percentage: 90 },
        { name: 'React', percentage: 85 },
        { name: 'Vue.js', percentage: 80 },
        { name: 'JavaScript', percentage: 88 },
        { name: 'PHP', percentage: 85 },
    ];

    const testimonials = [
        { text: 'Talita is an amazing developer. She transformed our ideas into reality!', name: 'John Doe', position: 'CEO, TechCorp' },
        { text: 'Working with Talita was a pleasure. Her attention to detail is incredible.', name: 'Sarah Smith', position: 'Product Manager' },
        { text: 'Talita delivered beyond our expectations. Highly recommended!', name: 'Mike Johnson', position: 'Startup Founder' },
    ];

    return (
        <PageTransition>
            <CustomCursor />
            <ParticleBackground />
            
            <div className="relative z-10">
                {/* Stats Section with Animated Counters */}
                <section className="py-20 bg-white/50 backdrop-blur-sm">
                    <div className="container mx-auto px-6">
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                            {stats.map((stat, index) => (
                                <AnimatedCounter key={index} {...stat} />
                            ))}
                        </div>
                    </div>
                </section>

                {/* Skills Section */}
                <section className="py-20 bg-gray-50">
                    <div className="container mx-auto px-6">
                        <div className="text-center mb-16">
                            <TextSplitter 
                                text="Technical Skills & Expertise" 
                                className="text-4xl font-bold mb-4"
                            />
                        </div>
                        <div className="max-w-3xl mx-auto">
                            <AnimatedSkills skills={skills} />
                        </div>
                    </div>
                </section>

                {/* Projects Section with Tilt Cards */}
                <section className="py-20">
                    <div className="container mx-auto px-6">
                        <div className="text-center mb-16">
                            <TextSplitter text="My Latest Projects" className="text-4xl font-bold" />
                        </div>
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            {pageData.projects?.map((project, index) => (
                                <TiltCard key={index} {...project} />
                            ))}
                        </div>
                    </div>
                </section>

                {/* Testimonials */}
                <section className="py-20 bg-gray-50">
                    <div className="container mx-auto px-6">
                        <div className="text-center mb-16">
                            <TextSplitter text="What People Say" className="text-4xl font-bold" />
                        </div>
                        <InfiniteTestimonials testimonials={testimonials} />
                    </div>
                </section>

                {/* CTA Section with Magnetic Buttons */}
                <section className="py-20 bg-gradient-to-r from-blue-600 to-purple-600">
                    <div className="container mx-auto px-6 text-center">
                        <h2 className="text-4xl font-bold text-white mb-8">Ready to Start Your Project?</h2>
                        <div className="flex gap-6 justify-center">
                            <MagneticButton
                                href="#contact"
                                className="px-8 py-4 bg-white text-gray-900 rounded-full font-semibold"
                            >
                                Get Started
                            </MagneticButton>
                            <MagneticButton
                                href="#projects"
                                className="px-8 py-4 border-2 border-white text-white rounded-full font-semibold"
                            >
                                View Portfolio
                            </MagneticButton>
                        </div>
                    </div>
                </section>
            </div>
        </PageTransition>
    );
};

export default App;