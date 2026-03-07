<template>
    <section class="dashboard-wrap">
        <div class="stats-row">
            <article class="stat-card" v-for="item in statCards" :key="item.label">
                <p class="stat-label">{{ item.label }}</p>
                <p class="stat-value">{{ item.value }}</p>
            </article>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-left">
                <article class="widget">
                    <div class="widget-head">
                        <h3 class="widget-title">Scheduling Timeline</h3>
                        <button class="ghost-btn" type="button">Week 1</button>
                    </div>
                    <div class="bar-chart">
                        <span style="height: 35%;"></span>
                        <span style="height: 48%;"></span>
                        <span style="height: 58%;"></span>
                        <span style="height: 45%;"></span>
                        <span class="is-accent" style="height: 76%;"></span>
                        <span style="height: 42%;"></span>
                        <span style="height: 61%;"></span>
                    </div>
                </article>

                <article class="widget">
                    <h3 class="widget-title">Sales Monitoring</h3>
                    <p class="muted-copy">Monthly Channel Split</p>
                    <div class="overview-track">
                        <span style="width: 26%; background: #a6a9b1;"></span>
                        <span style="width: 39%; background: #7d818c;"></span>
                        <span style="width: 35%; background: #575b67;"></span>
                    </div>
                    <div class="legend-row">
                        <p><strong>14%</strong> Walk-in</p>
                        <p><strong>20%</strong> Online</p>
                        <p><strong>18%</strong> Repeat Clients</p>
                    </div>
                </article>

                <article class="widget wide">
                    <div class="widget-head">
                        <h3 class="widget-title">Scheduling and Sales Performance</h3>
                        <button class="ghost-btn" type="button">Filter</button>
                    </div>
                    <table class="mini-table">
                        <thead>
                            <tr>
                                <th>Staff Name</th>
                                <th>Shift</th>
                                <th>Department</th>
                                <th>Bookings</th>
                                <th>Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in performanceRows" :key="row.name">
                                <td>{{ row.name }}</td>
                                <td>{{ row.shift }}</td>
                                <td>{{ row.department }}</td>
                                <td>{{ row.bookings }}</td>
                                <td>{{ row.sales }}</td>
                            </tr>
                        </tbody>
                    </table>
                </article>

                <article class="widget">
                    <h3 class="widget-title">Team Allocation</h3>
                    <div class="donut-chart"></div>
                    <div class="legend-col">
                        <p><span class="dot full-time"></span> Full-Time</p>
                        <p><span class="dot part-time"></span> Part-Time</p>
                        <p><span class="dot intern"></span> Contractor</p>
                    </div>
                </article>
            </div>

            <aside class="dashboard-right">
                <article class="widget compact">
                    <div class="small-stat-row">
                        <div class="small-stat" v-for="item in quickStats" :key="item.label">
                            <p>{{ item.label }}</p>
                            <strong>{{ item.value }}</strong>
                        </div>
                    </div>
                </article>

                <article class="widget compact dark">
                    <p class="event-label">SYSTEM ALERT</p>
                    <h4 class="event-title">Peak-hour queue at 4:00 PM</h4>
                </article>

                <article class="widget compact">
                    <h3 class="widget-title">Staff Notifications</h3>
                    <div class="leave-list">
                        <div class="leave-item" v-for="item in notifications" :key="item.name">
                            <p class="leave-name">{{ item.name }}</p>
                            <p class="leave-note">{{ item.note }}</p>
                            <span class="leave-time">{{ item.time }}</span>
                        </div>
                    </div>
                </article>

                <article class="widget compact">
                    <h3 class="widget-title">Growth</h3>
                    <div class="line-chart">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </article>
            </aside>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Dashboard',
    data() {
        return {
            statCards: [
                { label: 'Scheduled Sessions', value: '128' },
                { label: 'Sales This Month', value: '1,560' },
                { label: 'Pending Inquiries', value: '24' },
            ],
            performanceRows: [
                { name: 'Peter', shift: 'AM', department: 'Marketing', bookings: '30', sales: '150,000' },
                { name: 'Anderson', shift: 'PM', department: 'Finance', bookings: '24', sales: '80,000' },
                { name: 'Lisiya', shift: 'AM', department: 'Sales', bookings: '22', sales: '50,000' },
            ],
            quickStats: [
                { label: 'Booked', value: '65' },
                { label: 'Walk-in', value: '35' },
                { label: 'Cancelled', value: '20' },
            ],
            notifications: [
                { name: 'Ahamed', note: 'Shift swap request', time: 'today' },
                { name: 'Jenifa', note: 'Inventory follow-up', time: '20-25' },
            ],
        };
    },
};
</script>
