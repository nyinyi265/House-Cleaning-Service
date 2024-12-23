<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqCategories = [
            [
                'id' => 'services',
                'title' => 'Our Services',
                'items' => [
                    [
                        'question' => 'What house keeping services do you offer?',
                        'answer' => 'We offer a wide range of services including regular cleaning, deep cleaning, move-in/move-out cleaning, office cleaning, and specialized cleaning for kitchens, bathrooms, and carpets. We can customize our services to meet your specific needs.',
                    ],
                    [
                        'question' => 'How often can I schedule your services?',
                        'answer' => 'We offer flexible scheduling options including weekly, bi-weekly, monthly, or one-time cleanings. We\'ll work with you to determine the best frequency based on your needs and preferences.',
                    ],
                    [
                        'question' => 'Do you bring your own cleaning supplies and equipment?',
                        'answer' => 'Yes, we bring all necessary cleaning supplies and equipment. We use high-quality, eco-friendly products. If you have specific products you prefer, please let us know in advance.',
                    ],
                ],
            ],
            [
                'id' => 'booking',
                'title' => 'Booking & Scheduling',
                'items' => [
                    [
                        'question' => 'How do I book a cleaning service?',
                        'answer' => 'You can book our services online through our website, by phone, or via email. We\'ll ask for details about your home and cleaning needs to provide an accurate quote and schedule a convenient time for you.',
                    ],
                    [
                        'question' => 'What if I need to reschedule or cancel my appointment?',
                        'answer' => 'We understand that plans can change. Please give us at least 24 hours notice for rescheduling or cancellations to avoid any fees. You can contact our customer service team to make changes to your appointment.',
                    ],
                    [
                        'question' => 'Do you offer same-day or emergency cleaning services?',
                        'answer' => 'Yes, we offer same-day and emergency cleaning services based on availability. Please contact us as soon as possible, and we\'ll do our best to accommodate your request.',
                    ],
                ],
            ],
            [
                'id' => 'pricing',
                'title' => 'Pricing & Payment',
                'items' => [
                    [
                        'question' => 'How is the cost of cleaning services determined?',
                        'answer' => 'Our pricing is based on factors such as the size of your home, the type of cleaning service requested, and the frequency of service. We provide customized quotes to ensure you\'re only paying for the services you need.',
                    ],
                    [
                        'question' => 'Do you offer any discounts or promotions?',
                        'answer' => 'Yes, we frequently offer discounts for first-time customers and have loyalty programs for regular clients. Check our website or contact our customer service for current promotions.',
                    ],
                    [
                        'question' => 'What payment methods do you accept?',
                        'answer' => 'We accept various payment methods including credit cards, debit cards, and electronic bank transfers. Payment is typically due at the time of service or can be set up for automatic billing for regular cleaning schedules.',
                    ],
                ],
            ],
            [
                'id' => 'security',
                'title' => 'Security & Insurance',
                'items' => [
                    [
                        'question' => 'Are your cleaning staff background checked?',
                        'answer' => 'Yes, all our cleaning staff undergo thorough background checks and are fully vetted before joining our team. We prioritize your safety and peace of mind.',
                    ],
                    [
                        'question' => 'Is your company insured?',
                        'answer' => 'Absolutely. We are fully insured, including liability insurance and workers\' compensation. This protects both our clients and our employees in the unlikely event of an accident or damage.',
                    ],
                    [
                        'question' => 'How do you ensure the security of my home?',
                        'answer' => 'We take security very seriously. Our staff are trained to follow strict protocols, including proper key handling and alarm procedures. We also maintain detailed records of all visits to ensure accountability.',
                    ],
                ],
            ],
        ];

        return view('user.faq', compact('faqCategories'));
    }
}

