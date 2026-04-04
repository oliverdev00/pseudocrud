<div class="py-12 relative min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="glass overflow-hidden shadow-2xl sm:rounded-3xl p-8 border border-gray-200 dark:border-white/5">
            
            <!-- Header & Filter -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                <div>
                    <h2 class="text-4xl font-black text-gray-200 dark:text-white tracking-tighter leading-none mb-2 uppercase">
                        Archive <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-orange-600 to-red-900">Tasker</span>
                    </h2>
                    <p class="text-gray-500 dark:text-red-200/40 font-bold uppercase tracking-[0.3em] text-[10px]">Dystopian Precision. Magma Protocol.</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="flex gap-2">
                        <input type="text" wire:model.live="clientFilter" placeholder="Filter by client..." class="glass bg-white dark:bg-white/5 text-gray-900 dark:text-white rounded-xl border-gray-200 dark:border-white/10 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-4 placeholder-gray-400 dark:placeholder-gray-500 hover:bg-gray-50 dark:hover:bg-white/10 transition-colors">
                        
                        <select wire:model.live="statusFilter" class="glass bg-white dark:bg-white/5 text-gray-900 dark:text-white rounded-xl border-gray-200 dark:border-white/10 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-4 appearance-none hover:bg-gray-50 dark:hover:bg-white/10 transition-colors">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="done">Done</option>
                        </select>

                        <select wire:model.live="priorityFilter" class="glass bg-white dark:bg-white/5 text-gray-900 dark:text-white rounded-xl border-gray-200 dark:border-white/10 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-4 appearance-none hover:bg-gray-50 dark:hover:bg-white/10 transition-colors">
                            <option value="">All Priority</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <button wire:click="openCreateModal" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-700 to-orange-800 border border-red-500/20 rounded-xl font-black text-xs text-white uppercase tracking-widest hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200 shadow-[0_0_20px_rgba(220,38,38,0.2)]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Deploy Task
                    </button>
                </div>
            </div>

            <!-- Stats Dashboard (Startup Bento Style) -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="glass p-6 rounded-3xl border border-gray-200 dark:border-white/5 group hover:bg-gray-50 dark:hover:bg-white/5 transition-all duration-500">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-2 rounded-xl bg-indigo-500/10 text-indigo-600 dark:text-indigo-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <span class="text-2xl font-black text-gray-900 dark:text-white">{{ $stats['total'] }}</span>
                    </div>
                    <p class="text-[10px] items-center flex font-black uppercase tracking-[0.2em] text-indigo-600/40 dark:text-indigo-300/40">
                        Total <span class="ml-1 text-gray-400 dark:text-white/20">Operations</span>
                    </p>
                </div>

                <div class="glass p-6 rounded-3xl border border-gray-200 dark:border-white/5 group hover:bg-gray-50 dark:hover:bg-white/5 transition-all duration-500">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-2 rounded-xl bg-yellow-500/10 text-yellow-600 dark:text-yellow-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-2xl font-black text-yellow-600 dark:text-yellow-500">{{ $stats['pending'] }}</span>
                    </div>
                    <p class="text-[10px] items-center flex font-black uppercase tracking-[0.2em] text-yellow-600/40 dark:text-yellow-500/40">
                        Pending <span class="ml-1 text-gray-400 dark:text-white/20">Queue</span>
                    </p>
                </div>

                <div class="glass p-6 rounded-3xl border border-gray-200 dark:border-white/5 group hover:bg-gray-50 dark:hover:bg-white/5 transition-all duration-500">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-2 rounded-xl bg-blue-500/10 text-blue-600 dark:text-blue-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-2xl font-black text-blue-600 dark:text-blue-400">{{ $stats['in_progress'] }}</span>
                    </div>
                    <p class="text-[10px] items-center flex font-black uppercase tracking-[0.2em] text-blue-600/40 dark:text-blue-400/40">
                        Active <span class="ml-1 text-gray-400 dark:text-white/20">Sprints</span>
                    </p>
                </div>

                <div class="glass p-6 rounded-3xl border border-gray-200 dark:border-white/5 group hover:bg-gray-50 dark:hover:bg-white/5 transition-all duration-500">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-2 rounded-xl bg-green-500/10 text-green-600 dark:text-green-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-2xl font-black text-green-600 dark:text-green-400">{{ $stats['done'] }}</span>
                    </div>
                    <p class="text-[10px] items-center flex font-black uppercase tracking-[0.2em] text-green-600/40 dark:text-green-400/40">
                        Resolved <span class="ml-1 text-gray-400 dark:text-white/20">Assets</span>
                    </p>
                </div>
            </div>

            <!-- Task List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($tasks as $task)
                    <div @class([
                        'glass-card p-6 rounded-2xl relative group flex flex-col h-full',
                        'border-red-500/20' => $task->priority === 'high',
                        'border-orange-500/20' => $task->priority === 'medium',
                        'border-cyan-500/20' => $task->priority === 'low',
                    ])>
                        <div class="flex justify-between items-start mb-6">
                            <span @class([
                                'px-3 py-1 text-[10px] font-bold rounded-lg uppercase tracking-wider backdrop-blur-md',
                                'bg-gray-800 text-gray-400 border border-white/5' => $task->status === 'pending',
                                'bg-orange-950 text-orange-500 border border-orange-500/20' => $task->status === 'in_progress',
                                'bg-red-950 text-red-500 border border-red-500/20' => $task->status === 'done',
                            ])>
                                {{ str_replace('_', ' ', $task->status) }}
                            </span>
                            
                            <div class="flex items-center gap-2">
                                <span @class([
                                    'text-[9px] font-black px-2 py-0.5 rounded-md border uppercase tracking-widest',
                                    'bg-red-500/10 border-red-500/30 text-red-500' => $task->priority === 'high',
                                    'bg-orange-500/10 border-orange-500/30 text-orange-500' => $task->priority === 'medium',
                                    'bg-cyan-500/10 border-cyan-500/30 text-cyan-500' => $task->priority === 'low',
                                ])>
                                    {{ $task->priority }}
                                </span>
                            </div>
                        </div>

                        <h3 class="font-bold text-xl text-gray-900 dark:text-white mb-3 truncate group-hover:text-indigo-600 dark:group-hover:text-transparent dark:group-hover:bg-clip-text dark:group-hover:bg-gradient-to-r dark:group-hover:from-white dark:group-hover:to-indigo-300 transition-all" title="{{ $task->title }}">
                            {{ $task->title }}
                        </h3>
                        
                        <p class="text-gray-600 dark:text-indigo-100/60 text-sm mb-6 line-clamp-3 leading-relaxed flex-grow">
                            {{ $task->description ?: 'No description provided.' }}
                        </p>

                        @if($task->client_name)
                            <div class="mb-4 flex items-center gap-2 group/client">
                                <div class="p-1.5 rounded-lg bg-red-500/5 border border-red-500/10 group-hover/client:bg-red-500/10 transition-colors">
                                    <svg class="h-3 w-3 text-red-700/50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-600/40 dark:text-indigo-400/40 leading-none mb-1">Client</p>
                                    <p class="text-xs font-bold text-gray-700 dark:text-indigo-200">{{ $task->client_name }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="flex items-center justify-between mt-auto pt-6 border-t border-gray-100 dark:border-white/5 text-xs font-medium text-gray-400 dark:text-indigo-200/40">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-indigo-500/50 dark:text-indigo-400/50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $task->due_date ? $task->due_date->format('M d, Y') : 'No date set' }}
                            </div>
                            
                            <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <button wire:click="editTask({{ $task->id }})" class="p-2 text-indigo-400 hover:bg-white/10 rounded-xl transition-colors backdrop-blur-md" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button wire:click="confirmDelete({{ $task->id }})" class="p-2 text-red-400 hover:bg-red-500/10 rounded-xl transition-colors backdrop-blur-md" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        @if(Auth::user()->isAdmin())
                            <div class="mt-3 text-[10px] text-fuchsia-400/40 uppercase font-black tracking-widest">
                                User: {{ $task->user->name }}
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full py-24 flex flex-col items-center justify-center glass rounded-3xl border border-white/5">
                        <div class="p-4 rounded-full bg-white/5 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-indigo-400/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <p class="text-white/60 font-bold text-xl mb-1">Silence in the Tasker.</p>
                        <p class="text-indigo-200/30 text-sm">No tasks were found in this void.</p>
                    </div>
                @endforelse
            </div>

            <!-- Modal -->
            @if($showModal)
                <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" aria-hidden="true" wire:click="$set('showModal', false)"></div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div class="inline-block glass-dark rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full border border-red-500/20">
                            <form wire:submit.prevent="save">
                                <div class="px-8 pt-8 pb-6 bg-white dark:bg-transparent">
                                    <div class="mb-8">
                                        <h3 class="text-2xl font-black text-gray-100 dark:text-white uppercase tracking-tighter" id="modal-title">
                                            {{ $editingTask ? 'Override Task' : 'Deploy Task' }}
                                        </h3>
                                        <div class="h-1 w-12 bg-gradient-to-r from-red-600 to-orange-600 mt-2 rounded-full"></div>
                                    </div>
                                    
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-xs font-black uppercase tracking-widest text-indigo-600/50 dark:text-indigo-200/50 mb-2">Title</label>
                                            <input type="text" wire:model="title" class="block w-full rounded-xl bg-gray-50 dark:bg-white/5 border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 py-3 px-4 transition-all">
                                            @error('title') <span class="text-red-500 dark:text-red-400 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-black uppercase tracking-widest text-indigo-600/50 dark:text-indigo-200/50 mb-2">Description</label>
                                            <textarea wire:model="description" rows="4" class="block w-full rounded-xl bg-gray-50 dark:bg-white/5 border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 py-3 px-4 transition-all"></textarea>
                                            @error('description') <span class="text-red-500 dark:text-red-400 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="grid grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-black uppercase tracking-widest text-indigo-600/50 dark:text-indigo-200/50 mb-2">Status</label>
                                                <select wire:model="status" class="block w-full rounded-xl bg-gray-50 dark:bg-white/5 border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:text-white py-3 px-4 appearance-none">
                                                    <option value="pending">Pending</option>
                                                    <option value="in_progress">In Progress</option>
                                                    <option value="done">Done</option>
                                                </select>
                                                @error('status') <span class="text-red-500 dark:text-red-400 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                                            </div>

                                            <div>
                                                <label class="block text-xs font-black uppercase tracking-widest text-indigo-600/50 dark:text-indigo-200/50 mb-2">Priority</label>
                                                <select wire:model="priority" class="block w-full rounded-xl bg-gray-50 dark:bg-white/5 border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:text-white py-3 px-4 appearance-none">
                                                    <option value="low">Low</option>
                                                    <option value="medium">Medium</option>
                                                    <option value="high">High</option>
                                                </select>
                                                @error('priority') <span class="text-red-500 dark:text-red-400 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-black uppercase tracking-widest text-indigo-600/50 dark:text-indigo-200/50 mb-2">Client Name</label>
                                                <input type="text" wire:model="client_name" placeholder="e.g. Acme Corp" class="block w-full rounded-xl bg-gray-50 dark:bg-white/5 border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 py-3 px-4 transition-all">
                                                @error('client_name') <span class="text-red-500 dark:text-red-400 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                                            </div>

                                            <div>
                                                <label class="block text-xs font-black uppercase tracking-widest text-indigo-600/50 dark:text-indigo-200/50 mb-2">Client Email</label>
                                                <input type="email" wire:model="client_email" placeholder="client@example.com" class="block w-full rounded-xl bg-gray-50 dark:bg-white/5 border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 py-3 px-4 transition-all">
                                                @error('client_email') <span class="text-red-500 dark:text-red-400 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-black uppercase tracking-widest text-indigo-600/50 dark:text-indigo-200/50 mb-2">Due Date</label>
                                            <input type="date" wire:model="due_date" class="block w-full rounded-xl bg-gray-50 dark:bg-white/5 border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:text-white py-3 px-4 appearance-none">
                                            @error('due_date') <span class="text-red-500 dark:text-red-400 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 dark:bg-black/20 px-8 py-6 flex flex-row-reverse gap-4 border-t border-gray-100 dark:border-white/5">
                                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-700 to-orange-800 border border-red-500/20 rounded-xl font-black text-xs text-white uppercase tracking-widest hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200 shadow-[0_0_20px_rgba(220,38,38,0.2)]">
                                        Execute Changes
                                    </button>
                                    <button type="button" wire:click="$set('showModal', false)" class="inline-flex items-center px-6 py-3 glass border border-gray-200 dark:border-white/5 hover:bg-gray-100 dark:hover:bg-white/10 rounded-xl font-bold text-xs text-gray-600 dark:text-gray-300 uppercase tracking-widest transition-all">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Delete Confirmation Modal -->
            @if($confirmingDelete)
                <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" aria-hidden="true" wire:click="$set('confirmingDelete', null)"></div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div class="inline-block glass-dark rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full border border-red-500/20">
                            <div class="px-8 pt-8 pb-6 bg-white dark:bg-transparent">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-2xl bg-red-500/20 border border-red-500/30 sm:mx-0">
                                        <svg class="h-8 w-8 text-red-600 dark:text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <div class="mt-4 text-center sm:mt-0 sm:ml-6 sm:text-left">
                                        <h3 class="text-2xl font-black text-gray-900 dark:text-white" id="modal-title">Delete Task</h3>
                                        <div class="mt-4">
                                            <p class="text-gray-500 dark:text-indigo-200/50 font-medium">This action is permanent and cannot be undone within Tasker.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 dark:bg-black/20 px-8 py-6 flex flex-row-reverse gap-4 border-t border-gray-100 dark:border-white/5">
                                <button type="button" wire:click="deleteTask" class="inline-flex items-center px-6 py-3 bg-red-600/80 hover:bg-red-600 border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest transition-all">
                                    Delete
                                </button>
                                <button type="button" wire:click="$set('confirmingDelete', null)" class="inline-flex items-center px-6 py-3 glass border border-gray-200 dark:border-white/5 hover:bg-gray-100 dark:hover:bg-white/10 rounded-xl font-bold text-xs text-gray-600 dark:text-gray-300 uppercase tracking-widest transition-all">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Notification -->
            <div
                x-data="{ show: false, message: '' }"
                x-on:notify.window="show = true; message = $event.detail; setTimeout(() => show = false, 3000)"
                x-show="show"
                x-transition:enter="transform ease-out duration-300 transition"
                x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed bottom-0 right-0 m-8 max-w-sm w-full glass bg-green-500/20 border-green-500/30 text-green-400 rounded-2xl shadow-2xl p-4 z-50 pointer-events-auto backdrop-blur-2xl"
                style="display: none;"
            >
                <div class="flex items-center">
                    <div class="p-2 bg-green-500/20 rounded-lg mr-3">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span x-text="message" class="font-bold tracking-tight"></span>
                </div>
            </div>

        </div>
    </div>
</div>
